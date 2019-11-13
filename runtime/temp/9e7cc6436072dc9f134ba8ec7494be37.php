<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:88:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/web/view/stock/stockSell.html";i:1568109530;s:83:"/www/wwwroot/125.maoerle.cn/www_fuda/application/web/view/layouts/layout_index.html";i:1568109530;}*/ ?>
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

<!--点卖区-->
<div class="br-content">
    <div class="w1024">
        <div class="stock-buy stock-sell">
            <section class="play-area">
                <nav>
                    <ul class="clearfix">
                        <li class=""><a href="<?php echo url('web/Stock/stockBuy'); ?>"><em> 01 </em>| 点买区</a></li>
                        <li class="active"><a href="<?php echo url('web/Stock/stockSell'); ?>"><em>02 </em>| 点卖区</a></li>
                        <li class=""><a href="<?php echo url('web/Stock/stockHistory'); ?>"><em>03 </em> | 结算区</a></li>
                    </ul>
                </nav>
                <section>
                    <!-- <center>
                        当前持仓所需递延费为&nbsp;<label id="delayLbl" style="color:#d42b2e ;font-size:22px;font-weight:600">4878</label>&nbsp;元
                        &nbsp;<label style="font-size:18px">(周末及节假日免费)</label>，持仓盈利总计：<span id="totalProfit" style="font-size: 22px;"> 123493 </span>元
                    </center> -->

                    <ul id="sell-list">
                        <?php if(is_array($orders) || $orders instanceof \think\Collection || $orders instanceof \think\Paginator): $k = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($k % 2 );++$k;?>
                            <li class="br-clearfix">
                                <label class="w186"><em><?php echo $item['create_at']; ?></em><em>数量：<?php echo $item['hand']; ?></em></label>
                                <label class="w125"><em>保证金：<?php echo $item['deposit']; ?></em><em>交易模式：<b><?php echo $item['mode_name']; ?></b></em></label>
                                <label class="w115"><em><strong><?php echo $item['name']; ?>(<?php echo $item['code']; ?>)</strong></em><em>市值：<?php echo $item['market_value']; ?></em></label>
                                <label class="w140"><em><strong></strong></em><em><b class=""><?php echo $item['price']; ?></b><i class="icon icon-arrow-right"></i>-&gt;<b class=""><?php echo $item['last_px']; ?></b></em><em>
                                    <strong class="" style="color:red">
                                        <?php echo $item['total_pl']; ?>(<?php echo $item['yield_rate']; ?>%)</strong></em></label>
                                <label class="w180"><button class="btnSell" id="<?php echo $item['order_id']; ?>" index="<?php echo $k; ?>">点卖</button></label>
                            </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <div id="demo1"></div>
                    <!-- <ul class="pagination">
                        <li class="disabled"><span>«</span></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="http://www.fcml888.com/sell.html?page=2">2</a></li> 
                        <li><a href="http://www.fcml888.com/sell.html?page=2">»</a></li>
                    </ul> -->
                </section>
            </section>
            <!--确认点卖？-->
            <div class="confirm-sell" style="display: none;">
                <p>确定点卖？</p>
                <button class="wap-confirm">确定</button>
                <button class="wap-deny">取消</button>
            </div>
        </div>

    </div>
</div>
<!--申请递延-->
<div class="popup popup-middle" id="popup-delay">
    <div class="popup-header group">
        <h2>申请递延</h2>
        <a href="javascript:;" class="js-close-popup"><i class="icon icon-close"></i></a>
    </div>
    <div class="popup-body group">
        <div class="delay-box">
            <div class="delay-info">当前非递延申请时间,请稍后再来！</div>
            <div class="delay-foot">
                <button class="btn btn-pri">确定</button>
                <a href="javascript:;" class="delay-btn f-right">递延规则<i class="icon icon-caret-up"></i></a>
            </div>
        </div>
    </div>
    <div class="delay-rule hide popup-footer">
        <p>递延申请：点买人付费申请</p>
        <p>申请时间：00:00:00-12:00:00</p>
        <p>递延申请：点买人付费申请</p>
        <p>递延申请：点买人付费申请</p>
    </div>
