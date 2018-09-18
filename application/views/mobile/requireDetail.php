<script type="text/javascript" src="/public/js/swiper.min.js"></script>
<link rel="stylesheet" href="/public/css/mobile/swiper.min.css">
<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.css" />
<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.skinHTML5.css" id="styleSrc"/>
<script src="/public/js/ion.rangeSlider.js"></script> 
<link rel="stylesheet" href="/public/css/mobile/personal_tailor.css">
<?php if (!empty($data)):?>
<div class="container">
	 <div class="tailor-content">
	 		<img src="/public/images/mobile/personal_tailor/6.png" />
	 		<div class="tailor-content-data">
		 		<div class="text-center font-18 tailor-top-title">- <?php echo lang('personal_tailor_form_title2_message');?> -</div>
		 		<div class="tailor-input-line">
		 			<span class="tailor-title"><?php echo lang('personal_tailor_form_name_message');?>:</span>
		 			<span><?php echo empty($data['name'])?'未填写':$data['name']?></span>
		 		</div>
		 		<div class="tailor-input-line">
		 			<span class="tailor-title"><?php echo lang('personal_tailor_form_age_message');?>:</span>
		 			<span><?php echo empty($data['age'])?'未填写':$data['age']?></span>
		 		</div>
		 		<div class="tailor-input-line rl">
		 			<span class="tailor-title"><?php echo lang('personal_tailor_form_phone_message');?>:</span>
		 			<span><?php echo empty($data['phone'])?'未填写':$data['phone']?></span>
		 		</div>
		 		<div class="tailor-input-line">
		 			<span class="tailor-title"><?php echo lang('personal_tailor_form_email_message');?>:</span>
		 			<span><?php echo empty($data['email'])?'未填写':$data['email']?></span>
		 		</div>
		 		<div class="tailor-input-line">
		 			<span class="tailor-title"><?php echo lang('personal_tailor_form_school_message');?>:</span>
		 			<span><?php echo empty($data['school'])?'未填写':$data['school']?></span>
		 		</div>
		 		<div class="tailor-input-line">
		 			<span class="tailor-title"><?php echo lang('personal_tailor_form_gender_message');?>:</span>
		 			<?php 
		 				if($data['sex'] == 0){
		 					$sex = lang('mobile_personal_tailor_form_house_gender_message');
		 				}elseif ($data['sex'] == 1){
		 					$sex = lang('personal_tailor_form_gender_man_message');
		 				}else{
		 					$sex = '未填写';
		 				}
		 			?>
		 			<span><?=$sex?></span>
		 		</div>
		 	</div>
		 	<div class="taitor-line">&nbsp;</div>
		 	<div class="tailor-content-data">
		 		<div class="text-center font-18 tailor-top-title">- <?php echo lang('personal_tailor_form_house_title_message');?> -</div>
		 		<div class="tailor-input-line">
		 			<span class="tailor-title"><?php echo lang('personal_tailor_form_house_address_message');?>:</span>
		 			<span><?php echo empty($data['location'])?'未填写':$data['location']?></span>
		 		</div>
		 		
		 		<div class="tailor-input-line">
		 			<span class="tailor-title"><?php echo lang('personal_tailor_form_house_language_message');?>:</span>
		 			<span><?php echo empty($data['language'])?'未填写':$data['language']?></span>
		 		</div>
		 		<div class="tailor-input-line">
		 			<span class="tailor-title"><?php echo lang('personal_tailor_form_house_money_message');?>:</span>
		 			<span><?php if(empty($data['range_start']) && empty($data['range_end'])):?> 未设置<?php else :?>$<?=$data['range_start']?> - $<?=$data['range_end']?> <?php endif;?></span>
		 		</div>
		 		<div class="tailor-input-line no-border">
		 			<span class="tailor-title"><?php echo !lang('is_en')?'备注信息':'Remark';?>:</span>
		 			<span><?php echo empty($data['personal_like'])?'未填写':$data['personal_like'];?></span>
		 		</div>
		 	</div>
	 </div>
	 
</div>
<?php endif;?>