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
    <h1 class="mui-center mui-title">账号设置</h1>
</div>
<div class="mui-content">
    <div class="mui-card">
        <ul class="mui-table-view">
            <li class="mui-table-view-cell mui-collapse mui-active">
                <a class="mui-navigate-right smallTit" href="#">修改密码</a>
                <div class="mui-collapse-content">
                    <form class="group">
                        <div class="mui-row mui-row-list">
                            <lable class="mui-col-xs-4 mui-4">旧密码</lable>
                            <input type="password" name="pwd" style="width: 50%" class="mui-col-xs-6">
                        </div>
                        <div class="mui-row mui-row-list">
                            <lable class="mui-col-xs-4 mui-4">新密码</lable>
                            <input type="password" name="new_pwd" style="width: 50%" class="mui-col-xs-6">
                        </div>
                        <div class="mui-row mui-row-list settingType">
                            <lable class="mui-col-xs-4 mui-4" style="height: 25px"></lable>
                            <span  class="mui-col-xs-7">不少于8个字符,且包含数字和字母</span>
                        </div>
                        <div class="mui-row mui-row-list" style="padding-top: 0">
                            <lable class="mui-col-xs-4 mui-4">确认密码</lable>
                            <input name="re_pwd" type="password" style="width: 50%" class="mui-col-xs-6">
                        </div>
                        <div class="mui-row mui-row-list settingType">
                            <lable class="mui-col-xs-4 mui-4"></lable>
                            <span  class="mui-col-xs-7">请保持与上面一致</span>
                        </div>
                        <div class="logout_Box">
                            <button type="button" class="btn btn-primary changePWD">更改密码</button>
                        </div>
                    </form>
                </div>
            </li>
            <li class="mui-table-view-cell mui-collapse">
                <a class="mui-navigate-right smallTit" href="#">付款方式</a>
                <div class="mui-collapse-content">
                    <form class="group">
                        <p class="paymentTit">选中一种默认支付方式</p>
                        <div class="mui-row payment_box" style="padding: 0">
                            <div class="mui-col-xs-4 mui-row P-imgbox">
                                <img class="AliPay" src="/public/images/mobile/user/<?=$payment==1?'AliPay.png':'AliPay-N.png'?>" >
                                <div class="mui-input mui-radio">
                                    <input name="payment" <?=$payment==1?'checked':''?> value="1" class="pay_radio" type="radio">
                                </div>
                            </div>
                            <div class="mui-col-xs-4 mui-row P-imgbox">
                                <img class="weichatPay" src="/public/images/mobile/user/<?=$payment==2?'weichatPay.png':'weichatPay-N.png'?>" >
                                <div class="mui-input mui-radio">
                                    <input name="payment" <?=$payment==2?'checked':''?> value="2" class="pay_radio" type="radio">
                                </div>
                            </div>
                            <div class="mui-col-xs-4 mui-row P-imgbox">
                                <img class="UPcash" src="/public/images/mobile/user/<?=$payment==3?'UPcash.png':'UPcash-N.png'?>" >
                                <div class="mui-input mui-radio">

                                    <input name="payment" <?=$payment==3?'checked':''?> value="3" class="pay_radio" type="radio">
                                </div>
                            </div>


                        </div>


                        <div class="logout_Box2">
                            <button type="button" class="btn btn-primary payment_btn">确认</button>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </div>



</div>

<script src="/public/js/mui/js/mui.min.js"></script>
</body>
<script>
    $('.mui-icon-left-nav').click(function(){
        location.href = '/mobile/home/';
    });

    $('.pay_radio').click(function(){
        var name = $(this).parents('.P-imgbox').find('img').attr('class');
        var AliPay = '/public/images/mobile/user/AliPay.png';
        var AliPay_n = '/public/images/mobile/user/AliPay-N.png';
        var weichatPay = '/public/images/mobile/user/weichatPay.png';
        var weichatPay_n = '/public/images/mobile/user/weichatPay-N.png';
        var UPcash = '/public/images/mobile/user/UPcash.png';
        var UPcash_n = '/public/images/mobile/user/UPcash-N.png';
        if(name == 'AliPay'){
            $('.AliPay').attr('src',AliPay);
            $('.weichatPay').attr('src',weichatPay_n);
            $('.UPcash').attr('src',UPcash_n);
        }
        if(name == 'weichatPay'){
            $('.AliPay').attr('src',AliPay_n);
            $('.weichatPay').attr('src',weichatPay);
            $('.UPcash').attr('src',UPcash_n);
        }
        if(name == 'UPcash'){
            $('.AliPay').attr('src',AliPay_n);
            $('.weichatPay').attr('src',weichatPay_n);
            $('.UPcash').attr('src',UPcash);
        }
    });

    $('.changePWD').click(function(){
        var pwd = $('input[name=pwd]').val();
        var new_pwd = $('input[name=new_pwd]').val();
        var re_pwd = $('input[name=re_pwd]').val();
        if(new_pwd != re_pwd){
            layer.alert('2次密码输入不同',{icon:2,title:'信息'});
            return false;
        }
        var check_pwd = CheckPassWord(new_pwd);
        if(check_pwd === 88){
            layer.alert('密码长度不能少于8位',{icon:2,title:'信息'});
            return false;
        }
        if(check_pwd === 99){
            layer.alert('密码必须包含数字和字母',{icon:2,title:'信息'});
            return false;
        }
        $.post('/home/changePwd',{old_pwd:pwd,new_pwd:new_pwd},function(data){
            if(data.status == 488){
                layer.alert(data.msg,{icon:2,title:'信息'},function(){
                    location.reload();
                });
                return false;
            }
            if(data.status == 1){
                layer.alert(data.msg,{icon:1,title:'信息'},function(){
                    location.reload();
                });
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

    $('.payment_btn').click(function(){
        var payment = $('input[name=payment]:checked').val();
        $.post('/home/setPayment',{payment:payment},function(data){
            if(data.status == 1){
                layer.alert(data.msg,{icon:1,title:'信息'});
                return false;
            }
        },'json')
    });

</script>
</html>