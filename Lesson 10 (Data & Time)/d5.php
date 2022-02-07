<?php
$d1 = new DateTime('1 may 2022');
$d2 = new DateTime('7 july 2025');

$difference = date_diff($d1, $d2);

echo $difference->format("%y Year %m Months %d Days");