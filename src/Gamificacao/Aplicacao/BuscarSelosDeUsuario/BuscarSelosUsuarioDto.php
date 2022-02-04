<?php

namespace Alura\Arquitetura\Gamificacao\Aplicacao\BuscarSelosDeUsuario;

use Alura\Arquitetura\Gamificacao\Infra\Selo\RepositorioDeSeloEmMemoria;
use Alura\Arquitetura\Shared\Dominio\Cpf;

class BuscarSelosUsuarioDto
{

    public string $cpfAluno;
    private RepositorioDeSelo $repositorioDeSelo;

    function __construct(RepositorioDeSelo $repositorioDeSelo)
    {
        $this->repositorioDeSelo = $repositorioDeSelo;
    }

    public function execute(BuscarSelosUsuarioDto $dados)
    {
        $cpfAluno = new Cpf($dados->cpfAluno);

        return $selos = $this->repositorioDeSelo->selosDeAlunoComCpf($cpfAluno);
    }


}