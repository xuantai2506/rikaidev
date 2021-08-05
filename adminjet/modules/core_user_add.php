<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
?>

<!-- Menu path -->
<div class="row">
	<h2 class="title_sp">Thêm thành viên</h2>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>"> Trang chủ</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=core_user">Quản trị hệ thống</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=core_user"> Quản lý thành viên</a>
		</li>
		<li>
			Thêm thành viên
		</li>
	</ol>
</div>
<!-- /.row -->
<?php
include_once (_A_TEMPLATES . DS . "core_user.php");
if(empty($typeFunc)) $typeFunc = "no";

$date = new DateClass();
$OK = false;
$error = '';
if($typeFunc=='add'){
	$db->table = "core_user";
	$db->condition = "user_name = '".$user_name."'";
	$db->order = "";
	$db->select();
	if($db->RowCount>0) $error = '<span class="show-error">Tên đăng nhập này đã tồn tại</span>';
	else {
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
			$id_query = 0;
			$full_name = mb_convert_case($full_name, MB_CASE_TITLE, "UTF-8");

			$db->table = "core_user";
			$data = array(
				'role_id'=>$role_id+0,
				'user_name'=>$db->clearText($user_name),
				'password'=>$db->clearText(md5($user_name.$password)),
				'full_name'=>$db->clearText($full_name),
				'gender'=>$gender+0,
				'birthday'=>strtotime($date->dmYtoYmd($birthday)),
				'apply'=>$db->clearText($apply),
				'email'=>$db->clearText($email),
				'phone'=>$db->clearText($phone),
				'address'=>$db->clearText($address),
				'comment'=>$db->clearText($comment),
				'is_show'=>$is_show+0,
				'sort'=>sortUser()+1,
				'is_active'=>$is_active+0,
				'vote'=>$vote+0,
				'click_vote'=>1,
				'created_time'=>time(),
				'user_id_edit' => $_SESSION["user_id"]
			);
			$db->insert($data);
			$id_query = $db->LastInsertID;

			if($handleUploadImg) {
				$stringObj = new String();

				$img_name_file = 'u_' . time() . "_" . md5(uniqid());

				$imgUp->file_new_name_body      = $img_name_file;
				$imgUp->image_resize            = true;
				$imgUp->image_ratio_crop        = true;
				$imgUp->image_x                 = 200;
				$imgUp->image_y                 = 200;
				$imgUp->Process($dir_dest);

				if ($imgUp->processed) {
					$name_img = $imgUp->file_dst_name;
					$db->table = "core_user";
					$data = array(
						'img' => $db->clearText($name_img)
					);
					$db->condition = "`user_id` = $id_query";
					$db->update($data);
				} else {
					loadPageAdmin("Lỗi tải hình: " . $imgUp->error, "?" . TTH_PATH . "=core_user");
				}
				$imgUp->file_new_name_body      = 'sm_' . $img_name_file;
				$imgUp->image_resize            = true;
				$imgUp->image_ratio_crop        = true;
				$imgUp->image_x                 = 90;
				$imgUp->image_y                 = 90;
				$imgUp->Process($dir_dest);
				$imgUp->Clean();
			}
			loadPageSucces("Đã thêm Thành viên thành công.","?".TTH_PATH."=core_user");
			$OK = true;
		}
	}
}
else {
	$role_id		= 0;
	$user_name      = "";
	$full_name      = "";
	$gender         = 0;
	$birthday       = '01/01/1990';
	$apply          = '';
	$email          = "";
	$phone          = "";
	$address        = "";
	$comment        = '';
	$img            = "";
	$is_show        = 1;
	$is_active		= 1;
	$vote           = 3;
}
if(!$OK) memberUser("?".TTH_PATH."=core_user_add", "add", 0, $role_id, $user_name, $full_name, $gender, $birthday, $apply, $email, $phone, $address, $comment, $is_show, $img, $is_active, $vote, $error);
?>