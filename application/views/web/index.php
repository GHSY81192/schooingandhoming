<link rel="stylesheet" href="/public/layui/css/layui.css" media="all">
<link rel="stylesheet" href="/public/css/web/index.css">
<script src="/public/js/jquery.SuperSlide.2.1.1.js"></script>
<div class="head-banner">
	<!--banner选项卡 start-->
	<div class="banner-tab-box">
		<div class="layui-tab layui-tab-card banner-layui-tab-card" style="border: 0;<?=lang('is_en')?'width:480px':''?>">
			<ul class="layui-tab-title banner-layui-tab-title">
				<li style="border-bottom: 1px solid #FFF" class="layui-this"><?php echo lang('header_school') ?></li>
				<li style="border-bottom: 1px solid #FFF"><?php echo lang('header_home') ?></li>
				<li style="border-bottom: 1px solid #FFF"><?php echo lang('summer_program') ?></li>
				<li><?php echo lang('Summer_Camp') ?></li>
			</ul>
			<div class="layui-tab-content banner-tab-content">
				<div class="layui-tab-item layui-show">
					<form class="layui-form layui-row" action="/web/schoolList">
						<table class="banner-table">
							<tr>
								<td>
									<select name="basic_school_type" lay-verify="" class="layui-col-md6" >
										<option value=""><?=lang('search_school_type_message')?></option>
										<option value="1"><?=lang('search_school_type1_message')?></option>
										<option value="2"><?=lang('search_school_type2_message')?></option>
										<option value="3"><?=lang('search_school_type3_message')?></option>
									</select>
								</td>
								<td>
									<select name="basic_grade" lay-verify="" class="layui-col-md6">
										<option value=""><?=lang('search_school_level_message')?></option>
										<option value="9-12"><?=lang('search_school_level5_message')?></option>
										<option value="6-8"><?=lang('search_school_level4_message')?></option>
										<option value="1-5"><?=lang('search_school_level3_message')?></option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<select name="banner_search_people" lay-verify="" class="layui-col-md6" >
										<option value=""><?=lang('search_peoper_count_message')?></option>
										<option value="1">0-100</option>
										<option value="2">101-500</option>
										<option value="3">501-1000</option>
										<option value="4">1001+</option>
									</select>
								</td>
								<td>
									<select name="banner_search_tuition" lay-verify="" class="layui-col-md6">
										<option value=""><?=lang('school_detail_financial_tuition_message')?></option>
										<option value="1">$0-$10000</option>
										<option value="2">$10000-$20000</option>
										<option value="3">$20001-$30000</option>
										<option value="4">$30001-$40000</option>
										<option value="5">$40001-$50000</option>
										<option value="6">$50001+</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<select name="ap" lay-verify="" class="layui-col-md6" >
										<option value=""><?=lang('school_detail_ap_message')?></option>
										<option value="9">0-10</option>
										<option value="12">10-15</option>
										<option value="17">16-20</option>
										<option value="21">20+</option>
									</select>
								</td>
								<td>
									<select name="state_id" lay-verify="" class="layui-col-md6">
										<option value=""><?=lang('search_address_message')?></option>
										<?php foreach($state as $v):?>
											<option value="<?=$v['id']?>"><?=lang('is_en')?$v['name_en']:$v['name_cn']?></option>
										<?php endforeach;?>
									</select>
								</td>
							</tr>
						</table>
						<button class="layui-btn">
							<i class="layui-icon">&#xe615;</i> <?=lang('search')?>
						</button>

					</form>
				</div>
				<div class="layui-tab-item">
					<form class="layui-form layui-row" action="/web/homeList">
						<table class="banner-table">
							<tr>
								<td>
									<select name="house_type" lay-verify="" class="layui-col-md6" >
										<option value=""><?=lang('home_detail_basic_house_type_message')?></option>
										<option value="3"><?=lang('search_house_type1')?></option>
										<option value="2"><?=lang('search_house_type2')?></option>
										<option value="1"><?=lang('search_house_type3')?></option>
									</select>
								</td>
								<td>
									<select name="race" lay-verify="" class="layui-col-md6">
										<option value=""><?=lang('search_house_race')?></option>
										<option value="1"><?=lang('search_house_race1')?></option>
										<option value="2"><?=lang('search_house_race2')?></option>
										<option value="3"><?=lang('search_house_race3')?></option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<select name="family_pet" lay-verify="" class="layui-col-md6">
										<option value=""><?=lang('search_house_pet')?></option>
										<option value="1"><?=lang('search_house_pet1')?></option>
										<option value="0"><?=lang('search_house_pet2')?></option>
									</select>
								</td>
								<td>
									<select name="banner_search_home_financial" lay-verify="" class="layui-col-md6">
										<option value=""><?=lang('find_home_title7')?></option>
										<option value="1">0-$1000</option>
										<option value="2">$1001-$3000</option>
										<option value="3">$3001-$5000</option>
										<option value="4">$5001-$7000</option>
										<option value="5">$7001-$9000</option>
										<option value="6">$9001+</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<select name="language" lay-verify="" class="layui-col-md6" >
										<option value=""><?=lang('home_detail_member_language_message')?></option>
										<option value="2"><?=lang('search_house_language1')?></option>
										<option value="1"><?=lang('search_house_language2')?></option>
									</select>
								</td>
								<td>
									<select name="profession" lay-verify="" class="layui-col-md6">
										<option value=""><?=lang('search_house_job')?></option>
										<option value="医生"><?=lang('is_en')?'doctor':'医生'?></option>
										<option value="工程师"><?=lang('is_en')?'engineer':'工程师'?></option>
									</select>
								</td>
							</tr>
						</table>
						<button class="layui-btn">
							<i class="layui-icon">&#xe615;</i> <?=lang('search')?>
						</button>

					</form>
				</div>
				<div class="layui-tab-item">
					<form class="layui-form layui-row" action="/web/SummerMore">
						<table class="banner-table">
							<tr>
								<td>
									<select name="type_id" lay-verify="" class="layui-col-md6" >
										<option value=""><?=lang('Program_Type')?></option>
										<option value="1"><?=lang('Humanities')?></option>
										<option value="2"><?=lang('Science_Research')?></option>
										<option value="3"><?=lang('Pure_Math')?></option>
										<option value="4"><?=lang('Business_Leadership')?></option>
										<option value="5"><?=lang('Science_Math_Engineering')?></option>
										<option value="6"><?=lang('For_Credits')?></option>
										<option value="7"><?=lang('Comprehensive')?></option>
										<option value="8"><?=lang('Disciplines')?></option>
										<option value="9"><?=lang('Medical_Science')?></option>
										<option value="10"><?=lang('Academics')?></option>
										<option value="11"><?=lang('Research')?></option>
									</select>
								</td>
								<td>
									<select name="credit" lay-verify="" class="layui-col-md6">
										<option value=""><?=lang('credits_or_not')?></option>
										<option value="1"><?=lang('YES')?></option>
										<option value="2"><?=lang('NO')?></option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<select name="international" lay-verify="" class="layui-col-md6">
										<option value=""><?=lang('international_students_or_not')?></option>
										<option value="1"><?=lang('YES')?></option>
										<option value="2"><?=lang('NO')?></option>
									</select>
								</td>
								<td>
									<select name="project_period" lay-verify="" class="layui-col-md6">
										<option value=""><?=lang('Program_Duration')?></option>
										<option value="1">1-2 <?=lang('week')?></option>
										<option value="2">3-4 <?=lang('week')?></option>
										<option value="3">5-6 <?=lang('week')?></option>
										<option value="4">7-8 <?=lang('week')?></option>
										<option value="5">9-10 <?=lang('week')?></option>
										<option value="6">11-12 <?=lang('week')?></option>
									</select>
								</td>
							</tr>
						</table>
						<button class="layui-btn" style="margin-top: 59px;">
							<i class="layui-icon">&#xe615;</i> <?=lang('search')?>
						</button>

					</form>
				</div>
				<div class="layui-tab-item">
					<form class="layui-form layui-row" action="/web/CampList">
						<table class="banner-table">
							<tr>
								<td>
									<select name="type_id" lay-verify="" class="layui-col-md6" >
										<option value=""><?=lang('Budget')?></option>
										<option value="1">0-$5000</option>
										<option value="2">$5001-$10000</option>
										<option value="3">$10001-$15000</option>
										<option value="4">$15001-$20000</option>
									</select>
								</td>
								<td>
									<select name="credit" lay-verify="" class="layui-col-md6">
										<option value=""><?=lang('Age')?></option>
										<option value="1">6-8</option>
										<option value="2">8-10</option>
										<option value="3">10-12</option>
										<option value="4">12-14</option>
										<option value="5">12-14</option>
										<option value="6">15+</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>
									<select name="international" lay-verify="" class="layui-col-md6">
										<option value=""><?=lang('English_Language_Requirement')?></option>
										<option value="1"><?=lang('NEED')?></option>
										<option value="2"><?=lang('NO_NEED')?></option>
									</select>
								</td>
								<td>
									<select name="project_period" lay-verify="" class="layui-col-md6">
										<option value=""><?=lang('Camp_Length')?></option>
										<option value="1">10-20<?=lang('Day')?></option>
										<option value="2">21-30<?=lang('Day')?></option>
										<option value="3">31-40<?=lang('Day')?></option>
										<option value="4">41-50<?=lang('Day')?></option>
										<option value="5">51-60<?=lang('Day')?></option>
										<option value="6">61<?=lang('Day')?>+</option>
									</select>
								</td>
							</tr>
						</table>
						<button class="layui-btn" style="margin-top: 59px;">
							<i class="layui-icon">&#xe615;</i> <?=lang('search')?>
						</button>

					</form>
				</div>
			</div>
		</div>
	</div>

	<!--banner选项卡 end-->
	<!--banner轮播 start-->
	<div class="layui-carousel" id="test1" style="clear: both">
		<div carousel-item>
			<?php foreach ($banner as $val):?>
				<div onclick="location.href='<?php echo $val['link']?>'" style="background: url('/upload/<?php echo get_filepath_by_route_id(0,$val['file_name']); ?>') no-repeat center">

				</div>
			<?php endforeach;?>
		</div>
	</div>
	<!--banner轮播 end-->
