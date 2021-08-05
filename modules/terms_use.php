<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
?>
<?php
    $db->table = "category";
    $db->condition = "slug = '".$slug_cat."'";
    $db->order = "";
    $db->limit = "";
    $rowdp = $db->select();
    foreach ($rowdp as $rowxyz) {
?>
<section class="section_banner">
    <div class="box_img_banner">
        <img title="<?php echo $rowxyz['name'];?>" alt="<?php echo $rowxyz['name'];?>" src="<?php echo HOME_URL;?>/uploads/category/<?php echo $rowxyz['img'];?>">
    </div>
    <div class="title_sub_page">
        <div class="container">
            <h2><?php echo $rowxyz['name'];?></h2>
        </div>
    </div>
</section>
<?php } ?>
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
<?php
    $db->table = "category";
    $db->condition = "slug = '".$slug_cat."'";
    $db->order = "";
    $db->limit = "";
    $rowdp = $db->select();
    foreach ($rowdp as $rowxyz) {
?>
<section class="section_contact">
    <div class="container">
        <div class="box_page_contact">
            <div class="title_subpage">
                <h1><?php echo $rowxyz['name'];?></h1>
                <hr>
            </div>
            <div class="content_detail">
            <?php echo $rowxyz['comment'];?>
            </div>
        </div>
    </div>
</section>
<?php } ?>