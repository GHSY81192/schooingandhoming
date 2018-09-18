<link rel="stylesheet" href="/public/css/web/Summer.css">
<div id="body_box" style="padding:0">
    <div class="main_box">
        <p class="nav_mbx hidden-xs"><a href="/web">首页</a> > <a href="/web/SummerList">暑期项目</a> > <?=$name_cn?></p>
        <div class="row bannerD_box">
            <div class="col-md-7" style="padding: 0">
                <img src="/upload/summer/<?=$img?>" alt="">
            </div>
            <div class="col-md-5">
                <h2><?=$name_cn?></h2>
                <h4><?=$name_en?></h4>
                <div class="D_top4_infoBox">
                    <div class="D_lineBox row">
                        <img class="col-xs-2" src="/public/images/web/summer/D1.gif" style="padding: 0;width: 40px">
                        <span class="col-xs-10">申请费用：<?=$price?></span>
                    </div>
                    <div class="D_lineBox row">
                        <img class="col-xs-2" src="/public/images/web/summer/D2.png" style="padding: 0;width: 40px">
                        <span class="col-xs-10">项目费用：<?=$object_price?></span>
                    </div>
                    <div class="D_lineBox row">
                        <img class="col-xs-2" src="/public/images/web/summer/D3.png" style="padding: 0;width: 40px">
                        <span class="col-xs-10">是否授予学分：<?=$credit?></span>
                    </div>
                    <div class="D_lineBox row">
                        <img class="col-xs-2" src="/public/images/web/summer/D4.png" style="padding: 0;width: 40px">
                        <span class="col-xs-10">是否招收国际学生：<?=$international?></span>
                    </div>
                    <div class="D_lineBox row">
                        <img class="col-xs-2" src="/public/images/web/summer/D6.png" style="padding: 0;width: 40px;height: 40px">
                        <span class="col-xs-10">是否提供住宿：<?php if($is_stay==1){echo '提供';}elseif($is_stay==2){echo '不提供';}else{echo 'N/A';}?></span>
                    </div>
                    <div class="D_lineBox row">
                        <img class="col-xs-2" src="/public/images/web/summer/D5.png" style="padding: 0;width: 40px;;height: 40px">
                        <span class="col-xs-10">签证类别：<?=$visa?$visa:'--'?></span>
                    </div>
                </div>
                <div><h3>SH服务费5000元起，<a href="">点击查看详情</a></h3></div>
                <button type="button" class="btn btn-primary btn_l btn-lg">我要咨询<span style="padding-left: 10px;font-size: 15px" class="glyphicon glyphicon-play" aria-hidden="true"></span></button>
                <button type="button" class="btn btn-success btn_r btn-lg">我要申请<span style="padding-left: 10px;font-size: 15px" class="glyphicon glyphicon-play" aria-hidden="true"></span></button>

            </div>
        </div>
        <div class="info_box Dinfo">
            <div class="blue_box"></div>
            <div class="Dinfo1">
                <div class="DFtype">
                    <img src="/public/images/web/summer/D2-1.png" height="30">
                    <span>所属类别</span>
                </div>
                <p class="DFtype_con"><?=$type?></p>
            </div>
            <div class="Dinfo1">
                <div class="DFtype">
                    <img src="/public/images/web/summer/D2-2.png" height="30">
                    <span>面向对象</span>
                </div>
                <p class="DFtype_con"><?=$object?></p>
            </div>
            <div class="Dinfo1">
                <div class="DFtype">
                    <img src="/public/images/web/summer/D2-3.png" height="30">
                    <span>项目周期</span>
                </div>
                <p class="DFtype_con3" ><?=$period?></p>
            </div>
            <div class="Dinfo1">
                <div class="DFtype">
                    <img src="/public/images/web/summer/D2-4.png" height="30">
                    <span>授课地点</span>
                </div>
                <p class="DFtype_con"><?=$sponsor?></p>
            </div>
            <div class="Dinfo1 lastDinfo">
                <div class="DFtype">
                    <img src="/public/images/web/summer/D2-5.png" height="30">
                    <span>申请截止时间</span>
                </div>
                <p class="DFtype_con"><?=$time_end?></p>
            </div>
            <div style="clear: both"></div>
        </div>
        <div class="info_box D_intro">
            <div class="blue_box"></div>
            <div class="info_tit" style="padding-left: 28px"><h6>项目简介</h6></div>
            <div class="intro_box"><?=$intro?></div>
        </div>
        <div class="info_box D_require">
            <div class="blue_box"></div>
            <div class="info_tit" style="padding-left: 28px"><h6>申请要求</h6></div>
            <div class="intro_box"><?=$require?></div>
        </div>
        <div class="info_box">
            <div class="blue_box"></div>
            <div class="info_tit_l"><h6>推荐夏校</h6></div>
            <div class="info_tit_r"><a href="">更多></a></div>
            <div style="clear: both"></div>
            <div class="row summer_schoollist_box">
                <?php foreach($school as $v):?>
                    <a href="/web/SummerDetail/<?=$v['id']?>">
                        <div class="col-md-4 school_box">
                            <div class="img_box">
                                <img src="/upload/summer/<?= $v['img']?>" width="100%">
                            </div>

                            <h4 class="school_name_cn"><?= $v['name_cn']?></h4>
                        </div>
                    </a>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
<script>
    var is_mobile = '<?=$mobile?true:false;?>';



    $('.btn_l').click(function(){
        layer.open({
            title:'请填写相关信息',
            type: 2,
            area: ['100%','100%'],
            fixed: false, //不固定
            maxmin: true,
            content: '/web/consult/3'
        });
    });

    $('.btn_r').click(function(){
        layer.open({
            title:'请填写相关信息',
            type: 2,
            area: ['100%','100%'],
            fixed: false, //不固定
            maxmin: true,
            content: '/web/consult/4'
        });
    });
</script>
