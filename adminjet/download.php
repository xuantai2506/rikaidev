<?php
// System
define( 'TTH_SYSTEM', true );
$_SESSION["language"] = (!empty($_SESSION["lang_admin"]) && isset($_SESSION["lang_admin"])) ? $_SESSION["lang_admin"] : 'vi';

require_once('..' . DIRECTORY_SEPARATOR . 'define.php');
include_once(_A_FUNCTIONS . DS . "Function.php");

$download_path =  $_GET[TTH_PATH]."/";
$file = $_GET['filename'];
$args = array(
	'download_path'		=>	$download_path,
	'file'				=>	$file,
	'extension_check'	=>	TRUE,
	'referrer_check'	=>	FALSE,
	'referrer'			=>	NULL,
);
$download = new DownloadFile($args);
$download_hook = $download->get_download_hook();

if( $download_hook['download'] == TRUE ) {
	$download->get_download();
}