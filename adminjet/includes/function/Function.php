<?php

if (!defined('TTH_SYSTEM')) { die('Please stop!'); }

//

//Function __autoload()

function __autoload($classname) {

	if (file_exists(_F_CLASSES . DS . $classname . ".class.php")) {

		include(_F_CLASSES . DS . $classname . ".class.php");

	}

	else if (file_exists(_F_CLASSES . DS . $classname . ".php")) {

		include(_F_CLASSES . DS . $classname . ".php");

	}

	else if (file_exists(_F_CLASSES . DS . "class." . $classname . ".php")) {

		include(_F_CLASSES . DS . "class." . $classname . ".php");

	}

    else if (file_exists(_F_CLASSES . DS . str_replace('_', DS, $classname) . ".php")) {

	    include(_F_CLASSES . DS . str_replace('_', DS, $classname) . ".php");

    }

    else {

    }

}



//----------------------------------------------------------------------------------------------------------------------

/*	Checking Development Enviroment

	Set Reporting Error */

function setReporting() {

    if (DEVELOPMENT_ENVIRONMENT == true) {

        error_reporting(E_ALL);

        ini_set('display_errors', 'On');

    }

    else {

        error_reporting(E_ALL);

        ini_set('display_errors', 'Off');

        ini_set('log_errors', 'On');

        ini_set('error_log', ERROR_LOG_DIR);

    }

}

setReporting();



//----------------------------------------------------------------------------------------------------------------------

/** Hàm lấy giá trị bảng constant

 * @param $const

 * @return string

 */

function getConstant($const) {

	global $db;

	$const = $db->clearText($const);



	$value = '';

	$db->table = "constant";

	$db->condition = "constant = '".$const."'";

	$db->order = "";

	$rows = $db->select();

	foreach($rows as $row){

		$value = $row['value'];

	}



	return stripslashes($value);

}



//----------------------------------------------------------------------------------------------------------------------

/** Hàm gửi Mail

 * @param $emailReply

 * @param $nameReply

 * @param $nguoinhan

 * @param $namenguoinhan

 * @param $tieude

 * @param $noidung

 * @return bool

 */

function sendMailFn($emailReply, $nameReply, $emailTo, $nameTo, $subject, $content, $file = '', $emailTo2 = '' , $nameTo2 = '') {

	$content =	str_replace("\n"	, "<br>"	, $content);

	$content =	str_replace("  "	, "&nbsp; "	, $content);

	$content =	str_replace("<script>","&lt;script&gt;", $content);



	//Khởi tạo đối tượng

	$mail = new PHPMailer();

	$mail->IsSMTP();



	$mail->Host = getConstant("SMTP_host");

	$mail->Port = getConstant("SMTP_port");

	$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)

	// 1 = errors and messages

	// 2 = messages only

	$mail->SMTPAuth = true;

	(getConstant("SMTP_secure")!="none") ? $mail->SMTPSecure = getConstant("SMTP_secure") : "";

	$mail->Username = getConstant("SMTP_username");

	$mail->Password = getConstant("SMTP_password");



	$mail->SetFrom($mail->Username,getConstant("SMTP_mailname"));



	$mail->AddAddress($emailTo, $nameTo);

	if($emailTo2!="") {

		$mail->AddAddress($emailTo2, $nameTo2);

	}

	$mail->AddReplyTo($emailReply, $nameReply);



	$mail->Subject = $subject;

	$mail->CharSet = "utf-8";

	$body = $content;

	$mail->Body = $body;

	($file!='') ? $mail->AddAttachment($file) : "";

	$mail->IsHTML(true); 

	

	if(!$mail->Send()) {

		return FALSE;

	} else {

		return TRUE;

	}

}



//----------------------------------------------------------------------------------------------------------------------

/**

 * @param $str

 * @param $url

 */

