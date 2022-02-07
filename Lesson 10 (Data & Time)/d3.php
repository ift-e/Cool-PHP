<?php
echo time() . "\n";

echo mktime(0,0,0,12,30,2021)."\n"; //24 hour 
date_default_timezone_set('Asia/Dhaka');
echo mktime(0,0,0,12,30,2021)."\n";

echo (22400-800)/(60*60) . "\n";

echo (mktime(0,0,0,1,1,2003) - mktime(0, 0, 0, 2, 8, 2022))/(24*60*60);