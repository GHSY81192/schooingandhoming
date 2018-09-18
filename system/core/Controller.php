<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
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
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {
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
	protected $_index_config;
	protected $_house_rule_item;
	protected $_school_grade;
	protected $_school_ap_item;
	protected $_school_sport_items;
	protected $_school_club_item;
	protected $_service;
	protected $_message_info;
	protected $_user_advice;
	protected $_lesson_consult;
	protected $_home_info;
	protected $_home_image;
	protected $_home_rule;
	protected $_email;
	protected $_summer;
	protected $_summer_type;
	protected $_summer_assess;
	protected $_lesson;
	protected $_lesson_book;
	protected $_order;
	protected $_HostInfo;
	protected $_FamilyInfo;
	protected $_hobby;
	protected $_MisInfo;
	protected $_camp;
	protected $_site_reply;
	protected $_admin;
	protected $_goelite;
	protected $_goelite_user;
	protected $_article;
	protected $_bbs;
	protected $_wx_xcx;
	protected $_special;

	//中英文版标识
	protected $en;
	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance =& $this;
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
		$this->_index_config = 'index_config';
		$this->_house_rule_item = 'house_rule_item';
		$this->_school_grade = 'school_grade';
		$this->_school_ap_item = 'school_ap_item';
	 	$this->_school_sport_items = 'school_sport_items';
	 	$this->_school_club_item = 'school_club_item';
		$this->_service = 'service';
		$this->_message_info = 'message_info';
		$this->_user_advice = 'user_advice';
		$this->_lesson_consult = 'lesson_consult';
		$this->_home_info = 'home_info';
		$this->_home_image = 'home_image';
		$this->_home_rule = 'home_rule';
		$this->_email = 'email';
		$this->_summer = 'summer';
		$this->_summer_type = 'summer_type';
		$this->_summer_assess = 'summer_assess';
		$this->_lesson = 'lesson';
		$this->_lesson_book = 'lesson_book';
		$this->_order = 'order';
		$this->_HostInfo = 'HostInfo';
		$this->_FamilyInfo = 'FamilyInfo';
		$this->_hobby = 'hobby';
		$this->_MisInfo = 'MisInfo';
		$this->_camp = 'camp';
		$this->_site_reply = 'site_reply';
		$this->_admin = 'admin';
		$this->_goelite = 'goelite';
		$this->_goelite_user = 'goelite_user';
		$this->_article = 'article';
		$this->_bbs = 'bbs';
		$this->_wx_xcx = 'wx_xcx';
		$this->_special = 'special';
		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();

		// 设置语言
		$this->load->helper('language');
		$this->load->helper('cookie');
		$cookie_user_lang = $this->setCookieAddress();
		if(get_cookie('user_language')){
			$cookie_user_lang = get_cookie('user_language');
		}
		if($cookie_user_lang != 'CN'){
			$current_lang = 'english';
		}else{
			$current_lang = 'zh_cn';
		}

		$cookie_lang = get_cookie('current_lang');
		if(!empty($cookie_lang)){
			$current_lang = $cookie_lang;
		}

		if(empty($current_lang) || $current_lang == 'zh_cn') {
			$this->lang->load('message', 'zh_cn');
			$this->en = false;
		} else if($current_lang == 'english'){
			$this->lang->load('message', 'english');
			$this->en = true;
		} else {
			$this->lang->load('message', 'zh_cn');
			$this->en = false;
		}

	}

	function _is_weixin() {
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
			return true;
		} return false;
	}

	function isMobile() {
		// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
		if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
			return true;
		}
		// 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
		if (isset($_SERVER['HTTP_VIA'])) {
			// 找不到为flase,否则为true
			return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
		}
		// 脑残法，判断手机发送的客户端标志,兼容性有待提高。其中'MicroMessenger'是电脑微信
		if (isset($_SERVER['HTTP_USER_AGENT'])) {
			$clientkeywords = array('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile','MicroMessenger');
			// 从HTTP_USER_AGENT中查找手机浏览器的关键字
			if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
				return true;
			}
		}
		// 协议法，因为有可能不准确，放到最后判断
		if (isset ($_SERVER['HTTP_ACCEPT'])) {
			// 如果只支持wml并且不支持html那一定是移动设备
			// 如果支持wml和html但是wml在html之前则是移动设备
			if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
				return true;
			}
		}
		return false;
	}



	function setCookieAddress(){
		if(!get_cookie('user_language') || get_cookie('user_language') == 'unknown'){
			$ip = $this->getIP();
			$res = $this->_curl('http://ip.taobao.com/service/getIpInfo.php?ip='.$ip,NULL,NULL,2);
//			$res = $this->_curl('http://ip.taobao.com/service/getIpInfo.php?ip=101.81.240.133',NULL,NULL,2);
			$ret = json_decode($res,true);
			if($ret){
				set_cookie('user_language',$ret['data']['country_id'],time()+315360000);
				return $ret['data']['country_id'];
			}else{
				set_cookie('user_language','unknown',time()+315360000);
				return 'unknown';
			}
		}
	}

	function getIP() {
		if (getenv('HTTP_CLIENT_IP')) {
			$ip = getenv('HTTP_CLIENT_IP');
		}
		elseif (getenv('HTTP_X_FORWARDED_FOR')) {
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_X_FORWARDED')) {
			$ip = getenv('HTTP_X_FORWARDED');
		}
		elseif (getenv('HTTP_FORWARDED_FOR')) {
			$ip = getenv('HTTP_FORWARDED_FOR');

		}
		elseif (getenv('HTTP_FORWARDED')) {
			$ip = getenv('HTTP_FORWARDED');
		}
		else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}
	protected function _loadHead($title='',$relative=false){
		if (!$title){
			$title = 'Schooling Homing';
		}
		$user = array();
		$user_id = $this->session->user_id;
		if ($user_id) {
			$user = $this->find($this->_user,array('id'=>$user_id),true,'head_image,name_cn,identity');
		}
		$this->load->view('web/head',array('title'=>$title,'headUser'=>$user,'relative'=>$relative));
	}
	
	protected function _loadFoot($showContent=true){
		$this->load->view('web/foot',array('showContent'=>$showContent));
	}
	
	protected function _loadMobileHead($title='',$needHead=false){
		if (!$title){
			$title = 'Schooling Homing';
		}
		$search_name = $this->input->get('name',true);
		$this->load->view('mobile/head',array('title'=>$title,'needHead'=>$needHead,'search_name'=>$search_name));
	}
	
	protected function _loadMobileFoot($needFoot=false,$active='',$user=array(),$searchJump=true){
		$this->load->view('mobile/foot',array('needFoot'=>$needFoot,'active'=>$active,'user'=>$user,'searchJump'=>$searchJump));
	}
	//根据经纬度算距离
	protected function getDistance($lat1, $lng1, $lat2, $lng2)
	{
		$earthRadius = 6367000; //approximate radius of earth in meters
		$lat1 = ($lat1 * pi() ) / 180;
		$lng1 = ($lng1 * pi() ) / 180;
		$lat2 = ($lat2 * pi() ) / 180;
		$lng2 = ($lng2 * pi() ) / 180;
		$calcLongitude = $lng2 - $lng1;
		$calcLatitude = $lat2 - $lat1;
		$stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);  $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
		$calculatedDistance = $earthRadius * $stepTwo /1000;
		if ( !empty($calculatedDistance) && strstr($calculatedDistance, '.') ){
			$calArr = explode('.', $calculatedDistance);
			$dotData = substr(@$calArr[1], 0,2);
			$calculatedDistance = @$calArr[0].'.'.$dotData;
		}
	
		return $calculatedDistance;
	}
	/*
	 *	$limit:需要输出几行
	 * 	$index:第几行开始输出
	 */
	protected function find($db, $where = array(), $one=true, $field="*",$sort=array(),$likes=array(),$limit='', $index='',$where_not_in=array(),$where_in=array(),$group_by='' ){
		$data = array();
		$this->db->select($field);
		if ($where){
			$this->db->where($where);
		}
		if ($sort){
			$this->db->order_by($sort['field'],$sort['type']);
		}else{
			//$this->db->order_by('id','desc');
		}
		if ($likes){

			foreach($likes as $k => $v){
				if($k == 0){
					$this->db->like($v['field'],$v['name']);
				}else{
					$this->db->or_like($v['field'],$v['name']);
				}

			}

//			foreach ($likes as $k => $like){
//				if($k == 0){
//					if (isset($like['type'])) {
//						$this->db->like($like['field'],$like['name'],$like['type']);
//					}else{
//						$this->db->like($like['field'],$like['name']);
//					}
//				}else{
//					if (isset($like['type'])) {
//						$this->db->or_like($like['field'],$like['name'],$like['type']);
//					}else{
//						$this->db->or_like($like['field'],$like['name']);
//					}
//				}
//			}
		}
		if ($where_not_in) {
			$this->db->where_not_in($where_not_in['field'],$where_not_in['value']);
		}
		
		if ($where_in) {
			$this->db->where_in($where_in['field'],$where_in['value']);
		}
	
		if ($limit){
			if ($index){
//				$index = $index*$limit;
				$this->db->limit($limit,$index);
			}else{
				$this->db->limit($limit);
			}
		}
		if ($group_by) {
			$this->db->group_by($group_by);
		}
		$query = $this->db->get($db);
		$str = $this->db->last_query();
		//echo $str;
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
	
	protected function findPageData($db, $url, $where = array(),$limit=20, $index='',$likes=array(),$where_in=array(),$order_by=''){
		$data = array();
	
		if ($where){
			$this->db->where($where);
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

		if ($where_in) {
			$this->db->where_in($where_in['field'],$where_in['value']);
		}

		$this->load->library('pagination');
		$count = $this->db->count_all_results($db);

		//翻页
		$config['base_url'] = $url;
		$config['total_rows'] = $count;
		$config['per_page'] = $limit;
		$config['enable_query_strings'] = true;
		$config['page_query_string'] = true;

		//使用Bootstrap的分页样式
		$config['num_links'] = 10;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['anchor_class'] = "";

		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['first_link'] = '首页';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '尾页';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';

		$this->pagination->initialize($config);

		if ($limit){
			if ($index){
				$this->db->limit($limit,$index);
			}else{
				$this->db->limit($limit);
			}
		}

		if ($where){
			$this->db->where($where);
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

		if ($where_in) {
			$this->db->where_in($where_in['field'],$where_in['value']);
		}
		if($order_by){
			$this->db->order_by($order_by,'desc');
		}else{
			$this->db->order_by('id','desc');
		}

		$query = $this->db->get($db);
		$str = $this->db->last_query();

		if ($query->num_rows () > 0) {
			$data = $query->result_array ();
			// 			$data['count'] = $count;
		}
		return $data;
	}

	//网络屏蔽词汇
	public function net_word(){
		$arr = array('中共','民主','共产党','民权','中国共产党','共党','胡锦涛','温家宝','习近平','李克强','邓小平','毛泽东','反共','反党','反国家','游行','集会','强奸','走私','强暴','轮奸','奸杀','杀死','避孕套','摇头丸','白粉','冰毒','海洛因','假钞','人民币','假币','日','操','肏','干','骚','鸡巴','屄','逼','我日','干你','我操','操你','操你妈','干你妈','傻逼','傻蛋','大逼','高潮','鸡鸡','鸡巴','做爱','打炮','打洞','插入','抽插','贱人','贱逼','骚逼','牛逼','妈的','他妈的','骗子','骗人','骗','假品','假货','窜货','串货','假冒','烂公司','冒充','假品','烂品','次品','次货','过期');
		return $arr;
	}

	//网站搜索使用
	protected function findWebPageData($db, $url, $where = array(),$limit=20, $index='',$likes=array(),$where_in_arr=array(),$sort=array()){
		$data = array();
	
		if ($where){
			$this->db->where($where);
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
	
		if ($where_in_arr) {
			foreach ($where_in_arr as $where_in){
				$this->db->where_in($where_in['field'],$where_in['value']);
			}
		}
	
		$this->load->library('pagination');
		$count = $this->db->count_all_results($db);

		//翻页
		$config['base_url'] = $url;
		$config['total_rows'] = $count;
		$config['per_page'] = $limit;
		$config['enable_query_strings'] = true;
		$config['page_query_string'] = true;
	
		//使用Bootstrap的分页样式
		$config['num_links'] = 10;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
	
		$config['anchor_class'] = '';
	
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
	
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
	
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
	
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
	
		$title = lang(is_en)?'First':'首页';
		$title1 = lang(is_en)?'Last':'尾页';
		$title2 = lang(is_en)?'Previous':'上一页';
		$title3 = lang(is_en)?'Next':'下一页';
		
		$config['first_link'] = $title;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
	
		$config['last_link'] = $title1;
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
	
		$config['prev_link'] = $title2;
		$config['next_link'] = $title3;
	
		$this->pagination->initialize($config);

		if ($limit){
			if ($index){
				$this->db->limit($limit,$index);
			}else{
				$this->db->limit($limit);
			}
		}
	
		if ($where){
			$this->db->where($where);
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
	
		if ($where_in_arr) {
			foreach ($where_in_arr as $where_in){
				$this->db->where_in($where_in['field'],$where_in['value']);
			}
		}
		if (!empty($sort['field'])) {
			$this->db->order_by($sort['field'],$sort['type']);
		}else{
			$this->db->order_by('is_hot','desc');
		}
		$query = $this->db->get($db);
		$str = $this->db->last_query();

		if ($query->num_rows () > 0) {
			$data = $query->result_array ();
		}

		return array('data'=>$data,'count'=>$count);
	}
	
	protected function count($db, $where ){
		$this->db->where($where);
		return $this->db->count_all_results($db);
	}
	protected function update($db,$updateData,$where){
		$this->db->where($where);
		$res = $this->db->update($db,$updateData);
		return $res;
	}
	protected function update_batch($db,$updateData,$title){
		$res = $this->db->update_batch($db, $updateData, $title);
		return $res;
	}
	protected function delete($db,$where){
		$this->db->where($where);
		$res = $this->db->delete($db);
		return $res;
	}
	protected function insert($db, $data){
		$this->db->insert($db,$data);
		return $this->db->insert_id();
	}
	protected function insert_batch($db, $data){
		$res = $this->db->insert_batch($db,$data);
		return $res;
	}

	protected function sum($db,$field,$where){
		$this->db->select_sum($field);
		$query = $this->db->get_where($db,$where);
		if ($query->num_rows () > 0) {
			$data = $query->row_array ();
		}
		return $data;
	}
	protected function format_ret ($status, $data='') {
		if ($status){
			return array('status'=>'success', 'data'=>$data);
		}else{
			return array('status'=>'error', 'data'=>$data);
		}
	}
	protected function json_ret($status, $msg=''){
		echo json_encode( array('status'=>$status, 'msg'=>$msg) );
		exit;
	}
	
	//代码日志
	protected function log($file, $msg){
		$time = date('Y-m-d H:i:s',time());
		if (is_array($msg)){
			$msg = var_export($msg,true);
		}
		@error_log($time.":".$msg."\n",3,"/data/log/{$file}.log");
	}
	protected function _curl($url, $post = NULL,$host=NULL,$timeout=0) {
		$userAgent = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:12.0) Gecko/20100101 Firefox/12.0';
		$cookieFile = NULL;
		$hCURL = curl_init();
		curl_setopt($hCURL, CURLOPT_URL, $url);
		curl_setopt($hCURL, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($hCURL, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($hCURL, CURLOPT_TIMEOUT, $timeout);
		curl_setopt($hCURL, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($hCURL, CURLOPT_USERAGENT, $userAgent);
		curl_setopt($hCURL, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($hCURL, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($hCURL, CURLOPT_ENCODING, "gzip,deflate");
		curl_setopt($hCURL, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		));
		//curl_setopt($hCURL, CURLOPT_HTTPHEADER,$host);
		if ($post) {
			curl_setopt($hCURL, CURLOPT_POST, 1);
			curl_setopt($hCURL, CURLOPT_POSTFIELDS, $post);
		}
		$sContent = curl_exec($hCURL);

		if ($sContent === FALSE) {
//			$error = curl_error($hCURL);
			curl_close($hCURL);
			return 'error';
//			throw new \Exception($error . ' Url : ' . $url);
		} else {
			curl_close($hCURL);
			return $sContent;
		}
	}


}