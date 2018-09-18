<div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>学校管理</cite></a>
              <a><cite>学校列表</cite></a>
            </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">

    <form class="layui-form x-center" action="">
        <div class="layui-form-pane" style="margin-top: 15px;">
            <div class="layui-form-item">
                <div class="layui-input-inline">
                    <input size="25" type="text" class="layui-input" placeholder="学校名称..." name="name" value="<?php echo $this->input->get('name') ?>">
                </div>
                <div class="layui-input-inline">
                    <input size="25" type="text" class="layui-input" placeholder="城市..." name="city" value="<?php echo $this->input->get('city') ?>">
                </div>
                <div class="layui-input-inline">
                    <input size="25" type="text" class="layui-input" placeholder="州..." name="state" value="<?php echo $this->input->get('state') ?>">
                </div>
                <div class="layui-input-inline">
                    <input size="5" type="text" class="layui-input" placeholder="ID..." name="id" value="<?php echo $this->input->get('id') ?>">
                </div>
                <div class="layui-input-inline" style="width:80px">
                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                </div>
            </div>
        </div>
    </form>
    <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button>
        <button class="layui-btn" onclick="question_add('添加问题','/admin/admin/school_create','90%','95%')"><i class="layui-icon">&#xe608;</i>添加</button>
        <button class="layui-btn layui-btn-normal" onclick="schoolImport();"><i class="layui-icon">&#xe608;</i>批量导入</button>
        <button class="layui-btn layui-btn-normal" onclick="schoolExport();"><i class="layui-icon">&#xe62f;</i>批量导出</button>
        <button class="layui-btn layui-btn-warm" onclick="school_Top();"><i class="layui-icon">&#x1002;</i>刷新排名</button>
        <span class="x-right" style="line-height:40px">共有数据：<?=$count?> 条</span>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th><input type="checkbox" name="" value=""></th>
            <th>ID</th>
            <th>中文名称</th>
            <th>英文名称</th>
            <th>城市</th>
            <th>banner图</th>
            <th>列表图</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data as $item):?>
            <tr>
                <td><input type="checkbox" value="1" name=""></td>
                <td><?=$item['id']?></td>
                <td><?=$item['name_cn']?></td>
                <td ><?=$item['name_en']?></td>
                <td ><?=$item['city_name']?></td>
                <td><img src="/upload/<?php echo get_filepath_by_route_id($item['id'],$item['cover'],1) ?>" style="width:50px;" /></td>
                <td><img src="/upload/<?php echo get_filepath_by_route_id($item['id'],$item['index_hot_cover'],1) ?>" style="width:50px;" /></td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="question_edit('编辑','/admin/admin/school_edit/<?=$item['id']?>','','100%','100%')"
                       class="ml-5" style="text-decoration:none">
                        <i class="layui-icon">&#xe642;</i>
                    </a>
                    <a title="删除" href="javascript:;" onclick="question_del(this,'<?=$item['id']?>')"
                       style="text-decoration:none">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                    <a title="排名刷新" href="javascript:;" onclick="school_one_top(<?=$item['id']?>)"
                       style="text-decoration:none">
                        <i style="font-size: 14px" class="layui-icon">&#x1002;</i>
                    </a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <?php echo $this->pagination->create_links(); ?>
    <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
            <span class="sr-only" style="position: relative"></span>
        </div>
    </div>
    <button onclick="test(0)">test</button>
</div>


<script>
    function test(part){
        $.get('/admin/admin/test/'+part,'',function(data){
            if(data.status == 888){
                var dd;
                if(part == '0'){
                    dd = '20%';
                }
                if(part == '1'){
                    dd = '40%';
                }
                if(part == 2){
                    dd = '60%';
                }
                if(part == 3){
                    dd = '80%';
                }
                if(part == 4){
                    dd = '100%';
                }
                $('.progress-bar').css('width',dd);
                $('.sr-only').html(dd);
                var a = ++part;
                test(a);
            }

        },'json')
    }


    $(function(){
        var status = '<?php echo $data['add_school_status']?>';
        if(status == 'ok'){
            parent.location.reload();
        }
    })


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

    /* 删除 */
    function question_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            //发异步删除数据
            $.getJSON('/admin/common/school_delete',{id:id},function(resp){
                if(resp.status == 1) {
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                }
            });
        });
    }


    function schoolImport() {
        window.location.href = "/admin/admin/school_import";
    }

    function schoolExport() {
        layer.prompt({title:'请输入起始值（0为第一行）'},function(value, index1, elem){
            var start = value;
            layer.close(index1);
            layer.prompt({title:'请输入导出的行数'},function(value, index2, elem){
                var end = value;
                layer.close(index2);
                window.location.href = "/admin/admin/school_export?start="+start+"&end="+end;
            });
        });
    }

    function school_Top(){
        var index = layer.load();
        $.get('/admin/admin/school_top','',function(data){
            if(data.status === 888){
                layer.close(index);
                layer.msg('排名更新成功！')
            }
        },'json');
    }

    function school_one_top(id){
        $.get('/admin/admin/school_top/'+id,'',function(data){
            if(data.status === 888){
                layer.msg('排名更新成功！',{icon: 6,time:2000})
            }
        },'json');
    }
</script>
</body>
</html>