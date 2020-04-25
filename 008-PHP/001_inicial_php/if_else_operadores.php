<?php

//OPERADORES DE COMPARACAO

    // ==           é igual?
    // ===          é igual e do mesmo tipo (identico)?
    // != ou <>     é diferente?
    // !==          é diferente e/ou do tipo diferente?
    //<             é menor que
    //>             é maior que
    //<=            é menor ou igual que
    //>=            é maior ou igual que

    if (2 === '2') { //false
        echo 'sim, expressão é verdadeira';
        echo '<br>';
    } else {
        echo 'não, a expressão é falsa';
        echo '<br>';
    }

    if (5 !== '5' /* ou 6*/) { //'5' = verdadeiro, pois o tipo é de tipo diferente, apesar do valor ser igual... '6' = verdadeiro, pois o valor é diferente apesar do tipo ser igual... e se fosse 5 !== 5, ai ele seria falso, pois ele é identico; 
        echo 'sim, expressão é verdadeira';
        echo '<br>';
    } else {
        echo 'não, a expressão é falsa';
        echo '<br>';
    }


//OPERADORES LÓGICOS

    //&& ou AND         Se todos as condições forem verdadeiras/falsa
    //|| ou OR          Se uma das condições forem verdadeiras/falsa
    //XOR               Retorna verdadeiro se apenas uma das opções for verdadeira
    //!                 Operador de negação, se o resultado der true, ele entra no else e se der false, ele entra no bloco if

    if (5 == 3 XOR 'z' == 'z') { //verdadeiro, pois apenas uma condição é verdadeira
        echo 'Entrou no bloco if';
        echo '<br>';
    } else {
        echo 'Entrou no bloco else';
        echo '<br>';
    }

    if (5 == 5 XOR 'z' == 'z') { //false, pois apenas uma condição tem que ser verdadeira, pra retornar true
        echo 'Entrou no bloco if';
        echo '<br>';
    } else {
        echo 'Entrou no bloco else';
        echo '<br>';
    }

    if (5 == 4 XOR 'z' == 'i') { //false, pois uma condição tem que ser verdadeira, pra retornar true
        echo 'Entrou no bloco if';
        echo '<br>';
    } else {
        echo 'Entrou no bloco else';
        echo '<br>';
    }


//SWITCH E CASE, IGUALZINHO O DO JS


    //OPERADORES ARITMÉTICOS, IGUALZINHO O DO JS
    // +
    // -
    // *
    // /
    // %


    $n1 = 2;
    $n2 = 5;

    //aqui ele soma e mostra o resultado
    echo $n1 + $n2;
    echo '<br>';

    //aqui ele concatena
    echo $n1 .' ' .$n2;
    echo '<br>';



//explicação do mod %

    /* 
    % de 9 / 2

    9 / '2' = (4.5)

    número inteiro do resto * o divisor
    (4) * '2' = 8

    % é igual a dividendo - resultado acima:
    9 - 8 = 1

    */


?>

