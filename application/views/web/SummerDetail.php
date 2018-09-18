<link rel="stylesheet" href="/public/css/web/Summer.css">
<div id="body_box" style="padding:0">
    <div class="main_box">
        <p class="nav_mbx hidden-xs"><a href="/web">首页</a> > <a href="/web/SummerMore">暑期项目</a> > <?=$name_cn?></p>
        <div class="row bannerD_box">
            <div class="col-md-7 md7">
                <img src="/upload/summer/<?=$img?>" alt="">
            </div>
            <div class="col-md-5">
                <input type="hidden" id="SummerId" value="<?=$id?>">
                <h2><?=$name_cn?></h2>
                <h4><?=$name_en?></h4>
                <div class="D_top4_infoBox row">
                    <div class="D_lineBox col-xs-6 col-md-6 row">
                        <img class="col-xs-2" src="/public/images/web/summer/D1.png" >
                        <span class="col-xs-10">申请费用：<?= strlen($price)>20?'<span id="ob-p-1" style="font-size:16px;" class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>':$price ?></span>
                    </div>
                    <div class="D_lineBox col-xs-6 col-md-6 row">
                        <img class="col-xs-2" src="/public/images/web/summer/D2.png" >
                        <span class="col-xs-10">项目费用：<?= strlen($object_price)>20?'<span id="ob-p" style="font-size:16px;" class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>':$object_price ?></span>
                    </div>
                    <div class="D_lineBox col-xs-6 col-md-6 row">
                        <img class="col-xs-2" src="/public/images/web/summer/D3.png">
                        <span class="col-xs-10">是否授予学分：<?=$credit?></span>
                    </div>
                    <div class="D_lineBox col-xs-6 col-md-6 row">
                        <img class="col-xs-2" src="/public/images/web/summer/D4.png" >
                        <span class="col-xs-10">是否招收国际学生：<?=$international?></span>
                    </div>
                    <div class="D_lineBox col-xs-6 col-md-6 row">
                        <img class="col-xs-2" src="/public/images/web/summer/D6.png" >
                        <span class="col-xs-10">是否提供住宿：<?php if($is_stay==1){echo '提供';}elseif($is_stay==2){echo '不提供';}else{echo 'N/A';}?></span>
                    </div>
                    <div class="D_lineBox col-xs-6 col-md-6 row">
                        <img class="col-xs-2" src="/public/images/web/summer/D5.png" >
                        <span class="col-xs-10">签证类别：<?=$visa?$visa:'--'?></span>
                    </div>
