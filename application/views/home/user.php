<link rel="stylesheet" href="/public/css/home/newuser/iconfont.css">
<link rel="stylesheet" href="/public/css/home/user.css">
<div id="body_box">
    <div class="main_box row">
        <div class="col-md-2 menu-box">
            <div class="right-header">
                <?php
                if(strstr($data['head_image'],'http')){
                    $face = $data['head_image'];
                }else{
                    $face = '/upload/'.get_filepath_by_route_id(@$data['id'],@$data['head_image'],5);
                }
                ?>
                <div class="face rl">
                    <img src="<?=@$face?>">
                </div>
            </div>
            <?php $this->load->view('home/user_menu',array('active'=>1,'identity'=>$data['identity']));?>

        </div>
        <div class="col-md-10">
            <div class="right-box">
                <h3><?=lang('Personal_Information')?></h3>
                <table class="user-table">
                    <tr class="row">
                        <td class="col-md-2 user-tit"><?=lang('home_detail_member_name_message')?></td>
                        <td class="col-md-10"><input class="user-input-text" type="text" name="username" value="<?=$data['name_cn']?$data['name_cn']:'';?>"></td>
                    </tr>
                    <tr class="row">
                        <td class="col-md-2 user-tit"><?=lang('home_detail_member_gender_message')?></td>
                        <td class="col-md-10">
                            <input type="radio" name="gender" value="1" style="margin-right: 3px" <?=$data['gender']==1?'checked':''?>><?=lang('personal_tailor_form_gender_man_message')?>
                            <input type="radio" name="gender" value="2" style="margin:0 3px 0 10px" <?=$data['gender']==2?'checked':''?>><?=lang('personal_tailor_form_gender_woman_message')?>

                        </td>
                    </tr>
                    <tr class="row">
                        <td class="col-md-2 user-tit"><?=lang('sign_in_email')?></td>
                        <td class="col-md-10"><input class="user-input-text" type="text" name="email" value="<?=$data['email']?$data['email']:''?>"></td>
                    </tr>
                    <tr class="row">
                        <td class="col-md-2 user-tit"><?=lang('Mobile')?></td>
                        <td class="col-md-10">
                            <input style="width: 241px;color: #878787" class="user-input-text" disabled type="text" name="phone" value="<?=$data['phone']?$data['phone']:''?>">
                            <span class="re_phone" style="padding-left: 20px;color: #5277ae;cursor: pointer"><?=lang('Rebind_the_phone')?></span>
                        </td>
                    </tr>
                    <tr class="row">
                        <td class="col-md-2 user-tit"></td>
                        <td class="col-md-10">
                            <img src="<?=@$face?>" id="faceImg" style="width: 160px;padding: 15px 15px 15px 0">
                            <div style="display: inline-block;position: relative">
                                <button class="btn btn-default" style="padding: 3px 30px;color: #5277ae;border: 1px solid #5277ae;"><?=lang('Upload_Headshot');?></button>
                                <input type="file" class="file-input form-control" id="pic" name="pic" style="opacity:0;position:absolute;top:0px;left:0px;width:118px;height:28px;cursor: pointer;" />
                            </div>
                        </td>
                    </tr>
                    <tr class="row">
                        <td class="col-md-2 user-tit"></td>
                        <td class="col-md-10"><input type="submit" class="user-submit-btn" value="<?=lang('user_submit')?>"></td>
                    </tr>

                </table>
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label"><?=lang('Mobile')?></label>
                        <div class="col-sm-10">
                            <div class="fl input">
                                <input type="text" id="userPhone" name="userPhone" class="user-input-text" placeholder="<?=lang('login_mobile_notice_message')?>" style="width:250px;margin-top: 5px;margin-right: 10px">
                            </div>
                            <a class="btn btn-success getcode" style="border-radius: 0;padding: 1px 10px;margin-top: 5px;"><?=lang('personal_tailor_form_send_code_message')?></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label"><?=lang('verify_code')?></label>
                        <div class="col-sm-10">
                            <input type="text" id="codeNum" class="user-input-text" placeholder="<?=lang('enter_verify_code')?>"  style="width:250px;margin-top: 5px;">
                        </div>
                    </div>
                    <div class="form-group" style="padding-top:20px">
                        <div class="col-sm-offset-2 col-sm-10">
                            <a id="subPhoneBtn" class="btn btn-primary" style="margin-right:40px;padding:6px 20px"><?=lang('save')?></a><span id="cancelPhone" class="cur underline"><?=lang('search_cancel_message')?></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/public/js/ajaxfileupload.js"></script>
