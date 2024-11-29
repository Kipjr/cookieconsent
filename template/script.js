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
$(document).ready(function(){
function postData(){
	fetch('./plugins/cookieconsent/include/cookieconsent.api.php', {
		method : 'post',
		mode:    'cors',
		headers: {
		  'Content-Type': 'application/json',  // sent request
		  'Accept':       'application/json'   // expected data sent back
		},
		body: JSON.stringify({consent:true})
	})
	  .then((res) => res.json())
	  .then((data) => console.log(data))
	  .catch((error) => console.log(error))	
	}

	
    setTimeout(function () {
        $("#CC").fadeIn(200);
     }, 1000);
    $(".CCOK").click(function() {
        $("#CC").fadeOut(200);
		postData();
		
    }); 
}); 