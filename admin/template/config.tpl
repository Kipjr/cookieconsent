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
  <legend>{'Common configuration'|translate}</legend>

  <ul>
    <li>
      <label>
        <input type="checkbox" name="cc_session_cookie" value="1" {if $cookieconsent.cc_session_cookie}checked="checked"{/if}>
        <b>{'Session Cookie'|translate}</b>
      </label>
      <a class="icon-info-circled-1 showInfo" title="{'Use session cookie'|translate}"></a>
    </li>  
    <li>
      <label>
        <input type="checkbox" name="cc_fullscreen" value="1" {if $cookieconsent.cc_fullscreen}checked="checked"{/if}>
        <b>{'Fullscreen'|translate}</b>
      </label>
      <a class="icon-info-circled-1 showInfo" title="{'Full screen overlay'|translate}"></a>
    </li>
    <li >
      <label>
        <b>{'Message text'|translate}</b>
        <textarea name="cc_text"  rows="4" cols="50" >{$cookieconsent.cc_text}</textarea>
      </label>
    </li>
    <li >
      <label>
        <b>{'Button text'|translate}</b>
        <input type="text" name="cc_button"  value="{$cookieconsent.cc_button}"</input>
      </label>
    </li>
    <li >
      <label>
        <b>{'URL'|translate}</b>
        <input type="text" name="cc_url"  value="{$cookieconsent.cc_url}"</input>
      </label>
    </li>
    <li>
      <label>
      <b>{'Accept'|translate}</b>
      <input type="text" name="cc_accept" value="{$cookieconsent.cc_accept}"</input>
      </label>
     </li>
  </ul>
</fieldset>

<p class="formButtons"><input type="submit" name="save_config" value="{'Save Settings'|translate}"></p>

</form>
