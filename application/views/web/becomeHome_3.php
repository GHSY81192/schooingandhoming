<link rel="stylesheet" href="/public/css/web/becomehome.css" />
<link href="/public/css/web/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<div class="body_box">
    <div class="progress" style="margin: 0 auto;height: 8px;position: relative;bottom: 8px;">
        <div class="progress-bar"  role="progressbar" aria-valuenow="60"
             aria-valuemin="0" aria-valuemax="100" style="width: 50%;background: #5ea557">
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
        <div class="title_box"><span class="tit"><?php echo lang('House_Information') ?></span><i class="icon iconfont save_btn"><span>&#xe684;</span></i></div>
        <div class="info_box">
            <form class="form-inline" method="post">
                <div class="form-group" style="padding: 30px 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:185px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe6e5;</i><?php echo lang('House_Size') ?></label>
                    <input type="text" name="area" value="<?php echo $info3['area']?$info3['area']:''; ?>">
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:185px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe65c;</i><?php echo lang('Establishment_Time') ?></label>
                    <div class="input-group date form_date class_open_time_input" data-date="" data-date-format="yyyy-mm" data-link-field="dtp_input2" data-link-format="yyyy-mm">
                        <input class="" size="16" type="text" name="Mybuildtime" value="<?php echo $info3['buildtime']?$info3['buildtime']:'' ?>" style="border: 1;margin-right: 0;position: relative"  readonly>
                        <span class="input-group-addon" style="background: none;border: 0;position: absolute;text-align: right;width: 177px;top: 0;right: 0;"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <input type="hidden" id="dtp_input2" name="buildtime" value="<?php echo $info3['buildtime']?$info3['buildtime']:'' ?>" /><br/>
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:185px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe51c;</i><?php echo lang('House_Type') ?></label>
                    <select name="house_type">
                        <option style="display:none"></option>
                        <option <?php echo $info3['house_type']==1?'selected':'' ?> value="1"><?php echo lang('House_type_Villa') ?></option>
                        <option <?php echo $info3['house_type']==2?'selected':'' ?>  value="2"><?php echo lang('House_type_Town_Hose') ?></option>
                        <option <?php echo $info3['house_type']==3?'selected':'' ?>  value="3"><?php echo lang('House_type_Apartment') ?></option>
                    </select>
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:185px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe60a;</i><?php echo lang('Ownership') ?></label>
                    <select name="ownership">
                        <option style="display:none"></option>
                        <option <?php echo $info3['ownership']==1?'selected':'' ?>  value="1"><?php echo lang('Self_Owned') ?></option>
                        <option <?php echo $info3['ownership']==2?'selected':'' ?>  value="2"><?php echo lang('Rent') ?></option>
                    </select>
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:185px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe676;</i><?php echo lang('Number_of_Bedrooms') ?></label>
                    <select name="bedroom_num">
                        <option style="display:none"></option>
                        <option <?php echo $info3['bedroom_num']==1?'selected':'' ?>  value="1">1</option>
                        <option <?php echo $info3['bedroom_num']==2?'selected':'' ?> value="2">2</option>
                        <option <?php echo $info3['bedroom_num']==3?'selected':'' ?> value="3">3</option>
                        <option <?php echo $info3['bedroom_num']==4?'selected':'' ?> value="4">4</option>
                        <option <?php echo $info3['bedroom_num']==5?'selected':'' ?> value="5">5</option>
                    </select>
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:185px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe665;</i><?php echo lang('Number_of_Bathrooms') ?></label>
                    <select name="toilet_num">
                        <option style="display:none"></option>
                        <option <?php echo $info3['toilet_num']==1?'selected':'' ?>  value="1">1</option>
                        <option <?php echo $info3['toilet_num']==2?'selected':'' ?>  value="2">2</option>
                        <option <?php echo $info3['toilet_num']==3?'selected':'' ?>  value="3">3</option>
                        <option <?php echo $info3['toilet_num']==4?'selected':'' ?>  value="4">4</option>
                        <option <?php echo $info3['toilet_num']==5?'selected':'' ?>  value="5">5</option>
                    </select>
                </div>

                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:185px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe7ff;</i><?php echo lang('WIFI_Available') ?></label>
                    <label class="radio-inline">
                        <input type="radio" name="wifi" <?php echo $info3['wifi']==1?'checked':'' ?> value="1"> <?php echo lang('YES')?>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="wifi" <?php echo $info3['wifi']==2?'checked':'' ?> value="2"> <?php echo lang('NO')?>
                    </label>
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:185px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe60b;</i><?php echo lang('Street_Name')?></label>
                    <input type="text" name="address" style="width: 358px" value="<?php echo $info3['address']?$info3['address']:'' ?>">
                </div>

                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:185px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe601;</i><?php echo lang('city')?></label>
                    <select class="city" name="city">
                        <option style="display:none"></option>
                        <?php foreach ($city as $v):?>
                            <option <?php echo $info3['city_id']==$v['id']?'selected':'' ?> value="<?php echo $v['id']?>"><?php echo lang('is_en')?$v['name_en']:$v['name_cn'] ?></option>
                        <?php endforeach;?>
                        <option><?php echo lang('Other') ?></option>
                    </select>
                    <select class="state" name="state">
                        <option style="display:none"><?php echo lang('state')?></option>
                        <?php foreach ($state as $v):?>
                            <option <?php echo $info3['state_id']==$v['id']?'selected':'' ?> value="<?php echo $v['id']?>"><?php echo lang('is_en')?$v['name_en']:$v['name_cn'] ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                    <label style="<?php echo lang('is_en')?'width:185px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe686;</i><?php echo lang('Post_Code')?></label>
                    <input type="text" name="zipcode" value="<?php echo $info3['zipcode']?$info3['zipcode']:'' ?>">
                </div>

                <div class="" style="padding: 60px 0 30px 20px;display: block;text-align: center">
                    <span class="previous" style="background: #5ea557;cursor: pointer"><?php echo lang('Previous') ?></span>
                    <span class="next_btn" style="background: #ccc"><?php echo lang('Next') ?></span>
                </div>
            </form>
        </div>
    </div>


