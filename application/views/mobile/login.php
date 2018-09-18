<!DOCTYPE html>
<html class="ui-page-login">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <link href="/public/css/mui/css/mui.min.css" rel="stylesheet" />
    <link href="/public/css/mui/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/public/css/mui/css/feedback-page.css" />
    <script type="text/javascript" src="/public/bootstrap/js/jquery.min.js"></script>
    <script src="/public/layer/layer.js"></script>

</head>

<body>
<div class="mui-navbar-inner mui-bar mui-bar-nav">
    <button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
        <span class="mui-icon mui-icon-left-nav"></span>
    </button>
    <button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-right">
        <span class="signIn" style="padding-right: 5px">注册</span>
    </button>
</div>
<div class="mui-content">
    <h3 class="zjw-h3">SH账号登录</h3>
    <form class="mui-input-group" id="loginForm" method="post" action="/mobile/common/user_check_login">
        <div class="mui-input-row">
            <input type="text" name="user" class="mui-input-clear" placeholder="国内手机号/电子邮箱">
        </div>
        <div class="mui-input-row">
            <input type="password" name="password"  placeholder="登录密码">
        </div>
        <input type="hidden" name="type" value="<?php echo $type?$type:'' ?>">
        <input type="hidden" name="lessonId" value="<?php echo $lessonId?$lessonId:'' ?>">
        <div class="mui-content-padded">
            <input id='login' type="button" value="登 录" class="mui-btn mui-btn-block mui-btn-primary">
            <div class="link-area"><a id='reg' href="/mobile/common/SMS_login?type=<?php echo $type?$type:'' ?>&lessonId=<?php echo $lessonId?$lessonId:'' ?>" style="color: #5a5a5a;float: left">手机动态密码登录</a>  <a href="/mobile/common/login" style="color: #5a5a5a;float: right" id='forgetPassword'>微信登录</a>
            </div>
        </div>
    </form>

</div>
<script src="/public/js/mui/js/mui.min.js"></script>
<script src="/public/js/mui/js/mui.enterfocus.js"></script>
<script src="/public/js/mui/js/app.js"></script>
<script>
    $(function(){
        var msg = "<?=$msg?>";
        if(msg){
            layer.alert(msg);
        }
    })

    $('#login').click(function(){
        var user = $('input[name=user]').val();
        var pwd = $('input[name=password]').val();
        if(!user){
            layer.alert('请输入账号');
            return false;
        }
        if(!pwd){
            layer.alert('请输入密码');
            return false;
        }
        $('#loginForm').submit();
    });

    $('.signIn').click(function(){
        document.location.href = '/mobile/common/sign_in'
    })
</script>
</body>

</html>