function loadPageAdmin($str, $url) {

?>

    <div align="center">

	    <div id="spinningSquaresG">

		    <div id="spinningSquaresG_1" class="spinningSquaresG">

		    </div>

		    <div id="spinningSquaresG_2" class="spinningSquaresG">

		    </div>

		    <div id="spinningSquaresG_3" class="spinningSquaresG">

		    </div>

		    <div id="spinningSquaresG_4" class="spinningSquaresG">

		    </div>

		    <div id="spinningSquaresG_5" class="spinningSquaresG">

		    </div>

		    <div id="spinningSquaresG_6" class="spinningSquaresG">

		    </div>

		    <div id="spinningSquaresG_7" class="spinningSquaresG">

		    </div>

		    <div id="spinningSquaresG_8" class="spinningSquaresG">

		    </div>

	    </div>

	    <span class="show-error"><?php echo $str?></span>

        <br>Vui lòng đợi giây lát hoặc bấm <a style="font-weight:  bold;" href="<?php echo $url?>">vào đây</a> để tiếp tục...

    </div>

    <head>

        <meta http-equiv="Refresh" content="5; URL=<?php echo $url?>">

    </head>

<?php

   die();

}



/**

 * @param $str

 * @param $url

 */

function loadPageSucces($str, $url) {

	?>

	<div align="center">

		<div id="spinningSquaresG">

			<div id="spinningSquaresG_1" class="spinningSquaresG">

			</div>

			<div id="spinningSquaresG_2" class="spinningSquaresG">

			</div>

			<div id="spinningSquaresG_3" class="spinningSquaresG">

			</div>

			<div id="spinningSquaresG_4" class="spinningSquaresG">

			</div>

			<div id="spinningSquaresG_5" class="spinningSquaresG">

			</div>

			<div id="spinningSquaresG_6" class="spinningSquaresG">

			</div>

			<div id="spinningSquaresG_7" class="spinningSquaresG">

			</div>

			<div id="spinningSquaresG_8" class="spinningSquaresG">

			</div>

		</div>

		<span class="show-ok"><?php echo $str?></span>

		<br>Vui lòng đợi giây lát hoặc bấm <a style="font-weight:  bold;" href="<?php echo $url?>">vào đây</a> để tiếp tục...

	</div>

	<head>

		<meta http-equiv="Refresh" content="1; URL=<?php echo $url?>">

	</head>

	<?php

	die();

}



function dashboardCoreAdmin() {

	global $tth, $corePrivilegeSlug;

	if(!in_array($tth,$corePrivilegeSlug)) loadPageAdmin("Bạn không được phân quyền với chức năng này.", ADMIN_DIR);

}



function dashboardCoreAdminTwo($path) {

	global $corePrivilegeSlug;

	if(!in_array($path,$corePrivilegeSlug)) loadPageAdmin("Bạn không được phân quyền với chức năng này.", ADMIN_DIR);

}



//----------------------------------------------------------------------------------------------------------------------

/**

 * @param int $length

 * @return string

 */

function getRandomString($length = 8) {

	$validCharacters = "abcdefghijklmnopqrstuxyvwz0123456789";

	$validCharNumber = strlen($validCharacters);



	$result = "";



	for ($i = 0; $i < $length; $i++) {

		$index = mt_rand(0, $validCharNumber - 1);

		$result .= $validCharacters[$index];

	}



	return $result;

}



//----------------------------------------------------------------------------------------------------------------------

/**

 * @param $currentPage

 * @param $maxPage

 * @param string $path

 */

