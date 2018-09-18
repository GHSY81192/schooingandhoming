<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {
	protected $en;
	protected $mobile;
	private $_userData;
	public function __construct(){
		parent::__construct();
		if ($this->isMobile()) {
			$this->mobile = true;
//			$this->load->helper('url');
//			redirect('/mobile/common');
		}else{
			$this->mobile = false;
		}
		$user_id = $this->session->user_id;
		$this->_userData = $this->find($this->_user,array('id'=>$user_id),true,'head_image,name_cn');
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
	
	// 首页-z
	public function index()
	{
		$data['zt'] = $this->find($this->_special,array('is_hot'=>'1'),false,'*',array('field'=>'desc','type'=>'desc'));
		if($this->mobile){
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
			$banner = $this->find($this->_index_config,array('type' => 'mobile_banner'),false,'*',array('field' => 'sort' , 'type' => 'desc'));
			$data['banner'] = $banner;

			$hot_down = $this->find($this->_index_config,array('type' => 'up'),false,'*',array('field' => 'id' , 'type' => 'asc'));
			$data['hot_down'] = $hot_down;
			$this->load->view('mobile/index',$data);
			$this->_loadMobileFoot(true,1,$this->_userData);
		}else{
			$this->load->helper('file_path');
			$this->_loadHead();
			//热门学校
			$school_type = lang('is_en') ? $this->config->item('school_type_en'):$this->config->item('school_type');
			$hot_school = $this->find($this->_school,array('is_hot' => '1'),false,'id,city_id,name_cn,name_en,index_hot_cover,basic_school_type,financial_tuition',array('field' => 'sort' , 'type' => 'asc'));
			foreach($hot_school as &$item):
				$city = $this->find($this->_city,array('id' => $item['city_id']));
				$city_name = !lang('is_en') ? $city['name_en'] : $city['name_cn'];
				$state = $this->find($this->_state,array('id' => $city['state_id']));
				$state_name = '';
				if ($state) {
					$state_name = !lang('is_en') ? $state['name_en'] : $state['name_cn'];
					$item['state_code'] = $state['state_code'];
				}
				$item['location'] = $city_name . '，' . $state_name;

				$item['basic_school_type'] = $school_type[$item['basic_school_type']];
				unset($item);
			endforeach;
			$data['hot_school'] = $hot_school;
			$data['state'] = $this->find($this->_state,array(),false,'name_cn,id,name_en');
			//暑期项目
			$data['summer_school'] = $this->find($this->_summer,array('is_hot'=>1),false,'name_cn,name_en,id,img');
			//排名
			$data['xyjz']= $this->get_index_school_financial_contribute_top20();
			$data['sat'] = $this->get_index_school_sat_top20();
			$data['ap'] = $this->get_index_school_ap_top20();
			$data['sport'] = $this->get_index_school_sport_top20();
			$data['ssb'] = $this->get_index_school_teacher_and_student_top20();
			$data['gxwszb'] = $this->get_index_school_high_degree_top20();
			$banner = $this->find($this->_index_config,array('type' => 'banner'),false,'*',array('field' => 'sort' , 'type' => 'desc'));
			$data['banner'] = $banner;
			$hot_up = $this->find($this->_index_config,array('type' => 'up'),false,'*',array('field' => 'id' , 'type' => 'asc'));
			$data['hot_up'] = $hot_up;
			$data['article'] = $this->find($this->_article,array('is_hot'=>1),false,'title,id,img,intro,issue_time,author',array('field'=>'id','type'=>'desc'),array(),3);

			$this->load->view('web/index',$data);
			$this->_loadFoot();
		}

	}



	public function Home_Detail($house_id){
		$this->load->helper('file_path');
		$info = $this->find($this->_house,array('id' => $house_id),true,'order_id');
		$data = $this->db->select('a.title,a.hostname,a.sex,a.primary_language,a.religion,a.ethnicity,a.marital,a.child_num,b.smoke,f.pet,f.hobby,c.city_id,c.state_id,c.zipcode,c.buildY,c.buildM,c.area,c.wifi,c.ownership,c.house_type,c.bedroom_num,c.toilet_num,d.describe,d.rule,d.month_price,a.lng,a.lat')
			->from($this->_HostInfo.' as a')
			->where(array('a.host_id'=>$info['order_id']))
			->join($this->_FamilyInfo.' as b','a.host_id = b.host_id')
			->join($this->_home_info.' as c','a.host_id = c.host_id')
			->join($this->_home_rule.' as d','a.host_id = d.host_id')
			->join($this->_state.' as e','c.state_id = e.id')
			->join($this->_MisInfo.' as f','a.host_id = f.host_id')
			->get()
			->row_array();
		$data['houseImg'] = $this->find($this->_home_image,array('host_id'=>$info['order_id']),false,'user_id,pic_name');
		$marital = ($data['marital']==2?1:0);
		$data['family_num'] = $data['child_num'] + $marital;
		$data['Allhobby'] = $this->find($this->_hobby,array(),false);


		$data['cityName'] = $this->find($this->_city,array('id'=>$data['city_id']),true,'name_cn,name_en');
		$data['stateName'] = $this->find($this->_state,array('id'=>$data['state_id']),true,'name_cn,name_en');


		if(strstr($data['hobby'],',')){
			$data['hobby'] = explode(',',$data['hobby']);
		}else{
			$data['hobby'] = [$data['hobby']];
		}

		$this->_loadHead('new住家',true);
		$this->load->view('web/homeDetail',$data);
		$this->_loadFoot();
	}



	public function phpinfo(){
		echo phpinfo();
	}


	//住家详情 Host Detail
	public function homeDetail($house_id)
	{
		$this->load->helper('file_path');
		$house = $this->find($this->_house,array('id' => $house_id));

		$city = $this->find($this->_city,array('id' => $house['city_id']));
		$data['cityLocation'] = array(
				'lat' => @$city['lat'],
				'lng' => @$city['lng']
		);
		
		$city_name = lang('is_en') ? $city['name_en'] : $city['name_cn'];
		$state = $this->find($this->_state,array('id' => $city['state_id']));
		$state_name = lang('is_en') ? $state['name_en'] : $state['name_cn'];
		$house['location'] = $state_name . '，' . $city_name;
		
		$house['language'] = lang('is_en') ? $this->config->item('lang_en')[$house['language']] : $this->config->item('lang')[$house['language']];
		$families = $this->count($this->_house_family,array('house_id' => $house['id']),false);
		$house['families'] = $families;

		$images = $this->find($this->_house_image,array('house_id' => $house['id']),false,'*',array('field' => 'sort' , 'type' => 'asc'),'',3);
		$house['images'] = $images;

		$house['house_create_time'] = lang('is_en') ? date('Y',strtotime($house['house_create_time'])):date('Y年',strtotime($house['house_create_time']));
		$house['state_name'] = $state_name;
		$house['house_last_decorate'] =  lang('is_en') ? date('Y',strtotime($house['house_last_decorate'])):date('Y年',strtotime($house['house_last_decorate']));

		$rules = $this->find($this->_house_rule,array('house_id' => $house['id']),false);
		if($rules != NULL):
			foreach($rules as &$item):
				$rule_names[] = $this->find($this->_house_rule_item,array('id' => $item['rule_id']),true)['name'];
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
			$suggest_school_item = array_slice($suggest_school_item,0,3);
			if(!empty($suggest_school_item)) {
				foreach($suggest_school_item as &$item) {
					$state = $this->find($this->_state,array('id' => $item['state_id']));
					if(!empty($state)) {
						$item['state_code'] = $state['state_code'];
					} else {
						$item['state_code'] = '';
					}
					unset($item);
				}
			}
		endif;
		$house['suggest_school_item'] = $suggest_school_item;

		$data['house_detail'] = $house;
		//相似住家
		$otherHouse = $this->find($this->_house,array('id !='=>$house_id),false,'*',array(),array(),3);
		foreach ($otherHouse as &$item){
			$city = $this->find($this->_city,array('id' => $item['city_id']));
			$city_name = lang('is_en') ? $city['name_en'] : $city['name_cn'];
			$state = $this->find($this->_state,array('id' => $city['state_id']));
			$state_name = lang('is_en') ? $state['name_en'] : $state['name_cn'];
			$item['location'] = $state_name . '，' . $city_name;
			$item['state_code'] = $state['state_code'];
			unset($item);
		}
		$data['otherHouse'] = $otherHouse;
		
		$this->_loadHead(@$house['title'],true);
		$this->load->view('web/home_detail',$data);
		$this->_loadFoot();
	}



	/* 学校详情页 - z */
	public function schoolDetail($school_id){
		$this->load->helper('file_path');
		$school = $this->find($this->_school,array('id' => $school_id));
		$school['contact_address_number'] = json_decode($school['contact_address_number'],true);
		if(!empty($school['city_id'])) {
			$city = $this->find($this->_city,array('id' => $school['city_id']));
			$city_name = $city['name_en'];
			$state = $this->find($this->_state,array('id' => $city['state_id']));
			$state_code = $state['state_code'];
			$school['city_name'] = $city_name;
			$school['state_code'] = $state_code;
		} else {
			$school['city_name'] = '';
			$school['state_code'] = '';
		}

		if($this->mobile){
			$school['basic_createtime'] = empty($school['basic_createtime']) ? '暂无' : substr($school['basic_createtime'],0,4);
			$school['basic_accept_international_students'] = $school['basic_accept_international_students'] == 0 ? '否' : '是';
			$school['apply_ssat'] = $school['apply_ssat'] == 0 ? '否' : '是';
			$school['teach_esl'] = $school['teach_esl'] == 0 ? '否' : '是';

			$cityLocation = array(
				'lng'=>'-118.22905141145563',
				'lat'=>'34.05633368635888'
			);
			if ( !empty($school['lng']) ) {
				$cityLocation = array($school['lng'],$school['lat']);
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
		}else{
			$school_type = lang('is_en') ? $this->config->item('school_type_en'):$this->config->item('school_type');

			if(strstr($school['url'],'http://')){
				$school['url'] = substr($school['url'],7);
			}
			if(strstr($school['url'],'https://')){
				$school['url'] = substr($school['url'],8);
			}
			if(substr($school['url'],-1)=='/'){
				$school['url'] = substr($school['url'],0,-1);
			}
			$school['basic_school_type'] = $school_type[$school['basic_school_type']];

			$tag1 = lang('is_en') ? 'None':'暂无';
			$tag2 = lang('is_en') ? 'Y':'是';
			$tag3 = lang('is_en') ? 'N':'否';

			$school['basic_createtime'] = empty($school['basic_createtime']) ? $tag1 : substr($school['basic_createtime'],0,4);
			$school['basic_accept_international_students'] = $school['basic_accept_international_students'] == 0 ? $tag3 :  $tag2;
			$school['apply_ssat'] = $school['apply_ssat'] == 0 ? $tag3 : $tag2;
			$school['teach_esl'] = $school['teach_esl'] == 0 ? $tag3 :  $tag2;

			$cityLocation = array(
				'lng'=>'-118.22905141145563',
				'lat'=>'34.05633368635888'
			);
			if ( !empty($school['city_id']) ) {
				$cityLocation = $this->find($this->_city,array('id'=>$school['city_id']),true,'lng,lat');
			}
			$aps = $this->find($this->_school_ap,array('school_id' => $school['id']),false);
			$school['aps_num'] = count($aps);
			if($aps != NULL):
				foreach($aps as $item):
					$ap_names[] = $this->find($this->_school_ap_item,array('id' => $item['ap_id']))['name'];
				endforeach;
				$school['ap_names'] = $ap_names;
			else:
				$school['ap_names'] = [];
			endif;
			if(empty($school['ap_names'][0])){
				array_shift($school['ap_names']);
			}


			$sports = $this->find($this->_school_sport_item,array('school_id' => $school['id']),false);
			$school['aports_num'] = count($sports);
			if($sports != NULL):
				foreach($sports as $item):
					$sport_item_names[] = $this->find($this->_school_sport_items,array('id' => $item['sport_item_id']))['name'];
				endforeach;
				$school['sport_item_names'] = $sport_item_names;
			else:
				$school['sport_item_names'] = [];
			endif;

			$clubs = $this->find($this->_school_club,array('school_id' => $school['id']),false);
			$school['clubs_num'] = count($clubs);
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
				if(count($gd_names)%3 == 1){
					array_push($gd_names,'');
					array_push($gd_names,'');
				}
				if(count($gd_names)%3 == 2){
					array_push($gd_names,'');
				}
				
				$school['gd_names'] = $gd_names;
			else:
				$school['gd_names'] = [];
			endif;
			$images = $this->find($this->_school_image,array('school_id' => $school['id']),false,'*',array('field' => 'sort' , 'type' => 'asc'),'',3);
			$img_num = count($images);
			if($img_num != 3){

				$random_shcool_views_img = array();
				for($i=0;$i<3;$i++){
					$random_img_key = rand(1,10);
					if(in_array($random_img_key,$random_shcool_views_img)){
						$i--;
					}else{
						array_push($random_shcool_views_img,$random_img_key);
					}
				}
				if($img_num == 2){
					array_push($images,$random_shcool_views_img[0]);
				}
				if($img_num == 1){
					array_push($images,$random_shcool_views_img[0]);
					array_push($images,$random_shcool_views_img[1]);
				}
				if($img_num == 0){
					array_push($images,$random_shcool_views_img[0]);
					array_push($images,$random_shcool_views_img[1]);
					array_push($images,$random_shcool_views_img[2]);
				}

			}
			$school['images'] = $images;


			//推荐学校,10所学校的id,随机获取3所
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
			$this->_loadHead(@$school['name_cn'],true);
			$this->load->view('web/school_detail',$data);
			$this->_loadFoot();
		}


	}


	public function schoolList(){
		if($this->mobile){
			$this->_loadMobileHead('S&H搜学校',true);
			$this->load->model ( 'Common_model', 'mCommon' );
			$res = $this->mCommon->searchSchool();
			$this->load->helper('file_path');
			$res['apList'] = $this->find($this->_school_ap_item,array(),false);
			$res['grade'] = $this->find('school_grade',array('is_show'=>1),false,'*',array(),array(),'', '',array(),array(),'type');
			$res['s_state'] = $this->find($this->_state,array(),false);
			if($res['ret']['state']){
				$res['state_name'] = $this->find($this->_state,array('id'=>$res['ret']['state']),true,'name_cn,name_en');
			}
			$this->load->view('mobile/school_list',$res);
			$this->_loadMobileFoot(false,2,$this->_userData,false);
		}else{
			$like = $where = $where_in = array();
			$ret['type'] = $type = $this->input->get('type',true); // 暂时没有
			$ret['name'] = $name = $this->input->get('name',true);
			$ret['basic_school_type'] = $basic_school_type = $this->input->get('basic_school_type',true); //学校类型
			$ret['basic_grade'] = $basic_grade = $this->input->get('basic_grade',true); //学校年纪
			$banner_search_people = $this->input->get('banner_search_people',true);
			$banner_search_tuition = $this->input->get('banner_search_tuition',true);
			if(!empty($banner_search_people)){
				switch($banner_search_people){
					case 1:
						$ret['basic_school_enrollments_min'] = $basic_school_enrollments_min = 0;
						$ret['basic_school_enrollments_max'] = $basic_school_enrollments_max = 100;
						break;
					case 2:
						$ret['basic_school_enrollments_min'] = $basic_school_enrollments_min = 101;
						$ret['basic_school_enrollments_max'] = $basic_school_enrollments_max = 500;
						break;
					case 3:
						$ret['basic_school_enrollments_min'] = $basic_school_enrollments_min = 501;
						$ret['basic_school_enrollments_max'] = $basic_school_enrollments_max = 1000;
						break;
					case 4:
						$ret['basic_school_enrollments_min'] = $basic_school_enrollments_min = 1001;
						break;
				}
			}else{
				$ret['basic_school_enrollments_min'] = $basic_school_enrollments_min = $this->input->get('basic_school_enrollments_min',true);//学校人数
				$ret['basic_school_enrollments_max'] = $basic_school_enrollments_max = $this->input->get('basic_school_enrollments_max',true);//学校人数
			}

			if(!empty($banner_search_tuition)){
				switch($banner_search_tuition){
					case 1:
						$ret['financial_tuition_min'] = $financial_tuition_min = 0;
						$ret['financial_tuition_max'] = $financial_tuition_max = 10000;
						break;
					case 2:
						$ret['financial_tuition_min'] = $financial_tuition_min = 10001;
						$ret['financial_tuition_max'] = $financial_tuition_max = 20000;
						break;
					case 3:
						$ret['financial_tuition_min'] = $financial_tuition_min = 20001;
						$ret['financial_tuition_max'] = $financial_tuition_max = 30000;
						break;
					case 4:
						$ret['financial_tuition_min'] = $financial_tuition_min = 30001;
						$ret['financial_tuition_max'] = $financial_tuition_max = 40000;
						break;
					case 5:
						$ret['financial_tuition_min'] = $financial_tuition_min = 40001;
						$ret['financial_tuition_max'] = $financial_tuition_max = 50000;
						break;
					case 6:
						$ret['financial_tuition_min'] = $financial_tuition_min = 60000;
						break;
				}
			}else{
				$ret['financial_tuition_min'] = $financial_tuition_min = $this->input->get('financial_tuition_min',true); //学费
				$ret['financial_tuition_max'] = $financial_tuition_max = $this->input->get('financial_tuition_max',true); //学费
			}



			$ret['basic_proportion_of_individuals'] = $basic_proportion_of_individuals = $this->input->get('basic_proportion_of_individuals',true);//国际生比例

			$ret['state'] = $this->input->get('state',true);
			$ret['ap'] = $ap = $this->input->get('ap',true);
			$ret['suggest_house'] = $suggest_house = $this->input->get('suggest_house');
			if($suggest_house){
				$where['suggest_house'] = $suggest_house;
			}
			$ret['state_id'] = $state_id = $this->input->get('state_id',true);
			if ($basic_school_type) {
				$arr = explode(',', trim($basic_school_type,','));
				$where_in[] = array(
					'field'=>'basic_school_type',
					'value'=> $arr
				);
			}
			if ($basic_grade) {
				$basic_arr = explode(',', trim($basic_grade,','));
				if (!empty($basic_arr)) {
					foreach($basic_arr as $item) {
						$sp_arr = explode('-',$item);
						foreach($sp_arr as $sp) {
							$arr[] = $sp;
						}
					}
					$where_in[] = array(
						'field' => 'basic_grade_start',
						'value' => $arr
					);
				}
			}
			if ($financial_tuition_min) {
				$where['financial_tuition >='] = $financial_tuition_min;
			}
			if ($financial_tuition_max) {
				$where['financial_tuition <='] = $financial_tuition_max;
			}
			if($basic_proportion_of_individuals){
				$arr = explode(',', trim($basic_proportion_of_individuals,','));
				if (!empty($arr)) {
					sort($arr);	//先排序 取最小的
					$where['basic_proportion_of_individuals >='] = $arr[0];
				}
			}

			if ($ap) {
				$arr = explode(',', trim($ap,','));
				if (!empty($arr)) {
					sort($arr);	//先排序 取最小的  
					if(count($arr) == 1){
						if(in_array(9, $arr)){
							$where['ap_num <='] = 10;
						}
						if(in_array(12,$arr)){
							$where['ap_num >='] = 11;
							$where['ap_num <='] = 15;
						}
						if(in_array(17,$arr)){
							$where['ap_num >='] = 16;
							$where['ap_num <='] = 20;
						}
						if(in_array(21,$arr)){
							$where['ap_num >='] = 21;
						}
					}

					if(count($arr) == 2){
						if(in_array(9, $arr) && in_array(12, $arr)){
							$where['ap_num <='] = 15;
						}
						if(in_array(9, $arr) && in_array(17, $arr)){
							$where_in[] = array('field'=>'ap_num','value'=>array(0,1,2,3,4,5,6,7,8,9,10,16,17,18,19,20));
						}
						if(in_array(9, $arr) && in_array(21, $arr)){
							$where['ap_num <='] = 10;
							$where['ap_num >='] = 21;
						}
						if(in_array(12, $arr) && in_array(17, $arr)){
							$where['ap_num <='] = 20;
							$where['ap_num >='] = 11;
						}
						if(in_array(12, $arr) && in_array(21, $arr)){
							$where['ap_num >='] = 11;
							$where['ap_num != 16 and ap_num != 17 and ap_num != 18 and ap_num != 19 and ap_num !='] = 20;
						}
						if(in_array(17, $arr) && in_array(21, $arr)){
							$where['ap_num >='] = 16;
						}
					}

					if(count($arr) == 3){
						if(!in_array(9, $arr)){
							$where['ap_num >='] = 11;
						}
						if(!in_array(12,$arr)){
							$where['ap_num <='] = 10;
							$where['ap_num >='] = 16;
						}
						if(!in_array(17,$arr)){
							$where['ap_num <='] = 15;
							$where['ap_num >='] = 21;
						}
						if(!in_array(21,$arr)){
							$where['ap_num <='] = 20;
						}
						
					}

					
					
				}
			}

			if ($state_id) {
				$arr = explode(',', trim($state_id,','));
				$where_in[] = array(
					'field'=>'state_id',
					'value'=> $arr
				);
			}

			if($basic_school_enrollments_min){
				$where['basic_school_enrollments >='] = $basic_school_enrollments_min;
			}
			if($basic_school_enrollments_max){
				$where['basic_school_enrollments <='] = $basic_school_enrollments_max;
			}
			$orderBy = array('field' => 'id','type' => 'asc');
			$ret['city_id'] = $city_id = $this->input->get('city_id',true);
			if($name) {
				$this->load->model ( 'Common_model', 'mCommon' );
				$rs = $this->mCommon->search_school_name();
				if(!empty($rs)) {

					if ($rs['state_id']) {
						$where['state_id'] = $rs['state_id'];
					}

					if ($rs['city_id'] && !$rs['state_id']) {
						$where['city_id'] = $rs['city_id'];
					}

				}else{
					$like[] = array('field' => 'name_cn','name' => $name);
					$like[] = array('field' => 'name_en','name' => $name);
				}

			}


			$this->load->helper('file_path');
			$index = $this->input->get('per_page',true);
			if($index){
				$a = strpos($_SERVER['QUERY_STRING'],'&per_page');
				$_SERVER['QUERY_STRING'] = substr($_SERVER['QUERY_STRING'],0,$a);
			}

			$url = '/web/schoolList?'.$_SERVER['QUERY_STRING'];
			$ret['sort'] = $sort['field'] = $this->input->get('sort',true);
			$ret['sort_type'] = $sort['type'] = $this->input->get('sort_type',true);
			$res = $this->findWebPageData($this->_school, $url, $where, 8,$index,$like,$where_in,$sort);
			$school_type = lang('is_en') ? $this->config->item('school_type_en'):$this->config->item('school_type');
			$data = $res['data'];
			foreach($data as &$item) {
				$city_id = $item['city_id'];
				if(!empty($city_id)) {
					$city = $this->find($this->_city,array('id' => $city_id));
					$city_name = $this->en ? $city['name_en'] : $city['name_cn'];
					$state = $this->find($this->_state,array('id' => $city['state_id']));
					$state_name = $this->en ? $state['name_en'] : $state['name_cn'];
					$item['city_name'] =  $city_name. '<br />' . $state_name;
				} else {
					$item['city_name'] = '';
				}
				$item['school_type'] = $school_type[$item['basic_school_type']];
				unset($item);
			}
			$list['grade'] = $this->find('school_grade',array('is_show'=>1),false,'*',array('field'=>'id','type'=>'desc'),array(),'', '',array(),array(),'type');
			$list['data'] = $data;
			$list['state'] = $this->find($this->_state,array(),false,'*',array('field'=>'sort','type'=>'asc'));
			$list['count'] = $res['count'];
			$list['ret'] = $ret;
			$this->_loadHead('找学校');
			$this->load->view('web/school_list',$list);
			$this->_loadFoot();
		}

	}



	public function hotSchool(){
		$this->_loadHead('布里尔利学校');
		$this->load->view('web/hot_school');
		$this->_loadFoot();
	}


	public function homeList(){
		if($this->mobile){
			$this->_loadMobileHead('S&H找住家',true);
			$this->load->model ( 'Common_model', 'mCommon' );
			$res = $this->mCommon->searchHouse();
			$this->load->helper('file_path');
			$res['num_change'] = $this->config->item('num_change');
			$res['race'] = $this->config->item('race');
			$res['s_state'] = $this->find($this->_state,array(),false);
			if($res['ret']['state']){
				$res['state_name'] = $this->find($this->_state,array('id'=>$res['ret']['state']),true,'name_cn,name_en');
			}
			$this->load->view('mobile/house_list',$res);
			$this->_loadMobileFoot(false,2,$this->_userData,false);
		}else{
			$ret = $whereCity =  $where_in = array();
			$ret['name'] = $name = $this->input->get('name',true);
			$ret['house_type'] = $house_type = $this->input->get('house_type',true); // 房屋类型
			$ret['race'] = $race = $this->input->get('race',true);	//种族背景
			$banner_search_home_financial = $this->input->get('banner_search_home_financial',true);
			if(!empty($banner_search_home_financial)){
				switch($banner_search_home_financial){
					case 1:
						$ret['financial_tuition_min'] = $basic_school_enrollments_min = 0;
						$ret['financial_tuition_max'] = $basic_school_enrollments_max = 1000;
						break;
					case 2:
						$ret['financial_tuition_min'] = $basic_school_enrollments_min = 1001;
						$ret['financial_tuition_max'] = $basic_school_enrollments_max = 3000;
						break;
					case 3:
						$ret['financial_tuition_min'] = $basic_school_enrollments_min = 3001;
						$ret['financial_tuition_max'] = $basic_school_enrollments_max = 5000;
						break;
					case 4:
						$ret['financial_tuition_min'] = $basic_school_enrollments_min = 5001;
						$ret['financial_tuition_max'] = $basic_school_enrollments_max = 7000;
						break;
					case 5:
						$ret['financial_tuition_min'] = $basic_school_enrollments_min = 7001;
						$ret['financial_tuition_max'] = $basic_school_enrollments_max = 9000;
						break;
					case 6:
						$ret['financial_tuition_min'] = $basic_school_enrollments_min = 9001;
						$ret['financial_tuition_max'] = $basic_school_enrollments_max = 10000;
						break;
				}
			}else{
				$ret['financial_tuition_min'] = $financial_tuition_min = $this->input->get('financial_tuition_min',true); //费用
				$ret['financial_tuition_max'] = $financial_tuition_max = $this->input->get('financial_tuition_max',true); //费用
			}

			$ret['family_pet'] = $family_pet = $this->input->get('family_pet',true); //有无宠物
			$ret['language'] = $language = $this->input->get('language',true); //语言
			$ret['profession'] = $profession = $this->input->get('profession',true);//职业
			if (strstr($name, ',')) {
				$arr = explode(',', $name);
				$name = $arr[0];
			}
			$data = $where = $like = array();
			if ($house_type) {
				$arr = explode(',', trim($house_type,','));
				$where_in[] = array(
					'field'=>'house_type',
					'value'=> $arr
				);
			}
			if ($race) {
				$arr = explode(',', trim($race,','));
				$where_in[] = array(
					'field'=>'race',
					'value'=> $arr
				);
			}


			if ($family_pet && !strpos($family_pet, '0')) {
				$where['family_pet <>'] = NULL;
			}

			if ($financial_tuition_min) {
				$where['price >='] = $financial_tuition_min;
			}
			if ($financial_tuition_max) {
				$where['price <='] = $financial_tuition_max;
			}
			if($profession) {
				$like[] = array('field' => 'profession','name' => $profession);
			}

			$orderBy = array('field' => 'id','type' => 'asc');
			$city_id = $this->input->get('city_id',true);

			$this->load->helper('file_path');
			$index = $this->input->get('per_page',true);
			$url = '/web/homeList/';
			$ret['sort'] = $sort['field'] = $this->input->get('sort',true);
			$ret['sort_type'] = $sort['type'] = $this->input->get('sort_type',true);
			$res = $this->findWebPageData($this->_house, $url, $where, 15,$index,$like,$where_in,$sort);

			$data = $res['data'];
			foreach($data as &$item) {
				$city_id = $item['city_id'];
				if(!empty($city_id)) {
					$city = $this->find($this->_city,array('id' => $city_id));
					$city_name = lang(is_en) ? $city['name_en'] : $city['name_cn'];
					$state = $this->find($this->_state,array('id' => $city['state_id']));
					$state_name = lang(is_en) ? $state['name_en'] : $state['name_cn'];
					$item['city_name'] =   $city_name. '<br />' . $state_name;
				} else {
					$item['city_name'] = '';
				}
			}
			$list['data'] = $data;
			$list['count'] = $res['count'];
			$list['ret'] = $ret;
			$profession = lang('is_en')? $this->config->item('profession_en'): $this->config->item('profession');
			$list['profession'] = $profession;
			$this->_loadHead('找住家');
			$this->load->view('web/home_list',$list);
			$this->_loadFoot();
		}

	}
	//私人订制
	public function personalTailor()
	{
		$this->load->helper('file_path');
		$user_id = $this->session->user_id;
		$user = array();
		if(isset($user_id)):
			$user = $this->find($this->_user,array('id' => $user_id));
		endif;
		$data['user'] = $user;
		$data['language'] = lang('is_en') ? $this->config->item('lang_en') : $this->config->item('lang');
		$state = $this->find($this->_state,array(),false,'id,name_cn,name_en');
		$data['state'] = $state;
		if($this->mobile){
			$this->_loadMobileHead('私人定制',false);
			$this->load->view('mobile/personal_tailor',$data);
			$this->_loadMobileFoot(false,'',$this->_userData);
		}else{
			$this->_loadHead('Schooling Homing');
			$this->load->view('web/personal_tailor',$data);
			$this->_loadFoot();
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
		if($source != 3){
			$source = $this->mobile?2:1;
		}
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
						'identity' => '3',
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
			$updateUser['identity'] = 3;
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
		$order_id = time() . $insert_id;

		$updateData = array('order_id' => $order_id);
		$where = array('id' => $insert_id);
		$this->update($this->_personal_tailor,$updateData,$where);
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
		$res = $this->email163('yolanda.ren@schoolingandhoming.com',$msg,'S&H-私人订制');
		if($res=='yes'){
			$this->json_ret(1);
		}

	}


	//登录
	public function login()
	{

		if($this->input->post('do_post',true)){
			$wherelogin = $this->input->post('wherelogin',true);
			$lessonId = $this->input->post('lessonId',true);
			//邮箱or手机登陆逻辑
			if($this->input->post('type',true) == 2){
				$email = $this->input->post('email',true);
				$tel = $this->input->post('tel',true);
				$password = $this->input->post('password',true);
				if($email){
					$res = $this->find($this->_user,array('email'=>$email),true,'id,password,identity,activate');
					if($res['activate'] == '0'){
						$this->json_ret(0,'账号未激活！');
						exit;
					}
				}else{
					$res = $this->find($this->_user,array('tel'=>$tel),true,'id,password,identity');
				}

				if($res && md5($password) == $res['password']){
					$this->session->set_userdata('user_id',$res['id']);
					$this->session->set_userdata('user_identity',$res['identity']);
					if($wherelogin == 'bch'){
						$this->json_ret('bch');
					}elseif($wherelogin == 'lesson'){
						$this->json_ret('lesson',$lessonId);
					}elseif($wherelogin == 'camp'){
						$this->json_ret('camp',$lessonId);
					}else{
						$this->json_ret('ok');
					}

				}else{
					$this->json_ret(0,'密码错误！');
				}
			}




			$mobile = $this->input->post('mobile');//手机号
			$authCode = $this->input->post('authCode');//验证码
			$sessionAuthCode = $this->session->login_auth_code;
			if (!$authCode || $authCode !=$sessionAuthCode) {
				$this->json_ret(0,'验证码不正确');
			}
			if (!$mobile) {
				$this->json_ret(0,'请输入手机号');
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
			if($wherelogin == 'bch'){
				$this->json_ret('bch');
			}elseif($wherelogin == 'lesson'){
				$this->json_ret('lesson',$lessonId);
			}else{
				$this->json_ret('ok');
			}
		}else{
			$bch['wherelogin'] = $this->input->get('type',true);
			$bch['lessonId'] = $this->input->get('lessonId',true);
			$this->load->view('web/login',$bch);
		}
	}

	public function wxLogin(){
		$code = $this->input->get('code',true);
		if ($code) {
			$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx97d537dfa470cd1c&secret=b0af43ba4d107135973fe6ed02086777&code='.$code.'&grant_type=authorization_code';
			$res = $this->_curl($url);
			$ret = json_decode($res,true);
			$access_token = @$ret['access_token'];
			$open_id = @$ret['openid'];
			$url2 = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$open_id;
			$res = $this->_curl($url2);
			$ret = json_decode($res,true);
			
			$where = array('unionid'=>$ret['unionid']);
			$user = $this->find($this->_user, $where);
			if ($user) {
				$this->session->set_userdata('user_id',$user['id']);
			}else{
				$insert = array(
						'name_cn' => @$ret['nickname'],
						'name_en' => @$ret['nickname'],
						'head_image' => @$ret['headimgurl'],
						'gender' => @$ret['sex'],
						'unionid' => @$ret['unionid'],
						'create_time' => date('Y-m-d H:i:s',time()),
				);
				$user_id = $this->insert($this->_user, $insert);
				$this->session->set_userdata('user_id',$user_id);
			}
			$this->load->helper('url');
			if($this->input->get('wherelogin',true) == 'lesson'){
				$lessonId = $this->input->get('lessonId',true);
				redirect("/web/LessonDetail/$lessonId");
			}elseif($this->input->get('wherelogin',true) == 'bch'){
				redirect('/web/becomeHostFamily');
			}else{
				redirect('/home');
			}

		}
	}
	/* 注册页面 */
	public function sign_in(){
		$this->load->view('web/sign_in');
	}
	/* 注册逻辑 */
	public function register(){
		//判断是手机注册还是邮箱注册
		if($this->input->post('tel',true)){

			$authCode = $this->input->post('code');//验证码
			$sessionAuthCode = $this->session->login_auth_code;
			//判断验证码是否正确
			if (!$authCode || $authCode !=$sessionAuthCode) {
				echo '验证码错误！';
				exit;
			}

			$data['tel'] = $this->input->post('tel',true);//手机号
			//判断手机是否已注册
			$res = $this->find($this->_user,array('phone'=>$data['tel']));
			if($res){
				echo '手机已注册！';
				exit;
			}else{
				$data['name_cn'] = $data['tel'];
				$data['name_en'] = $data['tel'];
				$data['phone'] = $data['tel'];
				$data['contact_phone'] = $data['tel'];
				$data['create_time'] = date('Y-m-d h:i:s',time());
				$data['password'] = md5($this->input->post('pwd',true));
				$result = $this->insert($this->_user,$data);
				if($result){
					$check = $this->find($this->_user,array('tel'=>$data['tel']),true,('id'));
					$this->session->set_userdata('user_id',$check['id']);
					$this->session->unset_userdata('login_auth_code');
					$this->load->view('web/checksuccess');
				}
			}

		}else{
			$data['email'] = $this->input->post('email',true);
			$data['password'] = md5($this->input->post('mpwd',true));
			$data['create_time'] = date('Y-m-d h:i:s',time());
			$data['md5mail'] = md5($data['email']);
			//判断邮箱是否已注册
			$res = $this->find($this->_user,array('email'=>$data['email']));
			if($res){
				echo '邮箱已注册！';
				exit;
			}
			//发送邮件的链接地址  将邮箱md5后传输给页面
			$link = 'www.schoolingandhoming.com/web/checkemail?email='.md5($data['email']).'&inp='.md5(time());

			$language = lang('is_en');
			if($language){
				$content='Hi!<br />Welcome to schoolingandhoming.com。<br />Your Email is：'.$data['email'].'。Please click the following link to activate it:<br /><br />
		<a target="_blank" href="https://'.$link.'">'.$link.'</a><br /><br />If the above link cannot be clicked,Please copy the Link of your browser (such as IE) to enter';
				$title = 'S&H Email Checking';
			}else{
				$content='您好！<br />感谢您注册schoolingandhoming.com。<br />您的登录邮箱为：'.$data['email'].'。请点击以下链接激活账号：<br /><br />
		<a target="_blank" href="https://'.$link.'">'.$link.'</a><br /><br />如果以上链接无法点击，请将上面的地址复制到您浏览器（如IE）的地址栏进入';
				$title = 'S&H邮箱激活';
			}

			$this->email163($data['email'],$content,$title);
			$result = $this->insert($this->_user,$data);
			if($result){
				echo lang('is_en')?'SIGN UP SUCCEEDED!Please Checking Email':'注册成功！请激活邮箱后登陆。';
			}
		}



	}

	/*
	 *发送邮件
	 * $mail:收件人邮箱
	 * $content:邮件内容
	 * $title:邮件标题
	 */
	function email163($mail,$content,$title){
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
		$this->email->from('13817632112@163.com', 'SchoolingandHoming');//你的邮箱
		$this->email->to($mail);  //收件人的邮箱
		$this->email->subject("$title");  //发送标题
		$this->email->message("$content");  //发送的内容

		if($this->email->send()){
			return 'yes';
		}else{
			return 'no';
		}
	}

	/* 邮件验证 */
	public function checkemail(){
		$this->load->helper('file_path');
		$mail = $this->input->get('email',true);

		$check = $this->find($this->_user,array('md5mail'=>$mail));
		if($check){
			$data['activate'] = '1';
			$data['name_cn'] = $check['email'];
			$data['name_en'] = $check['email'];
			$data['contact_email'] = $check['email'];
			$res = $this->update($this->_user,$data,array('id'=>$check['id']));
			if($res){
				$this->session->set_userdata('user_id',$check['id']);
				$this->session->unset_userdata('login_auth_code');
				$this->load->view('web/checksuccess');
			}
		}
	}



	//搜索
	public function search(){
		$this->load->model ( 'Common_model', 'mCommon' );
		$res = $this->mCommon->searchSchool();

		$user = array();
		$user_id = $this->session->user_id;
		if ($user_id) {
			$user = $this->find($this->_user,array('id'=>$user_id),true,'head_image,name_cn');
		}
		$stateList = $this->find($this->_state,array(),false,'id,name_cn,name_en');
		$res['user'] = $user;
		$res['stateList'] = $stateList;
		$res['apList'] = $this->find($this->_school_ap_item,array(),false);
		$res['grade'] = $this->find('school_grade',array('is_show'=>1),false,'*',array(),array(),'', '',array(),array(),'type');
		$this->_loadHead();
		$this->load->view('web/school_list',$res);
		$this->_loadFoot(false);
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
	public function searchHome(){
		$this->load->model ( 'Common_model', 'mCommon' );
		$res = $this->mCommon->searchHouse();
		$user = array();
		$user_id = $this->session->user_id;
		if ($user_id) {
			$user = $this->find($this->_user,array('id'=>$user_id),true,'head_image,name_cn');
		}
		$res['user'] = $user;
		$profession = $this->config->item('profession');
		$res['profession'] = $profession;
		$this->_loadHead();
		$this->load->view('web/home_search',$res);
		$this->_loadFoot(false);
		
	}

	/* 获取验证码 */
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

	

	public function suggest() {
		$kw = $this->input->get('kw',true);
		$MAX_RESULT = 10;
		$result = [];
		$like[] = array('field'=>'name_cn','name'=>$kw,'type'=>'after');
		$like[] = array('field'=>'name_en','name'=>$kw,'type'=>'after');
		$data = $this->find($this->_city,array(),false,'id',array(),$like,30);
		if(!empty($data)):
			foreach($data as $item):
				$result[] = array('name'=>$this->_get_location_str($item['id'],3),'id'=>$item['id']);
			endforeach;
		endif;
		if(count($result) >= $MAX_RESULT) goto end_result;
		$data = $this->find($this->_state,array(),false,'id',array(),$like);
		if(!empty($data)):
			foreach($data as $item):
				$result[] = array('name'=>$this->_get_location_str($item['id'],2),'id'=>'');
				$city2 = $this->find($this->_city,array('state_id'=>$item['id']),false,'id',array(),array(),30);
				foreach($city2 as $item2):
					$result[] = array('name'=>$this->_get_location_str($item2['id'],3),'id'=>$item2['id']);
				endforeach;
			endforeach;
		endif;
		if(count($result) >= $MAX_RESULT) goto end_result;
		$data = $this->find($this->_country,array(),false,'id',array(),$like);
		if(!empty($data)):
			foreach($data as $item):
				$result[] = array('name'=>$this->_get_location_str($item['id'],1),'id'=>'');
			endforeach;
		endif;
		end_result:
		echo json_encode(array('data'=>$result));
	}

	private function _get_location_str($id,$id_type) {
		if($id_type == 1):
			$country = $this->find($this->_country,array('id'=>$id),true,"*",array(),array(),1);
			$state = $this->find($this->_state,array('country_id'=>$country['id']),true,"*",array(),array(),1);
			$city = $this->find($this->_city,array('state_id'=>$state['id']),true, "*",array(),array(),1);
		endif;
		if($id_type == 2):
			$state = $this->find($this->_state,array('id'=>$id),true,"*",array(),array(),1);
			$country = $this->find($this->_country,array('id'=>$state['country_id']),true,"*",array(),array(),1);
			$city = $this->find($this->_city,array('id'=>$state['id']),true,"*",array(),array(),1);
		endif;
		if($id_type == 3):
			$city = $this->find($this->_city,array('id'=>$id),true,"*",array(),array(),1);
			$state = $this->find($this->_state,array('id'=>$city['state_id']),true,"*",array(),array(),1);
			$country = $this->find($this->_country,array('id'=>$state['country_id']),true,"*",array(),array(),1);
		endif;
		if(!empty($city)):
			$names[] = $city['name_cn'];
		endif;
		if(!empty($state)):
			$names[] = $state['name_cn'];
		endif;
		if(!empty($country)):
			$names[] = $country['name_cn'];
		endif;
		return implode(',',$names);
	}

	function isMobile(){
		$useragent=isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
		$useragent_commentsblock=preg_match('|\(.*?\)|',$useragent,$matches)>0?$matches[0]:'';
		function CheckSubstrs($substrs,$text){
			foreach($substrs as $substr)
			if(false!==strpos($text,$substr)){
				return true;
			}
			return false;
		}
		$mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ');
		$mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod');
	
		$found_mobile=CheckSubstrs($mobile_os_list,$useragent_commentsblock) ||
		CheckSubstrs($mobile_token_list,$useragent);
	
		if ($found_mobile){
			return true;
		}else{
			return false;
		}
	}


	/* 找服务列表页 */
	public function serviceList(){
		$this->load->helper('file_path');
		$data['list'] = $this->find($this->_service,'',false);
		$data['count'] = count($data['list']);
		if($this->mobile){
			$this->_loadMobileHead('Schooling Homing', true);
			$this->load->view('mobile/Servicelist',$data);
			$this->_loadMobileFoot(true);
		}else{
			$this->_loadHead('找服务');
			$this->load->view('web/service_list',$data);
			$this->_loadFoot();
		}



	}

	/* 找服务详情页 */
	public function serviceDetail($id){
		$data = $this->find($this->_service,array('id'=>$id));
		$this->load->helper('file_path');

		if($this->mobile){
			$data['mobile'] = 1;
			$this->_loadMobileHead('Schooling Homing', true);
			$this->load->view('web/serviceDetail',$data);
			$this->_loadMobileFoot(true);
		}else{
			$data['mobile'] = 0;
			$this->_loadHead('找服务');
			$this->load->view('web/serviceDetail',$data);
			$this->_loadFoot();
		}


	}

	/* 留言信息页面 */
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

		if($type == 4 || $type ==5){
			$data['html_title'] = '我要申请';
			$data['html_text'] = '预约申请留言';
		}else{
			$data['html_title'] = '我要咨询';
			$data['html_text'] = '咨询事项';
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
		$is_weixin = $this->input->post('is_weixin',true);
		if($is_weixin){
			$data['source'] = 3;
		}else{
			$data['source'] = $this->mobile?2:1;
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

	/* 获取留言信息逻辑 */
	public function getMessage(){
		$data['service_id'] = $this->input->post('service_id',true);
		$data['name']	    = $this->input->post('name',true);
		$data['tel']	    = $this->input->post('tel',true);
		$data['info']       = $this->input->post('message',true);
		$data['timeIn']     = date('Y-m-d h:i:s',time());
		$res = $this->insert($this->_message_info,$data);
		if($res){
			echo json_encode('success');
		}else{
			echo json_encode('fail');
		}
	}

	/*住家引导页*/
	public function becomeHostFamily(){
		$this->load->helper('file_path');
		$this->_loadHead('成为住家');
		$this->load->view('web/becomeHostFamily.html');
		$this->_loadFoot();
	}


	/* 成为住家 */
	public function becomeHome(){
		$this->load->helper('file_path');
		$sessionUserID=$this->session->user_id;
		if(!$sessionUserID){
			$this->load->helper('url');
			redirect('/web/login?type=bch');
		}

		if(lang('is_en')){
			$data['Allhobby'] = array(1=>'Exercising','Photographing','Listening Opera','Attending Concert','Cooking','Watching Movie','Computer','Playing TV Games','Reading','Drawing','Dancing','fishing','Camping','Playing Music','Other');
		}else{
			$data['Allhobby'] = array(1=>'健身','摄影','歌剧','演唱会','烹饪','电影','电脑','电视游戏','看书','绘画','跳舞','钓鱼','露营','音乐','其他');
		}

		if(lang('is_en')){
			$data['price_include'] = array(1=>'Breakfast','Lunch','Dinner','Airport transfer to and from your property','School transfer on a daily basis','Other');
		}else{
			$data['price_include'] = array(1=>'早餐','午餐','晚餐','往返机场接送机','每日学校接送','其他');
		}


		$p = $this->input->get('p',true);
		$this->_loadHead('成为住家');

		switch ($p){
			case 2:
				if(!isset($_SESSION['home_one'])){
					$this->load->helper('url');
					redirect('/web/becomeHome');
				}

				$data['info2'] = $this->find($this->_home_family,array('user_id'=>$sessionUserID,'state'=>'0'));
				if($data['info2']['hobby']){
					if(strstr($data['info2']['hobby'],',')){
						$data['info2']['hobby'] = explode(',',$data['info2']['hobby']);
					}
				}

				$this->load->view('web/becomeHome_2',$data);
				break;
			case 3:
				if(!isset($_SESSION['home_one']) || !isset($_SESSION['home_two'])){
					$this->load->helper('url');
					redirect('/web/becomeHome');
				}
				$data['info3'] = $this->find($this->_home_info,array('user_id'=>$sessionUserID,'state'=>'0'));
				$data['state'] = $this->find($this->_state,'',false,'id,name_cn,name_en');
				$data['city'] = $this->find($this->_city,'',false,'id,state_id,name_cn,name_en');
				$this->load->view('web/becomeHome_3',$data);
				break;
			case 4:
				if(!isset($_SESSION['home_one']) || !isset($_SESSION['home_two']) || !isset($_SESSION['home_three'])){
					$this->load->helper('url');
					redirect('/web/becomeHome');
				}
				$data['info4'] = $this->find($this->_home_image,array('user_id'=>$sessionUserID,'state'=>'0'),false,('user_id,pic_name'),array('field' => 'number' , 'type' => 'asc'),array(),4);
				$this->load->view('web/becomeHome_4',$data);
				break;
			case 5:
				if(!isset($_SESSION['home_one']) || !isset($_SESSION['home_two']) || !isset($_SESSION['home_three']) || !isset($_SESSION['home_four'])){
					$this->load->helper('url');
					redirect('/web/becomeHome');
				}
				$data['info5'] = $this->find($this->_home_rule,array('user_id'=>$sessionUserID,'state'=>'0'));

				if($data['info5']['price_include']){
					if(strstr($data['info5']['price_include'],',')){
						$data['info5']['price_include'] = explode(',',$data['info5']['price_include']);
					}
				}

				$this->load->view('web/becomeHome_5',$data);
				break;
			case 6:
				if(!isset($_SESSION['home_one']) || !isset($_SESSION['home_two']) || !isset($_SESSION['home_three']) || !isset($_SESSION['home_four']) || !isset($_SESSION['home_five'])){
					$this->load->helper('url');
					redirect('/web/becomeHome');
				}
				$data['info6'] = $this->db->select('a.firstname,a.secondname,a.gender,a.brith,a.language,a.race,a.education,a.belief,a.job,b.income,b.family_num,b.smoking,b.pet,b.petinfo,b.hobby,c.area,c.bedroom_num,c.zipcode,c.buildtime,c.house_type,c.ownership,c.toilet_num,c.wifi,c.address,c.city_id,c.state_id,d.describe,d.rule,d.month_price,d.payment,d.deposit,d.deposit_info,d.price_include,d.include_other,e.name_cn,e.name_en')
					->from($this->_home_basic.' as a')
					->where(array('a.user_id'=>$sessionUserID,'a.state'=>'0','b.state'=>'0','c.state'=>'0','d.state'=>'0'))
					->join($this->_home_family.' as b','a.user_id = b.user_id')
					->join($this->_home_info.' as c','a.user_id = c.user_id')
					->join($this->_home_rule.' as d','a.user_id = d.user_id')
					->join($this->_state.' as e','c.state_id = e.id')
					->get()
					->row_array();
				if(strstr($data['info6']['hobby'],',')){
					$data['info6']['hobby'] = explode(',',$data['info6']['hobby']);
				}
				if(strstr($data['info6']['price_include'],',')){
					$data['info6']['price_include'] = explode(',',$data['info6']['price_include']);
				}
				if($data['info6']['brith']){
					$brith = explode('-',$data['info6']['brith']);
					$data['info6']['year'] = $brith[0];
					$data['info6']['month'] = intval($brith[1]);
					$data['info6']['day'] = intval($brith[2]);
				}
				$data['state'] = $this->find($this->_state,'',false,'id,name_cn,name_en');
				$data['city'] = $this->find($this->_city,'',false,'id,state_id,name_cn,name_en');
				$data['image'] = $this->find($this->_home_image,array('user_id'=>$sessionUserID,'state'=>'0'),false,'id,user_id,pic_name',array('field' => 'number' , 'type' => 'asc'),array(),4);
				$data['language'] = lang('is_en') ? $this->config->item('lang_en') : $this->config->item('lang');
				$this->load->view('web/becomeHome_6',$data);
				break;
			default:
				$data['info'] = $this->find($this->_home_basic,array('user_id'=>$sessionUserID,'state'=>'0'));
				if($data['info']['brith']){
					$brith = explode('-',$data['info']['brith']);
					$data['info']['year'] = $brith[0];
					$data['info']['month'] = intval($brith[1]);
					$data['info']['day'] = intval($brith[2]);
				}
				$this->load->view('web/becomeHome_1',$data);
		}


		$this->_loadFoot();
	}


	/* 成为住家保存 */
	public function becomeHome_save(){
		$data['user_id']    = $this->session->user_id;
		//第1步保存
		if($this->input->post('part1',true)){
			$data['firstname']  = $this->input->post('firstName',true);
			$data['secondname'] = $this->input->post('secondName',true);
			$data['gender']     = $this->input->post('gender',true);
			$day = $this->input->post('day',true);
			$month = $this->input->post('month',true);
			$year = $this->input->post('year',true);
			if($day && $month && $year){
				$data['brith']  = $year.'-'.$month.'-'.$day;
			}
			$data['language']   = $this->input->post('language',true);
			$data['race']       = $this->input->post('race',true);
			$data['education']  = $this->input->post('education',true);
			$data['belief']     = $this->input->post('belief',true);
			$data['job']        = $this->input->post('job',true);
			$finish = $this->input->post('one',true);
			if($finish){
				$this->session->set_userdata('home_one',true);
			}else{
				$this->session->unset_userdata('home_one');
			}
			$res = $this->find($this->_home_basic,array('user_id'=>$data['user_id'],'state'=>'0'),true,'id');
			if(!$res){
				$result = $this->insert($this->_home_basic,$data);
			}else{
				$result = $this->update($this->_home_basic,$data,array('id'=>$res['id']));
			}
		}
		//第2步保存
		if($this->input->post('part2',true)){
			$data['income'] = $this->input->post('income',true);
			$data['family_num'] = $this->input->post('family_num',true);
			$data['smoking'] = $this->input->post('smoking',true);
			$data['pet'] = $this->input->post('pet',true);
			$data['petinfo'] = $this->input->post('petinfo',true);
			$data['hobby'] = $this->input->post('hobby',true);
			$finish = $this->input->post('two',true);
			if($finish){
				$this->session->set_userdata('home_two',true);
			}else{
				$this->session->unset_userdata('home_two');
			}
			$res = $this->find($this->_home_family,array('user_id'=>$data['user_id'],'state'=>'0'),true,'id');
			if(!$res){
				$result = $this->insert($this->_home_family,$data);
			}else{
				$result = $this->update($this->_home_family,$data,array('id'=>$res['id']));
			}
		}
		//第3步保存
		if($this->input->post('part3',true)){
			$data['area'] = $this->input->post('area',true);
			$data['bedroom_num'] = $this->input->post('bedroom_num',true);
			$data['zipcode'] = $this->input->post('zipcode',true);
			$data['buildtime'] = $this->input->post('buildtime',true);
			$data['house_type'] = $this->input->post('house_type',true);
			$data['ownership'] = $this->input->post('ownership',true);
			$data['toilet_num'] = $this->input->post('toilet_num',true);
			$data['wifi'] = $this->input->post('wifi',true);
			$data['address'] = $this->input->post('address',true);
			$data['city_id'] = $this->input->post('city_id',true);
			$data['state_id'] = $this->input->post('state_id',true);

			$finish = $this->input->post('three',true);
			if($finish){
				$this->session->set_userdata('home_three',true);
			}else{
				$this->session->unset_userdata('home_three');
			}
			$res = $this->find($this->_home_info,array('user_id'=>$data['user_id'],'state'=>'0'),true,'id');
			if(!$res){
				$result = $this->insert($this->_home_info,$data);
			}else{
				$result = $this->update($this->_home_info,$data,array('id'=>$res['id']));
			}
		}
		//第4步
		if($this->input->post('part4',true)){
			$finish = $this->input->post('four',true);
			if($finish){
				$this->session->set_userdata('home_four',true);
			}
			$result = true;
		}
		//第5步保存
		if($this->input->post('part5',true)){
			$data['month_price'] = $this->input->post('month_price',true);
			$data['payment'] = $this->input->post('payment',true);
			$data['deposit'] = $this->input->post('deposit',true);
			$data['deposit_info'] = $this->input->post('deposit_info',true);
			$data['price_include'] = $this->input->post('price_include',true);
			$data['include_other'] = $this->input->post('include_other',true);
			$data['describe'] = $this->input->post('describe',true);
			$data['rule'] =$this->input->post('rule',true);
			$finish = $this->input->post('five',true);
			if($finish){
				$this->session->set_userdata('home_five',true);
			}else{
				$this->session->unset_userdata('home_five');
			}
			$res = $this->find($this->_home_rule,array('user_id'=>$data['user_id'],'state'=>'0'),true,'id');
			if(!$res){
				$result = $this->insert($this->_home_rule,$data);
			}else{
				$result = $this->update($this->_home_rule,$data,array('id'=>$res['id'],'state'=>'0'));
			}
		}
		if($result){
			$this->json_ret(1);
		}else{
			$this->json_ret(0,'保存失败，请重试！');
		}
 	}


	public function changeAddress(){
		$city_id = $this->input->post('city_id',true);
		$id = $this->input->post('id',true);
		if($city_id){
			$res = $this->find($this->_city,array('id'=>$city_id),true,'id,state_id');

			$data = $this->find($this->_state,array('id'=>$res['state_id']),true,'name_cn,name_en');
			$data['id'] = $res['id'];
			$data['state_id']=$res['state_id'];
		}
		if($id){
			$data = $this->find($this->_city,array('state_id'=>$id),false,'id,state_id,name_cn,name_en');
		}
		$this->json_ret(1,$data);
	}



	public function homeFileUpload(){

		$data['user_id'] = $this->session->user_id;//获取用户ID:session_id

		$this->load->helper('file_path');
		$path = ROOTPATH.'upload/userhome/'.$data['user_id'].'/'; //图片保存路径
		$this->load->model ( 'Common_model', 'mCommon' );

		//获取host_id
		$pic_id = $_POST['edit'];
		if($pic_id){
			$picInfo = $this->find($this->_home_image,array('id'=>$pic_id));
			$name = $picInfo['user_id'].'-'.$picInfo['number'];
			$res = $this->mCommon->uploadPic ($path,$name,'cover');
			if ($res ['status']) {
				$this->json_ret(888);
			}
		}else{
			//查找状态是2,3,4 number最大的一个图片(新发布的图片number肯定在已发布之后)
			$imgNum = $this->find($this->_home_image,array('user_id'=>$data['user_id']),true,'number',array('field' => 'number' , 'type' => 'desc'),array(),'','',array(),array('field' => 'state','value' => array('2','3','4')));

			$data['number'] = $_POST['name'];
			//文件命名
			$name = $data['user_id'].'-'.date('YmdHis').rand(100000,999999);
			//上传图片
			$res = $this->mCommon->uploadPic ($path,$name,'file');
			$data['pic_name'] = $res['msg'];
			$data['state'] = 1;
			$data['display'] = 1;
			if ($res ['status']) {
				$rs = $this->insert($this->_home_image, $data);
//				$check = $this->find($this->_home_image,array('user_id'=>$data['user_id'],'number'=>$data['number']),true,('id'));
//				if($check){
//					$rs = $this->update($this->_home_image,$data,array('id'=>$check['id']));
//				}else{
//					$rs = $this->insert($this->_home_image, $data);
//				}
				if($rs){
					$this->json_ret(888,$data['pic_name']);
				}
			}
		}
	}

	public function BC_img_delete(){
		$pic_name = $this->input->post('pic_name',true);
		$arr = explode('-',$pic_name);
		$user_id = $arr[0];
		unlink('upload/userhome/'.$user_id.'/'.$pic_name);
		$rs = $this->delete($this->_home_image,array('pic_name'=>$pic_name));
		if($rs){
			echo json_encode(888);
		}
	}

	public function AjaxFileUpload(){
		$data['user_id'] = $this->session->user_id;//获取用户ID:session_id
		$num2 = $this->input->get('num',true);
		if($this->input->get('order_id',true)){
			$order_id = $this->input->get('order_id',true);
			$res = $this->find($this->_home_image,array('order_id'=>$order_id),true,'number',array('field' => 'id' , 'type' => 'desc'));
			$num1 = $res['number']-3;
		}else{
			$res = $this->find($this->_home_image,array('user_id'=>$data['user_id']),true,'number',array('field' => 'id' , 'type' => 'desc'),array(),'','',array(),array('field' => 'state','value' => array('1','2','3')));
			$num1 = $res['number'] +1;
		}
		$num = $num1 + $num2;
		$this->load->helper('file_path');
		$path = ROOTPATH.'upload/userhome/'.$data['user_id'].'/'; //图片保存路径
		$this->load->model ( 'Common_model', 'mCommon' );
		$name = $data['user_id'].'-'.$num;
		$res = $this->mCommon->uploadPic ($path,$name,'cover');
		if ($res ['status']) {
			$this->json_ret(1);
		}
	}

	/* 用户发布住家 */
	public function IssueHome(){
		$title = $this->input->post('title',true);
		$sessionUserID=$this->session->user_id;
		$data['state'] = '1';
		$data['issue_time'] = time();
		$rand4 = rand(1000,9999);
		$data['order_id'] = date('ymdhis',time()).$rand4;

		$data3['state'] = $data['state'];
		$data3['issue_time'] = $data['issue_time'];
		$data3['order_id'] = $data['order_id'];
		$data3['title'] = $title;
		$res1 = $this->update($this->_home_basic,$data3,array('user_id'=>$sessionUserID,'state'=>'0'));
		$res2 = $this->update($this->_home_family,$data,array('user_id'=>$sessionUserID,'state'=>'0'));
		$res3 = $this->update($this->_home_info,$data3,array('user_id'=>$sessionUserID,'state'=>'0'));
		$res4 = $this->update($this->_home_image,$data,array('user_id'=>$sessionUserID,'state'=>'0'));
		$res5 = $this->update($this->_home_rule,$data,array('user_id'=>$sessionUserID,'state'=>'0'));
		if($res1 && $res2 && $res3 && $res4 && $res5){
			$user['identity'] = 2;
			if($this->session->user_identity == 1){
				$this->session->set_userdata('user_identity',2);
			}
			$this->update($this->_user,$user,array('id'=>$sessionUserID));
			$this->session->unset_userdata('home_one');
			$this->session->unset_userdata('home_two');
			$this->session->unset_userdata('home_three');
			$this->session->unset_userdata('home_four');
			$this->session->unset_userdata('home_five');
			$this->json_ret(1);
		}else{
			$this->json_ret(0,'发布失败，请重试！');
		}


	}

	/* 专题 */
	public function ShowSpecial(){
		$this->load->helper('file_path');
		$data['school'] = $this->find($this->_school,array(),false,'id,name_cn,name_en,index_hot_cover',array(),array(),'','',array(),array('field' => 'id','value' => array('7859','8411','9043','9268','944','8180','21307','20969','7881','21303','21459','21306')));
		if($this->mobile){
			$this->_loadMobileHead('schoolingandhoming',true);
			$this->load->view('web/ShowSpecial',$data);
			$this->_loadMobileFoot(true,1,$this->_userData);
		}else{
			$this->_loadHead('专题页',true);
			$this->load->view('web/ShowSpecial',$data);
			$this->_loadFoot();
		}
		
	}


	/* 暑期项目列表页 -z */
	public function SummerList(){
		$this->load->helper('file_path');
		$data['school'] = $this->find($this->_summer,array(),false,'id,name_cn,name_en,img',array(),array(),6);
		if($this->mobile){
			$this->_loadMobileHead('暑期项目',true);
			$this->load->view('mobile/SummerList',$data);
			$this->_loadMobileFoot(true,1,$this->_userData);
		}else{
			$this->_loadHead('暑期项目',true);
			$this->load->view('web/SummerList',$data);
			$this->_loadFoot();
		}
	}

	/* 暑期项目评估页面*/
	public function Summer_Assess(){
		$this->load->helper('file_path');
		if($this->mobile){
			$this->_loadMobileHead('暑期项目',true);
			$this->load->view('mobile/Summer_Assess');
			$this->_loadMobileFoot(true,1,$this->_userData);
		}else{
			$this->_loadHead('暑期项目',true);
			$this->load->view('web/Summer_Assess');
			$this->_loadFoot();
		}

	}
	/* 暑期评估页面提交 */
	public function summer_assess_submit(){
		$data['grade'] = $this->input->post('grade',true)=='请选择'?0:$this->input->post('grade',true);
		$data['age'] = $this->input->post('age',true)=='请选择'?0:$this->input->post('age',true);
		$data['hobby'] = rtrim($this->input->post('hobby',true),',');
		$data['english'] = rtrim($this->input->post('english',true),',');
		$data['english_score'] = trim($this->input->post('english_score',true));
		$data['name'] = trim($this->input->post('name',true));
		$data['phone'] = trim($this->input->post('phone',true));
		$code = trim($this->input->post('code',true));
		$data['time'] = time();
		$sessionAuthCode = $this->session->login_auth_code;
		if($code != $sessionAuthCode){
			$this->json_ret(444);
		}else{
			$res = $this->insert($this->_summer_assess,$data);
			$this->session->unset_userdata('login_auth_code');
			if($res){
				$this->json_ret(888);
			}
		}

	}

	/* 暑期项目详情页 -z */
	public function SummerDetail($id){
		$this->load->helper('file_path');
		$data = $this->find($this->_summer,array('id'=>$id));
		$school= $this->find($this->_summer,array(),false,'id');
		$school_id = Array();
		for($i=0;$i<3;$i++){
			$a = rand(0,6);
			if(in_array($a,$school_id) || $school[$a]['id'] == $id){
				$i--;
			}else{
				array_push($school_id,$a);
			}
		}
		$data['school']= $this->find($this->_summer,array(),false,'id,img,name_cn',array(),array(),'','',array(),array('field'=>'id','value'=>array($school_id[0]+1,$school_id[1]+1,$school_id[2]+1)));
		if($this->mobile){
			$data['mobile'] = 1;
			$this->_loadMobileHead('暑期项目',true);
			$this->load->view('web/SummerDetail',$data);
//			$this->load->view('mobile/SummerDetail',$data);
			$this->_loadMobileFoot(true,1,$this->_userData);
		}else{
			$data['mobile'] = 2;
			$this->_loadHead('暑期项目',true);
			$this->load->view('web/SummerDetail',$data);
			$this->_loadFoot();
		}
	}
	/* 暑期项目更多页 */
	public function SummerMore(){
		$this->load->helper('file_path');

		if($this->mobile){
			$where =array();
			//所属类别
			$data['search_type_id']=$type_id = $this->input->get('type',true);
			if($type_id){
				$where['type_id'] = $type_id;
			}
			//当前所在年级
			$data['search_object_id'] = $object_id = $this->input->get('object',true);
			if($object_id){
				$where['object_min<='] =$object_id;
				$where['object_max>='] =$object_id;
			}
			//住宿类型
			$data['search_isstay_id'] = $isstay_id = $this->input->get('isstay',true);
			if($isstay_id){
				$where['is_stay'] = $isstay_id;
			}

			//预算
			$data['search_money_id'] = $money_id = $this->input->get('prices',true);
			//时间
			$data['search_time_start'] = $time_start_id = $this->input->get('start',true);
			$data['search_time_end'] = $time_end_id = $this->input->get('end',true);

			$index = $this->input->get('per_page',true);
			$url = 'Common/mobile/SummerMore';
			$where_in = array();

			if($money_id || $time_start_id){
				$res1 = $this->findPageData($this->_summer,$url,$where,100,$index,array(),$where_in,'desc');
				$list1 = array();
				$list2 = array();
				foreach($res1 as $k => $v){
					if($time_start_id){
						if(strstr($v['search_time_start'],';')){
							$arr = explode(';',$v['search_time_start']);
							$arr2 = explode(';',$v['search_time_end']);
							foreach($arr as $k2=>$v2){
								if($time_start_id <= $v2 && $time_end_id >= $arr2[$k2]){
									array_push($list1,$res1[$k]['id']);
									break;
								}
							}
						}else{
							if($time_start_id <= $v['search_time_start'] && $time_end_id >= $v['search_time_end']){
								array_push($list1,$res1[$k]['id']);
							}
						}
					}

					if($money_id){
						switch($money_id){
							case 1:
								$min = 0;
								$max = 5000;
								break;
							case 2:
								$min = 5001;
								$max = 10000;
								break;
							case 3:
								$min = 10001;
								$max = 20000;
								break;
							case 4:
								$min = 20001;
								$max = 9999999;
								break;
							default:
								$min = '';
								$max = '';
						}
						if(strstr($v['search_price'],';')){
							$p_arr = explode(';',$v['search_price']);
							foreach($p_arr as $v3){
								if($min <= $v3 && $max >= $v3){
									array_push($list2,$res1[$k]['id']);
									break;
								}
							}
						}else{
							if($min <= $v['search_price'] && $max >= $v['search_price']){
								array_push($list2,$res1[$k]['id']);
							}
						}
					}

				}

				if(!empty($time_start_id) && empty($money_id)){
					$where_in = array(
						'field'=>'id',
						'value'=> $list1
					);
				}
				if(!empty($money_id) && empty($time_start_id)){
					$where_in = array(
						'field'=>'id',
						'value'=> $list2
					);
				}
				if(!empty($time_start_id) && !empty($money_id)){
					$list = array();
					foreach($list1 as $v){
						foreach($list2 as $v2){
							if($v == $v2){
								array_push($list,$v);
							}
						}
					}
					if(empty($list)){
						$where_in = array(
							'field'=>'id',
							'value'=> 'NULL'
						);
					}else{
						$where_in = array(
							'field'=>'id',
							'value'=> $list
						);
					}

				}

			}



			$res = $this->findPageData($this->_summer,$url,$where,6,$index,array(),$where_in,'desc');
			$data['list'] = $res;
			$data['count'] = count($res);
			$data['state'] = $this->find($this->_state,array(),false);
			$this->_loadMobileHead('暑期项目',true);
			$this->load->view('mobile/SummerMore',$data);
			$this->_loadMobileFoot();
		}else{
			$like = $where = $where_in = array();
			$ret['type_id'] = $type_id = $this->input->get('type_id',true);
			if ($type_id) {
				$arr = explode(',', trim($type_id,','));
				$where_in[] = array(
					'field'=>'type_id',
					'value'=> $arr
				);
			}

			$ret['grade'] = $grade = $this->input->get('grade',true);
			if($grade){
				$where['object_min <='] =$grade;
				$where['object_max >='] =$grade;
			}

			$ret['time_start'] = $time_start = $this->input->get('time_start',true);
			$ret['time_end'] = $time_end = $this->input->get('time_end',true);

			$ret['min'] = $min = $this->input->get('min',true);
			$ret['max'] = $max = $this->input->get('max',true);

			$ret['is_stay'] = $is_stay = $this->input->get('is_stay',true);
			if ($is_stay) {
				$arr = explode(',', trim($is_stay,','));
				$where_in[] = array(
					'field'=>'is_stay',
					'value'=> $arr
				);
			}

			//获取当前页数
			$index = $this->input->get('per_page',true);
			if($index){
				$a = strpos($_SERVER['QUERY_STRING'],'&per_page');
				$_SERVER['QUERY_STRING'] = substr($_SERVER['QUERY_STRING'],0,$a);
			}
			$url = '/web/SummerMore?'.$_SERVER['QUERY_STRING'];
			if($time_start || $time_end || $min || $max){
				$res1 = $this->findWebPageData($this->_summer, $url, $where, 100,'',array(),$where_in,array());
				$list1 = array();
				$list2 = array();
				foreach($res1['data'] as $k => $v){
					if($time_start){
						if(strstr($v['search_time_start'],';')){
							$arr = explode(';',$v['search_time_start']);
							$arr2 = explode(';',$v['search_time_end']);
							foreach($arr as $k2=>$v2){
								if($time_start <= $v2 && $time_end >= $arr2[$k2]){
									array_push($list1,$res1['data'][$k]['id']);
									break;
								}
							}
						}else{
							if($time_start <= $v['search_time_start'] && $time_end >= $v['search_time_end']){
								array_push($list1,$res1['data'][$k]['id']);
							}
						}
					}

					if($max){
						if(strstr($v['search_price'],';')){
							$p_arr = explode(';',$v['search_price']);
							foreach($p_arr as $v3){
								if($min <= $v3 && $max >= $v3){
									array_push($list2,$res1['data'][$k]['id']);
									break;
								}
							}
						}else{
							if($min <= $v['search_price'] && $max >= $v['search_price']){
								array_push($list2,$res1['data'][$k]['id']);
							}
						}
					}

				}

				if(!empty($list1) && empty($list2)){
					$where_in[] = array(
						'field'=>'id',
						'value'=> $list1
					);
				}
				if(!empty($list2) && empty($list1)){
					$where_in[] = array(
						'field'=>'id',
						'value'=> $list2
					);
				}
				if(!empty($list1) && !empty($list2)){
					$list = array();
					foreach($list1 as $v){
						foreach($list2 as $v2){
							if($v == $v2){
								array_push($list,$v);
							}
						}
					}
					$where_in[] = array(
						'field'=>'id',
						'value'=> $list
					);
				}
			}

			$res = $this->findWebPageData($this->_summer, $url, $where, 6,$index,array(),$where_in,array());
			$data['count'] = $res['count'];
			$data['list'] = $res['data'];
			$data['ret']  = $ret;
			$data['state'] = $this->find($this->_state,array(),false);
			$this->_loadHead('暑期项目',true);
			$this->load->view('/web/SummerMore',$data);
			$this->_loadFoot();
		}
	}

	public function ajaxSearchSummer(){
		$where = array();
		$where_in = array();
		$type_id = $this->input->get('type',true);
		if($type_id){
			$where['type_id'] = $type_id;
		}
		$object_id = $this->input->get('object',true);
		if($object_id){
			$where['object_min<='] =$object_id;
			$where['object_max>='] =$object_id;
		}
		$isstay_id = $this->input->get('isstay',true);
		if($isstay_id){
			$where['is_stay'] = $isstay_id;
		}
		//预算
		$money_id = $this->input->get('prices',true);
		//时间
		$time_start_id = $this->input->get('start',true);
		$time_end_id = $this->input->get('end',true);

		$index = $this->input->get('index',true);
		$index = $index * 6;
		$url = 'Common/mobile/SummerMore';
		if($money_id || $time_start_id){
			$res1 = $this->findPageData($this->_summer,$url,$where,100,$index,array(),$where_in,'desc');
			$list1 = array();
			$list2 = array();
			foreach($res1 as $k => $v){
				if($time_start_id){
					if(strstr($v['search_time_start'],';')){
						$arr = explode(';',$v['search_time_start']);
						$arr2 = explode(';',$v['search_time_end']);
						foreach($arr as $k2=>$v2){
							if($time_start_id <= $v2 && $time_end_id >= $arr2[$k2]){
								array_push($list1,$res1[$k]['id']);
								break;
							}
						}
					}else{
						if($time_start_id <= $v['search_time_start'] && $time_end_id >= $v['search_time_end']){
							array_push($list1,$res1[$k]['id']);
						}
					}
				}

				if($money_id){
					switch($money_id){
						case 1:
							$min = 0;
							$max = 5000;
							break;
						case 2:
							$min = 5001;
							$max = 10000;
							break;
						case 3:
							$min = 10001;
							$max = 20000;
							break;
						case 4:
							$min = 20001;
							$max = 9999999;
							break;
						default:
							$min = '';
							$max = '';
					}
					if(strstr($v['search_price'],';')){
						$p_arr = explode(';',$v['search_price']);
						foreach($p_arr as $v3){
							if($min <= $v3 && $max >= $v3){
								array_push($list2,$res1[$k]['id']);
								break;
							}
						}
					}else{
						if($min <= $v['search_price'] && $max >= $v['search_price']){
							array_push($list2,$res1[$k]['id']);
						}
					}
				}

			}

			if(!empty($time_start_id) && empty($money_id)){
				$where_in = array(
					'field'=>'id',
					'value'=> $list1
				);
			}
			if(!empty($money_id) && empty($time_start_id)){
				$where_in = array(
					'field'=>'id',
					'value'=> $list2
				);
			}
			if(!empty($time_start_id) && !empty($money_id)){
				$list = array();
				foreach($list1 as $v){
					foreach($list2 as $v2){
						if($v == $v2){
							array_push($list,$v);
						}
					}
				}
				$where_in = array(
					'field'=>'id',
					'value'=> $list
				);
			}

		}



		$res = $this->findPageData($this->_summer,$url,$where,6,$index,array(),$where_in,'desc');
		echo json_encode($res);
	}

	/* 衔接课程 - z */
	public function LessonList(){
		$this->load->helper('file_path');
		$index = $this->input->get('per_page',true);
		if($this->mobile){
			$url = 'Common/moblie/LessonList';
		}else{
			$url = '/web/LessonList';
		}
		$res = $this->findPageData($this->_lesson,$url,array(),10,$index,array(),array(),'desc');
		$data['list'] = $res;
		$data['count'] = count($res);
		if($this->mobile){
			$this->_loadMobileHead('衔接课程',true);
			$this->load->view('mobile/LessonList',$data);
			$this->_loadMobileFoot(true,1,$this->_userData);
		}else{
			$this->_loadHead('衔接课程',true);
			$this->load->view('web/LessonList',$data);
			$this->_loadFoot();
		}
	}

	/* 衔接课程详情页 -z */
	public function LessonDetail($id){
		$this->load->helper('file_path');
		$data = $this->find($this->_lesson,array('id'=>$id));
		if(!empty($data['lesson_book'])){
			$arr = explode(',',$data['lesson_book']);
			$data['book'] = $this->find($this->_lesson_book,array(),false,'*',array(),array(),'','',array(),array('field' => 'id','value' => $arr));
		}


		if($this->mobile){
			$this->_loadMobileHead('Schooling Homing', true);
			$this->load->view('mobile/LessonDetail',$data);
			$this->_loadMobileFoot(true,1,$this->_userData);
		}else{
			$this->_loadHead('衔接课程',true);
			$this->load->view('web/LessonDetail',$data);
			$this->_loadFoot();
		}
	}

	public function classPeopleNum(){
		$classtime = $this->input->post('data',true);
		$id = $this->input->post('id',true);
		$num = $this->count($this->_order,array('subject_id'=>$id,'is_pay'=>8,'classtime'=>$classtime));
		$this->json_ret($num);
	}



	public function checkorder(){
		$this->load->helper('file_path');
		$lessonId = $this->input->get('lessonId',true);
		$sessionUserID=$this->session->user_id;
		if(!$sessionUserID){
			$this->load->helper('url');
			redirect('/web/login?type=lesson&lessonId='.$lessonId);
		}

		$userinfo = $this->find($this->_user,array('id'=>$sessionUserID),true,'phone');
		$data['phone'] = $userinfo['phone'];

		$res = $this->find($this->_lesson,array('id'=>$lessonId),true,'id,name,price,once_price');
		ini_set('date.timezone','Asia/Shanghai');
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
		$data['is_mobile'] = $this->mobile?1:2;
		$this->_loadHead('衔接课程',true);
		$this->load->view('web/checkorder',$data);
		$this->_loadFoot();
	}

	public function check_pay_order(){
		$this->load->helper('file_path');
		$project_id = $this->input->get('project_id',true);
		$project_name = $this->input->get('project_name',true);
		$price = $this->input->get('price',true);

		$res = $this->find($project_name,array('id'=>$project_id),true,'id,name_cn');
		ini_set('date.timezone','Asia/Shanghai');
		//订单编号
		$data['orderID'] = 'SH_'.$project_name.'_'.date('YmdHis',time()).rand(1000,9999);
		//课程名称
		$data['lessonName'] = $res['name_cn'];
		//课程价格
		$data['price'] = $price;
		//授课时间
		$data['classtime'] = $this->input->get('classtime',true);
		if($project_name == 'summer'){
			$data['type'] = $price==5000?'单一夏校申请5000元':'任意三个夏校项目申请8000元';
		}
		//课程id
		$data['lessonId'] = $res['id'];
		$data['is_mobile'] = $this->mobile?1:2;
		$data['is_wx'] = $this->_is_weixin()?1:2;
		if($this->mobile){
			$this->_loadMobileHead('冬夏令营',true);
			$this->load->view('web/checkorder',$data);
			$this->_loadMobileFoot(true,1,$this->_userData);
		}else{
			$this->_loadHead('冬夏令营',true);
			$this->load->view('web/checkorder',$data);
			$this->_loadFoot();
		}

	}

	public function finishOrder(){
		$this->load->helper('file_path');
		$this->_loadHead('schoolingandhoming',true);
		$this->load->view('/web/finishOrder');
		$this->_loadFoot();
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


	/* 成为住家-update*/
	public function BCHome(){
		$this->load->helper('file_path');
		$sessionUserID=$this->session->user_id;
		if(!$sessionUserID){
			$this->load->helper('url');
			redirect('/web/login?type=bch');
		}

		$data['user_id'] = $sessionUserID;
		$data['hobbies'] = $this->find($this->_hobby,array(),false);
		$data['HostInfo'] = $this->find($this->_HostInfo,array('user_id'=>$sessionUserID,'status'=>1));
		$data['FamilyInfo'] = $this->find($this->_FamilyInfo,array('user_id'=>$sessionUserID,'status'=>1));
		$data['HomeInfo'] = $this->find($this->_home_info,array('user_id'=>$sessionUserID,'status'=>1));
		$data['MisInfo'] = $this->find($this->_MisInfo,array('user_id'=>$sessionUserID,'status'=>1));
		$data['HomeRule'] = $this->find($this->_home_rule,array('user_id'=>$sessionUserID,'status'=>1));
		$data['HomeImage'] = $this->find($this->_home_image,array('user_id'=>$sessionUserID,'state'=>1,'display'=>1),false);
		$data['child'] = json_encode($data['FamilyInfo']['childinfo']);
		$data['rooms'] = json_encode($data['MisInfo']['bedroomInfo']);

		$data['state'] = $this->find($this->_state,'',false,'id,name_en');
		$data['city'] = $this->find($this->_city,'',false,'id,state_id,name_en');
		if(strstr($data['MisInfo']['hobby'],',')){
			$data['MisInfo']['hobby'] = explode(',',$data['MisInfo']['hobby']);
		}else{
			$data['MisInfo']['hobby'] = [$data['MisInfo']['hobby']];
		}


		$this->_loadHead('成为住家');
		$this->load->view('/web/BCHome',$data);
		$this->_loadFoot();
	}



	/*新版成为住家保存*/
	public function HostSave(){
		$sessionUserID=$this->session->user_id;
		if(!$sessionUserID){
			$this->load->helper('url');
			redirect('/web/login');
		}
		$data['user_id'] = $sessionUserID;

		if($_POST['part1']){
			$data['hostname'] = $house['hostname'] = trim($this->input->post('host_name',true));
			$data['birthY'] = $this->input->post('brithY',true);
			$data['birthM'] = $this->input->post('brithM',true);
			$data['birthD'] = $this->input->post('brithD',true);
			$data['sex'] = $this->input->post('host_sex',true);
			$data['primary_language'] = $house['language'] = $this->input->post('language',true);
			$data['other_language'] = $this->input->post('language2',true);
			$data['religion'] = $house['religion'] = $this->input->post('Religion',true);
			$data['ethnicity'] = $house['race'] = $this->input->post('Ethnicity',true);
			$data['profession'] = $house['profession'] = $this->input->post('profession',true);
			$data['Current_Employer'] = $this->input->post('Current_Employer',true);
			$data['work_hours'] = $this->input->post('Work_Hours',true);
			$data['education'] = $this->input->post('Education',true);
			$data['driver_license'] = $this->input->post('License',true);
			$data['marital'] = $this->input->post('Marital',true);
			$data['child_num'] = $this->input->post('child_num',true);

			if($_POST['edit']){
				$host_id = $this->input->post('edit',true);
				$this->update($this->_house,$house,array('order_id'=>$host_id));
				$res = $this->update($this->_HostInfo,$data,array('host_id'=>$host_id));

			}else{
				if($_POST['issue']){
					$data['status'] = 2;
					$data['time'] = date('Y-m-d H:i:s',time());
					$data['host_id'] = $_POST['issue'];
				}else{
					$data['status'] = 1;
				}
				$finddata = $this->find($this->_HostInfo,array('user_id'=>$sessionUserID,'status'=>1));
				if($finddata){
					$res = $this->update($this->_HostInfo,$data,array('id'=>$finddata['id']));
				}else{
					$res = $this->insert($this->_HostInfo,$data);
				}
			}
			if($res){
				$this->json_ret(888,'Save Success');
			}
		}
		if($_POST['part2']){
			$data['spouse_name'] = trim($this->input->post('Spouse_name',true));
			$data['S_birthY'] = $this->input->post('S_brithY',true);
			$data['S_birthM'] = $this->input->post('S_brithM',true);
			$data['S_birthD'] = $this->input->post('S_brithD',true);
			$data['S_gender'] = $this->input->post('S_gender',true);
			$data['S_language'] = $this->input->post('S_language',true);
			$data['S_language2'] = $this->input->post('S_language2',true);
			$data['S_religion'] = $this->input->post('S_Religion',true);
			$data['S_ethnicity'] = $this->input->post('S_Ethnicity',true);
			$data['S_education'] = $this->input->post('S_Educaiton',true);
			$data['S_license'] = $this->input->post('S_License',true);
			$data['S_profession'] = $this->input->post('S_profession',true);
			$data['income'] = $this->input->post('Income',true);
			$data['smoke'] = $this->input->post('smoke',true);
			if($_POST['edit']){
				$host_id = $this->input->post('edit',true);
				$res =$this->update($this->_FamilyInfo,$data,array('host_id'=>$host_id));
			}else{
				if($_POST['issue']){
					$data['status'] = 2;
					$data['host_id'] = $_POST['issue'];
				}else{
					$data['status'] = 1;
				}
				$c_num = $this->input->post('c_num',true);
				if($c_num>0){
					for($i=1;$i<=$c_num;$i++){
						$child[$i-1]['name'] = $this->input->post('C1_name'.$i,true);
						$child[$i-1]['birthY'] = $this->input->post('C1_brithY'.$i,true);
						$child[$i-1]['birthM'] = $this->input->post('C1_brithM'.$i,true);
						$child[$i-1]['birthD'] = $this->input->post('C1_brithD'.$i,true);
						$child[$i-1]['gender'] = $this->input->post('C1_gender'.$i,true);
					}
				}
				$data['childinfo'] = json_encode($child);
				$finddata = $this->find($this->_FamilyInfo,array('user_id'=>$sessionUserID,'status'=>1));
				if($finddata){
					$res = $this->update($this->_FamilyInfo,$data,array('id'=>$finddata['id']));
				}else{
					$res = $this->insert($this->_FamilyInfo,$data);
				}
			}

			if($res){
				$this->json_ret(888,'Save Success');
			}
		}
		if($_POST['part3']){
			$data['area'] = $house['area'] = trim($this->input->post('Living_Area',true));
			$data['house_type'] = $house['house_type'] = $this->input->post('House_Type',true);
			$data['ownership'] = $this->input->post('Ownership',true);
			$data['buildY'] = $house['buildY'] = $this->input->post('BuildY',true);
			$data['buildM'] = $house['buildM'] = $this->input->post('BuildM',true);
			$data['bedroom_num'] = $this->input->post('Bedrooms',true);
			$data['toilet_num'] = $this->input->post('Bathrooms',true);
			$data['wifi'] = $this->input->post('wifi',true);
			$data['address'] = $house['address'] = $this->input->post('Street',true);
			$data['zipcode'] = $this->input->post('Post_code',true);
			$data['city_id'] = $house['city_id'] = $this->input->post('city',true);
			$data['state_id'] = $this->input->post('state',true);
			if($_POST['edit']){
				$host_id = $this->input->post('edit',true);
				$this->update($this->_house,$house,array('order_id'=>$host_id));
				$res =$this->update($this->_home_info,$data,array('host_id'=>$host_id));
			}else{
				if($_POST['issue']){
					$data['status'] = 2;
					$data['host_id'] = $_POST['issue'];
				}else{
					$data['status'] = 1;
				}
				$finddata = $this->find($this->_home_info,array('user_id'=>$sessionUserID,'status'=>1));

				if($finddata){
					$res = $this->update($this->_home_info,$data,array('id'=>$finddata['id']));
				}else{
					$res = $this->insert($this->_home_info,$data);
				}
			}


			if($res){
				$this->json_ret(888,'Save Success');
			}
		}
		if($_POST['part4']){
			$data['pet'] = $this->input->post('pet',true);
			$data['pet_kind'] = $this->input->post('pet_kind',true);
			$data['transportation'] = $this->input->post('transportation',true);
			$data['prefer'] = $this->input->post('prefer',true);
			$data['minage'] = $this->input->post('minage',true);
			$data['hobby'] = $this->input->post('hobby',true);
			$data['alcohol'] = $this->input->post('alcohol',true);
			$data['drinks'] = $this->input->post('drinks',true);
			$data['smoking'] = $this->input->post('smoking',true);
			$data['outsmoking'] = $this->input->post('outsmoking',true);
			$data['bathroom'] = $this->input->post('bathroom',true);
			$data['sharebathroom'] = $this->input->post('sharebathroom',true);
			$data['laundry'] = $this->input->post('laundry',true);
			$data['student_use'] = $this->input->post('student_use',true);
			$data['student_room'] = $this->input->post('student_room',true);
			$data['bedrooms'] = $this->input->post('bedrooms',true);
			if($_POST['edit']){
				$host_id = $this->input->post('edit',true);
				$res =$this->update($this->_MisInfo,$data,array('host_id'=>$host_id));
			}else{
				if($_POST['issue']){
					$data['status'] = 2;
					$data['host_id'] = $_POST['issue'];
				}else{
					$data['status'] = 1;
				}
				if($data['bedrooms']>0){
					for($i=1;$i<=$data['bedrooms'];$i++){
						$room[$i-1]['Location'] = $this->input->post('Location'.$i,true);
						$room[$i-1]['Size'] = $this->input->post('Size'.$i,true);
						$room[$i-1]['intro'] = $this->input->post('intro'.$i,true);
					}
				}
				$data['bedroomInfo'] = json_encode($room);
				$finddata = $this->find($this->_MisInfo,array('user_id'=>$sessionUserID,'status'=>1));
				if($finddata){
					$res = $this->update($this->_MisInfo,$data,array('id'=>$finddata['id']));
				}else{
					$res = $this->insert($this->_MisInfo,$data);
				}
			}

			if($res){
				$this->json_ret(888,'Save Success');
			}
		}
		if($_POST['part5']){
			$data['describe'] = $this->input->post('describe',true);
			$data['rule'] = $this->input->post('rule',true);
			$data['month_price'] = $house['price'] = $this->input->post('month_price',true);
			$data['payment'] = $this->input->post('payment',true);
			$data['deposit'] = $this->input->post('deposit',true);
			if($_POST['edit']){
				$host_id = $this->input->post('edit',true);
				$this->update($this->_house,$house,array('order_id'=>$host_id));
				$res =$this->update($this->_home_rule,$data,array('host_id'=>$host_id));
			}else{
				if($_POST['issue']){
					$data['status'] = 2;
					$data['host_id'] = $_POST['issue'];
				}else{
					$data['status'] = 1;
				}
				$finddata = $this->find($this->_home_rule,array('user_id'=>$sessionUserID,'status'=>1));

				if($finddata){
					$res = $this->update($this->_home_rule,$data,array('id'=>$finddata['id']));
				}else{
					$res = $this->insert($this->_home_rule,$data);
				}
			}

			if($res){
				$this->json_ret(888,'Save Success');
			}
		}
		if($_POST['part6']){
			$data['state'] = 2;
			$data['host_id'] = $_POST['issue'];
			$res = $this->update($this->_home_image,$data,array('user_id'=>$sessionUserID,'state'=>1));
			if($res){
				$this->json_ret(888,'Save Success');
			}
		}
	}


	public function USLesson(){
		$this->load->helper('file_path');
		if($this->mobile){
			$this->_loadMobileHead('Schooling and Homing',true);
			$this->load->view('/web/USLesson');
			$this->_loadMobileFoot(true,1,$this->_userData);
		}else{
			$this->_loadHead('Schooling and Homing');
			$this->load->view('/web/USLesson');
			$this->_loadFoot();
		}

	}

	/* 夏令营列表页 */
	public function CampList()
	{
		$this->load->helper('file_path');
		$data['list'] = $this->find($this->_camp,array(),false,'*',array('field'=>'desc','type'=>'desc'));
		if($this->mobile){
			$this->_loadMobileHead('Schooling and Homing',true);
			$this->load->view('/mobile/CampList',$data);
			$this->_loadMobileFoot(true,1,$this->_userData);
		}else{
			$this->_loadHead('Schooling and Homing');
			$this->load->view('/web/CampList',$data);
			$this->_loadFoot();
		}
	}
	/* 夏令营详情页 */
	public function CampDetail($id){
		$this->load->helper('file_path');
		$data = $this->find($this->_camp,array('id'=>$id));
		if(strpos($data['img'],'|')){
			$data['pictures'] = explode('|',$data['img']);
		}else{
			$data['pictures'] = array($data['img']);
		}
		if($this->mobile){
			$data['timetable'] = $data['timetable-m'];
			$data['mobile'] = 1;
			$this->_loadMobileHead('Schooling and Homing',true);
			$this->load->view('/web/CampDetail',$data);
			$this->_loadMobileFoot(true,1,$this->_userData);
		}else{
			$data['mobile'] = 0;
			$this->_loadHead('Schooling and Homing');
			$this->load->view('/web/CampDetail',$data);
			$this->_loadFoot();
		}
	}

	public function test(){
		echo phpinfo();
	}




	public function top20(){
		$data = $this->find($this->_school,array(),false,'id,name_en,financial_contribute',array('field'=>'financial_contribute','type'=>'desc'),array(),20);
		$data6 = $this->find($this->_school,array(),false,'id,name_en,teach_edu_scale',array('field'=>'teach_edu_scale','type'=>'desc'),array(),20);
		$data2 = $this->find($this->_school,array(),false,'id,name_en,avg_sat',array('field'=>'avg_sat','type'=>'desc'),array(),100);
		$data5 = $this->find($this->_school,array(),false,'id,name_en,teach_pupil_ratio',array('field'=>'teach_pupil_ratio','type'=>'ASC'),array(),20,'',array(),array('field'=>'teach_pupil_ratio','value'=>array(1,2)));

		$arr = array();
		

		$sort = array('direction'=>'SORT_DESC','field'=>0);
		$arrSort = array();
		foreach($data2 AS $uniqid => $row){
			 foreach($row AS $key=>$value){
				 $arrSort[$key][$uniqid] = $value;
     		}
 		}
		if($sort['direction']){
			array_multisort($arrSort[$sort['field']], constant($sort['direction']), $data2);
		}

		$data3 = $this->find($this->_school,array('score6'=>10),false,'id,name_en');
		foreach($data3 as $k => $v){
			$ap_num = $this->count($this->_school_ap,array('school_id'=>$v['id']));
			array_push($data3[$k],$ap_num);
		}
		$sort3 = array('direction'=>'SORT_DESC','field'=>0);
		$arrSort3 = array();
		foreach($data3 AS $uniqid => $row){
			foreach($row AS $key=>$value){
				$arrSort3[$key][$uniqid] = $value;
			}
		}
		if($sort3['direction']){
			array_multisort($arrSort3[$sort3['field']], constant($sort3['direction']), $data3);
		}


		$data4 = $this->find($this->_school,array('score7'=>10),false,'id,name_en');
		foreach($data4 as $k => $v){
			$sport_num = $this->count($this->_school_sport_item,array('school_id'=>$v['id']));
			array_push($data4[$k],$sport_num);
		}
		$sort4 = array('direction'=>'SORT_DESC','field'=>0);
		$arrSort4 = array();
		foreach($data4 AS $uniqid => $row){
			foreach($row AS $key=>$value){
				$arrSort4[$key][$uniqid] = $value;
			}
		}
		if($sort4['direction']){
			array_multisort($arrSort4[$sort4['field']], constant($sort4['direction']), $data4);
		}



		$this->load->view('web/test',array('data'=>$data,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4,'data5'=>$data5,'data6'=>$data6));
	}




	function xmlToArray($xml)
	{
		libxml_disable_entity_loader(true);
		$values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
		return $values;
	}


	public function top(){
		ini_set("max_execution_time", "500");
		$data = $this->find($this->_school,array(),false,'id,sat_read,sat_math,sat_write,financial_contribute,teach_class_avg,teach_pupil_ratio,teach_edu_scale,intro,basic_grade_start,basic_grade_end,basic_school_enrollments,basic_school_area,basic_proportion_of_individuals,basic_religious_tendency,apply_deadline,apply_link_email,financial_tuition,suggest_house,apply_cost');
		foreach($data as $v){
			if(strstr($v['sat_read'],'total')){
				$count=strpos($v['sat_read'],"total");
				$str=trim(substr_replace($v['sat_read'],"",$count,5));
				if(strstr($str,'(1600 Scale)')){
					$count=strpos($str,"(1600 Scale)");
					$str=trim(substr_replace($str,"",$count,12));
				}
				if(strstr($str,'-')){
					$arr = explode('-',$str);
					$str = ($arr[0] + $arr[1])/2;
				}
				$avg = $str;
			}elseif(strstr($v['sat_read'],'-')){
				$arr1 = explode('-',$v['sat_read']);
				$read = ($arr1[0] + $arr1[1])/2;
				if(strstr($v['sat_math'],'-')){
					$arr2 = explode('-',$v['sat_math']);
					$math = ($arr2[0] + $arr2[1])/2;
				}else{
					$math = $v['sat_math'];
				}
				if(strstr($v['sat_write'],'-')){
					$arr3 = explode('-',$v['sat_write']);
					$write = ($arr3[0] + $arr3[1])/2;
				}else{
					$write = $v['sat_write'];
				}
				$avg = $math + $write + $read;

			}else{
				$avg = $v['sat_read']+$v['sat_math']+$v['sat_write'];
			}

			if($avg >= 2100){
				$score1 = 15;
			}
			if($avg >= 1950 && $avg < 2100){
				$score1 = 12;
			}
			if($avg >= 1800 && $avg < 1950){
				$score1 = 10;
			}
			if($avg >= 1600 && $avg < 1800){
				$score1 = 8;
			}
			if($avg <1600){
				$score1 = 0;
			}



			if($v['financial_contribute'] >= 100000000 ){
				$score2 = 15;
			}
			if($v['financial_contribute'] >= 50000000 && $v['financial_contribute'] < 100000000 ){
				$score2 = 12;
			}
			if($v['financial_contribute'] >= 30000000 && $v['financial_contribute'] < 50000000 ){
				$score2 = 10;
			}
			if($v['financial_contribute'] >= 20000000 && $v['financial_contribute'] < 30000000){
				$score2 = 6;
			}
			if($v['financial_contribute'] >= 10000000 && $v['financial_contribute'] < 20000000){
				$score2 = 4;
			}
			if($v['financial_contribute'] > 0 && $v['financial_contribute'] < 10000000){
				$score2 = 2;
			}
			if(!$v['financial_contribute']){
				$score2 = 0;
			}

			if($v['teach_class_avg'] > 0 && $v['teach_class_avg'] <= 10){
				$score3 = 10;
			}
			if($v['teach_class_avg'] > 10 && $v['teach_class_avg'] <= 15){
				$score3 = 8;
			}
			if($v['teach_class_avg'] > 15 && $v['teach_class_avg'] <= 20){
				$score3 = 7;
			}
			if($v['teach_class_avg'] > 20){
				$score3 = 6;
			}
			if(!$v['teach_class_avg']){
				$score3 = 0;
			}

			if($v['teach_pupil_ratio'] <= 6){
				$score4 = 10;
			}
			if($v['teach_pupil_ratio'] >6 && $v['teach_pupil_ratio'] <= 10){
				$score4 = 8;
			}
			if($v['teach_pupil_ratio'] > 10 && $v['teach_pupil_ratio'] <= 20){
				$score4 = 6;
			}
			if($v['teach_pupil_ratio'] > 20){
				$score4 = 4;
			}
			if(!$v['teach_pupil_ratio']){
				$score4 = 0;
			}

			if($v['teach_edu_scale'] >= 80){
				$score5 = 10;
			}
			if($v['teach_edu_scale'] >= 65 && $v['teach_edu_scale'] < 80){
				$score5 = 8;
			}
			if($v['teach_edu_scale'] >= 50 && $v['teach_edu_scale'] < 65){
				$score5 = 6;
			}
			if($v['teach_edu_scale'] > 0 && $v['teach_edu_scale'] < 50){
				$score5 = 4;
			}
			if(!['teach_edu_scale']){
				$score5 = 0;
			}

			$ap_num = $this->count($this->_school_ap,array('school_id'=>$v['id']));
			if($ap_num >= 20){
				$score6 = 10;
			}
			if($ap_num >= 15 && $ap_num < 20){
				$score6 = 8;
			}
			if($ap_num >= 10 && $ap_num < 15){
				$score6 = 6;
			}
			if($ap_num > 0 && $ap_num < 10){
				$score6 = 5;
			}
			if(!$ap_num){
				$score6 = 0;
			}

			$sport_num = $this->count($this->_school_sport_item,array('school_id'=>$v['id']));
			if($sport_num >= 12){
				$score7 = 10;
			}
			if($sport_num >= 8 && $sport_num < 12){
				$score7 = 8;
			}
			if($sport_num >= 6 && $sport_num < 8){
				$score7 = 6;
			}
			if($sport_num > 0 && $sport_num < 6){
				$score7 = 4;
			}
			if(!$sport_num){
				$score7 = 0;
			}

			$club_num = $this->count($this->_school_club,array('school_id'=>$v['id']));
			if($club_num >= 50){
				$score8 = 10;
			}
			if($club_num >= 30 && $club_num < 50){
				$score8 = 8;
			}
			if($club_num >= 15 && $club_num < 30){
				$score8 = 6;
			}
			if($club_num > 0 &&$club_num < 15){
				$score8 = 4;
			}
			if(!$club_num){
				$score8 = 0;
			}

			$data_num = 0;
			if(!empty($v['intro'])){
				$data_num++;
			}
			if(!empty($v['basic_grade_start']) || !empty($v['basic_grade_end'])){
				$data_num++;
			}
			if(!empty($v['basic_school_enrollments'])){
				$data_num++;
			}
			if(!empty($v['basic_school_area'])){
				$data_num++;
			}
			if(!empty($v['basic_proportion_of_individuals'])){
				$data_num++;
			}
			if(!empty($v['basic_religious_tendency'])){
				$data_num++;
			}
			if(!empty($v['apply_deadline'])){
				$data_num++;
			}
			if(!empty($v['apply_link_email'])){
				$data_num++;
			}
			if(!empty($v['teach_pupil_ratio'])){
				$data_num++;
			}
			if(!empty($v['teach_class_avg'])){
				$data_num++;
			}
			if(!empty($v['teach_edu_scale'])){
				$data_num++;
			}
			if(!empty($v['financial_contribute'])){
				$data_num++;
			}
			if(!empty($v['financial_tuition'])){
				$data_num++;
			}
			if(!empty($v['suggest_house'])){
				$data_num++;
			}
			if(!empty($v['apply_cost'])){
				$data_num++;
			}
			if(!empty($v['sat_math'])){
				$data_num++;
			}
			if(!empty($v['sat_read'])){
				$data_num++;
			}
			if(!empty($v['sat_write'])){
				$data_num++;
			}
			if($club_num != 0){
				$data_num++;
			}
			if($sport_num != 0){
				$data_num++;
			}
			if($ap_num != 0){
				$data_num++;
			}

			if($data_num >= 15){
				$score9 = 10;
			}
			if($data_num >= 12 && $data_num < 15){
				$score9 = 8;
			}
			if($data_num >= 10 && $data_num < 12){
				$score9 = 6;
			}
			if($data_num >= 8 && $data_num < 10){
				$score9 = 4;
			}
			if($data_num >= 6 && $data_num < 8){
				$score9 = 2;
			}
			if($data_num < 6){
				$score9 = 0;
			}
			$score = $score1 + $score2 + $score3 + $score4 + $score5 + $score6 + $score7 + $score8 + $score9;
			$this->update($this->_school,array('score1'=>$score1,'score2'=>$score2,'score3'=>$score3,'score4'=>$score4,'score5'=>$score5,'score6'=>$score6,'score7'=>$score7,'score8'=>$score8,'top'=>$score,'score9'=>$score9),array('id'=>$v['id']));

		}
	}

	public function ranking_list(){
		$where = array();
		$state = $this->input->get('state',true);
		$top = $this->input->get('top',true);
		$school_type = $this->input->get('school_type',true);
		if($state){
			$where = array('state_id'=>$state);
		}
		if($school_type){
			$where['basic_school_type'] = $school_type;
		}
		if($top){
			$limit = $top;
		}else{
			$limit = '';
		}

		$res['list'] = $this->find($this->_school,$where,false,'id,name_en,top,score1,score2,score3,score4,score5,score6,score7,score8,score9',array('field' => 'top' , 'type' => 'desc'),array(),$limit);
		$res['state'] = $this->find($this->_state,array(),false,'id,name_cn,name_en');
		$this->_loadHead('schooling and homing',true);
		$this->load->view('web/school_top',$res);
		$this->_loadFoot();
	}


	/* 专题页 学校3大州 top10 */
	public function school3_top10(){
		$this->load->helper('file_path');
		$data['school'] = $this->find($this->_school,array(),false,'id,name_cn,name_en,index_hot_cover',array(),array(),'','',array(),array('field' => 'id','value' => array('24602','25688','7881','21002','1307','20982','20969','24609','2110','24605','25201','23491','21307','8411','23084','23295','944','25228','26170','7859','7983','22544','7495','25685','189','3296','784','2887','6313','7512')));
		$data['ca'] = array('24602','25688','7881','21002','1307','20982','20969','24609','2110','24605');
		$data['ny'] = array('25201','23491','21307','8411','23084','23295','944','25228','26170','7859');
		$data['tx'] = array('7983','22544','7495','25685','189','3296','784','2887','6313','7512');

		if($this->mobile){
			$this->_loadMobileHead('S&H',false);
			$this->load->view('web/school3_top10',$data);
			$this->_loadMobileFoot(false,'',$this->_userData);
		}else{
			$this->_loadHead('S&H',true);
			$this->load->view('web/school3_top10',$data);
			$this->_loadFoot();
		}
	}

	/* 专题页 学校top20 */
	public function school_top20(){
		$this->load->helper('file_path');
		$data['school'] = $this->find($this->_school,array(),false,'id,name_en,financial_contribute',array(),array(),'','',array(),array('field' => 'id','value' => array(20095,25679,20512,22863,25096,22688,22402,26057,20934,25500,22317,25693,26065,7983,9268,24602,944,22318,21759,22544,23426,21573,26065,24609,20485,2006,3758,8203,20008,20011,20012,20014,20015,20016,20017,20025,20026,20030,20036,20039)));
		//校友捐赠
		$data['xyjz'] = array(20095,25679,20512,22863,25096,22688,22402,26057,20934,25500,22317,25693,26065,7983,9268,24602,944,22318,21759,22544);
		//AP课程
		$data['apkc'] = array(23426,21573,26065,24609,20485,2006,3758,8203,20008,20011,20012,20014,20015,20016,20017,20025,20026,20030,20036,20039);
		//体育项目数量
		$data['tyxm'] = array(
							array(25690,'The University of Chicago Laboratory Schools',48),
							array(25689,'Detroit Country Day School',41),
							array(23620,'Maclay School',36),
							array(25691,'Menlo School',35),
							array(22339,'Bishop Machebeuf High School',31),
							array(25096,'Culver Academies',29),
							array(25693,'The Taft School',29),
							array(25515,'Maryknoll School',25),
							array(25007,'Edgewood High School of the Scared Heart',24),
							array(25509,'Hawaii Baptist Academy',24),
							array(25679,'Phillips Academy Andover',24),
							array(21755,'St Johns Preparatory School',23),
							array(25524,'Kamehameha Schools Kapalama Campus',23),
							array(22255,'St Augustine Preparatory School',22),
							array(24615,'Windward School',22),
							array(25500,'Punahou School',22),
							array(25502,'Honolulu Waldorf School',22),
							array(25630,'Divine Child High School',22),
							array(25692,'Lick-wilmerding High School',22),
							array(22324,'The Williston Northampton School',21)
						);
		//平均sat成绩
		$data['satcj'] = array(
							array(2110,'Crystal Springs Uplands School',2285),
							array(8411,'Trinity School',2280),
							array(7881,'The College Preparatory School',2232),
							array(26446,'St.John\'s  School',2230),
							array(22375,'Pulaski Academy',2212.5),
							array(20903,'Commonwealth School',2206),
							array(9268,'Roxbury Latin School',2190),
							array(21460,'Regis High School',2180),
							array(22544,'St. Mark\'s School Texas',2170),
							array(20082,'East Catholic High School',2161),
							array(23423,'The Quarry Lane School',2156),
							array(1307,'Castilleja School',2146),
							array(23491,'Horace Mann School',2144),
							array(25682,'Stanford Online High School',2144),
							array(20972,'San Francisco University High School',2140),
							array(21307,'Dalton School',2138),
							array(25385,'Montessori High School of Kentucky',2130),
							array(21905,'Groton School',2123),
							array(21877,'Phillips Exeter Academy',2118),
							array(25679,'Phillips Academy Andover',2118)
						);
		//师生比
		$data['ssb'] = array(
							array(22207,'Delphian School','1:1'),
							array(24005,'School for Young Performers','1:1'),
							array(22176,'Allegro School','1:1'),
							array(22046,'Somerset Hills Learning Institute','1:1'),
							array(24868,'Scholar Skills Christian Academy','1:1'),
							array(25585,'Halstrom Academy','1:1'),
							array(25858,'Darrow School','1:1'),
							array(25900,'River Valley School','1:1'),
							array(20484,'Pathways Day School','1:1'),
							array(8183 ,'The Steward School','1:1'),
							array(26312,'Edna Christian Academy','1:1'),
							array(26290,'Bridge Builder Academy','1:1'),
							array(20026,'Eagle Hill School','1:1'),
							array(20037,'Cccd - Connecticut Center for Child Development','1:1'),
							array(23646,'Fusion Academy - Huntington Beach','1:1'),
							array(24782,'The Deck House School','2:1'),
							array(24492,'Ben Franklin Academy','2:1'),
							array(24024,'Imagine Academy','2:1'),
							array(26236,'The Selwyn School','2:1'),
							array(23773,'Brandon Hall School','2:1'),
						);
		//高学位师资比
		$data['gxwszb'] = array(
							array(20028,'Heritage Christian Academy','100'),
							array(20057,'Intensive Education Academy','100'),
							array(21253,'Havern School','100'),
							array(21780,'Seattle Waldorf School','100'),
							array(21799,'St Paul\'S Academy','100'),
							array(21800,'Holy Names Academy','100'),
							array(21801,'O\'Dea High School','100'),
							array(21817,'Tri-Cities Prep','100'),
							array(22162,'Salem Baptist Christian School','100'),
							array(22611,'Hickory Christian Academy','100'),
							array(23072,'Saratoga Central Catholic High School','100'),
							array(23757,'Providence Classical Christian Academy','100'),
							array(23763,'Union Christian Academy','100'),
							array(24777,'Greater Portland Christian School','100'),
							array(25828,'John a Coleman Catholic High School','100'),
							array(25865,'Cascadilla School','100'),
							array(25893,'Holy Cross Academy','100'),
							array(26335,'Burke Mountain Academy','100'),
							array(23304,'Loudonville Christian School','98'),
							array(21760,'St John\'s High School','96'),
						);
		if($this->mobile){
			$this->_loadMobileHead('S&H',true);
			$this->load->view('web/school_top20',$data);
			$this->_loadMobileFoot(true,1,$this->_userData);
		}else{
			$this->_loadHead('S&H',true);
			$this->load->view('web/school_top20',$data);
			$this->_loadFoot();
		}
	}

	/*首页获取校友捐赠top20方法*/
	protected function get_index_school_financial_contribute_top20(){
		//校友捐赠
		$res = $this->find($this->_school,array(),false,'id,name_cn,name_en,financial_contribute,basic_createtime,basic_school_type,state_id,basic_school_enrollments,financial_tuition,financial_tuition_remark,suggest_house',array('field'=>'financial_contribute','type'=>'desc'),array(),20);
		foreach($res as $k => $v){
			$state = $this->find($this->_state,array('id'=>$v['state_id']),true,'name_cn,name_en');
			$res[$k]['state_name'] = $state['name_cn'];
			$res[$k]['state_name_en'] = $state['name_en'];
		}
		return $res;
	}
	/*首页获取sat成绩top20方法*/
	protected function get_index_school_sat_top20(){
		$res = $this->find($this->_school,array(),false,'id,name_cn,name_en,basic_createtime,basic_school_type,state_id,basic_school_enrollments,financial_tuition,financial_tuition_remark,suggest_house,avg_sat',array('field'=>'avg_sat','type'=>'desc'),array(),20);
		foreach($res as $k => $v){
			$state = $this->find($this->_state,array('id'=>$v['state_id']),true,'name_cn,name_en');
			$res[$k]['state_name'] = $state['name_cn'];
			$res[$k]['state_name_en'] = $state['name_en'];
			$res[$k]['sat']=$v['avg_sat'];
		}
		return $res;
	}
	/*首页获取ap数量top20方法*/
	protected function get_index_school_ap_top20(){
		$res = $this->find($this->_school,array(),false,'id,name_cn,name_en,basic_createtime,basic_school_type,state_id,basic_school_enrollments,financial_tuition,financial_tuition_remark,suggest_house,ap_num',array('field'=>'ap_num','type'=>'desc'),array(),20);
		foreach($res as $k => $v){
			$state = $this->find($this->_state,array('id'=>$v['state_id']),true,'name_cn,name_en');
			$res[$k]['state_name'] = $state['name_cn'];
			$res[$k]['state_name_en'] = $state['name_en'];
			$res[$k]['ap']=$v['ap_num'];
		}
		return $res;
	}
	/*首页获取sport数量top20方法*/
	protected function get_index_school_sport_top20(){
		$res = $this->find($this->_school,array(),false,'id,name_cn,name_en,basic_createtime,basic_school_type,state_id,basic_school_enrollments,financial_tuition,financial_tuition_remark,suggest_house,sport_num',array('field'=>'sport_num','type'=>'desc'),array(),20);
		foreach($res as $k => $v){
			$state = $this->find($this->_state,array('id'=>$v['state_id']),true,'name_cn,name_en');
			$res[$k]['state_name'] = $state['name_cn'];
			$res[$k]['state_name_en'] = $state['name_en'];
			$res[$k]['sport']=$v['sport_num'];
		}
		return $res;
	}
	/*首页获取师生比top20方法*/
	protected function get_index_school_teacher_and_student_top20(){
		$res = $this->find($this->_school,array(),false,'id,name_cn,name_en,basic_createtime,basic_school_type,state_id,basic_school_enrollments,financial_tuition,financial_tuition_remark,suggest_house,teach_pupil_ratio',array('field'=>'teach_pupil_ratio','type'=>'asc'),array(),20,'',array(),array('field'=>'teach_pupil_ratio','value'=>array(1,2)));
		foreach($res as $k => $v){
			$state = $this->find($this->_state,array('id'=>$v['state_id']),true,'name_cn,name_en');
			$res[$k]['state_name'] = $state['name_cn'];
			$res[$k]['state_name_en'] = $state['name_en'];
			$res[$k]['ssb']=$v['teach_pupil_ratio'];
		}
		return $res;
	}
	/*首页获取高学位师资比top20方法*/
	protected function get_index_school_high_degree_top20(){
		$res = $this->find($this->_school,array(),false,'id,name_cn,name_en,basic_createtime,basic_school_type,state_id,basic_school_enrollments,financial_tuition,financial_tuition_remark,suggest_house,teach_edu_scale',array('field'=>'teach_edu_scale','type'=>'desc'),array(),20);
		foreach($res as $k => $v){
			$state = $this->find($this->_state,array('id'=>$v['state_id']),true,'name_cn,name_en');
			$res[$k]['state_name'] = $state['name_cn'];
			$res[$k]['state_name_en'] = $state['name_en'];
			$res[$k]['gxwszb']=$v['teach_edu_scale'];
		}
		return $res;
	}


	/*文章列表*/
	public function article_list(){
		$this->load->helper('file_path');
		$index = $this->input->get('per_page',true);
		$url = '/web/article_list';
		$res = $this->findWebPageData($this->_article, $url, array(), 7,$index);
		$data['count'] = $res['count'];
		$data['article'] = $res['data'];
		$data['hot_article'] = $this->find($this->_article,array('is_hot'=>1),false,'title,id',array(),array(),9);
		$data['hot_up'] = $this->find($this->_index_config,array('type' => 'up'),false,'*',array('field' => 'id' , 'type' => 'asc'));
		$this->_loadHead('Schooling and Homing');
		$this->load->view('web/article_list',$data);
		$this->_loadFoot();
	}
	/*文章详情*/
	public function article_Detail($id){
		$this->load->helper('file_path');
		$data = $this->find($this->_article,array('id'=>$id));
		$data['hot_article'] = $this->find($this->_article,array('is_hot'=>1),false,'title,id',array(),array(),9);
		$data['hot_up'] = $this->find($this->_index_config,array('type' => 'up'),false,'*',array('field' => 'id' , 'type' => 'asc'));
		$this->_loadHead('Schooling and Homing');
		$this->load->view('web/article_Detail',$data);
		$this->_loadFoot();
	}

	public function bbs(){
		$content = $this->input->post('content',true);
		$arr = $this->net_word();
		foreach($arr as $v){
			if(strstr($content,$v)){
				$this->json_ret(555,'评论含有非法字段');
			}
		}

		$data['content'] = $content;
		$data['time'] = date('Y-m-d H:i:s',time());
		$res = $this->insert($this->_bbs,$data);
		if($res){
			$this->json_ret(888);
		}

	}

	/*学校ap_num字段更新*/
	public function school_ap_num_update()
	{
		ini_set("max_execution_time", "500");
		$school = $this->find($this->_school, array(), false, 'id');
		foreach ($school as $v) {
			$rs = $this->find($this->_school_ap, array('school_id' => $v['id']), false, 'id');
			$num = count($rs);
			$this->update($this->_school, array('ap_num' => $num), array('id' => $v['id']));
		}
	}


	/*更多专题页*/
	public function special_list(){
		$this->load->helper('file_path');
		$index = $this->input->get('per_page',true);
		$url = '/web/special_list';
		$res = $this->findWebPageData($this->_special, $url, array(), 7,$index,array(),array(),array('field'=>'desc','type'=>'desc'));
		$data['count'] = $res['count'];
		$data['article'] = $res['data'];
		if($this->mobile){
			$this->_loadMobileHead('暑期项目',true);
			$this->load->view('web/special_list',$data);
			$this->_loadMobileFoot(true,1,$this->_userData);
		}else{
			$this->_loadHead('暑期项目',true);
			$this->load->view('web/special_list',$data);
			$this->_loadFoot();
		}
	}

	/*google maps test*/
	public function school_data($id){
		if($id){
			$result = $this->find($this->_school,array('suggest_house'=>'','state_id'=>$id),false,'id');
			foreach ($result as $v) {
				echo $v['id'].'<br>';
			}
		}else{
			$st = $this->find($this->_state,array(),false,'id,name_cn');
			

			foreach ($st as $v) {
				$rs = $this->find($this->_school,array('suggest_house'=>'','state_id'=>$v['id']),false,'id');
		
				if(count($rs)){
					
					echo '<a href="/web/school_data/'.$v['id'].'">'.$v['name_cn'].'</a>:'.count($rs).'<br>';
				}
			}

			$data['tot'] = count($this->find($this->_school,array('suggest_house'=>''),false,'id'));

			echo "<hr>剩余：".$data['tot'];	
			}
		
		
		
	
	}

	public function google_maps_test(){
		$data = $this->find($this->_school,array(),false,'name_en,id,lat,lng',array(),array(),'','',array(),array('field'=>'id','value'=>array(20930,20915,20912,20058,20030,20041,20914,23290)));
//		var_dump($data);
		$this->load->view('web/maps_test',$data);
	}

	
		 
		
		
		



}





