<?php
require_once "vendor/autoload.php";

use Alura\Architecture\Domain\CPF;
use Alura\Architecture\Domain\Mail;
use Alura\Architecture\Domain\Student\Student;


$cpf = new CPF('87335522072');
$mail = new Mail('marcelojeam1@gmail.com');
//$student = new Student();
//$student->addPhone('55', '985774419');
