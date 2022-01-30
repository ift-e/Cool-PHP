<?php
$filename = "c:\\xampp\\htdocs\\Hasin PHP\\Lesson 7 (File)\\data\\f2.txt";

$existingData = file_get_contents($filename);
$fp = fopen($filename, 'w');
fwrite($fp, $existingData);
fwrite($fp, "Mercury\n");
fwrite($fp, "Pluto\n");
fwrite($fp, "Earth\n");

fclose($fp);