<link rel="stylesheet" href="/public/css/home/setting.css">
<div id="body_box">
    <div class="main_box">
        <div class="left_box">
            <div class="setting_title">账户设置</div>
            <div class="menu_box">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation"><a href="/home/setting">修改密码</a></li>
                    <li role="presentation" class="active"><a style="border-radius: 0;" href="/home/payment">付款方式</a></li>
                </ul>
            </div>
        </div>
        <div class="right_box">
            <div class="right_tit">付款方式</div>
            <div>
                <form class="form-horizontal">
                    <span class="r_tit">选中一种默认支付方式</span>
                    <div class="row">
                        <div class="col-sm-4" style="text-align: center">
                            <div class="payBox" style="<?php echo $payment==1?'border:2px solid #337ab7':'' ?>"><img src="/public/images/web/home/alipay.jpg" alt=""></div>
                            <input type="radio" name="payment" class="payment_radio" value="1" <?php echo $payment==1?'checked':'' ?>>
                        </div>
                        <div class="col-sm-4" style="text-align: center">
                            <div class="payBox" style="<?php echo $payment==2?'border:2px solid #337ab7':'' ?>"><img src="/public/images/web/home/wechat.jpg" alt=""></div>
                            <input type="radio" name="payment" class="payment_radio" value="2" <?php echo $payment==2?'checked':'' ?>>
                        </div>
                        <div class="col-sm-4" style="text-align: center" >
                            <div class="payBox" style="<?php echo $payment==3?'border:2px solid #337ab7':'' ?>"><img src="/public/images/web/home/upchina.jpg" alt=""></div>
                            <input type="radio" name="payment" class="payment_radio" value="3" <?php echo $payment==3?'checked':'' ?>>
                        </div>
                    </div>

                    <div class="form-group" style="padding-top: 20px;text-align: center">

                            <button type="button" class="btn btn-primary" style="width: 120px">确定</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('.payment_radio').click(function(){
        $('.payBox').css('border','1px solid #ccc');
        $(this).prev('.payBox').css('border','2px solid #337ab7');
    })

    $('.btn-primary').click(function(){
        var payment = $('input[name=payment]:checked').val();
        $.post('/home/setPayment',{payment:payment},function(data){
            if(data.status == 1){
                layer.alert(data.msg,{icon:1,title:'信息'});
                return false;
            }
        },'json')
    })
</script>