function showPageNavigation($currentPage, $maxPage, $path = '') {

	if ($maxPage <= 1) {

		return;

	}

	$nav = array(

		'left'	=>	3,

		'right'	=>	3,

	);



	if ($maxPage < $currentPage) {

		$currentPage = $maxPage;

	}

	$max = $nav['left'] + $nav['right'];

	if ($max >= $maxPage) {

		$start = 1;

		$end = $maxPage;

	}

	elseif ($currentPage - $nav['left'] <= 0) {

		$start = 1;

		$end = $max + 1;

	}

	elseif (($right = $maxPage - ($currentPage + $nav['right'])) <= 0) {

		$start = $maxPage - $max;

		$end = $maxPage;

	}

	else {

		$start = $currentPage - $nav['left'];

		if ($start == 2) {

			$start = 1;

		}



		$end = $start + $max;

		if ($end == $maxPage - 1) {

			++$end;

		}

	}



	$navig = '<div class="page-navigation"><ul class="pagination">';

	if ($currentPage >= 2) {

		if ($currentPage >= $nav['left']) {

			if ($currentPage - $nav['left'] > 2 && $max < $maxPage) {

				$navig .= '<li class="paginate_button"><a href="'.$path.'1">1</a></li>';

				$navig .= '<li class="paginate_button"><a>...</a></li>';

			}

		}

		$navig .= '<li class="paginate_button"><a href="'.$path.($currentPage - 1).'"><i class="fa fa-step-backward"></i></a></li>';

	}



	for ($i=$start;$i<=$end;$i++) {

		if ($i == $currentPage) {

			$navig .= '<li class="paginate_button active"><a>'.$i.'</a></li>';

		}

		else {

			$pg_link = $path.$i;

			$navig .= '<li class="paginate_button"><a href="'.$pg_link.'">'.$i.'</a></li>';

		}

	}



	if ($currentPage <= $maxPage - 1) {

		$navig .= '<li class="paginate_button"><a href="'.$path.($currentPage + 1).'"><i class="fa fa-step-forward"></i></a></li>';



		if ($currentPage + $nav['right'] < $maxPage - 1 && $max + 1 < $maxPage) {

			$navig .= '<li class="paginate_button"><a>...</a></li>';

			$navig .= '<li class="paginate_button"><a href="'.$path.$maxPage.'">'.$maxPage.'</a></li>';

		}

	}

	$navig .= '</ul></div>';



	echo $navig;

}



//----------------------------------------------------------------------------------------------------------------------

function getCurrentDir($path=".") {

	$dirarr = array();

	if ($dir = opendir($path)) {

		while (false !== ($entry = @readdir($dir))) {

			if (($entry!=".")&&($entry!="..")) {

				if ($path!=".") $newpath = $entry;

				else $newpath = $entry;

				$newpath = str_replace("//","/",$newpath);

				$dirarr[] = $newpath;

			}

		}

	}

	return $dirarr;

}// end func



//----------------------------------------------------------------------------------------------------------------------

function size_format($bytes="") {

	$retval = "";

	if ($bytes >=  pow(1024,5)) {

		$retval = round($bytes / pow(1024,5) * 100 ) / 100 . " PB";

	} else if ($bytes >=  pow(1024,4)) {

		$retval = round($bytes / pow(1024,4) * 100 ) / 100 . " TB";

	} else if ($bytes >=  pow(1024,3)) {

		$retval = round($bytes / pow(1024,3) * 100 ) / 100 . " GB";

	} else if ($bytes >=  pow(1024,2)) {

		$retval = round($bytes / pow(1024,2) * 100 ) / 100 . " MB";

	} else if ($bytes  >= 1024) {

		$retval = round($bytes / 1024 * 100 ) / 100 . " KB";

	} else {

		$retval = $bytes . " bytes";

	}

	return $retval;

}



function convert_to_bytes( $string ) {

	if(preg_match( '/^([0-9\.]+)[ ]*([b|k|m|g|t|p|e|z|y]*)/i', $string, $matches)) {

		if( empty( $matches[2] ) ) return $matches[1];

		$suffixes = array(

			'B' => 0,

			'K' => 1,

			'M' => 2,

			'G' => 3,

			'T' => 4,

			'P' => 5,

			'E' => 6,

			'Z' => 7,

			'Y' => 8

		);

		if(isset($suffixes[strtoupper( $matches[2])])) return round($matches[1] * pow(1024, $suffixes[strtoupper( $matches[2])]));

	}

	return false;

}



function convert_from_bytes($size){

	if($size <= 0) return '0 bytes';

	if($size == 1) return '1 byte';

	if($size < 1024) return $size . ' bytes';

	$i = 0;

	$iec = array( 'bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB' );

	while(($size / 1024) >= 1){

		$size = $size / 1024;

		++$i;

	}

	return number_format( $size, 2 ) . ' ' . $iec[$i];

}

//----------------------------------------------------------------------------------------------------------------------

/** Đếm tổng số truy cập

 * @return int

 */

function getTotalHits() {

	global $db;

	$data = 0;



	$db->table = "online_daily";

	$db->condition = 1;

	$db->order = "";

	$db->limit = "";

	$rows = $db->select();

	foreach ($rows as $row){

		$data += $row["count"]+0;

	}

	return formatNumberVN($data);

}



//----------------------------------------------------------------------------------------------------------------------

/** Lấy thông tin User

 * @param int $id

 * @return array

 * @throws DatabaseConnException

 */

