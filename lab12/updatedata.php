<?php
$conn = mysqli_connect('localhost','root','','userdata');
    if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $query = "UPDATE login SET email = '$email' WHERE id = 1";
    $run = mysqli_query($conn, $query);
    if($run){
       echo "Updated Successfully!";
    } else {
        echo "error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Data</title>
</head>
<body>
    <form action="#" method="POST">
        <table>
        <tr>
            <td>Email</td><td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="submit" value="Update"></td>
        </tr>
        </table>
    </form>
</body>
</html>