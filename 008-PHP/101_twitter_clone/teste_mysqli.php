<?php

    require_once('db.class.php');

    $sql = "SELECT * FROM usuarios"; // dessa forma recuperamos todos os dados da tabela usuarios

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link,$sql);
    //nós realizamos a consulta no db com o msqli_query e podemos explorar o resultado com o mysqli_fetch_array que transforma o retorno em um array :

    if ($resultado_id) { //esse teste está relacionado com erros de sintaxe(código escrito), ou seja, se eu digitar um usuario que não existe, ele entrar aqui no if, mas retornar NULL

        $dados_usuario = array();

        //a função fetch_array retorna o indice númerico e o indice com texto do nome do campo, podemos usar apenas o indice número, basta colocar mysqli_num
        //e para retornar o array com a descricao associativa, usamos a função mysqli_assoc
        
        /*temos um problema com essa função caso eal esteja escrita da seguinte forma:

            $dados_usuario = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

        pois ela irá retornar apenas um registro, mesmo lá em cima, o nosso select está para retornar todos os dados, dessa forma, teremos que fazer um while conforme abaixo
        */
        while($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
            //dessa forma ele vai percorrer todos os dados do banco e quando o mysqli_fetch não tiver dado, ele vai retornar false e dessa maneira sai da condição while
            $dados_usuario[] = $linha;
        }
        
        //var_dump($dados_usuario); #Podemos melhorar essa visualização com o foreach
        foreach ($dados_usuario as $usuario) {
            //aqui adiconamos um apelido para a dados_usuario e depois imprimimos esse apelido e quebramos a linha
            //posso deixar apenas $usuario ou colocar o indice ['email'] por exemplo
            echo($usuario['usuario']); //imprimindo apenas um indice, não precisamos dar o var_dump, mas se não tiver indice, ele vai imprimir todos os indices e ai precisar usar o var_dump
            
        }
        
    } else {
        echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
    }
    
?>