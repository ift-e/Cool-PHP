<?php
// Search String
$string = "Laravel is a web application framework with expressive, elegant syntax.";
$offset = stripos($string, 'framework'); // strripos()
if($offset !== false){
    echo "$offset position word is found";
}else{
    echo "$offset position word is not found";
}

// Search and replace string
$string1 = "The quick brown fox jumps over the lazy dog";
$replaceS = str_replace(array('brown','dog'), array('red', 'chicken'), $string1, $count);
echo "\n$replaceS";