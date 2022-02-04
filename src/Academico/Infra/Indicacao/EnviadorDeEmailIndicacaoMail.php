<?php


use Alura\Arquitetura\Academico\ Dominio\Aluno\Aluno;

class EnviadorDeEmailIndicacaoMail implements EnviaEmailIndicacao
{

    public function enviaPara(Aluno $alunoIndicado): void
    {
        $para       = $alunoIndicado->email();
        $assunto    = 'Indicação';
        $mensagem   = 'Você foi indicado! Parabéns!';
        $cabecalhos = array(
                        'From' => 'franklyn@teste.com.br',
                        'Reply-To' => 'franklyn@teste.com.br',
                        'X-Mailer' => 'PHP/' . phpversion()
                      );

        mail($para, $assunto, $mensagem, $cabecalhos);
    }
}