<?php

abstract class Shape{
    abstract function getArea();
    function getPerimeter(){}
}

class Rectangle extends Shape{
    private $base, $height;

    function __construct($base, $height){
        $this->base = $base;
        $this->height = $height;
    }

    public function setBase($base){
        $this->base = $base;
    }

    public function setHeight($height){
        $this->height = $height;
    }

    function getArea(){
        return $this->base*$this->height;
    }
}

class Triangle extends Shape{
     function getArea(){
        
    }
}

$rectangle = new Rectangle(5, 10);
echo $rectangle->getArea();