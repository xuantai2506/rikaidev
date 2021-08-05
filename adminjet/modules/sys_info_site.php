<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//
?>
<!-- Menu path -->
<div class="row">
	<h2 class="title_sp">Cấu hình site</h2>
	<ol class="breadcrumb">
		<li>
			<a href="<?php echo ADMIN_DIR?>"> Trang chủ</a>
		</li>
		<li>
			 Thông tin hệ thống
		</li>
		<li>
			 Cấu hình site
		</li>
	</ol>
</div>
<!-- /.row -->
<?php
dashboardCoreAdmin();

$info = array();
$server_name = preg_replace( '/^[a-z]+\:\/\//i', '',  isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : ( isset( $_SERVER['SERVER_NAME'] ) ? $_SERVER['SERVER_NAME'] : '' ) );

$site_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']!='off') ? 'https://' : 'http://';
$site_url .= $server_name;

$base_siteurl = '/';

$cookie_domain = preg_replace( '/^([w]{3})\./', '', $server_name );
$cookie_domain = ( preg_match( '/^([0-9a-z][0-9a-z-]+\.)+[a-z]{2,6}$/', $cookie_domain ) ) ? '.' . $cookie_domain : '';

$sys_os = strtoupper( ( function_exists( 'php_uname' ) and php_uname( 's' ) != '' ) ? php_uname( 's' ) : PHP_OS );

$info['website'] = array(
	'caption' => 'Cấu hình site',
	'field' => array(
		array( 'key' => 'Domain của site', 'value' =>$server_name ),
		array( 'key' => 'Đường dẫn đến site', 'value' => $site_url ),
		array( 'key' => 'Đường dẫn tuyệt đối đến site', 'value' =>  str_replace( DS, '/', ROOT_DIR) ),
		array( 'key' => 'Thư mục chứa site', 'value' => $base_siteurl ),
		array( 'key' => 'Domain lưu cookies', 'value' => $cookie_domain ),
		array( 'key' => 'Múi giờ của site', 'value' => TTH_TIMEZONE)
	)
);

$info['server'] = array(
	'caption' => 'Cấu hình máy chủ',
	'field' => array(
		array( 'key' => 'Phiên bản LovaWeb', 'value' => '4.28' ),
		array( 'key' => 'Phiên bản PHP', 'value' => phpversion() ),
		array( 'key' => 'Giao thức giữa máy chủ và PHP', 'value' => apache_get_version() . ', ' . php_sapi_name() ),
		array( 'key' => 'Hệ điều hành máy chủ', 'value' => $sys_os),
		array( 'key' => 'Phiên bản database', 'value' => 'mysql ' . $db->serverInfo())
	)
);

$xtpl = new XTemplate('system_info.tpl', ROOT_DIR . '/themes/admin/modules/siteinfo');

foreach( $info as $key => $if ) {
	$xtpl->assign( 'CAPTION', $if['caption'] );
	$xtpl->parse( 'main.textcap' );

	foreach( $if['field'] as $key => $field ) {
		$xtpl->assign( 'KEY', $field['key'] );
		$xtpl->assign( 'VALUE', $field['value'] );
		$xtpl->parse( 'main.loop' );
	}

	$xtpl->parse( 'main' );
}

$contents = $xtpl->text( 'main' );

echo $contents;