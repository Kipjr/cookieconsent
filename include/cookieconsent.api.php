<?php
define('PHPWG_ROOT_PATH', dirname(__FILE__, 4) . "/");
$json = file_get_contents('php://input');
$data = json_decode($json);
$array = (array) $data;

global $conf;
include(PHPWG_ROOT_PATH.'include/common.inc.php');

if($array['consent']==true){
	if($conf['cookieconsent']['cc_session_cookie']==1) {
		pwg_set_session_var('cconsent',true);
	}
	if($conf['cookieconsent']['cc_session_cookie']==0) {
		#include(PHPWG_ROOT_PATH.'include/functions_cookie.inc.php');
		#pwg_set_cookie_var("cc_persistent_cookie", true, $expire=(time() + (86400 * 365))); #cookie is set for wrong path
		$fpath = $_SERVER['REQUEST_URI']; #"/piwigo/plugins/cookieconsent/include/cookieconsent.api.php";
		$cpath = substr($fpath,0,strpos($fpath,"plugins/cookieconsent/include/cookieconsent.api.php")); #returns part before 'plugins', here /piwigo/
		setcookie('pwg_cc_persistent_cookie', true, array ( # since PHP 7.3.0
				'expires' => time() + (86400 * 365),
				'path' => $cpath,
				'samesite' => 'Strict', # None || Lax  || Strict
			)
	        );
	}
}
