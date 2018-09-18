<link rel="stylesheet" href="/public/css/web/lesson.css">
<link rel="stylesheet" href="/public/css/mui/css/mui.picker.min.css">
<div class="row" style="margin:10px 0;border-bottom: 1px solid #d8d8d8;">
    <div class="col-xs-4" style="padding: 0 5px;">
        <button class="btn btn-default btn-sm dropdown-toggle summer_type" type="button" value="1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
                switch($search_type_id){
                    case 1:
                        echo '中学类';
                        break;
                    case 2:
                        echo '大学学分类';
                        break;
                    case 3:
                        echo '大学无学分类';
                        break;
                    case 4:
                        echo '数学类';
                        break;
                    case 5:
                        echo '天才营类';
                        break;
                    case 6:
                        echo '艺术营类';
                        break;
                    case 7:
                        echo '科技营类';
                        break;
                    case 8:
                        echo '语言类';
                        break;
                    case 9:
                        echo '综合类';
                        break;
                    case 10:
                        echo '户外体育类';
                        break;
                    default:
                        echo '所属类别';
                }
            ?>
             <span class="caret"></span>
        </button>
    </div>
    <div class="col-xs-4" style="padding: 0 5px;">
        <button class="btn btn-default btn-sm dropdown-toggle summer_type" type="button" value="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            switch($search_object_id){
                case 1:
                    echo '1';
                    break;
                case 2:
                    echo '2';
                    break;
                case 3:
                    echo '3';
                    break;
                case 4:
                    echo '4';
                    break;
                case 5:
                    echo '5';
                    break;
                case 6:
                    echo '6';
                    break;
                case 7:
                    echo '7';
                    break;
                case 8:
                    echo '8';
                    break;
                case 9:
                    echo '9';
                    break;
                case 10:
                    echo '10';
                    break;
                case 11:
                    echo '11';
                    break;
                case 12:
                    echo '12';
                    break;
                case 13:
                    echo 'K';
                    break;
                default:
                    echo '当前所在年级';
            }
            ?>
             <span class="caret"></span>
        </button>
    </div>
    <div class="col-xs-4" style="padding: 0 5px;">
        <button class="btn btn-default btn-sm dropdown-toggle summer_type" type="button" value="3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            时间 <span class="caret"></span>
        </button>
    </div>
    <div class="col-xs-4" style="padding: 0 5px;">
        <button class="btn btn-default btn-sm dropdown-toggle summer_type" type="button" value="4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            预算 <span class="caret"></span>
        </button>
    </div>
    <div class="col-xs-4" style="padding: 0 5px;">
        <button class="btn btn-default btn-sm dropdown-toggle summer_type" type="button" value="5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            所在地区 <span class="caret"></span>
        </button>
    </div>
    <div class="col-xs-4" style="padding: 0 5px;">
        <button class="btn btn-default btn-sm dropdown-toggle summer_type" type="button" value="6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            switch($search_isstay_id){
                case 1:
                    echo '住宿';
                    break;
                case 2:
                    echo '走读';
                    break;
                default:
                    echo '住宿类型';
            }
            ?> <span class="caret"></span>
        </button>
    </div>
