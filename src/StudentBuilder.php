<?php


namespace Alura\Architecture;


class StudentBuilder
{
    private Student $student;

    public function withCpfMailAndName(string $numberCPF, string $mail, string $name): self
    {
        $this->student = new Student(
            new CPF($numberCPF),
            $name,
            new Mail($mail)
        );
        return $this;
    }

    public function addPhone(string $ddd, string $number): self
    {
        $this->student->addPhone($ddd, $number);
        return $this;
    }

    public function student(): Student
    {
        return $this->student;
    }
}