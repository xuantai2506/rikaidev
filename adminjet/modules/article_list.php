<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
$article_menu_id =  isset($_GET['id']) ? $_GET['id']+0 : 0;
$category_id = 0;
$db->table = "article_menu";
$db->condition = "`article_menu_id` = $article_menu_id";
$db->order = "";
$db->limit = 1;
$rows = $db->select();
foreach($rows as $row){
	$category_id = $row['category_id'];
}
if($db->RowCount==0) loadPageAdmin("Mục không tồn tại.","?".TTH_PATH."=article_manager");

if(isset($_POST['idDel'])){
	$dir_dest = ROOT_DIR . DS .'uploads';
	$upload_id = array();
	$idDel = implode(',', $_POST['idDel']);

	$db->table = "article";
	$db->condition = "`article_id` IN ($idDel)";
	$db->order = "";
	$db->limit = "";
	$rows = $db->select();
	$i = 0;
	foreach($rows as $row) {
		$mask = $dir_dest . DS . "article" . DS . '*'.$row['img'];
		if(!empty($row['img']) && glob($mask)) {
			array_map("unlink", glob($mask));
		}

		$upload_id[$i] = $row['upload_id'];

		$list_img = "";
		$db->table = "uploads_tmp";
		$db->condition = "`upload_id` = ".($row['upload_id']+0);
		$db->order = "";
		$db->limit = 1;
		$rows_it = $db->select();
		foreach ($rows_it as $row_it){
			$list_img = $row_it['list_img'];
		}
		$img = explode(";",$list_img);
		if(count($img)>0) {
			for($j=0;$j<count($img);$j++) {
				if($img[$j] != ""){
					$mask = $dir_dest . DS . "photos" . DS . '*'.$img[$j];
					if (glob($mask))
						array_map("unlink", glob($mask));
				}
			}
		}
		$i++;
	}

	$upload_id = implode(',', $upload_id);
	$db->table = "uploads_tmp";
	$db->condition = "`upload_id` IN ($upload_id)";
	$db->delete();

	// Xóa Tb_ link
	$db->table = "link";
	$db->condition = "`category` = $category_id AND `menu` = $article_menu_id AND `post` IN ($idDel)";;
	$db->delete();
	// Xóa csld bài viết.
	$db->table = "article";
	$db->condition = "`article_id` IN ($idDel)";
	$db->delete();
	loadPageSucces("Đã xóa bài viết thành công.", "?".TTH_PATH."=article_list&id=" . $article_menu_id);
}
?>
<!-- Menu path -->
<div class="row">
	<h2 class="title_sp"><?php echo getNameMenuArt($article_menu_id)?></h2>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>"> Trang chủ</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=article_manager"> Quản lý nội dung</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=article_manager"> Bài viết</a>
		</li>
		<li>
			<?php echo getNameMenuArt($article_menu_id)?>
		</li>
	</ol>
