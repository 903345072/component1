<?php
namespace app\web\logic;

use app\common\libraries\api51;
use app\web\model\Stock;

class StockLogic
{
    protected $_library;
    public function __construct()
    {
        $this->_library = new api51();
    }

    public function stockByCode($code)
    {
        $stock = Stock::where(["code" => $code])->find();
        return $stock ? $stock->toArray() : [];
    }

    public function simpleData($codes)
    {
        $codes = $this->_fullCodeByCodes($codes);
        $code = implode(',', $codes);
        $fields = ['name','nowPrice','diff_money','diff_rate'];
        $response = $this->_library->realtime($code, $fields);
        if($response){ 
            $_resp = [];
            if(isset($response['showapi_res_body']['indexList'])){
                $data0 = $response['showapi_res_body']['indexList'];  // 几大板块
                foreach ($data0 as $key=>$val){
                    $_resp[$val['code']] = [
                        "code"  => $val['code'],
                        "prod_name" => $val['name'],
                        "last_px"   => $val['nowPrice'],
                        "px_change" => $val['diff_money'],
                        "px_change_rate" => $val['diff_rate']
                    ];
                }
            }
            if(isset($response['showapi_res_body']['list'])){
                $data = $response['showapi_res_body']['list'];
                foreach ($data as $key=>$val){
                    $_resp[$val['code']] = [
                        "code"  => $val['code'],
                        "prod_name" => $val['name'],
                        "last_px"   => $val['nowPrice'],
                        "px_change" => $val['diff_money'],
                        "px_change_rate" => $val['diff_rate'],
                        "state" => $val['state']   // 过滤停牌
                    ];
                }
            }
            return $_resp;
        }
        return [];
    }

    public function klineData($code, $period = 6, $count = 50)
    {
        $code = $this->_fullCodeByCodes($code);
        $code = reset($code);
        if($code){
            $period = in_array($period, [6,7,8]) ? $period : 6;
            $response = $this->_library->kline($code, $period, $count);
            if($response && isset($response['data']['candle'])){
                $_resp = [];
                $data = $response['data']['candle'];
                $fields = $data['fields'];
                $kline = $data[$code];
                foreach ($kline as $item){
                    $_temp = [];
                    foreach($fields as $k=>$v){
                        $_temp[$v] = $item[$k];
                    }
                    $_resp[] = $_temp;
                }
                return $_resp;
            }
            return $response;
        }
        return [];
    }

