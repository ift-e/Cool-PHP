<?php

class MyException extends Exception{}
class NetwrokException extends Exception{}

function testExceptions(){
    throw new NetwrokException();
}

try{
    testExceptions();
}catch (MyException $e) {
    echo "MyException Caught";
}catch(NetwrokException $e){
    echo "NetwrokException Caught";
}catch (Exception $e) {
    echo "Exception Caught";
}