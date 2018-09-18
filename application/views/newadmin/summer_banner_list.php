<script type="text/javascript"  src="/public/js/ajaxfileupload.js"></script>
<div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>暑期项目</cite></a>
              <a><cite>暑期banner</cite></a>
            </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
    <h3 style="color:red">* 文件后缀名必须是.jpg *</h3>
    <table class="layui-table">
        <thead>
        <tr>
            <th>缩略图</th>
            <th>类型</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody id="x-img">
            <tr>
                <td>
                    <img src="/public/images/web/summer/banner.jpg" style="height: 150px" id="perview_cover" class="img-thumbnail" />
                </td>
                <td >电脑端banner</td>
                <td class="td-manage">
                    <input type="file" id="fileToUpload" name="cover1" onchange="showPerview(this,'perview_cover');">
                    <button class="btn btn-success" onclick="ajax_upload('fileToUpload',1,'summer')" style="margin-top: 10px;width: 100px">上传</button>
                </td>
            </tr>
            <tr>
                <td><img  src="/public/images/web/summer/banner-m.jpg" style="height: 150px" id="perview_cover2" class="img-thumbnail" alt=""></td>
                <td >手机端banner</td>
                <td class="td-manage">
                    <input type="file" id="fileToUpload2" name="cover2" onchange="showPerview(this,'perview_cover2');">
                    <button class="btn btn-success" onclick="ajax_upload('fileToUpload2',2,'summer')" style="margin-top: 10px;width: 100px">上传</button>
                </td>
            </tr>
        </tbody>
    </table>

    <div id="page"></div>
</div>

<script>
    layui.use(['laydate','element','laypage','layer'], function(){
        $ = layui.jquery;//jquery
        laydate = layui.laydate;//日期插件
        lement = layui.element();//面包导航
        laypage = layui.laypage;//分页
        layer = layui.layer;//弹出层

        //以上模块根据需要引入

        layer.ready(function(){ //为了layer.ext.js加载完毕再执行
            layer.photos({
                photos: '#x-img'
                //,shift: 5 //0-6的选择，指定弹出图片动画类型，默认随机
            });
        });

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

    function ajax_upload(id,type,path){
        $.ajaxFileUpload({
            url:'/admin/admin/ajax_banner_upload',//处理图片脚本
            data:{type:type,path:path},
            secureuri :false,
            fileElementId :id,//file控件id
            dataType : 'json',
            success : function (res){
                if(res.status===888){
                    layer.alert('操作成功！',function(){
                        parent.location.reload();
                    })
                }
            }
        });
    }



</script>
</body>
</html>