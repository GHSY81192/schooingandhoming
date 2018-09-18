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
            <?php $this->load->view('home/user_menu',array('active'=>4,'identity'=>$data['identity']));?>

        </div>
        <div class="col-md-10">
            <div class="right-box">
                <h3><?=lang('My_Message')?></h3>
                <div style="margin-top: 25px">
                    <?php foreach ($data['list'] as $v):?>
                        <div class="row list2" style="margin: 0">
                            <img class="col-xs-3 listLesson_img" src="/public/images/icon/<?php
                            switch($v['type']){
                                case 1:
                                    echo 'Re_msg.jpg';
                                    break;
                                case 2:
                                    echo 'sys_msg.jpg';
                                    break;
                            }
                            ?>
                            " style="height: 80px;width: 110px" alt="">
                            <div class="col-xs-6 MlistLessonBox">
                                <p>
                                    <b style="font-weight: <?=$v['is_read']==1?'700':'500'?>;font-size: 16px">
                                        <?php
                                            switch($v['type']){
                                                case 1:
                                                    echo lang('Reply_Message');
                                                    break;
                                                case 2:
                                                    echo lang('SYS_Message');
                                                    break;
                                            }
                                        ?>
                                    </b>
                                </p>
                                <p><?=lang('Reply_Time')?>：<?=$v['reply_time']?></p>
                                <p class="mui-ellipsis"><?=lang('Reply_Content')?>：<?=$v['content']?></p>

                            </div>
                            <div class="col-xs-3">
                                <a><button class="btn btn-primary MyRequire_btn" onclick="Msg_con(<?=$v['id']?>,<?=$v['type']?>)"><?=lang('View_Details')?></button></a>
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
    function Msg_con(id,type){
        if(type == 2){
            $.post('/home/SyS_Msg_con',{id:id},function(data){
                if(data.status === 888){
                    layer.alert(data.msg['content']+'<p style="margin-top: 10px;text-align: right">'+data.msg['reply_time']+'</p>',
                        {title:'系统消息',closeBtn: 0},
                        function(){
                            $.post('/home/SyS_Msg_con_read',{id:id},function(data){
                                if(data.status === 888){
                                    location.href="/home/MyMessage";
                                }
                            },'json')
                        }
                    );
                }
            },'json');
        }else{
            layer.open({
                title:'消息回复',
                type: 2,
                area: ['50%','60%'],
                fixed: false, //不固定
                maxmin: true,
                content: '/home/Msg_con/'+id,
                cancel:function(){
                    location.href="/home/MyMessage";
                }
            });
        }


    }

</script>