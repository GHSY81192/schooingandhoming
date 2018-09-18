<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    protected $appsecret = '1dcad317198a6229447293271318a3ab';
    protected $appid = 'wxf84f8f0978d49ab2';

    public function index(){
        $type = $this->input->get('type',true);
        $rs = array();
        //校友捐赠 top20
        if($type == 1){
            $res = $this->find($this->_school,array(),false,'id,name_cn,name_en,financial_contribute,basic_createtime',array('field'=>'financial_contribute','type'=>'desc'),array(),20);
            foreach($res as $k=>&$v){
                $rs[$k]['id'] = $v['id'];
                $rs[$k]['name_cn'] = $v['name_cn'];
                $rs[$k]['name_en'] = $v['name_en'];
                $rs[$k]['info'] = $v['financial_contribute'];
                $rs[$k]['basic_createtime'] = substr($v['basic_createtime'],0,4);
            }
        }
        //平均sat top20
        if($type == 2){
            $res = $this->find($this->_school,array(),false,'id,name_cn,name_en,avg_sat,basic_createtime',array('field'=>'avg_sat','type'=>'desc'),array(),20);
            foreach($res as $k=>&$v){
                $rs[$k]['id'] = $v['id'];
                $rs[$k]['name_cn'] = $v['name_cn'];
                $rs[$k]['name_en'] = $v['name_en'];
                $rs[$k]['info'] = $v['avg_sat'];
                $rs[$k]['basic_createtime'] = substr($v['basic_createtime'],0,4);
            }
        }
        //ap数量 top20
        if($type == 3){
            $res = $this->find($this->_school,array(),false,'id,name_cn,name_en,basic_createtime,ap_num',array('field'=>'ap_num','type'=>'desc'),array(),20);
            foreach($res as $k=>&$v){
                $rs[$k]['id'] = $v['id'];
                $rs[$k]['name_cn'] = $v['name_cn'];
                $rs[$k]['name_en'] = $v['name_en'];
                $rs[$k]['info'] = $v['ap_num'];
                $rs[$k]['basic_createtime'] = substr($v['basic_createtime'],0,4);
            }
        }
        //体育项目数量 top20
        if($type == 4){
            $res = $this->find($this->_school,array(),false,'id,name_cn,name_en,basic_createtime,sport_num',array('field'=>'sport_num','type'=>'desc'),array(),20);
            foreach($res as $k=>&$v){
                $rs[$k]['id'] = $v['id'];
                $rs[$k]['name_cn'] = $v['name_cn'];
                $rs[$k]['name_en'] = $v['name_en'];
                $rs[$k]['info'] = $v['sport_num'];
                $rs[$k]['basic_createtime'] = substr($v['basic_createtime'],0,4);
            }
        }
        //师生比 top20
        if($type == 5){
            $res = $this->find($this->_school,array(),false,'id,name_cn,name_en,teach_pupil_ratio,basic_createtime',array('field'=>'teach_pupil_ratio','type'=>'asc'),array(),20,'',array(),array('field'=>'teach_pupil_ratio','value'=>array(1,2)));
            foreach($res as $k=>&$v){
                $rs[$k]['id'] = $v['id'];
                $rs[$k]['name_cn'] = $v['name_cn'];
                $rs[$k]['name_en'] = $v['name_en'];
                $rs[$k]['info'] = $v['teach_pupil_ratio'];
                $rs[$k]['basic_createtime'] = substr($v['basic_createtime'],0,4);
            }
        }
        //高学位师资比 top20
        if($type == 6){
            $res = $this->find($this->_school,array(),false,'id,teach_edu_scale,name_cn,name_en,basic_createtime',array('field'=>'teach_edu_scale','type'=>'desc'),array(),20);
            foreach($res as $k=>&$v){
                $rs[$k]['id'] = $v['id'];
                $rs[$k]['name_cn'] = $v['name_cn'];
                $rs[$k]['name_en'] = $v['name_en'];
                $rs[$k]['info'] = $v['teach_edu_scale'];
                $rs[$k]['basic_createtime'] = substr($v['basic_createtime'],0,4);
            }
        }
        echo json_encode($rs);
    }



    public function get_userinfo(){
        $code = $this->input->get('code');
        $url = 'https://api.weixin.qq.com/sns/jscode2session?appid='.$this->appid.'&secret='.$this->appsecret.'&js_code='.$code.'&grant_type=authorization_code';
        $rs = $this->_curl($url);
        $data = $this->object_to_array(json_decode($rs));

        $user_data['session_key'] = $data['session_key'];
        $user_data['openid'] = $data['openid'];

        //判断用户是否登陆过app
        $check_user = $this->find($this->_wx_xcx,array('openid'=>$user_data['openid']),true,'id,school_pk,school_like');
        if(empty($check_user)){ //没有登陆的情况
            $result = $this->insert($this->_wx_xcx,$user_data);
            echo json_encode(array('id'=>$result,'code'=>102)); //102:表示新用户
        }else{//登陆过的情况
            $check_user['code'] = 202;//202：表示老用户
            echo json_encode($check_user);
        }
    }

    public function save_userinfo(){
        $data['school_pk'] = $this->input->get('pk',true);
        $data['school_like'] = $this->input->get('like',true);
        $id = $this->input->get('id',true);
        $this->update($this->_wx_xcx,$data,array('id'=>$id));
    }

    function object_to_array($obj) {
        $obj = (array)$obj;
        foreach ($obj as $k => $v) {
            if (gettype($v) == 'resource') {
                return;
            }
            if (gettype($v) == 'object' || gettype($v) == 'array') {
                $obj[$k] = (array)object_to_array($v);
            }
        }

        return $obj;
    }

    public function get_schoollist(){

        $page = $this->input->get('page',true);
        if($page){
            $index = 12*$page;
        }else{
            $index = 0;
        }
        $name = trim($this->input->get('name',true));
        $basic_school_type = $this->input->get('basic_school_type',true); //学校类型
        $basic_grade = $this->input->get('basic_grade',true); //学校年纪
        $state = $this->input->get('state',true);

        $where = $like = $where_in_arr = array();
        if($name){
            //中文名字 州
            $s_like[] = array('field'=>'name_cn','name'=>$name);
            //英文名字 州
            $s_like[] = array('field'=>'name_en','name'=>$name);
            //缩写 州
            $s_like[] = array('field'=>'state_code','name'=>$name);
            $s_where = 'name_cn=\''.$name.'\' OR name_en=\''.$name.'\' OR state_code=\''.$name.'\'';
            $s_data  =$this->find($this->_state,$s_where,true,'id');
            if($s_data){
                $where['state_id'] = $s_data['id'];
            }
            $like[] = array('field'=>'name_cn','name'=>$name);
            $like[] = array('field'=>'name_en','name'=>$name);
        }else{
            if ($basic_school_type) {
                $where['basic_school_type'] = $basic_school_type;
            }

            if ($basic_grade) {
                switch($basic_grade){
                    case 1://小学
                        $where_in_arr = array('field' => 'basic_grade_start','value' => array(1,2,3,4,5));
                        break;
                    case 2://中学
                        $where_in_arr = array('field' => 'basic_grade_start','value' => array(6,7,8));
                        break;
                    case 3://高中
                        $where_in_arr = array('field' => 'basic_grade_start','value' => array(9,10,11,12));
                        break;
                    default:
                        $where_in_arr = array();
                }
            }
            if($state){
                $data = $this->find($this->_state,array('name_cn'=>$state),true,'id');
                $state_id = $data['id'];
                $where['state_id'] = $state_id;
            }
        }


        $orderBy = array('field' => 'id','type' => 'asc');


        $rs = $this->find($this->_school,$where,false,'id,name_cn,name_en,basic_school_type,basic_grade_start,basic_grade_end,state_id',$orderBy,$like,12,$index,array(),$where_in_arr);
        echo json_encode($rs);
    }

    public function get_like_school(){
        $id = $this->input->get('id',true);
        $rs = $this->find($this->_wx_xcx,array('id'=>$id),true,'school_like');
        if(!empty($rs['school_like'])){
            $like = trim($rs['school_like'],',');
            $arr = explode(',',$like);
            $data = $this->find($this->_school,array(),false,'id,name_cn,name_en,basic_school_type,basic_grade_start,basic_grade_end',array(),array(),'','',array(),array('field'=>'id','value'=>$arr));
        }else{
            $data['code'] = 404;
        }
        echo json_encode($data);
    }
    public function get_pk_school(){
        $id = $this->input->get('id',true);
        $rs = $this->find($this->_wx_xcx,array('id'=>$id),true,'school_pk');
        if(!empty($rs['school_pk'])){
            $like = trim($rs['school_pk'],',');
            $arr = explode(',',$like);
            $data = $this->find($this->_school,array(),false,'id,name_cn,name_en,basic_school_type,basic_grade_start,basic_grade_end',array(),array(),'','',array(),array('field'=>'id','value'=>$arr));
        }else{
            $data['code'] = 404;
        }
        echo json_encode($data);
    }
    public function school_pk(){
        $a = $this->input->get('ids',true);
        $ids = rtrim($a,',');
        $arr = explode(',',$ids);
        $res  = $this->find($this->_school,array(),false,'id,name_cn,name_en,basic_createtime,basic_school_area,basic_school_enrollments,basic_grade_start,basic_grade_end,teach_pupil_ratio,teach_class_avg,financial_contribute,financial_tuition,',array(),array(),'','',array(),array('field'=>'id','value'=>$arr));
        foreach($res as $k=>$v){
            $club  = $this->find($this->_school_club,array('school_id'=>$v['id']),false,'id');
            $sport  = $this->find($this->_school_sport_item,array('school_id'=>$v['id']),false,'id');
            $res[$k]['basic_createtime'] = empty($v['basic_createtime']) ? '--' : substr($v['basic_createtime'],0,4);
            $res[$k]['club_num'] = count($club);
            $res[$k]['sport_num'] = count($sport);

        }
        echo json_encode($res);

    }

    public function get_schoolDetail(){
        $id = $this->input->get('id',true);
        $school = $this->find($this->_school,array('id'=>$id));
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
        $school['basic_createtime'] = empty($school['basic_createtime']) ? 'N/A' : substr($school['basic_createtime'],0,4);
        $school['basic_accept_international_students'] = $school['basic_accept_international_students'] == 0 ? '否' : '是';
        $school['apply_ssat'] = $school['apply_ssat'] == 0 ? '否' : '是';
        $school['teach_esl'] = $school['teach_esl'] == 0 ? '否' : '是';

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
                $sport_item_names[] = $this->find($this->_school_sport_items,array('id' => $item['sport_item_id']))['name'];
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
        $this->load->helper('file_path');
        foreach($images as $k =>$item){
            $images[$k]['src'] = get_filepath_by_route_id($item['school_id'],$item['file_name']);
        }
        $school['images'] = $images;

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
        foreach($s_ids as $k => $v){
            $rs[$k] = $this->find($this->_school,array('id'=>$v),true,'id,name_cn,name_en,index_hot_cover');
        }
        foreach($rs as $k=>$item){
            $rs[$k]['src'] = get_filepath_by_route_id($item['id'],$item['index_hot_cover']);
        }
        $school['more_school'] = $rs;
        echo json_encode($school);
    }



    public function test(){
        echo json_encode($_POST);
    }






}