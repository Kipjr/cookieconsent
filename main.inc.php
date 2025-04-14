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
/*
Plugin Name: Cookie Consent
Version: 12.0.0a
Description: Cookie Consent 
Plugin URI: https://piwigo.org/ext/extension_view.php?eid=888
Author: Netcie / Kipjr
Author URI: https://github.com/kipjr/cookieconsent
Has Settings: true

Changelog :
 12.0.0a (2021-10-10) : Piwigo 12 compatibility (12.0.0RC1)
 2.10g   (2020-11-03) : Bugfix: empty button_text returns no button.

*/

/**
 * This is the main file of the plugin, called by Piwigo in "include/common.inc.php" line 137.
 * At this point of the code, Piwigo is not completely initialized, so nothing should be done directly
 * except define constants and event handlers (see http://piwigo.org/doc/doku.php?id=dev:plugins)
 */
defined('PHPWG_ROOT_PATH') or die('Hacking attempt!');


// +-----------------------------------------------------------------------+
// | Define plugin constants                                               |
// +-----------------------------------------------------------------------+


define('COOKIECONSENT_ID',      basename(dirname(__FILE__)));
define('COOKIECONSENT_PATH' ,   PHPWG_PLUGINS_PATH . COOKIECONSENT_ID . '/');
define('COOKIECONSENT_ADMIN',   get_root_url() . 'admin.php?page=plugin-' . COOKIECONSENT_ID);
define('COOKIECONSENT_PUBLIC',  get_absolute_root_url() . make_index_url(array('section' => 'cookieconsent')) . '/');


// +-----------------------------------------------------------------------+
// | Add event handlers                                                    |
// +-----------------------------------------------------------------------+
// init the plugin
add_event_handler('init', 'cookieconsent_init');

/*
 * this is the common way to define event functions: create a new function for each event you want to handle
 */
if (defined('IN_ADMIN'))
{
  // file containing all admin handlers functions
  $admin_file = COOKIECONSENT_PATH . 'include/admin_events.inc.php';

  // admin plugins menu link (see: https://piwigo.org/doc/doku.php?id=dev:changes_in_2.11 )
  add_event_handler('get_admin_plugin_menu_links', 'cookieconsent_admin_plugin_menu_links',
    EVENT_HANDLER_PRIORITY_NEUTRAL, $admin_file);

}
else
{ 
  // file containing all public handlers functions
  $public_file = COOKIECONSENT_PATH . 'include/public_events.inc.php'; 

  // add a public section
  add_event_handler('loc_end_index', 'cookieconsent_loc_end_page',
    EVENT_HANDLER_PRIORITY_NEUTRAL, $public_file);

}

/**
 * plugin initialization
 *   - check for upgrades
 *   - unserialize configuration
 *   - load language
 */
function cookieconsent_init()
{

  global $conf;
  global $cc_given;
  $cc_given = (pwg_get_session_var('cconsent'))!= null ? pwg_get_session_var('cconsent')==1 : false; //check server side if consent is given
  // load plugin language file
  load_language('plugin.lang', COOKIECONSENT_PATH);

  // prepare plugin configuration
  $conf['cookieconsent'] = safe_unserialize($conf['cookieconsent']);
}
