<?php
	$db->table = "category";
	$db->condition = "is_active = 1 and category_id = 1";
	$db->order = "";
	$db->limit = "1";
	$row = $db->select();
	foreach($row as $rowmn) {
?> 
<section class="section_job_home">
    <div class="container">
        <div class="title_home">
            <h3><?php echo $rowmn['icon'];?></h3>
            <hr>
        </div>
        <div class="remove_margin">
            <div class="list_article_job">
                <?php
                    $i=0;
                    $loc = array();
                    $db->table = "article_menu";
                    $db->condition = "is_active = 1 and category_id = " . $rowmn['category_id'];
                    $db->order = "";
                    $db->limit = "";
                    $rowc = $db->select();
                    foreach($rowc as $rowd) {
                        $loc[$i] = $rowd['article_menu_id'];
                        $i++;
                    }
                    $loc = implode(',',$loc);
                    $db->table = "article";
                    $db->condition = "is_active = 1 and hot=1 and article_menu_id IN (".$loc.")";
                    $db->order = "created_time ASC";
                    $db->limit = '10';
                    $rowsd = $db->select();
                    foreach ($rowsd as $keyt) {
                ?>
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
        <div class="more_job">
            <a title="<?php echo $rowmn['name'];?>" href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>/<?php echo $rowmn['slug'];?>" ><?php echo $see_all;?></a>
        </div>
    </div>
</section>
<?php } ?>
<?php
	$db->table = "category";
	$db->condition = "is_active = 1 and category_id = 7";
	$db->order = "";
	$db->limit = "1";
	$row = $db->select();
	foreach($row as $rowmn) {
?> 
<section class="section_whychoose">
    <div class="box_title_whychoose">
        <div class="title_whychoose">
            <h3><?php echo $rowmn['name'];?></h3>
        </div>
    </div>
    <div class="box_slider_whychoose">
        <div class="slider_whychoose">
            <?php
                $db->table = "article_menu";
                $db->condition = "is_active = 1 and category_id =" . $rowmn['category_id'];
                $db->order = "sort asc";
                $db->limit = "";
                $rowsd = $db->select();
                foreach($rowsd as $rowd) {
            ?> 
            <div class="box_item_whychoose">
                <div class="img_whychoose">
                    <img src="<?php echo HOME_URL;?>/uploads/article_menu/<?php echo $rowd['img'];?>" alt="<?php echo $rowd['name'];?>" title="<?php echo $rowd['name'];?>">
                </div>
                <div class="text_whychoose">
                    <div class="icon_whychoose">
                        <img src="<?php echo HOME_URL;?>/uploads/article_menu/<?php echo $rowd['img1'];?>" alt="icon <?php echo $rowd['name'];?>" title="icon <?php echo $rowd['name'];?>">
                    </div>
                    <div class="name_whychoose">
                        <p><?php echo $rowd['name'];?></p>
                    </div>
                    <div class="des_whychoose">
                        <p><?php echo $rowd['comment'];?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>
<section class="section_job_transfer_form">
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
<?php
	$db->table = "gallery_menu";
	$db->condition = "is_active = 1 and gallery_menu_id = 2";
	$db->order = "";
	$db->limit = "1";
	$row = $db->select();
	foreach($row as $rowmn) {
?> 
<section class="section_partner">
    <div class="container">
        <div class="title_home">
            <h3><?php echo $rowmn['name'];?></h3>
            <hr>
        </div>
        <div class="remove_margin_15">
            <div class="slider_partner">
                <?php
                    $db->table = "gallery";
                    $db->condition = "is_active = 1 and gallery_menu_id = " . $rowmn['gallery_menu_id'];
                    $db->order = "created_time DESC";
                    $db->limit = "";
                    $rowsdj = $db->select();
                    foreach ($rowsdj as $rowd) {
                ?> 
                <div class="box_item_partner">
                    <div class="img_partner">
                        <a target="_blank" href="<?php echo $rowd['comment'];?>">
                            <img src="<?php echo HOME_URL;?>/uploads/gallery/<?php echo $rowd['img'];?>" alt="<?php echo $rowd['name'];?>" title="<?php echo $rowd['name'];?>">
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>
       