<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}


if(!isset($_SESSION['83x86'])) {
    echo '
        <style>
            .content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 400px;
                height: 200px;
                border-radius: 10px;
                background-color: white;
            }
            
            .content {
                animation: slide-in 1.5s ease-in-out;
            }
            
            @keyframes slide-in {
                0% {
                top: -100%;
                }
            
                100% {
                top: 50%;
                }
            }
            #popup {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.6);
                z-index: 1000;
            }
            
            .content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 400px;
                height: 200px;
                border-radius: 10px;
                background-color: white;
                text-align: center;
            }
        
            #popup .content span {
                font-size: 40px;
                line-height: 75px;
                font-weight: 700;
                color: rgb(44, 69, 7);
            }
            
            h2 {
                font-size: 24px;
                text-align: center;
            }
            
            p {
                font-size: 16px;
                text-align: center;
            }
            
            .close {
                position: absolute;
                top: 10px;
                right: 10px;
                width: 30px;
                height: 30px;
                line-height: 30px;
                border-radius: 50%;
                background-color: red;
                cursor: pointer;
                text-decoration: none;
                color: white;
                font-weight: 600;
            }
            
            .close:hover {
                background-color: #000000;
                color: white;
            }                
        </style>
        <div id="popup">
            <div class="content">
            <h2>Green-M Thông Báo!</h2>
            <p>Bạn không có quyền truy cập trang này!.</p>
            <span>- Error -</span>
            <a href="../public/index.php" class="close">X</a>
            </div>
        </div>
    ';
}

class Mailer {
    public function sendMail($title, $content, $addressMail) {

    //Create an instance; passing `true` enables exce ptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                    //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->CharSet = 'utf-8';
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'hotro.greenm@gmail.com';                     //SMTP username
        $mail->Password   = 'xumxqbxwtokwzwnv';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('hotro.greenm@gmail.com', 'GreenM');
        $mail->addAddress($addressMail);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $title;
        $mail->Body    = $content;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
            
    }
}