<?php
namespace app\index\controller;

use app\common\payment\authLlpay;
use app\index\logic\OrderLogic;
use app\index\logic\RechargeLogic;
use app\index\logic\RegionLogic;
use app\index\logic\UserNoticeLogic;
use think\Request;
use app\index\logic\UserLogic;
use app\index\logic\BankLogic;
use app\index\logic\StockLogic;
use app\index\logic\Rsa;


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

    public function setting()
    {
        $this->assign("user", uInfo());
        return view();
    }

    public function optional()
    {
        $stocks = $this->_logic->userOptional($this->user_id);
        if($stocks){
            $codes = array_column($stocks, "code");
            $lists = (new StockLogic())->simpleData($codes);
            array_filter($stocks, function(&$item) use ($lists){
                $item['quotation'] = $lists[$item['code']];
            });
        }
        $this->assign("stocks", $stocks);
        return view();
    }

    public function createOptional()
    {
        if(request()->isPost()){
            $validate = \think\Loader::validate('Optional');
            if(!$validate->scene('create')->check(input("post."))){
                return $this->fail($validate->getError());
            }else{
                $code = input("post.code/s");
                $stock = (new StockLogic())->stockByCode($code);
                $optionalId = $this->_logic->createUserOptional($this->user_id, $stock);
                if($optionalId > 0){
                    return $this->ok();
                }else{
                    return $this->fail("自选股票添加失败！");
                }
            }
        }
        return $this->fail("系统提示：非法操作！");
    }

    public function removeOptional()
    {
        if(request()->isPost()){
            $validate = \think\Loader::validate('Optional');
            if(!$validate->scene('remove')->check(input("post."))){
                return $this->fail($validate->getError());
            }else{
                $ids = input("post.ids/a");
                $res = $this->_logic->removeUserOptional($this->user_id, $ids);
                if($res){
                    return $this->ok();
                }else{
                    return $this->fail("删除失败！");
                }
            }
        }
        return $this->fail("系统提示：非法操作！");
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
                    $url = url("index/User/setting");
                    return $this->ok(['url' => $url]);
                }else{
                    return $this->fail("修改失败！");
                }
            }
        }
        return view();
    }

    public function cards()
    {
        $user = $this->_logic->userIncCard($this->user_id);
        $this->assign("user", $user);
        return view();
    }

    public function modifyCard()
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
        $this->assign("user", $user);
        $this->assign("banks", $banks);
        $this->assign("provinces", $provinces);
        $this->assign("citys", $citys);
        $this->assign("callback", $callback);
        return view();
    }
    // 充值
    public function recharge()
    {
        if(request()->isPost()){
            date_default_timezone_set("PRC");
            $validate = \think\Loader::validate('Recharge');
            if(!$validate->scene('do')->check(input("post."))){
                return $this->fail($validate->getError());
            }else{
                $amount = input("post.amount");
                $type = input("post.type", 1);  //支付通道，1-双银支付  2  GOIF

                // $status = input("post.status", 1);   // 当$type为2时有效  支付宝1 快捷2
                // $way = $type == 1 ? 2 : 1; 
                // 生成订单
                $orderSn = (new RechargeLogic())->createRechargeOrder($this->user_id, $amount, $type);
                if($orderSn){
                    $prices = $amount;
                    //支付业务中的相关订单信息。包括支付用户orderuid(选填),购买商品名goodsname(选填),订单号orderid(必填)
                    $goodsname = "充值";
                    //必填,用户订单号, 这里使用时间戳代替做测试。
                    //必填，填写登陆后台查看到的Token及identification。严禁在客户端计算key，严禁在客户端存储Token。
                    $token = "AKBI5N6ZF4SGI4V8FNK6VQII0X7VUCFI";
                    $identification = "A0XG2F3QHVMA03G1";
                    $orderid = $orderSn;
                    //必填，填写支付成功后的回调通知地址及用户转向页面
                    $return_url = "http://".$_SERVER['SERVER_NAME'];
                    $notify_url = "http://".$_SERVER['SERVER_NAME']."/notify/o2onotify";
                    $orderuid = 'username';
                    //验证key,不可以更改参数顺序。
                    $prices = $prices*100;    //注意：020支付需要的参数单元为分;
                    $types = 2;
                    $keys = md5($goodsname. $identification. $notify_url. $orderid. $orderuid. $prices. $return_url. $token. $types);
                    $returndata['price'] = $prices;
                    $returndata['type'] = $types;
                    $returndata['orderuid'] =$orderuid;
                    $returndata['goodsname'] = $goodsname;
                    $returndata['orderid'] = $orderid;
                    $returndata['identification'] = $identification;
                    $returndata['notify_url'] = $notify_url;
                    $returndata['return_url'] = $return_url;
                    $returndata['key'] = $keys;

                    echo "<form style='display:none;' id='form1' name='form1' method='post' action='https://pay.020zf.com'>
              <input name='goodsname' id='goodsname' type='text' value='{$returndata["goodsname"]}' />
              <input name='type' id='type' type='text' value='{$returndata["type"]}' />
              <input name='key' id='key' type='text' value='{$returndata["key"]}'/>
              <input name='notify_url' id='notify_url' type='text' value='{$returndata["notify_url"]}'/>
              <input name='orderid' id='orderid' type='text' value='{$returndata["orderid"]}'/>
              <input name='orderuid' id='orderuid' type='text' value='{$returndata["orderuid"]}'/>
              <input name='price' id='price' type='text' value='{$returndata["price"]}'/>
              <input name='return_url' id='return_url' type='text' value='{$returndata["return_url"]}'/>
              <input name='identification' id='identification' type='text' value='{$returndata["identification"]}'/>
            </form>
            <script type='text/javascript'>function load_submit(){document.form1.submit()}load_submit();</script>";
                }
            }
        }
        $user = $this->_logic->userIncCard($this->user_id);
        $bind = $user['has_one_card'] ? 1 : 0;
        $callback = url("index/User/recharge");
        $redirect = url("index/User/modifyCard", ["callback" => base64_encode($callback)]);
        $this->assign("bind", $bind);
        $this->assign("redirect", $redirect);
        return view();
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
    //加密算法       
    public  function encryptForDES($input,$key)   
    {         
        $size = mcrypt_get_block_size('des','ecb');  
        $input = self::pkcs5_pad($input, $size);  
        $td = mcrypt_module_open('des', '', 'ecb', '');  
        $iv = @mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_RAND);  
        @mcrypt_generic_init($td, $key, $iv);  
        $data = mcrypt_generic($td, $input);  
        mcrypt_generic_deinit($td);  
        mcrypt_module_close($td);  
        $data = base64_encode($data);  
        return $data;  
    }   
    public static  function pkcs5_pad ($text, $blocksize)   
    {         
       $pad = $blocksize - (strlen($text) % $blocksize);  
       return $text . str_repeat(chr($pad), $pad);  
    } 
        
    public static  function pkcs5_unpad($text)   
    {         
       $pad = ord($text{strlen($text)-1});  
       if ($pad > strlen($text))  
       {  
           return false;  
       }  
       if (strspn($text, chr($pad), strlen($text) - $pad) != $pad)  
       {  
          return false;  
       }  
       return substr($text, 0, -1 * $pad);  
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
        return view();
    }


    public function record($type = null)
    {
        $user = uInfo();
        $record = $this->_logic->pageUserRecords($this->user_id, $type);
        if($record['data']){
            $list = $record['data'];
            $last_page = $record['last_page'];
            $current_page = $record['current_page'];
        }else{
            $list = [];
            $last_page = 1;
            $current_page = 1;
        }
        if(request()->isPost()){
            foreach ($list as $k => $v)
            {
                $list[$k]['create_at'] = date('Y-m-d H:i', $v['create_at']);
            }
            $response = ["lists" => $list, "total_page" => $last_page, "current_page" => $current_page];
            return $this->ok($response);
        }
        $this->assign("type", isset($type) ? $type : '-1');
        $this->assign("user", $user);
        $this->assign("records", $list);
        $this->assign("totalPage", $last_page);
        $this->assign("currentPage", $current_page);
        return view();
    }

    public function noticeLists()
    {
        $userNoticeLogic = new UserNoticeLogic();
        $lists = $userNoticeLogic->getAllByUid($this->user_id);
        $this->assign('lists', $lists);
        return view();
    }
    public function noticeDetail()
    {
        $id = input('id/d');

        if($id <= 0) return $this->redirect('index/User/noticeLists');
        $userNoticeLogic = new UserNoticeLogic();
        $content = $userNoticeLogic->getContentById($this->user_id);
        $userNoticeLogic->updateBy(['id' => $id, 'read' => 2]);
        $this->assign('content', $content);
        return view();
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
     /**
     * 意见反馈
     */
    public function idea(){
        if(request()->isPost()) {
            $validate = \think\Loader::validate('User');
            if(!$validate->scene('idea')->check(input("post."))){
                return $this->fail($validate->getError());
            }else{
                $data = input("post.");
                $res = $this->_logic->saveIdea($this->user_id, $data);
                
                if($res){
                    $url = url("index/User/index");
                    return $this->ok(['url' => $url]);
                }else{
                    return $this->fail("提交失败！");
                }
            }
        }
        return view();
    }
     /**
     * 协议
     */
    public function protocol(){
        return view();
    }
    public function protocol_1(){
        return view();
    }
    public function protocol_2(){
        return view();
    }
    public function protocol_3(){
        return view();
    }
    public function protocol_4(){
        return view();
    }
    public function xianxia(){
        return view();
    }

}