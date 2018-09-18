<div class="container-fluid" style="margin-top:60px;">

    <div class="row" style="margin-top: 16px;">
        <div class="col-md-12">
            <input class="btn btn-primary" type="button" value="新增" onclick="create();">
        </div>
	</div>

    <div class="row" style="margin-top: 16px;">
        <div class="col-md-12">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>名称</th>
                        <th>图标</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($house_rule_items as $item): ?>
                    <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['name'] ?></td>
                        <td>
                        <?php if(!empty($item['image'])): ?>
                        <img src="/upload/<?php echo get_filepath_by_route_id(0,$item['image']); ?>" style="width:50px;" />
                        <?php endif; ?>
                        </td>
                        <td><button type="button" class="btn btn-primary btn-xs" onclick="edit(<?php echo $item['id'] ?>);">修改</button></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>	
</div>
<script type="text/javascript">
function create() {
    window.location.href = "/admin/common/house_rule_create";
}
function edit(id) {
    window.location.href = "/admin/common/house_rule_edit?id=" + id;
}
</script>