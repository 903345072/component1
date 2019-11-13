<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:91:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/index/view/user/noticeLists.html";i:1568109530;s:84:"/www/wwwroot/125.maoerle.cn/www_fuda/application/index/view/layouts/layout_user.html";i:1568109530;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
我的消息
</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link href="/resource/home/css/mui.min.css" rel="stylesheet">
    <link href="/resource/home/css/person.css" rel="stylesheet">
    


</head>
<body style="height: 100%;display: inline-block;width: 100%;" class="mui-ios mui-ios-10 mui-ios-10-3">
    
<header class="has_back_top ">
    我的消息
    <a href="<?php echo url('index/Index/index'); ?>" class="back_icon">
        <img src="/resource/home/img/back_icon.png">
    </a>
</header>

<ul class="msg_list">
    <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <li>
        <a href="<?php echo url('index/User/noticeDetail', ['id' => $vo['id']]); ?>">
            <p class="clear_fl msg_profile">
                <span class="lf">
                    <?php switch($vo['type']): case "1": if($vo['read'] == 1): ?>
                                <strong>系统通知</strong>
                            <?php else: ?>
                                系统通知
                            <?php endif; break; default: if($vo['read'] == 1): ?>
                            <strong>系统通知</strong>
                        <?php else: ?>
                            系统通知
                        <?php endif; endswitch; ?>
                </span>
                <span class="rt"><?php echo date("Y-m-d H:i", $vo['create_at'] ); ?></span>
            </p>
            <p class="msg_content">
                    <?php echo $vo['title']; ?>
            </p>
        </a>
    </li>
    <?php endforeach; endif; else: echo "" ;endif; ?>

</ul>

    


</body>
</html>
<script src="/resource/home/js/jquery-2.2.0.min.js"></script>
<script src="/resource/home/js/mui.min.js"></script>


