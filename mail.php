<?php

require_once './PHPMailer-master/src/PHPMailer.php';
require_once './PHPMailer-master/src/Exception.php';
require_once './PHPMailer-master/src/SMTP.php';
require_once './PHPMailer-master/src/OAuth.php';
require_once './PHPMailer-master/src/POP3.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_mail($email, $name, $title, $content) {
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(false);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->SMTPDebug = 0;
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'buianhtailtt@gmail.com';                     //SMTP username
        $mail->Password   = 'buianhtailtt@gmail';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";                           
        //Set TCP port to connect to
        $mail->Port = 587;                                          //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->CharSet = 'UTF-8';

        //Recipients
        $mail->setFrom('buianhtailtt@gmail.com', 'Galaxy_Shop');
        $mail->addAddress($email, $name);     //Add a recipient


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $title;
        $mail->Body    = $content;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

//Test
// $email = 'buianhtai2017tq@gmail.com';
// $name = 'Anh Tài';
// $title = 'Đăng kí thành công';
// $content = 'Chúc mừng bạn đã đăng kí thành công nhận giải IP 13 nhấn vào link sau <br> <a href="https://www.google.com">link nhận giải</a>';
// send_mail($email, $name, $title, $content);
