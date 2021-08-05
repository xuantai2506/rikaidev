<?php

if (!defined('TTH_SYSTEM')) { die('Please stop!'); }

//

?>



<!-- Menu path -->

<div class="row">
	<h2 class="title_sp">Phần bổ sung</h2>
	<ol class="breadcrumb">

		<li>

			<a href="<?php echo ADMIN_DIR?>"> Trang chủ</a>

		</li>

		<li>

			 Quản lý nội dung

		</li>

		<li>

			 Phần trang bổ sung

		</li>

		

	</ol>

</div>

<!-- /.row -->

<?php echo dashboardCoreAdmin(); ?>

<?php

if(isset($_POST['idDel'])){



	$idDel = implode(',',$_POST['idDel']);



	$db->table = "page";

	$db->condition = "page_id IN (".$idDel.")";

	$db->delete();

	loadPageSucces("Đã xóa Trang bổ sung thành công.","?".TTH_PATH."=plugin_page");

}

?>

<div class="row">

	<div class="col-lg-12">

		<div class="panel panel-default panel-no-border">

			<div class="table-responsive">
				<a class="btn-add-new" href="?<?php echo TTH_PATH?>=plugin_page_add">Thêm trang</a>
				<form action="?<?php echo TTH_PATH?>=plugin_page" method="post" enctype="multipart/form-data" id="deleteArt">

					<table class="table display table-manager" cellspacing="0" cellpadding="0" id="dataTablesList">

						<thead>

						<tr>

							<th>STT</th>

							<th>Alias</th>

							<th>Tên trang</th>

							<th>Hiển thị</th>

							<th>Ngày cập nhật</th>

							<th>Người đăng</th>

							<th>Chức năng</th>

						</tr>

						</thead>

						<tbody>

						<?php

						$date = new DateClass();



						$db->table = "page";

						$db->condition = "";

						$db->order = "page_id ASC";

						$rows = $db->select();



						$totalpages = 0;

						$perpage = 30;

						$total = $db->RowCount;

						if($total%$perpage==0) $totalpages=$total/$perpage;

						else $totalpages = floor($total/$perpage)+1;

						if(isset($_GET["page"])) $page=$_GET["page"]+0;

						else $page=1;

						$start=($page-1)*$perpage;

						$i=0+($page-1)*$perpage;



						$db->table = "page";

						$db->condition = "";

						$db->order = "page_id ASC";

						$db->limit = $start.','.$perpage;

						$rows = $db->select();



						foreach($rows as $row) {

							$i++;

							?>

							<tr>

								<td align="center"><?php echo $i?></td>

								<td><?php echo stripslashes($row['alias'])?></td>

								<td><?php echo stripslashes($row['name'])?></td>

								<?php

								if(in_array("plugin_page_edit",$corePrivilegeSlug)) {

								?>

								<td align="center">

									<?php echo ($row["is_active"]+0==0)?

										'<div class="btn-event-close" data-toggle="tooltip" data-placement="top" title="Mở" onclick="edit_status($(this), '.$row["page_id"].', \'is_active\', \'page\');" rel="1">0</div>'

										:

										'<div class="btn-event-open" data-toggle="tooltip" data-placement="top" title="Đóng" onclick="edit_status($(this), '.$row["page_id"].', \'is_active\', \'page\');" rel="0">1</div>'

									?>

								</td>

								<?php

								}

								else {

								?>

									<td align="center">

										<?php echo ($row["is_active"]+0==0)?

											'<div class="btn-event-close alertManager" data-toggle="tooltip" data-placement="top" title="Mở">0</div>'

											:

											'<div class="btn-event-open alertManager" data-toggle="tooltip" data-placement="top" title="Đóng">1</div>'

										?>

									</td>

								<?php

								}

								?>

								<td align="center"><?php echo $date->vnDateTime($row['modified_time'])?></td>

								<td align="center"><?php echo getUserName($row['user_id']);?></td>

								<td class="details-control" align="center">

									<div class="checkbox">

										<a href="?<?php echo TTH_PATH?>=plugin_page_edit&id=<?php echo $row['page_id']?>"><img data-toggle="tooltip" data-placement="top" title="Chỉnh sửa" src="images/setting.svg"></a>&nbsp;&nbsp;

										<label class="checkbox-inline">

											<input type="checkbox" data-toggle="tooltip" data-placement="top" title="Xóa" class="checkboxArt" name="idDel[]" value="<?php echo $row['page_id']?>">

										</label>

									</div>

								</td>

							</tr>

						<?php

						}

						?>

						</tbody>

					</table>

					<div class="row">

						<div class="col-sm-6"><?php echo showPageNavigation($page, $totalpages,'?'.TTH_PATH.'=plugin_page&page=')?></div>

						<div class="col-sm-6" align="right" style="padding: 7px 0;">

							<label class="radio-inline"><input type="checkbox" id="selecctall"  data-toggle="tooltip" data-placement="top" title="Chọn xóa tất cả" ></label>

							<input type="button" class="btn btn-primary btn-xs  <?php echo in_array("plugin_page_del",$corePrivilegeSlug)? "confirmManager" : "alertManager"?> " value="Xóa" name="deleteArt">

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

				"aTargets" : [6, "no-sort" ]

			} ],

			"paging":   false,

			"info":     false,

			"order": [ 0, "asc" ]

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

	$(".confirmManager").click(function() {

		var element = $(this);

		var action = element.attr("id");

		confirm("Tất cả các dữ liệu liên quan sẽ được xóa và không thể phục hồi.\nBạn có muốn thực hiện không?", function() {

			if(this.data == true) document.getElementById("deleteArt").submit();

		});

	});

	$(".alertManager").boxes('alert', 'Bạn không được phân quyền với chức năng này.');

</script>