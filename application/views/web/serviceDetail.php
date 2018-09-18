<link rel="stylesheet" href="/public/css/web/service/iconfont.css">
<style type="text/css">

    @font-face {font-family: "iconfont";
        src: url('/public/css/web/service/iconfont.eot'); /* IE9*/
        src: url('/public/css/web/service/iconfont.eot#iefix') format('embedded-opentype'), /* IE6-IE8 */
        url('/public/css/web/service/iconfont.woff') format('woff'), /* chrome, firefox */
        url('/public/css/web/service/iconfont.ttf') format('truetype'), /* chrome, firefox, opera, Safari, Android, iOS 4.2+*/
        url('/public/css/web/service/iconfont.svg#iconfont') format('svg'); /* iOS 4.1- */
    }

    .iconfont {
        font-family:"iconfont" !important;
        font-size:16px;
        font-style:normal;
        -webkit-font-smoothing: antialiased;
        -webkit-text-stroke-width: 0.2px;
        -moz-osx-font-smoothing: grayscale;
    }

    .active{
        background: #5578ae;
    }
    .active a{
        color: #fff;
    }
</style>
<link rel="stylesheet" href="/public/css/web/servicedetail.css" />

<div class="bg_box">
    <div class="main_box">
        <div class="nav_mbx hidden-xs">
            <span id="index">首页</span> > <span id="search_service">找服务</span> > 托福名师周宗丰在线课程
        </div>
        <div class="top_box row">
            <div class="col-md-5">
                <img class="col-md-12 video_pic" src="/upload/default/service/20170419133250.png" alt="">
            </div>
            <div class="col-md-7">
                <h3><?=@$service_name?></h3>
                <div class="top_info_1">
                    <span class="top_info_aaa">价&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;格</span>
                    <span class="top_info_price"><b style="font: 400 24px arial;">￥</b><?=$price?><span class="onehouse">/小时</span></span>
                    <div style="clear: both"></div>
                </div>
                <div class="top_info_2 row">
                    <div class="col-sm-4" style="padding: 0">
                        <span class="top_info2_aaa">课程形式</span>
                        <span class="top_info2_con"><?=$model?></span>
                    </div>
                    <div class="col-sm-8" style="padding: 0">
                        <span class="top_info2_aaa">开课时间</span>
                        <span class="top_info2_con"><?=$time_start?> 至 <?=$time_end?></span>
                    </div>
                </div>
                <div class="top_info_2 row">
                    <div class="col-sm-12" style="padding: 0">
                        <span class="top_info2_aaa">适合对象</span>
                        <span class="top_info2_con"><?=$object?></span>
                    </div>
                </div>
                <button class="JoinClassBtn">参加课程</button>
            </div>
        </div>
        <ul class="nav nav-pills row hidden-xs" style="z-index:1;">

            <li role="presentation" id="nav1" class="col-xs-6 col-sm-2 active"><a>课程简介</a></li>
            <li role="presentation" id="nav2" class="col-xs-6 col-sm-2"><a>师资介绍</a></li>
            <li role="presentation" id="nav3" class="col-xs-6 col-sm-2"><a>课程形式</a></li>
            <li role="presentation" id="nav4" class="col-xs-6 col-sm-2"><a>课程安排</a></li>
        </ul>
        <div class="txt_content">
            <div class="con_title">课程简介</div>
            <div class="con_con" >
                <?=$content?>
            </div>
            <div class="con_title">师资介绍</div>
            <div class="con_con">
                <?=$introduce?>
            </div>
            <div class="con_title">课程形式</div>
            <div class="con_con">
                <?=$modality?>
            </div>
            <div class="con_title">课程安排</div>
            <div class="con_con">
                <?=$plan?>
            </div>
            <div class="con_title">如何最大化利用网课</div>
            <div class="con_con">
                <p>1、每次2小时的课程全程贯穿重点答题方法和技巧，需要全程保持注意力集中；</p>
                <p>2、积极进行课堂练习，得到最及时的反馈；</p>
                <p>3、在别的同学练习的时候，可以自己进行反复答题训练，如果已经练习熟练，可以仔细听别的同学的回答，比对自己的答案，向回答优秀的同学学习借鉴；</p>
                <p>4、认真地反复跟读、练习当日作业，练习完成后使用微信语音答题提交作业；</p>
                <p>5、重点学习练习方法，培养学习习惯；</p>
                <p>6、短短几次课程的学习绝不可能瞬间提升你的英语能力，但是课堂所讲解的练习方法是指导课后练习的方向，只有反复练习，提高答题熟练度，才能切实提升成绩。</p>
            </div>
            <div class="con_title">需要的设备</div>
            <div class="con_con">
                <div class="row" style="margin-top: 50px;">
                    <div class="col-xs-6 col-sm-3 need_facility">
                        <div class="need_icon"><i class="icon iconfont">&#xe7a2;</i></div>
                        <p>1、正常的家用网速，无线上网最好靠近路由器，以保证信号强度和稳定性；</p>
                    </div>
                    <div class="col-xs-6 col-sm-3 need_facility">
                        <div class="need_icon"><i class="icon iconfont">&#xe602;</i></div>
                        <p>2、Mac和Windows均可，需要安装网页浏览器；</p>
                    </div>
                    <div class="col-xs-6 col-sm-3 need_facility" >
                        <div class="need_icon" style="margin-bottom: 3px" ><i class="icon iconfont" style="font-size:80px;position: relative;bottom: 5px;">&#xe625;</i></div>
                        <p>3、耳机和麦克风，笔记本自带的麦克风也可以；</p>
                    </div>
                    <div class="col-xs-6 col-sm-3 need_facility">
                        <div class="need_icon"><i class="icon iconfont">&#xe648;</i></div>
                        <p>4、草稿纸、笔等；</p>
                    </div>
                </div>
            </div>
            <div class="con_title">更多</div>
            <div class="con_con">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="bottom_box">
                            <div class="bottom_title_box">
                                <div class="btl"><i class="icon iconfont">&#xe607;</i><span>课程价格</span></div>
                                <div class="btr hidden-xs">398元/小时</div>
                            </div>
                            <div class="bottom_info_box">
                                <p>
                                    398元/小时，18小时共7164元。（满3人成班）<br />
                                    注：第一次课程结束的24小时内可以申请全额退款，过后不予退款。
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="bottom_box">
                            <div class="bottom_title_box">
                                <div class="btl"><i style="position: absolute;font-size: 58px;" class="icon iconfont">&#xe613;</i><span style="padding-left: 67px;">奖励</span></div>
                                <div class="btr hidden-xs">课程结束后两次考试</div>
                            </div>
                            <div class="bottom_info_box">
                                <p>
                                    课程结束后两次考试内，<br />
                                    听力30分或进步10分及以上，奖励1000元人民币；<br />
                                    口语28分、29分或进步6分及以上，奖励1000元人民币；<br />
                                    口语30分，奖励1000元美金。
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#search_service').click(function(){
        location.href='/web/serviceList';
    })
    $('#index').click(function(){
        location.href='/';
    })
