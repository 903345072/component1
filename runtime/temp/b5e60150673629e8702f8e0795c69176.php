<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"C:\code\manyingcelue\www_fuda\public/../application/index\view\stock\buy.html";i:1568109530;s:77:"C:\code\manyingcelue\www_fuda\application\index\view\layouts\layout_user.html";i:1568109530;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
创建策略
</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link href="/resource/home/css/mui.min.css" rel="stylesheet">
    <link href="/resource/home/css/person.css" rel="stylesheet">
    
<style type="text/css">
	body{
		background: #f5f5f5 !important;
	}
	.now_count{
		width: 100%;
		border: 1px solid #ededed;
	    height: 30px;
	    line-height: 30px;
	    text-align: center;
	    font-size: 12px;
	    color: #333;
	}
	.risk_title{
		text-align: left;
	}
	.read_risk_btn{
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
	.risk_text p {
	    font-size: 12px;
	    color: #333;
	    line-height: 20px;
	    text-align: justify;
	    margin-bottom: 40px;
	}
	* {
        -webkit-user-select: auto!important;
    }
    .x_y_options span {
	    float: left;
	    width: calc((100% - 24px) / 4);
	    text-align: center;
	    border: 1px solid #eaeaea;
	    font-size: 13px;
	    color: #999;
	    height: 28px;
	    line-height: 28px;
	    margin-left: 6px;
	    margin-bottom: 6px;
	    position: relative;
	    left: -6px;
	}
	.x_y_options span:nth-child(4n + 1) {
	    margin-left: 6px;
	}
	.x_o_title {
	    line-height: normal;
	}
	.pattern_options span, .beishu_options span {
		width: calc((100% - 18px) / 3);
		text-align: center;
		border: 1px solid #eaeaea;
		height: 28px;
		line-height: 28px;
		font-size: 14px;
		color: #999;
		float: left;
		margin-bottom: 6px;
		margin-left: 6px;
	}
	.pattern_options span+span, .beishu_options span+span {
		margin-left: 6px;
	}
	.celue_pattern {
		padding: 16px 0;
		background: url(/resource/home/img/right_arrow.png) no-repeat right 24px;
		background-size: 7px 13px;
	}
	.no_arrow {
		background: #fff!important;
	}
	.custom_count{
		margin-top: 0;
		text-align: right;
		padding-right: 20px !important;
	}
</style>

</head>

<body class="quick_body  mui-ios mui-ios-10 mui-ios-10-3">

    
		<header class="has_back_top ">
			创建策略
			<a href="javascript:history.go(-1)" class="back_icon">
				<img src="/resource/home/img/back_icon.png">
			</a>
		</header>
		<section class="buy_section mar56">
			<a href="<?php echo url('index/Stock/info', ['code' => $stock['code']]); ?>"  class="b_gupiao_detail clear_fl">
				<div class="lf b_gupiao_profile">
					<p class="b_gupiao_name"><?php echo $stock['prod_name']; ?></p>
					<p class="b_gupiao_code"><?php echo $stock['code']; ?></p>
				</div>
				<div class="lf b_gupiao_price">
					<p class="b_gupiao_now_price"><?php echo $stock['last_px']; ?></p>
					<p class="b_gupiao_rate clear_lf">
						<span class="lf"><?php echo $stock['px_change']; ?></span>
						<span class="rt"><?php echo $stock['px_change_rate']; ?>%</span>
					</p>
				</div>
				<span class="rt">行情</span>
			</a>
			<div class="b_gupiao_detail clear_fl b_gupiao_intro">
				<div class="agent_price_title lf">策略委托价</div>
				<div class="agent_price lf"><?php echo $stock['sell_px']; ?></div>
				<a class="rt intro_btn">说明
					<!-- 说明 - start -->
				    <div class="risk_mask">
				        <div class="risk_content">
				            <p class="risk_title">策略委托价说明</p>
				            <div class="risk_text">
				            	<p>策略委托价是在当前行情价格基础上浮动 0.02 元，方便促使策略委托单在实盘尽可能成交.</p>
				            </div>
				            <p class="read_risk_btn">确认</p>
				        </div>
				    </div>
				    <!-- end -->
				</a>
			</div>
		</section>
		<section class="buy_section">
			<div class="celue_pattern clear_fl">
				<span class="lf pattern_title">策略模式</span>
				<div class="lf pattern_options clear_fl">
					<!--<span class="active">T+1</span>-->
                    <?php if(is_array($modes) || $modes instanceof \think\Collection || $modes instanceof \think\Paginator): $i = 0; $__LIST__ = $modes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
					<span data-id="<?php echo $item['mode_id']; ?>" data-profit="<?php echo $item['profit']; ?>" data-loss="<?php echo $item['loss']; ?>" data-jiancang="<?php echo $item['jiancang']; ?>" data-defer="<?php echo $item['defer']; ?>"  data-deposit="<?php echo $item['deposit']; ?>" data-lever="<?php echo $item['lever']; ?>"><?php echo $item['name']; ?></span>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<a class="rt intro_btn">说明
					<!-- 说明 - start -->
				    <div class="risk_mask">
				        <div class="risk_content">
				            <p class="risk_title">策略模式说明</p>
				            <div class="risk_text">
				            	<p>选择不同的策略模式，对应不同的配资周期，建仓费和递延费不同。</p>
				            </div>
				            <p class="read_risk_btn">确认</p>
				        </div>
				    </div>
				    <!-- end -->
				</a>
			</div>
		</section>
		<section class="buy_section">
			<div class="clear_fl xinyongjin_title">
				<span class="lf">选择信用金（元）</span>
				<span class="rt selected_count"><input  class="custom_count" type="number" value=""/></span>
			</div>
			<div class="xinyongjin_options_con clear_fl">
				<span class="pattern_title lf">选择数额</span>
				<div class="clear_fl rt x_y_options">
					<!--<span class="active">1500</span>-->
                    <?php if(is_array($deposits) || $deposits instanceof \think\Collection || $deposits instanceof \think\Paginator): $i = 0; $__LIST__ = $deposits;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
					<span data-id="<?php echo $item['id']; ?>" data-money="<?php echo floatval($item['money']); ?>"><?php echo $item['name']; ?></span>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
			<!-- <div style="padding: 0" class="xinyongjin_options_con clear_fl">
				<span class="x_o_title lf">其他金额</span>
				<div class="clear_fl rt x_y_options">
					<input placeholder="请输入其他金额" class="custom_count" />
				</div>
			</div> -->
		</section>
		<section class="buy_section">
			<div class="celue_pattern clear_fl no_arrow">
				<span class="lf pattern_title">策略匹配</span>
				<div class="lf beishu_options flex_nowrap">
					<!--<span class="active">10倍</span>-->
                    <?php if(is_array($levers) || $levers instanceof \think\Collection || $levers instanceof \think\Paginator): $i = 0; $__LIST__ = $levers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
					<span data-id="<?php echo $item['id']; ?>" data-multiple="<?php echo $item['multiple']; ?>"><?php echo $item['name']; ?></span>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
			<div class="clear_fl baishu_detail">
				<span class="lf">1200股</span>
				<span class="rt">市值154548.5元</span>
			</div>
		</section>

		<!-- <section class="buy_section">
			<div class="control_point zhiying clear_fl">
				<span class="lf">止盈</span>
				<p class="lf count_panel flex_nowrap">
					<span class="minus_btn count_btn">-</span>
					<input  value="13.08" class="now_count profitCount" />
					<span class="plus_btn count_btn">+</span>
				</p>
				<p class="rt fudong zhangfu">涨幅约 <span>+11.9%</span></p>
			</div>

			<div class="control_point zhisun clear_fl">
				<span class="lf">止损</span>
				<p class="lf count_panel flex_nowrap">
					<span class="minus_btn count_btn">-</span>
					<input  value="9.07" class="now_count lossCount" />
					<span class="plus_btn count_btn">+</span>
				</p>
				<p class="rt fudong diefu">跌幅约 <span>+11.9%</span></p>
			</div>
		</section> -->


		<section class="buy_section">
			<div class="b_gupiao_detail clear_fl b_gupiao_intro no_border">
				<div class="agent_price_title lf">建仓费</div>
				<div class="create_price lf jiangcangfei">78.00元</div>
				<a class="rt intro_btn">说明
					<!-- 说明 - start -->
				    <div class="risk_mask">
				        <div class="risk_content">
				            <p class="risk_title">建仓费说明</p>
				            <div class="risk_text">
				            	<p>交易建仓费是当策略第一次发起时，策略人要支付给平台的费用，费用包括交易印花税、过户费、佣金以及平台的居间费。此费用根据策略金额收取，在第一天收取，一般标准为150元/万（数据仅供参考，以实际平台公布为准）。</p>
				            </div>
				            <p class="read_risk_btn">确认</p>
				        </div>
				    </div>
				    <!-- end -->
				</a>
			</div>
		</section>

		<section class="buy_section">
			<div class="b_gupiao_detail clear_fl b_gupiao_intro no_border">
				<div class="agent_price_title lf">递延费</div>
				<div class="create_price lf diyanfei">19.90元/天/万元</div>
				<a class="rt intro_btn">说明
					<!-- 说明 - start -->
				    <div class="risk_mask">
				        <div class="risk_content">
				            <p class="risk_title">递延费说明</p>
				            <div class="risk_text">
				            	<p>策略持仓超过T+1时，第三个交易日起，策略人需要缴纳的递延费用，扣费时间为14:40，直接从策略人平台余额中扣除。如策略人不想递延，请务必在第二个 交易日的14:40分前发起卖出指令，否则视为要求递延，递延成功即扣费，扣费标准一般为 <span class="intro_diyanfei"></span>元/万/天（数据仅供参考，以实际平台公布为准）。</p>
				            </div>
				            <p class="read_risk_btn">确认</p>
				        </div>
				    </div>
				    <!-- end -->
				</a>
			</div>
			<div class="b_gupiao_detail clear_fl b_gupiao_intro no_border no_arrow">
				<div class="agent_price_title lf">自动递延</div>
				<div class="zidongdiyan lf">若未开启自动递延<br/>次日 14.40 将卖出股票</div>
				<a class="rt">
					<input id="autoDefer" type="checkbox" checked="checked" class="switch__mui-switch___3_30S switch__mui-switch-anim___3IUf5" value="on">
				</a>
			</div>
		</section>

		<section class="buy_section">
			<div class="sub_pay_con clear_fl">
				<div class="lf">
					<p class="need_pay_count">需要支付 <span>1289.00</span> 元</p>
					<p class="balance_count" data-usage="<?php echo (isset($usage) && ($usage !== '')?$usage:95); ?>" data-account="<?php echo $user['account']; ?>">(账户余额：<?php echo number_format($user['account'],2); ?> 元)</p>
				</div>
				<a href="" class="rt sub_pay_btn">马上创建</a>
			</div>
			<div class="agree_con">
				<label for="agree">
					<input type="checkbox" id="agree" value="on" checked="">
					已阅读并同意相关
				</label>
				<a href="#/Agreement"><span>合作协议</span></a>
			</div>
		</section>

    

</body>
</html>
<script src="/resource/home/js/jquery-2.2.0.min.js"></script>
<script src="/resource/home/js/mui.min.js"></script>

<script type="text/javascript" src="/resource/home/js/common.js"></script>
<script type="text/javascript">
	$(".intro_btn").click(function(){
		$(this).find(".risk_mask").show();
	});
	
	$("body").on("click", ".read_risk_btn", function(){
		$(this).parents(".risk_mask").hide();
	});



	$(".pattern_options").on("click" , "span" , function(){
		$(this).addClass("active").siblings(".active").removeClass("active");
		calcNum(true);

		var deposit_ids = $(this).data("deposit");
		deposit_ids = deposit_ids.split(",");
		var lever_ids = $(this).data("lever");
		lever_ids = lever_ids.split(",");

		// $(".x_y_options span").hide();
		// $(".beishu_options span").hide();


		for( var key in deposit_ids ){
			$(".x_y_options").find("[data-id='" + deposit_ids[key] + "']").show();
		}
		$(".x_y_options").find("[data-id='" + deposit_ids[0] + "']").trigger("click");

		for( var key in lever_ids ){
			$(".beishu_options").find("[data-id='" + lever_ids[key] + "']").show();
		}
	});

	$(function(){
		$(".pattern_options span:first-child").trigger("click");
	});


	$(".x_y_options").on("click" , "span" , function(){
		$(this).addClass("active").siblings(".active").removeClass("active");
		var val = $(this).html();
		$(".custom_count").val(val);
		calcNum()
	});
	// $(".x_y_options").on("focus","input",function(){
	// 	$(".x_y_options span").removeClass("active");
	// })
	$(".selected_count").on("input propertychange",".custom_count",function(){
		$(".x_y_options span").removeClass("active");
		var inp = $(this).val().trim();
		// inp < 100?inp=100:inp>9999999?inp=9999999:'';
		$(".custom_count").val(inp);
		calcNum()
	})

	$(".beishu_options").on("tap" , "span" , function(){
		$(this).addClass("active").siblings(".active").removeClass("active");
		calcNum()
	});


	//止盈止损
	// $(".control_point").on("click",".count_btn",function(){
	// 	var context = $(this).parents(".control_point");
	// 	var now_count = parseFloat( context.find(".now_count").val() );
	// 	var initValue = parseFloat( context.find(".now_count").attr("data-initValue"));
	// 	var nowPrice = parseFloat( $(".agent_price").html() ); //现价

	// 	if( $(this).hasClass("minus_btn") ){ //减
	// 		if(now_count <= initValue){
	// 			return false;
	// 		}
	// 		now_count = ((now_count * 100 - 1) / 100).toFixed(2);
	// 	}else{ //加
	// 		if( context.hasClass("zhisun") ){ 
	// 			var _rate = parseFloat( context.find(".fudong").find("span").html() );
	// 			if( _rate >= 0 ){
	// 				return false;
	// 			}
	// 		}
	// 		now_count = ((now_count * 100 + 1) / 100).toFixed(2);
	// 	}

	// 	context.find(".now_count").val( now_count );
	// 	var rate = ((now_count * 100 - nowPrice * 100) / nowPrice).toFixed(2);
	// 	context.find(".fudong").find("span").html( rate + "%" );

	// });

	$(function(){
		$(".x_y_options span:nth-child(1)").addClass("active");
		$(".custom_count").val($(".x_y_options span:nth-child(1)").data("money"));
		$(".pattern_options span:nth-child(1)").addClass("active");
		$(".beishu_options span:nth-child(1)").addClass("active");
		calcNum(true);

		// $(".plus_btn").trigger("click");
	});

	$(".now_count").change(function(){
		var context = $(this).parents(".control_point");
		var now_count = parseFloat( context.find(".now_count").val() );
		var initValue = parseFloat( context.find(".now_count").attr("data-initValue"));
		var nowPrice = parseFloat( $(".agent_price").html() ); //现价


		var rate = ((now_count * 100 - nowPrice * 100) / nowPrice).toFixed(2);

		if( context.hasClass( "zhisun" ) && now_count > nowPrice){
			$(this).val( initValue );
			return false;
		}
		if( context.hasClass( "zhiying" ) && now_count < nowPrice){
			$(this).val( initValue );
			return false;
		}

		var profit = parseFloat( $(".pattern_options").find(".active").data("profit") );
		var loss = parseFloat( $(".pattern_options").find(".active").data("loss") );

		if( context.hasClass( "zhisun" ) && (-rate - loss > 0)){
			$(this).val( initValue );
			return false;
		}
		if( context.hasClass( "zhiying" ) && ( profit - rate > 0 )){
			$(this).val( initValue );
			return false;
		}


		context.find(".fudong").find("span").html( rate + "%" );
	});

	//计算
	function calcNum( type ){
		// var creditNum = parseFloat( $(".x_y_options").find(".active").data("money") ); //信用金
		var creditNum = parseFloat( $(".custom_count").val().trim()); //信用金
		var multiple = parseFloat( $(".beishu_options").find(".active").data("multiple") );//倍数
		var nowPrice = parseFloat( $(".agent_price").html() ); //现价
		var usage = parseFloat( $(".balance_count").data("usage") ); //资金使用率
		// console.log(creditNum)
		// console.log(multiple)
		// console.log(nowPrice)
		var count = Math.floor(creditNum * multiple * usage / nowPrice /100 / 100) * 100; //股数
		var ammount =  (count * nowPrice).toFixed(2);
		// console.log(nowPrice);
		$(".baishu_detail .lf").html(count + "股").attr("data-count",count);
		$(".baishu_detail .rt").html("市值" + ammount + "元").attr("data-ammount",ammount);

		//计算建仓费
		var jiancangUnit = parseFloat( $(".pattern_options").find(".active").data("jiancang") );
		var jiangcang = ( jiancangUnit * (creditNum * multiple ) / 10000 ).toFixed(2);
		$(".jiangcangfei").html(jiangcang + "元").attr("data-fee", jiangcang);

		//支付总价
		var sum = parseFloat((parseFloat(jiangcang) + creditNum)).toFixed(2);
		$(".need_pay_count span").html(sum);


		//涨跌幅
		var profit = parseFloat( $(".pattern_options").find(".active").data("profit") );
		var loss = parseFloat( $(".pattern_options").find(".active").data("loss") );
		var nowPrice = parseFloat( $(".agent_price").html() );

		var maxProfit = (nowPrice * (1 + profit / 100)).toFixed(2);
		var maxLoss = (nowPrice * (1 - loss / 100)).toFixed(2);

		var deferCount = parseFloat( $(".pattern_options").find(".active").data("defer") );
		if( type ){
			$(".profitCount").val(maxProfit).attr("data-initValue", maxProfit);
			$(".lossCount").val( maxLoss ).attr("data-initValue", maxLoss);
			$(".zhangfu span").html("+" + profit + "%");
			$(".diefu span").html("-" + loss + "%");
		}

		$(".diyanfei").html(deferCount + "元/天/万元");
		$(".intro_diyanfei").html(deferCount);


		var balaceCount = parseFloat( $(".balance_count").data("account") );
		if( balaceCount < sum ){ //余额不足
			$(".sub_pay_btn").html("余额不足").addClass("disabled");
		}else{
			$(".sub_pay_btn").html("创建策略").removeClass("disabled");
		}
	}

	//建仓
	$(".sub_pay_btn").click(function(e){
		e.preventDefault();
		if( $(this).hasClass("disabled") ){
			//余额不足，跳转到充值
			window.location.href = "/user/recharge.html";
		}

		if( !$("#agree").is(":checked") ){
			$alert("请仔细阅读合作协议");
			return false;
		}
		var deposit_money = $(".custom_count").val();
		if(deposit_money<100||deposit_money>999999){
			$alert("请输入正确金额");
			return false;
		}

		var params = {};
        params.follow_id = <?php echo (isset($follow_id) && ($follow_id !== '')?$follow_id:0); ?>; //更改
		params.price = $(".agent_price").html(); //委托价
		params.mode = $(".pattern_options").find(".active").data("id");//策略模式
		// params.deposit = $(".x_y_options").find(".active").data("id");//信用金
		params.deposit = $(".custom_count").val();//信用金
		params.lever = $(".beishu_options").find(".active").data("id");//策略匹配
		// params.stockCount = $(".baishu_detail .lf").attr("data-count"); //股数
		// params.marketPrice = $(".baishu_detail .rt").attr("data-ammount"); //市值
		// params.profit = $(".profitCount").val();//止盈
		// params.loss = $(".lossCount").val();//止损
		// params.fee = $(".jiangcangfei").data("fee"); //建仓费
		// params.defer = $(".pattern_options").find(".active").data("defer");//递延费
		params.defer = 0; //自动递延
		params.code = $(".b_gupiao_code").html();
		if( $("#autoDefer").is(":checked") ){
			params.defer = 1;
		}

		var _url = "<?php echo url('index/Stock/stockBuy'); ?>";
        $ajaxCustom(_url, params, function(res){
            if(res.state){ 
            	$alert("建仓成功");
                var data = res.data;
                if(data.url){
                	setTimeout(function(){
                		window.location.href = data.url;
                	},1000);
                }
            }else{
                $alert(res.info);
            }
        });



	});



	/**
 * 判断当前时间是否在9:30-11:30, 13:00-15:00（交易时间）
 */
function isTradingTime(){
    var date = new Date();
    //判断是不是周末
    var dt=date.getDay();
    if(dt=='6'||dt=='7'){
        return false;
    }
    //判断当前时间是否在9:30-11:30, 13:00-15:00
    var h = date.getHours();
    var mi = date.getMinutes();
    var s = date.getSeconds();
    if(h < 10){
        h = "0" + h;
    }
    if(mi < 10){
        mi = "0"+ mi;
    }
    if(s < 10){
        s = "0" + s;
    }
    var curTime = h + ":" + mi + ":" + s;
//  console.log(curTime);
    if( curTime >= "09:30:00" && curTime <= "11:30:00" || curTime >= "13:00:00" && curTime <= "15:00:00" ){
        return true;
    }
    return false;
}

if( !isTradingTime() ){
	$alert("当前时间不在交易时段内");
}

</script>