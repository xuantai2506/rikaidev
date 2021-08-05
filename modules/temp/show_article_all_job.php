<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
?>
<?php 
	$sumView = 0;
	$db->table = "article";
	$db->condition = "is_active = 1 and article_id = ".$id;
	$db->order = "";
	$db->limit = "";
	$rows = $db->select();
	if($db->RowCount>0){ 
		foreach($rows as $row) {
			$db->table = "article";
			$db->condition = "is_active = 1 and article_menu_id = ".($row['article_menu_id']+0).' and article_id <> '.$id;
			$db->order = "created_time DESC";
			$db->limit = "4";
			$rows2 = $db->select();
			$total = $db->RowCount;
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
			<?php
			$db->table = "article_menu";
			$db->condition = "article_menu_id = " . $id_menu;
			$db->order = "";
			$db->limit = "";
			$rowss = $db->select();
			foreach ($rowss as $rowa) {
			?>
				<li class="breadcrumb-item">
					<a title="<?php echo $rowa['name'];?>"  href="<?php echo HOME_URL; ?>/<?php echo $lgTxt_lang;?>/<?php echo $rowa['slug'];?>"><?php echo $rowa['name'];?></a>
				</li>
			<?php }  ?>
			<li class="breadcrumb-item">
				<a title="<?php echo $row['name'];?>" href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>/<?php echo $row['slug'];?>"><?php echo $row['name'];?></a>
			</li>
		</ul>
	</div>
</section>
<section class="section_content">
	<div class="container">
		<div class="box_content_job">
			<div class="content_job">
				<div class="title_content_detail">
					<h1><?php echo $row['name'];?></h1>
					<hr>
				</div>
				<div class="content_detail">
					<?php echo $row['content'];?>
				</div>
				<div class="addthis_toolbox_share">
					<span><?php echo $social_share ?> : </span>
					<script src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5cb822fe7f6c08e6"></script>
					<div class="addthis_toolbox">
						<div class="custom_images">
							<a title="addthis button facebook" class="addthis_button_facebook"><img src="<?php echo HOME_URL;?>/images/addthis_toolbox/facebook.svg" alt="Share to Facebook" title="Share to Facebook"></a>
							<a title="Youtube" target="_blank" href="<?php echo getConstant('link_youtube') ?>"><img src="<?php echo HOME_URL;?>/images/addthis_toolbox/youtube.svg" alt="Share to Youtube" title="Share to Youtube"></a>
							<a title="addthis button twitter" class="addthis_button_twitter"><img src="<?php echo HOME_URL;?>/images/addthis_toolbox/twitter.svg" alt="Share to Twitter" title="Share to Twitter"></a>
							<a title="addthis button instagram" class="addthis_button_instagram"><img src="<?php echo HOME_URL;?>/images/addthis_toolbox/instagram.svg" alt="Share to instagram" title="Share to instagram"></a>
							<a title="addthis button linkedin" class="addthis_button_linkedin"><img src="<?php echo HOME_URL;?>/images/addthis_toolbox/linkedin.svg" alt="Share to Linkedin" title="Share to Linkedin"></a>
						</div>
						<div class="atclear"></div>
					</div>
				</div>
			</div>
			<div class="desription_job">
				<div id="sidebar">
					<div class="box_article_job">
						<div class="aricle_job">
							<div class="img_article_job">
								<img src="<?php echo HOME_URL;?>/uploads/article/<?php echo $row['img'];?>" alt="<?php echo $row['name'];?>" title="<?php echo $row['name'];?>">
							</div>
							<div class="text_article_job">
								<div class="title_article_job"><?php echo $row['name'];?></div>
								<div class="tag_article_job">
								<?php
                                    $db->table = "article_menu";
                                    $db->condition = "is_active = 1 and article_menu_id = " . $keyt['article_menu_id'];
                                    $db->order = "";
                                    $db->limit = "1";
                                    $rowsds = $db->select();
                                    foreach($rowsds as $rowmns) {
                                ?> 
                                <div class="tag_job"><a href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>/<?php echo $rowmns['slug'];?>"><?php echo $rowmns['name'];?></a></div>
                                <?php } ?>
								</div>
								<div class="time_up">
									<p><?php echo $job_time_up;?>: <?= date('d/m/Y', $row['created_time']);?></p>
								</div>
								<div class="info_article_job">
									<p><?php echo $job_price;?>: <?php echo $row['price'];?> man JPY</p>
								</div>
								<div class="info_article_job">
									<p><?php echo $job_request;?>: <?php
											$db->table = "others_menu";
											$db->condition = "is_active = 1 and others_menu_id =" . $row['jp_proficiency'];
											$db->order = "";
											$db->limit = "";
											$rowsdj = $db->select();
											foreach ($rowsdj as $rowd) {
										?> 
										<?php echo $rowd['name'];?>
										<?php } ?>
									</p>
								</div>
								<div class="info_article_job">
									<p><?php echo $job_address_work;?>: 
										<?php
											$db->table = "others_menu";
											$db->condition = "is_active = 1 and others_menu_id =" . $row['work_point'];
											$db->order = "sort asc";
											$db->limit = "";
											$rowsdj = $db->select();
											foreach ($rowsdj as $rowd) {
										?> 
										<?php echo $rowd['name'];?>
										<?php } ?></p>
								</div>
								<div class="info_article_job">
									<p><?php echo $job_time_off;?>: <?php echo $row['comment'];?></p>
								</div>
								<div class="recuiment_article_job">
									<a href="#job_transfer_form"><?php echo $job_recuiment;?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<script>
					$(document).ready(function() {
						$.lockfixed("#sidebar", {
							offset: {
								top: 30,
								bottom: 2000
							}
						});
					});
				</script>
				<script src="<?php echo HOME_URL;?>/js/jquery.lockfixed.js"></script>
			</div>
		</div>
	</div>
</section>
<section class="section_job_transfer_form" id="job_transfer_form">
    <div class="container">
        <div class="title_home">
            <h3><?php echo $title_job_change ?></h3>
            <hr>
        </div>
		<div class="form_contact_recuiment">
            <input type="hidden" name="lang_field" value="<?php echo $txtEnter_field;?>"/>
            <form id="_frm_recuiment" class="frm_recuiment" name="frm_recuiment" enctype="multipart/form-data" method="post" onsubmit="return sendMailRecuiment('send_recuiment', '_frm_recuiment');" >
                <input type="hidden" name="lang" value="<?php echo TTH_LANGUAGE ?>">
                <div class="inputfrom">
                    <label for="full_name"><?php echo $full_name ?> * </label>
                    <input type="text" id="full_name" placeholder="<?php echo $input_full_name ?>" autocomplete="off" name="full_name" required="">
                </div>
                <div class="inputfrom">
                    <label for="email"><?php echo $email_address ?> *</label>
                    <input type="email" id="email" placeholder="<?php echo $input_email_address ?>" autocomplete="off" name="email" required="">
                </div>
                <div class="inputfrom">
                    <label for="dateofbirth"><?php echo $date_of_birth ?> *</label>
                    <input type="text" id="dateofbirth" placeholder="DD/MM/YYYY" autocomplete="off" name="dateofbirth">
                </div>
                <script>
                    if (jQuery().datepicker) {
                        jQuery('#dateofbirth').datepicker({
                            showAnim: "drop",
                            dateFormat: "dd/mm/yy",
                            minDate: "",
                            maxDate: "0D"
                        });
                    }
                </script>
                <div class="inputfrom">
                    <label for="address"><?php echo $address ?></label>
                    <input type="text" id="address" placeholder="<?php echo $input_address ?>" autocomplete="off" name="address">
                </div>
                <div class="inputfrom">
                    <label for="desired_working"><?php echo $desired_working ?></label>
                    <select title="<?php echo $select_desired_working ?>" class="selectpicker" name="desired_working" id="desired_working" multiple>
                        <option value="<?php echo $select_all_adress ?>"><?php echo $select_all_adress ?></option>
                        <?php
                            $db->table = "others_menu";
                            $db->condition = "is_active = 1 and category_id = 3";
                            $db->order = "sort asc";
                            $db->limit = "";
                            $rowsdj = $db->select();
                            foreach ($rowsdj as $rowd) {
                        ?> 
                        <option value="<?php echo $rowd['name'];?>"><?php echo $rowd['name'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="inputfrom">
                    <label for="desired_income"><?php echo $desired_income ?></label>
                    <select title="<?php echo $select_desired_income ?>" class="selectpicker" name="desired_income" id="desired_income" multiple>
                        <option value="<?php echo $select_all ?>"><?php echo $select_all ?></option>
                        <?php
                            $db->table = "others_menu";
                            $db->condition = "is_active = 1 and category_id = 4";
                            $db->order = "sort asc";
                            $db->limit = "";
                            $rowsdj = $db->select();
                            foreach ($rowsdj as $rowd) {
                        ?> 
                        <option value="<?php echo $rowd['name'];?>"><?php echo $rowd['name'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="inputfrom">
                    <label for="estimated_time"><?php echo $time_change_job ?></label>
                    <select title="<?php echo $select_time_change_job ?>" class="selectpicker" name="estimated_time" id="estimated_time" multiple>
                        <?php
                            $db->table = "others_menu";
                            $db->condition = "is_active = 1 and category_id = 5";
                            $db->order = "sort asc";
                            $db->limit = "";
                            $rowsdj = $db->select();
                            foreach ($rowsdj as $rowd) {
                        ?> 
                        <option value="<?php echo $rowd['name'];?>"><?php echo $rowd['name'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="inputfrom">
                    <p><?php echo $upload_cv ?></p>
                    <input id="uploadFile" placeholder="<?php echo $max_file_size ?>">
                    <label class="uploadcv" for="upload_cv"><?php echo $select_file ?> +</label>
                    <input type="file" class="inputfile" id="upload_cv" name="upload_cv" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,.ppt,.pptx,.odt" >
                </div>
                <script>
                    document.getElementById("upload_cv").onchange = function() {
                        document.getElementById("uploadFile").value = this.value;
                    };
                </script>
                <div class="inputfrom_text">
                    <label for="content"><?php echo $contact_content ?></label>
                    <textarea name="content" id="content" cols="30" rows="1" ></textarea>
                </div>
                <div class="inputfrom_checkbox">
                    <input type="checkbox" name="checkedterms" value="true" checked> <label for="checkedterms"><?php echo $yes_check_form ?> 
                    <?php
                        $db->table = "category";
                        $db->condition = "is_active = 1 and category_id = 8";
                        $db->order = "sort asc";
                        $db->limit = "";
                        $rowsdj = $db->select();
                        foreach ($rowsdj as $rowd) {
                    ?> 
                    <a target="_blank" href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>/<?php echo $rowd['slug'];?>"><?php echo $rowd['name'];?></a> 
                    <?php } ?>
                </label>
                </div>
                <div class="button_recuiment">
                    <button type="submit" name="send_recuiment" id="_send_recuiment"><?php echo  $button_apply ?></button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php if($total>0 ){ ?> 
<section class="section_job_related">
	<div class="container">
		<div class="title_home">
			<h3><?php echo $job_other ?></h3>
			<hr>
		</div>
		<div class="remove_margin">
			<div class="list_article_job">
				<?php foreach ($rows2 as $keyt) { ?>
					<div class="box_article_job">
						<div class="aricle_job">
							<div class="img_article_job">
								<a title="<?= $keyt['name'];?>" href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>/<?php echo $keyt['slug'];?>">
									<?php if($keyt['img']=="" || $keyt['img']=="no"){ ?>
										<img src="<?php echo HOME_URL;?>/images/150x150.png" alt="<?= $keyt['name'];?>" title="<?= $keyt['name'];?>">
									<?php }else{ ?>
										<img src="<?php echo HOME_URL;?>/uploads/article/<?php echo $keyt['img'];?>" alt="<?= $keyt['name'];?>" title="<?= $keyt['name'];?>">
									<?php } ?>
								</a>
							</div>
							<div class="text_article_job">
								<div class="title_article_job">
									<a title="<?php echo $keyt['name'];?>" href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>/<?php echo $keyt['slug'];?>"><?php echo $keyt['name'];?></a>
								</div>
								<div class="tag_article_job">
								<?php
                                    $db->table = "article_menu";
                                    $db->condition = "is_active = 1 and article_menu_id = " . $keyt['article_menu_id'];
                                    $db->order = "";
                                    $db->limit = "1";
                                    $rowsds = $db->select();
                                    foreach($rowsds as $rowmns) {
                                ?> 
                                <div class="tag_job"><a href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>/<?php echo $rowmns['slug'];?>"><?php echo $rowmns['name'];?></a></div>
                                <?php } ?>
								</div>
								<div class="time_up">
									<p><?php echo $job_time_up;?>: <?= date('d/m/Y', $keyt['created_time']);?></p>
								</div>
								<div class="info_article_job">
									<p><?php echo $job_price;?>: <?php echo $keyt['price'];?> <?php echo $man_JPY;?></p>
								</div>
								<div class="info_article_job">
									<p><?php echo $job_request;?>: 
										<?php
											$db->table = "others_menu";
											$db->condition = "is_active = 1 and others_menu_id =" . $keyt['jp_proficiency'];
											$db->order = "sort asc";
											$db->limit = "";
											$rowsdj = $db->select();
											foreach ($rowsdj as $rowd) {
										?> 
										<?php echo $rowd['name'];?>
										<?php } ?>
									</p>
								</div>
								<div class="info_article_job">
									<p><?php echo $job_address_work;?>: 
										<?php
											$db->table = "others_menu";
											$db->condition = "is_active = 1 and others_menu_id =" . $keyt['work_point'];
											$db->order = "sort asc";
											$db->limit = "";
											$rowsdj = $db->select();
											foreach ($rowsdj as $rowd) {
										?> 
										<?php echo $rowd['name'];?>
										<?php } ?>
									</p>
								</div>
								<div class="info_article_job">
									<p><?php echo $job_time_off;?>: <?php echo $keyt['comment'];?></p>
								</div>
								<div class="recuiment_article_job">
									<a href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>/<?php echo $keyt['slug'];?>#job_transfer_form"><?php echo $job_recuiment;?></a>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<?php
		$sumView = $row['views']+1;
	}
	$db->table = "article";
	$data = array(
		'views'=>$sumView
	);
	$db->condition = "article_id = ".$id;
	$db->update($data);

}
else include(_F_MODULES . DS . "error_404.php");