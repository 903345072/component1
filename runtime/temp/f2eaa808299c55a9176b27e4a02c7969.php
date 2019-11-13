<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"C:\code\manyingcelue\www_fuda\public/../application/index\view\stock\info.html";i:1568109530;s:77:"C:\code\manyingcelue\www_fuda\application\index\view\layouts\layout_user.html";i:1568109530;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
行情
</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link href="/resource/home/css/mui.min.css" rel="stylesheet">
    <link href="/resource/home/css/person.css" rel="stylesheet">
    
<style type="text/css">
	body{
		background: #f5f5f5 !important;
	}
</style>

</head>

<body class="quick_body  mui-ios mui-ios-10 mui-ios-10-3">

    
		<header class="has_back_top ">
			<span id="guName" data-code="<?php echo $quotation['code']; ?>">
				<?php echo $quotation['prod_name']; ?>
			</span>
			<a href="javascript:history.go(-1)" class="back_icon">
				<img src="/resource/home/img/back_icon.png">
			</a>
		</header>

		<div class="g_detail_con">
			<div class="g_section">
				<div class="clear_fl g_info">
					<div class="lf">
                        <?php if($quotation['px_change'] >= 0): ?>
                        <p class="r_price"><?php echo number_format($quotation['last_px'],2); ?></p>
                        <p class="r_rate clear_fl">
                            <span class="lf"><?php echo number_format($quotation['px_change'],2); ?></span>
                            <span class="lf"><?php echo number_format($quotation['px_change_rate'],2); ?>%</span>
                        </p>
                        <?php else: ?>
                        <p class="g_price"><?php echo number_format($quotation['last_px'],2); ?></p>
                        <p class="g_rate clear_fl">
                            <span class="lf"><?php echo number_format($quotation['px_change'],2); ?></span>
                            <span class="lf"><?php echo number_format($quotation['px_change_rate'],2); ?>%</span>
                        </p>
                        <?php endif; ?>
					</div>
					<ul class="rt g_price_detail clear_fl">
						<li>
							<p>昨收</p>
							<p><?php echo number_format($quotation['preclose_px'],2); ?></p>
						</li>
						<li>
							<p>今开</p>
							<p><?php echo number_format($quotation['open_px'],2); ?></p>
						</li>
						<li>
							<p>最高</p>
							<p><?php echo number_format($quotation['high_px'],2); ?></p>
						</li>
						<li>
							<p>最低</p>
							<p><?php echo number_format($quotation['low_px'],2); ?></p>
						</li>
					</ul>
				</div>	

				<ul class="g_detail_list clear_fl">
					<li>振幅 <span><?php echo number_format($quotation['amplitude'],2); ?>%</span></li>
					<li>成交量 <span><?php echo numberFormat($quotation['business_amount']/100); ?>手</span></li>
					<li>成交额 <span><?php echo numberFormat($quotation['business_balance']); ?>元</span></li>
					<li>内盘 <span><?php echo numberFormat($quotation['business_amount_in']/100); ?>手</span></li>
					<li>外盘 <span><?php echo numberFormat($quotation['business_amount_out']/100); ?>手</span></li>
					<li>总市值 <span><?php echo $quotation['total_shares']; ?>亿</span></li>
					<li>市盈率 <span><?php echo $quotation['pe_rate']; ?></span></li>
					<li>流通市值 <span><?php echo $quotation['circulation_value']; ?>亿</span></li>
				</ul>
			</div>
		</div>
		<div class="flex_nowrap koptions_nav">
			<p class="active">
				<a data-type="0">分时</a>
			</p>
			<p>
				<a data-type="6">日K</a>
			</p>
			<p>
				<a data-type="7">周K</a>
			</p>
			<p>
				<a data-type="8">月K</a>
			</p>
		</div>

		<div class="line_con">
			<div id="chart" style="-webkit-tap-highlight-color: transparent; user-select: none; background: none; cursor: default; position: relative; overflow: hidden; width: 350px; height: 250px; margin: 0px auto;">
				
			</div>
		</div>

		<div class="stock-price f-right mui-row" id="stock-price">
            <ul class="sell mui-col-xs-6 mui-row clear_fl">
                <li class=""><em>卖⑤</em><i><?php echo (isset($quotation['offer_grp'][9]) && ($quotation['offer_grp'][9] !== '')?$quotation['offer_grp'][9]:'--'); ?></i><b class="red"><?php echo numbermm($quotation['offer_grp'][8],'--'); ?></b></li>
                <li class=""><em>卖④</em><i><?php echo (isset($quotation['offer_grp'][7]) && ($quotation['offer_grp'][7] !== '')?$quotation['offer_grp'][7]:'--'); ?></i><b class="red"><?php echo numbermm($quotation['offer_grp'][6],'--'); ?></b></li>
                <li class=""><em>卖③</em><i><?php echo (isset($quotation['offer_grp'][5]) && ($quotation['offer_grp'][5] !== '')?$quotation['offer_grp'][5]:'--'); ?></i><b class="red"><?php echo numbermm($quotation['offer_grp'][4],'--'); ?></b></li>
                <li class=""><em>卖②</em><i><?php echo (isset($quotation['offer_grp'][3]) && ($quotation['offer_grp'][3] !== '')?$quotation['offer_grp'][3]:'--'); ?></i><b class="red"><?php echo numbermm($quotation['offer_grp'][2],'--'); ?></b></li>
                <li class=""><em>卖①</em><i><?php echo (isset($quotation['offer_grp'][1]) && ($quotation['offer_grp'][1] !== '')?$quotation['offer_grp'][1]:'--'); ?></i><b class="red"><?php echo numbermm($quotation['offer_grp'][0],'--'); ?></b></li>
            </ul>
            <ul class="buy mui-col-xs-6 mui-row clear_fl">
                <li><em>买①</em><i><?php echo (isset($quotation['bid_grp'][1]) && ($quotation['bid_grp'][1] !== '')?$quotation['bid_grp'][1]:'--'); ?></i><b class="red"><?php echo numbermm($quotation['bid_grp'][0],'--'); ?></b></li>
                <li><em>买②</em><i><?php echo (isset($quotation['bid_grp'][3]) && ($quotation['bid_grp'][3] !== '')?$quotation['bid_grp'][3]:'--'); ?></i><b class="red"><?php echo numbermm($quotation['bid_grp'][2],'--'); ?></b></li>
                <li><em>买③</em><i><?php echo (isset($quotation['bid_grp'][5]) && ($quotation['bid_grp'][5] !== '')?$quotation['bid_grp'][5]:'--'); ?></i><b class="red"><?php echo numbermm($quotation['bid_grp'][4],'--'); ?></b></li>
                <li><em>买④</em><i><?php echo (isset($quotation['bid_grp'][7]) && ($quotation['bid_grp'][7] !== '')?$quotation['bid_grp'][7]:'--'); ?></i><b class="red"><?php echo numbermm($quotation['bid_grp'][6],'--'); ?></b></li>
                <li><em>买⑤</em><i><?php echo (isset($quotation['bid_grp'][9]) && ($quotation['bid_grp'][9] !== '')?$quotation['bid_grp'][9]:'--'); ?></i><b class="red"><?php echo numbermm($quotation['bid_grp'][8],'--'); ?></b></li>
            </ul>
    	</div>

    	<div class="buy_btns clear_fl">
    		<a class="lf add_zixuan">添加自选</a>
    		<a href="<?php echo url('index/Stock/stockBuy', ['code' => $quotation['code']]); ?>" class="rt create_position">创建策略</a>
    	</div>

    

