<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no" name="viewport">
        <title><?=@$title?></title>
        <link href="/public/images/web/favicon.ico" rel="shortcut icon" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap.min.css" media="all">
        <script type="text/javascript" src="/public/bootstrap/js/jquery.min.js"></script>
        <script type="text/javascript" src="/public/bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="/public/css/web/common.css">
<!--		<link rel="stylesheet" href="/public/css/web/login2.css">-->
		<link rel="stylesheet" href="/public/css/web/login.css">
		<link rel="stylesheet" href="/public/css/web/service/iconfont.css">
<!--		<script src="/public/js/wxLogin.js"></script>-->

<!--		<script type="text/javascript" src="/public/js/login.js"></script>-->
		<script src="/public/layer/layer.js"></script>
		<script src="https://res.wx.qq.com/connect/zh_CN/htmledition/js/wxLogin.js"></script>


    </head>
	<body>
	<div class="modal-dialog" role="document" style="width: 410px;top: 50px">
		<div class="modal-content">
			<div class="modal-body bg-white">
				<div class="pore bg-white">
					<?php echo lang('login_user_login')?>
				</div>
				<form method="post">
					<div class="phoneornormal" style="<?php echo lang('is_en')?'display:none':'' ?>">
						<label class="radio-inline">
							<input type="radio" name="chooseUser" id="normalUser" checked value="1">普通用户
						</label>
						<label class="radio-inline">
							<input type="radio" name="chooseUser" id="phoneUser"  value="2">手机动态密码登录
						</label>
					</div>
					<input type="hidden" value="<?php echo $wherelogin?$wherelogin:''?>" id="wherelogin">
					<input type="hidden" value="<?php echo $lessonId?$lessonId:''?>" id="lessonId">
					<!--普通用户登录-->
					<div class="normal" style="display: block">
						<div class="form-group" style="position: relative;margin-bottom: 15px">
							<i class="icon iconfont" style="position: absolute;top: 25px;left: 48px;color: #999999;">&#xe600;</i>
							<input style="padding-left:30px;" type="text" class="form-control" name="username" placeholder="<?=lang('login_phone_email')?>">
							<div class="notice usernameN hide">
								<i class="glyphicon glyphicon-exclamation-sign"></i> <?php echo lang('login_username_error')?>
							</div>
						</div>

						<div class="form-group" style="position: relative;padding-top: 0">
							<i class="icon iconfont" style="position: absolute;top: 5px;left: 48px;color: #999999;">&#xe674;</i>
							<input style="padding-left:30px;" type="password" class="form-control" name="password" placeholder="<?=lang('login_password')?>">
							<div class="notice passwordN hide">
								<i class="glyphicon glyphicon-exclamation-sign"></i> <?php echo lang('login_password_error')?>
							</div>
						</div>
						<div class="login_noPwd">
							<span class="spanl"><?php echo lang('NO_Account_Register_Now')?></span>
							<span class="spanr"><?php echo lang('forgot_password')?></span>
						</div>
						<div style="clear: both"></div>
					</div>
					<!--手机用户登录-->
					<div class="phoneLogin_box" style="display: none">
						<div class="col-md-12" style="padding:10px 30px 0px 30px">
							<div class="pore">
								<input class="form-control" style="padding-left: 85px;width: 94%;display: inline-block;" type="tel" placeholder="<?php echo lang('login_mobile_placeholder_message') ?>" id="userPhone">
								<div class="gj">
									+86&nbsp;
								</div>
							</div>
							<div class="pad10">
								<div class="notice phoneN hide">
									<i class="glyphicon glyphicon-exclamation-sign"></i> <?php echo lang('login_mobile_notice_message') ?>
								</div>
							</div>

							<div class="pore">
								<input class="form-control" style="width: 94%;display: inline-block;" type="tel" placeholder="<?php echo lang('login_code_placeholder_message') ?>" maxlength="4" id="codeNum">
								<input class="login-getcode" value="<?php echo lang('login_code_btn_message') ?>" type="button">
							</div>
							<div class="pad10">
								<div class="notice codeN hide">
									<i class="glyphicon glyphicon-exclamation-sign"></i> <?php echo lang('login_code_notice_message') ?>
								</div>
							</div>

						</div>
					</div>
					<!--微信用户登录-->
					<div class="wechat_box" style="display: none">
						<div class="col-md-12 text-center" id="qr">
						</div>
					</div>
					<div class="login_noPwd">
						<div style="<?=lang('is_en')?'display:none':'';?>" class="wx_box_l"><i class="icon iconfont">&#xe6a6;</i><?php echo lang('wechat_login')?></div>
						<button type="submit" class="gologin"><?php echo lang('login_btn_message')?></button>
					</div>

				</form>
				<div style="clear: both"></div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->



	<script type="text/javascript" src="/public/js/login.js"></script>

   <script type="text/javascript">
	   $('input[name=chooseUser]').change(function(){
		   if($(this).val()==1){

			   $('.normal').css('display','block');
			   $('.phoneLogin_box').css('display','none');
			   $('.wechat_box').css('display','none');
		   }else{
			   $('.normal').css('display','none');
			   $('.phoneLogin_box').css('display','block');
			   $('.wechat_box').css('display','none');
		   }
	   });

	   $('.wx_box_l').click(function(){
		   $('input:radio:checked').attr('checked',false);
		   $('.normal').css('display','none');
		   $('.phoneLogin_box').css('display','none');
		   $('.wechat_box').css('display','block');
	   })


	   $('.wx_box_l').hover(function(){
		   $(this).css('color','#449d44');
	   },function(){
		   $(this).css('color','#333');
	   });


	   $('.spanl').click(function(){
		   layer.open({
			   title:'用户注册',
			   type: 2,
			   area: ['700px', '530px'],
			   fixed: false, //不固定
			   maxmin: true,
			   content: '/web/sign_in'
		   });
	   });

   </script>

</body>
</html>
