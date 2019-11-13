<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/web/view/index/index.html";i:1568109530;s:83:"/www/wwwroot/125.maoerle.cn/www_fuda/application/web/view/layouts/layout_index.html";i:1573543671;}*/ ?>
<!DOCTYPE html>
<head>
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>
满盈策略
</title>
        <meta name="keywords" content=" ">
        <meta name="description" content="">
        <link rel="stylesheet" type="text/css" href="/resource/web/css/common.css?t=12342">
        <link rel="stylesheet" type="text/css" href="/resource/web/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/resource/web/css/index.css">
        <link rel="stylesheet" type="text/css" href="/resource/web/css/buy.css">
        <link rel="stylesheet" type="text/css" href="/resource/web/layui/css/layui.css">

        

    </head>

    <body class="index_body">

<!--头部-->
<header class="ml_header br-w100">
    <div class="h_top br-w100">
        <div class="w1024 br-clearfix">
            <div class="h_topL br-fl">
                <!-- 服务热线：0571-86718052 -->
                <!-- <a id="qqicon" target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=369072666&amp;site=qq&amp;menu=yes"></a> -->
            </div>
            <?php if(empty($userInfo) || (($userInfo instanceof \think\Collection || $userInfo instanceof \think\Paginator ) && $userInfo->isEmpty())): ?>
            <div id="page_shared_layout_login" class="h_topR br-fr">
                <a class="login" href="<?php echo url('web/Home/login'); ?>">登录</a>
                <a class="register" href="<?php echo url('web/Home/register'); ?>">注册</a>
            </div>
            <?php else: ?>

            <ul id="page_shared_layout_unlogin" class="top-links f-right">
                <li class="show-login" style="display: block;">您好，&nbsp;<?php echo (isset($userInfo['nickname'] ) && ($userInfo['nickname']  !== '')?$userInfo['nickname'] :$userInfo['username']); ?></li>
                <li class="show-login top-user-wrapper" style="display: block;">
                    <span class="top-username">
                    	<a id="page_shared_layout_login_name" href="<?php echo url('web/User/index'); ?>"></a>
                    	<i class="icon icon-arrow-drop-down"></i>
                    </span>
                    <div class="overlay-account">
                        <div class="group account-group">
                            <span class="f-left">可用<b class="account-val" id="shared_header_mb"></b></span>
                            <a name="realnameAuth" class="f-right" href="<?php echo url('web/User/payMent'); ?>">充值</a>
                        </div>
                        <div class="account-links group">
                            <a class="f-left" href="<?php echo url('web/User/index'); ?>">个人中心</a>
                            <span class="f-left sep">|</span>
                            <a class="f-right js-logout" href="<?php echo url('web/Home/logout'); ?>">安全退出</a>
                        </div>
                    </div>
                </li>

            </ul>
            <?php endif; ?>

        </div>
    </div>
    <div class="h_bot br-w100">
        <div class="w1024 br-clearfix">
            <div class="h_botL br-fl">
                <a href="<?php echo url('web/Index/index'); ?>"><img src="/resource/web/images/logo.png" style="height:60px; "></a>
            </div>
            <div class="h_botR br-fr">
                <ul class="br-clearfix" id="menu-ul">
                    <li class="br-fl"><a href="<?php echo url('web/Index/index'); ?>" <?php if($type == '1'): ?>class="active"<?php endif; ?> >首页</a></li>
                    <li class="br-fl"><a href="<?php echo url('web/Stock/stockBuy'); ?>" <?php if($type == '2'): ?>class="active"<?php endif; ?> >A股点买</a></li>
                    <!-- <li class="br-fl"><a href="freetrial.html">免费体验</a></li> -->
                    <li class="br-fl"><a href="<?php echo url('web/home/mobile'); ?>" <?php if($type == '3'): ?>class="active"<?php endif; ?> >手机版</a></li>
                    <li class="br-fl help_box">
                        <a href="javascript:void(0)">帮助中心</a>
                        <ul class="new-sub-nav hide">
                            <li class=""><a href="<?php echo url('web/home/rookie'); ?>">新手教学</a></li>
                            <li class=""><a href="<?php echo url('web/home/issue'); ?>">常见问题</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- 边框 -->
