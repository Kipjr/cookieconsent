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
{if isset($cc_given)} 
    {if $cc_given !=1}
        <div id="CC" {if isset($cookieconsent.cc_fullscreen)} style="min-height: 100%;" {else} style="min-height: 26px;"{/if} >
            <div id="CC_block">
		{if isset($cookieconsent.cc_text)} {$cookieconsent.cc_text|unescape:'html'}{/if} <a href={if isset($cookieconsent.cc_url)}{$cookieconsent.cc_url} {/if}target="_blank">{if isset($cookieconsent.cc_button)} {$cookieconsent.cc_button|unescape:'html'}{/if}</a><a class="CCOK">{if isset($cookieconsent.cc_accept)} {$cookieconsent.cc_accept|unescape:'html'}{/if}</a>
	    </div>
        </div>
    {/if}
{/if}
