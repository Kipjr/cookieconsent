<?php
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