function getInfoUser($id = 0) {

	global $db;

	$info = array();

	$db->table = "core_user";

	$db->condition = "user_id = " . ($id+0);

	$db->order = "";

	$db->limit = 1;

	$rows = $db->select();

	foreach($rows as $row) {

		$info[0] = stripslashes($row['full_name']);

		$info[1] = stripslashes($row['apply']);

		$info[2] = stripslashes($row['phone']);

		$info[3] = stripslashes($row['email']);

		if($row['img']=='no' || $row['img']=='' ) {

			$info[4] = '/uploads/user/no-avatar-' .  ($row['gender']+0) . '.png';

			$info[4] = '<img src="' . $info[4] . '" title="' . stripslashes($row['full_name']) . '" >';

		} else {

			$info[4] = '/uploads/user/sm_' . $row['img'];

			$info[4] = '<img src="' . $info[4] . '" title="' . stripslashes($row['full_name']) . '" >';

		}

		$info[5] = stripslashes($row['role_id']);

		$info[6] = stripslashes($row['user_name']);

	}

	return $info;

}



//----------------------------------------------------------------------------------------------------------------------

/** Tính tổng bài viết

 * @return string

 */

function getTotalArticle() {

	global $db;

	$db->table = "article";

	$db->condition = "";

	$db->order = "";

	$db->limit = "";

	$db->select();

	return formatNumberVN($db->RowCount);

}



//----------------------------------------------------------------------------------------------------------------------

/** Tính tổng sản phẩm

 * @return string

 */

function getTotalProduct() {

	global $db;

	$db->table = "product";

	$db->condition = "";

	$db->order = "";

	$db->limit = "";

	$db->select();

	return formatNumberVN($db->RowCount);

}



//----------------------------------------------------------------------------------------------------------------------

/** Tính tổng dự án

 * @return string

 */

function getTotalProject() {

	global $db;

	$db->table = "project_menu";

	$db->condition = "";

	$db->order = "";

	$db->limit = "";

	$db->select();

	return formatNumberVN($db->RowCount);

}



//----------------------------------------------------------------------------------------------------------------------

/** Tính tổng đường

 * @return string

 */

function getTotalStreet() {

	global $db;

	$db->table = "street";

	$db->condition = "";

	$db->order = "";

	$db->limit = "";

	$db->select();

	return formatNumberVN($db->RowCount);

}



//----------------------------------------------------------------------------------------------------------------------

/** Tính tổng tên dự án

 * @return string

 */

function getTotalNameProject() {

	global $db;

	$db->table = "prjname";

	$db->condition = "";

	$db->order = "";

	$db->limit = "";

	$db->select();

	return formatNumberVN($db->RowCount);

}



function countProductZe($id) {

	global $db;

	$count = 0;



	$db->table = "product";

	$db->condition = "product_menu_id = " . ($id+0);

	$db->order = "";

	$db->limit = "";

	$db->select();

	$count = $db->RowCount;

	return $count;

}



//----------------------------------------------------------------------------------------------------------------------

function getTotalUser() {

	global $db;

	$db->table = "core_user";

	$db->condition = "";

	$db->order = "";

	$db->limit = "";

	$db->select();

	return formatNumberVN($db->RowCount);

}

function getTotalRole() {

	global $db;

	$db->table = "core_role";

	$db->condition = "";

	$db->order = "";

	$db->limit = "";

	$db->select();

	return formatNumberVN($db->RowCount);

}



//----------------------------------------------------------------------------------------------------------------------

/**

 * @param array $currentdir

 * @param $dir_dest

 */

