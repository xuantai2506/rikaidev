<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
?>

<!-- Menu path -->
<div class="row">
	<h2 class="title_sp"> Cấu hình upload</h2>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>"> Trang chủ</a>
		</li>
		<li>
			 Cấu hình
		</li>
		<li>
			 Cấu hình upload
		</li>
	</ol>
</div>
<!-- /.row -->
<?php echo dashboardCoreAdmin(); ?>
<?php
if(isset($_POST['update'])) {

	function updateConstant ($constant, $value) {
		global $db;
		$db->table = "constant";
		$data =array(
			'value'=>$db->clearText($value)
		);
		$db->condition = "constant = '".$constant."'";
		$db->update($data);
	}

	$upload_img_max_w = isset($_POST['upload_img_max_w']) ? $_POST['upload_img_max_w'] : 'auto';
	$upload_img_max_h = isset($_POST['upload_img_max_h']) ? $_POST['upload_img_max_h'] : 'auto';
	$upload_auto_resize = isset($_POST['upload_auto_resize']) ? $_POST['upload_auto_resize'] : 0;
	$upload_max_size = isset($_POST['upload_max_size']) ? $_POST['upload_max_size'] : 0;
	$upload_checking_mode = isset($_POST['upload_checking_mode']) ? $_POST['upload_checking_mode'] : '';
	$upload_type = isset($_POST['upload_type']) ? implode(',', $_POST['upload_type']) : '';
	$upload_ext = isset($_POST['upload_ext']) ? implode(',', $_POST['upload_ext']) : '';
	$upload_mime = isset($_POST['upload_mime']) ? implode(',', $_POST['upload_mime']) : '';

	updateConstant("upload_img_max_w", $upload_img_max_w);
	updateConstant("upload_img_max_h", $upload_img_max_h);
	updateConstant("upload_auto_resize", $upload_auto_resize);
	updateConstant("upload_max_size", $upload_max_size);
	updateConstant("upload_checking_mode", $upload_checking_mode);
	updateConstant("upload_type", $upload_type);
	updateConstant("upload_ext", $upload_ext);
	updateConstant("upload_mime", $upload_mime);

	loadPageSucces("Đã cập nhật thông tin cấu hình thành công.","?".TTH_PATH."=config_upload");
}

