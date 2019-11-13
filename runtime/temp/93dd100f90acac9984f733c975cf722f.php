<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/index/view/user/record.html";i:1568109530;s:84:"/www/wwwroot/125.maoerle.cn/www_fuda/application/index/view/layouts/layout_user.html";i:1568109530;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
资金明细
</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link href="/resource/home/css/mui.min.css" rel="stylesheet">
    <link href="/resource/home/css/person.css" rel="stylesheet">
    
<style type="text/css">
	.money_detail_list{
		padding: 10px 14px;
	}
	.money_detail_list li{
		margin-bottom: 10px;
		border-radius: 4px;
		background: #f8f8f8;
		padding: 6px 10px;
	}
	.money_detail_list li p{
		margin: 0;
		line-height: 24px;
	}
	.order_num{
		font-size: 10px;
		color: #333;
	}
	.money_d_list p{
		width: 50%;
		font-size: 12px;
	}
	.money_d_list p .key{
		width: 50%;
		text-align: right;
		padding-right: 6px;
	}
	.money_d_list p .value{
		width: 50%;
		text-align: left;
		padding-left: 6px;
		white-space: nowrap;
	}
	.order_num span{
		display: inline-block;
		width: 25%;
		text-align: right;
	}
	.postion_tab li.active>p a {
	    border-bottom: 2px solid #fc5055;
	    display: inline-block;
	    color: #fc5055;
	}
	.postion_tab li>p a {
	    color: #8f8f94;;
	    font-size: 13px;
	}
	.dropload-noData,.dropload-refresh,.dropload-load{
        color: #999;
    }
</style>
<link rel="stylesheet" type="text/css" href="/resource/home/css/dropload.css">

</head>

<body class="quick_body payment_body mui-ios mui-ios-10 mui-ios-10-3">

    
	<header class="has_back_top ">
		资金明细
		<a href="javascript:history.go(-1)" class="back_icon">
			<img src="/resource/home/img/back_icon.png">
		</a>
	</header>
	<div class="money_header">
		<h1 class="m_balance"><?php echo number_format($user['account'],2); ?></h1>
		<p class="m_balance_title">账户余额（元）</p>
		<div class="clear_fl m_panel">
			<a href="<?php echo url('index/User/recharge'); ?>" class="lf">
				<img src="/resource/home/img/recharge_icon.png"><br/>
				充值
			</a>
			<a href="<?php echo url('index/User/withdraw'); ?>" class="rt">
				<img src="/resource/home/img/withdrew_icon.png"><br/>
				提现
			</a>
		</div>
	</div>


	<ul class="postion_tab flex_nowrap">
		<li <?php if($type == '-1'): ?>class="active"<?php endif; ?>>
			<p><a href="<?php echo url('index/User/record'); ?>">全部</a></p>
		</li>
		<li <?php if($type == 4): ?>class="active"<?php endif; ?>>
			<p><a href="<?php echo url('index/User/record', ['type' => 4]); ?>">保证金</a></p>
		</li>
		<li <?php if($type == 0): ?>class="active"<?php endif; ?>>
			<p><a href="<?php echo url('index/User/record', ['type' => 0]); ?>">建仓费</a></p>
		</li>
		<li <?php if($type == 1): ?>class="active"<?php endif; ?>>
			<p><a href="<?php echo url('index/User/record', ['type' => 1]); ?>">递延费</a></p>
		</li>
	</ul>

	<!-- <div class="money_tab_con" style="text-align: center;">
		<img style="width: 30%;margin-top: 60px;" src="img/no-search-data@3x.png">
	</div> -->
	<div class="dropload_container">
		<ul class="money_detail_list">
			<!-- <?php if(is_array($records) || $records instanceof \think\Collection || $records instanceof \think\Paginator): $i = 0; $__LIST__ = $records;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<li class="clear_fl">
				<div class="clear_fl money_d_list">
					<p class="lf clear_fl">
						<span class="key lf">生成时间</span>
						<span class="value lf"><?php echo date("Y-m-d H:i", $vo['create_at']); ?></span>
					</p>
					<p class="lf clear_fl">
						<span class="key lf">金额</span>
						<span class="value lf"><?php echo (isset($vo['amount']) && ($vo['amount'] !== '')?$vo['amount']:0.00); ?></span>
					</p>
					<p class="lf clear_fl">
						<span class="key lf">用途</span>
						<span class="value lf">
							<?php switch($vo['type']): case "0": ?>建仓费<?php break; case "1": ?>递延费<?php break; case "2": ?>牛人跟买收入<?php break; case "3": ?>递延费提成<?php break; case "4": ?>保证金<?php break; case "5": ?>充值<?php break; case "6": ?>提现<?php break; case "7": ?>分红<?php break; case "8": ?>建仓费提成<?php break; endswitch; ?>
						</span>
					</p>
					<p class="lf clear_fl">
						<span class="key lf">金额</span>
						<span class="value lf"><?php if($vo['direction'] == 1): ?>+<?php elseif($vo['direction'] == 2): ?>-<?php endif; ?><?php echo (isset($vo['amount']) && ($vo['amount'] !== '')?$vo['amount']:0.00); ?></span>
					</p>
				</div>
			</li>
			<?php endforeach; endif; else: echo "" ;endif; ?> -->
		</ul>
	</div>

    

