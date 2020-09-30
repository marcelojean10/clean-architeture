<?php

namespace Alura\Architecture;

class Student
{
    private string $name;
    private CPF $cpf;
    private Mail $email;
    private array $phones;

    public function addPhone(string $ddd, string $number)
    {
        $this->phones[] = new Phone($ddd, $number);
    }
}