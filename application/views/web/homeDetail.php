<link rel="stylesheet" href="/public/css/web/home_detail.css?v=1">
<script src="/public/js/jquery.SuperSlide.2.1.1.js"></script>
<script src="/public/js/z-mapbox.js"></script>
<link rel="stylesheet" href="/public/css/z-mapbox.css">
<div class="body_box">
    <div class="main_box">
        <div class="main_box_left">
            <div class="touxiang"><i class="icon iconfont"><?php echo $sex==1?'&#xe645;':'&#xe6a1;' ?></i></div>
            <div class="call_host">联系此房东</div>
            <div class="left_con">
                <div class="left_title"><i style="font-size: 19px" class="icon iconfont">&#xe633;</i> 基本信息</div>
                <div class="left_txt">
                    <?php echo $this->config->item('race')[$ethnicity] ?>
                </div>
                <div class="left_txt">
                    <?php
                    switch ($primary_language){
                        case 1:
                            echo 'English';
                            break;
                        case 2:
                            echo 'Spanish';
                            break;
                        case 3:
                            echo 'German';
                            break;
                        case 4:
                            echo 'French';
                            break;
                        case 5:
                            echo 'Chinese';
                            break;
                        case 6:
                            echo 'Other';
                            break;
                    }
                    ?>
                </div>
                <div class="left_txt">
                    <?php echo $this->config->item('religion')[$religion] ?>
                </div>

                <div class="left_title"><i style="font-size: 19px" class="icon iconfont">&#xe6a3;</i> 家庭信息</div>
                <div class="left_txt">家庭成员数量：<?php echo $family_num?></div>
                <div class="left_txt"><?php echo $smoke==1?'家中有人吸烟':'家中没人吸烟' ?></div>
                <div class="left_txt"><?php echo $pet==1?'养宠物':'不养宠物' ?></div>
                <div class="left_txt">兴趣爱好：
                    <?php
                        foreach($Allhobby as $k => $v){
                            if(in_array($v['id'],$hobby)){
                                echo $v['name'].'&nbsp;&nbsp;';
                            }
                        }
                    ?>
                </div>

                <div class="left_title"><i style="font-size: 22px" class="icon iconfont">&#xe60d;</i> 房屋规则</div>
                <div class="left_txt"><?php echo $rule?></div>
            </div>

        </div>
        <div class="main_box_right">
            <div id="slideBox" class="slideBox">
                <div class="bd">
                    <ul>
                        <?php foreach($houseImg as $item): ?>
                            <li><img src="/upload/userhome/<?php echo $item['user_id'].'/'.$item['pic_name']?>" /></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <a class="prev" href="javascript:void(0)"></a>
                <a class="next" href="javascript:void(0)"></a>

            </div>
            <div class="home_title">
                <h2><?php echo $title ?></h2>
                <span><?php echo $cityName['name_en'].'&nbsp;,&nbsp;'.$stateName['name_en'].'&nbsp;,&nbsp;'.$zipcode ?></span>
            </div>
            <div class="home_info">
                <h4>房屋信息</h4>
                <div class="row home_info_con">
                    <div class="col-md-3"><i style="font-size: 50px" class="icon iconfont">&#xe613;</i><p class="line_1p"><?php echo $buildY.'-'.$buildM?></p></div>
                    <div class="col-md-3"><i style="font-size: 50px" class="icon iconfont">&#xe6e5;</i><p class="line_1p"><?php echo $area?></p></div>
                    <div class="col-md-3"><i style="font-size: 50px" class="icon iconfont">&#xe604;</i>
                        <p class="line_1p">
                            <?php
                            switch ($house_type){
                                case 1:
                                    echo lang('House_type_Villa');
                                    break;
                                case 2:
                                    echo lang('House_type_Town_Hose');
                                    break;
                                case 3:
                                    echo lang('House_type_Apartment');
                                    break;
                            }
                            ?>
                        </p>
                    </div>
                    <div class="col-md-3"><i style="font-size: 50px" class="icon iconfont">&#xe60a;</i>
                        <p class="line_1p">
                            <?php
                            switch ($ownership){
                                case 1:
                                    echo lang('Self_Owned');
                                    break;
                                case 2:
                                    echo lang('Rent');
                                    break;
                            }
                            ?>
                        </p>
                    </div>
                    <div class="col-md-3"><i style="font-size: 50px" class="icon iconfont">&#xe676;</i><p><?php echo $bedroom_num.'间卧室'?></p></div>
                    <div class="col-md-3"><i style="font-size: 50px" class="icon iconfont">&#xe60e;</i><p><?php echo $toilet_num.'个卫生间' ?></p></div>
                    <div class="col-md-3"><i style="font-size: 50px" class="icon iconfont">&#xe621;</i><p>暖气</p></div>
                    <div class="col-md-3"><i style="font-size: 50px" class="icon iconfont">&#xe7ff;</i><p><?php echo $wifi==1?'有WIFI':'无WIFI'?></p></div>
                </div>
            </div>
            <div class="home_info2">
                <h4>房屋描述</h4>
                <div class="info2_con" style="width: 820px"><?php echo $describe?></div>
            </div>
            <div class="home_info2">
                <h4>费用</h4>
                <div class="info2_con">
                    <div class="left_icon"><i style="font-size: 56px" class="icon iconfont">&#xe615;</i></div>
                    <div class="right_con">
                        <table class="r_pay">
                            <tr>
                                <td>押金：<?php echo $deposit==1?'需要押金':'无需押金' ?></td>
                                <td style="text-align: right">租金：$<?php echo $month_price?>/月</td>
                            </tr>
                            <tr>
                                <td colspan="2">押金在退房之后24小时之内全额退款</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;color: #5478ac">了解更多>></td>
                            </tr>
                        </table>
                    </div>
                    <div style="clear: both"></div>
                </div>
            </div>
            <div class="home_info2">
                <h4>位置</h4>
                <div id="map" style="height: 290px"></div>
            </div>


        </div>
        <div style="clear: both"></div>
    </div>
</div>


<script type="text/javascript">
    $(function(){
        mapboxgl.accessToken = 'pk.eyJ1IjoiYnJpZ2h0bGl1IiwiYSI6ImNpdjk4c2R3NTAwMHUyb3FrdGpoYmVkcXYifQ.0dLVOAE-gKbQvvbUpk-fdA';

        var center = [<?php echo $lng?>,<?php echo $lat?>];
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v9',
            center: center,
            zoom: 10
        });
        map.addControl(new mapboxgl.NavigationControl());

        var el = document.createElement('div');
        el.className = 'marker';
        el.style.backgroundImage = 'url(/public/images/web/search/10.png)';
        el.style.width =  '50px';
        el.style.height = '50px';
        // 	    var popup = new mapboxgl.Popup({offset:[0, -30]})

        $('.mapboxgl-marker').each(function(){
            $(this).css('transform').replace(/[^0-9\-,]/g,'').split(',');
        })
        // add marker to map
        new mapboxgl.Marker(el, {offset: [-50 / 2, -50 /1.2]})
            .setLngLat([<?php echo $lng?>,<?php echo $lat?>])
            .addTo(map);


    })


    jQuery(".slideBox").slide({mainCell:".bd ul"});
</script>