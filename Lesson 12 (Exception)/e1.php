<?php

class Student
{
    public $name, $age;
    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
        if ($age < 4) {
            throw new Exception("Too Young ", 1001);
        } elseif ($age > 35) {
            throw new Exception("Too Old", 1002);
        }
    }
}


try {
    new Student('Rahim', 2);
    echo "It's Nicely Work";
} catch (Exception $e) {
    echo  $e->getCode() . ":" . $e->getMessage();
} finally {
    echo "\nIt will always run";
}
