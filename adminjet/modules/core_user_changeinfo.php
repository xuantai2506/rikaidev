<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
?>

<!-- Menu path -->
<div class="row">
	<h2 class="title_sp">Thông tin cá nhân</h2>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>"> Trang chủ</a>
		</li>
		<li>
			Thông tin cá nhân
		</li>
	</ol>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading" style="padding-top: 0; padding-bottom: 0;">
				<!-- Nav tabs -->
				<ul class="nav nav-pills">
					<?php
						$active = "";
						$active = isset($_GET['active']) ? $_GET['active'] : "";
					?>
					<li class="<?php echo ($active=="info")? "active" : "" ?>">
						<a href="#info" data-toggle="tab">
							<i class="fa fa-user"></i> Thông tin cá nhân
						</a>
					</li>
					<li class="<?php echo ($active=='pass')? 'active' : '' ?>">
						<a href="#pass" data-toggle="tab">
							<i class="fa fa-gear fa-fw"></i> Đổi mật khẩu
						</a>
					</li>
				</ul>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane fade <?php echo ($active=="info")? "in active" : "" ?>" id="info">
						<form id="change_info" name="changeInfo" method="post" enctype="multipart/form-data" onsubmit="return changeInformation('change_info');">
							<?php echo showInformation($_SESSION["user_id"]+0);?>
						</form>
					</div>
					<div class="tab-pane fade <?php echo ($active=="pass")? "in active" : "" ?>" id="pass">
						<form id="change_pass" name="changePass" method="post" enctype="multipart/form-data" onsubmit="return changeInformation('change_pass');">
							<?php echo showChangePassword();?>
						</form>
					</div>
				</div>
			</div>
			<!-- /.panel-body -->
		</div>
	</div>
</div>