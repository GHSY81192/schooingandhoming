<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.css" />
<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.skinHTML5.css" id="styleSrc"/>
<link rel="stylesheet" href="/public/css/web/personal.css">
<script src="/public/js/ion.rangeSlider.js"></script> 
<div class="head-banner rl">
	<img src="/public/images/web/sirendz/banner.jpg" width="100%">
	<h2 class="ab text-center" style="width: 100%;top:30%;color:#fff;font-size:48px;font-weight:200"><?php echo lang('personal_tailor_title_message') ?></h2>
</div>
<div class="bg-white personal-c">
	<div class="container">
		<div class="clearfix text-center" style="padding:40px 0px 30px 0px;font-size:18px;">
			<p style="color:#666666;"><?php echo lang('personal_tailor_intro1_message') ?></p>
			<p><?php echo lang('personal_tailor_intro2_message') ?></p>
			<p style="color:#666666;"><?php echo lang('personal_tailor_intro3_message') ?></p>
			<div class="order-btn-content"><a class="btn order-btn" href="#formContent" style="font-size: 20px;color:#fff;background-color: #d0b784;"><?php echo lang('personal_tailor_intro4_message') ?></a></div>
		</div>
	</div>	
		<div class="content process-bg">
			<div class="text-center">
				<h4  style="font-size: 32px;"><?php echo lang('personal_tailor_process_title_message') ?></h4>
			</div>
			<div class="container">
				<div class="row">
						<div class="col-md-3 text-center">
							<span class="icon icon1"><img src="/public/images/web/sirendz/icon01.png"></span>
							<p class="title"><?php echo lang('personal_tailor_process_intro1_message') ?></p>
							<p class="" style="font-size: 14px;"><?php echo lang('personal_tailor_process_intro11_message') ?></p>
						</div>
						<div class="col-md-3 text-center">
							<span class="icon icon2"><img src="/public/images/web/sirendz/icon02.png"></span>
							<p class="title"><?php echo lang('personal_tailor_process_intro2_message') ?></p>
							<p class="" style="font-size: 14px;"><?php echo lang('personal_tailor_process_intro22_message') ?></p>
						</div>
						<div class="col-md-3 text-center">
							<span class="icon icon3"><img src="/public/images/web/sirendz/icon03.png"></span>
							<p class="title"><?php echo lang('personal_tailor_process_intro3_message') ?></p>
							<p class="" style="font-size: 14px;"><?php echo lang('personal_tailor_process_intro33_message') ?></p>
						</div>
						<div class="col-md-3 text-center">
							<span class="icon icon4"><img src="/public/images/web/sirendz/icon04.png"></span>
							<p class="title"><?php echo lang('personal_tailor_process_intro4_message') ?></p>
							<p class="" style="font-size: 14px;"><?php echo lang('personal_tailor_process_intro44_message') ?></p>
						</div>
				</div>
			</div>
		</div>
	<div class="container" id="formContent">
		<div class="text-center content">
			<h4 style="color:#000;"><?php echo lang('personal_tailor_form_title_message') ?></h4>
		</div>
		<div class="content row line-bg">
			<div class="col-md-2 text-center"><div class="titleYellow"><?php echo lang('personal_tailor_form_title2_message') ?></div></div>
			<div class="col-md-10">
				<div class="sirendztab">
					<div class="pt-div">
						<form class="form-horizontal form1" role="form">
						  <div class="row">
						  	  <div class="col-md-6">
								  <div class="form-group">
								    <label for="userName" class="col-sm-3 control-label label1"><?php echo lang('personal_tailor_form_name_message') ?><span class="ab notice-tag">*</span></label>
								    <div class="col-sm-8 rl">
								      <input type="text" class="form-control input1" id="name" value="<?php if(isset($user['name_cn'])) { echo $user['name_cn']; }?>">
								    </div>
								  </div>
							  </div>
							  <div class="col-md-6">
							   		<div class="form-group">
									    <label for="userPhone" class="col-sm-3 control-label label1"><?php echo lang('personal_tailor_form_gender_message') ?><span class="ab notice-tag">*</span></label>
									    <div class="col-sm-8">
									      	<select class="form-control" name="sex" id="sex">
									      		<option value="0"></option>
										  		<option value="1"><?php echo lang('personal_tailor_form_gender_man_message') ?></option>
										  		<option value="2"><?php echo lang('personal_tailor_form_gender_woman_message') ?></option>
										  	</select>
									     </div>
									</div>
							  </div>
						  </div>
						  <div class="row">
						  	<div class="col-md-6">
						  		<div class="form-group">
								    <label for="userPhone" class="col-sm-3 control-label label1"><?php echo lang('personal_tailor_form_age_message') ?><span class="ab notice-tag">*</span></label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control input1" id="age">
								    </div>
								 </div>
						  	</div>
						  	<div class="col-md-6">
						  		<div class="form-group">
								    <label for="userPhone" class="col-sm-3 control-label label1"><?php echo lang('personal_tailor_form_school_message') ?><span class="ab notice-tag">*</span></label>
								    <div class="col-sm-8">
								      <input type="text" class="form-control input1" id="school">
								    </div>
								 </div>
						  	</div>
						  </div>
						  <?php if (empty($user)):?>
						  <div class="row">
						  	<div class="col-md-6">
						  		<div class="form-group">
								    <label for="userPhone" class="col-sm-3 control-label label1"><?php echo lang('personal_tailor_form_phone_message') ?><span class="notice-tag">*</span></label>
								    <div class="col-sm-5 rl" style="padding-right:0px">
								      <input type="tel" class="form-control input1" id="phone" value="<?php if(isset($user['phone'])) { echo $user['phone']; }?>">
								    </div>
								    <div class="col-sm-3">
								      <a class="btn btn-primary getcode" style="padding:5px 7px;background-color:#c5aa72;border-color:#c5aa72"><?php echo lang('personal_tailor_form_send_code_message') ?></a>
								    </div>
								 </div>
						  	</div>
						  	<div class="col-md-6">
						  		<div class="form-group">
								    <label for="userEmail" class="col-sm-3 control-label label1"><?php echo lang('personal_tailor_form_email_message') ?><span class="ab notice-tag">*</span></label>
								    <div class="col-sm-8">
								      <input type="email" class="form-control input1" id="email" value="<?php if(isset($user['contact_email'])) { echo $user['contact_email']; }?>">
								    </div>
								  </div>
						  	</div>
						  </div>	
						  <div class="row">
						  	<div class="col-md-6">
						  		<div class="form-group">
							    <label for="userEmail" class="col-sm-3 control-label label1"><?php echo lang('personal_tailor_form_code_message') ?><span class="ab notice-tag">*</span></label>
							    <div class="col-sm-8">
							      <input type="text" class="form-control input1" id="authCode">
							    </div>
							  </div>
						  	</div>
						  </div>
						  <?php else:?>
						  <div class="row">
						  	<div class="col-md-6">
							  <div class="form-group">
							    <label for="userPhone" class="col-sm-3 control-label label1"><?php echo lang('personal_tailor_form_phone_message') ?><span class="ab notice-tag">*</span></label>
							    <div class="col-sm-8 rl">
							      <input type="tel" class="form-control input1" id="phone" value="<?php if(isset($user['phone'])) { echo $user['phone']; }?>">
							    </div>
							  </div>
							</div>
							<div class="col-md-6">
						  		<div class="form-group">
								    <label for="userEmail" class="col-sm-3 control-label label1"><?php echo lang('personal_tailor_form_email_message') ?><span class="ab notice-tag">*</span></label>
								    <div class="col-sm-8">
								      <input type="email" class="form-control input1" id="email" value="<?php if(isset($user['contact_email'])) { echo $user['contact_email']; }?>">
								    </div>
								  </div>
						  	</div>
						</div>
						<?php endif;?>
						  
						</form>
					</div>
				</div>
			  </div>
			</div>
			<div class="content row line-bg" style="padding-bottom:0px">
				<div class="col-md-2 text-center"><div class="titleYellow"><?php echo lang('personal_tailor_form_house_title_message') ?></div></div>
				<div class="col-md-10">
					<div class="pt-div">
						<form class="form-horizontal form1" role="form">
							<div class="row">
						  		<div class="col-md-6">
								  <div class="form-group">
								    <label for="userName" class="col-sm-3 control-label label1"><?php echo lang('personal_tailor_form_house_address_message') ?></label>
								    <div class="col-sm-4" style="padding-right:0px">
								      <select class="form-control select1 state_data">
										  	<option value="0"><?php  echo lang('search_address_message1') ?></option>
												<?php foreach ($state as $v):?>
												<option value="<?=$v['id']?>"  <?php echo $v['id'] == @$data['state_id'] ?'selected':'';?>><?php echo !lang('is_en') ?$v['name_cn']:$v['name_en'];?></option>
												<?php endforeach;?>
									  	</select>
								    </div>
									<div class="col-sm-4">
								      <select class="form-control select1" id="city_id">
												<option value="0"><?php  echo lang('search_address_message2') ?></option>
									  	</select>
								    </div>
								  </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <label for="userPhone" class="col-sm-3 control-label label1"><?php echo lang('personal_tailor_form_house_language_message') ?></label>
									    <div class="col-sm-8">
										     <select class="form-control select1" id="language">
										     	<option value="0"></option>
												 	<?php foreach($language as $key=>$value): ?>
												  <option value="<?php echo $key ?>"><?php echo $value ?></option>
													<?php endforeach; ?>
											  </select>
									    </div>
									  </div>
								</div>
							</div>
						  	<div class="row">
						  		<div class="col-md-6">
								  <div class="form-group rl">
								    <label for="userEmail" class="col-sm-3 control-label label1"><?php echo lang('personal_tailor_form_house_money_message') ?></label>
								    <div class="col-sm-8">
								      	<input type="text" class="budget" />
								    </div>
								  </div>
								 </div>
								 <div class="col-md-6">
								 	<div class="form-group">
									    <label for="userEmail" class="col-sm-3 control-label label1"><?php echo lang('personal_tailor_form_house_like_message') ?></label>
									    <div class="col-sm-8">
									      <textarea type="text" class="form-control textarea1" id="personalLike" rows="3"></textarea>
									    </div>
									  </div>
								 </div>
							</div>
						   
						</form>
					</div>
				</div>
			</div>
			<div class="text-center" style="padding-bottom:40px">
				<a href="javascript:;" id="submit" class="img-href" style="width:150px;height:40px;line-height:40px;font-size: 18px;"><?php echo lang('personal_tailor_submit'); ?></a>
	</div>
		</div>
	</div>