</div>

<script type="text/javascript" src="/public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/public/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $(function(){
        var data = getData();
        if(data.area && data.bedroom_num && data.zipcode && data.buildtime && data.house_type && data.ownership && data.toilet_num && data.wifi && data.address && data.city_id && data.state_id){
            $('.next_btn').css({'background':'#5ea557','cursor':'pointer'});
        }
    });

    $('form').change(function(){
        var data = getData();
        if(data.area && data.bedroom_num && data.zipcode && data.buildtime && data.house_type && data.ownership && data.toilet_num && data.wifi && data.address && data.city_id && data.state_id){
            $('.next_btn').css({'background':'#5ea557','cursor':'pointer'});
            return false;
        }else{
            $('.next_btn').css({'background':'#ccc','cursor':'text'});
        }
    });


    $('.city').change(function(){
        var data = $(this).val();
        if(data==999){
            return false;
        }
        $.post("/web/changeAddress" , {city_id:data} , function(data){
            $('select[name=state] option[value='+data.msg.state_id+']').remove();
            $('select[name=state]').append('<option selected value="'+data.msg.state_id + '">' + <?php echo lang('is_en')?'data.msg.name_en':'data.msg.name_cn' ?>+'</option>');
        },'json')
    });


    $('.state').change(function(){
        var data = $(this).val();
        $.post("/web/changeAddress" , {id:data} , function(data){
            $('select[name=city] option').remove();
            for (var i=0;i<data.msg.length;i++){
                $('select[name=city]').append('<option value="'+data.msg[i]["id"] + '">' + <?php echo lang('is_en')?'data.msg[i]["name_en"]':'data.msg[i]["name_cn"]' ?>+'</option>')
            }
            $('select[name=city]').append('<option value=999><?php echo lang("Other")?></option>')
        },'json')
    });

    $('.form_date').datetimepicker({
        format:'yyyy-mm',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 4,
        minView: 3,
        forceParse: 0
    });


    function getData(){
        var data = {};
        data.part3 = 1;
        data.area = $('input[name=area]').val();
        data.bedroom_num = $('select[name=bedroom_num]').val();
        data.zipcode = $('input[name=zipcode]').val();
        data.buildtime = $('input[name=buildtime]').val();
        data.house_type = $('select[name=house_type]').val();
        data.ownership = $('select[name=ownership]').val();
        data.toilet_num = $('select[name=toilet_num]').val();
        data.wifi = $('input[name=wifi]:checked').val();
        data.address = $('input[name=address]').val();
        data.city_id = $('select[name=city]').val();
        data.state_id = $('select[name=state]').val();
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
        if(!data.area || !data.bedroom_num || !data.zipcode || !data.buildtime || !data.house_type || !data.ownership || !data.toilet_num || !data.wifi || !data.address || !data.city_id || !data.state_id){
            layer.msg('数据不完整！',{time:1500});
            data.three = false;
            return false;
        }

        data.three = true;
        $.post("/web/becomeHome_save" , data , function(data){
            if(data.status) {
                location.href='/web/becomeHome?p=4';
            }
        },'json');
    });
    
    $('.previous').click(function(){
        var data = getData();
        $.post("/web/becomeHome_save" , data , function(data){
            if(data.status) {
                location.href='/web/becomeHome?p=2';
            }
        },'json');
    })
</script>