<?php
class Common_model extends CI_Model{
	protected $_country;
	protected $_state;
	protected $_city;
	protected $_school;
	protected $_school_ap;
	protected $_school_image;
	protected $_school_club;
	protected $_school_sport_item;
	protected $_school_graduate_direction;
	protected $_house;
	protected $_house_family;
	protected $_house_rule;
	protected $_house_image;
	protected $_house_comment;
	protected $_user;
	protected $_user_sms_code;
	protected $_personal_tailor;
	public function __construct(){
		parent::__construct();
		$this->_country = 'country';
		$this->_state = 'state';
		$this->_city = 'city';
		$this->_school = 'school';
		$this->_school_ap = 'school_ap';
		$this->_school_image = 'school_image';
		$this->_school_club = 'school_club';
		$this->_school_sport_item = 'school_sport_item';
		$this->_school_graduate_direction = 'school_graduate_direction';
		$this->_house = 'house';
		$this->_house_family = 'house_family';
		$this->_house_rule = 'house_rule';
		$this->_house_image = 'house_image';
		$this->_house_comment = 'house_comment';
		$this->_user = 'user';
		$this->_user_sms_code = 'user_sms_code';
		$this->_personal_tailor = 'personal_tailor';
	}
	
	function searchSchool($num=20){
		$lng = '';
		$lat = '';
		$zoom = 8;
		$this->load->helper('file_path');
		$ret = $whereCity =  $where_in = array();
		$ret['type'] = $type = $this->input->get('type',true); // 暂时没有
		$ret['name'] = $name = trim($this->input->get('name',true));
		$ret['basic_school_type'] = $basic_school_type = $this->input->get('basic_school_type',true); //学校类型
		$ret['basic_grade'] = $basic_grade = $this->input->get('basic_grade',true); //学校年纪
		$ret['financial_tuition_min'] = $financial_tuition_min = $this->input->get('financial_tuition_min',true); //学费
		$ret['financial_tuition_max'] = $financial_tuition_max = $this->input->get('financial_tuition_max',true); //学费
		$ret['basic_proportion_of_individuals'] = $basic_proportion_of_individuals = $this->input->get('basic_proportion_of_individuals',true);//国际生比例
		$ret['basic_school_enrollments_min'] = $basic_school_enrollments_min = $this->input->get('basic_school_enrollments_min',true);//学校人数
		$ret['basic_school_enrollments_max'] = $basic_school_enrollments_max = $this->input->get('basic_school_enrollments_max',true);//学校人数
		$ret['st_min'] = $st_min = $this->input->get('st_min',true); //SAT
		$ret['st_max'] = $st_max = $this->input->get('st_max',true); //SAT
		$ret['state'] = $state_id = $this->input->get('state',true); //州
		$ret['ap'] = $ap = $this->input->get('ap',true);
		$ret['city_name'] = $this->input->get('city',true);

		if (strstr($name, ',')) {
			$arr = explode(',', $name);
			$name = $arr[0];
		}
		if (strstr($name, '，')) {
			$arr = explode('，', $name);
			$name = $arr[0];
		}

		$index = $this->input->get('index',true);
		$data = $where = $like = $where_in_arr = array();
		if ($basic_school_type) {
			$arr = explode(',', trim($basic_school_type,','));
			$where_in_arr[] = array(
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
				$where_in_arr[] = array(
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
		if($basic_school_enrollments_min){
			$where['basic_school_enrollments >='] = $basic_school_enrollments_min;
		}
		if($basic_school_enrollments_max){
			$where['basic_school_enrollments <='] = $basic_school_enrollments_max;
		}
		if($state_id){
			$where['state_id'] = $state_id;
		}

		if($st_min){
			$where['apply_sat_avg <='] = $st_min;
		}
		if($st_max){
			$where['apply_sat_avg >='] = $st_max;
		}
		if($ap){
			switch($ap){
				case 1:
					$where['ap_num<='] = 10;
					break;
				case 2:
					$where['ap_num<='] = 15;
					$where['ap_num>='] = 11;
					break;
				case 3:
					$where['ap_num<='] = 20;
					$where['ap_num>='] = 16;
					break;
				case 4:
					$where['ap_num>='] = 21;
					break;
			}
		}


		$orderBy = array('field' => 'id','type' => 'asc');
		$ret['city_id'] = $city_id = $this->input->get('city_id',true);


		if($city_id){
			$whereCity = array('id'=>$city_id);
			$where['city_id'] = $city_id;
			$city = $this->find($this->_city, $whereCity, true,'id,lat,lng,name_cn,name_en');
			$lat = @$city['lat'];
			$lng = @$city['lng'];
			$count = $this->count($this->_school,$where,$where_in_arr,$like);
			$data = $this->find($this->_school, $where, false,'*',$orderBy,$like,$num,$index,array(),$where_in_arr);
		}else{
			if(!empty($name) ){
				//按照城市搜索
				if($name){
					//中文名字
					$like[] = array('field'=>'name_cn','name'=>$name);
					//英文名字
					$like[] = array('field'=>'name_en','name'=>$name);
					//缩写
					$like[] = array('field'=>'state_code','name'=>$name);
				}
				$city_ids = array();
				if($state_id){
					$whereCity['state_id'] = $state_id;
					$state =  $this->find($this->_state, array('id'=>$state_id), true,'lat,lng');
					if (!empty($state)) {
						$lat = $state['lat'];
						$lng = $state['lng'];
					}
				}
				if (!empty($whereCity)) {
					$citys = $this->find($this->_city, $whereCity, false,'id,lat,lng,name_cn,name_en','',$like);
					if (!empty($citys)) {
						foreach ($citys as $city){
							$city_ids[] = $city['id'];
						}
					}
				}


				if($like && !$state_id){
					$state = $this->find($this->_state,array('state_code'=>$name),true,'id');
					if(!$state){
						$state =  $this->find($this->_state, array(), true,'id,lat,lng,name_cn','',$like);
					}
					//搜州再搜城市

					if (!empty($state)) {
						$lat = $state['lat'];
						$lng = $state['lng'];
						$zoom = 6;
						$citys = $this->find($this->_city,array('state_id'=>$state['id']),false,'id,lat,lng');
						//$this->log('sh', $citys);
						if (!empty($citys)) {
							foreach ($citys as $city){
								$city_ids[] = $city['id'];
							}
						}
					}
				}
				
				if (!empty($city_ids)) {
					$where_in_arr[] = array('field'=>'city_id','value'=>$city_ids);
					$count = $this->count($this->_school,$where,$where_in_arr);
					$data = $this->find($this->_school, $where, false,'*',$orderBy,array(),$num,$index,array(),$where_in_arr);

					if (!empty($data)) {
						$city_id = $data[0]['city_id'];
					}
				}


				//最后按照学校名字搜索
				if(empty($data)){
					$new_where_in_arr = array();

					if(!empty($where_in_arr)){
						foreach ($where_in_arr as $v){
							if($v['field'] != 'city_id'){
								$new_where_in_arr[] = $v;
							}
						}
					}
					array_pop($like);
					$count = $this->count($this->_school,array(),$new_where_in_arr,$like);
					$data = $this->find($this->_school,array(),false,'*','',$like,$num,$index,array(),$new_where_in_arr);
					if ($data) {
						$lat = '';
						$lng = '';
						$city_id = $data[0]['city_id'];
						$city =  $this->find($this->_city, array('id'=>$city_id), true,'id,lat,lng,name_cn,name_en');
					}
				}

				
			}else{
				//没有name的情况直接查出全部数据
				$count = $this->count($this->_school,$where,$where_in_arr);
				$data = $this->find($this->_school, $where, false,'*',$orderBy,array(),$num,$index,array(),$where_in_arr);
					
				if (!empty($data)) {
					$city_id = $data[0]['city_id'];
				}
			}
		}

		//移动端要的城市名称
		$area = '';
		if (isset($city['name_cn'])){
			$area = $city['name_cn'];
		}elseif (isset($state['name_cn'])){
			$area = $state['name_cn'];
		}
		
		foreach($data as &$item) {
			$state_id = $item['state_id'];
			if(!empty($state_id)) {
				$state = $this->find($this->_state,array('id' => $state_id));
				$item['state_code'] = $state['state_code'];
			} else {
				$item['state_code'] = '';
			}
			$item['imgPath'] = get_filepath_by_route_id($item['id'],$item['index_hot_cover']);
			unset($item);
		}
		return array('ret'=>$ret,'data'=>$data,'lat'=>$lat,'lng'=>$lng,'zoom'=>$zoom,'city_id'=>$city_id,'area'=>$area,'count'=>$count);
	}
	
	function searchHouse(){
		$lng = '';
		$lat = '';
		$zoom = 8;
		$count = 0;
		$this->load->helper('file_path');
		$ret = $whereCity =  $where_in = array();
		$ret['name'] = $name = $this->input->get('name',true);
		$ret['house_type'] = $house_type = $this->input->get('house_type',true); // 房屋类型
		$ret['race'] = $race = $this->input->get('race',true);	//种族背景
		$ret['financial_tuition_min'] = $financial_tuition_min = $this->input->get('financial_tuition_min',true); //费用
		$ret['financial_tuition_max'] = $financial_tuition_max = $this->input->get('financial_tuition_max',true); //费用
		$ret['family_pet'] = $family_pet = $this->input->get('family_pet',true); //有无宠物
		$ret['language'] = $language = $this->input->get('language',true); //语言
		$ret['profession'] = $profession = $this->input->get('profession',true);//职业
		if (strstr($name, ',')) {
			$arr = explode(',', $name);
			$name = $arr[0];
		}
		$data = $where = $like = $like2 = array();
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
		if ($family_pet) {
			$where['family_pet <>'] = NULL;
		}
		
		if ($financial_tuition_min) {
			$where['price >='] = $financial_tuition_min;
		}
		if ($financial_tuition_max) {
			$where['price <='] = $financial_tuition_max;
		}
		
		$orderBy = array('field' => 'id','type' => 'asc');
		$city_id = $this->input->get('city_id',true);
		$index = $this->input->get('index',true);
		if($city_id){
			$whereCity = array('id'=>$city_id);
			$where['city_id'] = $city_id;
			$city = $this->find($this->_city, $whereCity, true,'id,lat,lng');
			$lat = @$city['lat'];
			$lng = @$city['lng'];
			$data = $this->find($this->_house, $where, false,'*',$orderBy,$like,20,$index,array(),$where_in);
			$count = $this->count($this->_house, $where,'',$like);
			//搜索结束了，处理数据
			if (!empty($data)) {
				$data = $this->_improveHouseData($data);
			}
		}else{
			if(!empty($name) ){
				//按照地区搜索
				if($name){
					$like[] = array('field'=>'name_cn','name'=>$name);
					$like[] = array('field'=>'name_en','name'=>$name);
					$like2[] = array('field'=>'title','name'=>$name);
				}
				//搜城市
				$citys = $this->find($this->_city, $whereCity, false,'id,lat,lng','',$like,20);
				if (!empty($citys)) {
					$where_in = array();
					foreach ($citys as $city){
						$city_ids[] = $city['id'];
					}
					if (!empty($city_ids)) {
						$where_in[] = array(
								'field' => 'city_id',
								'value' => $city_ids
						);
					}
					$data = $this->find($this->_house, $where, false,'*',$orderBy,array(),20,$index,array(),$where_in);
					$count = $this->count($this->_house, $where,$where_in);
					
				}else{
					//搜州再搜城市
					$state =  $this->find($this->_state, array(), true,'id,lat,lng','',$like);
					//$this->log('sh', $state);
					if (!empty($state)) {
						$lat = $state['lat'];
						$lng = $state['lng'];
						$zoom = 6;
						$citys = $this->find($this->_city,array('state_id'=>$state['id']),false,'id,lat,lng');
						//$this->log('sh', $citys);
						if (!empty($citys)) {
							foreach ($citys as $city){
								$arr[] = $city['id'];
							}
							$where_in[] = array('field'=>'city_id','value'=>$arr);
							//$this->log('sh', $where_in);
							$data = $this->find($this->_house, $where, false,'*',$orderBy,array(),20,$index,array(),$where_in);
							$count = $this->count($this->_house, $where,$where_in,array());
						}
					}
				}
					
				//搜索结束了，处理数据
				if (!empty($data)) {
					$data = $this->_improveHouseData($data);
				}else{
					//按照学校再搜索一次住家
					$school = $this->find($this->_school, array(), true,'suggest_house,lat,lng',$orderBy,$like2);
					if (!empty($school['suggest_house'])) {
						$lat = $school['lat'];
						$lng = $school['lng'];
						$arr = explode(',', $school['suggest_house']);
						$where_in[] = array('field'=>'id','value'=>$arr);
						$data = $this->find($this->_house, array(), false,'*',$orderBy,array(),20,$index,array(),$where_in);
						$count = $this->count($this->_house, $where,$where_in,array());
						if (!empty($data)) {
							$data = $this->_improveHouseData($data);
						}
					}
				}
					
			}else{
				//按照住家搜索
				$data = $this->find($this->_house, $where, false,'*',$orderBy,$like2,20,$index,array(),$where_in);
				$count = $this->count($this->_house, $where,array(),$like2);
				//搜索结束了，处理数据
				if (!empty($data)) {
					$data = $this->_improveHouseData($data);
				}
			}
		}
		
		return array('city_id'=>$city_id,'ret'=>$ret,'data'=>$data,'lat'=>$lat,'lng'=>$lng,'profession'=>$profession,'zoom'=>$zoom,'count'=>$count);
	}
	private function _improveHouseData($data){
		foreach ($data as &$item){
			$city = $this->find($this->_city,array('id' => $item['city_id']));
// 			$city_name = $this->en ? $city['name_en'] : $city['name_cn'];
			$city_name = $city['name_cn'];
			$state = $this->find($this->_state,array('id' => $city['state_id']));
			$state_name = '';
			if ($state) {
				//$state_name = $this->en ? $state['name_en'] : $state['name_cn'];
				$state_name = $state['name_cn']; //先写成中文
				$item['state_code'] = $state['state_code'];
			}
			$item['location'] = $state_name . '，' . $city_name;
			
			$item['family_num'] = $this->count($this->_house_family,array('house_id'=>$item['id']));	//移动端要的
			$family = $this->find($this->_house_family,array('house_id'=>$item['id']),true,'race');
			if ($family) {
				$item['family_race'] = $family['race'];
			}else{
				$item['family_race'] = 0;
			}
			$item['imgPath'] = get_filepath_by_route_id($item['id'],$item['index_hot_cover'],2);
			unset($item);
		}
		return $data;
	}
	
	private function _improveCityData($data){
		foreach ($data as &$item){
			$city = $this->find($this->_city,array('id' => $item['city_id']));
			$item['location'] = @$city['name_cn'];
			unset($item);
		}
	}
	
	//上传图片
	function uploadPic($destionPath,$name="",$upFile=NULL){
		if (! empty ( $_FILES )) {
			if (! empty ( $_FILES [$upFile] ['name'] )) {//1487924494.193.jpg
				$suffix = '';
				$suffixArr = explode ( '.', $_FILES [$upFile] ['name'] );
				if($suffixArr){
                   $suffix = array_pop($suffixArr);
				}
				$filePath = $destionPath . $upFile . "/";
				if (! $suffix) {
					$suffix = 'png';
				}
				if (!file_exists($destionPath)) {
					mkdir($destionPath,0777,true);
				}
				// 上传配置
				$config ['upload_path'] = $destionPath;
				$config ['allowed_types'] = '*';
				$config ['file_name'] = $name.'.'.$suffix;
				$config ['overwrite'] = true;

				$this->load->library ( 'upload');
				$this->upload->initialize($config);

				if (! $this->upload->do_upload ( $upFile )) {
					$error = $this->upload->display_errors ();
					$error = str_replace ( array ( '<p>','</p>'), array ('',''), $error );
					$ret = array (
							'status' => 0,
							'msg' => $error 
					);
				} else {
					$upData = $this->upload->data ();
					if (! empty ( $upData ['file_name'] )) {
						$ret = array (
								'status' => 1,
								'msg' => $upData ['file_name'] 
						);
					} else {
						$ret = array (
								'status' => 0,
								'msg' => 'upload error' 
						);
					}
				}
				return $ret;
			} else {
				return $ret = array (
						'status' => 0,
						'msg' => 'data error' 
				);
			}
		} else {
			return $ret = array (
					'status' => 0,
					'msg' => 'no data' 
			);
		}
	}


	function search_school_name(){
		$name = $this->input->get('name');
		$state = $this->find($this->_state,array(),false,'name_cn,name_en,id,state_code');
		$cityCN = $this->find($this->_city,array('name_cn'=>$name),true,'id');
		$cityEN = $this->find($this->_city,array('name_en'=>$name),true,'id');
		if(!empty($cityCN['id']) || !empty($cityEN['id'])){
			$city_id = $cityCN['id']?$cityCN['id']:$cityEN['id'];
		}


		foreach($state as $v){
			if($v['name_cn'] == $name){
				$state_id = $v['id'];
				break;
			}
			if(strtolower($name) == strtolower($v['name_en'])){
				$state_id = $v['id'];
				break;
			}
			if(strtolower($name) == strtolower($v['state_code'])){
				$state_id = $v['id'];
				break;
			}
		}

		if($state_id){
			$search_data['state_id'] = $state_id;
		}
		if($city_id){
			$search_data['city_id'] = $city_id;
		}
		return $search_data;

	}

}










