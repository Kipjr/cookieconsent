{combine_css path=$COOKIECONSENT_PATH|@cat:"admin/template/style.css"}

{html_style}
  h4 {
    text-align:left !important;
  }
{/html_style}


<div class="titrePage">
	<h2>CookieConsent</h2>
</div>

<form method="post" action="" class="properties">
<fieldset>
  <legend>{'What CookieConsent can do for me?'|translate}</legend>

  {$INTRO_CONTENT}
</fieldset>

</form>