</script>
<script>
    var is_mobile = '<?=$mobile?true:false;?>';
    $('#nav1').click(function(){
        window.scrollTo(0,480)
    });
    $('#nav2').click(function(){
        window.scrollTo(0,620)
    });
    $('#nav3').click(function(){
        window.scrollTo(0,820)
    });
    $('#nav4').click(function(){
        window.scrollTo(0,1100)
    });

    var i=0;
    $(window).scroll(function(){
        i=$(window).scrollTop();
        if(i<560){
            $('#nav1').addClass('active');
        }else{
            $('#nav1').removeClass('active');
        }
        if(i>=560 && i<800){
            $('#nav2').addClass('active');
        }else{
            $('#nav2').removeClass('active');
        }

        if(i>=800 && i<1050){
            $('#nav3').addClass('active');
        }else{
            $('#nav3').removeClass('active');
        }
        if(i>=1050){
            $('#nav4').addClass('active');
        }else{
            $('#nav4').removeClass('active');
        }


        if(i>=530){
            $(".nav-pills").addClass("se")

        }else{

            $(".nav-pills").removeClass("se")
        }

    })


    $('.JoinClassBtn').click(function(){
//        layer.open({
//            title:'请填写相关信息',
//            type: 2,
//            area: ['100%','100%'],
//            fixed: false, //不固定
//            maxmin: true,
//            content: '/web/message?id=<?php //echo $id ?>//'
//        });
        if(!is_mobile){
            var area = ['50%','60%'];
        }else{
            var area = ['100%','100%'];
        }

        layer.open({
            title:'请填写相关信息',
            type: 2,
            area: area,
            fixed: false, //不固定
            maxmin: true,
            content: '/web/consult/7'
        });
    });

    $('.top_box_left').hover(function(){
        $('.glyphicon-play-circle').css('color','#ccc');
    },function(){
        $('.glyphicon-play-circle').css('color','#fff');
    })
</script>