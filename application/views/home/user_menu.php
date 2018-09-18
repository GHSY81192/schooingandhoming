<style>
    .z-active{<?=lang('is_en')?'font-size:13px':''?>}
</style>
<ul class="menu-ul" style="<?=lang('is_en')?'text-align: left':''?>">
    <li class="<?=$active==1?'z-active':''?>" onclick='document.location.href="/home"'><i class="icon iconfont icon-geren"></i><?=lang('Personal_Information')?></li>
    <li id="order_user" class="<?=$active==2?'z-active':''?>" onclick='document.location.href="/home/my_lessons/8"'><i class="icon iconfont icon-bijiben1"></i><?=lang('My_Program')?></li>
    <li class="<?=$active==3?'z-active':''?>" onclick='document.location.href="/home/MyRequireList"'><i class="icon iconfont icon-bijiben"></i><?=lang('Customization')?></li>
    <li id="host_user" class="<?=$active==7?'z-active':''?>" onclick='document.location.href="/home/House_List/2"'><i class="icon iconfont icon-fangwu"></i></i><?=lang('My_Host')?></li>
    <li class="<?=$active==4?'z-active':''?>" onclick='document.location.href="/home/MyMessage"'><i class="icon iconfont icon-xiaoxi2"></i><?=lang('My_Message')?></li>
    <li class="<?=$active==6?'z-active':''?>" onclick='document.location.href="/home/UserAdvice"'><i class="icon iconfont icon-yijian"></i><?=lang('Feedback')?></li>
</ul>
<script>
    var identity = <?=$identity?>;
    if(identity != 2){
        $('#host_user').remove();
    }else{
        $('#order_user').remove();
    }
</script>