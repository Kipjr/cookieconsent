# pwg_cookieconsent
[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=C7HN4VAGBTQFS&currency_code=EUR)

<a href="https://www.buymeacoffee.com/kipjr" target="_blank"><img src="https://user-images.githubusercontent.com/12066560/94989781-8bd26280-0577-11eb-9482-26faff60e95d.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;" ></a>

Simple cookie consent for Piwigo



Due to the recent GDPR / Cookie law , websites must show a banner when it uses cookies. This plugin might resolve some issues related to a missing banner/notification
Please be aware that, for as far as I can see, it is not possible to disable cookies without impacting the functional aspects of Piwigo.

On the admin configuration page you can set the size (fullscreen or banner), a custom message and a link to a specific page related to your cookie policy.


Piwigo uses two types of cookies. One additional persistent cookie (1y) can be set as opose of a session cookie.


| Name        | Purpose           | Data  | Server data |
| ------------- |:-------------:| -----:| -----:|
| pwg_id    | session cookie  | random 32 alfanumeric id |  pwg_device\|s:7:"desktop";<br> pwg_mobile_theme\|b:0;<br> pwg_uid\|i:1;<br><b>pwg_cconsent\|b:1;</b> | 
| pwg_remember     | auto login cookie      |   ~57 some value |
| pwg_cc_persistent_cookie | store cookie choice on visitor device | boolean | none

The bold value in 'Server data' is due to this plugin. 

![image](https://user-images.githubusercontent.com/12066560/97817090-6336a900-1c9a-11eb-98b6-e0d43053e97f.png)

___
# Screenshots
## Admin Configuration

Pre 2.10f

![image](https://user-images.githubusercontent.com/12066560/94938903-bb2e9400-04d1-11eb-889f-af164317d2e2.png)

2.10f

![image](https://user-images.githubusercontent.com/12066560/97817021-09ce7a00-1c9a-11eb-9621-8e82f946c675.png)


## Live
![image](https://user-images.githubusercontent.com/12066560/94938785-99cda800-04d1-11eb-8da7-0e9595a8a81c.png)


# Structure

![image](https://user-images.githubusercontent.com/12066560/134825261-218d2398-d624-4fd7-9846-d5668ee0f612.png)
<!--
flowchart TD
main[[main.inc.php]]
maintain[[maintain.inc.php]]
admin[admin.php]
cookieconsent_page.tpl([template/cookieconsent_page.tpl])
config.php[admin/config.php]
config.tpl([admin/template/config.tpl])
admin_events[include/admin_events.inc.php]
cookieconsent[include/cookieconsent.api.php]
cookieconsent_page.inc.php[include/cookieconsent_page.inc.php]
public_events[include/public_events.inc.php]
script>template/script.js]
p_index[[index.php]]
client_cookie{{Client Cookie}}
client_cookie2{{Client Cookie}}
session_cookie{{Session Cookie}}
session_cookie2{{Session Cookie}}
database[(Piwigo_DB)]
install[\install/]
activate[\activate/]
deactivate[\deactivate/]
update[\update/]
uninstall[\uninstall/]

subgraph Maintenance
maintain ==> install
maintain ==> activate
maintain ==> deactivate
maintain ==> update==>install
maintain ==> uninstall
end
uninstall -.conf_delete_param:cookieconsent-.->database
install-.conf_update_param:cookieconsent.-> database

subgraph Administration
admin-.cookieconsent_admin_plugin_menu_links.-admin_events
main -.cookieconsent_init..->admin==>config.php
config.php--Smarty==>config.tpl--HTTP_POST==>config.php
end
config.php-.conf_update_param:cookieconsent.-> database
database <==> session_cookie
session_cookie -.-> p_index
client_cookie -.-> p_index

main -.cookieconsent_init.->p_index==>public_events
public_events--cookieconsent_loc_end_page==>cookieconsent_page.inc.php
cookieconsent_page.inc.php--Smarty==>cookieconsent_page.tpl --loadJSfile==> script
script -.HTTP_POST.-> cookieconsent
cookieconsent -.-> client_cookie2
cookieconsent -.-> session_cookie2
-->