<script type="text/javascript">
    var isSend = false;
    var regPhone = /1[3|4|5|7|8|][0-9]{9}/;
    var regCode = /[0-9]{4}/;

    $('.file-input').change(function(){
        ajaxFileUpload();
    });
    function ajaxFileUpload(){
        $.ajaxFileUpload
        (
            {
                url:'/home/uploadPic',
                secureuri:false,
                fileElementId:'pic',
                dataType: 'json',
                success: function (data, status)
                {
                    if(data.status == 'success'){
                        pic = data.data;
                        $.post('/home/editProfile',{'head_image':pic},function(data){
                            if(data.status){
                                window.location.reload();
                            }else{
                                alert(data.msg);
                            }
                        },'json')
                    }else{
                        //alert(data.data);
                    }
                    $('.file-input').change(function(){
                        ajaxFileUpload();
                    });
                },
                error: function (data, status, e)
                {
                    alert(e);
                    $('.file-input').change(function(){
                        ajaxFileUpload();
                    });
                }
            }
        )
        return false;
    }

    $('.re_phone').click(function(){
        $('.user-table').css('display','none');
        $('.form-horizontal').css('display','block');
    });

    $('#cancelPhone').click(function(){
        $('.user-table').css('display','table');
        $('.form-horizontal').css('display','none');
    });

    //点击发送验证码
    $(".getcode").click(function(){
        if(isSend){
            return false;
        }
        var userPhone = $("#userPhone").val();
        if (!regPhone.test(userPhone)) {
            alert("请输入正确的手机号。");
            return false;
        }else{
            $.post('/web/sendAuthCode',{'mobile':userPhone},function(data){
                if(data.status){
                    isSend = true;
                    time();
                }else{
                    alert(data.msg);
                }
            },'json')
        }
    });
    //倒计时
    var wait = 60;
    function time() {
        if (wait == 0) {
            isSend = false;
            $(".getcode").text('发送验证码');
            wait = 60;
        } else {
            html = "重新发送(" + wait + ")";
            $(".getcode").text(html);
            wait--;
            setTimeout(function() {
                    time()
                },
                1000);
        }
    }


    //重新绑定手机号
    $("#subPhoneBtn").click(function(){
        var userPhone = $("#userPhone").val();
        var code = $('#codeNum').val();
        if (!regPhone.test(userPhone)) {
            alert("请输入正确的手机号。");
            return false;
        }
        if (!regCode.test(code)) {
            alert("请输入正确的验证码。");
            return false;
        }
        $.post('/home/changePhone',{'mobile':userPhone,'authCode':code},function(data){
            if(data.status){
                //登录成功
                alert('绑定成功');
                document.location.href="/home"
            }else{
                alert(data.msg);
            }
        },'json')
    });

    //修改基本信息
    $('.user-submit-btn').click(function(){
        var name = $('input[name=username]').val(),gender = $('input[name=gender]:checked').val(),email = $('input[name=email]').val();
        $.post('/home/userInfo_Submit',{name:name,gender:gender,email:email},function(data){
            if(data.status === 888){
                layer.alert('修改成功',function(){
                    location.href = '/home';
                })
            }
        },'json')
    })
</script>