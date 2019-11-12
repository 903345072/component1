<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Queue;
use app\index\logic\OrderLogic;
use app\index\job\DeferJob;
use app\index\job\SellJob;
use app\index\job\RebateJob;

class Cron extends Controller
{
    // 抓取板块行情指数
    // public function grabPlateIndex()
    // {
    //     set_time_limit(0);
    //     if(checkStockTradeTime()){
    //         $jsonArray = [];
    //         $jsonPath = "./plate.json";
    //         $url = 'http://hq.sinajs.cn/rn=1520407404627&list=s_sh000001,s_sz399001,s_sz399006';
    //         $html = file_get_contents($url);
    //         $html = str_replace(["\r\n", "\n", "\r", " "], "", $html);
    //         $plates = explode(';', $html);
    //         if($plates){
    //             foreach ($plates as $plate){
    //                 if($plate){
    //                     $plate = iconv("GB2312", "UTF-8", $plate);
    //                     preg_match('/^varhq_str_s_([sh|sz]{2})(\d{6})="(.*)"/i', $plate, $match);
    //                     if($match[3]){
    //                         $_data = explode(",", $match[3]);
    //                         $jsonArray[] = [
    //                             "plate_name" => $_data[0],
    //                             "last_px"   => $_data[1],
    //                             "px_change" => $_data[2],
    //                             "px_change_rate" => $_data[3]
    //                         ];
    //                     }
    //                 }
    //             }
    //         }
    //         if($jsonArray){
    //             @file_put_contents($jsonPath, json_encode($jsonArray, JSON_UNESCAPED_UNICODE));
    //             echo "ok";
    //         }
    //     }
    // }

    // 半小时 股票列表
    public function grabStockLists()
    {
        set_time_limit(0);
        if(checkStockTradeTime()){
            $_arrays = [];
            $_jsTextIndex = 0;
            $_jsTextArrays = [];
            $_jsText = "var stocks=new Array();";
            $_jsPath = "./static/js/stock.js";
            $url = 'http://money.finance.sina.com.cn/d/api/openapi_proxy.php/?__s=[["hq","hs_a","",0,1,200]]&callback=FDC_DC.theTableData';
            $html = file_get_contents($url);
            $json = substr($html, 70, -3);
            $array = json_decode($json, true);
            $total = $array["count"];
            $count = ceil($total / 200);
            foreach ($array['items'] as $item){
                $_arrays[] = [
                    "full_code"	=> $item[0],
                    "code"  => $item[1],
                    "name"  => str_replace(' ', '', $item[2]),
                ];
                $_jsTextArrays[] = "stocks[". $_jsTextIndex ."]=new Array('','" . $item[1] . "','" . str_replace(' ', '', $item[2]) . "','" . $item[0] . "'); ";
                $_jsTextIndex++;
                
            }
            for ($i = 2; $i <= $count; $i++){
                $_url = 'http://money.finance.sina.com.cn/d/api/openapi_proxy.php/?__s=[["hq","hs_a","",0,'.$i.',200]]&callback=FDC_DC.theTableData';
                $_html = file_get_contents($_url);
                $_json = substr($_html, 70, -3);
                $_array = json_decode($_json, true);
                foreach ($_array['items'] as $_item){
                    $_arrays[] = [
                        "full_code"	=> $_item[0],
                        "code"  => $_item[1],
                        "name"  => str_replace(' ', '', $_item[2]),
                    ];
                    $_jsTextArrays[] = "stocks[". $_jsTextIndex ."]=new Array('','" . $_item[1] . "','" . str_replace(' ', '', $_item[2]) . "','" . $_item[0] . "'); ";
                    $_jsTextIndex++;
                }
            }
            $_jsText .= implode('', $_jsTextArrays);
            $out = array();
            $codeList = (new StockLogic())->stockLists();

            foreach ($_arrays as $ke => $value) {
                if(!in_array($value,$out) && !in_array($value['code'],$codeList)){
                    $out[$ke] = $value;
                }
            }
            // var_dump($out);die();
            Db::startTrans();
            try{
                // model("Lists")->query("truncate table stock_list");
                // model("Lists")->saveAll($out);
                (new StockLogic())->saveStock($out);
                @file_put_contents($_jsPath, $_jsText);
                // 提交事务
                Db::commit();
                echo "ok";
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
                echo "false";
            }
        }
        return 'ok';
    }
    
