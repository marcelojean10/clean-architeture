<?php


namespace Alura\Architecture\Domain\Student;


use Alura\Architecture\Domain\CPF;
use Throwable;

class StudentNotFound extends \DomainException
{
    public function __construct(CPF $cpf)
    {
        parent::__construct("Aluno com CPF $cpf não encontrado.");
    }
}