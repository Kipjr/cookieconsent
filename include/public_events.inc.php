<?php
defined('COOKIECONSENT_PATH') or die('Hacking attempt!');



/**
 * include public page
 */
function cookieconsent_loc_end_page()
{
  global $page, $template;
  include(COOKIECONSENT_PATH . 'include/cookieconsent_page.inc.php');

}