    // 递延费扣除
    public function scanOrderDefer()
    {
        set_time_limit(0);
        if(checkStockTradeTime()){
            $orders = (new OrderLogic())->allDeferOrders();
            if($orders){
                foreach ($orders as $order){
                    if($order['is_defer']){
                        $diyan = (new DeferJob())->handle($order["order_id"]);
                        // 自动递延
                        // Queue::push('app\index\job\DeferJob@handleDeferOrder', $order["order_id"], null);
                    }else{
                        // 非自动递延,强制平仓
                        $nodiyan = (new DeferJob())->handleNonAuto($order);
                        // Queue::push('app\index\job\DeferJob@handleNonAutoDeferOrder', $order, null);
                    }
                }
            }
        }
        return 'ok';
    }
        
    // 爆仓、止盈、止损，交易时间段、每2秒一次
    public function scanOrderSell()
    {
        set_time_limit(0);
        if(checkStockTradeTime()){
            $orders = (new OrderLogic())->orderByState($state = 3);
            if($orders){
                foreach ($orders as $order){
                    $baocang = (new SellJob())->handleSell($order["order_id"]);
                    // $nodiyan = $this->handleSell($order["order_id"]);
                    // Queue::push('app\index\job\SellJob@handleSellOrder', $order["order_id"], null);
                }
            }
        }
        return 'ok';
    }

    // 盈利牛人返点-每天停盘后的时间段 16-23点
    public function handleNiurenRebate()
    {
        set_time_limit(0);
        if(checkSettleTime() || true){
            $orders = (new OrderLogic())->todayNiurenRebateOrder();
            if($orders){
                foreach ($orders as $order){
                    if($order['is_follow'] == 1){
                        // 跟买
                        $followData = [
                            "money" => $order["profit"], //盈利额
                            "order_id" => $order["order_id"], //订单ID
                            "follow_id" => $order["follow_id"] //跟买订单ID
                        ];
                        $niuren = (new RebateJob())->handleFollow($followData);
                        // Queue::push('app\index\job\RebateJob@handleFollowOrder', $followData, null);
                    }
                }
            }
        }
    }

    // 盈利代理商返点-每天停盘后的时间段 16-23点
    public function handleProxyRebate()
    {
        set_time_limit(0);
        if(checkSettleTime() || true){
            $orders = (new OrderLogic())->todayProxyRebateOrder();
            // var_dump($orders);die();
            if($orders){
                foreach ($orders as $order){
                    $rebateData = [
                        "money" => -$order["profit"],        //  盈亏
                        "order_id" => $order["order_id"],   //  订单ID
                        "user_id" => $order["user_id"],
                    ];
                    // var_dump($rebateData);die();
                    $niuren = (new RebateJob())->handleProxy($rebateData);
                    // Queue::push('app\index\job\RebateJob@handleProxyRebate', $rebateData, null);
                }
            }
        }
        return 'ok';
    }
    // // 盈利代理商返点-每天停盘后的时间段 16-23点
    // public function handleProxyRebate()
    // {
    //     set_time_limit(0);
    //     if(checkSettleTime()){
    //         $orders = (new OrderLogic())->todayProxyRebateOrder();
    //         if($orders){
    //             foreach ($orders as $order){
    //                 $rebateData = [
    //                     "money" => $order["profit"] * $order['belongs_to_mode']['point'] / 100, //系统抽成金额
    //                     "order_id" => $order["order_id"], //订单ID
    //                     "user_id" => $order["user_id"],
    //                 ];
    //                 // var_dump($rebateData);
    //                 $niuren = (new RebateJob())->handleProxy($rebateData);
    //                 // Queue::push('app\index\job\RebateJob@handleProxyRebate', $rebateData, null);
    //             }
    //         }
    //     }
    //     return 'ok';
    // }

