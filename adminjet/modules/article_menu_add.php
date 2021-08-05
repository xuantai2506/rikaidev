<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
?>
<!-- Menu path -->
<div class="row">
	<h2 class="title_sp">Thêm chuyên mục</h2>
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
			 Thêm chuyên mục
		</li>
	</ol>
</div>
<!-- /.row -->
<?php
include_once (_A_TEMPLATES . DS . "article_menu.php");
if(empty($typeFunc)) $typeFunc = "no";
$category_id = isset($_GET['id_cat']) ? $_GET['id_cat']+0 : $category_id+0;
$db->table = "category";
$db->condition = "`category_id` = $category_id";
$db->order = "";
$db->limit = 1;
$rows = $db->select();
if($db->RowCount==0) loadPageAdmin("Chuyên mục không tồn tại.", "?" . TH_PATH . "=article_manager");
$article_menu_id = isset($_GET['id_art']) ? $_GET['id_art']+0 : 0;
$db->table = "article_menu";
$db->condition = "`article_menu_id` = $article_menu_id";
$db->order = "";
$db->limit = 1;
$rows = $db->select();
if($db->RowCount==0 && $article_menu_id!=0) loadPageAdmin("Chuyên mục không tồn tại.", "?" . TH_PATH . "=article_manager");

$OK = false;
$error = '';
if($typeFunc=='add'){
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
			$id_query = 0;
			$db->table = "article_menu";
			$data = array(
				'category_id'=>$category_id+0,
				'name'=>$db->clearText($name),
				'title'=>$db->clearText($title),
				'description'=>$db->clearText($description),
				'keywords'=>$db->clearText($keywords),
				'parent'=>$parent+0,
				'sort'=>sortAcs($category_id,$parent)+1,
				'comment'=>$db->clearText($comment),
				'icon'=>$db->clearText($font_icon),
				'plus'=>$db->clearText($plus),
				'is_active'=>$is_active+0,
				'hot'=>$hot+0,
				'created_time'=>time(),
				'modified_time'=>time(),
				'user_id'=>$_SESSION["user_id"]
			);
			$db->insert($data);
			$id_query = $db->LastInsertID;
			// Link SEO
			$slug = (empty($slug)) ? $name : $slug;
			$slug = updateLinkSEO($slug, $category_id, $id_query);
			// Update Slug
			$db->table = "article_menu";
			$data = array(
					'slug'=>$db->clearText($slug)
			);
			$db->condition = "`article_menu_id` = $id_query";
			$db->update($data);

			if($handleUploadImg) {
				$stringObj = new String();
				$img_name_file = $stringObj->getSlug(substr($name, 0, 100) . '-' . time());
				//--

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
                    loadPageAdmin("Lỗi tải hình: ".$imgUp->error, "?" . TTH_PATH . "=article_manager");
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
			loadPageSucces("Đã thêm chuyên mục thành công.","?".TTH_PATH."=article_manager");
			$OK = true;
		}
	}
}
else {
	$name			= "";
	$slug           = "";
	$title			= "";
	$description	= "";
	$keywords		= "";
	$parent			= isset($_GET['id_art']) ? $_GET['id_art']+0 : 0;
	$comment		= "";
	$font_icon		= "";
	$plus           = "";
	$is_active		= 1;
	$hot			= 0;
	$img            = "";
	$img1           = "";
}
if(!$OK) articleMenu("?".TTH_PATH."=article_menu_add", "add", 0, $category_id, $name, $slug, $title, $description, $keywords, $parent, $comment, $font_icon, $plus, $is_active, $hot, $img, $img1, $error);
