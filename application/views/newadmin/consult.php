<div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>衔接课程</cite></a>
              <a><cite>课程咨询</cite></a>
            </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
    <xblock><button class="layui-btn layui-btn-danger" onclick="delAll('lesson_consult')"><i class="layui-icon">&#xe640;</i>批量删除</button><span class="x-right" style="line-height:40px">共有数据：<?=count($data)?> 条</span></xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th><input type="checkbox" class="choose" name="choose" value="0"></th>
            <th>ID</th>
            <th>姓名</th>
            <th>联系电话</th>
            <th>留言内容</th>
            <th>留言时间</th>
            <th>访问来源</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody id="x-link">
        <?php foreach($data as $item): ?>
            <?php if(empty($item['next'])):?>
                <tr>
                    <td><input type="checkbox" value="<?=$item['id']?>" name="choose"></td>
                    <td><?php echo $item['id'] ?></td>
                    <td><?php echo $item['name'] ?></td>
                    <td><?php echo $item['tel'] ?></td>
                    <td><?php echo $item['message'] ?></td>
                    <td><?php echo date('Y-m-d H:i:s',$item['time']) ?></td>
                    <td><?php
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
                    <td>
                        <button onclick="_SMS_Reply('<?php echo $item['tel'] ?>')" style="margin-right: 10px" class="btn btn-success btn-xs">短信回复</button>
                        <?php if($item['user_id']):?>
                            <?php if($item['is_reply'] == '2'):?>
                                <button onclick="_View_Reply('<?php echo $item['id'] ?>')"  class="btn btn-danger btn-xs">站内已回复，查看</button>
                            <?php else: ?>
                                <button onclick="_Site_Reply('<?php echo $item['id'] ?>','<?php echo $item['user_id'] ?>',2,0)" class="btn btn-primary btn-xs">站内回复</button>
                            <?php endif;?>
                        <?php endif;?>
                    </td>
                </tr>

                <?php foreach($data as $v): ?>
                    <?php if($item['id'] == $v['next']): ?>
                        <tr>
                            <td><input type="checkbox" value="<?=$v['id']?>" name="choose1"></td>
                            <td colspan="3"></td>
                            <td><?= $v['message']?></td>
                            <td><?php echo date('Y-m-d H:i:s',$v['time']) ?></td>
                            <td><?php
                                switch($v['source']){
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
                            <td>
                                <?php if($v['user_id']):?>
                                    <?php if($v['is_reply'] == '2'):?>
                                        <button type="button" onclick="_View_Reply('<?php echo $v['id'] ?>')"  class="btn btn-xs btn-danger">站内已回复，查看</button>
                                    <?php else: ?>
                                        <button type="button" onclick="_Site_Reply('<?php echo $v['id'] ?>','<?php echo $v['user_id'] ?>',1,'<?php echo $v['next']?>')" class="btn btn-primary btn-xs">站内回复</button>
                                    <?php endif;?>
                                <?php endif;?>
                            </td>
                        </tr>
                    <?php endif;?>
                <?php endforeach;?>


            <?php endif;?>
        <?php endforeach; ?>
        </tbody>
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


    })




    //以上模块根据需要引入

    //批量删除提交
    function delAll (table) {
        layer.confirm('确认删除吗？',function(index) {
            var ids = '';
            $('input[name=choose]:checked').each(function () {
                ids += $(this).val() + ',';
            })
            if (!ids) {
                return false;
            }
            $.ajax({
                url: "/admin/admin/allDelete?ids=" + ids + "&table=" + table,
                data: ids,
                dataType: 'json',
                type: 'GET',
                success: function (res) {
                    if (res.status === 888) {
                        $('input[name=choose]:checked').each(function () {
                            if ($(this).val()) {
                                $(this).parents('tr').remove();
                                layer.msg('已删除!',{icon:1,time:1000});
                            }

                        })
                    } else {
                        alert('删除失败，请重试！');
                    }
                }
            });
        });
    }


    /*删除*/
    function commemt_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            //发异步删除数据
            $(obj).parents("tr").remove();
            layer.msg('已删除!',{icon:1,time:1000});
        });
    }
</script>
<script>
    function _SMS_Reply(tel){
        layer.prompt({
            formType: 2,
            value: '',
            title: '请输入值',
            area: ['500px', '150px'] //自定义文本域宽高
        }, function(value, index, elem){
            var index = layer.load(1);
            $.post('/admin/admin/get_tel_and_content',{tel:tel,value:value},function (data){

                if(data === 888){
                    layer.close(index);
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
            $.post('/admin/admin/Site_Reply',{id:id,value:value,userId:userId,is_continue:is_continue,parentId:parent_id},function (data){
                if(data.status === 888){
                    layer.alert('发送成功',function(){
                        layer.closeAll();
                        location.reload();
                    })
                }
            },'json')

        });
    }


    function _View_Reply(id){
        var value = '';
        $.post('/admin/admin/View_Reply',{id:id},function (data){
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

    $('.choose').click(function(){
        if($(this).val() == 0){
            $('input[name=choose]').prop('checked',true);
            $(this).val(false);
        }
        else{
            $('input[name=choose]').prop('checked',false);
            $(this).val(0);
        }
    });
</script>
</body>
</html>