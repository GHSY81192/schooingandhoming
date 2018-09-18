<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mobile_Alipay extends CI_Controller {
    public function index(){
        $this->load->view('alipay/test');
    }
    public function pagepay(){
        require_once APPPATH.'third_party/alipay_mobile/config.php';

        require_once APPPATH.'third_party/alipay_mobile/wappay/service/AlipayTradeService.php';

        require_once APPPATH.'third_party/alipay_mobile/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php';



        if (!empty($_POST['WIDout_trade_no'])&& trim($_POST['WIDout_trade_no'])!=""){
            //商户订单号，商户网站订单系统中唯一订单号，必填
            $out_trade_no = $_POST['WIDout_trade_no'];

            //订单名称，必填
            $subject = $_POST['WIDsubject'];

            //付款金额，必填
            $total_amount = $_POST['WIDtotal_amount'];

            //商品描述，可空
            $body = $_POST['WIDbody'];

            //超时时间
            $timeout_express="1m";

            $data['order_id'] = $out_trade_no;//订单编号
            $data['subject_id'] = trim($_POST['lessonId']);//课程id
            $data['subject'] = $subject;//课程名称
            $data['taocan'] = $body;//选择套餐
            $data['price'] = $total_amount;//付款金额
            $data['number'] = trim($_POST['number']);//购买数量
            $data['customer_name'] = trim($_POST['name']);//客户姓名
            $data['customer_phone'] = trim($_POST['phone']);//客户电话
            $data['customer_message'] = trim($_POST['message']);//客户留言
            $data['user_id'] = $this->session->user_id;//用户id
            $data['payment'] = $this->input->post('payment',true);//支付方式
            $data['is_pay'] = 1;//是否支付
            $data['classtime'] = $this->input->post('classtime',true);//授课时间
            $this->insert($this->_order,$data);

            $payRequestBuilder = new AlipayTradeWapPayContentBuilder();
            $payRequestBuilder->setBody($body);
            $payRequestBuilder->setSubject($subject);
            $payRequestBuilder->setOutTradeNo($out_trade_no);
            $payRequestBuilder->setTotalAmount($total_amount);
            $payRequestBuilder->setTimeExpress($timeout_express);

            $payResponse = new AlipayTradeService($config);
            $result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);

            return ;
        }
    }

    public function return_url(){

        /* *
         * 功能：支付宝页面跳转同步通知页面
         * 版本：2.0
         * 修改日期：2017-05-01
         * 说明：
         * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。

         *************************页面功能说明*************************
         * 该页面可在本机电脑测试
         * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
         */
        require_once APPPATH.'third_party/alipay_mobile/config.php';
        require_once APPPATH.'third_party/alipay_mobile/wappay/service/AlipayTradeService.php';


        $arr=$_GET;
        $alipaySevice = new AlipayTradeService($config);
        $result = $alipaySevice->check($arr);

        /* 实际验证过程建议商户添加以下校验。
        1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
        2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
        3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
        4、验证app_id是否为该商户本身。
        */
        if($result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代码

            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

            //商户订单号
            $data['out_trade_no'] = htmlspecialchars($_GET['out_trade_no']);

            //支付宝交易号
            $data['trade_no'] = htmlspecialchars($_GET['trade_no']);
            //交易时间
            $time = date('Y-m-d H:i:s',time());
            $res = $this->find($this->_order,array('order_id'=>$data['out_trade_no']),true,'customer_phone,price');
            $this->send_sms($res['customer_phone'],$data['out_trade_no'],$res['price']);
            $this->update($this->_order,array('is_pay'=>8,'alipay_id'=>$data['trade_no'],'time'=>$time),array('order_id'=>$data['out_trade_no']));




            $this->load->helper('file_path');
            $this->_loadMobileHead('schoolingandhoming',true);
            $this->load->view('/mobile/finishOrder',$data);
            $this->_loadMobileFoot();

            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
            //验证失败
            echo "验证失败";
        }

    }

    public function send_sms($phone,$order,$money){
        $this->load->library('SMS');
        $this->sms->send_success_pay($phone,$order,$money);
    }





}