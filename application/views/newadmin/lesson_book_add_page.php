<style>
    div{width: 100%}
    .form-group{margin: 15px 0!important;}
</style>
<form style="margin-top: 30px" class="form-horizontal">
    <div class="form-group">
        <label for="inputEmail3" class="col-xs-2 control-label">书籍名称：</label>
        <div class="col-xs-8">
            <input type="text" class="form-control" name="book_name" value="<?=$book_name?$book_name:''?>" >
            <input type="hidden" name="book_id" value="<?=$id?$id:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-xs-2 control-label">书籍封面：</label>
        <div class="col-xs-3">
            <?php if(empty($img)):?>
                <img src="/upload/default/school/default.jpg" style="width:85px;" id="perview_cover" class="img-thumbnail" />
            <?php else:?>
                <img src="/public/images/web/lesson/images/<?=$img?>" style="width:85px;" id="perview_cover" class="img-thumbnail" />
            <?php endif;?>
        </div>
        <div class="col-xs-2">
            <input type="file" id="fileToUpload" name="cover" onchange="showPerview(this,'perview_cover');">
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-xs-10">
            <button type="button" id="add-btn" class="btn btn-primary">确认</button>
        </div>
    </div>

</form>
<script type="text/javascript"  src="/public/js/ajaxfileupload.js"></script>
<script>
    layui.use(['laydate','element','laypage','layer'], function(){
        $ = layui.jquery;//jquery
        laydate = layui.laydate;//日期插件
        lement = layui.element();//面包导航

        layer = layui.layer;//弹出层

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

    $('#add-btn').click(function(){
        var data = {};
        data.book_name = $('input[name=book_name]').val();
        data.id = $('input[name=book_id]').val();
        $.post('/admin/admin/book_add',data,function(res){
            if(res.status === 888){
                var id = data.id?data.id:res.msg;
                $.ajaxFileUpload({
                    url:'/admin/admin/AjaxFileUpload',//处理图片脚本
                    data:{id:id,table:'lesson_book'},
                    secureuri :false,
                    fileElementId :'fileToUpload',//file控件id
                    dataType : 'json',
                    success : function (rs){
                        console.log(rs);
                        if(rs=='888'){
                            layer.alert('操作成功！',function(){
                                parent.location.reload();
                            })
                        }
                    }
                });
            }
        },'json')
    });
</script>