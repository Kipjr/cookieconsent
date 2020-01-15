<?php
defined('COOKIECONSENT_PATH') or die('Hacking attempt!');

/**
 * admin plugins menu link
 */
function cookieconsent_admin_plugin_menu_links($menu)
{
  $menu[] = array(
    'NAME' => l10n('CookieConsent'),
    'URL' => COOKIECONSENT_ADMIN,
    );

  return $menu;
}

/**
 * add a tab on photo properties page
 */
function cookieconsent_tabsheet_before_select($sheets, $id)
{
  if ($id == 'photo')
  {
    $sheets['cookieconsent'] = array(
      'caption' => l10n('CookieConsent'),
      'url' => COOKIECONSENT_ADMIN.'-photo&amp;image_id='.$_GET['image_id'],
      );
  }

  return $sheets;
}

/**
 * add a prefilter to the Batch Downloader
 */
function cookieconsent_add_batch_manager_prefilters($prefilters)
{
  $prefilters[] = array(
    'ID' => 'cookieconsent',
    'NAME' => l10n('CookieConsent'),
    );

  return $prefilters;
}

/**
 * perform added prefilter
 */
function cookieconsent_perform_batch_manager_prefilters($filter_sets, $prefilter)
{
  if ($prefilter == 'cookieconsent')
  {
    $query = '
SELECT id
  FROM '.IMAGES_TABLE.'
  ORDER BY RAND()
  LIMIT 20
;';
    $filter_sets[] = query2array($query, null, 'id');
  }

  return $filter_sets;
}

/**
 * add an action to the Batch Manager
 */
function cookieconsent_loc_end_element_set_global()
{
  global $template;

  /*
    CONTENT is optional
    for big contents it is advised to use a template file

    $template->set_filename('cookieconsent_batchmanager_action', realpath(COOKIECONSENT_PATH.'template/batchmanager_action.tpl'));
    $content = $template->parse('cookieconsent_batchmanager_action', true);
   */
  $template->append('element_set_global_plugins_actions', array(
    'ID' => 'cookieconsent',
    'NAME' => l10n('CookieConsent'),
    'CONTENT' => '<label><input type="checkbox" name="check_cookieconsent"> '.l10n('Check me!').'</label>',
    ));
}

/**
 * perform added action
 */
function cookieconsent_element_set_global_action($action, $collection)
{
  global $page;

  if ($action == 'cookieconsent')
  {
    if (empty($_POST['check_cookieconsent']))
    {
      $page['warnings'][] = l10n('Nothing appened, but you didn\'t check the box!');
    }
    else
    {
      $page['infos'][] = l10n('Nothing appened, but you checked the box!');
    }
  }
}
