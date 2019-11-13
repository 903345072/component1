<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:88:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/index/view/order/history.html";i:1568109530;s:84:"/www/wwwroot/125.maoerle.cn/www_fuda/application/index/view/layouts/layout_user.html";i:1568109530;}*/ ?>
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
    .postion_tab_con {
        position: relative;
        width: 100%;
        left: 0;
        top: 0;
        background: #fff;
        margin-bottom: 0px;
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
    .postion_tab_con li h1>span {
        width: calc(100% / 2);
    }
</style>
<link rel="stylesheet" type="text/css" href="/resource/home/css/dropload.css">

</head>

<body class="quick_body payment_body mui-ios mui-ios-10 mui-ios-10-3">

    
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
            <p>￥<?php echo number_format($capital['expendableFund'],2); ?></p>
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
        <li>
            <p><a href="<?php echo url('index/Order/position'); ?>">策略持仓</a></p>
        </li>
        <li>
            <p><a href="<?php echo url('index/Order/entrust'); ?>">策略委托</a></p>
        </li>
        <li class="active" data-total-page="<?php echo $totalPage; ?>" data-current-page="<?php echo $currentPage; ?>">
            <p><a href="javascript:void(0);">历史交易</a></p>
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

<script type="text/javascript" src="/resource/home/js/dropload.min.js"></script>
<script type="text/javascript" src="/resource/home/js/common.js"></script>
<script type="text/javascript">
	mui.init({
		swipeBack: true //启用右滑关闭功能
	})
	//选项卡
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


       //分页
    var size = 5;
    var now = 1;
    var total = 1;

    function initData(me){
        var id = $(".recharge_mask").attr("data-id");
        var _url = "<?php echo url('index/Order/history'); ?>",
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
              html += '<li>\
                <h1 class="clear_fl">\
                    <span class="lf">' + data.orders[key].name + ' '+ data.orders[key].code +'</span>\
                    <span class="rt"> <span class="p_key"></span>已平仓</span>\
                </h1>\
                <div class="clear_fl p_info">\
                    <p>\
                        <span class="p_key">买价</span>\
                        <span class="p_value">'+ data.orders[key].price +'</span>\
                    </p>\
                    <p>\
                        <span class="p_key">卖价</span>\
                        <span class="p_value">'+ data.orders[key].sell_price +'</span>\
                    </p>\
                    <p>\
                        <span class="p_key">数量</span>\
                        <span class="p_value">'+ data.orders[key].sell_hand +'</span>\
                    </p>\
                    <p>\
                        <span class="p_key">交易模式</span>\
                        <span class="p_value">'+ data.orders[key].mode_name +'</span>\
                    </p>\
                    <p>\
                        <span class="p_key">收益率</span>\
                                                <span class="p_value ' + className + '">'+ data.orders[key].yield_rate +'%</span>\
                                            </p>\
                    <p>\
                        <span class="p_key">盈亏</span>\
                                                <span class="p_value ' + className + '">'+ data.orders[key].total_pl +'</span>\
                                            </p>\
                    <p>\
                        <span class="p_key"></span>\
                        <span class="p_value"></span>\
                    </p>\
                    <p>\
                        <span class="p_key">买入</span>\
                        <span class="p_value">'+ data.orders[key].create_at_text +'</span>\
                    </p>\
                    <p>\
                        <span class="p_key">卖出</span>\
                        <span class="p_value">'+ data.orders[key].update_at_text +'</span>\
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
