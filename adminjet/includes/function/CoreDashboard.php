<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
/**
 * Cập nhật quyền quản trị: Quản lý nội dung > Chung
 * @param $role_id
 */
function showCoreCategory ($role_id) {
	global $db;

	$privilege = array();
	$db->table = "core_privilege";
	$db->condition = "role_id = ".$role_id. " and type = 'category'";
	$db->order = "";
	$db->limit = "";
	$rows = $db->select();
	$stt = 0;
	foreach ($rows as $row) {
		$privilege[$stt] = $row['privilege_slug'];
		$stt++;
	}
	?>
	<input type="hidden" name="role_id" value="<?php echo $role_id?>" />
	<div class="form-group">
		<div style="padding: 10px; border-left: 1px solid #ddd;">
			<div class="checkbox">
				<label>
					<input type="checkbox" id="selecctallCategory" value="ok" ><b>Chọn tất cả / Hủy tất cả</b>
				</label>
			</div>
		<?php
		$db->table = "category_type";
		$db->condition = "is_active = 1";
		$db->order = "sort ASC";
		$rows = $db->select();
		foreach($rows as $row) {
			?>
			<div class="checkbox">
				<label>
					<input type="checkbox" class="checkboxCategory" name="variable[]" <?php echo (in_array($row['slug'],$privilege)) ? "checked" : "" ?> value="<?php echo $row['slug']?>" ><?php echo stripslashes($row['name'])?>
				</label>
			</div>
		<?php
		}
		?>
			<div class="checkbox">
				<label>
					<input type="checkbox" class="checkboxCategory" name="variable[]" <?php echo (in_array("plugin_page",$privilege)) ? "checked" : "" ?> value="plugin_page" >Phần bổ sung
				</label>
			</div>
		</div>
		<label><button type="submit" class="btn btn-form-primary btn-form">Xác nhận</button></label>
	</div>
	<script>
	$(document).ready(function() {
		$('#selecctallCategory').click(function(event) {
			if(this.checked) {
				$('.checkboxCategory').each(function() {
					this.checked = true;
				});
			}else{
				$('.checkboxCategory').each(function() {
					this.checked = false;
				});
			}
		});
	});
	</script>
<?php
}

//----------------------------------------------------------------------------------------------------------------------
/**
 * Cập nhật quyền quản trị: Quản lý nội dung > Bài viết
 * @param $role_id
 */
function showCoreArticle ($role_id) {
	global $db;

	$privilege = array();
	$db->table = "core_privilege";
	$db->condition = "role_id = ".$role_id. " and type = 'article'";
	$db->order = "";
	$db->limit = "";
	$rows = $db->select();
	$stt = 0;
	foreach ($rows as $row) {
		$privilege[$stt] = $row['privilege_slug'];
		$stt++;
	}
	?>
	<input type="hidden" name="role_id" value="<?php echo $role_id?>" />
	<div class="form-group">
		<?php
		$db->table = "category";
		$db->condition = "type_id = 1";
		$db->order = "sort ASC";
		$rows = $db->select();
		foreach($rows as $row) {
			?>
			<div style="float: left; padding: 10px; border-left: 1px solid #ddd;">
				<div class="checkbox">
					<label>
						<input type="checkbox" id="selecctallArt<?php echo $row['slug']?>" ><b><?php echo stripslashes($row['name'])?></b>
					</label>
				</div>
				<div class="checkbox" style="padding-left: 10px;">
					<label>
						<input type="checkbox" class="checkboxArt<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("category_edit;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="category_edit;<?php echo $row['category_id']?>">Chỉnh sửa thể loại
					</label>
				</div>
				<div class="checkbox" style="padding-left: 10px;">
					<label>
						<input type="checkbox" class="checkboxOthers<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("others_menu_add;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="others_menu_add;<?php echo $row['category_id']?>">Thêm mục
					</label>
				</div>
				<div class="checkbox" style="padding-left: 10px;">
					<label>
						<input type="checkbox" class="checkboxArt<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("article_menu_add;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="article_menu_add;<?php echo $row['category_id']?>">Thêm mục
					</label>
				</div>
				<div class="checkbox" style="padding-left: 10px;">
					<label>
						<input type="checkbox" class="checkboxArt<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("article_menu_edit;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="article_menu_edit;<?php echo $row['category_id']?>">Chỉnh sửa mục
					</label>
				</div>
				<div class="checkbox" style="padding-left: 10px;">
					<label>
						<input type="checkbox" class="checkboxArt<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("article_menu_del;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="article_menu_del;<?php echo $row['category_id']?>">Xóa mục
					</label>
				</div>
				<div class="checkbox" style="padding-left: 20px;">
					<label>
						<input type="checkbox" class="checkboxArt<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("article_list;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="article_list;<?php echo $row['category_id']?>">Danh sách bài viết
					</label>
				</div>
				<div class="checkbox" style="padding-left: 20px;">
					<label>
						<input type="checkbox" class="checkboxArt<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("article_add;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="article_add;<?php echo $row['category_id']?>">Thêm bài viết
					</label>
				</div>
				<div class="checkbox" style="padding-left: 20px;">
					<label>
						<input type="checkbox" class="checkboxArt<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("article_edit;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="article_edit;<?php echo $row['category_id']?>">Chỉnh sửa bài viết
					</label>
				</div>
				<div class="checkbox" style="padding-left: 20px;">
					<label>
						<input type="checkbox" class="checkboxArt<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("article_del;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="article_del;<?php echo $row['category_id']?>">Xóa bài viết
					</label>
				</div>
				<script>
				$(document).ready(function() {
					$('#selecctallArt<?php echo $row['slug']?>').click(function(event) {
						if(this.checked) {
							$('.checkboxArt<?php echo $row['slug']?>').each(function() {
								this.checked = true;
							});
						}else{
							$('.checkboxArt<?php echo $row['slug']?>').each(function() {
								this.checked = false;
							});
						}
					});
				});
				</script>
			</div>
		<?php
		}
		?>
		<div class="clearfix"></div>
		<label><button type="submit" class="btn btn-form-primary btn-form">Xác nhận</button></label>
	</div>
<?php
}

