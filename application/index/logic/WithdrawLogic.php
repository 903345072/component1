<?php
namespace app\index\logic;

use app\index\model\UserWithdraw;
use app\index\model\User;
use think\Db;
class WithdrawLogic
{
    public function orderByTradeNo($tradeNo, $state = null)
    {
        $where['out_sn'] = $tradeNo;
        is_null($state) ? null : $where['state'] = $state;
        $order = UserWithdraw::where($where)->find();
        return $order ? $order->toArray() : [];
    }

    public function updateByTradeNo($tradeNo, $data)
    {
        $where = ["out_sn" => $tradeNo];
        return UserWithdraw::update($data, $where);
    }


    public function paymentnoByTradeNo($order, $data)
    {
        
        Db::startTrans();
        try{
            // 修改订单状态
            $where = ["out_sn" => $order['out_sn']];
            $hh = UserWithdraw::update($data, $where);

            // 用户余额增加
            $user = User::find($order['user_id']);
            $user->setInc("account", $order['amount']);
            // 用户资金明细增加
            $rData = [
                "type" => 5,
                "amount" => $order['amount'],
                "remark" => json_encode(['tradeNo' => $order['out_sn']]),
                "direction" => 1
            ];
            $user->hasManyRecord()->save($rData);
            Db::commit();
            return true;
        } catch (\Exception $e){
            Db::rollback();
            return false;
        }
    }



}