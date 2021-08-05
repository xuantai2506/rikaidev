<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
function others($act, $typeFunc, $others_id, $others_menu_id, $name, $slug, $p_from, $p_to, $is_active, $hot, $error) {
	global $db, $tth;
	$db->table = "others_menu";
	$db->condition = "others_menu_id = $others_menu_id";
	$db->order = "";
	$db->limit = "";
	$rows = $db->select();
	foreach($rows as $row){
		dashboardCoreAdminTwo($tth.";".$row['category_id']);
	}
	//---
	$link_id = 0;
	$db->table = "link";
	$db->condition = "`link` LIKE '". $db->clearText($slug) . "'";
	$db->order = "";
	$db->limit = 1;
	$rows = $db->select();
	foreach($rows as $row) {
		$link_id = $row['link_id'];
	}
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="fa fa-files-o"></i> Nội dung hình ảnh
			</div>
			<div class="panel-body">
				<form action="<?php echo $act?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="typeFunc" value="<?php echo $typeFunc?>" />
					<input type="hidden" name="others_id" value="<?php echo $others_id?>" />
					<div class="panel-show-error">
						<?php echo $error?>
					</div>
					<table class="table table-hover" style="width: 70%;">
						<tr>
							<td width="120px" align="right"><label>Tiêu đề:</label></td>
							<td><input class="form-control" type="text" id="name" name="name" maxlength="200" value="<?php echo stripslashes($name)?>" required></td>
						</tr>
						<tr>
							<td align="right"><label>Liên kết tĩnh:</label></td>
							<td class="element-relative">
								<input class="form-control" type="text" id="slug" name="slug" maxlength="255" value="<?php echo stripslashes($slug)?>" >
								<div data-toggle="tooltip" data-placement="top" title="Tạo liên kết tĩnh" class="btn-get-slug" onclick="return getSlug2(<?php echo $link_id;?>);"></div>
							</td>
						</tr>
						<?php if($others_menu_id==7) { ?>
						<tr>
							<td align="right"><label>Thời gian:</label></td>
							<td><input class="form-control datepicker" id="input-date" type="text" name="p_from" maxlength="250" value="<?php echo stripslashes($p_from)?>" required></td>
						</tr>
						<tr>
							<td align="right"><label>Mô tả:</label></td>
							<td><textarea style="width: 100%" rows="8" class="form-control" ><?php echo stripslashes($p_to)?></textarea></td>
						</tr>
						<?php } ?>
						<tr>
							<td align="right"><label>Mục:</label></td>
							<td><?php echo categoryName($others_menu_id);?></td>
						</tr>
						<tr>
							<td align="right"><label>Hiển thị:</label></td>
							<td>
								<label class="radio-inline"><input type="radio" name="is_active" value="0" <?php echo $is_active==0?"checked":""?> > Đóng</label>
								<label class="radio-inline"><input type="radio" name="is_active" value="1" <?php echo $is_active==1?"checked":""?> > Mở</label>
							</td>
						</tr>
						<tr>
							<td align="right"><label>Nổi bật:</label></td>
							<td>
								<label class="radio-inline"><input type="radio" name="hot" value="0" <?php echo $hot==0?"checked":""?> > Đóng</label>
								<label class="radio-inline"><input type="radio" name="hot" value="1" <?php echo $hot==1?"checked":""?> > Mở</label>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<button type="submit" class="btn btn-form-primary btn-form">Đồng ý</button> &nbsp;
								<button type="reset" class="btn btn-form-success btn-form">Làm lại</button> &nbsp;
								<button type="button" class="btn btn-form-info btn-form" onclick="location.href='?<?php echo TTH_PATH?>=others_list&id=<?php echo $others_menu_id?>'">Thoát</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#input-date').datetimepicker({
		mask:'39/19/9999',
		lang:'vi',
		timepicker: false,
		format:'<?php echo TTH_DATE_FORMAT?>',
		closeOnDateSelect:true
	});
</script>
<?php
}
/**
 * @param $id
 * @param $par
 */
function categoryName($id) {
	echo '<select name="others_menu_id" class="form-control">';
	global $db;
	$db->table = "category";
	$db->condition = "type_id = 15";
	$db->order = "sort ASC";
	$db->limit = "";
	$rows = $db->select();
	foreach($rows as $row) {
		echo "<option value='".$row["category_id"]."' disabled";
		echo ">".stripslashes($row["name"])."</option>";
		loadMenuCategory($db, 0, 0, $row["category_id"], $id);
	}
	echo '</select>';

}

/**
 * @param $db
 * @param $level
 * @param $parent
 * @param $category_id
 * @param $par
 */
function loadMenuCategory($db, $level, $parent, $category_id, $id){
	$space = "-&nbsp;-&nbsp;";
	for($i=0; $i<$level; $i++){
		$space.="-&nbsp;";
	}
	$db->table = "others_menu";
	$db->condition = "category_id = ".$category_id." and parent = ".$parent;
	$db->order = "sort ASC";
	$db->limit = "";
	$rows2 = $db->select();
	foreach($rows2 as $row) {
		if ($level <= 3){
			echo "<option value='".$row["others_menu_id"]."'";
			if ($id==$row["others_menu_id"]) echo " selected ";
			echo ">".$space.stripslashes($row["name"])."</option>";
				loadMenuCategory($db, $level+2, $row["others_menu_id"]+0, $row["category_id"]+0, $id);
		}
	}
}

function sortAcs($id){
	global $db;
	$db->table = "others";
	$db->condition = "`others_menu_id` = $id";
	$db->order = "";
	$db->limit = "";
	$db->select();
	return $db->RowCount;
}
