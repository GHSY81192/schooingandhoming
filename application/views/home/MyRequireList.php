<link rel="stylesheet" href="/public/css/home/newuser/iconfont.css">
<link rel="stylesheet" href="/public/css/home/user.css">
<div id="body_box">
    <div class="main_box row">
        <div class="col-md-2 menu-box">
            <div class="right-header">
                <?php
                if(strstr($data['head_image'],'http')){
                    $face = $data['head_image'];
                }else{
                    $face = '/upload/'.get_filepath_by_route_id(@$data['id'],@$data['head_image'],5);
                }
                ?>
                <div class="face rl">
                    <img src="<?=@$face?>">
                </div>
            </div>
            <?php $this->load->view('home/user_menu',array('active'=>3,'identity'=>$data['identity']));?>

        </div>
        <div class="col-md-10">
            <div class="right-box">
                <h3><?=lang('Customization')?></h3>
                <div style="margin-top: 25px">
                    <?php foreach ($data['list'] as $v):?>
                        <div class="row list2">
                            <img class="col-xs-3 listLesson_img" src="/public/images/web/home/require.jpg" style="height: 80px;width: 110px" alt="">
                            <div class="col-xs-6 MlistLessonBox">
                                <p><?=lang('Order_Number')?>：<?=$v['order_id']?></p>
                                <p class="MlistLesson_price"><?=lang('Order_Status')?>：<?=$v['status']=='0'?lang('Waiting_for_Preliminary_Review'):lang('Preliminary_Review_passed')?></p>
                                <p><?=lang('Transaction_Time')?>：<?=$v['create_time']?></p>

                            </div>
                            <div class="col-xs-3">
                                <a><button class="btn btn-primary MyRequire_btn" onclick="MyRequire(<?=$v['id']?>)"><?=lang('View_Details')?></button></a>
                            </div>
                        </div>
                        <hr />
                    <?php endforeach;?>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    function MyRequire(id){
        layer.open({
            title:'<?=lang('Customization')?>',
            type: 2,
            area: ['50%','50%'],
            fixed: false, //不固定
            maxmin: true,
            content: '/home/MyRequire/'+id
        });
    }

</script>