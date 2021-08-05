<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
@set_time_limit(0);
@set_magic_quotes_runtime(false);
ini_set('magic_quotes_runtime', 0);

$dir_dest = "cronjobs";
$dir_dest = str_replace("../","",$dir_dest);

$date =  new DateClass();

$file_type = getConstant("backup_filetype");
$file_count = getConstant("backup_filecount")+0;
$file = $dir_dest. DS . time() . 'BackupDatabase' . getRandomString(7). "_" . time() . ".".$file_type;
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

$subject = "[LovaWeb - Thiết kế Website tại Đà Nẵng] ". $_SERVER['HTTP_HOST'] . " -  Database backup";
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

$noteBackup = "-- [MySQL -  Database Backup] Created time: ".$date->vnOther(time(), 'd/m/Y - H:i:s')."\n\n";
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

$message .= '<br>Backup process was successful.</font><br/><br/>-----<br/><a href="https://lovaweb.com" title="LovaWeb -Thiết kế Website tại Đà Nẵng"><font face="arial, helvetica, sans-serif" style="color: #2196F3; font-weight: bold;">Lovaweb - Thiết kế website tại Đà Nẵng</font></a>';

$emailToBackup = getConstant('backup_email');
if($emailToBackup=="") {
	echo "<script>alert('Tiến trình sao lưu cơ sở dữ liệu đã xong.')</script>";
}
else {
	$send_mail = sendMailFn('no-reply@'.$_SERVER['HTTP_HOST'], 'No-reply', $emailToBackup, '', $subject, $message, $file);
	if($send_mail == TRUE)
		echo "<script>alert('Tiến trình sao lưu cơ sở dữ liệu và gửi file sao lưu đến mail đều thành công.')</script>";
	else
		echo "<script>alert('Tiến trình sao lưu cơ sở dữ liệu đã thành công. Gửi file sao lưu đến mail thất bại.')</script>";
}

$currentdir = getCurrentDir($dir_dest);
rsort($currentdir);

echo showFileBackupData($currentdir, $dir_dest);