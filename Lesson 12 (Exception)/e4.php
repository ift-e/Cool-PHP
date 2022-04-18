<?php

class myException extends Exception{
    function errorGet(){
        $error = "MyException error is: ".$this->getMessage();
        return $error;
    }
}


function isEven($n){
    try {
        if ($n <= 0) {
            throw new Exception("This is invalid number");
        }
        if ($n%2 != 0 ) {
            throw new myException("This is odd number $n",);
        }
        $div = $n / 2;
        echo "Its even, result is: $div";
    }
    catch (myException $b) {
        echo $b->errorGet();
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
}

isEven(5);
