<?php

if (!defined('TTH_SYSTEM')) { die('Please stop!'); }

//

$date = new DateClass();

?>



<div class="navbar-header">

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

        <span class="sr-only">Toggle navigation</span>

	    <i class="fa fa-bars fa-2x"></i>

    </button>
	<a class="navbar-brand"  href="/adminjet">

		<img src="./images/logo.svg" height="40px" alt="Logo LovaWeb Admin Panel" />

	</a>

</div>

<!-- /.navbar-header -->

<!-- /.sidebar-collapse -->
<div class="sidebar-minified js-toggle-minified">
	<a class="toggle-nav" href="#" data-toggle="tooltip" data-placement="right" title="Menu Mở rộng/Thu gọn">
		<img src="./images/menu/list_menu.svg">
	</a>
</div>

<ul class="nav navbar-top-links navbar-right">

	<?php

	$rows_order = $rows_contact = $distance = array();

	if(in_array('order_list',$corePrivilegeSlug)) {

		$db->table = "order";

		$db->condition = "is_active = 1";

		$db->order = "created_time DESC";

		$db->limit = "";

		$rows_order = $db->select();

	}



	if(in_array('contact_list',$corePrivilegeSlug)) {

		$db->table = "contact";

		$db->condition = "is_active = 1";

		$db->order = "created_time DESC";

		$db->limit = "";

		$rows_contact = $db->select();

	}



	$rows = array_merge($rows_order, $rows_contact);



	foreach ($rows as $key => $row) {

		$distance[$key] = $row['created_time'];

	}



	array_multisort($distance, SORT_DESC, $rows);

	$count_rows = count($rows);

	if($count_rows>0) {

		?>

		<li class="dropdown">

			<a class="dropdown-toggle" data-toggle="dropdown" href="#">

				<img src="./images/chuong.svg" style="width: 20px;"> <span class="notification-label"><?php echo $count_rows;?></span>

			</a>

			<div class="dropdown-menu dropdown-alerts">

				<div class="node-hv">&nbsp;</div>

				<ul class="header-list-notification">

					<?php foreach($rows as $row) {

						echo '<li><div><span class="pull-left"><i class="fa ' . stripslashes($row['icon']) . '"></i> ' . stripslashes($row['name']) . ' <i class="time">(' . $date->vnDateTime($row['created_time']) . ')</i></span>';

						if($row['icon']=='fa-send-o') echo '<button type="button" class="btn btn-warning btn-sm-sm" data-toggle="modal" data-target="#_notification" onclick="open_notification($(this), '.$row["contact_id"].', \'contact\');"><i class="fa fa-eye"></i></button>';

						else echo '<button type="button" class="btn btn-warning btn-sm-sm" data-toggle="modal" data-target="#_notification" onclick="open_notification($(this), '.$row["order_id"].', \'order\');"><i class="fa fa-eye"></i></button>';

						echo '</div></li><li class="divider"></li>';

					} ?>

				</ul>

			</div>

		</li>

	<?php } ?>

	<li class="dropdown ngonngu">	
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				<?php
					if(TTH_LANGUAGE=='vi') {
						echo "Viet Nam";
					}elseif(TTH_LANGUAGE=='jp'){
						echo "Japan";
					}
				?>
			<i class="fas fa-chevron-down"></i>
		</a>
		<ul class="dropdown-menu">
			<div class="node-hv">&nbsp;</div>
			<li>
				<a href="javascript:_postback();" onclick="Forward('?<?php echo TTH_PATH?>=set_language&lang=vi');">Viet Nam</a>
			</li>
			<li>
				<a href="javascript:_postback();" onclick="Forward('?<?php echo TTH_PATH?>=set_language&lang=jp');">Japan</a>
			</li>
		</ul>
	</li>
    <li class="dropdown">

        <a class="dropdown-toggle toggle-user" data-toggle="dropdown" href="#">

            <?php

            $info_user = array();

            $info_user = getInfoUser($_SESSION["user_id"]);

            ?>

            <label class="tth-user-admin"><?php echo $info_user[4] . ' ' . $info_user[0];?>&nbsp; <i class="fas fa-chevron-down"></i></label>

        </a>

        <ul class="dropdown-menu dropdown-user">

	        <div class="node-hv">&nbsp;</div>

            <li>

                <a href="javascript:_postback();" onclick="Forward('?<?php echo TTH_PATH?>=core_user_changeinfo&active=info');"><img src="./images/menu/avatar.svg" class="info_u"> Thông tin cá nhân</a>

            </li>

	        <li>

		        <a href="javascript:_postback();" onclick="Forward('?<?php echo TTH_PATH?>=core_user_changeinfo&active=pass');"><img src="./images/menu/lock.svg" class="info_u"> Đổi mật khẩu</a>

	        </li>

	        <li>

		        <a target="_blank" href="/"><img src="./images/menu/tag.svg" class="info_u"> Trang chủ site</a>

	        </li>

            <li>

                <a href="javascript:_postback();" onclick="Forward('?logout=OK');"><img src="./images/menu/logout.svg" class="info_u"> Đăng xuất</a>

            </li>

        </ul>

    </li>

</ul>