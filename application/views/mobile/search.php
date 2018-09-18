<link rel="stylesheet" href="/public/css/mobile/search.css">
<?php if(lang('is_en')):?>
<style>
	.search-input{padding-left:70px}
</style>
<?php endif;?>
<div class="container">
	<div class="search-content clearfix rl">
		<div class="search-line">
			<div class="ab search-content-chose"><span class="search-content-chose-text"><?php echo $type ==2?lang('index_search_option_2_message'): lang('index_search_value_message');?></span>&nbsp;<span class="caret"></span></div>
			<div class="ab search-content-chose-list hide">
				<ul class="list-unstyled">
				  <li data-type="1" class="search-content-chose-type"><?php echo lang('index_search_value_message');?></li>
				  <li data-type="2" class="search-content-chose-type"><?php echo lang('index_search_option_2_message');?></li>
				</ul>
			</div>
			<input id="searchC" class="form-control search-input" type="text" placeholder="<?php echo lang('mobile_search_input_placeholder_message');?>" value="<?=$name;?>" />
			<div onclick="history.go(-1)" class="ab search-cancel-btn cur color4"><?php echo lang('search_cancel_message');?></div>
		</div>
	</div>
</div>
<script type="text/javascript">
  var type=<?php echo $type;?>;
  $('#searchC').blur(function() {
		var name = $(this).val();
	  	document.location.href="/web/schoolList?name="+name+"&type="+type;
  })
  $('.search-content-chose').click(function(){
	$('.search-content-chose-list').removeClass('hide');
  })
  $('.search-content-chose-type').click(function(){
	type = $(this).attr('data-type');
	var text = $(this).text();
	$('.search-content-chose-text').text(text);
	$('.search-content-chose-list').addClass('hide');
  })
</script>