<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
        <div class="col-md-12">
            <h2 class="col-xs-offset-1 col-xs-10">Banner图</h2>
            <form class="form-horizontal" name="form" role="form" id="form" enctype="multipart/form-data" method="post" action="/admin/common/index_banner_mgr_submit">
                <?php foreach($index as $item): ?>
                <div class="form-group">
                    <label class="col-xs-2 control-label">链接</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="link_<?php echo $item['id'] ?>" value="<?php echo $item['link'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label"></label>
                    <div class="col-xs-2">
                        <img src="/upload/<?php echo get_filepath_by_route_id(0,$item['file_name']) ?>" style="width:300px;" id="perview_image<?php echo $item['id'] ?>" class="img-thumbnail" />
                    </div>
                    <div class="col-xs-2">
                        <input type="file" name="image<?php echo $item['id'] ?>" onchange="showPerview(this,'perview_image<?php echo $item['id'] ?>')">
                    </div>
                </div>
                    <hr/>
                <?php endforeach; ?>
                <div class="form-group">
                    <div class="col-xs-offset-4 col-xs-10">
                        <input class="btn btn-success" type="submit" value="保存">
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-12">
            <h2 class="col-xs-offset-1 col-xs-10">移动端Banner图</h2>
            <form class="form-horizontal" name="form" role="form" id="form" enctype="multipart/form-data" method="post" action="/admin/common/index_banner_mgr_submit2">
                <?php foreach($mobile_index as $item): ?>
                <div class="form-group">
                    <label class="col-xs-2 control-label">链接</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="link_<?php echo $item['id'] ?>" value="<?php echo $item['link'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label"></label>
                    <div class="col-xs-2">
                        <img src="/upload/<?php echo get_filepath_by_route_id(0,$item['file_name']) ?>" style="width:300px;" id="perview_image<?php echo $item['id'] ?>" class="img-thumbnail" />
                    </div>
                    <div class="col-xs-2">
                        <input type="file" name="image<?php echo $item['id'] ?>" onchange="showPerview(this,'perview_image<?php echo $item['id'] ?>')">
                    </div>
                </div>
                <hr/>
                <?php endforeach; ?>
                <div class="form-group">
                    <div class="col-xs-offset-4 col-xs-10">
                        <input class="btn btn-success" type="submit" value="保存">
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {

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