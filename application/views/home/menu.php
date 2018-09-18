<script type="text/javascript" src="/public/js/ajaxfileupload.js"></script>
<style>
	@font-face {font-family: "iconfont";
		src: url('/public/css/home/icon/iconfont.eot'); /* IE9*/
		src: url('/public/css/home/icon/iconfont.eot#iefix') format('embedded-opentype'), /* IE6-IE8 */
		url('/public/css/home/icon/iconfont.woff') format('woff'), /* chrome, firefox */
		url('/public/css/home/icon/iconfont.ttf') format('truetype'), /* chrome, firefox, opera, Safari, Android, iOS 4.2+*/
		url('/public/css/home/icon/iconfont.svg#iconfont') format('svg'); /* iOS 4.1- */
	}
</style>
<div class="col-md-3 home-menu">
	<div class="home-menu-content">
		<ul class="list-unstyled">
			<li <?php if(@$active == 1):?> class="active"<?php endif;?> onclick='document.location.href="/home"'><div class="menu"><span class="menu-1">个人信息</span></div></li>
			<li style="<?php echo $this->session->user_identity=='2'?'display:none':'' ?>" <?php if(@$active == 2):?> class="active"<?php endif;?> onclick='document.location.href="/home/requireList"'><div class="menu"><span><i style="font-size: 21px;padding-right: 10px;position: relative;bottom: -2px;" class="icon iconfont">&#xe62c;</i>私人订制</span></div></li>
			<li <?php if(@$active == 9):?> class="active"<?php endif;?> onclick='document.location.href="/home/myorder"'><div class="menu"><span><i style="font-size: 21px;padding-right: 10px;position: relative;bottom: -2px;" class="icon iconfont">&#xe62c;</i>我的订单</span></div></li>
			<li style="<?php echo $this->session->user_identity=='3'?'display:none':'' ?>" <?php if(@$active == 5):?> class="active"<?php endif;?> onclick='document.location.href="/home/HouseList"'><div class="menu"><span><i style="font-size: 21px;padding-right: 10px;position: relative;bottom: -2px;" class="icon iconfont">&#xe62c;</i>发布的住家信息</span></div></li>
			<li style="<?php echo $this->session->user_identity=='2'?'display:none':'' ?>" <?php if(@$active == 3):?> class="active"<?php endif;?> onclick='document.location.href="/home/collect"'><div class="menu"><span><i style="font-size: 21px;padding-right: 10px;" class="icon iconfont">&#xe60c;</i>收藏</span></div></li>
			<li <?php if(@$active == 4):?> class="active"<?php endif;?> onclick='document.location.href="/home/siteMail"'><div class="menu"><span><i style="font-size: 21px;padding-right: 10px;position: relative;bottom: 2px;" class="icon iconfont">&#xe705;</i>收件箱</span></div></li>
		</ul>
	</div>
		<div class="face text-center rl">
			<img src="<?=@$face?>" id="faceImg">
			<input type="file" class="file-input form-control" id="pic" name="pic" style="opacity:0;position:absolute;top:0px;left:0px;width:100%;height:150px" />
		</div>
		<div class="home-menu-content">
			<p class="username text-center font-16"><strong><?=@$name?></strong></p>

		</div>
</div>
<script type="text/javascript">
$('.file-input').change(function(){
	ajaxFileUpload();
});
function ajaxFileUpload(){	
	$.ajaxFileUpload
	(
		{
			url:'/home/uploadPic',
			secureuri:false,
			fileElementId:'pic',
			dataType: 'json',
			success: function (data, status)
			{
				if(data.status == 'success'){
					pic = data.data;
					$.post('/home/editProfile',{'head_image':pic},function(data){
						if(data.status){
							window.location.reload();
						}else{
							alert(data.msg);
						}
					},'json')
				}else{
					//alert(data.data);
				}
				$('.file-input').change(function(){
					ajaxFileUpload();
				});
			},
			error: function (data, status, e)
			{
				alert(e);
				$('.file-input').change(function(){
					ajaxFileUpload();
				});
			}
		}
	)
	return false;
}
</script>