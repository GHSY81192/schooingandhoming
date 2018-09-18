<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
		<div class="col-md-12">
			<form class="form-inline" role="form">
				<div class="form-group">
					<p class="input-group input-group-sm">
						<input size="25" type="text" class="form-control input-sm" placeholder="学校名称..." name="name" value="<?php echo $this->input->get('name') ?>">
					</p>
				</div>
                <div class="form-group">
					<p class="input-group input-group-sm">
						<input size="25" type="text" class="form-control input-sm" placeholder="城市..." name="city" value="<?php echo $this->input->get('city') ?>">
					</p>
				</div>
                <div class="form-group">
                    <p class="input-group input-group-sm">
                        <input size="25" type="text" class="form-control input-sm" placeholder="州..." name="state" value="<?php echo $this->input->get('state') ?>">
                    </p>
                </div>
                <div class="form-group">
                    <p class="input-group input-group-sm">
                        <input size="5" type="text" class="form-control input-sm" placeholder="ID..." name="id" value="<?php echo $this->input->get('id') ?>">
                    </p>
                </div>
                <div class="form-group">
					<label class="sr-only">是否推荐: </label>
					<p class="input-group input-group-sm">
						<select class="form-control input-sm" name="is_hot">
							<option value="-1">==是否推荐==</option>
                            <option value="1" <?php echo $this->input->get('is_hot') == 1 ? "selected='selected'" : "" ?>>是</option>
						</select>
					</p>
				</div>
				<div class="form-group m-btn-group-fix">
					<p class="input-group input-group-sm">
						<span class="input-group-btn"> <input class="btn btn-primary" type="submit" value="搜索"></span>
					</p>
				</div>
			</form>
		</div>
	</div>

    <div class="row" style="margin-top: 16px;">
        <div class="col-md-12">
            <input class="btn btn-primary" type="button" value="新增" onclick="create();">
            <input class="btn btn-primary" type="button" value="批量导出" onclick="schoolExport();">
            <input class="btn btn-primary" type="button" value="批量导入" onclick="schoolImport();">
            <input class="btn btn-danger" type="button" value="批量删除" onclick="allDelete();">
        </div>
	</div>

    <div class="row" style="margin-top: 16px;">
        <div class="col-md-12">
            <?php echo $this->pagination->create_links(); ?>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><button class="choose" value="1">全/反 选</button></th>
                        <th>ID</th>
                        <th>学校名称（中文）</th>
                        <th>学校名称（英文）</th>
                        <th>网址</th>
                        <th>城市</th>
                        <th>邮编</th>
                        <th>封面图</th>
                        <th>首页展示图</th>
                        <th>学校类型</th>
                        <th>经度</th>
                        <th>纬度</th>
                        <th>首页推荐</th>
                        <th>排序</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $item): ?>
                    <tr>
                        <td><input type="checkbox" name="schoolData" value="<?php echo $item['id'] ?>"></td>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['name_cn'] ?></td>
                        <td><?php echo $item['name_en'] ?></td>
                        <td><?php echo $item['url'] ?></td>
                        <td><?php echo $item['city_name'] ?></td>
                        <td><?php echo $item['zip_code'] ?></td>
                        <td><img src="/upload/<?php echo get_filepath_by_route_id($item['id'],$item['cover'],1) ?>" style="width:50px;" /></td>
                        <td><img src="/upload/<?php echo get_filepath_by_route_id($item['id'],$item['index_hot_cover'],1) ?>" style="width:50px;" /></td>
                        <td><?php echo $item['school_type'] ?></td>
                        <td><?php echo $item['lng'] ?></td>
                        <td><?php echo $item['lat'] ?></td>
                        <td><?php echo $item['is_hot'] == 1 ? '是' : '否'  ?></td>
                        <td><?php echo $item['sort'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-xs" onclick="edit(<?php echo $item['id'] ?>);">修改</button>
                            <button type="button" class="btn btn-danger btn-xs" onclick="_delete(<?php echo $item['id'] ?>);">删除</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>	
</div>
<script type="text/javascript">
function edit(id) {
    window.location.href = "/admin/common/school_edit?id="+id;
}

function _delete(id) {
    if(confirm("确认删除?")) {
        $.getJSON('/admin/common/school_delete',{id:id},function(resp){
            if(resp.status == 1) {
                window.location.reload();
            }
        });
    }
}

function create() {
    window.location.href = "/admin/common/school_create";
}

function schoolImport() {
    window.location.href = "/admin/common/school_import";
}

function schoolExport() {
    window.location.href = "/admin/common/school_export";
}

$('.choose').click(function(){
    if($(this).val() == 1){
        $('input[name=schoolData]').prop('checked',true);
        $(this).val(2);

    }
    else{
        $('input[name=schoolData]').prop('checked',false);
        $(this).val(1);

    }
})

/*批量删除*/
function allDelete() {
    var ids = '';
    $('input[name=schoolData]:checked').each(function(){
        ids += $(this).val()+',';
    })
    if(!ids){
        return false;
    }
    $.ajax({
        url:"/admin/common/school_allDelete?ids="+ids,
        data:ids,
        dataType:'json',
        type:'GET',
        success:function(res){
            if(res == 'success'){
                $('input[name=schoolData]:checked').each(function(){
                    $(this).parents('tr').remove();
                })
            }else{
                alert('删除失败，请重试！');
            }
        }
    });
}
</script>