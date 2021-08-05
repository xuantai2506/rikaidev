<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
?>

<!-- Menu path -->
<div class="row">
	<h2 class="title_sp">Thêm nhóm</h2>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>">Trang chủ</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=core_role">Quản trị hệ thống</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=core_role"> Nhóm quản trị</a>
		</li>
		<li>
		 Thêm nhóm
		</li>
	</ol>
</div>
<!-- /.row -->
<?php
include_once (_A_TEMPLATES . DS . "core_role.php");
if(empty($typeFunc)) $typeFunc = "no";

$OK = false;
$error = '';
if($typeFunc=='add'){
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
		$db->insert($data);
		loadPageSucces("Đã thêm Nhóm thành công.","?".TTH_PATH."=core_role");
		$OK = true;
	}
}
else {
	$name			= "";
	$comment        = "";
	$is_active		= 1;
}
if(!$OK) grAdmin("?".TTH_PATH."=core_role_add", "add", 0, $name, $comment, $is_active, $error);
?>