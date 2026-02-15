<?php
/*
+-----------------------------------------------------------------------+
|                                                                       |
| Cookie Consent -  Piwigo extension adding cookie consent              |
| Copyright (C) 2024 Netcie / Kipjr                                     |
|                                                                       |
| Cookie Consent is licensed under the GNU General Public License       |
| version 2 or (at your option) any later version, as is Piwigo itself. |
|                                                                       |
| For more details, check the COPYING or LICENSE file in the top-level  |
| directory of this extension.                                          |
|                                                                       |
+-----------------------------------------------------------------------+
*/
defined('COOKIECONSENT_PATH') or die('Hacking attempt!');

// +-----------------------------------------------------------------------+
// | Configuration tab                                                     |
// +-----------------------------------------------------------------------+

// save config
if (isset($_POST['save_config']))
{
  $validArray = array(1,7,30,90,180,365);
  $validity = in_array($_POST['cc_cookie_validity'], $validArray) ? $_POST['cc_cookie_validity'] : 90;
  $conf['cookieconsent'] = array(
    'cc_session_cookie' => isset($_POST['cc_session_cookie']),
    'cc_fullscreen' => isset($_POST['cc_fullscreen']),
    'cc_cookie_validity' => $validity,
    'cc_text' => htmlspecialchars($_POST['cc_text']),
    'cc_url_text' => htmlspecialchars($_POST['cc_url_text']),
    'cc_url' => htmlspecialchars($_POST['cc_url']),
    'cc_accept'=> htmlspecialchars($_POST['cc_accept']),
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
