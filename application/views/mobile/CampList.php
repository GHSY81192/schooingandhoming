<link rel="stylesheet" href="/public/css/web/lesson.css">
<div class="banner">
    <img src="/public/images/web/camp/banner-m.jpg" width="100%">
</div>
<div id="body_box">
    <div class="main_box">
        <div class="list_box">
            <?php foreach ($list as $v):?>
                <div class=" row" style="margin: 0">
                    <div class="col-xs-5" style="padding: 0 0 0 5px">
                        <img class="listLesson_img" src="/public/images/web/camp/<?php
                        if(strpos($v['img'],'|')){
                            echo substr($v['img'],0,strpos($v['img'],'|'));
                        }else{
                            echo $v['img'];
                        }
                        ?>" height="60">
                    </div>

                    <div class="col-xs-7 MlistLessonBox">
                        <h5 class="MlistLesson_name"><?=$v['name_cn']?></h5>
                        <h5 class="MlistLesson_name" style="color: #666;padding: 5px 0;font-weight: 300"><?=$v['name_en']?></h5>
                        <p class="MlistLesson_author"><b style="color: #333">起始时间：</b><?=$v['time']?></p>
<!--                        <p class="MlistLesson_author"><b style="color: #333">适合年龄：</b>--><?//=$v['age']?><!--</p>-->
                        <p class="MlistLesson_price"><?=$v['price']?></p>
                        <a href="/web/CampDetail/<?=$v['id']?>"><button class="btn btn-primary btn-xs MlistLesson_btn">查看详情</button></a>
                    </div>
                </div>
                <hr />
            <?php endforeach;?>
        </div>
    </div>
</div>
