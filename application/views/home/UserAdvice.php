<link rel="stylesheet" href="/public/css/home/newuser/iconfont.css">
<link rel="stylesheet" href="/public/css/home/user.css">
<script src="/public/js/gVerify.js"></script>
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
            <?php $this->load->view('home/user_menu',array('active'=>6,'identity'=>$data['identity']));?>

        </div>
        <div class="col-md-10">
            <div class="right-box">
                <h3><?=lang('Feedback')?></h3>
                <form id="adviceForm" action="/home/user_advice_submit" method="post" enctype="multipart/form-data">
                    <table class="user-table">
                        <tr class="row">
                            <td class="col-md-2 user-tit" style="vertical-align:text-top"><?=lang('Questions')?></td>
                            <td class="col-md-10">
                                <textarea class="user_advice_textarea" style="margin-top: 15px" name="content" cols="100" rows="5"></textarea>
                            </td>
                        </tr>

                        <tr class="row">
                            <td class="col-md-2 user-tit"><?=lang('Call_Phone')?></td>
                            <td class="col-md-10"><input class="user-input-text" type="text" name="phone" value="<?=$data['phone']?$data['phone']:''?>"></td>
                        </tr>
                        <tr class="row">
                            <td class="col-md-2 user-tit"><?=lang('personal_tailor_form_code_message')?></td>
                            <td class="col-md-10" style="position: relative">
                                <input class="user-input-text" type="text" name="verify" value="" style="width: 184px;">
                                <div id="v_container"></div>
                            </td>
                        </tr>


                        <tr class="row">
                            <td class="col-md-2 user-tit"></td>
                            <td class="col-md-10">
                                <div class="advice_img_box" >
                                    <img src="" style="width:100px;height: 100px;" id="pic_1" class="img-thumbnail" />
                                    <div style="display: inline-block;position: relative">
                                        <button class="btn btn-default" style="padding: 3px 30px;color: #5277ae;border: 1px solid #5277ae;"><?=lang('Upload_Photo_Illustration')?></button>
                                        <input type="hidden" name='cover_no' value="1"/>
                                        <input type="file" class="filebtn" name="cover" onchange="showPerview(this,'pic_1','pic1_form');">
                                    </div>
                                </div>

                            </td>
                        </tr>
                        <tr class="row">
                            <td class="col-md-2 user-tit"></td>
                            <td class="col-md-10"><input type="button" class="user-submit-btn" value="<?=lang('user_submit')?>"></td>
                        </tr>

                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        var msg = '<?php echo $msg?>';
        if(msg){
            layer.msg(msg);
        }

    });


    var verifyCode = new GVerify("v_container");

    $('.user-submit-btn').click(function(){
        var code = $('input[name=verify]').val();
        var res = verifyCode.validate(code);
        if(res){
            $('#adviceForm').submit();
        }else{
            layer.alert('验证码错误！');
        }

    });


    var maxstrlen=400;
    function Q(s){return document.getElementById(s);}
    function checkWord(c){
        len=maxstrlen;
        var str = c.value;
        myLen=getStrleng(str);
        var wck=Q("wordCheck");
        if(myLen>len*2){
            c.value=str.substring(0,i+1);
        }
        else{
            wck.innerHTML = Math.floor((len*2-myLen)/2);
        }
    }
    function getStrleng(str){
        myLen =0;
        i=0;
        for(;(i<str.length)&&(myLen<=maxstrlen*2);i++){
            if(str.charCodeAt(i)>0&&str.charCodeAt(i)<128)
                myLen+=2;
            else
                myLen+=4;
        }
        return myLen;
    }





    function showPerview(obj,perviewId,formId) {
        var file = obj.files[0];
        if (!/image\/\w+/.test(file.type)) {
            alert("Image Type error");
            return false;
        }
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e) {
            $("#" + perviewId).attr("src",this.result);
        };
    }


    $('.mui-icon-left-nav').click(function(){
        location.href = '/mobile/home/';
    });



</script>