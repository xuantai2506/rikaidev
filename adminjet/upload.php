<?php
// System
define( 'TTH_SYSTEM', true );
$_SESSION["language"] = isset($_GET["lang"]) ? $_GET["lang"] : 'en';
require_once('..' . DIRECTORY_SEPARATOR . 'define.php');
ini_set('max_execution_time', MAX_EXECUTION_TIME);

include_once(_A_FUNCTIONS . DS . "Function.php");
try {
	$db =  new ActiveRecord(TTH_DB_HOST, TTH_DB_USER, TTH_DB_PASS, TTH_DB_NAME);
}
catch(DatabaseConnException $e) {
	echo $e->getMessage();
}
include_once(_F_INCLUDES . DS . "_tth_constants.php");

// default
$dir_dest = ROOT_DIR . DS . 'uploads' . DS . 'photos';
$id     = $_GET['id']+0;
$type   = $_GET['type']+0;
$item   = (isset($_GET['item'])) ? $_GET['item'] : '';

$files_success = array();
$output = array();

if($type==1) {
	global $db;
	$images = array();
	foreach ($_FILES['images'] as $k => $l) {
		foreach ($l as $i => $v) {
			if (!array_key_exists($i, $images))
				$images[$i] = array();
			$images[$i][$k] = $v;
		}
	}

	// a flag to see if everything is ok
	$success = null;

	// loop and process files
	foreach ($images as $image) {
		$name_image = time() . "_" . $id . "_" . md5(uniqid());
		$imgUp = new Upload($image);
		$imgUp->file_max_size = FILE_MAX_SIZE;
		if ($imgUp->uploaded) {
			$imgUp->file_new_name_body      = 'full_' . $name_image;
			$imgUp->Process($dir_dest);
			
			$imgUp->file_new_name_body      = $name_image;
			$imgUp->image_resize            = true;
			$imgUp->image_ratio_crop        = true;
			$imgUp->image_x                 = 550;
			$imgUp->image_y                 = 400;
			$imgUp->Process($dir_dest);
			
			if($imgUp->processed) {
				// Insert database
				$filename = $imgUp->file_dst_name;
				$list_img = "";
				$db->table = "uploads_tmp";
				$db->condition = "upload_id = ".$id;
				$db->order = "";
				$db->limit = 1;
				$rows = $db->select();
				foreach ($rows as $row){
					$list_img = $row['list_img'];
				}
				$photos = $list_img . $filename.";";
				$db->table = "uploads_tmp";
				$data = array(
						'list_img'=>$db->clearText($photos)
				);
				$db->condition = "upload_id = ".$id;
				$db->update($data);

				// Success
				$success = true;
				$files_success[] = $filename;
			}
			else {
				$output =  array('error'=>$imgUp->error);
				$success = false;
			}
			
			$imgUp->file_new_name_body      = 'thm_' . $name_image;
			$imgUp->image_resize            = true;
			$imgUp->image_ratio_crop        = true;
			$imgUp->image_x                 = 120;
			$imgUp->image_y                 = 87;
			$imgUp->Process($dir_dest);

			$imgUp-> Clean();
		}
		else {
			$output =  array('error'=>$imgUp->error);
			$success = false;
			break;
		}
	}

	if($success == true) {
		if(count($files_success)>0) {
			for ($i = 0; $i < count($files_success); $i++) {
				if ($files_success[$i] != "" && file_exists($dir_dest . DS . $files_success[$i])) {
					$src = "/uploads/photos/" . $files_success[$i];
					$l_key = explode("_", $files_success[$i]);
					$key = $l_key[0];
					$url = '/uploads/upload.php?type=2&id='.$id.'&item='.$files_success[$i].'&lang='.TTH_LANGUAGE;
					$p1[$i] = "<a href='{$src}' data-gallery><img src='{$src}' class='file-preview-image'></a>";
					$p2[$i] =  array('url' => $url, 'key' => $key);
				}
			}
		}
		$output =  array(
				'initialPreview' => $p1,
				'initialPreviewConfig' => $p2,
				'append' => true
		);
	}
} elseif($type==2) {
	global $db;
	$list_img = "";
	$db->table = "uploads_tmp";
	$db->condition = "upload_id = ".$id;
	$db->order = 1;
	$rows = $db->select();
	foreach ($rows as $row){
		$list_img = $row['list_img'];
	}
	if($list_img!="") {
		$list_img = str_replace($item.';', '', $list_img);
		$mask = $dir_dest . DS . '*'.$item;
		if (glob($mask))
			array_map("unlink", glob($mask));
	}
	$db->table = "uploads_tmp";
	$data = array(
			'list_img'=>$db->clearText($list_img)
	);
	$db->condition = "upload_id = ".$id;
	$db->update($data);
}
// return a json encoded response for plugin to process successfully
echo json_encode($output);