</div>

<div class="icon_box layui-row">
	<div class="layui-col-xs6 layui-col-md3 icon-md3-1" style="width: 295px;padding: 0 10px 0 0">
		<div class="box-shadow icon_con">
			<img style="<?=lang('is_en')?'bottom:8px':''?>" src="/public/images/web/index-icon1.jpg">
			<div class="txt">
				<b><?=lang('index_intro_title_1_message')?></b>
				<p><?=lang('index_intro_detail_1_message')?></p>
			</div>
		</div>
	</div>
	<div class="layui-col-xs6 layui-col-md3 icon-md3-2" style="width: 305px;padding: 0 10px">
		<div class="box-shadow icon_con">
			<img style="<?=lang('is_en')?'bottom:8px':''?>" src="/public/images/web/index-icon2.jpg">
				<div class="txt">
					<b><?=lang('index_intro_title_2_message')?></b>
					<p><?=lang('index_intro_detail_2_message')?></p>
				</div>
		</div>
	</div>
	<div class="layui-col-xs6 layui-col-md3 icon-md3-3" style="width: 305px;padding: 0 10px">
		<div class="box-shadow icon_con">
			<img style="<?=lang('is_en')?'bottom:8px':''?>" src="/public/images/web/index-icon3.jpg">
				<div class="txt">
					<b><?=lang('index_intro_title_3_message')?></b>
					<p><?=lang('index_intro_detail_3_message')?></p>
				</div>
		</div>
	</div>
	<div class="layui-col-xs6 layui-col-md3 icon-md3-4 " style="width: 295px;padding: 0 0 0 10px">
		<div class="box-shadow icon_con">
			<img style="<?=lang('is_en')?'bottom:8px':''?>" src="/public/images/web/index-icon4.jpg">
				<div class="txt">
					<b><?=lang('index_intro_title_4_message')?></b>
					<p><?=lang('index_intro_detail_4_message')?></p>
				</div>
		</div>
	</div>
