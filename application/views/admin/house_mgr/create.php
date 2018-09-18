<div class="container-fluid" style="margin-top:60px;">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" name="form" role="form" id="form" enctype="multipart/form-data" method="post" action="/admin/common/submit_house">
            <h2 class="col-xs-offset-1 col-xs-10">基本信息</h2>
                <div class="form-group">
                    <label class="col-xs-2 control-label">标题</label>
                    <div class="col-xs-4">
                        <input class="form-control" name="title" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">简介</label>
                    <div class="col-xs-4">
                        <textarea class="form-control" rows="3" name="family_child"></textarea>
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
                        <img src="/upload/default/home/default.jpg" style="width:200px;" id="perview_cover" class="img-thumbnail" />
                    </div>
                    <div class="col-xs-2">
                        <input type="file" name="cover" onchange="showPerview(this,'perview_cover');">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">移动端封面</label>
                    <div class="col-xs-2">
                        <img src="/upload/default/home/default.jpg" style="width:200px;" id="perview_cover_mobile" class="img-thumbnail" />
                    </div>
                    <div class="col-xs-2">
                        <input type="file" name="cover_mobile" onchange="showPerview(this,'perview_cover_mobile');">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">推荐图</label>
                    <div class="col-xs-2">
                        <img src="/upload/default/home/default.jpg" style="width:200px;" id="perview_index_hot_cover" class="img-thumbnail" />
                    </div>
                    <div class="col-xs-2">
                        <input type="file" name="index_hot_cover" onchange="showPerview(this,'perview_index_hot_cover')">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">联系地址</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="address" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">每月租金</label>
                    <div class="col-xs-2">
                        <input class="form-control input-sm" type="text" name="price" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">联系Email</label>
                    <div class="col-xs-4">
                        <input class="form-control input-sm" type="text" name="contact_email" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">联系电话</label>
                    <div class="col-xs-2">
                        <input class="form-control input-sm" type="text" name="contact_number" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">宠物</label>
                    <div class="col-xs-4">
                        <textarea class="form-control" rows="3" name="family_pet"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">建造时间</label>
                    <div class="col-xs-1">
                        <input class="form-control input-sm datetimepicker" type="text" name="house_create_time" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">最近一次装修时间</label>
                    <div class="col-xs-1">
                        <input class="form-control input-sm datetimepicker" type="text" name="house_last_decorate" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">房屋类型</label>
                    <div class="col-xs-2">
                        <input class="form-control input-sm" type="text" name="house_type" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">房间数</label>
                    <div class="col-xs-2">
                        <input class="form-control input-sm" type="text" name="house_room" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-2 control-label">族裔</label>
                    <div class="col-xs-2">
                        <input class="form-control input-sm" type="text" name="race" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">宗教信仰</label>
                    <div class="col-xs-2">
                        <input class="form-control input-sm" type="text" name="religion" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">主要职业</label>
                    <div class="col-xs-2">
                        <input class="form-control input-sm" type="text" name="profession" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">主要语言</label>
                    <div class="col-xs-2">
                        <select class="form-control input-sm" name="language">
                            <?php foreach($lang as $k => $v): ?>
                            <option value="<?php echo $k ?>"><?php echo $v ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-2 control-label">是否热门</label>
                    <div class="col-xs-1">
                        <select class="form-control input-sm" name="is_hot">
                            <option value="0">否</option>
                            <option value="1">是</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">排序</label>
                    <div class="col-xs-1">
                        <input class="form-control input-sm" type="text" name="sort" value="0">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">经度</label>
                    <div class="col-xs-1">
                        <input class="form-control input-sm" type="text" name="lng" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">纬度</label>
                    <div class="col-xs-1">
                        <input class="form-control input-sm" type="text" name="lat" value="">
                    </div>
                    <div class="col-xs-1">
                        <a class="btn btn-primary" onclick="getDistance();">查看附近学校</a>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 control-label">关联学校ID（多个ID逗号分割）</label>
                    <div class="col-xs-5">
                        <input class="form-control input-sm" type="text" name="suggest_school" value="">
                    </div>
                </div>
                <h2 class="col-xs-offset-1 col-xs-10">规则</h2>
                <div class="form-group">
                    <label class="col-xs-2 control-label"></label>
                    <div class="col-xs-8">
                        <?php foreach($house_rule_items as $item): ?>
                            <button type="button" class="btn btn-default" data-id=<?php echo $item['id'] ?> style="margin:2px;" data-type="rule"><?php echo $item['name'] ?></button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <h2 class="col-xs-offset-1 col-xs-10">家庭成员</h2>
                <div class="form-group" id="family_block">
                    <label class="col-xs-2 control-label"></label>
                    <div class="col-xs-6"><input class="btn btn-primary" type="button" value="添加新的家庭成员" onclick="addFamily();"></div>
                </div>
                <h2 class="col-xs-offset-1 col-xs-10">照片视频</h2>
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
        hiddenHtml.push("<input type=\"hidden\" name=\"action\" value=\"create\">");

        var family_ids = [];
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

function getDistance(){
	lng = $('input[name=lng]').val();
	lat = $('input[name=lat]').val();
	if(!lng || !lat){
		alert('经纬度不能为空!');return false;
	}
	$.post('/admin/common/getSchoolDistance',{'lat':lat,'lng':lng},function(data){
		if(data.status){
			html = '<tr><td>学校名称</td><td>学校ID</td><td>距离（KM）</td><td>绑定</td></tr>';
			$.each(data.msg,function(k,v){
				html +='<tr><td>'+v.name_cn+'</td><td>'+v.id+'</td><td>'+v.distance+'</td><td><input type="checkbox" onclick="addSchool(this,'+v.id+')" /></td></tr>';
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

function deleteFamily(id) {
    $("#family_item_" + id).remove();
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