</body>
</html>
<script src="/resource/home/js/jquery-2.2.0.min.js"></script>
<script src="/resource/home/js/mui.min.js"></script>

<script type="text/javascript" src="/resource/home/js/common.js"></script>
<script type="text/javascript" src="/resource/home/js/config.js"></script>
<script type="text/javascript" src="/resource/home/js/echarts.min.js"></script>
<script type="text/javascript">
    $(".add_zixuan").click(function(){
        var _url = '<?php echo url("index/User/createOptional"); ?>',
            _code = $("#guName").data("code"),
            _oData = {code:_code};
        $ajaxCustom(_url, _oData, function(res){
            if(res.state){ // 登录成功
                $alert("自选添加成功！");
                // $(this).html("取消自选");
            }else{
                $alert(res.info);
            }
        });
    });

    var kLineUrl = '<?php echo url("index/Stock/kline"); ?>';
    var areaLineUrl = "<?php echo url('index/Stock/real'); ?>";
    var refreshUrl = '<?php echo url("index/Stock/incReal"); ?>';

        
	/**---- 获取跳转参数更新页面内容 ----*/
	// var code = getQueryString("code");
	// var url = config.api.base + config.api.getSharesByKeywords;
	// $ajaxCustom(url, {keywords: code}, function(res){
	// 	console.log(res);
	// });
</script>
<script type="text/javascript" src="/resource/home/js/candle.js"></script>
