<?php
	if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
	//
	?>

<!-- Menu path -->
<div class="row">
	<h2 class="title_sp">Thêm trang</h2>
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
			 Thêm trang
		</li>
	</ol>
</div>
<!-- /.row -->
<?php
include_once (_A_TEMPLATES . DS . "plugin_page.php");
if(empty($typeFunc)) $typeFunc = "no";

$date = new DateClass();

$OK = false;
$error = '';
if($typeFunc=='add'){
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
		$db->insert($data);
		loadPageSucces("Đã thêm Trang bổ sung thành công.","?".TTH_PATH."=plugin_page");
		$OK = true;
	}
}
else {
	$alias			= "";
	$name			= "";
	$comment        = "";
	$content        = "";
	$is_active		= 1;
}
if(!$OK) pagePlugin("?".TTH_PATH."=plugin_page_add", "add", 0, $alias, $name, $comment, $content, $is_active, $error);
?>