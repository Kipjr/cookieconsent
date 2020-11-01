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

