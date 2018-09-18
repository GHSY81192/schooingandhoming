<!DOCTYPE html>
<html class="ui-page-login">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>Schooling and Homing</title>
    <link href="/public/css/mui/css/mui.min.css" rel="stylesheet" />
    <link href="/public/css/mui/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/public/css/mui/css/feedback-page.css" />
    <link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" href="/public/css/mobile/usercenter.css">
    <script type="text/javascript" src="/public/bootstrap/js/jquery.min.js"></script>
    <script src="/public/layer/layer.js"></script>


</head>
<style>
    .mui-content{background: #fbfbfb}
</style>
<body>

<div class="mui-content">
    <div class="mui-row mB">
        <div class="list_line2"><?=lang('Order_Number')?>：<?=$order_id?></div>
        <div class="list_line2"><?=lang('Demand_Type')?>：<?=lang('Host_Family_Request')?></div>

        <div class="list_line2"><?=lang('Submitted_Time')?>：<?=$create_time?></div>

        <div class="list_line2"><?=lang('Order_Status')?>：<?=$status=='0'?lang('Waiting_for_Preliminary_Review'):lang('Preliminary_Review_passed')?></div>

        <div class="list_line2"><?=lang('Area')?>：<?=$city?></div>

        <div class="list_line2"><?=lang('Host_Primary_Spoken_Language')?>：<?=$language?></div>

        <div class="list_line2"><?=lang('Budget_Range')?>：<?=$range_start?> ~ <?=$range_end?></div>

        <div class="list_line2"><?=lang('Applicant_Name')?>：<?=$name?></div>

        <div class="list_line2"><?=lang('Call_Phone')?>：<?=$phone?></div>

        <div class="list_line2"><?=lang('sign_in_email')?>：<?=$email?></div>

    </div>
</div>

<script src="/public/js/mui/js/mui.min.js"></script>
</body>
<script>
    $('.mui-icon-left-nav').click(function(){
        location.href = '/mobile/home/MyRequireList';
    });

</script>
</html>