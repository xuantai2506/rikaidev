<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }


$slug_cat = empty($path[1]) ? 'home' : $path[1];
$id_category = $id_menu = $id_article = 0;
$page = (isset($_GET['p'])) ? $_GET['p'] : 0;
//---
if($slug_cat!='adminjet' && $slug_cat!='admin' && $slug_cat!='login') {
    $db->table = "link";
    $db->condition = "`link` LIKE '". $db->clearText($slug_cat) . "'";
    $db->order = "";
    $db->limit = 1;
    $rows = $db->select();
    if($db->RowCount>0) {
        foreach($rows as $row) {
            $id_category = intval($row['category']);
            $id_menu = intval($row['menu']);
            $id_article = intval($row['post']);
            if($id_category>0) $slug_cat = getSlugCategory($row['category']);
        }
    } else {
        $slug_cat = '-error-404';
    }
}
//---
if($slug_cat=='adminjet' || $slug_cat=='admin' || $slug_cat=='login') {
    exit(header('Location: ' . HOME_URL . ADMIN_DIR));
} elseif(!file_exists(_F_MODULES . DS .  str_replace('-','_',$slug_cat) . ".php")) {
    $slug_cat = '-error-404';
    $id_category = $id_menu = $id_article = 0;
}
