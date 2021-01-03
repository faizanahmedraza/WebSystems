const signform = document.getElementById('signupForm');
const logform = document.getElementById('loginForm');
const username = document.getElementById('fname');
const email = document.getElementById('uemail');
const password = document.getElementById('password');
const loemail = document.getElementById('loemail');
const lopassword = document.getElementById('lopassword');
const cpassword = document.getElementById('cpassword');
signform.addEventListener('submit', (event) => {
    event.preventDefault();
    SignUptFormInputs();
});
logform.addEventListener('submit', (event) => {
    event.preventDefault();
    LogInFormInputs();
});

const sendData = (sRate, counter) => {
    if (sRate === counter) {
        alert("Successfull Attemp!");
    }
}

const successValidation = () => {
    let small = document.getElementsByTagName('small');
    var counter = small.length - 1;
    for (var i = 0; i < small.length; i++) {
        if (small[i].innerText === "") {
            var sRate = 0 + i;
            sendData(sRate, counter);
        }
    }
}

const validateEmail = (emailVal) => {
    var atSymbol = emailVal.indexOf('@');
    var atDot = emailVal.lastIndexOf('.');
    const emailPattern = /[A-za-z0-9_]{3,14}@[A-za-z]{3,}[.]{1}[a-zA-z.]{2,6}$/;
    if (atSymbol <= 1) return false;
    if (atDot <= atSymbol + 3) return false;
    if (atDot === emailVal.length - 1) return false;
    if (!emailPattern.test(emailVal)) return false;
    return true;
}

const validatePassword = (passwordVal) => {
    var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!#$%^&*_^]).{8,}$/;
    if (!passwordPattern.test(passwordVal)) return false;
    return true;
}

const SignUptFormInputs = () => {
    const usernameVal = username.value.trim();
    const emailVal = email.value.trim();
    const passwordVal = password.value.trim();
    const cpasswordVal = cpassword.value.trim();

    if (usernameVal === "") {
        setErrorMsg(username, 'Username cannot be blank!');
    } else if (usernameVal.length <= 2) {
        setErrorMsg(username, 'Username cannot be less than 3 characters!');
    } else {
        setSuccessMsg(username);
    }

    if (emailVal === "") {
        setErrorMsg(email, 'Email cannot be blank!');
    } else if (!validateEmail(emailVal)) {
        setErrorMsg(email, 'Please provide an valid email address!');
    } else {
        setSuccessMsg(email);
    }

    if (passwordVal === "") {
        setErrorMsg(password, 'Password cannot be blank!');
    } else if (!validatePassword(passwordVal)) {
        setErrorMsg(password, 'Password must have one Uppercase, Lowercase and Special Characters!');
    } else if (passwordVal.length <= 7) {
        setErrorMsg(password, 'Please must be greater than 8 characters!');
    } else {
        setSuccessMsg(password);
    }

    if (cpasswordVal === "") {
        setErrorMsg(cpassword, 'Password cannot be blank!');
    } else if (!(cpasswordVal === passwordVal)) {
        setErrorMsg(cpassword, 'Password must be match!');
    } else {
        setSuccessMsg(cpassword);
    }
    if (usernameVal && passwordVal && (cpasswordVal === passwordVal) && validatePassword(passwordVal) && validateEmail(emailVal) && (usernameVal.length > 2)) {
        successValidation();
    }
}

const LogInFormInputs = () => {
    const emailVal = loemail.value.trim();
    const passwordVal = lopassword.value.trim();

    if (emailVal === "") {
        setErrorMsg(loemail, 'Email cannot be blank!');
    } else if (!validateEmail(emailVal)) {
        setErrorMsg(loemail, 'Please provide an valid email address!');
    } else {
        setSuccessMsg(loemail);
    }

    if (passwordVal === "") {
        setErrorMsg(lopassword, 'Password cannot be blank!');
    } else if (!validatePassword(passwordVal)) {
        setErrorMsg(lopassword, 'Password must have one Uppercase, Lowercase and Special Characters!');
    } else if (passwordVal.length <= 7) {
        setErrorMsg(lopassword, 'Please must be greater than 8 characters!');
    } else {
        setSuccessMsg(lopassword);
    }
    if(passwordVal && emailVal && validateEmail(emailVal) && (passwordVal.length > 7) && validatePassword(passwordVal)){
        successValidation();
    }
}
function setErrorMsg(input, erromsgs) {
    const formGroup = input.parentElement;
    const small = formGroup.querySelector('small');
    small.innerText = erromsgs;
}

function setSuccessMsg(input) {
    const formGroup = input.parentElement;
    const small = formGroup.querySelector('small');
    small.innerText = "";
}
