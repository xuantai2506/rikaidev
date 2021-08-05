<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
if(isset($_POST['id'])) {
	$id = $_POST['id'];
	$content = '';
	$date = new DateClass();

	$db->table = "question";
	$db->condition = "question_id = $id";
	$db->order = "";
	$db->limit = 1;
	$rows = $db->select();
	if($db->RowCount > 0) {
		foreach($rows as $row) {
			$content = '<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">[HỎI ĐÁP]: ' . stripslashes($row['name']) . ' (' . $date->vnDateTime($row['created_time']) . ')</h4>
								</div>
								<div class="modal-body">' . stripslashes($row['content']) . '</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-form-primary btn-form" data-dismiss="modal">Đóng</button>
								</div>
							</div>
						</div>';
		}
	}
	echo $content;
}