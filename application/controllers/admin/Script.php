<?php
class Script extends CI_Controller {
	
	public function uploadDataFromExcel(){
		//$this->_updateCountry();
		// $this->_importCountry();
		//$this->_importState();
		// $this->_importCity();
		// $this->_importSchool();
		// $this->_importHouse();
		echo 'finish all...';
		exit;
	}
	public function runCity(){
		$city = $this->find($this->_city,array('state_name'=>NULL),false);
		foreach ($city as $v){
			$state = $this->find($this->_state,array('id'=>$v['state_id']));
			$update['state_name'] = $state['name_en'];
// 			$school = $this->find($this->_school, array('city_id'=>$v['id']));
// 			if ($school) {
// 				$update['school_id'] = $school['id'];
// 			}else{
// 				$update['school_id'] = '';
// 			}
 			//$this->update($this->_city, $update, array('id'=>$v['id']));
		}
	}
	
	private function _updateCountry() {
		$ROOT_PATH = $_SERVER['DOCUMENT_ROOT'];
	
		$this->load->library('PHPExcel');
		$filename = $ROOT_PATH . '/public/data/country_new.xlsx';
		$objReader = PHPExcel_IOFactory::createReaderForFile($filename);
		$objPHPExcel = $objReader->load($filename);
		$currentSheet = $objPHPExcel->getSheet(0);
		$allColumn = $currentSheet->getHighestColumn();
		$allRow = $currentSheet->getHighestRow();
	
		//初始化字段
		$insert = array(
				'id','name_cn','name_en','lat','lng','sort','state_id','state_name','zip_codes','area_code','population','households','median_income','land_area','water_area','is_capital','school_id'	//数据库名字 记得和excel里面次序对应起来
		);
	
		$data = array();
		$time = date('Y-m-d H:i:s',time());
		for($currentRow = 2; $currentRow<=$allRow; $currentRow++){	//循环行
			$key = 0;
			for($currentColumn='A'; $currentColumn<='Q'; $currentColumn++){	//循环列 从B列开始 到F列
				$address = $currentColumn.$currentRow;
				$val = $currentSheet->getCell($address)->getValue();
				if($val instanceof PHPExcel_RichText){
					$val = $val->__toString();	//得到每一格的数据
				}
				$lineData[$insert[$key]] = $val;
				//$lineData[$insert[4]] = 0; 		//sort字段excel里面没有就填写一个对应的值
				$key++;
			}
			$data[] = $lineData;
		}
		$id_arr = array();
		foreach ($data as $insert){
			if (empty($insert['id'])) {
				$where['state_id'] = $insert['state_id'];
				$where['name_en'] = $insert['name_en'];
				$city = $this->find($this->_city, $where, true, 'id');
				if ($city) {
					$insert['id'] = $city['id'];
				}else{
					$where2['name_cn'] = $insert['name_cn'];
					$where2['name_en'] = $insert['name_en'];
					$city = $this->find($this->_city, $where, true, 'id');
					if ($city) {
						$insert['id'] = $city['id'];
					}
				}
				
			}
			
			
			if( empty($insert['lat']) ){
				$insert['lat'] = '';
			}
			if (empty($insert['state_id'])){
				$insert['state_id'] = 1;
			}
			
			if( empty($insert['lng']) ){
				$insert['lng'] = '';
			}
			if( empty($insert['sort']) ){
				$insert['sort'] = 0;
			}
			if (empty($insert['zip_codes'])) {
				$insert['zip_codes'] = '';
			}
			if (empty($insert['area_code'])) {
				$insert['area_code'] = '';
			}
			if (empty($insert['population'])) {
				$insert['population'] = '';
			}
			if (empty($insert['households'])) {
				$insert['households'] = '';
			}
			if (empty($insert['median_income'])) {
				$insert['median_income'] = '';
			}
			if (empty($insert['land_area'])) {
				$insert['land_area'] = '';
			}
			if (empty($insert['water_area'])) {
				$insert['water_area'] = '';
			}
			if (empty($insert['is_capital'])) {
				$insert['is_capital'] = '';
			}
			if (empty($insert['school_id'])) {
				$insert['school_id'] = '';
			}
			$id = $insert['id'];
			if ( $this->count($this->_city, array('id'=>$id)) ) {
				unset($insert['id']);
				$this->update($this->_city, $insert, array('id'=>$id));
				$id_arr[] = $id;
			}else{
				unset($insert['id']);
				$id = $this->insert($this->_city, $insert);
				$id_arr[] = $id;
			}
		}
		
		$citys = $this->find($this->_city,array(),false);
		foreach ($citys as $v){
			if ( !in_array($v['id'], $id_arr) ) {
				$this->delete($this->_city, array('id'=>$v['id']));
			}
		}
		//echo 'country finish...<br />';
	}
	
