<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/index/view/index/index.html";i:1568109530;s:85:"/www/wwwroot/125.maoerle.cn/www_fuda/application/index/view/layouts/layout_index.html";i:1568109530;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
首页
</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link href="/resource/home/css/mui.min.css" rel="stylesheet">
    <link href="/resource/home/css/index.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/resource/home/css/swiper.min.css">
    <script src="/resource/home/js/js/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="/resource/home/js/swiper.min.js"></script>
    
<style type="text/css">
	.risk_mask{
		display: none;
	}
	.Ashare .Ashare_top li{
	    border-right: 1px solid #dadada!important;
	}
	.Ashare_top li+li {
	    border-left: 0!important;
	}
	.follow_btn_con{
		text-align: right;
	}
	.follow_btn{
		display: inline-block;
		width: 20%;
		color: #fff!important;
		font-size: 12px;
	}
	.qiquan_link{
		display: block;
		height: 50px;
		color: #fff;
		margin-top: 8px;
		text-align: center;
		line-height: 50px;
		background-image: linear-gradient(135deg,#f48651 12.5%, #e59eac 25%,#e59eac 37.5%, #f48651 50%,#f48651 62.5%, #e59eac 75%,#e59eac 87.5%, #f48651 100%);
		background-repeat:repeat;
		background-size:4px 4px;
	}
	
</style>

</head>
<body class="mui-ios mui-ios-10 mui-ios-10-3">
    
    <!-- 风险提示书 - start -->
    <div class="risk_mask">
        <div class="risk_content">
            <p class="risk_title">风险提示书</p>
            <div class="risk_text">
                <h3>尊敬的用户：</h3>
                <p>当您进行策略交易的时候，可能获得较高的投资收益，但同时也存在着较大的投资风险。为了使您更好地了解其中的风险，请在交易前仔细阅读以下风险揭示书。且除以下揭示的风险外还有其他的外部风险，均需要用户自行承担，平台不承担相关责任：</p>
                <p><b>1、宏观经济风险：国家宏观经济形势的变化以及国际经济环境和其他证券市场的变化，可能引起证券市场的波动，使您存在亏损的可能，您将承担由此可能造成的损失。</b></p>
                <p><b><b>2、政策监管风险：因宏观政策、监管导向、行业政策、地区发展政策等因素引起的无法实现交易合作的风险。</b></b></p><p><b><b><b>3、技术风险：由于本平台属于网络技术服务，其中交易通讯、交易下单、行情揭示等都是通过电子通讯技术和网络技术来实现的，这些技术存在着被网络黑客和计算机病毒攻击的可能，同时通讯技术、电脑技术和相关软件存在缺陷的可能，这些风险均有可能造成服务中断或者延迟。</b></b></b></p><p><b><b><b><b>4、不可抗力因素导致的风险：不可抗力因素包括但不限于以下情形：平台系统停机维护；平台所依赖的通讯设备出现故障不能进行数据传输；因台风、地震、海啸、洪水 、停电、战争、恐怖袭击等不可抗力之因素，造成本平台系统障碍不能执行业务。</b></b></b></b></p><p><b><b><b><b>5、其他风险：由于您密码失密、操作不当、投资决策失误等原因可能会使您发生亏损。</b></b></b></b></p><b><b><b><br><p><b>温馨提示：市场有风险，入市须谨慎！如果用户不同意本协议的任意内容，或者无法准确理解以上风险及可能存在的其他风险，请不要进行后续操作。</b></p><p><b>以上《风险揭示书》本人已阅读并完全理解，愿意自行承担投资市场的各种风险。</b></p></b></b></b>
            </div>
            <p class="read_risk_btn">我已阅读并同意</p>
        </div>
    </div>
    <!-- 风险提示书 - start -->

	<div class="mui-content">
		<div class="search_container">
			<a href="/strategy/index.html" class="lf index_search_link">请输入股票代码／名称</a>
			<a href="<?php echo url('index/User/noticeLists'); ?>" class="rt message_link <?php if($userNotice > 0): ?>has_msg<?php endif; ?>"></a>
		</div>
		<!--轮播图-->
		 <!-- <img src="img/banner.png" width="100%"> -->
	    <div class="banner_img">
	    	<!--<img src="/public/static/home/img/moblie/banner.png"/>-->
	    	<div id="slider" class="mui-slider">
	    	  <div class="mui-slider-group mui-slider-loop">
	    	    <!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
	    	    <div class="mui-slider-item">
	    	      <a href="#">
	    	        <img src="/resource/home/img/1.jpg">
	    	      </a>
	    	    </div>
	    	    <!-- 第一张 -->
	    	    <div class="mui-slider-item">
	    	      <a href="#">
	    	        <img src="/resource/home/img/2.jpg">
	    	      </a>
	    	    </div>
	    	    <!-- 第二张 -->
	    	    <div class="mui-slider-item">
	    	      <a href="#">
	    	        <img src="/resource/home/img/1.jpg">
	    	      </a>
	    	    </div>
	    	    <!-- 第三张 -->
	    	    <!-- <div class="mui-slider-item">
	    	      <a href="#">
	    	        <img src="/resource/home/img/2.png">
	    	      </a>
	    	    </div> -->
	    	    <!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
	    	    <div class="mui-slider-item mui-slider-item-duplicate">
	    	      <a href="#">
	    	        <img src="/resource/home/img/2.jpg">
	    	      </a>
	    	    </div>
	    	  </div>
	    	  
	    	  <div class="mui-slider-indicator">
	    	    <div class="mui-indicator mui-active"></div>
	    	    <!-- <div class="mui-indicator"></div> -->
	    	    <div class="mui-indicator"></div>
	    	  </div>
	    	</div>
	    </div>
		<div class="fudong">
			<div class="laba"></div>
			<div style="width:100%;height: 25px;">
				<marquee style="height: 100%;font-family: cursive;line-height: 25px" align="middle"><?php echo $notice['val']; ?></marquee>
			</div> 
		</div>
	    <ul class="gift_box mui-row">
			<li class="leiji_item mui-col-xs-4 mui-col-sm-4"><a href="/strategy/index.html" style="display: block;">
				<img src="/resource/home/img/publish.png">
				<p>发布策略</p>
			</a></li>
			<li class="leiji_item mui-col-xs-4 mui-col-sm-4"><a href="/user/recharge.html" style="display: block;">
				<img src="/resource/home/img/recharge.png">
				<p>充值中心</p>
			</a></li>
			<!-- <li class="leiji_item mui-col-xs-3 mui-col-sm-3"><a href="/manager/home.html" style="display: block;">
				<img src="/resource/home/img/guide.png">
				<p>分享推广</p>
			</a></li> -->
			<li class="leiji_item mui-col-xs-4 mui-col-sm-4"><a href="/manager/guidance.html" style="display: block;">
				<img src="/resource/home/img/model.png">
				<p>新手指引</p>
			</a></li>
		</ul>
		<!--A股指数-->
		<section class="Ashare">
			<div class="Ashare_top">
				<div class="slid-container swiper-container swiper-container-horizontal swiper-container-free-mode">
		            <ul class="swiper-wrapper">
		            	<!-- <li class="swiper-slide mui-text-center">
		                    <p class="Ashare_t">上证成指</p>
							<p class="Ashare_num color color_red">11342.85</p>
							<div class="per mui-clearfix">
								<span class="mui-pull-left color color_red">1.5</span>
								<span class="mui-pull-right color color_red">0.01%</span>
							</div>
		                </li>
		                <li class="swiper-slide mui-text-center">
		                    <p class="Ashare_t">深证成指</p>
							<p class="Ashare_num color color_red">1801.42</p>
							<div class="per mui-clearfix">
								<span class="mui-pull-left color color_red">6.81</span>
								<span class="mui-pull-right color color_red">0.38%</span>
							</div>
		                </li>
		                <li class="swiper-slide mui-text-center">
		                	<a href="">
		                		<p class="Ashare_t">创业板指</p>
								<p class="Ashare_num color color_red">1801.42</p>
								<div class="per mui-clearfix">
									<span class="mui-pull-left color color_red">6.81</span>
									<span class="mui-pull-right color color_red">0.38%</span>
								</div>
		                	</a>
						</li> -->
						<?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $k = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($k % 2 );++$k;?>
							<li data-code="<?php echo $key; ?>" name="<?php echo $item['px_change']; ?>" class="share_item swiper-slide mui-text-center share_item_<?php echo $key; ?>">
								<?php if($k > 5): ?>
								<a href="<?php echo url('index/Stock/info',['code' => $key]); ?>">
								<?php endif; ?>	
									<p class="Ashare_t"><?php echo $item['prod_name']; ?></p>
									<?php if($item['px_change']  >= 0): ?>
										<p class="Ashare_num  color color_red"><?php echo number_format($item['last_px'],2); ?></p>
									<?php else: ?>
										<p class="Ashare_num  color color_green"><?php echo number_format($item['last_px'],2); ?></p>
									<?php endif; ?>
									<div class="per mui-clearfix">
									<?php if($item['px_change'] >= 0): ?>
										<span class="mui-pull-left color color_red"><?php echo number_format($item['px_change'],2); ?></span>
										<span class="mui-pull-right color color_red"><?php echo number_format($item['px_change_rate'],2); ?>%</span>
									<?php else: ?>
										<span class="mui-pull-left color color_green"><?php echo number_format($item['px_change'],2); ?></span>
										<span class="mui-pull-right color color_green"><?php echo number_format($item['px_change_rate'],2); ?>%</span>
									<?php endif; ?>
									</div>
								<?php if($k > 5): ?>
								</a>
								<?php endif; ?>
							</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						<!-- <?php if(is_array($stocks) || $stocks instanceof \think\Collection || $stocks instanceof \think\Paginator): $i = 0; $__LIST__ = $stocks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
		                <li data-code="<?php echo $item['quotation']['code']; ?>"  class="share_item swiper-slide mui-text-center share_item_<?php echo $item['quotation']['code']; ?>">
		                	<a href="<?php echo url('index/Stock/info',['code' => $item['quotation']['code']]); ?>">
			                    <p class="Ashare_t"><?php echo $item['quotation']['prod_name']; ?></p>
								<p class="Ashare_num  color color_red"><?php echo number_format($item['quotation']['last_px'],2); ?></p>

								<div class="per mui-clearfix">
								<?php if($item['quotation']['px_change'] >= 0): ?>
									<span class="mui-pull-left color color_red"><?php echo number_format($item['quotation']['px_change'],2); ?></span>
									<span class="mui-pull-right color color_red"><?php echo number_format($item['quotation']['px_change_rate'],2); ?>%</span>
								<?php else: ?>
									<span class="mui-pull-left color color_green"><?php echo number_format($item['quotation']['px_change'],2); ?></span>
									<span class="mui-pull-right color color_green"><?php echo number_format($item['quotation']['px_change_rate'],2); ?>%</span>
								<?php endif; ?>
								</div>
							</a>
		                </li>
						<?php endforeach; endif; else: echo "" ;endif; ?> -->
		                <li class="swiper-slide mui-text-center">
		                    <a class="add_item" href="<?php echo url('index/User/optional'); ?>">
		                    	
		                    </a>
		                </li>
		            </ul>
		        </div>
			</div>
		</section>
		<!--<section>
			<a href="" class="qiquan_link">个股期权</a>
		</section>-->
		<section>
			<div class="clear_fl rink_tab_con">
				<ul class="lf rink_tab_list clear_fl">
					<li  class="item active celue">
						<p>资讯中心</p>
						<div class="rink_tab_content daren">
							<iframe frameborder="0" width="100%" height="2000" scrolling="no" src="https://www.jin10.com/example/jin10.com.html?fontSize=14px&theme=white"></iframe>
							<!-- <iframe frameborder="0" width="100%" height="3000" scrolling="no" src="https://rili-d.jin10.com/open.php?fontSize=14px&theme=primary"></iframe> -->
						</div>
						<!-- <ul class="rink_tab_content great_strategy daren">
							<?php if(is_array($bestStrategyList) || $bestStrategyList instanceof \think\Collection || $bestStrategyList instanceof \think\Paginator): $i = 0; $__LIST__ = $bestStrategyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<li>
								<div class="clear_fl">
									<a href="<?php echo url('index/Stock/info',['code' => $vo['code']]); ?>" class="lf">
										<span><?php echo $vo['name']; ?></span>
										<span class="strategy__code___VWYep"><?php echo $vo['code']; ?></span>
									</a>
									<div class="rt">
										<img class="lf user_pic" src="<?php echo (isset($vo['has_one_user']['face'] ) && ($vo['has_one_user']['face']  !== '')?$vo['has_one_user']['face'] :'/resource/home/img/default-user-img.png'); ?>">
										<p class="lf user_name"><?php echo (isset($vo['has_one_user']['nickname'] ) && ($vo['has_one_user']['nickname']  !== '')?$vo['has_one_user']['nickname'] :$vo['has_one_user']['username']); ?> <img src="/resource/home/img/niuren.png"></p>
									</div>
								</div>
								<div class="flex_nowrap strategy_info">
									<div>
										<h1><?php echo (isset($vo['strategy_yield'] ) && ($vo['strategy_yield']  !== '')?$vo['strategy_yield'] :'0'); ?>%</h1>
										<p>收益率</p>
									</div>
									<div>
										<p>
											<span class="key">买价</span>
											<span class="value"><?php echo (isset($vo['price'] ) && ($vo['price']  !== '')?$vo['price'] :'0.00'); ?></span>
										</p>
										<p>
											<span class="key">盈亏</span>
											<span class="value red"><?php echo (isset($vo['profit'] ) && ($vo['profit']  !== '')?$vo['profit'] :'0.00'); ?></span>
										</p>
									</div>
									<div>
										<p>
											<span class="key">卖价</span>
											<span class="value"><?php echo (isset($vo['sell_price'] ) && ($vo['sell_price']  !== '')?$vo['sell_price'] :'0.00'); ?></span>
										</p>
										<p>
											<span class="key">数量</span>
											<span class="value"><?php echo (isset($vo['sell_hand'] ) && ($vo['sell_hand']  !== '')?$vo['sell_hand'] :'0'); ?></span>
										</p>
									</div>
								</div>
								<div class="follow_btn_con">
									<a class="follow_btn" href="<?php echo url('index/Stock/stockBuy', ['follow_id' => $vo['order_id'], 'code' => $vo['code']]); ?>">跟买</a>
								</div>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>

							</li>
						</ul> -->
					</li>
					<li class="item daren">
						<p>盈利排行</p>
						<ul class="rink_tab_content daren">
							<?php if(is_array($bestUserList) || $bestUserList instanceof \think\Collection || $bestUserList instanceof \think\Paginator): $i = 0; $__LIST__ = $bestUserList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<li>
								<div class="clear_fl">
									<a href="<?php echo url('index/Cattle/niurenDetail', ['uid' => $vo['user_id']]); ?>" class="lf">
									<img class="lf user_pic" src="<?php echo (isset($vo['face'] ) && ($vo['face']  !== '')?$vo['face'] :'/resource/home/img/default-user-img.png'); ?>">
									<p class="lf user_name"><?php echo (isset($vo['nickname'] ) && ($vo['nickname']  !== '')?$vo['nickname'] :$vo['username']); ?> <img src="/resource/home/img/niuren.png"></p>
									</a>
									<a href="javascript:void(0)" onclick="follow('<?php echo $vo['user_id']; ?>', this);" class="rt guanzhu_btn <?php if(in_array(($vo['user_id']), is_array($followIds)?$followIds:explode(',',$followIds))): ?>active<?php endif; ?>"></a>
								</div>
								<div class="clear_fl daren_info">
									<p class="lf celueshu">策略数: <span><?php echo (isset($vo['pulish_strategy'] ) && ($vo['pulish_strategy']  !== '')?$vo['pulish_strategy'] :0); ?></span></p>
									<div class="rt celue_right">
										<p class="lf celueshu">胜算率 <span><?php echo (isset($vo['strategy_win'] ) && ($vo['strategy_win']  !== '')?$vo['strategy_win'] :0); ?>%</span></p>
										<p class="lf celueshu">收益率 <span><?php echo (isset($vo['strategy_yield'] ) && ($vo['strategy_yield']  !== '')?$vo['strategy_yield'] :0); ?>%</span></p>
									</div>
								</div>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>

						</ul>
					</li>
					
				</ul>
				<!-- <a href="<?php echo url('index/Cattle/moreMaster'); ?>" class="rt more_dongtai">更多排行</a> -->
			</div>
		</section>
	</div>

    
	<nav class="ml_tab mui-bar mui-bar-tab">
		<a class="mui-tab-item mui-active" href="javascript:void(0);">
			<span class="mui-icon mui-icon-home"></span>
			<span class="mui-tab-label">首页</span>
		</a>
		<a class="mui-tab-item" href="<?php echo url('index/User/optional'); ?>">
			<span class="mui-icon mui-icon-zixuan"></span>
			<span class="mui-tab-label">自选</span>
		</a>
		<a class="mui-tab-item" href="<?php echo url('index/Strategy/index'); ?>">
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
<script src="/resource/home/js/mui.min.js"></script>
<script type="text/javascript" src="/resource/home/js/common.js"></script>
<script type="text/javascript" src="/resource/home/js/config.js"></script>

	<script type="text/javascript">
		$(".qiquan_link").click(function(e){
			e.preventDefault();
			$alert( "敬请期待！" );
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


		var storage = window.localStorage;
		if( storage.isVisited ){
			$(".risk_mask").remove();
		}else{
			$(".risk_mask").show();
			storage.isVisited = true;
		}


		mui.init({
			swipeBack: true //启用右滑关闭功能
		});

		var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            slidesPerView: 3.3,
            paginationClickable: true,
            spaceBetween: 0,
            freeMode: true,
            resistanceRatio: 0
        });

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


        mui('body').on('tap', '.more_dongtai', function() {
            var data_href = this.getAttribute("data-href");
            var href = this.getAttribute("href");
            var url=data_href;
            if(!url||url==''){
                url=href;
            }
            window.location.href = url;
        });

        mui('body').on('tap', '.Ashare a', function() {
            var data_href = this.getAttribute("data-href");
            var href = this.getAttribute("href");
            var url=data_href;
            if(!url||url==''){
                url=href;
            }
            window.location.href = url;
        });

        mui('body').on('tap', '.gift_box a', function() {
            var data_href = this.getAttribute("data-href");
            var href = this.getAttribute("href");
            var url=data_href;
            if(!url||url==''){
                url=href;
            }
            window.location.href = url;
        });


        mui('body').on('tap', '.search_container a', function() {
            var data_href = this.getAttribute("data-href");
            var href = this.getAttribute("href");
            var url=data_href;
            if(!url||url==''){
                url=href;
            }
            window.location.href = url;
        });



        var slider = mui("#slider");
		slider.slider({
			interval: 3000
		});

		//改变A股大盘数据的颜色
		$("#A-ul>li").each(function(i, o){
			var p = parseFloat($(o).find(".mui-pull-left.color").html());
			if(p > 0){
				$(o).find(".color").addClass("color_red");
			}else if(p < 0){
				$(o).find(".color").addClass("color_green");
			}
		});

		$(".rink_tab_list").on("tap" , "li.item" , function(){
			$(this).addClass("active").siblings(".active").removeClass("active");
			if( $(this).hasClass("daren") ){
				$(".more_dongtai").html("更多达人").attr("href" , "<?php echo url('index/Cattle/moreMaster'); ?>");
			}else if( $(this).hasClass("celue") ){
				$(".more_dongtai").html("更多策略").attr("href" , "<?php echo url('index/Cattle/moreStrategy'); ?>");;
			}

		});
		$(".rink_tab_list ul").click(function(e){
			e.stopPropagation();
		});


		window.onscroll = function(){
		     var t = document.documentElement.scrollTop || document.body.scrollTop;  //获取距离页面顶部的距离
		     if( t >= 120 ) { //当距离顶部超过300px时
		        $(".search_container").addClass("fixed");
		     } else { //如果距离顶部小于300px
		        // alert(321);
		        $(".search_container").removeClass("fixed");
		     }
		}

	</script>


	<script type="text/javascript">
		$('.risk_mask').on('touchmove', function(event) {
		    event.preventDefault();
		});

		$(".risk_content").on("touchmove" , function(e){
			e.stopPropagation();
		});

		$(".read_risk_btn").on("tap" , function(){
			$(".risk_mask").hide();
		});


		// $alert("hello");
	</script>
<script type="text/javascript" src="/resource/home/lib/layer/layer.js"></script>
	<script type="text/javascript">
		function follow(id, obj)
		{
		    var content = '是否关注牛人？';
		    var msg = '已关注';
		    var type = 1;//关注


		    if($(obj).hasClass('active')){
                content = '是否取消关注牛人？';
                msg = '已取消关注';
                type = 2;//取关
			}
//            layer.open({
//				title : '',
//                content: content
//                ,btn: ['是', '否']
//                ,yes: function(index, layero){
                    var _url = '<?php echo url("index/Cattle/follow"); ?>',
                        _oData = {user_id : id, type:type};
                    $ajaxCustom(_url, _oData, function(res){
                        if(res.state){
                            if(type == 2){
                                $(obj).removeClass('active');
							}
                            if(type == 1){
                                $(obj).addClass('active');
                            }


                            $alert(msg);
//                            setTimeout(function(){
//                                window.location.reload();
//                            }, 1000);
                        }else{
                            $alert(res.info);
                        }
                    });
//                }

//                ,cancel: function(){
//                    //右上角关闭回调
//
//                    //return false 开启该代码可禁止点击该按钮关闭
//                }
//            });

		}
		//定时刷新
		setInterval(function(){
			if( !isTradingTime() ){
				return false;
			}
			// loadZhiPrice();

        	var code = new Array();
        	if( $(".share_item").length <= 0 ){
        		return false;
        	}
        	$(".share_item").each(function(){
        		code.push( $(this).data("code") );
        	});

        	code = code.join(",");
            var _url = "<?php echo url('index/Stock/simple'); ?>",
				_oData = {code: code};
				$ajaxCustom(_url, _oData, function(res){
					if(res.state){
                    for( var key in res.data ){
                        var rate = parseFloat(res.data[key].px_change_rate);
                        var className = "";
                        if(rate >= 0){
                            className = "color_red"
                        }else{
                            className = "color_green"
                        }
                        var code = key;
                        var context = $(".share_item_" + code);
                        context.find(".Ashare_num").html(res.data[key].last_px).removeClass("color_red color_green").addClass(className);
                        context.find(".per .mui-pull-left").html(res.data[key].px_change).removeClass("color_red color_green").addClass(className);

                        context.find(".per .mui-pull-right").html(res.data[key].px_change_rate + "%").removeClass("color_red color_green").addClass(className);
                    }
                }else{
                    // $alert(res.info);
                }
            });
		},2000);

		function loadZhiPrice(){
            var _url = "/plate.json?" + Math.random(),
                _oData = {};
            $.get(_url,function(data,status){
//            	var _data = JSON.parse( data );
            	var _data = data;
            	var html = "";
				for( var key in _data ){
					var className =  "";
					if( _data[key].px_change >= 0 ){
						className = "color_red";
					}else{
						className = "color_green";
					}
					html += '<li class="swiper-slide mui-text-center">\
		                	<a href="">\
		                		<p class="Ashare_t">'+ _data[key].plate_name +'</p>\
								<p class="Ashare_num color ' + className + '">'+ (_data[key].last_px * 10 / 10).toFixed(2) +'</p>\
								<div class="per mui-clearfix">\
									<span class="mui-pull-left color ' + className + '">'+ _data[key].px_change +'</span>\
									<span class="mui-pull-right color ' + className + '">'+ _data[key].px_change_rate +'%</span>\
								</div>\
		                	</a>\
		                </li>';
				}

				$(".Ashare_top li:nth-child(1)").remove();
				$(".Ashare_top li:nth-child(1)").remove();
				$(".Ashare_top li:nth-child(1)").remove();
				var $dom = $( html );
				$(".Ashare_top ul").prepend( $dom );

			});
		}

	</script>
