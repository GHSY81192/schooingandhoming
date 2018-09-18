<link rel="stylesheet" href="/public/css/web/becomehome.css" />
<div class="body_box">
    <div class="progress" style="margin: 0 auto;height: 8px;position: relative;bottom: 8px;">
        <div class="progress-bar"  role="progressbar" aria-valuenow="60"
             aria-valuemin="0" aria-valuemax="100" style="width: 15%;background: #5ea557">
        </div>
    </div>

    <div class="row line_num">
        <div class="col-xs-2 ">
            <span style="color: #fff;background: #5ea557;">1</span>
            <p style="color: #5ea557"><?php echo lang('Basic_Information') ?></p>
        </div>
        <div class="col-xs-2 ">
            <span>2</span>
            <p><?php echo lang('Family_Information') ?></p>
        </div>
        <div class="col-xs-2 ">
            <span>3</span>
            <p><?php echo lang('House_Information') ?></p>
        </div>
        <div class="col-xs-2 ">
            <span>4</span>
            <p><?php echo lang('Upload_Photo') ?></p>
        </div>
        <div class="col-xs-2 ">
            <span>5</span>
            <p><?php echo lang('Rules_and_Settings') ?></p>
        </div>
        <div class="col-xs-2 ">
            <span>6</span>
            <p><?php echo lang('Preview') ?></p>
        </div>
    </div>

    <div class="main_box">
        <div class="title_box"><span class="tit"><?php echo lang('Basic_Information') ?></span> <i class="icon iconfont save_btn"><span>&#xe684;</span></i></div>
        <div class="info_box">
            <form class="form-inline" method="post">
                <div class="form-group" style="padding: 30px 0 30px 20px;display: block">
                    <label for="exampleInputName2"><i class="icon iconfont">&#xe620;</i><?php echo lang('Host') ?></label>
                    <input type="text" placeholder="<?php echo lang('First_name') ?>" name="firstname" value="<?php echo $info['firstname']?$info['firstname']:''; ?>">
                    <input type="text" placeholder="<?php echo lang('Last_name') ?>" name="secondname" value="<?php echo $info['secondname']?$info['secondname']:''; ?>">
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label for="exampleInputName2"><i class="icon iconfont">&#xe668;</i><?php echo lang('home_detail_member_gender_message') ?></label>
                    <select name="gender" class="">
                        <option style="display: none"></option>
                        <option value="1" <?php echo $info['gender']==1?'selected':''; ?>><?php echo lang('personal_tailor_form_gender_man_message') ?></option>
                        <option value="2" <?php echo $info['gender']==2?'selected':''; ?>><?php echo lang('personal_tailor_form_gender_woman_message') ?></option>
                    </select>
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label for="exampleInputName2"><i class="icon iconfont">&#xe6b1;</i><?php echo lang('Date_of_Birth') ?></label>
                    <select name="day" id="" style="width: 50px;text-align: right;margin-right: 5px">
                        <option style="display: none" value=""><?php echo lang('Day') ?></option>
                    </select>
                    <select name="month" id="" style="width: 50px;text-align: right;margin-right: 5px">
                        <option style="display: none" value=""><?php echo lang('Month') ?></option>
                    </select>
                    <select name="year" id="" style="width: 60px;text-align: right;margin-right: 5px">
                        <option style="display: none" value=""><?php echo lang('Year') ?></option>
                    </select>


                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label for="exampleInputName2"><i class="icon iconfont">&#xe765;</i><?php echo lang('Language_Spoken')?></label>
                    <select  name="language">
                        <option style="display: none"></option>
                        <option value="1" <?php echo $info['language']==1?'selected':''; ?>><?php echo lang('search_house_language1')?></option>
                        <option value="2" <?php echo $info['language']==2?'selected':''; ?>><?php echo lang('search_house_language2')?></option>
                        <option value="3" <?php echo $info['language']==3?'selected':''; ?>><?php echo lang('Spanish')?></option>
                        <option value="4" <?php echo $info['language']==4?'selected':''; ?>><?php echo lang('French')?></option>
                        <option value="5" <?php echo $info['language']==5?'selected':''; ?>><?php echo lang('German')?></option>
                        <option value="0" <?php echo $info['language']=='0'?'selected':''; ?>><?php echo lang('Other')?></option>
                    </select>
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label for="exampleInputName2"><i class="icon iconfont">&#xe74c;</i><?php echo lang('home_detail_member_race_message')?></label>
                    <select name="race">
                        <option style="display: none"></option>
                        <option value="1" <?php echo $info['race']==1?'selected':''; ?>><?php echo lang('search_house_race1')?></option>
                        <option value="2" <?php echo $info['race']==2?'selected':''; ?>><?php echo lang('search_house_race2')?></option>
                        <option value="3" <?php echo $info['race']==3?'selected':''; ?>><?php echo lang('search_house_race3')?></option>
                        <option value="4" <?php echo $info['race']==4?'selected':''; ?>><?php echo lang('search_house_race5')?></option>
                        <option value="0" <?php echo $info['race']==5?'selected':''; ?>><?php echo lang('Other')?></option>
                        <option value="5" <?php echo $info['race']=='0'?'selected':''; ?>><?php echo lang('Reject_answering')?></option>

                    </select>
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label for="exampleInputName2"><i class="icon iconfont">&#xe63c;</i><?php echo lang('Education_Level')?></label>
                    <select name="education">
                        <option style="display: none"></option>
                        <option value="1" <?php echo $info['education']==1?'selected':''; ?>><?php echo lang('Primary_School')?></option>
                        <option value="2" <?php echo $info['education']==2?'selected':''; ?>><?php echo lang('Middle_School')?></option>
                        <option value="3" <?php echo $info['education']==3?'selected':''; ?>><?php echo lang('High_School')?></option>
                        <option value="4" <?php echo $info['education']==4?'selected':''; ?>><?php echo lang('University')?></option>
                        <option value="5" <?php echo $info['education']==5?'selected':''; ?>><?php echo lang('Master')?></option>
                        <option value="6" <?php echo $info['education']==6?'selected':''; ?>><?php echo lang('PH_D')?></option>
                        <option value="0" <?php echo $info['education']=='0'?'selected':''; ?>><?php echo lang('Other')?></option>
                    </select>
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label for="exampleInputName2"><i class="icon iconfont">&#xe6db;</i><?php echo lang('home_detail_member_religion_message')?></label>
                    <select name="belief">
                        <option style="display: none"></option>
                        <option value="1" <?php echo $info['belief']==1?'selected':''; ?>><?php echo lang('Christianity')?></option>
                        <option value="2" <?php echo $info['belief']==2?'selected':''; ?>><?php echo lang('Catholicism')?></option>
                        <option value="3" <?php echo $info['belief']==3?'selected':''; ?>><?php echo lang('Lutheran')?></option>
                        <option value="4" <?php echo $info['belief']==4?'selected':''; ?>><?php echo lang('Methodists')?></option>
                        <option value="5" <?php echo $info['belief']==5?'selected':''; ?>><?php echo lang('Quakers')?></option>
                        <option value="6" <?php echo $info['belief']==6?'selected':''; ?>><?php echo lang('Baptist')?></option>
                        <option value="7" <?php echo $info['belief']==7?'selected':''; ?>><?php echo lang('Judaism')?></option>
                        <option value="8" <?php echo $info['belief']==8?'selected':''; ?>><?php echo lang('Fraternity')?></option>
                        <option value="9" <?php echo $info['belief']==9?'selected':''; ?>><?php echo lang('Islam')?></option>
                        <option value="10" <?php echo $info['belief']==10?'selected':''; ?>><?php echo lang('Buddhism')?></option>
                        <option value="11" <?php echo $info['belief']==11?'selected':''; ?>><?php echo lang('Hinduism')?></option>
                        <option value="12" <?php echo $info['belief']==12?'selected':''; ?>><?php echo lang('Other_religion')?></option>
                        <option value="0" <?php echo $info['belief']=='0'?'selected':''; ?>><?php echo lang('No_religion')?></option>
                    </select>
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label for="exampleInputName2"><i class="icon iconfont">&#xe67e;</i><?php echo lang('home_detail_member_profession_message')?></label>
                    <input type="text" name="job" value="<?php echo $info['job']?$info['job']:''; ?>">
                </div>
                <div class="" style="padding: 60px 0 30px 20px;display: block;text-align: center">
                    <span class="previous" style="background: #ccc"><?php echo lang('Previous') ?></span>
                    <span class="next_btn" style="background: #ccc"><?php echo lang('Next') ?></span>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function(){

        var dataDay = <?php echo $info['day']?$info['day']:0; ?>;
        var dataMonth = <?php echo $info['month']?$info['month']:0; ?>;
        var dataYear = <?php echo $info['year']?$info['year']:0; ?>;
        for(var i=1;i<=31;i++){
            if(i == dataDay){
                $('select[name=day]').append('<option selected value="'+i+'">'+i+'</option>')
            }else{
                $('select[name=day]').append('<option value="'+i+'">'+i+'</option>')
            }

        }
        for(var j=1;j<=12;j++){
            if(j == dataMonth){
                $('select[name=month]').append('<option selected value="'+j+'">'+j+'</option>');
            }else{
                $('select[name=month]').append('<option value="'+j+'">'+j+'</option>');
            }

        }
        for(var k=1930;k<=2017;k++){
            if(k == dataYear){
                $('select[name=year]').append('<option selected value="'+k+'">'+k+'</option>');
            }else{
                $('select[name=year]').append('<option value="'+k+'">'+k+'</option>');
            }
        }

        var data = getData();
        if(data.firstName && data.secondName && data.gender && data.day && data.month && data.year && data.language && data.race && data.education && data.belief && data.job){
            $('.next_btn').css({'background':'#5ea557','cursor':'pointer'});
        }

    });

    function getData(){
        var data = {};
        data.part1 = 1;
        data.firstName = $('input[name=firstname]').val();
        data.secondName = $('input[name=secondname]').val();
        data.gender = $('select[name=gender]').val();
        data.day = $('select[name=day]').val();
        data.month = $('select[name=month]').val();
        data.year = $('select[name=year]').val();
        data.language = $('select[name=language]').val();
        data.race = $('select[name=race]').val();
        data.education =$('select[name=education]').val();
        data.belief =$('select[name=belief]').val();
        data.job =$('input[name=job]').val();
        return data;
    }

    $('.save_btn').click(function(){
        var data = getData();
        $.post("/web/becomeHome_save" , data , function(data){
            if(data.status) {
                layer.msg('<?php echo lang('saving') ?>', {
                    icon: 16,
                    time: 1000,
                    shade: 0.01
                }, function(){
                    layer.msg('<?php echo lang('save_success') ?>');
                });
                $(this).attr('disabled','disabled');
                setTimeout("$('.save').attr('disabled',false);",5000);
            }else{
                alert(data.msg);
            }
        },'json');
    })

    $('.next_btn').click(function(){
        var data = getData();
        if(!data.firstName || !data.secondName || !data.gender || !data.day || !data.month || !data.year || !data.language || !data.race || !data.education || !data.belief || !data.job){
            layer.msg('<?php echo lang('data_scarcity') ?>！',{time:1500});
            data.one = false;
            return false;
        }

        data.one = true;
        $.post("/web/becomeHome_save" , data , function(data){
            if(data.status) {
                location.href='/web/becomeHome?p=2';
            }
        },'json');
    })


    $('form').change(function(){
        var data = getData();
        if(data.firstName && data.secondName && data.gender && data.day && data.month && data.year && data.language && data.race && data.education && data.belief && data.job){
            $('.next_btn').css({'background':'#5ea557','cursor':'pointer'});
            return false;
        }else{
            $('.next_btn').css({'background':'#ccc','cursor':'text'});
        }
    })

</script>