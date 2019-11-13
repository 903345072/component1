<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/admin/view/ai/index.html";i:1568109530;s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/application/admin/view/layouts/layout_iframe.html";i:1568109530;}*/ ?>
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
    <title>智能推荐类型</title>
</head>
<body>

<nav class="breadcrumb">
	<i class="Hui-iconfont Hui-iconfont-home2"></i> 首页
	<span class="c-gray en">&gt;</span> 智能推荐
	<span class="c-gray en">&gt;</span> 智能推荐类型
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
		<i class="Hui-iconfont Hui-iconfont-huanyipi"></i>
	</a>
</nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray">
		<span class="l">
			<?php if(in_array('admin/Ai/removeType', \think\Session::get('ACCESS_LIST'))): ?>
			<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
				<i class="Hui-iconfont Hui-iconfont-del3"></i> 批量删除
			</a>
			<?php endif; if(in_array('admin/Ai/createType', \think\Session::get('ACCESS_LIST'))): ?>
			<a class="btn btn-primary radius" href="javascript:;" onclick="type_add('添加推荐类型','<?php echo url("admin/Ai/createType"); ?>','','350')">
				<i class="Hui-iconfont Hui-iconfont-add"></i> 添加推荐类型
			</a>
			<?php endif; ?>
		</span>
		<span class="r">共有数据：<strong><?php echo $datas['total']; ?></strong> 条</span>
	</div>
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
		<tr class="text-c">
			<th width="25"><input type="checkbox" value="" name=""></th>
			<th width="40">ID</th>
			<th>推荐类型名称</th>
			<th>排序</th>
			<th>状态</th>
			<th width="140">操作</th>
		</tr>
		</thead>
		<tbody>
		<?php if(is_array($datas['data']) || $datas['data'] instanceof \think\Collection || $datas['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $datas['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
		<tr class="text-c mode-lists">
			<td><input type="checkbox" value="<?php echo $item['type_id']; ?>" name="id"></td>
			<td><?php echo $item['type_id']; ?></td>
			<td><?php echo $item['name']; ?></td>
			<td><?php echo $item['sort']; ?></td>
			<td>
				<?php if($item['status']['value'] == 0): ?>
				<span class="label label-success radius"><?php echo $item['status']['text']; ?></span>
				<?php else: ?>
				<span class="label label-danger radius"><?php echo $item['status']['text']; ?></span>
				<?php endif; ?>
			</td>
			<td class="f-14">
				<?php if(in_array('admin/Ai/modifyType', \think\Session::get('ACCESS_LIST'))): ?>
				<input class="btn btn-primary size-MINI radius" type="button" title="编辑推荐类型" onclick="type_edit('编辑推荐类型','<?php echo url("admin/Ai/modifyType", ['id' => $item['type_id']]); ?>','','350')" value="编辑">
				<?php endif; if(in_array('admin/Ai/stocks', \think\Session::get('ACCESS_LIST'))): ?>
				<input class="btn btn-secondary size-MINI radius" type="button" title="股票列表" onclick="type_stocks('股票列表','<?php echo url("admin/Ai/stocks", ['id' => $item['type_id']]); ?>')" value="股票列表">
				<?php endif; if(in_array('admin/Ai/removeType', \think\Session::get('ACCESS_LIST'))): ?>
				<input class="btn btn-danger size-MINI radius" type="button" title="推荐类型删除" onclick="type_del(this, <?php echo $item['type_id']; ?>);" value="删除">
				<?php endif; ?>
			</td>
		</tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>
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

<script>
    /*用户-添加*/
    <?php if(in_array('admin/Ai/createType', \think\Session::get('ACCESS_LIST'))): ?>
    function type_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
	<?php endif; if(in_array('admin/Ai/modifyType', \think\Session::get('ACCESS_LIST'))): ?>
    function type_edit(title,url,w,h){
        layer_show(title,url,w,h);
    }
	<?php endif; if(in_array('admin/Ai/stocks', \think\Session::get('ACCESS_LIST'))): ?>
    function type_stocks(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
	<?php endif; if(in_array('admin/Ai/removeType', \think\Session::get('ACCESS_LIST'))): ?>
    function type_del(_obj, _id) {
        layer.confirm('确认要删除推荐类型吗？',function(index){
            var _oData = {id:_id},
                _url = '<?php echo url("admin/Ai/removeType", ["act" => "single"]); ?>',
                _func = function (_resp) {
                    layer.close(index);
                    if (!_resp.state) {
                        parent.layer.msg(_resp.info);
                    } else {
                        layer.msg('删除成功！', {time: 500}, function(){
                            if(_resp.data && _resp.data.url){
                                parent.window.location.href = _resp.data.url;
                            }else{
                                $(_obj).parents("tr").remove();
                            }
                        });
                    }
                };
            _ajaxPost(_url, _oData, _func);
        });
    }

    function datadel()
    {
        var _ids = new Array();
        $(".mode-lists").find("input[type*=checkbox]").each(function(index, el) {
            if( $(this).is(":checked") ){
                var _id = $(this).val();
                _ids.push(_id);
            }
        });
        if(_ids.length == 0){
            layer.msg("请选择要删除的数据！");
            return false;
        }else{
            layer.confirm('确认要删除推荐类型吗？',function(index){
                var _oData = {ids: _ids},
                    _url = '<?php echo url("admin/Ai/removeType", ["act" => "patch"]); ?>',
                    _func = function (_resp) {
                        layer.close(index);
                        if (!_resp.state) {
                            layer.msg(_resp.info);
                        } else {
                            layer.msg('删除成功！', {time: 500}, function(){
                                window.location.reload();
                            });
                        }
                    };
                _ajaxPost(_url, _oData, _func);
            });
        }
    }
	<?php endif; ?>
</script>