</div>
<!--点卖确认-->
<div class="popup popup-big" id="popup-sell">
    <div class="popup-header group">
        <h2>点卖确认</h2>
        <a href="javascript:;" class="js-close-popup"><i class="icon icon-close"></i></a>
    </div>
    <div class="popup-body group">
        <input type="hidden" id="orderId">
        <table border="0" cellspacing="0" cellpadding="0" class="popup-sell-tb table-sell">
            <tbody><tr>
                <td width="15%">交易品种：</td>
                <td width="35%" id="t_code">-</td>
                <td width="15%">卖出数量：</td>
                <td width="35%" id="t_quantity">-</td>
            </tr>
            <tr>
                <td>买入时间：</td>
                <td id="t_time">-</td>
                <td>保证金：</td>
                <td id="t_deposit">-</td>
            </tr>
            <tr>
                <td>浮动盈亏</td>
                <td class="c-red" id="t_profit">-</td>
                <td>(仅供参考)</td>
                <td></td>
            </tr>
            </tbody></table>
        <div class="btn-div">
            <button class="btn btn-pri" id="popup-confirm-btn">确定</button>
            <a href="javascript:;" class="js-close-popup btn btn-grey">取消</a>
        </div>
    </div>

</div>
<!--即时卖出-->
<div class="popup popup-middle" id="popup-buy-apply">
    <div class="popup-header group">
        <h2>即时卖出</h2>
    </div>
    <div class="popup-body group">
    </div>
</div>
<!--限价卖出-->
<div class="popup popup-middle" id="popup-sell-price-success">
    <div class="popup-header group">
        <h2>限价卖出</h2>
        <a href="javascript:;" class="js-close-popup"><i class="icon icon-close"></i></a>
    </div>
    <div class="popup-body group">
        <center><i class="icon icon-circle-check"></i>限价委托提交成功！</center>
        <div class="f-right"><b class="red">5秒</b>后自动跳转至卖出区，<a href="history.html" class="js-close-popup">立即跳转</a></div>
    </div>
</div>
<!--卖出委托价格修改-->
<div class="popup popup-big" id="popup-change-price">
    <div class="popup-header group">
        <h2>卖出委托价格修改</h2>
        <a href="javascript:;" class="js-close-popup"><i class="icon icon-close"></i></a>
    </div>
    <div class="popup-body group">
        <table border="0" cellspacing="0" cellpadding="0" class="popup-sell-tb table-change-price">
            <tbody><tr>
                <td width="15%">最&nbsp;&nbsp;新&nbsp;&nbsp;价：</td>
                <td width="35%">-</td>
                <td width="15%">委托价格：</td>
                <td width="35%"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <label for="change-price-1" class="active">
                        <input type="radio" name="change-sell-price" id="change-price-1" class="radio" checked="">即时卖出
                    </label>
                </td>
                <td colspan="2">
                    <label for="change-price-2">
                        <input type="radio" name="change-sell-price" id="change-price-2" class="radio">最新价触发<input type="text" id="change-sell-price" size="8" placeholder="输入价格" class="text" style="position:relative">时，即时卖出
                    </label>
                </td>
            </tr>
            </tbody></table>
        <div class="btn-div">
            <button class="btn btn-pri" id="popup-confirm-change-price-btn">确定</button>
            <a href="javascript:;" class="js-close-popup btn btn-grey">取消</a>
        </div>
    </div>
</div>
<!--即时卖出-->
<div class="popup popup-middle" id="popup-sell-success">
    <div class="popup-header group">
        <h2>即时卖出</h2>
        <a href="javascript:;" class="js-close-popup"><i class="icon icon-close"></i></a>
    </div>
    <div class="popup-body group">
        <center><i class="icon icon-circle-check"></i>卖出成功！</center>
        <div class="f-right"><b class="red">5秒</b>后自动跳转至结算区，<a href="history.html" class="js-close-popup">立即跳转</a></div>
    </div>
</div>
<!--底部-->
<!--Start Pop-ups-->
<!--遮罩层-->
<div class="mask"></div>
<!--确认，取消提示框-->
<div class="popup" id="popup-p-confirm">
    <div class="popup-header group">
        <h2>提示</h2>
    </div>
    <div class="popup-body group">
        <div class="btn-row group">
            <a class="btn btn-pri js-close-popup" href="javascript:popup_confirm_go()">确定</a>
            <a class="btn btn-pri js-close-popup" href="javascript:;">取消</a>
        </div>
    </div>
</div>
<!--开设账户提示-->
<div class="popup" id="popup-yeepay">
    <div id="yeepayPopupContent" class="popup-header group">
        <h2>提示</h2>
    </div>
    <div class="popup-body group">
        <div class="btn-row group">
            <a id="yeepayNextLink" target="_blank" class="btn btn-pri" href="javascript:;">开设账户</a>
            <a class="btn btn-pri js-close-popup" href="javascript:;">暂不充值</a>
        </div>
    </div>
