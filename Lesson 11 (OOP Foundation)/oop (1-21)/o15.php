<?php
class Student{
    private $name;
    private $age;
    private $class;

    function __construct($name="", $age="", $class=""){
        $this->name = $name;
        $this->age = $age;
        $this->class = $class;
    }
    function __get($property){
        echo $this->$property;
    }
    function __set($property, $value){
        $this->$property = $value;
    }
    /**
    function getName(){
        return $this->name;
    }
    function setName($name){
        return $this->name = $name;
    }
    function getAge(){
        return $this->age;
    }
    function setAge($age){
        return $this->age = $age;
    }
    function getClass(){
        return $this->class;
    }
    function setClass($class){
        return $this->class = $class;
    }
    **/
}

$s = new Student("Ifte", "19", "12");
$s->name="Hasin";
$s->name;