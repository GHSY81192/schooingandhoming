<link rel="stylesheet" href="/public/css/web/zt.css">
<div class="banner">
    <img class="hidden-xs" src="/public/images/web/zt_top/banner_top20.jpg" width="100%">
    <img src="/public/images/web/zt_top/banner_top20-m.jpg" class="visible-xs-block mobile20_banner">
</div>
<div id="body_box20">
    <div class="dy_box dy1">
        <div class="box_1200 m_dy">
            导语：对于打算要去美国留学的学生和家长来说，不应盲目轻信名校效应。择校时，学校的一些细节问题有时候也是至关重要的参考。其中，专业课程数量、学院师资力量、校友捐赠等都能从不同角度上体现出学校的综合实力和教育质量。因此，S&H特别进行了美高分类测评，希望对各位同学和家长有所帮助。
        </div>
    </div>
    <div class="main_box">
        <div class="part_box">
            <div class="Sh_png">
                <img src="/public/images/web/zt_top/sh_6.png" >
            </div>
            <div class="txt_box">
                <p>本次评分，S&H依据学校官方提供的相关数据——校友捐赠、平均SAT、AP课程数量、体育项目数量、师生比及高学位师资比的6个维度对美国高中进行了横向评测，方便家长们对学校进行考量。</p>
                <p>此排名并非要将学校评出优劣。毕竟除参与评测的维度之外，学校的文化氛围、学生升学情况、大学申请结果、学校管理与师资、地理位置、申请门槛、课程安排、费用等等，也都是择校时需要考量的，这些考虑因素大多因人而异，难以量化，S&H无法给出具体的评分。</p>
                <p>这并不意味着这些因素不重要，相反，它们往往更需要思考与权衡。就学校的文化氛围而言，我们建议有条件的家长们进行实地考察，毕竟亲眼所见、亲身经历是最真实的。</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 md6r">
                <div class="part_box pd20">
                    <p class="title_txt">校友捐赠TOP20</p>
                    <hr>
                    <p class="p14">校友捐赠：排名越高，代表学校可支配资金越多，校友经济实力越强 。校友捐赠的平均金额可以大致看出一个学校历届学生的总体经济水平。而学校收到的钱越多则可用来建设校园分发奖学金的钱也越多。</p>
                    <table class="school_top_tb" align="center">
                        <tr>
                            <td class="top20_td1">
                                <div class="td1_top_box"></div>
                                <div class="td1_bottom_box">
                                    <span>S&H测评</span>
                                </div>
                            </td>
                            <td class="top20_td2">
                                <div class="td2_top_box"></div>
                                <div class="td2_bottom_box">
                                    <span>学校名称</span>
                                </div>
                            </td>
                            <td class="top20_td3">
                                <div class="td1_top_box"></div>
                                <div class="td2_bottom_box">
                                    <span>捐赠金额(美元)</span>
                                </div>
                            </td>
                        </tr>

                        <?php foreach($xyjz as $k => $v):?>
                            <?php foreach($school as $v2):?>
                                <?php if($v == $v2['id']):?>
                                    <tr class="top20_list" onclick="location.href='/web/schoolDetail/<?=$v2['id']?>'">
                                        <td class="list1"><?=$k+1?></td>
                                        <td class="list2"><?=$v2['name_en']?></td>
                                        <td class="list1"><?=$v2['financial_contribute']?></td>
                                    </tr>
                                <?php endif;?>
                            <?php endforeach;?>
                        <?php endforeach;?>
                    </table>
                </div>

            </div>
            <div class="col-md-6 md6l">
                <div class="part_box pd20">
                    <p class="title_txt">平均SAT成绩TOP20</p>
                    <hr>
                    <p class="p14">
                        平均SAT：排名越高，代表毕业生平均SAT成绩越高。毕业生的SAT平均水平，可以在一定程度上反映学校的学术水平，但是并非绝对。
                    <br> <span class="hidden-xs"><br></span>
                    </p>
                    <table class="school_top_tb" align="center">
                        <tr>
                            <td class="top20_td1">
                                <div class="td1_top_box"></div>
                                <div class="td1_bottom_box">
                                    <span>S&H测评</span>
                                </div>
                            </td>
                            <td class="top20_td2">
                                <div class="td2_top_box"></div>
                                <div class="td2_bottom_box">
                                    <span>学校名称</span>
                                </div>
                            </td>
                            <td class="top20_td3">
                                <div class="td1_top_box"></div>
                                <div class="td2_bottom_box">
                                    <span>SAT平均成绩</span>
                                </div>
                            </td>
                        </tr>

                        <?php foreach($satcj as $k => $v):?>
                            <tr class="top20_list" onclick="location.href='/web/schoolDetail/<?=$v[0]?>'">
                                <td class="list1"><?=$k+1?></td>
                                <td class="list2"><?=$v[1]?></td>
                                <td class="list1"><?=$v[2]?></td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 md6r">
                <div class="part_box pd20">
                    <p class="title_txt">AP课程数量TOP20</p>
                    <hr>
                    <p class="p14">AP课程数量：排名越高，则AP课程数量越多（但是个别顶级名校并无AP课程）。由于AP课程并不是唯一的高级课程（还有IB课程等等），也并不是每个学校都相信AP、IB之类的通用高级课程，所以还是要具体问题具体分析。</p>
                    <table class="school_top_tb" align="center">
                        <tr>
                            <td class="top20_td1">
                                <div class="td1_top_box"></div>
                                <div class="td1_bottom_box">
                                    <span>S&H测评</span>
                                </div>
                            </td>
                            <td class="top20_td2">
                                <div class="td2_top_box"></div>
                                <div class="td2_bottom_box">
                                    <span>学校名称</span>
                                </div>
                            </td>
                            <td class="top20_td3">
                                <div class="td1_top_box"></div>
                                <div class="td2_bottom_box">
                                    <span>AP课程数量</span>
                                </div>
                            </td>
                        </tr>

                        <?php foreach($apkc as $k => $v):?>
                            <?php foreach($school as $v2):?>
                                <?php if($v == $v2['id']):?>
                                    <tr class="top20_list" onclick="location.href='/web/schoolDetail/<?=$v2['id']?>'">
                                        <td class="list1"><?=$k+1?></td>
                                        <td class="list2"><?=$v2['name_en']?></td>
                                        <td class="list1">
                                            <?php
                                                switch($k){
                                                    case 0:
                                                        echo 39;
                                                        break;
                                                    case 1:
                                                        echo 38;
                                                        break;
                                                    case 2:
                                                        echo 35;
                                                        break;
                                                    case 3:
                                                        echo 32;
                                                        break;
                                                    case 4:
                                                        echo 31;
                                                        break;
                                                    default:
                                                        echo 30;
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endif;?>
                            <?php endforeach;?>
                        <?php endforeach;?>
                    </table>
                </div>

            </div>
            <div class="col-md-6 md6l">
                <div class="part_box pd20">
                    <p class="title_txt">体育项目数量TOP20</p>
                    <hr>
                    <p class="p14">体育项目数量：排名越高，学校的体育项目数量越多。体育项目种类的多少可以部分反映这个学校的规模和倾向性，但是数量多亦并不能保证有开展自己感兴趣的体育项目，所以只可作为相对的参考。</p>
                    <table class="school_top_tb" align="center">
                        <tr>
                            <td class="top20_td1">
                                <div class="td1_top_box"></div>
                                <div class="td1_bottom_box">
                                    <span>S&H测评</span>
                                </div>
                            </td>
                            <td class="top20_td2">
                                <div class="td2_top_box"></div>
                                <div class="td2_bottom_box">
                                    <span>学校名称</span>
                                </div>
                            </td>
                            <td class="top20_td3">
                                <div class="td1_top_box"></div>
                                <div class="td2_bottom_box">
                                    <span>体育项目数量</span>
                                </div>
                            </td>
                        </tr>

                        <?php foreach($tyxm as $k => $v):?>
                            <tr class="top20_list" onclick="location.href='/web/schoolDetail/<?=$v[0]?>'">
                                <td class="list1"><?=$k+1?></td>
                                <td class="list2"><?=$v[1]?></td>
                                <td class="list1"><?=$v[2]?></td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 md6r">
                <div class="part_box pd20">
                    <p class="title_txt">师生比TOP20</p>
                    <hr>
                    <p class="p14">师生比：排名越高，平均每个学生能得到的教师资源越多。师生比例排行是美国学校一个常见的衡量指标，相当于是在衡量每个学生可分到的教师人数的人均大小。可以理解为这个比例越大，在这个排行里排名越高，学校人均教师资源越多。</p>
                    <table class="school_top_tb" align="center">
                        <tr>
                            <td class="top20_td1">
                                <div class="td1_top_box"></div>
                                <div class="td1_bottom_box">
                                    <span>S&H测评</span>
                                </div>
                            </td>
                            <td class="top20_td2">
                                <div class="td2_top_box"></div>
                                <div class="td2_bottom_box">
                                    <span>学校名称</span>
                                </div>
                            </td>
                            <td class="top20_td3">
                                <div class="td1_top_box"></div>
                                <div class="td2_bottom_box">
                                    <span>师生比</span>
                                </div>
                            </td>
                        </tr>

                        <?php foreach($ssb as $k => $v):?>
                            <tr class="top20_list" onclick="location.href='/web/schoolDetail/<?=$v[0]?>'">
                                <td class="list1"><?=$k+1?></td>
                                <td class="list2"><?=$v[1]?></td>
                                <td class="list1"><?=$v[2]?></td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                </div>

            </div>
            <div class="col-md-6 md6l">
                <div class="part_box pd20">
                    <p class="title_txt">高学位师资比TOP20</p>
                    <hr>
                    <p class="p14">高学位师资比：排名越高，代表硕士学位以上的教师所占比例越高。高等学位教师所占比例高，可以部分反映出学校的师资水平。只是在此排名中各学校所差也并不算太多，依然只供参考。</p>
                    <table class="school_top_tb" align="center">
                        <tr>
                            <td class="top20_td1">
                                <div class="td1_top_box"></div>
                                <div class="td1_bottom_box">
                                    <span>S&H测评</span>
                                </div>
                            </td>
                            <td class="top20_td2">
                                <div class="td2_top_box"></div>
                                <div class="td2_bottom_box">
                                    <span>学校名称</span>
                                </div>
                            </td>
                            <td class="top20_td3">
                                <div class="td1_top_box"></div>
                                <div class="td2_bottom_box">
                                    <span>高学位师资比</span>
                                </div>
                            </td>
                        </tr>

                        <?php foreach($gxwszb as $k => $v):?>
                            <tr class="top20_list" onclick="location.href='/web/schoolDetail/<?=$v[0]?>'">
                                <td class="list1"><?=$k+1?></td>
                                <td class="list2"><?=$v[1]?></td>
                                <td class="list1"><?=$v[2].'%'?></td>
                            </tr>
                        <?php endforeach;?>
                    </table>
                </div>
            </div>
        </div>

    
    </div>
    
</div>
<div class="dy_box dy2 m_foot_box">
        <div class="box_1200 m_foot">
            最后，S&H需要再次强调，我们的评分并非是为了将各个学校评出优劣，在参与评分的维度之外，还有很多在择校时需要关注的问题——学校的文化氛围、学生升学情况、大学申请结果、学校管理与师资、地理位置、申请门槛、课程安排、费用等等。这些信息无法一一量化，但对择校依然至关重要。
        </div>
    </div>
<script>
    $('.top20_list').hover(function(){
        $(this).find('td').css('background','#d0b784');
    },function(){
        $(this).find('.list1').css('background','#d0dfce');
        $(this).find('.list2').css('background','#cdd6df');
    })
</script>