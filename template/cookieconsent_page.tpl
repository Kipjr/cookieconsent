{* <!-- load CSS files --> *}
{combine_css id="cookieconsent" path=$COOKIECONSENT_PATH|cat:"template/style.css"}

{* <!-- load JS files --> *}
{combine_script id="cookieconsent" require="jquery" path=$COOKIECONSENT_PATH|cat:"template/script.js"}

{* <!-- add inline JS --> *}
{footer_script require="jquery"}

  
{/footer_script}

{* <!-- add inline CSS --> *}
{* html_style}
  #cookieconsent {
    display:block;
  }
{/html_style *}


{* <!-- add page content here --> *}
{if $cc_given !=1}
<div id="CC" {if $cookieconsent.cc_fullscreen} style="min-height: 100%;" {else} style="min-height: 26px;"{/if} >
    <div id="CC_block">
		{$cookieconsent.cc_text|unescape:'html'} <a href={$cookieconsent.cc_url} target="_blank">{$cookieconsent.cc_button}</a><a class="CCOK">{'Accept'|translate}</a>
	</div>
</div>
{/if}
