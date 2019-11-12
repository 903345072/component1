<?php
/**
 * Created by PhpStorm.
 * User: bruce
 * Date: 18/3/1
 * Time: 下午6:36
 */

namespace app\admin\controller;

use app\admin\logic\UserGiveLogic;
use app\admin\logic\UserLogic;
use app\admin\logic\UserIdeaLogic;
use app\admin\logic\UserWithdrawLogic;
use think\Db;
use think\Request;
class User extends Base
{
    public $userLogic;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->userLogic = new UserLogic();
    }

    public function lists()
    {
        $_res = $this->userLogic->pageUserLists(input(''));
        $this->assign("datas", $_res['lists']);
        $this->assign("pages", $_res['pages']);
        $this->assign("pageAccount", $_res['pageAccount']);
        $this->assign("totalAccount", $_res['totalAccount']);
        $this->assign("search", input(""));
        return view();
    }

    public function modify()
    {
        if(request()->isPost()) {
            $validate = \think\Loader::validate('User');
            if(!$validate->scene('modify')->check(input("post."))){
                return $this->fail($validate->getError());
            }else{
                if($this->userLogic->update(input("post."))){
                    return $this->ok();
                } else {
                    return $this->fail("修改失败！");
                }
            }
        }
        $id = input('user_id');
        $data = $this->userLogic->getOne($id);
        $this->assign('data', $data);
        $this->assign('id', $id);
        return view();
    }

    public function modifyPwd()
    {
        if(request()->isPost())
        {
            $validate = \think\Loader::validate('User');
            if(!$validate->scene('modify_pwd')->check(input("post."))){
                return $this->fail($validate->getError());
            }else{

                if($this->userLogic->update(input("post."))){
                    return $this->ok();
                } else {
                    return $this->fail("修改失败！");
                }
            }
        }
    }

    public function giveLists()
    {
        $_res = $this->userLogic->pageUserLists(input(''));

        $this->assign("datas", $_res['lists']);
        $this->assign("pages", $_res['pages']);
        $this->assign("search", input(""));
        return view();

    }
    public function giveAccount()
    {
        if(request()->isPost())
        {
            $validate = \think\Loader::validate('User');
            if(!$validate->scene('give')->check(input("post."))){
                return $this->fail($validate->getError());
            }else{

                if($this->userLogic->setInc(input("post."))){
                    return $this->ok();
                } else {
                    return $this->fail("操作失败！");
                }
            }
        };

    }

    public function giveLog()
    {
        $_res = (new UserGiveLogic())->pageUserGiveLists(input(''));

        $this->assign("datas", $_res['lists']);
        $this->assign("pages", $_res['pages']);
        $this->assign("totalAmount", $_res['totalAmount']);
        $this->assign("pageAmount", $_res['pageAmount']);
        $this->assign("search", input(""));
        return view();

    }

    public function withdrawLists()
    {
        $_res = (new UserWithdrawLogic())->pageUserWithdrawLists(input(''));
        
        foreach ($_res['hz_sum'] as $key => $value) {
            $_res['hz_sum'][$key] = $value = $value->toArray();
        }
        // var_dump($_res['lists']);die;
        // 本页
        $by_sum['amount_sum'] = array_sum(collection($_res['lists']['data'])->column("amount"));  
        $by_sum['poundage_sum'] = array_sum(collection($_res['lists']['data'])->column("poundage"));  
        $by_sum['actual_sum'] = array_sum(collection($_res['lists']['data'])->column("actual"));  
        // 全部 
        $pc_sum['amount_sum'] = array_sum(collection($_res['hz_sum'])->column("amount"));  
        $pc_sum['poundage_sum'] = array_sum(collection($_res['hz_sum'])->column("poundage"));  
        $pc_sum['actual_sum'] = array_sum(collection($_res['hz_sum'])->column("actual"));  
        $this->assign("datas", $_res['lists']);
        $this->assign("pages", $_res['pages']);
        $this->assign("pc_sum", $pc_sum);
        $this->assign("by_sum", $by_sum);
        $this->assign("search", input(""));
        return view();
    }

    // 详情
    public function withdrawDetail($id = null)
    {
        $withdraw = (new UserWithdrawLogic())->getWithdrawById($id);
        if($withdraw){
            $state = [0=>"待审核", 1=>"审核通过", 2=>"已到账", 3=>"到账失败",-1=>"审核拒绝"];
            $withdraw['remark'] = json_decode($withdraw['remark'], true);
            $withdraw['state_text'] = $state[$withdraw['state']];
            $this->assign("withdraw", $withdraw);
            return view();
        }else{
            return "非法操作！";
        }
    }
    //  反馈列表
    public function ideaLists()
    {
        $_res = (new UserIdeaLogic())->pageUserIdea(input(''));
        $this->assign("datas", $_res['lists']);
        $this->assign("pages", $_res['pages']);
        $this->assign("search", input(""));
        return view();
    }

    // 代付update 2019年8月1日11:05:11
    public function withdraw()
    {
        if(request()->isPost())
        {
            $validate = \think\Loader::validate('UserWithDraw');
            if(!$validate->scene('user_withdraw')->check(input("post."))){
                return $this->fail($validate->getError());
            }else{
                $id = input('post.id/d');
                $state = input('post.state/d');
                list($res, $msg) = (new UserWithdrawLogic())->doWithdraw($id, $state);
                if($res){
                    return $this->ok();
                } else {
                    return $this->fail($msg);
                }
            }
        }
    }
   
}