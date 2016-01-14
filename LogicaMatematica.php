<?php

class LogicaMatematica
{

    protected $proposicaoComposta;

    public function __construct($proposicaoComposta)
    {
        $this->proposicaoComposta = $proposicaoComposta;
    }

    /**
     * @return array
     */
    public function getProposicoes() {
        $proposicoesSimples = [];

        for ($i = 0; $i <= strlen($this->proposicaoComposta) - 1; $i++) {
            if (preg_match('/^[a-u]/', $this->proposicaoComposta[$i])) {
                if (!in_array($this->proposicaoComposta[$i], $proposicoesSimples)) {
                    $proposicoesSimples[] = $this->proposicaoComposta[$i];
                }
            }
        }
        array_push($proposicoesSimples, $this->proposicaoComposta);

        return $proposicoesSimples;
    }

    /**
     * @return Integer
     */
    public function getNumeroLinhasTabela() {
        $proposicoesSimples = [];
        for ($i = 0; $i <= strlen($this->proposicaoComposta) - 1; $i++) {
            if (preg_match('/^[a-u]/', $this->proposicaoComposta[$i])) {
                if (!in_array($this->proposicaoComposta[$i], $proposicoesSimples)) {
                    $proposicoesSimples[] = $this->proposicaoComposta[$i];
                }
            }
        }
        return pow(2, count($proposicoesSimples));
    }

    public function getResultProposicao() {

        $novoFormatoProposicao = "";

        for ($i = 0; $i <= strlen($this->proposicaoComposta) - 1; $i++) {

            switch($this->proposicaoComposta[$i]) {
                case '^':
                    $novoFormatoProposicao .= ' and ';
                    break;
                case 'v':
                    $novoFormatoProposicao .= ' or ';
                    break;
                case '~':
                    $novoFormatoProposicao .= '!';
                    break;
                case 'w':
                    $novoFormatoProposicao .= ' xor ';
                    break;
                case '(':
                    $novoFormatoProposicao .= '(';
                    break;
                case ')':
                    $novoFormatoProposicao .= ')';
                    break;
            }

            if (preg_match('/^[a-u]/', $this->proposicaoComposta[$i]) and
                $this->proposicaoComposta[$i + 1] != '[' and
                $this->proposicaoComposta[$i + 1] != '{' and
                $this->proposicaoComposta[$i - 1] != '[' and
                $this->proposicaoComposta[$i - 1] != '{'
            ) {
                $novoFormatoProposicao .= '$'.$this->proposicaoComposta[$i];
            }

            if($this->proposicaoComposta[$i] == '[' and
                $this->proposicaoComposta[$i - 1] != ')' and
                $this->proposicaoComposta[$i + 1] != '('
            ) {
                $novoFormatoProposicao .= "!($".$this->proposicaoComposta[$i - 1]." xor $".$this->proposicaoComposta[$i + 1].")";
            }


        }
//        echo $novoFormatoProposicao; die;
        return $novoFormatoProposicao;
    }

    public function condicional($primeiro, $segundo) {
        if($primeiro == 'V' and $segundo == 'F') {
            return 'F';
        }
        return 'V';
    }

}