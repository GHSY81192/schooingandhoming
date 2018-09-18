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
        <label for="inputEmail3" class="col-sm-2 control-label">名称1：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="name_cn" value="<?=$name_cn?$name_cn:''?>" >
            <input type="hidden" name="summer_id" value="<?=$id?$id:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">名称2：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="name_en" value="<?=$name_en?$name_en:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">申请费用：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="price" value="<?=$price?$price:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">项目费用：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="object_price" value="<?=$object_price?$object_price:''?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">列表图：</label>
        <div class="col-xs-2">
            <?php if(empty($img)):?>
            <img src="/upload/default/school/default.jpg" style="width:200px;" id="perview_cover" class="img-thumbnail" />
            <?php else:?>
            <img src="/upload/summer/<?=$img?>" style="width:200px;" id="perview_cover" class="img-thumbnail" />
            <?php endif;?>
        </div>
        <div class="col-xs-2">
            <input type="file" id="fileToUpload" name="cover" onchange="showPerview(this,'perview_cover');">

        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">是否授予学分：</label>
        <div class="col-sm-5">
            <select name="credit" class="form-control" style="width: auto" id="">
                <option <?=$credit=='是'?'selected':''?> value="1">是</option>
                <option <?=$credit=='否'?'selected':''?> value="2">否</option>
                <option <?=$credit=='N/A'?'selected':''?> value="3">N/A</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">是否招收国际生：</label>
        <div class="col-sm-5">
            <select name="international" class="form-control" style="width: auto" id="">
                <option <?=$international=='是'?'selected':''?> value="1">是</option>
                <option <?=$international=='否'?'selected':''?> value="2">否</option>
                <option <?=$international=='N/A'?'selected':''?> value="3">N/A</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">是否提供住宿：</label>
        <div class="col-sm-5">
            <select name="is_stay" class="form-control" style="width: auto" id="">
                <option <?=$is_stay=='1'?'selected':''?> value="1">是</option>
                <option <?=$is_stay=='2'?'selected':''?> value="2">否</option>
                <option <?=$is_stay=='3'?'selected':''?> value="3">N/A</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">签证类别：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="visa" value="<?=$visa?$visa:''?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">所属类别：</label>
        <div class="col-sm-5">
            <select name="type" class="form-control" style="width: auto" id="">
                <option <?=$type_id=='1'?'selected':''?> value="1">中学类</option>
                <option <?=$type_id=='2'?'selected':''?> value="2">大学学分类</option>
                <option <?=$type_id=='3'?'selected':''?> value="3">大学非学分类</option>
                <option <?=$type_id=='4'?'selected':''?> value="4">数学类</option>
                <option <?=$type_id=='5'?'selected':''?> value="5">天才营类</option>
                <option <?=$type_id=='6'?'selected':''?> value="6">艺术营类</option>
                <option <?=$type_id=='7'?'selected':''?> value="7">科技营类</option>
                <option <?=$type_id=='8'?'selected':''?> value="8">语言类</option>
                <option <?=$type_id=='9'?'selected':''?> value="9">综合类</option>
                <option <?=$type_id=='10'?'selected':''?> value="10">户外体育类</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">面向对象：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="object" value="<?=$object?$object:''?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">项目周期：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="period" value="<?=$period?$period:''?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">授课地点：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="sponsor" value="<?=$sponsor?$sponsor:''?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">申请截止时间：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="time_end" value="<?=$time_end?$time_end:''?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">项目起始时间：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="time" value="<?=$time?$time:''?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">项目搜索时间：</label>
        <div class="col-sm-5">
            <div class="layui-form-item">
                <div class="layui-input-inline">
                    <input class="layui-input" placeholder="开始日" type="text" name="search_time_start">
                </div>
                <div class="layui-input-inline">
                    <input class="layui-input" placeholder="截止日" type="text" name="search_time_end">
                </div>
            </div>
        </div>
    </div>


    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">项目简介：</label>
        <div class="col-sm-5">
            <script id="intro" type="text/plain" style="width:1024px;height:300px;"><?=$intro?$intro:''?></script>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">申请要求：</label>
        <div class="col-sm-5">
            <script id="require" type="text/plain" style="width:1024px;height:300px;"><?=$require?$require:''?></script>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">语言要求：</label>
        <div class="col-sm-5">
            <script id="language" type="text/plain" style="width:1024px;height:300px;"><?=$language?$language:''?></script>
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

        var start = {
            min: laydate.now()
            ,max: '2099-06-16 23:59:59'
            ,istoday: false
            ,choose: function(datas){
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };

        var end = {
            min: laydate.now()
            ,max: '2099-06-16 23:59:59'
            ,istoday: false
            ,choose: function(datas){
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };

        document.getElementById('LAY_demorange_s').onclick = function(){
            start.elem = this;
            laydate(start);
        }
        document.getElementById('LAY_demorange_e').onclick = function(){
            end.elem = this
            laydate(end);
        }


    });
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('intro');
    UE.getEditor('require');
    UE.getEditor('language');
    //获取内容
    function getContent(id) {
        var arr = UE.getEditor(id).getContent();
        return arr;
    }



    $('#add-btn').click(function(){
        var data = {};
        data.summer_id = $('input[name=summer_id]').val();
        data.name_cn = $('input[name=name_cn]').val();
        data.name_en = $('input[name=name_en]').val();
        data.price = $('input[name=price]').val();
        data.object_price = $('input[name=object_price]').val();
        data.visa = $('input[name=visa]').val();
        data.credit = $('select[name=credit]').val();
        data.international = $('select[name=international]').val();
        data.is_stay = $('select[name=is_stay]').val();

        data.type_id = $('select[name=type]').val();
        data.object = $('input[name=object]').val();
        data.period = $('input[name=period]').val();
        data.sponsor = $('input[name=sponsor]').val();
        data.time_end = $('input[name=time_end]').val();
        data.time = $('input[name=time]').val();


        data.intro = getContent('intro');
        data.require = getContent('require');
        data.language = getContent('language');


        $.post('/admin/admin/summer_add',data,function(data){
            var summer_id = $('input[name=summer_id]').val();
            if(data.status === 888){
                var id = summer_id?summer_id:data.msg;
                var pic_src = $('#perview_cover').attr('src').substr(0,1);
                if(pic_src == '/'){
                    layer.alert('操作成功！',function(){
                        parent.location.reload();
                    });
                }else{
                    $.ajaxFileUpload({
                        url:'/admin/admin/AjaxFileUpload',//处理图片脚本
                        data:{id:id,table:'summer'},
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