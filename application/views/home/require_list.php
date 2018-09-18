<link rel="stylesheet" href="/public/css/home/menu.css">
<link rel="stylesheet" href="/public/css/home/require.css">
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
			<div class="col-md-9">
				<div class="home-require-content">
					<p class="title">我提交的需求</p>
					<table class="table">
	  					<tr>
	  						<th>订单号</th>
	  						<th>需求类型</th>
	  						<th>提交时间</th>
	  						<th>状态</th>
	  						<th>操作</th>
	  					</tr>
	  					<?php foreach ($data as $val):?>
	  					<tr>
	  						<td><?=$val['order_id']?></td>
	  						<td>住家需求</td>
	  						<td><?=$val['create_time']?></td>
	  						<td><?php switch ($val['status']){
	  							case 0:echo '等待初审';break;
	  							case 1:echo '初审通过';break;
	  						}?></td>
	  						<td><a href="/home/requireDetail/<?=$val['id'];?>" style="color:#0099ff;text-decoration:underline">查看详情</a></td>
	  					</tr>
	  					<?php endforeach;?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		
	});
	
</script>