
<?php

//IS_ARRAY - retorna se é um array ou não

    $array = 'String';
    $retorno = is_array( $array );
    
    if ($retorno) {
        echo 'É um array!<br><br>';
    } else {
        echo 'Não é um array!<br><br>';
    }

    $array1 = array('notebook','computador');
    $retorno1 = is_array( $array1 );
    
    if ($retorno1) {
        echo 'É um array!<br><br>';
    } else {
        echo 'Não é um array!<br><br>';
    }

//IN_ARRAY - procura algum valor dentro do array
    
    $array2 = array('mac','linux','windows');
    
    //passamos dois parametros, o que queremos procurar e em qual array proccurar
    $retorno2 = in_array('solares', $array2 );

    if ($retorno2) {
        echo 'Existe a palavra no array!<br><br>';
    } else {
        echo 'Não existe a palavra no array!<br><br>';
    }

//ARRAY_KEYS - quando você quer pegar apenas a chaves de um array   

    $produtos = array(10=>'Teclado',11=>'Mouse');
    $chaves_array = array_keys($produtos); //você passa um array para o array_keys

    var_export($chaves_array);//var export é uma forma de exibir arrays

//SORT - serve cpara ordernar o array alfabéticamente

    $frutas = array(0=>'Banana', 1=>'Amora',2=>'Carambola');

    //com o sort ele vai reorganizar o array acima por ordem alfabética mas irá manter a sequencia dos indices
    sort($frutas);

    echo '<br><br>';
    var_export($frutas);


//ASORT - ela ordena em ordem alfabética e MANTEM os indices
    $frutas1 = array(0=>'Banana', 1=>'Amora',2=>'Carambola');

    //com o sort ele vai reorganizar o array acima por ordem alfabética mas irá manter a sequencia dos indices
    asort($frutas1);

    echo '<br><br>';
    var_export($frutas1);    


//COUNT - serve para contar quantos elementos tem um array

    $frutas2 = array(0=>'Banana', 1=>'Amora',2=>'Carambola');

    //com o sort ele vai reorganizar o array acima por ordem alfabética mas irá manter a sequencia dos indices
    $itens_array = count($frutas1);

    echo '<br><br> Quantidade de itens no array é de: ' .$itens_array;
    
//ARRAY_MERGE - serve para criar um array juntados os indices de mais de um array

    $array3 = array('mac','linux');
    $array4 = array('windows', 'Osx');
    $array5 = array('umbuntu');

    $array_merge = array_merge($array3, $array4, $array5); //ele cria um array com os dados de outros array's e faz uma nova sequencia de indice

    var_export($array_merge);


//EXPLODE - ela cria uma array dividindo uma string com base em um parametro
    
    $string = '20/10/2020';
    $retorno_string = explode('/',$string); //são dois parametros, o primeiro nós escolhemos o que vamos usar como parametro de separação e o segundo o texto onde iremos olhar

    echo '<br><br> explode: <br>';
    var_export($retorno_string);

//IMPLODE - ele junta um texto com base em algum parametro (inverso do explode)

    $nova_string = implode('-', $retorno_string); //ele vai pegar os dados dos incides de uma array e a cada indice ele vai colocar um traço (parametros que passamos no implode)

    echo '<br><br> implode: <br>' .$nova_string;

?>
