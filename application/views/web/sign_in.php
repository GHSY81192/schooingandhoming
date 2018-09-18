<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=lang('Sign_in')?></title>
    <link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap.min.css" media="all">
    <script type="text/javascript" src="/public/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="/public/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div style="margin: 20px auto;width: 500px">
    <div class="bs-example" data-example-id="simple-nav-justified">
        <ul class="nav nav-pills">
            <li style="cursor: pointer" role="presentation" class="active reg_email"><a><?php echo lang('Registered_mail')?></a></li>
            <li style="cursor: pointer;<?=lang('is_en')?'display:none':''?>" role="presentation" class="reg_tel"><a><?php echo lang('Registered_mobile')?></a></li>
        </ul>
    </div>

    <form class="form-horizontal email-form" style="margin: 10px;" action="/web/register" method="post">
        <div class="form-group" style="margin: 10px 0">
            <label for="inputEmail3" style="padding: 0" class="col-xs-2"><?=lang('sign_in_email')?>:</label>
            <div class="col-xs-8" style="padding: 0">
                <input type="email" class="form-control" id="userEmail" name="email" placeholder="">
                <div class="notice mailN hide" style="color: red">
                    <i class="glyphicon glyphicon-exclamation-sign"></i> <?=lang('sign_in_email_error')?>
                </div>
            </div>
        </div>



        <div class="form-group" style="margin: 10px 0 0 0">
            <label for="inputEmail3" style="padding: 0" class="col-xs-2"><?php echo lang('login_password')?>:</label>
            <div class="col-xs-8" style="padding: 0">
                <input type="password" class="form-control" name="mpwd" placeholder="<?=lang('please_enter_password')?>">
                <div class="notice pwdN hide" style="color: red">
                    <i class="glyphicon glyphicon-exclamation-sign"></i> <?=lang('password_different')?>
                </div>
            </div>
        </div>
        <div class="form-group" style="margin: 10px 0 0 0">
            <label for="inputEmail3" style="padding: 0" class="col-xs-2"><?=lang('confirm_password')?>:</label>
            <div class="col-xs-8" style="padding: 0">
                <input type="password" class="form-control" name="mrepwd" placeholder="<?=lang('please_confirm_password')?>">
                <div class="notice pwdN hide" style="color: red">
                    <i class="glyphicon glyphicon-exclamation-sign"></i> <?=lang('password_different')?>
                </div>
            </div>
        </div>
        <!--        <input type="submit" value="注册">-->
        <button type="submit" class="btn btn-default" id="email_btn" style="margin-top: 20px"><?=lang('Sign_in')?></button>

    </form>

    <form class="form-horizontal tel-form" style="margin: 10px;display: none" action="/web/register" method="post">
        <div class="form-group" style="margin: 10px 0">
            <label for="inputEmail3" style="padding: 0" class="col-xs-2"><?=lang('Mobile')?>+86:</label>
            <div class="col-xs-8" style="padding: 0">
                <input type="number" class="form-control" id="userPhone" placeholder="" name="tel">
                <span style="color: red"><?php echo $info?$info:''; ?></span>
                <div class="notice phoneN hide" style="color: red">
                    <i class="glyphicon glyphicon-exclamation-sign"></i> <?=lang('sign_in_phone_error')?>
                </div>
            </div>
        </div>

        <div class="form-group" style="margin: 0">
            <label for="inputEmail3" style="padding: 0" class="col-xs-2"><?=lang('verify_code')?>:</label>
            <div class="col-xs-8" style="padding: 0">
                <input type="text" class="form-control" style="position: relative" name="code"  placeholder="<?=lang('enter_verify_code')?>">
                <input style="position: absolute;top: 0;right: 0;height: 34px" class="login-getcode" value="<?php echo lang('login_code_btn_message') ?>" type="button">
                <div class="notice codeN hide" style="color: red">
                    <i class="glyphicon glyphicon-exclamation-sign"></i> <?=lang('verify_code_error')?>
                </div>
            </div>
        </div>

        <div class="form-group" style="margin: 10px 0 0 0">
            <label for="inputEmail3" style="padding: 0" class="col-xs-2"><?=lang('login_password')?>:</label>
            <div class="col-xs-8" style="padding: 0">
                <input type="password" class="form-control"  placeholder="<?=lang('please_enter_password')?>" name="pwd">
                <div class="notice pwdN hide" style="color: red">
                    <i class="glyphicon glyphicon-exclamation-sign"></i><?=lang('login_password_error')?>
                </div>
            </div>
        </div>
        <div class="form-group" style="margin: 10px 0 0 0">
            <label for="inputEmail3" style="padding: 0" class="col-xs-2"><?=lang('confirm_password')?>:</label>
            <div class="col-xs-8" style="padding: 0">
                <input type="password" class="form-control"  placeholder="<?=lang('please_confirm_password')?>" name="repwd">
                <div class="notice repwdN hide" style="color: red">
                    <i class="glyphicon glyphicon-exclamation-sign"></i> <?=lang('login_password_error')?>
                </div>
            </div>
        </div>

                <button type="submit" class="btn btn-default" id="tel_btn" style="margin-top: 20px"><?=lang('Sign_in')?></button>


    </form>





