<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

class AlunoNaoPodeTerMaisQueDoisNumeros extends \DomainException
{
    public function __construct()
    {
        parent::__construct("Um aluno não pdoe ter mais que 2 números de telefone cadastrados.");
    }

}