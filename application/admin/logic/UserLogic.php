<?php
namespace app\admin\logic;

use app\admin\model\User;
use app\admin\model\Admin;
use app\admin\model\UserGive;
use think\Db;

class UserLogic
{

    public function pageUserLists($filter = [], $pageSize = null)
    {
        $where = Admin::manager();
        // var_dump($where);die();
        $where01 = $where;
        // 登录名
        if(isset($filter['username']) && !empty($filter['username'])){
            $where["username"] = ["LIKE", "%{$filter['username']}%"];
        }
        // 昵称
        if(isset($filter['nickname']) && !empty($filter['nickname'])){
            $where["nickname"] = ["LIKE", "%{$filter['nickname']}%"];
        }
        // 手机号
        if(isset($filter['mobile']) && !empty($filter['mobile'])){
            $where["mobile"] = $filter['mobile'];
        }

        // 状态
        if(isset($filter['state']) && is_numeric($filter['state']) && in_array($filter['state'], [0,1])){
            $where["state"] = $filter['state'];
        }
        // 上级会员
        if(isset($filter['admin_parent_username']) && !empty($filter['admin_parent_username'])){
            $_where = [
                "username" => ["LIKE", "%{$filter['admin_parent_username']}%"],
                "role" => Admin::MEMBER_ROLE_ID
            ];
            $_where = array_merge($_where, $where01);
            $memAdminIds = Admin::where($_where)->column("admin_id");
            //会员下代理商
            $parents = Admin::where(["pid" => ['in', $memAdminIds]])->column("admin_id");
            $memAdminIds = array_merge($parents, $memAdminIds);
            $where["admin_id"] = ["IN", $memAdminIds];
        }

        //上级代理商
        if(isset($filter['admin_username']) && !empty($filter['admin_username'])){
            $_where = [
                "username" => ["LIKE", "%{$filter['admin_username']}%"],
                "role" => Admin::RING_ROLE_ID
            ];
            $_where = array_merge($_where, $where01);
            $parents = Admin::where($_where)->column("admin_id");
            $where["admin_id"] = ["IN", $parents];
            if(isset($memAdminIds)){
                $parents = array_intersect($parents, $memAdminIds);
                $where["admin_id"] = ["IN", $parents];
            }

        }

        if(isset($filter['parent_username']) && !empty($filter['parent_username'])){//推荐人
            $parent_ids = User::where(['username' => ["LIKE", "%{$filter['parent_username']}%"]])->column('user_id');
            $where['parent_id'] = ['IN', $parent_ids];
        }

        $pageSize = $pageSize ? : config("page_size");
        // 总金额
        $totalAccount = User::with(["hasOneParent", "hasOneAdmin", "hasOneAdmin.hasOneParent"])->where($where)->sum("account");
        //推荐人-代理商-会员
        $lists = User::with(["hasOneParent", "hasOneAdmin", "hasOneAdmin.hasOneParent"])
                ->where($where)
                ->order("account DESC")
                ->paginate($pageSize, false, ['query'=>request()->param()]);
        $jj =  $lists->toArray();
        // 分页总金额
        $pageAccount = array_sum(collection($jj['data'])->column("account"));
        return ["lists" => $lists->toArray(),"pageAccount" => $pageAccount,"totalAccount" => $totalAccount,"pages" => $lists->render()];
    }
    public function getOne($id)
    {
        $data = User::where(['user_id' => $id])->find();
        return $data->toArray();
    }
    public function update($where=[])
    {
        return User::update($where);
    }
    public function setInc($data)
    {

        if(isset($data['user_id']) && isset($data['number']))
        {
            // 启动事务
            Db::startTrans();
            try{
                User::where(['user_id' => $data['user_id']])->setInc('account', $data['number']);
                UserGive::create([
                    'user_id'   => $data['user_id'],
                    'amount'    => $data['number'],
                    'create_at' => time(),
                    'create_by' => isLogin()
                ]);
                // 提交事务
                Db::commit();
                return true;
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
                return false;
            }
        }
        return false;

    }

}