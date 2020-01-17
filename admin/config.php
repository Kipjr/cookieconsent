<?php
defined('COOKIECONSENT_PATH') or die('Hacking attempt!');

// +-----------------------------------------------------------------------+
// | Configuration tab                                                     |
// +-----------------------------------------------------------------------+

// save config
if (isset($_POST['save_config']))
{
  $conf['cookieconsent'] = array(
    'cc_fullscreen' => isset($_POST['cc_fullscreen']),
    'cc_text' => htmlspecialchars($_POST['cc_text']),
    'cc_url' => htmlspecialchars($_POST['cc_url']),
    );
	

  conf_update_param('cookieconsent', $conf['cookieconsent']);
  $page['infos'][] = l10n('Information data registered in database');
}



// send config to template
$template->assign(array(
  'cookieconsent' => $conf['cookieconsent']
  ));

// define template file
$template->set_filename('cookieconsent_content', realpath(COOKIECONSENT_PATH . 'admin/template/config.tpl'));