</div>
<!--是，否提示框-->
<div class="popup" id="popup-yeepay-confirm">
    <div id="yeepayConfirmContent" class="popup-header group">
        <h2>提示</h2>
    </div>
    <div class="popup-body group">
        <div class="btn-row group">
            <a class="btn btn-pri js-close-popup" href="javascript:;">是</a>
            <a class="btn btn-pri js-close-popup" href="javascript:;">否</a>
        </div>
    </div>
</div>
<!--提示信息提示框-->
<div id="popup-p-error" class="popup">
    <div class="popup-header group">
        <h2>提示</h2>
        <a href="javascript:;" class="js-close-popup"><i class="icon icon-close"></i></a>
    </div>
    <div class="popup-body group">
        <p id="popup-p-error-msg">提示信息</p>
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
                console.log(obj.curr); //得到当前页，以便向服务端请求对应页的数据。
                if(!first){
                    var _url = "<?php echo url('web/stock/sell'); ?>",
                    _oData = {page: obj.curr};
                    $ajaxCustom(_url, _oData, function(res){
                        if(res.state == 1){ // 成功
                            $("#sell-list").empty();
                            var html = '';
                            var orders = res.data.orders;
                            for (const key in orders) {
                                var a='c-green';
                                if(parseFloat(orders[key].yield_rate) > 0){
                                    a = 'c-red';
                                }
                                html += '<li class="br-clearfix">'+
                                    '<label class="w186"><em>'+orders[key].create_at_text+'</em><em>数量：'+orders[key].hand+'</em></label>'+
                                    '<label class="w125"><em>保证金：'+orders[key].deposit+'</em><em>交易模式：<b>'+orders[key].mode_name+'</b></em></label>'+
                                    '<label class="w115"><em><strong>'+orders[key].name+'('+orders[key].code+')</strong></em><em>市值：'+orders[key].market_value+'</em></label>'+
                                    '<label class="w140"><em><strong></strong></em><em><b class=""><?php echo $item['price']; ?></b><i class="icon icon-arrow-right"></i>-&gt;<b class="">'+orders[key].last_px+'</b></em><em>'+
                                        '<strong class="'+a+'">'+orders[key].total_pl+'('+orders[key].yield_rate+'%)</strong></em></label>'+
                                    '<label class="w180"><button class="btnSell" id="'+orders[key].order_id+'" index="'+key+'">点卖</button></label>'+
                                '</li>';
                            }
                            $("#sell-list").append(html);
                        }
                    })
                }
            }
        });
    });
    $(".btnSell").click(function(e){
        var index = $(this).attr("index");
        var listJson = <?php echo $ord; ?>;
        // var listJson2 = JSON.parse('[{"nowPrice":32.32,"rate":-0.0009,"profitAmount":-462,"delayDays":0},{"nowPrice":32.32,"rate":0.0507,"profitAmount":18720,"delayDays":5},{"nowPrice":9.69,"rate":-0.0051,"profitAmount":-1895,"delayDays":12},{"nowPrice":32.32,"rate":0.0901,"profitAmount":33108,"delayDays":14},{"nowPrice":11.31,"rate":0.1482,"profitAmount":74022,"delayDays":14}]');

        var i = index - 1;
        $("#t_code").html(listJson[i]['name'] + "(" + listJson[i]['code'] + ")");
        $("#t_quantity").html(listJson[i]['hand'] + "手");
        $("#t_time").html(listJson[i]['create_at']);
        $("#t_deposit").html(listJson[i]['deposit']);
        $("#t_profit").html(listJson[i]['total_pl']);

        var prf = parseFloat(listJson[i]['total_pl']);
        if(prf < 0){
            $("#t_profit").attr("class", "c-green");
        }else if(prf > 0){
            $("#t_profit").attr("class", "c-red");
        }else{
            $("#t_profit").removeAttr("class");
        }

        var orderId = $(this).attr('id');
        $("#orderId").val(orderId);

        tool.popup.showPopup($("#popup-sell"));
    });


    $("#popup-confirm-btn").click(function(e){
        var orderId = $("#orderId").val();
        var params = { id : orderId };
        if(orderId <= 0){
            layer.alert("订单号不正确");
            return;
        }
        $(this).attr("disabled", true);
        $.post("selling", params, function(res){
            $("#popup-confirm-btn").attr("disabled", false);
            if(res.state){ 
                layer.alert("卖出成功");
                window.location.reload();
            }else{
                layer.alert(res.info);
            }
            // if(data.code == '0'){
            //     tool.popup_err_msg("交易成功");
            //     window.location.reload();
            // }else{
            //     alert(data.info);
            //     window.location.reload();
            //     // tool.popup_err_msg(data.msg);
            // }
        }, 'json');
    });

        
    
</script>
