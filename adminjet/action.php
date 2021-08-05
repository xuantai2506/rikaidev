<?php
	@session_start();
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
		include_once(_A_FUNCTIONS . DS . "ContentManager.php");
		include_once(_A_FUNCTIONS . DS . "CoreDashboard.php");
		$url =  isset($_POST['url']) ? $_POST['url'] : 'notfound';
		if (file_exists(_A_ACTIONS . DS . $url .".php" )) {
			include (_A_ACTIONS . DS . $url .".php" );
		}
		else die();
	}
	else echo "<script>window.location.href = '".ADMIN_DIR."';</script>";
?>

