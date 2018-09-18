<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SH-后台管理</title>
    <script src="/public/bootstrap/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/public/css/admin/login.css" media="all">
</head>
<body id="login-page">
<div id="main-content">
    <!-- 主体 -->
    <div class="login-body">
        <div class="login-main pr">
            <form class="login-form">
                <h3 class="welcome"><i class="login-logo"></i></h3>
                <div id="itemBox" class="item-box">
                    <div class="item">
                        <i class="icon-login-user"></i>
                        <input type="text" name="username" placeholder="请填写用户名" autocomplete="off" />
                        <input type="hidden" name="do_login" value="1" />
                    </div>
                    <span class="placeholder_copy placeholder_un">请填写用户名</span>
                    <div class="item b0">
                        <i class="icon-login-pwd"></i>
                        <input type="password" name="password" placeholder="请填写密码" autocomplete="off" />
                    </div>
                    <span class="placeholder_copy placeholder_pwd">请填写密码</span>
                </div>
                <div class="login_btn_panel">
                    <div class="login-btn" id="submit">
                        <span class="in"><i class="icon-loading"></i>登 录 中 ...</span>
                        <span class="on">登 录</span>
                    </div>
                    <div class="check-tips"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $('input[name=username]').focus();
        $('#submit').click(function(){
            var data = $('form').serialize();
            $.post('/admin/admin/login',$('form').serialize(),function(ret){
                if(ret.status){
                    window.location.href='/admin/admin/main';
                }else{
                    alert('登录失败');
                    return false;
                }
            },'json');
        });
    });;
</script>
</body>
</html>