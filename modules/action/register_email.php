<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
if($_POST['email'] !=  "") {
	$date = new DateClass();
	$txt_email = $_POST['email'];
	if(empty($HTTP_X_FORWARDED_FOR)) $IP_NUMBER = getenv("REMOTE_ADDR");
	else $IP_NUMBER = $HTTP_X_FORWARDED_FOR;
	$domain = $_SERVER['HTTP_HOST'];
	$email_to = getConstant('email_contact');
	$date = new DateClass();
	$time_now = time();
	$datetime_now = $date->vnDateTime(time());


	$subject = "[ĐĂNG KÝ E-MAIL]: (".$datetime_now.")";
	$message = getPage('reg_email');
	//---------
	$db->table = "register_email";
	$data = array(
		'email'=>$db->clearText($txt_email),
		'ip'=>$db->clearText($IP_NUMBER),
		'created_time'=>time()
	);
	$db->insert($data);?>
	<?php echo $txtContact_sendOk ; ?>
	<?php
		}else{
			echo $txtContact_sendDie;
		}
		?>