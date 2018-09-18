<div class="container-fluid" style="margin-top:60px;">
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
                        <th>年级</th>
                        <th>分类</th>
                        <th>参考年龄</th>
                        <th>分类备注</th>
                        <th>分类备注（英文）</th>
                        <th>是否显示</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $item): ?>
                    <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['name'] ?></td>
                        <td><?php echo $item['type'] ?></td>
                        <td><?php echo $item['ref_age'] ?></td>
                        <td><?php echo $item['remark'] ?></td>
                        <td><?php echo $item['remark_en'] ?></td>
                        <td><?php if($item['is_show'] == 1) echo '<b>是</b>' ?><?php if($item['is_show'] == 0) echo '否' ?></td>
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
    window.location.href = "/admin/common/school_grade_edit?id=" + id;
}

function create() {
    window.location.href = "/admin/common/school_grade_create";
}

function _delete(id) {
    if(confirm("确认删除?")) {
        $.getJSON('/admin/common/school_grade_delete',{id:id},function(resp){
            if(resp.status == 1) {
                window.location.reload();
            }
        });
    }
}
</script>