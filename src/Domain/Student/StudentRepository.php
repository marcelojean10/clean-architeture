<?php


namespace Alura\Architecture\Domain\Student;


use Alura\Architecture\Domain\CPF;

interface StudentRepository
{
    public function add(Student $student): void;
    public function findByCpf(CPF $cpf): Student;

    /** @return Student[] */
    public function findAll(): array;
}