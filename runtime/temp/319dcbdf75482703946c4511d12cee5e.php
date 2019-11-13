<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/index/view/user/cards.html";i:1568109530;s:84:"/www/wwwroot/125.maoerle.cn/www_fuda/application/index/view/layouts/layout_user.html";i:1568109530;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
我的银行卡
</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link href="/resource/home/css/mui.min.css" rel="stylesheet">
    <link href="/resource/home/css/person.css" rel="stylesheet">
    
<style type="text/css">
	body{
		background: #f5f5f5!important;
	}
	.mui-table-view-cell>a {
		height: auto;
		line-height: 24px;
		padding-top: 14px !important;
		font-size: 14px;
	}
	.ml_title.ml-tip{
		font-size: 14px;
		color: #666;
		height: 36px;
		line-height: 36px;
	}
	.ml-tip {
		color: #e4393c;
	}
</style>

</head>

<body class="mui-ios mui-ios-10 mui-ios-10-3">

    
	<header class="header_con">
		<a href="javascript:history.go(-1)" class="lf">
			<img src="/resource/home/img/call_back.png">
		</a>
		<p>我的银行卡</p>
	</header>
    <?php if(empty($user['has_one_card']) || (($user['has_one_card'] instanceof \think\Collection || $user['has_one_card'] instanceof \think\Paginator ) && $user['has_one_card']->isEmpty())): ?>
    <div class="mui-content">
        <p class="ml-tip  ml_title">银行账户</p>
        <ul class="cardList mui-table-view">
            <li class="mui-table-view-cell mui-media" style="text-align: center;">
                <a href="<?php echo url('index/User/modifyCard'); ?>">
                    +添加银行卡
                </a>
            </li>
        </ul>
        <p class="ml-tip">每人最多绑定一张银行卡,点击卡片可修改原银行卡信息</p>
    </div>
    <?php else: ?>
	<div class="mui-content">
	   <p class="ml-tip  ml_title">银行账户</p>
		<ul class="cardList mui-table-view">
			<li class="mui-table-view-cell mui-media">
				<a href="<?php echo url('index/User/modifyCard'); ?>">
					<img class="mui-media-object mui-pull-left" src="/resource/home/img/yl.png">
					<div class="mui-media-body">
						<span class="bankName"><?php echo $user['has_one_card']['bank_name']; ?> <?php echo $user['has_one_card']['bank_address']; ?></span>
						<p class="bankNum mui-ellipsis"><?php echo $user['has_one_card']['bank_card']; ?></p>
					</div>
				</a>
			</li>
		</ul>
		<p class="ml-tip">每人最多绑定一张银行卡,点击卡片可修改原银行卡信息</p>
	</div>
    <?php endif; ?>

	<!--<div class="mui-content">
	   <p class="ml-tip ml_title">支付宝账号</p>
		<ul class="cardList mui-table-view">
			<li class="mui-table-view-cell mui-media">
				<a href="add_bankcard.html">
					<img style="width:30px;height: 30px!important;" class="mui-media-object mui-pull-left" src="/resource/home/img/zfb.png">
					<div class="mui-media-body">
						<span class="bankName">* 近平</span>
						<p class="bankNum mui-ellipsis">13484938079</p>
					</div>
				</a>
			</li>
		</ul>
		<p class="ml-tip">每人最多绑定一个支付宝账号</p>
	</div>-->

    

</body>
</html>
<script src="/resource/home/js/jquery-2.2.0.min.js"></script>
<script src="/resource/home/js/mui.min.js"></script>

