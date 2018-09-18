<link rel="stylesheet" href="/public/css/home/menu.css">
<!--<link rel="stylesheet" href="/public/css/home/require.css">-->
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
            <?php $this->load->view('home/menu',array('active'=>3,'face'=>$face,'name'=>@$user['name_cn']));?>
            <div class="col-md-9">
                <div style="margin: 0 auto;font-size: 50px;text-align: center;height: 500px;line-height: 500px"><?= $data ?></div>
            </div>
        </div>
    </div>
</div>




