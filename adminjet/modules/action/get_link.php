<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
if(isset($_POST['id'])) {
	$id = intval($_POST['id']);
	$name = isset($_POST['name']) ? $_POST['name'] : '';
	//---
	$stringObj = new String();
	$slug = $stringObj->getSlug($name);

	$db->table = "link";
	$db->condition = "link LIKE '". $db->clearText($slug) . "'";
	$db->order = "";
	$db->limit = 1;
	$rows = $db->select();
	foreach($rows as $row) {
		if($row['link_id']!=$id) $slug = $stringObj->getSlug( $slug . '-' . getRandomString(10));
	}
	echo $slug;
}