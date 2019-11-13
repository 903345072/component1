<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:88:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/admin/view/product/index.html";i:1568109530;s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/application/admin/view/layouts/layout_iframe.html";i:1568109530;}*/ ?>
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
    <title>产品列表</title>
</head>
<body>

<nav class="breadcrumb">
	<i class="Hui-iconfont Hui-iconfont-home2"></i> 首页
	<span class="c-gray en">&gt;</span> 产品管理
	<span class="c-gray en">&gt;</span> 产品列表
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
		<i class="Hui-iconfont Hui-iconfont-huanyipi"></i>
	</a>
</nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray">
		<span class="l">
			<a class="btn btn-primary radius" href="javascript:;" onclick="product_add('添加产品','<?php echo url("admin/Product/add"); ?>','', '510')">
				<i class="Hui-iconfont Hui-iconfont-add"></i> 添加产品
			</a> </span>
		<span class="r">共有数据：<strong><?php echo $data['total']; ?></strong> 条</span>
	</div>
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
		<tr class="text-c">
			<th width="25"><input type="checkbox" value="" name=""></th>
			<th width="25">ID</th>
			<th>产品名称</th>
			<th>产品描述</th>
			<th>允许交易</th>
			<th>币种</th>
			<th>上/下架</th>
			<th>状态</th>
			<th width="80">操作</th>
		</tr>
		</thead>
		<tbody>
		<?php if(is_array($data['data']) || $data['data'] instanceof \think\Collection || $data['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
		<tr class="text-c">
			<td width="25"><input type="checkbox" value="<?php echo $item['id']; ?>" name=""></td>
			<td width="25"><?php echo $item['id']; ?></td>
			<td><?php echo $item['name']; ?></td>
			<td><?php echo $item['desc']; ?></td>
			<td>
				<?php if($item['is_trade']['value'] == 1): ?>
				<span class="label label-success radius"><?php echo $item['is_trade']['text']; ?></span>
				<?php else: ?>
				<span class="label label-danger radius"><?php echo $item['is_trade']['text']; ?></span>
				<?php endif; ?>
			</td>
			<td>
				<span class="label label-success radius"><?php echo $item['currency']['text']; ?></span>
			</td>
			<td>
				<?php if($item['on_sale']['value'] == 1): ?>
				<span class="label label-success radius"><?php echo $item['on_sale']['text']; ?></span>
				<?php else: ?>
				<span class="label label-danger radius"><?php echo $item['on_sale']['text']; ?></span>
				<?php endif; ?>
			</td>
			<td>
				<?php if($item['state']['value'] == 1): ?>
				<span class="label label-success radius"><?php echo $item['state']['text']; ?></span>
				<?php else: ?>
				<span class="label label-danger radius"><?php echo $item['state']['text']; ?></span>
				<?php endif; ?>
			</td>
			<td class="f-14">
				<input class="btn btn-primary size-MINI radius" type="button" title="角色编辑" onclick="admin_role_edit('角色编辑','admin-role-add.html','1')" value="编辑">
				<input class="btn btn-danger size-MINI radius" type="button" title="角色删除" onclick="admin_role_del(this,'1')" value="删除">
			</td>
		</tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<?php echo $pages; ?>
</div>


<!--<footer class="footer mt-20">
	<div class="container">
		<p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br>
			Copyright &copy;2015-2017 H-ui.admin v3.1 All Rights Reserved.<br>
			本后台系统由<a href="http://www.h-ui.net/" target="_blank" title="H-ui前端框架">H-ui前端框架</a>提供前端技术支持</p>
	</div>
</footer>-->

</body>
</html>
<script type="text/javascript" src="/resource/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/resource/admin/lib/layer/layer.js"></script>
<script type="text/javascript" src="/resource/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/resource/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/js/common.js"></script>

<script>
/*用户-添加*/
function product_add(title,url,w,h){
	layer_show(title,url,w,h);
}
</script>
