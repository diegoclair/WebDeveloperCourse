<?php

    session_start(); //importante que esse session esteja sempre no começo
    //toda vez que você está com o navegador aberto, essa session já é criada

    require_once('db.class.php');

    $usuario = $_POST['usuario'];
    $senha = md5($_POST['senha']);

    //update    - retorna true/false
    //insert    - retorna true/false
    //select    - retorna false/resource, false caso exista algum erro e resource caso consiga achar
    //delete    - retorna true/false

    $sql = "SELECT id, usuario, email FROM usuarios where usuario = '$usuario' and senha = '$senha'"; // pegaremos o usuario e o email quando achar os dados digitados de login e senha

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link,$sql);
    //nós realizamos a consulta no db com o msqli_query e podemos explorar o resultado com o mysqli_fetch_array que transforma o retorno em um array :

    if ($resultado_id) { //esse teste está relacionado com erros de sintaxe(código escrito), ou seja, se eu digitar um usuario que não existe, ele entrar aqui no if, mas retornar NULL

        $dados_usuario = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC); //MYSQLI_ASSOC, veja na pag de teste_mysqli.php
        //var_dump($dados_usuario); #aqui vemos o retorno do array e seus indices, como por exemplo o 'usuario'

        //agora vamos testar com base em um dos arrays, se o usuário existe, dessa forma, poderemos informar se o login informado é válido ou não
        if (isset($dados_usuario['usuario'])) {
            #echo 'Usuario existe';
            
            //passaremos o usuario, email e id para a super global session e que criamos o indíce com o mesmo nome (usuario, email e id) e atribuímos os valores de acordo com o valor retornado do array
            $_SESSION['usuario'] = $dados_usuario['usuario'];
            $_SESSION['email'] = $dados_usuario['email'];
            $_SESSION['id_usuario'] = $dados_usuario['id'];
            //a partir do momento em que passar por essa sessão, ela fica disponível em qualquer arquivo nosso, basta inicializar no inicio do código a session_star, por exemplo, iremos usar essa session lá no arquivo home.php

            //caso o usuário exista, vamos encaminha-lo para home do twitter
            header('Location: home.php');
        }else {
            //caso o usuário não eixsta, podemos retornar para a página index e informar que o usuário não existe
            header('Location: index.php?erro=1'); //aqui passamos qual a página queremos que ele volte e passamos um parametro via GET(escrito na url) '?erro=1 e ai será possível recuperar esse dado via GET
        }
    } else {
        echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
    }
    



?>