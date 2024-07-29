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

/**
 * admin plugins menu link
 */
function cookieconsent_admin_plugin_menu_links($menu)
{
  $menu[] = array(
    'NAME' => l10n('Cookie Consent'),
    'URL' => COOKIECONSENT_ADMIN,
    );

  return $menu;
}


