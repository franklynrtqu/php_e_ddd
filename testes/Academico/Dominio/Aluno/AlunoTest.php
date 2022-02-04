<?php

namespace Alura\Arquitetura\Testes\Academico\Dominio\Aluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\AlunoNaoPodeTerMaisQueDoisNumeros;
use Alura\Arquitetura\Shared\Dominio\Cpf;
use Alura\Arquitetura\Academico\Dominio\Email;
use PHPUnit\Framework\TestCase;

class AlunoTest extends TestCase
{
    private Aluno $aluno;

    protected function setUp(): void
    {
        $this->aluno = new Aluno (
            $this->createStub(Cpf::class),
            '',
            $this->createStub(Email::class)
        );
    }

    public function testAdicionaMaisDe2TelefonesDeveLancarExcecao()
    {
        $this->expectException(AlunoNaoPodeTerMaisQueDoisNumeros::class);
        $this->expectExceptionMessage("Um aluno não pdoe ter mais que 2 números de telefone cadastrados.");
        $this->aluno->adicionarTelefone('55', '123456789');
        $this->aluno->adicionarTelefone('49', '987654321');
        $this->aluno->adicionarTelefone('42', '871236745');
    }

    public function testAdicionar1TelefoneDeveFuncionar()
    {
        $this->aluno->adicionarTelefone('24', '222222222');
        $this->assertCount(1, $this->aluno->telefones());
    }

    public function testAdicionar2TelefonesDeveFuncionar()
    {
        $this->aluno->adicionarTelefone('24', '222222222');
        $this->aluno->adicionarTelefone('24', '999999999');

        $this->assertCount(2, $this->aluno->telefones());
    }

}