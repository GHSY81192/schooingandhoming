<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" name="form" role="form" id="form" enctype="multipart/form-data" method="post" action="/admin/common/city_submit">
            <input type="hidden" name="id" value="<?php echo $city['id'] ?>"/>
            <h2 class="col-xs-offset-1 col-xs-10">信息修改</h2>
                <div class="form-group">
                    <label class="col-xs-2 control-label">中文</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="name_cn" value="<?php echo $city['name_cn'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">英文</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="name_en" value="<?php echo $city['name_en'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">经度</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="lng" value="<?php echo $city['lng'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">纬度</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="lat" value="<?php echo $city['lat'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">所属州</label>
                    <div class="col-xs-4">
                        <select class="form-control input-sm" name="state_id">
                            <?php foreach($state as $item): ?>
                            <option value="<?php echo $item['id'] ?>" <?php echo $city['state_id'] == $item['id'] ? "selected='selected'" : "" ?>><?php echo $item['name_cn'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">邮编</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="zip_codes" value="<?php echo $city['zip_codes'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">地区编号</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="area_code" value="<?php echo $city['area_code'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">人口</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="population" value="<?php echo $city['population'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">家庭数</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="households" value="<?php echo $city['households'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">中等人群收入</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="median_income" value="<?php echo $city['median_income'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">陆地面积</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="land_area" value="<?php echo $city['land_area'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">水域面积</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="water_area" value="<?php echo $city['water_area'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">是否首府</label>
                    <div class="col-xs-1">
                        <select class="form-control input-sm" name="is_capital">
                            <option value="0" <?php echo $city['is_capital'] == 0 ? "selected='selected'" : "" ?>>否</option>
                            <option value="1" <?php echo $city['is_capital'] == 1 ? "selected='selected'" : "" ?>>是</option>
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
        window.location.href = "/admin/common/city_mgr?state_id=<?php echo $city['state_id'] ?>";
    });
});
</script>