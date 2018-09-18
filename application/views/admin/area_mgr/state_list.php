<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
		<div class="col-md-12">
			<form class="form-inline" role="form">
				<div class="form-group">
					<p class="input-group input-group-sm">
						<input size="25" type="text" class="form-control input-sm" placeholder="名称..." name="name" value="<?php echo $this->input->get('name') ?>">
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
            <?php echo $this->pagination->create_links(); ?>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>中文</th>
                        <th>英文</th>
                        <th>编号</th>
                        <th>经度</th>
                        <th>纬度</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $item): ?>
                    <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['name_cn'] ?></td>
                        <td><?php echo $item['name_en'] ?></td>
                        <td><?php echo $item['state_code'] ?></td>
                        <td><?php echo $item['lng'] ?></td>
                        <td><?php echo $item['lat'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-xs" onclick="edit(<?php echo $item['id'] ?>);">修改</button>
                            <button type="button" class="btn btn-primary btn-xs" onclick="goCityList(<?php echo $item['id'] ?>);">城市列表</button>
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
function goCityList(state_id) {
    window.location.href = "/admin/common/city_mgr?state_id=" + state_id;
}

function edit(id) {
    window.location.href = "/admin/common/state_edit?id=" + id;
}
</script>