<?php
namespace app\index\controller;

use think\Queue;
use think\Request;
use app\index\logic\OrderLogic;
use app\index\logic\DepositLogic;
use app\index\logic\LeverLogic;
use app\index\logic\ModeLogic;
use app\index\logic\StockLogic;

class Stock extends Base
{
    protected $_logic;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->_logic = new StockLogic();
    }

    public function stockBuy($code = null)
    {
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
                        "order_sn" => createStrategySn(),
                        "user_id" => $this->user_id,
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
                        // "stop_profit_price" => input("post.profit/f"),
                        // "stop_profit_point" => round((input("post.profit/f") - $price) / $price * 100, 2),
                        // "stop_loss_price" => input("post.loss/f"),
                        // "stop_loss_point" => round(($price - input("post.loss/f")) / $price * 100, 2),
                        "deposit"   => $deposit['money'],
                        "state"     => 3, // 下单即持仓
                        "is_follow" => $followId ? 1 : 0,
                        "follow_id" => $followId,
                        "is_hedging" => 0, // 持仓单默认未对冲
                    ];
                    $orderId = (new OrderLogic())->createOrder($order);
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
            $stock = $this->_logic->stockByCode($code);
            if($stock){
                $quotation = $this->_logic->quotationBySina($code);
                if(isset($quotation[$code]) && !empty($quotation[$code])){
                    $modes = (new ModeLogic())->productModes();
                    $deposits = (new DepositLogic())->allDeposits();
                    $levers = (new LeverLogic())->allLevers();
                    $this->assign("stock", $quotation[$code]);
                    $this->assign("modes", $modes);
                    $this->assign("deposits", $deposits);
                    $this->assign("levers", $levers);
                    $this->assign("user", uInfo());
                    $this->assign("usage", cf('capital_usage', 95));
                    $this->assign("follow_id", input("?follow_id") ? input("follow_id") : 0);
                    // var_dump($deposits[]);
                    // die();
                    return view('buy');
                }else{
                    return view('public/error');
                }
            }else{
                return view('public/error');
            }
        }
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
                $this->assign("quotation", $quotation);
                return view();
            }else{
                return view('public/error');
            }
        }else{
            return view('public/error');
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
    // k线实时
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