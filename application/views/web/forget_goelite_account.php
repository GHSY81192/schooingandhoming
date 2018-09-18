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
    <h3 style="text-align: center;margin-bottom: 30px">找回账号</h3>
    <div class="form-group">
        <label for="exampleInputPassword1"><i style="color: red">*&nbsp;</i>您申请的电话 <span class="tel_error" style="color: red"></span></label>
        <input type="text" class="form-control" id="tel" name="tel" placeholder="" value="<?=$phone?>">
    </div>

    <button type="button" class="btn btn-success">找回账号</button>
</form>
<script src="/public/js/is_weixin.js"></script>
<script>
    $('.btn-success').click(function(){
        var tel = $('input[name=tel]').val();
        var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;

        if(!myreg.test(tel))
        {
            $('.tel_error').html('手机号码有误');
            return false;
        }else{
            $('.tel_error').html('');
        }


        $.ajax({
            url:'/mobile/common/get_forget_goelite_consult',
            data:{tel:tel},
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