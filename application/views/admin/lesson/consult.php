<div class="container-fluid" style="margin-top:60px;">
    <div class="row" style="margin-top: 16px;">
        <div class="col-md-12">
            <?php echo $this->pagination->create_links(); ?>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>姓名</th>
                    <th>联系电话</th>
                    <th>留言</th>
                    <th>留言时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $item): ?>
                    <?php if(empty($item['next'])):?>
                        <tr>
                            <td><?php echo $item['id'] ?></td>
                            <td><?php echo $item['name'] ?></td>
                            <td><?php echo $item['tel'] ?></td>
                            <td><?php echo $item['message'] ?></td>
                            <td><?php echo date('Y-m-d H:i:s',$item['time']) ?></td>
                            <td>
                                <button onclick="_SMS_Reply('<?php echo $item['tel'] ?>')" class="btn-success">短信回复</button>
                                <?php if($item['user_id']):?>
                                    <?php if($item['is_reply'] == '2'):?>
                                        <button onclick="_View_Reply('<?php echo $item['id'] ?>')" style="margin-left: 10px" class="btn-danger">已回复，查看</button>
                                    <?php else: ?>
                                        <button onclick="_Site_Reply('<?php echo $item['id'] ?>','<?php echo $item['user_id'] ?>',2,0)" style="margin-left: 10px" class="btn-primary">站内回复</button>
                                    <?php endif;?>
                                <?php endif;?>
                            </td>
                        </tr>

                        <?php foreach($data as $v): ?>
                            <?php if($item['id'] == $v['next']): ?>
                                <tr>
                                    <td colspan="3"></td>
                                    <td><?= $v['message']?></td>
                                    <td><?php echo date('Y-m-d H:i:s',$v['time']) ?></td>
                                    <td>
                                        <?php if($v['user_id']):?>
                                            <?php if($v['is_reply'] == '2'):?>
                                                <button onclick="_View_Reply('<?php echo $v['id'] ?>')"  class="btn-danger">已回复，查看</button>
                                            <?php else: ?>
                                                <button onclick="_Site_Reply('<?php echo $v['id'] ?>','<?php echo $v['user_id'] ?>',1,'<?php echo $v['next']?>')" class="btn-primary">站内回复</button>
                                            <?php endif;?>
                                        <?php endif;?>
                                    </td>
                                </tr>
                            <?php endif;?>
                        <?php endforeach;?>


                    <?php endif;?>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>






<script>
    function _SMS_Reply(tel){
        layer.prompt({
            formType: 2,
            value: '',
            title: '请输入值',
            area: ['500px', '150px'] //自定义文本域宽高
        }, function(value, index, elem){
            $.post('/admin/Common/get_tel_and_content',{tel:tel,value:value},function (data){

                if(data === 888){
                    layer.alert('发送成功',function(){
                        layer.closeAll();
                    })
                }
            },'json')

        });
    }




    function _Site_Reply(id,userId,is_continue,parent_id){
        layer.prompt({
            formType: 2,
            value: '',
            title: '请输入值',
            area: ['500px', '150px'] //自定义文本域宽高
        }, function(value, index, elem){
            $.post('/admin/Common/Site_Reply',{id:id,value:value,userId:userId,is_continue:is_continue,parentId:parent_id},function (data){
                if(data.status === 888){
                    layer.alert('发送成功',function(){
                        layer.closeAll();
                    })
                }
            },'json')

        });
    }


    function _View_Reply(id){
        var value = '';
        $.post('/admin/Common/View_Reply',{id:id},function (data){
            if(data.status === 888){
                value = '回复内容：'+data.msg['content']+'\n回复时间：'+data.msg['reply_time'];
                layer.prompt({
                    formType: 2,
                    value: value,
                    title: '回复信息',
                    area: ['500px', '150px'] //自定义文本域宽高
                }, function(value, index, elem){
                    layer.closeAll();
                });
            }
        },'json');




    }
</script>