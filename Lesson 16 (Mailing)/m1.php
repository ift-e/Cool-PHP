<?php
// $to = "Recipient@gmail.com";
// $from = "john Doe <yourmail@gmail.com>";
$subject = "testing mail send";

$message = "<strong>Hello!</strong>\nখবর কি?<br/>";
$message .= "<img src='https://i.postimg.cc/rwB6jX6m/baymax.jpg' title='baymax'>";

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset= UTF-8\r\n";
$headers .= "From: {$from}";

echo mail($to, $subject, $message, $headers);