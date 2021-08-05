<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
?>

<section class="section_banner">
    <div class="box_img_banner">
        <img title="Banner Page Not Found" alt="Banner Page Not Found" src="<?php echo HOME_URL;?>/images/jobbanner/banner.png">
    </div>
    <div class="title_sub_page">
        <div class="container">
            <h2><?php echo $title_page404;?></h2>
        </div>
    </div>
</section>
<section class="breadcrumb_content_page">
	<div class="container">
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a title="<?php echo $lgTxt_home;?>" href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>"><?php echo $lgTxt_home;?></a></li>
			<li class="breadcrumb-item">
				<a title="<?php echo $title_page404;?>" href="<?php echo HOME_URL; ?>/<?php echo $lgTxt_lang;?>"><?php echo $title_page404;?></a>
			</li>
		</ul>
	</div>
</section>
<section id="content_subpage">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="title_home">
                    <h3><?php echo $title_page404;?></h3>
                    <hr>
                </div>
                <div class="error404">
                    <p><?php echo $lgTxt_page404;?> <a title="<?php echo $lgTxt_home;?>" href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>"><?php echo $lgTxt_page404_click;?></a> <?php echo $lgTxt_page404_back;?> <a href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>" title="<?php echo $title_page404;?>"><?php echo $lgTxt_menu_home;?></a>.</p>
                    <img src="<?php echo HOME_URL;?>/images/icon/warning.svg" alt="<?php echo $title_page404;?>" title="<?php echo $title_page404;?>">
                </div>
            </div>
        </div>
	</div>
</section>

