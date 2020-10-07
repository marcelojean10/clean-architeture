<?php

namespace Alura\Architecture\Student\Tests;

use Alura\Architecture\Domain\Student\Phone;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    public function testTelefoneDebePoderSerRepresentadoComoString()
    {
        $telefone = new Phone('24', '222222222');
        $this->assertSame('(24) 222222222', (string) $telefone);
    }

    public function testTelefoneComDddInvalidoNaoDeveExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('DDD inválido');
        new Phone('ddd', '222222222');
    }

    public function testTelefoneComNumeroInvalidoNaoDeveExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('Número de telefone inválido.');
        new Phone('24', 'número');
    }
}