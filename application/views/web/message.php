<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>message</title>
    <link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap.min.css" media="all">
    <script type="text/javascript" src="/public/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="/public/bootstrap/js/bootstrap.min.js"></script>
    <script src="/public/layer/layer.js"></script>
</head>
<body>

<form style="margin: 20px 50px" action="">
    <h3 style="text-align: center;margin-bottom: 30px">参加课程为：<?php echo $info['service_name'] ?></h3>
    <div class="form-group">
        <label for="exampleInputEmail1"><i style="color: red">*&nbsp;</i>姓名 <span class="name_error" style="color: red"></span></label>
        <input type="text" class="form-control" placeholder="" name="name">
        <input type="hidden" value="<?php echo $info['id'] ?>" name="service_id">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1"><i style="color: red">*&nbsp;</i>手机 <span class="tel_error" style="color: red"></span></label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="tel" placeholder="">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">留言</label>
        <textarea class="form-control" name="message" rows="3" placeholder=""></textarea>
    </div>
    <button type="button" class="btn btn-success">提交</button>
</form>
<script>
    $('.btn-success').click(function(){
        var service_id = $('input[name=service_id]').val();
        var name = $('input[name=name]').val();
        var tel = $('input[name=tel]').val();
        var message = $('textarea[name=message]').val();
        if(!name || !tel){
            if(!name){
                $('.name_error').html('请填写姓名');
            }
            if(!tel){
                $('.tel_error').html('请填写手机');
            }
            return false;
        }
        var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
        if(!myreg.test(tel))
        {
            $('.tel_error').html('手机号码有误');
            return false;
        }



        $.ajax({
            url:'/web/getMessage',
            data:{service_id:service_id,name:name,tel:tel,message:message},
            dataType:'json',
            type:'POST',
            success:function(data){
                if(data=='success'){
                    layer.msg('提交成功',{icon: 6,time: 1000},function(){
                        var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                        parent.layer.close(index); //再执行关闭
                    });
                }
            }
        })
    })

    $('input[name=name]').change(function(){
        if($(this).val()){
            $('.name_error').html('');
        }
    })
    $('input[name=tel]').change(function(){
        if($(this).val()){
            $('.tel_error').html('');
        }
    })

</script>
</body>
</html>