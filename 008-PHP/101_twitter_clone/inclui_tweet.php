
<?php

    session_start(); //sempre que formos usar as variáveis de sessão como abaixo, temos que colocar esse start

    //CONTROLE DE ACESSO
    //aqui eu vou validar se a session existe, ou seja, o usuário estava logado em algum momento na mesma sessão da internet (abaixo está com a '!' de negação, então estou vendo se ela não existe)
    if (!isset($_SESSION['usuario'])) {
        //se não existir, vou encaminhar ele para minha página inicial com a url de erro
        //podemos tentar acessar a inclui_tweet.php através de janela anônima do chrome para testar
        header('Location: index.php?erro=1');
    }

    $id_usuario = $_SESSION['id_usuario'];

    require_once('db.class.php');

    $texto_tweet = $_POST['texto_tweet']; //foi enviado pelo home.php um texto do tweet pelo método post, que foi gerado com o índice automático de acordo com o name do campo input e usaremos esse name para recuperamos o valor dele aqui

    //CONTROLE PARA GARANTIR QUE EXISTEM OS DADOS ANTES DE FAZER QUALQUER AÇÃO:
    if ($texto_tweet == '' || $id_usuario == '') {
        die(); //se algumas dessas variáveis estiverem vazias, matamos o processo aqui, e garantimos que não irá gravar nada no banco indevidamente
    }

    //faço a instancia da classe que vai ser do tipo db que é do nosso arquivo db.class.php
    $objDb = new db();
    $link = $objDb->conecta_mysql(); //recupera o link de conexão com o banco de dados com a função do aquivo db.class.php

    //na nossa tabela tweet, o id tweet é autoincrement e a data é automático de acordo com o horário em que o registro é incluído na tabela, portanto precisamos passar o id do usuário e o texto do tweet

    $sql = "INSERT into tweet(id_usuario, tweet)values($id_usuario, '$texto_tweet')";

    //funçao mysqli_query precisa do link para fazer a conexão com o banco e código a ser aplicado que estamos passando através da variável $sql
    mysqli_query($link,$sql);

?>