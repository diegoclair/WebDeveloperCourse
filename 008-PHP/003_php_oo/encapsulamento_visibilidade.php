

<?php

    class Veiculo{

        /*
        Modificadores de visibilidade
        É como um carro, iremos definir o que a pessoa pode mexer que é necessário para dirigir e teremos as coisas escondidas, como o motor que fica abaixo do capo e é com esses 3 tipos abaixo que iremos fazer isso public, private, protected
        */

        private $placa; //para alterar esses atributos do tipo private, temos que criar métodos publicos aqui dentro da classe para que possamos chamar depois o método que altera
        private $cor;

        //a diferença do protected para o private é que ele pode ser acessado pelas classes filhas 'extends' e o private não deixar nem as classes filhas acessarem
        protected $tipo='Caminhonete';

        public function setPlaca($parametro_placa){

            //Validação da placa - se não tem caracteres especiais e se são de 7 casas (poderia ser feito)
            
            $this->placa = $parametro_placa; //this acessa os atributos aqui dentro da classe e com a seta -> nós colocamos o parametro_placa dentro do atributo placa
        }

        public function getPlaca(){

            return $this->placa;
        }

    } //class Veiculo

    class Carro extends Veiculo{ //classe filha acessando um atributo da classe mãe que está como protected
        public function exibirTipo(){
            echo $this->tipo;
        }
    }
    

    $veiculo = new Veiculo(); //instanciei a classe
    $veiculo->setPlaca('JAM3636!#@$');
    //echo $veiculo->placa .'<br>'; 
    //PERCEBA que acima não conseguimos acessar a placa nem para mostrar o valor dela, visto que ela foi deifinida como private, portanto iremos criar um método publico deentro da classe para que pegue o valor dela
    echo $veiculo->getPlaca() .'<br>';

    $carro = new Carro();
    $carro->exibirTipo();



?>