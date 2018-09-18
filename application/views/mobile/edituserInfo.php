<link rel="stylesheet" href="/public/css/mobile/index.css">
<link rel="stylesheet" href="/public/css/mobile/help.css">
<link rel="stylesheet" href="/public/css/mobile/user-style.css">
<link rel="stylesheet" href="/public/css/mobile/tinyscroll.css">
<script type="text/javascript" src="/public/js/ajaxfileupload.js"></script>
<div id="page-content-wrapper container" >
    <form id="myform" class="clearfix"   style="background-color:#fff">
	    <div class="clearfix edit-pic">
	        <div class="container-fluid btn-groups font-16 pad-top-5">
	            <img src="/public/images/mobile/user/cancel.png" class="btnLeft" style="width:19px;" onclick="history.go(-1);">
	            <p class="btnRight edit font-16" style="display: inline-block;float: right;" id="subBtn">保存</p>
	        </div>
	    </div>
        <section class="logo-license clearfix rl">
            <div class="half" style="margin: 20px 0px 40px;">
                <a class="logo" id="logox" style="background-color:#000;opacity:0.7;background:url('<?php echo '/upload/'.get_filepath_by_route_id(@$data['id'],@$data['head_image'],5);?>') no-repeat center center">
                    <img id="bgl" src="/public/images/mobile/user/camera.png" style="width:3rem;height:3rem;border-radius:0px;margin-top:25px"/>
                </a>
                <input class="ab ab-file file-input" id="file" type="file" name="file" />
            </div>
        </section>
        <article class="info clearfix">
            <ul>
            	<li class="clearfix sex">
                    <div class="left">姓&#12288;&#12288;名:</div>
                    <div class="right"><input name="name_cn" value="<?=@$userData['name_cn']?>" ></div>
                </li>
                <li class="clearfix sex rl">
                    <div class="left">性&#12288;&#12288;别:</div>
                    <div class="right show-sex-list"><input id="sex-value" value="<?php echo @$userData['gender'] ==1 ?"男":"女";?>" ></div>
                    <div class="ab right-icon show-sex-list"><img src="/public/images/mobile/user/indicatorDown.png" style="width:15px" /></div>
                    <input name="gender" type="hidden" />
                    <ul class="ab list-unstyled sex_list text-center hide" id="sex_list">
					  <li data-val="1" style="border-bottom:1px solid #fff">男</li>
					  <li data-val="2">女</li>
					</ul>
                </li>
                <li class="clearfix email">
                    <div class="left">电子邮件:</div>
                    <div class="right"> <input name="contact_email" value="<?=@$userData['contact_email']?>" /> </div>
                </li>
                <li class="clearfix phone rl" id="changePhone">
                    <div class="left">电&#12288;&#12288;话:</div>
                    <div class="right"> <input value="<?=@$userData['contact_phone']?>" /></div>
                    <div class="ab right-icon"><img src="/public/images/mobile/school_detail/5.png" style="width:15px" /></div>
                </li>
                <li class="clearfix language rl">
                    <div class="left">语&#12288;&#12288;言:</div>
                    <div class="right show_language"> <input id="language-value" value="<?=@$language[@$userData['language']]?>" /> </div>
                    <div class="ab right-icon show_language"><img src="/public/images/mobile/user/indicatorDown.png" style="width:15px" /></div>
                    <input name="language" type="hidden" />
                    <ul class="ab list-unstyled sex_list text-center hide" id="language_list">
                    	<?php foreach ($language as $k=>$v):?>
						  <li data-val="<?=$k;?>" style="border-bottom:1px solid #fff"><?=$v;?></li>
				  		<?php endforeach;?>
					</ul>
                </li>
                <li class="clearfix birthday rl form_datetime">
                    <div class="left">出生日期: </div>
                    <div class="right"> <input  type="text" name="birthday"  value="<?php echo substr($userData['birthday'], 0,strpos($userData['birthday'], ' '));?>" /></div>
                    <div class="ab right-icon"><img src="/public/images/mobile/user/indicatorDown.png" style="width:15px" /></div>
                    <input type="hidden" name="head_image" />
                </li>
            </ul>
       </article>
    </form>
    <!--  
    <div class="help_footer">
        <img src="/public/images/mobile/help/group5.png">
    </div>
    -->
    <div class="mask" >
        <div class="container-fluid btn-groups font-16" >
           <img class="glyphicon glyphicon-chevron-left" src="/public/images/mobile/user/return.png" style="width:10px" id="closeCode">
        </div>
        <div class="qphone-main step clearfix step1">
            <label style="font-size:16px;"><img src="/public/images/mobile/user/phoneIcon.png" style="width:18px;margin:1px 10px 0px 0px" >请输入电话号码</label>
            <p class="font-14 text-center" style="color:#83c977">我们将给您发送确认码</p>
            <div class="container" style="margin-top:40px">
                <div class="input-group-add">
                    <input type="text" name="mobile" class="form-control inputarea" placeholder="在此输入11位手机号" maxlength="11">
                    <p class="tips" style="color: #ff5228"></p>
                    <a class="btn btn-default" id="getcode" style="border:none;margin-top:20px">发送</a>
                </div>
            </div>
        </div>
        <div class="qphone-main step step2">
        	<label style="font-size:16px;">验证码已发送到您手机</label>
        	<div class="container" style="margin-top:40px">
                <div class="input-group-add">
                    <input type="text" name="validCode" class="form-control inputarea" placeholder="请输入验证码" maxlength="11">
                    <a class="btn btn-default" id="confirmCode"  style="border:none;margin-top:20px">确认</a>
                </div>
            </div>
        </div>
        <div class="qphone-main step step3 text-center">
        	<img class="trueIcon" src="/public/images/mobile/user/true2.png" style="width:50px;margin:100px 0px 10px 0px;" />
            <p class="trueTips font-18">验证成功!</p>
        </div>
    </div>
    <div id="container"></div>
