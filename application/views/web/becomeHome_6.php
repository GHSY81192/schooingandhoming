<link rel="stylesheet" href="/public/css/web/becomehome.css" />
<link href="/public/css/web/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<script type="text/javascript"  src="/public/js/ajaxfileupload.js"></script>
<div class="body_box">
    <div class="progress" style="margin: 0 auto;height: 8px;position: relative;bottom: 8px;">
        <div class="progress-bar"  role="progressbar" aria-valuenow="60"
             aria-valuemin="0" aria-valuemax="100" style="width: 100%;background: #5ea557">
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
            <span style="color: #fff;background: #5ea557;">6</span>
            <p style="color: #5ea557"><?php echo lang('Preview') ?></p>
        </div>
    </div>

    <div class="main_box">
        <div class="title_box"><?php echo lang('Preview') ?></div>
        <div class="info_box">
            <div style="height: 20px"></div>
            <div class="basicInfo">
                <div class="title_txt"><span><?php echo lang('Basic_Information') ?></span> <i class="icon iconfont edit">&#xe689;</i></div>
                <div class="basic_con">
                    <table class="view_tb">
                        <tr class="row">
                            <td class="col-md-3"><?php echo lang('Host') ?></td>
                            <td class="col-md-3"><?php echo lang('home_detail_member_gender_message') ?></td>
                            <td class="col-md-3"><?php echo lang('Date_of_Birth') ?></td>
                            <td class="col-md-3"><?php echo lang('Language_Spoken') ?></td>
                        </tr>
                        <tr class="row nr">
                            <td class="col-md-3"><?php echo ($info6['secondname']?$info6['secondname']:'').'&nbsp;&nbsp;'.($info6['firstname']?$info6['firstname']:'') ?></td>
                            <td class="col-md-3">
                                <?php
                                switch ($info6['gender']){
                                    case 1:
                                        echo lang('personal_tailor_form_gender_man_message');
                                        break;
                                    case 2:
                                        echo lang('personal_tailor_form_gender_woman_message');
                                        break;
                                }
                                ?>
                            </td>
                            <td class="col-md-3"><?php echo $info6['brith']?$info6['brith']:'' ?></td>
                            <td class="col-md-3">
                                <?php
                                switch ($info6['language']){
                                    case 1:
                                        echo lang('search_house_language1');
                                        break;
                                    case 2:
                                        echo lang('search_house_language2');
                                        break;
                                    case 3:
                                        echo lang('Spanish');
                                        break;
                                    case 4:
                                        echo lang('French');
                                        break;
                                    case 5:
                                        echo lang('German');
                                        break;
                                    case 6:
                                        echo lang('Other');
                                        break;
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                    <table class="view_tb" style="margin-top: 30px">
                        <tr class="row">
                            <td class="col-md-3"><?php echo lang('Education_Level')?></td>
                            <td class="col-md-3"><?php echo lang('home_detail_member_religion_message')?></td>
                            <td class="col-md-3"><?php echo lang('home_detail_member_profession_message')?></td>
                            <td class="col-md-3"><?php echo lang('home_detail_member_race_message')?></td>
                        </tr>
                        <tr class="row nr">
                            <td class="col-md-3">
                                <?php
                                switch ($info6['education']){
                                    case 1:
                                        echo lang('Primary_School');
                                        break;
                                    case 2:
                                        echo lang('Middle_School');
                                        break;
                                    case 3:
                                        echo lang('High_School');
                                        break;
                                    case 4:
                                        echo lang('University');
                                        break;
                                    case 5:
                                        echo lang('Master');
                                        break;
                                    case 6:
                                        echo lang('PH_D');
                                        break;
                                    case '0':
                                        echo lang('Other');
                                        break;
                                }
                                ?>
                            </td>
                            <td class="col-md-3">
                                <?php
                                switch ($info6['belief']){
                                    case 1:
                                        echo lang('Christianity');
                                        break;
                                    case 2:
                                        echo lang('Catholicism');
                                        break;
                                    case 3:
                                        echo lang('Lutheran');
                                        break;
                                    case 4:
                                        echo lang('Methodists');
                                        break;
                                    case 5:
                                        echo lang('Quakers');
                                        break;
                                    case 6:
                                        echo lang('Baptist');
                                        break;
                                    case 7:
                                        echo lang('Judaism');
                                        break;
                                    case 8:
                                        echo lang('Fraternity');
                                        break;
                                    case 9:
                                        echo lang('Islam');
                                        break;
                                    case 10:
                                        echo lang('Buddhism');
                                        break;
                                    case 11:
                                        echo lang('Hinduism');
                                        break;
                                    case 12:
                                        echo lang('Other_religion');
                                        break;
                                    case '0':
                                        echo lang('Other');
                                        break;
                                }
                                ?>
                            </td>
                            <td class="col-md-3"><?php echo $info6['job']?$info6['job']:'' ?></td>
                            <td class="col-md-3">
                                <?php
                                switch ($info6['race']){
                                    case 1:
                                        echo lang('search_house_race1');
                                        break;
                                    case 2:
                                        echo lang('search_house_race2');
                                        break;
                                    case 3:
                                        echo lang('search_house_race3');
                                        break;
                                    case 4:
                                        echo lang('search_house_race5');
                                        break;
                                    case 5:
                                        echo lang('Other');
                                        break;
                                    case '0':
                                        echo lang('Reject_answering');
                                        break;
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="basic_edit" style="display: none">
                    <form class="form-inline" method="post">
                        <div class="form-group" style="padding: 30px 0 30px 20px;display: block">
                            <label for="exampleInputName2"><i class="icon iconfont">&#xe620;</i><?php echo lang('Host')?></label>
                            <input type="text" placeholder="<?php echo lang('First_name')?>" name="firstname" value="<?php echo $info6['firstname']?$info6['firstname']:''; ?>">
                            <input type="text" placeholder="<?php echo lang('Last_name')?>" name="secondname" value="<?php echo $info6['secondname']?$info6['secondname']:''; ?>">
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label for="exampleInputName2"><i class="icon iconfont">&#xe668;</i><?php echo lang('home_detail_member_gender_message')?></label>
                            <select name="gender" class="">
                                <option value="1" <?php echo $info6['gender']==1?'selected':''; ?>><?php echo lang('personal_tailor_form_gender_man_message')?></option>
                                <option value="2" <?php echo $info6['gender']== 2?'selected':''; ?>><?php echo lang('personal_tailor_form_gender_woman_message')?></option>
                            </select>
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label for="exampleInputName2"><i class="icon iconfont">&#xe6b1;</i><?php echo lang('Date_of_Birth')?></label>
                            <select name="day" id="" style="width: 50px;text-align: right;margin-right: 5px">
                                <option style="display: none" value="0"><?php echo lang('Day')?></option>
                            </select>
                            <select name="month" id="" style="width: 50px;text-align: right;margin-right: 5px">
                                <option style="display: none" value="0"><?php echo lang('Month')?></option>
                            </select>
                            <select name="year" id="" style="width: 60px;text-align: right;margin-right: 5px">
                                <option style="display: none" value="0"><?php echo lang('Year')?></option>
                            </select>


                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label for="exampleInputName2"><i class="icon iconfont">&#xe765;</i><?php echo lang('Language_Spoken')?></label>
                            <select  name="language">
                                <option value="1" <?php echo $info6['language']==1?'selected':''; ?>><?php echo lang('search_house_language1')?></option>
                                <option value="2" <?php echo $info6['language']==2?'selected':''; ?>><?php echo lang('search_house_language2')?></option>
                                <option value="3" <?php echo $info6['language']==3?'selected':''; ?>><?php echo lang('Spanish')?></option>
                                <option value="4" <?php echo $info6['language']==4?'selected':''; ?>><?php echo lang('French')?></option>
                                <option value="5" <?php echo $info6['language']==5?'selected':''; ?>><?php echo lang('German')?></option>
                                <option value="0" <?php echo $info6['language']==0?'selected':''; ?>><?php echo lang('Other')?></option>
                            </select>
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label for="exampleInputName2"><i class="icon iconfont">&#xe74c;</i><?php echo lang('home_detail_member_race_message')?></label>
                            <select name="race">
                                <option value="1" <?php echo $info6['race']==1?'selected':''; ?>><?php echo lang('search_house_race1')?></option>
                                <option value="2" <?php echo $info6['race']==2?'selected':''; ?>><?php echo lang('search_house_race2')?></option>
                                <option value="3" <?php echo $info6['race']==3?'selected':''; ?>><?php echo lang('search_house_race3')?></option>
                                <option value="4" <?php echo $info6['race']==4?'selected':''; ?>><?php echo lang('search_house_race5')?></option>
                                <option value="0" <?php echo $info6['race']==5?'selected':''; ?>><?php echo lang('Other')?></option>
                                <option value="5" <?php echo $info6['race']==0?'selected':''; ?>><?php echo lang('Reject_answering')?></option>

                            </select>
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label for="exampleInputName2"><i class="icon iconfont">&#xe63c;</i><?php echo lang('Education_Level')?></label>
                            <select name="education">
                                <option value="1" <?php echo $info6['education']==1?'selected':''; ?>><?php echo lang('Primary_School')?></option>
                                <option value="2" <?php echo $info6['education']==2?'selected':''; ?>><?php echo lang('Middle_School')?></option>
                                <option value="3" <?php echo $info6['education']==3?'selected':''; ?>><?php echo lang('High_School')?></option>
                                <option value="4" <?php echo $info6['education']==4?'selected':''; ?>><?php echo lang('University')?></option>
                                <option value="5" <?php echo $info6['education']==5?'selected':''; ?>><?php echo lang('Master')?></option>
                                <option value="6" <?php echo $info6['education']==6?'selected':''; ?>><?php echo lang('PH_D')?></option>
                                <option value="0" <?php echo $info6['education']==0?'selected':''; ?>><?php echo lang('Other')?></option>
                            </select>
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label for="exampleInputName2"><i class="icon iconfont">&#xe6db;</i><?php echo lang('home_detail_member_religion_message')?></label>
                            <select name="belief">
                                <option value="1" <?php echo $info6['belief']==1?'selected':''; ?>><?php echo lang('Christianity')?></option>
                                <option value="2" <?php echo $info6['belief']==2?'selected':''; ?>><?php echo lang('Catholicism')?></option>
                                <option value="3" <?php echo $info6['belief']==3?'selected':''; ?>><?php echo lang('Lutheran')?></option>
                                <option value="4" <?php echo $info6['belief']==4?'selected':''; ?>><?php echo lang('Methodists')?></option>
                                <option value="5" <?php echo $info6['belief']==5?'selected':''; ?>><?php echo lang('Quakers')?></option>
                                <option value="6" <?php echo $info6['belief']==6?'selected':''; ?>><?php echo lang('Baptist')?></option>
                                <option value="7" <?php echo $info6['belief']==7?'selected':''; ?>><?php echo lang('Judaism')?></option>
                                <option value="8" <?php echo $info6['belief']==8?'selected':''; ?>><?php echo lang('Fraternity')?></option>
                                <option value="9" <?php echo $info6['belief']==9?'selected':''; ?>><?php echo lang('Islam')?></option>
                                <option value="10" <?php echo $info6['belief']==10?'selected':''; ?>><?php echo lang('Buddhism')?></option>
                                <option value="11" <?php echo $info6['belief']==11?'selected':''; ?>><?php echo lang('Hinduism')?></option>
                                <option value="12" <?php echo $info6['belief']==12?'selected':''; ?>><?php echo lang('Other_religion')?></option>
                                <option value="0" <?php echo $info6['belief']==0?'selected':''; ?>><?php echo lang('No_religion')?></option>
                            </select>
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label for="exampleInputName2"><i class="icon iconfont">&#xe67e;</i><?php echo lang('home_detail_member_profession_message')?></label>
                            <input type="text" name="job" value="<?php echo $info6['job']?$info6['job']:''; ?>">
                        </div>
                        <div class="" style="padding: 20px 0 0px 20px;display: block;text-align: center">
                            <span class="save"><?php echo lang('save') ?></span>
                            <span class="cancal"><?php echo lang('search_cancel_message') ?></span>
                        </div>
                    </form>
                </div>

            </div>
            <div style="height: 20px"></div>
            <div class="familyInfo">
                <div class="title_txt"><?php echo lang('Family_Information') ?><i class="icon iconfont edit2">&#xe689;</i></div>
                <div class="family_con">
                    <table class="view_tb">
                        <tr class="row">
                            <td class="col-md-3"><?php echo lang('Family_Annual_Income') ?></td>
                            <td class="col-md-3" style="padding-right: 0px"><?php echo lang('Number_of_Family_Members') ?></td>
                            <td class="col-md-3"><?php echo lang('Any_family_member_smoke') ?></td>
                            <td class="col-md-3"><?php echo lang('Any_pet') ?></td>
                        </tr>
                        <tr class="row nr">
                            <td class="col-md-3">
                                <?php
                                switch ($info6['income']){
                                    case 1:
                                        echo '0-50000'.lang('USD');
                                        break;
                                    case 2:
                                        echo '50001-80000'.lang('USD');
                                        break;
                                    case 3:
                                        echo '80001-150000'.lang('USD');
                                        break;
                                    case 4:
                                        echo lang('is_en')?'more than 150000':'大于150000美元';
                                        break;
                                    case 5:
                                        echo lang('Reject_answering');
                                        break;
                                }
                                ?>
                            </td>
                            <td class="col-md-3"><?php echo $info6['family_num']?$info6['family_num']:'' ?></td>
                            <td class="col-md-3"><?php echo $info6['smoking']==1?lang('YES'):lang('NO') ?></td>
                            <td class="col-md-3">
                                <?php
                                echo $info6['pet']==1?lang('YES').($info6['petinfo']?','.$info6['petinfo']:''):lang('NO');
                                ?>
                            </td>
                        </tr>
                    </table>
                    <table class="view_tb" style="margin-top: 30px">
                        <tr class="row">
                            <td class="col-md-3"><?php echo lang('Hobbies_and_Interests') ?></td>
                        </tr>
                        <tr class="row nr">
                            <td class="col-md-12">
                                <?php
                                if(!is_array($info6['hobby'])){
                                    echo $Allhobby[$info6['hobby']]?$Allhobby[$info6['hobby']]:'';
                                }else{
                                    foreach($info6['hobby'] as $k => $v){
                                        if($k == (count($info6['hobby'])-1)){
                                            echo $Allhobby[$v];
                                        }else{
                                            echo $Allhobby[$v].'、';
                                        }

                                    }
                                }

                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="family_edit" style="display: none">
                    <form class="form-inline" method="post">
                        <div class="form-group" style="padding: 30px 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:225px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe61d;</i><?php echo lang('Family_Annual_Income') ?></label>
                            <select name="income">
                                <option style="display: none"></option>
                                <option <?php echo $info6['income']==1?'selected':''; ?> value="1">0-50000<?php echo lang('USD') ?></option>
                                <option <?php echo $info6['income']==2?'selected':''; ?> value="2">50001-80000<?php echo lang('USD') ?></option>
                                <option <?php echo $info6['income']==3?'selected':''; ?> value="3">80001-150000<?php echo lang('USD') ?></option>
                                <option <?php echo $info6['income']==4?'selected':''; ?> value="4"><?php echo lang('is_en')?'more than 150000':'大于150000美元' ?></option>
                                <option <?php echo $info6['income']==5?'selected':''; ?> value="5"><?php echo lang('Reject_answering')?></option>
                            </select>
                        </div>

                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:225px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe6a3;</i><?php echo lang('Number_of_Family_Members') ?></label>
                            <input type="number" name="family_num" value="<?php echo $info6['family_num']?$info6['family_num']:''; ?>">
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:225px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe74c;</i><?php echo lang('Any_family_member_smoke') ?></label>
                            <label class="radio-inline">
                                <input type="radio" name="smoking" <?php echo $info6['smoking']==1?'checked':''; ?> value="1"> <?php echo lang('YES') ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="smoking" <?php echo $info6['smoking']==2?'checked':''; ?> value="2"> <?php echo lang('NO') ?>
                            </label>
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:225px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe636;</i><?php echo lang('Any_pet') ?></label>
                            <label class="radio-inline">
                                <input type="radio" name="pet" <?php echo $info6['pet']==1?'checked':''; ?> value='1'> <?php echo lang('YES') ?>
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="pet" <?php echo $info6['pet']==2?'checked':''; ?> value='2'> <?php echo lang('NO') ?>
                            </label>
                            <input type="text" placeholder="<?php echo lang('pet_type') ?>" name="petType" value="<?php echo $info6['petinfo']?$info6['petinfo']:'';?>" style="<?php echo $info6['pet']==1?'':'display: none' ?>">
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:225px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe61e;</i><?php echo lang('Hobbies_and_Interests') ?></label>
                            <div style="<?php echo lang('is_en')?'width: 700px;':'width: 780px;' ?>height: auto;float: right;">
                                <?php foreach ($Allhobby as $k=>$v):?>
                                    <label style="width:150px;margin-left: 0" class="checkbox-inline">
                                        <input type="checkbox" name="hobby"
                                            <?php
                                            if(in_array($k,$info6['hobby'])){
                                                echo 'checked';
                                            } elseif($info6['hobby'] == $k){
                                                echo 'checked';
                                            }
                                            ?> value="<?php echo $k ?>"> <?php echo $v ?>
                                    </label>


                                <?php endforeach;?>



                        </div>

                </div>
                <div style="clear: both"></div>
                <div class="" style="padding: 50px 0 0px 20px;display: block;text-align: center">
                    <span class="save2"><?php echo lang('save') ?></span>
                    <span class="cancal2"><?php echo lang('search_cancel_message') ?></span>
                </div>
                </form>
                </div>
            </div>
            <div style="height: 20px"></div>

            <div class="houseInfo">
                <div class="title_txt"><?php echo lang('House_Information') ?><i class="icon iconfont edit3">&#xe689;</i></div>
                <div class="house_con">
                    <table class="view_tb">
                        <tr class="row">
                            <td class="col-md-3"><?php echo lang('House_Size') ?></td>
                            <td class="col-md-3"><?php echo lang('Number_of_Bedrooms') ?></td>
                            <td class="col-md-3"><?php echo lang('Post_Code') ?></td>
                            <td class="col-md-3"><?php echo lang('Establishment_Time') ?></td>
                        </tr>
                        <tr class="row nr">
                            <td class="col-md-3"><?php echo $info6['area']?$info6['area']:'' ?></td>
                            <td class="col-md-3"><?php echo $info6['bedroom_num']?$info6['bedroom_num']:'' ?></td>
                            <td class="col-md-3"><?php echo $info6['zipcode']?$info6['zipcode']:'' ?></td>
                            <td class="col-md-3"><?php echo $info6['buildtime']?$info6['buildtime'].(lang('is_en')?'':'年'):'' ?></td>
                        </tr>
                    </table>
                    <table class="view_tb" style="margin-top: 30px">
                        <tr class="row">
                            <td class="col-md-3"><?php echo lang('House_Type') ?></td>
                            <td class="col-md-3"><?php echo lang('Ownership') ?></td>
                            <td class="col-md-3"><?php echo lang('Number_of_Bathrooms') ?></td>
                            <td class="col-md-3"><?php echo lang('WIFI_Available') ?></td>
                        </tr>
                        <tr class="row nr">
                            <td class="col-md-3">
                                <?php
                                switch ($info6['house_type']){
                                    case 1:
                                        echo lang('House_type_Villa');
                                        break;
                                    case 2:
                                        echo lang('House_type_Town_Hose');
                                        break;
                                    case 3:
                                        echo lang('House_type_Apartment');
                                        break;
                                }
                                ?>
                            </td>
                            <td class="col-md-3">
                                <?php
                                switch ($info6['ownership']){
                                    case 1:
                                        echo lang('Self_Owned');
                                        break;
                                    case 2:
                                        echo lang('Rent');
                                        break;
                                }
                                ?>
                            </td>
                            <td class="col-md-3"><?php echo $info6['toilet_num']?$info6['toilet_num']:'' ?></td>
                            <td class="col-md-3"><?php echo $info6['wifi']==1?lang('YES'):lang('NO') ?></td>
                        </tr>
                    </table>
                    <table class="view_tb" style="margin-top: 30px">
                        <tr class="row">
                            <td class="col-md-6"><?php echo lang('Street_Name') ?></td>
                            <td class="col-md-6"><?php echo lang('city') ?></td>
                        </tr>
                        <tr class="row nr">
                            <td class="col-md-6"><?php echo $info6['address']?$info6['address']:'' ?></td>
                            <td class="col-md-6"><?php echo lang('is_en')?$info6['name_en']:$info6['name_cn'] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="house_edit" style="display: none">
                    <form class="form-inline" method="post">
                        <div class="form-group" style="padding: 30px 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:185px':'' ?>"><i class="icon iconfont">&#xe6e5;</i><?php echo lang('House_Size') ?></label>
                            <input type="text" name="area" value="<?php echo $info6['area']?$info6['area']:''; ?>">
                        </div>

                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:185px':'' ?>"><i class="icon iconfont">&#xe676;</i><?php echo lang('Number_of_Bedrooms') ?></label>
                            <select name="bedroom_num">
                                <option style="display:none"></option>
                                <option <?php echo $info6['bedroom_num']==1?'selected':'' ?>  value="1">1</option>
                                <option <?php echo $info6['bedroom_num']==2?'selected':'' ?> value="2">2</option>
                                <option <?php echo $info6['bedroom_num']==3?'selected':'' ?> value="3">3</option>
                                <option <?php echo $info6['bedroom_num']==4?'selected':'' ?> value="4">4</option>
                                <option <?php echo $info6['bedroom_num']==5?'selected':'' ?> value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:185px':'' ?>"><i class="icon iconfont">&#xe686;</i><?php echo lang('Post_Code') ?></label>
                            <input type="text" name="zipcode" value="<?php echo $info6['zipcode']?$info6['zipcode']:'' ?>">
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:185px':'' ?>"><i class="icon iconfont">&#xe65c;</i><?php echo lang('Establishment_Time') ?></label>
                            <div class="input-group date form_date class_open_time_input" data-date="" data-date-format="yyyy-mm" data-link-field="dtp_input2" data-link-format="yyyy-mm">
                                <input class="" size="16" type="text" name="Mybuildtime" value="<?php echo $info6['buildtime']?$info6['buildtime']:'' ?>" style="border: 1;margin-right: 0;position: relative"  readonly>
                                <span class="input-group-addon" style="background: none;border: 0;position: absolute;text-align: right;width: 177px;top: 0;right: 0;"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                            <input type="hidden" id="dtp_input2" name="buildtime" value="<?php echo $info6['buildtime']?$info6['buildtime']:'' ?>" /><br/>
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:185px':'' ?>"><i class="icon iconfont">&#xe51c;</i><?php echo lang('House_Type') ?></label>
                            <select name="house_type">
                                <option style="display:none"></option>
                                <option <?php echo $info6['house_type']==1?'selected':'' ?> value="1"><?php echo lang('House_type_Villa') ?></option>
                                <option <?php echo $info6['house_type']==2?'selected':'' ?>  value="2"><?php echo lang('House_type_Town_Hose') ?></option>
                                <option <?php echo $info6['house_type']==3?'selected':'' ?>  value="3"><?php echo lang('House_type_Apartment') ?></option>
                            </select>
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:185px':'' ?>"><i class="icon iconfont">&#xe60a;</i><?php echo lang('Ownership') ?></label>
                            <select name="ownership">
                                <option style="display:none"></option>
                                <option <?php echo $info6['ownership']==1?'selected':'' ?>  value="1"><?php echo lang('Self_Owned') ?></option>
                                <option <?php echo $info6['ownership']==2?'selected':'' ?>  value="2"><?php echo lang('Rent') ?></option>
                            </select>
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:185px':'' ?>"><i class="icon iconfont">&#xe665;</i><?php echo lang('Number_of_Bathrooms') ?></label>
                            <select name="toilet_num">
                                <option style="display:none"></option>
                                <option <?php echo $info6['toilet_num']==1?'selected':'' ?>  value="1">1</option>
                                <option <?php echo $info6['toilet_num']==2?'selected':'' ?>  value="2">2</option>
                                <option <?php echo $info6['toilet_num']==3?'selected':'' ?>  value="3">3</option>
                                <option <?php echo $info6['toilet_num']==4?'selected':'' ?>  value="4">4</option>
                                <option <?php echo $info6['toilet_num']==5?'selected':'' ?>  value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:185px':'' ?>"><i class="icon iconfont">&#xe7ff;</i><?php echo lang('WIFI_Available') ?></label>
                            <label class="radio-inline">
                                <input type="radio" name="wifi" <?php echo $info6['wifi']==1?'checked':'' ?> value="1"> <?php echo lang('YES') ?>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="wifi" <?php echo $info6['wifi']==2?'checked':'' ?> value="2"> <?php echo lang('NO') ?>
                            </label>
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:185px':'' ?>"><i class="icon iconfont">&#xe60b;</i><?php echo lang('Street_Name') ?></label>
                            <input type="text" name="address" style="width: 358px" value="<?php echo $info6['address']?$info6['address']:'' ?>">
                        </div>

                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:185px':'' ?>"><i class="icon iconfont">&#xe601;</i><?php echo lang('city') ?></label>
                            <select class="city" name="city">
                                <option style="display:none"></option>
                                <?php foreach ($city as $v):?>
                                    <option <?php echo $info6['city_id']==$v['id']?'selected':'' ?> value="<?php echo $v['id']?>"><?php echo lang('is_en')?$v['name_en']:$v['name_cn']?></option>
                                <?php endforeach;?>
                                <option value="999"><?php echo lang('Other')?></option>
                            </select>
                            <select class="state" name="state">
                                <option style="display:none"><?php echo lang('state') ?></option>
                                <?php foreach ($state as $v):?>
                                    <option <?php echo $info6['state_id']==$v['id']?'selected':'' ?> value="<?php echo $v['id']?>"><?php echo lang('is_en')?$v['name_en']:$v['name_cn']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="" style="padding: 20px 0 0px 20px;display: block;text-align: center">
                            <span class="save3"><?php echo lang('save') ?></span>
                            <span class="cancal3"><?php echo lang('search_cancel_message') ?></span>
                        </div>
                    </form>
                </div>
            </div>
        <div style="height: 20px"></div>
            <div class="picInfo">
                <div class="title_txt"><?php echo lang('house_images') ?><i class="icon iconfont edit4">&#xe689;</i></div>
                <div id="layer-photos" class="row" style="width: 1000px">
                    <?php foreach ($image as $k => $v):?>
                        <div class="col-md-3" style="text-align: center">
                            <img height="200px" id="pic_<?php echo $k?>" layer-src="/upload/userhome/<?php echo $v['user_id'].'/'.$v['pic_name'].'?'.time() ?>" class="" style="padding: 15px;cursor: pointer" src="/upload/userhome/<?php echo $v['user_id'].'/'.$v['pic_name'].'?'.time() ?>">
                            <form style="display: none" class="Hidfile">
                                <input id="fileToUpload_<?php echo $k?>" class="Hfinput" type="file" style="" name="cover" onchange="showPerview(this,'pic_<?php echo $k?>');">
                                <div class="pic_left"><?php echo lang('choose_file') ?></div>
                                <input type="hidden" value="<?php echo $k ?>" name="picNO" class="picNO">
                                <input class="pic_right" type="button" value="<?php echo lang('Upload') ?>">
                            </form>

                        </div>

                    <?php endforeach;?>
                </div>
            </div>
        <div style="height: 20px"></div>

            <div class="ruleInfo">
                <div class="title_txt"><?php echo lang('Rules_and_Description')?><i class="icon iconfont edit5">&#xe689;</i></div>
                <div class="rule_con">
                    <table class="view_tb" style="margin-bottom: 30px">
                        <tr class="row">
                            <td class="col-md-3"><?php echo lang('Monthly_Fee') ?></td>
                            <td class="col-md-3"><?php echo lang('Payment_period') ?></td>
                            <td class="col-md-6"><?php echo lang('Deposit_required') ?></td>

                        </tr>
                        <tr class="row nr">
                            <td class="col-md-3"><?php echo $info6['month_price'] ?></td>
                            <td class="col-md-3">
                                <?php
                                switch ($info6['payment']){
                                    case 1:
                                        echo lang('per_month');
                                        break;
                                    case 2:
                                        echo lang('per_semester');
                                        break;
                                }
                                ?>
                            </td>
                            <td class="col-md-6"><?php echo $info6['deposit']==1?lang('YES'):lang('NO') ?><?php echo $info6['deposit']==1?','.$info6['deposit_info']:'' ?></td>

                        </tr>
                    </table>

                    <table class="view_tb" style="margin-bottom: 30px">
                        <tr class="row">
                            <td class="col-md-3"><?php echo lang('price_Including') ?></td>
                        </tr>
                        <tr class="row nr">
                            <td class="col-md-12">
                                <?php
                                if(!is_array($info6['price_include'])){
                                    if($info6['price_include'] == 6){
                                        echo $info6['include_other']?$info6['include_other']:$price_include[$info6['price_include']];
                                    }else{
                                        echo $price_include[$info6['price_include']]?$price_include[$info6['price_include']]:'';
                                    }
                                }else{
                                    foreach($info6['price_include'] as $k => $v){
                                        if($k == (count($info6['price_include'])-1)){
                                            echo $price_include[$v];
                                        }else{
                                            echo $price_include[$v].'、';
                                        }
                                        if($v == 6){
                                            echo ':'.$info6['include_other'];
                                        }
                                    }
                                }

                                ?>
                            </td>
                        </tr>
                    </table>

                    <table class="view_tb">
                        <tr class="row">
                            <td class="col-md-12"><?php echo lang('House_Description')?></td>
                        </tr>
                        <tr class="row nr">
                            <td class="col-md-12"><?php echo $info6['describe']?$info6['describe']:''; ?></td>
                        </tr>
                    </table>
                    <table class="view_tb" style="margin-top: 30px">
                        <tr class="row">
                            <td class="col-md-12"><?php echo lang('Rules_Setting')?></td>
                        </tr>
                        <tr class="row nr">
                            <td class="col-md-12"><?php echo $info6['rule']?$info6['rule']:'' ?></td>
                        </tr>
                    </table>
                </div>
                <div class="rule_edit" style="display: none">
                    <form class="form-inline" method="post">
                        <div class="form-group" style="padding: 30px 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:185px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe6e5;</i><?php echo lang('Monthly_Fee') ?></label>
                            <input type="number" name="Monthly_Fee" value="<?php echo $info6['month_price']?$info6['month_price']:''; ?>">
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:185px':'' ?>" ><i class="icon iconfont">&#xe7ff;</i><?php echo lang('Payment_period') ?></label>
                            <label class="radio-inline" style="<?php echo lang('is_en')?'width: 90px':'width: 50px' ?>">
                                <input type="radio" name="Payment_period" <?php echo $info6['payment']==1?'checked':'' ?> value="1"> <?php echo lang('per_month')?>
                            </label>
                            <label class="radio-inline" style="<?php echo lang('is_en')?'width: 110px':'width: 70px' ?>">
                                <input type="radio" name="Payment_period" <?php echo $info6['payment']==2?'checked':'' ?> value="2"> <?php echo lang('per_semester')?>
                            </label>
                        </div>

                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:185px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe7ff;</i><?php echo lang('Deposit_required') ?></label>
                            <label class="radio-inline" style="width: 50px">
                                <input type="radio" name="Deposit_required" <?php echo $info6['deposit']==1?'checked':'' ?> value="1"> <?php echo lang('YES')?>
                            </label>
                            <label class="radio-inline" style="width: 70px">
                                <input type="radio" name="Deposit_required" <?php echo $info6['deposit']==2?'checked':'' ?> value="2"> <?php echo lang('NO')?>
                            </label>
                            <input type="text" placeholder="<?php echo lang('Deposit_type')?>" name="Deposit_type" value="<?php echo $info6['deposit_info']?$info6['deposit_info']:'';?>" style="<?php echo $info6['deposit']==1?'':'display: none' ?>;<?php echo lang('is_en')?'width: 520px':'width: 560px' ?>">
                        </div>



                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:185px':'' ?>" for="exampleInputName2"><i class="icon iconfont">&#xe61e;</i><?php echo lang('price_Including')?></label>
                            <div style="<?php echo lang('is_en')?'width: 741px;':'width: 782px;' ?>height: auto;float: right;">
                                <label style="width:80px;margin-left: 0;<?php echo lang('is_en')?'margin-right: 20px':'' ?>" class="checkbox-inline">
                                    <input type="checkbox" name="Including" <?php echo in_array(1,$info6['price_include'])?'checked':'' ?> value="1"> <?php echo lang('Breakfast')?>
                                </label>
                                <label style="width:80px;margin-left: 0" class="checkbox-inline">
                                    <input type="checkbox" name="Including" <?php echo in_array(2,$info6['price_include'])?'checked':'' ?> value="2"> <?php echo lang('Lunch')?>
                                </label>
                                <label style="width:80px;margin-left: 0" class="checkbox-inline">
                                    <input type="checkbox" name="Including" <?php echo in_array(3,$info6['price_include'])?'checked':'' ?> value="3"> <?php echo lang('Dinner')?>
                                </label>
                                <br />
                                <label style="<?php echo lang('is_en')?'width:300px':'width:150px' ?>;margin-left: 0;padding-top: 10px" class="checkbox-inline">
                                    <input type="checkbox" name="Including" <?php echo in_array(4,$info6['price_include'])?'checked':'' ?> value="4"> <?php echo lang('airport')?>
                                </label>
                                <br />
                                <label style="<?php echo lang('is_en')?'width:220px':'width:150px' ?>;margin-left: 0;padding-top: 10px" class="checkbox-inline">
                                    <input type="checkbox" name="Including" <?php echo in_array(5,$info6['price_include'])?'checked':'' ?> value="5"> <?php echo lang('School_transfer')?>
                                </label>
                                <br />
                                <label style="width:100px;margin-left: 0;padding-top: 10px" class="checkbox-inline">
                                    <input type="checkbox"  name="Including" <?php echo in_array(6,$info6['price_include'])?'checked':'' ?> value="6" id="Including_other"> <?php echo lang('Other')?>
                                </label>
                                <input type="text" placeholder="<?php echo lang('Deposit_type')?>" name="IncludingType" value="<?php echo $info6['include_other']?$info6['include_other']:'';?>" style="<?php echo lang('is_en')?'width:660px':'width:700px' ?>;position: relative;top: 5px;<?php echo in_array(6,$info6['price_include'])?'':'display: none'?>">
                            </div>
                        </div>

                        <div style="clear: both"></div>


                        <div class="form-group" style="padding: 30px 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:185px':'' ?>" ><i class="icon iconfont">&#xe64e;</i><?php echo lang('House_Description')?></label>
                            <textarea class="form-control" name="describe" rows="5" style="width: 700px;vertical-align:top"><?php echo $info6['describe']?$info6['describe']:"" ?></textarea>
                        </div>
                        <div class="form-group" style="padding: 0 0 30px 20px;display: block">
                            <label style="<?php echo lang('is_en')?'width:185px':'' ?>" ><i class="icon iconfont">&#xe64e;</i><?php echo lang('Rules_Setting')?></label>
                            <textarea class="form-control" name="rule" rows="5" style="width: 700px;vertical-align:top"><?php echo $info6['rule']?$info6['rule']:"" ?></textarea>
                        </div>

                        <div class="" style="padding: 20px 0 0px 20px;display: block;text-align: center">
                            <span class="save5"><?php echo lang('save') ?></span>
                            <span class="cancal5"><?php echo lang('search_cancel_message') ?></span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="" style="padding: 60px 0 30px 20px;display: block;text-align: center">
                <a href="/web/becomeHome?p=5"><span class="previous" style="background: #5ea557;cursor: pointer"><?php echo lang('Previous')?></span></a>
                <span class="previous IssueHome" style="background: #5ea557;cursor: pointer"><?php echo lang('issue')?></span>
            </div>

        </div>
    </div>


</div>
<script type="text/javascript" src="/public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/public/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script>
    $(function(){
        var dataDay = <?php echo $info6['day']?$info6['day']:0; ?>;
        var dataMonth = <?php echo $info6['month']?$info6['month']:0; ?>;
        var dataYear = <?php echo $info6['year']?$info6['year']:0; ?>;
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
    })



    $('.basicInfo').hover(function(){
        $(this).find('.edit').css('display','inline-block');
    },function(){
        $(this).find('.edit').css('display','none');
    });

    $('.familyInfo').hover(function(){
        $(this).find('.edit2').css('display','inline-block');
    },function(){
        $(this).find('.edit2').css('display','none');
    });
    $('.houseInfo').hover(function(){
        $(this).find('.edit3').css('display','inline-block');
    },function(){
        $(this).find('.edit3').css('display','none');
    });
    $('.ruleInfo').hover(function(){
        $(this).find('.edit5').css('display','inline-block');
    },function(){
        $(this).find('.edit5').css('display','none');
    });
    $('.picInfo').hover(function(){
        $(this).find('.edit4').css('display','inline-block');
    },function(){
        $(this).find('.edit4').css('display','none');
    });




    $('.edit').click(function(){
        $('.basic_con').css('display','none');
        $('.basic_edit').css('display','block');
    });
    $('.edit2').click(function(){
        $('.family_con').css('display','none');
        $('.family_edit').css('display','block');
    });
    $('.edit3').click(function(){
        $('.house_con').css('display','none');
        $('.house_edit').css('display','block');
    });
    $('.edit5').click(function(){
        $('.rule_con').css('display','none');
        $('.rule_edit').css('display','block');
    });

    $('.cancal').click(function(){
        $('.basic_con').css('display','block');
        $('.basic_edit').css('display','none');

    });
    $('.cancal2').click(function(){
        $('.family_con').css('display','block');
        $('.family_edit').css('display','none');

    });
    $('.cancal3').click(function(){
        $('.house_con').css('display','block');
        $('.house_edit').css('display','none');
    });
    $('.cancal5').click(function(){
        $('.rule_con').css('display','block');
        $('.rule_edit').css('display','none');
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

    $('.save').click(function(){
        var data = getData();
        data.one = true;
        $.post("/web/becomeHome_save" , data , function(data){
            if(data.status) {
                layer.msg('<?php echo lang('saving') ?>', {
                    icon: 16,
                    time: 1000,
                    shade: 0.01
                }, function(){
                    layer.msg('<?php echo lang('save_success') ?>',{time: 500,},function(){
                        location.reload();
                    });

                });
                $(this).attr('disabled','disabled');
                setTimeout("$('.save').attr('disabled',false);",5000);
            }else{
                alert(data.msg);
            }
        },'json');
    });

    function getData2(){
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

    $('.save2').click(function(){
        var data = getData2();
        data.two = true;
        $.post("/web/becomeHome_save" , data , function(data){
            if(data.status) {
                layer.msg('<?php echo lang('saving') ?>', {
                    icon: 16,
                    time: 1000,
                    shade: 0.01
                }, function(){
                    layer.msg('<?php echo lang('save_success') ?>',{time: 500,},function(){
                        location.reload();
                    });
                });
                $(this).attr('disabled','disabled');
                setTimeout("$('.save').attr('disabled',false);",5000);
            }else{
                alert(data.msg);
            }
        },'json');
    })

    $('input[name=pet]').click(function(){
        if($(this).val()==1){
            $('input[name=petType]').css('display','inline-block');
        }
        if($(this).val()==2){
            $('input[name=petType]').css('display','none');
        }
    })

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

    function getData3(){
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
    };

    $('.save3').click(function(){
        var data = getData3();
        data.three = true;
        $.post("/web/becomeHome_save" , data , function(data){
            if(data.status) {
                layer.msg('<?php echo lang('saving') ?>', {
                    icon: 16,
                    time: 1000,
                    shade: 0.01
                }, function(){
                    layer.msg('<?php echo lang('save_success') ?>',{time: 500,},function(){
                        location.reload();
                    });
                });
                $(this).attr('disabled','disabled');
                setTimeout("$('.save').attr('disabled',false);",5000);
            }else{
                alert(data.msg);
            }
        },'json');
    });

    function getData5(){
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

    $('.save5').click(function(){
        var data = getData5();
        data.five = true;
        $.post("/web/becomeHome_save" , data , function(data){
            if(data.status) {
                layer.msg('<?php echo lang('saving') ?>', {
                    icon: 16,
                    time: 1000,
                    shade: 0.01
                }, function(){
                    layer.msg('<?php echo lang('save_success') ?>',{time: 500,},function(){
                        location.reload();
                });
                });
                $(this).attr('disabled','disabled');
                setTimeout("$('.save').attr('disabled',false);",5000);
            }else{
                alert(data.msg);
            }
        },'json');
    });


    layer.photos({
        photos: '#layer-photos'
        ,anim: 5 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
    });


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

    $('.edit4').click(function(){
        $('.Hidfile').css('display','block');
    });

    $(".pic_right").click(function(){
        var file_id = $(this).parent().find('.Hfinput').attr('id');
        var num = $(this).parent().find('.picNO').val();

        //上传文件
        $.ajaxFileUpload({
            url:'/web/AjaxFileUpload?num='+num,//处理图片脚本
            secureuri :false,
            fileElementId :file_id,//file控件id
            dataType : 'json',
            success : function (res){
                if(res.status){
                    layer.msg('<?php echo lang("Upload_success")?>！',{time: 1000},function(){
                        location.reload();
                    })
                }
            }
        });
        return false;
    });


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

    $('.IssueHome').click(function(){
        layer.prompt({
            title:'发布前为您的房屋取个名字吧'
        },function(val, index){
            if(!val){
                layer.msg('请先取个名字');
                layer.close(index);
            }else{
                layer.close(index);
                var index1 = layer.load(0,{time: 3*1000});
                $.post("/web/IssueHome",{title:val},function(data){
                    if(data.status){
                        layer.close(index1);
                        layer.msg('<?php echo lang('is_en')?'Issue Success':'发布成功' ?>', {icon: 1, time: 1000},function(){
                            location.href="/home/HouseList";
                        });
                    }
                },'json');
            }

        });


    });


</script>