</div>
<!-- /.row -->
<?php echo dashboardCoreAdminTwo("article_list;" . $category_id)?>
<div class="row">
	<div class="col-lg-12">

		<div class="panel panel-default panel-no-border">
			<div class="table-responsive">
				<a class="btn-add-new" href="?<?php echo TTH_PATH?>=article_add&id=<?php echo $article_menu_id?>">Thêm bài viết</a>
				<form method="post" id="deleteArt">
					<table class="table display table-manager" cellspacing="0" cellpadding="0" id="dataTablesList">
						<thead>
						<tr>
							<th>STT</th>
							<th>Hình ảnh</th>
							<th>Tiêu đề</th>
							<th>Hiển thị</th>
							<th>Nổi bật</th>
							<th>Lượt xem</th>
							<th>Ngày đăng</th>
							<th>Người đăng</th>
							<th>Chức năng</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$date = new DateClass();

						$query = '';
						$db->table = "article";
						$db->condition = "`article_menu_id` = " . $article_menu_id . $query;
						$db->order = "`created_time` DESC";
						$db->limit = "";
						$rows = $db->select();

						$totalpages = 0;
						$perpage = 50;
						$total = $db->RowCount;
						if($total%$perpage==0) $totalpages=$total/$perpage;
						else $totalpages = floor($total/$perpage)+1;
						if(isset($_GET["page"])) $page=$_GET["page"]+0;
						else $page=1;
						$start=($page-1)*$perpage;
						$i=0+($page-1)*$perpage;

						$db->table = "article";
						$db->condition = "article_menu_id = " . $article_menu_id . $query;
						$db->order = "created_time DESC";
						$db->limit = $start . ', '. $perpage;
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
										'<img id="popover-'.$i.'" class="btn-popover" title="'.stripslashes($row["name"]).'" src="images/has_image.svg">
										<script>
											var image = \'<img src="../uploads/article/'.$row["img"].'">\';
											$(\'#popover-'.$i.'\').popover({placement: \'bottom\', content: image, html: true});
										</script>'
									?>
								</td>
								<td><span class="tth-ellipsis">
									<?php echo stripslashes($row['name'])?></span></td>
								<?php
								//-----------Kiểm tra phân quyền ---------------------------------------
								if(in_array("article_edit;".$category_id,$corePrivilegeSlug)) {
								?>
								<td align="center">
									<?php echo ($row["is_active"]+0==0)?
										'<div class="btn-event-close" data-toggle="tooltip" data-placement="top" title="Mở" onclick="edit_status($(this), '.$row["article_id"].', \'is_active\', \'article\');" rel="1">0</div>'
										:
										'<div class="btn-event-open" data-toggle="tooltip" data-placement="top" title="Đóng" onclick="edit_status($(this), '.$row["article_id"].', \'is_active\', \'article\');" rel="0">1</div>'
									?>
								</td>
								<td align="center">
									<?php echo ($row["hot"]+0==0)?
										'<div class="btn-event-close" data-toggle="tooltip" data-placement="top" title="Mở" onclick="edit_status($(this), '.$row["article_id"].', \'hot\', \'article\');" rel="1">0</div>'
										:
										'<div class="btn-event-open" data-toggle="tooltip" data-placement="top" title="Đóng" onclick="edit_status($(this), '.$row["article_id"].', \'hot\', \'article\');" rel="0">1</div>'
									?>
								</td>
								<?php
								} else {
								?>
								<td align="center">
									<?php echo ($row["is_active"]+0==0)?
										'<div class="btn-event-close alertManager" data-toggle="tooltip" data-placement="top" title="Mở">0</div>'
										:
										'<div class="btn-event-open alertManager" data-toggle="tooltip" data-placement="top" title="Đóng">1</div>'
									?>
								</td>
								<td align="center">
									<?php echo ($row["hot"]+0==0)?
										'<div class="btn-event-close alertManager" data-toggle="tooltip" data-placement="top" title="Mở">0</div>'
										:
										'<div class="btn-event-open alertManager" data-toggle="tooltip" data-placement="top" title="Đóng">1</div>'
									?>
								</td>
								<?php }
								//----------- end if ------------
								?>
								<td align="center"><?php echo formatNumberVN($row['views']+0);?></td>
								<td align="center"><?php echo $date->vnDateTime($row['created_time'])?></td>
								<td align="center"><?php echo getUserName($row['user_id']);?></td>
								<td class="details-control" align="center">
									<div class="checkbox">
										<?php
										$href = '?'.TTH_PATH.'=article_edit&id='.$row['article_id'];
										?>
										<a href="<?php echo $href?>"><img data-toggle="tooltip" data-placement="top" title="Chỉnh sửa" src="images/setting.svg"></a> &nbsp;
										<label class="checkbox-inline">
											<input type="checkbox" data-toggle="tooltip" data-placement="top" title="Xóa" class="checkboxArt" name="idDel[]" value="<?php echo $row['article_id']?>">
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
						<div class="col-sm-6"><?php echo showPageNavigation($page, $totalpages,'?'.TTH_PATH.'=article_list&id='.$article_menu_id.'&page=')?></div>
						<div class="col-sm-6" align="right" style="padding: 7px 0;">
							<label class="radio-inline"><input type="checkbox" id="selecctall"  data-toggle="tooltip" data-placement="top" title="Chọn xóa tất cả" ></label>
							<input type="button" class="btn btn-primary btn-xs <?php echo in_array("article_del;".$category_id,$corePrivilegeSlug)? "confirmManager" : "alertManager"?> " value="Xóa" name="deleteArt">
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
	$('#dataTablesList').find('input[type="checkbox"]').shiftSelectable();
	$(document).ready(function() {
		$('#dataTablesList').dataTable( {
			"language": {
				"url": "<?php echo ADMIN_DIR?>/js/plugins/dataTables/de_DE.txt"
			},
			"aoColumnDefs" : [ {
				"bSortable" : false,
				"aTargets" : [ 1,8, "no-sort" ]
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
		confirm("Tất cả các dữ liệu liên quan đến bài viết sẽ được xóa và không thể phục hồi.\nBạn có muốn thực hiện không?", function() {
			if(this.data == true) document.getElementById("deleteArt").submit();
		});
	});
	$(".alertManager").boxes('alert', 'Bạn không được phân quyền với chức năng này.');
</script>