<?php

namespace Alura\Architecture\App\Student\StudentRegister;

class StudentRegisterDto
{
    public string $studentCpf;
    public string $studentName;
    public string $studentEmail;

    /**
     * StudentRegisterDto constructor.
     * @param string $studentCpf
     * @param string $studentName
     * @param string $studentEmail
     */
    public function __construct(string $studentCpf, string $studentName, string $studentEmail)
    {
        $this->studentCpf = $studentCpf;
        $this->studentName = $studentName;
        $this->studentEmail = $studentEmail;
    }
}