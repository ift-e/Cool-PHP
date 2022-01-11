<?php

$var = "72.52";
$var = filter_var($var, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
if(filter_var($var, FILTER_VALIDATE_FLOAT)){
    echo "$var is valid";
}else{
    echo "$var is not invalid";

}

echo '<br>';

$var2 = "it's the most wonderful time of the year";

$var2 = filter_var($var2, FILTER_SANITIZE_STRING);

echo $var2;