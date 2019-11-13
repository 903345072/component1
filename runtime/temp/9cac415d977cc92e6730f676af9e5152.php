<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:88:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/index/view/user/withdraw.html";i:1568109530;s:84:"/www/wwwroot/125.maoerle.cn/www_fuda/application/index/view/layouts/layout_user.html";i:1568109530;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
提现
</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link href="/resource/home/css/mui.min.css" rel="stylesheet">
    <link href="/resource/home/css/person.css" rel="stylesheet">
    
<style type="text/css">
    .withdrawal-name {
        line-height: 30px;
    }
    .withdrawal-con .control-style {
        line-height: 30px;
    }
    .boxflex1 .get-btn {
        line-height: 30px;
    }
    .withdrawal-con.yanzheng {
        width: 40%;
    }
    .boxflex1 .get-btn {
        border: 1px solid #0066FF;
        padding: 0 .2rem;
    }

</style>

</head>

<body class="withdrew_body">

    
	<div class="withdrew_body">
		<header class="header_con">
		    <a href="javascript:history.go(-1)" class="lf">
		        <img src="/resource/home/img/call_back.png">
		    </a>
		    <p>提现</p>
		</header>
		<div class="personal">
		    <div class="boxflex boxflex1">
		        <div class="img-wrap"><img class="userimage" src="<?php echo (isset($user['face']) && ($user['face'] !== '')?$user['face']:'/resource/home/img/default-user-img.png'); ?>"></div>
		        <div class="box_flex_1">
		            <div class="p_zichan"><?php echo (isset($user['nickname']) && ($user['nickname'] !== '')?$user['nickname']:$user['username']); ?></div>
		            <div class="cash">可提现金额：<b class="mon"><?php echo number_format($user['account'],2); ?></b>元</div>
		        </div>
		    </div>
		    <form id="with-drawForm" method="post">
				<div class="boxflex1 mt10 clearfloat">
			        <div class="withdrawal-name">提现金额</div>
			        <div class="withdrawal-con">
			            <div class="form-group field-userwithdraw-amount required">
							<input type="text" id="userwithdraw-amount" class="control-style" name="money" placeholder="请输入提现金额">
							<div class="help-block"></div>
						</div>        
					</div>
			    </div>
			    <div class="boxflex1 none clearfloat">
			        <div class="withdrawal-name">到账银行</div>
			        <div id="dd" class="wrapper-dropdown-1" tabindex="1">
			            <div class="form-group field-useraccount-bank_name required">
							<select id="useraccount-bank_name" class="form-control" name="card">
								<?php if(!(empty($user['has_one_card']) || (($user['has_one_card'] instanceof \think\Collection || $user['has_one_card'] instanceof \think\Paginator ) && $user['has_one_card']->isEmpty()))): ?>
							    <option value="<?php echo $user['has_one_card']['id']; ?>"><?php echo $user['has_one_card']['bank_name']; ?>（尾号<?php echo substr($user['has_one_card']['bank_card'],-4); ?>）</option>
                                <?php endif; ?>
							</select>
							<div class="help-block"></div>
						</div>       
					</div>
		    	</div>
			    <div class="boxflex1 none clearfloat">
			        <div class="withdrawal-name">手机号</div>
			        <div class="withdrawal-con" tabindex="1">
			            <input type="text" value="<?php echo mobileHide($user['mobile']); ?>" class="control-style" id="mobile" readonly="readonly" placeholder="<?php echo mobileHide($user['mobile']); ?>">
			        </div>
			    </div>
			    <div class="boxflex1 none clearfloat">
			        <div class="withdrawal-name">验证码</div>
			        <div class="withdrawal-con yanzheng" tabindex="1">
			            <input type="text" id="user-verifycode" class="control-style" placeholder="输入短信验证码" name="code">
			        </div>
			        <div class="get-btn" id="verifyCodeBtn">获取验证码</div>
			    </div>
			    <div class="withdrawal-tips">
			        <ul>提现规则：
			            <li>1、提现时间工作日上午9:30到晚17:00。</li>
			            <li>2、每笔提现扣除2元手续费。</li>
			            <li>3、每笔提现金额最小10元。</li>
			            <li></li>
			        </ul>
			    </div>

			    <div class="recharge-btn mt10" id="submitBtn">立即提现</div>
			    <div class="form-group field-useraccount-bank_mobile required">
					<input type="hidden" id="useraccount-bank_mobile" class="form-control" name="mobile" value="<?php echo $user['mobile']; ?>">
					<div class="help-block"></div>
				</div>    
			</form>
		</div>
	</div>

    

</body>
</html>
<script src="/resource/home/js/jquery-2.2.0.min.js"></script>
<script src="/resource/home/js/mui.min.js"></script>

    <script type="text/javascript" src="/resource/home/js/common.js"></script>
	<script>
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
	$(function () {
	    $("#submitBtn").click(function () {
            var _url = "<?php echo url('index/User/withdraw'); ?>",
                _oData = $("form").serialize();
            $ajaxCustom(_url, _oData, function(res){
                if(res.state){ // 登录成功
                    $alert("申请提现成功，请等待审核！");
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
            });
	    });
	    // 验证码
	    $("#verifyCodeBtn").click(function () {
            var _url = "<?php echo url('index/Home/captcha'); ?>",
                _mobile = $("input[name='mobile']").val(),
                _oData = {mobile:_mobile, act:"withdraw"};
            $ajaxCustom(_url, _oData, function(res){
                if(res.state){ // 登录成功
                    $alert("发送成功");
					//$("input[name='code']").val(res.data.code);
					time($("#verifyCodeBtn"));
                }else{
                    $alert(res.info);
                }
            });
	    });
	});
    var _bind = "<?php echo (isset($bind) && ($bind !== '')?$bind:0); ?>";
    if(_bind == "0"){
        var _jump = "<?php echo $redirect; ?>";
        $alert("请先绑定银行卡！");
        setTimeout(function(){
            window.location.href = _jump;
        }, 1000);
    }
	</script>
