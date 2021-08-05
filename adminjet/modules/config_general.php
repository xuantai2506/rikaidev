<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
?>

<!-- Menu path -->
<div class="row">
	<h2 class="title_sp">Cấu hình chung</h2>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>">Trang chủ</a>
		</li>
		<li>
			 Cấu hình
		</li>
		<li>
			 Cấu hình chung
		</li>
	</ol>
</div>
<!-- /.row -->
<?php echo dashboardCoreAdmin(); ?>
<?php
if(isset($_POST['update'])) {

	function updateConstant ($constant, $value) {
		global $db;
		$db->table = "constant";
		$data =array(
			'value'=>$db->clearText($value)
		);
		$db->condition = "constant = '".$constant."'";
		$db->update($data);
	}

	$nameConstant = $_POST["name_constant"];
	$countConstant = count($nameConstant);
	$valueConstant = $_POST["value_constant"];
	for($i = 0; $i < $countConstant; $i++) {
		updateConstant($nameConstant[$i],$valueConstant[$i]);
	}

	loadPageSucces("Đã cập nhật thông tin cấu hình thành công.","?".TTH_PATH."=config_general");
}
?>
<script type="text/javascript">
	var editedField;
	function BrowseFile(field) {
		editedField = field ;
		var finder = new CKFinder();
		finder.selectActionFunction = SetFileField;
		finder.popup();
	}
	function SetFileField(fileUrl) {
		document.getElementById(editedField).value = fileUrl;
	}
</script>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default khoangcach">
			<div class="panel-body">
				<div class="table-responsive">
					<form action="?<?php echo TTH_PATH?>=config_general" method="post">
						<table class="table table-hover">
							<?php
							$db->table = "constant";
							$db->condition = "type = 0";
							$db->order = "sort ASC";
							$db->limit = "";
							$rows = $db->select();

							foreach($rows as $row) {
							?>
							<tr>
								<td width="220px" class="ver-top"><label><?php echo $row['name']?>:</label></td>
								<td>
									<input type="hidden" name="name_constant[]" value="<?php echo $row['constant']?>" >
									<?php
									if($row['constant']=='file_logo' || $row['constant']=='image_thumbnailUrl') {
									?>
										<div class="input-group ">
											<input class="form-control" type="text" name="value_constant[]" id="_<?php echo $row['constant'];?>" value="<?php echo stripslashes($row['value'])?>">
											<div class="input-group-btn">
												<button  class="btn btn-primary" type="button" name="<?php echo $row['constant'];?>" onclick="BrowseFile('_<?php echo $row['constant'];?>');"><i class="glyphicon glyphicon-folder-open"></i> &nbsp;Chọn tệp...</button>
											</div>
										</div>
									<?php
									}
									else if($row['constant']=='error_page') {
									?>
										<textarea class="form-control" rows="4" style="resize: none;" name="value_constant[]" id="<?php echo $row['constant']?>" ><?php echo stripslashes($row['value'])?></textarea>
									<?php
									}
									else if($row['constant']=='help_address' || $row['constant']=='help_icon' || $row['constant']=='keywords') {
									?>
										<input class="form-control" type="text" name="value_constant[]" data-role="tagsinput" value="<?php echo stripslashes($row['value'])?>" >
									<?php
										if($row['constant']=='help_icon') echo '<p><a href="http://fontawesome.io/icons/" target="_blank">Font Awesome</a></p>';
									}
									else {
									?>
										<input class="form-control" type="text" name="value_constant[]" value="<?php echo stripslashes($row['value'])?>" >
									<?php
									}
									?>
								</td>
							</tr>
							<?php
							}
							?>
							<tr>
								<td colspan="2" align="center" class="kc_button">
									<button type="submit" name="update" class="btn btn-form-primary btn-form">Đồng ý</button> &nbsp;
									<button type="reset" class="btn btn-form-success btn-form">Làm lại</button> &nbsp;
									<button type="button" class="btn btn-form-info btn-form" onclick="location.href='<?php echo ADMIN_DIR?>'">Thoát</button>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	CKEDITOR.replace( 'error_page', {
		height: 70,
		toolbar: [
			[ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],
			[ 'FontSize', 'TextColor', 'BGColor' ]
		]
	});
</script>