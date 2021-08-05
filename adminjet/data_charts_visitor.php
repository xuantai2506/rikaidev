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
	$date = new DateClass();

	$monthStatic = isset($_GET['month']) ? $_GET['month'] : $date->vnOther(time(),'Y-m');

	$data = '"Day,Lượt truy cập\n';

	$db->table = "online_daily";
	$db->condition = "date LIKE  '%".$monthStatic."%'";
	$db->order = "date ASC";
	$db->limit = "";
	$rows = $db->select();
	foreach ($rows as $row){
		$data .= date('M/d/y',strtotime($row['date'])).','.($row["count"]+0).'\n';
	}
	$data .= '"';

	$callback = (string)$_GET['callback'];
	if (!$callback) $callback = 'callback';

	header('Content-Type: text/javascript');
	echo "$callback($data);";
}

?>