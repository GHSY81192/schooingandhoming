<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
        <div class="col-md-12">
            <div class="tab-pane fade in active" id="banner">
                <form class="form-horizontal" name="form" role="form" id="form" enctype="multipart/form-data" method="post" action="/admin/common/index_hot_mgr_submit">
                    <h2 class="col-xs-offset-1 col-xs-10">上图</h2>
                    <?php 
                    $i = 1;
                    foreach($index_up as $item): ?>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">标题（<?php echo $i ?>）</label>
                        <div class="col-xs-4">
                            <input class="form-control input-sm" type="text" name="title<?php echo $item['id'] ?>" value="<?php echo $item['title'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">副标题（<?php echo $i ?>）</label>
                        <div class="col-xs-4">
                            <input class="form-control input-sm" type="text" name="desc<?php echo $item['id'] ?>" value="<?php echo $item['desc'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">链接（<?php echo $i ?>）</label>
                        <div class="col-xs-4">
                            <input class="form-control input-sm" type="text" name="link<?php echo $item['id'] ?>" value="<?php echo $item['link'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">图片（<?php echo $i ?>）</label>
                        <div class="col-xs-2">
                            <img src="/upload/<?php echo get_filepath_by_route_id(0,$item['file_name']) ?>" style="width:200px;" id="perview_up_image<?php echo $i ?>" class="img-thumbnail" />
                        </div>
                        <div class="col-xs-2">
                            <input type="file" name="image<?php echo $item['id'] ?>" onchange="showPerview(this,'perview_up_image<?php echo $i ?>')">
                        </div>
                    </div>
                    <hr/>
                    <?php 
                    $i++;
                    endforeach; ?>
                    <h2 class="col-xs-offset-1 col-xs-10">下图</h2>
                    <?php 
                    $i = 1;
                    foreach($index_down as $item): ?>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">标题（<?php echo $i ?>）</label>
                        <div class="col-xs-4">
                            <input class="form-control input-sm" type="text" name="title<?php echo $item['id'] ?>" value="<?php echo $item['title'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">副标题（<?php echo $i ?>）</label>
                        <div class="col-xs-4">
                            <input class="form-control input-sm" type="text" name="desc<?php echo $item['id'] ?>" value="<?php echo $item['desc'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">链接（<?php echo $i ?>）</label>
                        <div class="col-xs-4">
                            <input class="form-control input-sm" type="text" name="link<?php echo $item['id'] ?>" value="<?php echo $item['link'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">图片（<?php echo $i ?>）</label>
                        <div class="col-xs-2">
                            <img src="/upload/<?php echo get_filepath_by_route_id(0,$item['file_name']) ?>" style="width:200px;" id="perview_down_image<?php echo $i ?>" class="img-thumbnail" />
                        </div>
                        <div class="col-xs-2">
                            <input type="file" name="image<?php echo $item['id'] ?>" onchange="showPerview(this,'perview_down_image<?php echo $i ?>')">
                        </div>
                    </div>
                    <hr/>
                    <?php 
                    $i++;
                    endforeach; ?>
                    <div class="form-group">
                        <div class="col-xs-offset-4 col-xs-10">
                            <input class="btn btn-success" type="submit" value="保存">
                        </div>
                    </div>
                </form>
            </div>
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