<style>
    .sideBarbg{ position:fixed; z-index:999; right:0; top:40%;}
    .sideBar{}
    .sideBar ul li{ width:77px; height:75px; position:relative; margin:5px 0;}
    .sideBar ul li a img{ width:77px; height:75px;}
    .sideBar ul li .side_con{ position:absolute; right:77px; top:0; width:170px; height:162px; display:none; transform:scale(0);}
    .sideBar ul li:hover .side_con{ transform:scale(1); display:block; transition:all .3s ease;}
    .sideBar ul li .side_con .img{ width:140px; height:140px; padding:11px 19px 11px 11px;}
    .sideBar ul li .side_con .img img{ width:140px; height:140px;}
    .bot_r_img{
        display: flex;
        justify-content : space-between;
    }
    .bot_top{
        padding-top: 10px;
    }
    .tu > span{
        width: 65px;
        text-align: center;
    }
    .tu img{
        width: 100%;
    }
</style>
<div class="sideBarbg">
    <div class="sideBar">
        <ul>
            <li><a href="javascript:scroll(0,0)" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','images/ico01_1.png',1)"><img id="Image1" src="/resource/web/images/ico01.png" /></a></li>
            <!-- <li><a onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','images/ico02_1.png',2)"><img id="Image2" src="/resource/web/images/ico02.png" /></a>
                <div class="side_con">
                    <div class="img"><img src="/resource/web/images/ggh.jpg" /></div>
                </div>
            </li> -->
            <li><a onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','images/ico03_1.png',3)"><img id="Image3" src="/resource/web/images/ico03.png" /></a>
                <div class="side_con">
                    <div class="img"><img src="/resource/web/images/download.png" /></div>
                </div>
            </li>
            <li><a onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','images/ico03_1.png',3)"><img id="Image3" src="/resource/web/images/ico04.png" /></a>
                <div class="side_con">
                    <div class="img"><img src="/resource/web/images/qq.jpg" /></div>
                </div>
            </li>
            <!-- <li><a href="tencent://message/?uin=1412208231&Site=Yes&Menu=yes" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','images/ico04_1.png',4)"><img id="Image4" src="/resource/web/images/ico04.png" /></a></li> -->
        </ul>
    </div>
</div>

<!--banner-->
<div class="banner_login br-w100">
	<div class="bBanner br-w100">
		<!--<div class="w1024">-->
			<!--<div class="login_main">-->
				<!--<p>用户登录</p>-->
				<!--<from>-->
					<!--<input type="text" name="" id="username" placeholder="用户名">-->
					<!--<div id="err1" class="err">请输入正确用户名</div>-->
					<!--<input type="password" name="" id="password" placeholder="密码">-->
					<!--<div id="err2" class="err">请输入正确密码</div>-->
					<!--<div class="login_box">-->
						<!--<a href="javascript:;" class="btn_login">登录</a>-->
						<!--<a href="register.html" class="btn_reg">注册</a>-->
					<!--</div>-->
				<!--</from>-->
			<!--</div>-->
		<!--</div>-->
		<!--轮播图-->
		<div class="home_banner">
			<div id="myCarousel" class="carousel slide">
				<!-- 轮播（Carousel）指标 -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<!-- 轮播（Carousel）项目 -->
				<div class="carousel-inner">
					<div class="item active">
						<div>
							<img src="/resource/web/images/c8d16c998808e8cc40f961b5d794df0e.jpg">
						</div>
					</div>
				</div>
				<!-- 轮播（Carousel）按钮导航 -->
				<a class="carousel-control left" href="http://www.fcml888.com/index.html#myCarousel" data-slide="prev">‹</a>
				<a class="carousel-control right" href="http://www.fcml888.com/index.html#myCarousel" data-slide="next">›</a>
			</div>
		</div>

	</div>
