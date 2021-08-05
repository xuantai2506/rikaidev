<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
?>

<!-- Menu path -->
<div class="row">
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>"><i class="fa fa-home"></i> Trang chủ</a>
		</li>
		<li>
			<i class="fa fa-edit"></i> Quản lý nội dung
		</li>
		<li>
			<i class="fa fa-puzzle-piece"></i> Dữ liệu khác
		</li>
	</ol>
</div>
<!-- /.row -->
<?php echo dashboardCoreAdmin(); ?>
<?php
$del =  isset($_GET['del']) ? $_GET['del']+0 : 0;
if($del != 0) {
	// Lấy id menu cha.
	$parent = $category_id = 0;
	$db->table = "others_menu";
	$db->condition = "`others_menu_id` = $del";
	$db->order = "";
	$db->limit = "";
	$rows = $db->select();
	foreach($rows as $row) {
		$parent = $row['parent']+0;
		$category_id = $row['category_id']+0;
	}

	// Cập nhật menu con.
	$db->table = "others_menu";
	$data = array(
		'parent'=>$parent,
		'modified_time'=>time(),
		'user_id'=>$_SESSION["user_id"]
	);
	$db->condition = "`parent` = $del";
	$db->update($data);

	// Xóa csdl danh sách liên quan.
	$db->table = "others";
	$db->condition = "`others_menu_id` = $del";
	$db->delete();
	// Xóa Tb_ link
	$db->table = "link";
	$db->condition = "`category` = $category_id AND `menu` = $del";
	$db->delete();
	// Xóa csld menu.
	$db->table = "others_menu";
	$db->condition = "`others_menu_id` = $del";
	$db->delete();

	loadPageSucces("Đã xóa mục thành công.", "?".TTH_PATH."=others_manager");

}
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default panel-no-border">
			<div class="table-responsive">
				<table class="table table-manager table-hover">
					<thead>
					<tr>
						<th colspan="2">Mục</th>
						<th>Sắp xếp</th>
						<th>Hiển thị</th>
						<th>Nổi bật</th>
						<th>Chức năng</th>
						<th>Nội dung</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$db->table = "category";
					$db->condition = "type_id = 15";
					$db->order = "sort ASC";
					$db->limit = "";
					$rows = $db->select();
					$i = 0;
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
									<?php echo showSort("sort_".$row["category_id"]."", $countList,$row["sort"], "90%", 1, $row["category_id"], 'category', 1);?>
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
									<?php echo showSort("sort_".$row["category_id"]."", $countList,$row["sort"], "90%", 1, $row["category_id"], 'category', 0);?>
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
								<a href="?<?php echo TTH_PATH?>=others_menu_add&id_cat=<?php echo $row["category_id"]?>"><img data-toggle="tooltip" data-placement="left" title="Thêm mục" src="images/plus.svg"></a>
								&nbsp;
								<a href="?<?php echo TTH_PATH?>=category_edit&id_cat=<?php echo $row["category_id"]?>"><img data-toggle="tooltip" data-placement="top" title="Chỉnh sửa" src="images/setting.svg"></a>
								&nbsp;
								<span style="width: 16px; height: 1px; display: inline-block;""></span>
							</td>
							<td align="center">&nbsp;</td>
							<?php
							loadMenuCategory($db,0,0,$row["category_id"]+0);
							?>
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

<?php
/* ***** MODULE MỚI CHỈ HOÀN THIỆN CHO MENU 3 CẤP **** */
/**
 * @param $db
 * @param $level
 * @param $parent
 * @param $category_id
 */
