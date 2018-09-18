<!DOCTYPE html>
<html class="ui-page-login">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>Schooling & Homing</title>
    <link href="/public/css/mui/css/mui.min.css" rel="stylesheet" />
    <link href="/public/css/mui/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/public/css/mui/css/feedback-page.css" />
    <script type="text/javascript" src="/public/bootstrap/js/jquery.min.js"></script>
    <script src="/public/layer/layer.js"></script>

</head>

<body onload="timedCount()">
<div class="mui-content">
    <h3 class="zjw-h3">账号激活成功！</h3>
    <p style="text-align: center"><span id="txt"></span>秒后将为您进入用户界面</p>

</div>
<script src="/public/js/mui/js/mui.min.js"></script>
<script>
    var c=3;
    var t;
    function timedCount(){
        $('#txt').html(c);
        c--;
        if(c == 0){
            location.href='/mobile/home';
            return false;
        }
        t=setTimeout("timedCount()",1000);

    }


</script>
</body>

</html>