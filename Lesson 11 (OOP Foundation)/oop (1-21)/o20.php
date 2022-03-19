<?php

class MotoCycle{
    private $parameters;
    function __construct($speed, $capacity, $mileage){
        $this->parameters = [];
        $this->parameters['speed'] = $speed;
        $this->parameters['capacity'] = $capacity;
        $this->parameters['mileage'] = $mileage;
    }

    function __isset($name){
        if(!isset($this->parameters[$name])){
            echo "$name Not Found";
            return false;
        }
        return true;
    }

    function __unset($name){
        print_r($this->parameters);
        unset($this->parameters[$name]);
        print_r($this->parameters);
    }


    function __get($name){
        return $this->parameters[$name];
    }
    
    function __set($name, $value){
        $this->paramenters[$name] = $value;
    }
}

$yamaha = new MotoCycle('150cc', '16L', '40kmph');
// $yamaha->speed = "350";


// Go To __isset Magic method
if(isset($yamaha->tireSize)){
    echo "Found";
}else{
    echo "Not Found";
}

// unset($yamaha->speed);
