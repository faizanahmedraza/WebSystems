<?php
session_start();
//Autolod implementation mean require every class if necessary in specified file(if we calling this object)
//it takes 1st param is callback function
spl_autoload_register(function($class_name){
    include "classes/$class_name.php";
});
$source = new Source;
?>