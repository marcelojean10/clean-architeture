<?php

namespace Alura\Architecture\Infra\Indication;

use Alura\Architecture\Domain\Indication\SendMailIndication;
use Alura\Architecture\Domain\Student\Student;

class SendMailIndicationMail implements SendMailIndication
{

    public function sendTo(Student $studentIndicated): void
    {
        try {
            $to = $studentIndicated->email();
            $subject = 'the subject';
            $message = 'hello';
            $headers = 'From: Teste PHP Mail <celo_pdp@hotmail.com>'."\r\n" .
                'Reply-To: celo_pdp@hotmail.com '. "\r\n" .
                'X-Mailer: MyFunction/' . phpversion().
                'MIME-Version: 1.0' . "\n".
                'Content-type: text/html; charset=UTF-8' . "\r\n";


            if (mail($to, $subject, $message, $headers)) {
                echo "Mensagem enviada com sucesso.";
            } else {
                echo "Mensagem NAO enviada com sucesso.";
            };
        } catch (\Exception $exception) {
            throw new \Exception("Error: " . $exception);
        }
    }
}