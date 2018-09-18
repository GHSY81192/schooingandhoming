<div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>衔接课程</cite></a>
              <a><cite>参考用书</cite></a>
            </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
    <xblock>
        <button class="layui-btn layui-btn-danger" onclick="allDelete('lesson_book')"><i class="layui-icon">&#xe640;</i>批量删除</button>
        <button class="layui-btn" onclick="banner_add('添加书籍','/admin/admin/lesson_book_add_page','600px','500px')"><i class="layui-icon">&#xe608;</i>添加</button>
        <span class="x-right" style="line-height:40px"></span>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th><input type="checkbox" class="choose" name="choose" value="0"></th>
            <th>ID</th>
            <th>缩略图</th>
            <th>书名</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody id="x-img">
        <?php foreach($data as $item):?>
            <tr>
                <td><input type="checkbox" value="<?=$item['id']?>" name="choose"></td>
                <td>
                    <?= $item['id']?>
                </td>
                <td>
                    <img  src="/public/images/web/lesson/images/<?=$item['img']?>" height="150" alt="">
                </td>
                <td >
                    <?=$item['book_name']?>
                </td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="banner_edit('编辑','/admin/admin/lesson_book_add_page/<?=$item["id"]?>',<?=$item['id']?>,'600px','500px')"
                       class="ml-5" style="text-decoration:none">
                        <i class="layui-icon">&#xe642;</i>
                    </a>
                    <a title="删除" href="javascript:;"  onclick="question_del(this,'<?=$item['id']?>')"
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

    // 编辑
    function banner_edit (title,url,id,w,h) {
        x_admin_show(title,url+'?id='+id,w,h);
    }
    /*删除*/
    function question_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            //发异步删除数据
            $.get('/admin/admin/mysql_delete',{id:id,table:'lesson_book'},function(data){
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