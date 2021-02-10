<?php
    spl_autoload_register('autoLoadFunc');
    function autoLoadFunc($classname){
        $path = 'controller/';
        $extension = '.class.php';
        $filename = $path.$classname.$extension;
        if(!file_exists($filename)){
            return "File not Exist!";
        }
        include_once $filename;
    }
?>