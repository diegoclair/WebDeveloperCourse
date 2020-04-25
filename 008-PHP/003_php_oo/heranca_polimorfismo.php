
<?php

    //classe mãe ou super classe
    class Felino {
        
        var $mamifero = 'sim';

        function correr(){
            echo 'Correr como felino';
        }

    } //Felino

    //classe filha ou subclasse, usamos o extends ára herdar os atributos e métodos da classe mae
    class Chita extends Felino{

        //Polimorfismo - isso é quando sobrescrevemos o mesmo método da classe mae, então, ao acessar o método correr da classe chita, ele irá pegar o dessa classe, mesmo a classe mãe também tendo esse mesmo método

        function correr(){
            echo 'correr como chita 100km/h';
        }
    }

    
    //mesmo a classe Chita não tendo nada, conseguimos usar os métodos da classe mae Felino
    //heranças
    $chita = new Chita();

    echo $chita->mamifero .'<br>'; //chamou o atributo direto da classe mae
    $chita->correr();
    

?>
