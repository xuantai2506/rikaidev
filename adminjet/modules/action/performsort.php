<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
if(isset($_POST['type'])) {
	$type = $_POST['type'];
	$id =  isset($_POST['q']) ? $_POST['q']+0 : 0;
	$sort =  isset($_POST['sort']) ? $_POST['sort']+0 : 0;

	$db->table = $type;
	$data = array(
		'sort'=>$sort,
		'modified_time'=>time()
	);
	$db->condition = $type."_id = ".$id;
	$db->update($data);
}