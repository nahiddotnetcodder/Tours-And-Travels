<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $subject = $_POST['subject'];
    $address = $_POST['address'];

    // Load Composer's autoloader
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'nahid.rover25@gmail.com';                   
        $mail->Password   = 'ybmvnkrecnhytgea';                               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    

        // Recipients
        $mail->setFrom($email, 'Bishal Tours & Travels');
        $mail->addAddress('nahid.rover25@gmail.com', 'Website');  

        // Content
        $mail->isHTML(true);                                 
        $mail->Subject = $name; 
        $mail->Body    = "Name: $name <br> Email: $email <br> Mobile: $mobile <br> Company: $subject <br> Address: $address";

        $mail->send();
        echo "<div class='success'>Message has been sent</div>";
    } catch (Exception $e) {
        echo "<div class='alert'>Message could not be sent. Mailer Error</div>";
    }
}
