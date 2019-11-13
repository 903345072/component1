<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:89:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/index/view/order/position.html";i:1568169426;s:84:"/www/wwwroot/125.maoerle.cn/www_fuda/application/index/view/layouts/layout_user.html";i:1568109530;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
我的持仓
</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link href="/resource/home/css/mui.min.css" rel="stylesheet">
    <link href="/resource/home/css/person.css" rel="stylesheet">
    
<style type="text/css">
    .postion_tab li.active>p a {
        border-bottom: 2px solid #fc5055;
        display: inline-block;
        color: #fc5055;
    }
    .postion_tab li>p a{
        color: #8f8f94;
        font-size: 13px;
    }
    .postion_tab_con{
        display: block!important;
    }
    .postion_tab_con li h1>span {
        width: calc(100% / 2);
    }
    /******  弹框  *****/
    .read_risk_btn {
        position: absolute;
        width: 100%;
        text-align: center;
        height: 40px;
        line-height: 40px;
        color: #071e69;
        font-size: 14px;
        left: 0;
        bottom: 0;
        border-top: 1px solid #ececec;
        margin: 0;
    }
    .risk_text {
        padding: 10px 18px;
        margin-bottom: 30px;
    }
    .now_count {
        width: 100%;
        border: 1px solid #ededed;
        height: 30px;
        line-height: 30px;
        text-align: center;
        font-size: 12px;
        color: #333;
    }
    .control_point>span.lf {
        font-size: 12px;
        color: #333;
        width: 18%;
    }
    .fudong {
        font-size: 12px;
        color: #999;
        width: 90px;
    }
    .count_panel {
        width: calc(80% - 100px);
        margin-top: 10px;
    }
    .risk_content {
        width: 100%;
        background: #fff;
        margin-top: 200px;
        position: absolute;
        left: 0;
        bottom: 50px;
        overflow: hidden;
        border-radius: 8px 8px 0 0;
    }
    .cancel_btn{
        width: 45%;
        text-align: center;
        margin-bottom: 0;
        height: 40px;
        line-height: 40px;
        font-size: 14px;
        color: #999;
        margin-right: 0;
    }
    .confirm_btn{
        width: 55%;
        text-align: center;
        margin-bottom: 0;
        height: 40px;
        line-height: 40px;
        font-size: 14px;
        color: #999;
        background-color: rgb(255, 90, 90);
        color: white;
    }
    .add_banzhengjin h1{
        font-size: 15px;
        color: #333;
        line-height: 30px;
        font-weight: 400;
    }
    .bazhengjin_count{
        font-size: 15px;
        color: #333;
        line-height: 30px;
        text-align: right;
        width: 60%;
    }
    .bazhengjin_count span{
        color: #fe5859;
    }
    .account_balance{
        font-size: 15px;
        color: #999;
        line-height: 40px;
        text-align: right;
    }
    .account_balance span{
        color: #fe5859;
    }
    .modify_items{
        height: 38px;
        line-height: 38px;
        font-size: 14px;
        color: #333;
    }
    .modify_items+.modify_items{
        border-top: 1px solid #ededed;
    }
    .buchong_baozhengjin{
        color: #fe5859;
        font-size: 15px;
        text-align: right;
        width: 60%;
    }
    .dropload_container{
        position: absolute;
        width: 100%;
        left: 0;
        top: 34px;
        background: #fff;
        margin-bottom: 58px;
    }
    .postion_tab_con {
        position: relative;
        width: 100%;
        left: 0;
        top: 0;
        background: #fff;
        margin-bottom: 0px;
    }
    .postion_tab_con {
        margin-bottom: 0;
    }
    .dropload-noData,.dropload-refresh,.dropload-load{
        color: #999;
    }
    .layui-layer .layui-layer-btn .layui-layer-btn0 {
        padding: 0 15px;
        border-color: #071e68;
        background: #071e68;
    }
    * {
        -webkit-user-select: auto!important;
    }
</style>
<link rel="stylesheet" type="text/css" href="/resource/home/css/dropload.css">

</head>

