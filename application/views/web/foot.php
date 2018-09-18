<?php if ($showContent):?>
<div class="footer">
	<div class="container">
		<div class="row" style="margin-bottom: 20px">
			<div class="col-xs-4">
				<p class="foot_title"><?php echo lang('footer_aboutus_title_message') ?></p>
				<hr>
				<p class="font-14"><?php echo lang('footer_aboutus_detail_message') ?></p>
			</div>
			<div class="col-xs-4 text-center">
				<ul class="list-unstyled">
					<li>
						<a id="contactUs" href="javascript:void(0)" data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo lang('footer_joinus_detail_message') ?>">
							<?php echo lang('footer_joinus_title_message') ?>
						</a>
					</li>
					<li><span style="cursor: pointer" class="service-list"><?php echo lang('footer_service_message') ?></span></li>
					<li><span style="cursor: pointer" class="service-list2"><?php echo lang('footer_secret_message') ?></span></li>
				</ul>
				<img src="/public/images/web/share.png" style="margin-top: 20px;">
			</div>
			<div class="col-xs-4 text-center">

				<div  style="width:130px;margin: 0 auto">
					<img src="/public/images/web/qr.jpg">
					<p><?php echo lang('footer_wechat_message') ?></p>
				</div>
			</div>

		</div>
		<div class="text-center"><?php echo lang('footer_copyright_message') ?></div>
		<div class="text-center font-12" style="padding-top:5px"><?php echo lang('footer_icp_message') ?> <script type="text/javascript">
	var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
	document.write(unescape("%3Cspan id='cnzz_stat_icon_1261250305'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1261250305%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));
	</script></div>
	</div>
	<script>
	$('#contactUs').popover({'trigger':'hover'});
	function set_lang(lang) {
		$.get('/ajax/set_lang',{lang:lang},function(resp){
			window.location.reload();
		});
	}
	</script>
</div>
<?php endif;?>
<link rel="stylesheet" href="/public/css/web/login.css">
<script src="/public/js/weLogin.js"></script>
<!--<script src="https://res.wx.qq.com/connect/zh_CN/htmledition/js/wxLogin.js"></script>-->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="width: 410px">
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

<!--普通用户登录-->
		  <div class="normal" style="display: block">
			  <div class="form-group" style="position: relative;margin-bottom: 15px">
				  <i class="icon iconfont" style="position: absolute;top: 25px;left: 48px;color: #999999;">&#xe600;</i>
				  <input style="padding-left:30px;" type="text" class="form-control" name="username" placeholder="<?php echo lang('login_phone_email')?>">
				  <div class="notice usernameN hide">
					  <i class="glyphicon glyphicon-exclamation-sign"></i> <?php echo lang('login_username_error')?>
				  </div>
			  </div>

			  <div class="form-group" style="position: relative;padding-top: 0">
				  <i class="icon iconfont" style="position: absolute;top: 5px;left: 48px;color: #999999;">&#xe674;</i>
				  <input style="padding-left:30px;" type="password" class="form-control" name="password" placeholder="<?php echo lang('login_password')?>">
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
					  <div class="gj" >
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
</div><!-- /.modal -->
<script type="text/javascript" src="/public/js/login.js"></script>
<script>

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




	var _hmt = _hmt || [];
	(function() {
		var hm = document.createElement("script");
		hm.src = "https://hm.baidu.com/hm.js?7ef46879898b09f2c255de336870d922";
		var s = document.getElementsByTagName("script")[0]; 
		s.parentNode.insertBefore(hm, s);
	})();



	$('.service-list').click(function(){
		layer.open({
			type: 1,
			title:'Terms of Service',
			skin: 'layui-layer-demo', //样式类名
			closeBtn: 1, //不显示关闭按钮
			anim: 2,
			area:['1000px','90%'],
			shadeClose: true, //开启遮罩关闭
			content: '<div class="box"><b>PLEASE READ THESE TERMS OF USE CAREFULLY AS THEY CONTAIN IMPORTANT INFORMATION REGARDING YOUR LEGAL RIGHTS, REMEDIES AND OBLIGATIONS. THESE INCLUDE VARIOUS LIMITATIONS AND EXCLUSIONS, AND A CLAUSE THAT GOVERNS THE JURISDICTION AND VENUE OF DISPUTES.</b><br /><br />' +
				'<p class="title">DEFINITIONS</p>' +
				'<p>"Collective Content" means Registrant Content and SH Content.<br />"Content" means text, graphics, images, music, software (excluding the Application), audio, video, information or other materials.<br />"Listing Party" means a Registrant who creates a Listing via the Site, Application and Services.<br />"Listing" means a Rental Accommodation that is listed by a Listing Party as available for rental via the Site, Application, and Services.<br />"SH Content" means all Content that SH makes available through the Site, Application, or Services, including any Content licensed from a third party, but excluding Registrant Content.<br />"Prospective Tenant" means a Registrant who requests Rental Properties via the Site, Application or Services.<br />"Referral Program" means the Service provided by SHthat places Listing Parties and Prospective Tenants in contact with one another.<br />"Registrant" means a person who completes SH’s account registration process, including, but not limited to Listing Parties and Prospective Tenants, as described under "Account Registration" below.<br />"Registrant Content" means all Content that a Registrant posts, uploads, publishes, submits or transmits to be made available through the Site, Application or Services.<br />"Rental Property" refers to apartments and houses that are available for rent to Prospective Tenants.<br />"Tax" or "Taxes" mean any sales taxes, value added taxes (VAT), goods and services taxes (GST) and other similar municipal, state and federal indirect or other withholding and personal or corporate income taxes.</p><br />'+
				'<p class="title">OTHER DEFINITIONS</p>' +
				'<p style="margin:0">Other terms used herein shall have the definitions given where first defined within this document.</p>'+
				'<b>YOU ACKNOWLEDGE AND AGREE THAT, BY ACCESSING OR USING THE SITE, APPLICATION OR SERVICES OR BY DOWNLOADING OR POSTING ANY CONTENT FROM OR ON THE SITE, VIA THE APPLICATION OR THROUGH THE SERVICES, OR BY PARTICIPATING IN THE REFERRAL PROGRAM, YOU ARE INDICATING THAT YOU HAVE READ, AND THAT YOU UNDERSTAND AND AGREE TO BE BOUND BY THESE TERMS, WHETHER OR NOT YOU HAVE REGISTERED WITH THE SITE AND APPLICATION. IF YOU DO NOT AGREE TO THESE TERMS, THEN YOU HAVE NO RIGHT TO ACCESS OR USE THE SITE, APPLICATION, SERVICES, OR COLLECTIVE CONTENT OR TO PARTICIPATE IN THE REFERRAL PROGRAM.</b><span>If you accept or agree to these Terms on behalf of a company or other legal entity, you represent and warrant that you have the authority to bind that company or other legal entity to these Terms and, in such event, "you" and "your" will refer and apply to that company or other legal entity.</span><br /><br />'+
				'<p style="margin-top: 10px" class="title">ELIGIBILITY</p>'+
				'<p>The Site, Application and Services are intended solely for persons who are 18 or older. Any access to or use of the Site, Application or Services by anyone under 18 is expressly prohibited. By accessing or using the Site, Application or Services you represent and warrant that you are 18 or older.</p><br />'+
				'<p class="title">HOW THE SITE, APPLICATION AND SERVICESWORK</p>' +
				'<p>The Site, Application and Services can be used to facilitate the listing and reservation of Rental Properties. Such Rental Properties are included in Listings on the Site, Application and Services by Listing Parties (i.e., landlords and real estate agents). You may view Listings as an unregistered visitor to the Site, Application and Services; however, if you wish to reserve a Rental Property or create a Listing, you must first register to create a SH Account (defined below).</p>'+
				'<p>SH makes available a platform or marketplace with related technology for Prospective Tenants and Listing Parties to meet online and arrange for reservations of Rental Properties. SH is not an owner or operator of properties, including, but not limited to, Rental Properties, nor is it a provider of properties, including, but not limited to, Rental Properties. SH does not own, sell, resell, furnish, provide, rent, re-rent, manage and/or control properties, including, but not limited to, Rental Properties.</p>'+
				'<p>SH’s responsibilities are limited to: (i) facilitating the availability of the Site, Application and Services and (ii) serving as an advertising venue and limited agent of each Listing Party for the purpose of accepting payments from Prospective Tenants on behalf of the Listing Party.</p>'+
				'<p>PLEASE NOTE THAT, AS STATED ABOVE, THE SITE, APPLICATION AND SERVICES ARE INTENDED TO BE.</p>'+
			'</div>'
		});
	});


	$('.service-list2').click(function(){
		layer.open({
			type: 1,
			title:'Privacy Policy',
			skin: 'layui-layer-demo', //样式类名
			closeBtn: 1, //不显示关闭按钮
			anim: 2,
			area:['1000px','90%'],
			shadeClose: true, //开启遮罩关闭
			content: '<div class="box"><p>At S&H, we respect your right to privacy and we understand that visitors to www.schoolingandhoming.com need to control the uses of their personal information. S&H allows individuals to locate and obtain student housing through our Site. The privacy policy below describes the measures taken by us to protect your privacy in connection with your use of our Site.</p>' +
			'<p class="title">WHAT PERSONALLY IDENTIFIABLE INFORMATION DO WE COLLECT, AND WHEN DO WE COLLECT IT?</p>' +
			'<p>Registration. Users must register to use our website services. When you register, we ask for your name, age, e-mail address, the school you will be attending or are attending and your major course of study in school. Once you are a registered user you can update your profile.</p><p>Forms and Reservations. We also use forms for searching for, checking availability on, and applying for housing opportunities listed on our Site. We collect your contact information (e.g., your e-mail address, mailing address and/or telephone number), a copy of your passport (which will include, among other things, your name, a photo of you, your date and place of birth, country of citizenship, validity period for the passport, issuing authority, place of issue and passport number, and the dates the passport was issued and will expire), a copy of your Form I-20 visa (which will include, among other things, your name, your date and place of birth, country of citizenship, your school information, the purpose of your visa and level of education pursued, major in school and length of study, expected report date, English proficiency, estimated cost per academic term and means of support, parent name and address for students under 18 years of age, admission number and visa issue date), and a bank statement (which will include, among other things, the account owner’s name, bank, bank account number, deposit date and account balance). This information is used to assist users in reserving housing through our Site.</p><p>Special Contests or Promotions. We may occasionally present a special contest or promotion that is sponsored by another company. To qualify for entry in such contest or promotion, we may ask you to provide personal information. If we plan to share your personal information with the sponsor(s) or with others, we will provide a statement to that effect in the contest or promotion terms.</p><p>IP Address. An Internet Protocol (“IP”) address is a unique string of numbers that is assigned to your computer by your Internet Service Provider. Web servers automatically identify your computer by its IP address. We will use your IP address to help diagnose problems with our server and to administer our Site. Your IP address also may be used to gather broad demographic information.</p><p>Cookies. A “cookie” is a small data file that can be placed on your hard drive when you visit certain websites. We use cookies to collect, store and sometimes track information for statistical purposes to improve the services we provide. If you are a registered user, we will use a cookie to save your settings and to provide customizable and personalized services. These cookies do not enable third parties to access any of your personally identifiable information. Additionally, be aware that if you visit other websites you may be required to accept cookies. Advertisers and partners may also use their own cookies. We do not control use of these cookies and expressly disclaim responsibility for information collected through them.</p><br />'+
			'<p class="title">HOW DO WE USE YOUR PERSONALLY IDENTIFIABLE INFORMATION?</p>' +
			'<p>Customized experience. We gather your personally identifiable information to provide you with a customized experience on our Site. Your personally identifiable information helps us tailor the content, services, goods and advertising to your current and future needs.</p><p>E-mail. If you register with our Site, from time to time, we may send you e-mail messages informing you of our products and services and also third party products and services we believe may be of interest to you, such as new features and services, special offers and updated information. Our newsletters (see below) may contain code that enables our database to track your usage of the newsletters, including whether the e-mail was opened and/or what links (if any) were clicked. We will combine such information with other information we have about you and may use this information to improve your experience with our Site and/or provide customized e-mail communications to you.</p><br />'+
			'<p class="title">WHO DO WE SHARE YOUR PERSONALLY IDENTIFIABLE INFORMATION WITH?</p>' +
			'<p>We will not share your personally identifiable information with third parties (aside from entities that perform services for us, such as processing credit card payments, that either are bound to comply with our privacy policy or have privacy policies that protect your information) unless you “opt-in” to such sharing by registering with our Site and electing to disclose your information with a rental office, property management group, private owner or other entity or individual from which you seek to reserve a property. We may also disclose your name, date of arrival and types of properties you’re interested in to third parties, such as study-abroad agencies or property management groups.</p>'+
			'<p>We may also disclose information you provide if required to do so by law or if we have a good faith belief that disclosure is necessary to (1) comply with the law or with legal process served on us; (2) protect and defend our rights or property; or (3) act in an emergency to protect someone’s safety.</p>'+
			'<p>We may gather demographic information from you (for example, your age, education level or kinds of properties you are interested in) from time to time. We will not share such information with any other person or entity in a manner that identifies you as an individual, unless we let you know that at the time of collection or we have your permission. When we share demographic information with third parties, we will give them aggregate information only.</p>'+
			'</div>'
		});
	});
</script>
<style>
	.layui-layer-demo .box{padding:10px 20px}
	.layui-layer-demo .title{color: orangered}
	.layui-layer-demo p{line-height: 22px}
</style>





</body>
</html>