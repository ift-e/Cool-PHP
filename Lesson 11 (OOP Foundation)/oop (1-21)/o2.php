<?php

class Human{ // Class
    public $name;
    public $age;

    function __construct($personName, $personAge= "0"){
        // echo "New Human Object Is Created";
        $this->name = $personName;
        $this->age = $personAge;
    }

    function sayHi(){
        echo "Salam Vai\n";
        $this->sayName();
    }

    function sayName(){
        if($this->age){
            echo "My Name is {$this->name}, I am {$this->age} years old.\n";
        }else{
            echo "My Name is {$this->name}, I don't how old I am.\n";
        }
    }
}


$h1 = new Human("ifte");
$h1->sayHi();

$h2 = new Human("Hasin", 46);
$h2->sayHi();