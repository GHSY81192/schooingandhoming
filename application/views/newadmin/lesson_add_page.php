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
<div style="margin-top: 30px" class="form-horizontal">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">课程名称：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="name" value="<?=$data['name']?$data['name']:''?>" >

        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">排序：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="desc" value="<?=$data['desc']?$data['desc']:0?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">导师：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="author" value="<?=$data['author']?$data['author']:''?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">小班费用：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="object_price" value="<?=$data['once_price']?$data['once_price']:''?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">1对1费用：</label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="price" value="<?=$data['price']?$data['price']:''?>" >
        </div>
    </div>
    <form id="img_form" action="/admin/admin/lesson_upload_img" method="post" enctype="multipart/form-data">
        <input type="hidden" name="lesson_id" value="<?=$data['id']?$data['id']:''?>">
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">封面图片：</label>
            <div class="col-xs-2">
                <?php if(empty($data['img'])):?>
                    <img src="/upload/default/school/default.jpg" style="width:200px;" id="perview_cover" class="img-thumbnail" />
                <?php else:?>
                    <img src="/public/images/web/lesson/images/<?=$data['img']?>" style="width:200px;" id="perview_cover" class="img-thumbnail" />
                <?php endif;?>
            </div>
            <div class="col-xs-2">
                <input type="file" id="fileToUpload1" name="cover1" onchange="showPerview(this,'perview_cover');">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">导师头像(85*85px)：</label>
            <div class="col-xs-1">
                <?php if(empty($data['img'])):?>
                    <img src="/upload/default/school/default.jpg" style="width:85px;" id="perview_cover2" class="img-thumbnail" />
                <?php else:?>
                    <img src="/public/images/web/lesson/images/<?=$data['headimg']?>" style="width:85px;" id="perview_cover2" class="img-thumbnail" />
                <?php endif;?>
            </div>
            <div class="col-xs-2">
                <input type="file" id="fileToUpload2" name="cover2" onchange="showPerview(this,'perview_cover2');">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">导师图片：</label>
            <div class="col-xs-2">
                <?php if(empty($data['img'])):?>
                    <img src="/upload/default/school/default.jpg" style="width:200px;" id="perview_cover3" class="img-thumbnail" />
                <?php else:?>
                    <img src="/public/images/web/lesson/images/<?=$data['bigimg']?>" style="width:200px;" id="perview_cover3" class="img-thumbnail" />
                <?php endif;?>
            </div>
            <div class="col-xs-2">
                <input type="file" id="fileToUpload3" name="cover3" onchange="showPerview(this,'perview_cover3');">
            </div>
        </div>
    </form>


    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">目标人群：<br /><span onclick="insertHtml('people')" style="cursor: pointer;padding-right: 14px">插入模板</span></label>
        <div class="col-sm-5">
            <script id="people" type="text/plain" style="width:1024px;height:200px;"><?=$data['people']?$data['people']:''?></script>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">导师简介：</label>
        <div class="col-sm-5">
            <textarea style="width: 1024px;height: 150px" class="form-control" name="teacher" ><?=$data['teacher']?$data['teacher']:''?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">课程概览(中文)：</label>
        <div class="col-sm-5">
            <textarea style="width: 1024px;height: 150px" class="form-control" name="intro" ><?=$data['intro']?$data['intro']:''?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">课程概览(英文)：</label>
        <div class="col-sm-5">
            <textarea style="width: 1024px;height: 150px" class="form-control" name="intro_en" ><?=$data['intro_en']?$data['intro_en']:''?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">课程目标：</label>
        <div class="col-sm-5">
            <textarea style="width: 1024px;height: 150px" class="form-control" name="aim" ><?=$data['aim']?$data['aim']:''?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">课程时间：<br /><span onclick="insertHtml('classtime')" style="cursor: pointer;padding-right: 14px">插入模板</span></label>
        <div class="col-sm-5">
            <script id="classtime" type="text/plain" style="width:1024px;height:200px;"><?=$data['classtime']?$data['classtime']:''?></script>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">课程大纲：<br /><span onclick="insertHtml('content')" style="cursor: pointer;padding-right: 14px">插入模板</span></label>
        <div class="col-sm-5">
            <script id="content" type="text/plain" style="width:1024px;height:200px;"><?=$data['content']?$data['content']:''?></script>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">上课方式：<br /><span onclick="insertHtml('way')" style="cursor: pointer;padding-right: 14px">插入模板</span></label>
        <div class="col-sm-5">
            <script id="way" type="text/plain" style="width:1024px;height:200px;"><?=$data['way']?$data['way']:''?></script>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">参考用书：</label>
        <div class="col-sm-10">
            <?php foreach($book as $v):?>
                <div class="checkbox">
                    <label>
                        <input name="lesson_book" type="checkbox" <?php echo in_array($v['id'],$data['book'])?'checked':''?> value="<?=$v['id']?>"><?=$v['book_name']?>
                    </label>
                </div>
            <?php endforeach;?>

        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" id="add-btn" class="btn btn-primary">确认</button>
        </div>
    </div>

