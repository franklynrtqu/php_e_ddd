<?php

namespace Alura\Arquitetura\Testes\Academico\Aplicacao\Aluno;

use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Alura\Arquitetura\Shared\Dominio\Cpf;
use Alura\Arquitetura\Academico\Infra\Aluno\RepositorioDeAlunoEmMemoria;
use PHPUnit\Framework\TestCase;

class MatricularAlunoTest extends TestCase
{
    public function testAlunoDeveSerAdicionadoAoRepositorio()
    {
        $dadosAluno = new MatricularAlunoDto(
            '123.123.123-10',
            'Teste',
            'franklyn@teste.com.br'
        );

        $repositorioDeAluno = new RepositorioDeAlunoEmMemoria();
        $useCase = new MatricularAluno($repositorioDeAluno);

        $useCase->executa($dadosAluno);

        $aluno = $repositorioDeAluno->buscarPorCpf(new Cpf('123.123.123-10'));
        $this->assertSame('Teste', (string) $aluno->nome());
        $this->assertSame('franklyn@teste.com.br', (string) $aluno->email());
        $this->assertEmpty($aluno->telefones());


    }
    
}