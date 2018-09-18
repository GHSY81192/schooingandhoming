<div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>学校管理</cite></a>
              <a><cite><?=$nav?></cite></a>
            </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
    <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclick="banner_add('添加用户','banner-add.html','600','500')"><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px"></span></xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th><input type="checkbox" name="" value=""></th>
            <th>ID</th>
            <th>年级</th>
            <th>分类</th>
            <th>参考年龄</th>
            <th>分类备注</th>
            <th>分类备注（英文）</th>
            <th>是否显示</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody id="x-img">
        <?php foreach($data as  $item):?>
            <tr>
                <td><input type="checkbox" value="1" name=""></td>
                <td><?php echo $item['id'] ?></td>
                <td><?php echo $item['name'] ?></td>
                <td><?php echo $item['type'] ?></td>
                <td><?php echo $item['ref_age'] ?></td>
                <td><?php echo $item['remark'] ?></td>
                <td><?php echo $item['remark_en'] ?></td>
<!--                <td>--><?php //if($item['is_show'] == 1) echo '<b>是</b>' ?><!----><?php //if($item['is_show'] == 0) echo '否' ?><!--</td>-->
                <td class="td-status"><span class="layui-btn <?=$item['is_show']==1?'layui-btn-normal':'layui-btn-disabled' ?> layui-btn-mini"><?=$item['is_show']==1?'已显示':'已隐藏' ?></span></td>




                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="banner_edit('编辑','/admin/admin/banner_edit',<?=$item['id']?>,'','')"
                       class="ml-5" style="text-decoration:none">
                        <i class="layui-icon">&#xe642;</i>
                    </a>
                    <a title="删除" href="javascript:;" onclick="banner_del(this,'1')"
                       style="text-decoration:none">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

    <?php echo $this->pagination->create_links(); ?>
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
        x_admin_show(title,url+'?id='+id,w,h);
    }
    /*删除*/
    function banner_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            //发异步删除数据
            $(obj).parents("tr").remove();
            layer.msg('已删除!',{icon:1,time:1000});
        });
    }
</script>
</body>
</html>