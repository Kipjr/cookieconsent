  $(document).ready(function(){   
    setTimeout(function () {
        $("#CC").fadeIn(200);
     }, 1000);
    $("#closeCC, .CCOK").click(function() {
        $("#CC").fadeOut(200);
    }); 
}); 