<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
?>

<section class="breadcrumb_content_page">
	<div class="container">
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a title="<?php echo $lgTxt_home;?>" href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>"><?php echo $lgTxt_home;?></a></li>
			<li class="breadcrumb-item">
				<a title="<?php echo $title_updating;?>" href="<?php echo HOME_URL; ?>/<?php echo $lgTxt_lang;?>"><?php echo $title_updating;?></a>
			</li>
		</ul>
	</div>
</section>
<section id="content_subpage">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="title_home">
                    <h3><?php echo $title_updating;?></h3>
                    <hr>
                </div>
                <div class="updating">
                    <p><?php echo $lgTxt_updating;?> <a title="<?php echo $lgTxt_home;?>" href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>"  title="<?php echo $title_updating;?>"><?php echo $lgTxt_page404_click;?></a> <?php echo $lgTxt_page404_back;?> <a  title="<?php echo $title_updating;?>" href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>"><?php echo $lgTxt_menu_home;?></a>.</p>
                    <img src="<?php echo HOME_URL;?>/images/icon/edit.svg" alt="<?php echo $title_updating;?>"  title="<?php echo $title_updating;?>">
                </div> 
            </div>
        </div>
    </div>
</section>
