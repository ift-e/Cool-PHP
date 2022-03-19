<?php
// ============= Trying __Call() & __callStatic()
class Solar{
    function earth(){
        echo "This is Earth";
    }
    function mars(){
        echo "This is Mars";
    }
    function jupiter(){
        echo "This is Jupiter";
    }
    function neptune(){
        echo "This is Neptune";
    }

    function __call($name, $arguments){
        echo "$name Not Found";
        print_r($arguments);

    }
    static function __callStatic($name, $arguments){
        echo "$name Not Found";
    }
}


$solar = new Solar;
$solar->neptun("meaw", "bilai");

// Solar::Fuck();


