<div class="container-fluid" style="margin-top:60px;">
    <div class="row" style="margin-top: 16px;">
        <div class="col-md-12">
            <?php echo $this->pagination->create_links(); ?>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>姓名</th>
                    <th>联系电话</th>
                    <th>留言</th>
                    <th>参加课程</th>
                    <th>留言时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $item): ?>
                    <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['name'] ?></td>
                        <td><?php echo $item['tel'] ?></td>
                        <td><?php echo $item['info'] ?></td>
                        <td><?php echo $item['service_name'] ?></td>
                        <td><?php echo $item['timeIn'] ?></td>
                        <td>
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
            $.getJSON('/admin/common/message_delete',{id:id},function(resp){
                if(resp.status == 1) {
                    window.location.reload();
                }
            });
        }
    }
</script>