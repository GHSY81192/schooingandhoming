<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.css" />
<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.skinHTML5.css" id="styleSrc"/>
<script src="/public/js/ion.rangeSlider.js"></script>
<link rel="stylesheet" href="/public/css/web/schoollist.css" />
<div class="school-list-bg">
	<div class="container">
<!--		<p><a href="/">--><?php //echo !lang('is_en')?'首页':'Home'; ?><!--</a> > --><?php //echo !lang('is_en')?'学校列表':'School list'; ?><!--</p>-->
		<div class="school-content">
			<!-- <p class="s_title">搜学校</p> -->
			<div class="map_box">
				<div id='WDC' data-val="47" class="state_pos">华盛顿州<div></div></div>
				<div id='OR' data-val="37" class="state_pos">俄勒冈州<div></div></div>
				<div id='CA' data-val="5" class="state_pos">加利福尼亚州<div></div></div>
				<div id='NV' data-val="28" class="state_pos">内华达州<div></div></div>
				<div id='ID' data-val="12" class="state_pos">爱达荷州<div></div></div>
				<div id='MT' data-val="26" class="state_pos">蒙大拿州<div></div></div>
				<div id='AL' data-val="1" class="state_pos">阿拉巴马州<div></div></div>
				<div id='AK' data-val="2" class="state_pos">阿拉斯加州<div></div></div>
				<div id='AZ' data-val="3" class="state_pos">亚利桑那州<div></div></div>
				<div id='CO' data-val="6" class="state_pos">科罗拉多州<div></div></div>
				<div id='CT' data-val="7" class="state_pos">康涅狄格州<div></div></div>
				<div id='FL' data-val="9" class="state_pos">佛罗里达州<div></div></div>
				<div id='GA' data-val="10" class="state_pos">乔治亚州<div></div></div>
				<div id='HI' data-val="11" class="state_pos">夏威夷州<div></div></div>
				<div id='IL' data-val="13" class="state_pos">伊利诺伊州<div></div></div>
				<div id='IN' data-val="14" class="state_pos">印第<br>安纳州<div></div></div>
				<div id='NY' data-val="32" class="state_pos">纽约州<div></div></div>
				<div id='NC' data-val="33" class="state_pos">北卡罗来纳州<div></div></div>
				<div id='SC' data-val="40" class="state_pos">南卡罗来纳州<div></div></div>
				<div id='UT' data-val="44" class="state_pos">犹他州<div></div></div>
				<div id='WY' data-val="50" class="state_pos">怀俄明州<div></div></div>
				<div id='TX' data-val="43" class="state_pos">德克萨斯州<div></div></div>
				<div id='NM' data-val="31" class="state_pos">新墨西哥州<div></div></div>
				<div id='ND' data-val="34" class="state_pos">北达科他州<div></div></div>
				<div id='MO' data-val="25" class="state_pos">密苏里州<div></div></div>
				<div id='AR' data-val="4" class="state_pos">阿肯色州<div></div></div>
				<div id='SD' data-val="41" class="state_pos">南达科他州<div></div></div>
				<div id='NE' data-val="27" class="state_pos">内布拉斯加州<div></div></div>
				<div id='KS' data-val="16" class="state_pos">堪萨斯州<div></div></div>
				<div id='OK' data-val="36" class="state_pos">俄克拉荷马州<div></div></div>
				<div id='MN' data-val="23" class="state_pos">明尼<br>苏达州<div></div></div>
				<div id='IA' data-val="15" class="state_pos">爱荷华州<div></div></div>
				<div id='WI' data-val="49" class="state_pos">威斯康星州<div></div></div>
				<div id='MI' data-val="22" class="state_pos">密执安州<div></div></div>
				<div id='TN' data-val="42" class="state_pos">田纳西州<div></div></div>
				<div id='ME' data-val="19" class="state_pos">缅因州<div></div></div>
				<div id='OH' data-val="35" class="state_pos">俄亥俄州<div></div></div>
				<div id='KY' data-val="17" class="state_pos">肯塔基州<div></div></div>
				<div id='VA' data-val="46" class="state_pos">弗吉尼亚州<div></div></div>
				<div id='PA' data-val="38" class="state_pos">宾夕法尼亚州<div></div></div>
				<div id='NJ' data-val="30" class="state_pos">新泽西州<div></div></div>
				<div id='MS' data-val="24" class="state_pos">密西西<br>比州<div></div></div>
				<div id='WV' data-val="48" class="state_pos">西弗吉<br>尼亚州<div></div></div>
				<div id='MD' data-val="20" class="state_pos">马里<br>兰州<div></div></div>
				<div id='DE' data-val="8" class="state_pos">特拉华州<div></div></div>
				<div id='VT' data-val="45" class="state_pos">佛蒙特州<div></div></div>
				<div id='LA' data-val="18" class="state_pos">路易斯安那州<div></div></div>
				<div id='NH' data-val="29" class="state_pos">新罕布什尔州<div></div></div>
				<div id='RI' data-val="39" class="state_pos">罗得岛州<div></div></div>
				<div id='MA' data-val="21" class="state_pos">麻萨诸塞州<div></div></div>


			</div>

			<form class="form-horizontal search-form" id="schoolForm" role="form">
				  <div class="form-group form-group1 row" >
				    	<div class="col-md-2 search-title"><img src="/public/images/icon/s1.png" class="iconImg"><?php echo lang('search_school_type_message') ?></div>
				    	<div class="col-md-9">
				    		<div class="row">
						    	<div class="cur col-md-3">
						    		<div class="form-control chose-tag" data-val="1"><?php echo lang('search_school_type1_message') ?></div>
									<img src="/public/images/web/schoollist/<?php if(strstr(@$ret['basic_school_type'], '1')):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
							  	</div>
							  	<div class="cur col-md-3">
									<div class="form-control chose-tag" data-val="2"><?php echo lang('search_school_type2_message') ?></div>
									<img src="/public/images/web/schoollist/<?php if(strstr(@$ret['basic_school_type'], '2')):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
							  	</div>
							  	<div class="cur col-md-3">
							  		<div class="form-control chose-tag" data-val="3"><?php echo lang('search_school_type3_message') ?></div>
									<img src="/public/images/web/schoollist/<?php if(strstr(@$ret['basic_school_type'], '3')):?>11<?php else:?>10<?php endif;?>.png".png" class="ab s-school-show-icon">
							  	</div>
							  	<input type="hidden" name="basic_school_type" value="<?=@$ret['basic_school_type'];?>"  />
						  	</div>
					  	</div>
				  </div>
				  <div class="form-group form-group1 row">
				    	<div class="col-md-2 search-title search-title2"><img src="/public/images/icon/s2.png" class="iconImg"><?php echo lang('search_school_level_message') ?></div>
					    <div class="col-md-9">
				    		<div class="row">	
				    			<?php foreach ($grade as $v):?>
						  		<div class="cur col-md-3">
						  		<?php 
					    			$s=preg_match_all('/\d+/',$v['remark'],$arr);
					    			$result=@$arr[0][0].'-'.@$arr[0][1];
					    		?>
						    		<div class="form-control chose-tag one-line" data-val="<?=$result?>" ><?php echo !lang('is_en')?$v['remark']:$v['remark_en']; ?></div>
									<img src="/public/images/web/schoollist/<?php if( strstr(@$ret['basic_grade'], $result) ):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
							  	</div>
						  		<?php endforeach;?>
							  	<input type="hidden" name="basic_grade" value="<?=@$ret['basic_grade'];?>" />
						  	</div>
						  </div>
				  </div>


				<div class="form-group form-group1 row">
					<div class="col-md-2 search-title"><img src="/public/images/icon/s5.png" class="iconImg"><?php echo lang('search_peoper_count_message') ?></div>
					<div class="col-md-9">
						<div class="row">
							<div class="cur col-md-9">
								<input type="text" class="num" />
							</div>
						</div>
					</div>
					<input type="hidden" name="basic_school_enrollments_min" value="<?=@$ret['basic_school_enrollments_min']?>"/>
					<input type="hidden" name="basic_school_enrollments_max" value="<?=@$ret['basic_school_enrollments_max']?>"/>
				</div>
				<div class="form-group form-group1 row" >
					<div class="col-md-2 search-title search-title3"><img src="/public/images/icon/s4.png" class="iconImg"><?php echo lang('search_money_message') ?></div>
					<div class="col-md-9">
						<div class="row">
							<div class="cur col-md-9">
								<input type="text" class="price" />
							</div>
						</div>
					</div>
					<input type="hidden" name="financial_tuition_min" value="<?=$ret['financial_tuition_min']?>" />
					<input type="hidden" name="financial_tuition_max" value="<?=$ret['financial_tuition_max']?>" />
				</div>

				<div class="form-group form-group1 row">
					<div class="col-md-2 search-title search-title2"><img src="/public/images/icon/s3.png" class="iconImg"><?php echo lang('school_detail_ap_message') ?></div>
					<div class="col-md-9">
						<div class="row">
							<div class="cur col-md-3">
								<div class="form-control chose-tag" data-val="9" ><?php echo lang('search_ap1') ?></div>
								<img src="/public/images/web/schoollist/<?php if( strstr(@$ret['ap'], '9') ):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
							</div>
							<div class="cur col-md-3">
								<div class="cur form-control chose-tag" data-val="12"><?php echo lang('search_ap2') ?></div>
								<img src="/public/images/web/schoollist/<?php if( strstr(@$ret['ap'], '12') ):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
							</div>
							<div class="cur col-md-3">
								<div class="cur form-control chose-tag" data-val="17"><?php echo lang('search_ap3') ?></div>
								<img src="/public/images/web/schoollist/<?php if( strstr(@$ret['ap'], '17') ):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
							</div>
							<div class="cur col-md-3">
								<div class="cur form-control chose-tag" data-val="21"><?php echo lang('search_ap4') ?></div>
								<img src="/public/images/web/schoollist/<?php if( strstr(@$ret['ap'], '21') ):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
							</div>
							<input type="hidden" name="ap" value="<?=@$ret['ap'];?>" />
						</div>
					</div>
				</div>

					
			</form>
		</div>
		 <div style="background-color:#f4f4f4;padding:20px 0px 20px 40px;border:1px solid #cccccc;border-top:0px;text-align: center;">
	    		<!-- <a class="btn btn-default cancel-btn" id="cancelBtn" style="background-color:#fff;border:1px solid #aaaaaa"><?php echo lang('search_cancel_message') ?></a>
	    		<a class="btn btn-default cancel-btn" id="addMore" style="background-color:#fff;border:1px solid #5078b5"><?php echo lang('search_more_btn') ?></a> -->
	    		<a class="btn btn-default cancel-btn" id="subBtn" style="background-color:#5078b5;color:#ffffff;border:1px solid #5078b5"><?php echo lang('search_filter_message2') ?></a>
	    		<span><?php if( !lang('is_en') ):?>共<?php echo $count;?>所学校<?php else:?>Find <?php echo $count;?> Schools<?php endif;?></span>
	  	</div>
	  	<table class="table border-table" id="gps" style="margin-top:20px;">
			<tr style="background: #ececec">
				<th class="text-center td1">学校照片</th>
				<th class="text-center td2">学校名称</th>
				<th class="text-center td3">学校信息</th>
				<th class="text-center td3">城市/州</th>
				<th class="text-center td3">学校类型</th>
				<th class="text-center td3">年级</th>
				<th class="text-center td3">学校人数</th>
				<th class="text-center td3">学费</th>
			</tr>
			<tr><td colspan="7" style="height:5px;background-color:#ffffff;padding:0px;border:none"></td></tr>
			<?php foreach ($data as $k => $item):?>
				<tr class="cur <?=$k%2==0?'tr1':'tr2';?>" onclick="document.location.href='http://www.schoolingandhoming.com/web/schoolDetail/<?=$item['id']?>';">
					<td class="td1 img-td td-border td-color">
						<div><img src="/upload/<?php echo get_filepath_by_route_id(0,$item['school_logo'],1) ?>" /></div>
					</td>
					<td class="text-center td2 td-border">
						<div style="text-align: left">
							<div class="schoolInfoList">学校名称：<?php echo $item['name_cn'] ?></div>
							<div class="schoolInfoList">英文名称：<?php echo $item['name_en'] ?></div>
						</div>
					</td>

					<td class="text-center td4 td-border">
						<div style="text-align: left">
							<div class="">成立时间：<?php echo substr($item['basic_createtime'], 0, strpos($item['basic_createtime'], '-')) ?></div>
							<div class="">住宿类型：<?php echo $item['suggest_house']?$item['suggest_house']:'N/A'; ?></div>
						</div>
					</td>
					<td class="text-center td3 td-border"><?php echo $item['city_name'] ?></td>
					<td class="text-center td3 td-border"><?php switch ($item['school_type']) {
						case '男校':
							echo '<img width="50px" height="50px" src="/public/images/web/man.png">';
							break;
						case '女校':
							echo '<img width="50px" height="50px" src="/public/images/web/woman.png">';
							break;
						case '混校':
							echo '<img width="50px" height="50px" src="/public/images/web/all.png">';
							break;
						default:
							echo 'N/A';
							break;
					} $item['school_type'] ?></td>
					<td class="text-center td3 td-border"><?php echo $item['basic_grade_start'] ?>-<?php echo $item['basic_grade_end'] ?></td>
					<td class="text-center td3 td-border"><?php echo $item['basic_school_enrollments']?$item['basic_school_enrollments']:'N/A' ?></td>
					<td class="text-center td3 td-border td-border-right"><?php echo $item['financial_tuition']?'$'.$item['financial_tuition'].'/年':'N/A' ?></td>
				</tr>
				<tr><td colspan="8" style="height:5px;background-color:#ffffff;padding:0px;border:none"></td></tr>
			<?php endforeach;?>
		</table>

		<div class="clearfix">
			<?php if ($count > 8):?>
			<ul class="pagination" style="padding:10px 20px 0px 0px"><li><?php if(lang('is_en')):?><?php echo $count%8==0?(int)($count/8):(int)($count/8)+1;?> Pages， <?php else:?>共<?php echo $count%8==0?(int)($count/8):(int)($count/8)+1;?>页，<?php endif;?></li></ul>
			<?php endif;?>
			<?php echo $this->pagination->create_links(); ?>
			
		</div>
	</div>
