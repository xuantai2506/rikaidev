<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
function memberUser($act, $typeFunc, $user_id, $role_id, $user_name, $full_name, $gender, $birthday, $apply, $email, $phone, $address, $comment, $is_show, $img, $is_active, $vote, $error) {
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default khoangcach">
			<div class="panel-body">
				<form action="<?php echo $act?>" method="post" enctype="multipart/form-data" name="member" id="memberUser">
					<input type="hidden" name="typeFunc" value="<?php echo $typeFunc?>" />
					<input type="hidden" name="userId" value="<?php echo $user_id?>" />
					<input type="hidden" name="img" value="<?php echo $img?>" />
					<div class="panel-show-error">
						<?php echo $error?>
					</div>
					<table class="table table-hover" style="width: 70%;">
						<tr>
							<td width="150px"><label>Tên đăng nhập:</label></td>
							<td><input class="form-control" type="text" name="user_name" id="user_name" <?php echo ($typeFunc=='edit') ? "readonly" : "" ?> autocomplete="off" value="<?php echo stripslashes($user_name)?>" maxlength="16" ></td>
						</tr>
						<tr>
							<td><label>Mật khẩu mới:</label></td>
							<td><input class="form-control" type="password" name="password" id="password" value="" autocomplete="off" maxlength="16"></td>
						</tr>
						<tr>
							<td><label>Nhập lại mật khẩu:</label></td>
							<td><input class="form-control" type="password" name="rePassword" id="rePassword" value="" autocomplete="off" maxlength="16"></td>
						</tr>
						<tr>
							<td><label>Nhóm quản trị:</label></td>
							<td>
								<?php echo groupAdminSelect($role_id); ?>
							</td>
						</tr>
						<tr>
							<td><label>Họ và tên:</label></td>
							<td><input class="form-control" type="text" name="full_name" id="full_name" value="<?php echo stripslashes($full_name)?>" autocomplete="off" maxlength="150" ></td>
						</tr>
						<tr>
							<td><label>Giới tính:</label></td>
							<td>
								<select class="form-control" name="gender" id="gender" style="width: 120px;">
									<option value="0" <?php echo $gender==0?"selected":""?>>Khác...</option>
									<option value="1" <?php echo $gender==1?"selected":""?>>Nam</option>
									<option value="2" <?php echo $gender==2?"selected":""?>>Nữ</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label>Ngày sinh:</label></td>
							<td><input class="form-control input-datetime" type="text" name="birthday" style="width: 120px;" value="<?php echo $birthday?>"></td>
						</tr>
						<tr>
							<td><label>Vị trí (công ty):</label></td>
							<td><input class="form-control" type="text" name="apply" id="apply" value="<?php echo stripslashes($apply)?>" autocomplete="off" maxlength="255"></td>
						</tr>
						<tr>
							<td><label>Email:</label></td>
							<td><input class="form-control" type="email" name="email" id="email" value="<?php echo stripslashes($email)?>" autocomplete="off" maxlength="200" ></td>
						</tr>
						<tr>
							<td><label>Số điện thoại:</label></td>
							<td><input class="form-control" type="text" name="phone" id="phone" value="<?php echo stripslashes($phone)?>" autocomplete="off" maxlength="20"></td>
						</tr>
						<tr>
							<td><label>Facebook:</label></td>
							<td><input class="form-control" type="text" name="address" id="address" value="<?php echo stripslashes($address)?>" autocomplete="off" maxlength="255"></td>
						</tr>
						<tr>
							<td><label>Giới thiệu:</label></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2">
								<textarea class="form-control" name="comment" id="comment"><?php echo stripslashes($comment)?></textarea>
							</td>
						</tr>
						<tr>
							<td class="ver-top"><label>Hình đại diện:</label></td>
							<td>
								<input class="form-control file file-img" type="file" name="img" data-show-upload="false" data-max-file-count="1" accept="image/*">
							</td>
						</tr>
						<tr>
							<td><label>Hiển thị:</label> <i>(giới thiệu)</i></td>
							<td>
								<label class="radio-inline"><input type="radio" name="is_show" value="0" <?php echo $is_show==0?"checked":""?> > Đóng</label>
								<label class="radio-inline"><input type="radio" name="is_show" value="1" <?php echo $is_show==1?"checked":""?> > Mở</label>
							</td>
						</tr>
						<tr>
							<td><label>Sao *:</label></td>
							<td>
								<select class="form-control" name="vote" style="width: 150px; color: #fcdf26; font-size: 1.3em; line-height: 1em;">
									<option value="1" <?php if($vote==1) echo 'selected'; ?>>★</option>
									<option value="2" <?php if($vote==2) echo 'selected'; ?>>★ ★</option>
									<option value="3" <?php if($vote==3) echo 'selected'; ?>>★ ★ ★</option>
									<option value="4" <?php if($vote==4) echo 'selected'; ?>>★ ★ ★ ★</option>
									<option value="5" <?php if($vote==5) echo 'selected'; ?>>★ ★ ★ ★ ★</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label>Trạng thái:</label></td>
							<td>
								<label class="radio-inline"><input type="radio" name="is_active" value="0" <?php echo $is_active==0?"checked":""?> > Đóng</label>
								<label class="radio-inline"><input type="radio" name="is_active" value="1" <?php echo $is_active==1?"checked":""?> > Mở</label>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center" class="kc_button">
								<button type="submit" class="btn btn-form-primary btn-form" id="user">Đồng ý</button> &nbsp;
								<button type="reset" class="btn btn-form-success btn-form">Làm lại</button> &nbsp;
								<button type="button" class="btn btn-form-info btn-form" onclick="location.href='?<?php echo TTH_PATH?>=core_user'">Thoát</button>
							</td>
						</tr>
					</table>
				</form>
				<script>
					<?php echo ($typeFunc=='add') ? "window.onload=checkAddUser();" : "window.onload=checkEditUser();" ?>
				</script>
			</div>
		</div>
	</div>
</div>
<script>
	CKEDITOR.replace('comment', {
			height: 400}
	);
	$('.input-datetime').datetimepicker({
		mask:'39/19/9999',
		lang:'vi',
		timepicker: false,
		format:'<?php echo TTH_DATE_FORMAT?>',
		closeOnDateSelect:true
	});
	$('.file-img').fileinput({
		<?php if($img!='no' && $img!='') { ?>
		initialPreview: [
			"<img src='../uploads/user/<?php echo $img?>' class='file-preview-image' title='<?php echo $img?>' alt='<?php echo $img?>'>"
		],
		<?php } ?>
		allowedFileExtensions : ['jpg', 'png','gif']
	});
</script>
<?php
}

function groupAdminSelect($id) {
	echo '<select class="form-control" required="required" name="role_id">';
	global $db;
	$db->table = "core_role";
	$db->condition = "";
	$db->order = "role_id ASC";
	$db->limit = "";
	$rows = $db->select();
	foreach($rows as $row) {
		echo "<option value='".$row["role_id"]."'";
		if ($id==$row["role_id"]) echo " selected ";
		echo ">".stripslashes($row["name"])."</option>";
	}
	echo '</select>';
}

function sortUser(){
	global $db;
	$db->table = "core_user";
	$db->condition = "is_active = 1";
	$db->limit = "";
	$db->select();
	return $db->RowCount;
}