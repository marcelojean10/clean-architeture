<?php

namespace Alura\Architecture\Tests;

use Alura\Architecture\CPF;
use PHPUnit\Framework\TestCase;

class CPFTest extends TestCase
{
    public function testCpfComNumeroInvalidoNaoDevePoderExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        new CPF(1234569789);
    }

    public function testCpfDevePoderSerRepresentadoComoString()
    {
        $cpf = new CPF('87335522072');
        $this->assertSame('87335522072', (string) $cpf);
    }
}