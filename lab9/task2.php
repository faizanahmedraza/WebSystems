<?php
function Pattern($val)
{
    for($i = 0; $i < $val; $i++){
        for($j = 0; $j < $i; $j++){
            echo "*";
        }
        echo "<br/>";
    }
}
echo "<h2>Task2</h2><br/>";
Pattern(10);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task2</title>
    <style>
    html,body {
        font-size: 24px;
        text-align: center;
        height: 100vh;
    }
    </style>
</head>
<body>
    
</body>
</html>