<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Special extends CI_Controller {
    protected $mobile;
    public function __construct(){
        parent::__construct();
        if ($this->isMobile()) {
            $this->mobile = true;
        }else{
            $this->mobile = false;
        }

    }


    public function l_camp(){
        $this->load->helper('file_path');
        if($this->mobile){
            $data['mobile'] = 1;
            $this->_loadMobileHead('英国伦敦夏令营',true);
            $this->load->view('special/l_camp',$data);
            $this->_loadMobileFoot(true);
        }else{
            $data['mobile'] = 0;
            $this->_loadHead('英国伦敦夏令营');
            $this->load->view('special/l_camp',$data);
            $this->_loadFoot();
        }
    }
    public function winter_camp(){
        $this->load->helper('file_path');
        if($this->mobile){
            $this->_loadMobileHead('伦敦艺术与英语提升夏令营',true);
            $this->load->view('special/winter_camp');
            $this->_loadMobileFoot(true);
        }else{
            $this->_loadHead('伦敦艺术与英语提升夏令营');
            $this->load->view('special/winter_camp');
            $this->_loadFoot();
        }
    }
    public function en_camp(){
        $this->load->helper('file_path');
        if($this->mobile){
            $this->_loadMobileHead('伦敦百年私校英语提升夏令营',true);
            $this->load->view('special/en_camp');
            $this->_loadMobileFoot(true);
        }else{
            $this->_loadHead('伦敦百年私校英语提升夏令营');
            $this->load->view('special/en_camp');
            $this->_loadFoot();
        }
    }

    public function stem(){
        $this->load->helper('file_path');
        if($this->mobile){
            $this->_loadMobileHead('stem',true);
            $this->load->view('special/stem');
            $this->_loadMobileFoot(true);
        }else{
            $this->_loadHead('stem');
            $this->load->view('special/stem');
            $this->_loadFoot();
        }
    }

    public function april2018_activity(){
        $this->load->helper('file_path');
        if($this->mobile){
            $this->_loadMobileHead('Schooling and Homing',true);
            $this->load->view('special/april2018');
            $this->_loadMobileFoot(true);
        }else{
            $this->_loadHead('Schooling and Homing');
            $this->load->view('special/april2018');
            $this->_loadFoot();
        }
    }

    public function top_summer_schools(){
        $this->load->helper('file_path');
        if($this->mobile){
            $this->_loadMobileHead('全美顶级名校夏校',true);
            $this->load->view('special/top_summer_schools',array('mobile'=>1));
            $this->_loadMobileFoot(true);
        }else{
            $this->_loadHead('全美顶级名校夏校');
            $this->load->view('special/top_summer_schools',array('mobile'=>2));
            $this->_loadFoot();
        }
    }

    public function summer_school_apply(){
        $this->load->helper('file_path');
        $data = array(
            array('name_cn'=>'菲尔中学','name_en'=>'Fay School','content'=>'菲尔中学暑期英语课程是菲尔中学推出的一个浸入式英语学习计划，课程针对10-15岁学生开放，让学生在全英文环境中不断提升自己的英语综合运用能力。开课前老师会对每个学生的英语水平进行测试评估，把学生分为初级、中级和高级三个等级以保证每个学生都接受到最合适的教育。','link'=>118),
            array('name_cn'=>'菲利普艾斯特中学','name_en'=>'Phillips Exeter Academy','content'=>'Exeter暑期课程分为8个主题课程组，每个课程组包括3门课，学生可以从中选择一门课程。课程从周一到周六开课，每周5次。课后学生应至少预留60分钟来完成每天的家庭作业，并为每天的课堂讨论和活动做好充足的准备。','link'=>122),
            array('name_cn'=>'鹰溪中学','name_en'=>'Eaglebrook School','content'=>'鹰溪中学暑期项目为期4周，针对11-13岁学生开放，项目旨在为学生提供一个良好的暑期学习提升机会，让孩子们在轻松愉快的氛围里塑造自信心、培养其在课堂、球场以及社团的领导能力。','link'=>119),
            array('name_cn'=>'迪尔菲尔德中学','name_en'=>'Deerfield Academy','content'=>'迪尔菲尔德中学Experimentory暑期项目是一个跨学科的创新设置，针对即将升入7-8年级的孩子开放，课程把多个学科以新鲜和令人兴奋的方式组合在一起，带给学生全新的学术体验。','link'=>127),
            array('name_cn'=>'乔特罗斯玛丽中学','name_en'=>'Choate Rosemary Hall','content'=>'低年级包括三门课程：说明文和创造性写作， 小说和其他文体文章的阅读，体验美国文化；高年级课程包括主修课和辅修课，主修课有写作工作坊，阅读分析；选修课有公共演讲与辩论，托福TOEFL准备课程，文化艺术英语表达。','link'=>125),
            array('name_cn'=>'菲利普斯安多福中学','name_en'=>'Phillips Academy Andover','content'=>'寄宿生可选择一门Period 1和一门Period 2课程，以及一门下午课外活动。可以参加大学咨询项目(College Counseling Program)，不要求出勤率。走读生课程选择较灵活，可在Period 1和Period 2中任意选择一门、或者选择两门课程，以及一门下午的课外活动;还可以选择性参加大学咨询项目(College Counseling Program)、SAT备考或SSAT备考等课程。','link'=>120),
            array('name_cn'=>'北野山中学','name_en'=>'Northfield Mount Hermon School','content'=>'实行小班授课，每班平均10名学生，并配备两位老师。主要授课老师大都拥有中学或大学授课的丰富经验，实习老师都是美国即将毕业或已经毕业的大学生，主要负责趣味化教学，激发学生的学习兴趣。','link'=>129),
            array('name_cn'=>'霍奇基斯中学','name_en'=>'Hotchkiss School','content'=>'霍奇基斯中学暑期课程欢迎来自世界各地有才华的学生。为期三周的高质量美国文学和戏剧课程通过浸入式的学习体验，给学生提供学术挑战和奖励。','link'=>128),
            array('name_cn'=>'摩尔西斯堡中学','name_en'=>'Mercersburg Academy','content'=>'项目对6-12年级的学生开放，每门课程都经过精心设计，可以让学生通过不同的课程、学习技巧以及交流环境来提高他们英语听、说、读、写及综合能力。','link'=>130)
        );


        if($this->mobile){
            $this->_loadMobileHead('名校中学夏校申请',true);
            $this->load->view('special/summer_school_apply',array('mobile'=>1,'data'=>$data));
            $this->_loadMobileFoot(true);
        }else{
            $this->_loadHead('名校中学夏校申请');
            $this->load->view('special/summer_school_apply',array('mobile'=>2,'data'=>$data));
            $this->_loadFoot();
        }
    }




}