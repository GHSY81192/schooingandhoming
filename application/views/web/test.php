<h2>校友捐赠 TOP 20</h2>
<?php foreach($data as $v):?>
    <a href="/web/schoolDetail/<?=$v['id']?>"><?php echo $v['financial_contribute'].' - '.$v['name_en'].'<br />'?></a>
<?php endforeach;?>
<br />
<h2>平均SAT TOP 100</h2>
<?php foreach($data2 as $k => $v):?>
    <?php if($k<100):?>
        <a href="/web/schoolDetail/<?=$v['id']?>"><?php echo $v['avg_sat'].' - '. $v['name_en'].'<br />'?></a>
    <?php endif;?>
<?php endforeach;?>
<br />
<h2>AP课程 TOP 20</h2>
<?php foreach($data3 as $k => $v):?>
    <?php if($k<20):?>
        <a href="/web/schoolDetail/<?=$v['id']?>"><?php echo $v[0].' - '. $v['name_en'].'<br />'?></a>
    <?php endif;?>
<?php endforeach;?>
<br />
<h2>体育项目 TOP 20</h2>
<?php foreach($data4 as $k => $v):?>
    <?php if($k<20):?>
        <a href="/web/schoolDetail/<?=$v['id']?>"><?php echo $v[0].' - '. $v['name_en'].'<br />'?></a>
    <?php endif;?>
<?php endforeach;?>
<br />
<h2>师生比 TOP 20</h2>
<?php foreach($data5 as $k => $v):?>

        <a href="/web/schoolDetail/<?=$v['id']?>"><?php echo $v['teach_pupil_ratio'].':1 - '. $v['name_en'].'<br />'?></a>

<?php endforeach;?>
<br />
<h2>高学位师资比 TOP 20</h2>
<?php foreach($data6 as $k => $v):?>

    <a href="/web/schoolDetail/<?=$v['id']?>"><?php echo $v['teach_edu_scale'].'% - '. $v['name_en'].'<br />'?></a>

<?php endforeach;?>