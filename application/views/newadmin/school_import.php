<div class="container-fluid" style="margin-top:60px;">

    <!--<div class="row" style="margin-top: 16px;">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <input class="btn btn-primary" type="button" value="模版下载" onclick="download_template();">
        </div>
	</div>-->

    <div class="row" style="margin-top: 16px;">
        <div class="col-md-12">
            <form class="form-horizontal" name="form" role="form" id="form" enctype="multipart/form-data" method="post" action="/admin/admin/school_import_submit">
                <div class="form-group">
                    <label class="col-xs-2 control-label">文件上传</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="file" name="file">
                    </div>
                </div>
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
    layui.use(['laydate','element','laypage','layer'], function(){
        $ = layui.jquery;//jquery
        laydate = layui.laydate;//日期插件
        lement = layui.element();//面包导航
        laypage = layui.laypage;//分页


        //以上模块根据需要引入
        var txt = '';
        <?php if(isset($insertCount)): ?>
        txt = '成功导入<?=$insertCount?>条数据<br />';
        <?php endif; ?>
        <?php if(isset($updateCount)): ?>
        txt += '成功更新<?php echo $updateCount ?>条数据';
        <?php endif; ?>
        if(txt){
            layer.msg(txt,function(){
                location.href = '/admin/admin/school_list';
            });
        }





        var start = {
            min: laydate.now()
            ,max: '2099-06-16 23:59:59'
            ,istoday: false
            ,choose: function(datas){
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas; //将结束日的初始值设定为开始日
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





</script>
</body>
</html>