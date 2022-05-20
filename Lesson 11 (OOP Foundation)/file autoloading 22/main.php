<?php

// function __autoload($name){
//     if(!class_exists($name)){
//         include "{$name}.php";
//     }
// }

function autoload ($name) {
    if(strpos($name, "Planet_") !== false){
        // $fileDirec = explode("_", $name);
        // include strtolower("$fileDirec[0]/$fileDirec[1].php");
        $fileName = str_replace("Planet_","", $name);
        include strtolower("planets/{$fileName}.php");
    }else{
       include strtolower("{$name}.php");
    }
}

spl_autoload_register('autoload');


(new SpaceShip)->launch();
echo "\n";
(new Bike)->getType();
echo "\n";
(new Planet_Mars)->getName();