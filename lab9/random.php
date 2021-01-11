<?php
mt_srand((float)microtime() * 1000000);
$no = mt_rand(0, 4);
define("greetings", ["Good Morning", "Good Afternoon", "Good Evening", "Good Night", "GoodBye"], true);
$msg = greetings[$no];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="refersh" content="1">
    </head>
<body>
    <div style="text-align: center;">
        <h3>Welcome to Greetings Page</h3>
        <?php echo "$msg"; ?>
    </div>
</body>

</html>