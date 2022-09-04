<?php
$filename = "c:\\xampp\\htdocs\\Hasin PHP\\Lesson 7 (File)\\data\\f1.txt";
// echo getcwd();
$fp = fopen($filename, 'r+');

while ($line = fgets($fp)) {
    echo $line;
}
// rewind($fp);
fseek($fp, 8);
echo "\n";
echo "\n";
while ($line = fgets($fp, 4)) {
    echo $line;
}

fclose($fp);

$data = file($filename);
print_r($data);

echo file_get_contents($filename);