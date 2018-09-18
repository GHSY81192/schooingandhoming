<link rel="stylesheet" href="/public/css/home/menu.css">
<link rel="stylesheet" href="/public/css/home/require.css">
<div class="home-content" id="content">
    <div class="container ">
        <div class="row home-main">
            <?php
            if(strstr($user['head_image'],'http')){
                $face = $user['head_image'];
            }else{
                $face = '/upload/'.get_filepath_by_route_id(@$user['id'],@$user['head_image'],5);
            }
            ?>
            <?php $this->load->view('home/menu',array('active'=>5,'face'=>$face,'name'=>@$user['name_cn']));?>
            <div class="col-md-9">
                <div class="home-require-content">
                    <p class="title">发布的住家信息</p>
                    <table class="table">
                        <tr>
                            <th>房屋名称</th>
                            <th>需求类型</th>
                            <th>提交时间</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        <?php foreach ($data as $val):?>
                            <tr>
                                <td>
                                    <?php echo $val['hostname'] ?>
                                </td>
                                <td>发布住家</td>
                                <td><?=$val['time']?></td>
                                <td><?php switch ($val['status']){
                                        case 2:echo '审核中';break;
                                        case 3:echo '初审通过';break;
                                        case 4:echo '初审失败 <span style="cursor: pointer" onclick="FailureReason(\''.$val['objection'].'\')">查看原因</span>';break;
                                    }?>
                                </td>
                                <td>
                                    <span onclick="house_view('<?=$val['host_id']?>')" style="margin-right: 10px;cursor: pointer" class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    <span onclick="house_del(this,<?=$val['id']?>)" style="cursor: pointer" class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //删除逻辑
    function house_del(obj,order_id){
        layer.confirm('确认要删除吗?', {title:'提示'}, function(index){
            $.post('/home/order_house_del',{order_id:order_id},function(data){
                if(data.status){
                    $(obj).parents('tr').remove();
                    layer.msg('删除成功',{time:1000})
                }
            },'json')

            layer.close(index);
        });
    }

    //失败原因
    function FailureReason(msg){
        layer.alert(msg,{title:'拒绝理由'});
    }

    //修改住家信息
    function house_view(host_id){

        location.href="/home/houseInfo?oid="+host_id;
    }
</script>