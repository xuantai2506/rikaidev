<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
$category_id = $menu_id = 0;
$article_id = isset($_GET['id']) ? $_GET['id']+0 : $article_id+0;
$db->table = "article";
$db->condition = "`article_id` = $article_id";
$db->order = "";
$db->limit = 1;
$rows = $db->select();
foreach($rows as $row) {
	$menu_id = $row['article_menu_id'];
}
if($db->RowCount==0) loadPageAdmin("Bài viết không tồn tại.", "?".TTH_PATH."=article_manager");
// ---------------
$db->table = "article_menu";
$db->condition = "`article_menu_id` = $menu_id";
$db->order = "";
$db->limit = 1;
$rows = $db->select();
foreach($rows as $row) {
	$category_id = $row['category_id'];
}
?>
<!-- Menu path -->
<div class="row">
	<h2 class="title_sp">Sửa Bài Viết</h2>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>"> Trang chủ</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=article_manager">Quản lý nội dung</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=article_manager"> Bài viết</a>
		</li>
		<li>
			<a href="?<?php echo TTH_PATH?>=article_list&id=<?php echo $menu_id?>"> <?php echo getNameMenuArt($menu_id)?></a>
		</li>
		<li>
		Chỉnh sửa bài viết
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
if($typeFunc=='edit'){
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
		if(isset($del_img)) {
			$handleUploadImg = false;
			if(glob($dir_dest . DS .'*'.$img)) array_map("unlink", glob($dir_dest . DS .'*'.$img));

			$db->table = "article";
			$data = array(
				'img'=>'no'
			);
			$db->condition = "`article_id` = $article_id";
			$db->update($data);
		}

		if($OK) {
			$id_query = 0;
			// Link SEO
			$slug = (empty($slug)) ? $name : $slug;
			$slug = updateLinkSEO($slug, $category_id, $article_menu_id, $article_id, 'update');

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
				'comment'=>$db->clearText($comment),
				'content'=>$db->clearText($content),
				'linhvuc'=>$db->clearText($linhvuc),
				'tamnhin'=>$db->clearText($tamnhin),
				'thanhtich'=>$db->clearText($thanhtich),
				'doitac'=>$db->clearText($doitac),
				'work_point'=>$db->clearText($work_point),
				'jp_proficiency'=>$db->clearText($jp_proficiency),
				'link'=>$db->clearText($link),
				'is_active'=>$is_active+0,
				'hot'=>$hot+0,
				'created_time'=>strtotime($date->dmYtoYmd($created_time)),
				'modified_time'=>time(),
				'user_id'=>$_SESSION["user_id"],
			);
			$db->condition = "`article_id` = $article_id";
			$db->update($data);
			$id_query = $article_id;

			if($handleUploadImg) {
				$stringObj = new String();
				if(glob($dir_dest . DS .'*'.$img)) array_map("unlink", glob($dir_dest . DS .'*'.$img));
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
			loadPageSucces("Đã chỉnh sửa bài viết thành công.", "?".TTH_PATH."=article_list&id=".$article_menu_id);
			$OK = true;
		}
	}
}
else {
	$db->table = "article";
	$db->condition = "article_id = ".$article_id;
	$rows = $db->select();
	foreach($rows as $row) {
		$article_menu_id    = $row['article_menu_id']+0;
		$name			    = $row['name'];
		$slug               = $row['slug'];
		$title			    = $row['title'];
		$description	    = $row['description'];
		$keywords		    = $row['keywords'];
		$img                = $row['img'];
		$img_note           = $row['img_note'];
		$price          	= $row['price'];
		$open_sale      	= $row['open_sale'];
		$upload_img_id      = $row['upload_id']+0;
		$comment            = $row['comment'];
		$content            = $row['content'];
		$linhvuc        	= $row['linhvuc'];
		$tamnhin       		= $row['tamnhin'];
		$thanhtich      	= $row['thanhtich'];
		$doitac         	= $row['doitac'];
		$work_point			= $row['work_point'];
		$jp_proficiency     = $row['jp_proficiency'];
		$link 				= $row['link'];
		$is_active		    = $row['is_active']+0;
		$hot			    = $row['hot']+0;
		$created_time       = $date->vnDateTime($row['created_time']);
	}
}
if(!$OK) article("?".TTH_PATH."=article_edit", "edit", $article_id, $article_menu_id, $name, $slug, $title, $description, $keywords, $img, $img_note, $price, $open_sale ,$comment, $content, $is_active, $hot, $created_time, $upload_img_id, $error, $link, $linhvuc, $tamnhin, $thanhtich, $doitac,$work_point,$jp_proficiency);