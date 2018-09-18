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
                        <th>名称</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $item): ?>
                    <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['name'] ?></td>
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
    window.location.href = "/admin/common/school_item_edit?id=" + id + "&type=<?php echo $this->input->get('type') ?>";
}

function create() {
    window.location.href = "/admin/common/school_item_create?type=<?php echo $this->input->get('type') ?>";
}

function _delete(id) {
    if(confirm("确认删除?")) {
        $.getJSON('/admin/common/school_item_delete',{id:id,type:'<?php echo $this->input->get('type') ?>'},function(resp){
            if(resp.status == 1) {
                window.location.reload();
            }
        });
    }
}
</script>