<?php

class Animal{
    protected $name;
    function __construct($name){
        $this->name = $name;
    }
    public function eat(){
        echo "{$this->name} am eating\n";
    }

    public function run(){
        echo "{$this->name} am running\n";
    }

    public function sleep(){
        echo "{$this->name} am sleeping\n";
    }

    public function greet(){} // Over Ride

    protected function title($title){
        $this->name = $title." ".$this->name;
    }
}
// ===========================================================

class Person extends Animal{
    public function greet(){
        $this->title("MD.");
        echo "{$this->name} Says Hi\n";
    }
}

class Cat extends Animal{
    public function greet(){
        echo "{$this->name} Says Meaw\n";
    }
}

$ifte = new Person("Ifte");
$ifte->eat();
$ifte->greet();

$ifte = new Cat("Tom");
$ifte->greet();

