<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:88:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/index/view/user/recharge.html";i:1568109530;s:84:"/www/wwwroot/125.maoerle.cn/www_fuda/application/index/view/layouts/layout_user.html";i:1568109530;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
充值
</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link href="/resource/home/css/mui.min.css" rel="stylesheet">
    <link href="/resource/home/css/person.css" rel="stylesheet">
    
<style>
	.bank_show{
		display: none;
	}
	.name_001 {
		display: flex;
		line-height: 44px;
		border-bottom: 1px solid #e0e0e0;
	}
	.name_002 {
		margin-right: 15px;
		width: 70px;
		text-align: right;
	}
	.name_003 {
		margin: 2px;
		width: 60%;
	}
	.name_003 input{
		margin-bottom:0px !important;
	}
	.name_001{
		padding: 0 !important;
	}
</style>

</head>

<div class="payment_body">

    
<div class="payment_body">
	<header class="header_con">
		<a href="javascript:history.go(-1)" class="lf">
			<img src="/resource/home/img/call_back.png">
		</a>
		<p>充值</p>
	</header>
	<div class=" " style="padding:0;">
		<p class="selecthe">选择充值面额（元）</p>
		<div class="col-xs-12">
			<div style="padding: 0 10px;" class="form-group field-chargeAmount required">
				<input type="text" id="chargeAmount" class="form-control custorm_count" placeholder="可输入10-10000的整数金额（元）">
				<div class="help-block"></div>
			</div>
		</div>
		<form id="payform" action="" method="post">
			<div class="boxflex1 paystyle" style="padding: 10px 15px 0;">
			<div class="group_btn clear_fl">
				<div class="btn_re">
					<a class="btn_money on">74</a>
				</div>
				<div class="btn_re btn_center">
					<a class="btn_money">154</a>
				</div>
				<div class="btn_re btn_center">
					<a class="btn_money">331</a>
				</div>
				<div class="btn_re">
					<a class="btn_money">857</a>
				</div>
				<div class="btn_re">
					<a class="btn_money">1507</a>
				</div>
				<div class="btn_re">
					<a class="btn_money">2299</a>
				</div>
				<div class="btn_re">
					<a class="btn_money">3209</a>
				</div>
				<div class="btn_re">
					<a class="btn_money">4398</a>
				</div>
				<div class="btn_re">
					<a class="btn_money">4398</a>
				</div>
				<div class="btn_re">
					<a class="btn_money">4398</a>
				</div>
            </div>
            <!-- 金额 -->
            <input type="hidden" id="amount" name="amount" value="74">
            <!-- 类型 -->
			<input type="hidden" id="type" name="type" value="1">   
			<!-- 支付宝h5 1   快捷支付 2 -->
			<!-- <input type="hidden" id="status" name="status" value="1">   -->
		</div>
			<div class="boxflex1">
				<div class="moneyhead">充值方式</div>
			</div>
			<!-- <div class="payType">
				<div class="boxflex1 paystyle checkImg2" style="border-top:0;" data-type="1">
					<img src="/resource/home/img/pay.png" style="width: 20px;">
					<span>网银支付</span>
					<img src="/resource/home/img/seleted.png" alt="" style="float:right;" class="check-payone checkPay">
				</div>
			</div> -->
			<!-- <div class="payType">
				<div class="boxflex1 paystyle checkImg2" style="border-top:0;" data-type="2" data-id="1">
					<img src="/resource/home/img/alipay.png" style="width: 20px;">
					<span>支付宝h5</span>
					<img src="/resource/home/img/seleted0.png" alt="" style="float:right;" class="check-payone checkPay">
				</div>
			</div> -->
			<!-- <div class="payType">
				<div class="boxflex1 paystyle checkImg2" style="border-top:0;" data-type="4">
					<img src="/resource/home/img/pay.png" style="width: 20px;">
					<span>网银支付</span>
					<img src="/resource/home/img/seleted0.png" alt="" style="float:right;" class="check-payone checkPay">
				</div>
			</div> -->
		
		
			<!-- <div class="payType bank_show">
				<div class="boxflex1  checkImg2" style="border-top:0;">
					<select class="select" id="bank" name="bank">
						<option value="0">--请选择银行--</option>
						<option value="ICBC">中国工商银行</option>
						<option value="CBC">中国建设银行</option>
						<option value="BC">中国银行</option>
						<option value="ABC">中国农业银行</option>
						<option value="GDB">广东发展银行</option>
						<option value="CEB">中国光大银行</option>
						<option value="CMBC">中国民生银行</option>
						<option value="HB">华夏银行</option>
						<option value="BCCB">北京银行</option>
						<option value="BOSH">上海银行</option>
					</select>
				</div>
			</div> -->
			<!-- <div class="payType">
				<div class="boxflex1 paystyle checkImg2" style="border-top:0;" data-type="1">
					<img src="/resource/home/img/pay.png" style="width: 20px;">
					<span>快捷支付</span>
					<img src="/resource/home/img/seleted.png" alt="" style="float:right;" class="check-payone checkPay">
				</div>
			</div> -->
			
			<div class="payType">
				<div class="boxflex1 paystyle" style="border-top:0;" data-type="3">
					<img src="/resource/home/img/yl.png" style="width: 20px;">
					<span>快捷充值</span>
					<img src="/resource/home/img/seleted0.png" alt="" style="float:right;" class="check-payone checkPay">
				</div>
			</div>
			<div class="payType">
				<div class="boxflex1 paystyle checkImg2" style="border-top:0;" data-type="2">
					<img src="/resource/home/img/yl.png" style="width: 20px;">
					<span>网银充值</span>
					<img src="/resource/home/img/seleted.png" alt="" style="float:right;" class="check-payone checkPay">
				</div>
			</div>

			<div class="payType">
				<div class="boxflex1 paystyle checkImg2" style="border-top:0;" data-type="7">
					<img src="/resource/home/img/yl.png" style="width: 20px;">
					<span>支付宝充值</span>
					<img src="/resource/home/img/seleted0.png" alt="" style="float:right;" class="check-payone checkPay">
				</div>
			</div>

			<div class="payType">
				<div class="boxflex1 paystyle checkImg2" style="border-top:0;" data-type="8">
					<img src="/resource/home/img/yl.png" style="width: 20px;">
					<span>支付宝充值(通道二)</span>
					<img src="/resource/home/img/seleted0.png" alt="" style="float:right;" class="check-payone checkPay">
				</div>
			</div>
			<!--<div class="payType">
				<div class="boxflex1 paystyle checkImg2" style="border-top:0;" data-type="3">
					<img src="/resource/home/img/pay_xx.png" style="width: 20px;">
					<span>线下支付</span>
					<img src="/resource/home/img/seleted0.png" alt="" style="float:right;" class="check-payone checkPay">
				</div>
			</div>-->
			<div class="payType s1">
				<div class="boxflex1 name_001" style="border-top:0;" data-type="3">
					<div class="name_002">
						<span>姓名</span>
					</div>
					<div class="name_003">
						<input type="text" id="name" name="name" class="form-control custorm_count" placeholder="请输入姓名">
					</div>
				</div>
			</div>
			<div class="payType s2">
				<div class="boxflex1 name_001" style="border-top:0;" data-type="3">
					<div class="name_002">
						<span>选择银行</span>
					</div>
					<div class="name_003">
						<select class="select" id="bank" name="bank">
							<option value="ICBC" >工商银行</option>  
							<option value="ABC" >农业银行</option>
							<option value="BOCSH" >中国银行</option>  
							<option value="CCB" >建设银行</option>  
							<option value="CMB" >招商银行</option>  
							<option value="SPDB" >浦发银行</option>  
							<option value="GDB" >广发银行</option>  
							<option value="BOCOM" >交通银行</option>  
							<option value="CNCB" >中信银行</option>  
							<option value="CMBC" >民生银行</option>
							<option value="CEB" >光大银行</option>
							<option value="HXB" >华夏银行</option>
							<option value="CIB" >兴业银行</option>
							<option value="BOS" >上海银行</option>
							<option value="SRCB" >上海农商</option>
							<option value="PAB" >平安银行</option>
							<option value="BCCB" >北京银行</option>
							<option value="PSBC" >邮政储蓄银行</option>
						</select>
					</div>
				</div>
			</div>
			<div class="payType bank_show">
				<div class="boxflex1 name_001" style="border-top:0;" data-type="3">
					<div class="name_002">
						<span>银行卡号</span>
					</div>
					<div class="name_003">
						<input type="text" id="bankcode" name="bankcode" class="form-control custorm_count" placeholder="请输入银行卡号">
					</div>
				</div>
			</div>

			<div class="recharge-btn" id="payBtn">立即充值</div>

			<p class="recharge-run">提示：请提前绑定银行卡！</p>
		</form>
	</div>
