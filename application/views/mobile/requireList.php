<link rel="stylesheet" href="/public/css/mobile/index.css">
<link rel="stylesheet" href="/public/css/mobile/requireList.css">
<div class="container" style="margin-top:55px">
	<?php if(!empty($data)):?>
	<?php foreach ($data as $k=>$val):?>
    <div class="mouthList">
	    <p class="i-list-title font-16"><?=$k;?></p>
	    <div class="requireList">
	        <ul class="list-unstyled">
	        	<?php foreach ($val as $v):?>
	            <li class="rl" onclick="document.location.href='/mobile/home/requireDetail/<?=$v['id'];?>'">
	                <p><span class="b font-16"><?=$v['id']?></span><span class="li-text-orange week font-12">周<?php echo date('w',strtotime($v['create_time']));?></span></p>&nbsp;&nbsp;住家需求
	                <img class="glyphicon glyphicon-chevron-right" src="/public/images/mobile/user/indicatorRight.png">
	                <?php switch ($v['status']){
  							case 0:$status =  '等待初审';break;
  							case 1:$status =  '初审通过';break;
  					}?>
  					<?php if ($v['status'] == 0):?>
	                <p class="li-text-orange ab" style="right:40px;top:0px">进行中</p>
	                <?php elseif ($v['status'] == 1):?>
	                <p class="li-text-green"  style="right:40px;top:0px">已完成</p>
	                <?php endif;?>
	            </li>
	            <?php endforeach;?>
	        </ul>
	    </div>
    </div>
    <?php endforeach;?>
    <!--  
    <div class="help_footer graybg">
        <img src="/public/images/mobile/help/group5.png">
    </div>
    -->
   <?php endif;?>
    
</div>
<script>
    $(document).ready(function(){
        $('body').css('background-color','#e9e9e9')
        $('.help_footer img').click(function(){
            location.href="/mobile/common/index"
        });

    })
</script>