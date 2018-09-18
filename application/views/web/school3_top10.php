<link rel="stylesheet" href="/public/css/web/zt10.css">
<div class="banner">
    <img class="hidden-xs" src="/public/images/web/zt_top/banner.jpg" width="100%">
    <img src="/public/images/web/zt_top/banner-m.jpg"  width="100%" class="visible-xs-block">
</div>
<div id="body_box">
    <div class="main_box">
        <div class="part1">
            <div class="title">
                <div class="title_txt">选择三大热门州的原因</div>
            </div>
            <div class="row icon_box">
                <div class="col-md-3 col-xs-6 ic_c">
                    <img src="/public/images/web/zt_top/icon1.png">
                    <p class="icon_txt">辽阔的地域面积</p>
                </div>
                <div class="col-md-3 col-xs-6 ic_c">
                    <img src="/public/images/web/zt_top/icon2.png">
                    <p class="icon_txt">舒适的地理环境</p>
                </div>
                <div class="col-md-3 col-xs-6 ic_c">
                    <img src="/public/images/web/zt_top/icon3.png">
                    <p class="icon_txt">优秀的师资力量</p>
                </div>
                <div class="col-md-3 col-xs-6 ic_c">
                    <img src="/public/images/web/zt_top/icon4.png">
                    <p class="icon_txt">丰富的教育资源</p>
                </div>
                <div class="col-md-12">
                    <p class="daoyu">导语：随着低龄化留学的趋势越发明显，美国高中留学成为了不少同学和家长们的选择。美国的加州、纽约、德州作为三大热门留学州让留学生们趋之如骛。今天我们就来看下，这三大热门州最佳名校高中TOP10的榜单，到底有哪些好学校值得我们选择？</p>
                </div>
            </div>
        </div>

        <div class="part2">
            <h3 class="title_txt">加利福尼亚州</h3>
            <div class="row">
                <img style="padding:0" class="col-md-5" src="/public/images/web/zt_top/jz.jpg">
                <p class="col-md-7 p2_txt">
                    加州的面积是美国的第三大、和人口上的第一大州，在地理、地貌、物产、人口构成各方面都具有多样化的特点。很多家庭的亲戚都在加州，所以可以放心让孩子出国，也方便照应;另一方面，加州的气候跟南方很类似，生活起来也会比较的舒服。<br />
                    高等教育及科研方面，加州在作为一处一级行政区更是怪物中的怪物。按2016 USNEWS的Top World University Ranking（非国内排名），加州在全球前50独占9席，前100占10席。相比之下，前100中，英国仅有8校、德国有6校。<br />
                    总体来说，加州的学校选择还是比较多的，当然如果要选择华人比较少的学校要不就是很顶尖的住宿高中，要不就是还没有怎么被开发的走读中学。
                </p>
            </div>
            <h4>加利福尼亚州高中TOP10</h4>
            <div class="row school_row">
                <?php foreach($ca as $k => $v):?>
                    <?php foreach($school as $v2):?>
                        <?php if($v == $v2['id']):?>
                            <div class="col-md-3 col-xs-6">
                                <a href="/web/schoolDetail/<?=$v2['id']?>" target="_blank">
                                    <div class="box_s">
                                        <div class="school_bg" style="background: url('/upload/<?php echo get_filepath_by_route_id($v2['id'],$v2['index_hot_cover']); ?>') no-repeat 50%;background-size: 180%;"></div>
                                        <div class="school_name">
                                            <?='TOP '.($k+1).' '.$v2['name_cn']?>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        <?php endif;?>
                    <?php endforeach;?>
                <?php endforeach;?>

            </div>
        </div>

        <div class="part2">
            <h3 class="title_txt">纽约州</h3>
            <div class="row">
                <img style="padding:0" class="col-md-5 ny1" src="/public/images/web/zt_top/nyz.jpg">
                <p class="col-md-7 p2_txt ny2">
                    纽约市是美国最大城市及最大大港，也是世界第一大经济中心，被人们誉为世界之都。据《美国新闻与世界报道》，2016年纽约州有几百个中学在美国新闻的全美最佳高中上榜上有名，其中包括58所金牌的学校。<br />
                    全美藏书量最大的图书馆系统：纽约公共图书馆。
                </p>

            </div>
            <h4>纽约州高中TOP10</h4>
            <div class="row school_row">
                <?php foreach($ny as $k => $v):?>
                    <?php foreach($school as $v2):?>
                        <?php if($v == $v2['id']):?>
                            <div class="col-md-3 col-xs-6">
                                <a href="/web/schoolDetail/<?=$v2['id']?>" target="_blank">
                                    <div class="box_s">
                                        <div class="school_bg" style="background: url('/upload/<?php echo get_filepath_by_route_id($v2['id'],$v2['index_hot_cover']); ?>') no-repeat 50%;background-size: 180%;"></div>
                                        <div class="school_name">
                                            <?='TOP '.($k+1).' '.$v2['name_cn']?>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        <?php endif;?>
                    <?php endforeach;?>
                <?php endforeach;?>

            </div>
        </div>

        <div class="part3">
            <h3 class="title_txt">德克萨斯州</h3>
            <div class="row">
                <img style="padding:0" class="col-md-5" src="/public/images/web/zt_top/dkssz.jpg">
                <p class="col-md-7 p2_txt">
                    德克萨斯州，是美国本土面积最大的一州，也是全美土地面积及人口上的第二大州。作为美国南部第一大省，德州教育资源丰富质量优秀，可媲美加州。此外，德州房价比较低，是加州的三分之一。若想把孩子送到美国接受教育，德州不失为加州之外的最佳选择。<br />
                    总体上，德州的学校，图书馆，公园，海滩，公共设施，健身房， 商店，普遍比较新，没有加州那么拥挤。
                </p>
            </div>
            <h4>德克萨斯州名校TOP10</h4>
            <div class="row school_row">
                <?php foreach($tx as $k => $v):?>
                    <?php foreach($school as $v2):?>
                        <?php if($v == $v2['id']):?>
                            <div class="col-md-3 col-xs-6">
                                <a href="/web/schoolDetail/<?=$v2['id']?>" target="_blank">
                                    <div class="box_s">
                                        <div class="school_bg" style="background: url('/upload/<?php echo get_filepath_by_route_id($v2['id'],$v2['index_hot_cover']); ?>') no-repeat 50%;background-size: 180%;"></div>
                                        <div class="school_name">
                                            <?='TOP '.($k+1).' '.$v2['name_cn']?>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        <?php endif;?>
                    <?php endforeach;?>
                <?php endforeach;?>

            </div>
        </div>



    </div>
</div>