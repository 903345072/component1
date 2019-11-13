<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:91:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/admin/view/permission/lists.html";i:1568109530;s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/application/admin/view/layouts/layout_iframe.html";i:1568109530;}*/ ?>
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
    <title>权限管理</title>
</head>
<body>

<nav class="breadcrumb">
    <i class="Hui-iconfont Hui-iconfont-home2"></i> 首页
    <span class="c-gray en">&gt;</span> 管理员管理
    <span class="c-gray en">&gt;</span> 权限管理
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont Hui-iconfont-huanyipi"></i>
    </a>
</nav>
<div class="page-container">

    <div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
            <!--<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
                <i class="Hui-iconfont  Hui-iconfont-del3"></i> 批量删除
            </a>-->
            <?php if(in_array('admin/Permission/add', \think\Session::get('ACCESS_LIST'))): ?>
			<a class="btn btn-primary radius" href="javascript:;" onclick="permission_add('添加节点','<?php echo url("admin/Permission/add"); ?>','', '650')">
				<i class="Hui-iconfont Hui-iconfont-add"></i> 添加节点
            </a>
            <?php endif; ?>
        </span>

    </div>
    <table class="table table-border table-bordered table-hover table-bg">
        <thead>
        <tr class="text-c">
            <th width="40">ID</th>
            <th>节点名称</th>
            <th>操作地址</th>
            <th>类型</th>
            <th>ICON</th>
            <th>状态</th>
            <th>排序</th>
            <th width="80">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td width="40"><?php echo $item['id']; ?></td>
                <td class="text-l"><?php echo $item['name']; ?></td>
                <td><?php echo $item['act']; ?></td>
                <td><?php if($item['module'] == 0): ?>模块<?php elseif($item['module'] == 1): ?>列表<?php elseif($item['module'] == 2): ?>操作<?php endif; ?></td>
                <td><?php echo $item['icon']; ?></td>
                <td><?php if($item['status'] == 0): ?>关闭<?php elseif($item['status'] == 1): ?>开启<?php endif; ?></td>
                <td><?php echo $item['sort']; ?></td>
                <td class="f-14">
                    <?php if(in_array('admin/Permission/modify', \think\Session::get('ACCESS_LIST'))): ?>
                    <input class="btn btn-success size-MINI radius" type="button" title="节点编辑" onclick="permission_edit('节点编辑','<?php echo url("admin/Permission/modify", ['id' => $item['id']]); ?>','','650')" value="编辑">
                    <?php endif; if(in_array('admin/Permission/del', \think\Session::get('ACCESS_LIST'))): ?>
                    <input class="btn btn-danger size-MINI radius" type="button" title="节点删除" onclick="permission_del('<?php echo $item['id']; ?>')" value="删除">
                    <?php endif; ?>
                </td>
            </tr>
            <?php if(is_array($item['children']) || $item['children'] instanceof \think\Collection || $item['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$children): $mod = ($i % 2 );++$i;?>

                <tr class="text-c">
                    <td width="40"><?php echo $children['id']; ?></td>
                    <td class="text-l">&nbsp;&nbsp;├&nbsp;<?php echo $children['name']; ?></td>
                    <td><?php echo $children['act']; ?></td>
                    <td><?php if($children['module'] == 0): ?>模块<?php elseif($children['module'] == 1): ?>列表<?php elseif($children['module'] == 2): ?>操作<?php endif; ?></td>
                    <td><?php echo $children['icon']; ?></td>
                    <td><?php if($children['status'] == 0): ?>关闭<?php elseif($children['status'] == 1): ?>开启<?php endif; ?></td>
                    <td><?php echo $children['sort']; ?></td>
                    <td class="f-14">
                        <?php if(in_array('admin/Permission/modify', \think\Session::get('ACCESS_LIST'))): ?>
                        <input class="btn btn-success size-MINI radius" type="button" title="节点编辑" onclick="permission_edit('节点编辑','<?php echo url("admin/Permission/modify", ['id' => $children['id']]); ?>','','650')" value="编辑">
                        <?php endif; if(in_array('admin/Permission/del', \think\Session::get('ACCESS_LIST'))): ?>
                        <input class="btn btn-danger size-MINI radius" type="button" title="节点删除" onclick="permission_del('<?php echo $children['id']; ?>')" value="删除">
                        <?php endif; ?>
                    </td>
                </tr>
                <?php if(is_array($children['children']) || $children['children'] instanceof \think\Collection || $children['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $children['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$act): $mod = ($i % 2 );++$i;?>
                    <tr class="text-c">
                        <td width="40"><?php echo $act['id']; ?></td>
                        <td class="text-l">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├&nbsp;<?php echo $act['name']; ?></td>
                        <td><?php echo $act['act']; ?></td>
                        <td><?php if($act['module'] == 0): ?>模块<?php elseif($act['module'] == 1): ?>列表<?php elseif($act['module'] == 2): ?>操作<?php endif; ?></td>
                        <td><?php echo $act['icon']; ?></td>
                        <td><?php if($act['status'] == 0): ?>关闭<?php elseif($act['status'] == 1): ?>开启<?php endif; ?></td>
                        <td><?php echo $act['sort']; ?></td>
                        <td class="f-14">
                            <?php if(in_array('admin/Permission/modify', \think\Session::get('ACCESS_LIST'))): ?>
                            <input class="btn btn-success size-MINI radius" type="button" title="节点编辑" onclick="permission_edit('节点编辑','<?php echo url("admin/Permission/modify", ['id' => $act['id']]); ?>','','650')" value="编辑">
                            <?php endif; if(in_array('admin/Permission/del', \think\Session::get('ACCESS_LIST'))): ?>
                            <input class="btn btn-danger size-MINI radius" type="button" title="节点删除" onclick="permission_del('<?php echo $act['id']; ?>')" value="删除">
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php if(is_array($act['children']) || $act['children'] instanceof \think\Collection || $act['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $act['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list_act): $mod = ($i % 2 );++$i;?>
                    <tr class="text-c">
                        <td width="40"><?php echo $list_act['id']; ?></td>
                        <td class="text-l">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├&nbsp;<?php echo $list_act['name']; ?></td>
                        <td><?php echo $list_act['act']; ?></td>
                        <td><?php if($list_act['module'] == 0): ?>模块<?php elseif($list_act['module'] == 1): ?>列表<?php elseif($list_act['module'] == 2): ?>操作<?php endif; ?></td>
                        <td><?php echo $list_act['icon']; ?></td>
                        <td><?php if($list_act['status'] == 0): ?>关闭<?php elseif($list_act['status'] == 1): ?>开启<?php endif; ?></td>
                        <td><?php echo $list_act['sort']; ?></td>
                        <td class="f-14">
                            <?php if(in_array('admin/Permission/modify', \think\Session::get('ACCESS_LIST'))): ?>
                            <input class="btn btn-success size-MINI radius" type="button" title="节点编辑" onclick="permission_edit('节点编辑','<?php echo url("admin/Permission/modify", ['id' => $list_act['id']]); ?>','','650')" value="编辑">
                            <?php endif; if(in_array('admin/Permission/del', \think\Session::get('ACCESS_LIST'))): ?>
                            <input class="btn btn-danger size-MINI radius" type="button" title="节点删除" onclick="permission_del('<?php echo $list_act['id']; ?>')" value="删除">
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
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
    <?php if(in_array('admin/Permission/add', \think\Session::get('ACCESS_LIST'))): ?>
    function permission_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    <?php endif; if(in_array('admin/Permission/modify', \think\Session::get('ACCESS_LIST'))): ?>
    function permission_edit(title,url,w,h){
        layer_show(title,url,w,h);
    }
    <?php endif; if(in_array('admin/Permission/del', \think\Session::get('ACCESS_LIST'))): ?>
    function permission_del(id){
        layer.confirm('确认要删除当前节点吗？',function(index){
            var _oData = {id:id},
                _url = '<?php echo url("admin/Permission/del"); ?>',
                _func = function (_resp) {
                    layer.close(index);
                    if (!_resp.state) {
                        parent.layer.msg(_resp.info);
                    } else {
                        layer.msg('删除成功！', {time: 500}, function(){
                            if(_resp.data && _resp.data.url){
                                parent.window.location.href = _resp.data.url;
                            }else{
                                window.location.reload();
                            }
                        });
                    }
                };
            _ajaxPost(_url, _oData, _func);
        });
    }
    <?php endif; ?>


</script>
