<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SchoolingandHoming</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap.min.css" media="all">
    <script type="text/javascript" src="/public/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="/public/bootstrap/js/bootstrap.min.js"></script>
    <script src="/public/layer/layer.js"></script>
</head>
<body>

<form style="margin: 20px 50px" action="">
    <h3 style="text-align: center;margin-bottom: 30px">免费申请试用账号</h3>
    <div class="form-group">
        <label for="exampleInputEmail1"><i style="color: red">*&nbsp;</i>姓名 <span class="name_error" style="color: red"></span></label>
        <input type="text" class="form-control" placeholder="" name="name">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1"><i style="color: red">*&nbsp;</i>电话 <span class="tel_error" style="color: red"></span></label>
        <input type="text" class="form-control" id="tel" name="tel" placeholder="" value="<?=$phone?>">
    </div>

    <div class="form-group" id="verify" style="position: relative">
        <label for="exampleInputPassword1"><i style="color: red">*&nbsp;</i>验证码 <span class="code_error" style="color: red"></span></label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="code" placeholder="">
        <input class="login-getcode" value="获取验证码" type="button" style="position: absolute;right: 0;bottom: 0;height: 34px">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1"><i style="color: red">*&nbsp;</i>邮箱 <span class="email_error" style="color: red"></span></label>
        <input type="text" class="form-control" id="email" name="email" placeholder="" value="<?=$phone?>">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1"><?=$html_text?></label>
        <textarea class="form-control" name="message" rows="3" placeholder=""></textarea>
    </div>
    <button type="button" class="btn btn-success">申请</button>
    <a href="/mobile/common/forget_goelite_account" style="float: right" class="forget_account btn btn-danger" onclick="">我忘记账号了</a>
</form>
<script src="/public/js/is_weixin.js"></script>
<script>
    var login_regPhone = /1[3|4|5|7|8|][0-9]{9}/;
    var regMail = /^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/;
    var login_isSend = false;
    //点击发送验证码
    $(".login-getcode").click(function(){
        if(login_isSend){
            return false;
        }
        var userPhone = $("#tel").val();
        if (!login_regPhone.test(userPhone)) {
            $('.tel_error').html('手机号码有误');
            return false;
        }else{
            $.post('/mobile/common/sendAuthCode',{'mobile':userPhone},function(data){
                if(data.status){
                    login_isSend = true;
                    login_time();
                }else{
                    alert(data.msg);
                }
            },'json')
        }

    });



    $('.btn-success').click(function(){
        var name = $('input[name=name]').val();
        var tel = $('input[name=tel]').val();
        var email = $('input[name=email]').val();
        var code = $('input[name=code]').val();
        var message = $('textarea[name=message]').val();

        if(!name || !tel || !email){
            if(!name){
                $('.name_error').html('请填写姓名');
            }
            if(!tel){
                $('.tel_error').html('请填写手机');
            }
            if(!email){
                $('.email_error').html('请填写邮箱');
            }
            return false;
        }
        var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;

        if(!myreg.test(tel))
        {
            $('.tel_error').html('手机号码有误');
            return false;
        }else{
            $('.tel_error').html('');
        }

        var login_regCode = /[0-9]{4}/;
        if(code){
            if(!login_regCode.test(code)){
                $('.code_error').html('验证码有误');
                return false;
            }else{
                $('.code_error').html('');
            }
        }

        if(!regMail.test(email)){
            $('.email_error').html('邮箱格式有误');
            return false;
        }else{
            $('.email_error').html('');
        }


        var is_weixin = isWeiXin();
        is_weixin = is_weixin?1:0;

        $.ajax({
            url:'/mobile/common/get_goelite_consult',
            data:{name:name,tel:tel,message:message,email:email,code:code},
            dataType:'json',
            type:'POST',
            success:function(data){
                if(data.status === 888){
                    layer.alert('您的试用账号：'+data.msg+'<br />密码：123456',function(){
                        var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                        parent.layer.close(index); //再执行关闭
                        WeixinJSBridge.call('closeWindow');
                    });
                }else{
                    layer.msg(data.msg);
                }
            }
        });
    });

    $('input[name=name]').change(function(){
        if($(this).val()){
            $('.name_error').html('');
        }
    });
    $('input[name=tel]').change(function(){
        if($(this).val()){
            $('.tel_error').html('');
        }
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



</script>
</body>
</html>