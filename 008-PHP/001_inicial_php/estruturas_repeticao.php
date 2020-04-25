<?php
    $num = 1;

//WHILE

    while ($num <= 10) {
        //faz a condição enquanto o num for menor ou igual 10
        //identico ao do JS, posso ter break ou continue etc..
        $num++;
    }


//DO WHILE
    //Identico ao do JS
    //a diferença do do-while é que ele executa a ação primeiro e depois executa a condição, portanto sempre fará pelo menos uma vez a condição

    $num2 = 11;

    do {
        
        echo 'entrei aqui '.$num2;
        echo '<br>';
        $num2++;
    } while ($num2 < 10);


//FOR
    //variavel; condição; incremento
    for ($num3=1; $num3 < 10; $num3++) { 
        echo $num3.'<br>';

        //tb podemos usar o break ou continue, igual no JS

    }

echo '<br>';
//foreach
    //você consegue percorrer todos os itens de um array conforme abaixo:


    $produtos[1] = 'Sofá';
    $produtos[2] = 'Mesa';
    $produtos[3] = 'Cadeira';
    $produtos[4] = 'Fogão';
    $produtos[5] = 'Geladeira';

    foreach ($produtos as $produto ) {
        echo $produto.'<br>';
        //aqui dentro podemos ir colocando condições:

        if ($produto == 'Mesa') {
            echo 'Compre uma mesa e ganhe 25% de desc<br>';
        }
    }



?>

