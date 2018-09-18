<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" name="form" role="form" id="form" enctype="multipart/form-data" method="post" action="/admin/admin/state_submit">
                <input type="hidden" name="id" value="<?php echo $state['id'] ?>"/>
                <h2 class="col-xs-offset-1 col-xs-10">信息修改</h2>
                <div class="form-group">
                    <label class="col-xs-2 control-label">中文</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="name_cn" value="<?php echo $state['name_cn'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">英文</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="name_en" value="<?php echo $state['name_en'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">编号</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="state_code" value="<?php echo $state['state_code'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">经度</label>
                    <div class="col-xs-1">
                        <input class="form-control input-sm" type="text" name="lng" value="<?php echo $state['lng'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">纬度</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="lat" value="<?php echo $state['lat'] ?>">
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
            window.location.href = "/admin/admin/state_mgr";
        });
    });
</script>