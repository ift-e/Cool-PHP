<?php
// Techniques for catching fatal error
ini_set('display_errors',0);
ini_set('memory_limit','1M');
register_shutdown_function('fatal_error_handler');

function fatal_error_handler(){
    $error = error_get_last();
    if($error){
        echo "Fatal Error";
    }
    // Another Way
    // if ($error['type'] === E_ERROR) {
    //     echo "Fatal Error";
    // }
}

// no_function();
echo str_repeat('*', 2**25);
// echo $ifte;
// function recursion(){
//     recursion();
// }