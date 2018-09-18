<link rel="stylesheet" href="/public/css/mobile/index.css">
<link rel="stylesheet" href="/public/css/mobile/help.css">
    <div id="page-content-wrapper container">
        <div class="rl banner_ad clearfix">
           <img src="/public/images/mobile/help/help_bg.png">
           <div class="ab" style="left:50px;top:50px;color:#fff;font-weight:800;font-size:22px"><?php echo @$title;?></div>
        </div>
        <div class="faqlist">
        	<?php foreach ($content as $val):?>
            <div class="help-list border-bottom">
				<div class="row">
					<div class="col-xs-10">
						<p class="help-list-title font-16"><?=$val['title']?></p>
					</div>
					<div class="col-xs-2 text-center help-list-title pad-top-5">
						<img src="/public/images/mobile/school_detail/5.png" style="width:15px" />
					</div>
				</div>
				<div class="help-list-content hide">
						<?=$val['des']?>
				</div>
			</div>
			<?php endforeach;?>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function(){
    	$('.help-list').click(function(){
    		hideClass = $(this).find('.help-list-content');
    	  	if(hideClass.hasClass('hide')){
    			hideClass.removeClass('hide');
    			$(this).find('.help-list-title img').attr('src','/public/images/mobile/school_detail/7.png');
    	  	}else{
    	  		hideClass.addClass('hide');
    	  		$(this).find('.help-list-title img').attr('src','/public/images/mobile/school_detail/5.png');
    		}
      })
    })
</script>