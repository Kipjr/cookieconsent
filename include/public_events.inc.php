<?php
defined('COOKIECONSENT_PATH') or die('Hacking attempt!');

/**
 * detect current section
 */
function cookieconsent_loc_end_section_init()
{
  global $tokens, $page, $conf;

  if ($tokens[0] == 'cookieconsent')
  {
    $page['section'] = 'cookieconsent';

    // section_title is for breadcrumb, title is for page <title>
    $page['section_title'] = '<a href="'.get_absolute_root_url().'">'.l10n('Home').'</a>'.$conf['level_separator'].'<a href="'.COOKIECONSENT_PUBLIC.'">'.l10n('CookieConsent').'</a>';
    $page['title'] = l10n('CookieConsent');

    $page['body_id'] = 'theCookieConsentPage';
    $page['is_external'] = true; // inform Piwigo that you are on a new page
  }
}

/**
 * include public page
 */
function cookieconsent_loc_end_page()
{
  global $page, $template;

  //if (isset($page['section']) and $page['section']=='cookieconsent')
  //{
    include(COOKIECONSENT_PATH . 'include/cookieconsent_page.inc.php');
  //}
}

/*
 * button on album and photos pages
 */
function cookieconsent_add_button()
{
  global $template;

  $template->assign('COOKIECONSENT_PATH', COOKIECONSENT_PATH);
  $template->set_filename('cookieconsent_button', realpath(COOKIECONSENT_PATH.'template/my_button.tpl'));
  $button = $template->parse('cookieconsent_button', true);

  if (script_basename()=='index')
  {
    $template->add_index_button($button, BUTTONS_RANK_NEUTRAL);
  }
  else
  {
    $template->add_picture_button($button, BUTTONS_RANK_NEUTRAL);
  }
}

/**
 * add a prefilter on photo page
 */
function cookieconsent_loc_end_picture()
{
  global $template;

  $template->set_prefilter('picture', 'cookieconsent_picture_prefilter');
}

function cookieconsent_picture_prefilter($content)
{
  $search = '{if $display_info.author and isset($INFO_AUTHOR)}';
  $replace = '
<div id="CookieConsent" class="imageInfo">
  <dt>{\'CookieConsent\'|@translate}</dt>
  <dd style="color:orange;">{\'Piwigo rocks\'|@translate}</dd>
</div>
';

  return str_replace($search, $replace.$search, $content);
}
