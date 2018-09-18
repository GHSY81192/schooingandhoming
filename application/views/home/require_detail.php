<link rel="stylesheet" href="/public/css/home/menu.css">
<link rel="stylesheet" href="/public/css/home/index.css">
<style type="text/css">
	.home-menu{height:800px}
</style>
<div class="home-content" id="content">
	<div class="container ">  
		<div class="row home-main">
			<?php 
			if(strstr($user['head_image'],'http')){
				$face = $user['head_image'];
			}else{
				$face = '/upload/'.get_filepath_by_route_id(@$user['id'],@$user['head_image'],5); 
			}
			?>
			<?php $this->load->view('home/menu',array('active'=>2,'face'=>$face,'name'=>@$user['name_cn']));?>
			<div class="col-md-9 home-info-content rl">
				<form>
				<dl class="dl-horizontal">
				  <dt style="height:80px;line-height:60px;padding-left:0px"><p class="title">我的住家需求 </p></dt>
				  <dd style="height:80px;line-height:60px"><img src="/public/images/web/home/7.png" class="edit_img cur"></dd>
				  <dt>订单编号:</dt>
				  <dd class=""><?=$data['order_id'];?></dd>
				  <dt class="no-need-edit">需求类型:</dt>
				  <dd class="no-need-edit">住家需求</dd>
				  <dt class="no-need-edit">提交时间:</dt>
				  <dd class="no-need-edit"><?=$data['create_time'];?></dd>
				  <dt class="no-need-edit">状&#12288;&#12288;态:</dt>
				  <dd class="no-need-edit"">
				  		<?php switch ($data['status']){
	  							case 0:echo '等待初审';break;
	  							case 1:echo '初审通过';break;
	  						}?>
				  </dd>
				  <dt>所在地区:</dt>
				  <dd class="dd-show"><?=@$data['name_cn'];?></dd>
				  <dd class="dd-edit hide clearfix">
				  	<select class="form-control state_data" style="width:135px;margin-right:25px">
					   <option value="0">请选择所在州</option>
				  	   <?php foreach ($state as $v):?>
				  		<option value="<?=$v['id']?>"  <?php echo $v['id'] == @$data['state_id'] ?'selected':'';?>><?=$v['name_cn'];?></option>
						<?php endforeach;?>
				  	</select>
				  	<select class="form-control" style="width:135px;" name="city_id">
					   <option value="0"><?=@$data['name_cn'];?></option>
				  	</select>
				  </dd>
				  <dt>房主使用语言:</dt>
				  <dd class="dd-show"><?=@$data['language'];?></dd>
				  <dd class="dd-edit hide">
				  	<select class="form-control" name="language">
				  		<?php foreach ($language as $k=>$v):?>
				  		<option value="<?=$k?>" <?php echo $k == @$data['language'] ?'selected':'';?>><?=$v?></option>
				  		<?php endforeach;?>
				  	</select>
				  </dd>
				  <dt>预算范围:</dt>
				  <dd class="dd-show"><?=@$data['range_start']?>到<?=@$data['range_end']?></dd>
				  <dd class="dd-edit hide">
				  		<input class="form-control" name="range_start" value="<?=@$data['range_start'];?>" style="width:135px;" /><span style="padding:0px 8px">到</span><input style="width:135px;" class="form-control" name="range_end" value="<?=@$data['range_end'];?>"/>
				  </dd>
				  <dt>需求备注:</dt>
				  <dd class="dd-show"><?=@$data['personal_like']?></dd>
				  <dd class="dd-edit hide"><input class="form-control" name="personal_like" value="<?=@$data['personal_like'];?>"/></dd>
				  <dt>申请人姓名:</dt>
				  <dd class="dd-show"><?=@$data['name'] ?></dd>
				  <dd class="dd-edit hide"><input class="form-control" name="name" value="<?=@$data['name'];?>"/></dd>
				  <dt>电&#12288;&#12288;话:</dt>
				  <dd class="dd-show"><?=@$data['phone'] ?></dd>
				  <dd class="dd-edit hide"><input class="form-control" name="phone" value="<?=@$data['phone'];?>"/></dd>
				  <dt>邮&#12288;&#12288;箱:</dt>
				  <dd class="dd-show"><?=@$data['email'] ?></dd>
				  <dd class="dd-edit hide"><input class="form-control" name="email" value="<?=@$data['email'];?>"/><input type="hidden" value="<?=@$data['id'];?>" name="id" /></dd>
					
				</dl>
				</form>
				<div class="clearfix sub-content hide" style="padding-bottom:40px;padding;top:0px"><a id="subBtn" class="btn btn-primary" style="margin-right:40px;padding:6px 20px">保存修改</a><span id="cancel" class="cur underline">取消</span></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.state_data').change(function(){
			var id = $(this).val();
			$.post('/ajax/get_city_list/'+id,{},function(data){
				if(data.length){
				html2 = '<option value="0">请选择城市</option>';
					$.each(data,function(k,v){
						html2 += '<option value="'+v.id+'">'+v.name_cn+'</option>';
					})
					$('select[name=city_id]').html(html2);
				}
			},'json')
		})
		$('.edit_img').click(function(){
			$('.dd-show,.no-need-edit').hide();
			$('.dd-edit,.sub-content').removeClass('hide');
		})
		$('#cancel').click(function(){
			$('.dd-edit,.sub-content').addClass('hide');
			$('.dd-show,.no-need-edit').show();
		})
		$('#subBtn').click(function(){
			$.post('/home/editRequire',$('form').serialize(),function(data){
				if(data.status){
						window.location.reload()
				}else{
					alert(data.msg);
				}
			},'json')
		})
	});
	
</script>