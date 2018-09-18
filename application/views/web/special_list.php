<link rel="stylesheet" href="/public/css/web/article.css">
<link rel="stylesheet" href="/public/css/web/schoollist.css">
<link rel="stylesheet" href="/public/layui/css/layui.css" media="all">
<div class="banner">
    <img src="/public/images/special/zt.png">
</div>
<div class="bg-fff ">
    <p class="nav_mbx hidden-xs"><a href="/web">首页</a> > 专题中心</p>
</div>

<div class="main_box row">
    <div class="col-md-12 padding_left_0" style="padding-right: 10px">
        <div class="bg-fff box-shadow padding-15">
            <h3 class="index_title_h3" style="text-align: center;">专题列表</h3>
            <hr>
            <?php foreach($article as $k =>$v):?>
                <div class="row" style="margin: 20px 0;">
                    <div style="margin: 0 200px; padding-bottom: 20px; <?=($k+1)%7==0?'':'border-bottom: 1px dotted #999'?>">
                        <a href="<?=$v['link']?>">
                            <img src="<?=$v['pc_banner']?>">
                        </a>
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
    
</div>