<?php
function Send_Mail($to,$subject,$body)
{
    require 'class.phpmailer.php';
    $from       = "jaspurgaard@gmail.com";
    $mail       = new PHPMailer();
    $mail->IsSMTP(true);            // use SMTP
    $mail->IsHTML(true);
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Host       = "smtp.gmail.com"; // SMTP host
    $mail->Port       =  587;                    // set the SMTP port
    $mail->Username   = "jaspurgaard@gmail.com";  // SMTP  username
    $mail->Password   = "passport1008";  // SMTP password
    $mail->SetFrom($from, 'From Name');
    $mail->AddReplyTo($from,'From Name');
    $mail->Subject    = $subject;
    $mail->MsgHTML($body);
    $address = $to;
    $mail->AddAddress($address, $to);
    $mail->Send();
}
?>