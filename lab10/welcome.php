<?php
$uname = "admin";
$pwd = "admin";
session_start();
if(isset($_SESSION['uname'])){
    echo "<h1>Welcome ".$_SESSION['uname']."</h1>";
    echo "<a href='product.php'>Product</a><br/>";
    echo "<a href='logout.php'><input type='button' value='logout' name='logout'/></a><br/>";
} else {
    if($_POST['uname'] == $uname && $_POST['pwd'] == $pwd){
        $_SESSION['uname'] = $uname;
        echo "<script>location.href='welcome.php'</script>";
    } else {
        echo "<script>location.href='login.php'</script>";
    }
}
?>