function showFileBackupData(array $currentdir, $dir_dest) {

	?>

	<table class="table table-manager table-striped table-bordered table-hover">

		<thead>

		<tr>

			<th>STT</th>

			<th>Tên file</th>

			<th>Dung lương</th>

			<th>Thời gian</th>

			<th>Chức năng</th>

		</tr>

		</thead>

		<tbody>

		<?php

		$date = new DateClass();

		$string = array();

		$timefile = time();

		for ($i=0;$i<count($currentdir);$i++) {

			$entry = $currentdir[$i];

			if (!is_dir($entry)) {

				$name = $entry;

				$string = explode("_",$name);

				$filesize = @filesize($dir_dest."/".$name);

				$timefile = str_replace(".sql.gz","",$string[1]);

				$timefile = str_replace(".gz","",$timefile);

				$timefile = str_replace(".sql","",$timefile);

				?>

				<tr>

					<td align="center"><?php echo $i+1?></td>

					<td><?php echo $string[1]?></td>

					<td align="right"><?php echo size_format($filesize)?></td>

					<td align="center"><?php echo $date->vnFull($timefile)?></td>

					<td align="center">

						<a  data-toggle="tooltip" data-placement="left" title="Tải xuống" href="download.php?<?php echo TTH_PATH?>=<?php echo $dir_dest?>&filename=<?php echo $name?>" ><img src="images/download.svg"></a>&nbsp;&nbsp;

						<a  data-toggle="tooltip" data-placement="right" title="Xóa file" class="confirmManager" style="cursor: pointer;" id="?<?php echo TTH_PATH?>=backup_data&filename=<?php echo $name?>" ><img src="images/delete.svg"></a>

					</td>

				</tr>

			<?php

			}

		} ?>

		</tbody>

	</table>

	<script>

		$(".confirmManager").click(function() {

			var element = $(this);

			var action = element.attr("id");

			confirm("File sao lưu cơ sở dữ liệu này sẽ được xóa và không thể phục hồi lại nó.\nBạn có muốn thực hiện không?", function() {

				if(this.data == true) window.location.href = action;

			});

		});

	</script>

<?php

}



//----------------------------------------------------------------------------------------------------------------------

/**

 * @param $url

 * @param $filename

 * @param $dir

 * @return bool

 */

function uploadVideo($url, $filename , $dir)

{

	$test = false;

	$url = 'http://img.youtube.com/vi/'.$url.'/hqdefault.jpg';

	define("URL_1", $url);



	$UploadDir =  $dir;



	define("URL_2", $UploadDir.$filename.".jpg");

	$f1 = @fopen ( URL_1, "rb");

	$f2 = @fopen ( URL_2, "w");

	while ( $Buff = @fread( $f1, 1024 ) ) {

		@fwrite($f2, $Buff);

		$test = true;

	}

	@fclose($f1);

	@fclose($f2);



	return $test;

}



//----------------------------------------------------------------------------------------------------------------------

/**

 * @param $text

 * @return mixed

 */

function formatNumberToInt($text) {

	$text = str_replace(".", "", $text);

	return $text+0;

}



function formatNumberToFloat($text) {

	$text = str_replace(".", "", $text);

	$text = str_replace(",", ".", $text);

	return $text+0;

}



/**

 * @param $num

 * @return string

 */

function formatNumberVN($num) {

	return number_format(($num+0),0,"",".");

}



function getIdMenuSlug($slug, $tb) {

	global $db;

	$rs = 0;

	$db->table = $tb."_menu";

	$db->condition = "`slug` LIKE '$slug'";

	$db->order = "";

	$db->limit = 1;

	$rows = $db->select();

	foreach ($rows as $row){

		$rs = $row[$tb . '_menu_id'] + 0;

	}

	return $rs;

}

function getNameMenuSlug($slug, $tb) {

	global $db;

	$rs = "";

	$db->table = $tb."_menu";

	$db->condition = "`slug` LIKE '$slug'";

	$db->order = "";

	$db->limit = 1;

	$rows = $db->select();

	foreach ($rows as $row){

		$rs = $row['name'];

	}

	return stripslashes($rs);

}

function getNameToSlug($slug, $tb) {

	global $db;

	$rs = "";

	$db->table = $tb;

	$db->condition = "`slug` LIKE '$slug'";

	$db->order = "";

	$db->limit = 1;

	$rows = $db->select();

	foreach ($rows as $row){

		$rs = $row['name'];

	}

	return stripslashes($rs);

}



