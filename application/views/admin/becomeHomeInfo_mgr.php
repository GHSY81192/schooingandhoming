<link rel="stylesheet" href="/public/css/layui.css">
<link rel="stylesheet" href="/public/css/web/BCHome.css">
<link rel="stylesheet" href="/public/css/home/require.css">
<style>
    .row{margin: 0}
</style>
<div class="body_box" style="padding: 0">
    <div class="main_box">

        <div class="home-require-content" style="margin-bottom: 60px">
            <form id="form1" class="partBG">
                <p class="title" style="border-bottom:1px dotted #ccc;color: #000">
                    <span>Host Informaiton</span>
                    <span class="save1">save</span>
                </p>
                <div class="info_box row">
                    <input type="hidden" name="part1" value="1">
                    <input type="hidden" name="edit" value="<?php echo $data['HostInfo']['host_id']?>">
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Host Name</div>
                        <input class="info_input_text element" name="host_name" type="text" style="width: 100%" value="<?php echo $data['HostInfo']['hostname']?$data['HostInfo']['hostname']:''; ?>">
                    </div>

                    <div class="col-md-3" style="padding-right: 0px">
                        <div class="info_S_title">Date of Birth</div>
                        <input class="info_input_text element" name="brithY" id="brithY" type="text" style="width: 25%" value="<?php echo $data['HostInfo']['birthY']?$data['HostInfo']['birthY']:''; ?>">
                        <span style="width: 5%;display: inline-block;text-align: center"> - </span>
                        <input class="info_input_text element" name="brithM" id="brithM" type="text" style="width: 20%" value="<?php echo $data['HostInfo']['birthM']?$data['HostInfo']['birthM']:''; ?>">
                        <span style="width: 5%;display: inline-block;text-align: center"> - </span>
                        <input class="info_input_text element" name="brithD" id="brithD" type="text" style="width: 20%" value="<?php echo $data['HostInfo']['birthD']?$data['HostInfo']['birthD']:''; ?>">
                        <div class="info_lable"><span style="margin-right: 60px">YYYY</span><span style="margin-right: 60px">MM</span><span>DD</span></div>
                    </div>

                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Sex</div>
                        <select class="info_select element" name="host_sex" style="width: 50%">
                            <option style="display: none"></option>
                            <option value="1" <?php echo $data['HostInfo']['sex']==1?'selected':'' ?>>Male</option>
                            <option value="2" <?php echo $data['HostInfo']['sex']==2?'selected':'' ?>>Female</option>
                        </select>
                    </div>
                </div>
                <div class="info_box row">
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Primary Spoken Language</div>
                        <select class="info_select element" name="language" style="width: 100%">
                            <option style="display: none"></option>
                            <option <?php echo $data['HostInfo']['primary_language']==1?'selected':'' ?> value="1">English</option>
                            <option <?php echo $data['HostInfo']['primary_language']==2?'selected':'' ?> value="2">Spanish</option>
                            <option <?php echo $data['HostInfo']['primary_language']==3?'selected':'' ?> value="3">German</option>
                            <option <?php echo $data['HostInfo']['primary_language']==4?'selected':'' ?> value="4">French</option>
                            <option <?php echo $data['HostInfo']['primary_language']==5?'selected':'' ?> value="5">Chinese</option>
                            <option <?php echo $data['HostInfo']['primary_language']==6?'selected':'' ?> value="6">Other</option>
                        </select>
                    </div>
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Other Spoken Language</div>
                        <select class="info_select element" name="language2" style="width: 100%">
                            <option style="display: none"></option>
                            <option <?php echo $data['HostInfo']['other_language']==1?'selected':'' ?> value="1">English</option>
                            <option <?php echo $data['HostInfo']['other_language']==2?'selected':'' ?> value="2">Spanish</option>
                            <option <?php echo $data['HostInfo']['other_language']==3?'selected':'' ?> value="3">German</option>
                            <option <?php echo $data['HostInfo']['other_language']==4?'selected':'' ?> value="4">French</option>
                            <option <?php echo $data['HostInfo']['other_language']==5?'selected':'' ?> value="5">Chinese</option>
                            <option <?php echo $data['HostInfo']['other_language']==6?'selected':'' ?> value="6">Other</option>
                        </select>
                    </div>
                </div>
                <div class="info_box row"  >
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Religion</div>
                        <select class="info_select element" name="Religion" style="width: 100%">
                            <option style="display: none"></option>
                            <option <?php echo $data['HostInfo']['religion']==1?'selected':'' ?> value="1">Catholic</option>
                            <option <?php echo $data['HostInfo']['religion']==2?'selected':'' ?> value="2">Evangelical Protestant</option>
                            <option <?php echo $data['HostInfo']['religion']==3?'selected':'' ?> value="3">Mainline Protestant</option>
                            <option <?php echo $data['HostInfo']['religion']==4?'selected':'' ?> value="4">Orthodox Christian</option>
                            <option <?php echo $data['HostInfo']['religion']==5?'selected':'' ?> value="5">Other Christian</option>
                            <option <?php echo $data['HostInfo']['religion']==6?'selected':'' ?> value="6">Jewish</option>
                            <option <?php echo $data['HostInfo']['religion']==7?'selected':'' ?> value="7">Muslim</option>
                            <option <?php echo $data['HostInfo']['religion']==8?'selected':'' ?> value="8">Buddhist</option>
                            <option <?php echo $data['HostInfo']['religion']==9?'selected':'' ?> value="9">Hindu</option>
                            <option <?php echo $data['HostInfo']['religion']==10?'selected':'' ?> value="10">Mormon</option>
                            <option <?php echo $data['HostInfo']['religion']==11?'selected':'' ?> value="11">Atheist</option>
                            <option <?php echo $data['HostInfo']['religion']==12?'selected':'' ?> value="12">Nothing in Particular</option>
                        </select>
                    </div>
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Ethnicity</div>
                        <select class="info_select element" name="Ethnicity" style="width: 100%">
                            <option style="display: none"></option>
                            <option <?php echo $data['HostInfo']['ethnicity']==1?'selected':'' ?> value="1">White</option>
                            <option <?php echo $data['HostInfo']['ethnicity']==2?'selected':'' ?> value="2">Asian American</option>
                            <option <?php echo $data['HostInfo']['ethnicity']==3?'selected':'' ?> value="3">African American</option>
                            <option <?php echo $data['HostInfo']['ethnicity']==4?'selected':'' ?> value="4">Latin America</option>
                            <option <?php echo $data['HostInfo']['ethnicity']==5?'selected':'' ?> value="5">Other</option>
                        </select>
                    </div>
                </div>
                <div class="info_box row" style="margin-bottom: 20px">
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Profession</div>
                        <input class="info_input_text element" name="profession" type="text" style="width: 100%" value="<?php echo $data['HostInfo']['profession']?$data['HostInfo']['profession']:'' ?>">
                    </div>
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Current Employer</div>
                        <input class="info_input_text element" name="Current_Employer" type="text" style="width: 100%" value="<?php echo $data['HostInfo']['Current_Employer']?$data['HostInfo']['Current_Employer']:'' ?>">
                    </div>
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Regular Work Hours</div>
                        <input class="info_input_text element" name="Work_Hours" type="text" style="width: 100%" value="<?php echo $data['HostInfo']['work_hours']?$data['HostInfo']['work_hours']:'' ?>">
                    </div>
                </div>
                <div class="info_box row">
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Highest Level of Education</div>
                        <select class="info_select element" name="Education" style="width: 100%">
                            <option style="display: none"></option>
                            <option <?php echo $data['HostInfo']['education']==1?'selected':'' ?> value="1">High School</option>
                            <option <?php echo $data['HostInfo']['education']==2?'selected':'' ?> value="2">Bachelor</option>
                            <option <?php echo $data['HostInfo']['education']==3?'selected':'' ?> value="3">Master</option>
                            <option <?php echo $data['HostInfo']['education']==4?'selected':'' ?> value="4">PH.D</option>
                        </select>
                    </div>
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Driver's License</div>
                        <input class="info_input_text element" name="License" type="text" style="width: 100%" value="<?php echo $data['HostInfo']['driver_license']?$data['HostInfo']['driver_license']:'' ?>">
                    </div>
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Marital Status</div>
                        <select class="info_select element" name="Marital" style="width: 100%">
                            <option style="display: none"></option>
                            <option <?php echo $data['HostInfo']['marital']==1?'selected':'' ?> value="1">Single</option>
                            <option <?php echo $data['HostInfo']['marital']==2?'selected':'' ?> value="2">Married</option>
                            <option <?php echo $data['HostInfo']['marital']==3?'selected':'' ?> value="3">Divorced</option>
                        </select>
                    </div>
                    <div class="col-md-3" id="childnum" style="padding-right: 50px;display: ">
                        <div class="info_S_title">Children Number</div>
                        <select class="info_select element" name="child_num" style="width: 100%">
                            <option style="display: none"></option>
                            <option <?php echo $data['HostInfo']['child_num']=='0'?'selected':'' ?> value="0">0</option>
                            <option <?php echo $data['HostInfo']['child_num']==1?'selected':'' ?> value="1">1</option>
                            <option <?php echo $data['HostInfo']['child_num']==2?'selected':'' ?> value="2">2</option>
                            <option <?php echo $data['HostInfo']['child_num']==3?'selected':'' ?> value="3">3</option>
                            <option <?php echo $data['HostInfo']['child_num']==4?'selected':'' ?> value="4">4</option>
                            <option <?php echo $data['HostInfo']['child_num']==5?'selected':'' ?> value="5">5</option>
                        </select>
                    </div>
                </div>
            </form>
            <form id="form2" class="partBG">
                <p class="title" style="border-bottom:1px dotted #ccc;color: #000;margin-top: 30px">
                    <span>Family Information</span>
                    <span class="save2">save</span>
                </p>
                <input type="hidden" name="edit" value="<?php echo $data['FamilyInfo']['host_id']?>">
                <input type="hidden" name="part2" value="1">
                <div id="SpouseInfo">
                    <div class="info_box row">

                        <div class="col-md-3" style="padding-right: 50px">
                            <div class="info_S_title">Spouse Name</div>
                            <input class="info_input_text element" name="Spouse_name" type="text" style="width: 100%" value="<?php echo $data['FamilyInfo']['spouse_name']?$data['FamilyInfo']['spouse_name']:''?>">
                        </div>
                        <div class="col-md-3" style="padding-right: 0px">
                            <div class="info_S_title">Date of Birth</div>
                            <input class="info_input_text element" name="S_brithY" type="text" style="width: 25%" value="<?php echo $data['FamilyInfo']['S_birthY']?$data['FamilyInfo']['S_birthY']:''?>">
                            <span style="width: 5%;display: inline-block;text-align: center"> - </span>
                            <input class="info_input_text element" name="S_brithM" type="text" style="width: 20%" value="<?php echo $data['FamilyInfo']['S_birthM']?$data['FamilyInfo']['S_birthM']:''?>">
                            <span style="width: 5%;display: inline-block;text-align: center"> - </span>
                            <input class="info_input_text element" name="S_brithD" type="text" style="width: 20%" value="<?php echo $data['FamilyInfo']['S_birthD']?$data['FamilyInfo']['S_birthD']:''?>">
                            <div class="info_lable"><span style="margin-right: 60px">YYYY</span><span style="margin-right: 60px">MM</span><span>DD</span></div>
                        </div>

                        <div class="col-md-3" style="padding-right: 50px">
                            <div class="info_S_title">Sex</div>
                            <select class="info_select element" name="S_gender" style="width: 50%">
                                <option style="display: none"></option>
                                <option value="1" <?php echo $data['FamilyInfo']['S_gender']==1?'selected':'' ?>>Male</option>
                                <option value="2" <?php echo $data['FamilyInfo']['S_gender']==2?'selected':'' ?>>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="info_box row">
                        <div class="col-md-3" style="padding-right: 50px">
                            <div class="info_S_title">Primary Spoken Language</div>
                            <select class="info_select element" name="S_language" style="width: 100%">
                                <option style="display: none"></option>
                                <option <?php echo $data['FamilyInfo']['S_language']==1?'selected':'' ?> value="1">English</option>
                                <option <?php echo $data['FamilyInfo']['S_language']==2?'selected':'' ?> value="2">Spanish</option>
                                <option <?php echo $data['FamilyInfo']['S_language']==3?'selected':'' ?> value="3">German</option>
                                <option <?php echo $data['FamilyInfo']['S_language']==4?'selected':'' ?> value="4">French</option>
                                <option <?php echo $data['FamilyInfo']['S_language']==5?'selected':'' ?> value="5">Chinese</option>
                                <option <?php echo $data['FamilyInfo']['S_language']==6?'selected':'' ?> value="6">Other</option>
                            </select>
                        </div>
                        <div class="col-md-3" style="padding-right: 50px">
                            <div class="info_S_title">Other Spoken Language</div>
                            <select class="info_select element" name="S_language2" style="width: 100%">
                                <option style="display: none"></option>
                                <option <?php echo $data['FamilyInfo']['S_language2']==1?'selected':'' ?> value="1">English</option>
                                <option <?php echo $data['FamilyInfo']['S_language2']==2?'selected':'' ?> value="2">Spanish</option>
                                <option <?php echo $data['FamilyInfo']['S_language2']==3?'selected':'' ?> value="3">German</option>
                                <option <?php echo $data['FamilyInfo']['S_language2']==4?'selected':'' ?> value="4">French</option>
                                <option <?php echo $data['FamilyInfo']['S_language2']==5?'selected':'' ?> value="5">Chinese</option>
                                <option <?php echo $data['FamilyInfo']['S_language2']==6?'selected':'' ?> value="6">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="info_box row"  >
                        <div class="col-md-3" style="padding-right: 50px">
                            <div class="info_S_title">Religion</div>
                            <select class="info_select element" name="S_Religion" style="width: 100%">
                                <option style="display: none"></option>
                                <option <?php echo $data['FamilyInfo']['S_religion']==1?'selected':'' ?> value="1">Catholic</option>
                                <option <?php echo $data['FamilyInfo']['S_religion']==2?'selected':'' ?> value="2">Evangelical Protestant</option>
                                <option <?php echo $data['FamilyInfo']['S_religion']==3?'selected':'' ?> value="3">Mainline Protestant</option>
                                <option <?php echo $data['FamilyInfo']['S_religion']==4?'selected':'' ?> value="4">Orthodox Christian</option>
                                <option <?php echo $data['FamilyInfo']['S_religion']==5?'selected':'' ?> value="5">Other Christian</option>
                                <option <?php echo $data['FamilyInfo']['S_religion']==6?'selected':'' ?> value="6">Jewish</option>
                                <option <?php echo $data['FamilyInfo']['S_religion']==7?'selected':'' ?> value="7">Muslim</option>
                                <option <?php echo $data['FamilyInfo']['S_religion']==8?'selected':'' ?> value="8">Buddhist</option>
                                <option <?php echo $data['FamilyInfo']['S_religion']==9?'selected':'' ?> value="9">Hindu</option>
                                <option <?php echo $data['FamilyInfo']['S_religion']==10?'selected':'' ?> value="10">Mormon</option>
                                <option <?php echo $data['FamilyInfo']['S_religion']==11?'selected':'' ?> value="11">Atheist</option>
                                <option <?php echo $data['FamilyInfo']['S_religion']==12?'selected':'' ?> value="12">Nothing in Particular</option>
                            </select>
                        </div>
                        <div class="col-md-3" style="padding-right: 50px">
                            <div class="info_S_title">Ethnicity</div>
                            <select class="info_select element" name="S_Ethnicity" style="width: 100%">
                                <option style="display: none"></option>
                                <option <?php echo $data['FamilyInfo']['S_ethnicity']==1?'selected':'' ?> value="1">White</option>
                                <option <?php echo $data['FamilyInfo']['S_ethnicity']==2?'selected':'' ?> value="2">Asian American</option>
                                <option <?php echo $data['FamilyInfo']['S_ethnicity']==3?'selected':'' ?> value="3">African American</option>
                                <option <?php echo $data['FamilyInfo']['S_ethnicity']==4?'selected':'' ?> value="4">Latin America</option>
                                <option <?php echo $data['FamilyInfo']['S_ethnicity']==5?'selected':'' ?> value="5">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="info_box row">
                        <div class="col-md-3" style="padding-right: 50px">
                            <div class="info_S_title">Highest Level of Educaiton</div>
                            <select class="info_select element" name="S_Educaiton" style="width: 100%">
                                <option style="display: none"></option>
                                <option <?php echo $data['FamilyInfo']['S_education']==1?'selected':'' ?> value="1">High School</option>
                                <option <?php echo $data['FamilyInfo']['S_education']==2?'selected':'' ?> value="2">University</option>
                                <option <?php echo $data['FamilyInfo']['S_education']==3?'selected':'' ?> value="3">Graduate School</option>
                                <option <?php echo $data['FamilyInfo']['S_education']==4?'selected':'' ?> value="4">PH.D</option>
                            </select>
                        </div>
                        <div class="col-md-3" style="padding-right: 50px">
                            <div class="info_S_title">Driver's License</div>
                            <input class="info_input_text element" name="S_License" type="text" style="width: 100%" value="<?php echo $data['FamilyInfo']['S_license']?$data['FamilyInfo']['S_license']:''?>">
                        </div>
                        <div class="col-md-3" style="padding-right: 50px">
                            <div class="info_S_title">Profession</div>
                            <input class="info_input_text element" name="S_profession" type="text" style="width: 100%" value="<?php echo $data['FamilyInfo']['S_profession']?$data['FamilyInfo']['S_profession']:''?>">
                        </div>
                    </div>
                </div>
                <div id="childInfo">
                </div>
                <div class="info_box row">
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Family Annual Income</div>
                        <select class="info_select element" name="Income" style="width: 100%">
                            <option style="display: none"></option>
                            <option <?php echo $data['FamilyInfo']['income']==1?'selected':'' ?> value="1">0-50000 USD</option>
                            <option <?php echo $data['FamilyInfo']['income']==2?'selected':'' ?> value="2">50000-100000 USD</option>
                            <option <?php echo $data['FamilyInfo']['income']==3?'selected':'' ?> value="3">100000-150000 USD</option>
                            <option <?php echo $data['FamilyInfo']['income']==4?'selected':'' ?> value="4">above 150000 USD</option>
                        </select>
                    </div>
                    <div class="col-md-4" style="padding-right: 50px;padding-left: 0">
                        <div class="info_S_title">Does anyone smoke in your house?</div>
                        <input value="1" type="radio" <?php echo $data['FamilyInfo']['smoke']==1?'checked':'' ?> class="element info_radio" name="smoke" style="margin-right: 5px" >
                        <lable class="info_lable">YES</lable>
                        <input value="2" type="radio" <?php echo $data['FamilyInfo']['smoke']==2?'checked':'' ?> class="element info_radio" name="smoke" style="margin-left: 20px;margin-right: 5px" >
                        <lable class="info_lable">NO</lable>
                    </div>
                </div>
            </form>
            <form id="form3" class="partBG">
                <p class="title" style="border-bottom:1px dotted #ccc;color: #000;margin-top: 30px">
                    <span>House Information</span>
                    <span class="save3">save</span>
                </p>
                <div class="info_box row">
                    <input type="hidden" name="edit" value="<?php echo $data['HomeInfo']['host_id']?>">
                    <input type="hidden" name="part3" value="1">
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Living Area</div>
                        <input class="info_input_text element" name="Living_Area" type="text" style="width: 100%" value="<?php echo $data['HomeInfo']['area']?$data['HomeInfo']['area']:''?>">
                    </div>

                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">House Type</div>
                        <select class="info_select element" name="House_Type" style="width: 100%">
                            <option style="display: none"></option>
                            <option <?php echo $data['HomeInfo']['house_type']==1?'selected':'' ?> value="1">Villa</option>
                            <option <?php echo $data['HomeInfo']['house_type']==2?'selected':'' ?> value="2">Apartment</option>
                            <option <?php echo $data['HomeInfo']['house_type']==3?'selected':'' ?> value="3">Town House</option>
                        </select>
                    </div>
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Ownership</div>
                        <select class="info_select element" name="Ownership" style="width: 100%">
                            <option style="display: none"></option>
                            <option <?php echo $data['HomeInfo']['ownership']==1?'selected':'' ?> value="1">Self-owned</option>
                            <option <?php echo $data['HomeInfo']['ownership']==2?'selected':'' ?> value="2">Rent</option>
                        </select>
                    </div>
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Year Built</div>
                        <input class="info_input_text element" name="BuildY" type="text" style="width: 31%" value="<?php echo $data['HomeInfo']['buildY']?$data['HomeInfo']['buildY']:''?>">
                        <span style="width: 5%;display: inline-block;text-align: center"> - </span>
                        <input class="info_input_text element" name="BuildM" type="text" style="width: 20%" value="<?php echo $data['HomeInfo']['buildM']?$data['HomeInfo']['buildM']:''?>">
                        <div class="info_lable"><span style="margin-right: 60px">YYYY</span><span>MM</span></div>
                    </div>
                </div>


                <div class="info_box row" >
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Number of Bedrooms</div>
                        <select class="info_select element" name="Bedrooms" style="width: 100%">
                            <option style="display: none"></option>
                            <option <?php echo $data['HomeInfo']['bedroom_num']==1?'selected':'' ?> value="1">1</option>
                            <option <?php echo $data['HomeInfo']['bedroom_num']==2?'selected':'' ?> value="2">2</option>
                            <option <?php echo $data['HomeInfo']['bedroom_num']==3?'selected':'' ?> value="3">3</option>
                            <option <?php echo $data['HomeInfo']['bedroom_num']==4?'selected':'' ?> value="4">4</option>
                            <option <?php echo $data['HomeInfo']['bedroom_num']==5?'selected':'' ?> value="5">5</option>
                        </select>
                    </div>
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Number of Bathrooms</div>
                        <select class="info_select element" name="Bathrooms" style="width: 100%">
                            <option style="display: none"></option>
                            <option <?php echo $data['HomeInfo']['toilet_num']==1?'selected':'' ?> value="1">1</option>
                            <option <?php echo $data['HomeInfo']['toilet_num']==2?'selected':'' ?> value="2">2</option>
                            <option <?php echo $data['HomeInfo']['toilet_num']==3?'selected':'' ?> value="3">3</option>
                            <option <?php echo $data['HomeInfo']['toilet_num']==4?'selected':'' ?> value="4">4</option>
                            <option <?php echo $data['HomeInfo']['toilet_num']==5?'selected':'' ?> value="5">5</option>
                        </select>
                    </div>
                    <div class="info_S_title">WIFI Available</div>
                    <input value="1" type="radio" class="element info_radio" name="wifi" style="margin-right: 5px" <?=$data['HomeInfo']['wifi']==1?'checked':'' ?>>
                    <lable class="info_lable">YES</lable>
                    <input value="2" type="radio" class="element info_radio" name="wifi" style="margin-left: 20px;margin-right: 5px" <?=$data['HomeInfo']['wifi']==2?'checked':'' ?>>
                    <lable class="info_lable">NO</lable>
                </div>


                <div class="info_box row"  >
                    <div class="col-md-6" style="padding-right: 50px;padding-left: 0">
                        <div class="info_S_title">Street Name</div>
                        <input class="info_input_text element" name="Street" type="text" style="width: 100%" value="<?php echo $data['HomeInfo']['address']?$data['HomeInfo']['address']:''?>">
                    </div>
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Post Code</div>
                        <input class="info_input_text element" name="Post_code" type="text" style="width: 100%" value="<?php echo $data['HomeInfo']['zipcode']?$data['HomeInfo']['zipcode']:''?>">
                    </div>

                </div>

                <div class="info_box row">
                    <div class="col-md-3" style="padding-right: 50px;padding-left: 0">
                        <div class="info_S_title">CITY</div>
                        <select class="info_select element city" name="city" style="width: 100%">
                            <option style="display: none"></option>
                            <?php foreach ($data['city'] as $v):?>
                                <option <?php echo $data['HomeInfo']['city_id']==$v['id']?'selected':'' ?> value="<?php echo $v['id']?>"><?php echo $v['name_en'] ?></option>
                            <?php endforeach;?>
                            <option>other</option>
                        </select>
                    </div>
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">State</div>
                        <select class="info_select element state" name="state" style="width: 100%">
                            <option style="display: none"></option>
                            <?php foreach ($data['state'] as $v):?>
                                <option <?php echo $data['HomeInfo']['state_id']==$v['id']?'selected':'' ?> value="<?php echo $v['id']?>"><?php echo $v['name_en'] ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
            </form>
            <form id="form4" class="partBG">
                <p class="title" style="border-bottom:1px dotted #ccc;color: #000;margin-top: 30px">
                    <span>Miscellaneous Information</span>
                    <span class="save4">save</span>
                </p>
                <div class="info_box row">
                    <input type="hidden" name="edit" value="<?php echo $data['HomeInfo']['host_id']?>">
                    <input type="hidden" name="part4" value="1">
                    <div class="col-md-3">
                        <div class="info_S_title">Any Pet?</div>
                        <input value="1" type="radio" class="element info_radio" name="pet" style="margin-right: 5px" <?=$data['MisInfo']['pet']==1?'checked':'' ?>>
                        <lable class="info_lable">YES</lable>
                        <input value="2" type="radio" class="element info_radio" name="pet" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['pet']==2?'checked':'' ?>>
                        <lable class="info_lable">NO</lable>
                    </div>
                    <div class="col-md-3">
                        <div class="info_S_title">If yes, please indicate what kind</div>
                        <input class="info_input_text element" name="pet_kind" type="text" style="width: 100%" value="<?php echo $data['MisInfo']['pet_kind']?$data['MisInfo']['pet_kind']:''?>">
                    </div>
                </div>
                <div class="info_box row"  >
                    <div class="col-md-6">
                        <div class="info_S_title">Is your home accessible by public transportation?</div>
                        <input class="info_input_text element" name="transportation" type="text" style="width: 100%" value="<?php echo $data['MisInfo']['transportation']?$data['MisInfo']['transportation']:''?>">
                    </div>
                </div>
                <div class="info_box row"  >
                    <div class="col-md-6">
                        <div class="info_S_title">Would you prefer to host a female or male student or either?</div>
                        <input value="1" type="radio" class="element info_radio" name="prefer" style="margin-right: 5px" <?=$data['MisInfo']['prefer']==1?'checked':'' ?>>
                        <lable class="info_lable">Male</lable>
                        <input value="2" type="radio" class="element info_radio" name="prefer" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['prefer']==2?'checked':'' ?>>
                        <lable class="info_lable">Female</lable>
                        <input value="3" type="radio" class="element info_radio" name="prefer" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['prefer']==3?'checked':'' ?>>
                        <lable class="info_lable">Either</lable>
                    </div>
                </div>
                <div class="info_box row"  >
                    <div class="col-md-6">
                        <div class="info_S_title">What is the minimum age of a student that you will host?</div>
                        <input class="info_input_text element" name="minage" type="text" style="width: 100%" value="<?php echo $data['MisInfo']['minage']?$data['MisInfo']['minage']:''?>">
                    </div>
                </div>
                <div class="info_box hobbies row" style="margin: 0" >
                    <div class="col-md-12 row">
                        <div class="info_S_title">Hobbies and Interests</div>
                        <?php foreach ($data['hobbies'] as $v):?>
                            <div class="col-md-2">
                                <input class="element info_radio" type="checkbox" name="Hobbies" <?php echo in_array($v['id'],$data['MisInfo']['hobby'])?'checked':''?> value="<?php echo $v['id']?>">
                                <lable><?php echo $v['name']?></lable>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="info_box row"  >
                    <div class="col-md-6">
                        <div class="info_S_title">Do you permit alcohol in your home?</div>
                        <input value="1" type="radio" class="element info_radio" name="alcohol" style="margin-right: 5px" <?=$data['MisInfo']['alcohol']==1?'checked':'' ?>>
                        <lable class="info_lable">YES</lable>
                        <input value="2" type="radio" class="element info_radio" name="alcohol" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['alcohol']==2?'checked':'' ?>>
                        <lable class="info_lable">NO</lable>
                    </div>
                </div>
                <div class="info_box row"  >
                    <div class="col-md-6">
                        <div class="info_S_title">Would you host a student who drinks alcohol?</div>
                        <input value="1" type="radio" class="element info_radio" name="drinks" style="margin-right: 5px" <?=$data['MisInfo']['drinks']==1?'checked':'' ?>>
                        <lable class="info_lable">YES</lable>
                        <input value="2" type="radio" class="element info_radio" name="drinks" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['drinks']==2?'checked':'' ?>>
                        <lable class="info_lable">NO</lable>
                    </div>
                </div>
                <div class="info_box row"  >
                    <div class="col-md-6">
                        <div class="info_S_title">Do you allow smoking in your home?</div>
                        <input value="1" type="radio" class="element info_radio" name="smoking" style="margin-right: 5px" <?=$data['MisInfo']['smoking']==1?'checked':'' ?>>
                        <lable class="info_lable">YES</lable>
                        <input value="2" type="radio" class="element info_radio" name="smoking" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['smoking']==2?'checked':'' ?>>
                        <lable class="info_lable">NO</lable>
                    </div>
                </div>
                <div class="info_box row"  >
                    <div class="col-md-6">
                        <div class="info_S_title">Would you host a student who smokes (outside)?</div>
                        <input value="1" type="radio" class="element info_radio" name="outsmoking" style="margin-right: 5px" <?=$data['MisInfo']['outsmoking']==1?'checked':'' ?>>
                        <lable class="info_lable">YES</lable>
                        <input value="2" type="radio" class="element info_radio" name="outsmoking" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['outsmoking']==2?'checked':'' ?>>
                        <lable class="info_lable">NO</lable>
                    </div>
                </div>
                <div class="info_box row"  >
                    <div class="col-md-6">
                        <div class="info_S_title">Will there be a private or shared bathroom available for students?</div>
                        <input value="1" type="radio" class="element info_radio" name="bathroom" style="margin-right: 5px" <?=$data['MisInfo']['bathroom']==1?'checked':'' ?>>
                        <lable class="info_lable">YES</lable>
                        <input value="2" type="radio" class="element info_radio" name="bathroom" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['bathroom']==2?'checked':'' ?>>
                        <lable class="info_lable">NO</lable>
                    </div>
                </div>
                <div class="info_box row"  >
                    <div class="col-md-6">
                        <div class="info_S_title">If shared, how many people share the bathroom?</div>
                        <input value="1" type="radio" class="element info_radio" name="sharebathroom" style="margin-right: 5px" <?=$data['MisInfo']['sharebathroom']==1?'checked':'' ?>>
                        <lable class="info_lable">1</lable>
                        <input value="2" type="radio" class="element info_radio" name="sharebathroom" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['sharebathroom']==2?'checked':'' ?>>
                        <lable class="info_lable">2</lable>
                        <input value="3" type="radio" class="element info_radio" name="sharebathroom" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['sharebathroom']==3?'checked':'' ?>>
                        <lable class="info_lable">3</lable>
                        <input value="4" type="radio" class="element info_radio" name="sharebathroom" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['sharebathroom']==4?'checked':'' ?>>
                        <lable class="info_lable">4</lable>
                        <input value="5" type="radio" class="element info_radio" name="sharebathroom" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['sharebathroom']==5?'checked':'' ?>>
                        <lable class="info_lable">5</lable>
                    </div>
                </div>
                <div class="info_box row"  >
                    <div class="col-md-6">
                        <div class="info_S_title">Will laundry facilities be available to the student?</div>
                        <input value="1" type="radio" class="element info_radio" name="laundry" style="margin-right: 5px" <?=$data['MisInfo']['laundry']==1?'checked':'' ?>>
                        <lable class="info_lable">YES</lable>
                        <input value="2" type="radio" class="element info_radio" name="laundry" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['laundry']==2?'checked':'' ?>>
                        <lable class="info_lable">NO</lable>
                    </div>
                </div>
                <div class="info_box row"  >
                    <div class="col-md-12">
                        <div class="info_S_title">List any other facilities that will be available for the student to use:</div>
                        <input class="info_input_text element" name="student_use" type="text" style="width: 100%" value="<?php echo $data['MisInfo']['student_use']?$data['MisInfo']['student_use']:''?>">
                    </div>
                </div>
                <div class="info_box row"  >
                    <div class="col-md-12">
                        <div class="info_S_title">How many students are you able to provide a room for (each student would require their own bed and work desk)?</div>
                        <input value="1" type="radio" class="element info_radio" name="student_room" style="margin-right: 5px" <?=$data['MisInfo']['student_room']==1?'checked':'' ?>>
                        <lable class="info_lable">1</lable>
                        <input value="2" type="radio" class="element info_radio" name="student_room" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['student_room']==2?'checked':'' ?>>
                        <lable class="info_lable">2</lable>
                        <input value="3" type="radio" class="element info_radio" name="student_room" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['student_room']==3?'checked':'' ?>>
                        <lable class="info_lable">3</lable>
                        <input value="4" type="radio" class="element info_radio" name="student_room" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['student_room']==4?'checked':'' ?>>
                        <lable class="info_lable">4</lable>
                        <input value="5" type="radio" class="element info_radio" name="student_room" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['student_room']==5?'checked':'' ?>>
                        <lable class="info_lable">5</lable>
                    </div>
                </div>
                <div class="info_box row"  >
                    <div class="col-md-12">
                        <div class="info_S_title">Number of Bedrooms available for hosting students?</div>
                        <input value="1" type="radio" class="element info_radio" name="bedrooms" style="margin-right: 5px" <?=$data['MisInfo']['bedrooms']==1?'checked':'' ?>>
                        <lable class="info_lable">1</lable>
                        <input value="2" type="radio" class="element info_radio" name="bedrooms" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['bedrooms']==2?'checked':'' ?>>
                        <lable class="info_lable">2</lable>
                        <input value="3" type="radio" class="element info_radio" name="bedrooms" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['bedrooms']==3?'checked':'' ?>>
                        <lable class="info_lable">3</lable>
                        <input value="4" type="radio" class="element info_radio" name="bedrooms" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['bedrooms']==4?'checked':'' ?>>
                        <lable class="info_lable">4</lable>
                        <input value="5" type="radio" class="element info_radio" name="bedrooms" style="margin-left: 20px;margin-right: 5px" <?=$data['MisInfo']['bedrooms']==5?'checked':'' ?>>
                        <lable class="info_lable">5</lable>
                    </div>
                </div>
                <div id="bedroomInfo">

                </div>


            </form>
            <form id="form5" class="partBG">
                <p class="title" style="border-bottom:1px dotted #ccc;color: #000;margin-top: 30px">
                    <span>Rules and Description</span>
                    <span class="save5">save</span>
                </p>
                <div class="info_box row">
                    <input type="hidden" name="edit" value="<?php echo $data['HomeInfo']['host_id']?>">
                    <input type="hidden" name="part5" value="1">
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Monthly Fee ($/Month)</div>
                        <input class="info_input_text element" name="month_price" type="text" style="width: 100%" value="<?php echo $data['HomeRule']['month_price']?$data['HomeRule']['month_price']:''?>">
                    </div>
                    <div class="col-md-3" style="padding-right: 20px">
                        <div class="info_S_title">Payment Period</div>
                        <input value="1" type="radio" class="element info_radio" name="payment" style="margin-right: 5px" <?=$data['HomeRule']['payment']==1?'checked':'' ?>>
                        <lable class="info_lable">Monthly</lable>
                        <input value="2" type="radio" class="element info_radio" name="payment" style="margin-left: 20px;margin-right: 5px" <?=$data['HomeRule']['payment']==2?'checked':'' ?>>
                        <lable class="info_lable">Semesterly</lable>
                    </div>
                    <div class="col-md-3" style="padding-right: 50px">
                        <div class="info_S_title">Deposit Required</div>
                        <input value="1" type="radio" class="element info_radio" name="deposit" style="margin-right: 5px" <?=$data['HomeRule']['deposit']==1?'checked':'' ?>>
                        <lable class="info_lable">YES</lable>
                        <input value="2" type="radio" class="element info_radio" name="deposit" style="margin-left: 20px;margin-right: 5px" <?=$data['HomeRule']['deposit']==2?'checked':'' ?>>
                        <lable class="info_lable">NO</lable>
                    </div>
                </div>
                <div class="info_box row"  >
                    <div class="col-md-12">
                        <div class="info_S_title">House Description (Additional informaiton you would like to share with students about your home)</div>
                        <textarea class="info_textarea element" name="describe" rows="3"><?=$data['HomeRule']['describe']?></textarea>
                    </div>
                </div>
                <div class="info_box row"  >
                    <div class="col-md-12">
                        <div class="info_S_title">Rules Setting (Do you have any special circumstances students need to be aware of?)</div>
                        <textarea class="info_textarea element" name="rule" rows="3"><?=$data['HomeRule']['rule']?></textarea>
                    </div>
                </div>
            </form>
            <div id="form6" class="partBG">
                <p class="title" style="border-bottom:1px dotted #ccc;color: #000;margin-top: 30px">House Images</p>
                <div class="info_box row">
                    <div class="info_S_title">Upload 6 photos you may have readily available of your home, family, and bedroom</div>
                    <div class="form-group" style="padding: 20px 0 0 0">
                        <div class="layui-upload">
                            Bedroom Photo(2+):<button style="margin-left: 20px;height: 30px;line-height: 30px" type="button" class="layui-btn" id="test2"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> UPLOAD</button>
                            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;border: 0;padding: 0">
                                <div class="layui-upload-list" id="demo2">
                                    <?php foreach($data['HomeImage'] as $v):?>
                                        <?php if($v['number']=='A'):?>
                                            <img data-src="<?=$v['pic_name']?>" class="layui-upload-img" src="/upload/userhome/<?=$v['user_id']?>/<?=$v['pic_name']?>" alt="">
                                            <span style="position: relative;top: 36px;right: 12px;font-size: 13px;cursor: pointer" class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </div>
                            </blockquote>
                        </div>
                    </div>

                    <div class="form-group" style="padding: 20px 0 0 0">
                        <div class="layui-upload">
                            Bathroom Photo(1+):<button style="margin-left: 20px;height: 30px;line-height: 30px" type="button" class="layui-btn" id="test3"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> UPLOAD</button>
                            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;border: 0;padding: 0">
                                <div class="layui-upload-list" id="demo3">
                                    <?php foreach($data['HomeImage'] as $v):?>
                                        <?php if($v['number']=='B'):?>
                                            <img data-src="<?=$v['pic_name']?>" class="layui-upload-img" src="/upload/userhome/<?=$v['user_id']?>/<?=$v['pic_name']?>" alt="">
                                            <span style="position: relative;top: 36px;right: 12px;font-size: 13px;cursor: pointer" class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                    <div class="form-group" style="padding: 20px 0 0 0">
                        <div class="layui-upload">
                            Living room:(1+):<button style="margin-left: 20px;height: 30px;line-height: 30px" type="button" class="layui-btn" id="test4"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> UPLOAD</button>
                            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;border: 0;padding: 0">
                                <div class="layui-upload-list" id="demo4">
                                    <?php foreach($data['HomeImage'] as $v):?>
                                        <?php if($v['number']=='C'):?>
                                            <img data-src="<?=$v['pic_name']?>" class="layui-upload-img" src="/upload/userhome/<?=$v['user_id']?>/<?=$v['pic_name']?>" alt="">
                                            <span style="position: relative;top: 36px;right: 12px;font-size: 13px;cursor: pointer" class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                    <div class="form-group" style="padding: 20px 0 0 0">
                        <div class="layui-upload">
                            House External Photo(1+):<button style="margin-left: 20px;height: 30px;line-height: 30px" type="button" class="layui-btn" id="test5"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> UPLOAD</button>
                            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;border: 0;padding: 0">
                                <div class="layui-upload-list" id="demo5">
                                    <?php foreach($data['HomeImage'] as $v):?>
                                        <?php if($v['number']=='D'):?>
                                            <img data-src="<?=$v['pic_name']?>" class="layui-upload-img" src="/upload/userhome/<?=$v['user_id']?>/<?=$v['pic_name']?>" alt="">
                                            <span style="position: relative;top: 36px;right: 12px;font-size: 13px;cursor: pointer" class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                    <div class="form-group" style="padding: 20px 0 0 0">
                        <div class="layui-upload">
                            Family photo(1+):<button style="margin-left: 20px;height: 30px;line-height: 30px" type="button" class="layui-btn" id="test6"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> UPLOAD</button>
                            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;border: 0;padding: 0">
                                <div class="layui-upload-list" id="demo6">
                                    <?php foreach($data['HomeImage'] as $v):?>
                                        <?php if($v['number']=='E'):?>
                                            <img data-src="<?=$v['pic_name']?>" class="layui-upload-img" src="/upload/userhome/<?=$v['user_id']?>/<?=$v['pic_name']?>" alt="">
                                            <span style="position: relative;top: 36px;right: 12px;font-size: 13px;cursor: pointer" class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>

            <!--                    <div style="width:100%;text-align: center">-->
            <!--                        <button style="margin:50px 0;text-align: center;width: 20%;" type="button" class="btn btn-default" onclick="_submit()">Edit</button>-->
            <!--                    </div>-->



        </div>


    </div>