</body>
</html>
<script src="/resource/home/js/jquery-2.2.0.min.js"></script>
<script src="/resource/home/js/mui.min.js"></script>

<script type="text/javascript" src="/resource/home/js/common.js"></script>
<script type="text/javascript" src="/resource/home/js/dropload.min.js"></script>
<script type="text/javascript">
	$(".postion_tab").on("tap" , "li" , function(){
		$(this).addClass("active").siblings(".active").removeClass("active");
	});

	//分页
    var size = 5;
    var now = 1;
    var total = 1;

    function initData(me){
        var id = $(".recharge_mask").attr("data-id");
        var _url = document.url,//"<?php echo url('index/User/record'); ?>",
            _oData = {page: now};
        $ajaxCustom(_url, _oData, function(res){
          if(res.state == 1){ // 成功
            now ++;
            total = res.data.total_page;
            var data = res.data;
            var html = "";
            for(var key in data.lists){
            	var type = data.lists[key].type;
            	use_type = "";
            	switch( type ){
            		case 0: use_type = "建仓费";break;
            		case 1: use_type = "递延费";break;
            		case 2: use_type = "牛人跟买收入";break;
            		case 3: use_type = "递延费提成";break;
            		case 4: use_type = "保证金";break;
            		case 5: use_type = "充值";break;
            		case 6: use_type = "提现";break;
            		case 7: use_type = "分红";break;
            		case 8: use_type = "建仓费提成";break;
            	}
              html += '<li class="clear_fl">\
				<!--<p class="order_num"><span>订单编号：</span> HR343534234234234234234D</p>-->\
				<div class="clear_fl money_d_list">\
					<p class="lf clear_fl">\
						<span class="key lf">生成时间</span>\
						<span class="value lf">' + data.lists[key].create_at + '</span>\
					</p>\
					<p class="lf clear_fl">\
						<span class="key lf">金额</span>\
						<span class="value lf">' + data.lists[key].amount + '</span>\
					</p>\
					<p class="lf clear_fl">\
						<span class="key lf">用途</span>\
						<span class="value lf">\
							' + use_type + '						</span>\
					</p>\
					<!--<p class="lf clear_fl">-->\
						<!--<span class="key lf">生成时间</span>-->\
						<!--<span class="value lf">2018-12-01</span>-->\
					<!--</p>-->\
					<p class="lf clear_fl">\
						<span class="key lf">金额</span>\
						<span class="value lf">' + data.lists[key].amount + '</span>\
					</p>\
					<!--<p class="lf clear_fl">-->\
						<!--<span class="key lf">用途</span>-->\
						<!--<span class="value lf">建仓费</span>-->\
					<!--</p>-->\
				</div>\
			</li>';
            }
            $(".money_detail_list").append(html);
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
