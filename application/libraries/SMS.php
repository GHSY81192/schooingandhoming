<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* $this->load->library('sms');
* $code = $this->sms->send_code('13511112222');
**/
class SMS {

    const APIKEY = 'cd57e27842e8d50b29568bbf80991b27';
    private $ch;

    public function __construct() {
        header('Content-Type:text/html;charset=utf-8');
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, array('Accept:text/plain;charset=utf-8', 'Content-Type:application/x-www-form-urlencoded','charset=utf-8'));
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($this->ch, CURLOPT_POST, 1);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
    }

    private function get_random_code($length) {
        $min = pow(10 , ($length - 1));
        $max = pow(10, $length) - 1;
        return rand($min, $max);
    }

    //发送验证码
    public function send_code($phone) {
        $code = $this->get_random_code(4);
        $data = array(
                'tpl_id' => '1632828',
                'tpl_value' => ('#code#').'='.urlencode($code),
                'apikey' => self::APIKEY,
                'mobile' => $phone
                );
        curl_setopt ($this->ch, CURLOPT_URL, 'https://sms.yunpian.com/v1/sms/tpl_send.json');
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $json_data = curl_exec($this->ch);
        curl_close($this->ch);
        $array = json_decode($json_data,true);
        return $code;
    }

    /*
     * 发送支付成功通知
     * $phone:手机号
     * $order:SH开头的订单号
     * $money:付款金额
    */
    public function send_success_pay($phone,$order,$money){
        $data = array(
                'apikey' => self::APIKEY,
                'mobile' => $phone,
                'tpl_id' => '1833374',
                'tpl_value' => ("#order#")."=".urlencode($order)."&".("#money#")."=".urlencode($money),
        );
        curl_setopt ($this->ch, CURLOPT_URL, 'https://sms.yunpian.com/v1/sms/tpl_send.json');
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $json_data = curl_exec($this->ch);
        curl_close($this->ch);
        $array = json_decode($json_data,true);
        return $array;
    }



}