</div>
<script src="/public/js/bchome.js"></script>
<script>
    layui.use(['element','laypage','layer','form'], function(){
        $ = layui.jquery;//jquery
        lement = layui.element();//面包导航
        laypage = layui.laypage;//分页
        layer = layui.layer;//弹出层
        form = layui.form();//弹出层
    });

    $('select[name=child_num]').change(function(){
        $('#childInfo').empty();
        for(var i =0;i<$(this).val();i++){
            $('#childInfo').append('<div class="info_box row" style="margin-top: 20px"><div class="col-md-3" style="padding-right: 50px"><div class="info_S_title">Children Name'+(i+1)+'</div><input class="info_input_text element" name="C1_name'+(i+1)+'" type="text" style="width: 100%" value=""></div><div class="col-md-3" style="padding-right: 0px"><div class="info_S_title">Date of Birth</div><input class="info_input_text element" name="C1_brithY'+(i+1)+'" id="C_birthY'+(i+1)+'" type="text" style="width: 25%" value=""><span style="width: 5%;display: inline-block;text-align: center"> - </span><input class="info_input_text element" name="C1_brithM'+(i+1)+'" id="C_birthM'+(i+1)+'" type="text" style="width: 20%" value=""><span style="width: 5%;display: inline-block;text-align: center"> - </span><input class="info_input_text element" name="C1_brithD'+(i+1)+'" id="C_birthD'+(i+1)+'" type="text" style="width: 20%" value=""><div class="info_lable"><span style="margin-right: 60px">YYYY</span><span style="margin-right: 60px">MM</span><span>DD</span></div></div><div class="col-md-3" style="padding-right: 50px"><div class="info_S_title">Gender</div><select class="info_select element" name="C1_gender'+(i+1)+'" style="width: 50%"><option style="display: none"></option><option value="1">Male</option><option value="2">Female</option></select></div></div>');
        }
    });



    $('input[name=bedrooms]').click(function(){
        var bedrooms_num = $(this).val();
        $('#bedroomInfo').empty();
        for(var i=0;i<bedrooms_num;i++){
            $('#bedroomInfo').append('<div class="info_box row" style="margin: 20px 0"><div class="col-md-12 row"><div class="info_S_title">Bedroom '+(i+1)+'</div><div class="col-md-3" style="padding-right: 50px"><div class="info_S_title">Location</div><select class="info_select element" name="Location'+(i+1)+'" style="width: 100%"><option style="display: none"></option><option value="1">Basement</option><option value="2">Main Floor</option><option value="3">Second Floor</option><option value="4">Attic</option></select></div><div class="col-md-3" style="padding-right: 50px"><div class="info_S_title">Size of Bed</div><select class="info_select element" name="Size'+(i+1)+'" style="width: 100%"><option style="display: none"></option><option value="1">King size</option><option value="2">Queen size</option><option value="3">Single bed</option></select></div><div class="col-md-6" ><div class="info_S_title">Furniture in the room available for students to use</div><input class="info_input_text element" name="intro'+(i+1)+'" type="text" style="width: 100%" value=""></div></div></div>');
        }
    });





    $(function(){
        var mar = $('select[name=Marital]').val();
        var childNum = $('select[name=child_num]').val();


        if(mar==1 || mar ==3){
            $('#SpouseInfo').css('display','none');
        }
        var name = JSON.parse(<?php echo $data['child']?>);
        for(var i =0;i<childNum;i++){
            var selected1 = (name[i]["gender"]==1?"selected":"");
            var selected2 = (name[i]["gender"]==2?"selected":"");
            $('#childInfo').append('<div class="info_box row" style="margin-top: 20px"><div class="col-md-3" style="padding-right: 50px"><div class="info_S_title">Children Name'+(i+1)+'</div><input class="info_input_text element" name="C1_name'+(i+1)+'" type="text" style="width: 100%" value="'+name[i]["name"]+'"></div><div class="col-md-3" style="padding-right: 0px"><div class="info_S_title">Date of Birth</div><input class="info_input_text element" name="C1_brithY'+(i+1)+'" id="C_birthY'+(i+1)+'" type="text" style="width: 25%" value="'+name[i]["birthY"]+'"><span style="width: 5%;display: inline-block;text-align: center"> - </span><input class="info_input_text element" name="C1_brithM'+(i+1)+'" id="C_birthM'+(i+1)+'" type="text" style="width: 20%" value="'+name[i]["birthM"]+'"><span style="width: 5%;display: inline-block;text-align: center"> - </span><input class="info_input_text element" name="C1_brithD'+(i+1)+'" id="C_birthD'+(i+1)+'" type="text" style="width: 20%" value="'+name[i]["birthD"]+'"><div class="info_lable"><span style="margin-right: 60px">YYYY</span><span style="margin-right: 60px">MM</span><span>DD</span></div></div><div class="col-md-3" style="padding-right: 50px"><div class="info_S_title">Gender</div><select class="info_select element" name="C1_gender'+(i+1)+'" style="width: 50%"><option style="display: none"></option><option '+selected1+' value="1">Male</option><option '+selected2+' value="2">Female</option></select></div></div>');
        }


        var roomNum = $('input[name=bedrooms]:checked').val();
        var rooms = JSON.parse(<?php echo $data['rooms']?>);

        for(var i=0;i<roomNum;i++){
            var location1 = (rooms[i]['Location']==1?'selected':'');
            var location2 = (rooms[i]['Location']==2?'selected':'');
            var location3 = (rooms[i]['Location']==3?'selected':'');
            var location4 = (rooms[i]['Location']==4?'selected':'');
            var size1 = (rooms[i]['Size']==1?'selected':'');
            var size2 = (rooms[i]['Size']==2?'selected':'');
            var size3 = (rooms[i]['Size']==3?'selected':'');

            $('#bedroomInfo').append('<div class="info_box row" style="margin: 20px 0"><div class="col-md-12 row"><div class="info_S_title">Bedroom '+(i+1)+'</div><div class="col-md-3" style="padding-right: 50px"><div class="info_S_title">Location</div><select class="info_select element" name="Location'+(i+1)+'" style="width: 100%"><option style="display: none"></option><option '+location1+' value="1">Basement</option><option '+location2+' value="2">Main Floor</option><option '+location3+' value="3">Second Floor</option><option '+location4+' value="4">Attic</option></select></div><div class="col-md-3" style="padding-right: 50px"><div class="info_S_title">Size of Bed</div><select class="info_select element" name="Size'+(i+1)+'" style="width: 100%"><option style="display: none"></option><option '+size1+' value="1">King size</option><option '+size2+' value="2">Queen size</option><option '+size3+' value="3">Single bed</option></select></div><div class="col-md-6" ><div class="info_S_title">Furniture in the room available for students to use</div><input class="info_input_text element" name="intro'+(i+1)+'" type="text" style="width: 100%" value="'+rooms[i]["intro"]+'"></div></div></div>');
        }



    });
</script>
</body>
</html>