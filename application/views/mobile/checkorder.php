<link rel="stylesheet" href="/public/css/web/lesson.css">
<div id="body_box">
    <div class="main_box">
        <div class="row" style="margin: 0">
            <form name='alipayment' action='/Mobile_Alipay/pagepay' method='post' id="AlipayCheckForm">
                <div class="col-md-2 check_left_box">
                    <ul class="check_ul row" >
                        <li class="col-xs-6" style="color: #5376ac;font-weight: bold">确认订单</li>
                        <li class="col-xs-6">完成支付</li>
                    </ul>
                </div>
                <div class="col-md-10 check_right_box">
                    <p>订单编号：<?=$orderID?></p>
                    <input type="hidden" name="lessonId" value="<?=$lessonId?>">
                    <input type="hidden" name="WIDout_trade_no" value="<?=$orderID?>">
                    <div class="check_tit_box"><h6>您选择的课程</h6></div>
                    <div class="check_lesson_info">
                        <p>课程名称：<span style="color: #5277ae"><?=$lessonName?></span></p>
                        <input type="hidden" name="WIDsubject" value="<?=$lessonName?>">
                        <p>机构名称：<span>仕荟教育</span></p>
                        <p>已选套餐：<span><?=$type?></span></p>
                        <input type="hidden" value="<?=$type?>" name="WIDbody">
                        <p>授课时间：<span><?=$classtime?$classtime:'电话通知'?></span></p>
                        <input type="hidden" value="<?=$classtime?>" name="classtime">
                    </div>

                    <div class="check_tit_box"><h6>联系人信息</h6></div>
                    <div class="check_lesson_info">
                        <p>客户姓名：<span><input type="text" name="name" style="width:176px; "></span></p>
                        <input type="hidden" value="<?=$phone?1:2?>" name="checkPhone" >
                        <p>联系电话：<span><input type="phone" name="phone" value="<?=$phone?>" style="width:176px;"></span>
                            <?php if(!$phone): ?>
                        <p style="margin-left: 90px"><input type="button" id="getCode" value="获取验证码" style="width:176px;"></p>
                        <p>验  &nbsp;证&nbsp;  码：<span style="padding-left: 18px;"><input type="number" style="width:176px;" name="code"></span></p>
                        <?php endif; ?>
                        </p>
                        <p><em style="vertical-align: top;font-style: normal">订单留言：</em><span><textarea name="message" id="" cols="30" rows="3"  style="width:176px; "></textarea>

                        </p>

                    </div>

                    <div class="check_tit_box"><h6>费用信息</h6></div>
                    <div class="check_lesson_info">
                        <p>实际付款金额：<b style="font-size: 22px;color: #4d4d4d"><?=$price?></b>人民币</p>
                        <input type="hidden" name="WIDtotal_amount" value="<?=$price?>">
                    </div>

                    <div class="check_tit_box"><h6>选择支付平台</h6></div>
                    <div class="check_lesson_info">
                        <input type="radio" name="payment" value="1">
                        <img style="padding-left: 30px" src="/public/images/web/lesson/images/alipay.png" alt="">
                        <br />
                        <input type="radio" name="payment" value="2">
                        <img style="padding-left: 30px" src="/public/images/web/lesson/images/wechat.jpg" alt="">
                    </div>
                    <input style="margin-bottom: 50px" type="button" value="立即支付" class="check_btn">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var login_regPhone = /1[3|4|5|7|8|][0-9]{9}/;
    var login_regCode = /[0-9]{4}/;
    var login_isSend = false;
    var is_weixin = "<?php echo $is_weixin?>";
    $('input[name=payment]').change(function(){
        if($(this).val() == 2){
            if(is_weixin){
                $('#AlipayCheckForm').attr('action','/Mobile_Wechat/jssdkpay');
            }else{
                $('#AlipayCheckForm').attr('action','/Mobile_Wechat/jssdkpay');
            }

            return false;
        }
        if($(this).val() == 1){
            $('#AlipayCheckForm').attr('action','/Mobile_Alipay/pagepay');
            return false;
        }
    })


    //点击发送验证码
    $("#getCode").click(function(){
        if(login_isSend){
            return false;
        }
        var userPhone = $('input[name=phone]').val();
        if (!login_regPhone.test(userPhone)) {
            layer.alert('电话格式不正确！');
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

    //提交支付
    $('.check_btn').click(function(){
        var checkphone = $('input[name=checkPhone]').val();
        var payment = $('input[name=payment]:checked').val();//1.支付宝   2.微信
        if(checkphone == '1'){
            if(is_weixin){
                if (payment == '1'){
                    layer.alert('微信浏览器中请使用微信支付');
                    return false;
                }
            }else{
                if(payment == '2'){
                    layer.alert('请在微信客户端打开连接！');
                    return false;
                }
            }


            $('#AlipayCheckForm').submit();
        }else{
            var phone = $('input[name=phone]').val();
            var code = $('input[name=code]').val();
            if(!phone){
                layer.alert('联系电话未填写！');
                return false;
            }
            if (!login_regPhone.test(phone)) {
                layer.alert('电话格式不正确！');
                return false;
            }
            if (!login_regCode.test(code)) {
                layer.alert('验证码错误！');
                return false;
            }
            $.post('/mobile/common/checkUserPhone',{'phone':phone,'code':code},function(data){
                if(data.status == 100){
                    $('#AlipayCheckForm').submit();

                }else{
                    layer.alert(data.msg);
                    return false;
                }
            },'json');
        }
    });




    //倒计时
    var login_wait = 60;
    function logintime() {
        if (login_wait == 0) {
            $("#getCode").removeAttr("disabled").val('发送验证码');
            login_isSend = false;
            login_wait = 60;
        } else {
            html = "重新发送(" + login_wait + ")";
            $("#getCode").attr("disabled","disabled").val(html);
            login_wait--;
            setTimeout(function() {
                    logintime()
                },
                1000);
        }
    }




</script>