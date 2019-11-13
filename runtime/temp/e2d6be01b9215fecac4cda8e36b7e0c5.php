<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:87:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/admin/view/system/lists.html";i:1568109530;s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/application/admin/view/layouts/layout_iframe.html";i:1568109530;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/resource/admin/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/resource/admin/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/resource/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/resource/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/resource/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/resource/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/resource/admin/static/h-ui.admin/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/static/css/page.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="/resource/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>权限管理</title>
</head>
<body>

<nav class="breadcrumb">
    <i class="Hui-iconfont Hui-iconfont-home2"></i> 首页
    <span class="c-gray en">&gt;</span> 系统管理
    <span class="c-gray en">&gt;</span> 系统设置
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont Hui-iconfont-huanyipi"></i>
    </a>
</nav>
<div class="page-container">

    <form class="form form-horizontal" id="form-article-add">
        <div id="tab-system" class="HuiTab">
            <div class="tabBar cl">
                <span>系统设置</span>
                <span>基本设置</span>
                <span>交易配置</span>
                <span>牛人申请条件设置</span>
            </div>
            <div class="tabCon">
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">
                        <span class="c-red">*</span>
                        网站名称：</label>
                    <div class="formControls col-xs-2 col-sm-4 ">
                        <input type="text" id="website-title" name="website" placeholder="控制在25个字、50个字节以内" value="<?php echo (isset($lists['website']['val'] ) && ($lists['website']['val']  !== '')?$lists['website']['val'] :''); ?>" class="input-text">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">
                        <span class="c-red">*</span>
                        底部版权信息：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="website-copyright" name="copyright" placeholder="&copy; 2016 H-ui.net" value="<?php echo (isset($lists['copyright']['val'] ) && ($lists['copyright']['val']  !== '')?$lists['copyright']['val'] :''); ?>" class="input-text">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">备案号：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="website-icp" name="icp" placeholder="京ICP备00000000号" value="<?php echo (isset($lists['icp']['val'] ) && ($lists['icp']['val']  !== '')?$lists['icp']['val'] :''); ?>" class="input-text">
                    </div>
                </div>
            </div>
            <div class="tabCon">
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">用户昵称前缀：</label>
                    <div class="formControls col-xs-2 col-sm-4">
                        <input type="text" id="nickname_prefix" name="nickname_prefix" placeholder="用户注册时默认昵称前缀" value="<?php echo (isset($lists['nickname_prefix']['val'] ) && ($lists['nickname_prefix']['val']  !== '')?$lists['nickname_prefix']['val'] :''); ?>" class="input-text">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">客服热线：</label>
                    <div class="formControls col-xs-2 col-sm-4">
                        <input type="text" id="service_telephone" name="service_telephone" placeholder="用户中心客服热线" value="<?php echo (isset($lists['service_telephone']['val'] ) && ($lists['service_telephone']['val']  !== '')?$lists['service_telephone']['val'] :''); ?>" class="input-text">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">首页公告：</label>
                    <div class="formControls col-xs-2 col-sm-4">
                        <input type="text" id="service_notice" name="service_notice" placeholder="首页公告" value="<?php echo (isset($lists['service_notice']['val'] ) && ($lists['service_notice']['val']  !== '')?$lists['service_notice']['val'] :''); ?>" class="input-text">
                    </div>
                </div>
            </div>
            <div class="tabCon">
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">策略资金最大使用率：</label>
                    <div class="formControls col-xs-2 col-sm-9">
                        <input type="text" id="capital_usage" name="capital_usage" placeholder="创建策略时的最大资金使用百分比" value="<?php echo (isset($lists['capital_usage']['val'] ) && ($lists['capital_usage']['val']  !== '')?$lists['capital_usage']['val'] :''); ?>" class="input-text">
                        <p class="textarea-numberbar" style="color: #b3abab;">%</p>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">节假日：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <textarea name="holiday" cols="" rows="" class="textarea" placeholder="节假日列表，多个用英文逗号分割" ><?php echo (isset($lists['holiday']['val'] ) && ($lists['holiday']['val']  !== '')?$lists['holiday']['val'] :''); ?></textarea>
                        <p class="textarea-numberbar" style="color: #b3abab;">例：2018-01-01，多个用英文逗号分割</p>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">经纪人默认盈利返点率：</label>
                    <div class="formControls col-xs-2 col-sm-9">
                        <input type="text" id="manager_point" name="manager_point" placeholder="经纪人默认盈利返点率" value="<?php echo (isset($lists['manager_point']['val'] ) && ($lists['manager_point']['val']  !== '')?$lists['manager_point']['val'] :''); ?>" class="input-text">
                        <p class="textarea-numberbar" style="color: #b3abab;">%</p>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">经纪人默认建仓费返点率：</label>
                    <div class="formControls col-xs-2 col-sm-9">
                        <input type="text" id="manager_jiancang_point" name="manager_jiancang_point" placeholder="经纪人默认建仓费返点率" value="<?php echo (isset($lists['manager_jiancang_point']['val'] ) && ($lists['manager_jiancang_point']['val']  !== '')?$lists['manager_jiancang_point']['val'] :''); ?>" class="input-text">
                        <p class="textarea-numberbar" style="color: #b3abab;">%</p>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">经纪人默认递延费返点率：</label>
                    <div class="formControls col-xs-2 col-sm-9">
                        <input type="text" id="manager_defer_point" name="manager_defer_point" placeholder="经纪人默认递延费返点率" value="<?php echo (isset($lists['manager_defer_point']['val'] ) && ($lists['manager_defer_point']['val']  !== '')?$lists['manager_defer_point']['val'] :''); ?>" class="input-text">
                        <p class="textarea-numberbar" style="color: #b3abab;">%</p>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">用户平仓盈利分红比例：</label>
                    <div class="formControls col-xs-2 col-sm-9">
                        <input type="text" id="bonus_rate" name="bonus_rate" placeholder="用户平仓盈利分红比例" value="<?php echo (isset($lists['bonus_rate']['val'] ) && ($lists['bonus_rate']['val']  !== '')?$lists['bonus_rate']['val'] :''); ?>" class="input-text">
                        <p class="textarea-numberbar" style="color: #b3abab;">%</p>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">普通股票可购买最大涨幅：</label>
                    <div class="formControls col-xs-2 col-sm-9">
                        <input type="text" id="max_profit_rate" name="max_profit_rate" placeholder="可购买股票最大涨幅" value="<?php echo (isset($lists['max_profit_rate']['val'] ) && ($lists['max_profit_rate']['val']  !== '')?$lists['max_profit_rate']['val'] :''); ?>" class="input-text">
                        <p class="textarea-numberbar" style="color: #b3abab;">%</p>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">ST股票可购买最大涨幅：</label>
                    <div class="formControls col-xs-2 col-sm-9">
                        <input type="text" id="max_st_rate" name="max_st_rate" placeholder="ST股票可购买最大涨幅" value="<?php echo (isset($lists['max_st_rate']['val'] ) && ($lists['max_st_rate']['val']  !== '')?$lists['max_st_rate']['val'] :''); ?>" class="input-text">
                        <p class="textarea-numberbar" style="color: #b3abab;">%</p>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">申请经纪人手续费：</label>
                    <div class="formControls col-xs-2 col-sm-9">
                        <input type="text" id="manager_poundage" name="manager_poundage" placeholder="申请经纪人手续费" value="<?php echo (isset($lists['manager_poundage']['val'] ) && ($lists['manager_poundage']['val']  !== '')?$lists['manager_poundage']['val'] :''); ?>" class="input-text">
                        <p class="textarea-numberbar" style="color: #b3abab;">元</p>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">跟买牛人返点：</label>
                    <div class="formControls col-xs-2 col-sm-9">
                        <input type="text" id="niuren_point" name="niuren_point" placeholder="跟买牛人返点" value="<?php echo (isset($lists['niuren_point']['val'] ) && ($lists['niuren_point']['val']  !== '')?$lists['niuren_point']['val'] :''); ?>" class="input-text">
                        <p class="textarea-numberbar" style="color: #b3abab;">%</p>
                    </div>
                </div>
            </div>
            <div class="tabCon">
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">发布策略次数：</label>
                    <div class="formControls col-xs-2 col-sm-4">
                        <input type="text" id="pulish_strategy" name="pulish_strategy" placeholder="发布策略次数" value="<?php echo (isset($lists['pulish_strategy']['val'] ) && ($lists['pulish_strategy']['val']  !== '')?$lists['pulish_strategy']['val'] :''); ?>" class="input-text">
                        <p class="textarea-numberbar" style="color: #b3abab;">次</p>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">策略胜算率：</label>
                    <div class="formControls col-xs-2 col-sm-4">
                        <input type="text" id="strategy_win" name="strategy_win" placeholder="策略胜算率" value="<?php echo (isset($lists['strategy_win']['val'] ) && ($lists['strategy_win']['val']  !== '')?$lists['strategy_win']['val'] :''); ?>" class="input-text">
                        <p class="textarea-numberbar" style="color: #b3abab;">%</p>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">策略收益率：</label>
                    <div class="formControls col-xs-2 col-sm-4">
                        <input type="text" id="strategy_yield" name="strategy_yield" placeholder="策略收益率" value="<?php echo (isset($lists['strategy_yield']['val'] ) && ($lists['strategy_yield']['val']  !== '')?$lists['strategy_yield']['val'] :''); ?>" class="input-text">
                        <p class="textarea-numberbar" style="color: #b3abab;">%</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="button" id="bth-submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</div>




</body>
</html>
<script type="text/javascript" src="/resource/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/resource/admin/lib/layer/layer.js"></script>
<script type="text/javascript" src="/resource/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/resource/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/js/common.js"></script>

<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });
        $("#tab-system").Huitab({
            index:0
        });
    });
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#bth-submit").click(function(){
            var _oData = $("form").serialize(),
                _url = '<?php echo url("admin/System/modify"); ?>',
                _func = function (_resp) {
                    if (!_resp.state) {
                        layer.msg(_resp.info);
                    } else {
                        layer.msg('操作成功！', {time: 500}, function(){

                        });
                    }
                };
            _ajaxPost(_url, _oData, _func);
        });
    });
</script>