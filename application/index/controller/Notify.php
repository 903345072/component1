<?php
namespace app\index\controller;

use app\common\payment\paymentLLpay;
use app\index\logic\WithdrawLogic;
use think\Controller;
use app\index\logic\RechargeLogic;
use app\common\payment\authLlpay;
use app\index\logic\Rsa;
use think\Exception;

class Notify extends Controller
{
    public function authLLpay()
    {
        //计算得出通知验证结果
        $payment = new authLlpay();
        $llpayNotify = $payment->verifyNotify();
        @file_put_contents("./pay.log", json_encode($llpayNotify->notifyResp)."\r\n", FILE_APPEND);
        if ($llpayNotify->result) { //验证成功
            //获取连连支付的通知返回参数，可参考技术文档中服务器异步通知参数列表
            $no_order = $llpayNotify->notifyResp['no_order'];//商户订单号
            $oid_paybill = $llpayNotify->notifyResp['oid_paybill'];//连连支付单号
            $result_pay = $llpayNotify->notifyResp['result_pay'];//支付结果，SUCCESS：为支付成功
            $money_order = $llpayNotify->notifyResp['money_order'];// 支付金额
            if($result_pay == "SUCCESS"){
                //请在这里加上商户的业务逻辑程序代(更新订单状态、入账业务)
                //——请根据您的业务逻辑来编写程序——
                //payAfter($llpayNotify->notifyResp);
                $_rechargeLogic = new RechargeLogic();
                $order = $_rechargeLogic->orderByTradeNo($no_order, 0);
                if($order){
                    // 有该笔充值订单
                    $res = $_rechargeLogic->rechargeComplete($no_order, $order['amount'], $order['user_id'], $oid_paybill);
                    if(!$res){
                        @file_put_contents("./pay.log", "failed1\r\n", FILE_APPEND);
                        die("{'ret_code':'9999','ret_msg':'订单状态修改失败'}");
                    }
                }
            }
            //file_put_contents("log.txt", "异步通知 验证成功\n", FILE_APPEND);
            @file_put_contents("./pay.log", "success\r\n", FILE_APPEND);
            die("{'ret_code':'0000','ret_msg':'交易成功'}"); //请不要修改或删除
        } else {
            //file_put_contents("log.txt", "异步通知 验证失败\n", FILE_APPEND);
            @file_put_contents("./pay.log", "failed2\r\n", FILE_APPEND);
            die("{'ret_code':'9999','ret_msg':'验签失败'}");
        }
    }
    public function daifu_notify(){
        $data = request()->post();
        $clientNumber = $data['clientNumber'];
        $tranId = $data['tranId'];
        $clientOrderNumber = $data['clientOrderNumber'];
        $c_amount = $data['c_amount'];
        $state = $data['state'];
        $verifyText = $data['verifyText'];
        $sign = strtoupper(md5($clientNumber.$clientOrderNumber.$tranId.$state.'E4BD9914EC9EEF095F9E6B9FC3F74F42'));
        if ($sign == $verifyText){
            if ($state == 1){
                $_rechargeLogic = new RechargeLogic();
                $_withdrawLogic = new WithdrawLogic();
                $order = $_rechargeLogic->orderByTradeNo($clientOrderNumber, 0);  // 查询充值订单
                $order1 = $_withdrawLogic->orderByTradeNo($clientOrderNumber, 1);  //提现订单
                if ($order){   //处理充值逻辑--加钱
                    $res = $_rechargeLogic->rechargeComplete($clientOrderNumber, $c_amount, $order['user_id'], $tranId);  // 加钱，增加记录
                    if ($res){
                        return json_encode(['clientNumbe'=>$clientNumber,'tranId'=>$tranId,'isRecieved'=>'1','verifyText'=>$verifyText]);
                    }else{
                        return json_encode(['clientNumbe'=>$clientNumber,'tranId'=>$tranId,'isRecieved'=>'0','verifyText'=>$verifyText]);
                    }

                }elseif ($order1){  //处理提现逻辑--代付成功
                    $data1 = ["state" => 2];
                    $res1 = $_withdrawLogic->updateByTradeNo($clientOrderNumber, $data1);
                    if(!$res1){
                        @file_put_contents("./pay.log", "failed1\r\n", FILE_APPEND);
                        return json_encode(['clientNumbe'=>$clientNumber,'tranId'=>$tranId,'isRecieved'=>'0','verifyText'=>$verifyText]);
                    }
                    return json_encode(['clientNumbe'=>$clientNumber,'tranId'=>$tranId,'isRecieved'=>'1','verifyText'=>$verifyText]);

                }else{
                    throw new Exception('订单错误');
                }
            }else{
                throw new Exception('RESPONSECODE错误');
            }
        }else{
            throw new Exception('sign错误');
        }

    }
    // 点点支付——满盈策略
    public function notify_dd(){
        $status=$_GET['status'];
        $customerid=$_GET['customerid'];
        $sdorderno=$_GET['sdorderno'];
        $total_fee=$_GET['total_fee'];
        $paytype=$_GET['paytype'];
        $sdpayno=$_GET['sdpayno'];
        $remark=$_GET['remark'];
        $sign=$_GET['sign'];
        $userkey='443f373de056cb645e513c981f9e8b4e946fd012';
        $mysign=md5('customerid='.$customerid.'&status='.$status.'&sdpayno='.$sdpayno.'&sdorderno='.$sdorderno.'&total_fee='.$total_fee.'&paytype='.$paytype.'&'.$userkey);
        if($sign==$mysign){
            if($status=='1'){
                $_rechargeLogic = new RechargeLogic();
                $order = $_rechargeLogic->orderByTradeNo($sdorderno, 0);  // 查询充值订单
                if($order){
                    $res = $_rechargeLogic->rechargeComplete($order['trade_no'], $order['amount'], $order['user_id'], $sdpayno);  // 加钱，增加记录
                    if(!$res){
                        @file_put_contents("./pay.log", "failed1\r\n", FILE_APPEND);
                        die("{'ret_code':'9999','ret_msg':'订单状态修改失败'}");
                    }
                    echo 'success';
                }
            } else {
                echo 'fail';
            }
        } else {
            echo 'signerr';
        }
    }

