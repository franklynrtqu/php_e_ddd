<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

interface CifradosDeSenha
{
    public function cifrar(string $senha): string;
    public function verificar(string $senhaEmTexto, string $senhaCifrada): bool;
}