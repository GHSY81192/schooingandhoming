<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.css" />
<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.skinHTML5.css" id="styleSrc"/>
<script src="/public/js/ion.rangeSlider.js"></script>
<link rel="stylesheet" href="/public/css/web/Summer.css">
<link rel="stylesheet" href="/public/css/web/schoollist.css">
<link rel="stylesheet" href="/public/css/layui.css">

<div id="body_box">
    <div class="main_box">
        <div class="school-content">
            <form class="form-horizontal search-form" id="schoolForm" role="form">
                <div class="form-group row">
                    <div class="col-md-2 search-title"><img src="/public/images/icon/more1.png" class="iconImg">所属类别</div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="cur cur_line1 col-md-2">
                                <div class="form-control chose-tag" data-val="1">中学类</div>
                                <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['type_id'], '1')):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
                            </div>
                            <div class="cur cur_line1 col-md-2">
                                <div class="form-control chose-tag" data-val="2">大学学分类</div>
                                <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['type_id'], '2')):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
                            </div>
                            <div class="cur cur_line1 col-md-2">
                                <div class="form-control chose-tag" data-val="3">大学无学分类</div>
                                <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['type_id'], '3')):?>11<?php else:?>10<?php endif;?>.png".png" class="ab s-school-show-icon">
                            </div>
                            <div class="cur cur_line1 col-md-2">
                                <div class="form-control chose-tag" data-val="4">数学类</div>
                                <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['type_id'], '4')):?>11<?php else:?>10<?php endif;?>.png".png" class="ab s-school-show-icon">
                            </div>
                            <div class="cur cur_line1 col-md-2">
                                <div class="form-control chose-tag" data-val="5">天才营类</div>
                                <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['type_id'], '5')):?>11<?php else:?>10<?php endif;?>.png".png" class="ab s-school-show-icon">
                            </div>

                            <div class="cur cur_line1 col-md-2" style="margin-top: 25px;">
                                <div class="form-control chose-tag" data-val="6">艺术营类</div>
                                <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['type_id'], '6')):?>11<?php else:?>10<?php endif;?>.png".png" class="ab s-school-show-icon">
                            </div>
                            <div class="cur cur_line1 col-md-2" style="margin-top: 25px;">
                                <div class="form-control chose-tag" data-val="7">科技营类</div>
                                <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['type_id'], '7')):?>11<?php else:?>10<?php endif;?>.png".png" class="ab s-school-show-icon">
                            </div>
                            <div class="cur cur_line1 col-md-2" style="margin-top: 25px;">
                                <div class="form-control chose-tag" data-val="8">语言类</div>
                                <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['type_id'], '8')):?>11<?php else:?>10<?php endif;?>.png".png" class="ab s-school-show-icon">
                            </div>
                            <div class="cur cur_line1 col-md-2" style="margin-top: 25px;">
                                <div class="form-control chose-tag" data-val="9">综合类</div>
                                <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['type_id'], '9')):?>11<?php else:?>10<?php endif;?>.png".png" class="ab s-school-show-icon">
                            </div>
                            <div class="cur cur_line1 col-md-2" style="margin-top: 25px;">
                                <div class="form-control chose-tag" data-val="10">户外体育类</div>
                                <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['type_id'], '10')):?>11<?php else:?>10<?php endif;?>.png".png" class="ab s-school-show-icon">
                            </div>
                            <input type="hidden" name="summer_type_id" value="<?=@$ret['basic_school_type'];?>"  />
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 search-title search-title2"><img src="/public/images/icon/more2.png" class="iconImg">当前所在年级</div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="cur cur_line1 col-md-2">
                                <select class="form-control" name="grade">
                                    <option value="">选择年级</option>
                                    <option <?=$ret['grade']==13?'selected':''?> value="13">K</option>
                                    <option <?=$ret['grade']==1?'selected':''?> value="1">1</option>
                                    <option <?=$ret['grade']==2?'selected':''?> value="2">2</option>
                                    <option <?=$ret['grade']==3?'selected':''?> value="3">3</option>
                                    <option <?=$ret['grade']==4?'selected':''?> value="4">4</option>
                                    <option <?=$ret['grade']==5?'selected':''?> value="5">5</option>
                                    <option <?=$ret['grade']==6?'selected':''?> value="6">6</option>
                                    <option <?=$ret['grade']==7?'selected':''?> value="7">7</option>
                                    <option <?=$ret['grade']==8?'selected':''?> value="8">8</option>
                                    <option <?=$ret['grade']==9?'selected':''?> value="9">9</option>
                                    <option <?=$ret['grade']==10?'selected':''?> value="10">10</option>
                                    <option <?=$ret['grade']==11?'selected':''?> value="11">11</option>
                                    <option <?=$ret['grade']==12?'selected':''?> value="12">12</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 search-title search-title2"><img src="/public/images/icon/more5.png" class="iconImg">时间</div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="cur cur_line1 col-md-2">
                                <input type="text" class="layui-input form-control" id="test1" placeholder="开始时间" value="<?=$ret['time_start']?>" style="height: 34px;">
                            </div>
                            <div class="cur cur_line1 col-md-2">
                                <input type="text" class="layui-input form-control" id="test2" placeholder="结束时间" value="<?=$ret['time_end']?>" style="height: 34px;">
                            </div>
                            <input type="hidden" name="international" value="<?=@$ret['basic_grade'];?>" />
                        </div>
                    </div>
                </div>



                <div class="form-group row">
                    <div class="col-md-2 search-title"><img src="/public/images/icon/more4.png" class="iconImg">预算</div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="cur col-md-9">
                                <input type="text" class="num" />
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="basic_school_enrollments_min" value="<?=@$ret['basic_school_enrollments_min']?>"/>
                    <input type="hidden" name="basic_school_enrollments_max" value="<?=@$ret['basic_school_enrollments_max']?>"/>
                </div>

                <div class="hide" id="hideSearch">
                    <div class="form-group row">
                        <div class="col-md-2 search-title"><img src="/public/images/icon/more5.png" class="iconImg">住宿类型</div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="cur cur_line1 col-md-2">
                                    <div class="form-control chose-tag" data-val="2">走读</div>
                                    <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['is_stay'], '2')):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
                                </div>
                                <div class="cur cur_line1 col-md-2">
                                    <div class="form-control chose-tag" data-val="1">住宿</div>
                                    <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['is_stay'], '1')):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
                                </div>
                                <input type="hidden" name="is_stay" value="<?=@$ret['is_stay']?>"/>
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-2 search-title search-title4"><img src="/public/images/icon/s6.png" class="iconImg"><?php echo lang('search_address_message') ?></div>
                        <div class="col-md-9">
                            <div class="row">
                                <?php foreach($state as $v):?>
                                    <div class="cur col-md-3 ap-list">
                                        <div class="form-control chose-tag" data-val="<?=$v['id']?>" ><?php echo !lang('is_en') ?$v['name_cn']:$v['name_en'];?></div>
                                        <img src="/public/images/web/schoollist/<?php if( strstr(@$ret['state_id'], $v['id']) ):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
                                    </div>
                                <?php endforeach;?>
                                <input type="hidden" name="state_id" value="<?=@$ret['state_id'];?>" />
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="sort" value="<?=$ret['sort'];?>" />
                    <input type="hidden" name="sort_type" value="<?=$ret['sort_type'];?>" />
                </div>
            </form>
        </div>
        <div style="background-color:#f4f4f4;padding:20px 0px 20px 40px;border:1px solid #cccccc;border-top:0px">
            <a class="btn btn-default cancel-btn" id="subBtn" style="background-color:#5078b5;color:#ffffff;border:1px solid #5078b5"><?php echo lang('search_filter_message2') ?></a>
            <a class="btn btn-default cancel-btn" id="addMore" style="background-color:#fff;border:1px solid #5078b5">更多筛选条件</a>
            <a class="btn btn-default cancel-btn" id="subBtn2" onclick="location.href='/web/SummerMore'" style="background-color:#5078b5;color:#ffffff;border:1px solid #5078b5">全部暑期项目</a>
            <span>共计<?php echo $count;?>个项目</span>
        </div>
        <div class="content-box">
            <div class="row">
                <?php foreach($list as $k => $v):?>

                        <a href="/web/SummerDetail/<?=$v['id']?>">
                            <div class="col-xs-12 col-md-4 summer_more_img_box">
                                <div class="img_box">
                                    <img src="/upload/summer/<?= $v['img']?>" width="100%">
                                </div>
                                <div class="M_tit_box">
                                    <h4 class="school_name_cn"><?=$v['name_cn']?></h4>
                                    <p class="school_name_en"><?=$v['name_en']?$v['name_en']:'&nbsp;'?></p>
                                </div>
                            </div>
                        </a>


                <?php endforeach;?>
            </div>
            <div class="clearfix">
                <?php if ($count > 6):?>
                    <ul class="pagination" style="padding:10px 20px 0px 15px;"><li><?php if(lang('is_en')):?><?php echo (int)($count/6)+1;?> Pages， <?php else:?>共<?php echo (int)($count/6)+1;?>页，<?php endif;?></li></ul>
                <?php endif;?>
                <?php echo $this->pagination->create_links(); ?>

            </div>
        </div>
    </div>