</div>
<!--点买A股-->
<div class="AS_box br-w100">
	<!--3个盒子-->
	<div class="three_box w1024 br-clearfix">
		<div class="three_item br-fl"><a href="javascript:void()" style="display: block;"><img src="/resource/web/images/p (3).png"></a>
			<p class="tit">一分钟了解非常谋略</p>
			<p class="tib">全新的投资人策略匹配平台</p>
		</div>
		<div class="three_item br-fl"><a href="javascript:;" style="display: block;"><img src="/resource/web/images/p (2).png"></a>
			<p class="tit">用心服务</p>
			<p class="tib">一对一专业客服（电话 微信 QQ）<br>全程指导</p>
		</div>
		<div class="three_item br-fl"><a href="javascript:;" style="display: block;"><img src="/resource/web/images/p (1).png"></a>
			<p class="P_block" style="float: left;">累计匹配策略 <br><span>5194</span>条</p>
			<p class="P_block" style="float: right;">累计盈利<br><span>14778369.61</span>元</p>
		</div>
	</div>
	<div class="AS_box_cont w1024 br-text-center">
		<h1 class="br-ml-title">POINT TO BUY A SHARES</h1>
		<div class="br-ml-line"></div>
		<p class="br-ml-bt">点买A股</p>
		<div class="AS_contImg br-clearfix">
			<div class="three_item br-fl">
				<div class="ASitem_top"><img src="/resource/web/images/01.png"></div>
				<div class="ASitem_bot br-clearfix">
					<span class="ASbot_l br-fl"><img src="/resource/web/images/num (1).png"></span>
					<p class="ASbot_r br-fl">点买人只需冻结最低1250元履<br>约保证金支付45元交易综合费</p>
				</div>
			</div>
			<div class="three_item br-fl">
				<div class="ASitem_top"><img src="/resource/web/images/02.png"></div>
				<div class="ASitem_bot br-clearfix">
					<span class="ASbot_l br-fl"><img src="/resource/web/images/num (2).png"></span>
					<p class="ASbot_r br-fl">即刻提交谋略系统智能匹<br>配投资人，投资人实施买入</p>
				</div>
			</div>
			<div class="three_item br-fl">
				<div class="ASitem_top"><img src="/resource/web/images/03.png"></div>
				<div class="ASitem_bot br-clearfix">
					<span class="ASbot_l br-fl"><img src="/resource/web/images/num (3).png"></span>
					<p class="ASbot_r br-fl">谋略到期后单笔1万元交<br>易本金获得90%交易盈利</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--获得更高收益-->
<div class="highYields br-w100">
	<div class="w1024 br-clearfix">
		<div class="high_l br-fl ">
			<h1>获得更高收益</h1>
			<p>提供投资谋略金和投资人分享高额回报</p>
			<a href="<?php echo url('web/Stock/stockBuy'); ?>" class="">进入点买A股</a>
		</div>
		<div class="high_r br-fr " style="overflow: hidden;"> 
			<table>
				<tbody>
				<?php if(is_array($orderLists) || $orderLists instanceof \think\Collection || $orderLists instanceof \think\Paginator): $i = 0; $__LIST__ = $orderLists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr>
					<td class="nickname"><?php echo $vo['has_one_user']['mobile']; ?></td>
					<td class="time"><?php echo $vo['time']; ?></td>
					<td class="celue">谋略</td>
					<td class="stockNumber"><?php echo $vo['name']; ?>[<?php echo $vo['code']; ?>]</td>
				</tr>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				<!--<tr>-->
					<!--<td class="nickname">156****9885</td>-->
					<!--<td class="time">25分钟前</td>-->
					<!--<td class="celue">谋略</td>-->
					<!--<td class="stockNumber">大理药业[603963]</td>-->
				<!--</tr>-->
				<!--<tr>-->
					<!--<td class="nickname">138****4888</td>-->
					<!--<td class="time">27分钟前</td>-->
					<!--<td class="celue">谋略</td>-->
					<!--<td class="stockNumber">美芝股份[002856]</td>-->
				<!--</tr>-->
				<!--<tr>-->
					<!--<td class="nickname">156****9885</td>-->
					<!--<td class="time">27分钟前</td>-->
					<!--<td class="celue">谋略</td>-->
					<!--<td class="stockNumber">招商银行[600036]</td>-->
				<!--</tr>-->
				<!--<tr>-->
					<!--<td class="nickname">187****0111</td>-->
					<!--<td class="time">47分钟前</td>-->
					<!--<td class="celue">谋略</td>-->
					<!--<td class="stockNumber">招商银行[600036]</td>-->
				<!--</tr>-->
				<!--<tr>-->
					<!--<td class="nickname">133****9808</td>-->
					<!--<td class="time">48分钟前</td>-->
					<!--<td class="celue">谋略</td>-->
					<!--<td class="stockNumber">华统股份[002840]</td>-->
				<!--</tr>-->
				<!--<tr>-->
					<!--<td class="nickname">159****7346</td>-->
					<!--<td class="time">48分钟前</td>-->
					<!--<td class="celue">谋略</td>-->
					<!--<td class="stockNumber">风华高科[000636]</td>-->
				<!--</tr>-->
				</tbody></table>
		</div>
	</div>
</div>
<!--5重保障-->
<div class="guarantee br-w100">
	<div class="w1024 br-text-center">
		<h1 class="br-ml-title">WE WILL ENSURE YOUR BEST INTEREST</h1>
		<div class="br-ml-line"></div>
		<p class="br-ml-bt">5重保障最大力度保障您的利益</p>
		<div class="guarantee_botBox br-clearfix">
			<div class="guarantee_item bg1">网站安全</div>
			<div class="guarantee_item bg1">风控<br>保险体质</div>
			<div class="guarantee_item bg1">第三方<br>资金托管</div>
			<div class="guarantee_item bg1">资金<br>安全保障</div>
			<div class="guarantee_item bg1">和投资人<br>收益共享<br>风险共担</div>

		</div>
	</div>
