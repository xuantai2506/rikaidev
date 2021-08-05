<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="content-language" content="vi">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Olala-3W | Olala Team - Administration Control Panel">
	<meta name="author" content="Olala-3W | Olala Team [olala.3w@gmail.com]">

	<title>Login - Administration Control Panel</title>
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="./css/style-login.css" charset="utf-8" media="all" >
	<!-- jQuery Version 1.11.0 -->
	<script type="text/javascript" src="./js/jquery/jquery-1.11.0.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script type="text/javascript" src="./js/bootstrap/bootstrap.js"></script>
    <!-- jQuery Validation -->
	<link rel="stylesheet" href="./css/validationEngine.jquery.css" type="text/css"/>
	<link rel="stylesheet" href="./css/templateValidation.css" type="text/css"/>
	<script src="./js/jquery.validation/jquery.validationEngine-vi.js" type="text/javascript" charset="utf-8"></script>
	<script src="./js/jquery.validation/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<!-- autoNumeric JavaScript -->
	<script type="text/javascript" src="./js/autoNumeric.js"></script>
	<!-- Page Plugins -->
	<script type="text/javascript" src="./js/login/EasePack.min.js"></script>
	<script type="text/javascript" src="./js/login/rAF.js"></script>
	<script type="text/javascript" src="./js/login/TweenLite.min.js"></script>
	<script type="text/javascript" src="./js/login/login.js"></script>
	<!-- Validate JavaScript -->
	<script type="text/javascript" src="js/script.js"></script>
	<!-- Popup Alert -->
	<link rel="stylesheet" type="text/css" href="./css/popup/jquery.boxes.css">
	<script type="text/javascript" src="./js/jquery.popup/jquery.boxes.js"></script>
	<script type="text/javascript" src="./js/jquery.popup/jquery.boxes.repopup.js"></script>
	<!-- Fancybox -->
	<link rel="stylesheet" type="text/css" href="./js/fancybox/jquery.fancybox.css?v=2.1.5" charset="utf-8" media="screen" />
	<script type="text/javascript" src="./js/fancybox/jquery.fancybox.js?v=2.1.5"></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- // -->
	<script>
		jQuery(document).ready(function(){
			jQuery("#formID").validationEngine();
			jQuery("#formForgot").validationEngine();
			CanvasBG.init({
				Loc: {
					x: window.innerWidth / 2,
					y: window.innerHeight / 3.3
				}
			});
		});
	</script>
</head>

<body>
<div class="container">
	<!-- Canvas animation bg -->
	<div id="canvas-wrapper">
		<canvas id="bg-canvas"></canvas>
	</div>
    <section class="main">
		<div class="center_ne">
			<a target="_blank" title="Thiết kế website tại Đà Nẵng - LovaWeb" href="https://lovaweb.com">
				<div class="logo">
					<img src="./images/logo_login.svg">
				</div>
			</a>
			<div class="login-form">
				<?php
				$notification = isset($_GET['active']) ? $_GET['active'] : "";
				?>
				<form id="formID" class="tth-form" <?php echo ($notification == "change_pass_success")? 'action="'. ADMIN_DIR .'/"' : ''?> method="post">
					<h3>Đăng nhập hệ thống quản trị</h3>
					<p class="field">
						<input class="validate[required] input-login-form" maxlength="30" placeholder="Tên đăng nhập" name="login_user_admin" type="text" required="required" title="Tên đăng nhập" autocomplete="off" data-prompt-position="topRight:-60">
					
					</p>
					<p class="field">
						<input class="validate[required] input-login-form" maxlength="30" placeholder="Mật khẩu" name="login_password_admin" type="password" required="required" title="Mật khẩu" autocomplete="off" data-prompt-position="topRight:-20" >
						
					</p>
					<p class="field support-note">
						<span class="support-text"></span>
					</p>
					<?php
					if($notification == "") {
					if($login_failed == "") {
						echo('<div class="alert alert-info alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								Để đăng nhập, bạn cần nhập đầy đủ vào các ô nhập liệu phía trên. Sau khi gửi đi hệ thống sẽ kiểm tra tính hợp lệ của dữ liệu khai báo.
							</div>');
					}
						else echo($login_failed);
					}
					else if($notification == "change_pass_success") {
						echo('<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								Đã đổi mật khẩu mới thành công, yêu cầu thực hiện lại đăng nhập để tiếp tục các thao tác quản trị hệ thống.
							</div>');
					}
					?>
					<p class="submit">
						<button type="submit" data-toggle="tooltip" data-placement="left" title="Đăng nhập" name="login_admin" >Đăng Nhập </button>
					</p>
					<p class="change_link">
						<a href="javascript:void(0)" id="forgot-password" style="float: right;"><i class="fa fa-send-o fa-fw"></i> Quên mật khẩu?</a>
					</p>
				</form>
			</div>
			<div class="forgot-form" style="display: none;">
				<form id="formForgot" class="tth-form" name="formForgot" method="post" onsubmit="return sendLostForgot('formForgot');">
					<h3>Thiết lập mật khẩu mới</h3>
					<p class="field">
						<input class="validate[required] input-login-form" maxlength="255" placeholder="Tên đăng nhập / Email" name="forgot_user_email" type="text" required="required" title="Tên đăng nhập / Email" autocomplete="off" data-prompt-position="topRight:-60">

					</p>
					<p class="field support-note">
						<span class="support-text"></span>
					</p>
					<div class="alert alert-info alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						Vui lòng nhập Tên đăng nhập hoặc địa chỉ Email vào ô nhập liệu phía trên. Sau khi gửi đi hệ thống sẽ kiểm tra thông tin để tạo một mật khẩu mới và gửi về email cho bạn.
					</div>
					<p class="submit">
						<button type="submit" data-toggle="tooltip" data-placement="left" title="Gửi đi" name="s_forgot" >Xác nhận </button>
					</p>
					<p class="change_link">
						<a href="javascript:void(0)" id="login-user" style="float: right;"><i class="fa  fa-rotate-right fa-fw"></i> Đăng nhập</a>
					</p>
				</form>
			</div>
		</div>
    </section>

	<div id="loadingPopup" style="z-index: 999;"></div>

</div>
</body>

</html>
<!-- Tooltip -->
<script>
	$('.main').tooltip({
		selector: "[data-toggle=tooltip]",
		container: "body"
	})

	jQuery(document).ready(function($){
		$(function(){
			$("#forgot-password").click(function(){
				$(".login-form").slideUp();
				$(".forgot-form").slideDown();
			});
			$("#login-user").click(function(){
				$(".forgot-form").slideUp();
				$(".login-form").slideDown();
			});
		})
	});
</script>
