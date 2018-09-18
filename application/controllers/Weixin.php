<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weixin extends CI_Controller {

	protected $_appId;
	protected $_appSecret;
	public function __construct(){
		parent::__construct();
		$this->_appId = 'wxbda36f251f81ca3e';
		$this->_appSecret = 'a36f3cfec80456627aad3c59706829d0';
		$this->load->model('weixin_model', 'mWeixin');
	}
	
	public function init(){
		$echoStr = $_GET["echostr"];
		$token = "1E4i123456872L05";
		//echo $echoStr;exit;
		
		if($this->_checkSignature($token)){
			//echo $echoStr;exit;
			$postStr = @$GLOBALS["HTTP_RAW_POST_DATA"];
			$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
			$res = (array) $postObj;
			
			//场景扫码
			$qr = '';
			if ( mb_strpos($res['EventKey'],'qrscene_') !==false ) {
				$qr = str_replace('qrscene_','',$res['EventKey']);
			}
			if ($res['Event'] !='unsubscribe') { //不是取消关注
				//获取微信用户基本信息
				$weixin_info = $this->get_weixininfo($res['FromUserName']);
				$this->mWeixin->insertWeixinData($weixin_info,$qr);
			}
			if($res['Event'] == 'subscribe') {	//首次关注
 				$this->session->set_userdata('weixin_id', $res['FromUserName']);
				$title = '欢迎来到S&H，小仕将为您带来最新最全的美国走读中学和寄宿家庭资讯';
				$this->transmitText($postObj,$title);		
				exit();
			}
			//取消关注，更新状态
			if ($res['Event'] =='unsubscribe') {
				$this->mWeixin->updateStatusByWeixinId($res['FromUserName']);
				exit;
			}
			if ($res['Event'] =='CLICK' && $res['EventKey'] == 'V1001') {
				$this->log('test', 'aaa111');
				$url = "http://mp.weixin.qq.com/s/CkBHMCxKKsf3wMzq-tm9pA";
				$now = time();
				$title = '关于留美中学及寄宿家庭联盟';
				echo
				"<xml>
				<ToUserName><![CDATA[{$res[FromUserName]}]]></ToUserName>
				<FromUserName><![CDATA[{$res[ToUserName]}]]></FromUserName>
				<CreateTime>{$now}</CreateTime>
				<MsgType><![CDATA[news]]></MsgType>
				<ArticleCount>1</ArticleCount>
				<Articles>
				<item>
				<Title><![CDATA[{$title}]]></Title>
				<Description><![CDATA[]]></Description>
				<PicUrl><![CDATA[https://mmbiz.qlogo.cn/mmbiz_jpg/MA2oCR0zEwicTazDPicpQwicFoibJTdBrc145ROlOOfjqTeUqrDvX3MGgO6zLG1L4cSia2bGpocXiawArntbuq3KibFLg/0?wx_fmt=jpeg]]></PicUrl>
				<Url><![CDATA[{$url}]]></Url>
				</item>
				</Articles>
				</xml>
				";
				exit();
			}
			
			//地理位置
			if ($res['Event'] == 'LOCATION'){
				$lat = $res['Latitude'];
				$lg  = $res['Longitude'];
				//$this->mWeixin->updateUserLocation($res['FromUserName'],$lg,$lat,true);
				
			}
			
			//地理位置
			if (isset($res['Content']) ){
				//回复其他内容
				$fromUsername = $res['FromUserName'];
				$toUsername =$res['ToUserName'];
				$textTpl = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[transfer_customer_service]]></MsgType>
					</xml>";
				$resultStr = sprintf($textTpl, $fromUsername, $toUsername, time());
				echo $resultStr;
				exit;
			}
		}
	}

	//微信获取用户基本信息接口
	public function get_weixininfo($open_id){
		$access_token = $this->mWeixin->getWeixinToken();
		$url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token={$access_token}&openid={$open_id}&lang=zh_CN";
		$array = array();
		$data = json_encode($array);
		$output = $this->_curl($url,$data);
		$result2 = json_decode($output,true);
		return $result2;
	}

	/*更新微信token
	 * auth bright
	*/
	public function updateWeixinToken(){
		$success = false;
		$appid = $this->_appId;
		$secret = $this->_appSecret;
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$secret}";
		$result = $this->_curl($url);
		if ($result) {
			$result = json_decode($result,true);
			//error_log(var_export($result,true),3,'/data/log/token.log');
			if (isset($result['access_token'])) {

				$this->mWeixin->updateWeixinToken($result['access_token']);
			}
		}
		$access_token = $this->mWeixin->getWeixinToken();
		$url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$access_token.'&type=jsapi';
		$result = $this->_curl($url);
		if ($result) {
			$result = json_decode($result,true);
			if (isset($result['ticket'])) {
				$this->mWeixin->updateWeixinTicket($result['ticket']);
			}
		}
		var_dump($result);
	}
	public function crontabUpdateGameNum(){
		$this->update($this->_user, array('today_game_num'=>0), array());
	}
	/*
	 * 更新微信用户资料
	 *
	 */
	public function curlUpdateWeixinInfo(){
		$this->mWeixin->updateWeixinInfo();
	}
	/*
	 * 更新微信js ticket
	 */
	public function updateWeixinTicket(){
		$access_token = $this->mWeixin->getWeixinToken();
		$url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$access_token.'&type=jsapi';
		$result = $this->_curl($url);
		if ($result) {
			$result = json_decode($result,true);
			if (isset($result['ticket'])) {
				$this->mWeixin->updateWeixinTicket($result['ticket']);
			}
		}
	}

	
	public function cdList1(){
		$code = $_GET['code'];
		$state = $_GET['state'];
		$appid = $this->_appId;
		$secret = $this->_appSecret;
		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appid}&secret={$secret}&code={$code}&grant_type=authorization_code";
		$result = $this->_curl($url);
		//error_log(var_export($result,true),3,'/data/log/upload.log');
		$result = json_decode($result,true);
		$weixin_id = @$result['openid'];
		$this->session->set_userdata('weixin_id', @$result['openid']);
		$user = $this->find($this->_user,array('openid'=>$weixin_id));
		if ($user) {
			$this->session->set_userdata('user_id', $user['id']);;
		}
		header("location:http://www.schoolingandhoming.com/mobile/common/personalTailor");
		//header("location:https://m.huoban.com/share/app/ebba520f1b64f99ea9a20ce705621b3d/form/create_item?from=groupmessage&isappinstalled=0");
	}
	
	public function cdList3() {
		$code = $_GET['code'];
		$state = $_GET['state'];
		$appid = $this->_appId;
		$secret = $this->_appSecret;
		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appid}&secret={$secret}&code={$code}&grant_type=authorization_code";
		$result = $this->_curl($url);
		//error_log(var_export($result,true),3,'/data/log/upload.log');
		$result = json_decode($result,true);
		$weixin_id = @$result['openid'];
		$this->session->set_userdata('weixin_id', @$result['openid']);
		$user = $this->find($this->_user,array('openid'=>$weixin_id));
		if ($user) {
			$this->session->set_userdata('user_id', $user['id']);;
		}
		header("location:http://d.eqxiu.com/s/LdihvRyq");
	}
	

	//微信普通授权回调接口
	public function getOpenIdByCode(){
		$code = @$_REQUEST['code'];
		$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$this->_appId.'&secret='.$this->_appSecret.'&code='.$code.'&grant_type=authorization_code';
		$res = $this->_curl($url);
		//@error_log(var_export($res,true),3,'/data/log/ac.log');
		$ret = json_decode($res,true);
		$this->session->set_userdata('weixin_id', @$ret['openid']);
	}
	
	//微信获取资料授权回调接口
	public function getUserInfoByCodeOnCouponActivity(){
		//根据code，获取access_token
		$code = @$_REQUEST['code'];
		$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$this->_appId.'&secret='.$this->_appSecret.'&code='.$code.'&grant_type=authorization_code';
		$res = $this->_curl($url);
		$ret = json_decode($res,true);
		//$this->log('info_code', $ret);
		
		$access_token = @$ret['access_token'];
		$data = array();
		//$access_token = $this->mWeixin->getWeixinToken();
		if ( !empty($ret['openid']) ){
			//获取用户资料
			$url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.@$ret['openid'].'&lang=zh_CN';
			$json = $this->_curl($url);
			$data = json_decode($json,true);
		}
		//$this->log('info_code', $data);
		//后续处理
		$this->load->helper('url');
		if (!empty($data['openid'])){	//过来就插入到表里，但是状态为未关注
			$weixin_id = @$data['openid'];
			$this->session->set_userdata('weixin_id', $weixin_id);
			$user = $this->find($this->_user, array('openid'=>$weixin_id) );
			if (!$user){
				$insert = array (
					  'unionid' => $data['unionid'],
					  'openid' => $data['openid'],
					  'name_cn' => $data['nickname'],
					  'name_en' => $data['nickname'],
					  'gender' => $data['sex'],
					  'head_image' => $data['headimgurl'],
					  'create_time' => date('Y-m-d H:i:s',time()),
				);
				$uid = $this->insert($this->_user, $insert);
			}else{
				$uid = $user['id'];
			}
			$this->session->set_userdata('user_id', $uid);
		}else{
			redirect('/mobile/common/login');
		}
		$retUrl = $this->input->get('retUrl',true);
		if (strstr('/index.php/', $retUrl)) {
			$retUrl = str_replace('/index.php/', '', $retUrl);
		}

		if ($retUrl) {
			redirect($retUrl);
		}else{
			redirect('/mobile/common');
		}
	}

	public function _curl($url, $post = NULL,$host=NULL) {
		$userAgent = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:12.0) Gecko/20100101 Firefox/12.0';
		$cookieFile = NULL;
		$hCURL = curl_init();
		curl_setopt($hCURL, CURLOPT_URL, $url);
		curl_setopt($hCURL, CURLOPT_TIMEOUT, 30);
		curl_setopt($hCURL, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($hCURL, CURLOPT_USERAGENT, $userAgent);
		curl_setopt($hCURL, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($hCURL, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($hCURL, CURLOPT_ENCODING, "gzip,deflate");
		//curl_setopt($hCURL, CURLOPT_HTTPHEADER,$host);
		if ($post) {
			curl_setopt($hCURL, CURLOPT_POST, 1);
			curl_setopt($hCURL, CURLOPT_POSTFIELDS, $post);
		}
		$sContent = curl_exec($hCURL);
		if ($sContent === FALSE) {
			$error = curl_error($hCURL);
			curl_close($hCURL);

			throw new \Exception($error . ' Url : ' . $url);
		} else {
			curl_close($hCURL);
			return $sContent;
		}
	}

	private function _checkSignature($token)
	{
		$signature = @$_GET["signature"];
		$timestamp = @$_GET["timestamp"];
		$nonce = @$_GET["nonce"];
		//$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr,SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}

	private function transmitText($object, $content)
	{
		if (!isset($content) || empty($content)){
			return "";
		}
		$xmlTpl = "<xml>
		     <ToUserName><![CDATA[%s]]></ToUserName>
		     <FromUserName><![CDATA[%s]]></FromUserName>
		     <CreateTime>%s</CreateTime>
		     <MsgType><![CDATA[text]]></MsgType>
		     <Content><![CDATA[%s]]></Content>
		 </xml>";
		$result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time(), $content);

		echo $result;
		exit;
	}
	private function transmitText2($object,$title,$content,$url){
		$xmlTpl = "<xml>
		<ToUserName><![CDATA[%s]]></ToUserName>
		<FromUserName><![CDATA[%s]]></FromUserName>
		<CreateTime>%s</CreateTime>
		<MsgType><![CDATA[news]]></MsgType>
		<ArticleCount>1</ArticleCount>
		<Articles>
		<item>
		<Title><![CDATA[{$title}]]></Title>
		<Description><![CDATA[{$content}]]></Description>
		<Url><![CDATA[{$url}]]></Url>
		</item>
		</Articles>
		</xml>";
		$result = sprintf($xmlTpl, $object->FromUserName, $object->ToUserName, time(), $content);

		echo $result;
		exit;
	}

	public function getAccessKey(){
		$ret = $this->mApi->getAccessKey();
		echo json_encode($ret);
	}
	
	//微信菜单接口
	function setWeixinList(){
		$access_token = $this->mWeixin->getWeixinToken();
		$appid = $this->_appId;
	
		$list1 = urlencode('http://www.schoolingandhoming.com/weixin/cdList1');
		$url1 = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.$list1.'&response_type=code&scope=snsapi_base&state=123#wechat_redirect';

		$list3 = urlencode('http://www.schoolingandhoming.com/weixin/cdList3');
		$url3 = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.$list3.'&response_type=code&scope=snsapi_base&state=123#wechat_redirect';

		$menu = ' {
				     "button":[

					      {
				           "name":"定制需求",
				           "type":"view",
				           "url":"'.$url1.'"
				          },
						  {
				           "name":"热门文章",
				           "type":"view",
				           "url":"http://mp.weixin.qq.com/mp/homepage?__biz=MzIxNTYyMTc0OQ==&hid=2&sn=599b0017236376cfa3f306253594ca0a#wechat_redirect"
				          },
				          {
				          	"name":"在线课程",
				          	"sub_button":[
				          					{
											"name":"课程咨询",
				          					"type":"view",
				          					"url":"https://www.schoolingandhoming.com/mobile/common/consult"
											},
				          					{
				          					"name":"衔接课程",
				          					"type":"view",
				          					"url":"https://www.schoolingandhoming.com/mobile/common/LessonList"
											},
											{
											"name":"暑期课程",
				          					"type":"view",
				          					"url":"https://www.schoolingandhoming.com/mobile/common/SummerList"
											}

										]
				          }




				     ]
				 }';
		$url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$access_token;
		$ret = $this->_curl($url,$menu);
		var_dump($ret);
	}
	
	//分享js要用的签名
	public function getWeiXinSign(){
		//刷新token & ticket
		$query = $this->db->get ( $this->_weixin_token );
		$data = $query->row_array ();
		$create_time = $data['create_time'];
		if(empty($create_time) || (time() - $create_time > 7000)) {
			$this->updateWeixinToken();
			$this->updateWeixinTicket();
		}

		$access_token = $this->mWeixin->getWeixinToken();
		//$url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$access_token.'&type=jsapi';
		
		// 注意 URL 一定要动态获取，不能 hardcode.
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		
		$ticket = $this->mWeixin->getWeixinTicket();
		$data['timestamp'] = $timestamp = time(); // 必填，生成签名的时间戳
		$data['nonceStr'] = $noncestr = $this->createNonceStr();
		$url = $_SERVER['HTTP_REFERER'];
		$data['appId'] = $this->_appId;// 必填，公众号的唯一标识
		$data['signature'] = sha1("jsapi_ticket={$ticket}&noncestr={$noncestr}&timestamp={$timestamp}&url={$url}");// 必填，签名，见附录1
		if ($ticket){
			echo json_encode( array('status'=>1,'data'=>$data) );
		}else{
			echo json_encode( array('status'=>0 ) );
		}
	}
	public function getWeixinSign2(){
		$appId = $this->_appId;
		$nonceStr= $this->createNonceStr(12);
		$timeStamp = time();
		$timeStamp="$timeStamp";//时间戳必须是字符串
		// 计算addrSign:包括appid，url，timestamp，noncestr，网页accesstoken
		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
		$url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$url = "http://caidan.attot.com/index/trolley";
		$accessToken = $this->mWeixin->getWeixinToken();
		$string = "accesstoken=$accessToken&appid=$appId&noncestr=$nonceStr&timestamp=$timeStamp&url=$url";
		$this->log('test111', $string);
		$addrSign = sha1($string);
		$data = array(
				"appId"     => $appId,
				"nonceStr"  => $nonceStr,
				"timeStamp" => $timeStamp,
				"addrSign" => $addrSign
		);
		echo json_encode( array('status'=>1,'data'=>$data) );
	}
	private function createNonceStr($length = 16) {
	    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	    $str = "";
	    for ($i = 0; $i < $length; $i++) {
	      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	    }
	    return $str;
  }
	
	//微信带参数二维码接口
	function setWeixinQrCode(){
		$qr = 3;//场景id
		$post = '{"action_name": "QR_LIMIT_SCENE", "action_info": {"scene": {"scene_id": '.$qr.'}}}';
		$access_token = $this->mWeixin->getWeixinToken();
		$url = 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$access_token;
		$ret = $this->_curl($url,$post);
		var_dump($ret);
		//https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=gQH87joAAAAAAAAAASxodHRwOi8vd2VpeGluLnFxLmNvbS9xL2RVemdfQXptMXZ1dmtGY2oxV0N0AAIEWStIVQMEAAAAAA==
	}
	
	//微信模版短信
	function sendTemplateMsg($template_id, $weixin_id, $data=array()){
		if (!$template_id || !$weixin_id || !$data){
			return false;
		}
		$access_token = $this->mWeixin->getWeixinToken();
		if ($template_id == 'gdFhR58gSjn49KnWO96kq_mBxyG8PWtG5VwFNUz1QUk'){	//支付成功
			$post = '{
						"touser":"'.$weixin_id.'",
						"template_id":"'.$template_id.'",
						"url":"",
						"topcolor":"#FF0000",
						"data":{
							"firstData": {
							"value":"'.$data['title'].'",
							"color":"#173177"
							},
							"orderMoneySum":{
							"value":"'.$data['money'].'",
							"color":"#173177"
							},
							"orderProductName":{
							"value":"'.$data['goodsname'].'",
							"color":"#173177"
							},
							"Remark":{
							"value":"'.$data['remark'].'",
							"color":"#173177"
							}
						}
				   }';
		}
		$url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;
		$this->curl($url,$post);
	}





}
