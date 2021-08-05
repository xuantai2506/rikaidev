<?php
	@session_start();
	// System
	define( 'TTH_SYSTEM', true );
	$_SESSION["language"] = (!empty($_SESSION["lang_admin"]) && isset($_SESSION["lang_admin"])) ? $_SESSION["lang_admin"] : 'vi';
	require_once('..' . DIRECTORY_SEPARATOR . 'define.php');
	include_once(_A_FUNCTIONS . DS . "Function.php");
	try {
		$db =  new ActiveRecord(TTH_DB_HOST, TTH_DB_USER, TTH_DB_PASS, TTH_DB_NAME);
	}
	catch(DatabaseConnException $e) {
		echo $e->getMessage();
	}
	include_once(_F_INCLUDES . DS . "_tth_constants.php");
	require_once(ROOT_DIR . DS . ADMIN_DIR . DS . '_check_login.php');
	if($login_true) {
		$tth =  isset($_GET[TTH_PATH]) ? $_GET[TTH_PATH] : 'home';
		include_once(_A_FUNCTIONS . DS . "ContentManager.php");
		$corePrivilegeSlug = array();
		$corePrivilegeSlug = corePrivilegeSlug();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include(_A_INCLUDES . DS . "tth_head.php"); ?>
	</head>
	<body>
	    <div id="wrapper">
	        <!-- Navigation -->
	        <nav class="navbar navbar-default navbar-static-top" role="navigation">
	            <?php include(_A_INCLUDES . DS . "tth_header.php"); ?>
	            <div class="navbar-default sidebar" role="navigation">
					<?php include(_A_INCLUDES . DS . "tth_menu.php"); ?>
	            </div>
	        </nav>
	        <div id="page-wrapper">
	            <?php
	            	if (is_file(_A_MODULES . DS . $tth .".php"))
	                	include(_A_MODULES . DS . $tth .".php");
	            	else loadPageAdmin("Hiện tại chưa hỗ trợ chức năng này.", ADMIN_DIR);
	            ?>
	        </div>
	        <!-- /#page-wrapper -->
		    <div id="footer-admin">
			    <?php include(_A_INCLUDES . DS . "tth_footer.php"); ?>
			</div>
	    </div>
	    <a href="javascript:void(0)" title="Lên đầu trang" id="btnGoTop">
		    <span id="toTopHover"></span>
	    </a>
	    <div id="loadingPopup" style="z-index: 999999999;"></div>
	</body>
</html>
<!-- Tooltip -->
<script>
	$('#wrapper').tooltip({
		selector: "[data-toggle=tooltip]",
		container: "body"
	});
	$('#dataTablesList').find('input[type="checkbox"]').shiftSelectable();
</script>
<?php
	}else {
		// $db->table = "core_user";
		// $data = array(
		// 			'password' => md5('@teamjet'),
		// 			'full_name' => 'LovaWeb',
		// 			'img' => 'avatar.png',
		// 			'email' => 'lovaweb2020@gmail.com',
		// 			'phone' => '0123456789'
		// 		);
		// $db->condition = "`user_name` = 'dev'";
		// $db->update($data);
		include("login.php");
	}
?>