<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/libraries/config.html
 */
class CI_Model {
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
	protected $_weixin_token;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		log_message('info', 'Model Class Initialized');
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
		$this->_weixin_token = 'weixin_token';
	}

	// --------------------------------------------------------------------

	/**
	 * __get magic
	 *
	 * Allows models to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param	string	$key
	 */
	public function __get($key)
	{
		// Debugging note:
		//	If you're here because you're getting an error message
		//	saying 'Undefined Property: system/core/Model.php', it's
		//	most likely a typo in your model code.
		return get_instance()->$key;
	}
	protected function count($db, $where,$where_in_arr = array(),$likes = array() ){
		$this->db->where($where);
		
		if ($likes){
			foreach ($likes as $k => $like){
				if($k == 0){
					if (isset($like['type'])) {
						$this->db->like($like['field'],$like['name'],$like['type']);
					}else{
						$this->db->like($like['field'],$like['name']);
					}
				}else{
					if (isset($like['type'])) {
						$this->db->or_like($like['field'],$like['name'],$like['type']);
					}else{
						$this->db->or_like($like['field'],$like['name']);
					}
				}
			}
		}
		if ($where_in_arr) {
			foreach ($where_in_arr as $where_in){
				$this->db->where_in($where_in['field'],$where_in['value']);
			}
		}
		$count = $this->db->count_all_results($db);
// 		$str = $this->db->last_query();
// 				echo $str.'<br>';
		return $count;
	}
	protected function find($db, $where = array(), $one=true, $field="*",$sort=array(),$likes=array(),$limit='', $index='',$where_not_in=array(),$where_in_arr=array() ){
		$data = array();
		$this->db->select($field);
		if ($where){
			$this->db->where($where);
		}
		if ($sort){
			$this->db->order_by($sort['field'],$sort['type']);
		}else{
			$this->db->order_by('id','desc');
		}
		if ($likes){
			foreach ($likes as $k => $like){
				if($k == 0){
					if (isset($like['type'])) {
						$this->db->like($like['field'],$like['name'],$like['type']);
					}else{
						$this->db->like($like['field'],$like['name']);
					}
				}else{
					if (isset($like['type'])) {
						$this->db->or_like($like['field'],$like['name'],$like['type']);
					}else{
						$this->db->or_like($like['field'],$like['name']);
					}
				}
			}
		}
		if ($where_not_in) {
			$this->db->where_not_in($where_not_in['field'],$where_not_in['value']);
		}
	
		if ($where_in_arr) {
			foreach ($where_in_arr as $where_in){
				$this->db->where_in($where_in['field'],$where_in['value']);
			}
		}
	
		if ($limit){
			if ($index){
				$index = $index*$limit;
				$this->db->limit($limit,$index);
			}else{
				$this->db->limit($limit);
			}
		}
		$query = $this->db->get($db);
// 		$str = $this->db->last_query();
// 		echo $str.'<br>';
		//$this->log('sh', $str);
		if ($query->num_rows () > 0) {
			if ($one){
				$data = $query->row_array ();
			}else{
				$data = $query->result_array ();
			}
		}
		return $data;
	}
	//代码日志
	protected function log($file, $msg){
		$time = date('Y-m-d H:i:s',time());
		if (is_array($msg)){
			$msg = var_export($msg,true);
		}
		@error_log($time.":".$msg."\n",3,"/data/log/{$file}.log");
	}
	protected function update($db,$updateData,$where){
		$this->db->where($where);
		$this->db->update($db,$updateData);
	}
	protected function delete($db,$where){
		$this->db->where($where);
		$this->db->delete($db);
	}
	protected function insert($db, $data){
		$this->db->insert($db,$data);
		return $this->db->insert_id();
	}
	protected function sum($db,$field,$where){
		$this->db->select_sum($field);
		$query = $this->db->get_where($db,$where);
		if ($query->num_rows () > 0) {
			$data = $query->row_array ();
		}
		return $data;
	}

}
