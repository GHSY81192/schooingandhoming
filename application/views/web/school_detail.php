<link rel="stylesheet" href="/public/css/web/z_schoolinfo.css">
<!-- <link rel="stylesheet" href="/public/css/z-mapbox.css"> -->
<!-- <script src="/public/js/z-mapbox.js"></script> -->
<script type="text/javascript" src="/public/js/swiper.min.js"></script>
<link rel="stylesheet" href="/public/css/mobile/swiper.min.css">
<style>
    @font-face {font-family: "iconfont";
        src: url('/public/iconfont/iconfont.eot'); /* IE9*/
        src: url('/public/iconfont/iconfont.eot#iefix') format('embedded-opentype'), /* IE6-IE8 */
        url('/public/iconfont/iconfont.woff') format('woff'), /* chrome, firefox */
        url('/public/iconfont/iconfont.ttf') format('truetype'), /* chrome, firefox, opera, Safari, Android, iOS 4.2+*/
        url('/public/iconfont/iconfont.svg#iconfont') format('svg'); /* iOS 4.1- */
    }

</style>
<!--详情页banner-->
<div class="z_body">
    <div class="z_schoolinfo" style='background: url("/upload/<?php echo get_filepath_by_route_id($school_detail['id'],$school_detail['cover'],3); ?>") no-repeat 50% 50%;background-size:cover'>
        <div  class="banner_zzc"></div>
        <div class="banner_school_info row">
            <div class="col-md-4" style="width: 100px;margin:65px 50px 0 85px;<?=$school_detail['school_logo']?'':'display: none'?>">
                <div class="logo_box">
                    <img src="/upload/<?php echo get_filepath_by_route_id(0,$school_detail['school_logo'],1) ?>"  class="logo_img" />
                </div>
            </div>
            <div style="margin-top: 65px;<?=$school_detail['school_logo']?'':'padding-left: 85px'?>">
                <div class="school_name"><?php echo $school_detail['name_cn']?></div>
                <div class="school_name" style="font-size: 31px;"><?php echo $school_detail['name_en']?></div>
            </div>
            <div class="banner_info2"><?php echo $school_detail['city_name']?>&nbsp;&nbsp;<span style="font-size: 16px;position: relative;bottom: 1px">|</span>&nbsp;&nbsp; <?php echo $school_detail['state_code']?> &nbsp;&nbsp;<span style="font-size: 16px;position: relative;bottom: 1px">|</span>&nbsp;&nbsp; <?php echo $school_detail['basic_school_type'] ?> &nbsp;&nbsp;<span style="font-size: 16px;position: relative;bottom: 1px">|</span>&nbsp;&nbsp;
                    <img style="padding-right: 5px;position: relative;bottom: 2px" src="/upload/default/school/tel.png" alt=""><?php echo $school_detail['contact_address_number']['number']?> &nbsp;&nbsp;<span style="font-size: 16px;position: relative;bottom: 1px">|</span> &nbsp;&nbsp;<a style="color: #fff;" target="_blank" href="<?php echo 'http://'.$school_detail['url']?>"><?php echo $school_detail['url']?></a></div>

        </div>
         
    </div>
    
    <!--学校简介、基本信息、申请信息、教学信息、财力信息-->
    <div class="school_info_one">
        <div class="row part_one">
            <div class="col-md-6">
           
                <div class="school_intro">
                    <p class="s_title"><?php echo lang('school_detail_intro_message') ?></p>
                    <img style="margin-bottom: 30px;" src="/upload/<?php echo get_filepath_by_route_id($school_detail['id'],$school_detail['index_hot_cover'],1) ?>" />
                    <div class="s_content"><?php echo $school_detail['intro'] ?></div>
                </div>
            </div>
            <div class="col-md-6">
            
                <div class="school_info">
                    <p class="s_title"><?php echo lang('school_detail_basic_message') ?></p>
                    <div class="row p_row">
                        <div class="col-md-3">
                            <?php echo lang('school_detail_basic_createtime_message') ?>：<?php echo $school_detail['basic_createtime']?$school_detail['basic_createtime'].(!lang('is_en')?'年':''):' --'; ?>
                        </div>
                        <div class="col-md-5">
                            <?php echo lang('school_detail_basic_international_students_message') ?>：<?php echo $school_detail['basic_accept_international_students'] ?>
                        </div>
                        <div class="col-md-4">
                            <?php echo lang('school_detail_basic_school_area_message') ?>：<?php echo $school_detail['basic_school_area']?$school_detail['basic_school_area']:'N/A'; ?>
                        </div>
                    </div>
                    <div class="row p_row" >
                        <div class="col-md-3">
                            <?php echo lang('school_detail_basic_school_students_number') ?>：<?php echo $school_detail['basic_school_enrollments']?$school_detail['basic_school_enrollments'].'人':'N/A'; ?>
                        </div>
                        <div class="col-md-5">
                            有色人种学生比例：<?php echo $school_detail['basic_proportion_of_individuals']?$school_detail['basic_proportion_of_individuals'].':1':' --'; ?>
                        </div>
                        <div class="col-md-4">
                            <?php echo lang('school_detail_basic_grade') ?>：
                                <?php
                                    if($school_detail['basic_grade_start'] && $school_detail['basic_grade_end']){
                                        echo $school_detail['basic_grade_start'].'-'.$school_detail['basic_grade_end'];
                                    }elseif(!$school_detail['basic_grade_start'] && $school_detail['basic_grade_end']){
                                        echo $school_detail['basic_grade_end'];
                                    }elseif($school_detail['basic_grade_start'] && !$school_detail['basic_grade_end']){
                                        echo $school_detail['basic_grade_start'];
                                    }else{
                                        echo ' --';
                                    }
                                ?>
                        </div>
                    </div>

                    <div class="row" style="color: #666;padding-bottom: 30px;border-bottom: 1px dashed #999;margin-bottom: 30px;">
                        <div class="col-md-3">
                            <?php echo lang('school_detail_basic_religious_tendency_message') ?>：<?php echo $school_detail['basic_religious_tendency']?$school_detail['basic_religious_tendency']:' --'; ?>
                        </div>
                        <div class="col-md-9" style="padding-right: 0">
                            学校地址：<?php echo $school_detail['contact_address_number']['address'].','.$school_detail['state_code'].','.$school_detail['zip_code']?>
                        </div>
                    </div>
                    
                    <p class="s_title"><?php echo lang('school_detail_apply_message') ?></p>
                    <div class="row p_row" >
                        <div class="col-md-3">
                            申请费用：<?php echo $school_detail['apply_cost']?$school_detail['apply_cost']:' --' ?>
                        </div>
                        <div class="col-md-5">
                            <?php echo lang('school_detail_apply_deadline_message');?>：<?php echo empty($school_detail['apply_deadline']) ? ' --' : $school_detail['apply_deadline'] ?>
                        </div>
                        <div class="col-md-4">
                            是否要求SSAT：<?php echo $school_detail['apply_ssat']?'是':'否' ?>
                        </div>
                    </div>
                    <div class="row p_row" >
                        <div class="col-md-3">
                            <?php echo lang('school_detail_i20')?>：<?php echo $school_detail['basic_issue_i20']?'是':'否' ?>
                        </div>
                        <div class="col-md-5">
                            住宿类型：<?php echo $school_detail['suggest_house']?$school_detail['suggest_house']:'N/A' ?>
                        </div>
                        <div class="col-md-4">
                            是否提供课后辅导：<?php echo $school_detail['after_school_care']?$school_detail['after_school_care']:'否' ?>
                            
                        </div>
                    </div>
                    <div class="row" style="color: #666;padding-bottom: 30px;border-bottom: 1px dashed #999;margin-bottom: 30px;">  
                        <div class="col-md-12">
                            <?php echo lang('school_detail_apply_link_email_message')?>：<?php echo empty($school_detail['apply_link_email']) ? ' --' : $school_detail['apply_link_email'] ?>
                        </div>
                    </div>

                    <p class="s_title">教学信息</p>
                    <div class="row p_row" >
                        <div class="col-md-3">
                            师生比：<?php echo $school_detail['teach_pupil_ratio'] ? $school_detail['teach_pupil_ratio'].':1': 'N/A' ?>
                        </div>
                        <div class="col-md-5">
                            平均班级大小（人）：<?php echo $school_detail['teach_class_avg']?$school_detail['teach_class_avg']:'N/A' ?>
                        </div>
                        <div class="col-md-4">
                            是否提供ESL：<?php echo $school_detail['teach_esl']?'是':'否' ?>
                        </div>
                    </div>
                    <div class="row" style="color: #666;padding-bottom: 30px;border-bottom: 1px dashed #999;margin-bottom: 30px;">  
                        <div class="col-md-12">
                            学士以上学位教职人员比例：<?php echo $school_detail['teach_edu_scale']?$school_detail['teach_edu_scale'].'%':'N/A' ?>
                        </div>
                    </div>


                    <p class="s_title">财力信息</p>
                    <div class="row p_row" >
                        <div class="col-md-3">
                            学费/年：<span style="<?php echo $school_detail['financial_tuition_remark']?'display:none':''; ?>"><?php echo empty($school_detail['financial_tuition']) ? ' --' : $school_detail['financial_tuition'] ?></span><?php echo $school_detail['financial_tuition_remark']?'详情':''; ?><span></span><span id="showPriceContent" class="glyphicon glyphicon-question-sign cur" style="font-size: 14px;position: relative;top:5px;left: 1px;<?php echo $school_detail['financial_tuition_remark']?'':'display:none' ?>" aria-hidden="true" ></span>
                        </div>
                        <div class="col-md-9">
                            校友捐赠：<?php echo empty($school_detail['financial_contribute']) ? 'N/A' : $school_detail['financial_contribute'].'$' ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <!--校园风光-->
        <div class="main_bottom">
            <p class="s_title">校园风光</p>

            <div class="school_views_box">
                <ul>
                    <?php foreach($school_detail['images'] as $k => $item): ?>

                    <li>
                        <div class="Carousel_img" style="margin-right: <?php echo $k==2?'0px':'30px' ?>" >
                            <?php if($item['file_type'] == $this->config->item('file_type_image')): ?>
                            <img  src="/upload/<?php echo get_filepath_by_route_id($item['school_id'],$item['file_name']); ?>">
                            <?php else: ?>
                            <img  src="/upload/default/school/schoolviews/<?php echo $item.'.jpg' ?>">
                            <?php endif ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="btn_move">
                <div class="btn_left"><img src="/upload/default/school/right.png" alt=""></div>
                <div class="btn_right"><img src="/upload/default/school/left.png" alt=""></div>
            </div>


            <div style="clear: both"></div>
        </div>


        <div class="main_bottom" >
            <p class="s_title">平均SAT成绩</p>
            <div class="SAT_box">
                <div class="sat_ave_icon">SAT</div>
                <div class="sat_ave_txt">平均SAT成绩</div>
            </div>
            <div class="SAT_box">
                <i class="icon iconfont" style="font-size: 50px;color: #7492bd;line-height: 1.1;float: left;margin-left:10px;padding-right: 20px;">&#xe666;</i>
                <div class="sat_info">
                    <p style="padding: 1px 0 5px;margin-bottom: 0">SAT数学：</p>
                    <p style="padding: 0px 0 5px;"><?php echo $school_detail['sat_math']?$school_detail['sat_math']:' --' ?></p>
                </div>
            </div>
            <div class="SAT_box">
                <i class="icon iconfont" style="font-size: 50px;color: #7492bd;line-height: 1.1;float: left;margin-left:40px;padding-right: 20px;">&#xe60c;</i>
                <div class="sat_info">
                    <p style="padding: 1px 0 5px;margin-bottom: 0">SAT写作：</p>
                    <p style="padding: 0px 0 5px;"><?php echo $school_detail['sat_write']?$school_detail['sat_write']:' --' ?></p>
                </div>
            </div>
            <div class="SAT_box">
                <i class="icon iconfont" style="font-size: 50px;color: #7492bd;line-height: 0.9;float: left;margin-left:74px;padding-right: 20px;">&#xe6bc;</i>
                <div class="sat_info">
                    <p style="padding: 1px 0 5px;margin-bottom: 0;">SAT阅读：</p>
                    <p style="padding: 0px 0 5px;"><?php echo $school_detail['sat_read']?$school_detail['sat_read']:' --' ?></p>
                </div>
                
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
    <!--ap课程、学生社团、体育项目-->
    <div class="main_bottom row" >
        <div class="col-md-4 ap_box">
            <p class="s_title">AP课程</p>
            <i class="icon iconfont ap_title_i">&#xe601;</i>
            <span class="num_s">数量：<?php echo $school_detail['aps_num']?></span>    
            <?php if($school_detail['aps_num']>5):?> 
                <div class="ap_small"><span>+</span></div>
            <?php endif;?>
            <div class="ap_data">
                <?php
                foreach($school_detail['ap_names'] as $k => $item):
                    if($k < 5){
                        echo '<p>'.$item.'</p>';
                    }else{
                        echo '<p class="show_ap" style="display: none">'.$item.'</p>';
                    }
                endforeach;
                ?>
            </div>
               
        </div>
        <div class="col-md-4 ap_box">
            <p class="s_title">学生社团</p>
            <i class="icon iconfont ap_title_i">&#xe6d7;</i>
            <span class="num_s">数量：<?php echo $school_detail['clubs_num']?></span>  
            <?php if($school_detail['clubs_num']>5):?> 
                <div class="ap_small"><span>+</span></div>
            <?php endif;?>
            <div class="ap_data">
                <?php
                foreach($school_detail['club_names'] as $k => $item):
                    if($k < 5){
                        echo '<p>'.$item.'</p>';
                    }else{
                        echo '<p class="show_ap" style="display: none">'.$item.'</p>';
                    }

                endforeach;
                ?>
            </div>
        </div>
        <div class="col-md-4 ap_box">
            <p class="s_title">体育项目</p>
            <i class="icon iconfont ap_title_i">&#xe614;</i>
            <span class="num_s">数量：<?php echo $school_detail['aports_num']?></span> 
            <?php if($school_detail['aports_num']>5):?>
                <div class="ap_small"><span>+</span></div>
            <?php endif;?> 
            <div class="ap_data">
                    <?php
                    foreach($school_detail['sport_item_names'] as $k => $item):
                        if($k < 5){
                            echo '<p>'.$item.'</p>';
                        }else{
                            echo '<p class="show_ap" style="display: none">'.$item.'</p>';
                        }

                    endforeach;
                    ?>
                </div>
        </div>
    </div>


    <!--我们的位置-->
    <div class="main_bottom">
        <p class="s_title">地理位置</p>
        <div id="map" style="height: 290px"></div>
    </div>
    <?php if(!empty($school_detail['gd_names'])):?>
    <!--毕业生去向-->
    <div class="main_bottom">
        <p class="s_title">毕业生升学去向</p>
        <table style="padding-bottom: 20px;text-align: center;">
            <tr class="row">
            <?php
            foreach($school_detail['gd_names'] as $k => $v):
                if($k%3 != 0 || $k ==0){  
                    if(($k+2)%3 == 0){
                        echo "<td class='col-xs-4 dw student_going'>".$v['name']."</td>";
                    }else{
                        echo "<td class='col-xs-4 student_going'>".$v['name']."</td>";
                    }
                    
                }elseif($k%3 == 0){
                    echo "</tr><tr class='row' ><td class='col-xs-4 student_going'>".$v['name']."</td>";
                }

            endforeach;
            ?>

            </tr>
        </table>
        
    </div>
    <?php endif;?>
   
    
    <div class="main_bottom">
        <p class="s_title">推荐学校</p>
        <div class="tj_school_box">
            <a href="/web/schoolDetail/<?php echo $school_detail['res1']['id'] ?>">
                <div class="tj_box">
                    <img width="360px" height="230px" src="/upload/<?php echo get_filepath_by_route_id($school_detail['res1']['id'],$school_detail['res1']['index_hot_cover']); ?>">
                    <div class="tj_box_txt"><?php echo $school_detail['res1']['name_cn'] ?>,<?php echo $school_detail['res1']['code']['state_code'] ?></div>
                </div>
            </a>
            <a href="/web/schoolDetail/<?php echo $school_detail['res2']['id'] ?>">
                <div class="tj_box">
                    <img width="360px" height="230px" src="/upload/<?php echo get_filepath_by_route_id($school_detail['res2']['id'],$school_detail['res2']['index_hot_cover']); ?>">
                    <div class="tj_box_txt"><?php echo $school_detail['res2']['name_cn'] ?>,<?php echo $school_detail['res2']['code']['state_code'] ?></div>
                </div>
            </a>
            <a href="/web/schoolDetail/<?php echo $school_detail['res3']['id'] ?>">
                <div class="tj_box_end">
                    <img width="360px" height="230px" src="/upload/<?php echo get_filepath_by_route_id($school_detail['res3']['id'],$school_detail['res3']['index_hot_cover']); ?>">
                    <div class="tj_box_txt"><?php echo $school_detail['res3']['name_cn'] ?>,<?php echo $school_detail['res3']['code']['state_code'] ?></div>
                </div>
            </a>
        </div>
    </div>






