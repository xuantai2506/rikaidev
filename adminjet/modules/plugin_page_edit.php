<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
?>

<!-- Menu path -->
<div class="row">
	<h2 class="title_sp">Chỉnh sửa trang</h2>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>"> Trang chủ</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=plugin_page"> Quản lý nội dung</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=plugin_page"> Phần trang bổ sung</a>
		</li>
		<li>
			 Chỉnh sửa trang
		</li>
	</ol>
</div>
<!-- /.row -->
<?php
//
$page_id = isset($_GET['id']) ? $_GET['id']+0 : $page_id+0;
$db->table = "page";
$db->condition = "page_id = ".$page_id;
$db->order = "";
$db->select();
if($db->RowCount==0) loadPageAdmin("Trang bổ sung không tồn tại.","?".TTH_PATH."=plugin_page");


include_once (_A_TEMPLATES . DS . "plugin_page.php");
if(empty($typeFunc)) $typeFunc = "no";

$date = new DateClass();

$OK = false;
$error = '';
if($typeFunc=='edit'){
	if(empty($name)) $error = '<span class="show-error">Vui lòng nhập tên trang.</span>';
	else if(empty($alias)) $error = '<span class="show-error">Vui lòng nhập alias.</span>';
	else if(empty($content)) $error = '<span class="show-error">Vui lòng nhập nội dung chi tiết.</span>';
	else {
		$db->table = "page";
		$data = array(
			'alias'=>$db->clearText($alias),
			'name'=>$db->clearText($name),
			'comment'=>$db->clearText($comment),
			'content'=>$db->clearText($content),
			'is_active'=>$is_active+0,
			'modified_time'=>time(),
			'user_id'=>$_SESSION["user_id"]
		);
		$db->condition = "page_id = ".$page_id;
		$db->update($data);
		loadPageSucces("Đã chỉnh sửa Trang thành công.","?".TTH_PATH."=plugin_page");
		$OK = true;

	}
}
else {
	$db->table = "page";
	$db->condition = "page_id = ".$page_id;
	$rows = $db->select();
	foreach($rows as $row) {
		$alias              = $row['alias'];
		$name			    = $row['name'];
		$comment            = $row['comment'];
		$content            = $row['content'];
		$is_active		    = $row['is_active']+0;
	}
}
if(!$OK) pagePlugin("?".TTH_PATH."=plugin_page_edit", "edit", $page_id, $alias, $name, $comment, $content, $is_active, $error);
?>