<?php

// RGB hex color coverted the hexadecimal to red green blue
class RGB{
    private $color; //#ff0000
    private $red;
    private $green;
    private $blue;

    function __construct($colorCode = ''){
        $this->color = ltrim($colorCode , '#');
        $this->parseColor();
    }

    function setColor($colorCode){
        return $this->color = ltrim($colorCode, '#');
        $this->parseColor();
    }

    private function parseColor(){
        if ($this->color) {
            list($this->red, $this->green, $this->blue) = sscanf($this->color, '%02x%02x%02x');
        } else {
            list($this->red, $this->green, $this->blue) = array(0, 0, 0);
        }
    }

    function getColor(){
        return $this->color;
    }

    function getRGBColor(){
        return array($this->red, $this->green, $this->blue);
    }

    function readRGBColor(){
        echo "Red = {$this->red}\nGreen = {$this->green}\nBlue = {$this->blue}";
    }

    function getRed(){
        return $this->red;
    }

    function getGreen(){
        return $this->green;
    }

    function getBlue(){
        return $this->blue;
    }

}

$myColor = new RGB("#ff0588");
$myColor->readRGBColor();
echo "\n". $myColor->getGreen();



