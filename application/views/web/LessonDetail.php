<link rel="stylesheet" href="/public/css/web/lesson.css">
<div id="body_box">
    <div class="main_box">
        <div class="row top_box marBottom">
            <div class="col-md-5">
                <img src="/public/images/web/lesson/images/<?=$img?>" alt="">
            </div>
            <div class="col-md-7 top_left_box">
                <h3 class="titleH3"><?=$name?></h3>
                <input type="hidden" id="lessonId" value="<?=$id?>">
                <p class="top_info_price"><b style="font: 400 24px arial;">￥</b><span id="oneprice"><?php echo $once_price?$once_price.'~'.$price:$price  ?></span></p>
                <?php if($once_price):?>
                <div class="row">
                    <div id="one" class="col-xs-4 col-md-2 classbtn">小班课程</div>
                    <div id="two" class="col-xs-4 col-md-2 classbtn" style="margin-left: 10px">1对1课程</div>
                </div>
                <?php endif; ?>
                <p class="people">目标人群</p>
                <p class="people_con"><?=$people?></p>
                <div class="bottom_box">
                    <button id="consult_btn" class="btn btn-success btn-lg consult_btn">课程咨询<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span></button>
                    <button class="btn btn-primary btn-lg buy_btn">立即购买<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span></button>
                </div>
<!--                <button class="btn btn-primary btn-lg buy_btn">立即购买</button>-->
            </div>
        </div>


        <div class="top_box">
            <h3 class="h4_tit"><span>————</span> 授课导师 <span>————</span></h3>
            <div class="class_con">
                <img height="500" src="/public/images/web/lesson/images/<?=$bigimg?>">
                <p style="margin: 0;text-align: center"><?=$author?></p>
                <?=$teacher?>
            </div>
            <h3 class="h4_tit2"><span>————</span> 课程概览 <span>————</span></h3>
            <div class="class_con2"><?=$intro_en?></div>
            <hr />
            <div class="class_con"><?=$intro?></div>

            <h3 class="h4_tit2"><span>————</span> 课程目标 <span>————</span></h3>
            <div class="class_con"><?=$aim?></div>
            <h3 class="h4_tit2"><span>————</span> 课程时间 <span>————</span></h3>
            <div class="class_con"><?=$classtime?></div>
            <h3 class="h4_tit2"><span>————</span> 课程大纲 <span>————</span></h3>
            <div class="class_con" style="margin-bottom: 30px"><?=$content?></div>
            <h3 class="h4_tit2"><span>————</span> 参考用书 <span>————</span></h3>
            <div class="class_con" style="margin-bottom: 30px">
                <div style="text-align: center">
                    <?php foreach($book as $v):?>
                    <div style="display: inline-block;margin: 0 20px">
                        <img src="/public/images/web/lesson/images/<?=$v['img']?>" height="300" alt="">
                        <p><?=$v['book_name']?></p>
                    </div>
                    <?php endforeach;?>
                </div>

            </div>



            <h3 class="h4_tit2"><span>————</span> 上课方式 <span>————</span></h3>
            <div class="class_con row" style="margin-bottom: 30px;width: 100%;padding-right: 0px"><?=$way?></div>
        </div>
    </div>
</div>

<script>
    $('.classbtn').click(function(){
        $('.classbtn').removeClass('zjwactive');
        $(this).addClass('zjwactive');
        if($(this).html()=='小班课程'){
            $('#oneprice').html('<?=$once_price?>');
        }else{
            $('#oneprice').html('<?=$price?>');
        }
    });

    $('.date_btn').click(function(){
        $('.date_btn').removeClass('zjwactive');
        $('#classNum').find('p').remove();
        $(this).addClass('zjwactive');
        var lessonId = $('#lessonId').val();
        if($(this).html()=='7月10日'){
            $('input[name=classtime]').val('7月10日');
            $.post('/web/classPeopleNum',{data:'7月10日',id:lessonId},function(data){
                if(data){
                    $('#classNum').append('<p>7月10日已有'+data.status+'人报名</p>')
                }
            },'json')
        }else{
            $('input[name=classtime]').val('8月8日');
            $.post('/web/classPeopleNum',{data:'8月8日',id:lessonId},function(data){
                if(data){
                    $('#classNum').append('<p>8月8日已有'+data.status+'人报名</p>')
                }
            },'json')
        }
    });


    $('.buy_btn').click(function(){
        var price = $('#oneprice').html();
        var lessonId = $('#lessonId').val();
        if(price.indexOf('~')>0){
            layer.alert('请选择购买套餐');
            return false;
        }
        var classtime =$('input[name=classtime]').val();
        if(classtime){
            if(classtime == 'aaa'){
                layer.alert('请选择授课日期');
                return false;
            }
            location.href="/web/checkorder?price="+price+'&lessonId='+lessonId+'&classtime='+classtime;
        }else{
            location.href="/web/checkorder?price="+price+'&lessonId='+lessonId;
        }
    });

    $('#consult_btn').click(function(){
        layer.open({
            title:'请填写相关信息',
            type: 2,
            area: ['700px', '530px'],
            fixed: false, //不固定
            maxmin: true,
            content: '/web/consult/2'
        });
    });

</script>


