<?php
@session_start();

// System
define( 'TTH_SYSTEM', true );
$_SESSION["language"] = (!empty($_SESSION["lang_admin"]) && isset($_SESSION["lang_admin"])) ? $_SESSION["lang_admin"] : 'vi';

require_once('..' . DIRECTORY_SEPARATOR . 'define.php');
include_once(_A_FUNCTIONS . DS . "Function.php");
try {
	$db =  new ActiveRecord(TTH_DB_HOST, TTH_DB_USER, TTH_DB_PASS, TTH_DB_NAME);
}
catch(DatabaseConnException $e) {
	echo $e->getMessage();
}
include_once(_F_INCLUDES . DS . "_tth_constants.php");

require_once(ROOT_DIR . DS . ADMIN_DIR . DS . '_check_login.php');
if($login_true) {
	/** Error reporting */
	error_reporting(E_ALL);
	ini_set('display_errors', TRUE);
	ini_set('display_startup_errors', TRUE);

	date_default_timezone_set('Asia/Bangkok');

	// Create new PHPExcel object
	$objPHPExcel = new PHPExcel();

	// Set document properties
	$objPHPExcel->getProperties()->setCreator('Maarten Balliauw')
		->setLastModifiedBy('Maarten Balliauw')
		->setTitle('PHPExcel Test Document')
		->setSubject('PHPExcel Test Document')
		->setDescription('Test document for PHPExcel, generated using PHP classes.')
		->setKeywords('office PHPExcel php')
		->setCategory('Test result file');

	// Create the worksheet
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Id.No')
		->setCellValue('B1', 'Email')
		->setCellValue('C1', 'Ngày đăng ký');

	$date = new DateClass();

	$db->table = "register_email";
	$db->condition = "";
	$db->order = "register_email_id DESC";
	$db->limit = "";
	$rows = $db->select();

	$stt = 2;
	foreach($rows as $row) {
		$dataArray = array( $row['register_email_id'],
							stripslashes($row['email']),
							$date->vnOther($row['created_time'], TTH_DATETIME_FORMAT)
						  );
		$objPHPExcel->getActiveSheet()->fromArray($dataArray, NULL, 'A'.$stt++);
	}
	// Set title row bold
	$objPHPExcel->getActiveSheet()->getStyle('A1:C1')->getFont()->setBold(true);

	// Set autofilter
	// Always include the complete filter range!
	// Excel does support setting only the caption
	// row, but that's not a best practise...
	$objPHPExcel->getActiveSheet()->setAutoFilter($objPHPExcel->getActiveSheet()->calculateWorksheetDimension());

	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);

	$time = date("d-m-Y_H-i-s",time());
	// Redirect output to a client’s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="[LovaWeb-Admin]_Danh_sach_dang_ky_email_nhan_tin_khuyen_mai_'.$time.'.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;

}
else echo "<script>window.location.href = '".ADMIN_DIR."';</script>";
?>
