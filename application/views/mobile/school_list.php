<link rel="stylesheet" href="/public/css/web/lesson.css">
<div class="row" style="margin:10px 0;border-bottom: 1px solid #d8d8d8;">
    <div class="col-xs-4" style="padding: 0 5px;">
        <button class="btn btn-default btn-sm dropdown-toggle summer_type" type="button" value="1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            switch($ret['basic_school_type']){
                case 1:
                    echo '男校';
                    break;
                case 2:
                    echo '女校';
                    break;
                case 3:
                    echo '混校';
                    break;
                default:
                    echo '学校类别';
            }
            ?>
            <span class="caret"></span>
        </button>
    </div>
    <div class="col-xs-4" style="padding: 0 5px;">
        <button class="btn btn-default btn-sm dropdown-toggle summer_type" type="button" value="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            switch($ret['basic_grade']){
                case '1-5':
                    echo '小学';
                    break;
                case '6-8':
                    echo '初中';
                    break;
                case '9-12':
                    echo '高中';
                    break;
                default:
                    echo '学校年级';
            }
            ?>
            <span class="caret"></span>
        </button>
    </div>
    <div class="col-xs-4" style="padding: 0 5px;">
        <button class="btn btn-default btn-sm dropdown-toggle summer_type" type="button" value="3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            switch($ret['basic_school_enrollments_min']){
                case 1:
                    echo '1-500';
                    break;
                case 501:
                    echo '501-1000';
                    break;
                case 1001:
                    echo '1001-5000';
                    break;
                case 5001:
                    echo '5001以上';
                    break;
                default:
                    echo '学校人数';
            }
            ?>
            <span class="caret"></span>
        </button>
    </div>
    <div class="col-xs-4" style="padding: 0 5px;">
        <button class="btn btn-default btn-sm dropdown-toggle summer_type" type="button" value="4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            switch($ret['financial_tuition_min']){
                case 1:
                    echo '1-5000$';
                    break;
                case 5001:
                    echo '5001-10000$';
                    break;
                case 10001:
                    echo '10001-20000$';
                    break;
                case 20001:
                    echo '20001-30000$';
                    break;
                case 30001:
                    echo '30001-40000$';
                    break;
                case 40001:
                    echo '40001-50000$';
                    break;
                case 50001:
                    echo '50001-60000$';
                    break;
                case 60001:
                    echo '60001$以上';
                    break;
                default:
                    echo '学费';
            }
            ?>
             <span class="caret"></span>
        </button>
    </div>

    <div class="col-xs-4" style="padding: 0 5px;">
        <button class="btn btn-default btn-sm dropdown-toggle summer_type" type="button" value="6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            switch($ret['ap']){
                case 1:
                    echo '10门以下';
                    break;
                case 2:
                    echo '11-15门';
                    break;
                case 3:
                    echo '16-20门';
                    break;
                case 4:
                    echo '21门以上';
                    break;
                default:
                    echo 'AP课程';
            }
            ?> <span class="caret"></span>
        </button>
    </div>
    <div class="col-xs-4" style="padding: 0 5px;">
        <button class="btn btn-default btn-sm dropdown-toggle summer_type" type="button" value="5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?=$state_name['name_cn']?$state_name['name_cn']:'所在地区'?>
            <span class="caret"></span>
        </button>
    </div>
</div>
<div id="body_box">
    <div class="main_box">
        <div class="list_box" id="contentData">
            <?php if(empty($data)):?>
                <h4 style="text-align: center">无数据</h4>
            <?php else:?>
                <?php foreach ($data as $v):?>
                    <div class=" row" style="margin: 0">
                        <div class="col-xs-5" style="padding: 0 0 0 5px">
                            <img class="listLesson_img" src="/upload/<?php echo get_filepath_by_route_id($v['id'],$v['index_hot_cover']); ?>" alt="" height="60">
                        </div>

                        <div class="col-xs-7 MlistLessonBox">
                            <h5 class="MlistLesson_name"><?=$v['name_cn']?></h5>
                            <h5 class="MlistLesson_name" style="color: #666;padding: 5px 0;font-weight: 300"><?=$v['name_en']?></h5>
                            <p class="MlistLesson_author"><b style="color: #333">学校类型：</b>
                                <?php
                                    switch($v['basic_school_type']){
                                        case 1:
                                            echo '男校';break;
                                        case 2:
                                            echo '女校';break;
                                        case 3:
                                            echo '混校';break;
                                        default:
                                            echo 'N/A';
                                    }
                                ?>
                            </p>
                            <p class="MlistLesson_author"><b style="color: #333">学校年级：</b> <?php echo $v['basic_grade_start']; ?>-<?php echo $v['basic_grade_end']; ?></p>
                            <a href="/web/schoolDetail/<?=$v['id'];?>"><button class="btn btn-primary btn-xs MlistLesson_btn">查看详情</button></a>
                        </div>
                    </div>
                    <hr />
                <?php endforeach;?>
            <?php endif;?>

        </div>
    </div>
