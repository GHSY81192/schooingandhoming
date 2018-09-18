<script type="text/javascript" charset="utf-8" src="/public/js/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/js/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/public/lang/zh-cn/zh-cn.js"></script>

<style type="text/css">
    div{
        width:100%;
    }
</style>
<form class="form-horizontal">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">名称1：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="name_cn" value="<?=$name_cn?$name_cn:''?>" >
            <input type="hidden" name="camp_id" value="<?=$id?$id:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">名称2：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="name_en" value="<?=$name_en?$name_en:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">申请时间：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="time" value="<?=$time?$time:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">适合年龄：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="age" value="<?=$age?$age:''?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">费用：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="price" value="<?=$price?$price:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">项目特色：</label>
        <div class="col-sm-5">
            <script id="feature" type="text/plain" style="width:1024px;height:300px;"><?=$feature?$feature:''?></script>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">项目简介：</label>
        <div class="col-sm-5">
            <script id="intro" type="text/plain" style="width:1024px;height:300px;"><?=$intro?$intro:''?></script>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">行程安排：<br /><span onclick="insertHtml('plan')" style="cursor: pointer;padding-right: 14px">插入模板</span></label>
        <div class="col-sm-5">
            <script id="plan" type="text/plain" style="width:1024px;height:300px;"><?=$plan?$plan:''?></script>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">日程安排(PC)：<br /><span onclick="insertHtml('table')" style="cursor: pointer;padding-right: 14px">插入模板</span></label>
        <div class="col-sm-5">
            <script id="table" type="text/plain" style="width:1024px;height:300px;"><?=$timetable?$timetable:''?></script>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">日程安排(Mobile)：<br /><span onclick="insertHtml('M_table')" style="cursor: pointer;padding-right: 14px">插入模板</span></label>
        <div class="col-sm-5">
            <script id="M_table" type="text/plain" style="width:1024px;height:300px;"><?=$Mtimetable?$Mtimetable:''?></script>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">费用说明：<br /><span onclick="insertHtml('price_include')" style="cursor: pointer;padding-right: 14px">插入模板</span></label>
        <div class="col-sm-5">
            <script id="price_include" type="text/plain" style="width:1024px;height:300px;"><?=$price_include?$price_include:''?></script>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">列表特色1：</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="list_feature1" value="<?=$list_feature1?$list_feature1:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">列表特色2：</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="list_feature2" value="<?=$list_feature2?$list_feature2:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">列表特色3：</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="list_feature3" value="<?=$list_feature3?$list_feature3:''?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" id="add-btn" class="btn btn-primary">确认</button>
        </div>
    </div>
