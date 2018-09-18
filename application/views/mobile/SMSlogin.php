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
        <span style="padding-right: 5px">注册</span>
    </button>
</div>
<div class="mui-content">
    <h3 class="zjw-h3">手机动态密码登录</h3>
    <form class="mui-input-group" id="loginForm" method="post" action="/mobile/common/user_check_login">
        <div class="mui-input-row">
            <input type="text" name="userPhone" id="userPhone" class="mui-input-clear" placeholder="中国大陆手机号 +86">
                    <input type="hidden" name="type" value="<?php echo $type?$type:'' ?>">
                    <input type="hidden" name="lessonId" value="<?php echo $lessonId?$lessonId:'' ?>">
        </div>
        <div class="mui-input-row" style="position: relative">
            <input type="password" name="code"  placeholder="短信动态码">
            <input style="position: absolute;right: 0;top: 5px;color: #5376ac" class="login-getcode" value="<?php echo lang('login_code_btn_message') ?>" type="button">
        </div>
        <input type="hidden" name="type" value="<?php echo $type?$type:'' ?>">
        <input type="hidden" name="lessonId" value="<?php echo $lessonId?$lessonId:'' ?>">
        <div class="mui-content-padded">
            <input id='login' type="button" value="登 录" class="mui-btn mui-btn-block mui-btn-primary">
        </div>
    </form>

</div>
<script src="/public/js/mui/js/mui.min.js"></script>
<script src="/public/js/mui/js/mui.enterfocus.js"></script>
<script src="/public/js/mui/js/app.js"></script>
<script>
    var login_regPhone = /1[3|4|5|7|8|][0-9]{9}/;
    var login_regCode = /[0-9]{4}/;
    var login_isSend = false;

    $(".login-getcode").click(function(){
        if(login_isSend){
            return false;
        }
        var userPhone = $("#userPhone").val();
        if (!login_regPhone.test(userPhone)) {
            layer.alert('手机格式错误！');
            return false;
        }else{
            $.post('/mobile/common/sendAuthCode',{'mobile':userPhone},function(data){
                if(data.status){
                    login_isSend = true;
                    logintime();
                }else{
                    alert(data.msg);
                }
            },'json')
        }

    });

    var login_wait = 60;
    function logintime() {
        if (login_wait == 0) {
            $(".login-getcode").removeAttr("disabled").val('发送验证码');
            login_isSend = false;
            login_wait = 60;
        } else {
            html = "重新发送(" + login_wait + ")";
            $(".login-getcode").attr("disabled","disabled").val(html);
            login_wait--;
            setTimeout(function() {
                    logintime()
                },
                1000);
        }
    }



    $('#login').click(function(){
        var tel = $('input[name=userPhone]').val();
        var code = $('input[name=code]').val();
        if(!tel){
            layer.alert('请输入手机号');
            return false;
        }
        if(!code){
            layer.alert('请输入验证码');
            return false;
        }
        if (!login_regPhone.test(tel)) {
            layer.alert('手机格式错误！');
            return false;
        }
        if (!login_regCode.test(code)) {
            layer.alert('验证码错误！');
            return false;
        }


        $('#loginForm').submit();
    })



</script>
</body>

</html>