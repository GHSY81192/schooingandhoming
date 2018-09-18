<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no" name="viewport">
        <title><?=@$title?></title>
        <link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap.min.css" media="all">
        <script type="text/javascript" src="/public/bootstrap/js/jquery.min.js"></script>
        <script type="text/javascript" src="/public/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
        <link rel="stylesheet" href="/public/css/animate.min.css">
        <link rel="stylesheet" href="/public/css/mobile/common.css">
		<script src="/public/layer/layer.js"></script>
	</head>
	<body>	
	<?php if($needHead):?>	
	<div class="container" style="top:0px;left:0px;width:100%;z-index:1000;background-color:#fff;position: fixed;top: 0;">
		<div class="row header border-bottom">
			<div class="col-xs-3 tap-img rl cur" style="padding-right:0px" id="tap-img">
				<span>
				<img src="/public/images/mobile/index/logo2.png" style="width:60%"  />
				</span>
				<span class="top-tag ab" id="top-tag">&nbsp;</span>
			</div>
			<div class="col-xs-9">
				<div class="rl" id="top-hide-search">
					<img class="ab search-icon" src="/public/images/mobile/index/2.png" style="width:14px" />
					<input id="topSearch" type="text" name="name" class="search-input form-control" placeholder="<?php echo lang('header_place_holder') ?>" value="<?=@$search_name;?>" />
				</div>
			</div>
		</div>
	</div>
	<div style="height: 55px"></div>
	<?php endif;?>