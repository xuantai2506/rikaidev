<?php

if (!defined('TTH_SYSTEM')) { die('Please stop!'); }

//

function galleryMenu($act, $typeFunc, $gallery_menu_id, $category_id, $name, $slug, $title, $description, $keywords, $parent, $comment, $is_active, $hot, $img, $error) {

	global $tth, $db;

	dashboardCoreAdminTwo($tth.";".$category_id);

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

				<i class="fa fa-files-o"></i> Chuyên mục hình ảnh

			</div>

			<div class="panel-body">

				<form action="<?php echo $act?>" method="post" enctype="multipart/form-data">

					<input type="hidden" name="typeFunc" value="<?php echo $typeFunc?>" />

					<input type="hidden" name="parent" value="<?php echo $parent?>" />

					<input type="hidden" name="gallery_menu_id" value="<?php echo $gallery_menu_id?>" />

					<input type="hidden" name="category_id" value="<?php echo $category_id?>" />

					<input type="hidden" name="img" value="<?php echo $img?>" />

					<div class="panel-show-error">

						<?php echo $error?>

					</div>

					<table class="table table-hover" style="width: 70%;">

						<tr>

							<td width="150px" align="right"><label>Tên chuyên mục:</label></td>

							<td><input class="form-control" type="text" id="name" name="name" maxlength="200" value="<?php echo stripslashes($name)?>" required></td>

						</tr>

						<tr>

							<td align="right"><label>Liên kết tĩnh:</label></td>

							<td class="element-relative">

								<input class="form-control" type="text" id="slug" name="slug" maxlength="255" value="<?php echo stripslashes($slug)?>" >

								<div data-toggle="tooltip" data-placement="top" title="Tạo liên kết tĩnh" class="btn-get-slug" onclick="return getSlug2(<?php echo $link_id;?>);"></div>

							</td>

						</tr>

						<tr>

							<td align="right"><label>Mục cha:</label></td>

							<td><?php echo categoryName($category_id, $parent);?></td>

						</tr>

						<tr>

							<td align="right" class="ver-top"><label>Hình đại diện:</label></td>

							<td><input class="form-control file file-img" type="file" name="img" data-show-upload="false" data-max-file-count="1" accept="video/*"></td>

						</tr>

						<tr>

							<td align="right" class="ver-top"><label>Mô tả:</label></td>

							<td><textarea class="form-control" name="comment" rows="3"><?php echo stripslashes($comment)?></textarea></td>

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

							<td class="tth-bg-df" colspan="2"><strong>SEO</strong> -<span class="tth-gp-text">Không bắt buộc phải nhập, dữ liệu được lấy tự động nếu rỗng.</span></td>

						</tr>

						<tr>

							<td align="right" class="tth-gp-l"><label>Title:</label></td>

							<td class="tth-gp-r"><input class="form-control" type="text" name="title" maxlength="255" value="<?php echo stripslashes($title)?>" ></td>

						</tr>

						<tr>

							<td align="right" class="tth-gp-l"><label>Description:</label></td>

							<td class="tth-gp-r"><input class="form-control" type="text" name="description" maxlength="255" value="<?php echo stripslashes($description)?>" ></td>

						</tr>

						<tr>

							<td align="right" class="tth-gp-l tth-gp-b"><label>Keywords:</label></td>

							<td class="tth-gp-r tth-gp-b"><input class="form-control" type="text" name="keywords" data-role="tagsinput" value="<?php echo stripslashes($keywords)?>" ></td>

						</tr>

						<tr>

							<td colspan="2" align="center">

								<button type="submit" class="btn btn-form-primary btn-form">Đồng ý</button> &nbsp;

								<button type="reset" class="btn btn-form-success btn-form">Làm lại</button> &nbsp;

								<button type="button" class="btn btn-form-info btn-form" onclick="location.href='?<?php echo TTH_PATH?>=gallery_manager'">Thoát</button>

							</td>

						</tr>

					</table>

				</form>

			</div>

		</div>

	</div>

</div>

<script>

	$('.file-img').fileinput({

		<?php if($img!='no' && $img!='') { ?>

		initialPreview: [

			"<video width='100%' src='../uploads/gallery_menu/<?php echo $img?>' controls></video>"

		],

		<?php } ?>

		allowedFileExtensions : ['mp4']

	});

</script>

<?php

}



function categoryName($id, $par) {

	echo '<select class="form-control" disabled>';

	global $db;

	$db->table = "category";

	$db->condition = "type_id = 2";

	$db->order = "sort ASC";

	$db->limit = "";

	$rows = $db->select();

	foreach($rows as $row) {

		echo "<option value='".$row["category_id"]."'";

		if ($id==$row["category_id"] && $par==0) echo " selected ";

		echo ">".stripslashes($row["name"])."</option>";

		loadMenuCategory($db, 0, 0, $row["category_id"], $par);

	}

	echo '</select>';



}



function loadMenuCategory($db, $level, $parent, $category_id, $par){

	$db->table = "gallery_menu";

	$db->condition = "category_id = ".$category_id." and parent = ".$parent;

	$db->order = "sort ASC";

	$db->limit = "";

	$rows2 = $db->select();

	foreach($rows2 as $row) {

		if ($level <= 3){

			echo "<option value='".$row["category_id"]."'";

			if ($par==$row["gallery_menu_id"]) echo " selected ";

			echo ">".stripslashes($row["name"])."</option>";

				loadMenuCategory($db, $level+2, $row["gallery_menu_id"]+0, $row["category_id"]+0, $par);

		}

	}

}



function sortAcs($id,$parent){

	global $db;

	$db->table = "gallery_menu";

	$db->condition = "category_id = ".($id+0)." and parent = ".($parent+0);

	$db->limit = "";

	$db->select();

	return $db->RowCount;

}

