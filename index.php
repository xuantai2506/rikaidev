<?php
	@ob_start();
	@session_start();
	define( 'TTH_SYSTEM', true );
	$url = isset($_GET['url']) ? $_GET['url'] : 'home';
	$path = array();
	$path = explode('/',$url);
	if($path[0]=='vi') {
		$_SESSION["language"] = 'vi';
	} elseif($path[0]=='jp') {
		$_SESSION["language"] = 'jp';
	} else {
		$_SESSION["language"] = 'vi';
		array_unshift($path, 'vi');
	}
//---------------------------------------------------------------------------------------------
	require_once(str_replace( DIRECTORY_SEPARATOR, '/', dirname( __file__ ) ) . '/define.php');
	require_once(ROOT_DIR . DS ."lang" . DS . TTH_LANGUAGE . ".lang");
	include_once(_F_FUNCTIONS . DS . "Function.php");
	try {
		$db =  new ActiveRecord(TTH_DB_HOST, TTH_DB_USER, TTH_DB_PASS, TTH_DB_NAME);
	}
	catch(DatabaseConnException $e) {
		echo $e->getMessage();
	}
	$account["id"] = empty($_SESSION["user_id"]) ? 0 : $_SESSION["user_id"]+0;
	include_once(_F_INCLUDES . DS . "_tth_constants.php");
	include_once(_F_INCLUDES . DS . "_tth_url.php");
	include_once(_F_INCLUDES . DS . "_tth_online_daily.php");
?>
<!DOCTYPE html>
<html lang="<?php echo TTH_LANGUAGE;?>">
	<head>
		<?php
			include(_F_INCLUDES . DS . "_tth_head.php");
		?>
	</head>
	<body>
		<div id="wrapper">
			<?php
				include(_F_INCLUDES . DS . "tth_header.php");
			?>
			<?php
			if($slug_cat=="home"){
				include(_F_INCLUDES . DS . "tth_slider.php");
			}
			?>
			<?php
				include(_F_MODULES . DS .  str_replace('-','_',$slug_cat) . ".php");
			?>
			<?php
				include(_F_INCLUDES . DS . "tth_footer.php");
			?>
		</div>
		<div id="_loading"></div>
		<?php
		include(_F_INCLUDES . DS . "_tth_script.php");
		?>
	</body>
</html>