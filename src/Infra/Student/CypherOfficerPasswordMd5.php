<?php


namespace Alura\Architecture\Infra\Student;


use Alura\Architecture\Domain\Student\CypherOfficerPassword;

class CypherOfficerPasswordMd5 implements CypherOfficerPassword
{

    public function encrypt(string $password): string
    {
        return md5($password);
    }

    public function check(string $password, string $passwordEncrypted): bool
    {
        return md5($password) === $passwordEncrypted;
    }
}