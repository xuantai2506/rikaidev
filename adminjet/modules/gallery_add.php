<?php

if (!defined('TTH_SYSTEM')) { die('Please stop!'); }

//

$category_id = 0;

$gallery_menu_id = isset($_GET['id']) ? $_GET['id']+0 : $gallery_menu_id+0;

$db->table = "gallery_menu";

$db->condition = "`gallery_menu_id` = $gallery_menu_id";

$db->order = "";

$db->limit = 1;

$rows = $db->select();

if($db->RowCount==0) loadPageAdmin("Mục không tồn tại.", "?".TTH_PATH."=gallery_manager");

foreach($rows as $row) {

	$category_id =	$row["category_id"]+0;

}

?>

<!-- Menu path -->

<div class="row">
	<h2 class="title_sp">Thêm hình ảnh</h2>
	<ol class="breadcrumb">

		<li>

			<a href="<?php echo ADMIN_DIR?>"> Trang chủ</a>

		</li>

		<li>

			<a href="?<?php echo TTH_PATH?>=gallery_manager"> Quản lý nội dung</a>

		</li>

		<li>

			<a href="?<?php echo TTH_PATH?>=gallery_manager"> Hình ảnh</a>

		</li>

		<li>

			<a href="?<?php echo TTH_PATH?>=gallery_list&id=<?php echo $gallery_menu_id?>"> <?php echo getNameMenuGal($gallery_menu_id)?></a>

		</li>

		<li>

			 Thêm hình ảnh

		</li>

	</ol>

</div>

<!-- /.row -->

<?php

include_once (_A_TEMPLATES . DS . "gallery.php");

if(empty($typeFunc)) $typeFunc = "no";



$date = new DateClass();



$file_max_size = FILE_MAX_SIZE;

$dir_dest = ROOT_DIR . DS .'uploads' . DS . "gallery";

$OK = false;

$error = '';

if($typeFunc=='add'){

	if(empty($name)) $error = '<span class="show-error">Vui lòng nhập tên hình.</span>';

	else {

		$handleUploadImg = false;

		$file_size = $_FILES['img']['size'];



		if($file_size>0) {

			$imgUp = new Upload($_FILES['img']);



			$imgUp->file_max_size = $file_max_size;

			if ($imgUp->uploaded) {

				$handleUploadImg = true;

				$OK = true;

			}

			else {

				$error = '<span class="show-error">Lỗi tải hình: '.$imgUp->error.'</span>';

			}

		}

		else {

			$handleUploadImg = false;

			$OK = true;

		}



		if($OK) {

			$id_query = 0;

			$db->table = "gallery";

			$data = array(

				'gallery_menu_id'=>$gallery_menu_id+0,

				'name'=>$db->clearText($name),

				'slug'=>$db->clearText($slug),
				'description'=>$db->clearText($description),

				'upload_id'=>$upload_img_id+0,

				'comment'=>$db->clearText($comment),

				'content'=>$db->clearText($content),

				'link'=>$db->clearText($link),

				'is_active'=>$is_active+0,

				'hot'=>$hot+0,

				'created_time'=>strtotime($date->dmYtoYmd($created_time)),

				'modified_time'=>time(),

				'user_id'=>$_SESSION["user_id"]

			);

			$db->insert($data);

			$id_query = $db->LastInsertID;

			// Link SEO

			$slug = (empty($slug)) ? $name : $slug;

			$slug = updateLinkSEO($slug, $category_id, $gallery_menu_id, $id_query);

			// Update Slug

			$db->table = "gallery";

			$data = array(

				'slug'=>$db->clearText($slug)

			);

			$db->condition = "`gallery_id` = $id_query";

			$db->update($data);



			if($handleUploadImg) {

				$stringObj = new String();

				$name_image = $stringObj->getSlug(substr($name, 0, 100) . '-' . time());
				$imgUp->file_new_name_body      = 'full_' . $name_image;
				$imgUp->Process($dir_dest);

				if($gallery_menu_id==1){	
                	$imgUp->file_new_name_body    =  $name_image;
					$imgUp->image_resize          = true;
					$imgUp->image_ratio_crop      = true;
					$imgUp->image_y               = 900;
					$imgUp->image_x               = 1600;
					
					$imgUp->Process($dir_dest);
                }elseif($gallery_menu_id==2){	
                	$imgUp->file_new_name_body    =  $name_image;
					$imgUp->image_resize          = true;
					$imgUp->image_ratio_crop      = true;
					$imgUp->image_y               = 99;
					$imgUp->image_x               = 220;
					$imgUp->Process($dir_dest);
                }
				if($imgUp->processed) {

					$name_img = $imgUp->file_dst_name;

					$db->table = "gallery";

					$data = array(

						'img'=>$db->clearText($name_img)

					);

					$db->condition = "`gallery_id` = $id_query";

					$db->update($data);

				}

                else {

                    loadPageAdmin("Lỗi tải hình: ".$imgUp->error,"?".TTH_PATH."=gallery_list&id=".$gallery_menu_id);

                }



					



					$imgUp-> Clean();

			}



			$db->table = "uploads_tmp";

			$data = array(

				'status'=>1

			);

			$db->condition = "`upload_id` = ".($upload_img_id+0);

			$db->update($data);

			$_SESSION['upload_id'] = 0;



			loadPageSucces("Đã thêm hình ảnh thành công.","?".TTH_PATH."=gallery_list&id=".$gallery_menu_id);

			$OK = true;

		}

	}

}

else {

	$upload_img_id  = 0;

	if($upload_img_id==0) {

		$db->table = "uploads_tmp";

		$data = array(

				'created_time'=>time()

		);

		$db->insert($data);

		$upload_img_id = $db->LastInsertID;

	}

	$name			= "";

	$slug           = "";
	$description    = "";
	$img            = "";

	$comment        = "";

	$content        = "";

	$link           = "";

	$is_active		= 1;

	$hot			= 0;

	$created_time   = $date->vnDateTime(time());

}

if(!$OK) gallery("?".TTH_PATH."=gallery_add", "add", 0, $gallery_menu_id, $name, $slug, $description, $img, $comment, $content, $link, $is_active, $hot, $created_time, $upload_img_id, $error);