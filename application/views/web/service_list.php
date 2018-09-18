<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.css" />
<link rel="stylesheet" href="/public/css/web/ion.rangeSlider.skinHTML5.css" id="styleSrc"/>
<script src="/public/js/ion.rangeSlider.js"></script>
<link rel="stylesheet" href="/public/css/web/schoollist.css" />
<style>

</style>
<div class="school-list-bg">
    <div class="container">
        <div class="school-content">
            <form class="form-horizontal search-form" id="schoolForm" role="form">
                <div class="form-group row">
                    <div class="col-md-2 search-title"><img src="/public/images/icon/o1.png" class="iconImg">科目类别</div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="cur cur_line1 col-md-3">
                                <div class="form-control chose-tag" data-val="1">托福</div>
                                <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['basic_school_type'], '1')):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
                            </div>
                            <div class="cur cur_line1 col-md-3">
                                <div class="form-control chose-tag" data-val="2">SAT</div>
                                <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['basic_school_type'], '2')):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
                            </div>
                            <div class="cur cur_line1 col-md-3">
                                <div class="form-control chose-tag" data-val="3">GRE</div>
                                <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['basic_school_type'], '3')):?>11<?php else:?>10<?php endif;?>.png".png" class="ab s-school-show-icon">
                            </div>
                            <div class="cur cur_line1 col-md-3">
                                <div class="form-control chose-tag" data-val="4">GMAT</div>
                                <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['basic_school_type'], '3')):?>11<?php else:?>10<?php endif;?>.png".png" class="ab s-school-show-icon">
                            </div>
                            <div class="cur cur_line1 col-md-3" style="padding-top: 20px">
                                <div class="form-control chose-tag" data-val="5">雅思</div>
                                <img style="padding-top: 20px" src="/public/images/web/schoollist/<?php if(strstr(@$ret['basic_school_type'], '3')):?>11<?php else:?>10<?php endif;?>.png".png" class="ab s-school-show-icon">
                            </div>
                            <div class="cur cur_line1 col-md-3" style="padding-top: 20px">
                                <div class="form-control chose-tag" data-val="6">Essay Writing</div>
                                <img style="padding-top: 20px" src="/public/images/web/schoollist/<?php if(strstr(@$ret['basic_school_type'], '3')):?>11<?php else:?>10<?php endif;?>.png".png" class="ab s-school-show-icon">
                            </div>
                            <input type="hidden" name="summer_type_id" value="<?=@$ret['basic_school_type'];?>"  />
                        </div>
                    </div>
                </div>
                <div class="form-group row" style="padding-bottom: 20px;padding-top: 40px">
                    <div class="col-md-2 search-title search-title2"><img src="/public/images/icon/o2.png" class="iconImg">授课方</div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="cur  col-md-3">
                                <div class="form-control chose-tag" data-val="1">机构</div>
                                <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['basic_school_type'], '1')):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
                            </div>
                            <div class="cur  col-md-3">
                                <div class="form-control chose-tag" data-val="2">老师</div>
                                <img src="/public/images/web/schoollist/<?php if(strstr(@$ret['basic_school_type'], '2')):?>11<?php else:?>10<?php endif;?>.png" class="ab s-school-show-icon">
                            </div>
                            <input type="hidden" name="credit" value="<?=@$ret['basic_grade'];?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group row" style="padding-bottom: 20px">
                    <div class="col-md-2 search-title search-title2"><img src="/public/images/icon/o3.png" class="iconImg">开课时间</div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="cur cur_line1 col-md-3">
                                <select name="" id="" style="width: 100%;height: 34px;border-radius: 4px;border: 1px solid #ccc;padding-left: 8px;box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);color: #555;">
                                    <option value="">选择您的开课时间</option>
                                </select>
                            </div>

                            <input type="hidden" name="international" value="<?=@$ret['basic_grade'];?>" />
                        </div>
                    </div>
                </div>



            </form>
        </div>
        <div style="background-color:#f4f4f4;padding:20px 0px 20px 40px;border:1px solid #cccccc;border-top:0px">
            <a class="btn btn-default cancel-btn" id="subBtn" style="background-color:#5078b5;color:#ffffff;border:1px solid #5078b5"><?php echo lang('search_filter_message2') ?></a>
            <a class="btn btn-default cancel-btn" id="subBtn2" onclick="location.href='/web/SummerMore'" style="background-color:#5078b5;color:#ffffff;border:1px solid #5078b5">全部服务项目</a>
            <span>共计<?php echo $count;?>个项目</span>
        </div>
        <table class="table border-table" style="margin-top:10px;">
            <tr style="background: #ececec">
                <th class="text-center td1">课程</th>
                <th class="text-center td2">课程信息</th>
                <th class="text-center td3">科目类别</th>
                <th class="text-center td3">授课方</th>
                <th class="text-center td3">开课时间</th>
                <th class="text-center td3">课程价格</th>

            </tr>
            <tr><td colspan="7" style="height:5px;background-color:#ffffff;padding:0px;border:none"></td></tr>
            <?php foreach ($list as $k => $item):?>
                <tr class="cur <?=$k%2==0?'tr1':'tr2';?>" onclick="document.location.href='/web/serviceDetail/<?=$item['id']?>';">
                    <td class="td1 img-td td-border td-color">
                        <div><img src="/upload/default/service/<?php echo $item['img'] ?>" /></div>
                    </td>

                    <td class="text-center td2 td-border">
                        <div style="text-align: left">
                            <div class="schoolInfoList">课程名称：<?php echo $item['service_name'] ?></div>
                            <div class="schoolInfoList">讲师名字：<?php echo $item['teacher'] ?></div>
                            <div class="schoolInfoList">课程形式：<?php echo $item['model'] ?></div>
                            <div class="schoolInfoList">适合对象：<?php echo $item['object'] ?></div>
                        </div>
                    </td>
                    <td class="text-center td3 td-border"><?php echo $item['list_type'] ?></td>
                    <td class="text-center td3 td-border"><?php echo $item['list_skf'] ?></td>
                    <td class="text-center td3 td-border"><?php echo $item['time_start'] ?>-<?php echo $item['time_end'] ?></td>
                    <td class="text-center td3 td-border">$<?php echo $item['price'].'/小时' ?></td>

                </tr>
                <tr><td colspan="7" style="height:5px;background-color:#ffffff;padding:0px;border:none"></td></tr>
            <?php endforeach;?>
        </table>
    </div>
