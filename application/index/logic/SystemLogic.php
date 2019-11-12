<?php
namespace app\index\logic;

use app\index\model\System;
use think\Db;

class SystemLogic
{
    public function getNotice($where=[])
    {
        $filter = [];
        if(isset($where['alias'])) $filter['alias'] = $where['alias'];
        //获取模块
        $lists = System::where($filter)->find();
        return $lists;
    }
}