<?php
@session_start();
// System
define( 'TTH_SYSTEM', true );

$lang = isset($_POST['lang']) ? $_POST['lang'] : 'vi';
$_SESSION["language"] = $lang;
require_once(str_replace( DIRECTORY_SEPARATOR, '/', dirname( __file__ ) ) . '/define.php');
require_once(ROOT_DIR . DS ."lang" . DS . $lang . ".lang");
include_once(_F_FUNCTIONS . DS . "Function.php");
try {
	$db =  new ActiveRecord(TTH_DB_HOST, TTH_DB_USER, TTH_DB_PASS, TTH_DB_NAME);
}
catch(DatabaseConnException $e) {
	echo $e->getMessage();
}
include_once(_F_INCLUDES . DS . "_tth_constants.php");

$url =  isset($_REQUEST['url']) ? $_REQUEST['url'] : 'notfound';

if (file_exists(_F_ACTIONS . DS . $url .".php" )) {
	include (_F_ACTIONS . DS . $url .".php" );
}
else die();


