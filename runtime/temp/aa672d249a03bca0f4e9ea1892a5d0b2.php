<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:95:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/admin/view/order/positionDetail.html";i:1568109530;s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/application/admin/view/layouts/layout_iframe.html";i:1568109530;}*/ ?>
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
    <title>策略详情</title>
</head>
<body>

<div class="page-container">
	<div class="col-sm-8" style="float: none;margin: 0 auto;">
	<table class="table table-border table-bordered radius">
		<thead class="text-c">
            <tr>
                <th colspan="4">策略详情</th>
            </tr>
		</thead>
		<tbody>
            <tr>
                <th class="text-r">策略ID：</th>
                <td class="text-l"><?php echo $order['order_id']; ?></td>
                <th class="text-r">订单流水号：</th>
                <td class="text-l"><?php echo $order['order_sn']; ?></td>
            </tr>
            <tr>
                <th class="text-r">昵称：</th>
                <td class="text-l"><?php echo (isset($order['has_one_user']['nickname']) && ($order['has_one_user']['nickname'] !== '')?$order['has_one_user']['nickname']:'-'); ?></td>
                <th class="text-r">手机号：</th>
                <td class="text-l"><?php echo (isset($order['has_one_user']['mobile']) && ($order['has_one_user']['mobile'] !== '')?$order['has_one_user']['mobile']:'-'); ?></td>
            </tr>
            <tr>
                <th class="text-r">股票代码：</th>
                <td class="text-l"><?php echo $order['code']; ?></td>
                <th class="text-r">股票名称：</th>
                <td class="text-l"><?php echo $order['name']; ?></td>
            </tr>
            <tr>
                <th class="text-r">委托价：</th>
                <td class="text-l"><?php echo number_format($order['price'],2); ?></td>
                <th class="text-r">委托数量：</th>
                <td class="text-l"><?php echo intval($order['hand']); ?></td>
            </tr>
            <tr>
                <th class="text-r">委托市值：</th>
                <td class="text-l"><?php echo number_format($order['price'] * $order['hand'],2); ?></td>
                <th class="text-r">现价：</th>
                <td class="text-l"><?php echo $order['last_px']; ?></td>
            </tr>
            <tr>
                <th class="text-r">盈亏：</th>
                <td class="text-l <?php if($order['pl'] < 0): ?>c-green<?php else: ?>c-red<?php endif; ?>">
                    <?php echo $order['pl']; ?>
                </td>
                <th class="text-r">止盈：</th>
                <td class="text-l"><?php echo number_format($order['stop_profit_price'],2); ?></td>
            </tr>
            <tr>
                <th class="text-r">止损：</th>
                <td class="text-l"><?php echo number_format($order['stop_loss_price'],2); ?></td>
                <th class="text-r">保证金：</th>
                <td class="text-l"><?php echo number_format($order['deposit'],2); ?></td>
            </tr>
            <tr>
                <th class="text-r">建仓费：</th>
                <td class="text-l"><?php echo number_format($order['jiancang_fee'],2); ?></td>
                <th class="text-r">递延费：</th>
                <td class="text-l"><?php echo number_format($order['defer'],2); ?></td>
            </tr>
            <tr>
                <th class="text-r">会员：</th>
                <td class="text-l"><?php echo (isset($order['has_one_user']['has_one_admin']['has_one_parent']['username']) && ($order['has_one_user']['has_one_admin']['has_one_parent']['username'] !== '')?$order['has_one_user']['has_one_admin']['has_one_parent']['username']:'-'); ?></td>
                <th class="text-r">代理商：</th>
                <td class="text-l"><?php echo (isset($order['has_one_user']['has_one_admin']['username']) && ($order['has_one_user']['has_one_admin']['username'] !== '')?$order['has_one_user']['has_one_admin']['username']:'-'); ?></td>
            </tr>
            <tr>
                <th class="text-r">经纪人：</th>
                <td class="text-l"><?php echo (isset($order['has_one_user']['has_one_parent']['username']) && ($order['has_one_user']['has_one_parent']['username'] !== '')?$order['has_one_user']['has_one_parent']['username']:'-'); ?></td>
                <th class="text-r">下单时间：</th>
                <td class="text-l"><?php echo date("Y-m-d H:i", $order['create_at']); ?></td>
            </tr>
            <tr>
                <th class="text-r">是否对冲：</th>
                <td class="text-l <?php if($order['is_hedging'] != 0): ?>c-green<?php else: ?>c-red<?php endif; ?>">
                    <?php echo $order['is_hedging_text']; ?>
                </td>
                <th class="text-r">操作员：</th>
                <td class="text-l">
                    <?php if($order['has_one_operator']): ?>
                    <?php echo (isset($order['has_one_operator']['nickname']) && ($order['has_one_operator']['nickname'] !== '')?$order['has_one_operator']['nickname']:$order['has_one_operator']['username']); else: ?>
                    -
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th class="text-r">买入时间：</th>
                <td class="text-l">
                    <?php if($order['has_one_operator']): ?>
                    <?php echo date("Y-m-d H:i", $order['update_at']); else: ?>
                    -
                    <?php endif; ?>
                </td>
                <th class="text-r"></th>
                <td class="text-l"></td>
            </tr>
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
