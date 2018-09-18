<div class="container-fluid" style="margin-top:60px;">

    <!--<div class="row" style="margin-top: 16px;">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <input class="btn btn-primary" type="button" value="模版下载" onclick="download_template();">
        </div>
	</div>-->
    
    <div class="row" style="margin-top: 16px;">
        <div class="col-md-12">
            <form class="form-horizontal" name="form" role="form" id="form" enctype="multipart/form-data" method="post" action="/admin/common/school_import_submit">
                <div class="form-group">
                    <label class="col-xs-2 control-label">文件上传</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="file" name="file">
                    </div>
                </div>
                <?php if(isset($insertCount)): ?><h2 class="col-xs-offset-2 col-xs-10">成功导入<b><?php echo $insertCount ?></b>条数据</h2><?php endif; ?>
                <?php if(isset($updateCount)): ?><h2 class="col-xs-offset-2 col-xs-10">成功更新<b><?php echo $updateCount ?></b>条数据</h2><?php endif; ?>
                <div class="form-group">
                    <div class="col-xs-offset-4 col-xs-10">
                        <input class="btn btn-success" type="submit" value="确认上传">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    
});

function download_template() {
    window.location.href = "/admin/common/school_import_template_download";
}
</script>