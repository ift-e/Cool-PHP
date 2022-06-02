<?php
// pathinfo()

const FILENAME = "c:/xampp/htdocs/Hasin PHP/Lesson 4 (Html Webpage)/form1.php";

$path = pathinfo(FILENAME);
print_r($path);
die();

echo pathinfo(FILENAME, PATHINFO_BASENAME) . "\n";
echo pathinfo(FILENAME, PATHINFO_FILENAME) . "\n";
echo pathinfo(FILENAME, PATHINFO_EXTENSION) . "\n";
echo pathinfo(FILENAME, PATHINFO_DIRNAME) . "\n";
echo pathinfo(pathinfo(FILENAME, PATHINFO_DIRNAME), PATHINFO_BASENAME) . "\n";