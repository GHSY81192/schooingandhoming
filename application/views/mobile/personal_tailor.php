<script type="text/javascript" src="/public/js/swiper.min.js"></script>
<link rel="stylesheet" href="/public/css/mobile/swiper.min.css">
<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.css" />
<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.skinHTML5.css" id="styleSrc"/>
<script src="/public/js/ion.rangeSlider.js"></script> 
<link rel="stylesheet" href="/public/css/mobile/personal_tailor.css">
<div class="container">
	<div class="swiper-container slider1">
	    <div class="swiper-wrapper">
	      <div class="swiper-slide">
	       	<img src="/public/images/mobile/personal_tailor/1.jpg" />
	      </div>
	       <div class="swiper-slide">
	       	<img src="/public/images/mobile/personal_tailor/2.jpg" />
	      </div>
	       <div class="swiper-slide">
	       	<img src="/public/images/mobile/personal_tailor/3.jpg" />
	      </div>
	       <div class="swiper-slide">
	       	<img src="/public/images/mobile/personal_tailor/4.jpg" />
	      </div>
	       <div class="swiper-slide" id="last">
	       	<img src="/public/images/mobile/personal_tailor/5.jpg" />
	      </div>
	    </div>
	    <div class="swiper-pagination"></div>
	 </div>
	 <div class="tailor-content hide">
	 		<img src="/public/images/mobile/personal_tailor/6.png" />
	 		<div class="tailor-content-data">
		 		<div class="text-center font-18 tailor-top-title">- <?php echo lang('personal_tailor_form_title2_message');?> -</div>
		 		<div class="tailor-input-line">
		 			<span class="tailor-title"><?php echo lang('personal_tailor_form_name_message');?>:</span>
		 			<span><input type="text" class="form-control tailor-input"  id="name" value="<?php if(isset($user['name_cn'])) { echo $user['name_cn']; }?>"/></span>
		 			<span class="ab ab2">*</span>
		 		</div>
		 		<div class="tailor-input-line">
		 			<span class="tailor-title"><?php echo lang('personal_tailor_form_age_message');?>:</span>
		 			<span><input type="tel" class="form-control tailor-input"  id="age" value="" /></span>
		 			<span class="ab ab2">*</span>
		 		</div>
		 		<div class="tailor-input-line rl">
		 			<span class="tailor-title"><?php echo lang('personal_tailor_form_phone_message');?>:</span>
		 			<span><input type="tel" class="form-control tailor-input" id="phone" value="<?php if(isset($user['phone'])) { echo $user['phone']; }?>" /></span>
		 			<a class="btn getcode ab" style="color:#fff"><?php echo lang('personal_tailor_form_code_message');?></a>
		 		</div>
		 		<div class="tailor-input-line">
		 			<span class="tailor-title"><?php echo lang('personal_tailor_form_code_message');?>:</span>
		 			<span><input type="text" class="form-control tailor-input"  id="authCode" /></span>
		 			<span class="ab ab2">*</span>
		 		</div>
		 		<div class="tailor-input-line">
		 			<span class="tailor-title"><?php echo lang('personal_tailor_form_email_message');?>:</span>
		 			<span><input style="width:75%" type="text" class="form-control tailor-input"  id="email" value="<?php if(isset($user['contact_email'])) { echo $user['contact_email']; }?>" /></span>
		 			<span class="ab ab2">*</span>
		 		</div>
		 		<div class="tailor-input-line">
		 			<span class="tailor-title"><?php echo lang('personal_tailor_form_school_message');?>:</span>
		 			<span><input type="text" class="form-control tailor-input"  id="school" value="" /></span>
		 			<span class="ab ab2">*</span>
		 		</div>
		 		<div class="tailor-input-line">
		 			<span class="tailor-title"><?php echo lang('personal_tailor_form_gender_message');?></span>
		 			<select class="form-control tailor-select state_data" style="padding-left:10px;width:50%" name="sex" id="sex">
					  	<option value="0"><?php echo lang('mobile_personal_tailor_form_house_gender_message');?></option>
						<option value="1"><?php echo lang('personal_tailor_form_gender_man_message') ?></option>
						<option value="2"><?php echo lang('personal_tailor_form_gender_woman_message') ?></option>
				  	</select>
		 		</div>
		 	</div>
		 	<div class="taitor-line">&nbsp;</div>
		 	<div class="tailor-content-data">
		 		<div class="text-center font-18 tailor-top-title">- <?php echo lang('personal_tailor_form_house_title_message');?> -</div>
		 		<div class="tailor-input-line">
		 			<span class="tailor-title"><?php echo lang('mobile_personal_tailor_form_house_address_message');?></span>
		 			<select class="form-control tailor-select state_data" style="padding-left:10px">
					  	<option value="0"><?php echo lang('search_address_message1');?></option>
							<?php foreach ($state as $v):?>
							<option value="<?=$v['id']?>"  <?php echo $v['id'] == @$data['state_id'] ?'selected':'';?>><?=$v['name_cn'];?></option>
							<?php endforeach;?>
				  	</select>
				  	<select class="form-control tailor-select" id="city_id">
							<option value="0"><?php echo lang('search_address_message2');?></option>
				  	</select>
		 		</div>
		 		<div class="tailor-input-line">
		 			<span class="tailor-title"><?php echo lang('mobile_personal_tailor_form_house_language_message');?></span>
		 			<select class="form-control tailor-select" id="language" style="padding-left:10px">
		 					<option value="0"><?php echo lang('mobile_personal_tailor_form_house_language_message1');?></option>
						 	<?php foreach($language as $key=>$value): ?>
						  <option value="<?php echo $key ?>"><?php echo $value ?></option>
							<?php endforeach; ?>
					</select>
		 		</div>
		 		<div class="tailor-input-line no-border">
		 			<p class="tailor-title"><?php echo lang('mobile_personal_tailor_form_house_money_message');?></p>
		 			<div><input type="text" class="form-control tailor-input price" /></div>
		 		</div>
		 		<div class="tailor-input-line no-border">
		 			<div class="textarea-border"><textarea rows="4" class="form-control"  placeholder="<?php echo !lang('is_en')?'其他备注信息':'Remark';?>" id="personalLike"></textarea></div>
		 		</div>
		 		<div class="tailor-input-line text-center no-border" style="padding-top:20px">
		 			<div class="tailor-sub-btn" id="submit"><?php echo lang('mobile_personal_tailor_submit');?></div>
		 		</div>
		 	</div>
		 	<!--  
		 	<div class="tailor-content-foot text-center">
		 		<div class="text-center foot-img"><img src="/public/images/mobile/index/10.png" style="width:75px"></div>
		 	</div>
		 	-->
	 </div>
	 