<div style="clear: both"></div>
                    <div class="D_lineBox col-md-12 row">
                        <img class="col-xs-2" src="/public/images/web/summer/D7.png">
                        <div class="col-xs-10" style="padding-right: 0">
                            <span style="">S&H服务费：
                                <select name="price_choose" class="form-control" style="display: inline-block;width: auto;    border: 1px solid #ccc;">
                                    <option value="5000">单一夏校申请5000元</option>
                                    <option selected value="8000">任意三个夏校项目申请8000元</option>
                                </select>
                            </span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn_l btn-lg">我的咨询</button>
                <button type="button" class="btn btn-success btn_r btn-lg">立即购买</button>
            </div>
        </div>
        <div class="row five_type_box">
            <div class="blue_box hidden-xs"></div>
            <div class="col-xs-6 col-md-4 md-4">
                <div class="DFtype">
                    <img src="/public/images/web/summer/D2-1.png">
                    <span>所属类别</span>
                </div>
                <p class="DFtype_con"><?=$type?></p>
            </div>
            <div class="col-xs-6 col-md-4 md-4">
                <div class="DFtype">
                    <img src="/public/images/web/summer/D2-2.png">
                    <span>面向对象</span>
                </div>
                <p class="DFtype_con"><?=$object?></p>
            </div>
            <div class="col-xs-6 col-md-4 md-4">
                <div class="DFtype">
                    <img src="/public/images/web/summer/D2-3.png">
                    <span>项目周期</span>
                </div>
                <p class="DFtype_con" ><?=$period?>周</p>
            </div>
            <div class="col-xs-6 col-md-4 md-4">
                <div class="DFtype">
                    <img src="/public/images/web/summer/D2-4.png">
                    <span>项目起始时间</span>
                </div>
                <p class="DFtype_con"><?= strlen($time)>20?substr($time,0,15).'<span id="icon-1" style="font-size:16px;padding-left: 20px;" class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>':$time ?></p>
            </div>
            <div class="col-xs-12 col-md-4 md-4">
                <div class="DFtype">
                    <img src="/public/images/web/summer/D2-5.png">
                    <span>申请截止时间</span>
                </div>
                <p class="DFtype_con"><?= strlen($time_end)>50?substr($time_end,0,45).'<span id="icon-2" style="font-size:16px;padding-left: 20px;" class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>':$time_end ?></p>
            </div>
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
        <?php if(!empty($language)):?>
        <div class="info_box D_require">
            <div class="blue_box"></div>
            <div class="info_tit" style="padding-left: 28px"><h6>语言要求</h6></div>
            <div class="intro_box"><?=$language?></div>
        </div>
        <?php endif;?>
        <div class="info_box D_require">
            <div class="blue_box"></div>
            <div class="info_tit" style="padding-left: 28px"><h6>费用说明</h6></div>
            <div class="intro_box">
                <p class="p1-1">项目费用：<span><?=$object_price?>（项目费用在申请成功后，由学校一次性收取，不包含服务费）</span></p>
                <p class="p1-1">申请费用：<span><?=$price?></span></p>
                <p class="p1-1">S&H服务费：<span>8000人民币，不含签证费用</span></p>
            </div>
        </div>
        <div class="info_box D_require">
            <div class="info_tit" style="padding-left: 28px"><h6>S&H 夏校申请一站式服务：</h6></div>
            <div class="intro_box hidden-xs">
                <p class="p2-1">咨询评估<br>方案制定</p>
                <p class="p2-2"> <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> </p>
                <p class="p2-1">确定夏校<br>签署合同</p>
                <p class="p2-2"> <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> </p>
                <p class="p2-1">文书制作<br>夏校申请</p>
                <p class="p2-2"> <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> </p>
                <p class="p2-1">联系夏校<br>确认录取</p>
                <p class="p2-2"> <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> </p>
                <p class="p2-1">体检指导<br>签证辅导</p>
                <p class="p2-2"> <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> </p>
                <p class="p2-1">行前培训<br>出行跟踪</p>
            </div>
            <div class="visible-xs-block row" style="margin: 30px 10px 10px">
                <div class="col-xs-3 p2-1">
                    咨询评估<br>方案制定
                </div>
                <div class="col-xs-1 icon-right">
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                </div>
                <div class="col-xs-3 p2-1">
                    确定夏校<br>签署合同
                </div>
                <div class="col-xs-1 icon-right">
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                </div>
                <div class="col-xs-3 p2-1">
                    文书制作<br>夏校申请
                </div>
            </div>
            <div class="visible-xs-block row" style="margin: 10px 10px 30px">
                <div class="col-xs-3 p2-1">
                    联系夏校<br>确认录取
                </div>
                <div class="col-xs-1 icon-right">
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                </div>
                <div class="col-xs-3 p2-1">
                    体检指导<br>签证辅导
                </div>
                <div class="col-xs-1 icon-right">
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                </div>
                <div class="col-xs-3 p2-1">
                    行前培训<br>出行跟踪
                </div>
            </div>
        </div>
        <div class="info_box">
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
<style>
    .layui-layer-setwin .layui-layer-close1{background-position: -156px -38px;}
</style>
<script>
    var mobile = <?=$mobile?>;
    var tips;
    if(mobile == 1){
        tips = 1;
    }else{
        tips = 4;
    }
    $('#ob-p').hover(function(){
        var a = $('.layui-layer-content').css('display');
        if(a != 'block'){
            layer.tips('<?=$object_price?>', '#ob-p',{tips:tips,time:0,closeBtn:2});
        }
    },function(){
    });

    $('#ob-p-1').hover(function(){
        var a = $('.layui-layer-content').css('display');
        if(a != 'block'){
            layer.tips('<?=$price?>', '#ob-p-1',{tips:tips,time:0,closeBtn:2});
        }
    },function(){
    });

    $('#icon-1').hover(function(){
        var a = $('.layui-layer-content').css('display');
        if(a != 'block'){
            layer.tips('<?=str_replace(array("\r\n", "\r", "\n"), "", $time);?>', '#icon-1',{tips:tips,time:0,closeBtn:2});
        }
    },function(){
    });

    $('#icon-2').hover(function(){
        var a = $('.layui-layer-content').css('display');
        if(a != 'block'){
            layer.tips('<?=str_replace(array("\r\n", "\r", "\n"), "", $time_end);?>', '#icon-2',{tips:tips,time:0,closeBtn:2});
        }
    },function(){
    });





    var area;
    if(mobile == 1){
        area = ['100%','100%']
    }else{
        area = ['50%','550px']
    }
    $('.btn_l').click(function(){
        layer.open({
            title:'请填写相关信息',
            type: 2,
            area: area,
            fixed: false, //不固定
            maxmin: true,
            content: '/web/consult/3'
        });
    });

    $('.btn_r').click(function(){

        var price = $('select[name=price_choose]').val(); //需要支付的价格
        var project_id =  $('#SummerId').val(); //项目对应的id
        var project_name = 'summer'; //项目名称
        location.href="/web/check_pay_order?price="+price+'&project_id='+project_id+'&project_name='+project_name;



    });


</script>