<?php
// It's just code to understand the concept: single responsibility principle

// wrong way
class Mailer
{
    function sendMail($to, $from, $subject, $message, $attachment)
    {
    }

    function conectMTA($mtaType, $userName, $password)
    {
    }
    function prepareMail($to, $form, $subject, $message)
    {
    }
    function disPatch()
    {
    }
}


class BatterMailer
{
    function __construct(MailGetwayInterface $mg, MailInterface $mail, AttachmentInterface $attachment)
    {
        // pass object dependency injection
        $this->mg = $mg;
        $this->mail = $mail;
        $this->attachment = $attachment;
    }

    function sendMail($to, $from, $subject, $message, $attachment)
    {
        $this->mail->addAttachment($attachment);
        $mailBody = $this->mail->prepare($to, $from, $subject, $message);
        $this->mg->connect();
        $this->mg->send($mailBody);
    }
}

