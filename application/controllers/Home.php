<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	private $_userId;
	private $_user_identity;
	public function __construct(){
		parent::__construct();
		$this->load->helper('file_path');
		$this->_userId = $this->session->user_id;
		if (!$this->_userId) {
			$this->load->helper('url');
			redirect('/web/login');
		}

	}
	
	//主页
	public function index()
	{
		$where = array('id'=>$this->_userId);
		$data = $this->find($this->_user,$where);
		$language = $this->config->item('lang');
		$this->_loadHead();
//		$this->load->view('home/index',array('data'=>$data,'language'=>$language));
		$this->load->view('home/user',array('data'=>$data,'language'=>$language));
		$this->_loadFoot();
	}
	/*修改基本信息*/
	public function userInfo_Submit(){
		$data['name_cn'] = trim($this->input->post('name',true));
		$data['name_en'] = trim($this->input->post('name',true));
		$data['gender'] = trim($this->input->post('gender',true));
		$data['email'] = trim($this->input->post('email',true));
		$data['contact_email'] = trim($this->input->post('email',true));
		$rs = $this->update($this->_user,$data,array('id'=>$this->_userId));
		if($rs){
			$this->json_ret(888);
		}
	}

	/* 我的课程 */
	public function my_lessons($pay){
		$where = array('id'=>$this->_userId);
		$data = $this->find($this->_user,$where);
		if(!$pay){
			$pay = 8;
		}
		$order = $this->db->select('a.subject,a.subject_id,a.price,a.is_pay,b.img,b.author,a.time,a.order_id')
			->from($this->_order.' as a')
			->where(array('a.user_id'=>$this->_userId,'a.is_pay'=>$pay))
			->join($this->_lesson.' as b','a.subject_id = b.id')
			->get()
			->result_array();
		$this->_loadHead();
		$this->load->view("home/My_lessons",array('status'=>$pay,'order'=>$order,'data'=>$data));
		$this->_loadFoot();
	}

	/* 我的订制列表 */
	public function MyRequireList(){
		$where = array('id'=>$this->_userId);
		$data = $this->find($this->_user,$where);
		$data['list'] = $this->find($this->_personal_tailor,array('user_id'=>$this->_userId),false,'id,order_id,create_time,status');
		$this->_loadHead();
		$this->load->view('home/MyRequireList',array('data'=>$data));
		$this->_loadFoot();
	}
	/* 我的定制详情 */
	public function MyRequire($id){
		$data = $this->find($this->_personal_tailor,array('id'=>$id));
		$city = $this->find($this->_city,array('id'=>$data['city_id']),true,'name_cn,name_en');
		if(lang('is_en')){
			$data['city'] = ($city['name_en']?$city['name_en']:'other');
			$language = $this->config->item('lang_en');
		}else{
			$data['city'] = ($city['name_cn']?$city['name_cn']:'其他');
			$language = $this->config->item('lang');
		}


		$data['language'] = $language[$data['language']];
		$this->load->view('home/MyRequire',$data);
	}

	/* 我的消息 */
	public function MyMessage(){
		$where = array('id'=>$this->_userId);
		$data = $this->find($this->_user,$where);
		$data['list'] = $this->find($this->_site_reply,array('user_id'=>$this->_userId,'is_continue'=>2),false);
		$this->_loadHead();
		$this->load->view('home/MyMessage',array('data'=>$data));
		$this->_loadFoot();
	}
	/* 我的消息详情:消息回复 */
	public function Msg_con($id){
		$where = array('id'=>$this->_userId);
		$user = $this->find($this->_user,$where);
		$data = $this->find($this->_site_reply,array('id'=>$id));
		if($data['is_read'] == '1'){
			$this->update($this->_site_reply,array('is_read'=>'2'),array('id'=>$id));
		}
		$old_data = $this->find($this->_lesson_consult,array('id'=>$data['replyId']),true,'message,id');
		$data['old_data'] = $old_data['message'];
		$data['old_id'] = $old_data['id'];
		$nx = $this->find($this->_lesson_consult,array('next'=>$data['replyId']),false,'',array('field' => 'id' , 'type' => 'asc'));
		$answer = $this->find($this->_site_reply,array('is_continue'=>1),false);
		$this->load->view('home/MyMessageInfo',array('user'=>$user,'data'=>$data,'nx'=>$nx,'answer'=>$answer));
	}
	/* 我的消息详情：系统回复 */
	public function SyS_Msg_con(){
		$id = $this->input->post('id',true);
		$data = $this->find($this->_site_reply,array('id'=>$id));
		if($data){
			$this->json_ret(888,$data);
		}
	}
	public function SyS_Msg_con_read(){
		$id = $this->input->post('id',true);
		$rs = $this->update($this->_site_reply,array('is_read'=>2),array('id'=>$id));
		if($rs){
			$this->json_ret(888);
		}
	}

	/* 意见反馈 */
	public function UserAdvice($msg=''){
		$where = array('id'=>$this->_userId);
		$data = $this->find($this->_user,$where);
		$this->_loadHead();
		$this->load->view('home/UserAdvice',array('msg'=>$msg,'data'=>$data));
		$this->_loadFoot();
	}

	public function user_advice_submit(){
		$data['user_id'] = $this->_userId;
		$data['content'] = $this->input->post('content',true);
		$data['phone']   = $this->input->post('phone',true);
		$data['time']    = date('Y-m-d H:i:s',time());
		$this->load->helper('file_path');
		$name = time();
		$path = ROOTPATH.'upload/useradvice/';
		$this->load->model ( 'Common_model', 'mCommon' );
		$res = $this->mCommon->uploadPic ($path,$name,'cover');
		if($res['status']){
			$data['img'] = '/upload/useradvice/'.$res['msg'];
		}else{
			$data['img'] = '';
		}
		$result = $this->insert($this->_user_advice,$data);
		if($result){
			$this->UserAdvice('提交成功');
		}
	}


	//我的住家需求列表
	public function requireList(){
		$where = array('id'=>$this->_userId);
		$user = $this->find($this->_user,$where,true,'id,head_image,name_cn');
		$data = $this->find($this->_personal_tailor,array('user_id'=>$this->_userId),false);
		$this->_loadHead();
		$this->load->view('home/require_list',array('user'=>$user,'data'=>$data));
		$this->_loadFoot();
	}


	/* 我的订单 */
	public function myorder(){
		$where = array('id'=>$this->_userId);
		$user = $this->find($this->_user,$where,true,'id,head_image,name_cn');
		$data = $this->find($this->_order,array('user_id'=>$this->_userId),false);
		$this->_loadHead();
		$this->load->view('home/myorder',array('user'=>$user,'data'=>$data));
		$this->_loadFoot();
	}






	/* 用户中心——收藏 */
	public function collect(){
		$where = array('id'=>$this->_userId);
		$user = $this->find($this->_user,$where,true,'id,head_image,name_cn');
		$data = '模块开发中';
		$this->_loadHead();
		$this->load->view('home/collect',array('user'=>$user,'data'=>$data));
		$this->_loadFoot();
	}

	/* 用户中心——收件箱 */
	public function siteMail(){
		$where = array('id'=>$this->_userId);
		$user = $this->find($this->_user,$where,true,'id,head_image,name_cn');
		$data = $this->find($this->_email,array('user_id'=>$this->_userId),false,'*',array('field' => 'id' , 'type' => 'desc'));

		if($this->input->get('id',true)){
			$res = $this->find($this->_email,array('id'=>$this->input->get('id',true)));
		}
		$this->_loadHead();
		$this->load->view('home/siteMail',array('user'=>$user,'data'=>$data,'res'=>$res));
		$this->_loadFoot();
	}
	/* 我的住家 */
	public function House_List($status){
		$where = array('id'=>$this->_userId);
		$user = $this->find($this->_user,$where,true);
		$data = $this->find($this->_HostInfo,array('user_id'=>$this->_userId,'status'=>$status),false,'time,hostname,id,host_id,status,sex');
		foreach($data as $k => $v){
			$img = $this->find($this->_home_image,array('host_id'=>$v['host_id']));
			$data[$k]['img'] = $img['user_id'].'/'.$img['pic_name'];
		}
		$this->_loadHead();
		$this->load->view('home/House_List',array('user'=>$user,'data'=>$data,'status'=>$status));
		$this->_loadFoot();
	}

	/*用户中心——发布的住家*/
	public function HouseList(){
		$where = array('id'=>$this->_userId);
		$user = $this->find($this->_user,$where,true,'id,head_image,name_cn');
//		$data = $this->find($this->_home_info,array('user_id'=>$this->_userId),false,'title,order_id,state,house_type,issue_time,objection',array(),array(),'','',array(),array('field' => 'state','value' => array('1','2','3')));
		$data = $this->find($this->_HostInfo,array('user_id'=>$this->_userId),false,'time,hostname,id,host_id,status',array(),array(),'','',array(),array('field' => 'status','value' => array('2','3','4')));

		$this->_loadHead();
		$this->load->view('home/HouseList',array('user'=>$user,'data'=>$data));
		$this->_loadFoot();
	}
	/*用户中心——住家详情*/
	public function houseInfo(){
		$host_id = $this->input->get('oid','true');
		$where = array('id'=>$this->_userId);
		$user = $this->find($this->_user,$where,true,'id,head_image,name_cn');
		$data['hobbies'] = $this->find($this->_hobby,array(),false);
		$data['HostInfo'] = $this->find($this->_HostInfo,array('host_id'=>$host_id));
		$data['FamilyInfo'] = $this->find($this->_FamilyInfo,array('host_id'=>$host_id));
		$data['HomeInfo'] = $this->find($this->_home_info,array('host_id'=>$host_id));
		$data['MisInfo'] = $this->find($this->_MisInfo,array('host_id'=>$host_id));
		$data['HomeRule'] = $this->find($this->_home_rule,array('host_id'=>$host_id));
		$data['HomeImage'] = $this->find($this->_home_image,array('host_id'=>$host_id),false);
		$data['child'] = json_encode($data['FamilyInfo']['childinfo']);
		$data['rooms'] = json_encode($data['MisInfo']['bedroomInfo']);
		$data['user_id'] = $this->_userId;
		$data['state'] = $this->find($this->_state,'',false,'id,name_en');
		$data['city'] = $this->find($this->_city,'',false,'id,state_id,name_en');
		if(strstr($data['MisInfo']['hobby'],',')){
			$data['MisInfo']['hobby'] = explode(',',$data['MisInfo']['hobby']);
		}else{
			$data['MisInfo']['hobby'] = [$data['MisInfo']['hobby']];
		}


		$this->_loadHead();
		$this->load->view('home/HouseInfo',array('user'=>$user,'data'=>$data));
		$this->_loadFoot();

	}
	/* 用户中心——住家修改 */
	public function edit_houseinfo(){
		$order_id = $this->input->post('order_id',true);
		$type = $this->input->post('type',true);
		$houseres = $this->find($this->_house,array('order_id'=>$order_id),true,'id');
		if($type == 1){
			if($this->input->post('title',true)){
				$data['title'] = $house['title'] = $this->input->post('title',true);
				$this->update($this->_home_info,array('title'=>$data['title']),array('order_id'=>$order_id));
			}
			if($this->input->post('firstname',true)){
				$data['firstname'] = $this->input->post('firstname',true);
			}
			if($this->input->post('secondname',true)){
				$data['secondname'] = $this->input->post('secondname',true);
			}
			if($this->input->post('gender',true)){
				$data['gender'] = $this->input->post('gender',true);
			}
			if($this->input->post('brith',true)){
				$data['brith'] = $this->input->post('brith',true);
			}
			if($this->input->post('language',true)){
				$data['language'] = $house['language'] = $this->input->post('language',true);
			}
			if($this->input->post('race',true)){
				$data['race'] = $house['race'] = $this->input->post('race',true);
			}
			if($this->input->post('education',true)){
				$data['education'] = $this->input->post('education',true);
			}
			if($this->input->post('belief',true)){
				$data['belief'] = $house['belief'] = $this->input->post('belief',true);
			}
			if($this->input->post('job',true)){
				$data['job'] = $house['belief'] = $this->input->post('job',true);
			}


			if($houseres){
				if($house['title'] || $house['race'] || $house['belief'] || $house['job'] || $house['language']){
					$this->update($this->_house,$house,array('order_id'=>$order_id));
				}
			}
			$res1 = $this->update($this->_home_basic,$data,array('order_id'=>$order_id));
			if($res1){
				$this->json_ret(1);
			}
		}

		if($type == 2){
			if($this->input->post('income',true)){
				$data2['income'] = $this->input->post('income',true);
			}
			if($this->input->post('family_num',true)){
				$data2['family_num'] = $this->input->post('family_num',true);
			}
			if($this->input->post('smoking',true)){
				$data2['smoking'] = $this->input->post('smoking',true);
			}
			if($this->input->post('pet',true)){
				$data2['pet'] = $this->input->post('pet',true);
			}
			if($this->input->post('petinfo',true)){
				$data2['petinfo'] = $this->input->post('petinfo',true);
			}
			if($this->input->post('hobby',true)){
				$data2['hobby'] = $this->input->post('hobby',true);
			}
			$res2 = $this->update($this->_home_family,$data2,array('order_id'=>$order_id));
			if($res2){
				$this->json_ret(1);
			}
		}

		if($type == 3){
			if($this->input->post('area',true)){
				$data3['area'] = $this->input->post('area',true);
			}
			if($this->input->post('bedroom_num',true)){
				$data3['bedroom_num'] = $this->input->post('bedroom_num',true);
			}
			if($this->input->post('zipcode',true)){
				$data3['zipcode'] = $this->input->post('zipcode',true);
			}
			if($this->input->post('buildtime',true)){
				$data3['buildtime'] = $this->input->post('buildtime',true);
			}
			if($this->input->post('house_type',true)){
				$data3['house_type'] = $house3['house_type'] = $this->input->post('house_type',true);
			}
			if($this->input->post('ownership',true)){
				$data3['ownership'] = $this->input->post('ownership',true);
			}
			if($this->input->post('toilet_num',true)){
				$data3['toilet_num'] = $this->input->post('toilet_num',true);
			}
			if($this->input->post('wifi',true)){
				$data3['wifi'] = $this->input->post('wifi',true);
			}
			if($this->input->post('address',true)){
				$data3['address'] = $house3['address'] = $this->input->post('address',true);
			}
			if($this->input->post('city_id',true)){
				$data3['city_id'] = $house3['city_id'] = $this->input->post('city_id',true);
			}
			if($this->input->post('state_id',true)){
				$data3['state_id'] = $this->input->post('state_id',true);
			}
			if($houseres){
				if($house3['house_type'] || $house3['address'] || $house3['city_id']){
					$this->update($this->_house,$house3,array('order_id'=>$order_id));
				}
			}
			$res3 = $this->update($this->_home_info,$data3,array('order_id'=>$order_id));
			if($res3){
				$this->json_ret(1);
			}
		}

		if($type == 4){
			if($this->input->post('describe',true)){
				$data4['describe'] = $this->input->post('describe',true);
			}
			if($this->input->post('rule',true)){
				$data4['rule'] = $this->input->post('rule',true);
			}
			if($this->input->post('month_price',true)){
				$data4['month_price'] = $house4['price'] = $this->input->post('month_price',true);
			}
			if($this->input->post('payment',true)){
				$data4['payment'] = $this->input->post('payment',true);
			}
			if($this->input->post('deposit',true)){
				$data4['deposit'] = $this->input->post('deposit',true);
			}
			if($this->input->post('deposit_info',true)){
				$data4['deposit_info'] = $this->input->post('deposit_info',true);
			}
			if($this->input->post('price_include',true)){
				$data4['price_include'] = $this->input->post('price_include',true);
			}
			if($houseres){
				if($house4['price']){
					$this->update($this->_house,$house4,array('order_id'=>$order_id));
				}
			}
			$res4 = $this->update($this->_home_rule,$data4,array('order_id'=>$order_id));
			if($res4){
				$this->json_ret(1);
			}
		}


	}















	//我的住家需求详情
	public function requireDetail($id){
		$where = array('user_id'=>$this->_userId,'id'=>$id);
		$data = $this->find($this->_personal_tailor,$where,true);
		$state = $this->find($this->_state,array(),false,'id,name_cn,name_en');
		if ($data) {
			$city = $this->find($this->_city,array('id'=>$data['city_id']),true,'name_cn,name_en,state_id');
			$data = array_merge($data,$city);
			
			$this->load->helper('file_path');
			$language = $this->config->item('lang');
			$data['language'] = $language[$data['language']];
		}
		$where = array('id'=>$this->_userId);
		$user = $this->find($this->_user,$where,true,'id,head_image,name_cn');
		
		$this->_loadHead();
		$this->load->view('home/require_detail',array('user'=>$user,'data'=>$data,'language'=>@$language,'state'=>$state));
		$this->_loadFoot();
	}
	
	public function editProfile(){
		$where = array('id'=>$this->_userId);
		$update = array();
		$name_cn = $this->input->post('name_cn',true);
		if ($name_cn) {
			$update['name_cn'] = $name_cn;
		}
		$gender = $this->input->post('gender',true);
		if ($gender) {
			$update['gender'] = $gender;
		}
		$language = $this->input->post('language',true);
		if ($language) {
			$update['language'] = $language;
		}
		$birthday = $this->input->post('birthday',true);
		if ($birthday) {
			$update['birthday'] = $birthday;
		}
		$introduction = $this->input->post('introduction',true);
		if($introduction){
			$update['introduction'] = $introduction;
		}
		$userspeaking = $this->input->post('userspeaking',true);
		if($userspeaking){
			$update['userspeaking'] = $userspeaking;
		}
		$head_image = $this->input->post('head_image',true);
		if ($head_image) {
			$update['head_image'] = $head_image;
		}
		if ( !empty($update)) {
			$this->update($this->_user, $update, $where);
		}
		$this->json_ret(1);
		
	}
	
	function editRequire(){
		$id = $this->input->post('id',true);
		if (!$id) {
			$this->json_ret(0,'参数错误');
		}
		
		$where = array('id'=>$id,'user_id'=>$this->_userId);
		if (!$this->count($this->_personal_tailor, $where)) {
			$this->json_ret(0,'不能修改别人的订单');
		}
		
		
		$update = array();
		$city_id= $this->input->post('city_id',true);
		if ($city_id) {
			$update['city_id'] = $city_id;
		}
		$language = $this->input->post('language',true);
		if ($language) {
			$update['language'] = $language;
		}
		$language = $this->input->post('language',true);
		if ($language) {
			$update['language'] = $language;
		}
		$range_start = $this->input->post('range_start',true);
		if ($range_start) {
			$update['range_start'] = $range_start;
		}
		$range_end = $this->input->post('range_end',true);
		if ($range_end) {
			$update['range_end'] = $range_end;
		}
		$personal_like = $this->input->post('personal_like',true);
		if ($personal_like) {
			$update['personal_like'] = $personal_like;
		}
		
		$name = $this->input->post('name',true);
		if ($name) {
			$update['name'] = $name;
		}
		
		$phone = $this->input->post('phone',true);
		if ($phone) {
			$update['phone'] = $phone;
		}
		
		$email = $this->input->post('email',true);
		if ($email) {
			$update['email'] = $email;
		}
		
		if ( !empty($update)) {
			$update['update_time'] = date('Y-m-d H:i:s',time());
			$this->update($this->_personal_tailor, $update, $where);
		}
		$this->json_ret(1);
	}
	
	function loginOut(){
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_identity');
		$this->load->helper('url');
		redirect('/web/index');
	}
	
	function changePhone(){
		$mobile = $this->input->post('mobile');
		$authCode = $this->input->post('authCode');
		$sessionAuthCode = $this->session->login_auth_code;
		if (!$authCode || $authCode !=$sessionAuthCode) {
			$this->json_ret(0,'验证码不正确');
		}
		if (!$mobile) {
			$this->json_ret(0,'请输入手机号');
		}
		$this->update($this->_user, array('contact_phone'=>$mobile), array('id'=>$this->_userId));
		$this->session->unset_userdata('login_auth_code');
		$this->json_ret(1);
	}
	
	function uploadPic(){
		$this->load->helper('file_path');
		$name = time();
		$path = put_filepath_by_route_id($this->_userId,'');
		$path = ROOTPATH.'upload/'.$path;
		
		$this->load->model ( 'Common_model', 'mCommon' );
		$res = $this->mCommon->uploadPic ($path,$name,'pic');
		
		if ($res ['status']) {
			$ret = $this->format_ret ( 1, $res['msg']);
		} else {
			$ret = $this->format_ret ( 0, $res['msg']);
		}
		echo json_encode($ret);
		exit;
	}

	/* 用户删除发布的住家 */
	public function order_house_del(){
		$host_id = $this->input->post('order_id',true);
		$deleteInfo1 = $this->delete($this->_HostInfo,array('host_id'=>$host_id));
		$deleteInfo2 = $this->delete($this->_FamilyInfo,array('host_id'=>$host_id));
		$deleteInfo3 = $this->delete($this->_home_info,array('host_id'=>$host_id));
		$deleteInfo4 = $this->delete($this->_MisInfo,array('host_id'=>$host_id));
		$deleteInfo5 = $this->delete($this->_home_rule,array('host_id'=>$host_id));

		$deleteImg = $this->find($this->_home_image,array('host_id'=>$host_id),false,'user_id,pic_name');

		foreach ($deleteImg as $v){
			unlink('upload/userhome/'.$v['user_id'].'/'.$v['pic_name']);
		}

		$deleteInfo6 = $this->delete($this->_home_image,array('host_id'=>$host_id));

		$res = $this->find($this->_house,array('order_id'=>$host_id),true,'id');
		if($res){
			$this->delete($this->_house,array('id'=>$res['id']));
		}

		if($deleteInfo1 && $deleteInfo2 && $deleteInfo3 && $deleteInfo4 && $deleteInfo5 && $deleteInfo6){
			$this->json_ret(888);
		}

	}

	/*用户中心——账户设置——修改密码*/
	public function setting(){
		$this->_loadHead();
		$this->load->view('home/setting');
		$this->_loadFoot();
	}

	/*用户中心——账户设置——付款方式*/
	public function payment(){
		$where = array('id'=>$this->_userId);
		$user = $this->find($this->_user,$where,true,'payment');


		$this->_loadHead();
		$this->load->view('home/payment',$user);
		$this->_loadFoot();
	}

	/*用户中心——密码修改逻辑*/
	public function changePwd(){
		$old_pwd = $this->input->post('old_pwd',true);
		$new_pwd = $this->input->post('new_pwd',true);
		$checkPwd = $this->find($this->_user,array('id'=>$this->_userId),true,'password');
		if(md5($old_pwd) != $checkPwd['password']){
			$this->json_ret(488,'原密码错误');
			exit;
		}else{
			$res = $this->update($this->_user,array('password'=>md5($new_pwd)),array('id'=>$this->_userId));
			if($res){
				$this->json_ret(1,'密码修改成功');
			}
		}
	}

	/*用户中心——支付方式修改逻辑*/
	public function setPayment(){
		$payment = $this->input->post('payment',true);
		$res = $this->update($this->_user,array('payment'=>$payment),array('id'=>$this->_userId));
		if($res){
			$this->json_ret(1,'设置成功');
		}
	}
	
}
