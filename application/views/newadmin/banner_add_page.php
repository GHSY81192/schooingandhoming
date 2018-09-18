<script type="text/javascript" charset="utf-8" src="/public/js/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/js/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/public/lang/zh-cn/zh-cn.js"></script>

<style type="text/css">
    div{
        width:100%;
    }
</style>
<div style="margin-top: 30px" class="form-horizontal">
    <form id="img_form" action="/admin/admin/banner_add/<?=$type?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="banner_id" value="<?=$data['id']?$data['id']:''?>">
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">封面图片：</label>
            <div class="col-xs-3">
                <?php if(empty($data['file_name'])):?>
                    <img src="/upload/default/school/default.jpg" style="width:200px;" id="perview_cover" class="img-thumbnail" />
                <?php else:?>
                    <img src="/upload/<?php echo get_filepath_by_route_id(0,$data['file_name']) ?>" style="width:200px;" id="perview_cover" class="img-thumbnail" />
                <?php endif;?>
            </div>
            <div class="col-xs-2">
                <input type="file" id="fileToUpload1" name="cover1" onchange="showPerview(this,'perview_cover');">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">链接：</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="link" value="<?=$data['link']?$data['link']:''?>" >

            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="确认" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>
<script type="text/javascript"  src="/public/js/ajaxfileupload.js"></script>
<script type="text/javascript">
    layui.use(['laydate','element','laypage','layer'], function(){
        $ = layui.jquery;//jquery
        laydate = layui.laydate;//日期插件
        lement = layui.element();//面包导航
        layer = layui.layer;//弹出层
    });
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
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
</body>
</html>