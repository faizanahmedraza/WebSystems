<?php
if(isset($_POST["singForm"])){
    $songName = $_POST["sname"];
    $compName = $_POST["cname"];
    $art = $_POST["artist"];
    echo "You Choose ".$songName." song.<br>";
    echo "Your composer name is ".$compName.".<br>";
    echo "Your Performance Groups:";
    echo "<ul>";
    for($i = 0; $i < count($art); $i++){
        echo "<li>$art[$i]</li>";
    }
    echo "</ul>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song List</title>
    <style>
        html,
        body {
            width: 50%;
            margin: 0 auto;
            padding: 0;
            height: 100%;
        }
        h2{
            text-align: center;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <h2>FORM</h2>
        <label for="username">Song Name: </label>
        <input type="text" name="sname" id="sname"><br><br>
        <label for="username">Composer Name: </label>
        <input type="text" name="cname" id="cname">
        <br><br>
        <b>Select Performance Group</b>
        <p>
            <input type="checkbox" name="artist[]" value="Tabala Man" /> Tabala Man
            <input type="checkbox" name="artist[]" value="Guitar Man" /> Guitar Man</br>
            <input type="checkbox" name="artist[]" value="Drum Man" /> Drum Man
            <input type="checkbox" name="artist[]" value="Supporting singers" /> Supporting singers</br>
        </p>
        <input type="submit" name="singForm" value="Submit">
        <input type="reset" value="Reset Form">
    </form>
</body>

</html>