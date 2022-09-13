<?php

class MyException extends Exception{
    function myMessage(){
        echo "MyException Caught ";
    }
}
class YourException extends Exception{}

function testExceptions(){
    throw new MyException();
}

try{
    testExceptions();
}catch (MyException $e) {
    $e->myMessage();
}catch(YourException $e){
    echo "NetwrokException Caught";
}catch (Exception $e) {
    echo "Exception Caught";
}