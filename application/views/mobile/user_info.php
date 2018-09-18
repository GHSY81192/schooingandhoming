<link rel="stylesheet" href="/public/css/mobile/index.css">
<link rel="stylesheet" href="/public/css/mobile/help.css">
<link rel="stylesheet" href="/public/css/mobile/user-style.css">
<link rel="stylesheet" href="/public/css/mobile/tinyscroll.css">
<div id="page-content-wrapper container" >
    <form method="post" id="myform" class="clearfix"   style="background-color:#fff ">
	    <div class="clearfix border-bottom eidtOrSave">
	        <div class="container-fluid btn-groups font-16">
	            <p class="btnRight edit font-16 color3" style="display: inline-block;float: right;color:#ffffff;" onclick="document.location.href='/mobile/home/editUserInfo'">编辑</p>
	        </div>
	    </div>
	    <?php 
			if(strstr($userData['head_image'],'http')){
				$face = $userData['head_image'];
			}else{
				$face = '/upload/'.get_filepath_by_route_id(@$userData['id'],@$userData['head_image'],5);
			}
		?>
        <section class="logo-license clearfix">
            <div class="half">
                <a class="logo" id="logox">
                    <img id="bgl" src="<?=$face;?>"/>
                </a>
                <p id="file_head"></p>
                <p class="font-18"><?=$userData['name_cn'];?></p>
            </div>
        </section>
       
        <article class="info clearfix">
            <ul>
                <li class="clearfix sex">
                    <div class="left"><?php echo lang('home_info_title1')?>:</div>
                    <?php 
                    $gender = '';
                    if(@$userData['gender'] ==1) {
                        $gender = '男';
                    } else if (@$userData['gender'] ==2) {
                        $gender = '女';
                    } else {
                        if(!empty($personal)) {
                            if($personal['sex'] == 1) {
                                $gender = '男';
                            } else if($personal['sex'] == 2) {
                                $gender = '女';
                            } else {
                                $gender = '';
                            }
                        } else {
                            $gender = '';
                        }
                    }
                    ?>
                    <div class="right"><input value="<?php echo $gender;?>" ></div>
                </li>
                <li class="clearfix email">
                    <div class="left"><?php echo lang('home_info_title2')?>:</div>
                    <?php
                    $email = '';
                    if(!empty($userData['contact_email'])) {
                        $email = $userData['contact_email'];
                    } else {
                        if(!empty($personal)) {
                            $email = $personal['email'];
                        } else {
                            $email = '';
                        }
                    }
                    ?>
                    <div class="right"> <input style="width:100%" value="<?php echo $email?>" /> </div>
                </li>
                <li class="clearfix phone">
                    <div class="left"><?php echo lang('home_info_title3')?>:</div>
                    <div class="right"> <input value="<?=@$userData['contact_phone']?>" /></div>
                </li>
                <li class="clearfix language">
                    <div class="left"><?php echo lang('home_info_title4')?>:</div>
                    <div class="right"> <input value="<?=@$language[@$userData['language']]?>" /> </div>
                </li>
                <li class="clearfix birthday">
                    <div class="left"><?php echo lang('home_info_title5')?>: </div>
                    <div class="right"> <input  type="text"  value="<?=@$userData['birthday']?>" /></div>
                </li>
                <li class="clearfix rigistday">
                    <div class="left"><?php echo lang('home_info_title6')?>:</div>
                    <div class="right"><input  value="<?=@$userData['vip_time']?>" /></div>
                </li>
            </ul>
            </article>
        </div>
    </form>
    <!--  
    <div class="help_footer">
        <img src="/public/images/mobile/help/group5.png">
    </div>
    -->