</div>
<script type="text/javascript">

$(function(){
	var url = location.search; 
	console.log(url);
	if(url && url != '?type=1&name='){
		$("html,body").animate({scrollTop:$("#gps").offset().top - 100},1000);
	}
});

$('#addMore').click(function(){
	$('#hideSearch').removeClass('hide');
})
$('#cancelBtn').click(function(){
	location.href="/web/schoolList";
})

$(".price").ionRangeSlider({
		min: 0,
		max: 80000,
		from: <?php echo empty($ret['financial_tuition_min'])?0:$ret['financial_tuition_min']?>,
		to: <?php echo empty($ret['financial_tuition_max'])?80000:$ret['financial_tuition_max']?>,
		type: 'double',//设置类型
		step: 1,
		prefix: "$",//设置数值前缀
		grid: true,
	    onChange: saveResult,
	    onFinish: saveResult
});
$(".num").ionRangeSlider({
	min: 0,
	max: 10000,
	from:<?php echo empty($ret['basic_school_enrollments_min'])?0:$ret['basic_school_enrollments_min']?>,
	to: <?php echo empty($ret['basic_school_enrollments_max'])?10000:$ret['basic_school_enrollments_max']?>,
	type: 'double',//设置类型
	step: 1,
	postfix: "人",
	grid: true,
	onChange: saveResult2,
	onFinish: saveResult2
});
function saveResult(data) {
    from = data.fromNumber;
    to = data.toNumber;
    $('input[name=financial_tuition_min]').val(from);
    $('input[name=financial_tuition_max]').val(to);
};
function saveResult2(data) {
    from2 = data.fromNumber;
    to2 = data.toNumber;
    $('input[name=basic_school_enrollments_min]').val(from2);
    $('input[name=basic_school_enrollments_max]').val(to2);
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
$('.sort-img').click(function(){
	var sort_type = $('input[name=sort_type]').val();
	if(sort_type == 'desc'){
		sort_type = 'asc';
	}else{
		sort_type = 'desc';
	}
	$('input[name=sort_type]').val(sort_type);
	$('input[name=sort]').val( $(this).attr('data-name') );
	var data = $('#schoolForm').serialize();
	location.href="/web/schoolList?"+data;
})
$('#subBtn').click(function(){
		var data = $('#schoolForm').serialize();
		location.href="/web/schoolList?"+data;
});


$('.state_pos').hover(function(){
	var data = $('#schoolForm').serialize();
	var id = $(this).attr('data-val');
	var url = window.location.href;
	$(this).css('color','red');
	$(this).find('div').before('<div class="info-box" style="z-index:1;height:47px;width:192px;background:url(\'/public/images/web/schoollist/lay-box.png\');line-height:48px;position:relative;right:68px;color: #999;text-align: center;"><a href="/web/schoolList?'+data+'&state_id='+id+'&suggest_house=寄宿">寄宿</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/web/schoolList?'+data+'&state_id='+id+'&suggest_house=走读">走读</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/web/schoolList?'+data+'&state_id='+id+'&suggest_house=走读%2B寄宿">走读和寄宿</a></div>');
	
},function(){
	$(this).css('color','#5377ac');
	$(this).find('.info-box').remove();
})
</script>