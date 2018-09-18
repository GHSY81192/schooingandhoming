<link rel="stylesheet" href="/public/css/home/menu.css">
<link rel="stylesheet" href="/public/css/home/require.css">
<style>
    .zjwactive{background: #5376ac;color: #fff}
    .zjwactive .t1{color: #fff}
</style>
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
            <?php $this->load->view('home/menu',array('active'=>4,'face'=>$face,'name'=>@$user['name_cn']));?>
            <div class="col-md-3 mail_tit">
                <h3 style="padding-left:20px">我的收件箱</h3>
                <div  style="position: relative">
                    <input type="text" class="mail_search">
                    <span id="mailSearch" class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </div>
                <?php foreach ($data as $v):?>
                    <a href="/home/siteMail?id=<?php echo $v['id']?>">
                        <div class="mail_title_list <?=$v['id']==$this->input->get('id',true)?'zjwactive':'' ?>">
                            <div class="mail_title">
                                <div class="t1"><?php echo $v['title']?></div>
                                <div class="t2"><?php echo $v['set_time']?></div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="mail_con1"><?php echo $v['mail_con']?></div>
                        </div>
                    </a>
                <?php endforeach;?>
                <?php echo $data?'':'<span style="padding-left: 20px">无信息</span>' ?>
            </div>
            <div class="mail_con">
                <?php if($this->input->get('id',true)):?>
                    <div class="mail_con_title_top"> <?=$res['title']?></div>
                    <div class="mail_con_time"><?=$res['set_time']?></div>
                    <div class="mail_con_info"><?=$res['mail_con']?></div>
                <?php endif;?>

            </div>
        </div>
    </div>
</div>
<script>


</script>
