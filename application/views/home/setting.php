<link rel="stylesheet" href="/public/css/home/setting.css">
<div id="body_box">
    <div class="main_box">
        <div class="left_box">
            <div class="setting_title">账户设置</div>
            <div class="menu_box">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation" class="active"><a style="border-radius: 0;" href="/home/setting">修改密码</a></li>
                    <li role="presentation"><a href="/home/payment">付款方式</a></li>
                </ul>
            </div>
        </div>
        <div class="right_box">
            <div class="right_tit">修改密码</div>
            <div>
                <form class="form-horizontal">
                    <div class="form-group" style="padding-top: 30px">
                        <label class="col-sm-2 control-label">旧密码</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="pwd">
                        </div>
                    </div>
                    <div class="form-group" style="padding-top: 10px">
                        <label for="inputPassword3" class="col-sm-2 control-label">新密码</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="new_pwd">
                            <span class="xqm">小窍门：最少使用8个字符。请勿重复使用用于其他网站的密码，或在密码中包含显而易见的词语，如您的名字或邮箱</span>
                        </div>



                    </div>
                    <div class="form-group" style="padding-top: 10px">
                        <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" name="re_pwd" >
                            <span class="tishi">请保持与上面一致</span>
                        </div>
                    </div>

                    <div class="form-group" style="padding-top: 10px">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-primary" style="width: 120px">更改密码</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('.btn-primary').click(function(){
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
                layer.alert(data.msg,{icon:2,title:'信息'});
                return false;
            }
            if(data.status == 1){
                layer.alert(data.msg,{icon:1,title:'信息'});
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