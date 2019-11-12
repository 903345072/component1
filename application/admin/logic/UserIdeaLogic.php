<?php
namespace app\admin\logic;

use app\admin\model\User;
use app\admin\model\UserIdea;
use think\Db;

class UserIdeaLogic
{

    public function pageUserIdea($filter = [], $pageSize = null)
    {
//        $where = Admin::manager();
        $where = [];
        if(isset($filter['idea_name']) && !empty($filter['idea_name'])){//用户
            $parent_ids_by_username = UserIdea::where(['idea_name' => ["LIKE", "%{$filter['idea_name']}%"]])->column('id');
            $where['id'] = ['IN', $parent_ids_by_username];
        }
        if(isset($filter['idea_mobile']) && !empty($filter['idea_mobile'])){//手机号
            $parent_ids_by_mobile = UserIdea::where(['idea_mobile' => ["LIKE", "%{$filter['idea_mobile']}%"]])->column('id');
            if(isset($parent_ids_by_username)){
                $where['id'] = ['IN', array_intersect($parent_ids_by_username, $parent_ids_by_mobile)];
            }else{
                $where['id'] = ['IN', $parent_ids_by_mobile];
            }

        }

        $pageSize = $pageSize ? : config("page_size");
        //推荐人-代理商-会员
        $lists = UserIdea::where($where)->paginate($pageSize);
        return ["lists" => $lists->toArray(), "pages" => $lists->render()];
    }
    
}