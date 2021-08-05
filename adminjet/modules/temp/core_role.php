<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
function grAdmin($act, $typeFunc, $role_id, $name, $comment, $is_active, $error) {
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default khoangcach">
		
			<div class="panel-body">
				<form action="<?php echo $act?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="typeFunc" value="<?php echo $typeFunc?>" />
					<input type="hidden" name="role_id" value="<?php echo $role_id?>" />
					<div class="panel-show-error">
						<?php echo $error?>
					</div>
					<table class="table table-hover"  style="width: 70%;">
						<tr>
							<td width="150px"><label>Tên nhóm:</label></td>
							<td><input class="form-control" type="text" name="name" maxlength="255" value="<?php echo stripslashes($name)?>" required></td>
						</tr>
						<tr>
							<td class="ver-top"><label>Mô tả:</label></td>
							<td>
								<textarea class="form-control" rows="3" name="comment"><?php echo stripslashes($comment)?></textarea>
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
								<button type="submit" class="btn btn-form-primary btn-form">Đồng ý</button> &nbsp;
								<button type="reset" class="btn btn-form-success btn-form">Làm lại</button> &nbsp;
								<button type="button" class="btn btn-form-info btn-form" onclick="location.href='?<?php echo TTH_PATH?>=core_role'">Thoát</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
}
?>
