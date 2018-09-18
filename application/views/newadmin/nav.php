<div class="layui-layout layui-layout-admin">
    <div class="layui-header header header-demo">
        <div class="layui-main">
            <a class="logo" href="/admin/admin/main">
                S&H 管理后台
            </a>
            <ul class="layui-nav" lay-filter="">
                <li class="layui-nav-item">
                    <a href="javascript:;"><?=$user?></a>
                    <dl class="layui-nav-child"> <!-- 二级菜单 -->
                        <dd><a href="">个人信息</a></dd>
                        <dd><a href="">切换帐号</a></dd>
                        <dd><a href="./login.html">退出</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item x-index"><a target="_blank" href="/">前台首页</a></li>
            </ul>
        </div>
    </div>
<div class="layui-side layui-bg-black x-side">
    <div class="layui-side-scroll">
        <ul class="layui-nav layui-nav-tree site-demo-nav" lay-filter="side">
            <li class="layui-nav-item">
                <a class="javascript:;" href="javascript:;">
                    <i class="layui-icon" style="top: 3px;">&#xe634;</i><cite>首页管理</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/index_banner_mgr/1">
                            <cite>电脑banner</cite>
                        </a>
                    </dd>
                    </dd>
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/index_banner_mgr/2">
                            <cite>手机banner</cite>
                        </a>
                    </dd>
                    </dd>
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/index_banner_mgr/3">
                            <cite>热门地区</cite>
                        </a>
                    </dd>
                    </dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a class="javascript:;" href="javascript:;">
                    <i class="icon iconfont">&#xe976;</i><cite>学校管理</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/school_list">
                            <cite>学校列表</cite>
                        </a>
                    </dd>
                    </dd>
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/school_item_mgr?type=ap">
                            <cite>AP课程</cite>
                        </a>
                    </dd>
                    </dd>
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/school_item_mgr?type=sport">
                            <cite>运动项目</cite>
                        </a>
                    </dd>
                    </dd>
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/school_item_mgr?type=club">
                            <cite>学生社团</cite>
                        </a>
                    </dd>
                    </dd>
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/school_grade_mgr">
                            <cite>年级管理</cite>
                        </a>
                    </dd>
                    </dd>

                </dl>
            </li>

            <li class="layui-nav-item">
                <a class="javascript:;" href="javascript:;">
                    <i class="icon iconfont icon-weibiaoti--"></i><cite>住家管理</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/house_list">
                            <cite>住家列表</cite>
                        </a>
                    </dd>
                    </dd>
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/apply_house">
                            <cite>申请住家</cite>
                        </a>
                    </dd>
                    </dd>
                </dl>
            </li>

            <li class="layui-nav-item">
                <a class="javascript:;" href="javascript:;">
                    <i class="icon iconfont icon-icon"></i><cite>衔接课程</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/lesson_list">
                            <cite>课程列表</cite>
                        </a>
                    </dd>
                    </dd>
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/lesson_order">
                            <cite>课程订单</cite>
                        </a>
                    </dd>
                    </dd>
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/lesson_REF">
                            <cite>参考用书</cite>
                        </a>
                    </dd>
                    </dd>
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/consult/2">
                            <cite>课程咨询</cite>
                        </a>
                    </dd>
                    </dd>
                </dl>
            </li>

            <li class="layui-nav-item">
                <a class="javascript:;" href="javascript:;">
                    <i class="layui-icon" style="top: 3px;">&#xe62d;</i><cite>暑期项目</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd class="">
                        <dd class="">
                            <a href="javascript:;" _href="/admin/admin/summer_banner">
                                <cite>暑期banner</cite>
                            </a>
                        </dd>
                    </dd>
                    <dd class="">
                        <dd class="">
                            <a href="javascript:;" _href="/admin/admin/summer_list">
                                <cite>夏校列表</cite>
                            </a>
                        </dd>
                    </dd>
                    <dd class="">
                        <dd class="">
                            <a href="javascript:;" _href="/admin/admin/consult/3">
                                <cite>夏校咨询</cite>
                            </a>
                        </dd>
                    </dd>
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/summer_assess">
                            <cite>评估申请</cite>
                        </a>
                    </dd>
                    </dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a class="javascript:;" href="javascript:;">
                    <i class="icon iconfont icon-xialingying"></i><cite>夏令营</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/camp_list">
                            <cite>夏令营列表</cite>
                        </a>
                    </dd>
                    </dd>
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/consult/1">
                            <cite>夏令营咨询</cite>
                        </a>
                    </dd>
                    </dd>

                </dl>
            </li>
            <li class="layui-nav-item">
                <a class="javascript:;" href="javascript:;">
                    <i class="icon iconfont icon-fuwu"></i><cite>其他服务</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/service_list">
                            <cite>服务列表</cite>
                        </a>
                    </dd>
                    </dd>
                    <dd class="">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/consult/7">
                            <cite>服务咨询</cite>
                        </a>
                    </dd>
                    </dd>
                </dl>
            </li>

            <li class="layui-nav-item">
                <a class="javascript:;" href="javascript:;" _href="/admin/admin/consult/6">
                    <i class="icon iconfont icon-weixin"></i><cite>微信咨询</cite>
                </a>
            </li>
            <li class="layui-nav-item">
                <a class="javascript:;" href="javascript:;" _href="/admin/admin/custom_made">
                    <i class="icon iconfont icon-dingzhi"></i><cite>私人定制</cite>
                </a>
            </li>
            <li class="layui-nav-item">
                <a class="javascript:;" href="javascript:;" _href="/admin/admin/state_mgr">
                    <i class="layui-icon">&#xe609;</i> <cite>地区管理</cite>
                </a>
            </li>
            <li class="layui-nav-item">
                <a class="javascript:;" href="javascript:;" _href="/admin/admin/article_list">
                    <i class="layui-icon">&#xe60a;</i> <cite>文章管理</cite>
                </a>
            </li>
            <li class="layui-nav-item">
                <a class="javascript:;" href="javascript:;">
                    <i class="layui-icon" style="top: 3px;">&#xe612;</i><cite>会员管理</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd class="">
                        <a href="javascript:;" _href="/admin/admin/user_list">
                            <cite>会员列表</cite>
                        </a>
                    </dd>

                    </dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a class="javascript:;" href="javascript:;">
                    <i class="layui-icon" style="top: 3px;">&#xe613;</i><cite>管理员管理</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd class="">
                        <a href="javascript:;" _href="./admin-list.html">
                            <cite>管理员列表</cite>
                        </a>
                    </dd>
                    <dd class="">
                        <a href="javascript:;" _href="./admin-role.html">
                            <cite>角色管理</cite>
                        </a>
                    </dd>
                    <dd class="">
                        <a href="javascript:;" _href="./admin-cate.html">
                            <cite>权限分类</cite>
                        </a>
                    </dd>
                    <dd class="">
                        <a href="javascript:;" _href="./admin-rule.html">
                            <cite>权限管理</cite>
                        </a>
                    </dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a class="javascript:;" href="javascript:;">
                    <i class="layui-icon" style="top: 3px;">&#xe629;</i><cite>系统统计</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd class="">
                        <a href="javascript:;" _href="./echarts1.html">
                            <cite>拆线图</cite>
                        </a>
                    </dd>
                    <dd class="">
                        <a href="javascript:;" _href="./echarts2.html">
                            <cite>柱状图</cite>
                        </a>
                    </dd>
                    <dd class="">
                        <a href="javascript:;" _href="./echarts3.html">
                            <cite>地图</cite>
                        </a>
                    </dd>
                    <dd class="">
                        <a href="javascript:;" _href="./echarts4.html">
                            <cite>饼图</cite>
                        </a>
                    </dd>
                    <dd class="">
                        <a href="javascript:;" _href="./echarts5.html">
                            <cite>雷达图</cite>
                        </a>
                    </dd>
                    <dd class="">
                        <a href="javascript:;" _href="./echarts6.html">
                            <cite>k线图</cite>
                        </a>
                    </dd>
                    <dd class="">
                        <a href="javascript:;" _href="./echarts7.html">
                            <cite>热力图</cite>
                        </a>
                    </dd>
                    <dd class="">
                        <a href="javascript:;" _href="./echarts8.html">
                            <cite>仪表图</cite>
                        </a>
                    </dd>
                    <dd class="">
                        <a href="http://echarts.baidu.com/examples.html" target="_blank" _href="./welcome.html">
                            <cite>更多案例</cite>
                        </a>
                    </dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a class="javascript:;" href="javascript:;">
                    <i class="layui-icon" style="top: 3px;">&#xe614;</i><cite>系统设置</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd class="">
                        <a href="javascript:;" _href="./sys-set.html">
                            <cite>系统设置</cite>
                        </a>
                    </dd>
                    <dd class="">
                        <a href="javascript:;" _href="./sys-data.html">
                            <cite>数字字典</cite>
                        </a>
                    </dd>
                    <dd class="">
                        <a href="javascript:;" _href="./sys-shield.html">
                            <cite>屏蔽词</cite>
                        </a>
                    </dd>
                    <dd class="">
                        <a href="javascript:;" _href="./sys-log.html">
                            <cite>系统日志</cite>
                        </a>
                    </dd>
                    <dd class="">
                        <a href="javascript:;" _href="./sys-link.html">
                            <cite>友情链接</cite>
                        </a>
                    </dd>
                    <dd class="">
                        <a href="javascript:;" _href="./sys-qq.html">
                            <cite>第三方登录</cite>
                        </a>
                    </dd>
                </dl>
            </li>
            <li class="layui-nav-item" style="height: 30px; text-align: center">
            </li>
        </ul>
    </div>

</div>
<div class="layui-tab layui-tab-card site-demo-title x-main" lay-filter="x-tab" lay-allowclose="true">
    <div class="x-slide_left"></div>
    <ul class="layui-tab-title">
        <li class="layui-this">
            我的桌面
            <i class="layui-icon layui-unselect layui-tab-close">ဆ</i>
        </li>
    </ul>