<?php

namespace Alura\Architecture\Tests;

use Alura\Architecture\Mail;
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