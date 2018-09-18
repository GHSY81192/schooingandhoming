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
    <script src="/public/js/gVerify.js"></script>


</head>
<style>
    .mui-content{background: #fbfbfb}
</style>
<body>
<div class="mui-navbar-inner mui-bar mui-bar-nav">
    <button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
        <span class="mui-icon mui-icon-left-nav"></span>
    </button>
    <h1 class="mui-center mui-title">意见反馈</h1>
</div>
<div class="mui-content">
    <form id="adviceForm" action="/mobile/home/user_advice_submit" method="post" enctype="multipart/form-data">
        <div class="advice_box">
            <textarea onKeyUp="javascript:checkWord(this);" onMouseDown="javascript:checkWord(this);" name="content" class="form-control advice_textarea" placeholder="请输入遇见的问题或建议．．．" rows="5"></textarea>
            <span id="wordCheck">400</span>
        </div>
        <div class="advice_img_box" >
            <img src="" style="width:100px;height: 100px;" id="pic_1" class="img-thumbnail" />
            添加图片说明
            <input type="hidden" name='cover_no' value="1"/>
            <input type="file" class="filebtn" name="cover" onchange="showPerview(this,'pic_1','pic1_form');">
        </div>

        <div class="contact_box">
            <label>联系电话</label>
            <input type="text" class="contact_input" name="contact" placeholder="选填，便于我们联系您">
            <div style="clear: both"></div>
        </div>
        <div class="contact_box">
            <label>验证码</label>
            <input type="text" class="verify_input" name="verify" placeholder="请输入右侧验证码">
            <div id="v_container"></div>
            <div style="clear: both"></div>
        </div>
        <button type="button" class="mui-btn mui-btn-primary mui-btn-block">提交</button>

    </form>



</div>

<script src="/public/js/mui/js/mui.min.js"></script>
</body>
<script>
    $(function(){
        var msg = '<?php echo $msg?>';
        if(msg){
            layer.msg(msg);
        }

    });


    var verifyCode = new GVerify("v_container");

    $('.mui-btn-primary').click(function(){
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
</html>