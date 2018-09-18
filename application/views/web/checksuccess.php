<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>schoolingandhoming</title>
    <link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap.min.css" media="all">
    <script type="text/javascript" src="/public/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="/public/bootstrap/js/bootstrap.min.js"></script>
</head>
<body onload="timedCount()">
<div style="width: 1200px;margin: 0 auto">
    <div style="width: 1200px;text-align: center">
        <h1><?php echo lang('is_en')?'Congratulations,Account registration success!':'恭喜您，账号注册成功！'; ?></h1>
        <p><span id="txt"></span><?php echo lang('is_en')?'seconds later, you\'ll enter the user center':'秒后将为您进入用户界面'?></p>
    </div>

</div>

</body>
<script>
    var c=3;
    var t;
    function timedCount(){
        $('#txt').html(c);
        c--;
        if(c == 0){
            location.href='/home';
            return false;
        }
        t=setTimeout("timedCount()",1000);

    }


</script>
</html>


