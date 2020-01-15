{* <!-- load CSS files --> *}
{combine_css id="cookieconsent" path=$COOKIECONSENT_PATH|cat:"template/style.css"}

{* <!-- load JS files --> *}
{combine_script id="cookieconsent" require="jquery" path=$COOKIECONSENT_PATH|cat:"template/script.js"}

{* <!-- add inline JS --> *}
{footer_script require="jquery"}

  
{/footer_script}

{* <!-- add inline CSS --> *}
{html_style}
  #cookieconsent {
    display:block;
  }
{/html_style}


{* <!-- add page content here --> *}
<h1>{'What CookieConsent can do for me?'|translate}</h1>
<div id="CC">
    <div id="closeCC">x</div>
    This website is using cookies. <a href="#" target="_blank">More info</a>. <a class="CCOK">That's Fine</a>
</div>
<!--<blockquote>
  {$INTRO_CONTENT}
</blockquote>  -->

<div id="button">{'Click for fun'|translate}</div>