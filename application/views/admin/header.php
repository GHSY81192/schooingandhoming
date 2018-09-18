<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SH-后台管理</title>
<!--        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>-->
        <script src="/public/bootstrap/js/jquery.min.js"></script>

        <?php if(isset($isLoginPage)): ?>
        <link rel="stylesheet" type="text/css" href="/public/css/admin/login.css" media="all">
        <?php else: ?>
<!--        <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">-->
        <link href="/public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--        <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
        <script src="/public/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/public/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
	    <script type="text/javascript" src="/public/bootstrap/js/bootstrap-datetimepicker.zh-CN.js"></script>
	    <link rel="stylesheet" type="text/css" href="/public/bootstrap/css/datetimepicker.css" media="all">
        <script src="/public/layer/layer.js"></script>
        <?php endif; ?>
    </head>
<body id="<?php echo isset($isLoginPage) ? 'login-page' : '' ?>">