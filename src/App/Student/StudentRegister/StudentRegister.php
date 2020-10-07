<?php

namespace Alura\Architecture\App\Student\StudentRegister;

use Alura\Architecture\Domain\Student\Student;
use Alura\Architecture\Domain\Student\StudentRepository;

class StudentRegister
{
    private StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function execute(StudentRegisterDto $data): void
    {
        $student = Student::withCpfMailAndName(
            $data->studentCpf, 
            $data->studentEmail,
            $data->studentName
        );
        $this->studentRepository->add($student);
    }
}