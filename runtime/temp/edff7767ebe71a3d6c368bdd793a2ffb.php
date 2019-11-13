<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"/www/wwwroot/125.maoerle.cn/www_fuda/public/../application/index/view/user/idea.html";i:1568109530;s:84:"/www/wwwroot/125.maoerle.cn/www_fuda/application/index/view/layouts/layout_user.html";i:1568109530;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
问题反馈
</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link href="/resource/home/css/mui.min.css" rel="stylesheet">
    <link href="/resource/home/css/person.css" rel="stylesheet">
    
<style type="text/css">
    /* .withdrawal-name {
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
	} */
	.idea_content{
		border: 1px solid #ccc;
	}
    .withdrawal-name{
        text-align: right;
        padding-right: 20px;
    }
</style>

</head>

<body class="withdrew_body">

    
	<div class="withdrew_body">
		<header class="header_con">
		    <a href="javascript:history.go(-1)" class="lf">
		        <img src="/resource/home/img/call_back.png">
		    </a>
		    <p>问题反馈</p>
		</header>
		<div class="personal">
		    <form id="with-drawForm" method="post">
				<div class="boxflex1 mt10 clearfloat">
			        <div class="withdrawal-name">姓名：</div>
			        <div class="withdrawal-con">
			            <div class="form-group field-userwithdraw-amount required">
							<input type="text" class="control-style" name="idea_name" value="" placeholder="姓名">
							<div class="help-block"></div>
						</div>        
					</div>
			    </div>

			    <div class="boxflex1 none clearfloat">
			        <div class="withdrawal-name">手机号：</div>
			        <div class="withdrawal-con">
			            <div class="form-group field-userwithdraw-amount required">
							<input type="text" class="control-style" maxlength="11" name="idea_mobile" value="" placeholder="手机号">
							<div class="help-block"></div>
						</div>        
					</div>
			    </div>
			    <div class="boxflex1 none clearfloat">
			        <div class="withdrawal-name">意见：</div>
			        <div class="withdrawal-con">
			            <textarea name="idea_content" class="idea_content" cols="30" rows="5"></textarea>      
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
    // $("select[name='bank_province']").on("change", function(){
    //     var _id = $(this).val();
    //     $.ajax({
    //         url: "<?php echo url('index/Index/getRegion'); ?>",
    //         type: "POST",
    //         data: {id:_id},
    //         dataType: "json",
    //         success: function(_resp) {
    //             console.log(_resp);
    //             if(_resp.state){
    //                 if(_resp.data){
    //                     var _html = "";
    //                     for(var _key in _resp.data){
    //                         _html += '<option value="' + _resp.data[_key].id + '">'+ _resp.data[_key].name +'</option>';
    //                     }
    //                     $("select[name='bank_city']").empty().append($(_html));
	// 				}
    //                 return false;
    //             }else{
    //                 $alert(_resp.info);
    //             }
    //         }
    //     });
    // });

    $("#submitBtn").click(function () {
        var _url = "<?php echo url('index/User/idea'); ?>",
            _oData = $("form").serialize();
        $ajaxCustom(_url, _oData, function(res){
            if(res.state){ // 登录成功
                $alert("提交成功！");
                setTimeout(function(){
                    window.location.href = res.data.url;
                }, 1000);
            }else{
                $alert(res.info);
            }
        });
    });
</script>
