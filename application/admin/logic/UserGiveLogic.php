<?php
namespace app\admin\logic;

use app\admin\model\User;
use app\admin\model\Admin;
use app\admin\model\UserGive;
use think\Db;

class UserGiveLogic
{

    public function pageUserGiveLists($filter = [], $pageSize = null)
    {
        $where = [];
        $where1 = Admin::manager();
        $user_ids = User::where($where1)->column('user_id');
        $user_ids ? $where['user_id'] = ['IN', $user_ids]:$where['user_id'] = -1;
        if(isset($filter['username']) && !empty($filter['username'])){//用户
            $parent_ids_by_username = User::where(['username' => ["LIKE", "%{$filter['username']}%"],'user_id' => ['IN', $user_ids]])->column('user_id');
            $where['user_id'] = ['IN', $parent_ids_by_username];
        }
        if(isset($filter['mobile']) && !empty($filter['mobile'])){//用户
            $parent_ids_by_mobile = User::where(['mobile' => ["LIKE", "%{$filter['mobile']}%"],'user_id' => ['IN', $user_ids]])->column('user_id');
            if(isset($parent_ids_by_username)){
                $where['user_id'] = ['IN', array_intersect($parent_ids_by_username, $parent_ids_by_mobile)];
            }else{
                $where['user_id'] = ['IN', $parent_ids_by_mobile];
            }

        }
        // 代理商
        if(isset($filter['ring']) && !empty($filter['ring'])){
            $_ring = trim($filter['ring']);
            $_where = ["username" => ["LIKE", "%{$_ring}%"]];
            $adminIds = Admin::where($_where)->column("admin_id");
            $userIds = User::where(["admin_id" => ["IN", $adminIds],'user_id' => ['IN', $user_ids]])->column("user_id");
            $where["user_id"] = ["IN", $userIds];

        }
        // 会员
        if(isset($filter['member']) && !empty($filter['member'])){
            $_member = trim($filter['member']);
            $_where = ["username" => ["LIKE", "%{$_member}%"]];
            $memberAdminIds = Admin::where($_where)->column("admin_id") ? : [-1];
            $ringAdminIds = Admin::where(["pid" => ["IN", $memberAdminIds]])->column("admin_id") ? : [-1];
            $adminIds = array_unique(array_merge($memberAdminIds, $ringAdminIds));
            $adminIds = $adminIds ? : [-1];
            $userIds = User::where(["admin_id" => ["IN", $adminIds],'user_id' => ['IN', $user_ids]])->column("user_id");
            if($user_ids){
                $userIds = array_intersect($userIds, $user_ids);
            }
            $where["user_id"] = ["IN", $userIds];
        }
        // 提交时间
        if(isset($filter['create_begin']) || isset($filter['create_end'])){
            if(!empty($filter['create_begin']) && !empty($filter['create_end'])){
                $_start = strtotime($filter['create_begin']);
                $_end = strtotime($filter['create_end']);
                $where['create_at'] = ["BETWEEN", [$_start, $_end]];
            }elseif(!empty($filter['create_begin'])){
                $_start = strtotime($filter['create_begin']);
                $where['create_at'] = ["EGT", $_start];
            }elseif(!empty($filter['create_end'])){
                $_end = strtotime($filter['create_end']);
                $where['create_at'] = ["ELT", $_end];
            }
        }
        $pageSize = $pageSize ? : config("page_size");
        $totalAmount = UserGive::with(['hasOneUser'])->where($where)->sum("amount");
        //推荐人-代理商-会员
        $lists = UserGive::with(['hasOneUser'])
            ->where($where)
            ->order("create_at desc")
            ->paginate($pageSize, false, ['query'=>request()->param()]);
        $jj =  $lists->toArray();
        // 分页总金额
        $pageAmount = array_sum(collection($jj['data'])->column("amount"));
        return ["lists" => $lists->toArray(),"pageAmount" => $pageAmount,"totalAmount" => $totalAmount, "pages" => $lists->render()];
    }


}