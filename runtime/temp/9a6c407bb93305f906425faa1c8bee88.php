<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:91:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/web/view/stock/stockHistory.html";i:1568109530;s:83:"/www/wwwroot/125.maoerle.cn/www_fuda/application/web/view/layouts/layout_index.html";i:1568109530;}*/ ?>
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

<!--结算区-->
<div class="br-content">
<div class="w1024">
<div class="stock-sell stock-buy stock-settle">
    <section class="play-area">
        <nav>
            <ul class="clearfix">
                <li class=""><a href="<?php echo url('web/Stock/stockBuy'); ?>"><em> 01 </em>| 点买区</a></li>
                <li class=""><a href="<?php echo url('web/Stock/stockSell'); ?>"><em>02 </em>| 点卖区</a></li>
                <li class="active"><a href="<?php echo url('web/Stock/stockHistory'); ?>"><em>03 </em> | 结算区</a></li>
            </ul>
        </nav>
       <section>
            <nav class="row" style="position: relative;">
                <!-- <div class="select">
                    <span>时间：</span>
                    <a href="history.html?recent=7" id="recent7" class="">最近7个交易日</a>
                    <a href="history.html?recent=30" id="recent30">最近30个交易日</a>
                    <a id="selectByDate">按时间选择<span class="sanj"></span></a>
                </div> -->
                <div class="jiesuan-deal pa" style="top:200px;left:300px" id="JchooseDate" data-val="0">
                    <h4 class=" pb5 f14 db lh18" style="height:30px;">
                        <span class="left_gray fl">&lt;</span>
                        <span class="cen fl"><span id="yearSpan">2018</span>年</span>
                        <span class="right_gray fr ">&gt;</span>
                    </h4>
                    <div style=" width: 224px; height: 110px; overflow: hidden;margin: 0 auto;">
                        <div style=" width: 224px; height: 110px;margin-left:0px" id="JyearContent">
                            <ul class="jiesuan-dea2 tc"><li><a href="javascript:void(0);" data-m="1" class="JchooseMonth ">1月</a></li><li><span>2月</span></li><li><span>3月</span></li><li><span>4月</span></li><li><span>5月</span></li><li><span>6月</span></li><li><span>7月</span></li><li><span>8月</span></li><li><span>9月</span></li><li><span>10月</span></li><li><span>11月</span></li><li><span>12月</span></li></ul>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </nav>
            <ul id="settle-list" class="history-list">
                <?php if(is_array($orders) || $orders instanceof \think\Collection || $orders instanceof \think\Paginator): $k = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($k % 2 );++$k;?>
                    <li>
                        <label class="w150"><em>买入时间：<?php echo $item['create_at']; ?></em><em>卖出时间：<?php echo $item['update_at']; ?></em></label>
                        <label class="w120"><em>买入点位：<?php echo $item['price']; ?></em><em>卖出点位：<?php echo $item['sell_price']; ?></em></label>
                        <label class="w130"><em><strong><?php echo $item['name']; ?>(<?php echo $item['code']; ?>)</strong></em><em>市值：<?php echo $item['market_value']; ?></em></label>
                        <label class="w136"><em><strong class="c-green"><?php echo $item['hand']; ?></strong></em><em>数量</em></label>
                        <label class="w136"><em class="ft16 c-green"> <?php echo $item['total_pl']; ?></em><em>交易盈亏</em></label>
                        <!-- <label class="w120 "><a class="detail_a" href="<?php echo url('web/Stock/stockDetail'); ?>">查看详情</a></label> -->
                        <label class="w120 hide-important"></label>
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>               
            </ul>
            <div id="demo1"></div>
           <!-- <ul class="pagination"><li class="disabled"><span>«</span></li> <li class="active"><span>1</span></li><li><a href="http://www.fcml888.com/history.html?page=2">2</a></li><li><a href="http://www.fcml888.com/history.html?page=3">3</a></li><li><a href="http://www.fcml888.com/history.html?page=4">4</a></li><li><a href="http://www.fcml888.com/history.html?page=5">5</a></li><li><a href="http://www.fcml888.com/history.html?page=6">6</a></li><li><a href="http://www.fcml888.com/history.html?page=7">7</a></li><li><a href="http://www.fcml888.com/history.html?page=8">8</a></li><li class="disabled"><span>...</span></li><li><a href="http://www.fcml888.com/history.html?page=17">17</a></li><li><a href="http://www.fcml888.com/history.html?page=18">18</a></li> <li><a href="http://www.fcml888.com/history.html?page=2">»</a></li></ul>        </section> -->
    </section>
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
                   客服 Q Q ：1498457742</p>
                <div class="bot_r_img tu">
                    <span class="tu1"><img src="/resource/web/images/qq.jpg"><span>客服QQ</span></span>
                    <span class="tu2"><img src="/resource/web/images/download.png"><span>下载APP</span></span>
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

<script src="/resource/web/js/history.js"></script>
<script>
    layui.use(['laypage', 'layer'], function(){
        var laypage = layui.laypage
        ,layer = layui.layer;
        //总页数大于页码总数
        laypage.render({
            elem: 'demo1'
            ,count: <?php echo $total; ?> //数据总数
            ,limit: 4
            ,jump: function(obj,first){
               //obj包含了当前分页的所有参数，比如：
                // console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                if(!first){
                    var _url = "<?php echo url('web/stock/history'); ?>",
                    _oData = {page: obj.curr};
                    $ajaxCustom(_url, _oData, function(res){
                        console.log(res);
                        if(res.state == 1){ // 成功
                            $("#settle-list").empty();
                            var html = '';
                            var orders = res.data.orders;
                            for (const key in orders) {
                                var a='c-green';
                                if(parseFloat(orders[key].total_pl) > 0){
                                    a = 'c-red';
                                }
                                html += '<li>'+
                                   '<label class="w150"><em>买入时间：'+orders[key].create_at_text+'</em><em>卖出时间：'+orders[key].update_at_text+'</em></label>'+
                                   '<label class="w120"><em>买入点位：'+orders[key].price+'</em><em>卖出点位：'+orders[key].sell_price+'</em></label>'+
                                    '<label class="w130"><em><strong>'+orders[key].name+'('+orders[key].code+')</strong></em><em>市值：'+orders[key].market_value+'</em></label>'+
                                    '<label class="w136"><em><strong class="c-green">'+orders[key].hand+'</strong></em><em>数量</em></label>'+
                                    '<label class="w136"><em class="ft16 '+a+' "> '+orders[key].total_pl+'</em><em>交易盈亏</em></label>'+
                                    '<label class="w120 hide-important"></label>'+
                                '</li>';
                            }
                            $("#settle-list").append(html);
                        }
                    })
                }
            }
        });
    });

</script>
