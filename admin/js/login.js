/* Archivo para manejar login
*/


(function($) {
    "use strict";

    /* Log In Form */
    $("#logInForm").validator().on("submit", function(event) {
    	if (event.isDefaultPrevented()) {
            lsubmitMSG(false, "Asegúrese de llenar todos los campos!");
        } else {
            // everything looks good!
            event.preventDefault();
            lsubmitForm();
        }
    });

    function lsubmitForm() {
        // initiate variables with form content
		var email = $("#inputEmail").val();
		var password = $("#inputPassword").val();
        var url1 = new URL(location.href);
        var nextPage = url1.searchParams.get("next");
        
        $.ajax({
            type: "POST",
            url: "php/login.php",
            
            data: "username=" + email + "&password=" + password,
            success:function(text){
                if (text == "success") {
                    if (nextPage != null) {
                        window.location = nextPage;
                    }
                    else {window.location="crud.php";}
                } else {
                    //lformError();
                    lsubmitMSG(false, "Credenciales incorrectas");
                }
            }
        });
	}

    function lformSuccess() {
        $("#logInForm")[0].reset();
        lsubmitMSG(true, "Log In Submitted!");
        $("input").removeClass('notEmpty'); // resets the field label after submission
    }

    function lformError() {
        $("#logInForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
            $(this).removeClass();
        });
	}

    function lsubmitMSG(valid, msg) {
        if (valid) {
            var msgClasses = "h5 text-center";
        } else {
            var msgClasses = "h5 text-center";
        }
        $("#lmsgSubmit").removeClass().addClass(msgClasses).text(msg);
    }

})(jQuery);