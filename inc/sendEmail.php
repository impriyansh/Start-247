<?php
require 'PHPMailerAutoload.php';


$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com;smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'techstart247@gmail.com';                 // SMTP username
$mail->Password = 'youremailpassword';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($_POST['contactEmail'], $_POST['contactName']);
$mail->addAddress('techstart247@gmail.com', $_POST['contactSubject']);   // receiver details

$mail->addAttachment('');         // Add attachments
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Contact Us User';
$mail->Body    = 'The user contacted is '.$_POST['contactName'].' and the message is '.$_POST['contactMessage'];
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo "Something went wrong. Please try again.";
} else {
	echo "OK";
}
?>