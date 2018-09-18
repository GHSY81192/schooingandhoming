<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
        <div class="col-md-12">
            <h2 class="col-xs-offset-1 col-xs-12">Banner图</h2>
            <form style="margin-left: 9.5%" class="form-horizontal" name="form" role="form" id="form" enctype="multipart/form-data" method="post" action="/admin/common/camp_pic_submit/<?=$id?>">
                <?php foreach($pictures as $k => $item): ?>
                    <span style="font-size: 16px"><?=$k+1?>.</span>
                    <img width="200" src="/public/images/web/camp/<?=$item?>" id="perview_image<?php echo $k ?>" alt="">

                    <button type="button" style="height: 113px" onclick="_deleteImg(<?php echo $k?>,<?php echo $id?>)" class="btn-danger">删除</button>
                    <input type="radio" name="ac" value="<?=$k?>" <?= $k==0?'checked':''?>>设为主图
                    <hr/>
                <?php endforeach; ?>
                <div class="add-box">
                    <img width="200" src="" id="perview_image" alt="">
                    <input type="file" name="pic<?php echo $id.'-add' ?>" onchange="showPerview(this,'perview_image')">
                </div>
                <div class="form-group">
                    <div class="col-xs-offset-4 col-xs-10">
                        <input class="btn btn-success" type="submit" value="添加">
                    </div>
                </div>
            </form>
        </div>



    </div>
</div>
<script type="text/javascript">
    function showPerview(obj,perviewId) {
        var file = obj.files[0];
        if (!/image\/\w+/.test(file.type)) {
            alert("请确保文件为图像类型");
            return false;
        }
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e) {
            $("#" + perviewId).attr("src",this.result);
        }
    }

    function _deleteImg(picNo,id){
        if(confirm("确认删除?")) {
            $.getJSON('/admin/common/camp_img_delete',{id:id,picNo:picNo},function(resp){
                if(resp.status == 1) {
                    window.location.reload();
                }
            });
        }
    }


</script>