/**
 * Cập nhật quyền quản trị: Quản lý nội dung > Dữ liệu khác
 * @param $role_id
 */
function showCoreOthers ($role_id) {
	global $db;

	$privilege = array();
	$db->table = "core_privilege";
	$db->condition = "role_id = ".$role_id. " and type = 'others'";
	$db->order = "";
	$db->limit = "";
	$rows = $db->select();
	$stt = 0;
	foreach ($rows as $row) {
		$privilege[$stt] = $row['privilege_slug'];
		$stt++;
	}
	?>
	<input type="hidden" name="role_id" value="<?php echo $role_id?>" />
	<div class="form-group">
		<?php
		$db->table = "category";
		$db->condition = "type_id = 15";
		$db->order = "sort ASC";
		$rows = $db->select();
		foreach($rows as $row) {
			?>
			<div style="float: left; padding: 10px; border-left: 1px solid #ddd;">
				<div class="checkbox">
					<label>
						<input type="checkbox" id="selecctallOthers<?php echo $row['slug']?>" ><b><?php echo stripslashes($row['name'])?></b>
					</label>
				</div>
				<div class="checkbox" style="padding-left: 10px;">
					<label>
						<input type="checkbox" class="checkboxOthers<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("category_edit;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="category_edit;<?php echo $row['category_id']?>">Chỉnh sửa thể loại
					</label>
				</div>
				<div class="checkbox" style="padding-left: 10px;">
					<label>
						<input type="checkbox" class="checkboxOthers<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("others_menu_add;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="others_menu_add;<?php echo $row['category_id']?>">Thêm mục
					</label>
				</div>
				<div class="checkbox" style="padding-left: 10px;">
					<label>
						<input type="checkbox" class="checkboxOthers<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("others_menu_edit;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="others_menu_edit;<?php echo $row['category_id']?>">Chỉnh sửa mục
					</label>
				</div>
				<div class="checkbox" style="padding-left: 10px;">
					<label>
						<input type="checkbox" class="checkboxOthers<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("others_menu_del;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="others_menu_del;<?php echo $row['category_id']?>">Xóa mục
					</label>
				</div>
				<div class="checkbox" style="padding-left: 20px;">
					<label>
						<input type="checkbox" class="checkboxOthers<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("others_list;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="others_list;<?php echo $row['category_id']?>">Danh sách nội dung
					</label>
				</div>
				<div class="checkbox" style="padding-left: 20px;">
					<label>
						<input type="checkbox" class="checkboxOthers<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("others_add;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="others_add;<?php echo $row['category_id']?>">Thêm nội dung
					</label>
				</div>
				<div class="checkbox" style="padding-left: 20px;">
					<label>
						<input type="checkbox" class="checkboxOthers<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("others_edit;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="others_edit;<?php echo $row['category_id']?>">Chỉnh sửa nội dung
					</label>
				</div>
				<div class="checkbox" style="padding-left: 20px;">
					<label>
						<input type="checkbox" class="checkboxOthers<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("others_del;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="others_del;<?php echo $row['category_id']?>">Xóa nội dung
					</label>
				</div>
				<script>
				$(document).ready(function() {
					$('#selecctallOthers<?php echo $row['slug']?>').click(function(event) {
						if(this.checked) {
							$('.checkboxOthers<?php echo $row['slug']?>').each(function() {
								this.checked = true;
							});
						}else{
							$('.checkboxOthers<?php echo $row['slug']?>').each(function() {
								this.checked = false;
							});
						}
					});
				});
				</script>
			</div>
		<?php
		}
		?>
		<div class="clearfix"></div>
		<label><button type="submit" class="btn btn-form-primary btn-form">Xác nhận</button></label>
	</div>
<?php
}

