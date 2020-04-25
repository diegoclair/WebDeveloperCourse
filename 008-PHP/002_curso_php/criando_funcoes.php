<?php

//não pode ser usado caracteres especiais no nome da função, com excessão do underline "_" e não pode ser iniciadas com números


    //Função sem retorno
    //nessas funções podemos já atribuir um valor para ela, portanto se eu chamar a função e não passar um valor, ele apresentará o valor definido na própria função
    function exibir_boas_vindas($nome='indefinido'){
        echo "Bem vindo ao curso de php, $nome <br>";
    }

    //Função com retorno
    function calcular_soma($num1,$num2){
        return $num1+$num2;
    }


    //Chamar função
    exibir_boas_vindas('Diego'); //passando valor
    exibir_boas_vindas();        //se não passar valor, ele usa o valor definido lá na função, mas la precisa ter uma definição, se não, vai dar erro

    echo calcular_soma(2,4); //Já podemos dar um echo na função e apresentar o valro retornado.

    

?>