</div>


<?php if (!empty($school_detail['financial_tuition_remark'])):?>
    <div class="modal fade" id="priceModal"  role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">关于学费的说明</h4>
                </div>
                <div class="modal-body">
                    <?php echo $school_detail['financial_tuition_remark'];?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php endif;?>
<script type="text/javascript">

    $(function(){
        var img_num = $('.school_views_box li').length;
        if(img_num < 4) {
            $('.btn_move').css('display','none');
            return false;
        }
        if(img_num >=4) {
            $('.btn_left').css('display','none');
        }
    })

    var li_num = $('.school_views_box li').length;

    $('.btn_left').click(function(){
        var img_r = $('ul').css('right');
        if(img_r == '410px'){
            $('.btn_left').css('display','none');
        }
        $('.btn_right').css('display','block');
        img_r = parseInt(img_r.substring(0,img_r.length-2));
        var data = img_r - 410;
        $('ul').css('right',data);
    })


    $('.btn_right').click(function(){
        var img_r = $('ul').css('right');
        var end_img = (li_num - 4)*410 + 'px';
        if(img_r == end_img){
            $('.btn_right').css('display','none');
        }

        $('.btn_left').css('display','block');


        img_r = parseInt(img_r.substring(0,img_r.length-2));

        var data = img_r + 410;
        $('ul').css('right',data);
    })
