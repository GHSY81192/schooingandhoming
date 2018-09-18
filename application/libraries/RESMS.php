<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: byron
 * Date: 2017/7/18
 * Time: 9:58
 */
class RESMS
{
    const UID = 'schoolingandhoming';
    const PWD = 'SaH159753';

    public function SMS_Reply($tel,$content){
        $interfaceAddress="http://webservice.smsadmin.cn/SGIP/SGIPService.php?WSDL";  //远程服务器接口地址
        $client=new SoapClient($interfaceAddress);
        $uid=self::UID;        //必选参数,用户ID,即在通用短信平台上注册的用户ID
        // $uid=mb_convert_encoding($uid,'utf-8','gb2312');
        $pwd=self::PWD;    //必选参数，用户密码
        $mobile=$tel;  //必选参数，接收短信的手机号码,批量提交时一次最多只能提交999个号码,每个号码之间用英文下的逗号(,)分隔
        $msg="【仕荟教育】".$content;  //必选参数，短信内容
        // $msg=mb_convert_encoding('【仕荟教育】'.$msg,'utf-8','gb2312');
        $lindid="";             //可选参数，提交短信批次流水号，用户自定义，数字、字母组合，最大长度不能超过32位；用于匹配返回的状态报告及回复信息；
        $dtime="";              //可选能数，短信定时发送时的定时时间
        $char= "utf-8";
        $uid = urlencode($uid); //用户ID进行url转码
        $msg = urlencode($msg); //短信内容进行url转码
        $response=$client->sendSms($uid,$pwd,$mobile,$msg,$lindid,$dtime,$char);  //调用短信发送方式sendSms
        return $response;
    }

    /*
     *主动获取短信回复
     *每次最多可获取20条回复记录，每行回复记录换行符为“\n”
     *每一行的记录格式为：手机号码\回复时间\流水号\短信回复内容 (如果短信提交时lindid参数为空,则返回值中流水号字段为系统自定义值{一般值为：空或1或0})
    */
    function getSmsReply(){
        $interfaceAddress="http://webservice.smsadmin.cn/SGIP/SGIPService.php?WSDL";  //远程服务器接口地址
        $client=new SoapClient($interfaceAddress);
        $uid=self::UID;          //必选参数,用户ID,即在通用短信平台上注册的用户ID
        $pwd=self::PWD;          //必选参数，用户密码
        $uid = urlencode($uid); //用户ID进行url转码
        $response=$client->getResponse($uid,$pwd);  //调用短信回复方法getResponse
        //return $response;       //直接返回短信回复信息整体格式
        /*成功获取短信回复信息格式：
        <?xml version="1.0"?>
        <response>
          <response>
          13712345678/2014-09-30 15:07:18//祝假期愉快！
          13712345678/2014-09-30 15:06:31//收到哦，谢谢！国庆快乐！8899
          </response>
        </response> */
        $data = simplexml_load_string(trim($response," \t\n\r"));
        $returnResponse = $data->response;
        if($returnResponse != ""){
            $returnResponseArr=explode("\n",$returnResponse);
            foreach($returnResponseArr as $key => $valueRecord){
                $valueRecord=mb_convert_encoding($valueRecord,'gbk','utf-8');
                if($valueRecord){
                    $fieldArr=explode("/",$valueRecord);
                    if($fieldArr[3] != ""){
                        $smsReplyContentString = '';
                        $smsReplyContentString .= '$mobile'.'='.$fieldArr[0].'<br>'.'$smsReplyTime'.'='.$fieldArr[1].'<br>'.'$lindid'.'='.$fieldArr[2].'<br>'.'$smsReplyContent'.'='.$fieldArr[3].'<br>'.'----------------------------------------------------------------------------'.'<br>';
                    }
                }
            }
            return $smsReplyContentString;
        }else{
            return "没有可获取的短信回复记录!";
        }
    }


}