</div>
<!--点买人盈利亏损-->
<div class="PAL br-w100 br-text-center">
	<div class="w1024 br-clearfix">
		<div class="PAL_item br-fl">
			<div class="item_img"></div>
			<p>点买人获得90%的交易盈利，系统自动<br>划入点买人的非常谋略账户</p>
		</div>
		<div class="PAL_item br-fr">
			<div class="item_img"></div>
			<p>点买人承担冻结履约保证金以内的亏损<br>超出部分由投资人承担</p>
		</div>
	</div>
</div>
<!--service-->
<div class="service br-text-center br-w100">
	<div class="w1024">
		<h1 class="br-ml-title">OUR SERVICE</h1>
		<div class="br-ml-line"></div>
		<p class="br-ml-bt">我们的服务</p>
		<div class="service_box br-clearfix">
			<h1>A股点买去<span>非常谋略</span></h1>
			<p class="sp1">“股票点买最安全平台”</p>
			<p class="sp2">急速撮合<br>仅需填写简单资料<br>提交谋略<br>就能马上提交投资人赚钱</p>
			<a href="<?php echo url('register'); ?>">立即注册</a>
		</div>
	</div>
</div>
<!--微信交易-->
<div class="weChatDeal br-w100">
	<div class="w1024">
		<div class="weChatDeal_box">
			<h1>微信端交易更加方便</h1>
			<p class="sp1">“下单 持仓 结算 一目了然”</p>
			<p class="sp2">更多优惠活动等着您</p>
		</div>
	</div>
</div>
<!--合作伙伴-->
<div class="companion br-w100 br-text-center">
	<div class="w1024">
		<h1 class="br-ml-title">PARTNERS</h1>
		<div class="br-ml-line"></div>
		<p class="br-ml-bt">合作伙伴</p>
		<div class="companion_box br-clearfix">
			<div class="cp_item"></div>
			<div class="cp_item"></div>
			<div class="cp_item"></div>
			<div class="cp_item"></div>
			<div class="cp_item"></div>
			<div class="cp_item"></div>
			<div class="cp_item"></div>
			<div class="cp_item"></div>
		</div>
	</div>
</div>


<!--底部-->

<footer class="br-w100">
    <!-- <div class="footer_top">
        <a href="http://www.fcml888.com/company.html">关于我们</a>
        <a href="http://www.fcml888.com/contact.html">联系我们</a>
    </div> -->
    <div class="footer_bot">
        <div class="w1024 br-clearfix">
            <div class="bot_l br-fl bot_top">
                <p>在线客服 ：9:00-20:00<br>
                   </p>
                <div class="bot_r_img tu">
                    <span class="tu1"><img src=""><span>客服QQ</span></span>
                    <span class="tu2"><img src=""><span>下载APP</span></span>
                </div>
            </div>
            <div class="bot_r br-fr br-text-center">
                <div class="bot_r_img br-clearfix ">
                    <span class=""><img src="/resource/web/images/f1.png"></span>
                    <span class=""><img src="/resource/web/images/f2.png"></span>
                    <span class=""><img src="/resource/web/images/f3.png"></span>
                    <span class=""><img src="/resource/web/images/f4.png"></span>
                </div>
                <p>风险揭示：投资有风险，当您进行投资时，可能获得投资收益，但同时也面临着投资风险，比如资金损失风险、运营风险、流动性风险等。您在做出投资决策之前，请仔细阅读相关风险揭示书和投资协议、公司章程或者合伙协议 等文件，充分认识投资的风险收益特征和产品特性，认真考虑可能存在的各项风险因素，并充分考虑自身的风险承受能力，理性判断并谨慎做出投资决策。</p>
                <!-- <p>投资有风险 入市需谨慎</p> -->
            </div>
        </div>
    </div>
</footer>

</body>
</html>
<script type="text/javascript" src="/resource/web/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="/resource/web/js/mui.min.js"></script>
<script type="text/javascript" src="/resource/web/layer/layer.js?t=123455"></script>
<script type="text/javascript" src="/resource/web/layui/layui.js?t=23745"></script>
<script type="text/javascript" src="/resource/web/js/common.js"></script>
<script type="text/javascript" src="/resource/web/js/config.js"></script>
<script type="text/javascript" src="/resource/web/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/resource/web/js/index.js"></script>
<script type="text/javascript" src="/resource/web/js/general.js"></script>
<script type="text/javascript" src="/resource/web/js/buy.js?t=1234"></script>

