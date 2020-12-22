<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        html,body {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <form action="welcome.php" method="POST">
        <table align="center">
            <caption>Login Form</caption>
            <tr>
                <td>User Name</td><td><input type="text" name="uname"></td>
            </tr>
            <tr>
                <td>Password</td><td><input type="password" name="pwd" id=""></td>
            </tr>
            <tr>
                <td></td><td colspan="2"><input type="submit" value="login"></td>
            </tr>
        </table>
    </form>
</body>
</html>