//----------------------------------------------------------------------------------------------------------------------
/**
 * Cập nhật quyền quản trị: Quản lý nội dung > Hình ảnh
 * @param $role_id
 */
function showCoreGallery ($role_id) {
	global $db;

	$privilege = array();
	$db->table = "core_privilege";
	$db->condition = "role_id = ".$role_id. " and type = 'gallery'";
	$db->order = "";
	$db->limit = "";
	$rows = $db->select();
	$stt = 0;
	foreach ($rows as $row) {
		$privilege[$stt] = $row['privilege_slug'];
		$stt++;
	}
	?>

	<input type="hidden" name="role_id" value="<?php echo $role_id?>" />
	<div class="form-group">
		<?php
		$db->table = "category";
		$db->condition = "type_id = 2";
		$db->order = "sort ASC";
		$rows = $db->select();
		$i = 0;
		$countList = 0;
		$countList = $db->RowCount;
		foreach($rows as $row) {
			?>
			<div style="float: left; padding: 10px; border-left: 1px solid #ddd;">
				<div class="checkbox">
					<label>
						<input type="checkbox" id="selecctallGal<?php echo $row['slug']?>" ><b><?php echo stripslashes($row['name'])?></b>
					</label>
				</div>
				<div class="checkbox" style="padding-left: 10px;">
					<label>
						<input type="checkbox" class="checkboxGal<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("category_edit;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="category_edit;<?php echo $row['category_id']?>">Chỉnh sửa thể loại
					</label>
				</div>
				<div class="checkbox" style="padding-left: 10px;">
					<label>
						<input type="checkbox" class="checkboxGal<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("gallery_menu_add;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="gallery_menu_add;<?php echo $row['category_id']?>">Thêm mục
					</label>
				</div>
				<div class="checkbox" style="padding-left: 10px;">
					<label>
						<input type="checkbox" class="checkboxGal<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("gallery_menu_edit;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="gallery_menu_edit;<?php echo $row['category_id']?>">Chỉnh sửa mục
					</label>
				</div>
				<div class="checkbox" style="padding-left: 10px;">
					<label>
						<input type="checkbox" class="checkboxGal<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("gallery_menu_del;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="gallery_menu_del;<?php echo $row['category_id']?>">Xóa mục
					</label>
				</div>
				<div class="checkbox" style="padding-left: 20px;">
					<label>
						<input type="checkbox" class="checkboxGal<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("gallery_list;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="gallery_list;<?php echo $row['category_id']?>">Danh sách hình ảnh
					</label>
				</div>
				<div class="checkbox" style="padding-left: 20px;">
					<label>
						<input type="checkbox" class="checkboxGal<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("gallery_add;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="gallery_add;<?php echo $row['category_id']?>">Thêm hình ảnh
					</label>
				</div>
				<div class="checkbox" style="padding-left: 20px;">
					<label>
						<input type="checkbox" class="checkboxGal<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("gallery_edit;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="gallery_edit;<?php echo $row['category_id']?>">Chỉnh sửa hình ảnh
					</label>
				</div>
				<div class="checkbox" style="padding-left: 20px;">
					<label>
						<input type="checkbox" class="checkboxGal<?php echo $row['slug']?>" name="variable[]" <?php echo (in_array("gallery_del;".$row['category_id'],$privilege)) ? "checked" : "" ?> value="gallery_del;<?php echo $row['category_id']?>">Xóa hình ảnh
					</label>
				</div>
				<script>
				$(document).ready(function() {
					$('#selecctallGal<?php echo $row['slug']?>').click(function(event) {
						if(this.checked) {
							$('.checkboxGal<?php echo $row['slug']?>').each(function() {
								this.checked = true;
							});
						}else{
							$('.checkboxGal<?php echo $row['slug']?>').each(function() {
								this.checked = false;
							});
						}
					});
				});
				</script>
			</div>
		<?php
		}
		?>
		<div class="clearfix"></div>
		<label><button type="submit" class="btn btn-form-primary btn-form">Xác nhận</button></label>
	</div>
<?php
}

