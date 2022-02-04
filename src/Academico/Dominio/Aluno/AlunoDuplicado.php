<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

class AlunoDuplicado extends \DomainException
{

    /**
     * @param $cpf
     */
    public function __construct($cpf)
    {
        parent::__construct("Foram encontrados na base de dados mais de um aluno com o CPF: $cpf.");
    }
}