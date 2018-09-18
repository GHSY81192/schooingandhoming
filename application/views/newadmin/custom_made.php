<div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>私人定制</cite></a>
            </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
    <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th><input type="checkbox" name="" value=""></th>
            <th>ID</th>
            <th>订单ID</th>
            <th>用户ID</th>
            <th>创建时间</th>
            <th>状态</th>
            <th>姓名</th>
            <th>手机</th>
            <th>来源</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody id="x-link">
        <?php foreach($data as $item): ?>
            <tr>
                <td><input type="checkbox" value="1" name=""></td>
                <td><?php echo $item['id'] ?></td>
                <td><?php echo $item['order_id'] ?></td>
                <td><?php echo $item['user_id'] ?></td>
                <td><?php echo !empty($item['create_time']) ? substr($item['create_time'],0,10) : '' ?></td>
                <td>
                    <?php if($item['status'] == 0) echo '等待初审' ?>
                    <?php if($item['status'] == 1) echo '初审通过' ?>
                </td>
                <td><?php echo $item['name'] ?></td>
                <td><?php echo $item['phone'] ?></td>
                <td>
                    <?php
                    switch($item['source']){
                        case 1:
                            echo '电脑端';
                            break;
                        case 2:
                            echo '手机端';
                            break;
                        case 3:
                            echo '微信端';
                            break;
                        default:
                            echo '未知来源';

                    }
                    ?>
                </td>
                <td class="td-manage">
                    <a title="处理" href="javascript:;" onclick="MyRequire('<?php echo $item['id'] ?>')"
                       class="ml-5" style="text-decoration:none">
                        <i class="layui-icon">&#xe615;</i>
                    </a>
                    <a title="删除" href="javascript:;" onclick="question_del(this,<?=$item['id']?>)"
                       style="text-decoration:none">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?php echo $this->pagination->create_links(); ?>
</div>

<script>
    layui.use(['element','laypage','layer','form'], function(){
        $ = layui.jquery;//jquery
        lement = layui.element();//面包导航
        laypage = layui.laypage;//分页
        layer = layui.layer;//弹出层
        form = layui.form();//弹出层


    })



    //以上模块根据需要引入

    //批量删除提交
    function delAll () {
        layer.confirm('确认要删除吗？',function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
        });
    }



    // 编辑
    function feedback_edit (title,url,id,w,h) {
        x_admin_show(title,url,w,h);
    }

    function MyRequire(id){
        layer.open({
            title:'定制详情',
            type: 2,
            area: ['50%','60%'],
            fixed: false, //不固定
            maxmin: true,
            content: '/admin/admin/MyRequire/'+id
        });
    }

    /*删除*/
    function question_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            //发异步删除数据
            $.get('/admin/admin/mysql_delete',{id:id,table:'personal_tailor'},function(data){
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