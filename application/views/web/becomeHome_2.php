<link rel="stylesheet" href="/public/css/web/becomehome.css" />
<div class="body_box">
    <div class="progress" style="margin: 0 auto;height: 8px;position: relative;bottom: 8px;">
        <div class="progress-bar"  role="progressbar" aria-valuenow="60"
             aria-valuemin="0" aria-valuemax="100" style="width: 33%;background: #5ea557">
        </div>
    </div>

    <div class="row line_num">
        <div class="col-xs-2 ">
            <span style="color: #fff;background: #5ea557;">1</span>
            <p style="color: #5ea557"><?php echo lang('Basic_Information') ?></p>
        </div>
        <div class="col-xs-2 ">
            <span style="color: #fff;background: #5ea557;">2</span>
            <p style="color: #5ea557"><?php echo lang('Family_Information') ?></p>
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
        <div class="title_box"><span class="tit"><?php echo lang('Basic_Information') ?></span><i class="icon iconfont save_btn"><span>&#xe684;</span></i></div>
        <div class="info_box">
            <form class="form-inline" method="post">
                <div class="form-group" style="padding: 30px 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:225px':'' ?>"  for="exampleInputName2"><i class="icon iconfont">&#xe61d;</i><?php echo lang('Family_Annual_Income') ?></label>
                    <select name="income">
                        <option style="display: none"></option>
                        <option <?php echo $info2['income']==1?'selected':''; ?> value="1">0-50000<?php echo lang('USD') ?></option>
                        <option <?php echo $info2['income']==2?'selected':''; ?> value="2">50001-80000<?php echo lang('USD') ?></option>
                        <option <?php echo $info2['income']==3?'selected':''; ?> value="3">80001-150000<?php echo lang('USD') ?></option>
                        <option <?php echo $info2['income']==4?'selected':''; ?> value="4"><?php echo lang('is_en')?'more than 150000':'大于150000美元' ?></option>
                        <option <?php echo $info2['income']==5?'selected':''; ?> value="5"><?php echo lang('Reject_answering') ?></option>
                    </select>
                </div>

                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:225px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe6a3;</i><?php echo lang('Number_of_Family_Members') ?></label>
                    <input type="number" name="family_num" value="<?php echo $info2['family_num']?$info2['family_num']:''; ?>">
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:225px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe74c;</i><?php echo lang('Any_family_member_smoke') ?></label>
                    <label class="radio-inline">
                        <input type="radio" name="smoking" <?php echo $info2['smoking']==1?'checked':''; ?> value="1"> <?php echo lang('YES')?>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="smoking" <?php echo $info2['smoking']==2?'checked':''; ?> value="2"> <?php echo lang('NO')?>
                    </label>
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:225px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe636;</i><?php echo lang('Any_pet')?></label>
                    <label class="radio-inline">
                        <input type="radio" name="pet" <?php echo $info2['pet']==1?'checked':''; ?> value='1'> <?php echo lang('YES')?>
                    </label>

                    <label class="radio-inline">
                        <input type="radio" name="pet" <?php echo $info2['pet']==2?'checked':''; ?> value='2'> <?php echo lang('NO')?>
                    </label>
                    <input type="text" placeholder="<?php echo lang('pet_type')?>" name="petType" value="<?php echo $info2['petinfo']?$info2['petinfo']:'';?>" style="<?php echo $info2['pet']==1?'':'display: none' ?>">
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:225px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe61e;</i><?php echo lang('Hobbies_and_Interests')?></label>
                    <div style="<?php echo lang('is_en')?'width: 755px;':'width: 831px;' ?>height: auto;float: right">
                        <?php foreach ($Allhobby as $k=>$v):?>
                            <label style="width:150px;margin-left: 0" class="checkbox-inline">
                                <input type="checkbox" name="hobby"
                                    <?php
                                    if(in_array($k,$info2['hobby'])){
                                        echo 'checked';
                                    } elseif($info2['hobby'] == $k){
                                        echo 'checked';
                                    }
                                    ?> value="<?php echo $k ?>"> <?php echo $v ?>
                            </label>

                        <?php endforeach;?>
                    </div>
                </div>

<div style="clear: both"></div>



                    <div class="" style="padding: 60px 0 30px 20px;display: block;text-align: center">
                        <span class="previous" style="background: #5ea557;cursor: pointer"><?php echo lang('Previous') ?></span>
                        <span class="next_btn" style="background: #ccc"><?php echo lang('Next') ?></span>
                    </div>

            </form>
        </div>
    </div>


</div>

<script>

    $(function(){
        var data = getData();
        if(data.income && data.family_num && data.smoking && data.pet && data.hobby){
            $('.next_btn').css({'background':'#5ea557','cursor':'pointer'});
        }
    });

    $('input[name=pet]').click(function(){
        if($(this).val()==1){
            $('input[name=petType]').css('display','inline-block');
        }
        if($(this).val()==2){
            $('input[name=petType]').css('display','none');
        }
    })


    function getData(){
        var data = {};
        data.part2 = 1;
        data.income = $('select[name=income]').val();
        data.family_num = $('input[name=family_num]').val();
        data.smoking = $('input[name=smoking]:checked').val();
        data.pet = $('input[name=pet]:checked').val();
        data.petinfo = $('input[name=petType]').val();
        data.hobby = '';
        $('input[name=hobby]:checked').each(function(){
            data.hobby += $(this).val()+',';
        })
        if(data.hobby){
            data.hobby=data.hobby.substring(0,data.hobby.length-1);
        }
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
        if(!data.income || !data.family_num || !data.smoking || !data.pet || !data.hobby){
            layer.msg('<?php echo lang('data_scarcity') ?>！',{time:1500});
            data.two = false;
            return false;
        }

        data.two = true;
        $.post("/web/becomeHome_save" , data , function(data){
            if(data.status) {
                location.href='/web/becomeHome?p=3';
            }
        },'json');
    })

    $('.previous').click(function(){
        var data = getData();
        $.post("/web/becomeHome_save" , data , function(data){
            if(data.status) {
                location.href='/web/becomeHome?p=1';
            }
        },'json');
    })

    $('form').change(function(){
        var data = getData();
        if(data.income && data.family_num && data.smoking && data.pet && data.hobby){
            $('.next_btn').css({'background':'#5ea557','cursor':'pointer'});
            return false;
        }else{
            $('.next_btn').css({'background':'#ccc','cursor':'text'});
        }
    })











</script>