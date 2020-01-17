<?php
define('PHPWG_ROOT_PATH', '../../');
$json = file_get_contents('php://input');
$data = json_decode($json);
$array = (array) $data;


if($array['consent']==true){
	include(PHPWG_ROOT_PATH.'include/common.inc.php');
	pwg_set_session_var('cconsent',true);
}