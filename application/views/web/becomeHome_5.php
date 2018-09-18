<link rel="stylesheet" href="/public/css/web/becomehome.css" />
<div class="body_box">
    <div class="progress" style="margin: 0 auto;height: 8px;position: relative;bottom: 8px;">
        <div class="progress-bar"  role="progressbar" aria-valuenow="60"
             aria-valuemin="0" aria-valuemax="100" style="width: 83%;background: #5ea557">
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
            <span style="color: #fff;background: #5ea557;">3</span>
            <p style="color: #5ea557"><?php echo lang('House_Information') ?></p>
        </div>
        <div class="col-xs-2 ">
            <span style="color: #fff;background: #5ea557;">4</span>
            <p style="color: #5ea557"><?php echo lang('Upload_Photo') ?></p>
        </div>
        <div class="col-xs-2 ">
            <span style="color: #fff;background: #5ea557;">5</span>
            <p style="color: #5ea557"><?php echo lang('Rules_and_Settings') ?></p>
        </div>
        <div class="col-xs-2 ">
            <span>6</span>
            <p><?php echo lang('Preview') ?></p>
        </div>
    </div>

    <div class="main_box">
        <div class="title_box"><span class="tit"><?php echo lang('Rules_and_Settings') ?></span><i class="icon iconfont save_btn"><span>&#xe684;</span></i></div>
        <div class="info_box">
            <form class="form-inline" method="post">
                <div class="form-group" style="padding: 30px 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:185px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe6e5;</i><?php echo lang('Monthly_Fee') ?></label>
                    <input type="number" name="Monthly_Fee" value="<?php echo $info5['month_price']?$info5['month_price']:''; ?>">
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:185px':'' ?>" ><i class="icon iconfont">&#xe7ff;</i><?php echo lang('Payment_period') ?></label>
                    <label class="radio-inline" style="<?php echo lang('is_en')?'width: 90px':'width: 50px' ?>">
                        <input type="radio" name="Payment_period" <?php echo $info5['payment']==1?'checked':'' ?> value="1"> <?php echo lang('per_month')?>
                    </label>
                    <label class="radio-inline" style="<?php echo lang('is_en')?'width: 110px':'width: 70px' ?>">
                        <input type="radio" name="Payment_period" <?php echo $info5['payment']==2?'checked':'' ?> value="2"> <?php echo lang('per_semester')?>
                    </label>
                </div>

                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:185px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe7ff;</i><?php echo lang('Deposit_required') ?></label>
                    <label class="radio-inline" style="width: 50px">
                        <input type="radio" name="Deposit_required" <?php echo $info5['deposit']==1?'checked':'' ?> value="1"> <?php echo lang('YES')?>
                    </label>
                    <label class="radio-inline" style="width: 70px">
                        <input type="radio" name="Deposit_required" <?php echo $info5['deposit']==2?'checked':'' ?> value="2"> <?php echo lang('NO')?>
                    </label>
                    <input type="text" placeholder="<?php echo lang('Deposit_type')?>" name="Deposit_type" value="<?php echo $info5['deposit_info']?$info5['deposit_info']:'';?>" style="<?php echo $info5['deposit']==1?'':'display: none' ?>;<?php echo lang('is_en')?'width: 520px':'width: 560px' ?>">
                </div>



                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:185px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe61e;</i><?php echo lang('price_Including')?></label>
                    <div style="<?php echo lang('is_en')?'width: 791px;':'width: 831px;' ?>height: auto;float: right;">
                        <label style="width:80px;margin-left: 0;<?php echo lang('is_en')?'margin-right: 20px':'' ?>" class="checkbox-inline">
                            <input type="checkbox" name="Including" <?php echo in_array(1,$info5['price_include'])?'checked':'' ?> value="1"> <?php echo lang('Breakfast')?>
                        </label>
                        <label style="width:80px;margin-left: 0" class="checkbox-inline">
                            <input type="checkbox" name="Including" <?php echo in_array(2,$info5['price_include'])?'checked':'' ?> value="2"> <?php echo lang('Lunch')?>
                        </label>
                        <label style="width:80px;margin-left: 0" class="checkbox-inline">
                            <input type="checkbox" name="Including" <?php echo in_array(3,$info5['price_include'])?'checked':'' ?> value="3"> <?php echo lang('Dinner')?>
                        </label>
                        <br />
                        <label style="<?php echo lang('is_en')?'width:300px':'width:150px' ?>;margin-left: 0;padding-top: 10px" class="checkbox-inline">
                            <input type="checkbox" name="Including" <?php echo in_array(4,$info5['price_include'])?'checked':'' ?> value="4"> <?php echo lang('airport')?>
                        </label>
                        <br />
                        <label style="<?php echo lang('is_en')?'width:220px':'width:150px' ?>;margin-left: 0;padding-top: 10px" class="checkbox-inline">
                            <input type="checkbox" name="Including" <?php echo in_array(5,$info5['price_include'])?'checked':'' ?> value="5"> <?php echo lang('School_transfer')?>
                        </label>
                        <br />
                        <label style="width:100px;margin-left: 0;padding-top: 10px" class="checkbox-inline">
                            <input type="checkbox"  name="Including" <?php echo in_array(6,$info5['price_include'])?'checked':'' ?> value="6" id="Including_other"> <?php echo lang('Other')?>
                        </label>
                        <input type="text" placeholder="<?php echo lang('Deposit_type')?>" name="IncludingType" value="<?php echo $info5['include_other']?$info5['include_other']:'';?>" style="<?php echo lang('is_en')?'width:660px':'width:700px' ?>;position: relative;top: 5px;<?php echo in_array(6,$info5['price_include'])?'':'display: none'?>">
                    </div>
                </div>

                <div style="clear: both"></div>



                <div class="form-group" style="padding: 40px 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:185px':'' ?>" ><i class="icon iconfont">&#xe64e;</i><?php echo lang('House_Description')?></label>
                    <textarea class="form-control" name="describe" rows="5" style="width: 700px;vertical-align:top"><?php echo $info5['describe']?$info5['describe']:"" ?></textarea>
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:185px':'' ?>" ><i class="icon iconfont">&#xe64e;</i><?php echo lang('Rules_Setting')?></label>
                    <textarea class="form-control" name="rule" rows="5" style="width: 700px;vertical-align:top"><?php echo $info5['rule']?$info5['rule']:"" ?></textarea>
                </div>





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
        if(data.describe && data.rule && data.month_price && data.payment && data.deposit){
            $('.next_btn').css({'background':'#5ea557','cursor':'pointer'});
        }


        $('#Including_other').click(function(){
            if(!$('input[name=Including]:checked').val()){
                $('input[name=IncludingType]').css('display','none');
            }

            $('input[name=Including]:checked').each(function(){
                if($(this).val()==6){
                    $('input[name=IncludingType]').css('display','block');
                    return false;
                }else{
                    $('input[name=IncludingType]').css('display','none');
                }
            });

        });
    });

    $('input[name=Deposit_required]').click(function(){
        if($(this).val()==1){
            $('input[name=Deposit_type]').css('display','inline-block');
        }
        if($(this).val()==2){
            $('input[name=Deposit_type]').css('display','none');
        }
    });




    $('form').change(function(){
        var data = getData();
        if(data.describe && data.rule && data.month_price && data.payment && data.deposit){
            $('.next_btn').css({'background':'#5ea557','cursor':'pointer'});
            return false;
        }else{
            $('.next_btn').css({'background':'#ccc','cursor':'text'});
        }
    });


    function getData(){
        var data = {};
        data.part5 = 1;
        data.month_price = $('input[name=Monthly_Fee]').val();
        data.payment = $('input[name=Payment_period]:checked').val();
        data.deposit = $('input[name=Deposit_required]:checked').val();
        data.deposit_info = $('input[name=Deposit_type]').val();
        data.price_include = '';
        $('input[name=Including]:checked').each(function(){
            data.price_include += $(this).val()+',';
        });
        if(data.price_include){
            data.price_include=data.price_include.substring(0,data.price_include.length-1);
        }
        data.include_other = $('input[name=IncludingType]').val();
        data.describe = $('textarea[name=describe]').val();
        data.rule = $('textarea[name=rule]').val();
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
    });

    $('.next_btn').click(function(){
        var data = getData();
        if(!data.describe || !data.rule || !data.month_price || !data.payment || !data.deposit){
            layer.msg('<?php echo lang('data_scarcity') ?>！',{time:1500});
            data.five = false;
            return false;
        }
        data.five = true;
        $.post("/web/becomeHome_save" , data , function(data){
            if(data.status) {
                location.href='/web/becomeHome?p=6';
            }
        },'json');
    });

    $('.previous').click(function(){
        var data = getData();
        $.post("/web/becomeHome_save" , data , function(data){
            if(data.status) {
                location.href='/web/becomeHome?p=4';
            }
        },'json');
    })

</script>