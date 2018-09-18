<link rel="stylesheet" href="/public/css/home/menu.css">
<link rel="stylesheet" href="/public/css/home/index.css">
<script type="text/javascript" src="/public/bootstrap/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="/public/bootstrap/js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<link rel="stylesheet" type="text/css" href="/public/bootstrap/css/datetimepicker.css" media="all">
<div class="home-content">
	<div class="container">  
		<div class="row home-main">
			<?php
			if(strstr($data['head_image'],'http')){
				$face = $data['head_image'];
			}else{
				$face = '/upload/'.get_filepath_by_route_id(@$data['id'],@$data['head_image'],5);
			}
			?>
			<?php $this->load->view('home/menu',array('active'=>1,'face'=>$face,'name'=>@$data['name_cn']));?>
			<div class="col-md-9 home-info-content rl">
				<form id="form">
				<dl class="dl-horizontal" id="content">
				  <dt style="height:80px;line-height:60px;padding-left:0px"><p class="title">个人信息 </p></dt>
				  <dd style="height:80px;line-height:60px"><img src="/public/images/web/home/7.png" class="edit_img cur"></dd>
				  <dt>姓&#12288;&#12288;名:</dt>
				  <dd class="dd-show"><?=@$data['name_cn']?></dd>
				  <dd class="dd-edit hide"><input class="form-control" name="name_cn" value="<?=@$data['name_cn']?>" /></dd>
				  <dt>性&#12288;&#12288;别:</dt>
				  <dd class="dd-show"><?php echo @$data['gender'] ==1 ?"男":"女";?></dd>
				  <dd class="dd-edit hide">
				  	<select class="form-control" name="gender">
				  		<option value="1" <?php echo @$data['gender'] ==1 ?"selected":"";?>>男</option>
				  		<option value="2" <?php echo @$data['gender'] !=1 ?"selected":"";?>>女</option>
				  	</select>
				  </dd>
				  <dt>电子邮箱:</dt>
				  <dd class="dd-show"><?=@$data['contact_email']?></dd>
				  <dd class="dd-edit hide"><input class="form-control" name="contact_email"  value="<?=@$data['contact_email']?>" /></dd>
				  <dt>手&#12288;&#12288;机:</dt>
				  <dd class=""><?=@$data['contact_phone']?>
				  	<?php if (!empty($data['contact_phone'])):?>
				  	<font class="reBind">重新绑定 </font></dd>
				  	<?php else:?>
				  	<font class="reBind" style="padding-left:0px">绑定手机 </font></dd>
				  	<?php endif;?>
				  <dt>出生日期:</dt>
				  <dd class="dd-show"><?=@$data['birthday']?></dd>
				  <dd class="dd-edit hide"><input class="form-control birthday" name="birthday"  value="<?=@$data['birthday']?>"/></dd>
				</dl>

				<input type="hidden" name="head_image">
				<div class="clearfix sub-content hide"><a id="subBtn" class="btn btn-primary" style="margin-right:40px;padding:6px 20px">保存修改</a><span id="cancel" class="cur underline">取消</span></div>
				</form>
				<div id="changePhone" class="hide">
					<p class="title">修改手机号</p>
					<div class="change-phone">
						<form class="form-horizontal">
							  <div class="form-group">
							    <label for="inputEmail3" class="col-sm-2 control-label">手机号</label>
							    <div class="col-sm-10">
							      <div class="fl input">
							      	<input type="text" id="userPhone" name="userPhone" class="form-control" placeholder="请输入您的新手机号" style="width:250px">
							      </div>
							      <a class="btn btn-success getcode">发送验证码</a>
							    </div>
							  </div>
							  <div class="form-group">
							    <label for="inputPassword3" class="col-sm-2 control-label">验证码</label>
							    <div class="col-sm-10">
							      <input type="text" id="codeNum" class="form-control" placeholder="请输入验证码"  style="width:250px">
							    </div>
							  </div>
							  <div class="form-group" style="padding-top:20px">
							    <div class="col-sm-offset-2 col-sm-10">
							    	<a id="subPhoneBtn" class="btn btn-primary" style="margin-right:40px;padding:6px 20px">保存修改</a><span id="cancelPhone" class="cur underline">取消</span>
							    </div>
							  </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var isSend = false;
	var regPhone = /1[3|4|5|7|8|][0-9]{9}/;
	var regCode = /[0-9]{4}/;
	$(document).ready(function(){
		$('.edit_img').click(function(){
			$('.dd-show').hide();
			$('.dd-edit,.sub-content').removeClass('hide');
		})
		$('#cancel').click(function(){
			$('.dd-edit,.sub-content').addClass('hide');
			$('.dd-show').show();
		})
		$('.reBind').click(function(){
			$('#form').addClass('hide');
			$('#changePhone').removeClass('hide');
		})
		$('#cancelPhone').click(function(){
			$('#changePhone').addClass('hide');
			$('#form').removeClass('hide');
		})
		$('#subBtn').click(function(){
			$.post('/home/editProfile',$('#form').serialize(),function(data){
				if(data.status){
					window.location.reload()
				}else{
					alert(data.msg);
				}
			},'json')
		})
		$(".birthday").datetimepicker({
		    language:'zh-CN',
		    format: "yyyy-mm-dd",
		    autoclose: true,
		    minView: 3,
		    pickerPosition: "bottom-left"
		});
		$(".vip_time").datetimepicker({
		    language:'zh-CN',
		    format: "yyyy-mm-dd",
		    autoclose: true,
		    minView: 3,
		    pickerPosition: "bottom-left"
		  });
	});
	
	//点击发送验证码
    $(".getcode").click(function(){
        if(isSend){
			return false;
        }
    	var userPhone = $("#userPhone").val();
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
    $("#subPhoneBtn").click(function(){
		var userPhone = $("#userPhone").val();
        var code = $('#codeNum').val();
        if (!regPhone.test(userPhone)) {
        	alert("请输入正确的手机号。");
            return false;
        }
        if (!regCode.test(code)) {
        	alert("请输入正确的验证码。");
            return false;
        }
        $.post('/home/changePhone',{'mobile':userPhone,'authCode':code},function(data){
			if(data.status){
				//登录成功
				alert('绑定成功');
				document.location.href="/home"
			}else{
				alert(data.msg);
			}
        },'json')
    })
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