<?php
$conn = mysqli_connect('localhost','root','','userdata');
function deleteData(){
    global $conn;
    $query = "DELETE FROM login WHERE id = 2";
    $run = mysqli_query($conn, $query);
    if($run){
       echo "Deleted Successfully!";
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
    <?php deleteData(); ?>
</body>
</html>