//----------------------------------------------------------------------------------------------------------------------
/**
 * Cập nhật quyền quản trị: Quản lý nội dung > Phần bổ sung
 * @param $role_id
 */
function showCorePages ($role_id) {
	global $db;

	$privilege = array();
	$db->table = "core_privilege";
	$db->condition = "role_id = ".$role_id. " and type = 'pages'";
	$db->order = "";
	$db->limit = "";
	$rows = $db->select();
	$stt = 0;
	foreach ($rows as $row) {
		$privilege[$stt] = $row['privilege_slug'];
		$stt++;
	}
	?>

	<input type="hidden" name="role_id" value="<?php echo $role_id?>" />
	<div class="form-group">
		<div style="padding: 10px; border-left: 1px solid #ddd;">
			<div class="checkbox">
				<label>
					<input type="checkbox" id="selecctallPages" ><b>Chọn tất cả / Hủy tất cả</b>
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" class="checkboxPages" name="variable[]" <?php echo (in_array("plugin_page_add",$privilege)) ? "checked" : "" ?> value="plugin_page_add">Thêm trang
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" class="checkboxPages" name="variable[]" <?php echo (in_array("plugin_page_edit",$privilege)) ? "checked" : "" ?> value="plugin_page_edit">Chỉnh sửa trang
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" class="checkboxPages" name="variable[]" <?php echo (in_array("plugin_page_del",$privilege)) ? "checked" : "" ?> value="plugin_page_del">Xóa trang
				</label>
			</div>
		</div>
		<label><button type="submit" class="btn btn-form-primary btn-form">Xác nhận</button></label>
	</div>
	<script>
	$(document).ready(function() {
		$('#selecctallPages').click(function(event) {
			if(this.checked) {
				$('.checkboxPages').each(function() {
					this.checked = true;
				});
			}else{
				$('.checkboxPages').each(function() {
					this.checked = false;
				});
			}
		});
	});
	</script>
<?php
}

//----------------------------------------------------------------------------------------------------------------------
/**
 * Cập nhật quyền quản trị: Cơ sở dữ liệu
 * @param $role_id
 */
function showCoreBackup ($role_id) {
	global $db;

	$privilege = array();
	$db->table = "core_privilege";
	$db->condition = "role_id = ".$role_id. " and type = 'backup'";
	$db->order = "";
	$db->limit = "";
	$rows = $db->select();
	$stt = 0;
	foreach ($rows as $row) {
		$privilege[$stt] = $row['privilege_slug'];
		$stt++;
	}
	?>

	<input type="hidden" name="role_id" value="<?php echo $role_id?>" />
	<div class="form-group">
		<div class="checkbox">
			<label>
				<input type="checkbox" id="selecctallTwo" ><b>Chọn tất cả / Hủy tất cả</b>
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" class="checkboxBackup" name="variable[]" <?php echo (in_array("backup_data",$privilege)) ? "checked" : "" ?> value="backup_data">Sao lưu dữ liệu
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" class="checkboxBackup" name="variable[]" <?php echo (in_array("backup_config",$privilege)) ? "checked" : "" ?> value="backup_config">Cấu hình sao lưu
			</label>
		</div>
		<label><button type="submit" class="btn btn-form-primary btn-form">Xác nhận</button></label>
	</div>
	<script>
	$(document).ready(function() {
		$('#selecctallTwo').click(function(event) {
			if(this.checked) {
				$('.checkboxBackup').each(function() {
					this.checked = true;
				});
			}else{
				$('.checkboxBackup').each(function() {
					this.checked = false;
				});
			}
		});
	});
	</script>
<?php
}

