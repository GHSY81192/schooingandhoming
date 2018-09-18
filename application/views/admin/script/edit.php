<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo @$title?></title>
         <link rel="shortcut icon" href="/favicon.ico">
        <link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap.min.css" media="all">
        <script type="text/javascript" src="/public/bootstrap/js/jquery.min.js"></script>
        <script type="text/javascript" src="/public/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/public/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
	    <script type="text/javascript" src="/public/bootstrap/js/bootstrap-datetimepicker.zh-CN.js"></script>
	    <link rel="stylesheet" type="text/css" href="/public/bootstrap/css/datetimepicker.css" media="all">
	    <script type="text/javascript" src="/public/js/ajaxfileupload.js"></script>
        <style>
			td,th{text-align:center}
			.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{line-height:34px;padding:4px 0px}
			th.th0{width:60px}
			th.th1{width:100px}
			th.th2{width:200px}
			th.th3{width:300px}
			th.th4{width:450px}
		</style>
    </head>
	<body id="login-page">
     
    <div class="clearfix" style="margin-top:60px">
    <style type="text/css">
	.page a,.page strong {border: 1px solid #efefef;padding: 10px 20px;}
	.btn{margin-bottom:9px}
</style>
	<form class="form-inline search-form" action="/admin/common/index" method="post">
	  
	  <div class="form-group">
	    <label for="order_number">名称：</label>
	    <input type="text" class="form-control" name="name_cn" value="<?=@$ret['name_cn'];?>" />
	  </div>
	  
	  <button type="submit" class="btn btn-default">查询</button>&nbsp;&nbsp;&nbsp;
	</form>
	<div class="clearfix page" style="margin:10px 0px;padding:10px">
	<span>翻页：</span>
	<?php
		echo $this->pagination->create_links();
	?>
	</div>

<table class="table table-hover table-striped table-bordered">
  <tr>
  	<th class="th0">序号</th>
  	<th class="th1">名称</th>
  	<th class="th1">封面图片</th>
  	<th class="th1">cover图片</th>
  </tr>
  <?php foreach ($data as $val):?>
  <tr>
	<td><?php echo $val['id'];?></td>
	<td><?php echo $val['name_cn'];?></td>
	<td><img src="/upload/<?php echo get_filepath_by_route_id($val['id'],$val['index_hot_cover']); ?>" class="hd-headimg">
		<a href="javascript:void(0);" onclick="ajaxFileUpload(<?php echo $val['id'];?>)">上传</a>
		<input type="file" class="file-input form-control" id="pic" name="pic" />	
	</td>
	<td><img src="/upload/<?php echo get_filepath_by_route_id($val['id'],$val['cover']); ?>" class="hd-headimg">
		<a href="javascript:void(0);" onclick="ajaxFileUpload2(<?php echo $val['id'];?>)">上传</a>
		<input type="file" class="file-input form-control" id="pic2" name="pic2" />	
	</td>
  </tr>
  <?php endforeach;?>
</table>


<script type="text/javascript">
function ckEmpty(type,des,name){
	ts = ''+type+'[name='+des+']';
	var data = $(ts).val();
	if(!data){
		alert('请填写'+name);
		$(ts).focus();
		
		return false;
	}
	return data;
}
function ajaxFileUpload(id){	
	$.ajaxFileUpload
	(
		{
			url:'/admin/common/uploadPic/'+id,
			secureuri:false,
			fileElementId:'pic',
			dataType: 'json',
			success: function (data, status)
			{
				if(data.status == 'success'){
					pic = data.data;
					$('.face-edit-icon').attr('src',data.data);
					$('input[name=head_image]').val(pic);
					$('.face-edit-icon').addClass('hide');
					$('.face-edit').show();
				}else{
					//alert(data.data);
				}
// 				$('.file-input').change(function(){
// 					ajaxFileUpload();
// 				});
			},
			error: function (data, status, e)
			{
				alert(e);
// 				$('.file-input').change(function(){
// 					ajaxFileUpload();
// 				});
			}
		}
	)
	return false;
}

function ajaxFileUpload2(id){	
	$.ajaxFileUpload
	(
		{
			url:'/admin/common/uploadPic2/'+id,
			secureuri:false,
			fileElementId:'pic2',
			dataType: 'json',
			success: function (data, status)
			{
				if(data.status == 'success'){
					pic = data.data;
					$('.face-edit-icon').attr('src',data.data);
					$('input[name=head_image]').val(pic);
					$('.face-edit-icon').addClass('hide');
					$('.face-edit').show();
				}else{
					//alert(data.data);
				}
// 				$('.file-input').change(function(){
// 					ajaxFileUpload();
// 				});
			},
			error: function (data, status, e)
			{
				alert(e);
// 				$('.file-input').change(function(){
// 					ajaxFileUpload();
// 				});
			}
		}
	)
	return false;
}
</script>
</div>
</body>
</html>