</div>

	<div class="layui-row icon_box">
		<div class="layui-col-md6 news-col-md6" >
			<div class="hot-news box-shadow">
				<div style="position: relative">
					<h3 class="index_title_h3"><?=lang('index_hot_info')?></h3>
					<a class="more"><span onclick="location.href='/web/article_list'" style="padding-right: 3px"><?=lang('index_view_all')?></span><span style="position: relative;top: 2px;" class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></a>
					<hr>
				</div>
				<div class="hot-news-box" style="height: 551px;">
					<?php foreach($article as $v):?>
						<div class="layui-row" style="position: relative;margin-bottom: 15px">
							<a href="/web/article_Detail/<?=$v['id']?>" target="_blank">
								<div class="layui-col-xs5 hot-news-box-left" style="background: url('/upload/article/<?=$v['img']?>') no-repeat center;background-size: cover"></div>
							</a>
							<div class="layui-col-xs7 hot-news-box-right">
								<a href="/web/article_Detail/<?=$v['id']?>" target="_blank">
									<h3 class="article-title"><?=$v['title']?></h3>
								</a>
								<p style="color: #999;margin:0;">
									<i class="layui-icon">&#xe637;</i> <?=substr($v['issue_time'],0,10)?>
									<span style="padding-left: 40px">来源：<?=$v['author']?></span>
								</p>
								<a href="/web/article_Detail/<?=$v['id']?>" target="_blank">
									<p class='art-intro'><?=$v['intro']?></p>
								</a>
							</div>
							<div class="article-d-v"><a href="/web/article_Detail/<?=$v['id']?>" target="_blank"><?=lang('view_details')?> <span>↓</span></a></div>
						</div>

					<?php endforeach;?>
				</div>
			</div>
		</div>

		<div class="layui-col-md6 school-col-md6">
			<div class="hot-school box-shadow" style="height: 618px">
				<div style="position: relative;">
					<h3 class="index_title_h3"><?=lang('summer_program')?></h3>
					<a href="/web/SummerMore" class="more"><span style="padding-right: 3px"><?=lang('is_en')?'MORE':'所有项目'?></span><span style="position: relative;top: 2px;" class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></a>
					<hr>
				</div>
				<div class="layui-row hot-school-box">
					<?php foreach($summer_school as $v):?>

						<a href="/web/SummerDetail/<?=$v['id']?>">
							<div class="layui-col-xs4 layui-col-md6" style="margin-bottom: -60px;text-align: center;">
								<div class="img-box">
									<img src="/upload/summer/<?=$v['img']?>" class="indexImg2" />

								</div>
								<div class="hot-school-bg"></div>
								<div class="school_text" style="<?=lang('is_en')?'height:20px;top:-68px;':''?>"><?php echo !lang('is_en')?$v['name_cn']:$v['name_en'];?> <?=$v['state_code']?></div>

							</div>
						</a>
					<?php endforeach;?>
				</div>
			</div>
		</div>



	<div class="layui-col-md12 summer-school box-shadow">
		<div style="position: relative;">
			<h3 class="index_title_h3"><?=lang('index_hot_school_title_message')?></h3>
			<a class="more" href="/web/schoolList"><span style="padding-right: 3px"><?=lang('index_all_school')?></span><span style="position: relative;top: 2px;" class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></a>
			<hr>
		</div>

		<div class="picScroll-left">
			<div class="hd" style="position: relative">
				<div class="next-box-btn-l">
					<a class="next"><i class="layui-icon">&#xe602;</i></a>
				</div>
				<div class="next-box-btn-r">
					<a class="prev"><i class="layui-icon">&#xe603;</i></a>
				</div>
			</div>
			<div class="bd">
				<ul class="picList">
					<?php foreach($hot_school as $v):?>
						<li style="margin-bottom: -60px">
							<div class="pic" style="overflow: hidden">
								<a href="http://www.schoolingandhoming.com/web/schoolDetail/<?php echo $v['id'] ?>">
									<img src="/upload/<?php echo get_filepath_by_route_id($v['id'],$v['index_hot_cover']); ?>" class="indexImg2">
								</a>
							</div>
							<div class="hot-summer-bg" style="<?=lang('is_en')?'height:40px;top:-40px;':''?>"></div>
							<div class="summer_text title" style="<?=lang('is_en')?'top:-76px;':''?>"><?php echo !lang('is_en')?$v['name_cn']:$v['name_en'];?></div>
						</li>
					<?php endforeach;?>
					<li></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="index-school-top20-box layui-col-md12 box-shadow">
		<div class="layui-tab layui-tab-card top-tab-card">
			<ul class="layui-tab-title layui-row top-layui-tab-title">
				<li class="layui-this layui-col-xs2"><?=lang('school_detail_financial_contribute_message')?><?=lang('is_en')?'':'排名'?></li>
				<li class="layui-col-xs2"><?=lang('school_detail_apply_sat_avg_message')?><?=lang('is_en')?'':'排名'?></li>
				<li class="layui-col-xs2"><?=lang('school_detail_ap_message')?><?=lang('is_en')?'':'排名'?></li>
				<li class="layui-col-xs2"><?=lang('school_detail_sport_message')?><?=lang('is_en')?'':'排名'?></li>
				<li class="layui-col-xs2"><?=lang('school_detail_teach_pupil_ratio_message')?><?=lang('is_en')?'':'排名'?></li>
				<li class="layui-col-xs2"><?=lang('Advanced_Degree')?></li>
			</ul>
			<div class="layui-tab-content">
				<div class="layui-tab-item layui-show">
					<table style="text-align: center">
						<tr class="top_tr_title">
							<th class="index_th_1"><?=lang('is_en')?'TOP':'排名'?></th>
							<th class="index_th_2"><?=lang('index_search_value_message')?></th>
							<th class="index_th_3"><?=lang('school_detail_financial_contribute_message')?></th>
							<th class="index_th_4"><?=lang('school_detail_basic_createtime_message')?></th>
							<th class="index_th_5"><?=lang('search_school_type_message')?></th>
							<th class="index_th_6"><?=lang('search_address_message')?></th>
							<th class="index_th_7"><?=lang('search_peoper_count_message')?></th>
							<th class="index_th_8"><?=lang('school_detail_financial_tuition_message')?></th>
							<th class="index_th_9"><?=lang('Residential_Type')?></th>
						</tr>
					<?php foreach($xyjz as $k => $v):?>
						<tr class="top_tr_con <?= $k>4?'display_none':''?>" onclick="location.href='http://www.schoolingandhoming.com/web/schoolDetail/<?=$v['id']?>'">
							<td style="padding-left: 0" class="top_num"><span><?=$k+1?></span></td>
							<td>
								<p><?=$v['name_cn']?></p>
								<p class="top_school_name_en"><?=$v['name_en']?></p>
							</td>
							<td><?=$v['financial_contribute']?> $</td>
							<td><?=substr($v['basic_createtime'],0,4)!='0000'?substr($v['basic_createtime'],0,4).(lang('is_en')?'':'年'):'--'; ?></td>
							<td>

								<?php
									switch($v['basic_school_type']){
										case 1:
											echo '<img width="45" src="/public/images/web/man.png">';
											break;
										case 2:
											echo '<img width="45" src="/public/images/web/woman.png">';
											break;
										case 3:
											echo '<img width="45" src="/public/images/web/all.png">';
											break;
									}

								?>
							</td>
							<td><?=lang('is_en')?$v['state_name_en']:$v['state_name']?></td>
							<td><?=$v['basic_school_enrollments']?$v['basic_school_enrollments'].(lang('is_en')?'':'人'):'--';?></td>
							<td>
								<?=$v['financial_tuition']?$v['financial_tuition'].' $':($v['financial_tuition_remark']?'<span style="cursor: pointer" class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>':'--')?>
								<div class="f_t_remark"><?=$v['financial_tuition_remark']?></div>
							</td>
							<td><?=$v['suggest_house']?$v['suggest_house']:'--'?></td>
						</tr>

					<?php endforeach;?>
					</table>
					<div class="btn-box">
						<button class="layui-btn top-btn-view">
							<span><?=lang('view_all')?></span>
							<i class="layui-icon">&#xe601;</i>
						</button>
					</div>

				</div>
				<div class="layui-tab-item">
					<table style="text-align: center">
						<tr class="top_tr_title">
							<th class="index_th_1" style="text-align: left;padding-left: 0"><?=lang('is_en')?'TOP':'排名'?></th>
							<th class="index_th_2"><?=lang('index_search_value_message')?></th>
							<th class="index_th_3"><?=lang('school_detail_apply_sat_avg_message')?><?=lang('is_en')?'':'成绩'?></th>
							<th class="index_th_4"><?=lang('school_detail_basic_createtime_message')?></th>
							<th class="index_th_5"><?=lang('search_school_type_message')?></th>
							<th class="index_th_6"><?=lang('search_address_message')?></th>
							<th class="index_th_7"><?=lang('search_peoper_count_message')?></th>
							<th class="index_th_8"><?=lang('school_detail_financial_tuition_message')?></th>
							<th class="index_th_9"><?=lang('Residential_Type')?></th>

						</tr>
						<?php foreach($sat as $k => $v):?>
							<tr class="top_tr_con <?= $k>4?'display_none':''?>" onclick="location.href='http://www.schoolingandhoming.com/web/schoolDetail/<?=$v['id']?>'">
								<td style="padding-left: 0" class="top_num"><span><?=$k+1?></span></td>
								<td>
									<p><?=$v['name_cn']?></p>
									<p class="top_school_name_en"><?=$v['name_en']?></p>
								</td>
								<td><?=$v['sat']?></td>
								<td><?=substr($v['basic_createtime'],0,4)!='0000'?substr($v['basic_createtime'],0,4).(lang('is_en')?'':'年'):'--'; ?></td>
								<td>

									<?php
									switch($v['basic_school_type']){
										case 1:
											echo '<img width="45" src="/public/images/web/man.png">';
											break;
										case 2:
											echo '<img width="45" src="/public/images/web/woman.png">';
											break;
										case 3:
											echo '<img width="45" src="/public/images/web/all.png">';
											break;
									}

									?>
								</td>
								<td><?=lang('is_en')?$v['state_name_en']:$v['state_name']?></td>
								<td><?=$v['basic_school_enrollments']?$v['basic_school_enrollments'].(lang('is_en')?'':'人'):'--';?></td>
								<td>
									<?=$v['financial_tuition']?$v['financial_tuition'].' $':($v['financial_tuition_remark']?'<span style="cursor: pointer" class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>':'--')?>
									<div class="f_t_remark"><?=$v['financial_tuition_remark']?></div>
								</td>
								<td><?=$v['suggest_house']?$v['suggest_house']:'--'?></td>
							</tr>
						<?php endforeach;?>
					</table>
					<div class="btn-box">
						<button class="layui-btn top-btn-view">
							<span><?=lang('view_all')?></span>
							<i class="layui-icon">&#xe601;</i>
						</button>
					</div>

				</div>
				<div class="layui-tab-item">
					<table style="text-align: center">
						<tr class="top_tr_title">
							<th class="index_th_1" style="text-align: left;padding-left: 0"><?=lang('is_en')?'TOP':'排名'?></th>
							<th class="index_th_2"><?=lang('index_search_value_message')?></th>
							<th class="index_th_3"><?=lang('school_detail_ap_message')?><?=lang('is_en')?' Number':'数量'?></th>
							<th class="index_th_4"><?=lang('school_detail_basic_createtime_message')?></th>
							<th class="index_th_5"><?=lang('search_school_type_message')?></th>
							<th class="index_th_6"><?=lang('search_address_message')?></th>
							<th class="index_th_7"><?=lang('search_peoper_count_message')?></th>
							<th class="index_th_8"><?=lang('school_detail_financial_tuition_message')?></th>
							<th class="index_th_9"><?=lang('Residential_Type')?></th>
						</tr>
						<?php foreach($ap as $k => $v):?>
							<tr class="top_tr_con <?= $k>4?'display_none':''?>" onclick="location.href='http://www.schoolingandhoming.com/web/schoolDetail/<?=$v['id']?>'">
								<td style="padding-left: 0" class="top_num"><span><?=$k+1?></span></td>
								<td>
									<p><?=$v['name_cn']?></p>
									<p class="top_school_name_en"><?=$v['name_en']?></p>
								</td>
								<td><?=$v['ap']?></td>
								<td><?=substr($v['basic_createtime'],0,4)!='0000'?substr($v['basic_createtime'],0,4).(lang('is_en')?'':'年'):'--'; ?></td>
								<td>

									<?php
									switch($v['basic_school_type']){
										case 1:
											echo '<img width="45" src="/public/images/web/man.png">';
											break;
										case 2:
											echo '<img width="45" src="/public/images/web/woman.png">';
											break;
										case 3:
											echo '<img width="45" src="/public/images/web/all.png">';
											break;
									}

									?>
								</td>
								<td><?=lang('is_en')?$v['state_name_en']:$v['state_name']?></td>
								<td><?=$v['basic_school_enrollments']?$v['basic_school_enrollments'].(lang('is_en')?'':'人'):'--';?></td>
								<td>
									<?=$v['financial_tuition']?$v['financial_tuition'].' $':($v['financial_tuition_remark']?'<span style="cursor: pointer" class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>':'--')?>
									<div class="f_t_remark"><?=$v['financial_tuition_remark']?></div>
								</td>
								<td><?=$v['suggest_house']?$v['suggest_house']:'--'?></td>
							</tr>
						<?php endforeach;?>
					</table>
					<div class="btn-box">
						<button class="layui-btn top-btn-view">
							<span><?=lang('view_all')?></span>
							<i class="layui-icon">&#xe601;</i>
						</button>
					</div>

				</div>
				<div class="layui-tab-item">
					<table style="text-align: center">
						<tr class="top_tr_title">
							<th class="index_th_1" style="text-align: left;padding-left: 0"><?=lang('is_en')?'TOP':'排名'?></th>
							<th class="index_th_2"><?=lang('index_search_value_message')?></th>
							<th class="index_th_3"><?=lang('Number_of_Sports')?></th>
							<th class="index_th_4"><?=lang('school_detail_basic_createtime_message')?></th>
							<th class="index_th_5"><?=lang('search_school_type_message')?></th>
							<th class="index_th_6"><?=lang('search_address_message')?></th>
							<th class="index_th_7"><?=lang('search_peoper_count_message')?></th>
							<th class="index_th_8"><?=lang('school_detail_financial_tuition_message')?></th>
							<th class="index_th_9"><?=lang('Residential_Type')?></th>
						</tr>
						<?php foreach($sport as $k => $v):?>
							<tr class="top_tr_con <?= $k>4?'display_none':''?>" onclick="location.href='http://www.schoolingandhoming.com/web/schoolDetail/<?=$v['id']?>'">
								<td style="padding-left: 0" class="top_num"><span><?=$k+1?></span></td>
								<td>
									<p><?=$v['name_cn']?></p>
									<p class="top_school_name_en"><?=$v['name_en']?></p>
								</td>
								<td><?=$v['sport']?></td>
								<td><?=substr($v['basic_createtime'],0,4)!='0000'?substr($v['basic_createtime'],0,4).(lang('is_en')?'':'年'):'--'; ?></td>
								<td>

									<?php
									switch($v['basic_school_type']){
										case 1:
											echo '<img width="45" src="/public/images/web/man.png">';
											break;
										case 2:
											echo '<img width="45" src="/public/images/web/woman.png">';
											break;
										case 3:
											echo '<img width="45" src="/public/images/web/all.png">';
											break;
									}

									?>
								</td>
								<td><?=lang('is_en')?$v['state_name_en']:$v['state_name']?></td>
								<td><?=$v['basic_school_enrollments']?$v['basic_school_enrollments'].(lang('is_en')?'':'人'):'--';?></td>
								<td>
									<?=$v['financial_tuition']?$v['financial_tuition'].' $':($v['financial_tuition_remark']?'<span style="cursor: pointer" class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>':'--')?>
									<div class="f_t_remark"><?=$v['financial_tuition_remark']?></div>
								</td>
								<td><?=$v['suggest_house']?$v['suggest_house']:'--'?></td>
							</tr>
						<?php endforeach;?>
					</table>
					<div class="btn-box">
						<button class="layui-btn top-btn-view">
							<span><?=lang('view_all')?></span>
							<i class="layui-icon">&#xe601;</i>
						</button>
					</div>
				</div>
				<div class="layui-tab-item">
					<table style="text-align: center">
						<tr class="top_tr_title">
							<th class="index_th_1" style="text-align: left;padding-left: 0"><?=lang('is_en')?'TOP':'排名'?></th>
							<th class="index_th_2"><?=lang('index_search_value_message')?></th>
							<th class="index_th_3"><?=lang('school_detail_teach_pupil_ratio_message')?></th>
							<th class="index_th_4"><?=lang('school_detail_basic_createtime_message')?></th>
							<th class="index_th_5"><?=lang('search_school_type_message')?></th>
							<th class="index_th_6"><?=lang('search_address_message')?></th>
							<th class="index_th_7"><?=lang('search_peoper_count_message')?></th>
							<th class="index_th_8"><?=lang('school_detail_financial_tuition_message')?></th>
							<th class="index_th_9"><?=lang('Residential_Type')?></th>
						</tr>
						<?php foreach($ssb as $k => $v):?>
							<tr class="top_tr_con <?= $k>4?'display_none':''?>" onclick="location.href='http://www.schoolingandhoming.com/web/schoolDetail/<?=$v['id']?>'">
								<td style="padding-left: 0" class="top_num"><span><?=$k+1?></span></td>
								<td>
									<p><?=$v['name_cn']?></p>
									<p class="top_school_name_en"><?=$v['name_en']?></p>
								</td>
								<td><?=$v['ssb'].':1'?></td>
								<td><?=substr($v['basic_createtime'],0,4)!='0000'?substr($v['basic_createtime'],0,4).(lang('is_en')?'':'年'):'--'; ?></td>
								<td>

									<?php
									switch($v['basic_school_type']){
										case 1:
											echo '<img width="45" src="/public/images/web/man.png">';
											break;
										case 2:
											echo '<img width="45" src="/public/images/web/woman.png">';
											break;
										case 3:
											echo '<img width="45" src="/public/images/web/all.png">';
											break;
									}

									?>
								</td>
								<td><?=lang('is_en')?$v['state_name_en']:$v['state_name']?></td>
								<td><?=$v['basic_school_enrollments']?$v['basic_school_enrollments'].(lang('is_en')?'':'人'):'--';?></td>
								<td>
									<?=$v['financial_tuition']?$v['financial_tuition'].' $':($v['financial_tuition_remark']?'<span style="cursor: pointer" class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>':'--')?>
									<div class="f_t_remark"><?=$v['financial_tuition_remark']?></div>
								</td>
								<td><?=$v['suggest_house']?$v['suggest_house']:'--'?></td>
							</tr>
						<?php endforeach;?>
					</table>
					<div class="btn-box">
						<button class="layui-btn top-btn-view">
							<span><?=lang('view_all')?></span>
							<i class="layui-icon">&#xe601;</i>
						</button>
					</div>
				</div>
				<div class="layui-tab-item">
					<table style="text-align: center">
						<tr class="top_tr_title">
							<th class="index_th_1" style="text-align: left;padding-left: 0"><?=lang('is_en')?'TOP':'排名'?></th>
							<th class="index_th_2"><?=lang('index_search_value_message')?></th>
							<th class="index_th_3"><?=lang('Advanced_Degree')?></th>
							<th class="index_th_4"><?=lang('school_detail_basic_createtime_message')?></th>
							<th class="index_th_5"><?=lang('search_school_type_message')?></th>
							<th class="index_th_6"><?=lang('search_address_message')?></th>
							<th class="index_th_7"><?=lang('search_peoper_count_message')?></th>
							<th class="index_th_8"><?=lang('school_detail_financial_tuition_message')?></th>
							<th class="index_th_9"><?=lang('Residential_Type')?></th>
						</tr>
						<?php foreach($gxwszb as $k => $v):?>
							<tr class="top_tr_con <?= $k>4?'display_none':''?>" onclick="location.href='http://www.schoolingandhoming.com/web/schoolDetail/<?=$v['id']?>'">
								<td style="padding-left: 0" class="top_num"><span><?=$k+1?></span></td>
								<td>
									<p><?=$v['name_cn']?></p>
									<p class="top_school_name_en"><?=$v['name_en']?></p>
								</td>
								<td><?=$v['gxwszb'].'%'?></td>
								<td><?=substr($v['basic_createtime'],0,4)!='0000'?substr($v['basic_createtime'],0,4).(lang('is_en')?'':'年'):'--'; ?></td>
								<td>

									<?php
									switch($v['basic_school_type']){
										case 1:
											echo '<img width="45" src="/public/images/web/man.png">';
											break;
										case 2:
											echo '<img width="45" src="/public/images/web/woman.png">';
											break;
										case 3:
											echo '<img width="45" src="/public/images/web/all.png">';
											break;
									}

									?>
								</td>
								<td><?=lang('is_en')?$v['state_name_en']:$v['state_name']?></td>
								<td><?=$v['basic_school_enrollments']?$v['basic_school_enrollments'].(lang('is_en')?'':'人'):'--';?></td>
								<td>
									<?=$v['financial_tuition']?$v['financial_tuition'].' $':($v['financial_tuition_remark']?'<span style="cursor: pointer" class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>':'--')?>
									<div class="f_t_remark"><?=$v['financial_tuition_remark']?></div>
								</td>
								<td><?=$v['suggest_house']?$v['suggest_house']:'--'?></td>
							</tr>
						<?php endforeach;?>
					</table>
					<div class="btn-box">
						<button class="layui-btn top-btn-view">
							<span><?=lang('view_all')?></span>
							<i class="layui-icon">&#xe601;</i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="layui-col-md12 summer-school box-shadow">
		<div style="position: relative;">
			<h3 class="index_title_h3"><?=lang('index_hot_address_title_message')?></h3>
			<a class="more"><span style="padding-right: 3px"><?=lang('is_en')?'MORE':'所有地区'?></span><span style="position: relative;top: 2px;" class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></a>
			<hr>
		</div>
		<div class="picScroll-left">
			<div class="hd" style="position: relative">
				<div class="next-box-btn-l">
					<a class="next"><i class="layui-icon">&#xe602;</i></a>
				</div>
				<div class="next-box-btn-r">
					<a class="prev"><i class="layui-icon">&#xe603;</i></a>
				</div>
			</div>
			<div class="bd">
				<ul class="picList">
					<?php foreach($hot_up as $item):?>
						<li style="margin-bottom: -60px">
							<div class="pic" style="overflow: hidden">
								<a href="<?php echo $item['link'] ?>">
									<img src="/upload/<?php echo get_filepath_by_route_id(0,$item['file_name']); ?>" class="indexImg2" />
								</a>
							</div>
							<div class="hot-summer-bg"></div>
							<div class="summer_text title"><?php echo lang('is_en')?$item['title_en']:$item['title']?></div>
						</li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
	</div>

	<div class="layui-col-md12 summer-school box-shadow">
		<div style="position: relative;">
			<h3 class="index_title_h3">往期专题</h3>
			<a class="more" href="/web/special_list"><span style="padding-right: 3px"><?=lang('is_en')?'MORE':'所有专题'?></span><span style="position: relative;top: 2px;" class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span></a>
			<hr>
		</div>
		<div class="picScroll-left">
			<div class="hd" style="position: relative">
				<div class="next-box-btn-l">
					<a class="next"><i class="layui-icon">&#xe602;</i></a>
				</div>
				<div class="next-box-btn-r">
					<a class="prev"><i class="layui-icon">&#xe603;</i></a>
				</div>
			</div>
			<div class="bd">
				<ul class="picList" style="height: 180px;">
					<?php foreach($zt as $item):?>
						<li style="margin-bottom: -60px">
							<div class="pic" style="overflow: hidden">
								<a href="<?php echo $item['link'] ?>">
									<img src="/public/images/special/<?=$item['file_name'] ?>" class="indexImg2" />
								</a>
							</div>
						</li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
	</div>

