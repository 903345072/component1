<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:88:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/index/view/user/optional.html";i:1568109530;s:84:"/www/wwwroot/125.maoerle.cn/www_fuda/application/index/view/layouts/layout_user.html";i:1568109530;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
自选
</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link href="/resource/home/css/mui.min.css" rel="stylesheet">
    <link href="/resource/home/css/person.css" rel="stylesheet">
    
<style type="text/css">
    body{
        background: #f5f5f5 !important;
    }
    .zixuan_list{
        margin-bottom: 110px;
    }
    .delete_panel{
        display: none;
    }
    * {
        -webkit-user-select: auto!important;
    }
    .search_con input {
        width: 100%;
        height: 46px;
        line-height: 46px;
        padding-left: 40px;
        background-size: 20px 20px;
        border: none;
        border-radius: 3px;
        font-size: 16px;
        color: #333;
        padding-right: 30px;
    }
    body{
        padding-bottom: 50px;
    }
    .edit_btn {
        background-size: 100%;
        top: 20px;
        right: 18px;
    }
</style>

</head>

<body class="  mui-ios mui-ios-10 mui-ios-10-3">

    
    <header class="zixuan_top">
        自选
    </header>
    <div class="search_con">
        <input styel="-webkit-user-select:auto" id="searchInput" placeholder="请输入股票代码/名称">
        <span class="edit_btn"></span>
    </div>
    <ul class="zixuan_list">
        <li class="list_header flex_nowrap">
            <div class="select_btn" style="width:15%">
            </div>
            <span style="width:40%;padding-left: 18px">名称代码</span>
            <span style="width:20%">现价</span>
            <span style="width:20%">涨跌幅</span>
            <span style="width:20%"></span>
        </li>
        <?php if(is_array($stocks) || $stocks instanceof \think\Collection || $stocks instanceof \think\Paginator): $i = 0; $__LIST__ = $stocks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;if(isset($item['quotation'])): ?>
        <li class="list_header flex_nowrap" data-code="<?php echo $item['code']; ?>">
            <div style="width:15%" class="mui-input-row mui-checkbox mui-left select_btn">
                <label></label>
                <input name="checkbox" value="<?php echo $item['id']; ?>" type="checkbox">
            </div>
            <a style="width:80%" class="flex_nowrap" href="<?php echo url('index/Stock/info', ['code' => $item['code']]); ?>">
                <span class="zi_name" style="width:80%;padding-left: 18px;"> <span><?php echo $item['quotation']['prod_name']; ?></span><span><?php echo $item['quotation']['code']; ?></span></span>
                <?php if($item['quotation']['px_change'] >= 0): ?>
                <span style="width:40%" class="red"><?php echo $item['quotation']['last_px']; ?></span>
                <span style="width:40%" class="red"><?php echo $item['quotation']['px_change_rate']; ?>%</span>
                <?php else: ?>
                <span style="width:40%" class="green"><?php echo $item['quotation']['last_px']; ?></span>
                <span style="width:40%" class="green"><?php echo $item['quotation']['px_change_rate']; ?>%</span>
                <?php endif; ?>
            </a>
            <span style="width:20%">
                <a href="<?php echo url('index/Stock/stockBuy', ['code' => $item['code']]); ?>" class="mui-btn mui-btn-success mui-btn-outlined">创建策略</a>
            </span>
        </li>
        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <div class="delete_panel clear_fl">
        <!-- <div id="allChecked" style="display: none;float: left;height: 32px;" class="mui-input-row mui-checkbox mui-left select_btn">
            <label></label>
            <input name="checkbox" value="Item 1" type="checkbox">
        </div> -->
        <button class="rt zixun_delete_btn">删除</button>
    </div>

    
    <nav class="ml_tab mui-bar mui-bar-tab">
        <a class="mui-tab-item" href="<?php echo url('index/Index/index'); ?>">
            <span class="mui-icon mui-icon-home"></span>
            <span class="mui-tab-label">首页</span>
        </a>
        <a class="mui-tab-item mui-active" href="javascript:void(0);">
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
<script src="/resource/home/js/jquery-2.2.0.min.js"></script>
<script src="/resource/home/js/mui.min.js"></script>