    public function realData($code, $crc='', $min='')
    {
        $cd = $code;
        $code = $this->_fullCodeByCodes($code);
        $code = reset($code);
        //$code = $this->_handleCodes($code);
        $min_date = $min ? date("Hi", strtotime($min)) : [];
        if($code){
            try{
                $_response = [];
                $real = $this->_library->realtime($code);
                $in_out = $this->_library->in_out($code);     // 内外数据
                
                $realFields = [
                    'time',
                    'buy1_n',
                    'openPrice',
                    'todayMax',
                    'todayMin',
                    'nowPrice',
                    'tradeNum',
                    'tradeAmount',
                ];
                $realData = $real['showapi_res_body']['list'][0];
                /*foreach ($realFields as $key=>$val){
                    $_response[$val] = $realData[$val];
                }*/
                $_response['data_timestamp']        = $realData['time'];
                $_response['shares_per_hand']       = $realData['buy1_n'];
                $_response['open_px']               = $realData['openPrice'];
                $_response['high_px']               = $realData['todayMax'];
                $_response['low_px']                = $realData['todayMin'];
                $_response['last_px']               = $realData['nowPrice'];
                $_response['last_px']               = $realData['nowPrice'];
                $_response['business_amount']       = $realData['tradeNum'];
                $_response['business_balance']      = $realData['tradeAmount'];
                $_response['preclose_px']           = $realData['closePrice'];
                $_response['px_change']             = $realData['diff_money'];
                $_response['px_change_rate']        = $realData['diff_rate'];
                $_response['amplitude']             = $realData['swing'];
                if($in_out['showapi_res_body']['ret_code'] == 0){
                    $_response['business_amount_in']       = $in_out['showapi_res_body']['inTradeNum'];
                    $_response['business_amount_out']      = $in_out['showapi_res_body']['outTradeNum'];
                }
                $_response['total_shares']             = $realData['all_value'];
                $_response['pe_rate']                  = $realData['pe'];
                $_response['circulation_value']        = $realData['circulation_value'];

                $_response['bid_grp'] = [
                    $realData['buy1_n'],
                    $realData['buy1_m'],
                    $realData['buy2_n'],
                    $realData['buy2_m'],
                    $realData['buy3_n'],
                    $realData['buy3_m'],
                    $realData['buy4_n'],
                    $realData['buy4_m'],
                    $realData['buy5_n'],
                    $realData['buy5_m'],
                ];
                $_response['offer_grp'] = [
                    $realData['sell1_n'],
                    $realData['sell1_m'],
                    $realData['sell2_n'],
                    $realData['sell2_m'],
                    $realData['sell3_n'],
                    $realData['sell3_m'],
                    $realData['sell4_n'],
                    $realData['sell4_m'],
                    $realData['sell5_n'],
                    $realData['sell5_m'],
                ];
               
                $trend = $this->_library->trend($cd, $crc, $min_date);
                $trendFields = ['min_time',' last_px','avg_px','business_amount'];
                //$trendCrc  = $trend['data']['trend']['crc'][$code];
                $trendCrc    = '';
                $trendData   = $trend['showapi_res_body']['dataList'][0]['minuteList'];
                $_response['trend_crc'] = $trendCrc;
                $_response['trend'] = [];
                foreach ($trendData as $item){
                    $_response['trend'][] = [
                        'min_time' => $item['time'],
                        'last_px'  => $item['nowPrice'],
                        'avg_px'   => $item['avgPrice'],
                        'business_amount'   => $item['volume']
                    ];
                }

                return $_response;
            }catch (\Exception $e){
                return [];
            }
        }
        return [];
    }

    public function realTimeData($codes)
    {
        $codes = $this->_fullCodeByCodes($codes);
        $code = implode(',', $codes);
        $response = $this->_library->realtime($code);   // 批量数据
        $in_out = $this->_library->in_out($code);     // 内外数据
        if($response){
            $_resp = [];
            $data = $response['showapi_res_body']['list'];
            $iodate = $in_out['showapi_res_body'];
            foreach ($data as $key=>$val){
                //if($key != 'fields'){
                    $_temp = [];
                    $_temp['code'] = $val['code'];
                    $_temp['inTradeNum'] = isset($iodate['inTradeNum'])?$iodate['inTradeNum']:'';
                    $_temp['outTradeNum'] = isset($iodate['outTradeNum'])?$iodate['outTradeNum']:'';
                    foreach($val as $k=>$v){
                        if($v == 'offer_grp' || $v == 'bid_grp'){
                            $_array = explode(',', $val[$k]);
                            array_pop($_array);
                            $_temp[$k] = $_array;
                        }else{
                            $_temp[$k] = $val[$k];
                        }
                    }
                    $_resp[] = $_temp;
                //}
            }
            return $_resp;
        }
        return [];
    }

    private function _fullCodeByCodes($codes)
    {
        return Stock::where(["code" => ["IN", $codes]])->column("full_code");
    }

    private function _handleCodes($codes = [])
    {
        if(is_array($codes)){
            array_filter($codes, function(&$item){
                preg_match('/^([sh|sz]{2})(\d{6})/i', $item, $_match);
                if($_match){
                    if($_match[1] == 'sh'){
                        $item = "{$_match[2]}.SS";
                    }elseif($_match[1] == 'sz'){
                        $item = "{$_match[2]}.SZ";
                    }
                }
            });
        }elseif (!empty($codes)){
            preg_match('/^([sh|sz]{2})(\d{6})/i', $codes, $match);
            if($match){
                if($match[1] == 'sh'){
                    $codes = "{$match[2]}.SS";
                }elseif($match[1] == 'sz'){
                    $codes = "{$match[2]}.SZ";
                }
            }
        }
        return $codes;
    }
}