</div>
    <script src="/public/js/mobile/user/iscroll-zoom.js"></script>
    <script src="/public/js/mobile/user/hammer.js"></script>
    <script src="/public/js/mobile/user/tinyscroll.min.js"></script>
    <script>
        var canEdit=true;
        var ts;
        var imgsource;

        function sowdatetime () {
            if (!ts) {
                ts = new TinyScroll({
                    wrapper: '#container',
                    needLabel: true,
                    title:"请选择你的出生年月",
                    range: ['1906/03/09 12:30:00', new Date()],
                    time: false,
                    initDate: new Date(new Date().setFullYear(1995)),
                    cancelValue: '取消',
                    okValue: '确定',
                    okCallback: function(date) {
                        // console.log(date);
                        $("input[name=birthday]").val(date);
                        ts.showScroller()
                        $("#container").empty();

                    }
                });
            } else {
                ts.showScroller();
            }
            $('.btns-wrapper .ts-cancel-btn').unbind('click',cancelDatetime);
            $('.btns-wrapper .ts-cancel-btn').bind('click',cancelDatetime);
        }
       
        $('.form_datetime').bind('click',sowdatetime) ;//出生日期初始化
        
        //日期选择取消按钮
        function cancelDatetime(){$("#container").empty();}
       
        $('.show-sex-list').click(function(){
			$('#sex_list').removeClass('hide');
        })
        $('#sex_list li').click(function(){
			sex = $(this).attr('data-val');
			$('input[name=gender]').val(sex);
			sex_name = $(this).text();
			$('#sex-value').val(sex_name);
			$(this).parent().addClass('hide')
        })
        $('.show_language').click(function(){
			$('#language_list').removeClass('hide');
        })
        $('#language_list li').click(function(){
			language = $(this).attr('data-val');
			$('input[name=language]').val(language);
			language_name = $(this).text();
			$('#language-value').val(language_name);
			$(this).parent().addClass('hide')
        })
        $('.file-input').change(function(){
			ajaxFileUpload();
		});
        $('#subBtn').click(function(){
			$.post('/mobile/home/editProfile',$('#myform').serialize(),function(data){
				if(data.status){
					document.location.href='/mobile/home/userInfo';
				}else{
					alert(data.msg);
				}
			},'json')
		})
		$('#changePhone').click(function(){
			$('.mask,.step1').show();
			$('.page-content-wrapper').hide();
		})
		$('#closeCode').click(function(){
			$('.mask').hide();
		})
		
		var isSend = false;
        var regPhone = /1[3|4|5|7|8|][0-9]{9}/;
        var regCode = /[0-9]{4}/;
		//点击发送验证码
	    $("#getcode").click(function(){
	        if(isSend){
				return false;
	        }
	    	var userPhone = $("input[name=mobile]").val();
	    	if (!regPhone.test(userPhone)) {
	    		alert("请输入正确的手机号。");
	            return false;
	        }else{ 
	        	$.post('/mobile/common/sendAuthCode',{'mobile':userPhone},function(data){
					if(data.status){
						isSend = true;
						$('.step1').hide();
						$('.step2').show();
					}else{
						alert(data.msg);
					}
	            },'json')
	        }
	    });
	    $('#confirmCode').click(function(){
	    	var userPhone = $("input[name=mobile]").val();
	        var code = $('input[name=validCode]').val();
	        if (!regPhone.test(userPhone)) {
	        	alert("请输入正确的手机号。");
	            return false;
	        }
	        if (!regCode.test(code)) {
	        	alert("请输入正确的验证码。");
	            return false;
	        }
	        $.post('/mobile/home/changePhone',{'mobile':userPhone,'authCode':code},function(data){
				if(data.status){
// 					$('.step2').hide();
// 					$('.step3').show();
					document.location.href="/mobile/home/userInfo";
				}else{
					alert(data.msg);
				}
	        },'json')
		})
      	function ajaxFileUpload(){	
			$.ajaxFileUpload
			(
				{
					url:'/mobile/home/uploadPic',
					secureuri:false,
					fileElementId:'file',
					dataType: 'json',
					success: function (data, status)
					{
						if(data.status == 'success'){
							pic = data.data.path+data.data.res;
							$('#logox').css('background-image','url('+pic+')');
							$('input[name=head_image]').val(data.data.res);
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
 		/*      
        var obUrl = ''
       
        $(function(){
            jQuery.divselect = function(divselectid,inputselectid) {
                var inputselect = $(inputselectid);
                $(divselectid+" small").click(function(){
                    $("#divselect ul").toggle();
                    $(".mask").show();
                });
                $(divselectid+" ul li a").click(function(){
                    var txt = $(this).text();
                    $(divselectid+" small").html(txt);
                    var value = $(this).attr("selectid");
                    inputselect.val(value);
                    $(divselectid+" ul").hide();
                    $(".mask").hide();
                    $("#divselect small").css("color","#333")
                });
            };
            $.divselect("#divselect","#inputselect");
        });
		*/
       
    </script>
