<?php
/*
Plugin Name: cookieconsent
Version: 2.10a
Description: Cookie Consent 
Plugin URI: 
Author: Netcie / Kipjr
Author URI: https://github.com/kipjr/pwg_cookieconsent
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
global $prefixeTable;

define('COOKIECONSENT_ID',      basename(dirname(__FILE__)));
define('COOKIECONSENT_PATH' ,   PHPWG_PLUGINS_PATH . COOKIECONSENT_ID . '/');
define('COOKIECONSENT_TABLE',   $prefixeTable . 'cookieconsent');
define('COOKIECONSENT_ADMIN',   get_root_url() . 'admin.php?page=plugin-' . COOKIECONSENT_ID);
define('COOKIECONSENT_PUBLIC',  get_absolute_root_url() . make_index_url(array('section' => 'cookieconsent')) . '/');
define('COOKIECONSENT_DIR',     PHPWG_ROOT_PATH . PWG_LOCAL_DIR . 'cookieconsent/');



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

  // admin plugins menu link
  add_event_handler('get_admin_plugin_menu_links', 'cookieconsent_admin_plugin_menu_links',
    EVENT_HANDLER_PRIORITY_NEUTRAL, $admin_file);
/* 
  // new tab on photo page
  add_event_handler('tabsheet_before_select', 'cookieconsent_tabsheet_before_select',
    EVENT_HANDLER_PRIORITY_NEUTRAL, $admin_file);

  // new prefiler in Batch Manager
  add_event_handler('get_batch_manager_prefilters', 'cookieconsent_add_batch_manager_prefilters',
    EVENT_HANDLER_PRIORITY_NEUTRAL, $admin_file);
  add_event_handler('perform_batch_manager_prefilters', 'cookieconsent_perform_batch_manager_prefilters',
    EVENT_HANDLER_PRIORITY_NEUTRAL, $admin_file);

  // new action in Batch Manager
  add_event_handler('loc_end_element_set_global', 'cookieconsent_loc_end_element_set_global',
    EVENT_HANDLER_PRIORITY_NEUTRAL, $admin_file);
  add_event_handler('element_set_global_action', 'cookieconsent_element_set_global_action',
    EVENT_HANDLER_PRIORITY_NEUTRAL, $admin_file); */
}
else
{ 
  // file containing all public handlers functions
  $public_file = COOKIECONSENT_PATH . 'include/public_events.inc.php'; 

  // add a public section
  add_event_handler('loc_end_section_init', 'cookieconsent_loc_end_section_init',
    EVENT_HANDLER_PRIORITY_NEUTRAL, $public_file);
  add_event_handler('loc_end_index', 'cookieconsent_loc_end_page',
    EVENT_HANDLER_PRIORITY_NEUTRAL, $public_file);
/* 
  // add button on album and photos pages
  add_event_handler('loc_end_index', 'cookieconsent_add_button',
    EVENT_HANDLER_PRIORITY_NEUTRAL, $public_file);
  add_event_handler('loc_end_picture', 'cookieconsent_add_button',
    EVENT_HANDLER_PRIORITY_NEUTRAL, $public_file);

  // prefilter on photo page
  add_event_handler('loc_end_picture', 'cookieconsent_loc_end_picture',
    EVENT_HANDLER_PRIORITY_NEUTRAL, $public_file); */
}
/* 
// file containing API function
$ws_file = COOKIECONSENT_PATH . 'include/ws_functions.inc.php';

// add API function
add_event_handler('ws_add_methods', 'cookieconsent_ws_add_methods',
    EVENT_HANDLER_PRIORITY_NEUTRAL, $ws_file);

 */
/*
 * event functions can also be wrapped in a class
 */

/* // file containing the class for menu handlers functions
$menu_file = COOKIECONSENT_PATH . 'include/menu_events.class.php';

// add item to existing menu (EVENT_HANDLER_PRIORITY_NEUTRAL+10 is for compatibility with Advanced Menu Manager plugin)
add_event_handler('blockmanager_apply', array('CookieConsentMenu', 'blockmanager_apply1'),
  EVENT_HANDLER_PRIORITY_NEUTRAL+10, $menu_file); */

// add a new menu block (the declaration must be done every time, in order to be able to manage the menu block in "Menus" screen and Advanced Menu Manager)
/* add_event_handler('blockmanager_register_blocks', array('CookieConsentMenu', 'blockmanager_register_blocks'),
  EVENT_HANDLER_PRIORITY_NEUTRAL, $menu_file);
add_event_handler('blockmanager_apply', array('CookieConsentMenu', 'blockmanager_apply2'),
  EVENT_HANDLER_PRIORITY_NEUTRAL, $menu_file); */

// NOTE: blockmanager_apply1() and blockmanager_apply2() can (must) be merged


/**
 * plugin initialization
 *   - check for upgrades
 *   - unserialize configuration
 *   - load language
 */
function cookieconsent_init()
{
  global $conf;

  // load plugin language file
  load_language('plugin.lang', COOKIECONSENT_PATH);

  // prepare plugin configuration
  $conf['cookieconsent'] = safe_unserialize($conf['cookieconsent']);
}