    // ss支付——满盈策略
    public function notify_ss(){
        $key = "2019042320183749677144"; //获取方法：首页-个人中心-》编号/UID
        $orderNo = trim(input('orderNo')); //传入订单号
        $tradeAmount = trim(input('tradeAmount')); //收款金额
        $accountType = trim(input('accountType')); //收款类型：1转账、2好友转账、3红包、4发起收款、5吱口令转账、6扫码点单、7个人收款码、8支付宝转银行卡、9微信个码
        $tradeTime = trim(input('tradeTime')); //收款回调时间
        $token = trim(input('token')); //当前信息验签
        $appAccount = trim(input('appAccount')); //收款APP账号
        $checkToken = md5(md5($orderNo . $tradeAmount . $appAccount) . $key);
        if($token != $checkToken){
            @file_put_contents("./pay.log", "failed1\r\n", FILE_APPEND);
            exit('验证失败');
        }
            $_rechargeLogic = new RechargeLogic();
            $order = $_rechargeLogic->orderByTradeNo($orderNo, 0);  // 查询充值订单
            if($order){
                $res = $_rechargeLogic->rechargeComplete($order['trade_no'], $order['amount'], $order['user_id'], null);  // 加钱，增加记录
                if(!$res){
                    @file_put_contents("./pay.log", "failed1\r\n", FILE_APPEND);
                    die("{'ret_code':'9999','ret_msg':'订单状态修改失败'}");
                }
            }
    }

    // 什么支付——满盈策略
    public function notify_sd(){
        $params = request()->post();
        $vars = [];
        foreach ($params as $key => $value) {
            if (preg_match('/^(sign|file|_url)$/', $key)) {
                continue;
            }
            $vars[] = $key . '=' . $value;
        }
        sort($vars);
        $source = implode('&', $vars);
        $token = '5d3ea0f722644789277617'; 
        $sign = md5(md5($source) . $token);
       
        if($sign == $params['sign']){
            if($params['status'] == "success"){
                $_rechargeLogic = new RechargeLogic();
                $order = $_rechargeLogic->orderByTradeNo($params['mer_order_no'], 0);  // 查询充值订单
                if($order){
                    $res = $_rechargeLogic->rechargeComplete($order['trade_no'], $order['amount'], $order['user_id'], $params['order_no']);  // 加钱，增加记录
                    if(!$res){
                        @file_put_contents("./pay.log", "failed1\r\n", FILE_APPEND);
                        die("{'ret_code':'9999','ret_msg':'订单状态修改失败'}");
                    }
                    echo 'ok';
                }
            } else {
                echo 'fail';
            }
        } else {
            echo 'signerr';
        }
    }
    // 什么支付——满盈策略-
    public function notify_sdend(){
        $params = request()->post();
        $vars = [];
        foreach ($params as $key => $value) {
            if (preg_match('/^(sign|file|_url)$/', $key)) {
                continue;
            }
            $vars[] = $key . '=' . $value;
        }
        sort($vars);
        $source = implode('&', $vars);
        $token = '5d3ea0f722644789277617'; 
        $sign = md5(md5($source) . $token);
       
        if($sign == $params['sign']){
            if($params['status'] == "success"){
                $_withdrawLogic = new WithdrawLogic();
                $order = $_withdrawLogic->orderByTradeNo($params['order_no'], 1);  //提现订单
                if($order){
                    $data = ["state" => 2]; 
                    $res = $_withdrawLogic->updateByTradeNo($params['order_no'], $data);
                    if(!$res){
                        @file_put_contents("./pay.log", "failed1\r\n", FILE_APPEND);
                        die("{'ret_code':'9999','ret_msg':'代付订单状态修改失败'}");
                    }
                    echo 'ok';
                }
            } else {
                echo 'fail';
            }
        } else {
            echo 'signerr';
        }
    }
  
      
}