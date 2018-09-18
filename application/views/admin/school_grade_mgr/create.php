<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" name="form" role="form" id="form" enctype="multipart/form-data" method="post" action="/admin/common/school_grade_submit">
            <input type="hidden" name="action" value="<?php echo $action ?>" />
            <h2 class="col-xs-offset-1 col-xs-10">添加年级</h2>
                <div class="form-group">
                    <label class="col-xs-2 control-label">名称</label>
                    <div class="col-xs-3">
                        <input class="form-control input-sm" type="text" name="name" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">分类</label>
                    <div class="col-xs-3">
                        <input class="form-control input-sm" type="text" name="type" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">参考年龄</label>
                    <div class="col-xs-3">
                        <input class="form-control input-sm" type="text" name="ref_age" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">分类备注</label>
                    <div class="col-xs-3">
                        <input class="form-control input-sm" type="text" name="remark" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">分类备注（英文）</label>
                    <div class="col-xs-3">
                        <input class="form-control input-sm" type="text" name="remark_en" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">是否显示</label>
                    <div class="col-xs-1">
                        <select class="form-control input-sm" name="is_show">
                            <option value="0">否</option>
                            <option value="1" selected="selected">是</option>
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