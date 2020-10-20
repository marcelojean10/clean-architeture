<?php

namespace Alura\Architecture\Domain\Student;

use Alura\Architecture\Domain\CPF;
use Alura\Architecture\Domain\Mail;

class Student
{
    private string $name;
    private CPF $cpf;
    private Mail $email;
    private array $phones;

    public static function withCpfMailAndName(string $numberCPF, string $mail, string $name): self
    {
        return new Student(
            new CPF($numberCPF),
            $name,
            new Mail($mail)
        );
    }

    public function __construct(CPF $cpf, string $name, Mail $email)
    {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
        $this->phones = [];
    }

    public function addPhone(string $ddd, string $number)
    {
        $this->phones[] = new Phone($ddd, $number);
        return $this;
    }

    public function cpf()
    {
        return $this->cpf;
    }

    public function name()
    {
        return $this->name;
    }

    public function email()
    {
        return $this->email;
    }

    public function phones()
    {
        return $this->phones;
    }
}