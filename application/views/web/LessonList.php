<link rel="stylesheet" href="/public/css/web/lesson.css">
<div class="banner">
    <img class="hidden-xs" src="/public/images/web/lesson/images/banner.jpg" width="100%">
    <img class="visible-xs-block" src="/public/images/web/lesson/images/mobile_banner.jpg" width="100%">
</div>
<div id="body_box">
    <div class="main_box">
        <div class="list_box">
            <?php foreach ($list as $v):?>
            <div class=" row">
                <img class="col-md-4 list_md4" src="/public/images/web/lesson/images/<?=$v['img']?>" alt="">
                <div class="col-md-8 list_md8">
                    <h3 class="list_h3"><?= $v['name']?></h3>
                    <div class="row list_info_box">
                        <div class="col-md-4 list_md4 list_left_1">
                            <?=$v['people']?>
                        </div>
                        <div class="col-md-5 list_md5" style="border-right: 1px solid #d8d8d8;border-left:1px solid #d8d8d8; ">
                            <div style="width: 85px;height: 85px;background: url('/public/images/web/lesson/images/<?=$v['headimg']?>');margin: 30px 25px 0;float: left;border-radius: 50%"></div>
                            <div style="float: left;width: 60%;">主讲：<br /><?=$v['author']?><br /><p style="color: #888;padding-top: 10px;display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 6;overflow: hidden;font-size: 12px"><?=$v['teacher']?></p></div>
                        </div>
                        <div class="col-md-3 list_md3">
                            <h4 class="list_pirce_tit">课程费用：</h4>
                            <h3 class="list_price">￥<?= $v['once_price']?$v['once_price']:$v['price']?><span>起</span></h3>
                            <a href="/web/LessonDetail/<?=$v['id']?>"><button class="btn btn-primary view_btn">查看详情</button></a>
                        </div>
                    </div>
                </div>
            </div>
                <hr />
            <?php endforeach;?>
        </div>
        <div class="clearfix">
            <?php if ($count > 10):?>
                <ul class="pagination" style="padding:10px 20px 0px 0px"><li><?php if(lang('is_en')):?><?php echo (int)($count/10)+1;?> Pages， <?php else:?>共<?php echo (int)($count/10)+1;?>页，<?php endif;?></li></ul>
            <?php endif;?>
            <?php echo $this->pagination->create_links(); ?>

        </div>
    </div>
</div>




<script>

</script>