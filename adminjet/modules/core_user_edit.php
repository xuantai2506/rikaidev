<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
?>

<!-- Menu path -->
<div class="row">
	<h2 class="title_sp">Chỉnh sửa thành viên</h2>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>">Trang chủ</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=core_user"> Quản trị hệ thống</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=core_user"> Quản lý thành viên</a>
		</li>
		<li>
			 Chỉnh sửa thành viên
		</li>
	</ol>
</div>
<!-- /.row -->
<?php
//
$user_id = isset($_GET['id']) ? $_GET['id']+0 : $userId+0;
$db->table = "core_user";
$db->condition = "user_id = ".$user_id;
$db->order = "";
$db->select();
if($db->RowCount==0) loadPageAdmin("Thành viên không tồn tại.", "?".TTH_PATH."=core_user");


include_once (_A_TEMPLATES . DS . "core_user.php");
if(empty($typeFunc)) $typeFunc = "no";

$date = new DateClass();
$OK = false;
$error = '';
if($typeFunc=='edit'){
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
		$full_name = mb_convert_case($full_name, MB_CASE_TITLE, "UTF-8");

		$db->table = "core_user";
		if(empty($password)) {
			$data = array(
				'role_id'=>$role_id+0,
				'full_name'=>$db->clearText($full_name),
				'gender'=>$gender + 0,
				'birthday'=>strtotime($date->dmYtoYmd($birthday)),
				'apply'=>$db->clearText($apply),
				'email'=>$db->clearText($email),
				'phone'=>$db->clearText($phone),
				'address'=>$db->clearText($address),
				'comment'=>$db->clearText($comment),
				'is_show'=>$is_show+0,
				'is_active'=>$is_active+0,
				'vote'=>$vote+0,
				'click_vote'=>1,
				'modified_time'=>time(),
				'user_id_edit'=>$_SESSION["user_id"]
			);
		} else {
			$data = array(
				'role_id'=>$role_id+0,
				'password'=>md5($user_name.$password),
				'full_name' => $db->clearText($full_name),
				'gender'=>$gender+0,
				'birthday'=>strtotime($date->dmYtoYmd($birthday)),
				'apply'=>$db->clearText($apply),
				'email'=>$db->clearText($email),
				'phone'=>$db->clearText($phone),
				'address'=>$db->clearText($address),
				'comment'=>$db->clearText($comment),
				'is_show'=>0,
				'is_active'=>$is_active+0,
				'vote'=>$vote+0,
				'click_vote'=>1,
				'modified_time'=>time(),
				'user_id_edit'=>$_SESSION["user_id"]
			);
		}
		$db->condition = "user_id = " . $user_id;
		$db->update($data);

		if($handleUploadImg) {
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
		loadPageSucces("Đã chỉnh sửa Thành viên thành công.", "?" . TTH_PATH . "=core_user");
		$OK = true;
	}
}
else {
	$db->table = "core_user";
	$db->condition = "user_id = ".$user_id;
	$db->order = "";
	$rows = $db->select();
	foreach ($rows as $row) {
		$role_id		= $row['role_id']+0;
		$user_name      = $row['user_name'];
		$full_name      = stripslashes($row['full_name']);
		$gender         = $row['gender']+0;
		$birthday       = $date->vnDate($row['birthday']);
		$apply          = $row['apply'];
		$email          = $row['email'];
		$phone          = $row['phone'];
		$address        = stripslashes($row['address']);
		$comment        = $row['comment'];
		$img            = $row['img'];
		$is_show        = $row['is_show']+0;
		$is_active		= $row['is_active']+0;
		$vote           = round($row['vote']/$row['click_vote']);
	}
}
if(!$OK) memberUser("?".TTH_PATH."=core_user_edit", "edit", $user_id, $role_id, $user_name, $full_name, $gender, $birthday, $apply, $email, $phone, $address, $comment, $is_show, $img, $is_active, $vote, $error);
?>