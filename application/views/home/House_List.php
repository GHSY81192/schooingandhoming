<link rel="stylesheet" href="/public/css/home/newuser/iconfont.css">
<link rel="stylesheet" href="/public/css/home/user.css">
<div id="body_box">
    <div class="main_box row">
        <div class="col-md-2 menu-box">
            <div class="right-header">
                <?php
                if(strstr($user['head_image'],'http')){
                    $face = $user['head_image'];
                }else{
                    $face = '/upload/'.get_filepath_by_route_id(@$user['id'],@$user['head_image'],5);
                }
                ?>
                <div class="face rl">
                    <img src="<?=@$face?>">
                </div>
            </div>
            <?php $this->load->view('home/user_menu',array('active'=>7,'identity'=>$user['identity']));?>

        </div>
        <div class="col-md-10">
            <div class="right-box">
                <h3><?=lang('My_Host')?></h3>
                <ul class="lesson_nav row">
                    <li onclick="document.location.href='/home/House_List/2';" class="navli col-xs-4 <?=$status==2?'zjw_active':''?>"><?=lang('Review_in_progress')?></li>
                    <li onclick="document.location.href='/home/House_List/3';" class="navli col-xs-4 <?=$status==3?'zjw_active':''?>"><?=lang('Review_Approved')?></li>
                    <li onclick="document.location.href='/home/House_List/4';" class="navli col-xs-4 <?=$status==4?'zjw_active':''?>"><?=lang('Review_Failed')?></li>
                </ul>
                <div class="list_box" style="border: 0;padding-top: 10px">
                    <?php if(empty($data)):?>
                        <div style="margin: 0 auto;font-size: 20px;text-align: center;color: #999">
                            <i style="font-size: 150px;" class="icon iconfont icon-zanwushuju"></i>
                            <p style="position: relative;bottom: 70px"><?=lang('NO_DATA')?></p>
                        </div>

                    <?php else: ?>
                        <?php foreach ($data as $v):?>
                            <div class="row list2" style="margin: 0">
                                <img class="col-xs-3 listLesson_img" src="/upload/userhome/<?=$v['img']?>" alt="">

                                <div class="col-xs-6 MlistLessonBox">
                                    <h5 class="MlistLesson_name" style="font-size: 16px"><b><?=lang('Host_name')?>：<?=$v['hostname']?></b></h5>
                                    <p><?=lang('Host_NO')?>：<?=$v['host_id']?></p>
                                    <p><?=lang('Host_Gender')?>：<?=$v['sex']==1?'male':'female'?></p>
                                    <p><?=lang('Apply_Time')?>：<?=$v['time']?></p>

                                </div>
                                <div class="col-xs-3">

                                   <button style="width: 110px;margin-bottom: 10px" onclick="house_del(this,<?=$v['host_id']?>)" class="btn btn-danger HouseList_btn"><?=lang('Delete_Host')?></button>
                                   <button style="width: 110px;" onclick="house_view('<?=$v['host_id']?>')"  class="btn btn-primary "><?=lang('View_Details')?></button>
                                </div>
                            </div>
                            <hr />
                        <?php endforeach;?>
                    <?php endif;?>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //删除逻辑
    function house_del(obj,order_id){
        layer.confirm('确认要删除吗?', {title:'提示'}, function(index){
            $.post('/home/order_house_del',{order_id:order_id},function(data){
                if(data.status===888){
                    $(obj).parents('.list2').remove();
                    layer.msg('删除成功',{time:1000})
                }
            },'json')

            layer.close(index);
        });
    }

    //失败原因
    function FailureReason(msg){
        layer.alert(msg,{title:'拒绝理由'});
    }

    //修改住家信息
    function house_view(host_id){

        location.href="/home/houseInfo?oid="+host_id;
    }
</script>