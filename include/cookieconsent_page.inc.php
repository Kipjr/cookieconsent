<?php
defined('COOKIECONSENT_PATH') or die('Hacking attempt!');

global $page, $template, $conf, $user, $tokens, $pwg_loaded_plugins;


# DO SOME STUFF HERE... or not !


$template->assign(array(
  // this is useful when having big blocks of text which must be translated
  // prefer separated HTML files over big lang.php files
  'INTRO_CONTENT' => load_language('intro.html', COOKIECONSENT_PATH, array('return'=>true)),
  'COOKIECONSENT_PATH' => COOKIECONSENT_PATH,
  'COOKIECONSENT_ABS_PATH' => realpath(COOKIECONSENT_PATH).'/',
  ));

$template->set_filename('cookieconsent_page', realpath(COOKIECONSENT_PATH . 'template/cookieconsent_page.tpl'));
$template->assign_var_from_handle('CONTENT', 'cookieconsent_page');
