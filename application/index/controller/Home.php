<?php
namespace app\index\controller;

use app\index\logic\AdminLogic;
use app\index\logic\LoginLogic;
use app\index\logic\UserLogic;
use think\Controller;
use app\index\logic\SmsLogic;

class Home extends Controller
{
    public function login()
    {
        if(isLogin()){
            return $this->redirect(url("web"));
            exit;
        }else{
            if(request()->isPost()){
                $validate = \think\Loader::validate('User');
                if(!$validate->scene('login')->check(input("post."))){
                    return $this->fail($validate->getError());
                }else{
                    $username = input("post.username/s");
                    $password = input("post.password/s");
                    $userId = (new LoginLogic())->login($username, $password);
                    if(0 < $userId){ // 登录成功，$uid 为登录的 UID
                        //跳转到登录前页面
                        return $this->ok(['url' => url("index/Index/index")]);
                    } else { //登录失败
                        switch($userId) {
                            case -1: $error = '账户不存在或已禁用！'; break; //系统级别禁用
                            case -2: $error = '账户或密码错误！'; break;
                            default: $error = '未知错误！'; break; // 0-接口参数错误
                        }
                        return $this->fail($error);
                    }
                }
            }
            return view();
        }
    }

    public function register()
    {
        if(isLogin()){
            return $this->redirect(url("index/Index/index"));
            exit;
        }else{
            if(request()->isPost()){
                $validate = \think\Loader::validate('User');
                if(!$validate->scene('register')->check(input("post."))){
                    return $this->fail($validate->getError());
                }else{
                    $data = input("post.");
                    $admin = (new AdminLogic())->adminByCode($data['orgCode']);
                    if($admin){
                        $data['username'] = $data["mobile"];
                        $data['nickname'] = $data["nickname"];
                        $data['face'] = config("default_face");
                        $data['admin_id'] = $admin['admin_id'];
                        // $data['parent_id'] = input("post.pid/d", 0);
                        $userId = (new UserLogic())->createUser($data);
                        if($userId > 0){
                            $user = (new UserLogic())->userById($userId);
                            (new LoginLogic())->autoLogin($user);
                            $url = url('/index/index');
                            return $this->ok(['url' => $url]);
                        }else{
                            return $this->fail("注册失败！");
                        }
                    }else{
                        return $this->fail("机构编码不存在！");
                    }
                }
            }
            $pid = input("?pid") ? input("pid") : 0;
            $admin_id = input("?admin_id") ? input("admin_id") : 0;
            if($pid){
                $parent = (new UserLogic())->userIncAdmin($pid);
                if($parent['is_manager'] == 1){
                    $this->assign("ring_code", $parent['has_one_admin']['code']);
                    $this->assign("pid", $pid);
                }
            }elseif ($admin_id) {    // 通过代理商扫码
                $code = input("?code") ? input("code") : 0;
                $this->assign("ring_code", $code);
            }
            return view();
        }
    }

    public function forget()
    {
        if(isLogin()){
            return $this->redirect(url("index/Index/index"));
            exit;
        }else{
            if(request()->isPost()){
                $validate = \think\Loader::validate('User');
                if(!$validate->scene('forget')->check(input("post."))){
                    return $this->fail($validate->getError());
                }else{
                    $mobile = input("post.mobile");
                    $password = input("post.password/s");
                    // $member = input("post.institution/d");
                    $res = (new LoginLogic())->forgetPassword($mobile, $password);
                    if($res !== false){
                        $url = url("index/Home/login");
                        return $this->ok(["url" => $url]);
                    }else{
                        return $this->fail("密码找回失败！");
                    }
                }
            }
            $members = (new AdminLogic())->allMemberLists();
            $this->assign("members", array_values($members));
            return view();
        }
    }

    public function logout(){
        if(isLogin()){
            session("user_id", null);
            session('user_info', null);
            session('user_auth', null);
            session('user_auth_sign', null);
            session('[destroy]');
            return $this->redirect(url('index/Home/login'));
        } else {
            return $this->redirect(url('index/Home/login'));
        }
    }

    // 短信接口
    public function captcha()
    {
        if(request()->isPost()){
            $validate = \think\Loader::validate('User');
            if(!$validate->scene('captcha')->check(input("post."))){
                return $this->fail($validate->getError());
            }else{
                $mobile = input("post.mobile/s");
                $act = input("post.act/s");
                $ip = str_replace('.', '_', isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null);
                $sessKey = "ip_{$ip}_{$mobile}_{$act}";
                if (session($sessKey) && session($sessKey) >= time()) {
                    return $this->fail("短信已发送请在60秒后再次点击发送！");
                }
                list($res, $code) = (new SmsLogic())->send($mobile, $act);
                if($res){
                    session($sessKey, time()+60);
                    return $this->ok();
                }else{
                    return $this->fail("发送失败{$code}！");
                }
            }
        }else{
            return $this->fail("非法操作！");
        }
    }
}