<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
if(isset($_POST['name'])) {
	$name = $_POST['name'];
	$stringObj = new String();
	$slug = $stringObj->getSlug($name);
	echo $slug;
}