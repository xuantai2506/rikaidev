<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
include(_F_INCLUDES . DS . "tth_banner.php");
?>
<section class="breadcrumb_content_page">
	<div class="container">
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a title="<?php echo $lgTxt_home;?>" href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>"><?php echo $lgTxt_home;?></a></li>
			<?php
				$db->table = "category";
				$db->condition = "slug = '".$slug_cat."'";
				$db->order = "";
				$db->limit = "";
				$rowdp = $db->select();
				foreach ($rowdp as $rowxyz) {
			?>
			<li class="breadcrumb-item">
				<a title="<?php echo $rowxyz['name'];?>" href="<?php echo HOME_URL; ?>/<?php echo $lgTxt_lang;?>/<?php echo $rowxyz['slug'];?>"><?php echo $rowxyz['name'];?></a>
			</li>
			<?php } ?>
		</ul>
	</div>
</section>
<section class="section_contact">
	<div class="container">
		<div class="box_page_contact">
			<div class="box_content_contact">
				<div class="hotline_contact">
					<a href="tel:<?php echo getConstant('tell_contact');?>"><?php echo getConstant('tell_contact');?></a>
				</div>
				<div class="email_contact">
					<a href="mailto:<?php echo getConstant('email_contact');?>"><?php echo getConstant('email_contact');?></a>
				</div>
				<div class="box_text_contact">
					<div class="title_text_contact">
						<h2><?php echo getPage('japan_company','name');?></h2>
					</div>
					<div class="list_text_contact">
						<?php echo getPage('japan_company','content');?>
					</div>
				</div>
				<div class="box_text_contact">
					<div class="title_text_contact">
						<h2><?php echo getPage('vietnam_company','name');?></h2>
					</div>
					<div class="list_text_contact">
						<?php echo getPage('vietnam_company','content');?>
					</div>
				</div>
			</div>
			<div class="box_form_contact">
				<div class="title_subpage">
					<h1><?php echo  $title_info_contact ;?></h1>
					<hr>
				</div>
				<input type="hidden" name="lang_field" value="<?php echo $txtEnter_field;?>"/>
				<form id="_frm_contact" class="frm_contact" name="frm_contact" method="post" onsubmit="return sendMail('send_contact', '_frm_contact');">
					<input type="hidden" name="lang" value="<?php echo TTH_LANGUAGE ?>">
					<div class="inputfrom">
						<label for="full_name"><?php echo  $full_name ;?> * </label>
						<input type="text" id="full_name" placeholder="<?php echo  $input_full_name ;?>" autocomplete="off" name="full_name" required="">
					</div>
					<div class="inputfrom">
						<label for="tell"><?php echo  $phone_number ;?> *</label>
						<input type="text" id="tell" placeholder="<?php echo  $input_phone_number ;?>" autocomplete="off" name="tell" required="">
					</div>
					<div class="inputfrom">
						<label for="email"><?php echo  $email_address ;?> *</label>
						<input type="email" id="email" placeholder="<?php echo  $input_email_address ;?>" autocomplete="off" name="email" required="">
					</div>
					<div class="inputfrom">
						<label for="address"><?php echo  $address ;?></label>
						<input type="text" id="address" placeholder="<?php echo  $input_address ;?>" autocomplete="off" name="address">
					</div>
					<div class="inputfrom_text">
						<label for="content"><?php echo  $contact_content ;?></label>
						<textarea name="content" id="content" cols="30" rows="1" ></textarea>
					</div>
					<div class="button_recuiment">
						<button type="submit" name="send_contact" id="_send_contact"><?php echo  $send_information ;?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>