<?php
namespace app\web\controller;

use app\web\logic\OrderLogic;
use app\web\logic\UserNoticeLogic;
use think\Request;
use app\web\logic\UserLogic;
use app\web\logic\BankLogic;
use app\web\logic\StockLogic;
use app\index\logic\RegionLogic;


class User extends Base
{
    protected $_logic;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->_logic = new UserLogic();
    }

    public function index()
    {
        $userStatic = $this->_logic->userStatic($this->user_id);
        $this->assign("user", array_merge(uInfo(), $userStatic));
        return view();
    }
    public function bankCards()
    {
        if(request()->isPost()) {
            $validate = \think\Loader::validate('Card');
            if(!$validate->scene('modify')->check(input("post."))){
                return $this->fail($validate->getError());
            }else{
                $data = input("post.");
                $res = $this->_logic->saveUserCard($this->user_id, $data);
                if($res){
                    $url = url("index/User/cards");
                    return $this->ok(['url' => $url]);
                }else{
                    return $this->fail("绑定银行卡失败，请稍后重试！");
                }
            }
        }
        $user = $this->_logic->userIncCard($this->user_id);
        $banks = (new BankLogic())->bankLists();
        $_regionLogic = new RegionLogic();
        if($user['has_one_card']){
            $provinces = $_regionLogic->regionByParentId();
            $citys = $_regionLogic->regionByParentId($user['has_one_card']['bank_province']);
        }else{
            $provinces = $_regionLogic->regionByParentId();
            $citys = $_regionLogic->regionByParentId($provinces[0]['id']);
        }
        $callback = input("?get.callback") ? base64_decode(input("get.callback")) : "";
        // var_dump($user);die();
        $this->assign("user", $user);
        $this->assign("banks", $banks);
        $this->assign("provinces", $provinces);
        $this->assign("citys", $citys);
        $this->assign("callback", $callback);
        return view();
    }
    public function payMent()
    {
        // $userStatic = $this->_logic->userStatic($this->user_id);
        // $this->assign("user", array_merge(uInfo(), $userStatic));

        $user = $this->_logic->userIncCard($this->user_id);
        $bind = $user['has_one_card'] ? 1 : 0;
        $this->assign("bind", $bind);
        $this->assign("user", $user );
        return view();
    }
    public function authPayment()
    {
        return view();
    }

    public function password()
    {
        if(request()->isPost()){
            $validate = \think\Loader::validate('User');
            if(!$validate->scene('password')->check(input("post."))){
                return $this->fail($validate->getError());
            }else{
                $data = [
                    "user_id"   => $this->user_id,
                    "password"  => input("post.newPassword/s")
                ];
                $res = $this->_logic->updateUser($data);
                if($res){
                    session("user_info", null);
                    $url = url("web/User/setting");
                    return $this->ok(['url' => $url]);
                }else{
                    return $this->fail("修改失败！");
                }
            }
        }
        return view();
    }

    public function recharge()
    {
        if(request()->isPost()){
            exit;
        }
        return view();
    }

    public function withdraw()
    {
        if(request()->isPost()){
            $validate = \think\Loader::validate('Withdraw');
            if(!$validate->scene('do')->check(input("post."))){
                return $this->fail($validate->getError());
            }else{
                $money = input("post.money/f");
                $user = $this->_logic->userIncCard($this->user_id);
                $remark = [
                    "bank" => $user['has_one_card']['bank_name'],
                    "card" => $user['has_one_card']['bank_card'],
                    "name" => $user['has_one_card']['bank_user'],
                    "addr" => $user['has_one_card']['bank_address'],
                ];
                $withdrawId = $this->_logic->createUserWithdraw($this->user_id, $money, $remark);
                if($withdrawId > 0){
                    $url = url("index/User/index");
                    return $this->ok(['url' => $url]);
                }else{
                    return $this->fail("提现申请失败！");
                }
            }
        }
        $user = $this->_logic->userIncCard($this->user_id);
        $bind = $user['has_one_card'] ? 1 : 0;
        $callback = url("index/User/withdraw");
        $redirect = url("index/User/modifyCard", ["callback" => base64_encode($callback)]);
        $this->assign("bind", $bind);
        $this->assign("user", $user);
        $this->assign("redirect", $redirect);

        //  var_dump($user);die();
        return view();

        // if(request()->isPost()){
        //     $validate = \think\Loader::validate('Withdraw');
        //     if(!$validate->scene('do')->check(input("post."))){
        //         return $this->fail($validate->getError());
        //     }else{
        //         $money = input("post.money/f");
        //         $bank = (new BankLogic())->bankByNumber(input("post.bank"));
        //         $remark = [
        //             "bank" => $bank['name'],
        //             "card" => input("post.card/s"),
        //             "name" => input("post.realname/s"),
        //             "addr" => input("post.address/s"),
        //         ];
        //         $withdrawId = $this->_logic->createUserWithdraw($this->user_id, $money, $remark);
        //         if($withdrawId > 0){
        //             $url = url("web/User/index");
        //             return $this->ok(['url' => $url]);
        //         }else{
        //             return $this->fail("提现申请失败！");
        //         }
        //     }
        // }
        // $banks = (new BankLogic())->bankLists();
        // var_dump($banks);die();
        // $this->assign("user", uInfo());
        // $this->assign("banks", $banks);
        // return view();
    }

    public function avatar()
    {
        if(request()->isPost()){
            $file = request()->file('avatar');
            if(empty($file)) return $this->fail('系统提示:非法操作');
            $path = './upload/avatar/';
            $res = $file->move($path, 'user_id_'.$this->user_id.'.png');
            if($res){
                $file_name = $res->getFilename();
                $path = trim($path, '.');
                $ret = $this->_logic->updateUser(['user_id' => $this->user_id, 'face' => $path.$file_name]);
                if($ret)
                {
                    return $this->ok(['avatar' => $path.$file_name]);
                }
                return $this->fail('系统提示:头像上传失败');

            }else{
                return $this->fail($file->getError());
            }
        }

    }
    public function nickEdit()
    {
        if(request()->isPost()){
            $data = input('post.');
            $validate = \think\Loader::validate('User');
            if(!$validate->scene('update_nick')->check(input("post."))){
                return $this->fail($validate->getError());
            }else{
                $updateArr = ['user_id' => $this->user_id];
                isset($data['nickname']) ? $updateArr['nickname'] = $data['nickname'] : '';
                $userLogic = new UserLogic();
                if($userLogic->updateUser($updateArr))
                {
                    return $this->ok();
                }
            }

            return $this->fail('系统提示:操作失败');
        }
    }

}