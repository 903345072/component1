<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/web/view/home/login.html";i:1568109530;s:83:"/www/wwwroot/125.maoerle.cn/www_fuda/application/web/view/layouts/layout_index.html";i:1573543671;}*/ ?>
<!DOCTYPE html>
<head>
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>
用户登录
</title>
        <meta name="keywords" content=" ">
        <meta name="description" content="">
        <link rel="stylesheet" type="text/css" href="/resource/web/css/common.css?t=12342">
        <link rel="stylesheet" type="text/css" href="/resource/web/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/resource/web/css/index.css">
        <link rel="stylesheet" type="text/css" href="/resource/web/css/buy.css">
        <link rel="stylesheet" type="text/css" href="/resource/web/layui/css/layui.css">

        
<link rel="stylesheet" type="text/css" href="/resource/web/css/reg.css">

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


<!--登录区-->
<div class="br-content login_reg_cont">
    <section class="section section-form" id="page_auth_login">
        <div class="container">
            <div class="section-border group">
                <h2 style="padding:0;" class="login_h2">账户登录</h2>
                <div class="form">
                    <div class="field-wrapper">
                        <input type="text" class="text" placeholder="请输入手机号码" id="phone" name="phone" data-error-msg="请输入用户名">
                        <label class="name-err1 hide">用户名不能为空</label>
                    </div>
                    <div class="field-wrapper">
                        <input type="password" class="text" placeholder="请输入6~12位密码" id="password" name="password">
                        <label class="psw-err1 hide">密码不能为空</label>
                    </div>
                    <div class="link-wrapper group login_forgot">
                        <!-- <a href="http://www.fcml888.com/forgot_pass.html">忘记密码</a> -->
                    </div>

                    <div class="btn-wrapper login_bw">
                        <a class="btn btn-pri" id="login-btn">登录</a>
                    </div>

                </div>
                <div class="login_reg quick-link-wrapper group">
                    <p><a href="register.html">马上注册</a></p>
                </div>
            </div>
        </div>
    </section>
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
                   </p>
                <div class="bot_r_img tu">
                    <span class="tu1"><img src=""><span>客服QQ</span></span>
                    <span class="tu2"><img src=""><span>下载APP</span></span>
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

<script type="text/javascript">
    // 登录逻辑
    var storage = window.localStorage;
    var token = storage.token;
    // 如果登录直接返回到上一个页面
    if(token){
        window.history.go(-1);
    }
    // 提交登录
    $("#login-btn").click(function(e){
        e.preventDefault();
        var mobile = $("#phone").val();
        var password = $("#password").val();
        // var institution = $("#institution").val();

        // 验证输入
        if(mobile == "" || password == ""){
            layer.alert("请输入手机号和密码");
            return false;
        }

        if( !(/^1[34578]\d{9}$/.test(mobile)) ){
            layer.alert("输入手机号码有误！");
            return false;
        }

        // if(institution == ""){
        //     layer.alert("请选择机构");
        //     return false;
        // }

        var url = '<?php echo url("web/Home/login"); ?>';
        var data = {
            username: mobile,
            password: password
        };
        $ajaxCustom(url, data, function(res){
            console.log(res.data);
            if(res.state){ // 登录成功

                layer.alert("登录成功");
                setTimeout(function(){
                    if(res.data.url){
                        window.location.href = res.data.url;
                    }else{
                        window.location.reload();
                    }
                }, 500);
            }else{
                layer.alert(res.info);
            }
        })

    });
</script>
