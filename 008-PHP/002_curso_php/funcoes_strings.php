
<?php

    $texto = 'curso Completo de PHP - CHUPA LE - 10 # % <br><br>';

    //string to lower (strtolower) - para deixar todas letras minusculas
    echo strtolower($texto);

    //string to upper - (strtoupper) - para deixar todas letras maiusculas
    echo strtoupper($texto);

    //upper case first - (ucfirst) - para deixar apenas a primeira letra maiuscula e o matem a mesma formatação do resto
    echo ucfirst($texto);

    //string lenght (quantidade de caractere e espaços também)
    echo strlen($texto);
    
//exemplo de criação de cadastro onde temos que validar a quantidade de caracteres para um CPF
    
    //isset, verifica se a variável foi iniciada
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '' ;
    /*acima é igual a um if else, onde após a interroção ele considera se for verdadeiro e após os dois pontos, se for falso*/

    if ( !is_numeric($cpf) && $cpf != '' ) {
        echo "<br><br>É permitido apenas números";
       }

    $total_string_cpf = strlen($cpf);
    

    if ($total_string_cpf != 11 && $total_string_cpf != '' ) {
        echo '<br><br>cpf inválido, digite 11 caracteres';
    } 

//fim do exemplo CPF, que utilizou o form em html

//TEM MAIS PHP PRA BAIXO

?>
<br><br>

<form action="" method="post">

    <label >
        CPF:
        <input type="text" name="cpf" id="cpf">
    </label>
    <button type="submit">Cadastrar</button>

</form>


<?php

    
    //str_replace  - para substituir algo na string por outro item
    $texto2 = '12.40';
    $novo_texto = str_replace('.' , ',' , $texto2); //3 parametros, procura o ponto e substitui pela virgula, tudo da variável $texto1

    //a str_replace, não altera a variável passada nos parametros, para pegar o valor novo, teríamos que jogar esse resultado dentro de outra variável, e ela estara como STRING, portanto teríamos que transformar em float, caso queiramos realizar um calculo
    /* exemplo da explicação acima:
        $texto2 = "12,55";
        $texto_novo = str_replace(",", ".", $texto2);
        // O valor da variável $texto_novo será 12.55, porém no tipo String
        $valor_convertido = (float) $texto_novo;
        // O comando acima irá forçar o valor da variável $texto_novo a ser convertido para o tipo Float
    */

    echo 'De: '.$texto2 .' para: ' .$novo_texto .'<br><br><br>';
    
    //substituindo separadamente
    $cpf1 = '039.264.845-86';
    $cpfFinal = str_replace('.','',$cpf1);
    $cpfFinal = str_replace('-','',$cpfFinal);

    echo 'Método substituir separadamente: ' .$cpfFinal .'<br><br>';

    //substituindo diretamente
    $cpffinal2 = str_replace(".","", str_replace("-", "", $cpf1));

    echo 'Método substituir diretamente: ' .$cpffinal2 .'<br><br>';

    
    //substr - retorna parte de um texto
    //posicao= 0123456789.............   
    $texto3 = "Entenda porque seu smartphone esquenta tanto, se voce tem um spartphone.";

    //ela pede 3 paramentro, o primeiro é o texto, o segundo é a posição inicial do texto e a terceira é a quantidade de caracteres que deseja
    $noticia = substr($texto3,0,44);
    echo $noticia .'...';


?>