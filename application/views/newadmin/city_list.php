<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
        <div class="col-md-12">
            <form class="form-inline" role="form">
                <input type="hidden" name="state_id" value="<?php echo $this->input->get('state_id') ?>" />
                <div class="form-group">
                    <p class="input-group input-group-sm">
                        <input size="25" type="text" class="form-control input-sm" placeholder="名称..." name="name" value="<?php echo $this->input->get('name') ?>">
                    </p>
                </div>
                <div class="form-group m-btn-group-fix">
                    <p class="input-group input-group-sm">
                        <span class="input-group-btn"> <input class="btn btn-primary" type="submit" value="搜索"></span>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <div class="row" style="margin-top: 16px;">
        <div class="col-md-12">
            <input class="btn btn-primary" type="button" value="新增" onclick="create();">
        </div>
    </div>

    <div class="row" style="margin-top: 16px;">
        <div class="col-md-12">
            <?php echo $this->pagination->create_links(); ?>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>中文</th>
                    <th>英文</th>
                    <th>所属州</th>
                    <th>经度</th>
                    <th>纬度</th>
                    <th>邮编</th>
                    <th>地区编号</th>
                    <th>人口</th>
                    <th>家庭数</th>
                    <th>中等家庭收入</th>
                    <th>陆地面积</th>
                    <th>水域面积</th>
                    <th>是否首府</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $item): ?>
                    <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['name_cn'] ?></td>
                        <td><?php echo $item['name_en'] ?></td>
                        <td><?php echo $item['state_name'] ?></td>
                        <td><?php echo $item['lng'] ?></td>
                        <td><?php echo $item['lat'] ?></td>
                        <td><?php echo $item['zip_codes'] ?></td>
                        <td><?php echo $item['area_code'] ?></td>
                        <td><?php echo $item['population'] ?></td>
                        <td><?php echo $item['households'] ?></td>
                        <td><?php echo $item['median_income'] ?></td>
                        <td><?php echo $item['land_area'] ?></td>
                        <td><?php echo $item['water_area'] ?></td>
                        <td><?php echo $item['is_capital'] == 1 ? '是' : '否' ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-xs" onclick="edit(<?php echo $item['id'] ?>);">修改</button>
                            <button type="button" class="btn btn-danger btn-xs" onclick="data_del(this,<?php echo $item['id'] ?>);">删除</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    function edit(id) {
        window.location.href = "/admin/admin/city_edit?id=" + id;
    }

    function create() {
        window.location.href = "/admin/admin/city_create?state_id=<?php echo $this->input->get('state_id') ?>";
    }

    function data_del(obj,id) {

        $.ajax({
            url:"/admin/admin/city_del?id="+id,
            dataType:'json',
            type:'GET',
            success:function(res){
                if(res == 'success'){
                    $(obj).parents('tr').remove();
                }else{
                    alert('删除失败，请重试！');
                }
            }
        });



    }
</script>
</body>
</html>