<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
if(isset($_POST['id'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$stringObj = new String();
	$slug = $stringObj->getSlug($name);

	$db->table = $id."_menu";
	$db->condition = "slug = '".$slug."'";
	$db->order = "";
	$db->limit = "";
	$db->select();
	if($db->RowCount > 0) {
		$slug = $slug. '-' .$stringObj->getSlug(getRandomString(10));
	}
	echo $slug;
}