<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
$category_id = $menu_id = 0;
$others_id = isset($_GET['id']) ? $_GET['id']+0 : $others_id+0;
$db->table = "others";
$db->condition = "`others_id` = $others_id";
$db->order = "";
$db->limit = 1;
$rows = $db->select();
foreach($rows as $row) {
	$menu_id = $row['others_menu_id']+0;
}
if($db->RowCount==0) loadPageAdmin("Mục không tồn tại.","?".TTH_PATH."=others_manager");
// ---------------
$db->table = "others_menu";
$db->condition = "`others_menu_id` = $menu_id";
$db->order = "";
$db->limit = 1;
$rows = $db->select();
$category_id = 0;
foreach($rows as $row) {
	$category_id =	$row["category_id"]+0;
}
?>
<!-- Menu path -->
<div class="row">
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>"><i class="fa fa-home"></i> Trang chủ</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=others_manager"><i class="fa fa-edit"></i> Quản lý nội dung</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=others_manager"><i class="fa fa-puzzle-piece"></i> Dữ liệu khác</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=others_list&id=<?php echo $menu_id?>"><i class="fa fa-list"></i> <?php echo getNameMenu($menu_id, 'others')?></a>
		</li>
		<li>
			<i class="fa fa-cog"></i> Chỉnh sửa mục
		</li>
	</ol>
</div>
<!-- /.row -->
<?php
include_once (_A_TEMPLATES . DS . "others.php");
if(empty($typeFunc)) $typeFunc = "no";

$date = new DateClass();

$OK = false;
$error = '';
if($typeFunc=='edit'){
	if(empty($name)) $error = '<span class="show-error">Vui lòng nhập tiêu đề.</span>';
	else {
		if($others_menu_id!=8) {
			$name = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
		}

		$id_query = 0;
		// Link SEO
		$slug = (empty($slug)) ? $name : $slug;
		$slug = updateLinkSEO($slug, $category_id, $others_menu_id, $others_id, 'update');

		$db->table = "others";
		$data = array(
			'others_menu_id'=>$others_menu_id+0,
			'name'=>$db->clearText($name),
			'slug'=>$db->clearText($slug),
			'p_from'=>strtotime($date->dmYtoYmd($p_from)),
			'p_to'=>$p_to,
			'is_active'=>$is_active+0,
			'hot'=>$hot+0,
			'modified_time'=>time(),
			'user_id'=>$_SESSION["user_id"]
		);
		$db->condition = "`others_id` = $others_id";
		$db->update($data);
		loadPageSucces("Đã chỉnh sửa mục thành công.", "?".TTH_PATH."=others_list&id=".$others_menu_id);
	}
}
else {
	$db->table = "others";
	$db->condition = "others_id = $others_id";
	$db->limit = 1;
	$rows = $db->select();
	foreach($rows as $row) {
		$others_menu_id    = $row['others_menu_id']+0;
		$name			    = $row['name'];
		$slug               = $row['slug'];
		$p_from			    = $date->vnDate($row['p_from']);
		$p_to			    = $row['p_to'];
		$is_active		    = $row['is_active']+0;
		$hot			    = $row['hot']+0;
	}
}
if(!$OK) others("?".TTH_PATH."=others_edit", "edit", $others_id, $others_menu_id, $name, $slug, $p_from, $p_to, $is_active, $hot, $error);