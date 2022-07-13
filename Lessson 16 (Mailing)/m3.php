<?php
require_once("phpmailer/PHPMailer.php");
require_once("phpmailer/Exception.php");
require_once("phpmailer/SMTP.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


$pm = new PHPMailer(true);
try{
    $pm->SMTPDebug = SMTP::DEBUG_SERVER;;
    $pm->isSMTP(true);
    $pm->Host = "smtp.gmail.com";
    $pm->SMTPAuth   = true;
    $pm->Username   = 'user@example.com';
    $pm->Password   = 'secret';
    $pm->SMTPSecure = "tls";
    $pm->Port = 587;

    $pm->setFrom("sender@gmail.com");
    $pm->addAddress("recipient@gmail.com");
    $pm->Subject = "Here is the Invoice";
    $pm->Body = "Hi, here is the <strong>invoice</strong> from your last purchase";
    $pm->AltBody = "Here is the invoice from your last purchase";
    $pm->isHTML(true);
    $pm->addAttachment('.\baa-poem.pdf', 'poem.pdf');
    $pm->send();
    echo "Mail Sent";
}catch(Exception $e){
    echo "Failed ".$pm->ErrorInfo;
}