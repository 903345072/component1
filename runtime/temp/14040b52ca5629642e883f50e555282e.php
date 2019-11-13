<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:89:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/admin/view/index/userinfo.html";i:1568109530;s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/application/admin/view/layouts/layout_iframe.html";i:1568109530;}*/ ?>
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
    <title>个人信息</title>
</head>
<body>

<nav class="breadcrumb">
    <i class="Hui-iconfont Hui-iconfont-home2"></i> 首页
    <span class="c-gray en">&gt;</span> 个人信息
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont Hui-iconfont-huanyipi"></i>
    </a>
</nav>
<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">登录名：</label>
            <div class="formControls col-xs-8 col-sm-7">
                <input type="input" class="input-text" value="<?php echo $admin['username']; ?>" disabled />
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">身份：</label>
            <div class="formControls col-xs-8 col-sm-7">
                <input type="input" class="input-text" value="<?php echo $admin['has_one_role']['name']; ?>" disabled />
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">盈利返点：</label>
            <div class="formControls col-xs-8 col-sm-7">
                <input type="input" class="input-text" value="<?php echo $admin['point']; ?>%" disabled />
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">建仓费返点：</label>
            <div class="formControls col-xs-8 col-sm-7">
                <input type="input" class="input-text" value="<?php echo $admin['jiancang_point']; ?>%" disabled />
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">递延费返点：</label>
            <div class="formControls col-xs-8 col-sm-7">
                <input type="input" class="input-text" value="<?php echo $admin['defer_point']; ?>%" disabled />
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">手续率总计：</label>
            <div class="formControls col-xs-8 col-sm-7">
                <input type="input" class="input-text" value="<?php echo number_format($admin['total_fee'],2); ?>" disabled />
            </div>
        </div>
        <?php if($admin['role'] == 5): ?>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">邀请码：</label>
            <div class="formControls col-xs-8 col-sm-7">
                <input type="input" class="input-text" value="<?php echo $admin['code']; ?>" disabled />
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">邀请二维码：</label>
            <div class="formControls col-xs-8 col-sm-7">
                <img src="/upload/manager_pidcode/<?php echo $admin['admin_id']; ?>.png" alt="">
            </div>
        </div>
        <?php endif; ?>
    </form>
</article>




</body>
</html>
<script type="text/javascript" src="/resource/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/resource/admin/lib/layer/layer.js"></script>
<script type="text/javascript" src="/resource/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/resource/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/js/common.js"></script>

<script>
</script>
