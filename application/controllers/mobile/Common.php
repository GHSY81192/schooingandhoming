<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common extends CI_Controller {
	private $_userData;
	private $_en;
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$user_id = $this->session->user_id;
		//$user_id = 18;
		$method = $this->uri->segment(3,'');
		if ( strpos(@$_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {	//微信浏览器做跳转
			if (!$user_id && !in_array($method, array('login')) ){
				$this->load->helper('url');
				$url = @$_SERVER["REQUEST_URI"];
				redirect("/mobile/common/login?retUrl={$url}");
			}	
		}
		
		$this->_userData = $this->find($this->_user,array('id'=>$user_id),true,'head_image,name_cn');
	}
	
	//首页
	public function index(){
		$this->load->helper('file_path');
		$this->_loadMobileHead('Schooling Homing',true);
		//热门学校
		$school_type = $this->config->item('school_type');
		$hot_school = $this->find($this->_school,array('is_hot' => '1'),false,'id,city_id,name_cn,name_en,index_hot_cover,basic_school_type,financial_tuition',array('field' => 'sort' , 'type' => 'asc'));
		$hot_school = $this->_getSchoolData($hot_school);
		$data['hot_school'] = $hot_school;
		
		//热门住家
		$hot_house = $this->find($this->_house,array('is_hot' => '1'),false,'id,city_id,address,index_hot_cover,title,price',array('field' => 'id' , 'type' => 'asc'));
		$hot_house = $this->_getHouseData($hot_house);
		$data['hot_house'] = $hot_house;
		
		$hot_up = $this->find($this->_index_config,array('type !='=>'banner'),false,'*',array('field' => 'id' , 'type' => 'asc'));
		$data['hot_up'] = $hot_up;
		$banner = $this->find($this->_index_config,array('type' => 'mobile_banner'),false);
		$data['banner'] = $banner;
		//var_dump($data);
		$hot_down = $this->find($this->_index_config,array('type' => 'down'),false,'*',array('field' => 'id' , 'type' => 'asc'));
		$data['hot_down'] = $hot_down;
		$this->load->view('mobile/index',$data);

		$this->_loadMobileFoot(true,1,$this->_userData);
	}


	public function search(){
		$type = $this->input->get('type',true);
		if (!$type) {
			$type = 1;
		}
		$name = $this->input->get('name',true);
		$this->_loadMobileHead('搜索',false);
		$this->load->view('mobile/search',array('name'=>$name,'type'=>$type));
		$this->_loadMobileFoot();
	}
	public function ajaxSearch(){
		$this->load->model ( 'Common_model', 'mCommon' );
		$res = $this->mCommon->searchSchool();
		echo json_encode($res);
	}
	public function ajaxSearchHome(){
		$this->load->model ( 'Common_model', 'mCommon' );
		$res = $this->mCommon->searchHouse();
		echo json_encode($res);
	}

	public function searchResult(){
		$type = $this->input->get('type',true);
		$this->_loadMobileHead('搜索结果',true);
		$this->load->model ( 'Common_model', 'mCommon' );
		if ($type==2) {
			$res = $this->mCommon->searchHouse();
			$this->load->helper('file_path');
			$res['num_change'] = $this->config->item('num_change');
			$res['race'] = $this->config->item('race');
			$this->load->view('mobile/search_house_res',$res);
		}else{
			$res = $this->mCommon->searchSchool();
			$this->load->helper('file_path');
			$res['apList'] = $this->find($this->_school_ap_item,array(),false);
			$res['grade'] = $this->find('school_grade',array('is_show'=>1),false,'*',array(),array(),'', '',array(),array(),'type');
			//var_dump($res);
			$this->load->view('mobile/search_res',$res);
		}
		$this->_loadMobileFoot(false,2,$this->_userData,false);
	}
	public function searchMap(){
		$type = $this->input->get('type',true);
		$this->_loadMobileHead('搜索结果',false);
		$this->load->model ( 'Common_model', 'mCommon' );
		if ($type==2) {
			$res = $this->mCommon->searchHouse();
			$this->load->view('mobile/search_house_res_map',$res);
		}else{
			$res = $this->mCommon->searchSchool();
			$this->load->helper('file_path');
			$this->load->view('mobile/search_res_map',$res);
		}
		$this->_loadMobileFoot();
	}
	public function schoolDetail($school_id){
		$this->load->helper('file_path');
		$school = $this->find($this->_school,array('id' => $school_id));
		$school['contact_address_number'] = json_decode($school['contact_address_number'],true);
		if(!empty($school['city_id'])) {
			$city = $this->find($this->_city,array('id' => $school['city_id']));
			$state = $this->find($this->_state,array('id' => $city['state_id']));
			$state_code = $state['state_code'];
			$school['city_name'] = $city['name_cn'];
			$school['city_name_en'] = $city['name_en'];
			$school['state_code'] = $state_code;
		} else {
			$school['city_name'] = '';
			$school['state_code'] = '';
		}
		$school['basic_createtime'] = empty($school['basic_createtime']) ? '暂无' : substr($school['basic_createtime'],0,4);
		$school['basic_accept_international_students'] = $school['basic_accept_international_students'] == 0 ? '否' : '是';
		$school['apply_ssat'] = $school['apply_ssat'] == 0 ? '否' : '是';
		$school['teach_esl'] = $school['teach_esl'] == 0 ? '否' : '是';
		
		$cityLocation = array(
				'lng'=>'-118.22905141145563',
				'lat'=>'34.05633368635888'
		);
		if ( !empty($school['city_id']) ) {
			$cityLocation = $this->find($this->_city,array('id'=>$school['city_id']),true,'lng,lat');
		}
		$aps = $this->find($this->_school_ap,array('school_id' => $school['id']),false);
		if($aps != NULL):
			foreach($aps as $item):
				$ap_names[] = $this->find($this->_school_ap_item,array('id' => $item['ap_id']))['name'];
			endforeach;
			$school['ap_names'] = $ap_names;
		else:
			$school['ap_names'] = [];
		endif;
		
		$sports = $this->find($this->_school_sport_item,array('school_id' => $school['id']),false);
		if($sports != NULL):
			foreach($sports as $item):
				$sport_item_names[] = $this->find($this->_school_sport_item,array('id' => $item['sport_item_id']))['name'];
			endforeach;
			$school['sport_item_names'] = $sport_item_names;
		else:
			$school['sport_item_names'] = [];
		endif;
		
		$clubs = $this->find($this->_school_club,array('school_id' => $school['id']),false);
		if($clubs != NULL):
			foreach($clubs as $item):
				$club_names[] = $this->find($this->_school_club_item,array('id' => $item['club_id']))['name'];
			endforeach;
			$school['club_names'] = $club_names;
		else:
			$school['club_names'] = [];
		endif;
		
		$gds = $this->find($this->_school_graduate_direction,array('school_id' => $school['id']),false);
		if($gds != NULL):
			foreach($gds as $item):
				$gd_names[] = array('name'=>$this->config->item('school_graduate_direction_item')[$item['gd_id']],'count'=>$item['num']);
			endforeach;
			$school['gd_names'] = $gd_names;
		else:
			$school['gd_names'] = [];
		endif;
		
		$images = $this->find($this->_school_image,array('school_id' => $school['id']),false,'*',array('field' => 'sort' , 'type' => 'asc'),'',3);
		$school['images'] = $images;
		
		$suggest_house = $school['suggest_house'];
		if($suggest_house == NULL || strlen($suggest_house) == 0):
			$suggest_house_item = [];
		else:
		foreach(explode(',',$suggest_house) as &$item):
			$house = $this->find($this->_house,array('id' => $item));
			if($house != NULL):
				$city = $this->find($this->_city,array('id' => $house['city_id']));
				$city_name = $this->en ? $city['name_en'] : $city['name_cn'];
				$state = $this->find($this->_state,array('id' => $city['state_id']));
				$state_name = $this->en ? $state['name_en'] : $state['name_cn'];
				$house['location'] = $state_name . '，' . $city_name;
				$house['state_code'] = $state['state_code'];
				$suggest_house_item[] = $house;
			endif;
		endforeach;
			$suggest_house_item = array_slice($suggest_house_item,0,3);
		endif;
		$school['suggest_house_item'] = $suggest_house_item;

		/*推荐学校*/
		$recommend_schoolid = array(1307,189,17,3306,8411,9268,944,8180,9043,7859);
		$recommend_threeids = Array();
		for($i=0; $i<3; $i++){
			$a = rand(0,9);
			if(in_array($a,$recommend_threeids)){
				$i--;
			}else{
				array_push($recommend_threeids,$a);
			}
		}
		$s_ids = array($recommend_schoolid[$recommend_threeids[0]],$recommend_schoolid[$recommend_threeids[1]],$recommend_schoolid[$recommend_threeids[2]]);
		$res1 = $this -> find($this->_school,array('id'=>$s_ids[0]),true,"id,name_cn,name_en,city_id,index_hot_cover");
		$res1_info = $this-> find($this->_city,array('id'=>$res1['city_id']),true,'state_id');
		$res1['code'] = $this ->find($this->_state,array('id'=>$res1_info['state_id']),true,'state_code');

		$res2 = $this -> find($this->_school,array('id'=>$s_ids[1]),true,"id,name_cn,name_en,city_id,index_hot_cover");
		$res2_info = $this-> find($this->_city,array('id'=>$res2['city_id']),true,'state_id');
		$res2['code'] = $this ->find($this->_state,array('id'=>$res2_info['state_id']),true,'state_code');


		$res3 = $this -> find($this->_school,array('id'=>$s_ids[2]),true,"id,name_cn,name_en,city_id,index_hot_cover");
		$res3_info = $this-> find($this->_city,array('id'=>$res3['city_id']),true,'state_id');
		$res3['code'] = $this ->find($this->_state,array('id'=>$res3_info['state_id']),true,'state_code');

		$school['res1'] = $res1;
		$school['res2'] = $res2;
		$school['res3'] = $res3;


		$data['school_detail'] = $school;
		$data['cityLocation'] = $cityLocation;
		$this->_loadMobileHead(@$school['name_cn'],true);
		$this->load->view('mobile/school_detail',$data);
		$this->_loadMobileFoot(true,'',$this->_userData);
	}
	private function _getSchoolData($school){
		$this->load->helper('file_path');
		$school_type = $this->config->item('school_type');
		if (!empty($school)) {
			foreach($school as &$item){
				$city = $this->find($this->_city,array('id' => $item['city_id']));
				$city_name = $this->en ? $city['name_en'] : $city['name_cn'];
				$state = $this->find($this->_state,array('id' => $city['state_id']));
				$state_name = '';
				if ($state) {
					$state_name = $this->en ? $state['name_en'] : $state['name_cn'];
					$item['state_code'] = $state['state_code'];
				}
				$item['location'] = $city_name . '，' . $state_name;
			
				$item['basic_school_type'] = $school_type[$item['basic_school_type']];
				unset($item);
			}
			return $school;
		}
		return array();
	}
	private function _getHouseData($house){
		if (empty($house)) {
			return array();
		}
		foreach ($house as &$item){
			$city = $this->find($this->_city,array('id' => $item['city_id']));
			$city_name = $this->en ? $city['name_en'] : $city['name_cn'];
			$state = $this->find($this->_state,array('id' => $city['state_id']));
			$state_name = '';
			if ($state) {
				$state_name = $this->en ? $state['name_en'] : $state['name_cn'];
				$item['state_code'] = $state['state_code'];
			}
			$item['location'] = $city_name . '，' . $state_name;
			unset($item);
		}
		return $house;
	}
	public function houseDetail($house_id){
		$this->load->helper('file_path');
		$house = $this->find($this->_house,array('id' => $house_id));
		
		$city = $this->find($this->_city,array('id' => $house['city_id']));
		$city_name = $city['name_cn'];
		$state = $this->find($this->_state,array('id' => $city['state_id']));
		$state_name = $state['name_cn'];
		$house['location'] = $city_name;
		$house['location_en'] = $city['name_en'];
		
		$families = $this->count($this->_house_family,array('house_id' => $house['id']),false);
		$house['families'] = $families;
		$house['language'] = $this->config->item('lang')[$house['language']];
		
		$images = $this->find($this->_house_image,array('house_id' => $house['id']),false,'*',array('field' => 'sort' , 'type' => 'asc'),'',3);
		$house['images'] = $images;
		
		$house['house_create_time'] = date('Y年',strtotime($house['house_create_time']));
		$house['state_name'] = $state_name;
		$house['house_last_decorate'] = date('Y年',strtotime($house['house_last_decorate']));
		
		$rules = $this->find($this->_house_rule,array('house_id' => $house['id']),false);
		if($rules != NULL):
			foreach($rules as &$item):
				$rule_names[] = $this->find($this->_house_rule_item,array('id' => $item['rule_id']),true);
			endforeach;
			$house['rule_names'] = $rule_names;
		else:
			$house['rule_names'] = [];
		endif;
		
		$comments = $this->find($this->_house_comment,array('house_id' => $house['id']),false,'*',array('field' => 'create_time' , 'type' => 'desc'));
		if($comments != NULL):
			foreach($comments as &$item):
				$user = $this->find($this->_user,array('id' => $item['user_id']));
				$item['comment_time'] = date('Y年-m月-d日',strtotime($item['create_time']));
				$item['user'] = $user;
			endforeach;
			$house['comments'] = $comments;
		else:
			$house['comments'] = [];
		endif;
		
		$suggest_school = $house['suggest_school'];
		if($suggest_school == NULL || strlen($suggest_school) == 0):
			$suggest_school_item = [];
		else:
			foreach(explode(',',$suggest_school) as &$item):
				$school = $this->find($this->_school,array('id' => $item));
				if($school != NULL):
					$suggest_school_item[] = $school;
				endif;
			endforeach;
			$suggest_school_item = $this->_getSchoolData($suggest_school_item);
			$suggest_school_item = array_slice($suggest_school_item,0,3);
		endif;
		$house['suggest_school_item'] = $suggest_school_item;
		
		$data['house_detail'] = $house;
		//相似住家
		$otherHouse = $this->find($this->_house,array('id !='=>$house_id),false,'*',array(),array(),3);
		foreach ($otherHouse as &$item){
			$city = $this->find($this->_city,array('id' => $item['city_id']));
			$city_name = $this->en ? $city['name_en'] : $city['name_cn'];
			$state = $this->find($this->_state,array('id' => $city['state_id']));
			$state_name = $this->en ? $state['name_en'] : $state['name_cn'];
			$item['location'] = $state_name . '，' . $city_name;
			$item['state_code'] = $state['state_code'];
			unset($item);
		}
		$data['otherHouse'] = $otherHouse;
		$data['cityLocation'] = array(
				'lat' => $city['lat'],
				'lng' => $city['lng']
		);
		$this->_loadMobileHead(@$house['title'],true);
		$this->load->view('mobile/house_detail',$data);
		$this->_loadMobileFoot(true,'',$this->_userData);
	}
	
	public function personalTailor(){
		$this->load->helper('file_path');
		$user_id = $this->session->user_id;
		$user = array();
		if(isset($user_id)):
		$user = $this->find($this->_user,array('id' => $user_id));
		endif;
		
		$data['user'] = $user;
		$data['language'] = $this->config->item('lang');
		$state = $this->find($this->_state,array(),false,'id,name_cn,name_en');
		$data['state'] = $state;
		$this->_loadMobileHead('私人定制',false);
		$this->load->view('mobile/personal_tailor',$data);
		$this->_loadMobileFoot(false,'',$this->_userData);
	}
	public function sendAuthCode(){
		$mobile = $this->input->post('mobile',true);
		if (!$mobile) {
			$this->json_ret(0,'请输入手机号');
		}
		$this->load->library('SMS');
		$code = $this->sms->send_code($mobile);
		if ($code) {
			$this->session->set_userdata('login_auth_code',$code);
			$this->json_ret(1);
		}else{
			$this->json_ret(0,'发送失败请重试');
		}
	}
	public function submitTailor() {
		$name = $this->input->post('name',true);
		$phone = $this->input->post('phone',true);
		$email = $this->input->post('email',true);
		$city = $this->input->post('city',true);
		$language = $this->input->post('language',true);
		$personalLike = $this->input->post('personalLike',true);
		$rangeStart = $this->input->post('rangeStart',true);
		$rangeEnd = $this->input->post('rangeEnd',true);
		$sex = $this->input->post('sex',true);
		$age = $this->input->post('age',true);
		$school = $this->input->post('school',true);
		$user_id = $this->session->user_id;
		$source = $this->input->post('isWeixin',true);
		if (!$user_id) {
			$authCode = $this->input->post('authCode');
			$sessionAuthCode = $this->session->login_auth_code;
			if (!$authCode || $authCode !=$sessionAuthCode) {
				$this->json_ret(0,'验证码不正确');
			}
			$user = $this->find($this->_user,array('phone' => $phone));
			if(empty($user)) {
				$data = array(
						'name_cn' => $name,
						'name_en' => $name,
						'phone' => $phone,
						'contact_phone' => $phone,
						'contact_email' => $email,
						'create_time' => date('Y-m-d H:i:s',time()),
						'vip_time' => date('Y-m-d',time()),
				);
				if ($sex) {
					$data['gender'] = $sex;
				}
				$user_id = $this->insert($this->_user, $data);
			} else {
				$user_id = $user['id'];
			}
			$this->session->set_userdata('user_id',$user_id);
		}else{
			$user = $this->find($this->_user,array('id'=>$user_id));
			$updateUser = array(
					'vip_time'=>$user['create_time']
			);
			if($email){
				$updateUser['contact_email']  =$email;
			}
			if($phone){
				$updateUser['phone']  =$phone;
				$updateUser['contact_phone']  =$phone;
			}
			if($sex){
				$updateUser['gender']  =$sex;
			}
			if ($language) {
				$updateUser['language'] = $language;
			}
			$this->update($this->_user, $updateUser, array('id'=>$user_id));
		}
	
		$data = array(
				'user_id' => $user_id,
				'city_id' => $city,
				'language' => $language,
				'range_start' => $rangeStart,
				'range_end' => $rangeEnd,
				'personal_like' => $personalLike,
				'create_time' => date('Y-m-d H:i:s',time()),
				'status' => 0,
				'name' => $name,
				'phone' => $phone,
				'email' => $email,
				'sex' => $sex,
				'age' => $age,
				'school' => $school,
				'source' => $source,
		);
		$insert_id = $this->insert($this->_personal_tailor, $data);
		$sexName = '未知';
		if ($sex == 1) {
			$sexName = '男';
		}elseif ($sex == 2){
			$sexName = '女';
		}
		
		$msg = '有私人定制订单,请登录后台查看:姓名'.$name.';性别:'.$sexName.';年龄:'.$age.';手机号：'.$phone.';邮箱：'.$email.';预算范围:'.$rangeStart.'-'.$rangeEnd.';所在学校:'.$school;
		if ($city) {
			$cityData = $this->find($this->_city,array('id'=>$city),true,'name_cn,state_id');
			$state = $this->find($this->_state,array('id'=>$cityData['state_id']),true,'name_cn');
			$msg.=';意向地区:'.@$state['name_cn'].'-'.@$cityData['name_cn'];
		}
		if ($personalLike) {
			$msg .=';个人偏好:'.$personalLike;
		}
		$this->load->model('weixin_model', 'mWeixin');
		$this->mWeixin->sendTextMsgToUser('odX6qvx7u509z3NJmQFjO-H4m9zQ',$msg);
		$this->mWeixin->sendTextMsgToUser('odX6qv_5DZOjfn0wn2prMOpHx3HY',$msg);
		$this->mWeixin->sendTextMsgToUser('odX6qvxn4VJ9jQ7QEyAesmikAGQU',$msg);
		
		$order_id = time() . $insert_id;
	
		$updateData = array('order_id' => $order_id);
		$where = array('id' => $insert_id);
		$this->update($this->_personal_tailor,$updateData,$where);
		$this->json_ret(1);
	}


	public function userlogin($msg=''){
		$data['msg'] = $msg;
		$data['type'] = $this->input->get('type',true);
		$data['lessonId'] = $this->input->get('lessonId',true);
		$this->load->view('mobile/login',$data);
	}
	public function SMS_login($msg=''){
		$data['msg'] = $msg;
		$data['type'] = $this->input->get('type',true);
		$data['lessonId'] = $this->input->get('lessonId',true);
		$this->load->view('mobile/SMSlogin',$data);
	}
	public function user_check_login(){
		$user = trim($this->input->post('user',true));
		$pwd = $this->input->post('password',true);
		$mobile = $this->input->post('userPhone',true);
		$code = $this->input->post('code',true);
		$type = $this->input->post('type',true);
		$lessonId = $this->input->post('lessonId',true);
		//普通登录验证
		if($user){
			if(strstr($user,'@')){
				$res = $this->find($this->_user,array('email'=>$user),true,'id,password,identity');
			}else{
				$res = $this->find($this->_user,array('tel'=>$user),true,'id,password,identity');
			}
			if(!$res || $res['password'] != md5($pwd)){
				$this->userlogin('账号密码错误');
			}else{
				$this->session->set_userdata('user_id',$res['id']);
				$this->session->set_userdata('user_identity',$res['identity']);

				if($type == 'lesson'){
					redirect('/mobile/common/LessonDetail/'.$lessonId);
				}elseif($type == 'camp'){
					redirect('/web/CampDetail/'.$lessonId);
				}else{
					redirect('/mobile/home');
				}
			}
		}
		//手机动态登录验证
		if($mobile){
			$sessionAuthCode = $this->session->login_auth_code;
			if($code != $sessionAuthCode){
				$this->SMS_login('验证码错误');
			}
			$user = $this->find($this->_user,array('phone'=>$mobile),true,'id');
			if ($user) {
				$user_id = $user['id'];
			}else{
				$data = array(
					'phone' => $mobile,
					'tel' => $mobile,
					'name_cn' => $mobile,
					'name_en' => $mobile,
					'contact_phone' => $mobile,
					'create_time' => date('Y-m-d',time()),
					'vip_time' => date('Y-m-d',time()),
				);
				$user_id = $this->insert($this->_user, $data);
			}
			$this->session->set_userdata('user_id',$user_id);
			$this->session->unset_userdata('login_auth_code');
			if($type == 'lesson'){
				redirect('/mobile/common/LessonDetail/'.$lessonId);
			}else{
				redirect('/mobile/home');
			}
		}

	}
	//注册页面
	public function sign_in(){
		$this->load->view('mobile/sign_in');
	}
	public function register(){
		$email = trim($this->input->post('email',true));
		$pwd = $this->input->post('pwd',true);
		if($email){
			$res = $this->find($this->_user,array('email'=>$email));
			if($res){
				$this->json_ret(555);
			}else{
				$data['email'] = $email;
				$data['password'] = md5($pwd);
				$data['create_time'] = date('Y-m-d H:i:s',time());
				$data['md5mail'] = md5($email);
				$adduser = $this->insert($this->_user,$data);
				if($adduser){
					//发送邮件的链接地址  将邮箱md5后传输给页面
					$content = 'www.schoolingandhoming.com/mobile/common/checkemail?email='.md5($data['email']).'&inp='.md5(time());
					$this->email163($data['email'],$content);
					$result = $this->insert($this->_user,$data);
					if($result){
						$this->json_ret(100);
					}

				}
			}
		}
	}


	/* 发送邮件验证 */
	function email163($mail,$content){
		$email='您好！<br />感谢您注册schoolingandhoming.com。<br />您的登录邮箱为：'.$mail.'。请点击以下链接激活账号：<br /><br />
		<a target="_blank" href="https://'.$content.'">'.$content.'</a><br /><br />如果以上链接无法点击，请将上面的地址复制到您浏览器（如IE）的地址栏进入';
		$this->load->library('email');
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.163.com';
		$config['smtp_user'] = '13817632112';  //你的邮箱名称
		$config['smtp_pass'] = 'zjw112258';   //你的邮箱发送密码
		$config['mailtype'] = 'html';
		$config['validate'] = true;
		$config['smtp_port'] = 25;
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		$this->email->from('13817632112@163.com', '仕荟教育');//你的邮箱
		$this->email->to($mail);  //收件人的邮箱
		$this->email->subject('schoolingandhoming邮箱激活');  //发送标题
		$this->email->message("$email");  //发送的内容

		if($this->email->send()){
			return 'yes';
		}else{
			return 'no';
		}
	}

	/* 邮件验证 */
	public function checkemail(){
		$mail = $this->input->get('email',true);
		$check = $this->find($this->_user,array('md5mail'=>$mail));
		if($check){
			$data['activate'] = 1;
			$data['name_cn'] = $check['email'];
			$data['name_en'] = $check['email'];
			$data['contact_email'] = $check['email'];
			$res = $this->update($this->_user,$data,array('id'=>$check['id']));
			if($res){
				$this->session->set_userdata('user_id',$check['id']);
				$this->load->view('/mobile/checksuccess');
			}
		}
	}


	
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

	public function ShowSpecial(){
		$this->load->helper('file_path');
		$data['school'] = $this->find($this->_school,array(),false,'id,name_cn,name_en,index_hot_cover',array(),array(),'','',array(),array('field' => 'id','value' => array('7859','8411','9043','9268','944','8180','21307','20969','7881','21303','21459','21306')));
		$this->_loadMobileHead('Schooling Homing', true);
		$this->load->view('mobile/ShowSpecial',$data);
		$this->_loadMobileFoot(true,1,$this->_userData);
	}

	public function searchService(){
		$this->load->helper('file_path');
		$data['list'] = $this->find($this->_service,'',false,'id,service_name,model,object,time_start,time_end,price');
		$this->_loadMobileHead('Schooling Homing', true);
		$this->load->view('mobile/Servicelist',$data);
		$this->_loadMobileFoot(true,1,$this->_userData);
	}
	public function serviceDetail(){
		$this->load->helper('file_path');
		$id = $this->input->get('id',true);
		$data = $this->find($this->_service,array('id'=>$id));
		$this->_loadMobileHead('Schooling Homing', true);
		$this->load->view('mobile/serviceDetail',$data);
		$this->_loadMobileFoot(true,1,$this->_userData);
	}
	public function message(){
		$id = $this->input->get('id',true);
		$data['info'] = $this->find($this->_service,array('id'=>$id),true,'id,service_name');
		$this->load->view('web/message',$data);
	}
	/* 课程咨询 */
	public function consult($type){
		$user_id = $this->session->user_id;
		if($user_id){
			$data = $this->find($this->_user,array('id'=>$user_id),true,'id,phone');
		}
		$data['type'] = $type;
		$this->load->view('web/consult',$data);
	}
	/* 获取课程咨询信息 */
	public function getConsult(){
		$data['user_id'] = $this->input->post('user_id',true);
		if(!$data['user_id']){
			$authCode = $this->input->post('code',true);
			$sessionAuthCode = $this->session->login_auth_code;
			if ($authCode !=$sessionAuthCode) {
				$this->json_ret(0,'验证码不正确');
			}
		}

		$data['type']       = $this->input->post('type',true);
		$data['name']	    = $this->input->post('name',true);
		$data['tel']	    = $this->input->post('tel',true);
		$data['message']    = $this->input->post('message',true);
		$data['time']       = time();
		$res = $this->insert($this->_lesson_consult,$data);
		if($res){
			$this->session->unset_userdata('login_auth_code');
			$this->json_ret(888,'提交成功');
		}else{
			$this->json_ret(444,'提交失败，请重试！');
		}
	}



	/* 衔接课程 */
	public function LessonList(){
		$this->load->helper('file_path');
		$index = $this->input->get('per_page',true);
		$url = 'Common/mobile/LessonList';
		$res = $this->findPageData($this->_lesson,$url,array(),10,$index,array(),array(),'desc');
		$data['list'] = $res;
		$data['count'] = count($res);

		$this->_loadMobileHead('衔接课程',true);
		$this->load->view('mobile/LessonList',$data);
		$this->_loadMobileFoot();
	}

	public function LessonDetail($id){
		$this->load->helper('file_path');
		$data = $this->find($this->_lesson,array('id'=>$id));
		if($data['classtime']){
			if(strstr($data['classtime'],'|')){
				$data['classtime'] = explode('|',$data['classtime']);
			}
		}
		$this->_loadMobileHead('Schooling Homing', true);
		$this->load->view('mobile/LessonDetail',$data);
		$this->_loadMobileFoot(true,1,$this->_userData);
	}



	public function classPeopleNum(){
		$classtime = $this->input->post('data',true);
		$id = $this->input->post('id',true);
		$num = $this->count($this->_order,array('subject_id'=>$id,'is_pay'=>8,'classtime'=>$classtime));
		$this->json_ret($num);
	}

	/* 暑期项目 */
	public function SummerList(){
		$this->load->helper('file_path');
		$data['school'] = $this->find($this->_summer,array(),false,'id,name_cn,name_en,img',array(),array(),6);
		$this->_loadMobileHead('暑期项目',true);
		$this->load->view('mobile/SummerList',$data);
		$this->_loadMobileFoot();
	}
	public function SummerDetail($id){
		$this->load->helper('file_path');
		$data = $this->find($this->_summer,array('id'=>$id));
		$school= $this->find($this->_summer,array(),false,'id');
		$totleNum = count($school)-1;
		$school_id = Array();
		for($i=0;$i<3;$i++){
			$a = rand(0,$totleNum);
			if(in_array($a,$school_id) || $school[$a]['id'] == $id){
				$i--;
			}else{
				array_push($school_id,$a);
			}
		}
		$data['school']= $this->find($this->_summer,array(),false,'id,img,name_cn',array(),array(),'','',array(),array('field'=>'id','value'=>array($school_id[0]+1,$school_id[1]+1,$school_id[2]+1)));
		$this->_loadMobileHead('暑期项目',true);
		$this->load->view('mobile/SummerDetail',$data);
		$this->_loadMobileFoot();
	}
	public function SummerMore(){
		$this->load->helper('file_path');
		$index = $this->input->get('per_page',true);
		$url = 'Common/mobile/SummerMore';
		$res = $this->findPageData($this->_summer,$url,array(),6,$index,array(),array(),'desc');
		$data['list'] = $res;
		$data['count'] = count($res);
		$this->_loadMobileHead('暑期项目',true);
		$this->load->view('mobile/SummerMore',$data);
		$this->_loadMobileFoot();
	}
	public function ajaxSearchSummer(){

		$index = $this->input->get('index',true);
		$index = $index * 6;
		$url = 'Common/mobile/SummerMore';
		$res = $this->findPageData($this->_summer,$url,array(),6,$index,array(),array(),'desc');
		echo json_encode($res);
	}

	public function checkorder(){
		$this->load->helper('file_path');
		$lessonId = $this->input->get('lessonId',true);
		$sessionUserID=$this->session->user_id;
		if(!$sessionUserID){
			$this->load->helper('url');
			redirect('/mobile/common/userlogin?type=lesson&lessonId='.$lessonId);
		}

		$userinfo = $this->find($this->_user,array('id'=>$sessionUserID),true,'phone');
		$data['phone'] = $userinfo['phone'];

		$res = $this->find($this->_lesson,array('id'=>$lessonId),true,'id,name,price,once_price');

		//订单编号
		$data['orderID'] = 'SH'.date('YmdHis',time()).rand(1000,9999);
		//课程名称
		$data['lessonName'] = $res['name'];
		//课程价格
		$data['price'] = $this->input->get('price',true);
		//授课时间
		$data['classtime'] = $this->input->get('classtime',true);

		if($data['price'] == $res['once_price']){
			//课程套餐
			$data['type'] = '小班课程';
		}else{
			$data['type'] = '1对1课程';
		}
		//课程id
		$data['lessonId'] = $res['id'];
		//判断是否是微信浏览器
		$data['is_weixin'] = $this->is_weixin();

		$this->_loadMobileHead('衔接课程',true);
		$this->load->view('mobile/checkorder',$data);
		$this->_loadMobileFoot();
	}

	public function finishOrder(){
		$this->load->helper('file_path');
		$this->_loadMobileHead('schoolingandhoming',true);
		$this->load->view('/mobile/finishOrder');
		$this->_loadMobileFoot();
	}

	/*验证客户手机是否正确*/
	public function checkUserPhone(){
		$phone = $this->input->post('phone',true);
		$code = $this->input->post('code',true);
		$user_id=$this->session->user_id;
		$sessionAuthCode = $this->session->login_auth_code;

		if($code != $sessionAuthCode){
			$this->json_ret(444,'验证码错误');
		}else{
			$data['phone'] = $phone;
			$data['contact_phone'] = $phone;
			$this->update($this->_user,$data,array('id'=>$user_id));
			$this->session->unset_userdata('login_auth_code');
			$this->json_ret(100);
		}
	}

	function is_weixin(){
		if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
			return true;
		}
		return false;
	}

	public function USLesson(){
		$this->load->helper('file_path');
		$this->_loadMobileHead('Schooling and Homing',true);
		$this->load->view('/web/USLesson');
		$this->_loadMobileFoot();
	}


	/*goelite 微信用户申请*/
	public function goelite_consult(){
		$this->load->view('web/goelite_apply_account');
	}
	/*
	 * 	获取goelite用户申请信息
	 *	返回701：验证码不正确
	 *  返回702：用户手机已经申请过了
	 * 	返回703：账号分配完了
	 *  返回888：申请成功
	 *  返回444：网络原因，申请失败
	*/
	public function get_goelite_consult(){
		$authCode = $this->input->post('code',true);
		$sessionAuthCode = $this->session->login_auth_code;
		if ($authCode !=$sessionAuthCode) {
			$this->json_ret(701,'验证码不正确');
		}
		$data['name']	    = $this->input->post('name',true);
		$data['tel']	    = $this->input->post('tel',true);
		$data['email']	    = $this->input->post('email',true);
		$data['msg']        = $this->input->post('message',true);
		$data['time']       = date('Y-m-d H:i:s',time());

		$checktel = $this->find($this->_goelite_user,array('tel'=>$data['tel']),true,'tel');
		if($checktel['tel']){
			$this->json_ret(702,'您已经申请过账号了');
		}else{
			$res = $this->insert($this->_goelite_user,$data);
			$account = $this->find($this->_goelite,array('userid'=>NULL),true);
			if($account){
				$this->update($this->_goelite,array('userid'=>$res),array('id'=>$account['id']));
			}else{
				$this->json_ret(703,'试用账户暂无');
			}

			if($res){
				$this->session->unset_userdata('login_auth_code');
				$this->json_ret(888,$account['account']);
			}else{
				$this->json_ret(444,'提交失败，请重试！');
			}
		}
	}

	public function forget_goelite_account(){
		$this->load->view('web/forget_goelite_account');
	}
	public function get_forget_goelite_consult(){
		$tel = $this->input->post('tel',true);
		$rs = $this->find($this->_goelite_user,array('tel'=>$tel),true,'id');
		$data = $this->find($this->_goelite,array('userid'=>$rs['id']),true,'account');
		if($data){
			$this->json_ret(888,$data['account']);
		}else{
			$this->json_ret(444,'该手机号未申请到试用账号');
		}
	}

}