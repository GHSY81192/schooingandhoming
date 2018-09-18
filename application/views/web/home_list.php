<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.css" />
<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.skinHTML5.css" id="styleSrc"/>
<script src="/public/js/ion.rangeSlider.js"></script>
<link rel="stylesheet" href="/public/css/web/schoollist.css" />
<div class="school-list-bg">
	<div class="container">
<!--		<p><a href="/">--><?php //echo !lang('is_en')?'首页':'Home'; ?><!--</a> > --><?php //echo !lang('is_en')?'住家列表':'Home list'; ?><!--</p>-->
		<div class="school-content">
			<form id="houseForm" class="form-horizontal search-form" role="form">
				<div class="form-group form-group1 row">
			    	<div class="col-md-2 search-title"><img src="/public/images/icon/h1.png" class="iconImg"><?php echo lang('home_detail_basic_house_type_message') ?></div>
			    	<div class="col-md-9">
			    		<div class="row search-menu-row">
					    	<div class="cur col-md-3">
					    		<div class="cur form-control chose-tag" data-val="3"><?php echo lang('search_house_type1') ?></div>
								<img src="/public/images/web/schoollist/<?php if(strstr(@$ret['house_type'], '3')):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
						  	</div>
						  	<div class="cur col-md-3">
								<div class="cur form-control chose-tag" data-val="2"><?php echo lang('search_house_type2') ?></div>
								<img src="/public/images/web/schoollist/<?php if(strstr(@$ret['house_type'], '2')):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
						  	</div>
						  	<div class="cur col-md-3">
						  		<div class="cur form-control chose-tag" data-val="1"><?php echo lang('search_house_type3') ?></div>
								<img src="/public/images/web/schoollist/<?php if(strstr(@$ret['house_type'], '1')):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
						  	</div>
						  	<input type="hidden" name="house_type" value="<?=@$ret['house_type'];?>"  />
					  	</div>
				  	</div>
			  </div>
			  <div class="form-group form-group1 row">
			    	<div class="col-md-2 search-title search-title1"><img src="/public/images/icon/more5.png" class="iconImg"><?php echo lang('search_house_race') ?></div>
				    <div class="col-md-9">
			    		<div class="row search-menu-row">	
					    	<div class="cur col-md-3">
					    		<div class="cur form-control chose-tag" data-val="1" ><?php echo lang('search_house_race1') ?></div>
								<img src="/public/images/web/schoollist/<?php if( strstr(@$ret['race'], '1') ):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
						  	</div>
						  	<div class="cur col-md-3">
						  		<div class="cur form-control chose-tag" data-val="2"><?php echo lang('search_house_race2') ?></div>
								<img src="/public/images/web/schoollist/<?php if( strstr(@$ret['race'], '2') ):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
						  	</div>
						  	<div class="cur col-md-3">
						  		<div class="cur form-control chose-tag" data-val="3"><?php echo lang('search_house_race3') ?></div>
								<img src="/public/images/web/schoollist/<?php if( strstr(@$ret['race'], '3') ):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
						  	</div>
						  	<input type="hidden" name="race" value="<?=@$ret['race'];?>" />
					  	</div>
					  </div>
			  </div>
				<div class="form-group form-group1 row">
					<div class="col-md-2 search-title search-title3"><img src="/public/images/icon/h3.png" class="iconImg"><?php echo lang('search_house_pet') ?></div>
					<div class="col-md-9">
						<div class="row search-menu-row">
							<div class="cur col-md-3">
								<div class="cur form-control chose-tag" data-val="1"><?php echo lang('search_house_pet1') ?></div>
								<img src="/public/images/web/schoollist/<?php if( strstr(@$ret['family_pet'], '1') ):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
							</div>
							<div class="cur col-md-3">
								<div class="cur form-control chose-tag" data-val="0"><?php echo lang('search_house_pet2') ?></div>
								<img src="/public/images/web/schoollist/<?php if( strpos(@$ret['family_pet'], '0') ):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
							</div>
							<input type="hidden" name="family_pet" value="<?=@$ret['family_pet'];?>" />
						</div>
					</div>
				</div>
			  <div class="form-group form-group1 row">
			    	<div class="col-md-2 search-title search-title2"><img src="/public/images/icon/h4.png" class="iconImg"><?php echo lang('web_search_house_price') ?></div>
			    	<div class="col-md-9">
			    		<div class="row">
			    			<div class="cur col-md-9">
								<input type="text" class="price" />
							</div>
						</div>
					</div>
				  	<input type="hidden" name="financial_tuition_min" />
				  	<input type="hidden" name="financial_tuition_max" />
			  </div>
			  <div <?php if(empty($ret['family_pet']) && empty($ret['language']) && empty($ret['profession']) ):?> class="hide"<?php endif;?>  id="hideSearch">

				  <div class="form-group form-group1 row">
				  		<div class="col-md-2 search-title search-title4"><img src="/public/images/icon/more2.png" class="iconImg"><?php echo lang('home_detail_member_language_message') ?></div>
				    	<div class="col-md-9">
				    		<div class="row search-menu-row">
						    	<div class="cur col-md-3">
						    		<div class="cur form-control chose-tag" data-val="2"><?php echo lang('search_house_language1') ?></div>
									<img src="/public/images/web/schoollist/<?php if( strstr(@$ret['language'], '2') ):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
							  	</div>
						    	<div class="cur col-md-3">
									<div class="cur form-control chose-tag" data-val="1"><?php echo lang('search_house_language2') ?></div>
									<img src="/public/images/web/schoollist/<?php if( strstr(@$ret['language'], '1') ):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
							  	</div>
							  	<input type="hidden" name="language" value="<?=@$ret['language'];?>" />
							 </div>
						</div>
			  	</div>
			  	
			  	<div class="form-group form-group1 row">
			    	<div class="col-md-2 search-title search-title5"><img src="/public/images/icon/h6.png" class="iconImg">主要职业</div>
			    	<div class="col-md-9">
			    		<div class="row search-menu-row">
						    <?php foreach($profession as $k=>$v):?>
			    			<div class="cur col-md-3 ap-list">
					    		<div class="form-control chose-tag" data-val="<?=$v;?>" ><?=$v;?></div>
								<img src="/public/images/web/schoollist/<?php if( strstr(@$ret['profession'], $v) ):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
						  	</div>
						  	<?php endforeach;?>
						  	<input type="hidden" name="profession" value="<?=@$ret['profession'];?>" />
						</div>
				  	</div>
			  </div>
			  <input type="hidden" name="sort" value="<?=$ret['sort'];?>" />
			 <input type="hidden" name="sort_type" value="<?=$ret['sort_type'];?>" />
			 </div>	  
			</form>
		</div>
		 <div style="background-color:#f4f4f4;padding:20px 0px 20px 40px;border:1px solid #cccccc;border-top:0px">
	    		<a class="btn btn-default cancel-btn" id="cancelBtn" style="background-color:#fff;border:1px solid #aaaaaa"><?php echo lang('search_cancel_message') ?></a>
	    		<a class="btn btn-default cancel-btn" id="addMore" style="background-color:#fff;border:1px solid #5078b5"><?php echo lang('search_more_btn') ?></a>
	    		<a class="btn btn-default cancel-btn" id="subBtn" style="background-color:#5078b5;color:#ffffff;border:1px solid #5078b5"><?php echo lang('search_filter_message2') ?></a>
	    		<span><?php if( !lang('is_en') ):?>共<?php echo $count;?>所住家<?php else:?>Find <?php echo $count;?> House<?php endif;?></span>
	  	</div>
		<table class="table border-table" style="margin-top:10px;">
			<tr style="background: #ececec">
				<th class="text-center td1">住家照片</th>
				<th class="text-center td2">住家信息</th>
				<th class="text-center td3">城市/州</th>
				<th class="text-center td3">住家类型</th>
				<th class="text-center td3">种族背景</th>
				<th class="text-center td3">主要职业</th>
				<th class="text-center td3">月租金</th>
			</tr>
			<tr><td colspan="7" style="height:5px;background-color:#ffffff;padding:0px;border:none"></td></tr>
			<?php foreach ($data as $k => $item):?>
				<tr class="cur <?=$k%2==0?'tr1':'tr2';?>" onclick="document.location.href='/web/Home_Detail/<?=$item['id']?>';">
					<td class="td1 img-td td-border td-color">
						<div><img style="height: 129px;width: 213px" src="/upload/userhome/<?=$item['index_hot_cover'] ?>" /></div>
					</td>

					<td class="text-center td2 td-border">
						<div style="text-align: left">
							<div class="schoolInfoList">房东名字：<?php echo $item['hostname'] ?></div>
							<div class="schoolInfoList">房屋面积：<?php echo $item['area'] ?></div>
							<div class="schoolInfoList">建造时间：<?php echo $item['buildY'].'-'.$item['buildM'] ?></div>
							<div class="schoolInfoList">宗教信仰：<?php echo $this->config->item('religion')[$item['religion']] ?></div>
						</div>
					</td>
					<td class="text-center td3 td-border"><?php echo $item['city_name'] ?></td>
					<td class="text-center td3 td-border"><?php echo $this->config->item('house_type')[$item['house_type']] ?></td>
					<td class="text-center td3 td-border"><?php echo $this->config->item('race')[$item['race']] ?></td>
					<td class="text-center td3 td-border"><?php echo $item['profession'] ?></td>
					<td class="text-center td3 td-border td-border-right">$<?php echo $item['price'] ?>/月</td>
				</tr>
				<tr><td colspan="7" style="height:5px;background-color:#ffffff;padding:0px;border:none"></td></tr>
			<?php endforeach;?>
		</table>
		<div class="clearfix">
			<?php if ($count > 15):?>
				<ul class="pagination" style="padding:10px 20px 0px 0px"><li><?php if(lang('is_en')):?><?php echo (int)($count/15)+1;?> Pages， <?php else:?>共<?php echo (int)($count/15)+1;?>页，<?php endif;?></li></ul>
			<?php endif;?>
			<?php echo $this->pagination->create_links(); ?>

		</div>
	</div>
