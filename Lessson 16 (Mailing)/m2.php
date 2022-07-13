<?php
$filename = 'baa-poem.pdf';
$file = $filename;

$mailto = 'recipient@gmail.com';
$subject = "Here's the poem you are looking for";
$message = 'My message';

$content = file_get_contents($file);
$content = chunk_split(base64_encode($content));

// a random hash will be necessary to send mixed content
$boundary = md5(time());

// carriage return type (RFC)
$eol = "\r\n";

// main header (multipart mandatory)
$headers = "From: john Doe<test@test.com>" . $eol;
$headers .= "MIME-Version: 1.0" . $eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\" " . $eol;
$headers .= "Content-Transfer-Encoding: 7bit" . $eol;
$headers .= "This is a MIME encoded message." . $eol;

// message
$body = "--" . $boundary . $eol;
$body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
$body .= "Content-Transfer-Encoding: 8bit" . $eol;
$body .= $message . $eol;

// attachment
$body .= "--" . $boundary . $eol;
$body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
$body .= "Content-Transfer-Encoding: base64" . $eol;
$body .= "Content-Disposition: attachment" . $eol;
$body .= $content . $eol;
$body .= "--" . $boundary . "--";

//SEND Mail
$mailSent = mail($mailto, $subject, $body, $headers);
if ($mailSent) {
    echo "mail send ... OK"; // or use booleans here
} else {
    echo "mail send ... ERROR!";
    print_r(error_get_last());
}
