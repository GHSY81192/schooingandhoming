<?php


class Weixin_model extends CI_Model{

	
	public function __construct(){
		parent::__construct();
	}
	public function getAccessKey(){
		$code = array('code'=>'testcode');
		return $this->format_ret(1,$code);
	}

	/*获取微信token
	 *
	*/
	function getWeixinToken(){
		$query = $this->db->get ( $this->_weixin_token );
		if ($query->num_rows () > 0) {
			$data = $query->row_array ();
			return $data['token'];
		}else{
			return null;
		}
	}

	function getWeixinTicket(){
		$query = $this->db->get ( $this->_weixin_token );
		if ($query->num_rows () > 0) {
			$data = $query->row_array ();
			return $data['ticket'];
		}else{
			return null;
		}
	}

	//更新wixin token
	function updateWeixinToken($token){
		$data = array(
			'token' => $token,
			'create_time' => time()
		);
		return $this->db->update($this->_weixin_token, $data);
	}
	function updateWeixinTicket($ticket){
		$data = array(
			'ticket' => $ticket,
			'create_time' => time()
		);
		return $this->db->update($this->_weixin_token, $data);
	}
	//插入抵扣数据
	function insertDiscountData($weixin_id,$code,$money,$remark,$service_id){
		$data = array(
			'weixin_id' =>$weixin_id,
			'code' => $code,
			'money' => $money,
			'remark' => $remark,
			'create_time' => time(),
			's_id'=>$service_id
		);
		return $this->db->insert('discount', $data);
	}

	//查询有没有发放过抵扣券,防止多次刷码
	function findDiscountDataByWeixinId($weixin_id){
		$query = $this->db->get_where('discount', array('weixin_id' => $weixin_id));
		if ($query->num_rows () > 0) {
			return true;
		}else{
			return false;
		}
	}
	//插入数据
	function insertWeixinData($data,$qr=''){
		//error_log(var_export($data,true),3,'/data/log/test.log');
		if( !empty($data['openid']) ){	//防止重复插入数据
			$where = array('unionid' => $data['unionid']);
			$query = $this->db->get_where($this->_user, $where);
			if ($query->num_rows () > 0) {
				//已经关注过了就更新一下状态就好了
				$update = array (
					  'openid' => $data['openid'],
					  'name_cn' => $data['nickname'],
					  'name_en' => $data['nickname'],
					  'gender' => $data['sex'],
					  'head_image' => $data['headimgurl'],
					  'update_time' => date('Y-m-d H:i:s',time()),
				);
				$this->update($this->_user, $update, $where);
				return false;
			}

			$insert = array (
					  'unionid' => $data['unionid'],
					  'openid' => $data['openid'],
					  'name_cn' => $data['nickname'],
					  'name_en' => $data['nickname'],
					  'gender' => $data['sex'],
					  'head_image' => $data['headimgurl'],
					  'create_time' => date('Y-m-d H:i:s',time()),
			);
			if($qr){
				$insert['qr'] = $qr;
			}
			//error_log(var_export($insert,true),3,'/data/log/test111.log');
			$this->insert($this->_user, $insert);
			
			//插入用户表作为绑定
			$str = $this->db->last_query();
			//error_log($str,3,'/data/log/test111.log');
		}
	}

	function updateWeixinInfo(){
		$query = $this->db->get_where($this->_user);

		if ($query->num_rows () > 0) {
			$res = $query->result_array ();
			if ($res){
				//var_dump($res);exit;
				foreach ($res as $val){
					$data = $this->get_weixininfo($val['openid']);
					if (!isset($data['nickname'])){	//取消关注就拿不到信息了
						continue;
					}
					if (!empty($data)){
						$update = array (
								'nickname' => $data['nickname'],
								'sex' => $data['sex'],
								'city' => $data['city'],
								'province' => $data['province'],
								'country' => $data['country'],
								'face' => $data['headimgurl'],
								'subscribe_time' => $data['subscribe_time'],
								'remark' => $data['remark'],
								//'create_time' => time(),
						);
						$this->db->where('openid',$val['openid']);
						$this->db->update($this->_user, $update);
					}

				}
			}
		}
	}

	//取消关注
	function updateStatusByWeixinId($open_id,$status=2,$qr=''){
		$update = array (
				'status' => $status,
		);
		if ($qr){
			$update['qr'] = $qr;
		}
		$this->db->where('openid',$open_id);
		$this->db->update($this->_user, $update);
	}

	//微信获取用户基本信息接口
	private function get_weixininfo($open_id){
		$access_token = $this->getWeixinToken();
		$url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token={$access_token}&openid={$open_id}&lang=zh_CN";
		$array = array();
		$data = json_encode($array);
		$output = $this->_curl($url,$data);
		$result2 = json_decode($output,true);
		return $result2;
	}

