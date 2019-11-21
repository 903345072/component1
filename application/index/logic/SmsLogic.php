<?php
namespace app\index\logic;

use app\common\libraries\Sms;

class SmsLogic
{
    protected $smsLib;
    public function __construct()
    {
        $this->smsLib = new Sms();
    }

    public function send($mobile, $act = "register")
    {
        $code = randomString($length = 4, $num = true);
        /*return $this->smsLib->send($mobile, $code, $act);*/
		//创蓝接口参数
		// $postArr = array (
		// 	'account'  =>  'N346500_N5657515',
		// 	'password' => 'FJLnXjqWMO9b87',
		// 	'msg' => urlencode("【涨赢策略】您好，您的验证码".$code),
		// 	'phone' => $mobile,
		// 	'report' => 'true'
		// );
		// 25962  修改密码
		$postArr = array (
			'accesskey'  => 'YzEnar5M55RtMZB3',
			'secret' => '87rJ6G8SkhThrzPlct8S1uiXVyaY0Vfn',
			'sign' => '139505',
			// 'templateId' => $act=='register'?'25950':'25962',
			'mobile' =>  $mobile,
			'content' => $code
		);
		if($act == "register"){		// 注册
			$postArr['templateId'] = '25950';
		}else if($act == "forget"){		// 修改密码
			$postArr['templateId'] = '25962';
		}else if($act == "withdraw"){		// 提现
			$postArr['templateId'] = '25950';
		}else if($act == "manager"){		// 申请经纪人
			$postArr['templateId'] = '25950';
		}
        
		$result = $this->curlPost( 'http://api.1cloudsp.com/api/v2/single_send', $postArr);

		if(!is_null(json_decode($result))){	
			$output=json_decode($result,true);
			if(isset($output['code'])  && $output['code']=='0'){
				$sessKey = "{$mobile}_{$act}";
				session($sessKey, $code);
				return array(true,$output['code']);
			}else{
				//echo $output['errorMsg'];
				return array(false,$output['errorMsg']);
			}
		}else{
				return array(false,$output['errorMsg']);
		}
		//var_dump($postArr);die();
		return $result;
    }

    public function verify($mobile, $code, $act = "register")
    {
        $sessKey = "{$mobile}_{$act}";
        $sessCode = session($sessKey);
        if($code == $sessCode){
            session($sessKey, null);
            return true;
        }
        return false;
    }
	
	/**
	 * 通过CURL发送HTTP请求
	 * @param string $url  //请求URL
	 * @param array $postFields //请求参数 
	 * @return mixed
	 *  
	 */
	private function curlPost($url,$postFields){
		$postFields = json_encode($postFields);
		
		$ch = curl_init ();
		curl_setopt( $ch, CURLOPT_URL, $url ); 
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json; charset=utf-8'   //json版本需要填写  Content-Type: application/json;
			)
		);
		curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4); 
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_POST, 1 );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt( $ch, CURLOPT_TIMEOUT,60); 
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
		$ret = curl_exec ( $ch );
        if (false == $ret) {
            $result = curl_error(  $ch);
        } else {
            $rsp = curl_getinfo( $ch, CURLINFO_HTTP_CODE);
            if (200 != $rsp) {
                $result = "请求状态 ". $rsp . " " . curl_error($ch);
            } else {
                $result = $ret;
            }
        }
		curl_close ( $ch );
		return $result;
	}
}