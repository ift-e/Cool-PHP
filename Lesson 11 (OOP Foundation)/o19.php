<?php

class satellite{
    static function echoName(){
        echo static::getName();
    }

    static function getName(){
        return "satellite";
    }
}


class Earth extends satellite{
    // static function echoName(){
    //     echo "Earth";
    // }

    static function getName(){
        return "Earth";
    }
}


Earth::echoName();