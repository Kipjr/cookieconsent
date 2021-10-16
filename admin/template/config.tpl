{combine_css path=$COOKIECONSENT_PATH|@cat:"admin/template/style.css"}

{footer_script}

jQuery(".showInfo").tipTip({
  delay: 0,
  fadeIn: 200,
  fadeOut: 200,
  maxWidth: '300px',
  defaultPosition: 'bottom'
});
{/footer_script}


<div class="titrePage">
	<h2>Cookie Consent</h2>
</div>

<form method="post" action="" class="properties">
<fieldset>
  <legend>{'Common configuration'|@translate}</legend>

  <ul>
    <li>
      <label>
        <input type="checkbox" name="cc_session_cookie" value="1" {if $cookieconsent.cc_session_cookie}checked="checked"{/if}>
        <b>{'Session Cookie'|@translate}</b>
      </label>
      <a class="icon-info-circled-1 tiptip" title="{'Use session cookie'|@translate}"></a>
    </li>
    <li>
      <label>
        <input type="checkbox" name="cc_fullscreen" value="1" {if $cookieconsent.cc_fullscreen}checked="checked"{/if}>
        <b>{'Fullscreen'|@translate}</b>
      </label>
      <a class="icon-info-circled-1 tiptip" title="{'Full screen overlay'|@translate}"></a>
    </li>
    <li>
      <label>
        <b>{'Persistent Cookie validity'|@translate}</b>
      <a class="icon-info-circled-1 tiptip" title="{'Cookie validity text'|@translate}"></a><br>
        <select  name="cc_cookie_validity">
		<option value=1 	{if $cookieconsent.cc_cookie_validity ==1} selected=selected {/if}>{'1 Day'|@translate}</option>
		<option value=7 	{if $cookieconsent.cc_cookie_validity ==7} selected=selected {/if}>{'7 Days'|@translate}</option>
		<option value=30 	{if $cookieconsent.cc_cookie_validity ==30} selected=selected {/if}>{'30 Days'|@translate}</option>
		<option value=90 	{if $cookieconsent.cc_cookie_validity ==90} selected=selected {/if}>{'3 Months'|@translate}</option>
		<option value=180 	{if $cookieconsent.cc_cookie_validity ==180} selected=selected {/if}>{'6 Months'|@translate}</option>
		<option value=365 	{if $cookieconsent.cc_cookie_validity ==365} selected=selected {/if}>{'1 Year'|@translate}</option>
		</select>
      </label>
    </li>  	
    <li >
      <label>
        <b>{'Message text'|@translate}</b><br>
        <textarea name="cc_text"  rows="4" cols="50" >{$cookieconsent.cc_text}</textarea>
      </label>
    </li>
    <li >
      <label>
        <b>{'URL text'|@translate}</b><br>
        <input type="text" name="cc_url_text"  value="{$cookieconsent.cc_url_text}"</input>
      </label>
    </li>
    <li >
      <label>
        <b>{'URL'|@translate}</b><br>
        <input type="text" name="cc_url"  value="{$cookieconsent.cc_url}"</input>
      </label>
    </li>
    <li>
      <label>
      <b>{'Accept'|@translate}</b><br>
      <input type="text" name="cc_accept" value="{$cookieconsent.cc_accept}"</input>
      </label>
     </li>
  </ul>
</fieldset>

<p class="formButtons"><input type="submit" name="save_config" value="{'Save Settings'|@translate}"></p>

</form>
