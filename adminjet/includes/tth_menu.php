<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
?>

<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
    	<li class="dash">
    		<h3>DASHBOARD</h3>
    	</li>
        <li>
            <a <?php echo (empty($tth)||$tth=='home')?'class="active"':''?> href="<?php echo ADMIN_DIR?>"><img src="./images/menu/home.svg" class="img_menu"> <span>Trang chủ</span></a>
        </li>
        <?php
        $active = array();
        $db->table = "category_type";
        $db->condition = "is_active = 1";
        $db->order = "";
        $db->limit = "";
        $rows = $db->select();
        $i = 0;
        foreach($rows as $row) {
            $active[$i] = $row['slug'];
            $i++;
        }
        $active2 = array(
	        'category_edit',
	        'article_menu_add','article_menu_edit', 'article_list', 'article_add', 'article_edit',
	        'gallery_menu_add','gallery_menu_edit', 'gallery_list', 'gallery_add', 'gallery_edit',
	        'plugin_page' , 'plugin_page_add', 'plugin_page_edit',
        );
        $active3 = array('plugin_page' , 'plugin_page_add', 'plugin_page_edit');
        ?>
        <li <?php echo (in_array($tth,$active) || in_array($tth,$active2)) ? 'class="active"' : ''?> >
            <a href="#"><img src="./images/menu/qtnd.svg" class="img_menu"> <span>Quản lý nội dung</span><img class="arrow" src="./images/right.svg"></a>
            <ul class="nav nav-second-level">
                <?php
                $icon = array('fa-newspaper-o', 'fa-file-text', 'fa-image','fa-envelope', 'fa-send', 'fa-envelope');
                $db->table = "category_type";
                $db->condition = "is_active = 1";
                $db->order = "sort ASC";
                $rows = $db->select();
                $i = 0;
                foreach($rows as $row) {
                ?>
                    <li>
                        <a <?php echo ($tth==$row['slug'])?'class="active"':''?> href="?<?php echo TTH_PATH?>=<?php echo $row['slug']?>"><i class="fa <?php echo $icon[$i]?> fa-fw"></i> <span><?php echo $row['name']?></span></a>
                    </li>
                <?php
                    $i++;
                }
                ?>
	            <li>
		            <a  <?php echo (in_array($tth,$active3))?'class="active"':''?> href="?<?php echo TTH_PATH?>=plugin_page"> <i class="fa fa-file-text fa-fw"></i> <span>Phần bổ sung</span></a>
	            </li>
            </ul>
        </li>
	    <?php
	    $active4 = array('backup_data', 'backup_config');
	    ?>
        <li <?php echo (in_array($tth,$active4))?'class="active"':''?> >
            <a href="#"><img src="./images/menu/csdl.svg" class="img_menu"> <span>Cơ sở dữ liệu</span><img class="arrow" src="./images/right.svg"></a>
	        <ul class="nav nav-second-level">
		        <li>
			        <a <?php echo ($tth == 'backup_data')? 'class="active"':''?> href="?<?php echo TTH_PATH?>=backup_data"><i class="fa fa-paste fa-fw"></i>  <span>Sao lưu dữ liệu</span></a>
		        </li>
		        <li>
			        <a <?php echo ($tth == 'backup_config')? 'class="active"':''?> href="?<?php echo TTH_PATH?>=backup_config"><i class="fa fa-crosshairs fa-fw"></i> <span>Cấu hình sao lưu</span></a>
		        </li>
	        </ul>
        </li>
	    <?php
	    $active5 = array('config_general', 'config_smtp', 'config_datetime', 'config_plugins', 'config_socialnetwork', 'config_search', 'config_upload');
	    ?>
        <li <?php echo (in_array($tth,$active5))?'class="active"':''?> >
            <a href="#"><img src="./images/menu/ch.svg" class="img_menu"> <span>Cấu hình</span><img class="arrow" src="./images/right.svg"></a>
	        <ul class="nav nav-second-level">
		        <li>
			        <a <?php echo ($tth == 'config_general')? 'class="active"':''?> href="?<?php echo TTH_PATH?>=config_general"><i class="fa fa-globe fa-fw"></i>  <span>Cấu hình chung</span></a>
		        </li>
		        <li>
			        <a <?php echo ($tth == 'config_smtp')? 'class="active"':''?> href="?<?php echo TTH_PATH?>=config_smtp"><i class="fa fa-paper-plane fa-fw"></i> <span>Cấu hình SMTP</span></a>
		        </li>
		        <li>
			        <a <?php echo ($tth == 'config_datetime')? 'class="active"':''?> href="?<?php echo TTH_PATH?>=config_datetime"><i class="fa fa-clock-o fa-fw"></i> <span>Cấu hình thời gian</span></a>
		        </li>
		        <li>
			        <a <?php echo ($tth == 'config_plugins')? 'class="active"':''?> href="?<?php echo TTH_PATH?>=config_plugins"><i class="fa fa-plug fa-fw"></i> <span>Trình cắm bổ sung</span></a>
		        </li>
		        <li>
			        <a <?php echo ($tth == 'config_socialnetwork')? 'class="active"':''?> href="?<?php echo TTH_PATH?>=config_socialnetwork"><i class="fa fa-recycle fa-fw"></i> <span>Mạng xã hội</span></a>
		        </li>
		        <li>
			        <a <?php echo ($tth == 'config_upload')? 'class="active"':''?> href="?<?php echo TTH_PATH?>=config_upload"><i class="fa fa-cloud fa-fw"></i> <span>Cấu hình upload</span></a>
		        </li>
	        </ul>
        </li>
	    <?php
	    $active7 = array('core_role', 'core_role_add', 'core_role_edit', 'core_dashboard', 'core_user', 'core_user_add', 'core_user_edit', 'core_user_changeinfo');
	    $active71 = array('core_role', 'core_role_add', 'core_role_edit', 'core_dashboard', 'core_user_changeinfo');
	    $active72 = array('core_user', 'core_user_add', 'core_user_edit');
	    ?>
	    <li <?php echo (in_array($tth,$active7))?'class="active"':''?> >
            <a href="#"><img src="./images/menu/qtht.svg" class="img_menu"> <span>Quản trị hệ thống</span><img class="arrow" src="./images/right.svg"></a>
            <ul class="nav nav-second-level">
                <li>
                    <a <?php echo (in_array($tth,$active71))?'class="active"':''?> href="?<?php echo TTH_PATH?>=core_role"><i class="fa fa-group fa-fw"></i>  <span>Nhóm quản trị</span></a>
                </li>
	            <li>
		            <a <?php echo (in_array($tth,$active72))?'class="active"':''?> href="?<?php echo TTH_PATH?>=core_user"><i class="fa fa-male fa-fw"></i> <span>Quản lý thành viên</span></a>
	            </li>
            </ul>
        </li>
    </ul>
</div>
