<?php
class ServerLoadException extends Exception{}
class NetworkException extends Exception{}
class DiskFullException extends Exception{}



interface NetwrokStorage{
    function connect();
    function getName();
    function report($data);
}

class MySQLServer implements NetwrokStorage{
    function connect(){
        throw new DiskFullException;
    }

    function getName(){
        return "MySQL";
    }

    function report($data){

    }
}

class PostgreSQLServer implements NetwrokStorage{
    function connect(){
        // return $this;
        throw new ServerLoadException;
    }

    function getName(){
        return "PostgreSQL";
    }

    function report($data){

    }
}

class MSSQLServer implements NetwrokStorage{
    function connect(){
        // throw new NetworkException;
        return $this;
    }

    function getName(){
        return "MSSQL";
    }

    function report($data){
        
    }
}


class ConnectionPool{
    private $storage;
    private $connection;

    function __construct(){
        $this->storage = array();
    }

    function addStorage(NetwrokStorage $storage){
        array_push($this->storage, $storage);
    }

    function getConnection(){
        foreach ($this->storage as $storage) {
            try{
                $this->connection = $storage->connect();
            }
            catch(ServerLoadException $e){
                echo $storage->getName()." is facing huge load.\n";
                $storage->report(array('ip'=>'123.11', 'error'=>'load'));
            }
            catch (NetworkException $e) {
                echo $storage->getName() . " is have some problem with it's network.\n";
                $storage->report(array('ip' => '123.12', 'error' => 'network'));
            }
            catch (DiskFullException $e) {
                echo $storage->getName() . " has it's disk full.\n";
            }

            if($this->connection){
                break;
            }
        }

        if($this->connection){
            return $this->connection;
        }
        return false;
    }
}

$mysql = new MySQLServer;
$pgsql = new PostgreSQLServer;
$mssql = new MSSQLServer;

$cp = new ConnectionPool;
$cp -> addStorage($mysql);
$cp -> addStorage($pgsql);
$cp -> addStorage($mssql);

$connetion = $cp->getConnection();
print_r($connetion);
