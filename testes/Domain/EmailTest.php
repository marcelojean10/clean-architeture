<?php

namespace Alura\Architecture\Tests\Domain;

use Alura\Architecture\Domain\Mail;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmailNoFormatoInvalidoNaoDevePoderExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Mail('email invalido');
    }

    public function testEmailDevePoderSerRepresentadoComoString()
    {
        $mail = new Mail('endereco@example.com');
        $this->assertSame('endereco@example.com', (string) $mail);
    }
}