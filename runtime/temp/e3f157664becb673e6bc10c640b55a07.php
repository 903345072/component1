<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:90:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/admin/view/mode/setDeposit.html";i:1568109530;s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/application/admin/view/layouts/layout_iframe.html";i:1568109530;}*/ ?>
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
    <title>设置保证金</title>
</head>
<body>

<article class="page-container">
    <form class="form form-horizontal" id="form-team-user-add">
        <input type="hidden" name="id" value="<?php echo $mode['mode_id']; ?>">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">保证金列表：</label>
            <div class="formControls col-xs-8 col-sm-7 skin-minimal">
                <?php if(is_array($deposit) || $deposit instanceof \think\Collection || $deposit instanceof \think\Paginator): $i = 0; $__LIST__ = $deposit;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <div class="check-box" style="width: 32%;">
                    <input type="checkbox" name="deposit[]" id="deposit-<?php echo $item['id']; ?>" value="<?php echo $item['id']; ?>" <?php if(in_array(($item['id']), is_array($mode['deposit'])?$mode['deposit']:explode(',',$mode['deposit']))): ?> checked <?php endif; ?>>
                    <label for="deposit-<?php echo $item['id']; ?>"><?php echo $item['name']; ?></label>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
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
                _url = '<?php echo url("admin/Mode/setDeposit"); ?>',
                _func = function (_resp) {
                    if (!_resp.state) {
                        layer.msg(_resp.info);
                    } else {
                        layer.msg('操作成功！', {time: 500}, function(){
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
