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
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">文章标题：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="title" value="<?=$data['title']?$data['title']:''?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">排序：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="desc" value="<?=$data['desc']?$data['desc']:''?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">是否推荐：</label>
        <div class="col-sm-5">
            <input type="radio"  name="is_hot" value="1" <?=$data['is_hot']==1?'checked':''?> >是
            <input type="radio"  name="is_hot" value="2" <?=$data['is_hot']==2?'checked':''?> >否

        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">文章概要：</label>
        <div class="col-sm-5">
            <textarea name="intro" id="" class="form-control" style="width: 100%" rows="5"><?=$data['intro']?$data['intro']:''?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">作者：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="author" value="<?=$data['author']?$data['author']:'S&H'?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">标签(多个标签用;隔开)：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="label" value="<?=$data['label']?$data['label']:''?>">
        </div>
    </div>

    <form id="img_form" action="/admin/admin/article_upload_img" method="post" enctype="multipart/form-data">
        <input type="hidden" name="article_id" value="<?=$data['id']?$data['id']:''?>">
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">封面图片：</label>
            <div class="col-xs-2">
                <?php if(empty($data['img'])):?>
                    <img src="/upload/default/school/default.jpg" style="width:200px;" id="perview_cover" class="img-thumbnail" />
                <?php else:?>
                    <img src="/upload/article/<?=$data['img']?>" style="width:200px;" id="perview_cover" class="img-thumbnail" />
                <?php endif;?>
            </div>
            <div class="col-xs-2">
                <input type="file" id="fileToUpload1" name="cover1" onchange="showPerview(this,'perview_cover');">
            </div>
        </div>


        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">内容页主图：</label>
            <div class="col-xs-2">
                <?php if(empty($data['img'])):?>
                    <img src="/upload/default/school/default.jpg" style="width:200px;" id="perview_cover3" class="img-thumbnail" />
                <?php else:?>
                    <img src="/upload/article/<?=$data['content_img']?>" style="width:200px;" id="perview_cover3" class="img-thumbnail" />
                <?php endif;?>
            </div>
            <div class="col-xs-2">
                <input type="file" id="fileToUpload3" name="cover3" onchange="showPerview(this,'perview_cover3');">
            </div>
        </div>
    </form>


    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">文章内容：</label>
        <div class="col-sm-5">
            <script id="content" type="text/plain" style="width:1024px;height:500px;"><?=$data['content']?$data['content']:''?></script>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" id="add-btn" class="btn btn-primary">确认</button>
        </div>
    </div>

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
    UE.getEditor('content');



    //获取内容
    function getContent(id) {
        var arr = UE.getEditor(id).getContent();
        return arr;
    }


    $('#add-btn').click(function(){
        var data = {};
        data.article_id = $('input[name=article_id]').val();
        data.title = $('input[name=title]').val();
        data.ishot = $('input[name=is_hot]:checked').val();
        data.desc = $('input[name=desc]').val();
        data.intro = $('textarea[name=intro]').val();
        data.author = $('input[name=author]').val();
        data.label = $('input[name=label]').val();
        data.content = getContent('content');
        $.post('/admin/admin/article_add',data,function(res){
            if(res.status === 888){
                $('input[name=article_id]').val(res.msg);
                $('#img_form').submit();
            }
        },'json')
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
</body>
</html>