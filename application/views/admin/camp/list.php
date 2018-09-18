<div class="container-fluid" style="margin-top:60px;">
    <div class="row" style="margin-top: 16px;">
        <div class="col-md-12">
            <?php echo $this->pagination->create_links(); ?>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>名称</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $item): ?>
                    <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['name_cn'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-xs" onclick="_pic(<?php echo $item['id'] ?>);">图片管理</button>
                            <button type="button" class="btn btn-warning btn-xs" onclick="location.href='/admin/common/camp_add_page/<?php echo $item['id'] ?>'">修改</button>
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








<script>
    function _delete(id) {
        if(confirm("确认删除?")) {
            $.getJSON('/admin/common/mysql_delete',{id:id,table:'camp'},function(resp){
                if(resp.status == 1) {
                    window.location.reload();
                }
            });
        }
    }
    function _pic(id) {
        location.href='/admin/common/camp_pic/'+id;
    }
</script>