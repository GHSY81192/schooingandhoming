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
            <?php $this->load->view('home/user_menu',array('active'=>2,'identity'=>$data['identity']));?>

        </div>
        <div class="col-md-10">
            <div class="right-box">
                <h3><?=lang('My_Program')?></h3>
                <ul class="lesson_nav row">
                    <li onclick="document.location.href='/home/my_lessons/1';" class="navli col-xs-4 <?=$status==1?'zjw_active':''?>"><?=lang('To_be_Paid')?></li>
                    <li onclick="document.location.href='/home/my_lessons/8';" class="navli col-xs-4 <?=$status==8?'zjw_active':''?>"><?=lang('Paid')?></li>
                    <li class="navli col-xs-4"><?=lang('Closed')?></li>
                </ul>
                <div class="list_box" style="border: 0;padding-top: 10px">
                    <?php foreach ($order as $v):?>
                        <div class="row list2" style="margin: 0">
                            <img class="col-xs-3 listLesson_img" src="/public/images/web/lesson/images/<?=$v['img']?>" alt="">
                            <div class="col-xs-6 MlistLessonBox">
                                <h5 class="MlistLesson_name" style="font-size: 16px"><b><?=lang('Course_Name')?>：<?=$v['subject']?></b></h5>
                                <p><?=lang('Order_Number')?>：<?=$v['order_id']?></p>
                                <p class="MlistLesson_author"><?=lang('Instructor')?>：<?=$v['author']?></p>
                                <p class="MlistLesson_price"><?=lang('Amount')?>:￥<?=$v['price']?></p>
                                <p><?=lang('Transaction_Time')?>：<?=$v['time']?></p>

                            </div>
                            <div class="col-xs-3">
                                <a href="/web/LessonDetail/<?=$v['subject_id']?>"><button class="btn btn-primary MlistLesson_btn"><?=lang('View_Details')?></button></a>
                            </div>
                        </div>
                        <hr />
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/public/js/ajaxfileupload.js"></script>
<script type="text/javascript">
    $('.file-input').change(function(){
        ajaxFileUpload();
    });
    function ajaxFileUpload(){
        $.ajaxFileUpload
        (
            {
                url:'/home/uploadPic',
                secureuri:false,
                fileElementId:'pic',
                dataType: 'json',
                success: function (data, status)
                {
                    if(data.status == 'success'){
                        pic = data.data;
                        $.post('/home/editProfile',{'head_image':pic},function(data){
                            if(data.status){
                                window.location.reload();
                            }else{
                                alert(data.msg);
                            }
                        },'json')
                    }else{
                        //alert(data.data);
                    }
                    $('.file-input').change(function(){
                        ajaxFileUpload();
                    });
                },
                error: function (data, status, e)
                {
                    alert(e);
                    $('.file-input').change(function(){
                        ajaxFileUpload();
                    });
                }
            }
        )
        return false;
    }
</script>