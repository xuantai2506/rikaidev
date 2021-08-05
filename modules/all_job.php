<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }

$date = new DateClass();
$stringObj = new String();

//---------------[ box-wp BEGIN ]---------------------------
$category_id = 0;
$breadcrumb = '';

$db->table = "category";
$db->condition = "is_active = 1 and slug = '".$slug_cat."'";
$db->order = "";
$db->limit = 1;
$rows = $db->select();
foreach ($rows as $row) {
	$category_id = $row['category_id']+0;
	
}
if($id_menu > 0) {
	$parent = 0;
	$db->table = "article_menu";
	$db->condition = "article_menu_id = " . $id_menu;
	$db->order = "";
	$db->limit = 1;
	$rows = $db->select();
	if($db->RowCount>0) {
		foreach ($rows as $row) {
			
		}
	}
}
include(_F_INCLUDES . DS . "tth_banner.php");
//-------------------------------------------------------------------------------
if ($id_article > 0){
	$id = $id_article;
	include(_F_TEMPLATES . DS . "show_article_all_job.php");
} else if($id_menu <= 0) {
	$loc = array();
	$db->table = "article_menu";
	$db->condition = "is_active = 1 and category_id = ".$category_id;
	$db->order = "sort ASC";
	$db->limit = "";
	$rows = $db->select();
	$stt=0;
	foreach($rows as $row) {
		$loc[$stt] = $row['article_menu_id'];
		$stt++;
	}
	$loc = implode(',',$loc);
	$db->table = "article";
	$db->condition = "is_active = 1 and article_menu_id IN (".$loc.")";
	$db->order = "created_time DESC";
	$db->limit = "";
	$rows = $db->select();

	$total = $db->RowCount;
	if($total>1) {
		$total_pages = 0;
		$per_page = 10;
		if($total%$per_page==0) $total_pages = $total/$per_page;
		else $total_pages = floor($total/$per_page)+1;
		if($page<=0) $page=1;
		$start=($page-1)*$per_page;

		$db->table = "article";
		$db->condition = "is_active = 1 and article_menu_id IN (".$loc.")";
		$db->order = "created_time DESC";
		$db->limit = $start.','.$per_page;
		$rows = $db->select();
		$i = 0; 
			include(_F_TEMPLATES . DS . "show_list_article_all_job.php");
	}
	else if ($total==1) {
		$id = 0;
		foreach($rows as $row) {
			$id = $row['article_id'];
		}
		include(_F_TEMPLATES . DS . "show_article_all_job.php");
	}
	else include(_F_MODULES . DS . "_updating.php");

} else {
	$slug_submenu = "";
	$parent = false;
	$db->table = "article_menu";
	$db->condition = "is_active = 1 and article_menu_id = ".$id_menu;
	$db->order = "";
	$db->limit = 1;
	$rows = $db->select();
	foreach($rows as $row) {
		$slug_submenu =  $row['slug'];
		$parent = ($row['parent']+0 == 0) ? true : false;
	}
	if($parent) {
		$loc = array();
		$db->table = "article_menu";
		$db->condition = "is_active = 1 and parent = ".$id_menu;
		$db->order = "sort ASC";
		$db->limit = "";
		$rows = $db->select();
		$stt=0;
		if($db->RowCount>0) {
			foreach($rows as $row) {
				$loc[$stt] = $row['article_menu_id'];
				$stt++;
			}
			$loc = implode(',',$loc);
			$loc = $id_menu . ','.$loc;
		} else {
			$loc = $id_menu;
		}
	} else {
		$loc = $id_menu;
	}

	$db->table = "article";
	$db->condition = "is_active = 1 and article_menu_id IN (".$loc.")";
	$db->order = "created_time DESC";
	$db->limit = "";
	$rows = $db->select();

	$total = $db->RowCount;
	if($total>1) {
		$total_pages = 0;
		$per_page = 10;
		if($total%$per_page==0) $total_pages=$total/$per_page;
		else $total_pages = floor($total/$per_page)+1;
		if($page<=0) $page=1;
		$start=($page-1)*$per_page;

		$db->table = "article";
		$db->condition = "is_active = 1 and article_menu_id IN (".$loc.")";
		$db->order = "created_time DESC";
		$db->limit = $start.','.$per_page;
		$rows = $db->select();
		$i = 0;
			include(_F_TEMPLATES . DS . "show_list_article_all_job.php");
	}
	else if ($total==1) {
		$id = 0;
		foreach($rows as $row) {
			$id = $row['article_id'];
		}
		include(_F_TEMPLATES . DS . "show_article_all_job.php");
	}
	else include(_F_MODULES . DS . "_updating.php");
}