<script src="/public/js/is_weixin.js"></script>
<script>
	var isSend = false;
	var rangeStart = 500;
	var rangeEnd = 3000;
	var regPhone = /1[3|4|5|7|8|][0-9]{9}/;
	var regCode = /[0-9]{4}/;
	var isWeixin = isWeiXin();
$(function(){
	$(".budget").ionRangeSlider({
		min: 500,
		max: 3000,
		from:500,
		to: 3000,
		type: 'double',//设置类型
		step: 1,
		prefix: "$",//设置数值前缀
		postfix: "/月",
		prettify: true,
	    onChange: function(obj){
				rangeStart = obj.fromNumber;
				rangeEnd = obj.toNumber;
			},
	    onFinish: function(obj){
				rangeStart = obj.fromNumber;
				rangeEnd = obj.toNumber;
			}
	});
	//点击发送验证码
    $(".getcode").click(function(){
        if(isSend){
			return false;
        }
    	var userPhone = $("#phone").val();
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
	$("#submit").click(function(){
		var name = $("#name").val();
		var phone = $("#phone").val();
		var email = $("#email").val();
		var city = $("#city_id").val();
		var language = $("#language").val();
		var personalLike = $("#personalLike").val();
		var sex = $('#sex').val();
		var age = $('#age').val();
		var school = $('#school').val();
		
		var data = {};
		if(name == "") {
			alert("您的姓名不能为空~");
			$("#name").focus();
			return false;
		}
		if(phone == "") {
			alert("您的电话不能为空~");
			$("#phone").focus();
			return false;
		}
		<?php if(empty($user)):?>
		var authCode =  $("#authCode").val();
		if(!authCode){
			alert('请输入验证码');
			$("#authCode").focus();
			return false;
		}
		data.authCode = authCode;
		<?php endif;?>
		if(age == "" || age == 0) {
			alert("年龄不能为空~");
			$("#age").focus();
			return false;
		} 
		if(school == "" || school == 0) {
			alert("所在学校不能为空~");
			$("#school").focus();
			return false;
		}
		if(email == "") {
			alert("您的邮箱不能为空~");
			$("#email").focus();
			return false;
		}
		if(isWeixin){
			data.isWeixin = 3;
		}
		data.name = name;
		data.phone = phone;
		data.email = email;
		data.city = city;
		data.language = language;
		data.personalLike = personalLike;
		data.rangeStart = rangeStart;
		data.rangeEnd = rangeEnd;
		data.sex = sex;
		data.age = age;
		data.school = school;
		$.post("/web/submitTailor" , data , function(data){
			//var ret = JSON.parse(resp);
			if(data.status) {
				alert("您的需求已提交。");
				window.location.href = "/home/requireList";
			}else{
				alert(data.msg);
			}
		},'json');
	});

	$('.state_data').change(function(){
		var id = $(this).val();
		$.post('/ajax/get_city_list/'+id,{},function(data){
			if(data.length){
				html2 = '<option value="0"><?php  echo lang('search_address_message2') ?></option>';
				$.each(data,function(k,v){
					html2 += '<option value="'+v.id+'">'+<?php if(lang('is_en')):?>v.name_en<?php else:?>v.name_cn<?php endif;?>+'</option>';
				})
				$('#city_id').html(html2);
			}
		},'json')
	});
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
</script>
