<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"C:\code\manyingcelue\www_fuda\public/../application/index\view\home\login.html";i:1568109530;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>登录</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<link href="/resource/home/css/mui.min.css" rel="stylesheet">
	<link href="/resource/home/css/person.css" rel="stylesheet">
</head>
<body>
	<header class="has_back_top ">
			登录
			<a href="javascript:history.go(-1)" class="back_icon">
				<img src="/resource/home/img/back_icon.png">
			</a>
		</header>
		<div style="text-align:center;margin-top: 58px;">
			<img style="width:100%" src="/resource/home/img/top_login.png" alt="" srcset="">
		</div>
		<form id="loginForm" action="" method="post" class="my_from">
			<div class="my_form_group has_get1">
				<input name="phone" type="text" placeholder="请输入手机号码" id="phone"/>
			</div>
			<div class="my_form_group has_get">
				<input name="psd" type="password" placeholder="请输入6~12位密码" id="password" />
				<span class="eye cl0se"></span>
			</div>
			<div class="my_form_group">
				<input class="sub_btn" type="button"  value="登录" id="submit" />
			</div>
		</form>
		<p class="forget_psd">
			<a href="forget.html">忘记密码？立刻找回</a>
		</p>

		<a href="<?php echo url('index/Home/register'); ?>" class="register_link">还没有账号？立刻注册</a>

		<!-- 选择会员单位 -->

	<script src="/resource/home/js/jquery.min.js"></script>
	<script src="/resource/home/js/jquery.cookie.js"></script>
	<script src="/resource/home/js/mui.min.js"></script>
	<script type="text/javascript" src="/resource/home/js/common.js"></script>
	<script type="text/javascript" src="/resource/home/js/config.js"></script>

	<script type="text/javascript">
		// if($.cookie('phone')!='' && typeof($.cookie('phone'))!='undefined'){
		// 	$('#phone').val($.cookie('phone'))
		// }else{
		// 	$('#phone').val('')
		// }
		// if($.cookie('password')!='' && typeof($.cookie('password'))!='undefined'){
		// 	$('#password').val($.cookie('password'))
		// }else{
		// 	$('#password').val('')
		// }
		// 事件绑定
		$(".eye").on("tap" , function(){
			if( $(this).hasClass("close") ){
				$(this).removeClass("close").addClass("open");
				$(this).prev("input").attr("type" , "text");
			}else{
				$(this).removeClass("open").addClass("close");
				$(this).prev("input").attr("type" , "password");
			}
		});
		$(".risk_text").on("tap" , "li" , function(){
			var val = $(this).html(),
				_id = $(this).data("id");
			$(".selected_jigou").html(val);
            $("#institution").val( _id );
			$(".risk_mask").hide();
		});

		function isPoneAvailable($poneInput) {
			var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
			if (!myreg.test($poneInput.val())) {
				return false;
			} else {
				return true;
			}
		}

		$(".selected_jigou").on("tap" , function(){
			var phoneNum = $("#phone");
			if( phoneNum.val() == "" ){
				$alert("请输入手机号");
				return false;
			}
			if( !isPoneAvailable(phoneNum) ){
				$alert("请输入正确的手机号");
				return false;
			}
			$(".risk_mask").show();
		});

		$(".institution_list").on("click", "li", function(){
			var _id = $(this).data("id");
			$("#institution").val( _id );
		});
	</script>

	<script type="text/javascript">
		// 登录逻辑
		var storage = window.localStorage;
	    var token = storage.token;
	    // 如果登录直接返回到上一个页面
	    if(token){
	        window.history.go(-1);
	    }

	    // 提交登录
	    $("#submit").click(function(e){
	        e.preventDefault();
	        var mobile = $("#phone").val();
	        var password = $("#password").val();

	        // 验证输入
	        if(mobile == "" || password == ""){
	            $alert("请输入手机号和密码");
	            return false;
	        }
	        if( !(/^1[345789]\d{9}$/.test(mobile)) ){
	            $alert("输入手机号码有误！");
	            return false;
	        }

	      
			// var date = new Date();
			// date.setTime(date.getTime()+60*5*1000);//只能这么写，10表示10秒钟
			// $.cookie('phone', mobile, { expires: 7});
			// $.cookie('password', password, { expires: date});
			
	        //var url = config.api.base + config.api.login;
			var url = '<?php echo url("index/Home/login"); ?>';
            var data = {
                username: mobile,
                password: password
            };
            $ajaxCustom(url, data, function(res){
                if(res.state){ // 登录成功
                    /*
                    $alert("登录成功");
                    var token = res.data.token;
                    var expire = res.data.expire;
                    var storage = window.localStorage;
                    storage.token = token;
                    storage.expire = expire;
                    setTimeout(function(){
                        window.history.go(-1);
                    },1000)
                    */
                    $alert("登录成功");
                    setTimeout(function(){
                        if(res.data.url){
                            window.location.href = res.data.url;
                        }else{
                            window.location.href = "/";
                        }
                    }, 1000);
                }else{
                    $alert(res.info);
                }
	        })

	    });
		
		
	</script>
</body>
</html>