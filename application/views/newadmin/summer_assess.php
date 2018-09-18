<div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>暑期项目</cite></a>
              <a><cite>评估申请</cite></a>
            </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
    <xblock><button class="layui-btn layui-btn-danger" onclick="allDelete('summer_assess')"><i class="layui-icon">&#xe640;</i>批量删除</button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th><input type="checkbox" name="choose" value="0"></th>
            <th>ID</th>
            <th>联系人姓名</th>
            <th>联系人电话</th>
            <th>学员年级</th>
            <th>学员年龄</th>
            <th>感兴趣的学科</th>
            <th>英语考试成绩</th>
            <th>考试得分</th>
            <th>评估时间</th>
        </tr>
        </thead>
        <tbody id="x-link">
        <?php foreach($data as $item): ?>
            <?php if(empty($item['next'])):?>
                <tr>
                    <td><input type="checkbox" value="<?=$item['id']?>" name="choose"></td>
                    <td><?php echo $item['id'] ?></td>
                    <td><?php echo $item['name'] ?></td>
                    <td><?php echo $item['phone'] ?></td>
                    <td><?php echo $item['grade'] ?></td>
                    <td><?php echo $item['age'] ?></td>
                    <td><?php echo $item['hobby'] ?></td>
                    <td><?php echo $item['english'] ?></td>
                    <td><?php echo $item['english_score'] ?></td>
                    <td><?php echo date('Y-m-d H:i:s',$item['time']) ?></td>
                </tr>



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

    /*批量删除*/
    function allDelete(table) {
        layer.confirm('确认要删除吗？',function(index) {
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
</script>
</body>
</html>