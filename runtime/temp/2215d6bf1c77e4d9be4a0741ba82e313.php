<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:95:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/admin/view/order/positionRebate.html";i:1568109530;s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/application/admin/view/layouts/layout_iframe.html";i:1568109530;}*/ ?>
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
    <title>返点记录</title>
</head>
<body>

<div class="page-container">
	<div class="col-sm-8" style="float: none;margin: 0 auto;">
        <?php if($order['is_follow'] == '1'): ?>
        <table class="table table-border table-bordered radius">
            <thead class="text-c">
            <tr>
                <th class="f-14" colspan="4">牛人返点记录</th>
            </tr>
            <tr>
                <th style="width: 25%;">牛人</th>
                <th style="width: 25%;">返点类型</th>
                <th style="width: 25%;">返点金额</th>
                <th style="width: 25%;">结算时间</th>
            </tr>
            </thead>
            <tbody class="text-c">
            <?php if(empty($order['has_many_niuren_record']) || (($order['has_many_niuren_record'] instanceof \think\Collection || $order['has_many_niuren_record'] instanceof \think\Paginator ) && $order['has_many_niuren_record']->isEmpty())): ?>
            <tr>
                <td colspan="4">暂无牛人返点记录</td>
            </tr>
            <?php else: if(is_array($order['has_many_niuren_record']) || $order['has_many_niuren_record'] instanceof \think\Collection || $order['has_many_niuren_record'] instanceof \think\Paginator): $i = 0; $__LIST__ = $order['has_many_niuren_record'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td><?php echo (isset($vo['belongs_to_niuren']['nickname']) && ($vo['belongs_to_niuren']['nickname'] !== '')?$vo['belongs_to_niuren']['nickname']:$vo['belongs_to_niuren']['username']); ?></td>
                <td><?php echo $vo['type_text']; ?></td>
                <td><?php echo number_format($vo['money'],2); ?></td>
                <td><?php echo date('Y-m-d H:i:s', $vo['create_at']); ?></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </tbody>
        </table>
        <?php endif; ?>
        <table class="table table-border table-bordered radius text-c">
            <thead class="text-c">
            <tr>
                <th class="f-14" colspan="4">经纪人返点记录</th>
            </tr>
            <tr>
                <th style="width: 25%;">经纪人</th>
                <th style="width: 25%;">返点类型</th>
                <th style="width: 25%;">返点金额</th>
                <th style="width: 25%;">结算时间</th>
            </tr>
            </thead>
            <tbody class="text-c">
            <?php if(empty($order['has_many_manager_record']) || (($order['has_many_manager_record'] instanceof \think\Collection || $order['has_many_manager_record'] instanceof \think\Paginator ) && $order['has_many_manager_record']->isEmpty())): ?>
            <tr>
                <td colspan="4">暂无经纪人返点记录</td>
            </tr>
            <?php else: if(is_array($order['has_many_manager_record']) || $order['has_many_manager_record'] instanceof \think\Collection || $order['has_many_manager_record'] instanceof \think\Paginator): $i = 0; $__LIST__ = $order['has_many_manager_record'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td><?php echo (isset($vo['belongs_to_manager']['nickname']) && ($vo['belongs_to_manager']['nickname'] !== '')?$vo['belongs_to_manager']['nickname']:$vo['belongs_to_manager']['username']); ?></td>
                <td><?php echo $vo['type_text']; ?></td>
                <td><?php echo number_format($vo['money'],2); ?></td>
                <td><?php echo date('Y-m-d H:i:s', $vo['create_at']); ?></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </tbody>
        </table>
        <table class="table table-border table-bordered radius text-c">
            <thead class="text-c">
            <tr>
                <th class="f-14" colspan="4">代理商返点记录</th>
            </tr>
            <tr>
                <th style="width: 25%;">代理商</th>
                <th style="width: 25%;">返点类型</th>
                <th style="width: 25%;">返点金额</th>
                <th style="width: 25%;">结算时间</th>
            </tr>
            </thead>
            <tbody class="text-c">
            <?php if(empty($order['has_many_proxy_record']) || (($order['has_many_proxy_record'] instanceof \think\Collection || $order['has_many_proxy_record'] instanceof \think\Paginator ) && $order['has_many_proxy_record']->isEmpty())): ?>
            <tr>
                <td colspan="4">暂无代理商返点记录</td>
            </tr>
            <?php else: if(is_array($order['has_many_proxy_record']) || $order['has_many_proxy_record'] instanceof \think\Collection || $order['has_many_proxy_record'] instanceof \think\Paginator): $i = 0; $__LIST__ = $order['has_many_proxy_record'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td><?php echo (isset($vo['belongs_to_admin']['nickname']) && ($vo['belongs_to_admin']['nickname'] !== '')?$vo['belongs_to_admin']['nickname']:$vo['belongs_to_admin']['username']); ?></td>
                <td><?php echo $vo['type_text']; ?></td>
                <td><?php echo number_format($vo['money'],2); ?></td>
                <td><?php echo date('Y-m-d H:i:s', $vo['create_at']); ?></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </tbody>
        </table>
	</div>
</div>




</body>
</html>
<script type="text/javascript" src="/resource/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/resource/admin/lib/layer/layer.js"></script>
<script type="text/javascript" src="/resource/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/resource/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/js/common.js"></script>

<script>
</script>
