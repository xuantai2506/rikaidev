<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
?>
<!-- Menu path -->
<div class="row">
	<h2 class="title_sp">Danh mục</h2>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>"> Trang chủ</a>
		</li>
		<li>
			Quản lý danh mục
		</li>
		<li>
			 Danh mục
		</li>
	</ol>
</div>
<!-- /.row -->
<?php echo dashboardCoreAdmin(); ?>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default panel-no-border">
			<div class="table-responsive">
				<table class="table table-manager table-hover">
					<thead>
					<tr>
						<th colspan="2">Chuyên mục</th>
						<th>Sắp xếp</th>
						<th>Hiển thị</th>
						<th>Nổi bật</th>
						<th>Chức năng</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$db->table = "category";
					$db->condition = "menu_main = 1";
					$db->order = "sort_menu ASC";
					$db->limit = "";
					$rows = $db->select();
					$countList = 0;
					$countList = $db->RowCount;
					foreach($rows as $row) {
						?>
						<tr class="category">
							<td><?php echo stripslashes($row['name'])?></td>
							<td>&nbsp;</td>
							<?php
							//-----------Kiểm tra phân quyền ---------------------------------------
							if(in_array("category_edit;".$row["category_id"],$corePrivilegeSlug)) {
								?>
								<td align="right">
									<?php echo showSort2("sortcat".$row["category_id"]."", $countList,$row["sort_menu"], "90%", 1, $row["category_id"], 'category', 1);?>
								</td>
								<td align="center">
									<?php echo ($row["is_active"]+0==0)?
										'<div class="btn-event-close" data-toggle="tooltip" data-placement="top" title="Mở" onclick="edit_status($(this), '.$row["category_id"].', \'is_active\', \'category\');" rel="1"></div>'
										:
										'<div class="btn-event-open" data-toggle="tooltip" data-placement="top" title="Đóng" onclick="edit_status($(this), '.$row["category_id"].', \'is_active\', \'category\');" rel="0"></div>'
									?>
								</td>
								<td align="center">
									<?php echo ($row["hot"]+0==0)?
										'<div class="btn-event-close" data-toggle="tooltip" data-placement="top"title="Mở" onclick="edit_status($(this), '.$row["category_id"].', \'hot\', \'category\');" rel="1"></div>'
										:
										'<div class="btn-event-open" data-toggle="tooltip" data-placement="top" title="Đóng" onclick="edit_status($(this), '.$row["category_id"].', \'hot\', \'category\');" rel="0"></div>'
									?>
								</td>
							<?php
							} else {
								?>
								<td align="right">
									<?php echo showSort2("sortcat".$row["category_id"]."", $countList,$row["sort_menu"], "90%", 1, $row["category_id"], 'category', 0);?>
								</td>

								<td align="center">
									<?php echo ($row["is_active"]+0==0)?
										'<div class="btn-event-close alertManager" data-toggle="tooltip" data-placement="top" title="Mở"></div>'
										:
										'<div class="btn-event-open alertManager" data-toggle="tooltip" data-placement="top" title="Đóng"></div>'
									?>
								</td>
								<td align="center">
									<?php echo ($row["hot"]+0==0)?
										'<div class="btn-event-close alertManager" data-toggle="tooltip" data-placement="top"title="Mở"></div>'
										:
										'<div class="btn-event-open alertManager" data-toggle="tooltip" data-placement="top" title="Đóng"></div>'
									?>
								</td>
							<?php }
							//----------- end if ------------
							?>
							<td align="center">
								<a href="?<?php echo TTH_PATH?>=category_edit&id_cat=<?php echo $row["category_id"]?>"><img data-toggle="tooltip" data-placement="top" title="Chỉnh sửa" src="images/setting.svg"></a>
								&nbsp;
								<span style="width: 16px; height: 1px; display: inline-block;"></span>
							</td>
						</tr>
					<?php
					}
					?>
					</tbody>
				</table>
			</div>
			<!-- /.table-responsive -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-6 -->
</div>

<script>
	$(".alertManager").boxes('alert', 'Bạn không được phân quyền với chức năng này.');
</script>