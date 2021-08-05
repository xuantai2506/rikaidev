<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }

$timexpired = 1800;
$timeout = time() - $timexpired;

$db->table = "online";
$db->condition = "created_time <".$timeout;
$db->delete();

$db->table = "online";
$db->optimize();

if (empty($HTTP_X_FORWARDED_FOR)) $IP_NUMBER = getenv("REMOTE_ADDR");
else $IP_NUMBER = $HTTP_X_FORWARDED_FOR;
$url = getenv("QUERY_STRING");

$db->table = "online";
$db->condition = "ip = '".$db->clearText($IP_NUMBER)."' and user_id=0";
$db->order = "";
$db->limit = "";
$db->select();
$numRows = $db->RowCount;
if($numRows != 0) {
	$db->table = "online";
	$data = array(
		'created_time'=>time(),
		'site'=>$db->clearText($url),
		'agent'=>$db->clearText(getenv("HTTP_USER_AGENT"))
	);
	$db->condition = "ip = '".$db->clearText($IP_NUMBER)."' and user_id=0";
	$db->update($data);

} else {
	$db->table = "online";
	$data = array(
		'ip'=>$db->clearText($IP_NUMBER),
		'created_time'=>time(),
		'site'=>$db->clearText($url),
		'agent'=>$db->clearText(getenv("HTTP_USER_AGENT")),
		'user_id'=>0
	);
	$db->insert($data);

	$date = new DateClass();

	$sum = 0;
	$db->table = "online_daily";
	$db->condition = "date = '".$date->vnOther(time(),'Y-m-d')."'";
	$db->order = "";
	$db->limit = "";
	$rows = $db->select();
	foreach ($rows as $row){
		$sum = $row['count'];
	}
	if($db->RowCount != 0) {
		$db->table = "online_daily";
		$data = array(
			'count'=>$sum+1
		);
		$db->condition = "date = '".$date->vnOther(time(),'Y-m-d')."'";
		$db->update($data);

	}
	else {
		$db->table = "online_daily";
		$data = array(
			'date'=>$date->vnOther(time(),'Y-m-d'),
			'count'=>1
		);
		$db->insert($data);
	}
}