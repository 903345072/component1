<?php
/**
 * 连连支付代付
 */

namespace app\common\payment;

use llpay\payment\notify\LLpayNotify as paymentLLpayNotify;
use llpay\payment\pay\LLpaySubmit as paymentLLpaySubmit;

class paymentLLpay
{
    protected $config;
    protected $notifyUrl;
    public function __construct()
    {
        $this->config = config("llpay.llpay_wap_config");
        $this->notifyUrl = url("index/Notify/payment", "", true, true);
    }

    public function payment($withdraw)
    {        
        $ver="1.00";                                    // 版本号
        $amt=$withdraw['amount']*100;                  // 单位：分（单笔最少 3 元）
        $cityno="1000";                                 // 城市代码
        $entseq="test";                                 // 填写后，系统体现在交易查询中
        $bankno=$withdraw['bankno'];                    // 总行代码
        $merdt=date('Ymd');                             // 请求日期
        $accntno=$withdraw['card'];                     // 账号（银行卡）
        $orderno=$withdraw['tradeNo'];                  // 请求流水号
        $branchnm=$withdraw['addr'];                    // 支行名称
        $accntnm=$withdraw['name'];                     // 账户名称
        $mobile=$withdraw['mobile'];                    // 短信通知时使用
        $memo="备注";
        $mchntcd="0005210F2230507";                     // 商户号   0005210F2230507
        $mchntkey="gq4ql9657xf9k46hsm07f3vm3yqm2ms8";   // 代付秘钥  gq4ql9657xf9k46hsm07f3vm3yqm2ms8
        $reqtype="payforreq";                           // 请求类型  
        
        
        $xml="<?xml version='1.0' encoding='utf-8' standalone='yes'?><payforreq><ver>".$ver."</ver><merdt>".$merdt."</merdt><orderno>".$orderno."</orderno><bankno>".$bankno."</bankno><cityno>".$cityno."</cityno><accntno>".$accntno."</accntno><accntnm>".$accntnm."</accntnm><branchnm>".$branchnm."</branchnm><amt>".$amt."</amt><mobile>".$mobile."</mobile><entseq>".$entseq."</entseq><memo>".$memo."</memo></payforreq>";
        
        // echo $xml;
        // echo "\n";
        $macsource=$mchntcd."|".$mchntkey."|".$reqtype."|".$xml;
        // echo $xml;
        $mac=md5($macsource);
        $mac=strtoupper($mac);
        // echo $mac;
        $list=array("merid"=>$mchntcd,"reqtype"=>$reqtype,"xml"=>$xml,"mac"=>$mac);
        $url="https://fht-api.fuioupay.com/req.do";
        // $url="https://fht-test.fuioupay.com/fuMer/req.do";
        // echo "\n";
        $query = http_build_query($list);
        $options = array(
            'http' => array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                            "Content-Length: ".strlen($query)."\r\n".
                            "User-Agent:MyAgent/1.0\r\n",
                'method'  => "POST",
                'content' => $query,
            ),
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context, -1, 40000);
        // var_dump($result);
        return $this->xmlToArray($result);  
     
    }
    function xmlToArray($xml)
    {
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $values;
    }
    public function verifyNotify()
    {
        $llpayNotify = new paymentLLpayNotify($this->config);
        $llpayNotify->verifyNotify();
        return $llpayNotify;
    }
}