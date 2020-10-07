<?php


namespace Alura\Architecture\Domain\Student;


interface CypherOfficerPassword
{
    public function encrypt(string $password): string;
    public function check(string $password, string $passwordEncrypted): bool;
}