function loadMenuCategory($db, $level, $parent, $category_id){
	global $corePrivilegeSlug;

	$db->table = "others_menu";
	$db->condition = "category_id = ".$category_id." and parent = ".$parent;
	$db->order = "sort ASC";
	$db->limit = "";
	$rows2 = $db->select();
	$i = 0;
	$countList = 0;
	$countList = $db->RowCount;
	foreach($rows2 as $row) {
		?>
		<tr>
			<td>&nbsp;</td>
			<td style="padding: 0 0 0 <?php echo $level?>px;"><img src="images/node.svg" /> <?php echo stripslashes($row['name'])?></td>
			<?php
			//-----------Kiểm tra phân quyền ---------------------------------------
			if($parent==0) $width = '80%';
			else $width = '70%';
			if(in_array("others_menu_edit;".$row["category_id"],$corePrivilegeSlug)) {
				?>
				<td align="right">
					<?php echo showSort("sort_".$row["others_menu_id"]."", $countList,$row["sort"], $width, 0, $row["others_menu_id"] ,'others_menu', 1);?>
				</td>
				<td align="center">
					<?php echo ($row["is_active"]+0==0)?
						'<div class="btn-event-close" data-toggle="tooltip" data-placement="top" title="Mở" onclick="edit_status($(this), '.$row["others_menu_id"].', \'is_active\', \'others_menu\');" rel="1"></div>'
						:
						'<div class="btn-event-open" data-toggle="tooltip" data-placement="top" title="Đóng" onclick="edit_status($(this), '.$row["others_menu_id"].', \'is_active\', \'others_menu\');" rel="0"></div>'
					?>
				</td>
				<td align="center">
					<?php echo ($row["hot"]+0==0)?
						'<div class="btn-event-close" data-toggle="tooltip" data-placement="top" title="Mở" onclick="edit_status($(this), '.$row["others_menu_id"].', \'hot\', \'others_menu\');" rel="1"></div>'
						:
						'<div class="btn-event-open" data-toggle="tooltip" data-placement="top" title="Đóng" onclick="edit_status($(this), '.$row["others_menu_id"].', \'hot\', \'others_menu\');" rel="0"></div>'
					?>
				</td>
			<?php
			}
			else {
				?>
				<td align="right">
					<?php echo showSort("sort_".$row["others_menu_id"]."", $countList,$row["sort"], $width, 0, $row["others_menu_id"] ,'others_menu', 0);?>
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
						'<div class="btn-event-close alertManager" data-toggle="tooltip" data-placement="top" title="Mở"></div>'
						:
						'<div class="btn-event-open alertManager" data-toggle="tooltip" data-placement="top" title="Đóng"></div>'
					?>
				</td>
			<?php }
			//----------- end if ------------
			?>
			<td align="center">
				<?php
				if ($level <= 30){
					?>
					<a href="?<?php echo TTH_PATH?>=others_menu_add&id_cat=<?php echo $row["category_id"]?>&id_art=<?php echo $row["others_menu_id"]?>"><img data-toggle="tooltip" data-placement="left" title="Thêm mục" src="images/plus.svg"></a>
					&nbsp;
				<?php } else { ?>
					<span style="width: 16px; height: 1px; display: inline-block;""></span>
					&nbsp;
				<?php } ?>
				<a href="?<?php echo TTH_PATH?>=others_menu_edit&id=<?php echo $row["others_menu_id"]?>"><img data-toggle="tooltip" data-placement="top" title="Chỉnh sửa" src="images/setting.svg"></a>
				&nbsp;
				<?php
				if(!in_array("others_menu_del;".$row["category_id"],$corePrivilegeSlug)) {
					?>
					<a class="alertManager" style="cursor: pointer;"><img data-toggle="tooltip" data-placement="right" title="Xóa mục" src="images/delete.svg"></a>
				<?php
				}
				else {
					?>
					<a class="confirmManager" style="cursor: pointer;" id="?<?php echo TTH_PATH?>=others_manager&del=<?php echo $row["others_menu_id"]?>"><img data-toggle="tooltip" data-placement="right" title="Xóa mục" src="images/delete.svg"></a>
				<?php }
				//----------- end if ------------
				?>
			</td>
			<?php
			if ($level <= 30){
				loadMenuCategory($db, $level+30, $row["others_menu_id"]+0, $row["category_id"]+0);
			}
			?>
		</tr>
	<?php
	}
}
?>
<script>
	$(".confirmManager").click(function() {
		var element = $(this);
		var action = element.attr("id");
		confirm("Tất cả các Dữ liệu liên quan sẽ được xóa và không thể phục hồi.\nMục con của mục này sẽ được đẩy lên một bậc.\nBạn có muốn thực hiện không?", function() {
			if(this.data == true) window.location.href = action;
		});
	});
	$(".alertManager").boxes('alert', 'Bạn không được phân quyền với chức năng này.');
</script>