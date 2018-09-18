<nav class="navbar navbar-inverse navbar-fixed-top" style="position: relative">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="/admin/common/main">SH-后台管理</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">首页管理<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="/admin/common/index_banner_mgr">Banner</a></li>
					<li><a href="/admin/common/index_hot_mgr">热门地区</a></li>
				</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="<?php echo isset($user_mgr)?'active':'' ?>"><a href="/admin/common/user_mgr">用户管理</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="<?php echo isset($school_mgr)?'active':'' ?>"><a href="/admin/common/school_mgr">学校管理</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="<?php echo isset($school_ap_mgr)?'active':'' ?>"><a href="/admin/common/school_item_mgr?type=ap">AP课程</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="<?php echo isset($school_sport_mgr)?'active':'' ?>"><a href="/admin/common/school_item_mgr?type=sport">运动项目</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="<?php echo isset($school_club_mgr)?'active':'' ?>"><a href="/admin/common/school_item_mgr?type=club">学生社团</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="<?php echo isset($school_grade_mgr)?'active':'' ?>"><a href="/admin/common/school_grade_mgr">年级管理</a></li>
			</ul>
            <ul class="nav navbar-nav">
				<li class="<?php echo isset($house_mgr)?'active':'' ?>"><a href="/admin/common/house_mgr">住房管理</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="<?php echo isset($house_rule_mgr)?'active':'' ?>"><a href="/admin/common/house_rule_mgr">服务设施管理</a></li>
			</ul>
            <ul class="nav navbar-nav">
				<li class="<?php echo isset($house_request_mgr)?'active':'' ?>"><a href="/admin/common/house_request_mgr">住家需求管理</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="<?php echo isset($area_mgr)?'active':'' ?>"><a href="/admin/common/state_mgr">地区管理</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="<?php echo isset($message_mgr)?'active':'' ?>"><a href="/admin/common/message_mgr">留言管理</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="<?php echo isset($becomeHome_mgr)?'active':'' ?>"><a href="/admin/common/becomeHome_mgr">成为住家管理</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="dropdown <?php echo isset($lesson)?'active':'' ?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">衔接课程<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="/admin/common/lesson_consult">课程留言</a></li>

					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="dropdown <?php echo isset($camp)?'active':'' ?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">夏令营<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="/admin/common/camp_list">内容编辑</a></li>
						<li><a href="/admin/common/camp_add_page">添加内容</a></li>
						<li><a href="/admin/common/camp_consult">客户咨询</a></li>

					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="<?php echo isset($wechat)?'active':'' ?>"><a href="/admin/common/wechat_consult">微信咨询</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="javascript:;"><?php echo $this->session->userdata('sf_name') ?></a></li>
				<li><a href="/admin/common/logout">退出</a></li>
			</ul>

		</div>
	</div>
</nav>