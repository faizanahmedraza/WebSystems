<?php
$conn = mysqli_connect('localhost','root','','userdata');
function showData(){
    global $conn;
    $query = "SELECT * FROM login";
    $run = mysqli_query($conn, $query);
    if($run){
        while($data = mysqli_fetch_assoc($run)){
            echo "<pre>";
            print_r($data);
        }
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
    <title>Document</title>
</head>
<body>
    <?php showData(); ?>
</body>
</html>