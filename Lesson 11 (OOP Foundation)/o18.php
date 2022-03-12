<?php

class Color{
    public $color;
    function __construct($color)
    {
        $this->color = $color;
    }
    function setColor($color)
    {
        $this->color = $color;
    }

    function __toString(){
        return "This color is {$this->color}.\n";
    }

}

$c = new Color("Red");
echo $c ;

// ============= Comparing Object

class Planet{
    public $name;

    function __construct($name){
        $this->name = $name;
    }
}

$e = new Planet("Earth");
$f = $e; /* reference */
// $f = new Planet("Earth");
$m = new Planet("Pluto");

if ($e === $m) {
    echo "Similar Planets";
}else{
    echo "Not Similar Planets";
}







