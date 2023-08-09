/*===========================================================================
*
*  Show Transfer Features
*
*============================================================================*/
$(document).ready(function(){

    "use strict";

    if (document.getElementById('type').value == 'emails') {
        $('.emails-box').fadeIn();
    } else {
        $('.emails-box').fadeOut();
    }

    var linkCheck =  document.getElementById('link-expiration');
    if (typeof(linkCheck) != 'undefined' && linkCheck != null)
    {
        if (document.getElementById('link-expiration').value == 1) {
            $('.expiration-time-box').fadeIn();
        } else {
            $('.expiration-time-box').fadeOut();
        }
    }

    var passwordCheck =  document.getElementById('password-protection');
    if (typeof(passwordCheck) != 'undefined' && passwordCheck != null)
    {
        if (document.getElementById('password-protection').value == 1) {
            $('.password-box').fadeIn();
            document.getElementById("password-input").required="required";
        } else {
            $('.password-box').fadeOut();
            document.getElementById("password-input").required="";
        }
    }
});

function typeChanged() {

    "use strict";

    if (document.getElementById('type').value == 'emails') {
        $('.emails-box').fadeIn();
        document.getElementById("emails-to").required="required";
        document.getElementById("emails-from").required="required";
    } else {
        $('.emails-box').fadeOut();
        document.getElementById("emails-to").required="";
        document.getElementById("emails-from").required="";
    }
}

function signedLinkChanged() {

    "use strict";

    if (document.getElementById('link-expiration').value == 1) {
        $('.expiration-time-box').fadeIn();
    } else {
        $('.expiration-time-box').fadeOut();
    }
}

function passwordChanged() {

    "use strict";

    if (document.getElementById('password-protection').value == 1) {
        $('.password-box').fadeIn();
        document.getElementById("password-input").required="required";
    } else {
        $('.password-box').fadeOut();
        document.getElementById("password-input").required="";
    }
}


/*===========================================================================
*
*  COPY TO CLIPBOARD FUNCTION
*
*============================================================================*/
function copy(element) {

    var link =  $(element).closest('.download-links').find('.link').val();
    navigator.clipboard.writeText(link);

}
