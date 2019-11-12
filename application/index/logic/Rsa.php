<?php
/**
 * @date 2018/8/21
 * GOIF 支付通道
 * @author Do.
 *
 */

namespace app\index\logic;

class  Rsa{

    //公钥 私钥资源
    public $pi_key;
    public $pu_key;

    //判断公钥和私钥是否可用
    public function __construct($public_key,$private_key)
    {   
        $this->pi_key =  openssl_pkey_get_private($private_key);//这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id
        $this->pu_key = openssl_pkey_get_public($public_key);//这个函数可用来判断公钥是否是可用的
        // var_dump($this->pi_key);die();
        //   print_r($this->pi_key);echo "\n";
        //   print_r($this->pu_key);echo "\n";
    }

    /**
     * 替换特殊字符
     *
     * @param $string 加密时的特殊字符
     * @return mixed|string
     */

    //加密码时把特殊符号替换成URL可以带的内容
    private function urlsafe_b64encode($string)
    {
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }

    /**
     * 将替换的特殊字符转换回去
     *
     * @param $string 转换的字符串
     * @return bool|string
     */

    //解密码时把转换后的符号替换特殊符号
    private function urlsafe_b64decode($string)
    {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }


    /**
     * RSA 1024bit 公钥加密
     *
     * @param $data string 加密的数据
     * @return mixed|string  RSA 1024 加密后的字符串
     */

    public function PublicEncrypt($data)
    {
        //openssl_public_encrypt($data,$encrypted,$this->pu_key);//公钥加密
        $crypto = '';
        //解决1024加密弊端，加密字符串长度限制117，将字符串分割成多个
        foreach (str_split($data, 117) as $chunk) {
            openssl_public_encrypt($chunk, $encryptData, $this->pu_key);
            $crypto .= $encryptData;
        }
        $encrypted = $this->urlsafe_b64encode($crypto);
        return $encrypted;
    }


    /**
     * RSA 1024bit 私钥解密
     *
     * @param $encrypted string  公钥加密的字符串
     * @return string | mixed  解密之后的数据
     */

    public function PrivateDecrypt($encrypted)
    {
        $crypto = '';
        foreach (str_split($this->urlsafe_b64decode($encrypted), 128) as $chunk) {
            openssl_private_decrypt($chunk, $decryptData, $this->pi_key);
            $crypto .= $decryptData;
        }
        //$encrypted = $this->urlsafe_b64decode($encrypted);
        //openssl_private_decrypt($encrypted,$decrypted,$this->pi_key);
        return $crypto;
    }


    /**
     * 生成签名
     *
     * @param string 签名材料  SHA1算法加密
     * @param string 签名编码（base64/hex/bin）
     * @return 签名值
     */
    public function sign($data, $code = 'base64')
    {
        $ret = false;
        if (openssl_sign($data, $ret, $this->pi_key,OPENSSL_ALGO_SHA1)) {
            $ret = $this->_encode($ret, $code);
        }
        return $ret;
    }

    /**
     * 验证签名
     *
     * @param string 签名材料
     * @param string 签名值
     * @param string 签名编码（base64/hex/bin）
     * @return bool
     */
    public function verify($data, $sign, $code = 'base64')
    {
        $ret = false;
        $sign = $this->_decode($sign, $code);
        if ($sign !== false) {
            switch (openssl_verify($data, $sign, $this->pu_key,OPENSSL_ALGO_SHA1)) {
                case 1:
                    $ret = true;
                    break;
                case 0:
                case -1:
                default:
                    $ret = false;
            }
        }
        return $ret;
    }

    /**
     * 加密签名
     *
     * @param $data 签名字符串
     * @param $code 签名类型
     * @return string
     */
    //加密签名
    private function _encode($data, $code)
    {
        switch (strtolower($code)) {
            case 'base64':
                $data = base64_encode('' . $data);
                break;
            case 'hex':
                $data = bin2hex($data);
                break;
            case 'bin':
            default:
        }
        return $data;
    }

    /**
     * 解密签名
     *
     * @param $data 解密字符穿
     * @param $code 解密类型
     * @return bool
     */

    private function _decode($data, $code)
    {
        switch (strtolower($code)) {
            case 'base64':
                $data = base64_decode($data);
                break;
            case 'hex':
                $data = $this->_hex2bin($data);
                break;
            case 'bin':
            default:
        }
        return $data;
    }


}