    // 建仓费返点-每天停盘后的时间段 16-23点
    public function handleJiancangRebate()
    {
        set_time_limit(0);
        if(checkSettleTime()){
            $orders = (new OrderLogic())->todayJiancangRebateOrder();
            if($orders){
                foreach ($orders as $order){
                    $rebateData = [
                        "money" => $order["jiancang_fee"],
                        "order_id" => $order["order_id"], //订单ID
                        "user_id" => $order["user_id"]
                    ];
                    $niuren = (new RebateJob())->handleJiancang($rebateData);
                    // Queue::push('app\index\job\RebateJob@handleJiancangRebate', $rebateData, null);
                }
            }
        }
        return 'ok';
    }
    // 2019年3月30日17:17:44
    // 递延费
    // public function handle($orderId)
    // {
    //     $order = (new OrderLogic())->orderById($orderId);
    //     if($order['is_defer'] && $order['free_time'] < time()){
    //         $user = (new UserLogic())->userById($order['user_id']);
    //         if($user){
    //             $managerUserId = $user["parent_id"];
    //             $adminId = $user["admin_id"];
    //             $adminIds = (new AdminLogic())->ringFamilyTree($adminId);
    //             if($user['account'] >= $order['defer']){
    //                 // 用户余额充足
    //                 $handleRes = (new OrderLogic())->handleDeferByUserAccount($order, $managerUserId, $adminIds);
    //                 return $handleRes ? true : false;
    //             }else if($order['deposit'] >= $order['defer']){ // 取消余额不足，扣除保证金功能
    //                 // 订单保证金充足
    //                 $handleRes = (new OrderLogic())->handleDeferByDeposit($order, $managerUserId, $adminIds);
    //                 return $handleRes ? true : false;
    //             }else{
    //                 // 余额不足，无法扣除
    //                 $quotation = (new StockLogic())->quotationBySina($order['code']);
    //                 if(isset($quotation[$order['code']])){
    //                     $data = [
    //                         "order_id"  => $order["order_id"],
    //                         "sell_price" => $quotation[$order['code']]['last_px'],
    //                         "sell_hand" => $order["hand"],
    //                         "sell_deposit" => $quotation[$order['code']]['last_px'] * $order["hand"],
    //                         "profit"    => ($quotation[$order['code']]['last_px'] - $order["price"]) * $order["hand"],
    //                         "state"     => 6,
    //                         "force_type" => 4 // 强制平仓类型；1-爆仓，2-到达止盈止损，3-非自动递延，4-递延费无法扣除
    //                     ];
    //                     $res = (new OrderLogic())->orderUpdate($data);
    //                     return $res ? true : false;
    //                 }else{
    //                     return false;
    //                 }
    //             }
    //         }
    //     }
    //     return true;
    // }
    // // 非自动递延
    // public function handleNonAuto($order)
    // {
    //     if($order['is_defer'] == 0){
    //         $quotation = (new StockLogic())->quotationBySina($order['code']);
    //         if(isset($quotation[$order['code']])){
    //             $data = [
    //                 "order_id"  => $order["order_id"],
    //                 "sell_price" => $quotation[$order['code']]['last_px'],
    //                 "sell_hand" => $order["hand"],
    //                 "sell_deposit" => $quotation[$order['code']]['last_px'] * $order["hand"],
    //                 "profit"    => ($quotation[$order['code']]['last_px'] - $order["price"]) * $order["hand"],
    //                 "state"     => 6,
    //                 "force_type" => 3 //强制平仓类型；1-爆仓，2-到达止盈止损，3-非自动递延，4-递延费无法扣除
    //             ];
    //             $res = (new OrderLogic())->orderUpdate($data);
    //             return $res ? true : false;
    //         }else{
    //             return false;
    //         }
    //     }
    //     return true;
    // }
    // // 止盈止损
    // public function handleSell($orderId)
    // {
    //     $order = (new OrderLogic())->orderById($orderId);
    //     if($order['state'] == 3){
    //         $quotation = (new StockLogic())->quotationBySina($order['code']);
    //         if(isset($quotation[$order['code']])){
    //             $lastPx = $quotation[$order['code']]['last_px']; //最新价
    //             $lossTotal = ($order['price'] - $lastPx) * $order['hand']; //损失总金额
    //             // var_dump($quotation);
    //             // var_dump($lossTotal >= $order['deposit']);
    //             // var_dump($lastPx >= $order['stop_profit_price']);
    //             // var_dump($lastPx <= $order['stop_loss_price']);die();
    //             if($lossTotal >= $order['deposit']){
    //                 // 爆仓
    //                 $data = [
    //                     "order_id"  => $order["order_id"],
    //                     "sell_price" => $lastPx,
    //                     "sell_hand" => $order["hand"],
    //                     "sell_deposit" => $lastPx * $order["hand"],
    //                     "profit"    => ($lastPx - $order["price"]) * $order["hand"],
    //                     "state"     => 6,
    //                     "force_type" => 1 // 强制平仓类型；1-爆仓，2-到达止盈止损，3-非自动递延，4-递延费无法扣除
    //                 ];
    //                 $res = (new OrderLogic())->orderUpdate($data);
    //                 if($res!==false){
    //                     $user_l = (new OrderLogic())->forceSell($order["order_id"],$lastPx);
    //                     return $user_l ? true : false;
    //                 }
    //             }else{
    //                 if($lastPx >= $order['stop_profit_price']){
    //                     // 到达止盈
    //                     //$sellPrice = $order['stop_profit_price'];
    //                     $sellPrice = $lastPx;
    //                     $data = [
    //                         "order_id"  => $order["order_id"],
    //                         "sell_price" => $sellPrice,
    //                         "sell_hand" => $order["hand"],
    //                         "sell_deposit" => $sellPrice * $order["hand"],
    //                         "profit"    => ($sellPrice - $order["price"]) * $order["hand"],
    //                         "state"     => 6,
    //                         "force_type" => 2 // 强制平仓类型；1-爆仓，2-到达止盈止损，3-非自动递延，4-递延费无法扣除
    //                     ];
    //                     $res = (new OrderLogic())->orderUpdate($data);
    //                     if($res!==false){
    //                         $user_l = (new OrderLogic())->forceSell($order["order_id"],$lastPx);
    //                         return $user_l ? true : false;
    //                     }
    //                 }elseif ($lastPx <= $order['stop_loss_price']){
    //                     // 到达止损
    //                     //$sellPrice = $order['stop_loss_price'];
    //                     $sellPrice = $lastPx;
    //                     $data = [
    //                         "order_id"  => $order["order_id"],
    //                         "sell_price" => $sellPrice,
    //                         "sell_hand" => $order["hand"],
    //                         "sell_deposit" => $sellPrice * $order["hand"],
    //                         "profit"    => ($sellPrice - $order["price"]) * $order["hand"],
    //                         "state"     => 6,
    //                         "force_type" => 2 // 强制平仓类型；1-爆仓，2-到达止盈止损，3-非自动递延，4-递延费无法扣除
    //                     ];
    //                     $res = (new OrderLogic())->orderUpdate($data);
    //                     if($res!==false){
    //                         $user_l = (new OrderLogic())->forceSell($order["order_id"],$lastPx);
    //                         return $user_l ? true : false;
    //                     }
    //                 }else{
    //                     return true;
    //                 }
    //             }
    //         }else{
    //             return false;
    //         }
    //     }
    //     return true;
    // }
}