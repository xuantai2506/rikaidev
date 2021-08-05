<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
if(isset($_POST['id'])) {
	$id = $_POST['id']+0;
	$type = isset($_POST['type']) ? $_POST['type'] : '';
	$table = isset($_POST['table']) ? $_POST['table'] : '';
	$status = isset($_POST['status']) ? $_POST['status']+0 : 0;

	$db->table = $table;
	$data = array(
		$type => $status,
		'modified_time' => time()
	);
	$db->condition = $table."_id = ".$id;
	$db->update($data);
}