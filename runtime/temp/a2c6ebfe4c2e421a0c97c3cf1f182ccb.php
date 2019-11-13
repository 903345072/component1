<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:90:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/admin/view/record/recharge.html";i:1568109530;s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/application/admin/view/layouts/layout_iframe.html";i:1568109530;}*/ ?>
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
    <title>充值记录</title>
</head>
<body>

<nav class="breadcrumb">
    <i class="Hui-iconfont Hui-iconfont-home2"></i> 首页
    <span class="c-gray en">&gt;</span> 记录管理
    <span class="c-gray en">&gt;</span> 充值记录列表
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont Hui-iconfont-huanyipi"></i>
    </a>
</nav>
<div class="page-container">
    <form action="" method="get">
    <div class="text-c">
        <input type="text" class="input-text" style="width:170px;" placeholder="充值订单号" name="trade_no" value="<?php echo (isset($search['trade_no']) && ($search['trade_no'] !== '')?$search['trade_no']:''); ?>">
        <input type="text" class="input-text" style="width:170px;" placeholder="充值人" name="nickname" value="<?php echo (isset($search['nickname']) && ($search['nickname'] !== '')?$search['nickname']:''); ?>">
        <input type="text" class="input-text" style="width:170px;" placeholder="手机号" name="mobile" value="<?php echo (isset($search['mobile']) && ($search['mobile'] !== '')?$search['mobile']:''); ?>">
        <input type="text" class="input-text" style="width:170px;" placeholder="代理商" name="ring" value="<?php echo (isset($search['ring']) && ($search['ring'] !== '')?$search['ring']:''); ?>">
        <input type="text" class="input-text" style="width:170px;" placeholder="会员" name="member" value="<?php echo (isset($search['member']) && ($search['member'] !== '')?$search['member']:''); ?>">
        <input type="text" class="input-text" style="width:170px;" placeholder="经纪人" name="manager" value="<?php echo (isset($search['manager']) && ($search['manager'] !== '')?$search['manager']:''); ?>">
        <input type="text" class="input-text" style="width:170px;" placeholder="开始时间" name="begin" value="<?php echo (isset($search['begin']) && ($search['begin'] !== '')?$search['begin']:''); ?>" onclick="WdatePicker({readOnly:true, dateFmt:'yyyy-MM-dd HH:mm'})"> -
        <input type="text" class="input-text" style="width:170px;" placeholder="结束时间" name="end" value="<?php echo (isset($search['end']) && ($search['end'] !== '')?$search['end']:''); ?>" onclick="WdatePicker({readOnly:true, dateFmt:'yyyy-MM-dd HH:mm'})">
        <button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont Hui-iconfont-search2"></i>搜索</button>
    </div>
    </form>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
            <span class="c-blue">充值总计： <strong>￥<?php echo number_format($totalAmount,2); ?></strong></span>
            <span class="c-green ml-15">到账总计：<strong>￥<?php echo number_format($totalActual,2); ?></strong></span>
            <span class="c-orange ml-15">手续费总计：<strong>￥<?php echo number_format($totalPoundage,2); ?></strong></span>
        </span>
        <span class="r">共充值：<strong><?php echo $datas['total']; ?></strong> 笔</span>
    </div>
    <table class="table table-border table-bordered table-hover table-bg">
        <thead>
        <tr class="text-c">
            <th>充值订单号</th>
            <th>充值人</th>
            <th>手机号</th>
            <th>代理商</th>
            <th>会员</th>
            <th>经纪人</th>
            <th>充值金额</th>
            <th>到账金额</th>
            <th>手续费</th>
            <th>充值时间</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($datas['data']) || $datas['data'] instanceof \think\Collection || $datas['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $datas['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
        <tr class="text-c admin-lists">
            <td><?php echo $item['trade_no']; ?></td>
            <td><?php echo (isset($item['belongs_to_user']['nickname']) && ($item['belongs_to_user']['nickname'] !== '')?$item['belongs_to_user']['nickname']:$item['belongs_to_user']['username']); ?></td>
            <td><?php echo $item['belongs_to_user']['mobile']; ?></td>
            <td><?php echo (isset($item['belongs_to_user']['has_one_admin']['username']) && ($item['belongs_to_user']['has_one_admin']['username'] !== '')?$item['belongs_to_user']['has_one_admin']['username']:'无'); ?></td>
            <td><?php echo (isset($item['belongs_to_user']['has_one_admin']['has_one_parent']['username']) && ($item['belongs_to_user']['has_one_admin']['has_one_parent']['username'] !== '')?$item['belongs_to_user']['has_one_admin']['has_one_parent']['username']:'无'); ?></td>
            <td><?php echo (isset($item['belongs_to_user']['has_one_parent']['username']) && ($item['belongs_to_user']['has_one_parent']['username'] !== '')?$item['belongs_to_user']['has_one_parent']['username']:'无'); ?></td>
            <td><?php echo number_format($item['amount'],2); ?></td>
            <td><?php echo number_format($item['actual'],2); ?></td>
            <td><?php echo number_format($item['poundage'],2); ?></td>
            <td><?php echo date('Y-m-d H:i:s', $item['create_at']); ?></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; if($datas['total'] > '0'): ?>
        <tr class="text-c admin-lists">
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td><strong>本页汇总</strong></td>
            <td><strong><?php echo number_format($pageAmount,2); ?></strong></td>
            <td><strong><?php echo number_format($pageActual,2); ?></strong></td>
            <td><strong><?php echo number_format($pagePoundage,2); ?></strong></td>
            <td>-</td>
        </tr>
        <?php endif; ?>
        <tr class="text-c admin-lists">
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td><strong>全部汇总</strong></td>
            <td><strong><?php echo number_format($pc_sum['amount_sum'],2); ?></strong></td>
            <td><strong><?php echo number_format($pc_sum['actual_sum'],2); ?></strong></td>
            <td><strong><?php echo number_format($pc_sum['poundage_sum'],2); ?></strong></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>
    <?php echo $pages; ?>
</div>




</body>
</html>
<script type="text/javascript" src="/resource/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/resource/admin/lib/layer/layer.js"></script>
<script type="text/javascript" src="/resource/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/resource/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/js/common.js"></script>

<script language="javascript" type="text/javascript" src="/resource/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script>
</script>