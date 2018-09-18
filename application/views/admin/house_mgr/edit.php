<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" name="form" role="form" id="form" enctype="multipart/form-data" method="post" action="/admin/common/submit_house">
            <input type="hidden" name="id" value="<?php echo $house['id'] ?>"/>
            <h2 class="col-xs-offset-1 col-xs-10">基本信息</h2>
                <div class="form-group">
                    <label class="col-xs-2 control-label">标题</label>
                    <div class="col-xs-4">
                        <input class="form-control" name="title" value="<?php echo $house['title'] ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">简介</label>
                    <div class="col-xs-4">
                        <textarea class="form-control" rows="3" name="family_child"><?php echo $house['family_child'] ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">城市</label>
                    <div class="col-xs-1">
                        <select class="form-control input-sm" id="state_id" name="state_id">
                            <?php foreach($state as $item): ?>
                            <option value="<?php echo $item['id'] ?>"><?php echo $item['name_cn'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-xs-1">
                        <select class="form-control input-sm" id="city_id" name="city_id">
                            
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">封面</label>
                    <div class="col-xs-2">
                        <img src="/upload/<?php echo get_filepath_by_route_id($house['id'],$house['cover'],1) ?>" style="width:200px;" id="perview_cover" class="img-thumbnail" />
                    </div>
                    <div class="col-xs-2">
                        <input type="file" name="cover" onchange="showPerview(this,'perview_cover');">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">移动端封面</label>
                    <div class="col-xs-2">
                        <img src="/upload/<?php echo get_filepath_by_route_id($house['id'],$house['cover_mobile'],1) ?>" style="width:200px;" id="perview_cover_mobile" class="img-thumbnail" />
                    </div>
                    <div class="col-xs-2">
                        <input type="file" name="cover_mobile" onchange="showPerview(this,'perview_cover_mobile');">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">推荐图</label>
                    <div class="col-xs-2">
                        <img src="/upload/<?php echo get_filepath_by_route_id($house['id'],$house['index_hot_cover'],1) ?>" style="width:200px;" id="perview_index_hot_cover" class="img-thumbnail" />
                    </div>
                    <div class="col-xs-2">
                        <input type="file" name="index_hot_cover" onchange="showPerview(this,'perview_index_hot_cover')">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">联系地址</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="address" value="<?php echo $house['address'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">每月租金</label>
                    <div class="col-xs-2">
                        <input class="form-control input-sm" type="text" name="price" value="<?php echo $house['price'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">联系Email</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="contact_email" value="<?php echo $house['contact_email'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">联系电话</label>
                    <div class="col-xs-2">
                        <input class="form-control input-sm" type="text" name="contact_number" value="<?php echo $house['contact_number'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">宠物</label>
                    <div class="col-xs-4">
                        <textarea class="form-control" rows="3" name="family_pet"><?php echo $house['family_pet'] ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">建造时间</label>
                    <div class="col-xs-1">
                        <input class="form-control input-sm datetimepicker" type="text" name="house_create_time" value="<?php echo $house['house_create_time'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">最近一次装修时间</label>
                    <div class="col-xs-1">
                        <input class="form-control input-sm datetimepicker" type="text" name="house_last_decorate" value="<?php echo $house['house_last_decorate'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">房屋类型</label>
                    <div class="col-xs-2">
                        <input class="form-control input-sm" type="text" name="house_type" value="<?php echo $house['house_type'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">房间数</label>
                    <div class="col-xs-2">
                        <input class="form-control input-sm" type="text" name="house_room" value="<?php echo $house['house_room'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-2 control-label">族裔</label>
                    <div class="col-xs-2">
                        <input class="form-control input-sm" type="text" name="race" value="<?php echo $house['race'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">宗教信仰</label>
                    <div class="col-xs-2">
                        <input class="form-control input-sm" type="text" name="religion" value="<?php echo $house['religion'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">主要职业</label>
                    <div class="col-xs-2">
                        <input class="form-control input-sm" type="text" name="profession" value="<?php echo $house['profession'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">主要语言</label>
                    <div class="col-xs-2">
                        <select class="form-control input-sm" name="language">
                            <?php foreach($lang as $k => $v): ?>
                            <option value="<?php echo $k ?>" <?php echo $house['language'] == $k ? "selected='selected'" : "" ?>><?php echo $v ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-2 control-label">是否热门</label>
                    <div class="col-xs-1">
                        <select class="form-control input-sm" name="is_hot">
                            <option value="0" <?php echo $house['is_hot'] == 0 ? "selected='selected'" : "" ?>>否</option>
                            <option value="1" <?php echo $house['is_hot'] == 1 ? "selected='selected'" : "" ?>>是</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">排序</label>
                    <div class="col-xs-1">
                        <input class="form-control input-sm" type="text" name="sort" value="<?php echo $house['sort'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">经度</label>
                    <div class="col-xs-1">
                        <input class="form-control input-sm" type="text" name="lng" value="<?php echo $house['lng'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">纬度</label>
                    <div class="col-xs-1">
                        <input class="form-control input-sm" type="text" name="lat" value="<?php echo $house['lat'] ?>">
                    </div>
                    <div class="col-xs-1">
                        <a class="btn btn-primary" onclick="getDistance();">查看附近学校</a>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-xs-2 control-label">关联学校ID（多个ID逗号分割）</label>
                    <div class="col-xs-5">
                        <input class="form-control input-sm" type="text" name="suggest_school" value="<?php echo $house['suggest_school'] ?>">
                    </div>
                </div>
                <h2 class="col-xs-offset-1 col-xs-10">规则</h2>
                <div class="form-group">
                    <label class="col-xs-2 control-label"></label>
                    <div class="col-xs-8">
                        <?php foreach($house_rule_items as $item): ?>
                            <button type="button" class="btn btn-<?php echo $item['is_selected'] ? 'success' : 'default' ?>" data-id=<?php echo $item['id'] ?> style="margin:2px;" data-type="rule"><?php echo $item['name'] ?></button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <h2 class="col-xs-offset-1 col-xs-10">家庭成员</h2>
                <div class="form-group" id="family_block">
                    <label class="col-xs-2 control-label"></label>
                    <div class="col-xs-6"><input class="btn btn-primary" type="button" value="添加新的家庭成员" onclick="addFamily();"></div>
                </div>
                <?php foreach($families as $item): ?>
                <div class="form-group" id="family_item_<?php echo $item['id'] ?>">
                    <label class="col-xs-2 control-label"></label>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <td>姓名</td><td><input class="form-control input-sm" type="text" name="name_<?php echo $item['id'] ?>" value="<?php echo $item['name'] ?>"></td>
                                <td>年龄</td><td><input class="form-control input-sm" type="text" name="age_<?php echo $item['id'] ?>" value="<?php echo $item['age'] ?>"></td>
                            </tr>
                            <tr>
                                <td>性别</td><td>
                                    <select class="form-control input-sm" name="gender_<?php echo $item['id'] ?>">
                                        <?php foreach($gender as $k => $v): ?>
                                        <option value="<?php echo $k ?>" <?php echo $item['gender'] == $k ? "selected='selected'" : "" ?>><?php echo $v ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>角色</td><td>
                                    <select class="form-control input-sm" name="role_<?php echo $item['id'] ?>">
                                        <?php foreach($role as $k => $v): ?>
                                        <option value="<?php echo $k ?>" <?php echo $item['role'] == $k ? "selected='selected'" : "" ?>><?php echo $v ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>种族</td><td>
                                    <select class="form-control input-sm" name="race_<?php echo $item['id'] ?>">
                                        <?php foreach($race as $k => $v): ?>
                                        <option value="<?php echo $k ?>" <?php echo $item['race'] == $k ? "selected='selected'" : "" ?>><?php echo $v ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>职业</td><td>
                                    <select class="form-control input-sm" name="profession_<?php echo $item['id'] ?>">
                                        <?php foreach($profession as $k => $v): ?>
                                        <option value="<?php echo $k ?>" <?php echo $item['profession'] == $k ? "selected='selected'" : "" ?>><?php echo $v ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>年收入</td><td>
                                    <select class="form-control input-sm" name="income_<?php echo $item['id'] ?>">
                                        <?php foreach($income as $k => $v): ?>
                                        <option value="<?php echo $k ?>" <?php echo $item['income'] == $k ? "selected='selected'" : "" ?>><?php echo $v ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>宗教信仰</td><td>
                                    <select class="form-control input-sm" name="religion_<?php echo $item['id'] ?>">
                                        <?php foreach($religion as $k => $v): ?>
                                        <option value="<?php echo $k ?>" <?php echo $item['religion'] == $k ? "selected='selected'" : "" ?>><?php echo $v ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>语言</td><td>
                                    <select class="form-control input-sm" name="language_<?php echo $item['id'] ?>">
                                        <?php foreach($lang as $k => $v): ?>
                                        <option value="<?php echo $k ?>" <?php echo $item['language'] == $k ? "selected='selected'" : "" ?>><?php echo $v ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td>爱好</td><td><input class="form-control input-sm" type="text" name="hobbies_<?php echo $item['id'] ?>" value="<?php echo $item['hobbies'] ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align:right"><button type="button" class="btn btn-danger btn-sm" onclick="deleteFamily(<?php echo $item['id'] ?>)">删除</button></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php endforeach; ?>
                <h2 class="col-xs-offset-1 col-xs-10">照片视频</h2>
                <div class="form-group">
                    <label class="col-xs-2 control-label"></label>
                    <?php foreach($images as $item): ?>
                    <div class="col-xs-2" id="image_block_<?php echo $item['id'] ?>">
                        <p class="text-center"><img src="/upload/<?php echo get_filepath_by_route_id($item['house_id'],$item['file_name']) ?>" style="width:200px;" class="img-thumbnail" /></p>
                        <p class="text-center"><button type="button" class="btn btn-danger btn-sm" onclick="deleteImage(<?php echo $item['id'] ?>);">删除</button></p>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php for($i=1;$i<=5;$i++): ?>
                <div class="form-group">
                    <label class="col-xs-2 control-label">图片上传</label>
                    <div class="col-xs-2">
                        <img src="/upload/default/home/default.jpg" style="width:200px;" class="img-thumbnail" id="perview_image_<?php echo $i ?>" />
                    </div>
                    <div class="col-xs-2">
                        <input type="file" name="image_<?php echo $i ?>" onchange="showPerview(this,'perview_image_<?php echo $i ?>')">
                    </div>
                </div>
                <?php endfor; ?>
                <div class="form-group">
                    <div class="col-xs-offset-4 col-xs-10">
                        <input class="btn btn-success" type="button" value="保存" id="submitForm">
                        <input class="btn btn-info" type="button" value="返回" id="back">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="areaModal"  role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">学校距离列表</h4>
      </div>
      <div class="modal-body row">
      	<table class="table"  id="distanceArea">
      		
      	</table>
      	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
var delete_image_ids = [];

$(document).ready(function() {
    $('.datetimepicker').datetimepicker({
        format: 'yyyy',
        language: 'zh-CN',
        startView: 'decade',
        minView: 'decade',
        maxView: 'decade',
        autoClose: true,
    });

    $("button[data-type]").click(function(){
        var is_selected = $(this).hasClass('btn-success');
        if(is_selected) {
            $(this).removeClass('btn-success').addClass('btn-default');
        } else {
            $(this).removeClass('btn-default').addClass('btn-success');
        }
    });

    <?php if(!empty($house['city_id'])): ?>
    var city_id = <?php echo $house['city_id'] ?>;
    get_state(city_id,function(resp){
        $("#state_id").val(resp.id);
        get_city(resp.id,function(arr){
            var html = [];
            for(var i in arr) {
                html.push("<option value=\""+arr[i].id+"\">"+arr[i].name_cn+"</option>");
            }
            $("#city_id").html(html.join(""));
            $("#city_id").val(city_id);
        });
    });
    <?php endif; ?>

    $("#state_id").change(function(){
        var state_id = $(this).val();
        get_city(state_id,function(arr){
            var html = [];
            for(var i in arr) {
                html.push("<option value=\""+arr[i].id+"\">"+arr[i].name_cn+"</option>");
            }
            $("#city_id").html(html.join(""));
        });
    });

    $("#back").click(function(){
        window.location.href = "/admin/common/house_mgr";
    });

    $("#submitForm").click(function(){
        var $form = $("#form");
    	var hiddenHtml = [];
        hiddenHtml.push("<input type=\"hidden\" name=\"action\" value=\"update\">");
        hiddenHtml.push("<input type=\"hidden\" name=\"delete_image_ids\" value=\""+delete_image_ids.join(",")+"\">");

        var family_ids = [];
        $("[id^='family_item_']").each(function(){
            var element_id = $(this).attr('id');
            var family_id = element_id.split('_')[2];
            family_ids.push(family_id);
        });
        $("[id^='family_id_']").each(function(){
            var element_id = $(this).attr('id');
            var family_id = element_id.split('_')[2];
            family_ids.push(family_id);
        });
        hiddenHtml.push("<input type=\"hidden\" name=\"family_ids\" value=\""+family_ids.join(",")+"\">");

        var rule_ids = [];
        $("button[data-type='rule']").each(function(){
            if($(this).hasClass('btn-success')) {
                rule_ids.push($(this).attr('data-id'));
            }
        });
        hiddenHtml.push("<input type=\"hidden\" name=\"rule_ids\" value=\""+rule_ids.join(",")+"\">");

    	$form.append(hiddenHtml.join(""));
    	$form.submit();
    });
});

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

function get_state(city_id,callback) {
    $.getJSON('/ajax/get_state/' + city_id,{},function(resp){
        callback(resp);
    });
}

function get_city(state_id,callback) {
    $.getJSON('/ajax/get_city_list/' + state_id,{},function(resp){
        callback(resp);
    });
}

function deleteImage(id) {
    delete_image_ids.push(id);
    $("#image_block_" + id).remove();
}

function deleteFamily(id) {
    $("#family_item_" + id).remove();
}
function getDistance(){
	lng = $('input[name=lng]').val();
	lat = $('input[name=lat]').val();
	if(!lng || !lat){
		alert('经纬度不能为空!');return false;
	}
	var school_id_string = $('input[name=suggest_school]').val();
	$.post('/admin/common/getSchoolDistance',{'lat':lat,'lng':lng},function(data){
		if(data.status){
			html = '<tr><td>学校名称</td><td>学校ID</td><td>距离（KM）</td><td>绑定</td></tr>';
			$.each(data.msg,function(k,v){
				checkd = '';
				if(school_id_string.indexOf(v.id+',') >=0){
					checkd = 'checked';
				}
				html +='<tr><td>'+v.name_cn+'</td><td>'+v.id+'</td><td>'+v.distance+'</td><td><input '+checkd+' type="checkbox" onclick="addSchool(this,'+v.id+')" /></td></tr>';
			})
			$('#distanceArea').html(html);
			$('#areaModal').modal();
		}
	},'json')
}
function addSchool(ts,id){
	if( $(ts).prop('checked') ){
		var school_id_string = $('input[name=suggest_school]').val();
		add_id = id+',';	
		if(school_id_string.indexOf(add_id) <0){
			school_id_string = school_id_string + add_id;
			$('input[name=suggest_school]').val(school_id_string)
		}
	}else{
		var school_id_string = $('input[name=suggest_school]').val();
		add_id = id+',';	
		if(school_id_string.indexOf(add_id) >=0){
			school_id_string = school_id_string.replace(add_id,'');
			$('input[name=suggest_school]').val(school_id_string)
		}
	}
}

function addFamily() {
    var randomId = new Date().getTime();
    var FAMILY_TEMPLATE_ARR = [];
    FAMILY_TEMPLATE_ARR.push("<div class=\"form-group\" id=\"family_id_"+randomId+"\">");
    FAMILY_TEMPLATE_ARR.push("<label class=\"col-xs-2 control-label\"></label>");
    FAMILY_TEMPLATE_ARR.push("<div class=\"col-xs-6\">");
    FAMILY_TEMPLATE_ARR.push("<table class=\"table table-bordered table-hover\">");
    FAMILY_TEMPLATE_ARR.push("<tr>");
    FAMILY_TEMPLATE_ARR.push("<td>姓名</td><td><input class=\"form-control input-sm\" type=\"text\" name=\"name_"+randomId+"\" value=\"\"></td>");
    FAMILY_TEMPLATE_ARR.push("<td>年龄</td><td><input class=\"form-control input-sm\" type=\"text\" name=\"age_"+randomId+"\" value=\"\"></td>");
    FAMILY_TEMPLATE_ARR.push("</tr>");
    FAMILY_TEMPLATE_ARR.push("<tr>");
    FAMILY_TEMPLATE_ARR.push("<td>性别</td><td>");
    FAMILY_TEMPLATE_ARR.push("<select class=\"form-control input-sm\" name=\"gender_"+randomId+"\">");
    <?php foreach($gender as $k => $v): ?>
    FAMILY_TEMPLATE_ARR.push("<option value=\"<?php echo $k ?>\"><?php echo $v ?></option>");
    <?php endforeach; ?>
    FAMILY_TEMPLATE_ARR.push("</select>");
    FAMILY_TEMPLATE_ARR.push("</td>");
    FAMILY_TEMPLATE_ARR.push("<td>角色</td><td>");
    FAMILY_TEMPLATE_ARR.push("<select class=\"form-control input-sm\" name=\"role_"+randomId+"\">");
    <?php foreach($role as $k => $v): ?>
    FAMILY_TEMPLATE_ARR.push("<option value=\"<?php echo $k ?>\"><?php echo $v ?></option>");
    <?php endforeach; ?>
    FAMILY_TEMPLATE_ARR.push("</select>");
    FAMILY_TEMPLATE_ARR.push("</td>");
    FAMILY_TEMPLATE_ARR.push("</tr>");
    FAMILY_TEMPLATE_ARR.push("<tr>");
    FAMILY_TEMPLATE_ARR.push("<td>种族</td><td>");
    FAMILY_TEMPLATE_ARR.push("<select class=\"form-control input-sm\" name=\"race_"+randomId+"\">");
    <?php foreach($race as $k => $v): ?>
    FAMILY_TEMPLATE_ARR.push("<option value=\"<?php echo $k ?>\"><?php echo $v ?></option>");
    <?php endforeach; ?>
    FAMILY_TEMPLATE_ARR.push("</select>");
    FAMILY_TEMPLATE_ARR.push("</td>");
    FAMILY_TEMPLATE_ARR.push("<td>职业</td><td>");
    FAMILY_TEMPLATE_ARR.push("<select class=\"form-control input-sm\" name=\"profession_"+randomId+"\">");
    <?php foreach($profession as $k => $v): ?>
    FAMILY_TEMPLATE_ARR.push("<option value=\"<?php echo $k ?>\"><?php echo $v ?></option>");
    <?php endforeach; ?>
    FAMILY_TEMPLATE_ARR.push("</select>");
    FAMILY_TEMPLATE_ARR.push("</td>");
    FAMILY_TEMPLATE_ARR.push("</tr>");
    FAMILY_TEMPLATE_ARR.push("<tr>");
    FAMILY_TEMPLATE_ARR.push("<td>年收入</td><td>");
    FAMILY_TEMPLATE_ARR.push("<select class=\"form-control input-sm\" name=\"income_"+randomId+"\">");
    <?php foreach($income as $k => $v): ?>
    FAMILY_TEMPLATE_ARR.push("<option value=\"<?php echo $k ?>\"><?php echo $v ?></option>");
    <?php endforeach; ?>
    FAMILY_TEMPLATE_ARR.push("</select>");
    FAMILY_TEMPLATE_ARR.push("</td>");
    FAMILY_TEMPLATE_ARR.push("<td>宗教信仰</td><td>");
    FAMILY_TEMPLATE_ARR.push("<select class=\"form-control input-sm\" name=\"religion_"+randomId+"\">");
    <?php foreach($religion as $k => $v): ?>
    FAMILY_TEMPLATE_ARR.push("<option value=\"<?php echo $k ?>\"><?php echo $v ?></option>");
    <?php endforeach; ?>
    FAMILY_TEMPLATE_ARR.push("</select>");
    FAMILY_TEMPLATE_ARR.push("</td>");
    FAMILY_TEMPLATE_ARR.push("</tr>");
    FAMILY_TEMPLATE_ARR.push("<tr>");
    FAMILY_TEMPLATE_ARR.push("<td>语言</td><td>");
    FAMILY_TEMPLATE_ARR.push("<select class=\"form-control input-sm\" name=\"lang_"+randomId+"\">");
    <?php foreach($lang as $k => $v): ?>
    FAMILY_TEMPLATE_ARR.push("<option value=\"<?php echo $k ?>\"><?php echo $v ?></option>");
    <?php endforeach; ?>
    FAMILY_TEMPLATE_ARR.push("</select>");
    FAMILY_TEMPLATE_ARR.push("</td>");
    FAMILY_TEMPLATE_ARR.push("<td>爱好</td><td><input class=\"form-control input-sm\" type=\"text\" name=\"hobbies_"+randomId+"\" value=\"\"></td>");
    FAMILY_TEMPLATE_ARR.push("</tr>");
    FAMILY_TEMPLATE_ARR.push("<tr>");
    FAMILY_TEMPLATE_ARR.push("<td colspan=\"4\" style=\"text-align:right\"><button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"deleteFamilyItem('family_id_"+randomId+"');\">删除</button></td>");
    FAMILY_TEMPLATE_ARR.push("</tr>");
    FAMILY_TEMPLATE_ARR.push("</table>");
    FAMILY_TEMPLATE_ARR.push("</div>");
    FAMILY_TEMPLATE_ARR.push("</div>");

    var FAMILY_TEMPLATE_HTML = FAMILY_TEMPLATE_ARR.join('');

    var $item = $("#family_block");
    $(FAMILY_TEMPLATE_HTML).insertAfter($item);
}

function deleteFamilyItem(id) {
    $("#" + id).remove();
}
</script>