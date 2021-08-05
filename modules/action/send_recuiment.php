<?php
	$txtName = $_POST['full_name'];
	$txtEmail = $_POST['email'];
	$txtAddress = $_POST['address'];
	$txtDateOfBirth = $_POST['dateofbirth'];
	$txtDesiredWorking = $_POST['desired_working'];
	$txtDesiredIncome = $_POST['desired_income'];
	$txtEstimatedTime = $_POST['estimated_time'];
	$txtContent = $_POST['content'];
	if(empty($HTTP_X_FORWARDED_FOR)) $IP_NUMBER = getenv("REMOTE_ADDR");
	else $IP_NUMBER = $HTTP_X_FORWARDED_FOR;
	$domain = $_SERVER['HTTP_HOST'];
	$email_to = getConstant('email_contact');
	$email_name = getConstant('SMTP_mailname');
	$date = new DateClass();
	$time_now = time(); 
	$datetime_now = $date->vnDateTime($time_now);
	$subject = '['.$contact_recuiment.'] '.$txtName.' ('.$datetime_now.')';	
	$message = '<div marginwidth="0" marginheight="0" style="font-family:Arial,serif;"><table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="table-layout:fixed;"><tbody><tr><td width="100%" valign="top" bgcolor="#f5f5f5" style="border-top:3px solid #579902;padding:0;"><table border="0" cellpadding="0" cellspacing="0" align="center" style="margin:0 auto;width:100%;"><tbody><tr><td bgcolor="white" style="padding:10px 0; text-align: center;"><a href="' . HOME_URL_LANG .'" target="_blank"><img src="'. HOME_URL . getConstant('file_logo') .'" style="max-height:70px;max-width:80%;" alt="' . getConstant('meta_site_name') . '" border="0"></a></td></tr></tbody></table><div style="min-height:35px">&nbsp;</div><table border="0" cellpadding="0" cellspacing="0" align="center" style="min-width:290px;margin:0 auto;font-size:13px;color:#666666;font-weight:normal;text-align:left;font-family:Arial,serif;line-height:18px;" width="620"><tbody><tr><td style="border-left:6px solid #fb651b;font-size:13px;color:#666666;font-weight:normal;text-align:left;font-family:Arial,serif;line-height:18px;vertical-align:top;padding:15px 8px 25px 20px;" bgcolor="#fdfdfd"><p style="margin: 10px 0">Chào <b> '.$txtName.'</b>,</p><p style="margin: 10px 0">'.$ctco.'</p><p style="margin: 10px 0"><b style="text-decoration:underline;">'.$ttuv.'</b><br/><label style="font-weight:600;padding-left:12px;">' . $full_name .' : </label> ' .$txtName.'<br/><label style="font-weight:600;padding-left:12px;">'. $email_address .': </label> '.$txtEmail.'<br/><label style="font-weight:600;padding-left:12px;">'. $address .': </label> ' . $txtAddress .'<br/><label style="font-weight:600;padding-left:12px;">'. $date_of_birth.':</label> '.$txtDateOfBirth. '<br/><label style="font-weight:600;padding-left:12px;">'. $desired_working.':</label> '.$txtDesiredWorking. '<br/><label style="font-weight:600;padding-left:12px;">'. $desired_income.':</label> '.$txtDesiredIncome.'<br/><label style="font-weight:600;padding-left:12px;">'. $time_change_job.':</label> '.$txtEstimatedTime.'<br/><label style="font-weight:600;padding-left:12px;">'. $contact_content .':</label> '.$txtContent.'<br/><label style="font-weight:600;padding-left:12px;">IP: </label> '.$IP_NUMBER.'<br/><label style="font-weight:600;padding-left:12px;">'.$contact_time .': </label> '.$datetime_now.'<br/></p><p style="margin: 10px 0">'.$hkt.'</p><p style="margin: 10px 0">'.$ctcon.'</p></td></tr></tbody></table><div style="min-height:35px">&nbsp;</div></div>';
		
		$db->table = "recuiment";
		$data = array(
			'name'=>$db->clearText($txtName),
			'email'=>$db->clearText($txtEmail),
			'address'=>$db->clearText($txtAddress),
			'dateofbirth'=>$db->clearText($txtDateOfBirth),
			'desired_working'=>$db->clearText($txtDesiredWorking),
			'desired_income'=>$db->clearText($txtDesiredIncome),
			'estimated_time'=>$db->clearText($txtEstimatedTime),
			// 'upload_cv'=>$db->clearText($path),
			'content'=>$db->clearText($message),
			'ip'=>$db->clearText($IP_NUMBER),
			'icon'=>'fa-car',
			'created_time'=>$time_now
		); 
		$db->insert($data);
		$send_mail = sendMailFn($txtEmail, $txtName, $email_to, $email_name , $subject, $message, '' , $txtEmail, $txtName);
		if($send_mail == TRUE){
		?>
	<?php echo $txtContact_sendOk ; ?>
	<?php
		}else{
			echo $txtContact_sendDie;
		}
		?>
			
