<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
?>

<!-- Menu path -->
<div class="row">
	<h2 class="title_sp">Cấu hình SMTP</h2>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>"> Trang chủ</a>
		</li>
		<li>
			 Cấu hình
		</li>
		<li>
			 Cấu hình SMTP
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

	updateConstant("SMTP_host",$_POST['SMTP_host']);
	updateConstant("SMTP_port",$_POST['SMTP_port']);
	updateConstant("SMTP_secure",$_POST['SMTP_secure']);
	updateConstant("SMTP_username",$_POST['SMTP_username']);
	updateConstant("SMTP_mailname",$_POST['SMTP_mailname']);
	updateConstant("SMTP_password",$_POST['SMTP_password']);

	loadPageSucces("Đã cập nhật thông tin cấu hình thành công.","?".TTH_PATH."=config_smtp");
}
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default khoangcach">
			<div class="panel-body">
				<div class="table-respon">
					<form action="?<?php echo TTH_PATH?>=config_smtp" method="post">
						<table class="table table-hover" style="width: 70%;">
							<tr>
								<td width="200px"><label>Máy chủ (SMTP) Thư gửi đi:</label></td>
								<td><input class="form-control" type="text" name="SMTP_host" value="<?php echo getConstant("SMTP_host")?>" required="required" ></td>
							</tr>
							<tr>
								<td><label>Cổng gửi mail:</label></td>
								<td><input class="form-control" type="text" name="SMTP_port" value="<?php echo getConstant("SMTP_port")?>" required="required" ></td>
							</tr>
							<tr>
								<td><label>Sử dụng xác thực:</label></td>
								<td>
									<select name="SMTP_secure" class="form-control">
										<option value="none" <?php echo (getConstant("SMTP_secure")=="none")? "selected" : "" ?> >None</option>
										<option value="ssl" <?php echo (getConstant("SMTP_secure")=="ssl")? "selected" : "" ?> >SSL</option>
										<option value="tsl" <?php echo (getConstant("SMTP_secure")=="tsl")? "selected" : "" ?> >TSL</option>
									</select>
								</td>
							</tr>
							<tr>
								<td><label>Tài khoản Email:</label></td>
								<td>
									<input class="form-control" type="email" maxlength="200" name="SMTP_username" value="<?php echo getConstant("SMTP_username")?>" required="required" >
								</td>
							</tr>
							<tr>
								<td><label>Mật khẩu Email:</label></td>
								<td>
									<input class="form-control" type="password" maxlength="200" name="SMTP_password" value="<?php echo getConstant("SMTP_password")?>" required="required" >
								</td>
							</tr>
							<tr>
								<td><label>Tên tài khoản Email:</label></td>
								<td>
									<input class="form-control" type="text" maxlength="200" name="SMTP_mailname" value="<?php echo getConstant("SMTP_mailname")?>" required="required" >
								</td>
							</tr>
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