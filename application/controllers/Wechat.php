<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Wechat extends CI_Controller {
    /*电脑支付*/
    public function Pcpay(){

        ini_set('date.timezone','Asia/Shanghai');
        //error_reporting(E_ERROR);
        require_once APPPATH."third_party/WxpayAPI_php_v3/lib/WxPay.Api.php";

        require_once APPPATH."third_party/WxpayAPI_php_v3/lib/WxPay.NativePay.php";

        require_once APPPATH.'third_party/WxpayAPI_php_v3/example/log.php';

        $data['order_id'] = trim($_POST['WIDout_trade_no']);
        $data['subject_id'] = trim($_POST['lessonId']);//课程id
        $data['subject'] = trim($_POST['WIDsubject']);//课程名称
        $data['taocan'] = trim($_POST['WIDbody']);//选择套餐
        $data['price'] = trim($_POST['WIDtotal_amount']);//付款金额
        $data['number'] = trim($_POST['number']);//购买数量
        $xw_price = $data['price']*100;
        $data['customer_name'] = trim($_POST['name']);//客户姓名
        $data['customer_phone'] = trim($_POST['phone']);//客户电话
        $data['customer_message'] = trim($_POST['message']);//客户留言
        $data['user_id'] = $this->session->user_id;//用户id
        $data['payment'] = $this->input->post('payment',true);//支付方式
        $data['is_pay'] = 1;//是否支付
        $data['classtime'] = $this->input->post('classtime',true);//授课时间
        $this->insert($this->_order,$data);

        $notify = new NativePay();
        $input = new WxPayUnifiedOrder();

        $input->SetBody($data['subject']);//商品名称
        $input->SetAttach($data['customer_message']);//?客户留言？不确定
        $input->SetOut_trade_no($data['order_id']);
        $input->SetTotal_fee($xw_price);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        $input->SetNotify_url("https://www.schoolingandhoming.com/application/third_party/WxpayAPI_php_v3/example/native_notify.php");
        $input->SetTrade_type("NATIVE");
        $input->SetProduct_id($data['subject_id']);


        $result = $notify->GetPayUrl($input);
        $url2 = $result["code_url"];

        $this->load->view('/web/Wxpay',array('url'=>$url2,'order_id'=>$data['order_id']));

    }

    /* 查询订单 */
    public function checkOrder(){
        ini_set('date.timezone','Asia/Shanghai');
        error_reporting(E_ERROR);
        require_once APPPATH."third_party/WxpayAPI_php_v3/lib/WxPay.Api.php";
        require_once APPPATH.'third_party/WxpayAPI_php_v3/example/log.php';

        //初始化日志
        $logHandler= new CLogFileHandler("./logs/".date('Y-m-d').'.log');
        $log = Log::Init($logHandler, 15);



        function printf_info($data)
        {
            return $data;
        }


        if(isset($_REQUEST["transaction_id"]) && $_REQUEST["transaction_id"] != ""){
            $transaction_id = $_REQUEST["transaction_id"];
            $input = new WxPayOrderQuery();
            $input->SetTransaction_id($transaction_id);
            printf_info(WxPayApi::orderQuery($input));
            exit();
        }

        if(isset($_REQUEST["out_trade_no"]) && $_REQUEST["out_trade_no"] != ""){
//            $out_trade_no = $_REQUEST["out_trade_no"];
            $out_trade_no = $this->input->post('out_trade_no',true);
            $input = new WxPayOrderQuery();
            $input->SetOut_trade_no($out_trade_no);
            $res = printf_info(WxPayApi::orderQuery($input));
            if($res['trade_state'] == 'SUCCESS'){
                $rs = $this->find($this->_order,array('order_id'=>$out_trade_no),true,'customer_phone,price');
                $this->send_sms($rs['customer_phone'],$out_trade_no,$rs['price']);
                $time = date('Y-m-d H:i:s',time());
                $save = $this->update($this->_order,array('is_pay'=>8,'alipay_id'=>$res['transaction_id'],'time'=>$time),array('order_id'=>$res['out_trade_no']));
                if($save){
                    $this->json_ret(888);
                }
            }else{
                $this->json_ret(300);
            }


            exit();
        }

    }

    public function send_sms($phone,$order,$money){
        $this->load->library('SMS');
        $this->sms->send_success_pay($phone,$order,$money);
    }




}