</div>

<script>
    var login_regPhone = /1[3|4|5|7|8|][0-9]{9}/;
    var login_regCode = /[0-9]{4}/;
    var login_regEmail = /^([a-zA-Z0-9._-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
    var login_isSend = false;
    $(document).ready(function (e) {
        //点击发送验证码
        $(".login-getcode").click(function(){
            if(login_isSend){
                return false;
            }
            var userPhone = $("#userPhone").val();
            if (!login_regPhone.test(userPhone)) {
                $('.phoneN').removeClass('hide');
                return false;
            }else{
                $.post('/web/sendAuthCode',{'mobile':userPhone},function(data){
                    if(data.status){
                        login_isSend = true;
                        login_time();
                    }else{
                        alert(data.msg);
                    }
                },'json')
            }

        });

    });
    //倒计时
    var login_wait = 60;
    function login_time() {
        if (login_wait == 0) {
            $(".login-getcode").removeAttr("disabled").val('发送验证码');
            login_isSend = false;
            login_wait = 60;
        } else {
            html = "重新发送(" + login_wait + ")";
            $(".login-getcode").attr("disabled","disabled").val(html);
            login_wait--;
            setTimeout(function() {
                    login_time()
                },
                1000);
        }
    }



    $('.reg_email').click(function(){
        $('.tel-form').css('display','none');
        $('.email-form').css('display','block');
        $('.reg_tel').removeClass('active');
        $(this).addClass('active');
    });


    $('.reg_tel').click(function(){
        $('.tel-form').css('display','block');
        $('.email-form').css('display','none');
        $('.reg_email').removeClass('active');
        $(this).addClass('active');
    });


    $('#email_btn').click(function(){
        var email = $('input[name=email]').val();
        var pwd = $('input[name=mpwd]').val();
        var repwd = $('input[name=mrepwd]').val();
        if (!login_regEmail.test(email)) {
            $('.mailN').removeClass('hide');
            return false;
        }
        if(pwd != repwd){
            $('.pwdN').removeClass('hide');
            return false;
        }
        this.form.submit();
    })


    $('#tel_btn').click(function(){
        var tel = $('input[name=tel]').val();
        var code = $('input[name=code]').val();
        var pwd = $('input[name=pwd]').val();
        var pwd2 = $('input[name=repwd]').val();
        if (!login_regPhone.test(tel)) {
            $('.phoneN').removeClass('hide');
            return false;
        }
        if (!login_regCode.test(code)) {
        	$('.codeN').removeClass('hide');
            return false;
        }
        if(pwd != pwd2){
            $('.pwdN').removeClass('hide');
            $('.repwdN').removeClass('hide');
            return false;
        }
        this.form.submit();

    })
</script>
</body>
</html>