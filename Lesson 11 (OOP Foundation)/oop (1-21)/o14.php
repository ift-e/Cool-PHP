<?php

define('J', 50);
const P = 20 ;

class MyClass{
    const Me = 'Ifte';
    function sayHi(){
        echo "\nHi Form ". self::Me;
    }
}

$m = new MyClass;
echo $m::Me;
echo $m->sayHi();