	private function _importCountry() {
		$ROOT_PATH = $_SERVER['DOCUMENT_ROOT'];

		$this->load->library('PHPExcel');
		$filename = $ROOT_PATH . '/public/data/country.xlsx';
		$objReader = PHPExcel_IOFactory::createReaderForFile($filename);
		$objPHPExcel = $objReader->load($filename);
		$currentSheet = $objPHPExcel->getSheet(0);
		$allColumn = $currentSheet->getHighestColumn();
		$allRow = $currentSheet->getHighestRow();
		
		//初始化字段
		$insert = array(
				'name_cn','name_en','lat','lng','sort'	//数据库名字 记得和excel里面次序对应起来
		);
		
		$data = array();
		$time = date('Y-m-d H:i:s',time());
		for($currentRow = 2; $currentRow<=$allRow; $currentRow++){	//循环行
			$key = 0;
			for($currentColumn='B'; $currentColumn<='F'; $currentColumn++){	//循环列 从B列开始 到F列
				$address = $currentColumn.$currentRow;
				$val = $currentSheet->getCell($address)->getValue();
				if($val instanceof PHPExcel_RichText){
					$val = $val->__toString();	//得到每一格的数据
				}
				$lineData[$insert[$key]] = $val;
				$lineData[$insert[4]] = 0; 		//sort字段excel里面没有就填写一个对应的值
				$key++;
			}
			$data[] = $lineData;
		}
		foreach ($data as $insert){
			if( empty($insert['name_cn']) ){
				$insert['name_cn'] = '';
			}
			if( empty($insert['lat']) ){
				$insert['lat'] = '';
			}
			if( empty($insert['lng']) ){
				$insert['lng'] = '';
			}
			$this->insert($this->_country, $insert);
		}

		echo 'country finish...<br />';
	}

	private function _importState() {
		$ROOT_PATH = $_SERVER['DOCUMENT_ROOT'];

		$this->load->library('PHPExcel');
		$filename = $ROOT_PATH . '/public/data/state.xlsx';
		$objReader = PHPExcel_IOFactory::createReaderForFile($filename);
		$objPHPExcel = $objReader->load($filename);
		$currentSheet = $objPHPExcel->getSheet(0);
		$allColumn = $currentSheet->getHighestColumn();
		$allRow = $currentSheet->getHighestRow();
		
		//初始化字段
		$insert = array(
				'name_cn','name_en','state_code'	//数据库名字 记得和excel里面次序对应起来
		);
		
		$data = array();
		$time = date('Y-m-d H:i:s',time());
		for($currentRow = 2; $currentRow<=$allRow; $currentRow++){	//循环行
			$key = 0;
			for($currentColumn='B'; $currentColumn<='D'; $currentColumn++){	//循环列 从B列开始 到F列
				$address = $currentColumn.$currentRow;
				$val = $currentSheet->getCell($address)->getValue();
				if($val instanceof PHPExcel_RichText){
					$val = $val->__toString();	//得到每一格的数据
				}
				$lineData[$insert[$key]] = $val;
				$key++;
			}
			$data[] = $lineData;
		}
		foreach ($data as $insert){
			$insert['country_id'] = 228;
			$this->insert($this->_state, $insert);
		}

		echo 'state finish...<br />';
	}

	private function _importCity() {
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		$ROOT_PATH = $_SERVER['DOCUMENT_ROOT'];

		$this->load->library('PHPExcel');
		$filename = $ROOT_PATH . '/public/data/city.xlsx';
		$objReader = PHPExcel_IOFactory::createReaderForFile($filename);
		$objPHPExcel = $objReader->load($filename);
		$currentSheet = $objPHPExcel->getSheet(0);
		$allColumn = $currentSheet->getHighestColumn();
		$allRow = $currentSheet->getHighestRow();
		
		//初始化字段
		$insert = array(
				'name_cn','name_en','state','zip_codes','lat','lng','area_code','population','households','median_income','land_area','water_area'	//数据库名字 记得和excel里面次序对应起来
		);
		
		$data = array();
		$time = date('Y-m-d H:i:s',time());
		for($currentRow = 2; $currentRow<=$allRow; $currentRow++){	//循环行
			$key = 0;
			for($currentColumn='B'; $currentColumn<='M'; $currentColumn++){	//循环列 从B列开始 到F列
				$address = $currentColumn.$currentRow;
				$val = $currentSheet->getCell($address)->getValue();
				if($val instanceof PHPExcel_RichText){
					$val = $val->__toString();	//得到每一格的数据
				}
				$lineData[$insert[$key]] = $val;
				$key++;
			}
			$data[] = $lineData;
		}
		foreach ($data as &$insert){
			$state = $this->find($this->_state,array('name_en'=>$insert['state']),true, 'id',array(),array(),1);
			$state_id = $state['id'];
			unset($insert['state']);
			$insert['state_id'] = $state_id;
			$this->insert($this->_city, $insert);
		}

		echo 'city finish...<br />';
	}

