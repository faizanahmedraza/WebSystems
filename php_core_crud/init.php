<?php
    spl_autoload_register('AutoladerFunc');
    function AutoladerFunc($classname){
        $path = 'classes/';
        $extension = '.php';
        $filename = $path.$classname.$extension;
        if(!file_exists($filename)){
            return false;
        }
        include_once $filename;
    }
?>