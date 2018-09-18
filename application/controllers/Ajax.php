<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	
	public function get_country_list() {
		$data = $this->find($this->_country,array(),false,'*',array('field' => 'sort' , 'type' => 'asc'));
		echo json_encode($data);
	}

	public function get_state_list($country_id) {
		$data = $this->find($this->_state,array('country_id' => $country_id) , false,"*",array('field' => 'sort' , 'type' => 'asc'));
		echo json_encode($data);
	}

	public function get_city_list($state_id) {
		$data = $this->find($this->_city,array('state_id' => $state_id) , false,"*",array('field' => 'sort' , 'type' => 'asc'));
		echo json_encode($data);
	}

	public function get_state($city_id) {
		$city = $this->find($this->_city,array('id' => $city_id));
		$state = $this->find($this->_state,array('id' => $city['state_id']));
		echo json_encode($state);
	}

	public function set_lang() {
		$this->load->helper('cookie');
		$lang = $this->input->get('lang');
		set_cookie('current_lang',$lang,time()+315360000);
		echo 1;
	}
}