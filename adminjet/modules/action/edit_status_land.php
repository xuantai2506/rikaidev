<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
if(isset($_POST['id'])) {
	$id = $_POST['id']+0;
	$type = isset($_POST['type']) ? $_POST['type'] : '';
	$table = isset($_POST['table']) ? $_POST['table'] : '';
	$status = isset($_POST['status']) ? $_POST['status']+0 : 0;

	$db->table = $table;
	$data = array(
		$type => $status,
		'modified_time' => time()
	);
	$db->condition = $table."_id = ".$id;
	$db->update($data);

	$db->table = $table;
	$db->condition = $table."_id = ".$id;
	$db->order = "";
	$db->limit = "";
	$rows = $db->select();
	if($db->RowCount>0) {
		foreach($rows as $row) {
			if($row['status']+0 == 1) {
				echo '<button type="button" class="btn btn-success btn-sm-sm">Đã giao dịch</button>';
			} else {
				if(($row['expiration_time']+0) < time()) {
					echo '<button type="button" class="btn btn-danger btn-sm-sm">Hết hiệu lực</button>';
				} else if((($row['expiration_time']+0) - time()) < (7*24*3600)) {
					echo '<button type="button" class="btn btn-warning btn-sm-sm">Sắp hết hiệu lực</button>';
				} else {
					echo '<button type="button" class="btn btn-primary btn-sm-sm">Đang giao dịch</button>';
				}
			}
		}
	} else echo 'Error!';
}