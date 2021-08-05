<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
if(isset($_POST['role_id'])){

	$db->table = "core_privilege";
	$db->condition = "role_id = ".($_POST['role_id']+0) ." and type = '".$_POST['type']."'";
	$db->delete();

	$category = array();
	$category = (!empty($_POST['variable'])) ? $_POST['variable'] : '';

	if(!empty($_POST['variable'])){
		for($i=0; $i<count($category); $i++) {
			$db->table = "core_privilege";
			$data = array(
				'role_id'=>$_POST['role_id']+0,
				'type'=>$db->clearText($_POST['type']),
				'privilege_slug'=>$category[$i]
			);
			$db->insert($data);
		}
	}
}
echo "<script>alert('Cập nhật quyền quản trị thành công.')</script>";
if($_POST['type'] == 'category') echo showCoreCategory($_POST['role_id']+0);
if($_POST['type'] == 'article') echo showCoreArticle($_POST['role_id']+0);
if($_POST['type'] == 'product') echo showCoreProduct($_POST['role_id']+0);
if($_POST['type'] == 'bds_business') echo showCoreBdsBusiness($_POST['role_id']+0);
if($_POST['type'] == 'project') echo showCoreProject($_POST['role_id']+0);
if($_POST['type'] == 'tour') echo showCoreTour($_POST['role_id']+0);
if($_POST['type'] == 'car') echo showCoreCar($_POST['role_id']+0);
if($_POST['type'] == 'gift') echo showCoreGift($_POST['role_id']+0);
if($_POST['type'] == 'gallery') echo showCoreGallery($_POST['role_id']+0);
if($_POST['type'] == 'document') echo showCoreDocument($_POST['role_id']+0);
if($_POST['type'] == 'pages') echo showCorePages($_POST['role_id']+0);
if($_POST['type'] == 'backup') echo showCoreBackup($_POST['role_id']+0);
if($_POST['type'] == 'config') echo showCoreConfig($_POST['role_id']+0);
if($_POST['type'] == 'tool') echo showCoreTool($_POST['role_id']+0);
if($_POST['type'] == 'core') echo showCoreCore($_POST['role_id']+0);
if($_POST['type'] == 'info') echo showCoreInfo($_POST['role_id']+0);
if($_POST['type'] == 'location') echo showCoreLocation($_POST['role_id']+0);
if($_POST['type'] == 'road') echo showCoreRoad($_POST['role_id']+0);
if($_POST['type'] == 'street') echo showCoreStreet($_POST['role_id']+0);
if($_POST['type'] == 'direction') echo showCoreDirection($_POST['role_id']+0);
if($_POST['type'] == 'prjname') echo showCorePrjname($_POST['role_id']+0);
if($_POST['type'] == 'others') echo showCoreOthers($_POST['role_id']+0);