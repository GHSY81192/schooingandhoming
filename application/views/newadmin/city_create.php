<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" name="form" role="form" id="form" enctype="multipart/form-data" method="post" action="/admin/admin/city_create_submit">
                <h2 class="col-xs-offset-1 col-xs-10">信息修改</h2>
                <input type="hidden" name="state_id" value="<?php echo $state['id'] ?>" />
                <div class="form-group">
                    <label class="col-xs-2 control-label">中文</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="name_cn" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">英文</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="name_en" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">经度</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="lng" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">纬度</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="lat" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">所属州</label>
                    <div class="col-xs-4">
                        <p class="form-control-static"><?php echo $state['name_cn'] ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">邮编</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="zip_codes" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">地区编号</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="area_code" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">人口</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="population" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">家庭数</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="households" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">中等人群收入</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="median_income" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">陆地面积</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="land_area" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">水域面积</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="water_area" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">是否首府</label>
                    <div class="col-xs-1">
                        <select class="form-control input-sm" name="is_capital">
                            <option value="0" selected="selected">否</option>
                            <option value="1">是</option>
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
            window.location.href = "/admin/admin/city_mgr?state_id=<?php echo $city['state_id'] ?>";
        });
    });
</script>