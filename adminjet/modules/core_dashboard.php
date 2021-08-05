<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//

$role_id = isset($_GET['id']) ? $_GET['id']+0 : $role_id+0;
$db->table = "core_role";
$db->condition = "role_id = ".$role_id;
$db->order = "";
$rows = $db->select();
foreach($rows as $row) {
	$name    = stripslashes($row['name']);
}
if($db->RowCount==0) loadPageAdmin("Nhóm không tồn tại.","?".TTH_PATH."=core_role");

include ("includes" . DS . "function" . DS . "CoreDashboard.php");
?>
<!-- Menu path -->
<div class="row">
	<h2 class="title_sp">Nhóm quản trị</h2>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>"> Trang chủ</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=core_role"> Quản trị hệ thống</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=core_role"> Nhóm quản trị</a>
		</li>
		<li>
			<?php echo $name?>
		</li>
	</ol>
</div>
<!-- /.row -->
<?php echo dashboardCoreAdmin(); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default khoangcach">
			<!-- .panel-heading -->
			<div class="panel-body">
				<div class="panel-group panel-tabs-line">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-edit fa-fw"></i> Quản lý nội dung</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse">
							<div class="panel-body">
								<div class="col-lg-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											Thể loại
										</div>
										<!-- /.panel-heading -->
										<div class="panel-body">
											<!-- Nav tabs -->
											<ul class="nav nav-tabs">
												<li class="active"><a href="#manager" data-toggle="tab">Chung</a>
												</li>
												<li><a href="#article" data-toggle="tab">Bài viết</a>
												</li>
												<li><a href="#others" data-toggle="tab">Dữ liệu khác</a>
												</li>
												<li><a href="#gallery" data-toggle="tab">Hình ảnh</a>
												</li>
												<li><a href="#pages" data-toggle="tab">Phần bổ sung</a>
												</li>
											</ul>
											<!-- Tab panes -->
											<div class="tab-content">
												<div class="tab-pane fade in active" id="manager">
													<form id="core_category" method="post" onsubmit="return coreDashboard('core_category', 'category');">
														<?php
														echo showCoreCategory($role_id);
														?>
													</form>
												</div>
												<div class="tab-pane fade" id="article">
													<form id="core_article" method="post" onsubmit="return coreDashboard('core_article', 'article');">
														<?php
														echo showCoreArticle($role_id);
														?>
													</form>
												</div>
												<div class="tab-pane fade" id="others">
													<form id="core_others" method="post" onsubmit="return coreDashboard('core_others', 'others');">
														<?php
														echo showCoreOthers($role_id);
														?>
													</form>
												</div>
												<div class="tab-pane fade" id="gallery">
													<form id="core_gallery" method="post" onsubmit="return coreDashboard('core_gallery', 'gallery');">
														<?php
														echo showCoreGallery($role_id);
														?>
													</form>
												</div>
												<div class="tab-pane fade" id="pages">
													<form id="core_pages" method="post" onsubmit="return coreDashboard('core_pages', 'pages');">
														<?php
														echo showCorePages($role_id);
														?>
													</form>
												</div>
											</div>
										</div>
										<!-- /.panel-body -->
									</div>
									<!-- /.panel -->
								</div>
								<!-- /.col-lg-6 -->
							</div>
						</div>
					</div>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-database fa-fw"></i> Cơ sở dữ liệu</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse">
							<div class="panel-body">
								<form id="core_backup" method="post" onsubmit="return coreDashboard('core_backup', 'backup');">
									<?php
									echo showCoreBackup($role_id);
									?>
								</form>
							</div>
						</div>
					</div>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-cogs fa-fw"></i> Cấu hình</a>
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse">
							<div class="panel-body">
								<form id="core_config" method="post" onsubmit="return coreDashboard('core_config', 'config');">
									<?php
									echo showCoreConfig($role_id);
									?>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- .panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->