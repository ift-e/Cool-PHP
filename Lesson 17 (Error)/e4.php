<?php
echo ini_get('error_log');

/*
$headers = "Content-Type: text/html; charset=ISO-8859-1";
error_log("This is and error message",1,"name@gmail.com", $headers);
*/
// error_log("{$date} log in a new file\n");
$date = date("Y:m:d g:i");
error_log("{$date} log in a new file\n", 3, 'C:\Users\Ifte\Desktop\php_errors\error.txt');