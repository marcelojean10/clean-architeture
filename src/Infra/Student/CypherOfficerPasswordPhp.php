<?php


namespace Alura\Architecture\Infra\Student;


use Alura\Architecture\Domain\Student\CypherOfficerPassword;

class CypherOfficerPasswordPhp implements  CypherOfficerPassword
{

    public function encrypt(string $password): string
    {
        return password_hash($password, PASSWORD_ARGON2ID);
    }

    public function check(string $password, string $passwordEncrypted): bool
    {
        return password_verify($password, $passwordEncrypted);
    }
}