</div>

    

</body>
</html>
<script src="/resource/home/js/jquery-2.2.0.min.js"></script>
<script src="/resource/home/js/mui.min.js"></script>

<script type="text/javascript" src="/resource/home/js/common.js"></script>
<script>
    $(function() {
        var options = [1000, 3500, 7000, 10000,15000,20000,25000,30000,40000,50000];
        $(".btn_money").each(function(index, el) {
            // var range = parseInt( 10 - Math.random() * 20 );
            var count = options[index];
            $(el).html(count);
        });

        $('#type').val(2);
        $(".btn_money").click(function() {
            $(".on").removeClass("on");
            $(this).addClass("on");
            $('#amount').val($(this).html());
            $("#chargeAmount").val( $(this).html() );
        });

        $(".btn_money.on").trigger("click");

        $("#chargeAmount").blur(function(){
            var val = $(this).val();
            $(".btn_money.on").removeClass("on");
            var amount = $(this).val();
            var _this = $(this);
            if( isNaN(amount) ){
                $alert("充值金额必须为数字")
                _this.val(10.00);
                $('#amount').val(10.00);
            }
			$('#amount').val(amount);
            // if(amount < 10){
            //     $alert("充值金额不小于10元")
            //     _this.val(10.00);
            //     $('#amount').val(10.00);
            // }else{
            // 	$('#amount').val(amount);
			// }
        });

        $('#payBtn').on('click', function(){
			// alert('通道维护中!');
            // return false;
			var type1 = $('#type').val();

			if (type1 !=7 && type1 != 8)
			{

				if(type1==4){	// 线下支付
					window.location.href = "<?php echo url('index/User/xianxia'); ?>";
					return false;
				}
				var amount = $('#amount').val();
				if(!amount || isNaN(amount) || amount <= 0){
					$alert('金额输入不合法!');
					return false;
				}
				var name = $('input[name=name]').val();
				var bank = $('select[name=bank]').val();
				if(!name){
					$alert('请输入姓名!');
					return false;
				}
				if(!bank){
					$alert('请选择银行!');
					return false;
				}
				if(type1 == 3){
					var bankcode = $('input[name=bankcode]').val();
					if(!bankcode){
						$alert('请输入银行卡号码!');
						return false;
					}
				}
				var _bind = "<?php echo (isset($bind) && ($bind !== '')?$bind:0); ?>";
				if(_bind == "0"){
					var _jump = "<?php echo $redirect; ?>";
					$alert("请先绑定银行卡！");
					setTimeout(function(){
						window.location.href = _jump;
					}, 1000);
					return false;
				}
			}

            $("#payform").submit();
        });

        $('.payType .paystyle').on('click', function(){
            var type = $(this).data('type');
            if (type == 7 || type==8){
            	$('.s1,.s2').remove()
			}
            $('.payType .paystyle').each(function(){
                if (type == $(this).data('type')) {
                    $(this).find('.checkPay').attr({"src":"/resource/home/img/seleted.png"});
                }else{
                    $(this).find('.checkPay').attr({"src":"/resource/home/img/seleted0.png"});
				}
            });
			if(type == 3){
				$('.bank_show').show();
			}else{
				$('.bank_show').hide();
			}
            $('#type').val(type);
        });

    });
</script>
