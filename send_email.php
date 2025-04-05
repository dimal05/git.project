<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // Përfshini PHPMailer

function sendEmail($name, $surname, $email, $phone, $message) {
    $mail = new PHPMailer(true); 

    try {
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;
        $mail->Username = 'Dimalgashi@gmail.com'; 
        $mail->Password = 'mgua dkoy sbqz pnik';  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        
        $mail->setFrom($email, $name);
        $mail->addAddress('Dimalgashi@gmail.com');  
        $mail->addReplyTo($email, $name);

        
        $mail->isHTML(true);
        $mail->Subject = 'Mesazh nga Forma e Kontaktit';
        $mail->Body = "Emri: $name<br>Mbiemri: $surname<br>Email: $email<br>Numri i telefonit: $phone<br>Mesazhi: $message";

        
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Gabim: " . $e->getMessage();  
        return false;
    }
}
?>
