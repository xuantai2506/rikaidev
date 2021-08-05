<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
?>
<header id="header">
    <div class="container">
        <?php if($slug_cat=='home'){?>
        <div class="logo">
            <a title="link Logo Rikai" href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>"><img title="Logo Rikai" alt="Logo Rikai" src="<?php echo HOME_URL;?>/images/logo.svg"></a>
        </div>
        <?php }else{ ?>
        <div class="logo_subpage">
            <a title="link Logo Rikai" href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>">
                <img title="Logo Rikai" alt="Logo Rikai" src="<?php echo HOME_URL;?>/images/logo_header.svg">
            </a>
        </div>
        <?php } ?>
        <div class="language">
            <div class="box_language">
                <a href="<?php echo HOME_URL;?>/jp" title="Link language japan">
                    <img src="<?php echo HOME_URL;?>/images/language/language-japan.svg" alt="language japan" title="language japan">
                </a>
            </div>
            <div class="box_language">
                <a href="<?php echo HOME_URL;?>/vi" title="Link language vietnamese">
                    <img src="<?php echo HOME_URL;?>/images/language/language-vietnamese.svg" alt="language vietnamese" title="language vietnamese">
                </a>
            </div>
        </div>
        <div class="contact_hotline">
            <div class="hotline">
                <a title="Link contact" href="<?php echo HOME_URL;?>/<?php echo $lgTxt_lang;?>/contact"><img src="<?php echo HOME_URL;?>/images/icon/hotline.svg" alt="Icon contact" title="Icon contact"> <span><?php echo $lgTxt_contact; ?></span></a>
            </div>
        </div>
    </div>
</header>