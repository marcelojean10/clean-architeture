<?php


namespace Alura\Architecture\Infra\Indication;


use Alura\Architecture\Domain\Indication\SendMailIndication;
use Alura\Architecture\Domain\Student\Student;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SendMailIndicationPHPMailer implements SendMailIndication
{

    public function sendTo(Student $studentIndicated): void
    {
        try {
            $mail = new PHPMailer(true);
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.live.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'celo_pdp@hotmail.com';                     // SMTP username
            $mail->Password   = '';                               // SMTP password
            $mail->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->SMTPOptions = [
                'ssl' => [
                    'crypto_method' => 65
                ]
            ];

            //Recipients
            $mail->setFrom('celo_pdp@hotmail.com', 'Marcelo Jean - ');
            $mail->addAddress('marcelojeam1@gmail.com', 'Marcelo Jean');     // Add a recipient
            $mail->addAddress('celo_pdp@hotmail.com', 'Marcelo Jean');     // Add a recipient


            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Aqui vai o assunto';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $exception) {
            throw new \Exception("Error: " . $exception);
        }
    }
}