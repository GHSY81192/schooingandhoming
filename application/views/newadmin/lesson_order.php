<div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>衔接课程</cite></a>
              <a><cite>课程订单</cite></a>
            </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
    <form class="layui-form x-center" action="">
        <div class="layui-form-pane" style="margin-top: 15px;">
            <div class="layui-form-item">
                <div class="layui-input-inline">
                    <select name="is_pay_select" id="is_pay_select" style="display: block" class="layui-input">
                        <option value="0">全部</option>
                        <option value="1">已支付</option>
                        <option value="2">未支付</option>
                    </select>
                </div>

                <div class="layui-input-inline" style="width:80px">
                    <button type="button" class="layui-btn search"><i class="layui-icon">&#xe615;</i></button>
                </div>
            </div>
        </div>
    </form>
    <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button>
        <span class="x-right" style="line-height:40px">共有数据：<?=$count?> 条</span>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th><input type="checkbox" name="" value=""></th>
            <th>order_id</th>
            <th>课程名称</th>
            <th>客户名</th>
            <th>支付状态</th>
            <th>支付方式</th>
            <th>支付价格</th>
            <th>支付时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data as $item):?>
            <tr>
                <td><input type="checkbox" value="1" name=""></td>
                <td><?=$item['order_id']?></td>
                <td><?=$item['subject']?></td>
                <td><?=$item['customer_name']?></td>
                <td ><?=$item['is_pay']==8?'已支付':'未支付'?></td>
                <td ><?=$item['payment']==1?'支付宝支付':'微信支付'?></td>
                <td ><?=$item['price']?></td>
                <td ><?=$item['time']?></td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="question_edit('编辑','question-edit.html','4','','510')"
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
        laypage = layui.laypage;//分页
        layer = layui.layer;//弹出层

        //以上模块根据需要引入


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
            $(obj).parents("tr").remove();
            layer.msg('已删除!',{icon:1,time:1000});
        });
    }

    $('.search').click(function(){
        var is_pay = $('select[name=is_pay_select]').val();
        location.href = '/admin/admin/lesson_order?is_pay='+is_pay;
    })
</script>
</body>
</html>