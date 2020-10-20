<?php


use Alura\Architecture\App\Student\StudentRegister\StudentRegisterDto;
use Alura\Architecture\App\Student\StudentRegister\StudentRegister as MatriculaAluno;
use Alura\Architecture\Domain\CPF;
use Alura\Architecture\Infra\Student\StudentRepositoryInMemory;
use PHPUnit\Framework\TestCase;

class StudentRegister extends TestCase
{
    /**
     * Aluno deve ser possível ser adicionado ao repositório.
     *
     */
    public function testStudentMustBeAddedToTheRepository()
    {
        $dataStudent = new StudentRegisterDto(
            '43603717058',
            'Marcelo Jean',
            'email@example.com'
        );

        $studentRepository = new StudentRepositoryInMemory();
        $useCase = new MatriculaAluno($studentRepository);
        $useCase->execute($dataStudent);

        $student = $studentRepository->findByCpf(new CPF('43603717058'));
        $this->assertSame('Marcelo Jean', (string) $student->name());
        $this->assertSame('email@example.com', (string) $student->email());
        $this->assertEmpty($student->phones());
    }
}