<div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>首页管理</cite></a>
              <a><cite><?=$nav?></cite></a>
            </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
    <xblock><button class="layui-btn" onclick="banner_add('添加用户','/admin/admin/banner_add_page?type=<?=$nav?>','800px','500px')"><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px"></span></xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>缩略图</th>
            <th>链接</th>
            <th>标题</th>
            <th>排序</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody id="x-img">
        <?php foreach($index as $k => $item):?>
            <tr>
                <td><span class="img_id"><?= $item['id']?></span></td>
                <td><img  src="/upload/<?php echo get_filepath_by_route_id(0,$item['file_name']) ?>" width="200" alt=""></td>
                <td ><?=$item['link']?></td>
                <td ><?=$item['title']?></td>
                <td >
                    <input type="text" value="<?=$item['sort']?>" class="sort" name="sort" style="width: 30px">
                    <input type="hidden" value="<?= $item['id']?>" name="sort_id">
                </td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="banner_edit('编辑','/admin/admin/banner_add_page/<?=$item['id']?>?type=<?=$nav?>','','800px','500px')"
                       class="ml-5" style="text-decoration:none">
                        <i class="layui-icon">&#xe642;</i>
                    </a>
                    <a title="删除" href="javascript:;" onclick="banner_del(this,<?=$item['id']?>)"
                       style="text-decoration:none">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                </td>
            </tr>
        <?php endforeach;?>
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


    //排序
    $('.sort').change(function(){
        var sort = $(this).val();
        var id = $(this).next().val();
        $.post('/admin/admin/banner_sort',{sort:sort,id:id},function(res){
            if(res.status === 888){
                layer.msg('修改成功！',{time:1000},function(){
                   location.reload();
                })
            }
        },'json')
    })

    //批量删除提交
    function delAll () {
        layer.confirm('确认要删除吗？',function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
        });
    }
    /*添加*/
    function banner_add(title,url,w,h){
        x_admin_show(title,url,w,h);
    }
    /*停用*/
    function banner_stop(obj,id){
        layer.confirm('确认不显示吗？',function(index){
            //发异步把用户状态进行更改
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="banner_start(this,id)" href="javascript:;" title="显示"><i class="layui-icon">&#xe62f;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-disabled layui-btn-mini">不显示</span>');
            $(obj).remove();
            layer.msg('不显示!',{icon: 5,time:1000});
        });
    }

    /*启用*/
    function banner_start(obj,id){
        layer.confirm('确认要显示吗？',function(index){
            //发异步把用户状态进行更改
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="banner_stop(this,id)" href="javascript:;" title="不显示"><i class="layui-icon">&#xe601;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-normal layui-btn-mini">已显示</span>');
            $(obj).remove();
            layer.msg('已显示!',{icon: 6,time:1000});
        });
    }
    // 编辑
    function banner_edit (title,url,id,w,h) {
        x_admin_show(title,url,w,h);
    }
    /*删除*/
    function banner_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            //发异步删除数据
            $.get('/admin/admin/mysql_delete',{id:id,table:'index_config'},function(data){
                if(data.status === 888){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                }
            },'json')
        });
    }
</script>
</body>
</html>