</div>


<script>
    $('#addMore').click(function(){
        if($(this).html()=='更多筛选条件'){
            $('#hideSearch').removeClass('hide');
            $(this).html('取消');
        }else{
            $('#hideSearch').addClass('hide');
            $(this).html('更多筛选条件');
        }


    })

    layui.use('laydate', function(){
        var laydate = layui.laydate;

        //执行一个laydate实例
        laydate.render({
            elem: '#test1' //指定元素
        });
        laydate.render({
            elem: '#test2' //指定元素
        });
    });

    $(".num").ionRangeSlider({
        min: 0,
        max: 50000,
        from:<?php echo empty($ret['min'])?0:$ret['min']?>,
        to: <?php echo empty($ret['max'])?50000:$ret['max']?>,
        type: 'double',//设置类型
        step: 1,
        postfix: "$",
        grid: true,
        onChange: saveResult2,
        onFinish: saveResult2
    });

    function saveResult2(data) {
        from2 = data.fromNumber;
        to2 = data.toNumber;
        $('input[name=basic_school_enrollments_min]').val(from2);
        $('input[name=basic_school_enrollments_max]').val(to2);
    };

    $('.chose-tag').click(function(){
        var data_val = $(this).parent().parent().find('input[type=hidden]').val();
        if(	$(this).next('img').attr("src") == "/public/images/web/schoollist/10.png" ){
            add_val = $(this).attr('data-val');
            if(data_val.indexOf(add_val) <0){
                data_val += ','+add_val;
                $(this).parent().parent().find('input[type=hidden]').val(data_val);
            }
            $(this).next('img').attr("src","/public/images/web/schoollist/11.png");
        }else{
            $(this).next('img').attr("src","/public/images/web/schoollist/10.png");
            del_val = $(this).attr('data-val');
            if(data_val.indexOf(del_val) >=0){	//有就去掉
                data_val = data_val.replace(','+del_val,'');
                $(this).parent().parent().find('input[type=hidden]').val(data_val);
            }

        }
    });


    //筛选逻辑
    $('#subBtn').click(function(){
        var type_id = $('input[name=summer_type_id]').val();
        if(type_id){
            type_id = type_id.substring(1);
        }
        var grade = $('select[name=grade]').val();
        var time_start = $('#test1').val();
        var time_end = $('#test2').val();
        var is_stay = $('input[name=is_stay]').val();
        if(is_stay){
            is_stay = is_stay.substring(1);
        }
        if(time_end < time_start){
            layer.msg('结束时间不能小于开始时间');
            return false;
        }

        var min = $('input[name=basic_school_enrollments_min]').val();
        var max = $('input[name=basic_school_enrollments_max]').val();

        location.href="/web/SummerMore?type_id="+type_id+'&grade='+grade+'&time_start='+time_start+'&time_end='+time_end+'&min='+min+'&max='+max+'&is_stay='+is_stay;
    });
</script>


