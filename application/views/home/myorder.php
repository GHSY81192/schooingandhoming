<link rel="stylesheet" href="/public/css/home/menu.css">
<link rel="stylesheet" href="/public/css/home/require.css">
<div class="home-content" id="content">
    <div class="container ">
        <div class="row home-main">
            <?php
            if(strstr($user['head_image'],'http')){
                $face = $user['head_image'];
            }else{
                $face = '/upload/'.get_filepath_by_route_id(@$user['id'],@$user['head_image'],5);
            }
            ?>
            <?php $this->load->view('home/menu',array('active'=>9,'face'=>$face,'name'=>@$user['name_cn']));?>
            <div class="col-md-9">
                <div class="home-require-content">
                    <p class="title">我提交的需求</p>
                    <table class="table">
                        <tr>
                            <th>订单号</th>
                            <th>课程名称</th>
                            <th>课程分类</th>
                            <th>数量</th>
                            <th>订单状态</th>
                        </tr>
                        <?php foreach ($data as $val):?>
                            <tr>
                                <td><?=$val['order_id']?></td>
                                <td><?=$val['subject']?></td>
                                <td><?=$val['taocan']?></td>
                                <td>1</td>
                                <td><?php echo $val['is_pay']==8?'已付款':'未付款' ?></td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){

    });

</script>