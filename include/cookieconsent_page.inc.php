<?php
defined('COOKIECONSENT_PATH') or die('Hacking attempt!');

global $template, $conf, $cc_given;

// when not using session cookie, get user cookie and test if been set. Session cookie is retrieved in main.inc.php and  check server side if consent is given
if(!isset($conf['cookieconsent']['cc_session_cookie']) || $conf['cookieconsent']['cc_session_cookie'] != 1)  {
    $cc_given=(pwg_get_cookie_var("cc_persistent_cookie"))==1;
}

// bugfix if buttontext is empty.
if(!isset($conf['cookieconsent']['cc_accept'])){
	$conf['cookieconsent']['cc_accept']="Accept";
}
else {
	if($conf['cookieconsent']['cc_accept'] == ""){
		$conf['cookieconsent']['cc_accept']="Accept";
	}
}
//applying data to template
$template->assign(array(
  'cookieconsent' => $conf['cookieconsent']
  ));
$template->assign('cc_given',$cc_given);
$template->assign(array(
  // this is useful when having big blocks of text which must be translated
  // prefer separated HTML files over big lang.php files
  'INTRO_CONTENT' => load_language('intro.html', COOKIECONSENT_PATH, array('return'=>true)),
  'COOKIECONSENT_PATH' => COOKIECONSENT_PATH,
  'COOKIECONSENT_ABS_PATH' => realpath(COOKIECONSENT_PATH).'/',
  ));

$template->set_filename('cookieconsent_page', realpath(COOKIECONSENT_PATH . 'template/cookieconsent_page.tpl'));
$template->assign_var_from_handle('CONTENT', 'cookieconsent_page');
