<?php
// It's just code to understand the concept
// ** liskov substitution principle **
abstract class Shape{
    // All shapes of things that will be common will come here
    abstract function calculate_area();
}

class Rectangle extends Shape{
    function setHight(){

    }

    function setWidth(){
        
    }
    function calculate_area(){

    }
}

class Square extends Shape{
    function calculate_area(){
        
    }
}