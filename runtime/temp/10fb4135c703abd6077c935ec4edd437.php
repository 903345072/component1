<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/index/view/user/index.html";i:1573193074;s:84:"/www/wwwroot/125.maoerle.cn/www_fuda/application/index/view/layouts/layout_user.html";i:1568109530;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
我的
</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link href="/resource/home/css/mui.min.css" rel="stylesheet">
    <link href="/resource/home/css/person.css" rel="stylesheet">
    


</head>
<body style="height: 100%;display: inline-block;width: 100%;" class="mui-ios mui-ios-10 mui-ios-10-3">
    
    <div class="bg" style="min-height: 100%;">
        <div class="person_content mui-content" style="min-height: 100%;">
            <div class="per_top mui-text-center">
                <a href="<?php echo url('index/User/setting'); ?>" class="setting_btn">
                    <img src="/resource/home/img/setting.png">
                </a>
                <form name="user_head" id="user_head">
                    <div class="img_download">
                        <img src="<?php echo (isset($user['face']) && ($user['face'] !== '')?$user['face']:'/resource/home/img/default-user-img.png'); ?>" id="headImg">
                    </div>
                </form>
                <p class="username"><?php echo (isset($user['nickname']) && ($user['nickname'] !== '')?$user['nickname']:$user['username']); ?></p>
                <p>账户余额(元):<span id="balance"><?php echo number_format($user['account'],2); ?></span></p>
                <div class="top_btn">
                    <a href="<?php echo url('index/User/recharge'); ?>" type="button" class="mui-btn  mui-btn-block">充值</a>
                    <a href="<?php echo url('index/User/withdraw'); ?>" type="button" class="mui-btn  mui-btn-block">提现</a>
                </div>
            </div>
            <ul style="margin-bottom: 50px;" class="mui-table-view">
                <!-- <li class="mui-table-view-cell">
                    <a href="" class="mui-navigate-right">
                        我的钱包
                    </a>
                </li> -->
                <!-- <li class="mui-table-view-cell">
                    <a href="<?php echo url('index/Manager/manager'); ?>" class="mui-navigate-right">
                        我的推广
                        <span class="rt">推广：<?php echo $user['children']; ?>人</span>
                        <span class="rt">推广：<?php echo $user['children']; ?>人 / 返佣：<?php echo $user['commission']; ?>元</span>
                    </a>
                </li> -->
                <!-- <li class="mui-table-view-cell mar_top8">
                    <a href="<?php echo url('index/Cattle/index'); ?>" class="mui-navigate-right">
                        大神收益
                        <span class="rt">跟单：<?php echo $user['follow']; ?>笔 / 返佣：<?php echo $user['return_income']; ?>元</span>
                    </a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="<?php echo url('index/Attention/index'); ?>" class="mui-navigate-right">
                        我关注的大神
                    </a>
                </li> -->
                <li class="mui-table-view-cell mar_top8">
                    <a href="<?php echo url('index/User/record'); ?>" class="mui-navigate-right">
                        资金明细
                    </a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="<?php echo url('index/Order/position'); ?>" class="mui-navigate-right">
                        我的持仓
                    </a>
                </li>

                <li class="mui-table-view-cell mar_top8">
                    <a href="<?php echo url('index/User/cards'); ?>" class="mui-navigate-right">
                        我的银行卡
                    </a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="<?php echo url('index/Order/history'); ?>" class="mui-navigate-right">
                         历史交易
                    </a>
                </li>
                <li class="mui-table-view-cell mar_top8">
                    <a href="<?php echo url('index/User/idea'); ?>" class="mui-navigate-right">
                        意见反馈
                    </a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="<?php echo url('index/User/protocol'); ?>" class="mui-navigate-right">
                        关于协议
                    </a>
                </li>
                <li class="mui-table-view-cell">
                    <a href="javascript:void(0);" class="mui-navigate-right">
                        客服
                    </a>
                </li>
                <!-- <li class="mui-table-view-cell">
                    <a href="tel:<?php echo cf('service_telephone', ''); ?>" class="mui-navigate-right">
                        客服QQ：762345962
                    </a>
                </li> -->
                <li class="mui-table-view-cell mui-text-center li_last">
                    <a href="<?php echo url('index/Home/logout'); ?>" style="color: #F5191D;" id="loginbtn">
                         退出登录
                    </a>
                </li>
            </ul>
        </div>
    </div>

    
    <nav class="ml_tab mui-bar mui-bar-tab">
        <a class="mui-tab-item" href="<?php echo url('index/Index/index'); ?>">
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
        <a class="mui-tab-item  mui-active" href="javascript:void(0);">
            <span class="mui-icon mui-icon-my"></span>
            <span class="mui-tab-label">我的</span>
        </a>
    </nav>

</body>
</html>
<script src="/resource/home/js/jquery-2.2.0.min.js"></script>
<script src="/resource/home/js/mui.min.js"></script>

<!---js---->
<script src="/resource/home/js/jquery.ajaxfileupload.js"></script>
<script type="text/javascript">
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
    /**
     * 上传头像
     */
    $('#img_upload').AjaxFileUpload({
        //处理文件上传操作的服务器端地址
        action: '/index/index/doImgUpload',
        onComplete: function(filename, resp) { //服务器响应成功时的处理函数
            if(resp.code == '0') {
                $('#headImg').attr('src', resp.data);
                var params = {};
                params['headImg'] = resp.data;
                $.post("/index/ucenter/savePeopleImg", params, function(data) {
                    if(data.code == '0') {
                        mui.toast("修改成功");
                    } else {
                        mui.alert(data.msg);
                    }
                }, 'json');
            } else {
                mui.alert(resp.msg );
            }
        }
    });

    //			console.log(window.innerHeight + window.scrollY - $("nav").outerHeight())
    //			$('nav').css({'position': 'absolute','top':top })
    //			function bodyHeight(height){
    //					$('body').css({'height':height});
    //					$('body').css({'height':'600px'});
    //					$('#aaa').css({'color':'pink'})
    //					var top=window.innerHeight + window.scrollY - $("nav").outerHeight()
    //					$('nav').css({'position': 'absolute','top':top })
    //			}
</script>
