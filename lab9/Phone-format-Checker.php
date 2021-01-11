<?php
if (isset($_POST["pForm"])) {
    $n = $_POST["name"];
    $pn = $_POST["pno"];
    $phonePattern = "/([0-9]{3})-([0-9]{3})-([0-9]{4})$/";
    if (preg_match($phonePattern, $pn)) {
        print "<h1>Hi! $n. </h1><br>";
        print "<h3>Your</h3>";
        print "<h2>Phone Number is correct!</h2><br>";
    } else {
        print "<h2>phone number enter is incorrect</h2>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Format Checker</title>
    <style>
        html,
        body {
            width: 50%;
            margin: 0 auto;
            padding: 0;
            height: 100%;
        }

        h1,h2,h3 {
            text-align: center;
            margin: 0;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <h2>FORM</h2>
        <label for="username">Your Name: </label>
        <input type="text" name="name" id="name"><br><br>
        <label for="pno">Phone Number: </label>
        <input type="text" name="pno" id="pno" placeholder="ddd-ddd-dddd"><br><br>
        <input type="submit" name="pForm" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>

</html>