	private function _importSchool() {
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		$ROOT_PATH = $_SERVER['DOCUMENT_ROOT'];

		$this->load->library('PHPExcel');
		$filename = $ROOT_PATH . '/public/data/school2.xlsx';
		$objReader = PHPExcel_IOFactory::createReaderForFile($filename);
		$objPHPExcel = $objReader->load($filename);
		$currentSheet = $objPHPExcel->getSheet(0);
		$allColumn = $currentSheet->getHighestColumn();
		$allRow = $currentSheet->getHighestRow();
		
		//初始化字段
		$insert = array(
				'id','name_cn','name_en','url','city','address','phone','intro','basic_school_type','basic_grade_start','basic_grade_end','zip_code','basic_school_enrollments','teach_pupil_ratio','lat','lng'	//数据库名字 记得和excel里面次序对应起来
		);
		
		$data = array();
		$time = date('Y-m-d H:i:s',time());
		for($currentRow = 2; $currentRow<=$allRow; $currentRow++){	//循环行
			$key = 0;
			for($currentColumn='A'; $currentColumn<='P'; $currentColumn++){	//循环列 从B列开始 到F列
				$address = $currentColumn.$currentRow;
				$val = $currentSheet->getCell($address)->getValue();
				if($val instanceof PHPExcel_RichText){
					$val = $val->__toString();	//得到每一格的数据
				}
				$lineData[$insert[$key]] = $val;
				$key++;
			}
			$data[] = $lineData;
		}

		foreach ($data as &$insert){
			if(empty($insert['url'])) {
				$insert['url'] = '';
			}
			$city = $this->find($this->_city,array('name_en'=>$insert['city']),true, 'id',array(),array(),1);
			if(empty($city)) continue;
			$city_id = $city['id'];
			unset($insert['city']);
			$insert['city_id'] = $city_id;

			$contact_address_number_arr = array('address' => $insert['address'] , 'number' => $insert['phone']);
			$insert['contact_address_number'] = json_encode($contact_address_number_arr);
			unset($insert['address']);
			unset($insert['phone']);

			if(empty($insert['intro'])) {
				$insert['intro'] = '';
			}

			$insert['basic_school_type'] = $this->_find_school_type($insert['basic_school_type']);

			$insert['create_time'] = date('Y-m-d H:i:s',time());
			$insert['update_time'] = date('Y-m-d H:i:s',time());

			$this->insert($this->_school, $insert);
		}

		echo 'school finish...<br />';
	}

	private function _find_school_type($val) {
		$school_type_config = $this->config->item('school_type');
		$ret = 0;
		foreach($school_type_config as $key => $value) {
			if($val == $value) {
				$ret = $key;
				break;
			}
		}
		return $ret;
	}

	private function _importHouse() {
		set_time_limit(0);
		ini_set('memory_limit', '-1');
		$ROOT_PATH = $_SERVER['DOCUMENT_ROOT'];

		$this->load->library('PHPExcel');
		$filename = $ROOT_PATH . '/public/data/home.xlsx';
		$objReader = PHPExcel_IOFactory::createReaderForFile($filename);
		$objPHPExcel = $objReader->load($filename);
		$currentSheet = $objPHPExcel->getSheet(0);
		$allColumn = $currentSheet->getHighestColumn();
		$allRow = $currentSheet->getHighestRow();
		
		//初始化字段
		$insert = array(
				'id','city_id','lat','lng','contact_email','contact_number','house_type','house_create_time','house_last_decorate','family_child'	//数据库名字 记得和excel里面次序对应起来
		);
		
		$data = array();
		$time = date('Y-m-d H:i:s',time());
		for($currentRow = 2; $currentRow<=$allRow; $currentRow++){	//循环行
			$key = 0;
			for($currentColumn='A'; $currentColumn<='J'; $currentColumn++){	//循环列 从B列开始 到F列
				$address = $currentColumn.$currentRow;
				$val = $currentSheet->getCell($address)->getValue();
				if($val instanceof PHPExcel_RichText){
					$val = $val->__toString();	//得到每一格的数据
				}
				$lineData[$insert[$key]] = $val;
				$key++;
			}
			$data[] = $lineData;
		}

		foreach ($data as &$insert){
			$insert['create_time'] = date('Y-m-d H:i:s',time());
			$insert['update_time'] = date('Y-m-d H:i:s',time());

			//var_dump($insert);echo '<br/>';
			$this->insert($this->_house, $insert);
		}

		echo 'house finish...<br />';
	}
}