	//发送文本消息给用户
	public function sendTextMsgToUser($weixin_id,$text){	
		$access_token = $this->getWeixinToken();
		$url = 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token;
		//发送文本消息
		$text = '{
				"touser":"'.$weixin_id.'",
						"msgtype":"text",
								"text":
								{
								"content":"'.$text.'"
	    				}
			}';
		$ret = $this->_curl($url,$text);
		return $ret;
	}

	//发送抵扣码
	function sendDiscountByWeixinId($weixin_id){
		$where = array('use'=>1,'type'=>2,'weixin_id'=>$weixin_id);
		$query = $this->db->get_where($this->_discount,$where);
		if ($query->num_rows () > 0) {
			$data = $query->row_array ();
			if ( !empty($data['code']) ){
				$this->sendTextMsgToUser($weixin_id,'您的毕业季活动抵扣码是：'.$data['code']);
			}
		}
	}
	
	function _curl($url, $post = NULL,$host=NULL) {
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
	
	//更新地理位置
	function updateUserLocation($weixin_id,$lng,$lat,$uploadFormWeixin=false){
		//如果是微信来的做一次转换,统一为百度的
		if ($uploadFormWeixin){
			$url = 'http://api.map.baidu.com/geoconv/v1/?ak=imRTsjgTreVQDaunGV1U3xOv&coords='.$lat.','.$lng.'&output=json&from=3';
			$res = $this->curl($url);
			if (!empty($res)){
				$ret = json_decode($res,true);
				$this->log('local', $ret);
				if ( !$ret['status'] ){
					$lat = @$ret['result'][0]['x'];
					$lng = @$ret['result'][0]['y'];
				}
			}
		}
		$this->db->where('openid',$weixin_id);
		$update = array(
			'lng' => $lng,
			'lat' => $lat
		);
		$this->db->update($this->_user,$update);
	}
	//更新用户属性
	function updateUserType($weixin_id,$type){
		$this->db->where('openid',$weixin_id);
		$update = array(
				'type' => $type
		);
		$this->db->update($this->_user,$update);
	}
	//获取用户信息
	function findUserDataByWeixinId($weixin_id){
		
		$data = array();
		$query = $this->db->get_where($this->_user,array('openid'=>$weixin_id));
		if ($query->num_rows () > 0) {
			$data = $query->row_array ();
		}
		return $data;
	}
	//统计报表数据,$countDay为统计的那天的日期的时间戳
	function statisticalReport($countDay){
		$ret = array();
		$maxTime =$countDay+86400;
		$totalNum = $this->count('weixin', array('create_time <'=>$maxTime));
		$where['create_time >'] = $countDay;
		$where['create_time <'] = $maxTime;
		$total = $this->count('weixin', $where);	//当天关注总量
		
		//详细数据
		$data = $this->find('weixin', $where, false);
		$focusNum = $cancelNum = $shareNum = 0;
		$cancelPerson = '';
		$newData = array();
		if ($data){
			foreach ($data as $val){
				if ( !isset($newData[$val['city']]) ){
					$newData[$val['city']] = 1;
				}else{
					$newData[$val['city']] += 1;
				}
		
				if ($val['status'] == 1){	//关注数
					$focusNum ++;
				}elseif ($val['status'] == 2){	//取消关注数
					$cancelNum ++;
					$cancelPerson .= $val['nickname'].',';	//取消关注的昵称
				}else{
					$shareNum ++;	//未关注,但领取过优惠券的用户
				}
			}
		}
		
		if ($newData){
			arsort($newData);
		}		
		//app数据
		$whereAndroid = $whereIos = $whereOrder = $where;
		$whereIos['source <'] = 5;
		$ios = $this->count('user', $whereIos, false);
		
		$whereAndroid['source >='] = 5;
		$whereAndroid['source <'] = 9;
		$android = $this->count('user', $whereAndroid, false);
		
		//订单数据
		$where_not_in = array(
			'field' => 'gid',
			'value' => array(3117,3116,3113,3112,3111,3110,3109,3107,3103,3134,3133,3115)
		);
		$orderCount = $this->count('order', $whereOrder,$where_not_in);
		$order = $this->find('order', $whereOrder, false,'*','',$where_not_in);
		$sourceOrderData = $shopOrderData = $statusOrderData = array();
		if ($order){
			foreach ($order as $val){
				if ($val['source'] == 1){
					$source = '微信';
				}elseif ($val['source'] == 2){
					$source = 'android';
				}else{
					$source = 'ios';
				}
				if ( !isset($sourceOrderData[$source])){	//来源
					$sourceOrderData[$source] = 1;
				}else{
					$sourceOrderData[$source] += 1;
				}
		
				if ($val['status'] == 1){
					$status = '未支付';
				}elseif ($val['status'] == 2){
					$status = '未消费';
				}elseif ( in_array($val['status'], array(3,4)) ){
					$status = '服务已完成';
				}else{
					$status = '申请退款';
				}
				if ( !isset( $statusOrderData[$status] )){	//状态
					$statusOrderData[$status] = 1;
				}else{
					$statusOrderData[$status] += 1;
				}
		
				$gid = $val['gid'];
				if ($gid){
					$goods = $this->find('goods', array('id'=>$gid),true,'sid,name');
					$shop = $this->find('shop', array('id'=>$goods['sid']),true,'shop_name');
					if ( !isset($shopOrderData[$shop['shop_name']])){
						$shopOrderData[$shop['shop_name']] = 1;	//店铺
					}else{
						$shopOrderData[$shop['shop_name']] += 1;
					}
				}
			}
		}
		if ($statusOrderData){
			arsort($statusOrderData);
		}
		if ($shopOrderData){
			arsort($shopOrderData);
		}
		$ret = array(
				'totalPerson' => $totalNum,
				'addPerson' => $total,
				'shopOrderData' => $shopOrderData,
				'sourceOrderData' => $sourceOrderData,
				'statusOrderData'=> $statusOrderData,
				'orderCount' => $orderCount,
				'androidCount' => $android,
				'iosCount' => $ios,
				'cityListData' => $newData,
				'cancelNum' => $cancelNum,
				'focusNum' => $focusNum,
				'cancelPerson' => $cancelPerson,
				'shareNum' => $shareNum,
				'date'=>date('m月d日',$countDay)
		);
		return $ret;
	}

}

