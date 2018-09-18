<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" name="form" role="form" id="form" enctype="multipart/form-data" method="post" action="/admin/common/house_rule_edit_submit">
            <input type="hidden" name="id" value="<?php echo $house_rule_items['id'] ?>" />
            <h2 class="col-xs-offset-1 col-xs-10">添加规则</h2>
                <div class="form-group">
                    <label class="col-xs-2 control-label">名称</label>
                    <div class="col-xs-2">
                        <input class="form-control input-sm" type="text" name="name" value="<?php echo $house_rule_items['name'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">图标</label>
                    <div class="col-xs-2">
                        <img src="/upload/<?php echo get_filepath_by_route_id(0,$house_rule_items['image']) ?>" style="width:200px;" id="perview_image" class="img-thumbnail" />
                    </div>
                    <div class="col-xs-2">
                        <input type="file" name="image" onchange="showPerview(this,'perview_image');">
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
        window.location.href = "/admin/common/house_rule_mgr";
    });
});

function showPerview(obj,perviewId) {
    var file = obj.files[0];
    if (!/image\/\w+/.test(file.type)) {
        alert("请确保文件为图像类型");
        return false;
    }
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function(e) {
        $("#" + perviewId).attr("src",this.result);
    }
}
</script>