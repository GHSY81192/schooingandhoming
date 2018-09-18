<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
		<div class="col-md-12">
			<form class="form-inline" role="form">
				<div class="form-group">
					<p class="input-group input-group-sm">
						<input size="25" type="text" class="form-control input-sm" placeholder="电话..." name="phone" value="<?php echo $this->input->get('phone') ?>">
					</p>
				</div>
				<div class="form-group">
					<p class="input-group input-group-sm">
						<input size="25" type="text" class="form-control input-sm" placeholder="姓名..." name="name" value="<?php echo $this->input->get('name') ?>">
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
            <?php echo $this->pagination->create_links(); ?>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>UnionId</th>
                        <th>电话</th>
                        <th>中文名</th>
                        <th>英文名</th>
                        <th>头像</th>
                        <th>性别</th>
                        <th>联系电话</th>
                        <th>联系Email</th>
                        <th>语言</th>
                        <th>生日</th>
                        <th>创建时间</th>
                        <th>成为VIP时间</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $item): ?>
                    <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['unionid'] ?></td>
                        <td><?php echo $item['phone'] ?></td>
                        <td><?php echo $item['name_cn'] ?></td>
                        <td><?php echo $item['name_en'] ?></td>
                        <td>
                            <?php if(!empty($item['unionid']) && !empty($item['head_image'])): ?>
                            <img src="<?php echo $item['head_image'] ?>" style="width:50px" />
                            <?php elseif(empty($item['unionid']) && !empty($item['head_image'])): ?>
                            <img src="/upload/<?php echo get_filepath_by_route_id($item['id'],$item['head_image'],5); ?>" style="width:50px;" />
                            <?php else: ?>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $item['gender'] ?></td>
                        <td><?php echo $item['contact_phone'] ?></td>
                        <td><?php echo $item['contact_email'] ?></td>
                        <td><?php echo $item['language'] ?></td>
                        <td><?php echo !empty($item['birthday']) ? substr($item['birthday'],0,10) : '' ?></td>
                        <td><?php echo !empty($item['create_time']) ? substr($item['create_time'],0,10) : '' ?></td>
                        <td><?php echo !empty($item['vip_time']) ? substr($item['vip_time'],0,10) : '' ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>	
</div>