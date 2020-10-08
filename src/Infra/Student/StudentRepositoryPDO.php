<?php

namespace Alura\Architecture\Infra\Student;

use Alura\Architecture\Domain\CPF;
use Alura\Architecture\Domain\Student\Phone;
use Alura\Architecture\Domain\Student\Student;
use Alura\Architecture\Domain\Student\StudentNotFound;
use Alura\Architecture\Domain\Student\StudentRepository;
use PDO;

class StudentRepositoryPDO implements StudentRepository
{

    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(Student $student): void
    {
        $sql = 'INSERT INTO student VALUES (:cpf, :name, :email);';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('cpf', $student->cpf());
        $stmt->bindValue('name', $student->name());
        $stmt->bindValue('email', $student->email());
        $stmt->execute();

        $sql = 'INSERT INTO phones VALUES (:ddd, :number, :cpf_student)';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('cpf_student', $student->cpf());

        /** @var Phone $phone */
        foreach ($student->phones() as $phone) {
            $stmt->bindValue('ddd', $phone->ddd());
            $stmt->bindValue('number', $phone->number());
            $stmt->execute();
        }
    }

    public function findByCpf(CPF $cpf): Student
    {
        $sql = '
            SELECT cpf, name, email, ddd, number as numero_telefone
            FROM student
            LEFT JOIN phones ON phones.cpf_student = student.cpf
            WHERE student.cpf = ?;
        ';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, (string) $cpf);
        $stmt->execute();

        $studentData = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($studentData) === 0) {
            throw new StudentNotFound($cpf);
        }

        return $this->mapStudent($studentData);
    }

    private function mapStudent(array $studentData) {
        $firstLine = $studentData[0];
        $student = Student::withCpfMailAndName(
            $firstLine['cpf'],
            $firstLine['email'],
            $firstLine['name']
        );

        $phones = array_filter($studentData, fn ($row) => $row['ddd'] !== null && $row['numero_telefone'] !== null);
        foreach ($phones as $row) {
            $student->addPhone($row['ddd'], $row['numero_telefone']);
        }

        return $student;
    }

    public function findAll(): array
    {
        $sql = '
            SELECT cpf, name, email, ddd, number as numero_telefone
            FROM student
            LEFT JOIN phones ON phones.cpf_student = student.cpf;
        ';
        $stmt = $this->connection->query($sql);

        $listStudentData = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $students = [];

        foreach ($listStudentData as $studentData) {
            if (!array_key_exists($studentData['cpf'], $students)) {
                $students[$studentData['cpf']] = Student::withCpfMailAndName(
                    $studentData['cpf'],
                    $studentData['email'],
                    $studentData['name']
                );
            }

            $students[$studentData['cpf']]->addPhone(
                $studentData['ddd'],
                $studentData['numero_telefone']
            );
        }

        return array_values($students);
    }
}