</div>
<script src="/public/js/is_weixin.js"></script>
<script type="text/javascript">
var isSend = false;
var rangeStart = 500;
var rangeEnd = 3000;
var regPhone = /1[3|4|5|7|8|][0-9]{9}/;
var regCode = /[0-9]{4}/;
var isWeixin = isWeiXin();
 var mySwiper = new Swiper('.slider1',{
      slidesPerView: 'auto',
      pagination: '.swiper-pagination',
  })
 $('#last').click(function(){
	 	$('.slider1').hide();
	 	$('.tailor-content').removeClass('hide');
	 	$(".price").ionRangeSlider({
			min: 500,
			max: 3000,
			from: 500,
			to: 3000,
			type: 'double',//设置类型
			step: 1,
			prefix: "$",//设置数值前缀
			postfix: "/月",
			grid: true,
			onChange: function(obj){
				rangeStart = obj.fromNumber;
				rangeEnd = obj.toNumber;
			},
		    onFinish: function(obj){
					rangeStart = obj.fromNumber;
					rangeEnd = obj.toNumber;
				}
		});
 })
 $('.state_data').change(function(){
		var id = $(this).val();
		$.post('/ajax/get_city_list/'+id,{},function(data){
			if(data.length){
				html2 = '<option value="0">请选择城市</option>';
				$.each(data,function(k,v){
					html2 += '<option value="'+v.id+'">'+v.name_cn+'</option>';
				})
				$('#city_id').html(html2);
			}
		},'json')
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
			$.ajax({
				type:'POST',
				url:'/web/sendAuthCode',
				data:{mobile:userPhone},
				dataType:'json',
				success:function(data){
					if(data.status){
						isSend = true;
						time();
					}else{
						alert(data.msg);
					}
				}
			});
        }
    	
    });
    //倒计时
    var wait = 60;
    function time() {
        if (wait == 0) {
        	isSend = false;
        	$(".getcode").text('验证码');
            wait = 60;
        } else {
        	html = "重发(" + wait + ")";
        	$(".getcode").text(html);
            wait--;
            setTimeout(function() {
                time()
            },
            1000);
        }
    }
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
		var authCode =  $("#authCode").val();
		if(!authCode){
			alert('请输入验证码');
			$("#authCode").focus();
			return false;
		}
		data.authCode = authCode;
		if(email == "") {
			alert("您的邮箱不能为空~");
			$("#email").focus();
			return false;
		}
		if(isWeixin){
			data.isWeixin = 3;
		}else{
			data.isWeixin = 2;
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
				window.location.href = "/mobile/home/MyRequireList";
			}else{
				alert(data.msg);
			}
		},'json');
	});
</script>