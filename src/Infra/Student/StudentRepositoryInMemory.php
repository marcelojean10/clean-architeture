<?php


namespace Alura\Architecture\Infra\Student;


use Alura\Architecture\Domain\CPF;
use Alura\Architecture\Domain\Student\Student;
use Alura\Architecture\Domain\Student\StudentNotFound;
use Alura\Architecture\Domain\Student\StudentRepository;

class StudentRepositoryInMemory implements StudentRepository
{
    private array $students = [];

    public function add(Student $student): void
    {
       $this->students[] = $student;
    }

    public function findByCpf(CPF $cpf): Student
    {
        $studentsFilters = array_filter(
            $this->students,
            fn(Student $student) => $student->cpf() == $cpf);

        if (count($studentsFilters) === 0) {
            throw new StudentNotFound($cpf);
        }

        if (count($studentsFilters) > 1) {
            throw new \Exception();
        }

        return $studentsFilters[0];
    }

    public function findAll(): array
    {
        return $this->students;
    }
}