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
<form style="margin-top: 30px" class="form-horizontal">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">服务名称：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="service_name" value="<?=$service_name?$service_name:''?>" >
            <input type="hidden" name="service_id" value="<?=$id?$id:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">价格：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="price" value="<?=$price?$price:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">讲师：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="teacher" value="<?=$teacher?$teacher:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">课程形式：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="model" value="<?=$model?$model:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">科目类别：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="list_type" value="<?=$list_type?$list_type:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">授课方：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="list_skf" value="<?=$list_skf?$list_skf:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">开课时间：</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="time_start" value="<?=$time_start?$time_start:''?>" >
        </div>
        <span class="col-sm-1" style="text-align: center;line-height: 34px"> 至 </span>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="time_end" value="<?=$time_end?$time_end:''?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">适合对象：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="object" value="<?=$object?$object:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">列表图：</label>
        <div class="col-xs-2">
            <?php if(empty($img)):?>
                <img src="/upload/default/school/default.jpg" style="width:200px;" id="perview_cover" class="img-thumbnail" />
            <?php else:?>
                <img src="/upload/default/service/<?=$img?>" style="width:200px;" id="perview_cover" class="img-thumbnail" />
            <?php endif;?>
        </div>
        <div class="col-xs-2">
            <input type="file" id="fileToUpload" name="cover" onchange="showPerview(this,'perview_cover');">

        </div>
    </div>




    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">课程简介：</label>
        <div class="col-sm-5">
            <script id="content" type="text/plain" style="width:1024px;height:300px;"><?=$content?$content:''?></script>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">师资介绍：</label>
        <div class="col-sm-5">
            <script id="introduce" type="text/plain" style="width:1024px;height:300px;"><?=$introduce?$introduce:''?></script>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">课程形式：</label>
        <div class="col-sm-5">
            <script id="modality" type="text/plain" style="width:1024px;height:300px;"><?=$modality?$modality:''?></script>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">课程安排：</label>
        <div class="col-sm-5">
            <script id="plan" type="text/plain" style="width:1024px;height:300px;"><?=$plan?$plan:''?></script>
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" id="add-btn" class="btn btn-primary">确认</button>
        </div>
    </div>

</form>
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
    UE.getEditor('introduce');
    UE.getEditor('modality');
    UE.getEditor('plan');
    //获取内容
    function getContent(id) {
        var arr = UE.getEditor(id).getContent();
        return arr;
    }


    $('#add-btn').click(function(){
        var data = {};
        data.service_id = $('input[name=service_id]').val();
        data.service_name = $('input[name=service_name]').val();
        data.model = $('input[name=model]').val();
        data.price = $('input[name=price]').val();
        data.list_type = $('input[name=list_type]').val();
        data.list_skf = $('input[name=list_skf]').val();
        data.time_start = $('input[name=time_start]').val();
        data.time_end = $('input[name=time_end]').val();
        data.object = $('input[name=object]').val();
        data.teacher = $('input[name=teacher]').val();


        data.content = getContent('content');
        data.introduce = getContent('introduce');
        data.modality = getContent('modality');
        data.plan = getContent('plan');



        $.post('/admin/admin/service_add',data,function(data){
            var service_id = $('input[name=service_id]').val();
            if(data.status === 888){
                var id = service_id?service_id:data.msg;
                $.ajaxFileUpload({
                    url:'/admin/admin/AjaxFileUpload',//处理图片脚本
                    data:{id:id,table:'service'},
                    secureuri :false,
                    fileElementId :'fileToUpload',//file控件id
                    dataType : 'json',
                    success : function (res){
                        if(res=='888'){
                            layer.alert('操作成功！',function(){
                                parent.location.reload();
                            })
                        }
                    }
                });
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