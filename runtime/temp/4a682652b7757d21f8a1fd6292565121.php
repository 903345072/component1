<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:87:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/admin/view/team/operate.html";i:1568109530;s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/application/admin/view/layouts/layout_iframe.html";i:1568109530;}*/ ?>
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
    <title>运营中心</title>
</head>
<body>

<nav class="breadcrumb">
    <i class="Hui-iconfont Hui-iconfont-home2"></i> 首页
    <span class="c-gray en">&gt;</span> 组织架构
    <span class="c-gray en">&gt;</span> 运营中心
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont Hui-iconfont-huanyipi"></i>
    </a>
</nav>
<div class="page-container">
    <form action="" method="get">
    <div class="text-c">
        <input type="text" class="input-text" style="width:170px;" placeholder="登录名" name="username" value="<?php echo (isset($search['username']) && ($search['username'] !== '')?$search['username']:''); ?>">
        <input type="text" class="input-text" style="width:170px;" placeholder="真名" name="nickname" value="<?php echo (isset($search['nickname']) && ($search['nickname'] !== '')?$search['nickname']:''); ?>">
        <input type="text" class="input-text" style="width:170px;" placeholder="手机号" name="mobile" value="<?php echo (isset($search['mobile']) && ($search['mobile'] !== '')?$search['mobile']:''); ?>">
        <input type="text" class="input-text" style="width:170px;" placeholder="上级结算中心" name="settle" value="<?php echo (isset($search['settle']) && ($search['settle'] !== '')?$search['settle']:''); ?>">
        <span class="select-box" style="width:70px;height: 31px;">
            <select class="select" name="status" size="1">
                <option value="">状态</option>
                <option value="0" <?php if(isset($search['status']) AND $search['status'] === '0'): ?>selected<?php endif; ?>>正常</option>
                <option value="1" <?php if(isset($search['status']) AND $search['status'] === '1'): ?>selected<?php endif; ?>>禁用</option>
            </select>
        </span>
        <button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont Hui-iconfont-search2"></i>搜索</button>
    </div>
    </form>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
            <!--<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
                <i class="Hui-iconfont  Hui-iconfont-del3"></i> 批量删除
            </a>-->
            <?php if(in_array('admin/Team/createOperate', \think\Session::get('ACCESS_LIST'))): ?>
			<a class="btn btn-primary radius" href="javascript:;" onclick="admin_add('添加运营中心','<?php echo url("admin/Team/createOperate"); ?>','', '450')">
				<i class="Hui-iconfont Hui-iconfont-add"></i> 添加用户
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
            <th>登录名</th>
            <th>真名</th>
            <th>手机号</th>
            <th>上级结算中心</th>
            <th>盈利返点（%）</th>
            <th>建仓费返点（%）</th>
            <th>递延费返点（%）</th>
            <th>保证金</th>
            <th>手续费总计</th>
            <th>创建时间</th>
            <th>状态</th>
            <th width="120">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($datas['data']) || $datas['data'] instanceof \think\Collection || $datas['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $datas['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
        <tr class="text-c admin-lists">
            <td width="25"><input type="checkbox" value="<?php echo $item['admin_id']; ?>" name=""></td>
            <td width="40"><?php echo $item['admin_id']; ?></td>
            <td><?php echo $item['username']; ?></td>
            <td><?php echo $item['nickname']; ?></td>
            <td><?php echo $item['mobile']; ?></td>
            <td><?php echo $item['has_one_parent']['username']; ?></td>
            <td><?php echo $item['point']; ?></td>
            <td><?php echo $item['jiancang_point']; ?></td>
            <td><?php echo $item['defer_point']; ?></td>
            <td><?php echo number_format($item['deposit'],2); ?></td>
            <td><?php echo number_format($item['total_fee'],2); ?></td>
            <td><?php echo date('Y-m-d H:i:s', $item['create_at']); ?></td>
            <td>
                <?php if($item['status']['value'] == 0): ?>
                <span class="label label-success radius"><?php echo $item['status']['text']; ?></span>
                <?php else: ?>
                <span class="label label-danger radius"><?php echo $item['status']['text']; ?></span>
                <?php endif; ?>
            </td>
            <td class="f-14">
                <?php if(in_array('admin/Team/modifyOperate', \think\Session::get('ACCESS_LIST'))): ?>
                <input class="btn btn-success size-MINI radius" type="button" title="编辑运营中心" onclick="admin_edit('编辑运营中心','<?php echo url("admin/Team/modifyOperate", ['id' => $item['admin_id']]); ?>','','450')" value="修改">
                <?php endif; if(in_array('admin/Team/operatePoint', \think\Session::get('ACCESS_LIST'))): ?>
                <input class="btn btn-primary size-MINI radius" type="button" title="返点修改" onclick="operate_point('返点修改','<?php echo url("admin/Team/operatePoint", ['id' => $item['admin_id']]); ?>','','340');" value="返点">
                <?php endif; if(in_array('admin/Team/recharge', \think\Session::get('ACCESS_LIST'))): ?>
                <input class="btn btn-warning size-MINI radius" type="button" title="保证金充值" onclick="admin_recharge(this,<?php echo $item['admin_id']; ?>);" value="充值">
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
    <?php if(in_array('admin/Team/createOperate', \think\Session::get('ACCESS_LIST'))): ?>
    function admin_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    <?php endif; if(in_array('admin/Team/modifyOperate', \think\Session::get('ACCESS_LIST'))): ?>
    function admin_edit(title,url,w,h){
        layer_show(title,url,w,h);
    }
    <?php endif; if(in_array('admin/Team/operatePoint', \think\Session::get('ACCESS_LIST'))): ?>
    function operate_point(title,url,w,h){
        layer_show(title,url,w,h);
    }
    <?php endif; if(in_array('admin/Team/recharge', \think\Session::get('ACCESS_LIST'))): ?>
    function admin_recharge(_obj, _id)
    {
        layer.prompt({
            title: '保证金充值',
            formType: 0,
        }, function(_number, _prompt){
            layer.close(_prompt);
            var _oData = {id : _id, number : _number},
                _url = '<?php echo url("admin/Team/recharge"); ?>',
                _loading = parent.layer.load(1),
                _func = function (_resp) {
                    parent.layer.close(_loading);
                    if (!_resp.state) {
                        layer.msg(_resp.info);
                    } else {
                        layer.msg('充值成功！', {time: 500}, function(){
                            if(_resp.data && _resp.data.url){
                                parent.window.location.href = _resp.data.url;
                            }else{
                                var _before = $(_obj).parents("tr").children("td:eq(9)").html(),
                                    _before = parseFloat(_before.replace("," , "")),
                                    _change = parseFloat(_number.replace("," , "")),
                                    _after = _before + _change,
                                    _after = number_format(_after);
                                $(_obj).parents("tr").children("td:eq(9)").html(_after);
                            }
                        });
                    }
                };
            _ajaxPost(_url, _oData, _func);
        });
    }
    <?php endif; ?>

    /*function admin_point(_obj, _id)
    {
        layer.prompt({
            title: '修改返点百分比',
            formType: 0,
        }, function(_number, _prompt){
            layer.close(_prompt);
            var _oData = {id : _id, point : _number},
                _url = '<?php echo url("admin/Team/rebate"); ?>',
                _loading = parent.layer.load(1),
                _func = function (_resp) {
                    parent.layer.close(_loading);
                    if (!_resp.state) {
                        layer.msg(_resp.info);
                    } else {
                        layer.msg('操作成功！', {time: 500}, function(){
                            if(_resp.data && _resp.data.url){
                                parent.window.location.href = _resp.data.url;
                            }else{
                                $(_obj).parents("tr").children("td:eq(6)").html(_number);
                            }
                        });
                    }
                };
            _ajaxPost(_url, _oData, _func);
        });
    }*/
</script>
