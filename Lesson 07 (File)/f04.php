<?php
$filename = "c:\\xampp\\htdocs\\Hasin PHP\\Lesson 7 (File)\\data\\f3.txt";

file_put_contents($filename, "\nNeptune", FILE_APPEND | LOCK_EX);
file_put_contents($filename, "\nJupiter", FILE_APPEND | LOCK_EX);