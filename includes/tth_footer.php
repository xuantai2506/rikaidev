<?php
	if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
?>
<footer>
	<div class="container">
		<div class="box_text_footer">
			<div class="logo_footer">
				<a href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>" title="Link logo footer">
					<img src="<?php echo HOME_URL;?>/images/footer/logo-footer.svg" alt="logo footer" title="logo footer">
				</a>
			</div>
			<div class="list_contact_footer">
				<p><img src="<?php echo HOME_URL;?>/images/footer/email.svg" alt="icon email" title="icon email"><?php echo getConstant('email_contact');?></p>
				<p><img src="<?php echo HOME_URL;?>/images/footer/phone.svg" alt="icon phone" title="icon phone"><?php echo getConstant('tell_contact');?></p>
				<p><img src="<?php echo HOME_URL;?>/images/footer/location.svg" alt="icon location"  title="icon location"><?php echo getConstant('address_contact');?></p>
			</div>
			<div class="box_form_email_footer">
				<div class="title_footer">
					<p><?php echo $name_form_footer;?></p>
					<hr>
					<p><strong><?php echo $comment_form_footer;?></strong></p>
				</div>
				<div class="form_email_footer">
					<form method="post" name="email_register" class="reg_mail" onsubmit="return sendRegEmail();">
						<input type="hidden" name="lang" value="<?php echo TTH_LANGUAGE ?>">
						<input type="hidden" name="thongbao" value="<?php echo $txtEmail_sendOk; ?>">
						<input type="email" name="email" id="_reg_email" autocomplete="off" placeholder="<?php echo $input_email_address;?> ..." required="required">
						<button type="submit" class="btn-hover" name="register"><?php echo $subscribe;?></button>
					</form>
				</div>
			</div>
			<div class="box_social_footer">
				<hr>
				<div class="social_footer">
					<a target="_blank" href="<?php echo getConstant('link_facebook');?>" title="Link icon facebook"><img src="<?php echo HOME_URL;?>/images/footer/social/facebook.svg" alt="icon facebook" title="icon facebook"></a>
					<a target="_blank" href="<?php echo getConstant('link_behance');?>" title="Link icon behance"><img src="<?php echo HOME_URL;?>/images/footer/social/behance.svg" alt="icon behance" title="icon behance"></a>
					<a target="_blank" href="<?php echo getConstant('link_linkedin');?>" title="Link icon linkedin"><img src="<?php echo HOME_URL;?>/images/footer/social/linkedin.svg" alt="icon linkedin" title="icon linkedin"></a>
					<a target="_blank" href="<?php echo getConstant('link_instagram');?>" title="Link icon instagram"><img src="<?php echo HOME_URL;?>/images/footer/social/instagram.svg" alt="icon instagram" title="icon instagram"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="box_google_map_footer">
		<?php echo getPage('google_map');?>
	</div>
</footer>