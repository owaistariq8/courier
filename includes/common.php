<?php 

define("PHP_VER",phpversion());


define("BASEDIR",dirname(dirname(__FILE__)));
if(!file_exists(BASEDIR.'/index.php'))
	die('Fuck Yourself First, then fix this BASEDIR issue ! :@');


define("WRITE_DBNAME", "hispeedcourier");
define("READ_DBNAME", "hispeedcourier");

define("SKIN_DIR",BASEDIR.'/styles/layout');

// this need to be dynamic
define("TEMPLATE_FOLDER_NAME",'');
define("TEMPLATE_FOLDER",SKIN_DIR.'/'.TEMPLATE_FOLDER_NAME);
define("SKIN_LAYOUT",TEMPLATE_FOLDER.'');

define("CACHE_DIR",BASEDIR.'/cache');
define("PLUG_PLAY_DIR",BASEDIR.'/plug_n_play');
define("JS_DIR",BASEDIR.'/main_js');

define("AJAX_DIR",BASEDIR.'/ajax_base');

define("ACTS_DIR",BASEDIR.'/acts');


define('COOKIE_TIMEOUT', 86400 * 365); // 1

$dev_file = dirname(__FILE__).'/code.beats';
if (file_exists($dev_file))
	define("CODE_MODE",true);
else
	define("CODE_MODE",false);
if(CODE_MODE)
{
	if (file_exists(dirname(__FILE__).'/raw_configs.php'))
	{
		require_once 'raw_configs.php';
	}
}


// {Setting Error reporting througout the beats}
if(!CODE_MODE)
	define('ERR_REPORTING',0);
else
	define('ERR_REPORTING',2);


switch(ERR_REPORTING)
{
	case 1:
	{
		error_reporting(-1);
		ini_set('display_errors','1');
	}
	break;
	case 2:
    
    {
        
        if (phpversion() >= '5.3.0')
        {

            error_reporting(E_ALL & ~(E_NOTICE | E_DEPRECATED | E_STRICT | E_WARNING));
        } else
        {
            error_reporting(E_ALL ^E_NOTICE);
        }
    }
    break;
	case 0:
	default:
	{
		error_reporting(E_ALL & ~(E_NOTICE | E_DEPRECATED | E_STRICT | E_WARNING));
		ini_set('display_errors', 'on');
	}
}

// {Including Libraries}
#smarty verison 3 library 
require_once(BASEDIR.'/includes/smartyv3/SmartyBC.class.php');
require_once(BASEDIR."/includes/classes/template.class.php");
$template = new audio_template();

require_once(BASEDIR."/includes/classes/db.class.php");
require_once(BASEDIR."/includes/dbconnect.php");
global $audio_smarty,$db;
require_once(BASEDIR."/includes/functions.php");

$beats_configs = allconfigs();
if(CODE_MODE)
{
	if (file_exists(dirname(__FILE__).'/raw_configs.php'))
	{
		require_once 'raw_configs.php';
	}
	if(empty($local_baseurl))
	{
		$local_baseurl = "http://hispeed.com";
	}
	define("BASEURL", $local_baseurl);
}
else
{
	// define("BASEURL", $beats_configs['baseurl']);	
}
if(empty($local_baseurl))
{
	$local_baseurl = "http://hispeed.com";
}
define("BASEURL", $local_baseurl);
define('EMAIL_VERIFICATION',1);
define("SKIN_URL",BASEURL.'/styles/layout');
define("JS_URL",BASEURL.'/main_js');
define("ACTS_URL",BASEURL.'/acts');
define("AJAX_URL",BASEURL.'/ajax_base');
define("PLUG_PLAY_URL",BASEURL.'/plug_n_play');
define("ADMIN_SKIN_DIR", BASEDIR."/admin_area_panel/layout");
define("ADMIN_SKIN_URL", BASEURL."/admin_area_panel/layout");
define("ADMIN_URL", BASEURL."/admin_area_panel");
define("ADMIN_DIR", BASEDIR."/admin_area_panel");
//player core source


refer("ajax_url",AJAX_URL);
refer("admin_url_layout",ADMIN_SKIN_URL);
refer("admin_url",ADMIN_URL);
refer("theme",SKIN_URL."/".TEMPLATE_FOLDER_NAME."/css");
refer("js",JS_URL);
refer("baseurl",BASEURL);
refer("template_folder",TEMPLATE_FOLDER);
refer("theme_js",SKIN_URL."/".TEMPLATE_FOLDER_NAME."/js");
refer("images",SKIN_URL."/".TEMPLATE_FOLDER_NAME."/images");
?>