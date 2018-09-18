<link rel="stylesheet" href="/public/css/web/article.css">
<link rel="stylesheet" href="/public/css/web/schoollist.css">
<link rel="stylesheet" href="/public/layui/css/layui.css" media="all">
<script src="/public/js/jquery.goup.min.js"></script>
<div class="banner">
    <img src="/public/images/web/article/zxzx.png">
</div>
<div class="bg-fff ">
    <p class="nav_mbx hidden-xs">
        <a href="/web">首页</a> > <a href="/web/article_list">资讯中心</a> > <?=$title?>
    </p>
</div>

<div class="main_box row">
    <div class="col-md-9 padding_left_0" style="padding-right: 10px">
        <div class="bg-fff box-shadow a_d_padding_box">
            <div class="a_d_box">
                <h3 class="a_d_article-title"><?=$title?></h3>
                <p style="color: #999;margin: 10px 0;">
                    <i class="layui-icon">&#xe637;</i> <?=substr($issue_time,0,10)?>
                    <span style="padding-left: 40px">来源：<?=$author?></span>
                </p>
                <hr style="margin: 20px 0;">
                <img class="a_d_content_img" src="/upload/article/<?=$content_img?>" alt="<?=$title?>">
            </div>
            <div class="a_d_content">
                <?=$content?>
                <div class="a_d_c_foot">
                    <p>想进一步了解美国中学情况，关注S&H教育，专业的顾问老师就会为你解答疑问。</p>
                    <p>微信咨询S&H教育微信公众号：schoolingandhoming.com</p>
                    <p>电话：021-58850798</p>
                </div>
            </div>

            <div class="a_d_line"></div>
            <div class="a_d_foot_btn_box">
                <button class="layui-btn layui-btn-primary like_btn">
                    <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> 喜欢
                </button>
                <button class="layui-btn zx_btn JoinClassBtn">
                    咨询
                </button>
            </div>



        </div>
    </div>
    <div class="col-md-3 padding_right_0 " style="padding-left: 10px;">
        <div class="bg-fff box-shadow mar_b_20">
            <div class="gzh-title right_1">
                <p class="a_h4 p_1">关注S&H公众号</p>
                <p class="a_h4 p_2">了解最新留学动态</p>
                <img src="/public/images/web/qr.jpg" class="ewm">
                <p>扫一扫关注咨询</p>
            </div>
        </div>

        <div class="bg-fff box-shadow mar_b_20 padding-15" style="height: 320px;overflow: hidden">
            <h3 class="index_title_h3">热文推荐</h3>
            <hr>
            <?php foreach($hot_article as $v):?>
                <a href="/web/article_Detail/<?=$v['id']?>"><p class="hot_act"><?=$v['title']?></p></a>
            <?php endforeach;?>

        </div>

        <div class="bg-fff box-shadow mar_b_20 padding-15" style="padding-bottom: 5px;">
            <h3 class="index_title_h3">热门地区</h3>
            <hr>
            <div class="row">
                <?php foreach($hot_up as $k => $item):?>
                    <div class="col-md-6" style="padding: 0;text-align:center;margin-bottom: 10px;<?=$k%2==0?'padding-right:5px;':'padding-left:5px;'?>;height: 98px">
                        <a href="<?php echo $item['link'] ?>">
                            <img src="/upload/<?php echo get_filepath_by_route_id(0,$item['file_name']); ?>" height="98px" width="100%"/>
                            <div class="img-bg"></div>
                            <div class="summer_text title"><?php echo $item['title']?></div>
                        </a>
                    </div>

                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $.goup({
            trigger: 830,
            bottomOffset: 150,
            locationOffset: 100,
            titleAsText: true
        });
    });

    $('.JoinClassBtn').click(function(){
//        if(!is_mobile){
//            var area = ['50%','60%'];
//        }else{
//            var area = ['100%','100%'];
//        }

        layer.open({
            title:'请填写相关信息',
            type: 2,
            area: ['50%','60%'],
            fixed: false, //不固定
            maxmin: true,
            content: '/web/consult/7'
        });
    });

    $('.like_btn').click(function(){
        $(this).css({background:'red',color:'#FFF'})
    })
</script>