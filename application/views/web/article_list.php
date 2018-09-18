<link rel="stylesheet" href="/public/css/web/article.css">
<link rel="stylesheet" href="/public/css/web/schoollist.css">
<link rel="stylesheet" href="/public/layui/css/layui.css" media="all">
<div class="banner">
    <img src="/public/images/web/article/zxzx.png">
</div>
<div class="bg-fff ">
    <p class="nav_mbx hidden-xs"><a href="/web">首页</a> > 资讯中心</p>
</div>

<div class="main_box row">
    <div class="col-md-9 padding_left_0" style="padding-right: 10px">
        <div class="bg-fff box-shadow padding-15">
            <h3 class="index_title_h3">资讯列表</h3>
            <hr>
            <?php foreach($article as $v):?>
                <div class="row" style="margin-bottom: 20px;">
                    <a href="/web/article_Detail/<?=$v['id']?>"><img src="/upload/article/<?=$v['img']?>" height="187px" class="col-md-5 padding_left_0 padding_right_0"></a>
                    <div class="col-md-7 article-list">
                        <a href="/web/article_Detail/<?=$v['id']?>"><h3 class="article-title"><?=$v['title']?></h3></a>
                        <p style="color: #999;margin: 10px 0;">
                            <i class="layui-icon">&#xe637;</i> <?=substr($v['issue_time'],0,10)?>
                            <span style="padding-left: 40px">来源：<?=$v['author']?></span>
                        </p>
                        <a href="/web/article_Detail/<?=$v['id']?>"><p><?=$v['intro']?></p></a>
                    </div>
                </div>
            <?php endforeach;?>

            <div class="clearfix">
                <?php if ($count > 7):?>
                    <ul class="pagination" style="padding:10px 20px 0px 0px"><li><?php if(lang('is_en')):?><?php echo (int)($count/7)+1;?> Pages， <?php else:?>共<?php echo (int)($count/7)+1;?>页，<?php endif;?></li></ul>
                <?php endif;?>
                <?php echo $this->pagination->create_links(); ?>

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