<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
$category_id = 0;
$article_menu_id = isset($_GET['id']) ? $_GET['id']+0 : $article_menu_id+0;
$db->table = "article_menu";
$db->condition = "`article_menu_id` = $article_menu_id";
$db->order = "";
$db->limit = 1;
$rows = $db->select();
if($db->RowCount==0) loadPageAdmin("Mục không tồn tại.","?".TTH_PATH."=article_manager");
$category_id = 0;
foreach($rows as $row) {
	$category_id = $row['category_id'];
}
?>
<!-- Menu path -->
<div class="row">
	<h2 class="title_sp">Thêm Bài Viết</h2>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>">Trang chủ</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=article_manager">Quản lý nội dung</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=article_manager"> Bài viết</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=article_list&id=<?php echo $article_menu_id?>"> <?php echo getNameMenuArt($article_menu_id)?></a>
		</li>
		<li>
			 Thêm bài viết
		</li>
	</ol>
</div>
<!-- /.row -->
<?php
include_once (_A_TEMPLATES . DS . "article.php");
if(empty($typeFunc)) $typeFunc = "no";

$date = new DateClass();

$OK = false;
$error = '';
if($typeFunc=='add'){
	//-----
	if(empty($name)) $error = '<span class="show-error">Vui lòng nhập tiêu đề bài viết.</span>';
	else {
		$handleUploadImg = false;
		$file_max_size = FILE_MAX_SIZE;
		$dir_dest = ROOT_DIR . DS . 'uploads' . DS . 'article';
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
                $OK = false;
			}
		}
		else {
			$handleUploadImg = false;
			$OK = true;
		}

		if($OK) {
			$id_query = 0;
			$db->table = "article";
			$data = array(
				'article_menu_id'=>$article_menu_id+0,
				'name'=>$db->clearText($name),
				'slug'=>$db->clearText($slug),
				'title'=>$db->clearText($title),
				'description'=>$db->clearText($description),
				'keywords'=>$db->clearText($keywords),
				'img_note'=>$db->clearText($img_note),
				'price'=>formatNumberToInt($price),
				'open_sale'=>formatNumberToInt($sale),
				'upload_id'=>$upload_img_id+0,
				'comment'=>$db->clearText($comment),
				'content'=>$db->clearText($content),
				'linhvuc'=>$db->clearText($linhvuc),
				'tamnhin'=>$db->clearText($tamnhin),
				'thanhtich'=>$db->clearText($thanhtich),
				'doitac'=>$db->clearText($doitac),
				'work_point'=>$db->clearText($work_point),
				'work_point'=>$db->clearText($jp_proficiency),
				'link'=>$db->clearText($link),
				'is_active'=>$is_active+0,
				'hot'=>$hot+0,
				'created_time'=>strtotime($date->dmYtoYmd($created_time)),
				'modified_time'=>time(),
				'user_id'=>$_SESSION["user_id"],
			);
			$db->insert($data);
			$id_query = $db->LastInsertID;
			// Link SEO
			$slug = (empty($slug)) ? $name : $slug;
			$slug = updateLinkSEO($slug, $category_id, $article_menu_id, $id_query);
			// Update Slug
			$db->table = "article";
			$data = array(
				'slug'=>$db->clearText($slug)
			);
			$db->condition = "`article_id` = $id_query";
			$db->update($data);

			if($handleUploadImg) {
				$stringObj = new String();
				$name_image = $stringObj->getSlug(substr($name, 0, 100) . '-' . time());

				$imgUp->file_new_name_body      = 'full_' . $name_image;
				$imgUp->Process($dir_dest);

				$imgUp->file_new_name_body    = $name_image;
				$imgUp->image_resize          = true;
				$imgUp->image_ratio_crop      = true;
				$imgUp->image_y               = 150; 
				$imgUp->image_x               = 150;
				$imgUp->Process($dir_dest);

				if($imgUp->processed) {
					$name_img = $imgUp->file_dst_name;
					$db->table = "article";
					$data = array(
						'img'=>$db->clearText($name_img)
					);
					$db->condition = "article_id = ".$id_query;
					$db->update($data);
				}
                else {
                    loadPageAdmin("Lỗi tải hình: ".$imgUp->error, "?".TTH_PATH."=article_list&id=".$article_menu_id);
                }
			
				
					$imgUp-> Clean();
			}

			$db->table = "uploads_tmp";
			$data = array(
					'status'=>1
			);
			$db->condition = "`upload_id` = ".($upload_img_id+0);
			$db->update($data);

			loadPageSucces("Đã thêm bài viết thành công.","?".TTH_PATH."=article_list&id=".$article_menu_id);
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
	$title			= "";
	$description	= "";
	$keywords		= "";
	$img            = "";
	$img_note       = "";
	$price          = "";
	$open_sale      = "";
	$comment        = "";
	$content        = "";
	$linhvuc        = "";
	$tamnhin        = "";
	$thanhtich      = "";
	$doitac         = "";
	$work_point     = "";
	$jp_proficiency = "";
	$link    		= "";
	$is_active		= 1;
	$hot			= 0;
	$created_time   = $date->vnDateTime(time());
}
if(!$OK) article("?".TTH_PATH."=article_add", "add", 0, $article_menu_id, $name, $slug, $title, $description, $keywords, $img, $img_note, $price, $open_sale , $comment, $content, $is_active, $hot, $created_time, $upload_img_id, $error, $link, $linhvuc, $tamnhin, $thanhtich, $doitac, $work_point,$jp_proficiency);