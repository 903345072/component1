<?php
namespace app\index\controller;

use app\index\logic\OrderLogic;
use app\index\logic\RegionLogic;
use app\index\logic\StockLogic;
use app\index\logic\SystemLogic;
use app\index\logic\UserFollowLogic;
use app\index\logic\UserLogic;
use app\index\logic\UserNoticeLogic;
use think\Request;

class Index extends Base
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
    }

    public function index()
    {
        $userLogic = new UserLogic();
        $orderLogic = new OrderLogic();
        $userFollowLogic = new UserFollowLogic();
        $userNoticeLogic = new UserNoticeLogic();

        $lists = [];
        $stocks = $userLogic->userOptional($this->user_id);

        if($stocks){

            $codes = array_column($stocks, 'code');
            $lists = (new StockLogic())->simpleData($codes);
            array_filter($stocks, function(&$item) use ($lists){
                $item['quotation'] = isset($lists[$item['code']]) ? $lists[$item['code']] : 0;
            });
        }
        // 2019年3月20日11:07:33
        // $bestUserList =  $userLogic->getAllBy(['is_niuren' => 1]);
        $bestUserList =  $userLogic->getAllBy();
        foreach($bestUserList as $k => $v)
        {
            $bestUserList[$k] = array_merge($v, $userLogic->userDetail($v['user_id'], ['state' => 2]));//抛出
        }
        $bestUserList = collection($bestUserList)->sort(function ($a, $b){
            return $b['strategy_yield'] - $a['strategy_yield'];
        })->slice(0,5)->toArray();//排序
        // var_dump($bestUserList);die();
//        $bestUserList = collection($bestUserList)->sort(function($a,$b)
//        {
//            if ($a['strategy_yield']==$b['strategy_yield']) return 0;
//            return ($a['strategy_yield']>$b['strategy_yield'])?-1:1;
//        })->toArray();//排序

        $followIds = $userFollowLogic->getFollowIdByUid($this->user_id);
        // $bestStrategyList =  $orderLogic->getAllBy(['state' => 3]);
        // $codes = $orderLogic->getCodesBy(['state' => 3]);//持仓
        // $codeInfo = [];
        // if($codes){
        //     $codeInfo = (new StockLogic())->simpleData($codes);
        // }
        // foreach($bestStrategyList as $k => $v)
        // {

        //     $sell_price = isset($codeInfo[$v['code']]['last_px']) ? $codeInfo[$v['code']]['last_px'] : $v['price'];
        //     $bestStrategyList[$k]['strategy_yield'] = round(($sell_price-$v['price'])/$v['price']*100, 2);
        //     $bestStrategyList[$k]['profit'] = round(($sell_price-$v['price'])*$v['hand'], 2);

        // }

        // $bestStrategyList = collection($bestStrategyList)->sort(function ($a, $b){
        //     return $b['strategy_yield'] - $a['strategy_yield'];
        // })->slice(0,5)->toArray();//排序
        $userNotice = $userNoticeLogic->getAllBy(['user_id' => $this->user_id, 'read' => 1]);
        $userNotice = count($userNotice);
        // 获取公告
        $notice = (new SystemLogic())->getNotice(['alias' => 'service_notice']);

        // $host = "http://api.cj.le61.cn";
        // $path = "/kuaixun2/newest";
        // $method = "GET";
        // $appcode = "27555d6901004b998efaa2aa1bddda32";
        // $headers = array();
        // array_push($headers, "Authorization:APPCODE " . $appcode);
        // // $querys = "lastOutId=10&size=20";
        // $bodys = "";
        // $url = $host . $path;

        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        // curl_setopt($curl, CURLOPT_URL, $url);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($curl, CURLOPT_FAILONERROR, false);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_HEADER, true);
        // if (1 == strpos("$".$host, "https://"))
        // {
        //     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        // }
        // var_dump(curl_exec($curl));die();

        $this->assign('bestUserList', $bestUserList);
        $this->assign('bestStrategyList', null);
        $this->assign('followIds', $followIds);
        $this->assign('userNotice', $userNotice);
        $this->assign("stocks", $stocks);
        $this->assign("lists", $lists);
        $this->assign("notice", $notice);
        return view();
    }

    public function getRegion()
    {
        if(request()->isPost()){
            $id = input("post.id", null);
            if(!is_null($id)){
                $citys = (new RegionLogic())->regionByParentId($id);
                return $this->ok($citys);
            }else {
                return $this->fail("非法操作");
            }
        }
        return $this->fail("非法操作");
    }
}
