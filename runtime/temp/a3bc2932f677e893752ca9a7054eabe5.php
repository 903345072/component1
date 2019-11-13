<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:93:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/admin/view/user/withdrawLists.html";i:1568109530;s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/application/admin/view/layouts/layout_iframe.html";i:1568109530;}*/ ?>
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
    <title>会员出金</title>
</head>
<body>

<nav class="breadcrumb">
    <i class="Hui-iconfont Hui-iconfont-home2"></i> 首页
    <span class="c-gray en">&gt;</span> 会员管理
    <span class="c-gray en">&gt;</span> 会员出金列表
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont Hui-iconfont-huanyipi"></i>
    </a>
</nav>
<div class="page-container">
    <form action="" method="get">
    <div class="text-c">
        <input type="text" class="input-text" style="width:170px;" placeholder="登录名" name="username" value="<?php echo (isset($search['username']) && ($search['username'] !== '')?$search['username']:''); ?>">
        <input type="text" class="input-text" style="width:170px;" placeholder="手机号" name="mobile" value="<?php echo (isset($search['mobile']) && ($search['mobile'] !== '')?$search['mobile']:''); ?>">

        <span class="select-box" style="width:70px;height: 31px;">
            <select class="select" name="state" size="1">
                <option value="">状态</option>
                <option value="0" <?php if(isset($search['state']) AND $search['state'] === '0'): ?>selected<?php endif; ?>>待审核</option>
                <option value="1" <?php if(isset($search['state']) AND $search['state'] === '1'): ?>selected<?php endif; ?>>代付中</option>
                <option value="2" <?php if(isset($search['state']) AND $search['state'] === '2'): ?>selected<?php endif; ?>>已到账</option>
                <option value="3" <?php if(isset($search['state']) AND $search['state'] === '3'): ?>selected<?php endif; ?>>到账失败</option>
                <option value="-1" <?php if(isset($search['state']) AND $search['state'] === '-1'): ?>selected<?php endif; ?>>已拒绝</option>
            </select>
        </span>
        <button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont Hui-iconfont-search2"></i>搜索</button>
    </div>
    </form>
    <div class="cl pd-5 bg-1 bk-gray mt-20">

        <span class="r">共有数据：<strong><?php echo $datas['total']; ?></strong> 条</span>
    </div>
    <table class="table table-border table-bordered table-hover table-bg">
        <thead>
        <tr class="text-c">
            <th width="25"><input type="checkbox" value="" name=""></th>
            <th width="40">ID</th>
            <th>登录名</th>
            <th>昵称</th>
            <th>手机号</th>
            <th>出金金额</th>
            <th>手续费</th>
            <th>实际到账</th>
            <th>申请时间</th>
            <th>审核时间</th>
            <th>审核人</th>
            <th>状态</th>
            <th width="140">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(empty($datas['data']) || (($datas['data'] instanceof \think\Collection || $datas['data'] instanceof \think\Paginator ) && $datas['data']->isEmpty())): ?>
        <tr class="text-c admin-lists">
            <td colspan="13">暂时没有匹配到数据</td>
        </tr>
        <?php endif; if(is_array($datas['data']) || $datas['data'] instanceof \think\Collection || $datas['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $datas['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
        <tr class="text-c admin-lists">
            <td width="25"><input type="checkbox" value="<?php echo $item['id']; ?>" name=""></td>
            <td width="40"><?php echo $item['id']; ?></td>
            <td><?php echo $item['has_one_user']['username']; ?></td>
            <td><?php echo $item['has_one_user']['nickname']; ?></td>
            <td><?php echo $item['has_one_user']['mobile']; ?></td>
            <td><?php echo (isset($item['amount'] ) && ($item['amount']  !== '')?$item['amount'] :'0.00'); ?></td>
            <td><?php echo (isset($item['poundage'] ) && ($item['poundage']  !== '')?$item['poundage'] :'0.00'); ?></td>
            <td><?php echo (isset($item['actual'] ) && ($item['actual']  !== '')?$item['actual'] :'0.00'); ?></td>
            <td><?php echo date('Y-m-d H:i:s', $item['create_at'] ); ?></td>
            <td><?php if($item['update_at'] == 0): else: ?><?php echo date('Y-m-d H:i:s', $item['update_at'] ); endif; ?></td>
            <td><?php echo (isset($item['has_one_admin']['username'] ) && ($item['has_one_admin']['username']  !== '')?$item['has_one_admin']['username'] :''); ?></td>
            <td>
                <?php if($item['state'] == 0): ?>
                    <span class="label label-warning radius">待审核</span>
                <?php elseif($item['state'] == 1): ?>
                    <span class="label label-primary radius">代付中</span>
                <?php elseif($item['state'] == 2): ?>
                    <span class="label label-success radius">已到账</span>
                <?php elseif($item['state'] == 3): ?>
                    <span class="label label-danger radius">到账失败</span>
                <?php elseif($item['state'] == -1): ?>
                    <span class="label label-danger radius">已拒绝</span>
                <?php endif; ?>
            </td>
            <td class="f-14">
                <?php if(in_array('admin/User/withdrawDetail', \think\Session::get('ACCESS_LIST'))): ?>
                <input class="btn btn-primary size-MINI radius" type="button" title="查看详情" onclick="show_detail('出金详情', '<?php echo url("admin/User/withdrawDetail", ['id' => $item['id']]); ?>','','540')" value="查看详情">
                <?php endif; if($item['state'] == 0): if(in_array('admin/User/withdraw', \think\Session::get('ACCESS_LIST'))): ?>
                <input class="btn btn-success size-MINI radius" type="button" title="审核通过" onclick="admin_success('<?php echo $item['id']; ?>', '1')" value="通过">
                <input class="btn btn-danger size-MINI radius" type="button" title="审核拒绝" onclick="admin_refuse('<?php echo $item['id']; ?>', '-1')" value="拒绝">
                <?php endif; endif; ?>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <tr class="text-c admin-lists">
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td><strong>本页汇总</strong></td>
            <td><strong><?php echo number_format($by_sum['amount_sum'],2); ?></strong></td>
            <td><strong><?php echo number_format($by_sum['poundage_sum'],2); ?></strong></td>
            <td><strong><?php echo number_format($by_sum['actual_sum'],2); ?></strong></td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
        <tr class="text-c admin-lists">
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td><strong>全部汇总</strong></td>
            <td><strong><?php echo number_format($pc_sum['amount_sum'],2); ?></strong></td>
            <td><strong><?php echo number_format($pc_sum['poundage_sum'],2); ?></strong></td>
            <td><strong><?php echo number_format($pc_sum['actual_sum'],2); ?></strong></td>
            <td>-</td>
            <td>-</td>
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
    <?php if(in_array('admin/User/withdrawDetail', \think\Session::get('ACCESS_LIST'))): ?>
    function show_detail(title,url,w,h){
        layer_show(title,url,w,h);
    }
    <?php endif; if(in_array('admin/User/withdraw', \think\Session::get('ACCESS_LIST'))): ?>
    function admin_success(_id, state)
    {
        layer.confirm('是否确认本次出金?', {icon: 1, title:'提示'}, function(index){
            parent.layer.close(index);
            var _oData = {id : _id, state:state},
                _url = '<?php echo url("admin/User/withdraw"); ?>',
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
    function admin_refuse(_id, state)
    {
        layer.confirm('是否拒绝本次出金?', {icon: 5, title:'提示'}, function(index){
            parent.layer.close(index);
            var _oData = {id : _id, state:state},
                _url = '<?php echo url("admin/User/withdraw"); ?>',
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
    <?php endif; ?>
</script>
