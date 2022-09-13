# Mailing.
আমরা এখন শিখবো পিএইচপি দিয়ে কিভাবে মেইল কিভাবে সেন্ড করতে হয়। মেইল পাঠানোর বেশ কিছু সিস্টেম আছে, পিএইচপির বিল্ট-ইন একটা পদ্ধতি আছে যেটা কিনা আপনার বর্তমান সিস্টেমের MTA(Mail Transfer 
Agent) তার সাথে কম্মুনিকেশন করে মেইল সেন্ড করতে পারে, অথবা মেইলটা এক্সটার্নাল কোনো SMTP সার্ভার ব্যবহার করে মেইল সেন্ড করতে পারে। তো চলেন পিএইচপির বিল্ট-ইন ফাঙ্কশন আছে সেটা ব্যবহার করে কীভাবে মেইল সেন্ড করতে পারি?

এই মেইল তখনি যাবে যদি আপনার লোকাল সিস্টেমে কোনো MTA ইনস্টল থাকে। যদি Xampp Ampps তাঁদের সাথে MTA দেওয়া থাকে যেমন আমি এখন Xampp এর Sendmail কনফিগার (আপনারা গুগল করলেই কনফিগার কিভাবে করে পেয়ে যাবেন) করে ব্যবহার করছি MAC & Linux অপারেটিং সিস্টেমে বিল্ট-ইন ভাবে MTA দেওয়া থাকে।

```php
// mail(to, subject, message, headers)

$to = "Recipient@gmail.com";
$from = "Sender@gmail.com";
$subject = "Checking PHP mail";
$message = "PHP mail works just fine";
$headers = "From: {$from}";

if(mail($to,$subject,$message,$headers)) {
    echo "The email message was sent.";
} else {
    echo "The email message was not sent.";
}
```
headers প্যারামিটারে আমরা এরে অথবা স্ট্রিংয়ের মাধ্যমে বিভিন্ন ধরনের হেডারস পাস করতে পারি যেমন: From, Cc, Bcc অথবা মেইলটি এইচটিএমএল ফরম্যাটে যাবে নাকি ইত্যাদি।

চলুন ইমেজ সহ এইচটিএমএল ফরম্যাটে মেইল পাঠায়ঃ
```php
$to = "Recipient@gmail.com";
$from = "Sender@gmail.com";
$subject = "Checking PHP mail";
$message = "<b>PHP mail works just fine</b>";
$message .= "<img src='https://i.postimg.cc/rwB6jX6m/baymax.jpg'>";

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset= UTF-8\r\n";
$headers .= "From: {$from}";

if(mail($to,$subject,$message,$headers)) {
    echo "The email message was sent.";
} else {
    echo "The email message was not sent.";
}
```
আমরা যদি Raw PHP দিয়ে অ্যাটাচমেন্ট সহ ইমেইল সেন্ড করতে চাই তাহলে অনেক জামেলা কোড দেখতে চাইলেঃ [ফাইল লিংক](./m2.php "ফাইল লিংক")। রিয়েল লাইফ প্রজেক্ট গুলো তে অ্যাটাচমেন্ট সহ ইমেইল সেন্ড করার জন্য অনেক থার্ড পার্টি লাইব্রেরি/প্যাকেজ আছে, যেমন পিএইচপিতে ইমেইল সেন্ড করা জন্য প্রচলিত লাইব্রেরি/প্যাকেজ হচ্ছে [PHPMailer.](https://github.com/PHPMailer/PHPMailer) চলুন পিএইচপি মেইলারের সাহায্যে অ্যাটাচমেন্ট সহ ইমেইল সেন্ড করি।

আমরা এক সাথে পিএইচপি মেইলারের এক্সটার্নাল SMTP ব্যাবহার করে আমরা ইমেইল সেন্ড করবো। পিএইচপি মেইলার লাইব্রেরি/প্যাকেজটি ইন্সটল করার পর, শুধু src ফোল্ডারের ফাইলগুলো নিয়ে নিলাম--
```php
require_once("phpmailer/PHPMailer.php");
require_once("phpmailer/Exception.php");
require_once("phpmailer/SMTP.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

try{
    // SMTP configure
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;;
    $mail->isSMTP(true);
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth   = true;
    $mail->Username   = 'user@example.com';                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    //Attachments
    $mail->addAttachment('attachments/attachments.pdf', 'new.pdf');    //Add attachments With Optional name

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');     //Add a sender
    $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient

    //Content
    $mail->isHTML(true);             //Set email format to HTML
    $mail->Subject = "Here is the Invoice";
    $mail->Body = "Hi, here is the <strong>invoice</strong> from your last purchase";
    $mail->AltBody = "Here is the invoice from your last purchase";

    $mail->send();
    echo "Mail Sent";
}catch(Exception $e){
    echo "Failed ".$mail->ErrorInfo;
}
```
আপনারা পিএইচপি মেইলার লাইব্রেরীর গিটহাব রিপোসিটোরিতে চোখ ভুলাবেব তাহলে অনেক কিছু বুজে যাবেন আশাকরি।
মেইল নিয়ে যা লিখলাম আশাকরি বুজতে পেড়েছেন।