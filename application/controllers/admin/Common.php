<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {
	private $_userId;
	
	public function __construct(){
		parent::__construct();

		//登录拦截
		$current_method = $this->router->method;
		$not_intercept_arr = array('login','logout');
		$username = $this->session->userdata('sf_name');
		if(empty($username) && !in_array($current_method,$not_intercept_arr)) {
			header("Location: /admin/common/login");
		}
	}
	
	public function login(){
		exit;
		if ($this->input->post('do_login')){
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);
	
			if($username =='home' && $password == 'school') {
				$this->session->set_userdata('sf_id', 1);
				$this->session->set_userdata('sf_name', $username);
				$ret_data = array('status'=>1);
			} else {
				$ret_data = array('status'=>0);
			}
			echo json_encode($ret_data);
		} else {
			$this->load->view('admin/header',array('isLoginPage' => true));
			$this->load->view('admin/user/login');
			$this->load->view('admin/footer');
		}
	}

	public function logout(){
		$this->session->unset_userdata('sf_id');
		$this->session->unset_userdata('sf_name');
		header("Location: /admin/common/login");
	}

	public function main(){
		$this->load->view('admin/header');
		$this->load->view('admin/nav');
		$this->load->view('admin/main');
		$this->load->view('admin/footer');
	}

	public function user_mgr(){
		$like = array();
		if($this->input->get('phone')) {
			$like[] = array('field' => 'phone','name' => $this->input->get('phone'));
		}
		if($this->input->get('name')) {
			$like[] = array('field' => 'name_cn','name' => $this->input->get('name'));
			$like[] = array('field' => 'name_en','name' => $this->input->get('name'));
		}

		$this->load->helper('file_path');
		$index = $this->input->get('per_page',true);
		$url = '/admin/common/user_mgr?phone='.$this->input->get('phone').'&name='.$this->input->get('name');
		$data = $this->findPageData($this->_user, $url, array(), 15,$index,$like);
		$language = $this->config->item('lang');
		$gender = $this->config->item('gender');
		foreach($data as &$item) {
			$item['language'] = $language[$item['language']];
			$item['gender'] = $gender[$item['gender']];
			unset($item);
		}

		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('user_mgr' =>  true));
		$this->load->view('admin/user_mgr/list',array('data'=>$data));
		$this->load->view('admin/footer');
	}

	public function school_mgr(){
		exit;
		$like = $where = $where_in = array();
		if($this->input->get('name')) {
			$like[] = array('field' => 'name_cn','name' => $this->input->get('name'));
			$like[] = array('field' => 'name_en','name' => $this->input->get('name'));
		}
		if($this->input->get('city')) {
			$city_ids = array();
			$city1 = $this->find($this->_city,array('name_cn'=>$this->input->get('city')),false);
			$city2 = $this->find($this->_city,array('name_en'=>$this->input->get('city')),false);
			$city = array_merge($city1,$city2);
			if(!empty($city)) {
				foreach($city as $item) {
					$city_id[] = $item['id'];
				}
			}
			if(!empty($city_id)) {
				$where_in = array('field' => 'city_id','value' => $city_id);
			}
		}
		if($this->input->get('state')) {
			$state1 = $this->find($this->_state,array('name_cn'=>$this->input->get('state')),false);
			$state2 = $this->find($this->_state,array('name_en'=>$this->input->get('state')),false);
			$state = array_merge($state1,$state2);
			if(!empty($state)) {
				foreach($state as $item) {
					$state_id[] = $item['id'];
				}
			}
			if(!empty($state_id)) {
				$where_in = array('field' => 'state_id','value' => $state_id);
			}
		}
		if($this->input->get('id')) {
			$where = array('id' => $this->input->get('id'));
		}
		if($this->input->get('is_hot') && $this->input->get('is_hot') > 0) {
			$where = array('is_hot' => $this->input->get('is_hot'));
		}

		$this->load->helper('file_path');
		$index = $this->input->get('per_page',true);
		$url = '/admin/common/school_mgr?name='.$this->input->get('name').'&city='.$this->input->get('city').'&state='.$this->input->get('state').'&id='.$this->input->get('id').'&is_hot='.$this->input->get('is_hot');
		$data = $this->findPageData($this->_school, $url, $where, 15,$index,$like,$where_in);
		$school_type = $this->config->item('school_type');
		foreach($data as &$item) {
			$city_id = $item['city_id'];
			if(!empty($city_id)) {
				$city = $this->find($this->_city,array('id' => $city_id));
				$city_name = $this->en ? $city['name_en'] : $city['name_cn'];
				$state = $this->find($this->_state,array('id' => $city['state_id']));
				$state_name = $this->en ? $state['name_en'] : $state['name_cn'];
				$item['city_name'] = $state_name . ',' . $city_name;
			} else {
				$item['city_name'] = '';
			}
			$item['school_type'] = $school_type[$item['basic_school_type']];
			unset($item);
		}

		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('school_mgr' =>  true));
		$this->load->view('admin/school_mgr/list',array('data'=>$data));
		$this->load->view('admin/footer');
	}

	public function school_edit() {
		$this->load->helper('file_path');
		$data = array();
		$school_id = $this->input->get('id',true);

		$school = $this->find($this->_school,array('id' => $school_id));
		$json = json_decode($school['contact_address_number'],true);
		$school['address'] = $json['address'];
		$school['number'] = $json['number'];

		//city
		$state = $this->find($this->_state,array(),false);
		$data['state'] = $state;

		$data['school_type'] = $this->config->item('school_type');

		//school_ap
		$aps_result = array();
		$aps_item = $this->find($this->_school_ap_item,array(),false);
		$aps = $this->find($this->_school_ap,array('school_id' => $school_id),false);
		if(!empty($aps)) {
			foreach($aps_item as $item) {
				$aps_result[] = array('key' => $item['id'],'value' => $item['name'],'is_selected' => $this->_is_selected_ap($item['id'],$aps));
			}
		} else {
			foreach($aps_item as $item) {
				$aps_result[] = array('key' => $item['id'],'value' => $item['name'],'is_selected' => false);
			}
		}
		$data['aps_result'] = $aps_result;

		//school_sport
		$sports_result = array();
		$sports_item = $this->find($this->_school_sport_items,array(),false);
		$sports = $this->find($this->_school_sport_item,array('school_id' => $school_id),false);
		if(!empty($sports)) {
			foreach($sports_item as $item) {
				$sports_result[] = array('key' => $item['id'],'value' => $item['name'],'is_selected' => $this->_is_selected_sport($item['id'],$sports));
			}
		} else {
			foreach($sports_item as $item) {
				$sports_result[] = array('key' => $item['id'],'value' => $item['name'],'is_selected' => false);
			}
		}
		$data['sports_result'] = $sports_result;

		//school_club
		$clubs_result = array();
		$clubs_item = $this->find($this->_school_club_item,array(),false);
		$clubs = $this->find($this->_school_club,array('school_id' => $school_id),false);
		if(!empty($clubs)) {
			foreach($clubs_item as $item) {
				$clubs_result[] = array('key' => $item['id'],'value' => $item['name'],'is_selected' => $this->_is_selected_club($item['id'],$clubs));
			}
		} else {
			foreach($clubs_item as $item) {
				$clubs_result[] = array('key' => $item['id'],'value' => $item['name'],'is_selected' => false);
			}
		}
		$data['clubs_result'] = $clubs_result;

		//school_graduate_direction
		$gds_result = array();
		$gds_item = $this->config->item('school_graduate_direction_item');
		$gds = $this->find($this->_school_graduate_direction,array('school_id' => $school_id),false);
		if(!empty($gds)) {
			foreach($gds_item as $k => $v) {
				$ret = $this->_is_selected_gd($k,$gds);
				$gds_result[] = array('key' => $k,'value' => $v,'is_selected' => $ret['is_selected'],'num' => $ret['num']);
			}
		} else {
			foreach($gds_item as $k => $v) {
				$gds_result[] = array('key' => $k,'value' => $v,'is_selected' => false,'num' => 0);
			}
		}
		$data['gds_result'] = $gds_result;

		//image
		$images = $this->find($this->_school_image,array('school_id' => $school_id),false);
		$data['images'] = $images;
		$data['school'] = $school;
		$data['school_grade'] = $this->find($this->_school_grade,array(),false,'*',array('field' => 'id' , 'type' => 'asc'));
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('school_mgr' =>  true));
		$this->load->view('admin/school_mgr/edit',$data);
		$this->load->view('admin/footer');
	}

	public function school_create() {
		$data = array();
		$state = $this->find($this->_state,array(),false);
		$data['state'] = $state;
		$data['school_type'] = $this->config->item('school_type');
		$data['aps_item'] = $this->find($this->_school_ap_item,array(),false);
		$data['sports_item'] = $this->find($this->_school_sport_items,array(),false);
		$data['clubs_item'] = $this->find($this->_school_club_item,array(),false);
		$gds = $this->config->item('school_graduate_direction_item');
		$gds_item = array();
		foreach($gds as $k => $v) {
			$gds_item[] = array('key' => $k,'value' => $v,'is_selected' => false,'num' => 0);
		}
		$data['gds_item'] = $gds_item;

		$data['school_grade'] = $this->find($this->_school_grade,array(),false,'*',array('field' => 'id' , 'type' => 'asc'));

		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('school_mgr' =>  true));
		$this->load->view('admin/school_mgr/create',$data);
		$this->load->view('admin/footer');
	}

	public function submit_school() {
		$action = $this->input->post('action',true);
		$name_cn = $this->input->post('name_cn',true);
		$name_en = $this->input->post('name_en',true);
		$url = $this->input->post('url',true);
		$city_id = $this->input->post('city_id',true);
		$zip_code = $this->input->post('zip_code',true);
		$address = empty($this->input->post('address',true)) ? '' : $this->input->post('address',true);
		$number = empty($this->input->post('number',true)) ? '' : $this->input->post('number',true);
		$contact_address_number = json_encode(array('address' => $address,'number' => $number));
		$intro = $this->input->post('intro',true);
		$basic_school_type = $this->input->post('basic_school_type',true);
		$basic_grade_start = $this->input->post('basic_grade_start',true);
		$basic_grade_end = $this->input->post('basic_grade_end',true);
		$basic_createtime = $this->input->post('basic_createtime',true);
		$basic_school_enrollments = $this->input->post('basic_school_enrollments',true);
		$basic_accept_international_students = $this->input->post('basic_accept_international_students',true);
		$basic_issue_i20 = $this->input->post('basic_issue_i20',true);
		$basic_school_area = $this->input->post('basic_school_area',true);
		$basic_proportion_of_individuals = $this->input->post('basic_proportion_of_individuals',true);
		$basic_religious_tendency = $this->input->post('basic_religious_tendency',true);
		$apply_deadline = $this->input->post('apply_deadline',true);
		$apply_ssat = $this->input->post('apply_ssat',true);
		$apply_sat_avg = $this->input->post('apply_sat_avg',true);
		$apply_link_email = $this->input->post('apply_link_email',true);
		$teach_pupil_ratio = $this->input->post('teach_pupil_ratio',true);
		$teach_class_avg = $this->input->post('teach_class_avg',true);
		$teach_esl = $this->input->post('teach_esl',true);
		$teach_edu_scale = $this->input->post('teach_edu_scale',true);
		$financial_contribute = $this->input->post('financial_contribute',true);
		$financial_tuition = $this->input->post('financial_tuition',true);
		$is_hot = $this->input->post('is_hot',true);
		$sort = $this->input->post('sort',true);
		$lng = $this->input->post('lng',true);
		$lat = $this->input->post('lat',true);
		$suggest_house = $this->input->post('suggest_house',true);
		$financial_tuition_remark = $this->input->post('financial_tuition_remark',true);
		$apply_cost = $this->input->post('apply_cost',true);
		$after_school_care = $this->input->post('after_school_care',true);
		$sat_read = $this->input->post('sat_read',true);
		$sat_math = $this->input->post('sat_math',true);
		$sat_write = $this->input->post('sat_write',true);
		$exam_req1 = $this->input->post('exam_req1',true);
		$exam_req2 = $this->input->post('exam_req2',true);
		$exam_req3 = $this->input->post('exam_req3',true);

		if($action == 'create') {
			$insertData = array(
				'name_cn' => $name_cn,
				'name_en' => $name_en,
				'url' => $url,
				'city_id' => $city_id,
				'zip_code' => $zip_code,
				'contact_address_number' => $contact_address_number,
				'intro' => $intro,
				'basic_school_type' => $basic_school_type,
				'basic_grade_start' => $basic_grade_start,
				'basic_grade_end' => $basic_grade_end,
				'basic_createtime' => $basic_createtime.'-01-01 00:00:00',
				'basic_school_enrollments' => $basic_school_enrollments,
				'basic_accept_international_students' => $basic_accept_international_students,
				'basic_issue_i20' => $basic_issue_i20,
				'basic_school_area' => $basic_school_area,
				'basic_proportion_of_individuals' => $basic_proportion_of_individuals,
				'basic_religious_tendency' => $basic_religious_tendency,
				'apply_deadline' => $apply_deadline,
				'apply_ssat' => $apply_ssat,
				'apply_sat_avg' => $apply_sat_avg,
				'apply_link_email' => $apply_link_email,
				'teach_pupil_ratio' => $teach_pupil_ratio,
				'teach_class_avg' => $teach_class_avg,
				'teach_esl' => $teach_esl,
				'teach_edu_scale' => $teach_edu_scale,
				'financial_contribute' => $financial_contribute,
				'financial_tuition' => $financial_tuition,
				'is_hot' => $is_hot,
				'sort' => $sort,
				'lng' => $lng,
				'lat' => $lat,
				'suggest_house' => $suggest_house,
				'update_time' => date('Y-m-d H:i:s',time()),
				'create_time' => date('Y-m-d H:i:s',time()),
				'apply_cost' => $apply_cost,
				'after_school_care' => $after_school_care,
				'sat_read' => $sat_read,
				'sat_math' => $sat_math,
				'sat_write' => $sat_write,
				'exam_req1' => $exam_req1,
				'exam_req2' => $exam_req2,
				'exam_req3' => $exam_req3,
				'financial_tuition_remark' => $financial_tuition_remark
			);

			$id = $this->insert($this->_school,$insertData);

			$ap_ids = $this->input->post('ap_ids',true);
			if(!empty($ap_ids)) {
				foreach(explode(',',$ap_ids) as $ap_id) {
					$this->insert($this->_school_ap,array('school_id' => $id,'ap_id' => $ap_id));
				}
			}

			$sport_ids = $this->input->post('sport_ids',true);
			if(!empty($sport_ids)) {
				foreach(explode(',',$sport_ids) as $sport_item_id) {
					$this->insert($this->_school_sport_item,array('school_id' => $id,'sport_item_id' => $sport_item_id));
				}
			}

			$club_ids = $this->input->post('club_ids',true);
			if(!empty($club_ids)) {
				foreach(explode(',',$club_ids) as $club_id) {
					$this->insert($this->_school_club,array('school_id' => $id,'club_id' => $club_id));
				}
			}

			$gd_ids = $this->input->post('gd_ids');
			if(!empty($gd_ids)) {
				foreach(explode(',',$gd_ids) as $gd_id) {
					$this->insert($this->_school_graduate_direction,array('school_id' => $id,'gd_id' => $gd_id,'num' => $this->input->post('gd_' . $gd_id)));
				}
			}

			$this->load->helper('file_path');
			$name = microtime(true);
			$path = put_filepath_by_route_id($id,'');
			$path = ROOTPATH.'upload/'.$path;
			$this->load->model ( 'Common_model', 'mCommon' );
			$res = $this->mCommon->uploadPic ($path,$name,'cover');
			if ($res ['status']) {
				$this->update($this->_school, array('cover'=>$res['msg']), array('id'=>$id));
			}

			$name = microtime(true);
			$res = $this->mCommon->uploadPic ($path,$name,'cover_mobile');
			if ($res ['status']) {
				$this->update($this->_school, array('cover_mobile'=>$res['msg']), array('id'=>$id));
			}

			$name = microtime(true);
			$res = $this->mCommon->uploadPic ($path,$name,'index_hot_cover');
			if ($res ['status']) {
				$this->update($this->_school, array('index_hot_cover'=>$res['msg']), array('id'=>$id));
			}

			for($i=1;$i<=5;$i++) {
				$name = microtime(true);
				$res = $this->mCommon->uploadPic ($path,$name,'image_'.$i);
				if ($res ['status']) {
					$this->insert($this->_school_image, array('school_id' => $id,'file_name' => $res['msg'],'file_type' => 1,'sort' => 0,'create_time' => date('Y-m-d H:i:s',time())));
				}
			}

			$path = put_filepath_by_route_id(0,'');
			$path = ROOTPATH.'upload/'.$path;
			$name = 'school_logo_' . $id;
			$res = $this->mCommon->uploadPic ($path,$name,'school_logo');
			if ($res ['status']) {
				$this->update($this->_school, array('school_logo'=>$res['msg']), array('id'=>$id));
			}

			$this->updateSchoolStateIdAndApNum($id);
			$this->_updateSatAvg($id);



			header("Location: /admin/common/school_mgr");
		}
		if($action == 'update') {
			$id = $this->input->post('id',true);
			
			$updateData = array(
				'name_cn' => $name_cn,
				'name_en' => $name_en,
				'url' => $url,
				'city_id' => $city_id,
				'zip_code' => $zip_code,
				'contact_address_number' => $contact_address_number,
				'intro' => $intro,
				'basic_school_type' => $basic_school_type,
				'basic_grade_start' => $basic_grade_start,
				'basic_grade_end' => $basic_grade_end,
				'basic_createtime' => $basic_createtime.'-01-01 00:00:00',
				'basic_school_enrollments' => $basic_school_enrollments,
				'basic_accept_international_students' => $basic_accept_international_students,
				'basic_issue_i20' => $basic_issue_i20,
				'basic_school_area' => $basic_school_area,
				'basic_proportion_of_individuals' => $basic_proportion_of_individuals,
				'basic_religious_tendency' => $basic_religious_tendency,
				'apply_deadline' => $apply_deadline,
				'apply_ssat' => $apply_ssat,
				'apply_sat_avg' => $apply_sat_avg,
				'apply_link_email' => $apply_link_email,
				'teach_pupil_ratio' => $teach_pupil_ratio,
				'teach_class_avg' => $teach_class_avg,
				'teach_esl' => $teach_esl,
				'teach_edu_scale' => $teach_edu_scale,
				'financial_contribute' => $financial_contribute,
				'financial_tuition' => $financial_tuition,
				'is_hot' => $is_hot,
				'sort' => $sort,
				'lng' => $lng,
				'lat' => $lat,
				'suggest_house' => $suggest_house,
				'update_time' => date('Y-m-d H:i:s',time()),
				'apply_cost' => $apply_cost,
				'after_school_care' => $after_school_care,
				'sat_read' => $sat_read,
				'sat_math' => $sat_math,
				'sat_write' => $sat_write,
				'exam_req1' => $exam_req1,
				'exam_req2' => $exam_req2,
				'exam_req3' => $exam_req3,
				'financial_tuition_remark' => $financial_tuition_remark
			);
			$where = array('id' => $id);

			$this->update($this->_school,$updateData,$where);

			$ap_ids = $this->input->post('ap_ids',true);
			$this->delete($this->_school_ap,array('school_id' => $id));
			if(!empty($ap_ids)) {
				foreach(explode(',',$ap_ids) as $ap_id) {
					$this->insert($this->_school_ap,array('school_id' => $id,'ap_id' => $ap_id));
				}
			}

			$sport_ids = $this->input->post('sport_ids',true);
			$this->delete($this->_school_sport_item,array('school_id' => $id));
			if(!empty($sport_ids)) {
				foreach(explode(',',$sport_ids) as $sport_item_id) {
					$this->insert($this->_school_sport_item,array('school_id' => $id,'sport_item_id' => $sport_item_id));
				}
			}

			$club_ids = $this->input->post('club_ids',true);
			$this->delete($this->_school_club,array('school_id' => $id));
			if(!empty($club_ids)) {
				foreach(explode(',',$club_ids) as $club_id) {
					$this->insert($this->_school_club,array('school_id' => $id,'club_id' => $club_id));
				}
			}

			$gd_ids = $this->input->post('gd_ids');
			$this->delete($this->_school_graduate_direction,array('school_id' => $id));
			if(!empty($gd_ids)) {
				foreach(explode(',',$gd_ids) as $gd_id) {
					$this->insert($this->_school_graduate_direction,array('school_id' => $id,'gd_id' => $gd_id,'num' => $this->input->post('gd_' . $gd_id)));
				}
			}

			$this->load->helper('file_path');
			$name = microtime(true);
			$path = put_filepath_by_route_id($id,'');
			$path = ROOTPATH.'upload/'.$path;
			$this->load->model ( 'Common_model', 'mCommon' );
			$res = $this->mCommon->uploadPic ($path,$name,'cover');


			if ($res ['status']) {
				$this->update($this->_school, array('cover'=>$res['msg']), array('id'=>$id));
			}

			$name = microtime(true);
			$res = $this->mCommon->uploadPic ($path,$name,'cover_mobile');
			if ($res ['status']) {
				$this->update($this->_school, array('cover_mobile'=>$res['msg']), array('id'=>$id));
			}

			$name = microtime(true);
			$res = $this->mCommon->uploadPic ($path,$name,'index_hot_cover');
			if ($res ['status']) {
				$this->update($this->_school, array('index_hot_cover'=>$res['msg']), array('id'=>$id));
			}

			$delete_image_ids = $this->input->post('delete_image_ids',true);
			if(!empty($delete_image_ids)) {
				foreach(explode(',',$delete_image_ids) as $image_id) {
					$this->delete($this->_school_image,array('id' => $image_id));
				}
			}
			for($i=1;$i<=5;$i++) {
				$name = microtime(true);
				$res = $this->mCommon->uploadPic ($path,$name,'image_'.$i);
				if ($res ['status']) {
					$this->insert($this->_school_image, array('school_id' => $id,'file_name' => $res['msg'],'file_type' => 1,'sort' => 0,'create_time' => date('Y-m-d H:i:s',time())));
				}
			}

			$path = put_filepath_by_route_id(0,'');
			$path = ROOTPATH.'upload/'.$path;
			$name = 'school_logo_' . $id;
			$res = $this->mCommon->uploadPic ($path,$name,'school_logo');
			if ($res ['status']) {
				$this->update($this->_school, array('school_logo'=>$res['msg']), array('id'=>$id));
			}

			$this->updateSchoolStateIdAndApNum($id);
			$this->_updateSatAvg($id);



			header("Location: /admin/common/school_mgr");
		}
	}

	private function updateSchoolStateIdAndApNum($school_id) {
		$school = $this->find($this->_school,array('id' => $school_id),true);
		$city_id = $school['city_id'];
		if(!empty($city_id)) {
			$city = $this->find($this->_city,array('id' => $city_id),true);
			$state_id = $city['state_id'];
			$this->update($this->_school,array('state_id' => $state_id),array('id' => $school_id));
		}
		$aps = $this->find($this->_school_ap,array('school_id' => $school_id),false);
		$this->update($this->_school,array('ap_num' => count($aps)),array('id' => $school_id));
	}

	/*public function batchUpdateSchoolStateIdAndApNum() {
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		$school = $this->find($this->_school,array(),false);
		foreach($school as $item) {
			$id = $item['id'];
			$this->updateSchoolStateIdAndApNum($id);
		}
	}*/

	public function school_delete() {
		$id = $this->input->get('id',true);
		$this->delete($this->_school_ap,array('school_id' => $id));
		$this->delete($this->_school_club,array('school_id' => $id));
		$this->delete($this->_school_graduate_direction,array('school_id' => $id));
		$this->delete($this->_school_image,array('school_id' => $id));
		$this->delete($this->_school_sport_item,array('school_id' => $id));
		$this->delete($this->_school,array('id' => $id));
		$this->json_ret(1);
	}

	public function school_import() {
		$data = array();
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('school_mgr' =>  true));
		$this->load->view('admin/school_mgr/school_import',$data);
		$this->load->view('admin/footer');
	}

	public function school_export() {
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		$this->load->helper('file_path');
		$this->load->library('PHPExcel');
		$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_in_memory_gzip;
		$cacheSettings = array();
		PHPExcel_Settings::setCacheStorageMethod($cacheMethod,$cacheSettings);

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getActiveSheet()->getStyle('A1:AW1')->getFont()->setBold(true);
		$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A1', '名称（中文）')
				->setCellValue('B1', '名称（英文）')
				->setCellValue('C1', '网址')
				->setCellValue('D1', '城市')
				->setCellValue('E1', '邮编')
				->setCellValue('F1', '联系地址')
				->setCellValue('G1', '联系电话')
				->setCellValue('H1', '简介')
				->setCellValue('I1', '学校类型')
				->setCellValue('J1', '学校年级（开始）')
				->setCellValue('K1', '学校年级（结束）')
				->setCellValue('L1', '建校时间')
				->setCellValue('M1', '在校人数')
				->setCellValue('N1', '是否接收国际学生')
				->setCellValue('O1', '是否发送I-20')
				->setCellValue('P1', '校园面积')
				->setCellValue('Q1', '有色人种学生比例')
				->setCellValue('R1', '宗教倾向')
				->setCellValue('S1', '申请截至日期')
				->setCellValue('T1', '是否要求SSAT')
				->setCellValue('U1', '平均SAT')
				->setCellValue('V1', '联系招办')
				->setCellValue('W1', '师生比')
				->setCellValue('X1', '平均班级大小')
				->setCellValue('Y1', '是否提供ESL')
				->setCellValue('Z1', '学士以上教职人员比例')
				->setCellValue('AA1', '校友捐赠')
				->setCellValue('AB1', '学费/年')
				->setCellValue('AC1', '经度')
				->setCellValue('AD1', '纬度')
				->setCellValue('AE1', '申请费用')
				->setCellValue('AF1', 'AP')
				->setCellValue('AG1', '运动项目')
				->setCellValue('AH1', '学生社团')
				->setCellValue('AI1', '是否提供课后辅导')
				->setCellValue('AJ1', 'SAT阅读')
				->setCellValue('AK1', 'SAT数学')
				->setCellValue('AL1', 'SAT写作')
				->setCellValue('AM1', '考试要求（小学）')
				->setCellValue('AN1', '考试要求（初中）')
				->setCellValue('AO1', '考试要求（高中）')
				->setCellValue('AP1', '州')
				->setCellValue('AQ1', 'ID')
				->setCellValue('AR1', '添加时间')
				->setCellValue('AS1', '更新时间')
				->setCellValue('AT1', '封面图片路径')
				->setCellValue('AU1', '是否首页推荐')
				->setCellValue('AV1', '关联住家')
				->setCellValue('AW1', '学费备注');

		$school_type = $this->config->item('school_type');
		$school = $this->find($this->_school,array(),false, "*",array(),array(),5,5);
		$idx = 2;
		foreach($school as $item) {
			$objPHPExcel->getActiveSheet(0)->setCellValue('A' . $idx, $item['name_cn']);//名称（中文）
			$objPHPExcel->getActiveSheet(0)->setCellValue('B' . $idx, $item['name_en']);//名称（英文)
			$objPHPExcel->getActiveSheet(0)->setCellValue('C' . $idx, $item['url']);//网址
			$city = $this->find($this->_city,array('id' => $item['city_id']));//城市
			if(!empty($city)) {
				$objPHPExcel->getActiveSheet(0)->setCellValue('D' . $idx, $city['name_en']);
			} else {
				$objPHPExcel->getActiveSheet(0)->setCellValue('D' . $idx, '');
			}
			$objPHPExcel->getActiveSheet(0)->setCellValue('E' . $idx, $item['zip_code']);
			$contact_address_number = $item['contact_address_number'];
			if(!empty($contact_address_number)){
				$contact_address_number = json_decode($contact_address_number,true);
				$address = $contact_address_number['address'];
				$number = $contact_address_number['number'];
				$objPHPExcel->getActiveSheet(0)->setCellValue('F' . $idx, $address);
				$objPHPExcel->getActiveSheet(0)->setCellValue('G' . $idx, $number);
			} else {
				$objPHPExcel->getActiveSheet(0)->setCellValue('F' . $idx, '');
				$objPHPExcel->getActiveSheet(0)->setCellValue('G' . $idx, '');
			}
			$objPHPExcel->getActiveSheet(0)->setCellValue('H' . $idx, $item['intro']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('I' . $idx, $school_type[$item['basic_school_type']]);
			$objPHPExcel->getActiveSheet(0)->setCellValue('J' . $idx, $item['basic_grade_start']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('K' . $idx, $item['basic_grade_end']);
			$basic_createtime = $item['basic_createtime'];
			if(!empty($basic_createtime)) {
				$basic_createtime = substr($basic_createtime,0,4);
			} else {
				$basic_createtime = '';
			}
			$objPHPExcel->getActiveSheet(0)->setCellValue('L' . $idx, $basic_createtime);
			$objPHPExcel->getActiveSheet(0)->setCellValue('M' . $idx, $item['basic_school_enrollments']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('N' . $idx, $item['basic_accept_international_students'] == 1 ? '是':'否');
			$objPHPExcel->getActiveSheet(0)->setCellValue('O' . $idx, $item['basic_issue_i20'] == 1 ? '是':'否');
			$objPHPExcel->getActiveSheet(0)->setCellValue('P' . $idx, $item['basic_school_area']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('Q' . $idx, $item['basic_proportion_of_individuals']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('R' . $idx, $item['basic_religious_tendency']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('S' . $idx, $item['apply_deadline']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('T' . $idx, $item['apply_ssat'] == 1 ? '是':'否');
			$objPHPExcel->getActiveSheet(0)->setCellValue('U' . $idx, $item['apply_sat_avg']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('V' . $idx, $item['apply_link_email']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('W' . $idx, $item['teach_pupil_ratio']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('X' . $idx, $item['teach_class_avg']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('Y' . $idx, $item['teach_esl'] == 1 ? '是':'否');
			$objPHPExcel->getActiveSheet(0)->setCellValue('Z' . $idx, $item['teach_edu_scale']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('AA' . $idx, $item['financial_contribute']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('AB' . $idx, $item['financial_tuition']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('AC' . $idx, $item['lng']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('AD' . $idx, $item['lat']);

			$objPHPExcel->getActiveSheet(0)->setCellValue('AE' . $idx, $item['apply_cost']);

			$aps = $this->find($this->_school_ap,array('school_id' => $item['id']),false);
			$ap_val = '';
			if(!empty($aps)) {
				foreach($aps as $v) {
					$ap = $this->find($this->_school_ap_item,array('id' => $v['ap_id']));
					$ap_arr[] = @$ap['name'];
				}
				$ap_val = implode(',',$ap_arr);
			}
			$objPHPExcel->getActiveSheet(0)->setCellValue('AF' . $idx, $ap_val);

			$sports = $this->find($this->_school_sport_item,array('school_id' => $item['id']),false);
			$sport_val = '';
			if(!empty($sport_val)) {
				foreach($sports as $v) {
					$sport_arr = $this->find($this->_school_sport_item,array('id' => $v['sport_item_id']))['name'];
				}
				$sport_val = implode(',',$sport_arr);
			}
			$objPHPExcel->getActiveSheet(0)->setCellValue('AG' . $idx, $sport_val);

			$clubs = $this->find($this->_school_club,array('school_id' => $item['id']),false);
			$club_val = '';
			if(!empty($club_val)) {
				foreach($clubs as $v) {
					$club_arr = $this->find($this->_school_club_item,array('id' => $v['club_id']))['name'];
				}
				$club_val = implode(',',$club_arr);
			}
			$objPHPExcel->getActiveSheet(0)->setCellValue('AH' . $idx, $club_val);
			$objPHPExcel->getActiveSheet(0)->setCellValue('AI' . $idx, $item['after_school_care']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('AJ' . $idx, $item['sat_read']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('AK' . $idx, $item['sat_math']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('AL' . $idx, $item['sat_write']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('AM' . $idx, $item['exam_req1']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('AN' . $idx, $item['exam_req2']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('AO' . $idx, $item['exam_req3']);
			$state = $this->find($this->_state,array('id' => $item['state_id']));
			$state_code = @$state['state_code'];
			$objPHPExcel->getActiveSheet(0)->setCellValue('AP' . $idx, $state_code);

			$objPHPExcel->getActiveSheet(0)->setCellValue('AQ' . $idx, $item['id']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('AR' . $idx, $item['create_time']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('AS' . $idx, $item['update_time']);
			if(empty($item['index_hot_cover'])) {
				$objPHPExcel->getActiveSheet(0)->setCellValue('AT' . $idx, '');
			} else {
				$objPHPExcel->getActiveSheet(0)->setCellValue('AT' . $idx, '/upload/' . get_filepath_by_route_id($item['id'],$item['index_hot_cover']));
			}
			$objPHPExcel->getActiveSheet(0)->setCellValue('AU' . $idx, $item['is_hot']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('AV' . $idx, $item['suggest_house']);
			$objPHPExcel->getActiveSheet(0)->setCellValue('AW' . $idx, $item['financial_tuition_remark']);
			$idx++;
		}
		
// 		$finalFileName = ROOTPATH.'upload/'.time().'.xls';
// 		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
// 		$objWriter->save($finalFileName);
		
// 		echo file_get_contents($finalFileName);
		
		header("Content-Type: application/force-download"); 
        header("Content-Type: application/octet-stream"); 
        header("Content-Type: application/download");
    	header('Content-Disposition: inline;filename=school_export.xlsx');
		header("Content-Transfer-Encoding: binary"); 
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
        header("Pragma: no-cache");
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    	$objWriter->save('php://output');
    	
	}


	/*批量上传逻辑*/
	public function school_import_submit() {
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		if (!empty($_FILES)) {
			if (!empty($_FILES['file']['name'] )) {
				$file = $_FILES['file']['tmp_name'];
				$this->load->library('PHPExcel');
				$filename = $file;
				$objReader = PHPExcel_IOFactory::createReaderForFile($filename);
				$objPHPExcel = $objReader->load($filename);
				$currentSheet = $objPHPExcel->getSheet(0);
				$allColumn = $currentSheet->getHighestColumn();
				$allRow = $currentSheet->getHighestRow();

				$insert = array(
						'name_cn',									//名称（中文）
						'name_en',									//名称（英文）
						'url',										//网址
						'city',										//城市
						'zip_code',									//邮编
						'address',									//联系地址
						'number',									//联系电话
						'intro',									//简介
						'basic_school_type',						//学校类型
						'basic_grade_start',						//学校年级（开始）
						'basic_grade_end',							//学校年级（结束）
						'basic_createtime',							//建校时间
						'basic_school_enrollments',					//在校人数
						'basic_accept_international_students',		//是否接收国际学生
						'basic_issue_i20',							//是否发送I-20
						'basic_school_area',						//校园面积
						'basic_proportion_of_individuals',			//有色人种学生比例
						'basic_religious_tendency',					//宗教倾向
						'apply_deadline',							//申请截至日期
						'apply_ssat',								//是否要求SSAT
						'apply_sat_avg',							//平均SAT
						'apply_link_email',							//联系招办
						'teach_pupil_ratio',						//师生比
						'teach_class_avg',							//平均班级大小
						'teach_esl',								//是否提供ESL
						'teach_edu_scale',							//学士以上教职人员比例
						'financial_contribute',						//校友捐赠
						'financial_tuition',						//学费/年
						'lng',										//经度
						'lat',										//纬度
						'apply_cost',								//申请费用
						'aps',										//AP项目
						'sports',									//体育项目
						'clubs',									//学生社团
						'after_school_care',						//是否提供课后辅导
						'sat_read',									//SAT阅读
						'sat_math',									//SAT数学
						'sat_write',								//SAT写作
						'exam_req1',								//考试要求（小学）
						'exam_req2',								//考试要求（中学）
						'exam_req3',								//考试要求（高中）
						'state_code',								//州
						'id',										//ID
						'create_time',
						'update_time',
						'index_hot_cover',
						'is_hot',
						'suggest_house',
						'financial_tuition_remark'
				);
				$data = array();
				for($currentRow = 2; $currentRow<=$allRow; $currentRow++){
					$key = 0;
					for($currentColumn=PHPExcel_Cell::columnIndexFromString('A'); $currentColumn<=PHPExcel_Cell::columnIndexFromString('AW'); $currentColumn++){
						$address = PHPExcel_Cell::stringFromColumnIndex($currentColumn - 1).$currentRow;
						$val = $currentSheet->getCell($address)->getValue();
						if($val instanceof PHPExcel_RichText){
							$val = $val->__toString();
						}
						$lineData[$insert[$key]] = $val;
						$key++;
					}
					$data[] = $lineData;
				}
				$school_type = $this->config->item('school_type');
				foreach($data as &$item) {
					$item['city_id'] = 0;
					//判断城市是中文还是英文
					$check_en_or_cn = preg_match("/[\x7f-\xff]/", $item['city']);
					if($check_en_or_cn){
						$city = $this->find($this->_city,array('name_cn'=>trim($item['city'])),false);
					}else{
						$city = $this->find($this->_city,array('name_en'=>trim($item['city'])),false);
					}


					if(!empty($city)) {
						foreach ($city as $c){	//要对比州的state_code字段，防止城市重复
							$state_id = $c['state_id'];
							$state_code = trim($item['state_code']);
							if ($this->count($this->_state, array('id'=>$state_id,'state_code'=>$state_code))) {
								$item['city_id'] = $c['id'];
							}
						}
					}
					$item['url'] = empty($item['url']) ? '' : $item['url'];
					$item['zip_code'] = empty($item['zip_code']) ? '' : $item['zip_code'];
					$item['basic_grade_start'] = empty($item['basic_grade_start']) ? '' : $item['basic_grade_start'];
					$item['basic_grade_end'] = empty($item['basic_grade_end']) ? '' : $item['basic_grade_end'];
					$item['basic_school_enrollments'] = empty($item['basic_school_enrollments']) ? 0 : $item['basic_school_enrollments'];
					$item['basic_proportion_of_individuals'] = empty($item['basic_proportion_of_individuals']) ? 0 : $item['basic_proportion_of_individuals'];
					$item['apply_deadline'] = empty($item['apply_deadline']) ? '' : $item['apply_deadline'];
					$item['apply_sat_avg'] = empty($item['apply_sat_avg']) ? '' : $item['apply_sat_avg'];
					$item['teach_pupil_ratio'] = empty($item['teach_pupil_ratio']) ? 0 : $item['teach_pupil_ratio'];
					$item['teach_class_avg'] = empty($item['teach_class_avg']) ? '' : $item['teach_class_avg'];
					$item['teach_edu_scale'] = empty($item['teach_edu_scale']) ? 0 : $item['teach_edu_scale'];
					$item['financial_contribute'] = empty($item['financial_contribute']) ? 0 : $item['financial_contribute'];
					$item['financial_tuition'] = empty($item['financial_tuition']) ? '' : $item['financial_tuition'];
					$item['is_hot'] = empty($item['is_hot']) ? 0 : $item['is_hot'];
					$item['lng'] = empty($item['lng']) ? '' : $item['lng'];
					$item['lat'] = empty($item['lat']) ? '' : $item['lat'];
					$item['apply_cost'] = empty($item['apply_cost']) ? '' : $item['apply_cost'];
					$item['after_school_care'] = empty($item['after_school_care']) ? '' : $item['after_school_care'];
					$item['sat_read'] = empty($item['sat_read']) ? '' : $item['sat_read'];
					$item['sat_math'] = empty($item['sat_math']) ? '' : $item['sat_math'];
					$item['sat_write'] = empty($item['sat_write']) ? '' : $item['sat_write'];
					$item['exam_req1'] = empty($item['exam_req1']) ? '' : $item['exam_req1'];
					$item['exam_req2'] = empty($item['exam_req2']) ? '' : $item['exam_req2'];
					$item['exam_req3'] = empty($item['exam_req3']) ? '' : $item['exam_req3'];
					$item['suggest_house'] = empty($item['suggest_house']) ? '' : $item['suggest_house'];
					$item['financial_tuition_remark'] = empty($item['financial_tuition_remark']) ? '' : $item['financial_tuition_remark'];

					
					$idx = (in_array($item['basic_school_type'],$school_type));
					if($idx) {
						$key = array_search($item['basic_school_type'],$school_type);
						$item['basic_school_type'] = $key;
					} else {
						$item['basic_school_type'] = 0;
					}
					$item['contact_address_number'] = json_encode(array('number' => $item['number'],'address' => $item['address']));
					$item['basic_accept_international_students'] = $item['basic_accept_international_students'] == '是' ? 1 : 0;
					$item['basic_issue_i20'] = $item['basic_issue_i20'] == '是' ? 1 : 0;
					$item['apply_ssat'] = $item['apply_ssat'] == '是' ? 1 : 0;
					$item['teach_esl'] = $item['teach_esl'] == '是' ? 1 : 0;
					$item['state_id'] = empty($item['state_id']) ? 0 : $this->find($this->_state,array('state_code' => trim($item['state_code'])),true)['id'];
					unset($item);
				}
				$insertCount = 0;
				$updateCount = 0;

				if(!empty($data)) {
					foreach($data as $item) {
						//查找学校英文名称是否存在，存在返回1，不存在返回0
						$count = $this->count($this->_school,array('name_en' => $item['name_en'],'url'=> $item['url']));
						if($count == 0 || empty($item['name_en'])) {
							$insertData = array(
								'name_cn' => $item['name_cn'],
								'name_en' => $item['name_en'],
								'url' => $item['url'],
								'city_id' => $item['city_id'],
								'zip_code' => $item['zip_code'],
								'contact_address_number' => $item['contact_address_number'],
								'intro' => $item['intro'],
								'basic_school_type' => $item['basic_school_type'],
								'basic_grade_start' => $item['basic_grade_start'],
								'basic_grade_end' => $item['basic_grade_end'],
								'basic_createtime' => $item['basic_createtime'].'-01-01 00:00:00',
								'basic_school_enrollments' => $item['basic_school_enrollments'],
								'basic_accept_international_students' => $item['basic_accept_international_students'],
								'basic_issue_i20' => $item['basic_issue_i20'],
								'basic_school_area' => $item['basic_school_area'],
								'basic_proportion_of_individuals' => $item['basic_proportion_of_individuals'],
								'basic_religious_tendency' => $item['basic_religious_tendency'],
								'apply_deadline' => $item['apply_deadline'],
								'apply_ssat' => $item['apply_ssat'],
								'apply_sat_avg' => $item['apply_sat_avg'],
								'apply_link_email' => $item['apply_link_email'],
								'teach_pupil_ratio' => $item['teach_pupil_ratio'],
								'teach_class_avg' => $item['teach_class_avg'],
								'teach_esl' => $item['teach_esl'],
								'teach_edu_scale' => $item['teach_edu_scale'],
								'financial_contribute' => $item['financial_contribute'],
								'financial_tuition' => $item['financial_tuition'],
								'is_hot' => 0,
								'sort' => 0,
								'lng' => $item['lng'],
								'lat' => $item['lat'],
								'update_time' => date('Y-m-d H:i:s',time()),
								'create_time' => date('Y-m-d H:i:s',time()),
								'apply_cost' => $item['apply_cost'],
								'after_school_care' => $item['after_school_care'],
								'sat_read' => $item['sat_read'],
								'sat_math' => $item['sat_math'],
								'sat_write' => $item['sat_write'],
								'exam_req1' => $item['exam_req1'],
								'exam_req2' => $item['exam_req2'],
								'exam_req3' => $item['exam_req3'],
								'state_id' => $item['state_id'],
								'id' => $item['id'],
								'create_time' => $item['create_time'],
								'update_time' => $item['update_time'],
								'is_hot' => $item['is_hot'],
								'financial_tuition_remark' => $item['financial_tuition_remark'],
								'suggest_house' => $item['suggest_house']
							);
							$id = $this->insert($this->_school,$insertData);
							$this->updateSchoolStateIdAndApNum($id);
							$this->_updateSatAvg($id);

							$aps = $item['aps'];
							$this->_import_school_aps($aps,$id);
							$sports = $item['sports'];
							$this->_import_school_sports($sports,$id);
							$clubs = $item['clubs'];
							$this->_import_school_clubs($clubs,$id);

							$suggest_house = $item['suggest_house'];
							if(!empty($suggest_house)) {
								foreach(explode(',',$suggest_house) as $arr) {
									$bind_house = $this->find($this->_house,array('id' => $arr));
									if(!empty($bind_house)) {
										$old_data = $bind_house['suggest_school'];
										if(empty($old_data)) {
											$update_value = $id;
										} else {
											$update_value = $old_data . ',' . $id;
										}
										$update_value = implode(',',array_unique(explode(',',$update_value)));
										$this->update($this->_house,array('suggest_school' => $update_value),array('id' => $bind_house['id']));
									}
								}
							}
							$this->update($this->_school,array('suggest_house' => $suggest_house),array('id' => $id));

							$insertCount++;
						} else {
							$updateData = array(
								'name_cn' => $item['name_cn'],
								'url' => $item['url'],
								'city_id' => $item['city_id'],
								'zip_code' => $item['zip_code'],
								'contact_address_number' => $item['contact_address_number'],
								'intro' => $item['intro'],
								'basic_school_type' => $item['basic_school_type'],
								'basic_grade_start' => $item['basic_grade_start'],
								'basic_grade_end' => $item['basic_grade_end'],
								'basic_createtime' => $item['basic_createtime'].'-01-01 00:00:00',
								'basic_school_enrollments' => $item['basic_school_enrollments'],
								'basic_accept_international_students' => $item['basic_accept_international_students'],
								'basic_issue_i20' => $item['basic_issue_i20'],
								'basic_school_area' => $item['basic_school_area'],
								'basic_proportion_of_individuals' => $item['basic_proportion_of_individuals'],
								'basic_religious_tendency' => $item['basic_religious_tendency'],
								'apply_deadline' => $item['apply_deadline'],
								'apply_ssat' => $item['apply_ssat'],
								'apply_sat_avg' => $item['apply_sat_avg'],
								'apply_link_email' => $item['apply_link_email'],
								'teach_pupil_ratio' => $item['teach_pupil_ratio'],
								'teach_class_avg' => $item['teach_class_avg'],
								'teach_esl' => $item['teach_esl'],
								'teach_edu_scale' => $item['teach_edu_scale'],
								'financial_contribute' => $item['financial_contribute'],
								'financial_tuition' => $item['financial_tuition'],
								'lng' => $item['lng'],
								'lat' => $item['lat'],
								'update_time' => date('Y-m-d H:i:s',time()),
								'apply_cost' => $item['apply_cost'],
								'after_school_care' => $item['after_school_care'],
								'sat_read' => $item['sat_read'],
								'sat_math' => $item['sat_math'],
								'sat_write' => $item['sat_write'],
								'exam_req1' => $item['exam_req1'],
								'exam_req2' => $item['exam_req2'],
								'exam_req3' => $item['exam_req3'],
								'state_id' => $item['state_id'],
								'update_time' => $item['update_time'],
								'is_hot' => $item['is_hot'],
								'financial_tuition_remark' => $item['financial_tuition_remark'],
								'suggest_house' => $item['suggest_house']

							);

							//如果原来的name_cn,lng,lat字段有数据，更新的字段没数据，则保留原来已有的数据
							$school_old_data = $this->find($this->_school,array('name_en' => $item['name_en']),true,'name_cn,lng,lat');

							if(!$item['name_cn'] && $school_old_data['name_cn']){
								$updateData['name_cn'] = $school_old_data['name_cn'];
							}
							if(!$item['lng'] && $school_old_data['lng']){
								$updateData['lng'] = $school_old_data['lng'];
							}
							if(!$item['lat'] && $school_old_data['lat']){
								$updateData['lat'] = $school_old_data['lat'];
							}


							$this->update($this->_school,$updateData,array('name_en' => $item['name_en']));
							$this->updateSchoolStateIdAndApNum($item['id']);
							$this->_updateSatAvg($item['id']);

							$this->delete($this->_school_ap,array('school_id' => $item['id']));
							$this->delete($this->_school_sport_item,array('school_id' => $item['id']));
							$this->delete($this->_school_club,array('school_id' => $item['id']));

							$aps = $item['aps'];
							$this->_import_school_aps($aps,$item['id']);
							$sports = $item['sports'];
							$this->_import_school_sports($sports,$item['id']);
							$clubs = $item['clubs'];
							$this->_import_school_clubs($clubs,$item['id']);

//							$suggest_house = $item['suggest_house'];
//							if(!empty($suggest_house)) {
//								foreach(explode(',',$suggest_house) as $arr) {
//									$bind_house = $this->find($this->_house,array('id' => $arr));
//									if(!empty($bind_house)) {
//										$old_data = $bind_house['suggest_school'];
//										if(empty($old_data)) {
//											$update_value = $item['id'];
//										} else {
//											$update_value = $old_data . ',' . $item['id'];
//										}
//										$update_value = implode(',',array_unique(explode(',',$update_value)));
//										$this->update($this->_house,array('suggest_school' => $update_value),array('id' => $bind_house['id']));
//									}
//								}
//							}
//							$this->update($this->_school,array('suggest_house' => $suggest_house),array('id' => $item['id']));

							$updateCount++;
						}
					}
					$data = array('insertCount' => $insertCount,'updateCount' => $updateCount);
					$this->load->view('admin/header');
					$this->load->view('admin/nav',array('school_mgr' =>  true));
					$this->load->view('admin/school_mgr/school_import',$data);
					$this->load->view('admin/footer');
				}
			} else {
				header("Location: /admin/common/school_import");
			}
		} else {
			header("Location: /admin/common/school_import");
		}
	}

	private function _import_school_aps($aps,$id) {
		if(!empty($aps)) {
			$arr = explode(',',$aps);
			foreach($arr as $item) {
				$ap = ltrim($item);
				$ap = rtrim($ap);
				if(substr($ap, 0, strlen($ap)) === '.') {
					$ap = rtrim($ap,'.');
				}
				$row = $this->find($this->_school_ap_item,array('name' => $ap));
				if(!empty($row)) {
					$this->insert($this->_school_ap,array('school_id' => $id,'ap_id' => $row['id']));
				} else {
					$ap_id = $this->insert($this->_school_ap_item,array('name' => $ap));
					$this->insert($this->_school_ap,array('school_id' => $id,'ap_id' => $ap_id));
				}
			}
		}
	}

	private function _import_school_sports($sports,$id) {
		if(!empty($sports)) {
			$arr = explode(',',$sports);
			foreach($arr as $item) {
				$sport = ltrim($item);
				$sport = rtrim($sport);
				if(substr($sport, 0, strlen($sport)) === '.') {
					$sport = rtrim($sport,'.');
				}
				$row = $this->find($this->_school_sport_items,array('name' => $sport));
				if(!empty($row)) {
					$this->insert($this->_school_sport_item,array('school_id' => $id,'sport_item_id' => $row['id']));
				} else {
					$sport_id = $this->insert($this->_school_sport_items,array('name' => $sport));
					$this->insert($this->_school_sport_item,array('school_id' => $id,'sport_item_id' => $sport_id));
				}
			}
		}
	}

	private function _import_school_clubs($clubs,$id) {
		if(!empty($clubs)) {
			$arr = explode(',',$clubs);
			foreach($arr as $item) {
				$club = ltrim($item);
				$club = rtrim($club);
				if(substr($club, 0, strlen($club)) === '.') {
					$club = rtrim($club,'.');
				}
				$row = $this->find($this->_school_club_item,array('name' => $club));
				if(!empty($row)) {
					$this->insert($this->_school_club,array('school_id' => $id,'club_id' => $row['id']));
				} else {
					$club_id = $this->insert($this->_school_club_item,array('name' => $club));
					$this->insert($this->_school_club,array('school_id' => $id,'club_id' => $club_id));
				}
			}
		}
	}

	public function house_mgr(){
		$like = $where = $where_in = array();
		if($this->input->get('phone')) {
			$like[] = array('field' => 'contact_number','name' => $this->input->get('phone'));
		}
		if($this->input->get('city')) {
			$city_ids = array();
			$city = $this->find($this->_city,array('name_cn'=>$this->input->get('city'),'name_en'=>$this->input->get('city')),false);
			if(!empty($city)) {
				foreach($city as $item) {
					$city_id[] = $item['id'];
				}
			}
			if(!empty($city_id)) {
				$where_in = array('field' => 'city_id','value' => $city_id);
			}
		}
		if($this->input->get('is_hot') && $this->input->get('is_hot') > 0) {
			$where = array('is_hot' => $this->input->get('is_hot'));
		}

		$this->load->helper('file_path');
		$index = $this->input->get('per_page',true);
		$url = '/admin/common/house_mgr?name='.$this->input->get('phone').'&city='.$this->input->get('city').'&is_hot='.$this->input->get('is_hot');
		$data = $this->findPageData($this->_house, $url, $where, 15,$index,$like,$where_in);
		foreach($data as &$item) {
			$city_id = $item['city_id'];
			if(!empty($city_id)) {
				$city = $this->find($this->_city,array('id' => $city_id));
				$city_name = $this->en ? $city['name_en'] : $city['name_cn'];
				$state = $this->find($this->_state,array('id' => $city['state_id']));
				$state_name = $this->en ? $state['name_en'] : $state['name_cn'];
				$item['city_name'] = $state_name . ',' . $city_name;
			} else {
				$item['city_name'] = '';
			}
		}

		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('house_mgr' =>  true));
		$this->load->view('admin/house_mgr/list',array('data'=>$data));
		$this->load->view('admin/footer');
	}

	public function house_edit() {
		$this->load->helper('file_path');
		$data = array();
		$house_id = $this->input->get('id',true);

		$house = $this->find($this->_house,array('id' => $house_id));

		//city
		$state = $this->find($this->_state,array(),false);
		$data['state'] = $state;

		//image
		$images = $this->find($this->_house_image,array('house_id' => $house_id),false);
		$data['images'] = $images;

		//family
		$families = $this->find($this->_house_family,array('house_id' => $house_id),false);
		$data['families'] = $families;

		$data['gender'] = $this->config->item('gender');
		$data['role'] = $this->config->item('role');
		$data['race'] = $this->config->item('race');
		$data['profession'] = $this->config->item('profession');
		$data['income'] = $this->config->item('income');
		$data['religion'] = $this->config->item('religion');
		$data['lang'] = $this->config->item('lang');

		$house_rule_items = $this->find($this->_house_rule_item,array(),false);
		foreach($house_rule_items as &$item) {
			$c = $this->count($this->_house_rule,array('house_id' => $house_id,'rule_id' => $item['id']));
			if($c > 0) {
				$item['is_selected'] = true;
			} else {
				$item['is_selected'] = false;
			}
			unset($item);
		}
		$data['house_rule_items'] = $house_rule_items;

		$data['house'] = $house;

		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('house_mgr' =>  true));
		$this->load->view('admin/house_mgr/edit',$data);
		$this->load->view('admin/footer');
	}

	public function house_create() {
		$data = array();

		$state = $this->find($this->_state,array(),false);
		$data['state'] = $state;

		$data['gender'] = $this->config->item('gender');
		$data['role'] = $this->config->item('role');
		$data['race'] = $this->config->item('race');
		$data['profession'] = $this->config->item('profession');
		$data['income'] = $this->config->item('income');
		$data['religion'] = $this->config->item('religion');
		$data['lang'] = $this->config->item('lang');

		$house_rule_items = $this->find($this->_house_rule_item,array(),false);
		$data['house_rule_items'] = $house_rule_items;

		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('house_mgr' =>  true));
		$this->load->view('admin/house_mgr/create',$data);
		$this->load->view('admin/footer');
	}

	public function submit_house() {
		$action = $this->input->post('action',true);

		$title = $this->input->post('title',true);
		$city_id = $this->input->post('city_id',true);
		$address = $this->input->post('address',true);
		$price = $this->input->post('price',true);
		$contact_email = $this->input->post('contact_email',true);
		$contact_number = $this->input->post('contact_number',true);
		$family_child = $this->input->post('family_child',true);
		$family_pet = $this->input->post('family_pet',true);
		$house_create_time = $this->input->post('house_create_time',true);
		$house_last_decorate = $this->input->post('house_last_decorate',true);
		$house_type = $this->input->post('house_type',true);
		$house_room = $this->input->post('house_room',true);
		$is_hot = $this->input->post('is_hot',true);
		$sort = $this->input->post('sort',true);
		$lng = $this->input->post('lng',true);
		$lat = $this->input->post('lat',true);
		$suggest_school = $this->input->post('suggest_school',true);

		$race = empty($this->input->post('race',true))?'':$this->input->post('race',true);
		$religion = empty($this->input->post('religion',true))?'':$this->input->post('religion',true);
		$profession = empty($this->input->post('profession',true))?'':$this->input->post('profession',true);
		$language = empty($this->input->post('language',true))?'':$this->input->post('language',true);

		if($action == 'create') {
			$insertData = array(
				'title' => $title,
				'city_id' => $city_id,
				'address' => $address,
				'price' => $price,
				'contact_email' => $contact_email,
				'contact_number' => $contact_number,
				'family_child' => $family_child,
				'family_pet' => $family_pet,
				'house_create_time' => $house_create_time.'-01-01 00:00:00',
				'house_last_decorate' => $house_last_decorate.'-01-01 00:00:00',
				'house_type' => $house_type,
				'house_room' => $house_room,
				'is_hot' => $is_hot,
				'sort' => $sort,
				'lng' => $lng,
				'lat' => $lat,
				'suggest_school' => $suggest_school,
				'update_time' => date('Y-m-d H:i:s',time()),
				'create_time' => date('Y-m-d H:i:s',time()),
				'race' => $race,
				'religion' => $religion,
				'profession' => $profession,
				'language' => $language
			);
			$id = $this->insert($this->_house,$insertData);

			$this->load->helper('file_path');
			$name = microtime(true);
			$path = put_filepath_by_route_id($id,'');
			$path = ROOTPATH.'upload/'.$path;
			$this->load->model ( 'Common_model', 'mCommon' );
			$res = $this->mCommon->uploadPic ($path,$name,'cover');
			if ($res ['status']) {
				$this->update($this->_house, array('cover'=>$res['msg']), array('id'=>$id));
			}

			$name = microtime(true);
			$res = $this->mCommon->uploadPic ($path,$name,'cover_mobile');
			if ($res ['status']) {
				$this->update($this->_house, array('cover_mobile'=>$res['msg']), array('id'=>$id));
			}

			$name = microtime(true);
			$res = $this->mCommon->uploadPic ($path,$name,'index_hot_cover');
			if ($res ['status']) {
				$this->update($this->_house, array('index_hot_cover'=>$res['msg']), array('id'=>$id));
			}

			for($i=1;$i<=5;$i++) {
				$name = microtime(true);
				$res = $this->mCommon->uploadPic ($path,$name,'image_'.$i);
				if ($res ['status']) {
					$this->insert($this->_house_image, array('house_id' => $id,'file_name' => $res['msg'],'file_type' => 1,'sort' => 0,'create_time' => date('Y-m-d H:i:s',time())));
				}
			}

			$family_ids = $this->input->post('family_ids',true);
			if(!empty($family_ids)) {
				foreach(explode(',',$family_ids) as $family_id) {
					$insertData = array(
						'house_id' => $id,
						'name' => $this->input->post('name_'.$family_id,true),
						'age' => $this->input->post('age_'.$family_id,true),
						'gender' => $this->input->post('gender_'.$family_id,true),
						'role' => $this->input->post('role_'.$family_id,true),
						'race' => $this->input->post('race_'.$family_id,true),
						'profession' => $this->input->post('profession_'.$family_id,true),
						'income' => $this->input->post('income_'.$family_id,true),
						'religion' => $this->input->post('religion_'.$family_id,true),
						'language' => $this->input->post('lang_'.$family_id,true),
						'hobbies' => $this->input->post('hobbies_'.$family_id,true)
					);
					$this->insert($this->_house_family,$insertData);
				}
			}

			$rule_ids = $this->input->post('rule_ids',true);
			if(!empty($rule_ids)) {
				foreach(explode(',',$rule_ids) as $rule_id) {
					$insertData = array(
						'house_id' => $id,
						'rule_id' => $rule_id,
					);
					$this->insert($this->_house_rule,$insertData);
				}
			}

			if(!empty($suggest_school)) {
				foreach(explode(',',$suggest_school) as $arr) {
					$bind_school = $this->find($this->_school,array('id' => $arr));
					if(!empty($bind_school)) {
						$old_data = $bind_school['suggest_school'];
						if(empty($old_data)) {
							$update_value = $id;
						} else {
							$update_value = $old_data . ',' . $id;
						}
						$update_value = implode(',',array_unique(explode(',',$update_value)));
						$this->update($this->_school,array('suggest_house' => $update_value),array('id' => $bind_school['id']));
					}
				}
			}

			header("Location: /admin/common/house_mgr");
		}

		if($action == 'update') {
			$id = $this->input->post('id',true);

			$updateData = array(
				'title' => $title,
				'city_id' => $city_id,
				'address' => $address,
				'price' => $price,
				'contact_email' => $contact_email,
				'contact_number' => $contact_number,
				'family_child' => $family_child,
				'family_pet' => $family_pet,
				'house_create_time' => $house_create_time.'-01-01 00:00:00',
				'house_last_decorate' => $house_last_decorate.'-01-01 00:00:00',
				'house_type' => $house_type,
				'house_room' => $house_room,
				'is_hot' => $is_hot,
				'sort' => $sort,
				'lng' => $lng,
				'lat' => $lat,
				'suggest_school' => $suggest_school,
				'update_time' => date('Y-m-d H:i:s',time()),
				'race' => $race,
				'religion' => $religion,
				'profession' => $profession,
				'language' => $language
			);
			$where = array('id' => $id);
			$this->update($this->_house,$updateData,$where);

			$this->load->helper('file_path');
			$name = microtime(true);
			$path = put_filepath_by_route_id($id,'');
			$path = ROOTPATH.'upload/'.$path;
			$this->load->model ( 'Common_model', 'mCommon' );
			$res = $this->mCommon->uploadPic ($path,$name,'cover');
			if ($res ['status']) {
				$this->update($this->_house, array('cover'=>$res['msg']), array('id'=>$id));
			}

			$name = microtime(true);
			$res = $this->mCommon->uploadPic ($path,$name,'cover_mobile');
			if ($res ['status']) {
				$this->update($this->_house, array('cover_mobile'=>$res['msg']), array('id'=>$id));
			}

			$name = microtime(true);
			$res = $this->mCommon->uploadPic ($path,$name,'index_hot_cover');
			if ($res ['status']) {
				$this->update($this->_house, array('index_hot_cover'=>$res['msg']), array('id'=>$id));
			}

			$delete_image_ids = $this->input->post('delete_image_ids',true);
			if(!empty($delete_image_ids)) {
				foreach(explode(',',$delete_image_ids) as $image_id) {
					$this->delete($this->_house_image,array('id' => $image_id));
				}
			}
			for($i=1;$i<=5;$i++) {
				$name = microtime(true);
				$res = $this->mCommon->uploadPic ($path,$name,'image_'.$i);
				if ($res ['status']) {
					$this->insert($this->_house_image, array('house_id' => $id,'file_name' => $res['msg'],'file_type' => 1,'sort' => 0,'create_time' => date('Y-m-d H:i:s',time())));
				}
			}

			$this->delete($this->_house_family,array('house_id' => $id));
			$family_ids = $this->input->post('family_ids',true);
			if(!empty($family_ids)) {
				foreach(explode(',',$family_ids) as $family_id) {
					$insertData = array(
						'house_id' => $id,
						'name' => $this->input->post('name_'.$family_id,true),
						'age' => $this->input->post('age_'.$family_id,true),
						'gender' => $this->input->post('gender_'.$family_id,true),
						'role' => $this->input->post('role_'.$family_id,true),
						'race' => $this->input->post('race_'.$family_id,true),
						'profession' => $this->input->post('profession_'.$family_id,true),
						'income' => $this->input->post('income_'.$family_id,true),
						'religion' => $this->input->post('religion_'.$family_id,true),
						'language' => $this->input->post('lang_'.$family_id,true),
						'hobbies' => $this->input->post('hobbies_'.$family_id,true)
					);
					$this->insert($this->_house_family,$insertData);
				}
			}

			$this->delete($this->_house_rule,array('house_id' => $id));
			$rule_ids = $this->input->post('rule_ids',true);
			if(!empty($rule_ids)) {
				foreach(explode(',',$rule_ids) as $rule_id) {
					$insertData = array(
						'house_id' => $id,
						'rule_id' => $rule_id,
					);
					$this->insert($this->_house_rule,$insertData);
				}
			}

			if(!empty($suggest_school)) {
				foreach(explode(',',$suggest_school) as $arr) {
					$bind_school = $this->find($this->_school,array('id' => $arr));
					if(!empty($bind_school)) {
						$old_data = $bind_school['suggest_school'];
						if(empty($old_data)) {
							$update_value = $id;
						} else {
							$update_value = $old_data . ',' . $id;
						}
						$update_value = implode(',',array_unique(explode(',',$update_value)));
						$this->update($this->_school,array('suggest_house' => $update_value),array('id' => $bind_school['id']));
					}
				}
			}

			header("Location: /admin/common/house_mgr");
		}
	}

	public function house_delete() {
		$id = $this->input->get('id',true);
		$this->delete($this->_house_comment,array('house_id' => $id));
		$this->delete($this->_house_family,array('house_id' => $id));
		$this->delete($this->_house_image,array('house_id' => $id));
		$this->delete($this->_house_rule,array('house_id' => $id));
		$this->delete($this->_house,array('id' => $id));

		$this->json_ret(1);
	}

	public function house_request_mgr(){
		$like = $where = $where_in = array();
		if($this->input->get('city')) {
			$city_ids = array();
			$city = $this->find($this->_city,array('name_cn'=>$this->input->get('city'),'name_cn'=>$this->input->get('city')),false);
			if(!empty($city)) {
				foreach($city as $item) {
					$city_id[] = $item['id'];
				}
			}
			if(!empty($city_id)) {
				$where_in = array('field' => 'city_id','value' => $city_id);
			}
		}
		if($this->input->get('order_id') && $this->input->get('order_id') > 0) {
			$where = array('order_id' => $this->input->get('order_id'));
		}

		$this->load->helper('file_path');
		$index = $this->input->get('per_page',true);
		$url = '/admin/common/house_request_mgr?name='.$this->input->get('city').'&city='.$this->input->get('order_id');
		$data = $this->findPageData($this->_personal_tailor, $url, $where, 15,$index,$like,$where_in);
		$language = $this->config->item('lang');
		$gender = $this->config->item('gender');
		foreach($data as &$item) {
			$item['gender'] = !empty($item['sex']) ? $gender[$item['sex']] : '';
			$city_id = $item['city_id'];
			if(!empty($city_id)) {
				$city = $this->find($this->_city,array('id' => $city_id));
				$city_name = $this->en ? $city['name_en'] : $city['name_cn'];
				$state = $this->find($this->_state,array('id' => $city['state_id']));
				$state_name = $this->en ? $state['name_en'] : $state['name_cn'];
				$item['city_name'] = $state_name . ',' . $city_name;
			} else {
				$item['city_name'] = '';
			}
			$item['language'] = $language[$item['language']];
			unset($item);
		}

		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('house_request_mgr' =>  true));
		$this->load->view('admin/house_request_mgr/list',array('data'=>$data));
		$this->load->view('admin/footer');
	}

	/*public function index(){
		$ret = $where = $like = array();
		if( $this->input->post('name_cn',true) ){
			$ret['name_cn'] = $name_cn = $this->input->post('name_cn',true);
			$like = array(
					'field' => 'name_cn',
					'name' => $name_cn
			);
		}
		$index = $this->input->get('per_page',true);//分页
		$url = '/admin/common/index';
		$data = $this->findPageData($this->_school, $url, $where, 10,$index,$like);
		$this->load->view('admin/script/edit',array('data'=>$data));
	}
	
	function uploadPic($id){
		$this->load->helper('file_path');
		$name = time();
		$path = put_filepath_by_route_id($id,'');
		$path = ROOTPATH.'upload/'.$path;
		$this->load->model ( 'Common_model', 'mCommon' );
		$res = $this->mCommon->uploadPic ($path,$name,'pic');
		
		if ($res ['status']) {
			$this->update($this->_school, array('index_hot_cover'=>$res['msg']), array('id'=>$id));
			$ret = $this->format_ret ( 1, $res['msg']);
		} else {
			$ret = $this->format_ret ( 0, $res['msg']);
		}
		echo json_encode($ret);
	}
	function uploadPic2($id){
		$this->load->helper('file_path');
		$name = time();
		$path = put_filepath_by_route_id($id,'');
		$path = ROOTPATH.'upload/'.$path;
		$this->load->model ( 'Common_model', 'mCommon' );
		$res = $this->mCommon->uploadPic ($path,$name,'pic2');
	
		if ($res ['status']) {
			$this->update($this->_school, array('cover'=>$res['msg']), array('id'=>$id));
			$ret = $this->format_ret ( 1, $res['msg']);
		} else {
			$ret = $this->format_ret ( 0, $res['msg']);
		}
		echo json_encode($ret);
	}*/
	
	private function _is_selected_ap($ap_id, $aps) {
		$ret = false;
		foreach($aps as $item) {
			if($item['ap_id'] == $ap_id) {
				$ret = true;
				break;
			}
		}
		return $ret;
	}

	private function _is_selected_sport($sport_id,$sports) {
		$ret = false;
		foreach($sports as $item) {
			if($item['sport_item_id'] == $sport_id) {
				$ret = true;
				break;
			}
		}
		return $ret;
	}

	private function _is_selected_club($club_id,$clubs) {
		$ret = false;
		foreach($clubs as $item) {
			if($item['club_id'] == $club_id) {
				$ret = true;
				break;
			}
		}
		return $ret;
	}

	private function _is_selected_gd($gd_id,$gds) {
		$ret = array('is_selected' => false,'num' => 0);
		foreach($gds as $item) {
			if($item['gd_id'] == $gd_id) {
				$ret = array('is_selected' => true,'num' => $item['num']);
				break;
			}
		}
		return $ret;
	}

	public function index_banner_mgr() {
		$this->load->helper('file_path');
		$data = array();
		$index = $this->find($this->_index_config,array('type' => 'banner'),false);
		$data['index'] = $index;

		$mobile_index = $this->find($this->_index_config,array('type' => 'mobile_banner'),false);
		$data['mobile_index'] = $mobile_index;

		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('index_mgr' =>  true));
		$this->load->view('admin/index_mgr/banner_edit',$data);
		$this->load->view('admin/footer');
	}

	public function index_banner_mgr_submit() {
//		$link = $this->input->post('link',true);
//		$this->update($this->_index_config, array('link'=>$link), array('type'=>'banner'));
//
//		$this->load->helper('file_path');
//		$name = microtime(true);
//		$path = put_filepath_by_route_id(0,'');
//		$path = ROOTPATH.'upload/'.$path;
//		$this->load->model ( 'Common_model', 'mCommon' );
//		$res = $this->mCommon->uploadPic ($path,$name,'image');
//		if ($res ['status']) {
//			$this->update($this->_index_config, array('file_name'=>$res['msg']), array('type'=>'banner'));
//		}
//		header("Location: /admin/common/index_banner_mgr");
		$this->load->helper('file_path');
		$index = $this->find($this->_index_config,array('type' => 'banner'),false);
		foreach($index as $item) {
			$id = $item['id'];
			$link = $this->input->post('link_'.$id,true);
			$this->update($this->_index_config, array('link'=>$link), array('id'=>$id));

			$name = microtime(true);
			$path = put_filepath_by_route_id(0,'');
			$path = ROOTPATH.'upload/'.$path;
			$this->load->model ( 'Common_model', 'mCommon' );
			$res = $this->mCommon->uploadPic ($path,$name,'image'.$id);
			if ($res ['status']) {
				$this->update($this->_index_config, array('file_name'=>$res['msg']), array('id'=>$id));
			}
		}

		header("Location: /admin/common/index_banner_mgr");
	}

	public function index_banner_mgr_submit2() {
		$this->load->helper('file_path');
		$index_mobile = $this->find($this->_index_config,array('type' => 'mobile_banner'),false);
		foreach($index_mobile as $item) {
			$id = $item['id'];
			$link = $this->input->post('link_'.$id,true);
			$this->update($this->_index_config, array('link'=>$link), array('id'=>$id));

			$name = microtime(true);
			$path = put_filepath_by_route_id(0,'');
			$path = ROOTPATH.'upload/'.$path;
			$this->load->model ( 'Common_model', 'mCommon' );
			$res = $this->mCommon->uploadPic ($path,$name,'image'.$id);
			if ($res ['status']) {
				$this->update($this->_index_config, array('file_name'=>$res['msg']), array('id'=>$id));
			}
		}
		
		header("Location: /admin/common/index_banner_mgr");
	}

	public function index_hot_mgr() {
		$this->load->helper('file_path');
		$data = array();
		$index_up = $this->find($this->_index_config,array('type' => 'up'),false,'*',array('field' => 'id' , 'type' => 'asc'));
		$index_down = $this->find($this->_index_config,array('type' => 'down'),false,'*',array('field' => 'id' , 'type' => 'asc'));
		$data['index_up'] = $index_up;
		$data['index_down'] = $index_down;
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('index_mgr' =>  true));
		$this->load->view('admin/index_mgr/hot_edit',$data);
		$this->load->view('admin/footer');
	}

	public function index_hot_mgr_submit() {
		$this->load->helper('file_path');
		$index = $this->find($this->_index_config,array('mark' => 'hot'),false);
		foreach($index as $item) {
			$id = $item['id'];
			$title = $this->input->post('title'.$id,true);
			$desc = $this->input->post('desc'.$id,true);
			$link = $this->input->post('link'.$id,true);
			$this->update($this->_index_config, array('title' => $title,'desc' => $desc,'link' => $link), array('id'=>$id));

			$name = microtime(true);
			$path = put_filepath_by_route_id(0,'');
			$path = ROOTPATH.'upload/'.$path;
			$this->load->model ( 'Common_model', 'mCommon' );
			$res = $this->mCommon->uploadPic ($path,$name,'image'.$id);
			if ($res ['status']) {
				$this->update($this->_index_config, array('file_name'=>$res['msg']), array('id'=>$id));
			}
		}

		header("Location: /admin/common/index_hot_mgr");
	}

	public function state_mgr() {
		$like = array();
		if($this->input->get('name')) {
			$like[] = array('field' => 'name_cn','name' => $this->input->get('name'));
			$like[] = array('field' => 'name_en','name' => $this->input->get('name'));
		}

		$index = $this->input->get('per_page',true);
		$url = '/admin/common/state_mgr?name='.$this->input->get('name');
		$data = $this->findPageData($this->_state, $url, array(), 15,$index,$like);

		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('area_mgr' =>  true));
		$this->load->view('admin/area_mgr/state_list',array('data'=>$data));
		$this->load->view('admin/footer');
	}

	public function state_edit() {
		$data = array();
		$id = $this->input->get('id',true);

		$state = $this->find($this->_state,array('id' => $id),true);
		$data['state'] = $state;

		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('area_mgr' =>  true));
		$this->load->view('admin/area_mgr/state_edit',$data);
		$this->load->view('admin/footer');
	}

	public function state_submit() {
		$id = $this->input->post('id',true);
		$name_cn = $this->input->post('name_cn',true);
		$name_en = $this->input->post('name_en',true);
		$state_code = $this->input->post('state_code',true);
		$lng = $this->input->post('lng',true);
		$lat = $this->input->post('lat',true);

		$updateData = array(
			'name_cn' => $name_cn,
			'name_en' => $name_en,
			'state_code' => $state_code,
			'lng' => $lng,
			'lat' => $lat
		);
		$where = array('id' => $id);
		$this->update($this->_state,$updateData,$where);

		header("Location: /admin/common/state_mgr");
	}

	public function city_mgr() {
		$state_id = $this->input->get('state_id');
		$where = array('state_id' => $state_id);
		$like = array();
		if($this->input->get('name')) {
			$like[] = array('field' => 'name_cn','name' => $this->input->get('name'));
			$like[] = array('field' => 'name_en','name' => $this->input->get('name'));
		}

		$index = $this->input->get('per_page',true);
		$url = '/admin/common/city_mgr?state_id='.$state_id.'&name='.$this->input->get('name');
		$data = $this->findPageData($this->_city, $url, $where, 15,$index,$like);
		foreach($data as &$item) {
			$state = $this->find($this->_state,array('id' => $item['state_id']),true);
			$item['state_name'] = $state['name_cn'];
			unset($item);
		}

		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('area_mgr' =>  true));
		$this->load->view('admin/area_mgr/city_list',array('data'=>$data));
		$this->load->view('admin/footer');
	}

	public function city_edit() {
		$data = array();
		$id = $this->input->get('id',true);

		$city = $this->find($this->_city,array('id' => $id),true);
		$data['city'] = $city;
		$state = $this->find($this->_state,array(),false);
		$data['state'] = $state;

		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('area_mgr' =>  true));
		$this->load->view('admin/area_mgr/city_edit',$data);
		$this->load->view('admin/footer');
	}

	public function city_del() {
		$id = $this->input->get('id',true);
		$res = $this->delete($this->_city,array('id'=>$id));
		if($res){
			echo json_encode('success');
		}else{
			echo json_encode('fail');
		}
	}

	public function city_submit() {
		$id = $this->input->post('id',true);
		$name_cn = $this->input->post('name_cn',true);
		$name_en = $this->input->post('name_en',true);
		$lng = $this->input->post('lng',true);
		$lat = $this->input->post('lat',true);
		$state_id = $this->input->post('state_id',true);
		$zip_codes = $this->input->post('zip_codes',true);
		$area_code = $this->input->post('area_code',true);
		$population = $this->input->post('population',true);
		$households = $this->input->post('households',true);
		$median_income = $this->input->post('median_income',true);
		$land_area = $this->input->post('land_area',true);
		$water_area = $this->input->post('water_area',true);
		$is_capital = $this->input->post('is_capital',true);

		$updateData = array(
			'name_cn' => $name_cn,
			'name_en' => $name_en,
			'lng' => $lng,
			'lat' => $lat,
			'state_id' => $state_id,
			'zip_codes' => $zip_codes,
			'area_code' => $area_code, 
			'population' => $population, 
			'households' => $households, 
			'median_income' => $median_income, 
			'land_area' => $land_area, 
			'water_area' => $water_area, 
			'is_capital' => $is_capital
		);
		$where = array('id' => $id);
		$this->update($this->_city,$updateData,$where);

		header("Location: /admin/common/city_mgr?state_id=" . $state_id);
	}

	public function city_create() {
		$data = array();
		$state = $this->find($this->_state,array('id' => $this->input->get('state_id')),true);
		$data['state'] = $state;
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('area_mgr' =>  true));
		$this->load->view('admin/area_mgr/city_create',$data);
		$this->load->view('admin/footer');
	}

	public function city_create_submit() {
		$name_cn = $this->input->post('name_cn',true);
		$name_en = $this->input->post('name_en',true);
		$lng = $this->input->post('lng',true);
		$lat = $this->input->post('lat',true);
		$state_id = $this->input->post('state_id',true);
		$zip_codes = $this->input->post('zip_codes',true);
		$area_code = $this->input->post('area_code',true);
		$population = $this->input->post('population',true);
		$households = $this->input->post('households',true);
		$median_income = $this->input->post('median_income',true);
		$land_area = $this->input->post('land_area',true);
		$water_area = $this->input->post('water_area',true);
		$is_capital = $this->input->post('is_capital',true);

		$insertData = array(
			'name_cn' => $name_cn,
			'name_en' => $name_en,
			'lng' => $lng,
			'lat' => $lat,
			'state_id' => $state_id,
			'zip_codes' => $zip_codes,
			'area_code' => $area_code, 
			'population' => $population, 
			'households' => $households, 
			'median_income' => $median_income, 
			'land_area' => $land_area, 
			'water_area' => $water_area, 
			'is_capital' => $is_capital
		);
		$this->insert($this->_city,$insertData);

		header("Location: /admin/common/city_mgr?state_id=" . $state_id);
	}

	public function house_rule_mgr(){
		$this->load->helper('file_path');
		$data = array();
		$house_rule_items = $this->find($this->_house_rule_item,array(),false);
		$data['house_rule_items'] = $house_rule_items;

		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('house_rule_mgr' =>  true));
		$this->load->view('admin/house_rule_mgr/list',$data);
		$this->load->view('admin/footer');
	}

	public function house_rule_create() {
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('house_rule_mgr' =>  true));
		$this->load->view('admin/house_rule_mgr/create');
		$this->load->view('admin/footer');
	}

	public function house_rule_create_submit() {
		$name = $this->input->post('name',true);
		$id = $this->insert($this->_house_rule_item,array('name' => $name));

		$this->load->helper('file_path');
		$name = microtime(true);
		$path = put_filepath_by_route_id(0,'');
		$path = ROOTPATH.'upload/'.$path;
		$this->load->model ( 'Common_model', 'mCommon' );
		$res = $this->mCommon->uploadPic ($path,$name,'image');
		if ($res ['status']) {
			$this->update($this->_house_rule_item, array('image'=>$res['msg']), array('id'=>$id));
		}

		header("Location: /admin/common/house_rule_mgr");
	}

	public function house_rule_edit() {
		$this->load->helper('file_path');
		$id = $this->input->get('id',true);
		$house_rule_items = $this->find($this->_house_rule_item,array('id' => $id),true);
		$data = array();
		$data['house_rule_items'] = $house_rule_items;

		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('house_rule_mgr' =>  true));
		$this->load->view('admin/house_rule_mgr/edit',$data);
		$this->load->view('admin/footer');
	}

	public function house_rule_edit_submit() {
		$id = $this->input->post('id',true);
		$name = $this->input->post('name',true);
		$this->update($this->_house_rule_item,array('name' => $name),array('id' => $id));

		$this->load->helper('file_path');
		$name = microtime(true);
		$path = put_filepath_by_route_id(0,'');
		$path = ROOTPATH.'upload/'.$path;
		$this->load->model ( 'Common_model', 'mCommon' );
		$res = $this->mCommon->uploadPic ($path,$name,'image');
		if ($res ['status']) {
			$this->update($this->_house_rule_item, array('image'=>$res['msg']), array('id'=>$id));
		}

		header("Location: /admin/common/house_rule_mgr");
	}

	public function school_item_mgr() {
		$type = $this->input->get('type');
		$index = $this->input->get('per_page',true);
		$url = '/admin/common/school_item_mgr?type='.$type;
		switch ($type) {
			case 'ap':
				$data = $this->findPageData($this->_school_ap_item, $url, array(), 15,$index);
				break;
			case 'sport':
				$data = $this->findPageData($this->_school_sport_items, $url, array(), 15,$index);
				break;
			case 'club':
				$data = $this->findPageData($this->_school_club_item, $url, array(), 15,$index);
				break;
			default:
				break;
		}
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('school_'.$type.'_mgr' => true));
		$this->load->view('admin/school_item_mgr/list',array('data'=>$data));
		$this->load->view('admin/footer');
	}

	public function school_item_create() {
		$type = $this->input->get('type');
		$data['action'] = 'create';
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('school_'.$type.'_mgr' => true));
		$this->load->view('admin/school_item_mgr/create',$data);
		$this->load->view('admin/footer');
	}

	public function school_item_submit() {
		$type = $this->input->post('type');
		$name = $this->input->post('name');
		$action = $this->input->post('action');
		switch ($type) {
			case 'ap':
				if($action == 'create') {
					$this->insert($this->_school_ap_item,array('name' => $name));
				}
				if($action == 'update') {
					$id = $this->input->post('id');
					$this->update($this->_school_ap_item,array('name' => $name),array('id' => $id));
				}
				break;
			case 'sport':
				if($action == 'create') {
					$this->insert($this->_school_sport_items,array('name' => $name));
				}
				if($action == 'update') {
					$id = $this->input->post('id');
					$this->update($this->_school_sport_items,array('name' => $name),array('id' => $id));						
				}
				break;
			case 'club':
				if($action == 'create') {
					$this->insert($this->_school_club_item,array('name' => $name));
				}
				if($action == 'update') {
					$id = $this->input->post('id');
					$this->update($this->_school_club_item,array('name' => $name),array('id' => $id));						
				}
				break;
			default:
				break;
		}
		header("Location: /admin/common/school_item_mgr?type=" . $type);
	}

	public function school_item_edit() {
		$type = $this->input->get('type');
		$id = $this->input->get('id');
		switch ($type) {
			case 'ap':
				$item = $this->find($this->_school_ap_item,array('id' => $id));
				break;
			case 'sport':
				$item = $this->find($this->_school_sport_items,array('id' => $id));
				break;
			case 'club':
				$item = $this->find($this->_school_club_item,array('id' => $id));
				break;
			default:
				break;
		}
		$data['item'] = $item;
		$data['action'] = 'update';
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('school_'.$type.'_mgr' => true));
		$this->load->view('admin/school_item_mgr/edit',$data);
		$this->load->view('admin/footer');
	}

	public function school_item_delete() {
		$type = $this->input->get('type');
		$id = $this->input->get('id');
		switch ($type) {
			case 'ap':
				$this->delete($this->_school_ap_item,array('id' => $id));
				break;
			case 'sport':
				$this->delete($this->_school_sport_items,array('id' => $id));
				break;
			case 'club':
				$this->delete($this->_school_club_item,array('id' => $id));
				break;
			default:
				break;
		}
		$this->json_ret(1);
	}

	//更新SAT平均成绩
	private function _updateSatAvg($school_id) {
		$where = array('id' => $school_id);
		$school = $this->find($this->_school,$where);
		$sat = $school['sat_read'] + $school['sat_math'];
		$this->update($this->_school,array('apply_sat_avg' => $sat),$where);
	}

	/*public function updateAllSatAvg() {
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		$school = $this->find($this->_school,array(),false);
		foreach($school as $item) {
			$this->_updateSatAvg($item['id']);
		}
	}*/

	public function school_grade_mgr() {
		$index = $this->input->get('per_page',true);
		$url = '/admin/common/school_item_mgr';
		$data = $this->findPageData($this->_school_grade, $url, array(), 15,$index);
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('school_grade_mgr' => true));
		$this->load->view('admin/school_grade_mgr/list',array('data'=>$data));
		$this->load->view('admin/footer');
	}

	public function school_grade_create() {
		$data['action'] = 'create';
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('school_grade_mgr' => true));
		$this->load->view('admin/school_grade_mgr/create',$data);
		$this->load->view('admin/footer');
	}

	public function school_grade_submit() {
		$name = $this->input->post('name');
		$type = $this->input->post('type');
		$ref_age = $this->input->post('ref_age');
		$remark = $this->input->post('remark');
		$remark_en = $this->input->post('remark_en');
		$is_show = $this->input->post('is_show');

		$action = $this->input->post('action');
		if($action == 'create') {
			$insertData = array(
				'name' => $name,
				'type' => $type,
				'ref_age' => $ref_age,
				'remark' => $remark,
				'remark_en' => $remark_en,
				'is_show' => $is_show
			);
			$this->insert($this->_school_grade,$insertData);
		}
		if($action == 'update') {
			$id = $this->input->post('id');
			$updateData = array(
				'id' => $id,
				'name' => $name,
				'type' => $type,
				'ref_age' => $ref_age,
				'remark' => $remark,
				'remark_en' => $remark_en,
				'is_show' => $is_show
			);
			$this->update($this->_school_grade,$updateData,array('id' => $id));
		}
		header("Location: /admin/common/school_grade_mgr");
	}

	public function school_grade_edit() {
		$id = $this->input->get('id');
		$item = $this->find($this->_school_grade,array('id' => $id));
		$data['item'] = $item;
		$data['action'] = 'update';
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('school_grade_mgr' => true));
		$this->load->view('admin/school_grade_mgr/edit',$data);
		$this->load->view('admin/footer');
	}

	public function school_grade_delete() {
		$id = $this->input->get('id');
		$this->delete($this->_school_grade,array('id' => $id));
		$this->json_ret(1);
	}

	public function delete_school_ids() {
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		$ids = '9268,7716,2394,1003,8183,8265,8139,5600,5795,6134,84,6387,1238,5581,6569,3354,6249,8739,2805,8900,1850,2028,2512,943,6048,6665,469,185,1175,6371,7407,3667,5536,8419,6720,6441,4633,3296,2612,2033,1955,1455,2887,985,7808,2609,4268,2021,1644,3218,6732,3304,572,7512,8210,4625,4455,4586,8366,3602,2804,2495,7913,6897,7805,2110,6151,1612,4245,7182,8946,4391,2317,7970,4753,2484,4555,1228,4196,2141,1736,562,2819,8467,7761,6794,8192,8273,7495,784,7983,6313,4797,1307,8939,7975,5566,8203,6792,17,189,911,2006,3306,3758,4302,4799,7881';
		$id_arr = explode(',',$ids);
		$schools = $this->find($this->_school,array(),false, 'id',array(),array(),'', '',array('field'=>'id','value' => $id_arr));
		foreach($schools as $row) {
			$id = $row['id'];
			$this->delete($this->_school_ap,array('school_id' => $id));
			$this->delete($this->_school_club,array('school_id' => $id));
			$this->delete($this->_school_sport_item,array('school_id' => $id));
			$this->delete($this->_school,array('id' => $id));
		}
	}
	public function getSchoolDistance(){
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		$data = $this->find($this->_school,'',false,'id,lat,lng,name_cn');
		if ( !empty($data) ){
			foreach ($data as &$val){
				$dis = $this->getDistance($val['lat'], $val['lng'], $lat, $lng);
				if ($dis){
					$val['distance'] = $dis;
				}else{
					$val['distance'] = '';
				}
				unset($val);
			}
			//按照距离排序
			usort($data, function($a,$b){
				if ($a['distance'] == $b['distance']) {
					return 0;
				}
				return ($a['distance'] > $b['distance']) ? 1 : -1;
			});
		}
		$this->json_ret(1,$data);
	}
	public function getHouseDistance(){
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		$data = $this->find($this->_house,'',false,'id,lat,lng,title');
		if ( !empty($data) ){
			foreach ($data as &$val){
				$dis = $this->getDistance($val['lat'], $val['lng'], $lat, $lng);
				if ($dis){
					$val['distance'] = $dis;
				}else{
					$val['distance'] = '';
				}
				unset($val);
			}
			//按照距离排序
			usort($data, function($a,$b){
				if ($a['distance'] == $b['distance']) {
					return 0;
				}
				return ($a['distance'] > $b['distance']) ? 1 : -1;
			});
		}
		$this->json_ret(1,$data);
	}


	/* 学校批量删除逻辑 */
	public function school_allDelete(){
		$ids = rtrim($this->input->get('ids',TRUE),',');

		$id = explode(',',$ids);
		$this->db->where_in('id',$id);
		$res = $this->db->delete('school');

		if($res){
			echo json_encode('success');
		}else{
			echo json_encode('fail');
		}
	}

	/* 留言管理列表页 */
	public function message_mgr() {
		$like = array();
		$index = $this->input->get('per_page',true);
		$url = '/admin/common/message_mgr';
		$data = $this->findPageData($this->_message_info, $url, array(), 15,$index,$like);
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('message_mgr' => true));
		$this->load->view('admin/message_mgr',array('data'=>$data));
		$this->load->view('admin/footer');
	}

	/* 留言管理删除 */
	public function message_delete() {
		$id = $this->input->get('id',true);
		$this->delete($this->_message_info,array('id' => $id));
		$this->json_ret(1);
	}


	/* 申请成为住家列表页 */
	public function becomeHome_mgr() {
		$like = array();
		$index = $this->input->get('per_page',true);
		$url = '/admin/common/becomeHome_mgr';
		$data = $this->findPageData($this->_HostInfo, $url, array(), 15,$index,$like, array('field' => 'status','value' => array('4','2','3')));
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('becomeHome_mgr' => true));
		$this->load->view('admin/becomeHome_mgr',array('data'=>$data));
		$this->load->view('admin/footer');
	}



	public function becomeHomeInfo_mgr(){
		$user_id = $this->input->get('id',true);
		$host_id = $this->input->get('order_id',true);
		$data['hobbies'] = $this->find($this->_hobby,array(),false);
		$data['HostInfo'] = $this->find($this->_HostInfo,array('host_id'=>$host_id));
		$data['FamilyInfo'] = $this->find($this->_FamilyInfo,array('host_id'=>$host_id));
		$data['HomeInfo'] = $this->find($this->_home_info,array('host_id'=>$host_id));
		$data['MisInfo'] = $this->find($this->_MisInfo,array('host_id'=>$host_id));
		$data['HomeRule'] = $this->find($this->_home_rule,array('host_id'=>$host_id));
		$data['HomeImage'] = $this->find($this->_home_image,array('host_id'=>$host_id),false);
		$data['child'] = json_encode($data['FamilyInfo']['childinfo']);
		$data['rooms'] = json_encode($data['MisInfo']['bedroomInfo']);

		$data['state'] = $this->find($this->_state,'',false,'id,name_en');
		$data['city'] = $this->find($this->_city,'',false,'id,state_id,name_en');
		if(strstr($data['MisInfo']['hobby'],',')){
			$data['MisInfo']['hobby'] = explode(',',$data['MisInfo']['hobby']);
		}else{
			$data['MisInfo']['hobby'] = [$data['MisInfo']['hobby']];
		}

		$this->load->view('admin/becomeHomeInfo_mgr',array('data'=>$data));
	}

	/*发布住家审核通过*/
	public function Approve(){
		$host_id = $this->input->post('orderId',true);
		$result['lng'] = $this->input->post('lng',true);
		$result['lat'] = $this->input->post('lat',true);
		$result['status'] = '3';
		$data['status'] = '3';
		$dataimg['state'] = '3';

		$res[1] = $this->update($this->_HostInfo,$result,array('host_id'=>$host_id));
		$res[2] = $this->update($this->_FamilyInfo,$data,array('host_id'=>$host_id));
		$res[3] = $this->update($this->_home_info,$data,array('host_id'=>$host_id));
		$res[4] = $this->update($this->_MisInfo,$data,array('host_id'=>$host_id));
 		$res[5] = $this->update($this->_home_image,$dataimg,array('host_id'=>$host_id));
		$res[6] = $this->update($this->_home_rule,$data,array('host_id'=>$host_id));
		if($res[1] && $res[2] && $res[3] && $res[4] && $res[5] && $res[6]){
			$Host1 = $this->find($this->_HostInfo,array('host_id'=>$host_id),true,'title,hostname,religion,profession,ethnicity,primary_language');
			$Host2 = $this->find($this->_home_info,array('host_id'=>$host_id),true,'city_id,address,house_type,buildY,buildM,area');
			$Host3 = $this->find($this->_home_rule,array('host_id'=>$host_id),true,'month_price');
			$homedataImg = $this->find($this->_home_image,array('host_id'=>$host_id),false,'user_id,pic_name');
			$addData['title'] = $Host1['title'];//房屋标题
			$addData['hostname'] = $Host1['hostname'];//房主名字
			$addData['city_id'] = $Host2['city_id'];//所在城市
			$addData['index_hot_cover'] = $homedataImg[0]['user_id'].'/'.$homedataImg[0]['pic_name'];//列表图片
			$addData['address'] = $Host2['address'];//房屋地址
			$addData['price'] = $Host3['month_price'];//月租金
			$addData['house_type'] = $Host2['house_type'];//房屋类型
			$addData['buildY'] = $Host2['buildY'];//建造年份
			$addData['buildM'] = $Host2['buildM'];//建造月份
			$addData['area'] = $Host2['area'];//房屋面积
			$addData['religion'] = $Host1['religion'];//宗教信仰
			$addData['profession'] = $Host1['profession'];//房主职业
			$addData['race'] = $Host1['ethnicity'];//种族背景
			$addData['language'] = $Host1['primary_language'];//主要语言
			$addData['order_id'] = $host_id;//住家号
			$houseAdd = $this->insert($this->_house,$addData);
			if($houseAdd){
				$this->json_ret(1);
			}
		}
	}

	/*房屋title设置*/
	public function setHouseName(){
		$host_id = $this->input->post('host_id',true);
		$data['title'] = trim($this->input->post('title',true));
		$res = $this->update($this->_HostInfo,$data,array('host_id'=>$host_id));
		if($res){
			$this->json_ret(888);
		}
	}


	/*发布住家拒绝理由*/
	public function objection(){
		$host_id = $this->input->post('orderId',true);
		$data['objection'] = $this->input->post('objection',true);
		$data['status'] = '4';
		$dataImg['state'] = '4';
		$res[1] = $this->update($this->_HostInfo,$data,array('host_id'=>$host_id));
		$res[2] = $this->update($this->_FamilyInfo,$data,array('host_id'=>$host_id));
		$res[3] = $this->update($this->_home_info,$data,array('host_id'=>$host_id));
		$res[4] = $this->update($this->_MisInfo,$data,array('host_id'=>$host_id));
		$res[5] = $this->update($this->_home_image,$dataImg,array('host_id'=>$host_id));
		$res[6] = $this->update($this->_home_rule,$data,array('host_id'=>$host_id));
		if($res[1] && $res[2] && $res[3] && $res[4] && $res[5] && $res[6]){
			$this->json_ret(1);
		}
	}




	/* 夏令营管理 */
	public function camp_list(){
		$like = array();
		$index = $this->input->get('per_page',true);
		$url = '/admin/common/lesson_consult';
		$data = $this->findPageData($this->_camp, $url, array(), 15,$index,$like);
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('camp' => true));
		$this->load->view('admin/camp/list',array('data'=>$data));
		$this->load->view('admin/footer');
	}

	/* 夏令营图片管理 */
	public function camp_pic($id){
		$data = $this->find($this->_camp,array('id'=>$id),true,'img,id');
		if(strpos($data['img'],'|')){
			$data['pictures'] = explode('|',$data['img']);
		}else{
			$data['pictures'] = array($data['img']);
		}
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('camp' => true));
		$this->load->view('admin/camp/pic',$data);
		$this->load->view('admin/footer');
	}
	public function camp_pic_submit($id){
		$this->load->helper('file_path');
		$data = $this->find($this->_camp,array('id'=>$id),true,'img');
		if(!$data['img']){
			$data['pictures'] = array();
			$count = 0;
		}else{
			if(strpos($data['img'],'|')){
				$data['pictures'] = explode('|',$data['img']);
				$ac = $this->input->post('ac',true);
				if($ac != '0'){
					array_unshift($data['pictures'],$data['pictures'][$ac]);
					unset($data['pictures'][$ac+1]);
					$img = implode("|",$data['pictures']);
					$this->update($this->_camp,array('img'=>$img),array('id'=>$id));
				}

			}else{
				$data['pictures'] = array($data['img']);
			}
			$count = count($data['pictures']);
		}

		$name = 'pic'.$id.$count;
		$path = ROOTPATH.'public/images/web/camp/';
		$this->load->model ( 'Common_model', 'mCommon' );
		$res = $this->mCommon->uploadPic ($path,$name,'pic'.$id.'-add');
		if($res['status']){

			$data['img'] = $data['img']?$data['img'].'|'.$res['msg']:$res['msg'];
			$this->update($this->_camp,array('img'=>$data['img']),array('id'=>$id));
		}
		header("Location: /admin/common/camp_pic/".$id);
	}

	public function camp_img_delete(){
		$id = $this->input->get('id',true);
		$picNo = $this->input->get('picNo',true);
		$data = $this->find($this->_camp,array('id'=>$id),true,'img');
		if(strpos($data['img'],'|')){
			$data['pictures'] = explode('|',$data['img']);
		}else{
			$data['pictures'] = array($data['img']);
		}
		$path = ROOTPATH.'public/images/web/camp/';
		unlink($path.$data['pictures'][$picNo]);
		unset($data['pictures'][$picNo]);
		$img = implode("|",$data['pictures']);
		$res = $this->update($this->_camp,array('img'=>$img),array('id'=>$id));

		$this->delete($this->_message_info,array('id' => $id));
		if($res){
			$this->json_ret(1);
		}
	}
	//夏令营添加和编辑页面
	public function camp_add_page($id){
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('camp' => true));
		if(empty($id)){
			$this->load->view('admin/camp/add_page');
		}else{
			$data = $this->find($this->_camp,array('id'=>$id));
			$data['type'] = 'edit';
			$this->load->view('admin/camp/add_page',$data);
		}
		$this->load->view('admin/footer');

	}

	public function camp_add(){
		$id = trim($this->input->post('camp_id',true));
		$data['name_cn'] = trim($this->input->post('name_cn',true));
		$data['name_en'] = trim($this->input->post('name_en',true));
		$data['time'] = trim($this->input->post('time',true));
		$data['age'] = trim($this->input->post('age',true));
		$data['price'] = trim($this->input->post('price',true));
		$data['list_feature1'] = trim($this->input->post('list_feature1',true));
		$data['list_feature2'] = trim($this->input->post('list_feature2',true));
		$data['list_feature3'] = trim($this->input->post('list_feature3',true));
		$data['feature'] = trim($this->input->post('feature',true));
		$data['intro'] = trim($this->input->post('intro',true));
		$data['plan'] = trim($this->input->post('plan',true));
		$data['price_include'] = trim($this->input->post('price_include',true));
		$data['timetable'] = trim($this->input->post('timetable',true));
		$data['Mtimetable'] = trim($this->input->post('Mtimetable',true));
		if($id){
			$res = $this->update($this->_camp,$data,array('id'=>$id));
		}else{
			$res = $this->insert($this->_camp,$data);
		}

		if($res){
			$this->json_ret(888);
		}
	}
	public function camp_consult(){
		$like = array();
		$index = $this->input->get('per_page',true);
		$url = '/admin/common/camp_consult';
		$data = $this->findPageData($this->_lesson_consult, $url, array('type'=>1), 15,$index,$like);
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('camp' => true));
		$this->load->view('admin/lesson/consult',array('data'=>$data));
		$this->load->view('admin/footer');
	}


	public function mysql_delete() {
		$id = $this->input->get('id',true);
		$table = $this->input->get('table',true);
		if($table == 'camp'){
			$this->delete($this->_camp,array('id' => $id));
		}
		$this->json_ret(1);
	}


	public function get_tel_and_content(){
		$tel = $this->input->post('tel',true);
		$content = $this->input->post('value',true);
		$this->load->library('RESMS');
		$rs = $this->resms->SMS_Reply($tel,$content);
		$a = $this->xmlToArray($rs);
		if($a['status'] == '0'){
			echo 888;
		}
	}



	function xmlToArray($xml)
	{
		libxml_disable_entity_loader(true);
		$values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
		return $values;
	}



	/* 衔接课程留言 */
	public function lesson_consult(){
		$like = array();
		$index = $this->input->get('per_page',true);
		$url = '/admin/common/lesson_consult';
		$data = $this->findPageData($this->_lesson_consult, $url, array('type'=>2), 15,$index,$like);
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('lesson' => true));
		$this->load->view('admin/lesson/consult',array('data'=>$data));
		$this->load->view('admin/footer');
	}
	/* 站内回复消息 */
	public function Site_Reply(){
		$parentId = $this->input->post('parentId',true);
		if($parentId != '0'){
			$this->update($this->_site_reply,array('is_read'=>1),array('replyId'=>$parentId));
		}
		$data['is_continue'] = $this->input->post('is_continue',true);
		$data['ReplyId'] = $this->input->post('id',true);
		$data['content'] = $this->input->post('value',true);
		$data['user_id'] = $this->input->post('userId',true);
		$data['reply_time'] = date('Y-m-d H:i:s',time());
		$data['type'] = 1;
		$data['is_read'] = 1;
		$rs = $this->insert($this->_site_reply,$data);
		$this->update($this->_lesson_consult,array('is_reply'=>'2'),array('id'=>$data['ReplyId']));
		if($rs){
			$this->json_ret(888);
		}
	}
	/*查看回复内容*/
	public function View_Reply(){
		$id = $this->input->post('id',true);
		$rs = $this->find($this->_site_reply,array('replyId'=>$id));
		$this->json_ret(888,$rs);
	}


	/* 微信咨询 */
	public function wechat_consult(){
		$like = array();
		$index = $this->input->get('per_page',true);
		$url = '/admin/common/lesson_consult';
		$data = $this->findPageData($this->_lesson_consult, $url, array('type'=>6), 15,$index,$like);
		$this->load->view('admin/header');
		$this->load->view('admin/nav',array('wechat' => true));
		$this->load->view('admin/lesson/consult',array('data'=>$data));
		$this->load->view('admin/footer');
	}


















}