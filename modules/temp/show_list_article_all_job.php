<?php
	if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
?>
<section class="breadcrumb_subpage">
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
		</ul>
		<form class="form_search_subpage" action="#" method="GET">
			<div class="box_form_input">
				<input type="text" name="search" id="search" placeholder="<?php echo $input_search_job ?>" required>
				<button><img src="<?php echo HOME_URL;?>/images/icon/search-input.svg" alt="icon search input" title="icon search input"></button>
			</div>
			<div class="box_form_input">
				<select data-placeholder="<?php echo $sort_job ?>" class="select" name="work" id="work">
					<option value="0"><?php echo $sort_default ?></option>
					<option value="1"><?php echo $sort_recently ?></option>
					<option value="2"><?php echo $sort_common ?></option>
					<option value="3"><?php echo $sort_hot ?></option>
				</select>
			</div>
		</form>
		<div class="box_button_filter">
			<div class="button_filter">
				<?php echo $filter ?>
			</div>
		</div>
		<script type="text/javascript">
			$('.box_button_filter').click(function() {
				$('.list_box_filter_info_job').slideToggle();
			})
		</script>
	</div>
</section>
<section class="section_list_job">
	<div class="container">
		<div class="list_box_filter_info_job">
			<div class="box_close_button_filter">
				<div class="button_close_filter">
					<?php echo $close_filter ?>
				</div>
			</div>
			<script type="text/javascript">
				$('.box_close_button_filter').click(function() {
					$('.list_box_filter_info_job').hide();
				})
			</script>
			<div class="box_filter_info_job">
				<div class="title_filter_info_job">
					<p><?php echo $career ?></p>
				</div>
				<div class="box_list_info_job">
					<ul>
						<?php
                            $db->table = "article_menu";
                            $db->condition = "is_active = 1 and category_id = 1";
                            $db->order = "sort asc";
                            $db->limit = "";
                            $rowsdj = $db->select();
                            foreach ($rowsdj as $rowd) {
                        ?>  
						<li>
							<input class="info_job" type="checkbox" name="<?php echo $rowd['article_menu_id'];?>" value="<?php echo $rowd['article_menu_id'];?>" id="<?php echo $rowd['article_menu_id'];?>">
							<label for="<?php echo $rowd['article_menu_id'];?>" class="checkbox_info_job"></label>
							<label for="<?php echo $rowd['article_menu_id'];?>"><?php echo $rowd['name'];?></label>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="box_filter_info_job">
				<?php
					$db->table = "category";
					$db->condition = "is_active = 1 and category_id = 2";
					$db->order = "sort asc";
					$db->limit = "1";
					$rowsss = $db->select();
					foreach ($rowsss as $rowdss) {
				?>
				<div class="title_filter_info_job">
					<p><?php echo $rowdss['name'];?></p>
				</div>
				<div class="box_list_info_job">
					<ul>
						<?php
							$db->table = "others_menu";
							$db->condition = "is_active = 1 and category_id = " . $rowdss['category_id'];
							$db->order = "sort asc";
							$db->limit = "";
							$rowsdj = $db->select();
							foreach ($rowsdj as $rowd) {
						?> 
						<li>
							<input class="info_job" type="checkbox" name="<?php echo $rowd['article_menu_id'];?>" value="<?php echo $rowd['article_menu_id'];?>" id="<?php echo $rowd['article_menu_id'];?>">
							<label for="<?php echo $rowd['article_menu_id'];?>" class="checkbox_info_job"></label>
							<label for="<?php echo $rowd['article_menu_id'];?>"><?php echo $rowd['name'];?></label>
						</li>
						<?php } ?>
					</ul>
				</div>
				<?php } ?>
			</div>
			<div class="box_filter_info_job">
				<div class="title_filter_info_job">
					<p><?php echo $place ?></p>
				</div>
				<div class="box_list_info_job">
					<ul>
						<li>
							<input class="info_job" type="checkbox" name="allcity" value="allcity" id="allcity">
							<label for="allcity" class="checkbox_info_job"></label>
							<label for="allcity"><?php echo $select_all_adress ?></label>
						</li>
						<?php
							$db->table = "others_menu";
							$db->condition = "is_active = 1 and category_id = 3";
							$db->order = "sort asc";
							$db->limit = "";
							$rowsdj = $db->select();
							foreach ($rowsdj as $rowd) {
						?> 
						<li>
							<input class="info_job" type="checkbox" name="<?php echo $rowd['article_menu_id'];?>" value="<?php echo $rowd['article_menu_id'];?>" id="<?php echo $rowd['article_menu_id'];?>">
							<label for="<?php echo $rowd['article_menu_id'];?>" class="checkbox_info_job"></label>
							<label for="<?php echo $rowd['article_menu_id'];?>"><?php echo $rowd['name'];?></label>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="box_filter_info_job">
				<div class="title_filter_info_job">
					<p><?php echo $income ?></p>
				</div>
				<div class="box_list_info_job">
					<ul>
						<?php
							$db->table = "others_menu";
							$db->condition = "is_active = 1 and category_id = 4";
							$db->order = "sort asc";
							$db->limit = "";
							$rowsdj = $db->select();
							foreach ($rowsdj as $rowd) {
						?> 
						<li>
							<input class="info_job" type="checkbox" name="<?php echo $rowd['article_menu_id'];?>" value="<?php echo $rowd['article_menu_id'];?>" id="<?php echo $rowd['article_menu_id'];?>">
							<label for="<?php echo $rowd['article_menu_id'];?>" class="checkbox_info_job"></label>
							<label for="<?php echo $rowd['article_menu_id'];?>"><?php echo $rowd['name'];?></label>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="box_result_button_filter">
				<div class="button_result_filter">
				<?php echo $button_result ?>
				</div>
			</div>
			<script type="text/javascript">
				$('.box_result_button_filter').click(function() {
					$('.list_box_filter_info_job').hide();
				})
			</script>
		</div>
		<div class="list_box_job">
			<?php
				$db->table = "category";
				$db->condition = "is_active = 1 and category_id = 1";
				$db->order = "sort asc";
				$db->limit = "1";
				$rowsdj = $db->select();
				foreach ($rowsdj as $rowd) {
			?>
			<div class="title_subpage">
				<h1><?php echo $rowd['name'];?></h1>
				<hr>
			</div>
			<?php } ?>
			<div class="list_job">
				<?php foreach ($rows as $keyt) { ?>
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
				<?php  } ?>
			</div>
			<div class="pagination_subpage">
			<?php if($id_menu <= 0) { showPageNavigation($page, $total_pages,'/'.$lgTxt_lang.'/'.$slug_cat.'?p='); }?>
			<?php if($id_menu > 0) {showPageNavigation($page, $total_pages,'/'.$lgTxt_lang.'/'.$slug_submenu.'?p='); }?>
			</div>
		</div>
	</div>
</section>
