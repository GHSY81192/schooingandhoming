<!DOCTYPE html>
<html class="ui-page-login">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>Schooling and Homing</title>
    <link href="/public/css/mui/css/mui.min.css" rel="stylesheet" />
    <link href="/public/css/mui/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/public/css/mui/css/feedback-page.css" />
    <link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" href="/public/css/mobile/usercenter.css">
    <script type="text/javascript" src="/public/bootstrap/js/jquery.min.js"></script>
    <script src="/public/layer/layer.js"></script>


</head>
<style>
    .mui-content{background: #fbfbfb}
</style>
<body>
<div class="mui-navbar-inner mui-bar mui-bar-nav">
    <button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
        <span class="mui-icon mui-icon-left-nav"></span>
    </button>
    <h1 class="mui-center mui-title">我的订制</h1>
</div>
<div class="mui-content">
    <div class="smallTit TitBox">我的住家需求</div>
    <div class="mui-row mB">
        <div class="mui-col-xs-4 list_line2">订单编号：</div>
        <div class="mui-col-xs-8 list_line2"><?=$order_id?></div>
        <div class="mui-col-xs-4 list_line2">需求类型：</div>
        <div class="mui-col-xs-8 list_line2">住家需求</div>
        <div class="mui-col-xs-4 list_line2">提交时间：</div>
        <div class="mui-col-xs-8 list_line2"><?=$create_time?></div>
        <div class="mui-col-xs-4 list_line2">订单状态：</div>
        <div class="mui-col-xs-8 list_line2"><?=$status=='0'?'等待初审':'初审通过'?></div>
        <div class="mui-col-xs-4 list_line2">所在地区：</div>
        <div class="mui-col-xs-8 list_line2"><?=$city?></div>
        <div class="mui-col-xs-4 list_line2">房主使用语言：</div>
        <div class="mui-col-xs-8 list_line2"><?=$language?></div>
        <div class="mui-col-xs-4 list_line2">预算范围：</div>
        <div class="mui-col-xs-8 list_line2"><?=$range_start?>到<?=$range_end?></div>
        <div class="mui-col-xs-4 list_line2">申请人姓名：</div>
        <div class="mui-col-xs-8 list_line2"><?=$name?></div>
        <div class="mui-col-xs-4 list_line2">联系电话：</div>
        <div class="mui-col-xs-8 list_line2"><?=$phone?></div>
        <div class="mui-col-xs-4 list_line2">电子邮箱：</div>
        <div class="mui-col-xs-8 list_line2"><?=$email?></div>
    </div>
</div>

<script src="/public/js/mui/js/mui.min.js"></script>
</body>
<script>
    $('.mui-icon-left-nav').click(function(){
        location.href = '/mobile/home/MyRequireList';
    });

</script>
</html>