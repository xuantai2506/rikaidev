<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }

define('ROOT_DIR', realpath(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);

// Config
include_once(ROOT_DIR . DS . "config.php");

// Server section
/** Home url */
$baseUrl = empty($CONFIG['baseUrl']) ? home_url() :  $CONFIG['baseUrl'];
define('HOME_URL', $baseUrl);

// Define
define('DEVELOPMENT_ENVIRONMENT', false);
define('ERROR_LOG_DIR', ROOT_DIR . DS . 'tmp' . DS . 'logs' . DS . 'error_log');
define('ADMIN_DIR', '/adminjet');
define('TTH_DATA_PREFIX', 'lovaweb_');
$vLang = (!empty($_SESSION["language"]) && isset($_SESSION["language"])) ? $_SESSION["language"] : 'vi';
define('TTH_LANGUAGE', $vLang);
$pLang = (TTH_LANGUAGE == 'vi') ? '' : '/'.TTH_LANGUAGE;
define('PATH_LANG', $pLang);
define('HOME_URL_LANG', HOME_URL . $pLang);
define('TTH_PATH', 'ol'); // Variable
//define('FILE_MAX_SIZE', 2097152);
define('MAX_EXECUTION_TIME', 0);

// Database info
define("TTH_DB_HOST", $CONFIG[TTH_LANGUAGE]['tth_db_host']);
define("TTH_DB_USER", $CONFIG[TTH_LANGUAGE]['tth_db_user']);
define("TTH_DB_PASS", $CONFIG[TTH_LANGUAGE]['tth_db_pass']);
define("TTH_DB_NAME", $CONFIG[TTH_LANGUAGE]['tth_db_name']);

// System section path
/** Includes Path */
define("_F_INCLUDES", ROOT_DIR . DS . "includes");
define("_A_INCLUDES", ROOT_DIR . DS . ADMIN_DIR . DS . "includes");
/** Modules Path */
define("_F_MODULES", ROOT_DIR . DS . "modules");
define("_A_MODULES", ROOT_DIR . DS . ADMIN_DIR . DS . "modules");
/** Classes Path */
define("_F_CLASSES", _F_INCLUDES . DS . "class");
/** Functions Path */
define("_F_FUNCTIONS", _F_INCLUDES . DS . "function");
define("_A_FUNCTIONS", _A_INCLUDES . DS . "function");
/** Temps Path */
define("_F_TEMPLATES", _F_MODULES . DS . "temp");
define("_A_TEMPLATES", _A_MODULES . DS . "temp");
/** Actions Path */
define("_F_ACTIONS", _F_MODULES . DS . "action");
define("_A_ACTIONS", _A_MODULES . DS . "action");

// Get home_url()
function home_url() {
	$url = (isset($_SERVER['HTTPS']) &&
		$_SERVER['HTTPS']!='off') ? 'https://' : 'http://';
	$url .= $_SERVER['HTTP_HOST'].substr($_SERVER['PHP_SELF'], 0, -strlen(basename(__FILE__)));
	$url = (substr($url,-1) == '/') ?  substr($url,0,-1) : $url;
	return $url;
}

// Register Globals
include_once("register_globals.php");
register_globals();
extract($_REQUEST);