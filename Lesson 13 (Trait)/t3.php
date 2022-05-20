<?php
// Trait static Scope
trait MyTrait{
    static $number;
    abstract function sayHi();
}

class MyClassA{
    use MyTrait;
    function sayHi(){
        echo "hello";
    }
}

class MyClassB{
    use MyTrait;
    function sayHi(){
        echo "hello";
    }
}

MyClassA::$number = 15;
echo MyClassA::$number;
MyClassB::$number = 18;
echo MyClassB::$number;
