<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>注册用户</title>
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/base.css" type="text/css">
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/global.css" type="text/css">
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/header.css" type="text/css">
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/login.css" type="text/css">
	<link rel="stylesheet" href="http://www.shop.com/Public/Home/css/footer.css" type="text/css">
	
	<style type="text/css">
		.error{
			color: red!important;
		}
	</style>

</head>
<body>
	<!-- 顶部导航 start -->
	<div class="topnav">
		<div class="topnav_bd w990 bc">
			<div class="topnav_left">
				
			</div>
			<div class="topnav_right fr">
				<ul>
					<li>您好，欢迎<?php echo ($_SESSION['USERINFO']['username']); ?>来到京西！[<a href="<?php echo U('Member/login');?>">登录</a>] [<a href="<?php echo U('Member/reg');?>">免费注册</a>] </li>
					<li class="line">|</li>
					<li>我的订单</li>
					<li class="line">|</li>
					<li>客户服务</li>

				</ul>
			</div>
		</div>
	</div>
	<!-- 顶部导航 end -->
	
	<div style="clear:both;"></div>

	<!-- 页面头部 start -->
	<div class="header w990 bc mt15">
		<div class="logo w990">
			<h2 class="fl"><a href="index.html"><img src="http://www.shop.com/Public/Home/images/logo.png" alt="京西商城"></a></h2>
		</div>
	</div>
	<!-- 页面头部 end -->
	
	
	<div class="login w990 bc mt10 regist">
		<div class="login_hd">
			<h2>用户注册</h2>
			<b></b>
		</div>
		<div class="login_bd">
			<div class="login_form fl">
				<form action="<?php echo U();?>" method="post" id="reg_form">
					<ul>
						<li>
							<label for="">用户名：</label>
							<input type="text" class="txt" name="username" /><span class="error"></span>
							<p>3-20位字符，可由中文、字母、数字和下划线组成</p>
						</li>
						<li>
							<label for="">密码：</label>
							<input type="password" class="txt" name="password" id="password"/><span class="error"></span>
							<p>6-20位字符，可使用字母、数字和符号的组合，不建议使用纯数字、纯字母、纯符号</p>
						</li>
						<li>
							<label for="">确认密码：</label>
							<input type="password" class="txt" name="repassword" /><span class="error"></span>
							<p> <span>请再次输入密码</p>
						</li>
						<li>
							<label for="">Email：</label>
							<input type="text" class="txt" name="email" /><span class="error"></span>
							<p> <span>请输入格式正确的Email</p>
						</li>
						<li>
							<label for="">电话号码：</label>
							<input type="text" class="txt tel" name="tel" /><span class="error"></span>
							<p> <span>请输入格式正确的手机号</p>
						</li>
						<li class="checkcode">
							<label for="">手机验证码：</label>
							<input type="text"  name="tel_code" /><span class="error"></span>
							<button type="button" class="sendSMS">获取验证码</button>
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input type="checkbox" class="chb" checked="checked" name="agree"/> 我已阅读并同意《用户注册协议》
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input type="submit" value="" class="login_btn" />
						</li>
					</ul>
				</form>


			</div>

			<div class="mobile fl">
				<h3>手机快速注册</h3>
				<p>中国大陆手机用户，编辑短信 “<strong>XX</strong>”发送到：</p>
				<p><strong>1069099988</strong></p>
			</div>

		</div>
	</div>


	<div style="clear:both;"></div>
	<!-- 底部版权 start -->
	<div class="footer w1210 bc mt15">
		<p class="links">
			<a href="">关于我们</a> |
			<a href="">联系我们</a> |
			<a href="">人才招聘</a> |
			<a href="">商家入驻</a> |
			<a href="">千寻网</a> |
			<a href="">奢侈品网</a> |
			<a href="">广告服务</a> |
			<a href="">移动终端</a> |
			<a href="">友情链接</a> |
			<a href="">销售联盟</a> |
			<a href="">京西论坛</a>
		</p>
		<p class="copyright">
			 © 2005-2013 京东网上商城 版权所有，并保留所有权利。  ICP备案证书号:京ICP证070359号 
		</p>
		<p class="auth">
			<a href=""><img src="http://www.shop.com/Public/Home/images/xin.png" alt="" /></a>
			<a href=""><img src="http://www.shop.com/Public/Home/images/kexin.jpg" alt="" /></a>
			<a href=""><img src="http://www.shop.com/Public/Home/images/police.jpg" alt="" /></a>
			<a href=""><img src="http://www.shop.com/Public/Home/images/beian.gif" alt="" /></a>
		</p>
	</div>
	<!-- 底部版权 end -->
	<script type="text/javascript" src="http://www.shop.com/Public/Home/js/jquery-1.8.3.min.js"></script>
	
	<script type="text/javascript" src="http://www.shop.com/Public/Home/js/jquery.validate.min.js"></script>
	<script type="text/javascript">
		$(function(){
			//在使用验证规则之前自定义验证规则
			jQuery.validator.addMethod('checkUsername',function(value,element,param){  // value: 表单元素的值  element:当前表单元素对象,   param: 验证规则后面的参数
				if(param){
				   return	/^[a-zA-Z0-9\u4e00-\u9fa5-_]+$/.test(value);
				}
			},'必须是由中文、字母、数字和下划线组成');


			// 手机号码验证
			jQuery.validator.addMethod("isMobile", function(value, element) {
				var length = value.length;
				return this.optional(element) || (length == 11 && /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/.test(value));
			}, "请正确填写您的手机号码。");


			//>>1.找到表单指定验证规则
			$('#reg_form').validate({
				//rules: 验证规则
				rules: {
					username: {
						required:true,
						rangelength:[3,20],
						checkUsername:true,
						remote: '<?php echo U('Member/check');?>'
					},
					password: {
						required:true,
						rangelength:[6,20]
					},
					repassword: {
						required:true,
						rangelength:[6,20],
						equalTo: '#password'
					},
					email:{
						required: true,
						email: true,
						remote: '<?php echo U('Member/check');?>'
					},
					tel:{
						required: true,
						isMobile : true,
						remote: '<?php echo U('Member/check');?>'
					},
					tel_code :{
						required: true,
						remote: {
							url: '<?php echo U('Member/checkTel');?>',
							type: "post",
							data:{
								tel: function(){
									return $('.tel').val();
								}
							}
						}
					}
				},
				//不符合验证时的错误信息
				messages: {
				   tel_code:{
					   required:'验证码不能够为空!',
					   remote:'验证码不正确或者超期需要重新获取!'
				   },
					username: {
						required: '用户名不能够为空!',
						rangelength: '用户名长度必须在3--20之间!',
						remote: '用户名已存在,请更换!'
					},
					password: {
						required: '密码不能够为空!',
						rangelength: '密码长度必须在6--20之间!'
					},
					repassword: {
						required: '密码不能够为空!',
						rangelength: '密码长度必须在6--20之间!',
						equalTo: '确认密码必须和密码一致!',
					},
					email :{
						required:'Email不能够为空!',
						email: '必须符合Email格式',
						remote: 'Email已存在,请更换!'
					},
					tel :{
						required:'电话号码不能够为空!',
						remote: 'Tel已存在,请更换!'
					},
				},
				errorPlacement : function(error_label,element){    //第一个参数: 存放错误信息的label   第二个参数:  发生验证错误时表单元素   这两个参数都是jquery对象
					//每个验证表单元素发生错误, 该方法都执行
					var error_info = error_label.html();
					element.next('span').html(error_info);
				},
				success : function(error_label,element){     //第一个参数是jquery对象. 存放错误信息的label,   第二个参数:  dom对象--- 当前表单元素
					$(element).next('span').html('');
				}
			});





			$('.sendSMS').click(function(){
				var tel = $('.tel').val();
				$.post('<?php echo U('Member/getSMSCode');?>',{tel:tel},function(){
					//将按钮禁用
					$('.sendSMS').prop('disabled',true);
					var time = 10;
					var timer = window.setInterval(function(){
						time--;
						$('.sendSMS').text(time+'秒后可以重新获取!');
						if(time==0){
					       window.clearInterval(timer);
						   $('.sendSMS').prop('disabled',false).text('重新获取验证码!');
						}
					},1000);
				});
			});
		});
	</script>


</body>
</html>