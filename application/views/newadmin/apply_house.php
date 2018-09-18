<div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>住家管理</cite></a>
              <a><cite>申请住家</cite></a>
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
            <th>住家单号</th>
            <th>房主姓名</th>
            <th>申请时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody id="x-link">
            <?php foreach($data as $item): ?>
                <tr>
                    <td><input type="checkbox" value="1" name=""></td>
                    <td><?=$item['id']?></td>
                    <td><?=$item['host_id']?></td>
                    <td><?php echo $item['hostname'] ?></td>
                    <td><?php echo $item['time'] ?></td>
                    <td>
                        <?php
                        switch ($item['status']){
                            case 2:
                                echo '<span class="label label-default">未审核</span>';
                                break;
                            case 3:
                                echo '<span class="label label-success">已审核,已通过</span>';
                                break;
                            case 4:
                                echo '<span style="cursor: pointer" onclick="_objection(\''.$item['objection'].'\')" class="label label-danger">已审核,未通过</span>';
                                break;
                        }
                        ?>
                    </td>
                    <td>

                        <button type="button" class="btn btn-success btn-xs" onclick="_setName(this,'<?php echo $item['host_id'] ?>')">设置名称</button>
                        <input type="hidden" value="<?=$item['title']?>" name="title">
                        <button type="button" class="btn btn-primary btn-xs" onclick="_view(<?php echo $item['user_id'] ?>,'<?php echo $item['host_id'] ?>');">查看</button>
                        <button type="button" class="btn btn-danger btn-xs" onclick="">删除</button>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <div id="page"></div>
</div>

<script>
    layui.use(['element','laypage','layer','form'], function(){
        $ = layui.jquery;//jquery
        lement = layui.element();//面包导航
        laypage = layui.laypage;//分页
        layer = layui.layer;//弹出层
        form = layui.form();//弹出层
    });

    function _setName(obj,host_id){
        var title = $(obj).next().val();
        layer.prompt({
            formType:0,
            offset:'300px',
            title:'设置房屋名称',
            value:title,
        },function(value,index,elem){
            $.post('/admin/admin/setHouseName',{title:value,host_id:host_id},function(data){
                if(data.status === 888){
                    layer.close(index);
                    layer.msg('设置成功');
                }
            },'json')
        });
    }


    function _view(id,orderId) {
        layer.open({
            title: '住家信息',
            type: 2,
            area: ['80%','100%'],
            fixed: false, //不固定
            maxmin: true,
            content: '/admin/admin/becomeHomeInfo_mgr?id='+id+'&order_id='+orderId,
            btn: ['通过', '拒绝'],
            yes: function(index,layero){
                layer.prompt({
                    formType: 0,
                    title: '请输入经度',
                }, function(lng, index, elem){
                    layer.close(index);
                    layer.prompt({
                        formType: 0,
                        title: '请输入纬度',
                    }, function(lat, index, elem){
                        layer.close(index);
                        $.post('/admin/admin/Approve',{orderId:orderId,lng:lng,lat:lat},function(data){
                            if(data.status){
                                parent.location.reload();
                            }
                        },'json');
                    });
                });
            },
            btn2:function(index,layero){
                layer.prompt({
                    formType: 2,
                    offset: '200px',
                    title: '拒绝理由',
                }, function(value, index, elem){
                    $.post('/admin/admin/objection',{objection:value,orderId:orderId},function(data){
                        if(data.status){
                            layer.close(index);
                            location.href="/admin/admin/apply_house";
                        }
                    },'json')

                });
                return false;
            }
        });
    }



</script>
</body>
</html>