<link rel="stylesheet" href="/public/css/web/camp.css">
<img src="/public/images/web/camp/banner.jpg">

<div id="body-box">
    <div class="main-box">
        <?php foreach($list as $v):?>
            <div class="row list-box">
                <img src="/public/images/web/camp/<?php
                    if(strpos($v['img'],'|')){
                        echo substr($v['img'],0,strpos($v['img'],'|'));
                    }else{
                        echo $v['img'];
                    }
                ?>" class="col-md-4 list-img">
                <div class="col-md-6">
                    <h3><?=$v['name_cn']?></h3>
                    <p class="part2-box"><span>●</span>起始时间：<?=$v['time']?></p>
                    <p class="part2-box part2-no-span">适合年龄：<?=$v['age']?></p>
                    <p class="part3-box"><span>●</span>项目特色：</p>
                    <div class="row">
                        <div class="col-md-4 list-txt"><?=$v['list_feature1']?></div>
                        <div class="col-md-4 list-txt"><?=$v['list_feature2']?></div>
                        <div class="col-md-4 list-txt"><?=$v['list_feature3']?></div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="price-box">
                        <p class="price_tit">费用：</p>
                        <p class="price"><?=$v['price']?></p>
                        <a href="/web/CampDetail/<?=$v['id']?>"><button class="btn btn-primary view_btn">查看详情</button></a>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>