<?php
require_once "vendor/autoload.php";

use Alura\Architecture\Domain\CPF;
use Alura\Architecture\Domain\Mail;
use Alura\Architecture\Domain\Student\Student;
use Alura\Architecture\Infra\Persistence\ConnectionFactory;
use Alura\Architecture\Infra\Student\StudentRepositoryPDO;


try {
    $cpf = new CPF('06801749072');
    $mail = new Mail('marcelojeam1@gmail.com');
    $student = Student::withCpfMailAndName($cpf, $mail, 'Marcelo Jean')
        ->addPhone('55', '985774419')
        ->addPhone('55', '988884419');


    $cpf2 = new CPF('56732209019');
    $mail2 = new Mail('teste@uol.com');
    $student2 = Student::withCpfMailAndName($cpf2, $mail2, 'Richard Stepat')
        ->addPhone('52', '985774429')
        ->addPhone('52', '988884439');

    $pdo = ConnectionFactory::createConnection();
    $studentRepository = new StudentRepositoryPDO($pdo);
    $listAllStudents = $studentRepository->findAll();

    print_r($listAllStudents);
} catch (\PDOException $error) {
    echo $error->getMessage();
}