<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/admin/view/admin/lists.html";i:1568109530;s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/application/admin/view/layouts/layout_iframe.html";i:1568109530;}*/ ?>
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
    <title>角色管理</title>
</head>
<body>

<nav class="breadcrumb">
    <i class="Hui-iconfont Hui-iconfont-home2"></i> 首页
    <span class="c-gray en">&gt;</span> 管理员管理
    <span class="c-gray en">&gt;</span> 管理员列表
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
        <i class="Hui-iconfont Hui-iconfont-huanyipi"></i>
    </a>
</nav>
<div class="page-container">
    <form action="" method="get">
    <div class="text-c">
        <input type="text" class="input-text" style="width:170px;" placeholder="登录名" name="username" value="<?php echo (isset($search['username']) && ($search['username'] !== '')?$search['username']:''); ?>">
        <input type="text" class="input-text" style="width:170px;" placeholder="昵称" name="nickname" value="<?php echo (isset($search['nickname']) && ($search['nickname'] !== '')?$search['nickname']:''); ?>">
        <input type="text" class="input-text" style="width:170px;" placeholder="手机号" name="mobile" value="<?php echo (isset($search['mobile']) && ($search['mobile'] !== '')?$search['mobile']:''); ?>">
        <span class="select-box" style="width:130px;height: 31px;">
            <select class="select" name="role" size="1">
                <option value="">所属角色</option>
                <?php if(is_array($roles) || $roles instanceof \think\Collection || $roles instanceof \think\Paginator): $i = 0; $__LIST__ = $roles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $item['id']; ?>" <?php if(isset($search['role']) AND $search['role'] == $item['id']): ?>selected<?php endif; ?>><?php echo $item['name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </span>
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
            <?php if(in_array('admin/Admin/patchRemove', \think\Session::get('ACCESS_LIST'))): ?>
            <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
                <i class="Hui-iconfont  Hui-iconfont-del3"></i> 批量删除
            </a>
            <?php endif; if(in_array('admin/Admin/create', \think\Session::get('ACCESS_LIST'))): ?>
			<a class="btn btn-primary radius" href="javascript:;" onclick="admin_add('添加管理员','<?php echo url("admin/Admin/create"); ?>','', '500')">
				<i class="Hui-iconfont Hui-iconfont-add"></i> 添加管理员
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
            <th>昵称</th>
            <th>手机号</th>
            <th>所属角色</th>
            <th>最后登录IP</th>
            <th>最后登录时间</th>
            <th>状态</th>
            <th width="80">操作</th>
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
            <td><?php echo (isset($item['has_one_role']['name']) && ($item['has_one_role']['name'] !== '')?$item['has_one_role']['name']:'系统管理员'); ?></td>
            <td><?php echo $item['last_ip']; ?></td>
            <td>
                <?php if($item['last_time']): ?><?php echo date('Y-m-d H:i:s', $item['last_time']); endif; ?>
            </td>
            <td>
                <?php if($item['status']['value'] == 0): ?>
                <span class="label label-success radius"><?php echo $item['status']['text']; ?></span>
                <?php else: ?>
                <span class="label label-danger radius"><?php echo $item['status']['text']; ?></span>
                <?php endif; ?>
            </td>
            <td class="f-14">
                <?php if(in_array('admin/Admin/modify', \think\Session::get('ACCESS_LIST'))): ?>
                <input class="btn btn-success size-MINI radius" type="button" title="管理员编辑" onclick="admin_edit('管理员编辑','<?php echo url("admin/Admin/modify", ['id' => $item['admin_id']]); ?>','','500')" value="编辑">
                <?php endif; if(in_array('admin/Admin/remove', \think\Session::get('ACCESS_LIST'))): ?>
                <input class="btn btn-danger size-MINI radius" type="button" title="管理员删除" onclick="admin_del(this,<?php echo $item['admin_id']; ?>);" value="删除">
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
    <?php if(in_array('admin/Admin/create', \think\Session::get('ACCESS_LIST'))): ?>
    function admin_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    <?php endif; if(in_array('admin/Admin/modify', \think\Session::get('ACCESS_LIST'))): ?>
    function admin_edit(title,url,w,h){
        layer_show(title,url,w,h);
    }
    <?php endif; if(in_array('admin/Admin/remove', \think\Session::get('ACCESS_LIST'))): ?>
    function admin_del(_obj, _id) {
        parent.layer.confirm('管理员删除不可逆，确认要删除吗？',function(index){
            var _oData = {id:_id},
                _url = '<?php echo url("admin/Admin/remove"); ?>',
                _func = function (_resp) {
                    parent.layer.close(index);
                    if (!_resp.state) {
                        layer.msg(_resp.info);
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
    <?php endif; if(in_array('admin/Admin/patchRemove', \think\Session::get('ACCESS_LIST'))): ?>
    function datadel()
    {
        var _ids = new Array();
        $(".admin-lists").find("input[type*=checkbox]").each(function(index, el) {
            if( $(this).is(":checked") ){
                var _id = $(this).val();
                _ids.push(_id);
            }
        });
        if(_ids.length == 0){
            layer.msg("请选择要删除的数据！");
            return false;
        }else{
            parent.layer.confirm('管理员删除不可逆，确认要删除吗？',function(index){
                var _oData = {ids: _ids},
                    _url = '<?php echo url("admin/Admin/patchRemove"); ?>',
                    _func = function (_resp) {
                        parent.layer.close(index);
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
