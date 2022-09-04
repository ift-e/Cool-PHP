<?php
$filename = "c:\\xampp\\htdocs\\Hasin PHP\\Lesson 7 (File)\\data\\f3.txt";
// Mode w+ a+ r+
$fp = fopen($filename,"w+");
fwrite($fp, "Meaw\n");
fwrite($fp, "Woof\n");

rewind($fp);
echo fgets($fp);
echo fgets($fp);

fclose($fp);