<?php
/**
 * This is the main administration page, if you have only one admin page you can put
 * directly its code here or using the tabsheet system like bellow
 */

defined('COOKIECONSENT_PATH') or die('Hacking attempt!');

global $template, $page, $conf;


// get current tab
$page['tab'] = isset($_GET['tab']) ? $_GET['tab'] : $page['tab'] = 'config';

// plugin tabsheet is not present on photo page
if ($page['tab'] != 'photo')
{
  // tabsheet
  include_once(PHPWG_ROOT_PATH.'admin/include/tabsheet.class.php');
  $tabsheet = new tabsheet();
  $tabsheet->set_id('cookieconsent');


  $tabsheet->add('config', l10n('Configuration'), COOKIECONSENT_ADMIN . '-config');
  $tabsheet->select($page['tab']);
  $tabsheet->assign();
}

// include page
include(COOKIECONSENT_PATH . 'admin/' . $page['tab'] . '.php');

// template vars
$template->assign(array(
  'COOKIECONSENT_PATH'=> COOKIECONSENT_PATH, // used for images, scripts, ... access
  'COOKIECONSENT_ABS_PATH'=> realpath(COOKIECONSENT_PATH), // used for template inclusion (Smarty needs a real path)
  'COOKIECONSENT_ADMIN' => COOKIECONSENT_ADMIN,
  ));

// send page content
$template->assign_var_from_handle('ADMIN_CONTENT', 'cookieconsent_content');
