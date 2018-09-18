<link rel="stylesheet" href="/public/css/web/Summer.css">
<link rel="stylesheet" href="/public/css/web/slide.css">
<script src="/public/js/jquery.SuperSlide.2.1.1.js"></script>
<style>
    table img{padding: 5px;}
</style>
<div id="body_box" style="padding:0">

    <div class="main_box">
        <p class="nav_mbx hidden-xs"><a href="/web">首页</a> > <a href="/web/CampList">精品夏令营</a> > <?=$name_cn?></p>
        <div class="row bannerD_box">

<!--                <img class="col-md-7" style="padding: 0" src="/public/images/web/camp/--><?//=$img?><!--" alt="">-->
            <div id="slideBox" class="slideBox col-md-7" style="padding: 0">
                <div class="bd">
                    <ul>
                        <?php foreach($pictures as $v):?>
                        <li><a href="" target="_blank"><img src="/public/images/web/camp/<?=$v?>" class="bannerImg"/></a></li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <!-- 下面是前/后按钮代码，如果不需要删除即可 -->
                <a class="prev" href="javascript:void(0)"></a>
                <a class="next" href="javascript:void(0)"></a>

            </div>
            <div class="col-md-5">
                <h2><?=$name_cn?></h2>
                <h4><?=$name_en?></h4>
                <div class="D_top4_infoBox">
                    <div class="D_lineBox row">
                        <span style="font-size: 15px;color: #5ea557;padding-right: 5px" class="glyphicon glyphicon-play" aria-hidden="true"></span>起始时间：<?=$time?>
                    </div>
                    <div class="D_lineBox row">
                        <span style="font-size: 15px;color: #5ea557;padding-right: 5px" class="glyphicon glyphicon-play" aria-hidden="true"></span>适合年龄：<?=$age?>
                    </div>

                </div>
                <div><h3><span style="font-size: 18px">费用：</span><?=$price?><?php if($id==7){echo '<p style="padding-top:10px;font-size:14px;font-weight:300;">（如未成团将全额退还已支付费用）</p>';}?></h3></div>
                <input type="hidden" value="<?=$pay_money?>" name="money">
                <input type="hidden" value="<?=$id?>" name="camp_id">
                <div class="camp-hight"></div>
                <button type="button" class="btn btn-primary btn_l btn-lg">
                    我要咨询<span style="padding-left: 10px;font-size: 15px" class="glyphicon glyphicon-play" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-success btn_r btn-lg buy_btn">
                    立即购买<span style="padding-left: 10px;font-size: 15px" class="glyphicon glyphicon-play" aria-hidden="true"></span>
                </button>


            </div>
        </div>

        <div class="info_box D_intro">
            <div class="blue_box"></div>
            <div class="info_tit" style="padding-left: 28px"><h6>项目特色</h6></div>
            <div class="intro_box"><?=$feature?></div>
        </div>

        <div class="info_box D_intro">
            <div class="blue_box"></div>
            <div class="info_tit" style="padding-left: 28px"><h6>项目简介</h6></div>
            <div class="intro_box"><?=$intro?></div>
        </div>


        <div class="info_box D_require">
            <?php if(!empty($plan)):?>
                <div style="position: relative">
                    <div style="top: -20px" class="blue_box"></div>
                    <div class="info_tit" style="padding-left: 28px"><h6>行程安排</h6></div>
                </div>
                <div class="intro_box m_intro_box"><?=$plan?></div>
            <?php endif;?>
            <?php if(!empty($timetable)):?>
                <div style="position: relative;margin-top: 80px">
                    <div style="top: -20px" class="blue_box"></div>
                    <div class="info_tit" style="padding-left: 28px"><h6>在校日程安排</h6></div>
                </div>
                <div class="intro_box m_intro_box"><?=$timetable?></div>
            <?php endif;?>
            <?php if(!empty($price_include)):?>
                <div style="position: relative;margin-top: 80px">
                    <div style="top: -20px" class="blue_box"></div>
                    <div class="info_tit" style="padding-left: 28px"><h6>费用说明</h6></div>
                </div>
                <div class="intro_box"><?=$price_include?></div>
            <?php endif;?>
        </div>
    </div>
    <div style="height: 1px"></div>
</div>

<script>
    var is_mobile = '<?=$mobile?true:false;?>';

    $('.btn_l').click(function(){

        if(!is_mobile){
            var area = ['40%','450px'];
        }else{
            var area = ['100%','100%'];
        }

        layer.open({
            title:'请填写相关信息',
            type: 2,
            area: area,
            fixed: false, //不固定
            maxmin: true,
            content: '/web/consult/1'
        });
    });


    $('.buy_btn').click(function(){
        var price = $('input[name=money]').val(); //需要支付的价格
        var project_id = $('input[name=camp_id]').val(); //项目对应的id
        var project_name = 'camp'; //项目名称
        if(price.indexOf('~')>0){
            layer.alert('请选择购买套餐');
            return false;
        }
        location.href="/web/check_pay_order?price="+price+'&project_id='+project_id+'&project_name='+project_name;

    });

</script>
<script id="jsID" type="text/javascript">
    var ary = location.href.split("&");
    jQuery(".slideBox").slide( { mainCell:".bd ul", effect:ary[1],autoPlay:ary[2],trigger:ary[3],easing:ary[4],delayTime:ary[5],mouseOverStop:ary[6],pnLoop:ary[7] });
</script>





