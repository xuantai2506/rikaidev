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
			<a target="_blank" title="Thi???t k??? website t???i ???? N???ng - LovaWeb" href="https://lovaweb.com">
				<div class="logo">
					<img src="./images/logo_login.svg">
				</div>
			</a>
			<div class="login-form">
				<?php
				$notification = isset($_GET['active']) ? $_GET['active'] : "";
				?>
				<form id="formID" class="tth-form" <?php echo ($notification == "change_pass_success")? 'action="'. ADMIN_DIR .'/"' : ''?> method="post">
					<h3>????ng nh???p h??? th???ng qu???n tr???</h3>
					<p class="field">
						<input class="validate[required] input-login-form" maxlength="30" placeholder="T??n ????ng nh???p" name="login_user_admin" type="text" required="required" title="T??n ????ng nh???p" autocomplete="off" data-prompt-position="topRight:-60">
					
					</p>
					<p class="field">
						<input class="validate[required] input-login-form" maxlength="30" placeholder="M???t kh???u" name="login_password_admin" type="password" required="required" title="M???t kh???u" autocomplete="off" data-prompt-position="topRight:-20" >
						
					</p>
					<p class="field support-note">
						<span class="support-text"></span>
					</p>
					<?php
					if($notification == "") {
					if($login_failed == "") {
						echo('<div class="alert alert-info alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								????? ????ng nh???p, b???n c???n nh???p ?????y ????? v??o c??c ?? nh???p li???u ph??a tr??n. Sau khi g???i ??i h??? th???ng s??? ki???m tra t??nh h???p l??? c???a d??? li???u khai b??o.
							</div>');
					}
						else echo($login_failed);
					}
					else if($notification == "change_pass_success") {
						echo('<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								???? ?????i m???t kh???u m???i th??nh c??ng, y??u c???u th???c hi???n l???i ????ng nh???p ????? ti???p t???c c??c thao t??c qu???n tr??? h??? th???ng.
							</div>');
					}
					?>
					<p class="submit">
						<button type="submit" data-toggle="tooltip" data-placement="left" title="????ng nh???p" name="login_admin" >????ng Nh???p </button>
					</p>
					<p class="change_link">
						<a href="javascript:void(0)" id="forgot-password" style="float: right;"><i class="fa fa-send-o fa-fw"></i> Qu??n m???t kh???u?</a>
					</p>
				</form>
			</div>
			<div class="forgot-form" style="display: none;">
				<form id="formForgot" class="tth-form" name="formForgot" method="post" onsubmit="return sendLostForgot('formForgot');">
					<h3>Thi???t l???p m???t kh???u m???i</h3>
					<p class="field">
						<input class="validate[required] input-login-form" maxlength="255" placeholder="T??n ????ng nh???p / Email" name="forgot_user_email" type="text" required="required" title="T??n ????ng nh???p / Email" autocomplete="off" data-prompt-position="topRight:-60">

					</p>
					<p class="field support-note">
						<span class="support-text"></span>
					</p>
					<div class="alert alert-info alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						Vui l??ng nh???p T??n ????ng nh???p ho???c ?????a ch??? Email v??o ?? nh???p li???u ph??a tr??n. Sau khi g???i ??i h??? th???ng s??? ki???m tra th??ng tin ????? t???o m???t m???t kh???u m???i v?? g???i v??? email cho b???n.
					</div>
					<p class="submit">
						<button type="submit" data-toggle="tooltip" data-placement="left" title="G???i ??i" name="s_forgot" >X??c nh???n </button>
					</p>
					<p class="change_link">
						<a href="javascript:void(0)" id="login-user" style="float: right;"><i class="fa  fa-rotate-right fa-fw"></i> ????ng nh???p</a>
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
