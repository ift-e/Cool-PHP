<?php
// date_default_timezone_set('Asia/Dhaka');
echo mktime(0,0,0,12,12,1980);
echo "\n";
echo strtotime("12 December, 1980");
echo "\n";
echo strtotime("+3days");
echo "\n";
echo (strtotime("+1months") - strtotime("now"))/86400;

