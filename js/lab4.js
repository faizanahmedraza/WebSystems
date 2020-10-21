// Lab4 Exercise 1
function Task1() {
    let getInput = document.getElementById("name").value;
    if (getInput > 0) {
        alert('You Entered Number is Positive: ' + getInput);
    } else {
        alert('You Entered Number is Negative: ' + getInput);
    }
}

function Task2() {
    let getInput = prompt("Enter a number to get Odd numbers before that Number:");
    if (getInput > 0) {
        var result = "";
        for (var i = 1; i < getInput; i = i + 2) {
            result += i + " , ";
        }
        document.getElementById("odd-task2").innerHTML = result;
    } else {
        alert('You Entered Number is Negative: ' + getInput);
    }
}

function Task3() {
    let getInput = prompt("Enter a number Which you want to Calculate Factorial?");
    if (getInput > 0) {
        var i = 0; var result = getInput;
        for (i = 1; i < getInput; i++) {
            result = i * result;
        }
        alert("The Factorial of " + getInput + " is " + result);
    } else {
        alert('You Entered Number is Negative: ' + getInput);
    }
}

function Task4() {
    let getInput = prompt("Enter the Number to Generate Odd/Even Sequence");
    if (getInput % 2 == 0 && getInput != "" && getInput != null) {
        var conf = confirm("Are you Sure! You want to Proceed with Even " + getInput + " !!");
        if (conf == true) {
            var result = "";
            var div = document.getElementById("even-task4");
            div.insertAdjacentHTML('beforeBegin', '<h3 style="margin-right:10px;">Even numbers are: </h3>');
            for (var i = 0; i < getInput; i = i + 2) {
                result += i + " , ";
            }
            document.getElementById("even-task4").textContent = result;
        } else {
            location.reload();
        }

    } else {
        if (getInput != "" && getInput != null) {
            var conf = confirm("Are you Sure! You want to Proceed with Odd " + getInput + " !!");
        }
        if (conf == true) {
            var result = "";
            var text = document.createTextNode("Odd Elements are: ");
            var x = document.getElementById("even-task4");
            var h3 = document.createElement("h3");
            h3.style.marginRight = "10px";
            h3.setAttribute("id", "heading");
            h3.append(text);
            x.parentNode.insertBefore(h3, x);
            for (var i = 1; i < getInput; i = i + 2) {
                result += i + " , ";
            }
            document.getElementById("even-task4").innerHTML = result;
        } else {
            location.reload();
        }
    }
}
// Lab 4 Exercise 2
function Faren() {
    var ctemp = prompt("Enter Temperature!");
    if (ctemp != null && ctemp != "") {
        var cToFahr = ctemp * 5 / 9 + 32;
        alert(`${ctemp}\xB0C is ${cToFahr} \xB0F.`);
    }
}

function Celcius() {
    var ftemp = prompt("Enter Temperature!");
    if (ftemp != null && ftemp != "") {
        var fToCel = (ftemp - 32) * 5 / 9;
        alert(`${ftemp}\xB0F is ${fToCel}\xB0C.`)
    }
}
// Lab4 Exercise 3
function BMI() {
    var weight = prompt("Enter Your Weight in(lbs)!");
    var height = prompt("Enter Your Height in(in)!");
    if (weight != null && height != null) {
        var bmi = (weight * 703) / (height ** 2);
        if (bmi < 18.5) {
            alert("You are UnderWeight!!<br>");
        } else if (bmi >= 18.5 && bmi <= 24.9) {
            alert("You are Normal");
        } else if (bmi >= 25.0 && bmi <= 29.9) {
            alert("You are OverWeight");
        } else {
            alert("You are Obese");
        }
    }
}
// Lab4 Exercise 4
function Pyramid() {
    var totalNumberofRows = prompt("Enter Number of rows!");
    for (var i = 1; i <= totalNumberofRows; i++) {
        for (var j = 1; j <= i; j++) {
            document.write("*");
        }
        document.write("<br />");
    }
}
