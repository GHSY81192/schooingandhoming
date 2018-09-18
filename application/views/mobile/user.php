<link rel="stylesheet" href="/public/css/mobile/index.css">
<link rel="stylesheet" href="/public/css/mobile/help.css">
<link rel="stylesheet" href="/public/css/mobile/user.css">
<?php 
	if(strstr($user['head_image'],'http')){
		$face = $user['head_image'];
	}else{
		$face = '/upload/'.get_filepath_by_route_id(@$user['id'],@$user['head_image'],5);
	}
?>
<div id="page-content-wrapper container">
        <img src="/public/images/mobile/user/Bitmap.png">
    <div class="clearfix" style="background-color:#fff;text-align: center">
        <div class="userheader clearfix">
        	<div class="rl inline">
	            <img  class="userphoto" src="<?=$face;?>">
	            <div class="item-golden btn ab" style="color:#ffffff">VIP</div>
            </div>
            <h4 class="username"><?=@$user['name_cn'];?></h4>
        </div>

    </div>
    <div class="faqlist font-16">
        <ul class="list-unstyled" style="margin-bottom: 20px">
            <li onclick="document.location.href='/mobile/home/mylessons';"><span><img src="/public/images/mobile/user/listIcon1.png" class="iconLeft"></span><?=lang('My_Program')?><img class="iconRight" src="/public/images/mobile/user/indicatorRight.png"></li>
            <li onclick="document.location.href='/mobile/home/MyRequireList';"><span><img src="/public/images/mobile/user/listIcon2.png" class="iconLeft"></span><?=lang('Customization')?><img class="iconRight" src="/public/images/mobile/user/indicatorRight.png"></li>
<!--            <li onclick="document.location.href='/mobile/home/MyRequireList';"><span><img src="/public/images/mobile/user/listIcon2.png" class="iconLeft"></span>住家管理<img class="iconRight" src="/public/images/mobile/user/indicatorRight.png"></li>-->
        </ul>
    </div>
    <div class="faqlist font-16">
        <ul class="list-unstyled" style="margin-bottom: 20px">
<!--            <li onclick="document.location.href='/mobile/home/userInfo';"><span><img src="/public/images/mobile/user/listIcon3.png" class="iconLeft"></span>个人中心<img class="iconRight" src="/public/images/mobile/user/indicatorRight.png"></li>-->
            <li onclick="document.location.href='/mobile/home/userSetting';"><span><img src="/public/images/mobile/user/listIcon3.png" class="iconLeft"></span><?=lang('Personal_Homepage')?><img class="iconRight" src="/public/images/mobile/user/indicatorRight.png"></li>
            <li onclick="document.location.href='/mobile/home/MyMessage';"><span><img src="/public/images/mobile/user/listIcon4.png" class="iconLeft"></span><?=lang('My_Message')?><img class="iconRight" src="/public/images/mobile/user/indicatorRight.png"></li>
        </ul>
    </div>
    <div class="faqlist font-16">
        <ul class="list-unstyled" style="margin-bottom: 20px">
<!--            <li onclick="document.location.href='/mobile/home/MyCollect';"><span><img src="/public/images/mobile/user/listIcon5.png" class="iconLeft"></span>我的收藏<img class="iconRight" src="/public/images/mobile/user/indicatorRight.png"></li>-->
            <li onclick="document.location.href='/mobile/home/UserAdvice';"><span><img src="/public/images/mobile/user/listIcon6.png" class="iconLeft"></span><?=lang('Feedback')?><img class="iconRight" src="/public/images/mobile/user/indicatorRight.png"></li>
        </ul>
    </div>
    <div class="logout_Box">
        <button type="button" onclick="document.location.href='/mobile/home/loginOut';" class="btn btn-primary"><?=lang('Log_out')?></button>
    </div>


</div>
