<div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>衔接课程</cite></a>
              <a><cite>课程列表</cite></a>
            </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">

    <xblock>
        <button class="layui-btn layui-btn-danger" onclick="allDelete('summer')"><i class="layui-icon">&#xe640;</i>批量删除</button>
        <button class="layui-btn" onclick="question_add('添加课程','/admin/admin/add_lesson_page','1300px','90%')"><i class="layui-icon">&#xe608;</i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：<?=$count?> 条</span>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th><input type="checkbox" class="choose" name="choose" value="0"></th>
            <th>ID</th>
            <th>课程名称</th>
            <th>价格</th>
            <th>作者</th>
            <th>排序</th>
            <th>列表图</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data as $item):?>
            <tr>
                <td><input type="checkbox" value="<?=$item['id']?>" name="choose"></td>
                <td><?=$item['id']?></td>
                <td><?=$item['name']?></td>
                <td ><?=$item['once_price']?$item['once_price'].' ~ ':''?><?=$item['price']?></td>
                <td><?=$item['author']?></td>
                <td><?=$item['desc']?></td>

                <td ><img src="/public/images/web/lesson/images/<?=$item['img']?>" height="50"></td>

                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="question_edit('编辑','/admin/admin/add_lesson_page/<?php echo $item['id'] ?>','','1300px','90%')"
                       class="ml-5" style="text-decoration:none">
                        <i class="layui-icon">&#xe642;</i>
                    </a>
                    <a title="删除" href="javascript:;" onclick="question_del(this,<?=$item['id']?>)"
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

        layer = layui.layer;//弹出层




    });

    //批量删除提交
    function delAll () {
        layer.confirm('确认要删除吗？',function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
        });
    }

    function question_show (argument) {
        layer.msg('可以跳到前台具体问题页面',{icon:1,time:1000});
    }
    /*添加*/
    function question_add(title,url,w,h){
        x_admin_show(title,url,w,h);
    }
    //编辑
    function question_edit (title,url,id,w,h) {
        x_admin_show(title,url,w,h);
    }

    /*删除*/
    function question_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            //发异步删除数据
            $.get('/admin/admin/mysql_delete',{id:id,table:'lesson'},function(data){
                if(data.status === 888){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                }
            },'json')
        });
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
</script>
</body>
</html>