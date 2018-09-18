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
    <script src="/public/layer/layer.js"></script>

</head>

<body>
<div class="mui-navbar-inner mui-bar mui-bar-nav">
    <button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
        <span class="mui-icon mui-icon-left-nav"></span>
    </button>
    <button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-right">
        <span class="signIn" style="padding-right: 5px">手机注册</span>
    </button>
</div>
<div class="mui-content">
    <h3 class="zjw-h3">邮箱注册</h3>
    <form class="mui-input-group" id="loginForm" method="post" action="/mobile/common/user_check_login">
        <div class="mui-input-row">
            <input type="text" name="email" class="mui-input-clear" placeholder="电子邮箱">
        </div>
        <div class="mui-input-row">
            <input type="password" name="password"  placeholder="登录密码">
        </div>
        <div class="mui-input-row">
            <input type="password" name="password2"  placeholder="确认密码">
        </div>
        <div class="mui-content-padded">
            <input id='login' type="button" value="注 册" class="mui-btn mui-btn-block mui-btn-primary signInbtn">

        </div>
    </form>

</div>
<script src="/public/js/mui/js/mui.min.js"></script>

<script>
    $(function(){
        var msg = "<?=$msg?>";
        if(msg){
            layer.alert(msg);
        }
    })
    var login_regEmail = /^([a-zA-Z0-9._-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
    $('.signInbtn').click(function(){
        var email = $('input[name=email]').val();
        var pwd = $('input[name=password]').val();
        var pwd2 = $('input[name=password2]').val();
        if (!login_regEmail.test(email)) {
            layer.alert('邮箱错误！');
            return false;
        }
        var checkpwd = CheckPassWord(pwd);
        if(checkpwd === 88){
            layer.alert('密码长度不能少于8位',{icon:2,title:'信息'});
            return false;
        }
        if(checkpwd === 99){
            layer.alert('密码必须包含数字和字母',{icon:2,title:'信息'});
            return false;
        }
        if(pwd != pwd2){
            layer.alert('2次密码不同！');
            return false;
        }
        $.post('/mobile/common/register',{email:email,pwd:pwd},function(data){
            if(data.status == 555){
                layer.alert('邮箱已注册',{icon:2,title:'信息'});
                return false;
            }
            if(data.status == 100){
                layer.alert('注册成功！进入邮箱激活账号',{icon:1,title:'信息'});
                return false;
            }
        },'json')



    });

    function CheckPassWord(password) {//密码必须包含数字和字母
        var str = password;
        if (str == null || str.length < 8) {
            return 88;
        }
        var reg = new RegExp(/^(?![^a-zA-Z]+$)(?!\D+$)/);
        if (!reg.test(str))
            return 99;
    }

</script>
</body>

</html>