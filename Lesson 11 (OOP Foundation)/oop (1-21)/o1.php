<?php 
class Human{ // Class
    public $name;
    function sayHi(){
        echo "Salam\n";
        $this->sayName();
    }

    function sayName(){
        echo "My Name is {$this->name}.\n";
    }
}

class Cat{
    function sayHi(){
        echo "Meow\n";
    }
}

class Dog{
    function sayHI(){
        echo "Woof\n";
    }
}

$h1 = new Human; // Object
$h1->name = "Ifte";
$h1->sayHi();

$h2 = new Human; // Object
$h2->name = "Hasin";