</div>
<div id="body_box">
    <div class="main_box">
        <div class="list_box" id="contentData">
            <?php if(empty($list)):?>
                <h4 style="text-align: center">无数据</h4>
            <?php else:?>
                <?php foreach ($list as $v):?>
                    <div class=" row" style="margin: 0">
                        <div class="col-xs-5" style="padding: 0 0 0 5px">
                            <img class="listLesson_img" src="/upload/summer/<?=$v['img']?>" alt="" height="60">
                        </div>

                        <div class="col-xs-7 MlistLessonBox">
                            <h5 class="MlistLesson_name"><?=$v['name_cn']?></h5>
                            <h5 class="MlistLesson_name" style="color: #666;padding: 5px 0;font-weight: 300"><?=$v['name_en']?></h5>
                            <p class="MlistLesson_author"><b style="color: #333">所属类别：</b><?=$v['type']?></p>
                            <p class="MlistLesson_author"><b style="color: #333">面向对象：</b><?=$v['object']?></p>
                            <a href="/web/SummerDetail/<?=$v['id']?>"><button class="btn btn-primary btn-xs MlistLesson_btn">查看详情</button></a>
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
<script src="/public/js/mui/js/mui.min.js"></script>
<script src="/public/js/mui/js/mui.picker.min.js"></script>
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
            $.get('/web/ajaxSearchSummer?<?php echo http_build_query($_GET).'&index=';?>'+index+'&'+get_url,function(data){
                if(data){
                    html = '';
                    $.each(data,function(k,v){
                        html+= '<div class=" row" style="margin: 0">';
                        html+= '<div class="col-xs-5" style="padding: 0 0 0 5px"><img class="listLesson_img" src="/upload/summer/'+ v.img +'" alt="" height="60"></div>';
                        html+= '<div class="col-xs-7 MlistLessonBox">';
                        html+= '<h5 class="MlistLesson_name">'+ v.name_cn+'</h5>';
                        html+= '<h5 class="MlistLesson_name" style="color: #666;padding: 5px 0;font-weight: 300">'+ v.name_en +'</h5>';
                        html+= '<p class="MlistLesson_author"><b style="color: #333">所属类别：</b>'+ v.type+'</p>';
                        html+= '<p class="MlistLesson_author"><b style="color: #333">面向对象：</b>'+ v.object+'</p>';
                        html+= '<a href="/web/SummerDetail/'+ v.id+'"><button class="btn btn-primary btn-xs MlistLesson_btn">查看详情</button></a>';
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
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="type_choose(this,1)">中学类</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="type_choose(this,6)" >艺术营类</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="type_choose(this,2)" >大学学分类</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="type_choose(this,7)" >科技营类</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="type_choose(this,3)" >大学无学分类</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="type_choose(this,8)" >语言类</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="type_choose(this,4)" >数学类</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="type_choose(this,9)" >综合类</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="type_choose(this,5)" >天才营类</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="type_choose(this,10)" >户外体育类</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" style="background: #2bb26a;color: #FFF" onclick="type_choose(this,\'\')" >所有类别</div>' +
                    '</div>' +
                    '</div>';
                break;
            case '2':
                html = '<div class="row" style="width: 90%;margin: 100px auto 0;">' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,13)">K</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,7)" >7</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,1)" >1</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,8)" >8</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,2)" >2</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,9)" >9</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,3)" >3</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,10)" >10</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,4)" >4</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,11)" >11</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,5)" >5</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,12)" >12</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="object_choose(this,6)" >6</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" style="background: #2bb26a;color: #FFF" onclick="object_choose(this,\'\')" >所有年级</div>' +
                    '</div>' +
                    '</div>';
                break;
            case '3':
                html = '<div class="row" style="width: 90%;margin: 100px auto 0;">' +
                    '<div class="col-xs-12">' +
                        '<button onclick="search_time(demo2,\'zjw\')" id="demo2"  class="btn mui-btn mui-btn-block zjw">选择开始日期</button>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                        '<button onclick="search_time(demo3,\'zjw2\')" id="demo3"  class="btn mui-btn mui-btn-block zjw2">选择结束日期</button>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                        '<div class="my-xs-6 type_choose" style="background: #2bb26a;color: #FFF" onclick="time_choose(\'\',\'\')" >不限时间</div>' +
                    '</div>' +
                    '</div>';
                break;
            case '4':
                html = '<div class="row" style="width: 90%;margin: 130px auto 0;">' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(this,1)">1~5000$</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(this,2)" >5001~10000$</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(this,3)" >10001~20000$</div>' +
                    '</div>' +
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(this,4)" >20001$以上</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" style="background: #2bb26a;color: #FFF" onclick="price_choose(this,\'\')" >不限金额</div>' +
                    '</div>' +
                    '</div>';
                break;
            case '5':
                html = '<div class="row" style="width: 90%;margin: 25px auto 0;">' +
                    '<div class="col-xs-12">' +
                        '<div class="my-xs-6 type_choose" style="background: #2bb26a;color: #FFF" onclick="state_choose(this,\'\')" >所有地区</div>' +
                    '</div>' +
                        <?php foreach($state as $v):?>
                    '<div class="col-xs-6">' +
                    '<div class="my-xs-6 type_choose" onclick="price_choose(this,1)"><?=$v['name_cn']?></div>' +
                    '</div>' +
                        <?php endforeach;?>
                    '</div>';
                break;
            case '6':
                html = '<div class="row" style="width: 50%;margin: 180px auto 0;">' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="isstay_choose(this,2)">走读</div>' +
                    '</div>' +
                    '<div class="col-xs-12">' +
                    '<div class="my-xs-6 type_choose" onclick="isstay_choose(this,1)">住宿</div>' +
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
        if(url.indexOf('?')>0 && url.indexOf('type=')<0){
            location.href = url +'&type='+id;
        }else if(url.indexOf('?')>0 && url.indexOf('type=')>0 && url.indexOf('&')>0){
            var a = url.indexOf('type=');
            var b = url.substring(a+5)
            var n1 = url.substring(0,a+5)+id;
            var c = b.indexOf('&');
            var n2 = c>0?b.substring(c):'';
            var n = n1+n2;
            location.href = n;
        }else{
            location.href ='/web/SummerMore?type='+id;
        }
    }
    function object_choose(obj,id){
        if(url.indexOf('?')>0 && url.indexOf('object=')<0){
            location.href = url +'&object='+id;
        }else if(url.indexOf('?')>0 && url.indexOf('object=')>0 && url.indexOf('&')>0){
            var a = url.indexOf('object=');
            var b = url.substring(a+7)
            var n1 = url.substring(0,a+7)+id;
            var c = b.indexOf('&');
            var n2 = c>0?b.substring(c):'';
            var n = n1+n2;
            location.href = n;
        }else{
            location.href ='/web/SummerMore?object='+id;
        }
    }
    function price_choose(obj,id){
        if(url.indexOf('?')>0 && url.indexOf('prices=')<0){
            location.href = url +'&prices='+id;
        }else if(url.indexOf('?')>0 && url.indexOf('prices=')>0 && url.indexOf('&')>0){
            var a = url.indexOf('prices=');
            var b = url.substring(a+7)
            var n1 = url.substring(0,a+7)+id;
            var c = b.indexOf('&');
            var n2 = c>0?b.substring(c):'';
            var n = n1+n2;
            location.href = n;
        }else{
            location.href ='/web/SummerMore?prices='+id;
        }
    }
    function isstay_choose(obj,id){
        if(url.indexOf('?')>0 && url.indexOf('isstay=')<0){
            location.href = url +'&isstay='+id;
        }else if(url.indexOf('?')>0 && url.indexOf('isstay=')>0 && url.indexOf('&')>0){
            var a = url.indexOf('isstay=');
            var b = url.substring(a+7)
            var n1 = url.substring(0,a+7)+id;
            var c = b.indexOf('&');
            var n2 = c>0?b.substring(c):'';
            var n = n1+n2;
            location.href = n;
        }else{
            location.href ='/web/SummerMore?isstay='+id;
        }
    }
    function time_choose(start,end){
        if(url.indexOf('?')>0 && url.indexOf('start=')<0){
            location.href = url +'&start='+start + '&end='+end;
        }else if(url.indexOf('?')>0 && url.indexOf('start=')>0 && url.indexOf('&')>0){

            var a = url.indexOf('start=');
            var url1 = url.substring(0,a);
            var url2 = url.substring(a+31);
            var n = url1 + 'start=' +start + '&end='+end + url2;
            location.href = n;
        }else{
            location.href ='/web/SummerMore?start='+start + '&end='+end;
        }
    }



    function search_time(id,dom){
        var a = $('.mui-active');
        if(a.length>1){
            for(var i=1;i< a.length;i++){
                a[i].remove();
            }
        }
        var btns = mui('.'+dom);
        btns.each(function(i,btn){

//            btn.addEventListener('tap',function(){

                var dtPicker = new mui.DtPicker({
                    "type":"date","beginYear":2017,"endYear":2018
                });
                dtPicker.show(function(rs) {
                    $(id).html(rs.value);
                    var start = $('.zjw').html();
                    var end = $('.zjw2').html();
                    if(start != '选择开始日期' && end != '选择结束日期'){
                        if(end < start){
                            layer.msg('结束日期必须大于开始日期');
                            return false;
                        }
                        time_choose(start,end);
                    }
                    dtPicker.dispose();
                });
//            });
        });
    }





</script>
