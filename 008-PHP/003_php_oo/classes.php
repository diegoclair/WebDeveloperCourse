
<?php

    class Pessoa{

        //atributos
        var $nome;

        //métodos           - getters e setter
        function setNome($nome_definido){ 
            //this acessa os atriburos que estão dentro da classe pessoa
            $this->nome = $nome_definido;
        }

        function getNome(){
            //aqui ele recupera o valor de um atributo
            return $this->nome;
        }

    } /**Pessoa */


    //agora vamos instanciar essa classe Pessoa, ela poderia estar em um outro arquivo

    $pessoa = new Pessoa(); //agora a variável pessoa referencia a classe Pessoa

    //usando essa variavel pessoa, agora conseguimos acessar os atributos e métodos da classe Pessoa

    //com a seta, nós conseguimos acessar os atributos e métodos da classe pessoa
    $pessoa->setNome('Diego');

    //agora que setamos o nome na classe, podemos recuperar esse nome com o método getNome
    echo $pessoa->getNome();


    

?>