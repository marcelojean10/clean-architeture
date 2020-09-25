<?php
require_once "vendor/autoload.php";

use Alura\Architecture\CPF;
use Alura\Architecture\Mail;
use Alura\Architecture\Student;


$cpf = new CPF('87335522072');
$mail = new Mail('marcelojeam1@gmail.com');
$student = new Student();

print_r($mail);