<link rel="stylesheet" href="/public/css/web/Summer.css">
<div><a href="/web/Summer_Assess"><img width="100%" src="/public/images/web/summer/banner-m.jpg"></a></div>
<div id="body_box">
    <div class="main_box">
        <div class="top_box row">
            <div class="blue_box"></div>
            <div class="col-md-2 t1_tit"><h6>夏校5大优势</h6></div>
            <div class="col-md-2 t1">
                <img class="SL-icon" src="/public/images/web/summer/icon_1.png">
                <p>1.提前体验纯粹的美式校园生活</p>
            </div>
            <div class="col-md-2 t1">
                <img class="SL-icon" src="/public/images/web/summer/icon_2.png">
                <p>2.全英文浸入式授课环境快速提升英文能力</p>
            </div>
            <div class="col-md-2 t1">
                <img class="SL-icon" src="/public/images/web/summer/icon_3.png">
                <p>3.与名校教授密切接触有机会获得教授推荐信</p>
            </div>
            <div class="col-md-2 t1">
                <img src="/public/images/web/summer/icon_4.png">
                <p>4.有机会提前获得大学学分</p>
            </div>
            <div class="col-md-2 t1">
                <img class="SL-icon" src="/public/images/web/summer/icon_5.png">
                <p>5.与来自不同国家的同学学习互动拓展国际视野</p>
            </div>
        </div>
        <div class="info_box">
            <div class="blue_box"></div>
            <div class="info_tit_l"><h6>推荐夏校</h6></div>
            <div class="info_tit_r"><a href="/web/SummerMore">更多></a></div>
            <div style="clear: both"></div>
            <div class="row summer_schoollist_box">
                <?php foreach($school as $v):?>
                    <a href="/web/SummerDetail/<?=$v['id']?>">
                        <div class="col-md-4 school_box">
                            <div class="img_box">
                                <img src="/upload/summer/<?= $v['img']?>" width="100%">
                            </div>

                            <h4 class="school_name_cn"><?= $v['name_cn']?></h4>
                            <p class="school_name_en"><?= $v['name_en']?></p>
                        </div>
                    </a>
                <?php endforeach;?>



            </div>
        </div>
    </div>
</div>




