<link rel="stylesheet" href="/public/css/web/lesson.css">
<div class="row" style="margin:10px 0;border-bottom: 1px solid #d8d8d8;">
    <div class="col-xs-4" style="padding: 0 5px;">
        <button class="btn btn-default btn-sm dropdown-toggle summer_type" type="button" value="1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            switch($ret['house_type']){
                case 1:
                    echo '独栋房';
                    break;
                case 2:
                    echo '联排房';
                    break;
                case 3:
                    echo '公寓房';
                    break;
                default:
                    echo '房屋类型';
            }
            ?>
            <span class="caret"></span>
        </button>
    </div>
    <div class="col-xs-4" style="padding: 0 5px;">
        <button class="btn btn-default btn-sm dropdown-toggle summer_type" type="button" value="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            switch($ret['race']){
                case 1:
                    echo '白人';
                    break;
                case 2:
                    echo '亚裔';
                    break;
                case 3:
                    echo '非洲裔';
                    break;
                default:
                    echo '种族背景';
            }
            ?>
            <span class="caret"></span>
        </button>
    </div>
    <div class="col-xs-4" style="padding: 0 5px;">
        <button class="btn btn-default btn-sm dropdown-toggle summer_type" type="button" value="3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            switch($ret['family_pet']){
                case '0':
                    echo '没有';
                    break;
                case '1':
                    echo '有';
                    break;
                default:
                    echo '有无宠物';
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
                    echo '1-500$';
                    break;
                case 501:
                    echo '501-1000$';
                    break;
                case 1001:
                    echo '1001-2000$';
                    break;
                case 2001:
                    echo '2001-3000$';
                    break;
                case 3001:
                    echo '3001-4000$';
                    break;
                case 4001:
                    echo '4001-5000$';
                    break;
                case 5001:
                    echo '5001-6000$';
                    break;
                case 6001:
                    echo '6001$以上';
                    break;
                default:
                    echo '费用';
            }
            ?>
            <span class="caret"></span>
        </button>
    </div>

    <div class="col-xs-4" style="padding: 0 5px;">
        <button class="btn btn-default btn-sm dropdown-toggle summer_type" type="button" value="6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            switch($ret['language']){
                case 1:
                    echo '中文';
                    break;
                case 2:
                    echo '英语';
                    break;
                case 3:
                    echo '西班牙语';
                    break;
                default:
                    echo '主要语言';
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
                            <img class="listLesson_img" src="/upload/userhome/<?php echo $v['index_hot_cover'] ?>" alt="" height="60">
                        </div>

                        <div class="col-xs-7 MlistLessonBox">
                            <h5 class="MlistLesson_name"><?=$v['title_cn']?></h5>
                            <h5 class="MlistLesson_name" style="color: #666;padding: 5px 0;font-weight: 300"><?=$v['title']?></h5>
                            <p class="MlistLesson_author"><b style="color: #333">住家类型：</b>
                                <?php
                                switch($v['house_type']){
                                    case 1:
                                        echo '独栋房';break;
                                    case 2:
                                        echo '联排房';break;
                                    case 3:
                                        echo '公寓房';break;
                                    default:
                                        echo 'N/A';
                                }
                                ?>
                            </p>
                            <p class="MlistLesson_author"><b style="color: #333">建造时间：</b> <?php echo $v['buildY']; ?>-<?php echo $v['buildM']; ?></p>
                            <a href="/mobile/common/houseDetail/<?=$v['id'];?>"><button class="btn btn-primary btn-xs MlistLesson_btn">查看详情</button></a>
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
            $.get('/web/ajaxSearchHome?<?php echo http_build_query($_GET).'&index=';?>'+index+'&'+get_url,function(data){
                if(data){
                    html = '';
                    $.each(data.data,function(k,v){
                        html+= '<div class=" row" style="margin: 0">';
                        html+= '<div class="col-xs-5" style="padding: 0 0 0 5px"><img class="listLesson_img"  src="/upload/'+v.imgPath+'"></div>';
                        html+= '<div class="col-xs-7 MlistLessonBox">';
                        html+= '<h5 class="MlistLesson_name">'+ v.title_cn+'</h5>';
                        html+= '<h5 class="MlistLesson_name" style="color: #666;padding: 5px 0;font-weight: 300">'+ v.title +'</h5>';
                        html+= '<p class="MlistLesson_author"><b style="color: #333">房屋类型：</b></p>';
                        html+= '<p class="MlistLesson_author"><b style="color: #333">建造时间：</b> <?php echo $v['buildY']; ?>-<?php echo $v['buildM']; ?></p>';
                        html+= '<a href="/mobile/common/houseDetail/'+ v.id+'"><button class="btn btn-primary btn-xs MlistLesson_btn">查看详情</button></a>';
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
                    '<div class="my-xs-6 type_choose" onclick="type_choose(this,1)">独栋房</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="type_choose(this,2)">联排房</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="type_choose(this,3)">公寓房</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" style="background: #2bb26a;color: #FFF" onclick="type_choose(this,\'\')" >不限类别</div>' +
                    '</div>' +
                    '</div>';
                break;
            case '2':
                html = '<div class="row" style="width: 90%;margin: 100px auto 0;">' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,1)">白人</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,2)">亚裔</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,3)">非洲裔</div>' +
                    '</div>' +

                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" style="background: #2bb26a;color: #FFF" onclick="object_choose(this,\'\')" >不限种族</div>' +
                    '</div>' +
                    '</div>';
                break;
            case '3':
                html = '<div class="row" style="width: 90%;margin: 130px auto 0;">' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="people_choose(this,1)">有</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="people_choose(this,0)" >没有</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" style="background: #2bb26a;color: #FFF" onclick="people_choose(this,\'\')" >不限宠物</div>' +
                    '</div>' +
                    '</div>';
                break;
            case '4':
                html = '<div class="row" style="width: 90%;margin: 130px auto 0;">' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(1,500)">1~500$</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(501,1000)" >501~1000$</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(1001,2000)" >1001~2000$</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(2001,3000)" >2001~3000$</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(3001,4000)" >3001~4000$</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(4001,5000)" >4001~5000$</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(5001,6000)" >5001~6000$</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(6001,80000)" >6001$以上</div>' +
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
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="isstay_choose(this,2)">英语</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="isstay_choose(this,1)">中文</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="isstay_choose(this,3)">西班牙语</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" style="background: #2bb26a;color: #FFF" onclick="isstay_choose(this,\'\')" >不限语言</div>' +
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
        if(url.indexOf('?')>0 && url.indexOf('house_type=')<0){
            location.href = url +'&house_type='+id;
        }else if(url.indexOf('?')>0 && url.indexOf('house_type=')>0 && url.indexOf('&')>0){
            var a = url.indexOf('house_type=');
            var b = url.substring(a+11);
            var n1 = url.substring(0,a+11)+id;
            var c = b.indexOf('&');
            var n2 = c>0?b.substring(c):'';
            var n = n1+n2;
            location.href = n;
        }else{
            location.href ='/web/homeList?house_type='+id;
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
            location.href ='/web/homeList?basic_grade='+id;
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
            location.href ='/web/homeList?basic_school_enrollments_min='+start + '&basic_school_enrollments_max='+end;
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
            location.href ='/web/homeList?financial_tuition_min='+start + '&financial_tuition_max='+end;
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
            location.href ='/web/homeList?ap='+id;
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
            location.href ='/web/homeList?state='+id;
        }
    }

</script>