</div>
<script type="text/javascript">
$('#addMore').click(function(){
	$('#hideSearch').removeClass('hide');
})
$('#cancelBtn').click(function(){
	location.href="/web/homeList";
})
$(".price").ionRangeSlider({
		min: 0,
		max: 10000,
		from: <?php echo empty($ret['financial_tuition_min'])?0:$ret['financial_tuition_min']?>,
		to: <?php echo empty($ret['financial_tuition_max'])?10000:$ret['financial_tuition_max']?>,
		type: 'double',//设置类型
		step: 1,
		prefix: "$",//设置数值前缀
		postfix: "<?php echo !lang('is_en')?"/月":"/Month" ?>",//设置数值前缀
		grid: true,
	    onChange: saveResult,
	    onFinish: saveResult
	});
function saveResult(data) {
    from = data.fromNumber;
    to = data.toNumber;
    $('input[name=financial_tuition_min]').val(from);
    $('input[name=financial_tuition_max]').val(to);
};





$('.chose-tag').click(function(){
	var data_val = $(this).parent().parent().find('input[type=hidden]').val();
	if(	$(this).next('img').attr("src") == "/public/images/web/schoollist/10.png" ){
  		add_val = $(this).attr('data-val');
  		if(data_val.indexOf(add_val) <0){
  			data_val += ','+add_val;
  			$(this).parent().parent().find('input[type=hidden]').val(data_val);
  		}
  		$(this).next('img').attr("src","/public/images/web/schoollist/11.png");
	}else{
		$(this).next('img').attr("src","/public/images/web/schoollist/10.png");
		del_val = $(this).attr('data-val');
		if(data_val.indexOf(del_val) >=0){	//有就去掉
  			data_val = data_val.replace(','+del_val,'');
  			$(this).parent().parent().find('input[type=hidden]').val(data_val);
  		}
		
	}
})

//排序
$('.sort-img').click(function(){
	var sort_type = $('input[name=sort_type]').val();
	if(sort_type == 'desc'){
		sort_type = 'asc';
	}else{
		sort_type = 'desc';
	}
	$('input[name=sort_type]').val(sort_type);
	$('input[name=sort]').val( $(this).attr('data-name') );
	var data = $('#houseForm').serialize();
	location.href="/web/homeList?"+data;
})

$('#subBtn').click(function(){
		var data = $('#houseForm').serialize();
		location.href="/web/homeList?"+data;
})


</script>
