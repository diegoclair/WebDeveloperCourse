<?php

class Pessoa{
    
    private $nome;

    public function correr(){
        echo $this->nome . ' correndo<br>';
    }

    function __construct($parametro_nome) {

        $this->nome = $parametro_nome;
        echo 'Construtor iniciado ' .$this->nome .'<br>';
    }

    function __destruct(){
        echo 'Objeto removido <br>'; //quando o objeto for removido da memória o destruct é chamado automaticamente, fazendo com
    }
}

$pessoa = new Pessoa('Diego'); //basta eu instaciar a classe e o método construct é chamado automaticamente

//quando chamamos  método correr, ele já tinha feito a 'config inicial' setando o nome no atributo com construct
$pessoa->correr();

?>