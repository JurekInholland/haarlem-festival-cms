<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService {



    public static function confirmProfileChange($address) {
        $subject = "Your account information has changed.";
        $body = "You have changed the following profile information on the haarlem festival page:";

        self::sendMail($subject, $body, $address);
    }

    public static function distributeTickets(string $address) {
        $subject = "Your Haarlem Festival Tickets";
        $body = "Attached you will find all tickets for the haarlem festival.";

        self::sendMail($subject, $body, $address);

    } 

    public static function sendRegisterMail(string $address) {
        $subject = "Haarlem Festival Registration";
        $body = "To confirm this email, please click this link:...";
        
        self::sendMail($subject, $body, $address);
    }

    public static function sendForgotPasswordMail(string $address) {
        $subject = "Haarlem Festival Password reset";
        $body = "To reset your password, please click this link:...";
        
        self::sendMail($subject, $body, $address);
    }

    
    

    private static function sendMail(string $subject, string $body, string $address) {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username = 'phpcmsjurek@gmail.com';
        $mail->Password = 'dPS9cHFdDyJieXm';
        $mail->SetFrom('phpcmsjurek@gmail.com');
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($address);
        $mail->Send();

    }
}