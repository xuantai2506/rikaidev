<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
?>

<!-- Menu path -->
<div class="row">
	<h2 class="title_sp">Quản lý thành viên</h2>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>"> Trang chủ</a>
		</li>
		<li>
			Quản trị hệ thống
		</li>
		<li>
			 Quản lý thành viên
		</li>
		
	</ol>
</div>
<!-- /.row -->
<?php echo dashboardCoreAdmin(); ?>
<?php
if(isset($_POST['idDel'])){
	$dir_dest = ROOT_DIR . DS .'uploads'. DS . 'user';

	$idDel = implode(',',$_POST['idDel']);

	$db->table = "core_user";
	$db->condition = "user_id IN (".$idDel.")";
	$db->order = "";
	$rows = $db->select();
	foreach($rows as $row) {
		if(!empty($row['img']) && glob($dir_dest . DS . '*'.$row['img'])) {
			array_map("unlink", glob($dir_dest . DS . '*'.$row['img']));
		}
	}

	$db->table = "core_user";
	$db->condition = "user_id IN (".$idDel.")";
	$db->delete();
	loadPageSucces("Đã xóa thành viên thành công.","?".TTH_PATH."=core_user");
}
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default panel-no-border">
			<div class="table-responsive">
				<a class="btn-add-new" href="?<?php echo TTH_PATH?>=core_user_add">Thêm thành viên</a>
				<form action="?<?php echo TTH_PATH?>=core_user" method="post" id="deleteArt">
					<table class="table display table-manager" cellspacing="0" cellpadding="0" id="dataTablesList">
						<thead>
						<tr>
							<th>STT</th>
							<th>Hình</th>
							<th>Tên đăng nhập</th>
							<th>Trang thái</th>
							<th>Hiển thị</th>
							<th>Sắp xếp</th>
							<th>Nhóm quản trị</th>
							<th>Họ và tên</th>
							<th>Ngày tạo</th>
							<th>Chức năng</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$date = new DateClass();
						$countList = 0;

						$db->table = "core_user";
						$db->condition = "";
						$db->order = "sort ASC";
						$rows = $db->select();
						$countList = $db->RowCount;

						$totalpages = 0;
						$perpage = 50;
						$total = $db->RowCount;
						if($total%$perpage==0) $totalpages=$total/$perpage;
						else $totalpages = floor($total/$perpage)+1;
						if(isset($_GET["page"])) $page=$_GET["page"]+0;
						else $page=1;
						$start=($page-1)*$perpage;
						$i=0+($page-1)*$perpage;

						$db->table = "core_user";
						$db->condition = "";
						$db->order = "sort ASC";
						$db->limit = $start.','.$perpage;
						$rows = $db->select();

						foreach($rows as $row) {
							$i++;
							?>
							<tr>
								<td align="center"><?php echo $i?></td>
								<td align="center">
									<?php echo ($row["img"]=='no')?
										'<img data-toggle="tooltip" data-placement="top" title="Không có hình" src="images/no_image.svg">'
										:
										'<img id="popover-'.$i.'" class="btn-popover" title="'.stripslashes($row["user_name"]).'" src="images/has_image.svg">
										<script>
											var image = \'<img src="../uploads/user/'.$row["img"].'">\';
											$(\'#popover-'.$i.'\').popover({placement: \'bottom\', content: image, html: true});
										</script>'
									?>
								</td>
								<td align="center"><?php echo stripslashes($row['user_name'])?></td>
								<td align="center">
									<?php echo ($row["is_active"]+0==0)?
										'<div class="btn-event-close" data-toggle="tooltip" data-placement="top" title="Mở" onclick="edit_status_core($(this), '.$row["user_id"].', \'is_active\', \'core_user\', \'user\');" rel="1">0</div>'
										:
										'<div class="btn-event-open" data-toggle="tooltip" data-placement="top" title="Đóng" onclick="edit_status_core($(this), '.$row["user_id"].', \'is_active\', \'core_user\', \'user\');" rel="0">1</div>'
									?>
								</td>
								<td align="center">
									<?php echo ($row["is_show"]+0==0)?
										'<div class="btn-event-close" data-toggle="tooltip" data-placement="top" title="Mở"  onclick="edit_status_core($(this), '.$row["user_id"].', \'is_show\', \'core_user\', \'user\');" rel="1">0</div>'
										:
										'<div class="btn-event-open" data-toggle="tooltip" data-placement="top" title="Đóng"  onclick="edit_status_core($(this), '.$row["user_id"].', \'is_show\', \'core_user\', \'user\');" rel="0">1</div>'
									?>
								</td>
								<td align="center">
									<?php echo showSortUser("sort_".$row["user_id"]."", $countList, $row["sort"], $row["user_id"] ,'core_user');?>
								</td>
								<td><?php echo getRoleName($row['role_id'])?></td>
								<td><?php echo stripslashes($row['full_name']);?></td>
								<td align="center"><?php echo $date->vnDateTime($row['created_time'])?></td>
								<td class="details-control" align="center">
									<div class="checkbox">
										<a href="?<?php echo TTH_PATH?>=core_user_edit&id=<?php echo $row['user_id']?>"><img data-toggle="tooltip" data-placement="top" title="Chỉnh sửa" src="images/setting.svg"></a> &nbsp;
										<label class="checkbox-inline">
											<input type="checkbox" data-toggle="tooltip" data-placement="top" title="Xóa" class="checkboxArt" name="idDel[]" value="<?php echo $row['user_id']?>">
										</label>&nbsp;&nbsp;
										<a href="?<?php echo TTH_PATH?>=core_dashboard&id=<?php echo $row['role_id']?>"><img data-toggle="tooltip" data-placement="top" title="Quyền quản trị" src="images/view.svg"></a>
									</div>
								</td>
							</tr>
						<?php
						}
						?>
						</tbody>
					</table>
					<div class="row">
						<div class="col-sm-6"><?php echo showPageNavigation($page, $totalpages,'?'.TTH_PATH.'=core_user&page=')?></div>
						<div class="col-sm-6" align="right" style="padding: 7px 0;">
							<label class="radio-inline"><input type="checkbox" id="selecctall"  data-toggle="tooltip" data-placement="top" title="Chọn xóa tất cả" ></label>
							<input type="button" class="btn btn-primary btn-xs confirm" value="Xóa" name="deleteArt">
						</div>
					</div>
				</form>
			</div>
			<!-- /.table-responsive -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-6 -->
</div>
<script>
	$(document).ready(function() {
		$('#dataTablesList').dataTable( {
			"language": {
				"url": "<?php echo ADMIN_DIR?>/js/plugins/dataTables/de_DE.txt"
			},
			"aoColumnDefs" : [ {
				"bSortable" : false,
				"aTargets" : [1,9, "no-sort" ]
			} ],
			"paging":   false,
			"info":     false,
			"order": [0, "asc" ],
			"columns": [
				null,
				null,
				null,
				null,
				null,
				{ "orderDataType": "dom-select" },
				null,
				null,
				null,
				null
			]
		} );

		$('#selecctall').click(function(event) {
			if(this.checked) {
				$('.checkboxArt').each(function() {
					this.checked = true;
				});
			}else{
				$('.checkboxArt').each(function() {
					this.checked = false;
				});
			}
		});
	});
	$(".confirm").click(function() {
		var element = $(this);
		var action = element.attr("id");
		confirm("Tất cả các dữ liệu liên quan sẽ được xóa và không thể phục hồi.\nBạn có muốn thực hiện không?", function() {
			if(this.data == true) document.getElementById("deleteArt").submit();
		});
	});
</script>