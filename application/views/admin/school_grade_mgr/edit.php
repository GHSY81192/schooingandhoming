<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" name="form" role="form" id="form" enctype="multipart/form-data" method="post" action="/admin/common/school_grade_submit">
            <input type="hidden" name="action" value="<?php echo $action ?>" />
            <input type="hidden" name="id" value="<?php echo $item['id'] ?>" />
            <h2 class="col-xs-offset-1 col-xs-10">编辑年级</h2>
                <div class="form-group">
                    <label class="col-xs-2 control-label">名称</label>
                    <div class="col-xs-3">
                        <input class="form-control input-sm" type="text" name="name" value="<?php echo $item['name'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">分类</label>
                    <div class="col-xs-3">
                        <input class="form-control input-sm" type="text" name="type" value="<?php echo $item['type'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">参考年龄</label>
                    <div class="col-xs-3">
                        <input class="form-control input-sm" type="text" name="ref_age" value="<?php echo $item['ref_age'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">分类备注</label>
                    <div class="col-xs-3">
                        <input class="form-control input-sm" type="text" name="remark" value="<?php echo $item['remark'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">分类备注（英文）</label>
                    <div class="col-xs-3">
                        <input class="form-control input-sm" type="text" name="remark_en" value="<?php echo $item['remark_en'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">是否显示</label>
                    <div class="col-xs-1">
                        <select class="form-control input-sm" name="is_show">
                            <option value="0" <?php if($item['is_show'] == 0) echo 'selected="selected"' ?>>否</option>
                            <option value="1" <?php if($item['is_show'] == 1) echo 'selected="selected"' ?>>是</option>
                        </select>
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
        window.location.href = "/admin/common/school_grade_mgr";
    });
});
</script>