</div>

<style>
    .layui-layer-page{background-color: transparent}
    .layui-layer-setwin{top: 95%;right: 53.6%;}
    .mui-dtpicker{z-index: 9999999999}
</style>
<script>
    var url = window.location.href;
    var index = 1,index2=0;
    $(window).scroll(function(){
        var H = $(this).innerHeight();
        var S = $(this).scrollTop();
        var scroll_H = document.body.scrollHeight;
        var get_url = '';
        if(url.indexOf('?')>0){
            get_url = url.substring(url.indexOf('?')+1);
        }

        if((S+H)==scroll_H){
            $.get('/web/ajaxSearch?<?php echo http_build_query($_GET).'&index=';?>'+index+'&'+get_url,function(data){
                if(data){
                    html = '';
                    $.each(data.data,function(k,v){
                        html+= '<div class=" row" style="margin: 0">';
                        html+= '<div class="col-xs-5" style="padding: 0 0 0 5px"><img class="listLesson_img"  src="/upload/'+v.imgPath+'"></div>';
                        html+= '<div class="col-xs-7 MlistLessonBox">';
                        html+= '<h5 class="MlistLesson_name">'+ v.name_cn+'</h5>';
                        html+= '<h5 class="MlistLesson_name" style="color: #666;padding: 5px 0;font-weight: 300">'+ v.name_en +'</h5>';
                        html+= '<p class="MlistLesson_author"><b style="color: #333">学校类型：</b><?php
                            switch($v['basic_school_type']){
                                case 1:
                                    echo '男校';break;
                                case 2:
                                    echo '女校';break;
                                case 3:
                                    echo '混校';break;
                                default:
                                    echo 'N/A';
                            }
                            ?></p>';
                        html+= '<p class="MlistLesson_author"><b style="color: #333">学校年级：</b> <?php echo $v['basic_grade_start']; ?>-<?php echo $v['basic_grade_end']; ?></p>';
                        html+= '<a href="/web/schoolDetail/'+ v.id+'"><button class="btn btn-primary btn-xs MlistLesson_btn">查看详情</button></a>';
                        html+= '</div>';
                        html+= '</div><hr />';
                    });



                    $('#contentData').append(html);
                    index++;
                }
            },'json')

        }
    });

    $('.summer_type').click(function(){
        var html;
        var val = $(this).val();
        switch (val)
        {
            case '1':
                html = '<div class="row" style="width: 90%;margin: 130px auto 0;">' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="type_choose(this,1)">男校</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="type_choose(this,2)" >女校</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="type_choose(this,3)" >混校</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" style="background: #2bb26a;color: #FFF" onclick="type_choose(this,\'\')" >所有类别</div>' +
                    '</div>' +
                    '</div>';
                break;
            case '2':
                html = '<div class="row" style="width: 90%;margin: 100px auto 0;">' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,\'1-5\')">小学</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,\'6-8\')" >初中</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,\'9-12\')" >高中</div>' +
                    '</div>' +

                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" style="background: #2bb26a;color: #FFF" onclick="object_choose(this,\'\')" >所有年级</div>' +
                    '</div>' +
                    '</div>';
                break;
            case '3':
                html = '<div class="row" style="width: 90%;margin: 130px auto 0;">' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="people_choose(1,500)">1~500</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="people_choose(501,1000)" >501~1000</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="people_choose(1001,5000)" >1001~5000</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="people_choose(5001,10000)" >5001以上</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" style="background: #2bb26a;color: #FFF" onclick="people_choose(\'\',\'\')" >不限人数</div>' +
                    '</div>' +
                    '</div>';
                break;
            case '4':
                html = '<div class="row" style="width: 90%;margin: 130px auto 0;">' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(1,5000)">1~5000$</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(5001,10000)" >5001~10000$</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(10001,20000)" >10001~20000$</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(20001,30000)" >20001~30000$</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(30001,40000)" >30001~40000$</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(40001,50000)" >40001~50000$</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(50001,60000)" >50001~60000$</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(60000,80000)" >60001$以上</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" style="background: #2bb26a;color: #FFF" onclick="price_choose(\'\',\'\')" >不限金额</div>' +
                    '</div>' +
                    '</div>';
                break;
            case '5':
                html = '<div class="row" style="width: 90%;margin: 25px auto 0;">' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" style="background: #2bb26a;color: #FFF" onclick="state_choose(this,\'\')" >所有地区</div>' +
                    '</div>' +
                    <?php foreach($s_state as $v):?>
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="state_choose(this,<?=$v['id']?>)"><?=$v['name_cn']?></div>' +
                    '</div>' +
                    <?php endforeach;?>
                    '</div>';
                break;
            case '6':
                html = '<div class="row" style="width: 90%;margin: 180px auto 0;">' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="isstay_choose(this,1)">10门以下</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="isstay_choose(this,2)">11-15门</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="isstay_choose(this,3)">16-20门</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="isstay_choose(this,4)">21门以上</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" style="background: #2bb26a;color: #FFF" onclick="isstay_choose(this,\'\')" >不限</div>' +
                    '</div>' +
                    '</div>';
                break;
        }
        layer.open({
            type: 1,
            title:'',
            shade: 0.8,
            skin: 'layui-layer-rim', //加上边框
            area: ['100%', '100%'], //宽高
            content:html

        });
    });

    function type_choose(obj,id){
        if(url.indexOf('?')>0 && url.indexOf('basic_school_type=')<0){
            location.href = url +'&basic_school_type='+id;
        }else if(url.indexOf('?')>0 && url.indexOf('basic_school_type=')>0 && url.indexOf('&')>0){
            var a = url.indexOf('basic_school_type=');
            var b = url.substring(a+18);
            var n1 = url.substring(0,a+18)+id;
            var c = b.indexOf('&');
            var n2 = c>0?b.substring(c):'';
            var n = n1+n2;
            location.href = n;
        }else{
            location.href ='/web/schoolList?basic_school_type='+id;
        }
    }
    function object_choose(obj,id){
        if(url.indexOf('?')>0 && url.indexOf('basic_grade=')<0){
            location.href = url +'&basic_grade='+id;
        }else if(url.indexOf('?')>0 && url.indexOf('basic_grade=')>0 && url.indexOf('&')>0){
            var a = url.indexOf('basic_grade=');
            var b = url.substring(a+12);
            var n1 = url.substring(0,a+12)+id;
            var c = b.indexOf('&');
            var n2 = c>0?b.substring(c):'';
            var n = n1+n2;
            location.href = n;
        }else{
            location.href ='/web/schoolList?basic_grade='+id;
        }
    }

    function people_choose(start,end){
        if(url.indexOf('?')>0 && url.indexOf('basic_school_enrollments_min=')<0){
            location.href = url +'&basic_school_enrollments_min='+start + '&basic_school_enrollments_max='+end;
        }else if(url.indexOf('?')>0 && url.indexOf('basic_school_enrollments_min=')>0 && url.indexOf('&')>0){
            var a = url.indexOf('basic_school_enrollments_min=');
            var url1 = url.substring(0,a);
            var url2 = '';
            var url1_end = url.substring(a);//basic_school_enrollments_min=1&basic_school_enrollments_max=500(&basic_grade=1-5)
            var is_other_get1 = url1_end.substring(url1_end.indexOf('&')+1);
            var is_get = is_other_get1.indexOf('&');
            if(is_get>0){
                url2 = is_other_get1.substring(is_get);
            }
            var n = url1 + 'basic_school_enrollments_min=' +start + '&basic_school_enrollments_max='+end + url2;
            location.href = n;
        }else{
            location.href ='/web/schoolList?basic_school_enrollments_min='+start + '&basic_school_enrollments_max='+end;
        }
    }

    function price_choose(start,end){
        if(url.indexOf('?')>0 && url.indexOf('financial_tuition_min=')<0){
            location.href = url +'&financial_tuition_min='+start + '&financial_tuition_max='+end;
        }else if(url.indexOf('?')>0 && url.indexOf('financial_tuition_min=')>0 && url.indexOf('&')>0){
            var a = url.indexOf('financial_tuition_min=');
            var url1 = url.substring(0,a);
            var url2 = '';
            var url1_end = url.substring(a);
            var is_other_get1 = url1_end.substring(url1_end.indexOf('&')+1);
            var is_get = is_other_get1.indexOf('&');
            if(is_get>0){
                url2 = is_other_get1.substring(is_get);
            }
            var n = url1 + 'financial_tuition_min=' +start + '&financial_tuition_max='+end + url2;
            location.href = n;
        }else{
            location.href ='/web/schoolList?financial_tuition_min='+start + '&financial_tuition_max='+end;
        }
    }

    function isstay_choose(obj,id){
        if(url.indexOf('?')>0 && url.indexOf('ap=')<0){
            location.href = url +'&ap='+id;
        }else if(url.indexOf('?')>0 && url.indexOf('ap=')>0 && url.indexOf('&')>0){
            var a = url.indexOf('ap=');
            var b = url.substring(a+3);
            var n1 = url.substring(0,a+3)+id;
            var c = b.indexOf('&');
            var n2 = c>0?b.substring(c):'';
            var n = n1+n2;
            location.href = n;
        }else{
            location.href ='/web/schoolList?ap='+id;
        }
    }
    function state_choose(obj,id){
        if(url.indexOf('?')>0 && url.indexOf('state=')<0){
            location.href = url +'&state='+id;
        }else if(url.indexOf('?')>0 && url.indexOf('state=')>0 && url.indexOf('&')>0){
            var a = url.indexOf('state=');
            var b = url.substring(a+6);
            var n1 = url.substring(0,a+6)+id;
            var c = b.indexOf('&');
            var n2 = c>0?b.substring(c):'';
            var n = n1+n2;
            location.href = n;
        }else{
            location.href ='/web/schoolList?state='+id;
        }
    }







</script>
