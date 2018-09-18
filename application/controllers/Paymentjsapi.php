<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paymentjsapi extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library("weixin/example/weixin");
    }


    public function weixinService(){
        $total_fee = $_GET['tal_fee'];
        $openId = $_GET['openId'];
        $rand_id = $_GET['randId'];
        if(!empty($openId) && !empty($rand_id)){
            $dir_pv1 = __DIR__.'/wxjsapi.log';
            file_put_contents($dir_pv1,"\n ￥openId\n".$openId);
            $out_trade_no = date('Ymdhis',time());

            echo $this->weixin->js_api_call($openId,$total_fee,$out_trade_no); //生成JSON
            $array=array(
                    'out_trade_no' => $out_trade_no,
                    'randid'       => $rand_id,
                    'nonce_str'    => '',
                    'sign'         => '',
                    'number'       => doubleval($total_fee),
                    'paytype'      => 2,
                    'created_at'   => Date('Y-m-d H:i:s',time())
            );

        }
    }


    public function weixin(){
        $dir_pv1 = __DIR__.'/wxjsapi.log';
        $rs = $this->weixin->weixinnodify();

    }
}