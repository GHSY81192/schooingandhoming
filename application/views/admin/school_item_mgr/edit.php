<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" name="form" role="form" id="form" enctype="multipart/form-data" method="post" action="/admin/common/school_item_submit">
            <input type="hidden" name="type" value="<?php echo $this->input->get('type') ?>" />
            <input type="hidden" name="action" value="<?php echo $action ?>" />
            <input type="hidden" name="id" value="<?php echo $item['id'] ?>" />
            <h2 class="col-xs-offset-1 col-xs-10">
                编辑
                <?php if($this->input->get('type') == 'ap') echo 'AP课程' ?>
                <?php if($this->input->get('type') == 'sport') echo '运动项目' ?>
                <?php if($this->input->get('type') == 'club') echo '学生社团' ?>
                </h2>
                <div class="form-group">
                    <label class="col-xs-2 control-label">名称</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="name" value="<?php echo $item['name'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-4 col-xs-10">
                        <input class="btn btn-success" type="submit" value="保存">
                        <input class="btn btn-info" type="button" value="返回" id="back">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $("#back").click(function(){
        window.location.href = "/admin/common/school_item_mgr?type=<?php echo $this->input->get('type') ?>";
    });
});
</script>