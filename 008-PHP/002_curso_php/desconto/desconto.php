<?php

    //require_once significa que estamos requerendo esse arquivo php. Ele serve como se a pagina funcoes_desconto.php estivesse aqui dentro do cógido, então podemos chamar as funções da outra página normalmente.
    //se a função abaixo estivesse em alguma pasta, exemplo funcao, teria que colocar:  'funcao/funcoes_desconto.php'
    require_once('funcoes_desconto.php');


    $valor_total = 800;
    $desconto = 10;

    //usando o require_once lá em cima, conseguimos chamar a função aqui, passar os parametro e ela irá retornar o valor do desconto
    $valor_com_desconto = calcula_desconto($valor_total,$desconto);

?>

Valor Total: R$ <?php echo $valor_total ?> <br>
Valor desconto: <?php echo $desconto ?> % <br>
Valor total com desconto: R$ <?php echo $valor_com_desconto ?>

