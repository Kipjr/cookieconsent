<?php
defined('COOKIECONSENT_PATH') or die('Hacking attempt!');

// +-----------------------------------------------------------------------+
// | Home tab                                                              |
// +-----------------------------------------------------------------------+

// send variables to template
$template->assign(array(
  'cookieconsent' => $conf['cookieconsent'],
  'INTRO_CONTENT' => load_language('intro.html', COOKIECONSENT_PATH, array('return'=>true)),
  ));

// define template file
$template->set_filename('cookieconsent_content', realpath(COOKIECONSENT_PATH . 'admin/template/home.tpl'));
