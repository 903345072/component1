<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:94:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/admin/view/user/withdrawDetail.html";i:1568109530;s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/application/admin/view/layouts/layout_iframe.html";i:1568109530;}*/ ?>
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
    <title>出金详情</title>
</head>
<body>

<article class="page-container">
    <form class="form form-horizontal" id="form-admin-add">
        <div class="row cl">
            <label class="form-label col-xs-5 col-sm-4">到账金额：</label>
            <div class="formControls col-xs-7 col-sm-6"><p style="margin-top: 3px;"><?php echo number_format($withdraw['actual'],2); ?></p></div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-5 col-sm-4">开户行：</label>
            <div class="formControls col-xs-7 col-sm-6"><p style="margin-top: 3px;"><?php echo (isset($withdraw['remark']['bank']) && ($withdraw['remark']['bank'] !== '')?$withdraw['remark']['bank']:''); ?></p></div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-5 col-sm-4">持卡人：</label>
            <div class="formControls col-xs-7 col-sm-6"><p style="margin-top: 3px;"><?php echo (isset($withdraw['remark']['name']) && ($withdraw['remark']['name'] !== '')?$withdraw['remark']['name']:''); ?></p></div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-5 col-sm-4">银行卡号：</label>
            <div class="formControls col-xs-7 col-sm-6"><p style="margin-top: 3px;"><?php echo (isset($withdraw['remark']['card']) && ($withdraw['remark']['card'] !== '')?$withdraw['remark']['card']:''); ?></p></div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-5 col-sm-4">支行名称：</label>
            <div class="formControls col-xs-7 col-sm-6"><p style="margin-top: 3px;"><?php echo (isset($withdraw['remark']['addr']) && ($withdraw['remark']['addr'] !== '')?$withdraw['remark']['addr']:''); ?></p></div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-5 col-sm-4">状态：</label>
            <div class="formControls col-xs-7 col-sm-6">
                <?php if($withdraw['state'] == 0): ?>
                <p class="c-warning" style="margin-top: 3px;"><?php echo (isset($withdraw['state_text']) && ($withdraw['state_text'] !== '')?$withdraw['state_text']:''); ?></p>
                <?php elseif($withdraw['state'] == 1): ?>
                <p class="c-success" style="margin-top: 3px;"><?php echo (isset($withdraw['state_text']) && ($withdraw['state_text'] !== '')?$withdraw['state_text']:''); ?></p>
                <?php elseif($withdraw['state'] == 2): ?>
                <p class="c-success" style="margin-top: 3px;"><?php echo (isset($withdraw['state_text']) && ($withdraw['state_text'] !== '')?$withdraw['state_text']:''); ?></p>
                <?php elseif($withdraw['state'] == 3): ?>
                <p class="c-success" style="margin-top: 3px;"><?php echo (isset($withdraw['state_text']) && ($withdraw['state_text'] !== '')?$withdraw['state_text']:''); ?></p>
                <?php elseif($withdraw['state'] == -1): ?>
                <p class="c-error" style="margin-top: 3px;"><?php echo (isset($withdraw['state_text']) && ($withdraw['state_text'] !== '')?$withdraw['state_text']:''); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-5 col-sm-4">申请时间：</label>
            <div class="formControls col-xs-7 col-sm-6"><p style="margin-top: 3px;"><?php echo date('Y-m-d H:i', $withdraw['create_at']); ?></p></div>
        </div>
        <?php if($withdraw['update_by'] != 0): ?>
        <div class="row cl">
            <label class="form-label col-xs-5 col-sm-4">审核人：</label>
            <div class="formControls col-xs-7 col-sm-6"><p style="margin-top: 3px;"><?php echo (isset($withdraw['has_one_admin']['username']) && ($withdraw['has_one_admin']['username'] !== '')?$withdraw['has_one_admin']['username']:''); ?></p></div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-5 col-sm-4">审核时间：</label>
            <div class="formControls col-xs-7 col-sm-6"><p style="margin-top: 3px;"><?php echo date('Y-m-d H:i', $withdraw['update_at']); ?></p></div>
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