</div>





<script type="text/javascript">
	jQuery(".picScroll-left").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,vis:4,trigger:"click",pnLoop:false});
</script>
<script>
	layui.use(['element','carousel','form'], function(){

		var element = layui.element;
		var form = layui.form;

		//监听提交
		form.on('submit(formDemo)', function(data){
			layer.msg(JSON.stringify(data.field));
			return false;
		});
		var carousel = layui.carousel;
		//建造实例
		carousel.render({
			elem: '#test1'
			,width: '100%' //设置容器宽度
			,height:'330px'
			,autoplay:true
			,interval:5000
			,indicator:'inside'
			,arrow: 'hidden' //始终显示箭头
			//,anim: 'updown' //切换动画方式
		});
	});
</script>
<script type="text/javascript">

	$(document).ready(function(){
		$(".searchTag").click(function(){
			$(".tagDetail").show();
		});
		$(".tagdiv").click(function(){
			$("#tagInput").val($(this).html());
			$("#tagInput").attr("data-value",$(this).attr("data-value"));
			$(".tagDetail").hide();
		});
		$('#tagInput').val('<?php echo lang('index_search_value_message') ?>')
		$(".goSearch").click(function(){
			var type = $("#tagInput").attr("data-value");
			var name = $(".searchInput").val();
			if(type == 2){
		    	window.location.href = "/web/searchHome?type="+type+"&name="+name;
		    }else{
		    	window.location.href = "/web/schoolList?type="+type+"&name="+name;
		    }
		});
	});
	document.onkeydown=function(event){
		var e = event || window.event || arguments.callee.caller.arguments[0];
	    if(e && e.keyCode==13){  
	       $('.goSearch').click();
	    }	             
	}

	$('.border-div').hover(function(){
		$(this).find('img').css({'transition':'all 0.6s','transform':'scale(1.6)'});
		$(this).find('.titleBlue1').css({'transition':'all 0.6s','transform':'translateY(-100px) scale(1.6)','color':'#fff','text-shadow':'2px 2px 2px #000'});
		$(this).find('.titleGreen1').css({'transition':'all 0.6s','transform':'translateY(-100px) scale(1.6)','color':'#fff','text-shadow':'2px 2px 2px #000'});
		$(this).css('overflow','hidden');
	},function(){
		$(this).find('img').css({'transition':'all 0.6s','transform':'scale(1.0)'});
		$(this).find('.titleBlue1').css({'transition':'all 0.6s','transform':'translateY(0px) scale(1.0)','color':'#484848','text-shadow':'none'});
		$(this).find('.titleGreen1').css({'transition':'all 0.6s','transform':'translateY(0px) scale(1.0)','color':'#484848','text-shadow':'none'});
	})

	$('.glyphicon-info-sign').hover(function(){
		$(this).next('div').css('display','block');
	},function(){
		$(this).next('div').css('display','none');
	})

	$('.top-btn-view').click(function(){
		var txt = $('.top-btn-view').find('span').html();
		if( txt == '查看所有' || txt == 'View All'){
			$('.display_none').css('display','table-row');
			$('.top-btn-view').find('i').css('transform','rotate(180deg)');
			if(txt == '查看所有'){
				$('.top-btn-view').find('span').html('取消显示');
			}else{
				$('.top-btn-view').find('span').html('Display');
			}
		}else{
			$('.display_none').css('display','none');
			$('.top-btn-view').find('i').css('transform','rotate(0deg)');
			if(txt =='取消显示'){
				$('.top-btn-view').find('span').html('查看所有');
			}else{
				$('.top-btn-view').find('span').html('View All');
			}

		}

	})


</script>