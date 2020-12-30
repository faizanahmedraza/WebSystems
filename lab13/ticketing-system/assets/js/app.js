function Contact(){
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var mesg = document.getElementById("message").value;
    var namepattern = /^[A-za-z. ]{3,30}$/;
    var emailPattern = /[A-za-z0-9_]{3,14}@[A-za-z]{3,}[.]{1}[a-zA-z.]{2,6}$/;
    if(emailPattern.test(email))
    {
        document.getElementById('email_error').innerHTML = "";
    } else {
        document.getElementById('email_error').innerHTML = "Required. Must be a valid email";
        return false;
    } 

    if(namepattern.test(name))
    {
        document.getElementById("name_error").innerHTML = "";
    } else {
        document.getElementById("name_error").innerHTML = "Required and alphabets only.";
        return false;
    }

    if(mesg != null || mesg == ''){
        document.getElementById("message_error").innerHTML = "Message is required";
    }
}
function Payment(){
    var name = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var card_number = document.getElementById("card_number").value;
    var expiry = document.getElementById("expiry_date").value;
    var verify = document.getElementById("verify").value;

    var namepattern = /^[A-za-z.]{3,30}$/;
    var emailPattern = /[A-za-z0-9_]{3,14}@[A-za-z]{3,}[.]{1}[a-zA-z.]{2,6}$/;

    if(emailPattern.test(email))
    {
        document.getElementById('email_error').innerHTML = "";
    } else {
        document.getElementById('email_error').innerHTML = "Required. Must be a valid email";
        return false;
    } 

    if(namepattern.test(name))
    {
        document.getElementById("name_error").innerHTML = "";
    } else {
        document.getElementById("name_error").innerHTML = "Required and alphabets only.";
        return false;
    }
    
    if(card_number == null || card_number < 19 || card_number == '')
    {
        document.getElementById("card_number_error").innerHTML = "Please enter valid Card Number";
        return false;
    }
    if(expiry == null || expiry == '')
    {
        document.getElementById("expiry_error").innerHTML = "Please enter Expiry Date";
        return false;
    }
    if(verify == null || verify < 4 || verify == '')
    {
        document.getElementById("verify_error").innerHTML = "Please enter verification code.";
        return false;
    }

}