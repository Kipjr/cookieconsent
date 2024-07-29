{*
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
*}


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
        <div id="CC" {if isset($cookieconsent.cc_fullscreen) and ($cookieconsent.cc_fullscreen == 1)} style="min-height: 100%;" {else} style="min-height: 26px;"{/if} >
            <div id="CC_block">
		{if isset($cookieconsent.cc_text)} {$cookieconsent.cc_text|unescape:'html'}{/if} <a href={if isset($cookieconsent.cc_url)}{$cookieconsent.cc_url} {/if}target="_blank">{if isset($cookieconsent.cc_url_text)} {$cookieconsent.cc_url_text|unescape:'html'}{/if}</a><a class="CCOK">{if isset($cookieconsent.cc_accept)} {$cookieconsent.cc_accept|unescape:'html'}{/if}</a>
	    </div>
        </div>
    {/if}
{/if}
