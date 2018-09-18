<link rel="stylesheet" href="/public/css/web/lesson.css">
<div class="banner">
    <img class="hidden-xs" src="/public/images/web/lesson/images/banner.jpg" width="100%">
    <img class="visible-xs-block" src="/public/images/web/lesson/images/mobile_banner.jpg" width="100%">
</div>
<div id="body_box">
    <div class="main_box">
        <div class="list_box">
            <?php foreach ($list as $v):?>
                <div class=" row" style="margin: 0">
                    <div class="col-xs-5"  style="padding: 0 0 0 5px">
                        <img class="listLesson_img" src="/public/images/web/lesson/images/<?=$v['img']?>" alt="">
                    </div>

                    <div class="col-xs-7 MlistLessonBox">
                        <h5 class="MlistLesson_name"><?=$v['name']?></h5>
                        <p class="MlistLesson_author"><b style="color: #333">讲师：</b><?=$v['author']?></p>
                        <p class="MlistLesson_price">￥<?= $v['once_price']?$v['once_price']:$v['price']?><span>起</span></p>
                        <a href="/web/LessonDetail/<?=$v['id']?>"><button class="btn btn-primary btn-xs MlistLesson_btn">查看详情</button></a>
                    </div>
                </div>
                <hr />
            <?php endforeach;?>
        </div>
    </div>
</div>


<div class="clearfix">
    <?php if ($count > 10):?>
        <ul class="pagination" style="padding:10px 20px 0px 0px"><li><?php if(lang('is_en')):?><?php echo (int)($count/10)+1;?> Pages， <?php else:?>共<?php echo (int)($count/10)+1;?>页，<?php endif;?></li></ul>
    <?php endif;?>
    <?php echo $this->pagination->create_links(); ?>

</div>

<script>

</script>