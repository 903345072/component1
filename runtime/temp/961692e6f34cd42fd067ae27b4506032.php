<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/index/view/home/forget.html";i:1568109530;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>忘记密码</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<link href="/resource/home/css/mui.min.css" rel="stylesheet">
	<link href="/resource/home/css/person.css" rel="stylesheet">
</head>
<body>
	<header class="has_back_top ">
			忘记密码
			<a href="javascript:history.go(-1)" class="back_icon">
				<img src="/resource/home/img/back_icon.png">
			</a>
		</header>

		<form class="my_from" style="margin-top:58px;">
			<div class="my_form_group has_get">
				<input type="text" placeholder="请输入手机号码" id="mobile" name="mobile" />
				<!-- <span class="selected_jigou">选择机构</span>
				<input name="institution" type="hidden" id="institution" /> -->
				<!-- <span class="selected_jigou"><?php echo $members[0]['username'];?></span> -->
				<input name="institution" type="hidden" id="institution" value="<?php echo $members[0]['admin_id'];?>"/>
			</div>
			<div class="my_form_group has_get">
				<input type="text" placeholder="请输入验证码" id="code" name="code" />
				<span class="get_btn">获取短信验证码</span>
			</div>
			<div class="my_form_group has_get">
				<input type="password" placeholder="请输入6~12位密码" id="password" />
				<span class="eye cl0se"></span>
			</div>
			<div class="my_form_group">
				<input class="sub_btn" type="button"  value="提交" id="submit" />
			</div>
		</form>

		<div class="risk_mask">
		<div class="risk_content">
			<p class="risk_title">选择登录会员单位</p>
			<div class="risk_text">
				<ul>
					<?php if(is_array($members) || $members instanceof \think\Collection || $members instanceof \think\Paginator): $i = 0; $__LIST__ = $members;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
					<li data-id="<?php echo $item['admin_id']; ?>"><?php echo (isset($item['nickname']) && ($item['nickname'] !== '')?$item['nickname']:$item['username']); ?></li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>

	<script src="/resource/home/js/jquery-2.2.0.min.js"></script>
	<script src="/resource/home/js/mui.min.js"></script>
	<script type="text/javascript" src="/resource/home/js/common.js"></script>
	<script type="text/javascript">
		// var $inputs = $('#code');
		// $inputs.keyup(function() {
		// 	if ($inputs.val().length > 3) {
		// 		$('#submit').removeClass('disabled');
		// 	} else {
		// 		$('#submit').addClass('disabled');
		// 	}
		// });
		//倒计时
		var wait = 60;
		function time(obj) {
			if (wait == 0) {
				obj.removeClass('disabled');           
				obj.html('重新获取验证码');
				wait = 60;
			} else {
				obj.addClass('disabled');
				obj.html('重新发送(' + wait + ')');
				wait--;
				setTimeout(function() {
					time(obj);
				},
				1000)
			}
		}
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
			var phoneNum = $("#mobile");
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
	</script>

	<script type="text/javascript">
        $(".get_btn").click(function(){
            var _url = "<?php echo url('index/Home/captcha'); ?>",
                _mobile = $("input[name='mobile']").val(),
                _oData = {mobile:_mobile, act:"forget"};
            $ajaxCustom(_url, _oData, function(res){
                if(res.state){ // 登录成功
                    $alert("发送成功");
					//$("input[name='code']").val(res.data.code);
                    time($('.get_btn'));
                }else{
                    $alert(res.info);
                }
            });
        });

        // 提交登录
        $("#submit").click(function(e){
            e.preventDefault();
            var _mobile = $("#mobile").val(),
				_code = $("#code").val(),
            	_password = $("#password").val(),
            	_institution = $("#institution").val();

            if(_institution == ""){
                $alert("请选择机构");
                return false;
            }

            //var url = config.api.base + config.api.login;
            var url = '<?php echo url("index/Home/forget"); ?>';
            var data = {
                mobile: _mobile,
				code: _code,
                password: _password,
                institution: _institution
            };
            $ajaxCustom(url, data, function(res){
                if(res.state){ // 登录成功
                    $alert("密码修改成功");
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