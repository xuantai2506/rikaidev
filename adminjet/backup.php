<?php

error_reporting(E_ALL);

error_reporting(0);

define( 'TTH_SYSTEM', true );

//

@set_time_limit(0);

@set_magic_quotes_runtime(false);

ini_set('magic_quotes_runtime', 0);





require_once('..' . DIRECTORY_SEPARATOR . 'define.php');

include_once(_A_FUNCTIONS . DS . "Function.php");

try {

	$db =  new ActiveRecord(TTH_DB_HOST, TTH_DB_USER, TTH_DB_PASS, TTH_DB_NAME);

}

catch(DatabaseConnException $e) {

	echo $e->getMessage();

}

include_once(_F_INCLUDES . DS . "_tth_constants.php");



$dir_dest = "cronjobs";

$dir_dest = str_replace("../", "", $dir_dest);



$date =  new DateClass();



$file_type = getConstant("backup_filetype");

$file_count = getConstant("backup_filecount")+0;

$file = $dir_dest . DS . time() . "[" . str_replace('.', '-', $_SERVER['HTTP_HOST']) . "]" . "_" . time() . ".".$file_type;

$gzip = ($file_type=='sql.gz') ? TRUE : FALSE;



// Delete file backup.

$currentdir = getCurrentDir($dir_dest);

rsort($currentdir);

for($i=0;$i<count($currentdir);$i++) {

	$entry = $currentdir[$i];

	if (!is_dir($entry) && ($i>$file_count-2)) {

		@unlink($dir_dest . DS . $entry);

	}

}



function gwrite($contents) {

	if($GLOBALS['gzip']) {

		gzwrite($GLOBALS['fp'], $contents);

	} else {

		fwrite($GLOBALS['fp'], $contents);

	}

}



if($gzip) {

	$fp = gzopen($file, "w");

} else {

	$fp = fopen($file, "w");

}



$subject = "[". $_SERVER['HTTP_HOST'] . " -  Database backup]";

$message = "<font face='Courier New' size='2'>";

$message .= "<b>" . $subject. " at: ".$date->vnOther(time(), 'd/m/Y - H:i:s') . "</b><br><br>";

$message .= "DATABASE: ... ".TTH_DB_NAME;

$message .= "<br>";



// --------------------------------

$info = array();

$rows = $db->showDbInfo();

foreach($rows as $row) {

	$info['db_info']['db_charset'] = $row['db_charset'];

	$info['db_info']['db_collation'] = $row['db_collation'];

	$info['db_info']['db_time_zone'] = $row['db_time_zone'];

}



$noteBackup = "-- [MySQL -  Database backup] Created time: ".$date->vnOther(time(), 'd/m/Y - H:i:s')."\n\n";

$noteBackup .= "-- Host: ".TTH_DB_HOST."\n";

$noteBackup .= "-- Server version: ".$db->serverInfo()."\n";

$noteBackup .= "-- Collation: ".$info['db_info']['db_collation']."\n";

$noteBackup .= "-- Time zone: ".$info['db_info']['db_time_zone']."\n\n";

$noteBackup .= "-- Database: ".TTH_DB_NAME."\n";



	gwrite($noteBackup."\n\n");



$tables = $db->showtables();

foreach($tables as $i) {

	$i = $i['Tables_in_'.TTH_DB_NAME];



	$nd = "- TABLE : ... ".$i."<br>";

	$message .= $nd;



	$db->table = $i;

	$create = $db->showcreatetable();

	foreach($create as $row){

		gwrite($row[1].";\n\n");

	}



	$rows = $db->sql_query('SELECT * FROM ' . $i . ' WHERE 1');

	if($db->RowCount) {

		foreach($rows as $row) {

			foreach ($row as $j => $k) {

				$row[$j] = "'".$db->clearText($k)."'";

			}

			gwrite("INSERT INTO $i VALUES(".implode(",", $row).");\n");

		}

	}

	gwrite("\n-- --------------------------------------------------------");

	gwrite("\n\n");

}

$gzip ? gzclose($fp) : fclose ($fp);



$message .= "<br>Backup process was successful.</font><br/><br/>-----<br/><font face='arial, helvetica, sans-serif' style='color: #231f20; font-weight: bold;'>Lova<span style='color: #f7941e;'>Web</span>.vn</font>";



$message =	str_replace("\n"	, "<br>"	, $message);

$message =	str_replace("  "	, "&nbsp; "	, $message);

$message =	str_replace("<script>","&lt;script&gt;", $message);



$mail = new PHPMailer();

$mail->IsSMTP();



$mail->SMTPDebug = 0;



$mail->Host = "smtp.gmail.com";

$mail->Port = 465;

$mail->SMTPSecure = "ssl";

$mail->SMTPAuth = true;

$mail->Username = ""; 

$mail->Password = "";



$mail->SetFrom($mail->Username, "lovaweb.vn");



$mail->AddAddress("backup.lovaweb@gmail.com", "LovaWeb Backup");



$mail->Subject = $subject;

$mail->CharSet = "utf-8";

$body = $message;

$mail->Body = $body;

($file!="") ? $mail->AddAttachment($file) : "";

$mail->IsHTML(true);



if(!$mail->Send()) {

	echo "Errors.";

} else {

	echo "Successfully accomplished.";

}