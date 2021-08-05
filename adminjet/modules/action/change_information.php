<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
$type = $_POST['type'];
$date = new DateClass();
$user_id =  $_SESSION["user_id"];
$OK = false;
if($type=='updateInfo') {

	$db->table = "core_user";
	$db->condition = "user_id = ".$_SESSION["user_id"]." and password = '".md5($_SESSION["admin_user"].$_POST['passwordold'])."'";
	$db->order = "";
	$db->select();
	if($db->RowCount>0) {

		$handleUploadImg = false;
		$file_max_size = FILE_MAX_SIZE;
		$dir_dest = ROOT_DIR . DS . 'uploads' . DS . 'user';
		$file_size = $_FILES['img']['size'];
		if($file_size>0) {
			$imgUp = new Upload($_FILES['img']);
			$imgUp->file_max_size = $file_max_size;
			if ($imgUp->uploaded) {
				$handleUploadImg = true;
				$OK = true;
			}
			else {
				$error = '<span class="show-error">Lỗi tải hình: '.$imgUp->error.'</span>';
			}
		}
		else {
			$handleUploadImg = false;
			$OK = true;
		}

		if($OK) {

			$db->table = "core_user";
			$data = array(
				'full_name' => $db->clearText($_POST['full_name']),
				'gender'=>($_POST['gender']+0),
				'birthday'=>strtotime($date->dmYtoYmd($_POST['birthday'])),
				'apply'=>$db->clearText($apply),
				'email' => $db->clearText($_POST['email']),
				'phone' => $db->clearText($_POST['phone']),
				'address' =>$db->clearText($_POST['address']),
				'modified_time' => time(),
				'user_id_edit' => $user_id
			);
			$db->condition = "user_id = " . $user_id;
			$db->update($data);

			if($handleUploadImg) {
				$img = $_POST['img'];
				$stringObj = new String();
				if(glob($dir_dest . DS .'*'.$img)) array_map("unlink", glob($dir_dest . DS .'*'.$img));

				$img_name_file = 'u_' . time() . "_" . md5(uniqid());
				$imgUp->file_new_name_body      = $img_name_file;
				$imgUp->image_resize            = true;
				$imgUp->image_ratio_crop        = true;
				$imgUp->image_x                 = 200;
				$imgUp->image_y                 = 200;
				$imgUp->Process($dir_dest);
				if($imgUp->processed) {
					$name_img = $imgUp->file_dst_name;
					$db->table = "core_user";
					$data = array(
						'img' => $db->clearText($name_img)
					);
					$db->condition = "user_id = " . $user_id;
					$db->update($data);
				}
				else {
					loadPageAdmin("Lỗi tải hình: ".$imgUp->error,"?". TTH_PATH . "=core_user");
				}
				$imgUp->file_new_name_body      = 'sm_' . $img_name_file;
				$imgUp->image_resize            = true;
				$imgUp->image_ratio_crop        = true;
				$imgUp->image_x                 = 90;
				$imgUp->image_y                 = 90;
				$imgUp->Process($dir_dest);
				$imgUp-> Clean();
			}
			echo "<script>alert('Thực hiện cập nhật thông tin cá nhân thành công.')</script>";
		}
		echo showInformation($user_id);
	}  else {
		echo "<script>alert('Nhập mật khẩu hiện tại không đúng, vui lòng kiểm tra lại.')</script>";
		echo showInformation($user_id);
	}
} else if($type=='updatePass') {

	$db->table = "core_user";
	$db->condition = "user_id = ".$_SESSION["user_id"]." and password = '".md5($_SESSION["admin_user"].$_POST['password2old'])."'";
	$db->order = "";
	$db->select();
	if($db->RowCount>0) {
		$db->table = "core_user";
		$data = array(
			'password'=>md5($_SESSION["admin_user"].$_POST['password'])
		);
		$db->condition = "user_id = ".$_SESSION["user_id"];
		$db->update($data);
		echo "<script>alert('Thực hiện đổi mật khẩu thành công.');</script>";
		echo showChangePassword();
		echo '<head><meta http-equiv="Refresh" content="3, ?active=change_pass_success"></head>';
		die();
	} else {
		echo "<script>alert('Nhập mật khẩu hiện tại không đúng, vui lòng kiểm tra lại.')</script>";
		echo showChangePassword();
	}
} else echo "<script>alert('Lỗi hệ thống!')</script>";
?>
