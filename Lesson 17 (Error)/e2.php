<?php
set_error_handler('custom_error_handler');
function custom_error_handler($severity, $msg, $file, $line)
{
    switch($severity){
        case E_WARNING:
            echo "Error warning [{$severity}]: {$msg} in {$file} on line number {$line}\n";
        break;
        case E_NOTICE:
            echo "Error notice [{$severity}]: {$msg} in {$file} on line number {$line}\n";
        break;
        default:
            echo "Error [{$severity}]: {$msg} in {$file} on line number {$line}\n";
    }
}
// substr([1234], 3);
echo $book;
function division($divident, $divisor){
    if(0 == $divisor){
        trigger_error("Cannot divide by 0");
    }else{
        echo $divident/$divisor;
    }
}

division(8, 0);


