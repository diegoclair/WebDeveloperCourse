
<?php

//ISSET
    //a função isset, verifica se a variável foi iniciada, exemplos:
        //$valor = 'Diego';     - Ele vai retornar true, pois foi iniciada
        //$valor = null;        - Ele vai retornar false, pois null é como não iniciada
        //                      - Se não existe, ou não foi definida, ele retorna false
        //$valor = 123;         - Ele vai retornar true, pois foi iniciada

        //ou seja, ele vai ser false quando for null ou a variável não existe

    if (isset($valor)) {
        echo 'Variavel iniciada<br>';
    } else {
        echo 'variavel nao iniciada <br>';
    }
    

//EMPTY
    //a função empty, verifica se a variável está vazia, ela ser verdade quando:
        //$valor1 = ''        - valor em branco
        //$valor1 = 0         - variavel vazia
        //$valor1 = '0'       - valor 0
        //$valor1 = false     - quando for false
        //$valor1 = null      - quando for nulo
        //$valor1 = array()   - array sem nenhum dado
    //nos demais casos, ela retornará false

    $valor1 = '0';
    if (empty($valor1)) {
        echo 'variavel está vazia <br>';
    } else {    
        echo 'variavel existe algum valor <br>';

    }


//IS_NUMERIC()

    //a is_numeric verifica se o valor da variável é númerico ou até mesmo um texto numérico

    $valor3 = '50'; //true

    if (is_numeric($valor3)) {
        echo('é valor númerico<br>');
    } else {
        echo('não é valor númerico<br>');
    }
    

    

?>