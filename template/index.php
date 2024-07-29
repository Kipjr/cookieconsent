<?php
/*
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
*/
$url = '../';
header( 'Request-URI: '.$url );
header( 'Content-Location: '.$url );
header( 'Location: '.$url );
exit();
?>