<body class="quick_body payment_body mui-ios mui-ios-10 mui-ios-10-3">

    
    <!-- 说明 - start -->
    <div class="risk_mask recharge_mask">
        <div class="risk_content">
            <p class="risk_title">补充保证金</p>
            <div class="risk_text">
                <section class="buy_section">
                    <div class="clear_fl modify_items">
                        <span class="lf key">保证金</span>
                        <span class="rt value re_baozhengjin">1250.00元</span>
                    </div>

                    <div class="clear_fl modify_items">
                        <span class="lf key">剩余保证金</span>
                        <span class="rt value save_baozhengjin">1250.00元</span>
                    </div>

                    <div class="clear_fl modify_items">
                        <span class="lf key">补充保证金</span>
                        <p class="bazhengjin_count rt">
                            <!-- <span>0.00</span> -->
                            <!-- <input readonly="readonly"  class="buchong_baozhengjin" value="0.0" />  -->
                            <input class="buchong_baozhengjin" value="0.0" /> 
                        元</p>
                    </div>

                    <p class="account_balance">账户余额 
                        <span class="re_banlance">909998.90</span>元             
                    </p>
                </section>
            </div>
            <div class="read_risk_btn clear_fl">
                <p class="lf cancel_btn">取消</p>
                <p class="rt confirm_btn">确认</p>
            </div>
        </div>
    </div>
    <!-- end -->
    <!-- 说明 - start -->
    <!-- <div class="risk_mask profit_loss_mask">
        <div class="risk_content">
            <p class="risk_title">修改止盈止损</p>
            <div class="risk_text">
                <section class="buy_section">
                    <div class="control_point zhiying clear_fl">
                        <span class="lf">止盈</span>
                        <p class="lf count_panel flex_nowrap">
                            <span class="minus_btn count_btn">-</span>
                            <span class="now_count">13.63</span>
                            <input  class="now_count profitCount" >
                            <span class="plus_btn count_btn">+</span>
                        </p>
                        <p class="rt fudong zhangfu">涨幅约 <span>+11.85%</span></p>
                    </div>

                    <div class="control_point zhisun clear_fl">
                        <span class="lf">止损</span>
                        <p class="lf count_panel flex_nowrap">
                            <span class="minus_btn count_btn">-</span>
                            <span class="now_count">13.63</span>
                            <input  class="now_count lossCount">
                            <span class="plus_btn count_btn">+</span>
                        </p>
                        <p class="rt fudong diefu">跌幅约 <span>-11.83%</span></p>
                    </div>

                    <div class="clear_fl add_banzhengjin">
                        <h1 class="lf">补充保证金</h1>
                        <div class="rt">
                            <p class="bazhengjin_count"><span>0.00</span>元</p>
                            <p class="account_balance">账户余额 <span>909998.90</span>元             </p>
                        </div>
                    </div>
                </section>
            </div>
            <div class="read_risk_btn clear_fl">
                <p class="lf cancel_btn">取消</p>
                <p class="rt confirm_btn">确认</p>
            </div>
        </div>
    </div> -->
    <!-- end -->
    <header class="strategy_top">
        <p>
            <a href="<?php echo url('index/Strategy/index'); ?>">策略</a>
            <a href="javascript:viod(0);" class="active">策略持仓</a>
        </p>
    </header>

    <ul class="position_section clear_fl">
        <li>
            <p>净资产</p>
            <p>￥<?php echo number_format($capital['netAssets'],2); ?></p>
        </li>
        <li>
            <p>可用资金</p>
            <p class="h_re_banlance" data-balance="<?php echo number_format($capital['expendableFund'],2); ?>">￥<?php echo number_format($capital['expendableFund'],2); ?></p>
        </li>
        <li>
            <p>持仓市值</p>
            <p>￥<?php echo number_format($capital['marketValue'],2); ?></p>
        </li>
        <li>
            <p>浮动盈亏</p>
            <p><?php echo number_format($capital['floatPL'],2); ?></p>
        </li>
    </ul>
    <ul class="postion_tab flex_nowrap">
        <li class="active" data-total-page="<?php echo $totalPage; ?>" data-current-page="<?php echo $currentPage; ?>">
            <p><a href="javascript:void(0);">策略持仓</a></p>
        </li>
        <li>
            <p><a href="<?php echo url('index/Order/entrust'); ?>">策略委托</a></p>
        </li>
        <li>
            <p><a href="<?php echo url('index/Order/history'); ?>">历史交易</a></p>
        </li>
        <div class="dropload_container">
            <ul class="postion_tab_con">
            </ul>
        </div>
    </ul>

    
