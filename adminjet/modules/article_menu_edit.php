<?php

if (!defined('TTH_SYSTEM')) { die('Please stop!'); }

//

?>

<!-- Menu path -->

<div class="row">
	<h2 class="title_sp">Chỉnh sửa chuyên mục</h2>
	<ol class="breadcrumb">

		<li>

			<a href="<?php echo ADMIN_DIR?>"> Trang chủ</a>

		</li>

		<li>

			<a href="?<?php echo TTH_PATH?>=article_manager">Quản lý nội dung</a>

		</li>

		<li>

			<a href="?<?php echo TTH_PATH?>=article_manager">Bài viết</a>

		</li>

		<li>

			 Chỉnh sửa chuyên mục

		</li>

	</ol>

</div>

<!-- /.row -->

<?php

include_once (_A_TEMPLATES . DS . "article_menu.php");

if(empty($typeFunc)) $typeFunc = "no";

$category_id = 0;

$article_menu_id =  isset($_GET['id']) ? $_GET['id']+0 : $article_menu_id+0;

$db->table = "article_menu";
$db->condition = "`article_menu_id` = $article_menu_id";
$db->order = "";
$db->limit = 1;
$rows = $db->select();
if($db->RowCount==0) loadPageAdmin("Chuyên mục không tồn tại.", "?" . TTH_PATH . "=article_manager");
foreach($rows as $row) {
	$category_id = $row['category_id'];
}



$OK = false;

$error = '';

if($typeFunc=='edit'){

	if(empty($name)) $error = '<span class="show-error">Vui lòng nhập tên chuyên mục.</span>';

	else {

		$handleUploadImg = false;

		$file_max_size = FILE_MAX_SIZE;

		$dir_dest = ROOT_DIR . DS . 'uploads' . DS . 'article_menu';

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

			// Link SEO

			$slug = (empty($slug)) ? $name : $slug;

			$slug = updateLinkSEO($slug, $category_id, $article_menu_id, 0, 'update');



			$id_query = 0;

			$db->table = "article_menu";

			$data = array(

				'name'=>$db->clearText($name),

				'slug'=>$db->clearText($slug),

				'title'=>$db->clearText($title),

				'description'=>$db->clearText($description),

				'keywords'=>$db->clearText($keywords),

				'comment'=>$db->clearText($comment),

				'icon'=>$db->clearText($font_icon),

				'plus'=>$db->clearText($plus),

				'is_active'=>$is_active+0,

				'hot'=>$hot+0,

				'modified_time'=>time(),

				'user_id'=>$_SESSION["user_id"]

			);

			$db->condition = "`article_menu_id` = $article_menu_id";

			$db->update($data);

			$id_query = $article_menu_id;



			if($handleUploadImg) {

				$stringObj = new String();

				if(glob($dir_dest . DS .'*'.$img)) array_map("unlink", glob($dir_dest . DS .'*'.$img));

				$img_name_file = $stringObj->getSlug(substr($name, 0, 100) . '-' . time());

				

				$imgUp->file_new_name_body      = 'full_' . $img_name_file;

				$imgUp->Process($dir_dest);


				if($category_id = 7){
					$imgUp->file_new_name_body    = $img_name_file;
					$imgUp->image_resize          = true;
					$imgUp->image_ratio_fill      = true;
					$imgUp->image_y               = 500;
					$imgUp->image_x               = 400;
					$imgUp->Process($dir_dest);
				}


				

				if($imgUp->processed) {

					$name_img = $imgUp->file_dst_name;

					$db->table = "article_menu";

					$data = array(

						'img'=>$db->clearText($name_img)

					);

					$db->condition = "`article_menu_id` = $id_query";

					$db->update($data);

				}

                else {

                    loadPageAdmin("Lỗi tải hình: ".$imgUp->error, "?".TTH_PATH."=article_manager");

                }
			
				$imgUp-> Clean();

			}

				$handleUploadImg = false;

				$file_max_size = FILE_MAX_SIZE;

				$dir_dest = ROOT_DIR . DS . 'uploads' . DS . 'article_menu';

				$file_size = $_FILES['img1']['size'];



				if($file_size>0) {

					$imgUp = new Upload($_FILES['img1']);



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



				if($handleUploadImg) {

					$stringObj = new String();



					$img_name_file = getRandomString().'-'.$id_query.'-'.substr($stringObj->getSlug($name),0,120);

					$imgUp->file_new_name_body      = 'full_' . $img_name_file;

					$imgUp->Process($dir_dest);



					if($category_id = 7){
						$imgUp->file_new_name_body    = $img_name_file;
						$imgUp->image_resize          = true;
						$imgUp->image_ratio_fill      = true;
						$imgUp->image_y               = 90;
						$imgUp->image_x               = 90;
						$imgUp->Process($dir_dest);
						}


					if($imgUp->processed) {

						$name_img = $imgUp->file_dst_name;

						$db->table = "article_menu";

						$data = array(

							'img1'=>$db->clearText($name_img)

						);

						$db->condition = "article_menu_id = ".$id_query;

						$db->update($data);

					}

		            else {

		                loadPageAdmin("Lỗi tải hình: ".$imgUp->error,"?".TTH_PATH."=article_manager");

		            }


					$imgUp-> Clean();

				}

			loadPageSucces("Đã chỉnh sửa chuyên mục thành công.","?".TTH_PATH."=article_manager");

			$OK = true;

		}

	}

}

else {

	$db->table = "article_menu";

	$db->condition = "`article_menu_id` = $article_menu_id";

	$db->order = "";

	$db->limit = 1;

	$rows = $db->select();

	foreach($rows as $row) {

		$category_id    = $row['category_id']+0;

		$name			= $row['name'];

		$slug			= $row['slug'];

		$title			= $row['title'];

		$description	= $row['description'];

		$keywords		= $row['keywords'];

		$parent			= $row['parent'];

		$comment		= $row['comment'];

		$font_icon		= $row['icon'];

		$plus           = $row['plus'];

		$is_active		= $row['is_active']+0;

		$hot			= $row['hot']+0;

		$img            = $row['img'];

		$img1           = $row['img1'];

	}

}

if(!$OK) articleMenu("?".TTH_PATH."=article_menu_edit", "edit", $article_menu_id, $category_id, $name, $slug, $title, $description, $keywords, $parent, $comment, $font_icon, $plus, $is_active, $hot, $img, $img1, $error);