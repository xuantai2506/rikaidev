<?php
    if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
?>
<section id="section_search_job">
    <div class="slider_banner_home">
        <?php
            $db->table = "gallery";
            $db->condition = "is_active = 1 and gallery_menu_id = 1";
            $db->order = "created_time DESC";
            $db->limit = "";
            $rowsdj = $db->select();
            foreach ($rowsdj as $rowd) {
        ?> 
        <div class="box_item_banner_home">
            <img src="<?php echo HOME_URL;?>/uploads/gallery/<?php echo $rowd['img'];?>" alt="<?php echo $rowd['name'];?>" title="<?php echo $rowd['name'];?>">
        </div>
        <?php } ?>
    </div>
    <div class="box_content_search_job_home">
        <div class="container">
            <?php
                $db->table = "gallery_menu";
                $db->condition = "is_active = 1 and gallery_menu_id = 1";
                $db->order = "";
                $db->limit = "1";
                $rowsdj = $db->select();
                foreach ($rowsdj as $rowd) {
            ?> 
            <div class="title_search_job">
                <h1><?php echo $rowd['name'];?></h1>
                <h2><?php echo $rowd['comment'];?></h2>
            </div>
            <?php } ?>
            <div class="box_form_search_job">
                <div class="form_search_job">
                    <form class="form_search_home"  action="" method="GET">
                        <div class="box_form_input">
                            <input type="text" name="search" id="search" placeholder="<?php echo $input_search_job;?>" required>
                        </div>
                        <div class="box_form_input">
                            <select title="<?php echo $select_all_work;?>" class="selectpicker" name="work[]" id="work" multiple>
                                <option value=""><?php echo $select_all_work;?></option>
                                <?php
                                    $db->table = "article_menu";
                                    $db->condition = "is_active = 1 and category_id = 1";
                                    $db->order = "sort asc";
                                    $db->limit = "";
                                    $rowsdj = $db->select();
                                    foreach ($rowsdj as $rowd) {
                                ?>      
                                <option value="<?php echo $rowd['article_menu_id'];?>"><?php echo $rowd['name'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="box_form_input">
                            <?php
                                $db->table = "category";
                                $db->condition = "is_active = 1 and category_id = 2";
                                $db->order = "sort asc";
                                $db->limit = "1";
                                $rowss = $db->select();
                                foreach ($rowss as $rowaa) {
                            ?> 
                            <select title="<?php echo $rowaa['name'];?>" class="selectpicker" name="jp_proficiency[]" id="jp_proficiency" multiple>
                                <option value=""><?php echo $select_all;?></option>
                                <?php
                                    $db->table = "others_menu";
                                    $db->condition = "is_active = 1 and category_id = " . $rowaa['category_id'];
                                    $db->order = "sort asc";
                                    $db->limit = "";
                                    $rowsdj = $db->select();
                                    foreach ($rowsdj as $rowd) {
                                ?> 
                                <option value="<?php echo $rowd['article_menu_id'];?>"><?php echo $rowd['name'];?></option>
                                <?php } ?>
                            </select>
                            <?php } ?>
                        </div>
                        <div class="box_form_input">
                            <?php
                                $db->table = "category";
                                $db->condition = "is_active = 1 and category_id = 3";
                                $db->order = "sort asc";
                                $db->limit = "1";
                                $rowss = $db->select();
                                foreach ($rowss as $rowaa) {
                            ?> 
                            <select title="<?php echo $rowaa['name'];?>" class="selectpicker" name="work_point[]" id="work_point" multiple>
                                <option value=""><?php echo $select_all_adress;?></option>
                                <?php
                                    $db->table = "others_menu";
                                    $db->condition = "is_active = 1 and category_id = " . $rowaa['category_id'];
                                    $db->order = "sort asc";
                                    $db->limit = "";
                                    $rowsdj = $db->select();
                                    foreach ($rowsdj as $rowd) {
                                ?> 
                                <option value="<?php echo $rowd['article_menu_id'];?>"><?php echo $rowd['name'];?></option>
                                <?php } ?>
                            </select>
                            <?php } ?>
                        </div>
                        <div class="box_form_input">
                            <?php
                                $db->table = "category";
                                $db->condition = "is_active = 1 and category_id = 4";
                                $db->order = "sort asc";
                                $db->limit = "1";
                                $rowss = $db->select();
                                foreach ($rowss as $rowaa) {
                            ?> 
                            <select title="<?php echo $rowaa['name'];?>" class="selectpicker" name="earnings[]" id="earnings" multiple>
                                <option value=""><?php echo $select_all;?></option>
                                <?php
                                    $db->table = "others_menu";
                                    $db->condition = "is_active = 1 and category_id = " . $rowaa['category_id'];
                                    $db->order = "sort asc";
                                    $db->limit = "";
                                    $rowsdj = $db->select();
                                    foreach ($rowsdj as $rowd) {
                                ?>
                                <option value="<?php echo $rowd['article_menu_id'];?>"><?php echo $rowd['name'];?></option>
                                <?php } ?>
                            </select>
                            <?php } ?>
                        </div>
                        <div class="button_search">
                            <button name="button-search-advance" class="button-search-advance"><img src="<?php echo HOME_URL;?>/images/icon/search.svg" alt="Icon search" title="Icon search"><span><?php echo $button_search;?></span> </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="remove_margin_15">
                <div class="box_slider_work">
                    <div class="slider_work">
                        <?php
                            $db->table = "article_menu";
                            $db->condition = "is_active = 1 and category_id = 1";
                            $db->order = "sort asc";
                            $db->limit = "";
                            $rowsdj = $db->select();
                            foreach ($rowsdj as $rowd) {
                        ?>  
                        <div class="box_item_work">
                            <div class="box_work">
                                <a href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>/<?php echo $rowd['slug'];?>" title="<?php echo $rowd['name'];?>">
                                    <div class="img_work">
                                        <img src="<?php echo HOME_URL;?>/uploads/article_menu/<?php echo $rowd['img'];?>" alt="<?php echo $rowd['name'];?>" title="<?php echo $rowd['name'];?>">
                                    </div>
                                    <div class="title_work">
                                        <p><?php echo $rowd['name'];?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>