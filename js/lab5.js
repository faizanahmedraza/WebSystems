function validate()
{
    var fname = document.f1.fname.value;
    var lname = document.f1.lname.value;
    var email = document.f1.email.value;
    var pass1 = document.f1.fpass.value;
    var pass2 = document.f1.cpass.value;
    var check = document.f1.accept.value;
    var atrate = email.indexOf("@");
    var dot = email.indexOf(".")

    if(pass2 != pass1)
    {
        alert("Confirm Password Must be Same as Password!");
        return false;
    } else if(pass1.length < 8)
    {
        alert("Password must be Atleast 8 characters");
        return false;
    } else if(fname == null || fname == "")
    {
        alert("First Name can't be blank!");
        return false;
    } else if(lname == null || lname == "")
    {
        alert("Last Name can't be blank!");
        return false;
    } else if(email == email.toLowerCase())
    {
        alert("Email must be in Lower Case!");
        return false;
    } else if(atrate == dot || atrate < 2 || dot < atrate+2 || dot+2 >= email.length)
    {
        alert("Please provide a valid email Address!");
        return false;
    } else if(check == false){
        alert("Please check Terms and Conditions To Proceed!!");
        return false;
    } else {
        return true;
    }
}