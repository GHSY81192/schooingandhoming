<div class="container-fluid">
    <div class="row" style="margin-top: 16px;">
        <div class="col-md-12">
            <?php echo $this->pagination->create_links(); ?>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>住家单号</th>
                    <th>房主姓名</th>
                    <th>申请时间</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $item): ?>
                    <tr>
                        <td><?php echo $item['host_id'] ?></td>
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
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>

<script>
    function _view(id,orderId) {

        layer.open({
            title: '住家信息',
            type: 2,
            area: ['80%','100%'],
            fixed: false, //不固定
            maxmin: true,
            content: '/admin/common/becomeHomeInfo_mgr?id='+id+'&order_id='+orderId,
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
                        $.post('/admin/Common/Approve',{orderId:orderId,lng:lng,lat:lat},function(data){
                            if(data.status){
                                location.href="/admin/common/becomeHome_mgr";
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
                    $.post('/admin/common/objection',{objection:value,orderId:orderId},function(data){
                        if(data.status){
                            layer.close(index);
                            location.href="/admin/common/becomeHome_mgr";
                        }
                    },'json')

                });
                return false;
            }
        });
    }

    function _objection(data){
        layer.alert(data,{title:'拒绝理由'}
        );
    }


    function _setName(obj,host_id){
        var title = $(obj).next().val();
        layer.prompt({
            formType:0,
            offset:'300px',
            title:'设置房屋名称',
            value:title,
        },function(value,index,elem){
            $.post('/admin/common/setHouseName',{title:value,host_id:host_id},function(data){
                if(data.status === 888){
                    layer.close(index);
                    layer.msg('设置成功');
                }
            },'json')
        });
    }
</script>