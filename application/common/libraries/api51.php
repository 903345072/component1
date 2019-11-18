<?php
namespace app\common\libraries;

class api51
{
	const APPID = '114095';
	const APP_KEY = "00d2299be1334f7ba27816344264db10";
	const REAL_REQUEST_URL   = 'http://route.showapi.com/131-46';   // 批量行情
    const KLINE_REQUEST_URL  = 'http://route.showapi.com/131-50';   // K线数据
    const TREND_REQUEST_URL  = 'http://route.showapi.com/131-49';   // 分时线数据
    const IN_OUT_REQUEST_URL = 'http://route.showapi.com/131-62';   // 内外盘数据

	public function realtime($code, $field = null){
        $paramArr = array(
        'showapi_appid'=> self::APPID,
            'stocks'=> $code,
            'needIndex'=> "1"
        //添加其他参数
        );
        $param = $this->createParam($paramArr,self::APP_KEY);
        //$response = $this->api51_curl(self::REAL_REQUEST_URL, $data, 0, self::APP_CODE);
        $url = self::REAL_REQUEST_URL.'?'.$param;
        try{
            $response = file_get_contents($url);
        }catch (\Exception $e){
        }
        if (isset($response)){
            return json_decode($response, true);
        }

    }

    public function kline($code, $period = 6, $count = 50, $type = 'offset')
    {
        switch ($period)
        {
            case 2:
                $period = 5;
                break;
            case 4:
                $period = 30;
                break;
            case 5:
                $period = 60;
                break;
            case 7:
                $period = 'week';
                $begin = '20180119';
                break;
            case 8:
                $period = 'month';
                $begin = '20131030';
                break;
            default:
                $period = 'day';
                $begin = '20181214';
        }
        $paramArr = array(
            'showapi_appid'=> self::APPID,
            'code'=> $code,
            'time'=> $period,
            'beginDay'=> $begin,
            'type'=> "bfq"
            //添加其他参数
        );
        $param = $this->createParam($paramArr,self::APP_KEY);
        $url = self::KLINE_REQUEST_URL.'?'.$param;
        $response = file_get_contents($url);
        // $data = [
        //     'prod_code' => $code,
        //     'candle_period' => $period,//K线周期	取值可以是数字1-9，表示含义如下： 1：1分钟K线 2：5分钟K线 3：15分钟K线 4：30分钟K线 5：60分钟K线 6：日K线 7：周K线 8：月K线 9：年K线
        //     'get_type ' => $type,//查找类别	offset 按偏移查找；range 按日期区间查找；必须输入其中一个值
        //     'fields' => 'open_px,high_px,low_px,close_px,business_amount,business_balance',
        //     'data_count' => $count
        // ];
        // $data = http_build_query($data);
        // $response = $this->api51_curl(self::KLINE_REQUEST_URL, $data, 0, self::APP_CODE);
        return json_decode($response, true);
    }

    public function trend($code, $crc = '', $min = '')
    {
        $paramArr = array(
            'showapi_appid' => self::APPID,
            'code'          => $code,
            'day'           => 1
            //添加其他参数
        );
        $param  = $this->createParam($paramArr,self::APP_KEY);
        $url    = self::TREND_REQUEST_URL.'?'.$param;
        $response = file_get_contents($url);
        /*$data = [
            'prod_code' => $code,
            'fields' => 'last_px,avg_px,business_amount',
            'crc' => $crc,
            'min_time' => $min,
        ];
        $data = http_build_query($data);
        $response = $this->api51_curl(self::TREND_REQUEST_URL, $data, 0, self::APP_CODE);*/
        return json_decode($response, true);
    }

    public function in_out($code)
    {
        $code = explode(',', $code);
        $paramArr = array(
            'showapi_appid'=> self::APPID,
            'code'=> $code['0']
        );
        $param  = $this->createParam($paramArr,self::APP_KEY);
        $url    = self::IN_OUT_REQUEST_URL.'?'.$param;

        try{
            $response = file_get_contents($url);
        }catch (\Exception $e){
        }
        if (isset($response)){
            return json_decode($response, 1);
        }
    }

	
	public function api51_curl($url, $data=false, $ispost=0, $appcode){
		$headers = array();
		//根据阿里云要求，定义Appcode
		array_push($headers, "Authorization:APPCODE " . $appcode);
		array_push($headers, "Content-Type".":"."application/x-www-form-urlencoded; charset=UTF-8");
  
		$httpInfo = array();
		 
		$ch = curl_init();
  		curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
		curl_setopt( $ch, CURLOPT_USERAGENT , 'api51.cn' );
		curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 300 );
		curl_setopt( $ch, CURLOPT_TIMEOUT , 300);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	    curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_FAILONERROR, false);
		if (1 == strpos("$".$url, "https://")) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		}
		if($ispost){
			 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt( $ch , CURLOPT_POST , true );
			curl_setopt( $ch , CURLOPT_POSTFIELDS , $data );
			curl_setopt( $ch , CURLOPT_URL , $url );
		}else{
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
			if($data){
				curl_setopt( $ch , CURLOPT_URL , $url.'?'.$data );
			 
			}else{
				curl_setopt( $ch , CURLOPT_URL , $url);
			}
		}
		$response = curl_exec( $ch );
		if ($response === FALSE) {
			// echo "cURL Error: " . curl_error($ch);
			return false;
		}
		$httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
		$httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
		curl_close( $ch );
		return $response;
	}
	
	//创建参数(包括签名的处理)
	public function createParam ($paramArr,$showapi_secret) {
		$paraStr = "";
		$signStr = "";
		ksort($paramArr);
		foreach ($paramArr as $key => $val) {
		if ($key != '' && $val != '') {
		$signStr .= $key.$val;
		$paraStr .= $key.'='.urlencode($val).'&';
		}
		}
		$signStr .= $showapi_secret;//排好序的参数加上secret,进行md5
		$sign = strtolower(md5($signStr));
		$paraStr .= 'showapi_sign='.$sign;//将md5后的值作为参数,便于服务器的效验
		//echo "排好序的参数:".$signStr."\r\n";
		return $paraStr;
	}

}