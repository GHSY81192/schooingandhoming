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
    <div class="smallTit TitBox">我提交的需求</div>
    <?php foreach($list as $v):?>
    <div class="list-Box mui-row">
        <div class="mui-col-xs-7 list_line">
            订单号：<?=$v['order_id']?>
        </div>
        <div class="mui-col-xs-5 list_line">
            需求类型：住家需求
        </div>
        <div class="mui-col-xs-7 list_line">
            提交时间：<?=$v['create_time']?>
        </div>
        <div class="mui-col-xs-5 list_line">
            状态：<?=$v['status']=='0'?'等待初审':'初审通过'?>
        </div>
        <div class="a_view">
            <a href="/mobile/home/MyRequire/<?=$v['id']?>">查看详情</a>
        </div>

    </div>
    <?php endforeach;?>
</div>

<script src="/public/js/mui/js/mui.min.js"></script>
</body>
<script>
    $('.mui-icon-left-nav').click(function(){
        location.href = '/mobile/home/';
    });

</script>
</html>