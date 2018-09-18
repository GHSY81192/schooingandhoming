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
    <h1 class="mui-center mui-title">我的消息</h1>
</div>
<?php
if(strstr($user['head_image'],'http')){
    $face = $user['head_image'];
}else{
    $face = '/upload/'.get_filepath_by_route_id(@$user['id'],@$user['head_image'],5);
}
?>
<div class="mui-content">
    <div class="mui-row" style="margin: 10px">
        <div class="mui-col-xs-2"><img class="user_head" src="<?=$face?>" alt=""></div>
        <div class="mui-col-xs-9 msg_box">
            <span class="glyphicon glyphicon-triangle-left user_msg" aria-hidden="true"></span>
            <span ><?=$data['old_data']?></span>
        </div>
    </div>
    <div class="mui-row" style="margin: 10px">
        <div class="mui-col-xs-1"></div>
        <div class="mui-col-xs-9 msg_box2">
            <span class="glyphicon glyphicon-triangle-right user_msg_r" aria-hidden="true"></span>
            <span><?=$data['content']?></span>
        </div>
        <div class="mui-col-xs-2" style="text-align: right"><img class="user_head" src="/public/images/icon/sh_head.jpg" alt=""></div>
    </div>
    <?php foreach($nx as $v):?>
        <div class="mui-row" style="margin: 10px">
            <div class="mui-col-xs-2"><img class="user_head" src="<?=$face?>" alt=""></div>
            <div class="mui-col-xs-9 msg_box">
                <span class="glyphicon glyphicon-triangle-left user_msg" aria-hidden="true"></span>
                <span ><?=$v['message']?></span>
            </div>
        </div>
        <?php foreach($answer as $v2):?>
            <?php if($v['id'] == $v2['replyId']): ?>
                <div class="mui-row" style="margin: 10px">
                    <div class="mui-col-xs-1"></div>
                    <div class="mui-col-xs-9 msg_box2">
                        <span class="glyphicon glyphicon-triangle-right user_msg_r" aria-hidden="true"></span>
                        <span><?=$v2['content']?></span>
                    </div>
                    <div class="mui-col-xs-2" style="text-align: right"><img class="user_head" src="/public/images/icon/sh_head.jpg" alt=""></div>
                </div>
            <?php endif;?>
        <?php endforeach;?>
    <?php endforeach;?>


</div>
<button type="button" onclick="_continue_question('<?=$data['old_id']?>')" class="mui-btn mui-btn-success mui-btn-block foot_fix_box">我还有问题</button>


<script src="/public/js/mui/js/mui.min.js"></script>
</body>
<script>
    $('.mui-icon-left-nav').click(function(){
        location.href = '/mobile/home/MyMessage';
    });

    function _continue_question(id){
        layer.prompt({
            formType: 2,
            value: '',
            title: '请输入您的问题',
//            area: ['100%', '150px'] //自定义文本域宽高
        }, function(value, index, elem){
            $.post('/mobile/Home/continue_question',{id:id,value:value},function (data){

                if(data.status === 888){
                    layer.alert('提交成功',function(){
                        layer.closeAll();
                        location.reload();
                    })
                }
            },'json')

        });
    }
</script>
</html>