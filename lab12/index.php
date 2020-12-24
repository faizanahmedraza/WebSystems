<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insert.php" method="POST">
    <table align="center" style="margin-top:200px;">
        <tr>
            <td>Name</td><td><input type="text" name="username" required></td>
        </tr>
        <tr>
            <td>Email</td><td><input type="email" name="email" required></td>
        </tr>
        <tr>
            <td>Password</td><td><input type="password" name="password" required></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Submit" name="submit"></td>
        </tr>
    </table>
    </form>
</body>
</html>