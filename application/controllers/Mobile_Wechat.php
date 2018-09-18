<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mobile_Wechat extends CI_Controller {



    public function login(){
        //获取weixin_id,redicit_url 那边设置session
        $this->load->helper('url');
        $retUrl = $this->input->get('retUrl',true);
        if (strstr('/index.php/', $retUrl)) {
            $retUrl = str_replace('/index.php/', '', $retUrl);
        }
        $redict_url = urlencode('http://www.schoolingandhoming.com//weixin/getUserInfoByCodeOnCouponActivity?retUrl='.$retUrl);
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxbda36f251f81ca3e&redirect_uri='.$redict_url.'&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect';
        redirect($url);exit;
    }


    /*微信浏览器调用支付*/
    public function jssdkpay(){
        $is_wx = $this->_is_weixin();
        if(!$is_wx){
            echo '<h1 style="font-size: 4em">请在微信客户端打开!</h1>';
            exit;
        }

        ini_set('date.timezone','Asia/Shanghai');
        //error_reporting(E_ERROR);

        require_once APPPATH.'third_party/WxpayAPI_php_v3/lib/WxPay.Api.php';

        require_once APPPATH."third_party/WxpayAPI_php_v3/example/WxPay.JsApiPay.php";

        require_once APPPATH.'third_party/WxpayAPI_php_v3/example/log.php';

        //初始化日志
        $logHandler= new CLogFileHandler(APPPATH."third_party/WxpayAPI_php_v3/logs/".date('Y-m-d').'.log');
        $log = Log::Init($logHandler, 15);


        $data1['order_id'] = trim($_POST['WIDout_trade_no']);
        $data1['subject_id'] = trim($_POST['lessonId']);//课程id
        $data1['subject'] = trim($_POST['WIDsubject']);//课程名称
        $data1['taocan'] = trim($_POST['WIDbody']);//选择套餐
        $data1['price'] = trim($_POST['WIDtotal_amount']);//付款金额
        $data['number'] = trim($_POST['number']);//购买数量
        $xw_price = $data1['price']*100;
        $data1['customer_name'] = trim($_POST['name']);//客户姓名
        $data1['customer_phone'] = trim($_POST['phone']);//客户电话
        $data1['customer_message'] = trim($_POST['message']);//客户留言
        $data1['user_id'] = $this->session->user_id;//用户id
        $data1['payment'] = $this->input->post('payment',true);//支付方式
        $data1['is_pay'] = 1;//是否支付
        $data1['classtime'] = $this->input->post('classtime',true);//授课时间
        $res = $this->insert($this->_order,$data1);

        //①、获取用户openid
        $tools = new JsApiPay();
//        $openId = $tools->GetOpenid();
        $rs = $this->find($this->_user,array('id'=>$data1['user_id']),true,'openid');
        $openId = $rs['openid'];
        //②、统一下单
        $input = new WxPayUnifiedOrder();
        $input->SetBody($data1['subject']);//商品名称
        $input->SetAttach($data1['customer_message']);//?客户留言？不确定
        $input->SetOut_trade_no($data1['order_id']);
        $input->SetTotal_fee($xw_price);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        $input->SetNotify_url("https://www.schoolingandhoming.com/Mobile_Wechat/notify");
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);
        $order = WxPayApi::unifiedOrder($input);
        $jsApiParameters = $tools->GetJsApiParameters($order);
        $this->load->view('/mobile/jssdkpay',array('jsApiParameters'=>$jsApiParameters,'order_id'=>$data1['order_id']));
    }


    function _is_weixin() {
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
            return true;
        } return false;
    }




    public function notify(){
        require_once APPPATH."third_party/WxpayAPI_php_v3/example/notify.php";
        $notify = new PayNotifyCallBack();
        $res = $notify->Handle(false);
        if($res=='success'){

        }

    }
}