</div>
<script type="text/javascript"  src="/public/js/ajaxfileupload.js"></script>
<script type="text/javascript">
    layui.use(['laydate','element','laypage','layer'], function(){
        $ = layui.jquery;//jquery
        laydate = layui.laydate;//日期插件
        lement = layui.element();//面包导航

        layer = layui.layer;//弹出层

    });
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('people');
    UE.getEditor('classtime');
    UE.getEditor('content');
    UE.getEditor('way');


    //获取内容
    function getContent(id) {
        var arr = UE.getEditor(id).getContent();
        return arr;
    }


    $('#add-btn').click(function(){
        var data = {};
        data.lesson_id = $('input[name=lesson_id]').val();
        data.name = $('input[name=name]').val();
        data.desc = $('input[name=desc]').val();
        data.author = $('input[name=author]').val();
        data.once_price = $('input[name=once_price]').val();
        data.price = $('input[name=price]').val();
        data.teacher = $('textarea[name=teacher]').val();
        data.intro = $('textarea[name=intro]').val();
        data.intro_en = $('textarea[name=intro_en]').val();
        data.aim = $('textarea[name=aim]').val();
        data.people = getContent('people');
        data.classtime = getContent('classtime');
        data.content = getContent('content');
        data.way = getContent('way');
        var ids ='';
        $('input[name=lesson_book]:checked').each(function(){
            ids += $(this).val() + ',';
        });
        data.lesson_book = ids;

    $.post('/admin/admin/lesson_add',data,function(res){
            if(res.status === 888){
                $('input[name=lesson_id]').val(res.msg);
                $('#img_form').submit();
            }
        },'json')
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


    function insertHtml(id) {
        var value;
        if(id == 'people'){
            value = '<ul class="sqllistul"> <li>6年级或以上中学生</li> <li>拟通过阅读经典增进对英美文化了解的学生群体</li> <li>具有较强的英文阅读及理解能力</li> </ul>';
        }
        if(id == 'classtime'){
            value = '<table class="hidden-xs" align="center" style="text-align: center;background: #f1f1f1"> <tr> <td class="td1">7月12日</td> <td>7月15日</td> <td class="td1">7月19日</td> <td>7月22日</td> <td class="td1">7月26日</td> <td>7月29日</td> <td class="td1">8月2日</td> <td>8月5日</td> <td class="td1">8月9日</td> <td>8月12日</td> </tr> <tr> <td class="td1">9:00-10:00</td> <td>21:00-22:00</td> <td class="td1">9:00-10:00</td> <td>21:00-22:00</td> <td class="td1">9:00-10:00</td> <td>21:00-22:00</td> <td class="td1">9:00-10:00</td> <td>21:00-22:00</td> <td class="td1">9:00-10:00</td> <td>21:00-22:00</td> </tr> </table> <table class="visible-xs-block" align="center" style="text-align: center;background: #f1f1f1"> <tr class="td1 row"> <td class="col-xs-6">7月12日</td> <td class="col-xs-6">9:00-10:00</td> </tr> <tr class="row"> <td class="col-xs-6">7月15日</td> <td class="col-xs-6">21:00-22:00</td> </tr> <tr class="td1 row"> <td class="col-xs-6">7月19日</td> <td class="col-xs-6">9:00-10:00</td> </tr> <tr class="row"> <td class="col-xs-6">7月22日</td> <td class="col-xs-6">21:00-22:00</td> </tr> <tr class="td1 row"> <td class="col-xs-6">7月26日</td> <td class="col-xs-6">9:00-10:00</td> </tr> <tr class="row"> <td class="col-xs-6">7月29日</td> <td class="col-xs-6">21:00-22:00</td> </tr> <tr class="td1 row"> <td class="col-xs-6">8月2日</td> <td class="col-xs-6">9:00-10:00</td> </tr> <tr class="row"> <td class="col-xs-6">8月5日</td> <td class="col-xs-6">21:00-22:00</td> </tr> <tr class="td1 row"> <td class="col-xs-6">8月9日</td> <td class="col-xs-6">9:00-10:00</td> </tr> <tr class="row"> <td class="col-xs-6">8月12日</td> <td class="col-xs-6">21:00-22:00</td> </tr> </table>';
        }

        if(id == 'content'){
            value = '<div class="DG_edit_con row"> <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> <div class="col-md-2 class_timeNO">第一课时</div> <div class="col-md-10 class_box"> <p class="DG_right_1">Introduction to the course <span class="inline_span">课程简介</span></p> <p class="DG_right_2">课后作业</p> <div class="DG_Bg"></div> <p class="DG_right_3"><span>Read and be ready to discuss Romeo and Juliet Acts 1 and 2</span><span class="inline_span">阅读并准备好讨论罗密欧与朱丽叶第一幕</span></p> </div> </div> <div class="DG_edit_con row"> <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> <div class="col-md-2 class_timeNO">第二课时</div> <div class="col-md-10 class_box"> <p class="DG_right_1">Romeo and Juliet,Act 1-2 <span class="inline_span">罗密欧与朱丽叶第一、二幕</span></p> <p class="DG_right_2">课后作业</p> <div class="DG_Bg"></div> <p class="DG_right_3"><span>Read and be ready to discuss Acts 3 and 4</span><span class="inline_span">阅读并准备好讨论罗密欧与朱丽叶第三、四幕</span></p> </div> </div> <div class="DG_edit_con row"> <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> <div class="col-md-2 class_timeNO">第三课时</div> <div class="col-md-10 class_box"> <p class="DG_right_1">Romeo and Juliet,Act 3-4 <span class="inline_span">罗密欧与朱丽叶第三、四幕</span></p> <p class="DG_right_2">课后作业</p> <div class="DG_Bg"></div> <p class="DG_right_3"><span>Read Act 5, and be ready to discuss the entire play. write-up on one character</span><span class="inline_span">阅读罗密欧与朱丽叶第五幕，做好准备讨论整个剧本，并就其中的一个角色写一篇评论</span></p> </div> </div> <div class="DG_edit_con row"> <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> <div class="col-md-2 class_timeNO">第四课时</div> <div class="col-md-10 class_box"> <p class="DG_right_1">Romeo and Juliet,Act 5,recap and discuss writeups <span class="inline_span">罗密欧与朱丽叶第五幕， 概述并讨论评论文章</span></p> <p class="DG_right_2">课后作业</p> <div class="DG_Bg"></div> <p class="DG_right_3"><span>read and be ready to discuss MacBeth, Acts 1 and 2</span><span class="inline_span">阅读并准备好讨论麦克白第一、二幕</span></p> </div> </div> <div class="DG_edit_con row"> <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> <div class="col-md-2 class_timeNO">第五课时</div> <div class="col-md-10 class_box"> <p class="DG_right_1">MacBeth, Act 1-2 <span class="inline_span">麦克白第一、二幕</span></p> <p class="DG_right_2">课后作业</p> <div class="DG_Bg"></div> <p class="DG_right_3"><span>read and be ready to discuss Acts 3 and 4</span><span class="inline_span">阅读并准备好讨论麦克白第三、四幕</span></p> </div> </div> <div class="DG_edit_con row"> <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> <div class="col-md-2 class_timeNO">第六课时</div> <div class="col-md-10 class_box"> <p class="DG_right_1">MacBeth, Act 3-4 <span class="inline_span">麦克白第三、四幕</span></p> <p class="DG_right_2">课后作业</p> <div class="DG_Bg"></div> <p class="DG_right_3"><span>read Act 5, and be ready to discuss the entire play. write-up on one character</span><span class="inline_span">阅读麦克白第五幕，做好讨论整个剧本的准备，就其中一个角色书写评论</span></p> </div> </div> <div class="DG_edit_con row"> <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> <div class="col-md-2 class_timeNO">第七课时</div> <div class="col-md-10 class_box"> <p class="DG_right_1">MacBeth, Act 5, recap and discuss writeups <span class="inline_span">麦克白第五幕概述及评论文章讨论</span></p> <p class="DG_right_2">课后作业</p> <div class="DG_Bg"></div> <p class="DG_right_3"><span>read and be ready to discuss Hamlet Acts 1 and 2</span><span class="inline_span">阅读并准备好讨论哈姆雷特第一、二幕</span></p> </div> </div> <div class="DG_edit_con row"> <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> <div class="col-md-2 class_timeNO">第八课时</div> <div class="col-md-10 class_box"> <p class="DG_right_1">Hamlet, Act 1-2 <span class="inline_span">哈姆雷特第一、二幕</span></p> <p class="DG_right_2">课后作业</p> <div class="DG_Bg"></div> <p class="DG_right_3"><span>read and be ready to discuss Acts 3 and 4</span><span class="inline_span">阅读并准备好讨论哈姆雷特第三、四幕</span></p> </div> </div> <div class="DG_edit_con row"> <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> <div class="col-md-2 class_timeNO">第九课时</div> <div class="col-md-10 class_box"> <p class="DG_right_1">Hamlet , Act 3-4 <span class="inline_span">哈姆雷特第三、四幕</span></p> <p class="DG_right_2">课后作业</p> <div class="DG_Bg"></div> <p class="DG_right_3"><span>read Act 5, and be ready to discuss the entire play. write-up on one character</span><span class="inline_span">阅读哈姆雷特第五幕，做好准备整个剧本的准备，就其中一个角色书写评论</span></p> </div> </div> <div class="DG_edit_con row"> <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> <div class="col-md-2 class_timeNO">第十课时</div> <div class="col-md-10 class_box"> <p class="DG_right_1" style="border: 0">Hamlet, Act 5, recap and discuss writeups <span class="inline_span">哈姆雷特第五幕概述评论文章讨论</span></p> </div> </div>';
        }



        if(id == 'way'){
            value = '<div class="col-xs-1">1.</div> <div class="col-xs-11">10堂课，总课时600分钟</div> <div class="col-xs-1">2.</div> <div class="col-xs-11">全英文授课，课后作业</div> <div class="col-xs-1">3.</div> <div class="col-xs-11">一对一在线授课（Skype, Facetime），费用7000元</div> <div class="col-xs-1">4.</div> <div class="col-xs-11"> Zoom在线教室小班授课，每班3-6人，3人成班，费用3000元 </div>';
        }
        UE.getEditor(id).execCommand('insertHtml',value);
    }
</script>
</body>
</html>