function updateLinkSEO($slug, $category = 0, $menu = 0, $post = 0, $type = 'insert') {

	global $db;

	$stringObj = new String();

	$slug = $stringObj->getSlug($slug);



	$id = 0;

	$db->table = "link";

	$db->condition = "link LIKE '". $db->clearText($slug) . "'";

	$db->order = "";

	$db->limit = 1;

	$rows = $db->select();

	foreach($rows as $row) {

		$id = $row['link_id'];

	}



	if($type=='insert') {

		if($id>0) $slug = $stringObj->getSlug($slug . '-' . getRandomString(10));

		//---

		$data = array(

				'link'=>$db->clearText($slug),

				'category'=>$category,

				'menu'=>$menu,

				'post'=>$post,

				'modified_time'=>time()

		);

		$db->insert($data);

		if($db->LastInsertID==0) $slug = '-no-';

	} else {

		$db->table = "link";

		//

		if($menu==0 && $post==0) $db->condition = "`category` =  $category";

		elseif($post==0) $db->condition = "`category` =  $category AND `menu` = $menu";

		else $db->condition = "`category` =  $category AND `post` = $post";

		//

		$db->order = "";

		$db->limit = 1;

		$rows = $db->select();

		if($db->RowCount>0) {

			foreach($rows as $row) {

				if($id>0 && $id!=$row['link_id']) {

					$slug = $stringObj->getSlug($slug . '-' . getRandomString(10));

				}

				$db->table = "link";

				$data = array(

					'link'=>$db->clearText($slug),

					'category'=>$category,

					'menu'=>$menu,

					'post'=>$post,

					'modified_time'=>time()

				);

				$db->condition = "`link_id` = " . $row['link_id'];

				$db->update($data);

				if($db->AffectedRows==0) $slug = '-no-';

			}

		} else {

			$data = array(

					'link'=>$db->clearText($slug),

					'category'=>$category,

					'menu'=>$menu,

					'post'=>$post,

					'modified_time'=>time()

			);

			$db->insert($data);

			if($db->LastInsertID==0) $slug = '-no-';

		}

	}

	return $slug;

}





function loadListCity($choice = '') {

	global $db;

	$result = '';

	$result .= '<select class="form-control selectpicker" name="city" data-live-search="true" data-live-search-placeholder="Tìm..." title="Chọn thành phố/tỉnh..." onchange="return listDistrict(this.value);">';

	$db->table = "others_menu";

	$db->condition = "`is_active` = 1 AND `parent` = 0 AND `category_id` = 95";

	$db->order = "`sort` ASC";

	$db->limit = "";

	$rows = $db->select();

	foreach($rows as $row) {

		$selected = '';

		if($row['slug'] == $choice) $selected = ' selected';

		$result .= '<option value="' . stripslashes($row['slug']) . '"' . $selected . '>' . stripslashes($row['name']) . '</option>';

	}

	$result .= '</select>';



	return $result;

}



function loadListDistrict($city = '', $choice = '') {

	global $db;

	$result = '';

	$city = getIdMenuSlug($city, 'others');

	$result .= '<select class="form-control selectpicker" name="district" data-live-search="true" data-live-search-placeholder="Tìm..." title="Chọn quận/huyện...">';

	$db->table = "others";

	$db->condition = "`is_active` = 1 AND `others_menu_id` = $city";

	$db->order = "`sort` ASC";

	$db->limit = "";

	$rows = $db->select();

	foreach($rows as $row) {

		$selected = '';

		if($row['slug'] == $choice) $selected = ' selected';

		$result .= '<option value="' . stripslashes($row['slug']) . '"' . $selected . '>' . stripslashes($row['name']) . '</option>';

	}

	$result .= '</select>';



	return $result;

}



function loadListStreet($choice = '') {

	global $db;

	$list = array();

	$db->table = "others";

	$db->condition = "`is_active` = 1 AND `others_menu_id` = 6";

	$db->order = "`sort` ASC";

	$db->limit = "";

	$rows = $db->select();

	if($db->RowCount > 0) {

		$i = 0;

		foreach($rows as $row) {

			if($choice==$row['slug']) $choice = $row['name'];

			$list[$i] = $row['name'];

			$i++;

		}

	}

	$list = implode('","', $list);

	echo '<input class="form-control" type="text" name="address" maxlength="255" value="' . stripslashes($choice) . '" data-provide="typeahead" data-items="5" data-source=\'["'. $list .'"]\' autocomplete="off">';

}



function sortAcsStreet() {

	global $db;

	$db->table = "others";

	$db->condition = "`others_menu_id` = 6";

	$db->order = "";

	$db->limit = "";

	$db->select();

	return $db->RowCount;

}