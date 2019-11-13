<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/admin/view/order/force.html";i:1568109530;s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/application/admin/view/layouts/layout_iframe.html";i:1568109530;}*/ ?>
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
    <title>强制平仓订单</title>
</head>
<body>

<style>

</style>
<nav class="breadcrumb">
	<i class="Hui-iconfont Hui-iconfont-home2"></i> 首页
	<span class="c-gray en">&gt;</span> 订单管理
	<span class="c-gray en">&gt;</span> 强制平仓订单
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
		<i class="Hui-iconfont Hui-iconfont-huanyipi"></i>
	</a>
</nav>
<div class="page-container">
	<form action="" method="get">
		<div class="text-l">
			<input type="text" class="input-text radius" style="width:170px;" placeholder="昵称" name="nickname" value="<?php echo (isset($search['nickname']) && ($search['nickname'] !== '')?$search['nickname']:''); ?>">
			<input type="text" class="input-text radius" style="width:170px;" placeholder="手机号" name="mobile" value="<?php echo (isset($search['mobile']) && ($search['mobile'] !== '')?$search['mobile']:''); ?>">
			<input type="text" class="input-text radius" style="width:170px;" placeholder="股票代码" name="code" value="<?php echo (isset($search['code']) && ($search['code'] !== '')?$search['code']:''); ?>">
			<input type="text" class="input-text radius" style="width:170px;" placeholder="股票名称" name="name" value="<?php echo (isset($search['name']) && ($search['name'] !== '')?$search['name']:''); ?>">
		</div>
		<div class="text-l mt-5">
			<input type="text" class="input-text radius" style="width:170px;" placeholder="代理商" name="ring" value="<?php echo (isset($search['ring']) && ($search['ring'] !== '')?$search['ring']:''); ?>">
			<input type="text" class="input-text radius" style="width:170px;" placeholder="会员" name="member" value="<?php echo (isset($search['member']) && ($search['member'] !== '')?$search['member']:''); ?>">
			<input type="text" class="input-text radius" style="width:170px;" placeholder="经纪人" name="manager" value="<?php echo (isset($search['manager']) && ($search['manager'] !== '')?$search['manager']:''); ?>">
		</div>
		<div class="text-l mt-5">
			<input type="text" class="input-text radius" style="width:170px;" placeholder="买入开始时间" name="create_begin" value="<?php echo (isset($search['create_begin']) && ($search['create_begin'] !== '')?$search['create_begin']:''); ?>" onclick="WdatePicker({readOnly:true, dateFmt:'yyyy-MM-dd HH:mm'})"> -
			<input type="text" class="input-text radius" style="width:170px;" placeholder="买入结束时间" name="create_end" value="<?php echo (isset($search['create_end']) && ($search['create_end'] !== '')?$search['create_end']:''); ?>" onclick="WdatePicker({readOnly:true, dateFmt:'yyyy-MM-dd HH:mm'})">
			<span class="select-box radius" style="width:110px;height: 31px;">
				<select class="select radius" name="force_type" size="1">
					<option value="">平仓类型</option>
					<option value="1" <?php if(isset($search['force_type']) AND $search['force_type'] == '1'): ?>selected<?php endif; ?>>爆仓</option>
					<option value="2" <?php if(isset($search['force_type']) AND $search['force_type'] == '2'): ?>selected<?php endif; ?>>止盈止损</option>
					<option value="3" <?php if(isset($search['force_type']) AND $search['force_type'] == '3'): ?>selected<?php endif; ?>>非自动递延</option>
					<option value="4" <?php if(isset($search['force_type']) AND $search['force_type'] == '4'): ?>selected<?php endif; ?>>余额不足</option>
				</select>
			</span>
			<button type="submit" class="btn btn-success size-S radius" id="" name=""><i class="Hui-iconfont Hui-iconfont-search2"></i>搜索</button>
		</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		</span>
		<span class="r">共有数据：<strong><?php echo $datas['total']; ?></strong> 条</span>
	</div>
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
		<tr class="text-c">
			<!--<th width="25"><input type="checkbox" value="" name=""></th>-->
			<th width="40">ID</th>
			<th>昵称</th>
			<th>手机号</th>
			<th>股票代码</th>
			<th>股票名称</th>
			<th>会员</th>
			<th>代理商</th>
			<th>经纪人</th>
			<th>买入价</th>
			<th>买入数量</th>
			<th>止盈</th>
			<th>止损</th>
			<th>卖出价</th>
			<th>卖出数量</th>
			<th>盈亏</th>
			<th>保证金</th>
			<th>建仓费</th>
			<th>递延费</th>
			<th>平仓类型</th>
			<th>买入时间</th>
			<th>操作</th>
		</tr>
		</thead>
		<tbody>
		<?php if(is_array($datas['data']) || $datas['data'] instanceof \think\Collection || $datas['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $datas['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
		<tr class="text-c mode-lists">
			<td><?php echo $item['order_id']; ?></td>
			<td><?php echo (isset($item['has_one_user']['nickname']) && ($item['has_one_user']['nickname'] !== '')?$item['has_one_user']['nickname']:$item['has_one_user']['username']); ?></td>
			<td><?php echo $item['has_one_user']['mobile']; ?></td>
			<td><?php echo $item['code']; ?></td>
			<td><?php echo $item['name']; ?></td>
			<td><?php echo (isset($item['has_one_user']['has_one_admin']['has_one_parent']['username']) && ($item['has_one_user']['has_one_admin']['has_one_parent']['username'] !== '')?$item['has_one_user']['has_one_admin']['has_one_parent']['username']:'无'); ?></td>
			<td><?php echo (isset($item['has_one_user']['has_one_admin']['username']) && ($item['has_one_user']['has_one_admin']['username'] !== '')?$item['has_one_user']['has_one_admin']['username']:'无'); ?></td>
			<td><?php echo (isset($item['has_one_user']['has_one_parent']['username']) && ($item['has_one_user']['has_one_parent']['username'] !== '')?$item['has_one_user']['has_one_parent']['username']:'无'); ?></td>
			<td><?php echo number_format($item['price'],2); ?></td>
			<td><?php echo intval($item['hand']); ?></td>
			<td><?php echo number_format($item['stop_profit_price'],2); ?></td>
			<td><?php echo number_format($item['stop_loss_price'],2); ?></td>
			<td><?php echo number_format($item['sell_price'],2); ?></td>
			<td><?php echo intval($item['sell_hand']); ?></td>
			<td>
				<?php if($item['profit'] < 0): ?>
				<font style="color: #1eb83f;"><?php echo number_format($item['profit'],2); ?></font>
				<?php elseif($item['profit'] == 0): ?>
				<font style="color: #CC0000;"><?php echo number_format($item['profit'],2); ?></font>
				<?php else: ?>
				<font style="color: #CC0000;"><?php echo number_format($item['profit'],2); ?></font>
				<?php endif; ?>
			</td>
			<td><?php echo number_format($item['deposit'],2); ?></td>
			<td><?php echo number_format($item['jiancang_fee'],2); ?></td>
			<td><?php echo number_format($item['defer'],2); ?></td>
			<td><?php echo $item['force_type_text']; ?></td>
			<td><?php echo date("Y-m-d H:i", $item['create_at']); ?></td>
			<td>
				<?php if(in_array('admin/Order/forceSell', \think\Session::get('ACCESS_LIST'))): ?>
                <input class="btn btn-danger size-MINI radius" type="button" title="平仓" onclick="force_sell('<?php echo $item['order_id']; ?>', '<?php echo $item['sell_price']; ?>', this)" value="平仓">
				<?php endif; if(in_array(($item['force_type']), explode(',',"1,2"))): if(in_array('admin/Order/give', \think\Session::get('ACCESS_LIST'))): ?>
                <input class="btn btn-secondary size-MINI radius" type="button" title="送股" onclick="mode_show('订单转送股', '<?php echo url("admin/Order/give", ['id' => $item['order_id']]); ?>', '', '350')" value="送股">
                <?php endif; if(in_array('admin/Order/ware', \think\Session::get('ACCESS_LIST'))): ?>
				<input class="btn btn-warning size-MINI radius" type="button" title="穿仓" onclick="order_ware('<?php echo $item['order_id']; ?>', '<?php echo $item['sell_price']; ?>')" value="穿仓">
				<?php endif; if(in_array('admin/Order/toPosition', \think\Session::get('ACCESS_LIST'))): ?>
                <input class="btn btn-primary size-MINI radius" type="button" title="转为持仓" onclick="to_position('<?php echo $item['order_id']; ?>', this)" value="持仓">
				<?php endif; endif; ?>
            </td>
		</tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>

		<tr class="text-c admin-lists">
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
            <td><strong>本页汇总</strong></td>
			<td><strong><?php echo number_format($profit,2); ?></strong></td>
			<td>-</td>
			<td><strong><?php echo number_format($jiancang_fee,2); ?></strong></td>
			<td><strong><?php echo number_format($defer,2); ?></strong></td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
		</tr>
		<tr class="text-c admin-lists">
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
            <td><strong>全部汇总</strong></td>
			<td><strong><?php echo number_format($pc_sum['profit_sum'],2); ?></strong></td>
			<td>-</td>
			<td><strong><?php echo number_format($pc_sum['jiancang_fee_sum'],2); ?></strong></td>
			<td><strong><?php echo number_format($pc_sum['defer_sum'],2); ?></strong></td>
			<td>-</td>
			<td>-</td>
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

<script>
    <?php if(in_array('admin/Order/give', \think\Session::get('ACCESS_LIST'))): ?>
    function mode_show(title,url,w,h){
        layer_show(title,url,w,h);
    }
	<?php endif; if(in_array('admin/Order/ware', \think\Session::get('ACCESS_LIST'))): ?>
    function order_ware(_id, _price)
    {
        layer.prompt({
            title: '开盘跌停价',
            value: _price,
            formType: 0,
        }, function(_number, _prompt){
            layer.close(_prompt);
            var _oData = {id : _id, sell : _number},
                _url = '<?php echo url("admin/Order/ware"); ?>',
                _loading = parent.layer.load(1),
                _func = function (_resp) {
                    parent.layer.close(_loading);
                    if (!_resp.state) {
                        layer.msg(_resp.info);
                    } else {
                        layer.msg('操作成功！', {time: 500}, function(){
                            window.location.reload();
                        });
                    }
                };
            _ajaxPost(_url, _oData, _func);
        });
    }
	<?php endif; if(in_array('admin/Order/toPosition', \think\Session::get('ACCESS_LIST'))): ?>
    function to_position(_id, _obj)
    {
        parent.layer.confirm('确认此订单转为持仓？', function(index){
            parent.layer.close(index);
            var _oData = {id : _id},
                _url = '<?php echo url("admin/Order/toPosition"); ?>',
                _loading = parent.layer.load(1),
                _func = function (_resp) {
                    parent.layer.close(_loading);
                    if (!_resp.state) {
                        layer.msg(_resp.info);
                    } else {
                        layer.msg('操作成功！', {time: 500}, function(){
                            $(_obj).parents("tr").remove();
                        });
                    }
                };
            _ajaxPost(_url, _oData, _func);
        });
    }
	<?php endif; if(in_array('admin/Order/forceSell', \think\Session::get('ACCESS_LIST'))): ?>
    function force_sell(_id, _price, _obj)
    {
        parent.layer.confirm('确认此订单强制平仓？', function(index){
            parent.layer.close(index);
            layer.prompt({
                title: '平仓价格',
                value: _price,
                formType: 0,
            }, function(_number, _prompt){
                layer.close(_prompt);
                var _oData = {id : _id, sell_price : _number},
                    _url = '<?php echo url("admin/Order/forceSell"); ?>',
                    _loading = parent.layer.load(1),
                    _func = function (_resp) {
                        parent.layer.close(_loading);
                        if (!_resp.state) {
                            layer.msg(_resp.info);
                        } else {
                            layer.msg('操作成功！', {time: 500}, function(){
                                $(_obj).parents("tr").remove();
                            });
                        }
                    };
                _ajaxPost(_url, _oData, _func);
            });
        });
    }
	<?php endif; ?>
</script>
