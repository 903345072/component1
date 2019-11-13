<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:91:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/index/view/manager/guidance.html";i:1568109530;s:87:"/www/wwwroot/125.maoerle.cn/www_fuda/application/index/view/layouts/layout_manager.html";i:1568109530;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
玩法说明
</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link href="/resource/home/css/mui.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/resource/home/css/manager.css">
    
<link rel="stylesheet" type="text/css" href="/resource/home/css/person.css">
<style type="text/css">
    body{
        background: #f5f5f5;
    }
    .erweima_mask{
        position: fixed;
        width: 100%;
        height: 100vh;
        background: rgba(0,0,0,.5);
        left: 0;
        top: 0;
        padding: 200px 25%;
        display: none;
        z-index: 99;
    }
    .erweima_mask img{
        width: 100%;
    }
    .header_con{
        position: fixed;
        width: 100%;
        z-index: 99;
    }
    #main{
        padding-top: 50px;
    }
</style>

</head>

<body>


	<div class="manager_con">
		<header class="header_con">
		    <a href="<?php echo url('index/index'); ?>" class="lf">
		        <img src="/resource/home/img/call_back.png">
		    </a>
		    <p>新手说明</p>
		</header>
        <div id="main">
            <img src="/resource/home/img/xs01.png" alt="" srcset="">
            <img src="/resource/home/img/xs02.png" alt="" srcset="">
            <img src="/resource/home/img/xs03.png" alt="" srcset="">
            <img src="/resource/home/img/xs05.png" alt="" srcset="">
            <img src="/resource/home/img/xs06.png" alt="" srcset="">
            <img src="/resource/home/img/xs07.png" alt="" srcset="">
            <img src="/resource/home/img/xs08.png" alt="" srcset="">
            <img src="/resource/home/img/xs09.png" alt="" srcset="">
        </div>
	</div>



</body>
</html>
<script src="/resource/home/js/jquery-2.2.0.min.js"></script>
<script src="/resource/home/js/mui.min.js"></script>
<script type="text/javascript" src="/resource/home/js/common.js"></script>

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" src="/resource/home/lib/layer/layer.js"></script>
<script type="text/javascript">
    $(".share_erweima").click(function(){
        $(".erweima_mask").show();
    });
    $(".erweima_mask").click(function(){
        $(this).hide();
    });
    $(".erweima_mask img").click(function(e){
        e.stopPropagation();
    });
</script>
<script>
    function remove_out()
    {
        //询问框
        layer.confirm('是否确认转出？', {
            title:'提示',
            btn: ['转出','取消'] //按钮
        }, function(){
            var _url = '<?php echo url("index/manager/removeCapital"); ?>',
                _oData = {};
            $ajaxCustom(_url, _oData, function(res){
                if(res.state){
                    layer.msg(res.info, {icon: 1});
                    setTimeout(window.location.reload(), 2000);
                }else{
//                    $alert(res.info);
                    layer.msg(res.info);
                }
            });


        }, function(){
         //取消了
        });
    }
</script>
