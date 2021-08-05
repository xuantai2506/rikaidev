<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
?>

<!-- Menu path -->
<div class="row">
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>"><i class="fa fa-home"></i> Trang chủ</a>
		</li>
		<li>
			<i class="fa fa-flag"></i> Thay đổi ngôn ngữ của CSDL
		</li>
	</ol>
</div>
<!-- /.row -->
<?php
if(isset($_GET['lang'])) {
	$lang = $_GET['lang'];
	if(in_array($lang, array('en', 'vi','cn','jp'))) {
		$_SESSION["lang_admin"] = $lang;
		loadPageSucces("Thay đổi ngôn ngữ CSDL thành công.", ADMIN_DIR);
	} else {
		loadPageAdmin("Ngôn ngữ không tồn tại trong CSDL, vui lòng thực hiện lại.", ADMIN_DIR);
	}

} else {
	loadPageAdmin("Ngôn ngữ rỗng, vui lòng thực hiện lại.", ADMIN_DIR);
}
