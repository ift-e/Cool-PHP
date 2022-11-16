<?php
require_once "db.php";
require_once "logger.php";

$db = DB::getInstance();
$logger = Logger::getInstance();
$db2 = DB::getInstance();

var_dump($db);
var_dump($db2);
var_dump($logger);
