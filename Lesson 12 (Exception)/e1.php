<?php

class Student{
    function __construct($name, $age){
        $this->name = $name;
        if($age<4){
            throw new Exception("Too Young ", 1001);
        }elseif($age > 35){
            throw new Exception("Too Old", 1002);
        }
        $this->age = $age;
    }
}


try{
    new Student('Rahim', 14);
    echo "It's Nicely Work";
}catch(Exception $e){
    echo  $e->getCode(). ":" . $e->getMessage();
}finally{
    echo "\nIt will always run";
}
