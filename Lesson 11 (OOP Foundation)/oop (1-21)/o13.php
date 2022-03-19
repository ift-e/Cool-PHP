<?php

class A{
    protected static $name;
    static function sayHi(){
        echo self::$name = "Ifte ";
        echo "Hello form A\n";
    }
}

class B extends A{
    static function sayHi(){
        parent::$name;
        parent::sayHi();
        echo "Hello form B\n";
    }
}

B::sayHi();