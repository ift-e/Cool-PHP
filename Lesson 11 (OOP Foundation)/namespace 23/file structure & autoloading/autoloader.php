<?php
spl_autoload_register(function($fileName){
    $path = strtolower(str_replace("CloudStorage\\", "", $fileName)).".php";
    $path = str_replace("\\", "/", $path);

    include "$path";
});
