<style>
    table{width: 1200px;margin: 30px auto;text-align: center}
    td{padding: 10px 0}
    .se{position: fixed; top: 0;width: 1199px;}
    .choose_box{width: 1200px;margin: 20px auto;}
</style>
<div class="choose_box">
    <select style="height: 26px;" name="state" id="">
        <option value="">请选择州</option>
        <?php foreach($state as $v):?>
            <option value="<?=$v['id']?>"><?=$v['name_cn']?></option>
        <?php endforeach;?>
    </select>
    <select style="height: 26px;" name="school_type" id="">
        <option value="">请选择学校类型</option>
        <option value="3">混校</option>
        <option value="1">男校</option>
        <option value="2">女校</option>

    </select>
    <select style="height: 26px;" name="top" id="">
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="30">30</option>
        <option value="40">40</option>
        <option value="50">50</option>
    </select>
    <button onclick="px()">排序</button>
</div>
<table border="1">
    <tr class="title" style="background: black;color: #FFF;">
        <td width="5%">排名</td>
        <td width="5%">学校ID</td>
        <td>学校名称</td>
        <td width="8%">总得分</td>
        <td width="8%">SAT Average</td>
        <td width="8%">Endowment</td>
        <td width="8%">Class size</td>
        <td width="8%">Student / Teacher Ratio</td>
        <td width="8%">% of faculty with advanced degree</td>
        <td width="8%">Sports</td>
        <td width="8%">Students Clubs</td>
        <td width="8%">AP Courses</td>
<!--        <td width="8%">数据完整性</td>-->
    </tr>
    <?php foreach($list as $k=>$v):?>

        <tr style="<?php echo in_array($v['id'],array(21877,20969,23491,7881,20982,4302,21304,21002,20095,23556,20096,9043,22544,1307,23552,23790,21905,21307,3758,20512,21460,22317,23084,21895,20934,24605,2110,22402,7983,9268,21461,7495,21007,21726,20972,25679,25680,25681,25682,25683,25684,25685,25686,25687,25688,25689,25690,25691,25692,25693,25694))?'background:pink':''; ?>">
            <td width="5%">
                <?php
                    if($v['top'] != $list[$k-1]['top']){
                        echo $k+1;
                    }else{

                        for($i=1;$i<100;$i++){
                            if($v['top'] != $list[$k-$i]['top']){
                                if($i>2){
                                    echo $k-$i+2;
                                }else{
                                    echo $k;
                                }

                                break;
                            }
                        }
                    }
                ?>
            </td>
            <td width="5%"><?=$v['id']?></td>
            <td><a href="/web/schoolDetail/<?=$v['id']?>"><?=$v['name_en']?></a></td>
            <td width="8%"><?=$v['top']?></td>
            <td width="8%"><?=$v['score1']?></td>
            <td width="8%"><?=$v['score2']?></td>
            <td width="8%"><?=$v['score3']?></td>
            <td width="8%"><?=$v['score4']?></td>
            <td width="8%"><?=$v['score5']?></td>
            <td width="8%"><?=$v['score7']?></td>
            <td width="8%"><?=$v['score8']?></td>
            <td width="8%"><?=$v['score6']?></td>
<!--            <td>--><?//=$v['score9']?><!--</td>-->

        </tr>

    <?php endforeach;?>
</table>
<script>
    var i=0;
    $(window).scroll(function(){
        i=$(window).scrollTop();


        if(i>=130){
            $(".title").addClass("se")

        }else{

            $(".title").removeClass("se")
        }

    });

    function px(){
        var state = $('select[name=state]').val();
        var top =$('select[name=top]').val();
        var school_type = $('select[name=school_type]').val();
        location.href="/web/ranking_list?state="+state+"&top="+top+"&school_type="+school_type;
    }

</script>