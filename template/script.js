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