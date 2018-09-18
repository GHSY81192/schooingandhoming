<!DOCTYPE html>
<html class="ui-page-login">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>Schooling and Homing</title>
    <link href="/public/css/mui/css/mui.min.css" rel="stylesheet" />
    <link href="/public/css/mui/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/public/css/mui/css/feedback-page.css" />
    <script type="text/javascript" src="/public/bootstrap/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap.min.css" media="all">
    <script src="/public/layer/layer.js"></script>
    <link rel="stylesheet" href="/public/css/web/lesson.css">
    <link rel="stylesheet" href="/public/css/mobile/usercenter.css">
</head>

<body>
<div class="mui-navbar-inner mui-bar mui-bar-nav">
    <button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
        <span class="mui-icon mui-icon-left-nav"></span>
    </button>
    <h1 class="mui-center mui-title"><?=lang('My_Program')?></h1>
</div>
<div class="mui-content">
    <ul class="lesson_nav mui-row">
        <li onclick="document.location.href='/mobile/home/mylessons/1';" class="navli mui-col-xs-4 <?=$status==1?'zjw_active':''?>"><?=lang('To_be_Paid')?></li>
        <li onclick="document.location.href='/mobile/home/mylessons/8';" class="navli mui-col-xs-4 <?=$status==8?'zjw_active':''?>"><?=lang('Paid')?></li>
        <li class="navli mui-col-xs-4"><?=lang('Closed')?></li>
    </ul>
    <div class="list_box" style="border: 0;padding-top: 10px">
        <?php foreach ($order as $v):?>
            <div class="row list2" style="margin: 0">
                <img class="col-xs-3 listLesson_img" src="<?=$v['img']?>" alt="">
                <div class="col-xs-9 MlistLessonBox">
                    <h5 class="MlistLesson_name"><?=$v['subject']?></h5>
                    <p class="MlistLesson_author" style="font-size: 12px;margin: 5px 0 3px"><?=$v['author']?$v['author']:''?></p>
                    <p class="MlistLesson_price"><?=$status==1?'待付':'已付'?>￥<?=$v['price']?><span style="color: #bdbdbd">(<?=substr($v['time'],0,10)?>)</span></p>
                    <a href="<?=$v['ahref']?>"><button class="btn btn-primary btn-xs MlistLesson_btn"><?=lang('View_Details')?></button></a>
                </div>
            </div>
            <hr />
        <?php endforeach;?>
    </div>
    <div class="list_box2"></div>
</div>

<script src="/public/js/mui/js/mui.min.js"></script>


</body>
<script>
    $('.navli').click(function(){
        $('.navli').removeClass('zjw_active');
        $(this).addClass('zjw_active');
    })

    $('.mui-icon-left-nav').click(function(){
        location.href = '/mobile/home/';
    })
</script>
</html>