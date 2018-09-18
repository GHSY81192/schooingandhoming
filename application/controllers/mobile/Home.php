<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	private $_userData;
	private $_userId;
	public function __construct(){
		parent::__construct();
		$this->load->helper('file_path');
		$this->_userId = $this->session->user_id;
		//$this->_userId = 18;
		if ( strpos(@$_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {	//微信浏览器做跳转
			if (!$this->_userId){
				$this->load->helper('url');
				$url = @$_SERVER["REQUEST_URI"];
				redirect("/mobile/common/login?retUrl={$url}");
			}
		}
		$this->_userData = $this->find($this->_user,array('id'=>$this->_userId));
	}
	
	//主页
	public function index()
	{
		$language = $this->config->item('lang');
		$this->_loadMobileHead('个人中心',true);
		$this->load->view('mobile/user',array('user'=>$this->_userData));
		$this->_loadMobileFoot(false,'',$this->_userData);
	}

	
	public function userInfo(){
		$language = $this->config->item('lang');
		$this->_loadMobileHead('个人资料',false);
		$personal = $this->find($this->_personal_tailor,array('user_id' => $this->_userId));
		$this->load->view('mobile/user_info',array('userData'=>$this->_userData,'language'=>$language,'personal' => $personal));
		$this->_loadMobileFoot(false,'',$this->_userData);
	}
	public function editUserInfo(){
		$language = $this->config->item('lang');
		$this->_loadMobileHead('编辑个人资料',false);
		$this->load->view('mobile/edituserInfo',array('userData'=>$this->_userData,'language'=>$language));
		$this->_loadMobileFoot(false,'',$this->_userData);
	}
	//我的住家需求详情
	public function requireDetail($id){
		$where = array('user_id'=>$this->_userId,'id'=>$id);
		$data = $this->find($this->_personal_tailor,$where,true);
		$state = $this->find($this->_state,array(),false,'id,name_cn,name_en');
		if ($data) {
			$location = '';
			$city = $this->find($this->_city,array('id'=>$data['city_id']),true,'name_cn,name_en,state_id');
			$location = @$city['name_cn'];
			if ( !empty($city['state_id']) ) {
				$state = $this->find($this->_state,array('id'=>$city['state_id']),true,'name_cn');
				$location = $state['name_cn'].','.$location;
			}
			$data['location'] = $location;
			
			$this->load->helper('file_path');
			$language = $this->config->item('lang');
			$data['language'] = $language[$data['language']];
		}
		
		$this->_loadMobileHead('需求详情');
		$this->load->view('mobile/requireDetail',array('data'=>$data,'state'=>$state));
		$this->_loadMobileFoot(false,'',$this->_userData);
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
		$contact_email = $this->input->post('contact_email',true);
		if ($contact_email) {
			$update['contact_email'] = $contact_email;
		}
		$birthday = $this->input->post('birthday',true);
		if ($birthday) {
			$update['birthday'] = $birthday;
		}
		$vip_time = $this->input->post('vip_time',true);
		if ($vip_time) {
			$update['vip_time'] = $vip_time;
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
		redirect('/mobile/common/index');
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
		$path= $filePath = put_filepath_by_route_id($this->_userId,'');
		$path = ROOTPATH.'upload/'.$path;
		
		$this->load->model ( 'Common_model', 'mCommon' );
		$res = $this->mCommon->uploadPic ($path,$name,'file');
		
		if ($res ['status']) {
			$ret = $this->format_ret ( 1, array('path'=>'/upload/'.$filePath,'res'=>$res['msg']));
		} else {
			$ret = $this->format_ret ( 0, $res['msg']);
		}
		echo json_encode($ret);
		exit;
	}

	public function mylessons($pay){
		$this->_userId = $this->session->user_id;
		if(!$pay){
			$pay = 8;
		}
		$order = $this->find($this->_order,array('is_pay'=>$pay,'user_id'=>$this->_userId),false,'order_id,price,subject,subject_id,time');
		foreach($order as $k =>$v){
			if(strstr($v['order_id'],'camp')){
				$o1 = $this->find($this->_camp,array('id'=>$v['subject_id']),true,'img');

				if(strpos($o1['img'],'|')){
					$img = substr($o1['img'],0,strpos($o1['img'],'|'));
				}else{
					$img = $o1['img'];
				}

				$order[$k]['img'] = '/public/images/web/camp/'.$img;
				$order[$k]['ahref'] = '/web/CampDetail/'.$v['subject_id'];
			}else{
				$o2 = $this->find($this->_lesson,array('id'=>$v['subject_id']),true,'img,author');
				$order[$k]['img'] = '/public/images/web/lesson/images/'.$o2['img'];
				$order[$k]['author'] = $o2['author'];
				$order[$k]['ahref'] = '/mobile/Common/LessonDetail/'.$v['subject_id'];
			}
		}



//		$order = $this->db->select('a.subject,a.subject_id,a.price,a.is_pay,b.img,b.author,a.time')
//			->from($this->_order.' as a')
//			->where(array('a.user_id'=>$this->_userId,'a.is_pay'=>$pay))
//			->join($this->_lesson.' as b','a.subject_id = b.id')
//			->get()
//			->result_array();
			$this->load->view("mobile/Mylessons",array('status'=>$pay,'order'=>$order));
	}


	public function UserAdvice($msg=''){
		$this->load->view('mobile/UserAdvice',array('msg'=>$msg));
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

	/* 账号设置 */
	public function userSetting(){
		$where = array('id'=>$this->_userId);
		$user = $this->find($this->_user,$where,true,'payment');
		$this->load->view('mobile/userSetting',$user);
	}

	/* 我的订制 */
	public function MyRequireList(){
//		$where = array('id'=>$this->_userId);
		$data['list'] = $this->find($this->_personal_tailor,array('user_id'=>$this->_userId),false,'id,order_id,create_time,status');
		$this->load->view('mobile/MyRequireList',$data);
	}
	/* 私人订制详情页 */
	public function MyRequire($id){

		$data = $this->find($this->_personal_tailor,array('id'=>$id));
		$city = $this->find($this->_city,array('id'=>$data['city_id']),true,'name_cn');
		$data['city'] = ($city['name_cn']?$city['name_cn']:'其他');
		$language = $this->config->item('lang');
		$data['language'] = $language[$data['language']];
		$this->load->view('mobile/MyRequire',$data);
	}

	/* 我的消息列表 */
	public function MyMessage(){
		$data['list'] = $this->find($this->_site_reply,array('user_id'=>$this->_userId,'is_continue'=>2),false);
		$this->load->view('mobile/MyMessage',$data);
	}

	/* 我的消息详情 */
	public function Msg_con($id){
		$data = $this->find($this->_site_reply,array('id'=>$id));
		if($data['is_read'] == '1'){
			$this->update($this->_site_reply,array('is_read'=>'2'),array('id'=>$id));
		}
		$old_data = $this->find($this->_lesson_consult,array('id'=>$data['replyId']),true,'message,id');
		$data['old_data'] = $old_data['message'];
		$data['old_id'] = $old_data['id'];

		$nx = $this->find($this->_lesson_consult,array('next'=>$data['replyId']),false,'',array('field' => 'id' , 'type' => 'asc'));
		$answer = $this->find($this->_site_reply,array('is_continue'=>1),false);
		$this->load->view('mobile/MyMessageInfo',array('user'=>$this->_userData,'data'=>$data,'nx'=>$nx,'answer'=>$answer));
	}

	/*继续提问*/
	public function continue_question(){
		$data['next'] = $this->input->post('id',true);
		$data['message'] = $this->input->post('value',true);
		$data['type'] = 2;
		$data['time'] = time();
		$data['user_id'] = $this->_userId;
		$rs = $this->insert($this->_lesson_consult,$data);
		if($rs){
			$this->json_ret(888);
		}
	}


	/* 我的收藏 */
	public function MyCollect(){
		$this->load->view('mobile/MyCollect');
	}




	//我的私人订制列表
	public function requireList(){
		$where = array('id'=>$this->_userId);
		$user = $this->find($this->_user,$where,true,'id,head_image,name_cn');
		$data = $this->find($this->_personal_tailor,array('user_id'=>$this->_userId),false);
		$newData = array();
		if (!empty($data)) {
			foreach ($data as $val){
				$time = date('Y年m月',strtotime($val['create_time']));
				$newData[$time][] = $val;
			}
		}
		$this->_loadMobileHead('我的需求',true);
		$this->load->view('mobile/requireList',array('user'=>$user,'data'=>$newData));
		$this->_loadMobileFoot(false,'',$this->_userData);
	}


	
}
