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
            <h2><?php echo $rowxyz['comment'];?></h2>
        </div>
    </div>
</section>
<?php } ?>