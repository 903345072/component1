<?php
namespace app\admin\logic;

use app\admin\model\Admin;
use app\admin\model\User;
use app\admin\logic\BankLogic;
use app\admin\model\UserWithdraw;
use app\common\payment\paymentLLpay;
use think\Db;

class UserWithdrawLogic
{
    public function getWithdrawById($id)
    {
        $withdraw = UserWithdraw::with("hasOneUser,hasOneAdmin")->find($id);
        return $withdraw ? $withdraw->toArray() : [];
    }

    public function pageUserWithdrawLists($filter = [], $pageSize = null)
    {
        $myUserIds = Admin::userIds();
        $myUserIds ? $where["user_id"] = ["IN", $myUserIds] : $where = [];
        if(isset($filter['username']) && !empty($filter['username'])){//用户
            $parent_ids_by_username = User::where(['username' => ["LIKE", "%{$filter['username']}%"]])->column('user_id');
            $where['user_id'] = ['IN', $parent_ids_by_username];
        }

        if(isset($filter['mobile']) && !empty($filter['mobile'])){//用户
            $parent_ids_by_mobile = User::where(['mobile' => ["LIKE", "%{$filter['mobile']}%"]])->column('user_id');
            if(isset($parent_ids_by_username)){
                $where['user_id'] = ['IN', array_intersect($parent_ids_by_username, $parent_ids_by_mobile)];
            }else{
                $where['user_id'] = ['IN', $parent_ids_by_mobile];
            }
        }

        if(isset($filter['state']) && is_numeric($filter['state']) && in_array($filter['state'], [0,1,2,3,-1])){//状态
            $where['state'] = $filter['state'];
        }

        $pageSize = $pageSize ? : config("page_size");
        //推荐人-代理商-会员
        // $totalMoney = UserWithdraw::hasWhere("hasOneUserRecharge",[])->where($where)->sum("actual");
        // var_dump($totalMoney);
        // die();
        $lists = UserWithdraw::with(['hasOneUser', 'hasOneAdmin',])
            ->where($where)
            ->order("create_at DESC")
            ->paginate($pageSize, false, ['query'=>request()->param()]);
        $hz_sum = UserWithdraw::with(['hasOneUser', 'hasOneAdmin',])
            ->where($where)
            ->select();
        return ["lists" => $lists->toArray(), "pages" => $lists->render(),"hz_sum"=>$hz_sum];
    }

    public function withdrawById($id)
    {
        $withdraw = UserWithdraw::find($id);
        return $withdraw ? $withdraw->toArray() : [];
    }

    public function doWithdraw($id, $state)
    {
        Db::startTrans();
        try{
            $withdraw = UserWithdraw::find($id);
            // var_dump($withdraw);
            if($state == 1){
                // 审核通过
                // 代付接口
                
            }elseif($state == -1){
                // 审核拒绝
                // 订单状态更改
                $data = [
                    "id" => $id,
                    "state" => $state,
                    "actual" => 0,
                    "update_by" => isLogin()
                ];
                UserWithdraw::update($data);
                // 用户余额回退
                $user = User::find($withdraw->user_id);
                $user->setInc("account", $withdraw->amount);
                // 资金明细
                $rData = [
                    "type" => 6,
                    "amount" => $withdraw->amount,
                    "remark" => json_encode(['tradeNo' => $withdraw->out_sn]),
                    "direction" => 1
                ];
                $user->hasManyRecord()->save($rData);
            }
            Db::commit();
            return [true, '操作成功！'];
        }catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            return [false, '系统提示：异常错误！'];
        }
    }
  
    public function postman($url, $data) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

}