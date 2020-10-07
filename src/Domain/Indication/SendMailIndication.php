<?php
namespace Alura\Architecture\Domain\Indication;

use Alura\Architecture\Domain\Student\Student;

interface SendMailIndication
{
    public function sendTo(Student $studentIndicated): void;

}