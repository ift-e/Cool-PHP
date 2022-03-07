<?php
class MathCalculator{
    private $number;
    static $name;
    static function fibonacci($n){
        echo self::$name;
        echo "Fibonacci Seris up to {$n}\n";
        self::doSomething();
    }

    static function doSomething(){
        echo "Doing Something\n";
    }

    function factorial($n){
        $this::$name = "ABCD ";
        $this->doSomething();
        echo "Calculating Factorial of {$n}\n";
    }
}

$m = new MathCalculator;
$m->factorial(2);

MathCalculator::fibonacci(8);