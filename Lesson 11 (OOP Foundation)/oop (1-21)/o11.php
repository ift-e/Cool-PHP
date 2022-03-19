<?php

interface BaseAnimal{
    function isAlive();
    function canEat($param1, $param2);
    function breed();
}

class Animal implements BaseAnimal{
    function isAlive(){

    }
    function canEat($param1, $param2){

    }
    function breed(){
        echo "Hello World ";
    }
}

interface BaseHuman extends BaseAnimal{
    function canTalk();
}

class Human1 implements BaseHuman{
    function isAlive(){

    }

    function canEat($param1, $param2){

    }

    function breed(){

    }

    function canTalk(){
        
    }
}

$h = new Human1();
echo $h instanceof BaseAnimal;

abstract class AbstractHuman implements BaseHuman{
    abstract public function run();
    function eat(){
        echo "I am Eating";
    }
}

class Human2 extends AbstractHuman{
    function isAlive(){

    }

    function canEat($param1, $param2){

    }

    function breed(){

    }

    function canTalk(){
        
    }
    function run(){

    }
}


$h = new Human2();
echo "\n";
echo $h instanceof BaseHuman;