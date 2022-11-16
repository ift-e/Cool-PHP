<?php
// Singleton Pattern

class SomeClass
{
    static $instance;
    private $name;
    function __construct($name=null)
    {
        $this->name = $name;
        echo "New Instance Created\n";
    }

    static function getInstance($name=null)
    {
        if (!self::$instance) {
            self::$instance = new SomeClass($name);
        } else {
            echo "Old Instance Supplied\n";
        }

        return self::$instance;
    }

    function SayName(){
        echo $this->name."\n";
    }
}

$st1 = Someclass::getInstance("Rahim");
$st2 = Someclass::getInstance("korim");
$st1->SayName();
$st2->SayName();