</div>


<script>
//    var page = <?//=$page?>//;//当前页数
//    var final_page = <?//=$allpage?>//;//总页数
//    $(function(){
//        if(page == 1){
//            $('.pre_page').css({background:'#f0f0f0',color:'#9d9d9d'});
//        }
//        if(page == final_page){
//            $('.next_page').css({background:'#f0f0f0',color:'#9d9d9d'});
//        }
//    });

    //上一页
//    $('.pre_page').click(function(){
//        var prepage = page - 1;
//        var url = location.href;
//        var num = url.indexOf('?');
//        if(num>0){
//            url =url.substr(num+1);
//            var num2 = url.indexOf('page');
//            if(num2>=0){
//                url = url.substr(0,num2);
//            }
//            url=url?'?'+url:'?';
//            location.href = url+'page='+prepage;
//        }else{
//            location.href = '?page='+prepage;
//        }
//    });
    //下一页
//    $('.next_page').click(function(){
//        var nextpage = page + 1;
//        var url = location.href;
//        var num = url.indexOf('?');
//
//        if(num>0){
//            url =url.substr(num+1);
//            var num2 = url.indexOf('page');
//            if(num2>=0){
//                url = url.substr(0,num2-1);
//            }
//            url=url?'?'+url+'&':'?';
//            location.href = url+'page='+nextpage;
//        }else{
//            location.href = '?page='+nextpage;
//        }
//
//    });




    $(".num").ionRangeSlider({
        min: 1,
        max: 12,
        from:<?php echo empty($ret['basic_school_enrollments_min'])?1:$ret['basic_school_enrollments_min']?>,
        to: <?php echo empty($ret['basic_school_enrollments_max'])?12:$ret['basic_school_enrollments_max']?>,
        type: 'double',//设置类型
        step: 1,
        postfix: "",
        grid: true,
        onChange: saveResult2,
        onFinish: saveResult2
    });

    function saveResult2(data) {
        from2 = data.fromNumber;
        to2 = data.toNumber;
        $('input[name=basic_school_enrollments_min]').val(from2);
        $('input[name=basic_school_enrollments_max]').val(to2);
    };

    $('.chose-tag').click(function(){
        var data_val = $(this).parent().parent().find('input[type=hidden]').val();
        if(	$(this).next('img').attr("src") == "/public/images/web/schoollist/10.png" ){
            add_val = $(this).attr('data-val');
            if(data_val.indexOf(add_val) <0){
                data_val += ','+add_val;
                $(this).parent().parent().find('input[type=hidden]').val(data_val);
            }
            $(this).next('img').attr("src","/public/images/web/schoollist/11.png");
        }else{
            $(this).next('img').attr("src","/public/images/web/schoollist/10.png");
            del_val = $(this).attr('data-val');
            if(data_val.indexOf(del_val) >=0){	//有就去掉
                data_val = data_val.replace(','+del_val,'');
                $(this).parent().parent().find('input[type=hidden]').val(data_val);
            }

        }
    });


    //筛选逻辑
    $('#subBtn').click(function(){
        var type_id = $('input[name=summer_type_id]').val();
        if(type_id){
            type_id = type_id.substring(1);
        }
        var credit = $('input[name=credit]').val();
        if(credit){
            credit = credit.substring(1);
        }
        var international = $('input[name=international]').val();
        if(international){
            international = international.substring(1);
        }
        var min = $('input[name=basic_school_enrollments_min]').val();
        var max = $('input[name=basic_school_enrollments_max]').val();

        location.href="/web/SummerMore?type_id="+type_id+'&credit='+credit+'&international='+international+'&min='+min+'&max='+max;
    });
</script>