<nav class="ml_tab mui-bar mui-bar-tab">
    <a class="mui-tab-item" href="<?php echo url('index/Index/index'); ?>">
        <span class="mui-icon mui-icon-home"></span>
        <span class="mui-tab-label">首页</span>
    </a>
    <a class="mui-tab-item" href="<?php echo url('index/User/optional'); ?>">
        <span class="mui-icon mui-icon-zixuan"></span>
        <span class="mui-tab-label">自选</span>
    </a>
    <a class="mui-tab-item mui-active" href="javascript:void(0);">
        <span class="mui-icon mui-icon-jingu"></span>
        <span class="mui-tab-label">策略</span>
    </a>
    <a class="mui-tab-item" href="<?php echo url('index/User/index'); ?>">
        <span class="mui-icon mui-icon-my"></span>
        <span class="mui-tab-label">我的</span>
    </a>
</nav>

</body>
</html>
<script src="/resource/home/js/jquery-2.2.0.min.js"></script>
<script src="/resource/home/js/mui.min.js"></script>

<script type="text/javascript" src="/resource/home/js/common.js"></script>
<script type="text/javascript" src="/resource/home/js/dropload.min.js"></script>
<script type="text/javascript" src="/resource/home/lib/layer/layer.js"></script>

<script type="text/javascript">
	mui.init({
		swipeBack: true //启用右滑关闭功能
	})
	//选项卡
	 mui('body').on('tap', 'nav a', function() {
        var data_href = this.getAttribute("data-href");
        var href = this.getAttribute("href");
        var url=data_href;
        if(!url||url==''){
            url=href;
        }
        window.location.href = url;
     });

     mui('body').on('tap', '.strategy_top a', function() {
        var data_href = this.getAttribute("data-href");
        var href = this.getAttribute("href");
        var url=data_href;
        if(!url||url==''){
            url=href;
        }
        window.location.href = url;
     });


     mui('body').on('tap', '.postion_tab a', function() {
        var data_href = this.getAttribute("data-href");
        var href = this.getAttribute("href");
        var url=data_href;
        if(!url||url==''){
            url=href;
        }
        window.location.href = url;
     });

     var refreshIntervel = setInterval(refreshPrice,6000);

     function refreshPrice(){
        if($(".postion_tab_con li").length == 0){
            return false;
        }
        var code = new Array();
        $(".postion_tab_con li").each(function(){
            code.push( $(this).data("id") );
        });
        // code = code.join(",");
        var _url = '<?php echo url("index/Order/ajaxPosition"); ?>',
            _oData = {ids: code};
        $ajaxCustom(_url, _oData, function(res){
            if(res.state){
                if( res.data.length == 0 ){
                    return false;
                }
                var capital = res.data.capital;
                var html = '<li>\
                                <p>净资产</p>\
                                <p>￥'+ capital.netAssets +'</p>\
                            </li>\
                            <li>\
                                <p>可用资金</p>\
                                <p class="h_re_banlance" data-balance="'+ capital.expendableFund +'">￥'+ capital.expendableFund +'</p>\
                            </li>\
                            <li>\
                                <p>持仓市值</p>\
                                <p>￥'+ capital.marketValue +'</p>\
                            </li>\
                            <li>\
                                <p>浮动盈亏</p>\
                                <p>'+ capital.floatPL +'</p>\
                            </li>';

                $(".position_section").html( html );
                var _data = res.data.orders;
                for(var key in _data){
                    var items = _data[key];
                    var context = $(".position" + items.id);
                    var className = "";
                    if( items.yield_rate >= 0 ){
                        className = "red";
                    }else{
                        className = "green";
                    }
                    context.find(".p_now_price").html( items.last_px ).removeClass("red").removeClass("green").addClass(className);
                    context.find(".yield_rate").html( items.yield_rate + "%").removeClass("red").removeClass("green").addClass(className);
                    context.find(".total_pl").html( items.total_pl).removeClass("red").removeClass("green").addClass(className);
                    context.find(".p_market_value").html( items.market_value );
                }
            }else{
                // $alert(res.info);
            }
        });
     }



     //充值保证金
     mui("body").on("tap", ".add_money", function(){
        var context = $(this).parents("li");
        var baohzengjin = context.find(".banzhengjin").html();
        baohzengjin = baohzengjin.split(",");
        baohzengjin = baohzengjin.join("");
        baohzengjin = parseFloat(baohzengjin);
        var profit = context.find(".total_pl").html();
        profit = profit.split(",");
        profit = profit.join("");
        profit = parseFloat(profit);
        var saveBaozhengjin = baohzengjin + profit;
        var rechargeBaozhengjin = 0.00;
        if( saveBaozhengjin < 0 ){
            rechargeBaozhengjin = (0 - saveBaozhengjin).toFixed(2);
            saveBaozhengjin = 0;
        }
        var accountBalance = $(".h_re_banlance").data("balance");
        accountBalance = accountBalance.split(",");
        accountBalance = accountBalance.join("");
        accountBalance = parseFloat(accountBalance);


        var _id = context.data("id");
        $(".recharge_mask").attr("data-id", _id);


        $(".re_baozhengjin").html( baohzengjin.toFixed(2) + "元" );
        $(".save_baozhengjin").html( saveBaozhengjin.toFixed(2) + "元" );
        $(".buchong_baozhengjin").val( rechargeBaozhengjin.toFixed(2));
        $(".re_banlance").html( accountBalance.toFixed(2) );

        // if(saveBaozhengjin / baohzengjin < 0.5){
        //     // 补充保证金
        //     $(".buchong_baozhengjin").removeAttr("readonly");
        // }else{
        //     $(".buchong_baozhengjin").attr("readonly", "readonly");
        // }

        $(".recharge_mask").show();
        
     });

     $(".risk_content").click(function(e){
        e.stopPropagation();
     });
     $(".risk_mask").click(function(){
        $(this).hide();
     });
     $(".cancel_btn").click(function(){
        $(this).parents(".risk_mask").hide();
     });
     $(".recharge_mask .confirm_btn").click(function(){
        var count = $(".buchong_baozhengjin").val();
        var balance = parseFloat($(".re_banlance").html());
        if(count <= 0){
            // $alert("不需要充值保证金");
        }else{
            if(count > balance){
                $alert("账户余额不足");
                setTimeout(function(){
                    window.location.href = "/user/recharge.html";
                },1000);
            }else{
                var id = $(".recharge_mask").attr("data-id");
                var _url = '<?php echo url("index/Order/deposit"); ?>',
                    _oData = {id: id,deposit : count};
                $ajaxCustom(_url, _oData, function(res){
                    if(res.state){
                        $(".re_banlance").html( balance - count );
                        //保证金
                        var baohzengjin = $(".position" + id).find(".banzhengjin").html();
                        baohzengjin = baohzengjin.split(",");
                        baohzengjin = baohzengjin.join("");
                        baohzengjin = parseFloat(baohzengjin);
                        baohzengjin = baohzengjin + parseFloat(count);

                        $(".position" + id).find(".banzhengjin").html(baohzengjin.toFixed(2));
                        $alert("添加保证金成功");
                        setTimeout(function(){
                		    $(".recharge_mask").hide();
                	    },500);
                    }else{
                        $alert(res.info);
                    }
                });
            }
        }
     });

     //修改止盈止损
     $("body").on("tap", ".modify_point", function(){
        var context = $(this).parents("li");
        var accountBalance = $(".h_re_banlance").data("balance"); //账户余额
        accountBalance = accountBalance.split(",");
        accountBalance = accountBalance.join("");
        accountBalance = parseFloat(accountBalance);
        //数量
        var count = parseFloat( context.find(".g_count").html() );
        //保证金
        var baohzengjin = context.find(".banzhengjin").html();
        baohzengjin = baohzengjin.split(",");
        baohzengjin = baohzengjin.join("");
        baohzengjin = parseFloat(baohzengjin);

        var _id = context.data("id");
        $(".profit_loss_mask").attr("data-id", _id);

        //止盈止损点
        var profit = parseFloat(context.data("profit"));
        var loss = parseFloat(context.data("loss"));
        var nowPrice = parseFloat( context.find(".p_now_price").html() );

        //买入价
        var buyPrice = context.find(".buy_price").html();

        $(".profitCount").val( profit.toFixed(2) ).attr("data-initValue", profit.toFixed(2));
        $(".lossCount").val( loss.toFixed(2) ).attr("data-initValue", loss.toFixed(2));
        $(".account_balance span").html( accountBalance.toFixed(2) );


        $(".profit_loss_mask").show().attr("data-baozhengjin", baohzengjin).attr("data-count", count).attr("data-buyPrice", buyPrice).attr("data-nowPrice", nowPrice);
        calcNum();
     });


     $(".now_count").change(function(){
        var context = $(this).parents(".control_point");
        var now_count = parseFloat( context.find(".now_count").val() );
        var initValue = parseFloat( context.find(".now_count").attr("data-initValue"));
        var nowPrice = parseFloat( $(this).parents(".profit_loss_mask").attr("data-nowPrice") ); //现价


        var rate = ((now_count * 100 - nowPrice * 100) / nowPrice).toFixed(2);

        if( context.hasClass( "zhisun" ) && now_count > nowPrice){
            $(this).val( initValue );
            return false;
        }
        if( context.hasClass( "zhiying" ) && now_count < nowPrice){
            $(this).val( initValue );
            return false;
        }

        // var profit = parseFloat( $(this).parents(".profit_loss_mask").attr("profit") );
        // var loss = parseFloat( $(this).parents(".profit_loss_mask").attr("loss") );

        // if( context.hasClass( "zhisun" ) && (-rate - loss > 0)){
        //     $(this).val( initValue );
        //     return false;
        // }
        // if( context.hasClass( "zhiying" ) && ( profit - rate > 0 )){
        //     $(this).val( initValue );
        //     return false;
        // }


        context.find(".fudong").find("span").html( rate + "%" );
    });

     function calcNum(){
        var context = $(".profit_loss_mask");

        var profit = parseFloat( context.find(".profitCount").val() );
        var loss = parseFloat( context.find(".lossCount").val() );
        var buyPrice = parseFloat( context.data("buyprice") );
        var baozhengjin = parseFloat( context.data("baozhengjin") );

        var profitRate = ((profit - buyPrice) * 100 / buyPrice).toFixed(2);
        var lossRate = ((loss - buyPrice) * 100 / buyPrice).toFixed(2);

        var count = parseFloat( context.data("count") );

        context.find(".zhangfu span").html( "+" + profitRate + "%" );
        context.find(".diefu span").html( lossRate + "%" );

        //补充保证金
        var sumCount = Math.ceil( (buyPrice - loss) * count );
        var buchong = sumCount - baozhengjin;
        buchong = buchong < 0?0 : buchong;

        $(".bazhengjin_count span").html(buchong.toFixed(2));
     }

     $(".control_point").on("tap", ".count_btn", function(){
        var context = $(this).parents(".control_point");
        var val = parseFloat( context.find(".now_count").val() );
        var buyPrice = parseFloat( $(".profit_loss_mask").data("buyprice"));
        if( $(this).hasClass("minus_btn") ){ //减少
            if( val <= 0 ){
                return false;
            }
            val = (val - 0.01).toFixed(2);
        }else{
            if( context.hasClass("zhisun") && val >= buyPrice){
                return false;
            }
            val = (val + 0.01).toFixed(2);
        }
        context.find(".now_count").val( val ).attr("data-initValue", val);
        calcNum();
     });

     //平仓
     $("body").on("tap", ".sell_position_btn", function(){
        var context = $(this).parents("li");
        var id = context.data("id");
        layer.open({
            title : '',
            closeBtn : 0,
            content: "确认平仓？"
            ,btn: ['同意', '拒绝']
            ,yes: function(index, layero){
                var _url = '<?php echo url("index/Order/selling"); ?>',
                    _oData = {id: id};
                $ajaxCustom(_url, _oData, function(res){
                    if(res.state){ 
                        context.remove();
                        layer.close(index);
                    }else{
                        alert(res.info);
                        layer.close(index);
                    }
                });
            }
            ,cancel: function(){
            }
        });


        // var _url = '<?php echo url("index/Order/selling"); ?>',
        //     _oData = {id: id};
        // $ajaxCustom(_url, _oData, function(res){
        //     if(res.state){
        //         context.remove();
        //     }else{
        //         $alert(res.info);
        //     }
        // });
     });

     //提交
     $(".profit_loss_mask .confirm_btn").click(function(){
        var id = $(".profit_loss_mask").attr("data-id");
        var profit = $(".profitCount").val();
        var loss = $(".lossCount").val();
        var _url = '<?php echo url("index/Order/modifyPl"); ?>',
            _oData = {id: id,profit : profit,loss:loss};
        $ajaxCustom(_url, _oData, function(res){
            if(res.state){
                $alert("修改成功");
                var timer = setTimeout(function(){
                    $(".profit_loss_mask").hide();
                    clearTimeout( timer );
                    timer = null;
                },1000);
            }else{
                $alert(res.info);
            }
        });
     });

     //分页
    var size = 5;
    var now = 1;
    var total = 1;

    function initData(me){
        var id = $(".recharge_mask").attr("data-id");
        var _url = "<?php echo url('index/Order/position'); ?>",
            _oData = {page: now};
        $ajaxCustom(_url, _oData, function(res){
          if(res.state == 1){ // 成功
            now ++;
            total = res.data.total_page;
            var data = res.data;
            var html = "";
            for(var key in data.orders){
                var className = "";
                if( data.orders[key].yield_rate >= 0 ){
                    className = "red";
                }else{
                    className = "green";
                }
              html += '<li class="position' + data.orders[key].order_id + '" data-id="' + data.orders[key].order_id + '" data-code="' + data.orders[key].code + '" data-price="' + data.orders[key].last_px + '" data-deposit="' + data.orders[key].deposit + '" data-hand="' + data.orders[key].hand + '" data-loss="' + data.orders[key].stop_loss_price + '" data-profit="' + data.orders[key].stop_profit_price + '">\
                    <h1 class="clear_fl">\
                        <span class="lf">' + data.orders[key].name + ' '+ data.orders[key].code +'</span>\
                        <span class="rt"> <span class="p_key"></span>'+ data.orders[key].create_at_text +'</span>\
                    </h1>\
                    <div class="clear_fl p_info">\
                        <p>\
                            <span class="p_key">买价</span>\
                            <span class="p_value buy_price">'+ data.orders[key].price +'</span>\
                        </p>\
                        <p>\
                            <span class="p_key">现价</span>\
                            <span class="p_value p_now_price ' + className + '">'+ data.orders[key].last_px +'</span>\
                        </p>\
                        <p>\
                            <span class="p_key">数量</span>\
                            <span class="p_value g_count">'+ data.orders[key].hand +'</span>\
                        </p>\
                        <p>\
                            <span class="p_key">市值</span>\
                            <span class="p_value p_market_value">'+ data.orders[key].market_value +'</span>\
                        </p>\
                        <p>\
                            <span class="p_key">收益率</span>\
                                                        <span class="p_value yield_rate ' + className + '">'+ data.orders[key].yield_rate +'%</span>\
                                                    </p>\
                        <p>\
                            <span class="p_key">盈亏</span>\
                                                        <span class="p_value total_pl ' + className + '">'+ data.orders[key].total_pl +'</span>\
                                                    </p>\
                        <p>\
                            <span class="p_key">保证金</span>\
                            <span class="p_value banzhengjin">'+ data.orders[key].deposit +'</span>\
                        </p>\
                        <!--<p>\
                            <span class="p_key">止损</span>\
                            <span class="p_value">'+ data.orders[key].stop_loss_price +'</span>\
                        </p>\
                        <p>\
                            <span class="p_key">止盈</span>\
                            <span class="p_value">'+ data.orders[key].stop_profit_price +'</span>\
                        </p>\
                        <p>\
                            <span class="p_key">递延费</span>\
                            <span class="p_value">'+ data.orders[key].defer +'</span>\
                        </p>-->\
                        <p>\
                            <span class="p_key">交易模式</span>\
                            <span class="p_value">'+ data.orders[key].mode_name +'</span>\
                        </p>\
                    </div>\
                    <div class="clear_fl p_control_panel">\
                        <p class="rt">\
                            <span class="add_money lf" data-order-id="' + data.orders[key].order_id + '">补充保证金</span>\
                           <!-- <span class="modify_point lf" data-order-id="' + data.orders[key].order_id + '">修改止盈止损</span>-->\
                            <span class="sell_position_btn lf" data-order-id="' + data.orders[key].order_id + '">平仓</span>\
                        </p>\
                    </div>\
                </li>';
            }
            $(".postion_tab_con").append(html);
            // hideLoading();
          }else{
            $alert(res.info);
          }
          me.resetload();
        });
    }

    $(function(){
        // dropload
        $('.dropload_container').dropload({
            scrollArea : window,
            domDown : {
                domClass   : 'dropload-down',
                domRefresh : '<div class="dropload-refresh">↑上拉加载更多</div>',
                domLoad    : '<div class="dropload-load"><span class="loading"></span>加载中...</div>',
                domNoData  : '<div class="dropload-noData">暂无更多数据</div>'
            },
            loadDownFn : function(me){
                if(total >= now){
                    initData(me);
                }else{
                    // 锁定
                    me.lock();
                    // 无数据
                    me.noData();
                    me.resetload();
                    return false;
                }
            },
            threshold : 50
        });
    });




</script>
