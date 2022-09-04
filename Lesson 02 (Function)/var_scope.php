<?php
$name = "Ifte";
$lname = "badhon";

function use_global(){
    // $i = 2; //Local Scope
    // global $i; // You can use it outside of the function
    echo $GLOBALS['lname'];
}

use_global();


function use_static(){
    static $i;
    $i = $i ?? 0;
    // $i++;
    echo "\n$i";
}
use_static();
use_static();
use_static();
use_static();