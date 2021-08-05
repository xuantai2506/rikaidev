<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
?>

<!-- Menu path -->
<div class="row">
	<h2 class="title_sp">Chỉnh sửa nhóm</h2>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>">Trang chủ</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=core_role"> Quản trị hệ thống</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=core_role">Nhóm quản trị</a>
		</li>
		<li>
			Chỉnh sửa nhóm
		</li>
	</ol>
</div>
<!-- /.row -->
<?php
//
$role_id = isset($_GET['id']) ? $_GET['id']+0 : $role_id+0;
$db->table = "core_role";
$db->condition = "role_id = ".$role_id;
$db->order = "";
$db->select();
if($db->RowCount==0) loadPageAdmin("Nhóm không tồn tại.","?".TTH_PATH."=core_role");


include_once (_A_TEMPLATES . DS . "core_role.php");
if(empty($typeFunc)) $typeFunc = "no";

$OK = false;
$error = '';
if($typeFunc=='edit'){
	if(empty($name)) $error = '<span class="show-error">Vui lòng nhập Tên nhóm</span>';
	else {
		$db->table = "core_role";
		$data = array(
			'name'=>$db->clearText($name),
			'comment'=>$db->clearText($comment),
			'is_active'=>$is_active+0,
			'modified_time'=>time(),
			'user_id'=>$_SESSION["user_id"]
		);
		$db->condition = "role_id = ".$role_id;
		$db->update($data);
		loadPageSucces("Đã chỉnh sửa Nhóm thành công.","?".TTH_PATH."=core_role");
		$OK = true;

	}
}
else {
	$db->table = "core_role";
	$db->condition = "role_id = ".$role_id;
	$rows = $db->select();
	foreach($rows as $row) {
		$name			    = stripslashes($row['name']);
		$comment            = stripslashes($row['comment']);
		$is_active 		    = $row['is_active']+0;
	}
}
if(!$OK) grAdmin("?".TTH_PATH."=core_role_edit", "edit", $role_id, $name, $comment, $is_active, $error);
?>