//----------------------------------------------------------------------------------------------------------------------
/**
 * Cập nhật quyền quản trị: Cấu hình
 * @param $role_id
 */
function showCoreConfig ($role_id) {
	global $db;

	$privilege = array();
	$db->table = "core_privilege";
	$db->condition = "role_id = ".$role_id. " and type = 'config'";
	$db->order = "";
	$db->limit = "";
	$rows = $db->select();
	$stt = 0;
	foreach ($rows as $row) {
		$privilege[$stt] = $row['privilege_slug'];
		$stt++;
	}
	?>

	<input type="hidden" name="role_id" value="<?php echo $role_id?>" />
	<div class="form-group">
		<div class="checkbox">
			<label>
				<input type="checkbox" id="selecctallThree" ><b>Chọn tất cả / Hủy tất cả</b>
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" class="checkboxConfig" name="variable[]" <?php echo (in_array("config_general",$privilege)) ? "checked" : "" ?> value="config_general">Cấu hình chung
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" class="checkboxConfig" name="variable[]" <?php echo (in_array("config_smtp",$privilege)) ? "checked" : "" ?> value="config_smtp">Cấu hình SMTP
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" class="checkboxConfig" name="variable[]" <?php echo (in_array("config_datetime",$privilege)) ? "checked" : "" ?> value="config_datetime">Cấu hình thời gian
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" class="checkboxConfig" name="variable[]" <?php echo (in_array("config_plugins",$privilege)) ? "checked" : "" ?> value="config_plugins">Trình cắm bổ sung
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" class="checkboxConfig" name="variable[]" <?php echo (in_array("config_socialnetwork",$privilege)) ? "checked" : "" ?> value="config_socialnetwork">Mạng xã hội
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" class="checkboxConfig" name="variable[]" <?php echo (in_array("config_upload",$privilege)) ? "checked" : "" ?> value="config_upload">Cấu hình upload
			</label>
		</div>
		<label><button type="submit" class="btn btn-form-primary btn-form">Xác nhận</button></label>
	</div>
	<script>
	$(document).ready(function() {
		$('#selecctallThree').click(function(event) {
			if(this.checked) {
				$('.checkboxConfig').each(function() {
					this.checked = true;
				});
			}else{
				$('.checkboxConfig').each(function() {
					this.checked = false;
				});
			}
		});
	});
	</script>
<?php
}


//----------------------------------------------------------------------------------------------------------------------
/**
 * Cập nhật quyền quản trị: Quản trị hệ thống
 * @param $role_id
 */
function showCoreCore ($role_id) {
	global $db;

	$privilege = array();
	$db->table = "core_privilege";
	$db->condition = "role_id = ".$role_id. " and type = 'core'";
	$db->order = "";
	$db->limit = "";
	$rows = $db->select();
	$stt = 0;
	foreach ($rows as $row) {
		$privilege[$stt] = $row['privilege_slug'];
		$stt++;
	}
	?>

	<input type="hidden" name="role_id" value="<?php echo $role_id?>" />
	<div class="form-group">
		<div class="checkbox">
			<label>
				<input type="checkbox" id="selecctallFive" ><b>Chọn tất cả / Hủy tất cả</b>
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" class="checkboxCore" name="variable[]" <?php echo (in_array("core_role",$privilege)) ? "checked" : "" ?> value="core_role">Nhóm quản trị
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" class="checkboxCore" name="variable[]" <?php echo (in_array("core_user",$privilege)) ? "checked" : "" ?> value="core_user">Quản lý thành viên
			</label>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox" class="checkboxCore" name="variable[]" <?php echo (in_array("core_dashboard",$privilege)) ? "checked" : "" ?> value="core_dashboard">Phân quyền quản trị
			</label>
		</div>
		<label><button type="submit" class="btn btn-form-primary btn-form">Xác nhận</button></label>
	</div>
	<script>
	$(document).ready(function() {
		$('#selecctallFive').click(function(event) {
			if(this.checked) {
				$('.checkboxCore').each(function() {
					this.checked = true;
				});
			}else{
				$('.checkboxCore').each(function() {
					this.checked = false;
				});
			}
		});
	});
	</script>
<?php
}

