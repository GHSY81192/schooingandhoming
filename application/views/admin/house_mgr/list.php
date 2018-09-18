<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
		<div class="col-md-12">
			<form class="form-inline" role="form">
                <div class="form-group">
					<p class="input-group input-group-sm">
						<input size="25" type="text" class="form-control input-sm" placeholder="城市..." name="city" value="<?php echo $this->input->get('city') ?>">
					</p>
				</div>
                <div class="form-group">
					<p class="input-group input-group-sm">
						<input size="25" type="text" class="form-control input-sm" placeholder="电话..." name="phone" value="<?php echo $this->input->get('phone') ?>">
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
        </div>
	</div>

    <div class="row" style="margin-top: 16px;">
        <div class="col-md-12">
            <?php echo $this->pagination->create_links(); ?>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>标题</th>
                        <th>城市</th>
                        <th>封面图</th>
                        <th>首页推荐图</th>
                        <th>地址</th>
                        <th>价格</th>
                        <th>联系电话</th>
                        <th>联系Email</th>
                        <th>建造时间</th>
                        <th>最后装修时间</th>
                        <th>房屋类型</th>
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
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['title'] ?></td>
                        <td><?php echo $item['city_name'] ?></td>
                        <td><img src="/upload/<?php echo get_filepath_by_route_id($item['id'],$item['cover'],2) ?>" style="width:50px;" /></td>
                        <td><img src="/upload/<?php echo get_filepath_by_route_id($item['id'],$item['index_hot_cover'],2) ?>" style="width:50px;" /></td>
                        <td><?php echo $item['address'] ?></td>
                        <td><?php echo $item['price'] ?></td>
                        <td><?php echo $item['contact_number'] ?></td>
                        <td><?php echo $item['contact_email'] ?></td>
                        <td><?php echo !empty($item['house_create_time']) ? substr($item['house_create_time'],0,4) : '' ?></td>
                        <td><?php echo !empty($item['house_last_decorate']) ? substr($item['house_last_decorate'],0,4) : '' ?></td>
                        <td><?php echo $item['house_type'] ?></td>
                        <td><?php echo $item['lng'] ?></td>
                        <td><?php echo $item['lat'] ?></td>
                        <td><?php echo $item['is_hot'] == 1 ? '是' : '否'  ?></td>
                        <td><?php echo $item['sort'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-xs" onclick="edit(<?php echo $item['id'] ?>);">修改</button>
                            <!--<button type="button" class="btn btn-primary btn-xs" onclick="editComment(<?php echo $item['id'] ?>);">评论</button>-->
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
    window.location.href = "/admin/common/house_edit?id="+id;
}

function _delete(id) {
    if(confirm("确认删除?")) {
        $.getJSON('/admin/common/house_delete',{id:id},function(resp){
            if(resp.status == 1) {
                window.location.reload();
            }
        });
    }
}

function create() {
    window.location.href = "/admin/common/house_create";
}

function editComment(id) {
    window.location.href = "/admin/common/house_comment_edit";
}
</script>