<?php
namespace app\web\controller;

use think\Queue;
use think\Request;
use app\web\logic\OrderLogic as OrderLogic1;
use app\web\logic\DepositLogic;
use app\web\logic\LeverLogic;
use app\web\logic\ModeLogic;
use app\web\logic\StockLogic;
use app\index\logic\UserLogic;
use app\index\logic\OrderLogic as OrderLogic2;

class Stock extends Base
{
    protected $_logic;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->_logic = new StockLogic();
        $this->_userLogic = new UserLogic();

    }
    public function stockBuy($code = null)
    {
        self::checkUserLogin();
        if(request()->isPost()){
            $sw_start = strtotime(date('Y-m-d 09:30'));
            $sw_end = strtotime(date('Y-m-d 11:30'));
            $xw_start = strtotime(date('Y-m-d 13:00'));
            $xw_end = strtotime(date('Y-m-d 14:55'));
            $now = time();
			if($now>=$sw_start&&$now<=$sw_end||$now>=$xw_start&&$now<=$xw_end){
            }else{
                return $this->fail("交易时间为：9.30-11.30/13.00-14.55！");
            }
            $code = input("post.code/s");
            $quotation = (new StockLogic())->simpleData($code);
            if($quotation[$code]['state'] !=1){
                return $this->fail("已停牌！");
            }
            $validate = \think\Loader::validate('Stock');
            if(!$validate->scene('buy')->check(input("post."))){
                return $this->fail($validate->getError());
            }else{
                $modeId = input("post.mode/d");
                // $depositId = input("post.deposit/d");
                $leverId = input("post.lever/d");
                $price = input("post.price/f");
                $followId = input("post.follow_id/d", 0);
                $stock = $this->_logic->stockByCode($code);
                $mode = (new ModeLogic())->modeIncPluginsById($modeId);
                // $deposit = (new DepositLogic())->depositById($depositId);
                $deposit['money'] = input("post.deposit/d");
                $lever = (new LeverLogic())->leverById($leverId);
                $plugins = $mode['has_one_plugins'];
                require_once request()->root() . "../plugins/{$plugins['type']}/{$plugins['code']}.php";
                $obj = new $plugins['code'];
                $trade = $obj->getTradeInfo($price, cf("capital_usage", 95), $deposit['money'], $lever['multiple'], $mode['jiancang'], $mode['defer']);
                if($trade["hand"] <= 0){
                    return $this->fail("创建策略失败！");
                }
                if(uInfo()['account'] > $deposit['money'] + $trade["jiancang"]){
                    $holiday = explode(',', cf("holiday", ""));
                    $order = [
                        "order_sn" => date("YmdHis") . uInfo()['user_id'] . randomString(6, true),
                        "user_id" => uInfo()['user_id'],
                        "product_id" => $mode['product_id'],
                        "mode_id" => $modeId,
                        "code"  => $code,
                        "name"  => $stock['name'],
                        "full_code" => $stock['full_code'],
                        "price" => $price,
                        "hand"  => $trade["hand"],
                        "jiancang_fee" => $trade["jiancang"],
                        "defer" => $trade["defer"],
                        "free_time" => workTimestamp($mode['free'], $holiday, strtotime(date("Y-m-d 14:40", request()->time()))),
                        "is_defer" => input("post.defer/d"),
                        "deposit"   => $deposit['money'],
                        "state"     => 3, // 下单即持仓
                        "is_follow" => $followId ? 1 : 0,
                        "follow_id" => $followId,
                        "is_hedging" => 0, // 持仓单默认未对冲
                    ];
                    $orderId = (new OrderLogic1())->createOrder($order);
                    if($orderId > 0){
                        $url = url("index/Order/position");
                        // 队列
                        $smsNoticeData = $sysNoticeData = ["niurenId" => $this->user_id];
                        Queue::push('app\index\job\UserNotice@systemNotice', $sysNoticeData, null);
                        Queue::push('app\index\job\UserNotice@smsNotice', $smsNoticeData, null);
                        return $this->ok(["url" => $url]);
                    }else{
                        return $this->fail("创建策略失败！");
                    }
                }else{
                    return $this->fail("您的余额不足，请充值！");
                }
            }
        }else{
            $modes = (new ModeLogic())->productModes();
            $deposits = (new DepositLogic())->allDeposits();
            $levers = (new LeverLogic())->allLevers();
            $this->assign("modes", $modes);
            $this->assign("deposits", $deposits);
            $this->assign("levers", $levers);
            $this->assign("user", uInfo());
            $this->assign('type', 2);
            return view();
        }
    }
    // 卖出
    public function stockSell()
    {
        $field = "order_id,mode_id,order_sn,code,name,price,deposit,defer,hand,stop_loss_price,stop_profit_price,create_at";
        if(request()->isPost()){
            $orders = $this->_userLogic->pageUserOrder($this->user_id, $state = 3, $field);
            if($orders['data']){
                $codes = array_column($orders['data'], "code");
                $quotation = (new StockLogic())->simpleData($codes);
                array_filter($orders['data'], function (&$item) use ($quotation){
                    $item['last_px'] = $quotation[$item['code']]['last_px']; //现价
                    $item['market_value'] = $item['last_px'] * $item['hand']; //市值
                    $item['yield_rate'] = number_format(($item['last_px'] - $item['price']) / $item['price'] * 100, 2); //收益率
                    $item['total_pl'] = number_format(($item['last_px'] - $item['price']) * $item['hand'], 2); //盈亏
                    $item['create_at_text'] = date("Y-m-d H:i:s", $item['create_at']);
                    $item['mode_name'] = $item['belongs_to_mode']['name']; // 交易模式
                    unset($item['belongs_to_mode']); // 交易模式
                });
                $list = $orders['data'];
                $last_page = $orders['last_page'];
                $current_page = $orders['current_page'];
            }else{
                $list = [];
                $last_page= 1;
                $current_page = 1;
            }
            $response = ["orders" => $list, "total_page" => $last_page, "current_page" => $current_page];
            return $this->ok($response);
        }else{
            $capital = $this->_userCapital();
            $orders = $this->_userLogic->pageUserOrder($this->user_id, $state = 3, $field);
            // var_dump($orders);die();
            if($orders['data']){
                $codes = array_column($orders['data'], "code");
                $quotation = (new StockLogic())->simpleData($codes);
                array_filter($orders['data'], function (&$item) use ($quotation){
                    $item['last_px'] = $quotation[$item['code']]['last_px']; //现价
                    $item['market_value'] = $item['last_px'] * $item['hand']; //市值
                    $item['yield_rate'] = round(($item['last_px'] - $item['price']) / $item['price'] * 100, 2); //收益率
                    $item['total_pl'] = number_format(($item['last_px'] - $item['price']) * $item['hand'],2); //盈亏
                    $item['mode_name'] = $item['belongs_to_mode']['name']; // 交易模式
                    $item['create_at'] =  date("Y-m-d H:i:s", $item['create_at']); // 时间
                });
                $list = $orders['data'];
                $total = $orders['total'];
                $current_page = $orders['current_page'];
            }else{
                $list = [];
                $total= 1;
                $current_page = 1;
            }
            $this->assign("capital", $capital);
            $this->assign("orders", $list);
            $this->assign("total", $total);
            $this->assign("currentPage", $current_page);
            $this->assign("ord", json_encode($list));
            // var_dump($list);die();
            return view();
        }
        return view();
    }
    public function selling()
    { 
        if(request()->isPost()){
            $validate = \think\Loader::validate('Order');
            if(!$validate->scene('selling')->check(input("post."))){
                return $this->fail($validate->getError());
            }else{
                $orderId = input("post.id/d");
                $order = $this->_userLogic->userOrderById($this->user_id, $orderId, 3);
                $order = reset($order);
                if($order){
                    $quotation = (new StockLogic())->simpleData($order['code']);
                    if(isset($quotation[$order['code']]) && !empty($quotation[$order['code']] && $quotation[$order['code']]['state'] ==1)){
                        $order['last_px'] = $quotation[$order['code']]['last_px'];
                        $res = $this->_userLogic->userOrderSelling($order);
                        if($res){
                            $res1 = (new OrderLogic2())->sellOk($orderId);
                            if($res1){
                                return $this->ok();
                            }
                        }else{
                            return $this->fail("平仓申请提交失败！");
                        }
                    }else{
                        return $this->fail("平仓申请提交失败！");
                    }
                }else{
                    return $this->fail("系统提示：非法操作！");
                }
            }
        }else{
            return $this->fail("系统提示：非法操作！");
        }
    }
    // 资金详情
    private function _userCapital()
    {
        $capital = [
            "netAssets" => 0, //净资产
            "expendableFund" => 0, //可用资金
            "floatPL" => 0, //浮动盈亏
            "marketValue" => 0, //持仓市值
        ];
        $user = $this->_userLogic->userIncOrder($this->user_id, $state = 3);
        $codes = array_column($user["has_many_order"], "code");
        if($codes){
            $quotation = (new StockLogic())->simpleData($codes);
            array_filter($user["has_many_order"], function($item) use ($quotation, &$capital){
                $floatPL = ($quotation[$item['code']]['last_px'] - $item['price']) * $item['hand'];
                $marketValue = $item['hand'] * $quotation[$item['code']]['last_px'];
                $capital['floatPL'] += $floatPL;
                $capital['marketValue'] += $marketValue;
            });
        }
        $capital['expendableFund'] = $user['account']; //可用资金
        $capital['netAssets'] = $capital['expendableFund'] + $user['blocked_account'] + $capital['floatPL']; //净资产
        return $capital;
    }

    // 平仓
    public function stockHistory()
    {
        $field = "order_id,mode_id,code,name,price,sell_price,hand,sell_hand,create_at,update_at";
        if(request()->isPost()){
            $orders = $this->_userLogic->pageUserOrder($this->user_id, $state = 2, $field);
            if($orders['data']){
                array_filter($orders['data'], function (&$item){
                    $item['market_value'] = $item['sell_price'] * $item['sell_hand']; //市值
                    $item['yield_rate'] = number_format(($item['sell_price'] - $item['price']) / $item['price'] * 100, 2); //收益率
                    $item['total_pl'] = number_format(($item['sell_price'] - $item['price']) * $item['sell_hand'], 2); //盈亏
                    $item['create_at_text'] = date("Y-m-d H:i:s", $item['create_at']);
                    $item['update_at_text'] = date("Y-m-d H:i:s", $item['update_at']);
                    $item['mode_name'] = $item['belongs_to_mode']['name']; // 交易模式
                    unset($item['belongs_to_mode']); // 交易模式
                });
                $list = $orders['data'];
                $total = $orders['total'];
                $current_page = $orders['current_page'];
            }else{
                $list = [];
                $total= 1;
                $current_page = 1;
            }
            $response = ["orders" => $list, "total" => $total, "current_page" => $current_page];
            return $this->ok($response);
        }else{
            $capital = $this->_userCapital();
            $orders = $this->_userLogic->pageUserOrder($this->user_id, $state = 2, $field);
            if($orders['data']){
                array_filter($orders['data'], function (&$item){
                    $item['market_value'] = $item['sell_price'] * $item['sell_hand']; //市值
                    $item['yield_rate'] = number_format(round(($item['sell_price'] - $item['price']) / $item['price'] * 100, 2),2); //收益率
                    $item['total_pl'] =  number_format(($item['sell_price'] - $item['price']) * $item['sell_hand'],2); //盈亏
                    $item['create_at'] =  date("Y-m-d H:i:s", $item['create_at']); // 时间
                    $item['update_at'] = date("Y-m-d H:i:s", $item['update_at']);

                });
                $list = $orders['data'];
                $total = $orders['total'];
                $current_page = $orders['current_page'];
            }else{
                $list = [];
                $total= 1;
                $current_page = 1;
            }
            $this->assign("capital", $capital);
            $this->assign("orders", $list);
            $this->assign("total", $total);
            $this->assign("currentPage", $current_page);
            return view();
        }
    }
    public function stockDetail()
    {
        return view();
    }

    public function info($code = null)
    {
        $stock = $this->_logic->stockByCode($code);
        if($stock){
            $quotation = $this->_logic->realTimeData($code);
            // var_dump($quotation[0]);die();
            if(isset($quotation[0]) && !empty($quotation[0])){
                $quotation['prod_name'] = $quotation[0]['name'];
                $quotation['code'] = $quotation[0]['code'];
                $quotation['px_change'] = $quotation[0]['diff_money'];
                $quotation['last_px'] = $quotation[0]['nowPrice'];
                $quotation['px_change_rate'] = $quotation[0]['diff_rate'];
                $quotation['preclose_px'] = $quotation[0]['closePrice'];
                $quotation['open_px'] = $quotation[0]['openPrice'];
                $quotation['high_px'] = $quotation[0]['todayMax'];
                $quotation['low_px']  = $quotation[0]['todayMin'];
                $quotation['amplitude']  = $quotation[0]['swing'];
                $quotation['business_amount']  = $quotation[0]['tradeNum'];
                $quotation['business_balance']  = $quotation[0]['tradeAmount'];
                $quotation['business_amount_in']  = $quotation[0]['inTradeNum'];
                $quotation['business_amount_out']  = $quotation[0]['outTradeNum'];
                $quotation['total_shares']  = $quotation[0]['all_value'];
                $quotation['pe_rate']  = $quotation[0]['pe'];
                $quotation['circulation_value']  = $quotation[0]['circulation_value'];
                $quotation['shares_per_hand']  = 1;
                
                $quotation['bid_grp'] = [
                    $quotation[0]['buy1_n'],
                    $quotation[0]['buy1_m'],
                    $quotation[0]['buy2_n'],
                    $quotation[0]['buy2_m'],
                    $quotation[0]['buy3_n'],
                    $quotation[0]['buy3_m'],
                    $quotation[0]['buy4_n'],
                    $quotation[0]['buy4_m'],
                    $quotation[0]['buy5_n'],
                    $quotation[0]['buy5_m'],
                ];
                $quotation['offer_grp'] = [
                    $quotation[0]['sell1_n'],
                    $quotation[0]['sell1_m'],
                    $quotation[0]['sell2_n'],
                    $quotation[0]['sell2_m'],
                    $quotation[0]['sell3_n'],
                    $quotation[0]['sell3_m'],
                    $quotation[0]['sell4_n'],
                    $quotation[0]['sell4_m'],
                    $quotation[0]['sell5_n'],
                    $quotation[0]['sell5_m'],
                ];
                return $this->ok($quotation);
            }else{
                return json([]);
            }
        }else{
            return json([]);
        }
    }

    public function real()
    {
        $code = input("code");
        if($code){
            $res = $this->_logic->realData($code);
            if(request()->isPost()){
                return $this->ok($res);
            }else{
                return json($res);
            }
        }
        return json([]);
    }

    public function incReal()
    {
        $code = input("code");
        $cnc = input("cnc");
        $min = input("min");
        $res = [];
        if(checkStockTradeTime() && $code){
            $res = $this->_logic->realData($code, $cnc, $min);
        }
        if(request()->isPost()){
            return $this->ok($res);
        }else{
            return json($res);
        }
    }

    public function simple()
    {
        $code = input("code");
        if($code){
            $res = $this->_logic->simpleData($code);
            if(request()->isPost()){
                return $this->ok($res);
            }else{
                return json($res);
            }
        }
        return json([]);
    }

    public function kline()
    {
        $code = input("code");
        if($code){
            $period = input("period", 6);
            $count = input("count", 50);
            $res = $this->_logic->klineData($code, $period, $count);
            if(request()->isPost()){
                return $this->ok($res);
            }else{
                return json($res);
            }
        }
        return json([]);
    }
}