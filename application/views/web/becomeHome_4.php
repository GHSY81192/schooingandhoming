<link rel="stylesheet" href="/public/css/web/becomehome.css" />

<div class="body_box">
    <div class="progress" style="margin: 0 auto;height: 8px;position: relative;bottom: 8px;">
        <div class="progress-bar"  role="progressbar" aria-valuenow="60"
             aria-valuemin="0" aria-valuemax="100" style="width: 66%;background: #5ea557">
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
            <span>5</span>
            <p><?php echo lang('Rules_and_Settings') ?></p>
        </div>
        <div class="col-xs-2 ">
            <span>6</span>
            <p><?php echo lang('Preview') ?></p>
        </div>
    </div>
    <h1><?php echo $info?$info:'' ?></h1>
    <div class="main_box">
        <div class="title_box"><?php echo lang('Upload_Photo') ?></div>
        <div class="info_box">
            <form class="form-inline" name="form" role="form" id="form" enctype="multipart/form-data" method="post" action="/web/homeFileUpload">
                <div class="form-group" style="padding: 30px 0 30px 20px;display: block">

                    <div class="form-group" style="padding:20px 18px 0;">
                        <div class="" style="position: relative">
                            <img src="<?php echo $info4[0]['pic_name']?'/upload/userhome/'.$info4[0]['user_id'].'/'.$info4[0]['pic_name'].'?'.time():'/upload/default/school/default.jpg' ?>" style="width:200px;height: 110px;" id="pic_1" class="img-thumbnail" />
                            <div class="" style="margin-top: 4px">
                                <input type="hidden" name='cover_no' value=""/>

                                <input type="file" style="cursor: pointer;border: 0;margin: 0 auto;width: 78px" name="cover1" onchange="showPerview(this,'pic_1');">


                            </div>
                        </div>
                    </div>


                    <div class="form-group" style="padding:20px 18px 0;">
                        <div class="" style="position: relative">
                            <img src="<?php echo $info4[1]['pic_name']?'/upload/userhome/'.$info4[1]['user_id'].'/'.$info4[1]['pic_name'].'?'.time():'/upload/default/school/default.jpg' ?>" style="width:200px;height: 110px;" id="pic_2" class="img-thumbnail" />
                            <div class="" style="margin-top: 4px">
                                <input type="hidden" name='cover_no' value=""/>
                                <input type="file" style="cursor: pointer;border: 0;margin: 0 auto;width: 78px" name="cover2" onchange="showPerview(this,'pic_2');">
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="padding:20px 18px 0;">
                        <div class="" style="position: relative">
                            <img src="<?php echo $info4[2]['pic_name']?'/upload/userhome/'.$info4[2]['user_id'].'/'.$info4[2]['pic_name'].'?'.time():'/upload/default/school/default.jpg' ?>" style="width:200px;height: 110px;" id="pic_3" class="img-thumbnail" />
                            <div class="" style="margin-top: 4px">
                                <input type="hidden" name='cover_no' value=""/>
                                <input type="file" style="cursor: pointer;border: 0;margin: 0 auto;width: 78px" name="cover3" onchange="showPerview(this,'pic_3');">
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="padding:20px 18px 0;">
                        <div class="" style="position: relative">
                            <img src="<?php echo $info4[3]['pic_name']?'/upload/userhome/'.$info4[3]['user_id'].'/'.$info4[3]['pic_name'].'?'.time():'/upload/default/school/default.jpg' ?>" style="width:200px;height: 110px;" id="pic_4" class="img-thumbnail" />
                            <div class="" style="margin-top: 4px">
                                <input type="hidden" name='cover_no' value=""/>
                                <input type="file" style="cursor: pointer;border: 0;margin: 0 auto;width: 78px" name="cover4" onchange="showPerview(this,'pic_4');">
                            </div>
                        </div>
                    </div>



                </div>
                <div style="text-align: center"><?php echo lang('is_en')?'The best image size':'最佳图片尺寸' ?>：818*500px</div>
                <div class="" style="padding: 20px 0 30px 20px;display: block;text-align: center">
                    <input class="btn btn-success" type="button" value="<?php echo lang('Upload')?>" id="submitForm" style="height: 50px;border-radius: 35px;font-size: 20px;padding: 0;">
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
        var img1 = $('#pic_1').attr('src');
        var img2 = $('#pic_2').attr('src');
        var img3 = $('#pic_3').attr('src');
        var img4 = $('#pic_4').attr('src');

        var default_img = '/upload/default/school/default.jpg';

        if(img1 != default_img && img2 != default_img && img3 != default_img && img4 != default_img){
            $('.next_btn').css({'background':'#5ea557','cursor':'pointer'});
        }
    });

    $('form').change(function(){
        var img1 = $('#pic_1').attr('src');
        var img2 = $('#pic_2').attr('src');
        var img3 = $('#pic_3').attr('src');
        var img4 = $('#pic_4').attr('src');

        var default_img = '/upload/default/school/default.jpg';

        if(img1 != default_img && img2 != default_img && img3 != default_img && img4 != default_img){
            $('.next_btn').css({'background':'#5ea557','cursor':'pointer'});
        }

    })

    function showPerview(obj,perviewId) {
        var file = obj.files[0];
        if (!/image\/\w+/.test(file.type)) {
            alert("<?php echo lang('is_en')?'Image Type error':'请确保文件为图像类型' ?>");
            return false;
        }
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e) {
            $("#" + perviewId).attr("src",this.result);
        }
    }


    $("#submitForm").click(function(){
        var $form = $("#form");
        $form.submit();
    })

    $('.next_btn').click(function(){
        var img1 = $('#pic_1').attr('src');
        var img2 = $('#pic_2').attr('src');
        var img3 = $('#pic_3').attr('src');
        var img4 = $('#pic_4').attr('src');
        var data = {};
        var default_img = '/upload/default/school/default.jpg';
        if(img1 == default_img || img2 == default_img || img3 == default_img || img4 == default_img){
            layer.msg('<?php echo lang('is_en')?'Need 4 images':'需要上传4张图片' ?>！',{time:1500});
            data.four = false;
            return false;
        }

        data.part4 = 1;
        data.four = true;
        $.post("/web/becomeHome_save" , data , function(data){
            if(data.status) {
                location.href='/web/becomeHome?p=5';
            }
        },'json');

    });

    $('.previous').click(function(){

        location.href='/web/becomeHome?p=3';

})

</script>