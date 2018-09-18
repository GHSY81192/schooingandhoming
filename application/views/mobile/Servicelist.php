<link rel="stylesheet" href="/public/css/web/lesson.css">

<div id="body_box">
    <div class="main_box">
        <div class="list_box">
            <?php foreach ($list as $v):?>
                <div class=" row" style="margin: 0">
                    <img class="col-xs-3 listLesson_img" src="/upload/default/service/<?=$v['img']?>" height="60">
                    <div class="col-xs-9 MlistLessonBox">
                        <h5 class="MlistLesson_name"><?=$v['service_name']?></h5>
                        <p class="MlistLesson_author"><?=$v['teacher']?></p>
                        <p class="MlistLesson_price"><?=$v['price']?>/小时</p>
                        <a href="/web/serviceDetail/<?=$v['id']?>"><button class="btn btn-primary btn-xs MlistLesson_btn">查看详情</button></a>
                    </div>
                </div>
                <hr />
            <?php endforeach;?>
        </div>
    </div>
</div>
