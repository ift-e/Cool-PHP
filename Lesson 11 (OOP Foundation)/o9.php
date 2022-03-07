<?php

abstract class OwnClass{
    function SayHi(){
        echo "Hi";
    }

    abstract protected function eat($m, $n=2);
}

class MyClass extends OwnClass{
    function eat($x, $y=1){
        echo "I am eating";
    }
}

$m = new MyClass;
$m->eat(1);