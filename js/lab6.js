//This Lab contains Regular Expression
function Task1()
{
    var id = document.getElementById("user_id").value;
    var name = document.getElementById("name").value;
    
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var address = document.getElementById("address").value;
    var country = document.getElementById("country").value;
    var zip = document.getElementById("zipcode").value;
    var sex = document.getElementsByName("gender").value;
    var lang = document.getElementsByName("lang").value;
    var about = document.getElementById("about").value;

    var namepattern = /^[A-za-z. ]{3,30}$/;
    var idpattern = /^[0-9]{5,12}$/;
    var emailPattern = /[A-za-z0-9_]{3,14}@[A-za-z]{3,}[.]{1}[a-zA-z.]{2,6}$/;
    var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!#$%^&*_^]).{8,}$/;
    var zipPattern = /^[0-9]{5}/;

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

    if(idpattern.test(id))
    {
        document.getElementById("user_id_error").innerHTML = "";
    }else{
        document.getElementById("user_id_error").innerHTML = "Required and must be of length 5 to 12.";
        return false;
    }
     
    if(passwordPattern.test(password))
    {
        document.getElementById("password_error").innerHTML = "";
    }else {
        document.getElementById("password_error").innerHTML = "Required and must be of length 7 to 12.";
        return false;
    }
    
    if(zipPattern.test(zip))
    {
        document.getElementById("zipcode_error").innerHTML = "";
    }else {
        document.getElementById("zipcode_error").innerHTML = "Required. must be numeric only.";
        return false;
    } 
    
    if(sex[0].checked != false && sex[1].checked != false && sex[0,1] != null)
    {
        document.getElementById("sex_error").innerHTML = "";
    }else{
        document.getElementById("sex_error").innerHTML = "Required.";
        return false;
    } 
    
    if(country != null && country != 0)
    {
        document.getElementById("country_error").innerHTML = "";
    }else {
        document.getElementById("country_error").innerHTML = "Required.";
        return false;
    }
    if(lang[0].checked != false && lang[1].checked != false || lang[0,1] != null)
    {
        document.getElementById("lang_error").innerHTML = "";
    } else {
        document.getElementById("lang_error").innerHTML = "Required.";
        return false;
    }
}
function Task2()
{
    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var web = document.getElementById("url");
    var mesg = document.getElementById("message");
    var emailPattern = /[A-za-z0-9_]{3,14}@[A-za-z]{3,}[.]{1}[a-zA-z.]{2,6}$/;
    var urlPattern = /(http|https)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/;
    var namepattern = /^[A-za-z. ]{3,30}$/;
    if(namepattern.test(name))
    {
        document.getElementById("name_error").innerHTML = "";
    } else {
        document.getElementById("name_error").innerHTML = "Required and alphabets only.";
        return false;
    }
    if(emailPattern.test(email))
    {
        document.getElementById('email_error').innerHTML = "";
    } else {
        document.getElementById('email_error').innerHTML = "Required. Must be a valid email";
        return false;
    } 

    if(urlPattern.test(web))
    {
        document.getElementById('url_error').innerHTML = "";
    } else {
        document.getElementById('url_error').innerHTML = "Required. Must be a valid email";
        return false;
    }
    if(mesg != null && mesg != "")
    {
        document.getElementById('message_error').innerHTML = "";
    } else {
        document.getElementById('message_error').innerHTML = "Required. Must be a valid email";
        return false;
    }
}