</form>
<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('feature');
    UE.getEditor('intro');
    UE.getEditor('plan');
    UE.getEditor('table');
    UE.getEditor('M_table');
    UE.getEditor('price_include');
    //获取内容
    function getContent(id) {
        var arr = UE.getEditor(id).getContent();
        return arr;
    }
    //插入模板
    function insertHtml(id) {
        var value;
        if(id == 'plan'){
            value = '<table class="camp_table"><tr class="tr1"><td width="20%">日期</td><td width="80%">行程</td></tr><tr><td class="camp_table_day">D1</td><td class="camp_table_txt">上海浦东飞往波士顿, 抵达后由HVC顾问接机, 前往营地</td></tr><tr><td class="camp_table_day">D2</td><td class="camp_table_txt">参观营地、熟悉课程、选课</td></tr><tr><td class="camp_table_day">D3-D33</td><td class="camp_table_txt">进入30天充实欢乐的夏令营之旅</td></tr><tr><td class="camp_table_day">D33</td><td class="camp_table_txt">结营仪式</td></tr><tr><td class="camp_table_day">D34</td><td class="camp_table_txt">HVC顾问送机, 由波士顿飞往上海</td></tr><tr><td class="camp_table_day">D35</td><td class="camp_table_txt">抵达上海，结束行程</td></tr></table>';
        }
        if(id == 'table'){
            value = '<table class="class-table" border="1"> <tr> <td class="col-md-1">时间</td> <td class="col-md-1">7:45</td> <td class="col-md-1">8:00</td> <td class="col-md-1">9:00</td> <td class="col-md-1">12:30</td> <td class="col-md-1">13:30</td> <td class="col-md-1">14:45</td> <td class="col-md-1">15:45</td> <td class="col-md-1">17:30</td> <td class="col-md-1">17:45</td> <td class="col-md-1">19:00</td> <td class="col-md-1">21:00-21:30</td> </tr> <tr> <td class="col-md-1">日程安排</td> <td class="col-md-1">起床</td> <td class="col-md-1">洗漱、收拾、早餐</td> <td class="col-md-1">上课(3节)</td> <td class="col-md-1">午餐和自由活动</td> <td class="col-md-1">宿舍活动、写信、休息</td> <td class="col-md-1">第四节课</td> <td class="col-md-1">兴趣小组、游泳、零食、特设课程</td> <td class="col-md-1">全体营员会</td> <td class="col-md-1">晚餐与晚间课程准备</td> <td class="col-md-1">晚间课程</td> <td class="col-md-1">熄灯检查</td> </tr> </table>';
        }
        if(id == 'M_table'){
            value = '<table class="class-table" border="1"> <tr> <td class="col-xs-4">时间</td> <td class="col-xs-8">日程安排</td> </tr> <tr> <td class="col-xs-4">7:45</td> <td class="col-xs-8">起床</td> </tr> <tr> <td class="col-xs-4">8:00</td> <td class="col-xs-8">洗漱、收拾、早餐</td> </tr> <tr> <td class="col-xs-4">9:00</td> <td class="col-xs-8">上课(3节)</td> </tr> <tr> <td class="col-xs-4">12:30</td> <td class="col-xs-8">午餐和自由活动</td> </tr> <tr> <td class="col-xs-4">13:30</td> <td class="col-xs-8">宿舍活动、写信、休息</td> </tr> <tr> <td class="col-xs-4">14:45</td> <td class="col-xs-8">第四节课</td> </tr> <tr> <td class="col-xs-4">15:45</td> <td class="col-xs-8">兴趣小组、游泳、零食、特设课程</td> </tr> <tr> <td class="col-xs-4">17:30</td> <td class="col-xs-8">全体营员会</td> </tr> <tr> <td class="col-xs-4">17:45</td> <td class="col-xs-8">晚餐与晚间课程准备</td> </tr> <tr> <td class="col-xs-4">19:00</td> <td class="col-xs-8">晚间课程</td> </tr> <tr> <td class="col-xs-4">21:00-21:30</td> <td class="col-xs-8">熄灯检查</td> </tr> </table>';
        }
        if(id == 'price_include'){
            value = '<h4 class="price-include">费用包含:</h4> <ul class="row pr-i-ul"> <li class="col-md-6" >上海-美国往返机票</li> <li class="col-md-6" >夏令营课程活动费</li> <li class="col-md-6" >食宿费</li> <li class="col-md-6" >美国所有集体活动交通费用</li> <li class="col-md-6" >紧急医疗及意外保险</li> <li class="col-md-6" >路途零食杂费和服务费</li> </ul> <h4 class="price-include">UP服务:</h4> <ul class="row pr-i-ul"> <li class="col-md-6" >配合办理学校申请手续</li> <li class="col-md-6" >全程陪同和照顾孩子们的旅途</li> <li class="col-md-6" >入营期间家长和校方的协调沟通</li> <li class="col-md-6" >在美期间实时紧急监护人服务</li> <li class="col-md-6" >入营探望及生活用品补给</li> </ul>';
        }
        UE.getEditor(id).execCommand('insertHtml',value);
    }

    $('#add-btn').click(function(){
        var data = {};
        data.camp_id = $('input[name=camp_id]').val();
        data.name_cn = $('input[name=name_cn]').val();
        data.name_en = $('input[name=name_en]').val();
        data.time = $('input[name=time]').val();
        data.age = $('input[name=age]').val();
        data.price = $('input[name=price]').val();
        data.list_feature1 = $('input[name=list_feature1]').val();
        data.list_feature2 = $('input[name=list_feature2]').val();
        data.list_feature3 = $('input[name=list_feature3]').val();
        data.feature = getContent('feature');
        data.intro = getContent('intro');
        data.plan = getContent('plan');
        data.timetable = getContent('table');
        data.Mtimetable = getContent('M_table');
        data.price_include = getContent('price_include');
        $.post('/admin/Common/camp_add',data,function(data){
            if(data.status === 888){
                layer.alert('编辑成功！',function(){
                    location.href = '/admin/common/camp_list';
                })
            }
        },'json')
    });


</script>