</script>
<script>
    var lat = <?php echo $school_detail['lat']?$school_detail['lat']:40 ?>;
    var lng = <?php echo $school_detail['lng']?$school_detail['lng']:-100 ?>;
    var zoom = 12;
    if (lat ==40 && lng == -100){
        zoom = 4;
    }
    function initMap() {
        var uluru = {lat:lat , lng: lng};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: zoom,
          center: uluru
        });
        if(zoom == 12){
            var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
        }
        
    }
</script>
    <script async defer
    src="http://maps.google.cn/maps/api/js?key=AIzaSyBDZ46dfZl4risY5T_aoOol-iEB1ConUEc&callback=initMap">
    </script>
<script>
   $(function(){
        var hei = $('.school_info').outerHeight()+'px';
        $('.school_intro').css('height',hei)
   })







    $('.ap_small').click(function(){
        if($(this).find('span').html() == '-'){
            $(this).parents('.col-md-4').find('.show_ap').css('display','none');
            $(this).find('span').html('+');
            $(this).find('span').css('bottom','10px');
        }else{
            $(this).parents('.col-md-4').find('.show_ap').css('display','block');
            $(this).find('span').html('-');
            $(this).find('span').css('bottom','12px');
        }

    })



    $('.my_btn').click(function(){
        if($(this).attr('class') == 'glyphicon glyphicon-plus-sign my_btn'){
            $(this).attr('class','glyphicon glyphicon-minus-sign my_btn');
            $(this).parents('.ap_title').next().find('.show_hidden').css('display','block');
        }else{
            $(this).attr('class','glyphicon glyphicon-plus-sign my_btn');
            $(this).parents('.ap_title').next().find('.show_hidden').css('display','none');
        }
    })


    $('.clicking').click(function(){
        $('table').find('.row').each(function(){
            if($(this).css('display')=='none'){
                $(this).attr('class','row ace');
                $(this).css('display','table-row');
            }else if($(this).attr('class')=='row ace'){
                $(this).css('display','none');
            }
        })
    })


    $('#showPriceContent').click(function(){
        $('#priceModal').modal();
    })

</script>

