<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
		<div class="col-md-12">
			<form class="form-inline" role="form">
                <div class="form-group">
					<p class="input-group input-group-sm">
						<input size="25" type="text" class="form-control input-sm" placeholder="订单ID..." name="order_id" value="<?php echo $this->input->get('order_id') ?>">
					</p>
				</div>
				<div class="form-group">
					<p class="input-group input-group-sm">
						<input size="25" type="text" class="form-control input-sm" placeholder="城市..." name="city" value="<?php echo $this->input->get('city') ?>">
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
                        <th>订单ID</th>
                        <th>用户ID</th>
                        <th>城市</th>
                        <th>语言</th>
                        <th>期望金额</th>
                        <th>个人偏好</th>
                        <th>创建时间</th>
                        <th>状态</th>
                        <th>姓名</th>
                        <th>手机</th>
                        <th>Email</th>
                        <th>性别</th>
                        <th>年龄</th>
                        <th>学校</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $item): ?>
                    <tr>
                        <td><?php echo $item['id'] ?></td>
                        <td><?php echo $item['order_id'] ?></td>
                        <td><?php echo $item['user_id'] ?></td>
                        <td><?php echo $item['city_name'] ?></td>
                        <td><?php echo $item['language'] ?></td>
                        <td><?php echo $item['range_start'] ?> ~ <?php echo $item['range_end'] ?></td>
                        <td title="<?php echo $item['personal_like'] ?>"><?php echo mb_strlen($item['personal_like'],'utf8') > 15 ? mb_substr($item['personal_like'],0,15).'...' : $item['personal_like'] ?></td>
                        <td><?php echo !empty($item['create_time']) ? substr($item['create_time'],0,10) : '' ?></td>
                        <td>
                            <?php if($item['status'] == 0) echo '等待初审' ?>
                            <?php if($item['status'] == 1) echo '初审通过' ?>
                        </td>
                        <td><?php echo $item['name'] ?></td>
                        <td><?php echo $item['phone'] ?></td>
                        <td><?php echo $item['email'] ?></td>
                        <td><?php echo $item['gender'] ?></td>
                        <td><?php echo $item['age'] ?></td>
                        <td><?php echo $item['school'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>	
</div>