$up_max_size = min(convert_to_bytes(ini_get('upload_max_filesize')), convert_to_bytes(ini_get('post_max_size')));
$up_type = array(
	1 => 'adobe',
	2 => 'application',
	3 => 'archives',
	4 => 'audio',
	5 => 'documents',
	6 => 'flash',
	7 => 'images',
	8 => 'real',
	9 => 'text',
	10 => 'video',
	11 => 'xml',
);
$up_ext = array(
	1 => '3g2',
	2 => '3gp',
	3 => 'aac',
	4 => 'adp',
	5 => 'ai',
	6 => 'aif',
	7 => 'aifc',
	8 => 'aiff',
	9 => 'asf',
	10 => 'asx',
	11 => 'au',
	12 => 'avi',
	13 => 'bmp',
	14 => 'bz2',
	15 => 'css',
	16 => 'doc',
	17 => 'docm',
	18 => 'docx',
	19 => 'dotm',
	20 => 'dotx',
	21 => 'dra',
	22 => 'dts',
	23 => 'dtshd',
	24 => 'eol',
	25 => 'eps',
	26 => 'exe',
	27 => 'f4v',
	28 => 'fli',
	29 => 'flv',
	30 => 'flv',
	31 => 'fvt',
	32 => 'gif',
	33 => 'gz',
	34 => 'h261',
	35 => 'h263',
	36 => 'h264',
	37 => 'htm',
	38 => 'html',
	39 => 'iso',
	40 => 'jfif',
	41 => 'jpe',
	42 => 'jpeg',
	43 => 'jpg',
	44 => 'jpgm',
	45 => 'jpgv',
	46 => 'jpm',
	47 => 'js',
	48 => 'kar',
	49 => 'lvp',
	50 => 'm1v',
	51 => 'm2a',
	52 => 'm2v',
	53 => 'm3a',
	54 => 'm3u',
	55 => 'm3u',
	56 => 'm4v',
	57 => 'mid',
	58 => 'midi',
	59 => 'mj2',
	60 => 'mjp2',
	61 => 'mov',
	62 => 'mp2',
	63 => 'mp2a',
	64 => 'mp3',
	65 => 'mp4',
	66 => 'mp4a',
	67 => 'mp4v',
	68 => 'mpe',
	69 => 'mpeg',
	70 => 'mpg',
	71 => 'mpg4',
	72 => 'mpga',
	73 => 'mxu',
	74 => 'odg',
	75 => 'odp',
	76 => 'ods',
	77 => 'odt',
	78 => 'oga',
	79 => 'ogg',
	80 => 'ogv',
	81 => 'pdf',
	82 => 'pls',
	83 => 'png',
	84 => 'potm',
	85 => 'potx',
	86 => 'ppam',
	87 => 'pps',
	88 => 'ppsm',
	89 => 'ppsx',
	90 => 'ppt',
	91 => 'pptm',
	92 => 'pptx',
	93 => 'psd',
	94 => 'pya',
	95 => 'pyv',
	96 => 'qt',
	97 => 'ra',
	98 => 'ram',
	99 => 'rar',
	100 => 'rm',
	101 => 'rmi',
	102 => 'rtf',
	103 => 'rv',
	104 => 'snd',
	105 => 'spx',
	106 => 'swc',
	107 => 'swf',
	108 => 'tar',
	109 => 'tif',
	110 => 'tiff',
	111 => 'txt',
	112 => 'viv',
	113 => 'wav',
	114 => 'wax',
	115 => 'webm',
	116 => 'wm',
	117 => 'wma',
	118 => 'wmv',
	119 => 'wmx',
	120 => 'xls',
	121 => 'xlsb',
	122 => 'xlsm',
	123 => 'xlsx',
	124 => 'xml',
	125 => 'xps',
	126 => 'xsl',
	127 => 'zip'
);
$up_mime = array(
	1 => 'application/excel',
	2 => 'application/msword',
	3 => 'application/octet-stream',
	4 => 'application/pdf',
	5 => 'application/postscript',
	6 => 'application/rtf',
	7 => 'application/vnd.ms-excel',
	8 => 'application/vnd.ms-excel.sheet.binary.macroEnabled.12',
	9 => 'application/vnd.ms-excel.sheet.macroEnabled.12',
	10 => 'application/vnd.ms-powerpoint',
	11 => 'application/vnd.ms-powerpoint.addin.macroEnabled.12',
	12 => 'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
	13 => 'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',
	14 => 'application/vnd.ms-powerpoint.template.macroEnabled.12',
	15 => 'application/vnd.ms-word.document.macroEnabled.12',
	16 => 'application/vnd.ms-word.template.macroEnabled.12',
	17 => 'application/vnd.ms-xpsdocument',
	18 => 'application/vnd.oasis.opendocument.graphics',
	19 => 'application/vnd.oasis.opendocument.presentation',
	20 => 'application/vnd.oasis.opendocument.spreadsheet',
	21 => 'application/vnd.oasis.opendocument.text',
	22 => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
	23 => 'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
	24 => 'application/vnd.openxmlformats-officedocument.presentationml.template',
	25 => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
	26 => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
	27 => 'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
	28 => 'application/vnd.rn-realmedia',
	29 => 'application/x-bzip',
	30 => 'application/x-gzip',
	31 => 'application/x-javascript',
	32 => 'application/x-msdownload',
	33 => 'application/x-rar',
	34 => 'application/x-rar-compressed',
	35 => 'application/x-shockwave-flash',
	36 => 'application/x-swc',
	37 => 'application/x-tar',
	38 => 'application/x-zip',
	39 => 'application/x-zip-compressed',
	40 => 'application/zip',
	41 => 'audio/adpcm',
	42 => 'audio/aiff',
	43 => 'audio/basic',
	44 => 'audio/midi',
	45 => 'audio/mp3',
	46 => 'audio/mp4',
	47 => 'audio/mpeg',
	48 => 'audio/ogg',
	49 => 'audio/scpls',
	50 => 'audio/vnd.digital-winds',
	51 => 'audio/vnd.dra',
	52 => 'audio/vnd.dts',
	53 => 'audio/vnd.dts.hd',
	54 => 'audio/vnd.lucent.voice',
	55 => 'audio/vnd.ms-playready.media.pya',
	56 => 'audio/vnd.rn-realaudio',
	57 => 'audio/wav',
	58 => 'audio/x-aac',
	59 => 'audio/x-aiff',
	60 => 'audio/x-mpegurl',
	61 => 'audio/x-ms-wax',
	62 => 'audio/x-ms-wma',
	63 => 'audio/x-pn-realaudio',
	64 => 'image/bmp',
	65 => 'image/gif',
	66 => 'image/jpeg',
	67 => 'image/pjpeg',
	68 => 'image/png',
	69 => 'image/psd',
	70 => 'image/tiff',
	71 => 'image/x-bmp',
	72 => 'image/x-gif',
	73 => 'image/x-jpeg',
	74 => 'image/x-pjpeg',
	75 => 'image/x-png',
	76 => 'image/x-tiff',
	77 => 'text/css',
	78 => 'text/html',
	79 => 'text/plain',
	80 => 'text/xml',
	81 => 'text/xsl',
	82 => 'video/3gpp',
	83 => 'video/3gpp2',
	84 => 'video/avi',
	85 => 'video/h261',
	86 => 'video/h263',
	87 => 'video/h264',
	88 => 'video/jpeg',
	89 => 'video/jpm',
	90 => 'video/mj2',
	91 => 'video/mp4',
	92 => 'video/mpeg',
	93 => 'video/ogg',
	94 => 'video/quicktime',
	95 => 'video/vnd.fvt',
	96 => 'video/vnd.mpegurl',
	97 => 'video/vnd.ms-playready.media.pyv',
	98 => 'video/vnd.rn-realvideo',
	99 => 'video/vnd.vivo',
	100 => 'video/webm',
	101 => 'video/x-f4v',
	102 => 'video/x-fli',
	103 => 'video/x-flv',
	104 => 'video/x-m4v',
	105 => 'video/x-ms-asf',
	106 => 'video/x-ms-wm',
	107 => 'video/x-ms-wmv',
	108 => 'video/x-ms-wmx'
);
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default khoangcach">
			<div class="panel-body">
				<div class="table-respon">
					<form action="?<?php echo TTH_PATH?>=config_upload" method="post">
						<table class="table table-hover" style="width: 80%;">
							<tr>
								<td width="200px" class="ver-top"><label>Kích thước ảnh tối đa:</label></td>
								<td>
									<span>
										<input style="width: 100px; display: inline-block;" class="form-control" type="text" name="upload_img_max_w" value="<?php echo getConstant('upload_img_max_w')?>" >
									</span>
									<span> x </span>
									<span>
										<input style="width: 100px; display: inline-block;" class="form-control" type="text" name="upload_img_max_h" value="<?php echo getConstant('upload_img_max_h')?>" >
									</span> &nbsp;
									<label class="checkbox-inline">
										<input type="checkbox" name="upload_auto_resize" value="1" <?php if(getConstant('upload_auto_resize')==1) echo 'checked';?>> Tự động resize ảnh nếu kích thước lớn hơn kích thước tối đa.
									</label>
								</td>
							</tr>
							<tr>
								<td class="ver-top"><label>Dung lượng tối đa:</label></td>
								<td>
									<select  style="width: 215px; display: inline-block;" name="upload_max_size" class="form-control">
										<?php
										$select = '';
										for($i=$up_max_size; $i>0; $i=$i-1048576) {
											if($i==getConstant('upload_max_size')) $select = 'selected';
											else $select = '';
											echo '<option value="' . $i . '" ' . $select .'>' . convert_from_bytes($i) . '</option>';
										}
										?>
									</select>
									<span>&nbsp; (Server cho phép tải file có dung lượng tối đa: <?php echo convert_from_bytes($up_max_size);?>)</span>
								</td>
							</tr>
							<tr>
								<td class="ver-top"><label>Kiểu kiểm tra file tải lên:</label></td>
								<td>
									<select  style="width: 100px; display: inline-block;" name="upload_checking_mode" class="form-control">
										<option value="strong" <?php echo (getConstant("upload_checking_mode")=="strong")? "selected" : "" ?> >Mạnh</option>
										<option value="mild" <?php echo (getConstant("upload_checking_mode")=="mild")? "selected" : "" ?> >Vừa phải</option>
										<option value="lite" <?php echo (getConstant("upload_checking_mode")=="lite")? "selected" : "" ?> >Yếu</option>
										<option value="none" <?php echo (getConstant("upload_checking_mode")=="none")? "selected" : "" ?> >Không</option>
									</select>
								</td>
							</tr>
							<tr>
								<td class="ver-top"><label>Loại files cho phép:</label></td>
								<td>
									<?php
									foreach ($up_type as $key => $value) {
										$checked = '';
										if(in_array($key, explode(',', getConstant('upload_type')))) $checked = 'checked="checked"';
										echo '<label class="col-md-3 col-sm-6 col-xs-12 checkbox-inline-0"><input type="checkbox" name="upload_type[]" value="' . $key . '" ' . $checked . '> ' . $value . '</label>';
									}
									?>
								</td>
							</tr>
							<tr>
								<td class="ver-top"><label>Phần mở rộng bị cấm:</label></td>
								<td>
									<?php
									foreach ($up_ext as $key => $value) {
										$checked = '';
										if(in_array($key, explode(',', getConstant('upload_ext')))) $checked = 'checked="checked"';
										echo '<label class="col-md-3 col-sm-6 col-xs-12 checkbox-inline-0"><input type="checkbox" name="upload_ext[]" value="' . $key . '" ' . $checked . '> ' . $value . '</label>';
									}
									?>
								</td>
							</tr>
							<tr>
								<td class="ver-top"><label>Loại mime bị cấm:</label></td>
								<td>
									<?php
									foreach ($up_mime as $key => $value) {
										$checked = '';
										if(in_array($key, explode(',', getConstant('upload_mime')))) $checked = 'checked="checked"';
										echo '<label class="col-lg-6 col-xs-12 checkbox-inline-0"><input type="checkbox" name="upload_mime[]" value="' . $key . '" ' . $checked . '> ' . $value . '</label>';
									}
									?>
								</td>
							</tr>
							<tr>
								<td colspan="2" align="center" class="kc_button">
									<button type="submit" name="update" class="btn btn-form-primary btn-form">Đồng ý</button> &nbsp;
									<button type="reset" class="btn btn-form-success btn-form">Làm lại</button> &nbsp;
									<button type="button" class="btn btn-form-info btn-form" onclick="location.href='<?php echo ADMIN_DIR?>'">Thoát</button>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
