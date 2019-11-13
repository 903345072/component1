<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:90:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/index/view/user/modifyCard.html";i:1568109530;s:84:"/www/wwwroot/125.maoerle.cn/www_fuda/application/index/view/layouts/layout_user.html";i:1568109530;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
绑定银行卡
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
		    <p>添加银行卡</p>
		</header>
		<div class="personal">
		    <form id="with-drawForm" method="post">
				<div class="boxflex1 mt10 clearfloat">
			        <div class="withdrawal-name">持卡人姓名</div>
			        <div class="withdrawal-con">
			            <div class="form-group field-userwithdraw-amount required">
							<input type="text" class="control-style" name="bank_user" value="<?php echo (isset($user['has_one_card']['bank_user']) && ($user['has_one_card']['bank_user'] !== '')?$user['has_one_card']['bank_user']:''); ?>" placeholder="持卡人姓名">
							<div class="help-block"></div>
						</div>        
					</div>
			    </div>
			    <div class="boxflex1 clearfloat mt10">
			        <div class="withdrawal-name">开户银行</div>
			        <div class="wrapper-dropdown-1" tabindex="1">
			            <div class="form-group field-useraccount-bank_name required">
							<select class="form-control" name="bank_name">
								<?php if(is_array($banks) || $banks instanceof \think\Collection || $banks instanceof \think\Paginator): $i = 0; $__LIST__ = $banks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
								<option value="<?php echo $item['name']; ?>" <?php if($item['name'] == $user['has_one_card']['bank_name']): ?>selected<?php endif; ?>><?php echo $item['name']; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
							<div class="help-block"></div>
						</div>       
					</div>
		    	</div>
		    	<div class="boxflex1 none clearfloat">
			        <div class="withdrawal-name">所在省份</div>
			        <div class="wrapper-dropdown-1" tabindex="1">
			            <div class="form-group field-useraccount-bank_name required">
							<select class="form-control" name="bank_province">
								<?php if(is_array($provinces) || $provinces instanceof \think\Collection || $provinces instanceof \think\Paginator): $i = 0; $__LIST__ = $provinces;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
								<option value="<?php echo $item['id']; ?>" <?php if($item['id'] == $user['has_one_card']['bank_province']): ?>selected<?php endif; ?>><?php echo $item['name']; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
							<div class="help-block"></div>
						</div>       
					</div>
		    	</div>
		    	<div class="boxflex1 none clearfloat">
			        <div class="withdrawal-name">所在城市</div>
			        <div class="wrapper-dropdown-1" tabindex="1">
			            <div class="form-group field-useraccount-bank_name required">
							<select class="form-control" name="bank_city">
								<?php if(is_array($citys) || $citys instanceof \think\Collection || $citys instanceof \think\Paginator): $i = 0; $__LIST__ = $citys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
								<option value="<?php echo $item['id']; ?>" <?php if($item['id'] == $user['has_one_card']['bank_city']): ?>selected<?php endif; ?>><?php echo $item['name']; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
							<div class="help-block"></div>
						</div>       
					</div>
		    	</div>
		    	<div class="boxflex1 none clearfloat">
			        <div class="withdrawal-name">支行名称</div>
					<div class="withdrawal-con">
						<div class="form-group field-userwithdraw-amount required">
							<input type="text" class="control-style" name="bank_address" value="<?php echo (isset($user['has_one_card']['bank_address']) && ($user['has_one_card']['bank_address'] !== '')?$user['has_one_card']['bank_address']:''); ?>" placeholder="支行名称">
							<div class="help-block"></div>
						</div>
					</div>
		    	</div>
		    	<div class="boxflex1 mt10 clearfloat">
			        <div class="withdrawal-name">银行卡号</div>
			        <div class="withdrawal-con">
			            <div class="form-group field-userwithdraw-amount required">
							<input type="text" class="control-style" name="bank_card" value="<?php echo (isset($user['has_one_card']['bank_card']) && ($user['has_one_card']['bank_card'] !== '')?$user['has_one_card']['bank_card']:''); ?>" placeholder="请输入银行卡号">
							<div class="help-block"></div>
						</div>
					</div>
			    </div>
			    <div class="boxflex1 none clearfloat">
			        <div class="withdrawal-name">身份证号</div>
			        <div class="withdrawal-con">
			            <div class="form-group field-userwithdraw-amount required">
							<input type="text" class="control-style" name="id_card" value="<?php echo (isset($user['has_one_card']['id_card']) && ($user['has_one_card']['id_card'] !== '')?$user['has_one_card']['id_card']:''); ?>" placeholder="请输入身份证号">
							<div class="help-block"></div>
						</div>        
					</div>
			    </div>
			    <div class="boxflex1 none clearfloat">
			        <div class="withdrawal-name">银行预留手机号</div>
			        <div class="withdrawal-con">
			            <div class="form-group field-userwithdraw-amount required">
							<input type="text" class="control-style" name="bank_mobile" value="<?php echo (isset($user['has_one_card']['bank_mobile']) && ($user['has_one_card']['bank_mobile'] !== '')?$user['has_one_card']['bank_mobile']:''); ?>" placeholder="请输入银行预留手机号">
							<div class="help-block"></div>
						</div>        
					</div>
			    </div>
		   		
			    <!--<div class="withdrawal-tips">
			        <ul>添加规则：
			            <li>1、规则1</li>
			            <li>2、规则2</li>
			            <li>3、规则3</li>
			            <li></li>
			        </ul>
			    </div>-->

			    <div class="recharge-btn" style="margin-top: 50px;" id="submitBtn">提交</div>
			</form>
		</div>
	</div>

    

</body>
</html>
<script src="/resource/home/js/jquery-2.2.0.min.js"></script>
<script src="/resource/home/js/mui.min.js"></script>

<script type="text/javascript" src="/resource/home/js/common.js"></script>
<script>
    $("select[name='bank_province']").on("change", function(){
        var _id = $(this).val();
        $.ajax({
            url: "<?php echo url('index/Index/getRegion'); ?>",
            type: "POST",
            data: {id:_id},
            dataType: "json",
            success: function(_resp) {
                console.log(_resp);
                if(_resp.state){
                    if(_resp.data){
                        var _html = "";
                        for(var _key in _resp.data){
                            _html += '<option value="' + _resp.data[_key].id + '">'+ _resp.data[_key].name +'</option>';
                        }
                        $("select[name='bank_city']").empty().append($(_html));
					}
                    return false;
                }else{
                    $alert(_resp.info);
                }
            }
        });
    });

    $("#submitBtn").click(function () {
        var _url = "<?php echo url('index/User/modifyCard'); ?>",
            _oData = $("form").serialize();
        $ajaxCustom(_url, _oData, function(res){
            if(res.state){ // 登录成功
                $alert("银行卡绑定成功！");
                setTimeout(function(){
                    var _callback = "<?php echo (isset($callback) && ($callback !== '')?$callback:''); ?>";
                    if(_callback == ''){
                        if(res.data.url){
                            window.location.href = res.data.url;
                        }else{
                            window.location.href = "/";
                        }
					}else{
                        window.location.href = _callback;
					}
                }, 1000);
            }else{
                $alert(res.info);
            }
        });
    });
</script>