<script type="text/javascript" src="/static/js/stock.js"></script>
<script type="text/javascript" src="/resource/home/js/common.js"></script>
<script type="text/javascript">
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



    var refreshTimer = null;
	$(".edit_btn").on("tap" , function(){
        if( $("#searchInput").val() != "" || $(".zixuan_list li").length == 1 ){
            return false;
        }
		$(".select_btn").toggle();
        $(".delete_panel").toggle();
        $(this).toggleClass("active");

        if( $(this).hasClass("active") ){
            if( refreshTimer ){
                clearInterval( refreshTimer );
                refreshTimer = null;
            }
        }else{
            refreshTimer =setInterval(refreshPrice,2000);
        }
	});

	mui.init({
		swipeBack: true //启用右滑关闭功能
	})

	//选项卡
	 mui('body').on('tap', 'a', function() {
        var data_href = this.getAttribute("data-href");
        var href = this.getAttribute("href");
        var url=data_href;
        if(!url||url==''){
            url=href;
        }
        window.location.href = url;
     });

    $("#searchInput").keyup(function(){
        var val = $(this).val();
        displayItems(val);
    });

    var listCon = $(".zixuan_list").html();
    function displayItems(items) {
        var code = new Array();
        html='<li class="list_header flex_nowrap">\
            <div class="select_btn" style="width: 15%; display: none;">\
            </div>\
            <span style="width:40%;padding-left: 18px">名称代码</span>\
            <span style="width:20%">现价</span>\
            <span style="width:20%">涨跌幅</span>\
            <span style="width:20%"></span>\
        </li>';
        if (items==''){ //搜索结果为空， 置空列表
            html=listCon;
            $(".zixuan_list").html( html );
            refreshTimer =setInterval(refreshPrice,2000);
        }else{
            if( refreshTimer ){
                clearInterval( refreshTimer );
                refreshTimer = null;
            }
            var j = 0;
            for (var i = 0; i < stocks.length; i++) {
                var reg = new RegExp('^' + items + '.*$', 'im');
                if (reg.test(stocks[i][0]) || reg.test(stocks[i][1]) || reg.test(stocks[i][2]) || reg.test(stocks[i][3])) {
                    if(j < 15){
                        code.push( stocks[i][1] );
                        j++;
                    }else{
                        break;
                    }
                }
            }

            if(code.length == 0){
                var html = '<li class="no_more"></li><li style="text-align:center;font-size:12px;color:#999;background:transparent;border:none;">暂无搜索结果</li>';
                $(".zixuan_list").html( html );
            }

            code = code.join(",");
            var _url = "<?php echo url('index/Stock/simple'); ?>",
                _oData = {code: code};
            $ajaxCustom(_url, _oData, function(res){
			console.log(res);
                if(res.state){ // 登录成功
                    for( var key in res.data ){
                        var rate = parseFloat(res.data[key].px_change_rate);
                        var className = "";
                        if(rate >= 0){
                            className = "red"
                        }else{
                            className = "green"
                        }
                        html += '<li class="list_header flex_nowrap">\
                                    <div style="width: 15%; display: none;" class="mui-input-row mui-checkbox mui-left select_btn">\
                                        <label></label>\
                                        <input name="checkbox" value="Item 1" type="checkbox">\
                                    </div>\
                                        <span class="zi_name" style="width:80%;padding-left: 18px;"> <span>'+ res.data[key].prod_name +'</span><span>' + res.data[key].code + '</span></span>\
                                        <span style="width:40%" class="' + className + '">' + res.data[key].last_px + '</span>\
                                        <span style="width:40%" class="' + className + '">' + res.data[key].px_change_rate + '%</span>\
                                    <span style="width:20%">\
                                        <a href="" class="mui-btn mui-btn-success mui-btn-outlined">创建策略</a>\
                                    </span>\
                                </li>';
                    }
                    $(".zixuan_list").html( html );
                }else{
                    // $alert(res.info);
                }
            });
        }
    }

    //实时更新
    refreshTimer =setInterval(refreshPrice,2000);
    function refreshPrice(){
        if( !isTradingTime() ){
            return false;
        }
        var code = new Array();
        if( $(".zixuan_list li+li").length > 0 ){
            var html='<li class="list_header flex_nowrap">\
                <div class="select_btn" style="width: 15%; display: none;">\
                </div>\
                <span style="width:40%;padding-left: 18px">名称代码</span>\
                <span style="width:20%">现价</span>\
                <span style="width:20%">涨跌幅</span>\
                <span style="width:20%"></span>\
            </li>';
            $(".zixuan_list li+li").each(function(){
                var _code = $(this).find(".zi_name").find("span+span").html();
                code.push( _code );
            });

            code = code.join(",");
            var _url = "<?php echo url('index/Stock/simple'); ?>",
                _oData = {code: code};
            $ajaxCustom(_url, _oData, function(res){
			console.log(res);
                if(res.state){ // 登录成功
                    if( $(".edit_btn").hasClass("active") ){
                        return false;
                    }
                    for( var key in res.data ){
                        var rate = parseFloat(res.data[key].px_change_rate);
                        var className = "";
                        if(rate >= 0){
                            className = "red"
                        }else{
                            className = "green"
                        }
                        html += '<li class="list_header flex_nowrap">\
                                    <div style="width: 15%; display: none;" class="mui-input-row mui-checkbox mui-left select_btn">\
                                        <label></label>\
                                        <input name="checkbox" value="Item 1" type="checkbox">\
                                    </div>\
                                    <a style="width:80%" class="flex_nowrap" href="/stock/home.html?code='+ res.data[key].code +'">\
                                        <span class="zi_name" style="width:80%;padding-left: 18px;"> <span>'+ res.data[key].prod_name +'</span><span>' + res.data[key].code + '</span></span>\
                                        <span style="width:40%" class="' + className + '">' + res.data[key].last_px + '</span>\
                                        <span style="width:40%" class="' + className + '">' + res.data[key].px_change_rate + '%</span>\
                                        \
                                    </a>\
                                    <span style="width:20%">\
                                        <a href="" class="mui-btn mui-btn-success mui-btn-outlined">创建策略</a>\
                                    </span>\
                                </li>';
                    }
                    $(".zixuan_list").html( html );
                }else{
                    // $alert(res.info);
                }
            });
        }
    }

    // 删除自选
    $(".zixun_delete_btn").click(function(){
        if($(".zixuan_list li+li").length > 0){
            var code = new Array();
            $(".zixuan_list li+li").each(function(){
                if( $(this).find("input").is(":checked") ){
                    var _code = $(this).find(".zi_name span+span").html();
                    code.push(_code);
                }
            });
            if(code.length == 0){
                return false;
            }
            var _url = '<?php echo url("index/User/removeOptional"); ?>',
                _oData = {ids: code};
            $ajaxCustom(_url, _oData, function(res){
                if(res.state){ // 登录成功
                    $alert("操作成功！");
                    setTimeout(function () {
                        window.location.reload();
                    }, 500);
                }else{
                    $alert(res.info);
                }
            });
        }
        
    });



    //搜索历史
        $("body").on("click", ".zixuan_list li", function(){
            var code = $(this).find(".zi_name span+span").html();
            var storage = window.localStorage;
            if( storage.searchHistory ){
                var searchHistory = storage.searchHistory;
                searchHistory = searchHistory.split(",");
                var index = searchHistory.indexOf(code);
                if (index > -1) {
                    searchHistory.splice(index, 1);
                }
                if( searchHistory.length >= 10 ){
                    searchHistory.splice(8, searchHistory.length - 9);
                }
                searchHistory.unshift( code );
                searchHistory = searchHistory.join(",");
                storage.searchHistory = searchHistory;
            }else{
                storage.searchHistory = code;
            }
            window.location.href = "/stock/home.html?code=" + code;
        });
</script>
