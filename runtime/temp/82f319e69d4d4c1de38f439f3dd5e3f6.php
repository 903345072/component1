<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:92:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/admin/view/permission/modify.html";i:1568109530;s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/application/admin/view/layouts/layout_iframe.html";i:1568109530;}*/ ?>
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
    <title>添加用户</title>
</head>
<body>

<article class="page-container">
    <form class="form form-horizontal" id="form-team-user-add">
        <input type="hidden" class="input-text" value="<?php echo $data['id']; ?>" name="id">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>节点名称：</label>
            <div class="formControls col-xs-8 col-sm-7">
                <input type="text" class="input-text" value="<?php echo $data['name']; ?>" placeholder="节点名称" name="name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>上级节点：</label>
            <div class="formControls col-xs-8 col-sm-7">
						<span class="select-box">
						<select class="select" id="sel_Sub" name="pid">
							<option value="0">顶级节点</option>
                            <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $item['id']; ?>" <?php if($data['pid'] == $item['id']): ?>selected<?php endif; ?> ><?php echo $item['name']; ?>-模块</option>
                                <?php if(is_array($item['children']) || $item['children'] instanceof \think\Collection || $item['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$children): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $children['id']; ?>" <?php if($data['pid'] == $children['id']): ?>selected<?php endif; ?> >&nbsp;&nbsp;├ <?php echo $children['name']; ?>-列表</option>
                                    <?php if(is_array($children['children']) || $children['children'] instanceof \think\Collection || $children['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $children['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$act): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $act['id']; ?>" <?php if($data['pid'] == $act['id']): ?>selected<?php endif; ?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├ <?php echo $act['name']; ?>-操作</option>
                                    <?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>

						</select>
						</span>
            </div>
            <div class="col-3">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>操作地址：</label>
            <div class="formControls col-xs-8 col-sm-7">
                <input type="text" class="input-text" value="<?php echo $data['act']; ?>" placeholder="操作地址" name="act">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>ICON：</label>
            <div class="formControls col-xs-8 col-sm-7">
                <input type="text" class="input-text" value="<?php echo (isset($data['icon'] ) && ($data['icon']  !== '')?$data['icon'] :''); ?>" placeholder="ICON" name="icon">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">类型：</label>
            <div class="formControls col-xs-8 col-sm-7 skin-minimal">
                <div class="radio-box">
                    <input name="module" type="radio" value="0" id="sex-1" <?php if($data['module'] == '0'): ?>checked<?php endif; ?>>
                    <label for="sex-1">模块</label>
                </div>
                <div class="radio-box">
                    <input type="radio" name="module" id="sex-2" value="1" <?php if($data['module'] == '1'): ?>checked<?php endif; ?>>
                    <label for="sex-2">列表</label>
                </div>
                <div class="radio-box">
                    <input type="radio" name="module" id="sex-3" value="2" <?php if($data['module'] == '2'): ?>checked<?php endif; ?>>
                    <label for="sex-3">操作</label>
                </div>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状态：</label>
            <div class="formControls col-xs-8 col-sm-7 skin-minimal">
                <div class="radio-box">
                    <input name="status" type="radio" value="1" id="sex-1" <?php if($data['status'] == '1'): ?>checked<?php endif; ?>>
                    <label for="sex-1">开启</label>
                </div>
                <div class="radio-box">
                    <input type="radio" name="status" id="sex-2" value="0" <?php if($data['status'] == '0'): ?>checked<?php endif; ?>>
                    <label for="sex-2">关闭</label>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">排序：</label>
            <div class="formControls col-xs-8 col-sm-7">
                <input type="text" class="input-text" value="<?php echo (isset($data['sort'] ) && ($data['sort']  !== '')?$data['sort'] :'50'); ?>" placeholder="" name="sort">
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="button" id="bth-submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>




</body>
</html>
<script type="text/javascript" src="/resource/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/resource/admin/lib/layer/layer.js"></script>
<script type="text/javascript" src="/resource/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/resource/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/js/common.js"></script>

<script>
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#bth-submit").click(function(){
            var _oData = $("form").serialize(),
                _url = '<?php echo url("admin/permission/modify"); ?>',
                _func = function (_resp) {
                    if (!_resp.state) {
                        layer.msg(_resp.info);
                    } else {
                        layer.msg('修改成功！', {time: 500}, function(){
                            if(_resp.data && _resp.data.url){
                                parent.window.location.href = _resp.data.url;
                            }else{
                                parent.window.location.reload();
                            }
                        });
                    }
                };
            _ajaxPost(_url, _oData, _func);
        });
    });
</script>
