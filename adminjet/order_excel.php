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

	include_once(_A_FUNCTIONS . DS . "ContentManager.php");

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
	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'STT')
		->setCellValue('B1', 'Họ và tên')
		->setCellValue('C1', 'Điện thoại')
		->setCellValue('D1', 'Email')
		->setCellValue('E1', 'Địa chỉ')
		->setCellValue('F1', 'Sản phẩm')
		->setCellValue('G1', 'Số lượng')
		->setCellValue('H1', 'Trạng thái')
		->setCellValue('I1', 'Ngày đặt');

	$date = new DateClass();

	$db->table = "order";
	$db->condition = "";
	$db->order = "order_id DESC";
	$db->limit = "";
	$rows = $db->select();

	$stt = 2;
	$dem  = 0;
	foreach($rows as $row) {
		$dem++;
		$dataArray = array( $dem,
							stripslashes($row['full_name']),
							stripslashes($row['phone']),
							stripslashes($row['email']),
							stripslashes($row['address']),
							getNamProduct($row['product_id']),
							number_format($row['number']+0),
							($row['is_active']+0),
							$date->vnOther($row['created_time'], TTH_TIME_FORMAT)
						  );
		$objPHPExcel->getActiveSheet()->fromArray($dataArray, NULL, 'A'.$stt++);
	}
	// Set title row bold
	$objPHPExcel->getActiveSheet()->getStyle('A1:I1')->getFont()->setBold(true);

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
	header('Content-Disposition: attachment;filename="[Lovaweb-Admin]_danh_sach_dat_mua_hang_'.$time.'.xls"');
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
