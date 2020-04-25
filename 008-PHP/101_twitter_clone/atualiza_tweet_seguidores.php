
<?php

session_start();

//aqui eu vou validar se a session existe, ou seja, o usuário estava logado em algum momento na mesma sessão da internet (abaixo está com a ! de negação, então estou vendo se ela não existe)
if (!isset($_SESSION['usuario'])) {
    //se não existir, vou encaminhar ele para minha página inicial com a url de erro
    //podemos tentar acessar a home.php através de janela anônima do chrome para testar
    header('Location: index.php?erro=1');
}

//para contar o numero de seguidores e de tweets
require_once('db.class.php');

$objDb = new db();
$link = $objDb->conecta_mysql(); //recupera o link de conexão com o banco de dados com a função do aquivo db.class.php

$id_user_logado = $_SESSION['id_usuario'];


$fuction = $_POST['function']; //recupero o valor passado no ajax


if ($fuction == 'atualiza_tweets') { 

    atualizaQtdTweets($id_user_logado,$link);

} else if ($fuction == 'atualiza_seguidores') {
    
        atualizaQtdSeguidores($id_user_logado, $link);

    } if ($fuction == 'deleta_tweet') {
        deletaTweet($id_user_logado, $link);
    }

    function deletaTweet($id_user_logado, $link) {
    //deletar o tweet no banco
        
        $id_tweet = $_POST['id_tweet'];

        $sql = "DELETE FROM tweet WHERE id_tweet = $id_tweet and id_usuario = $id_user_logado";
        
        mysqli_query($link,$sql);
        
    }

function atualizaQtdTweets($id_user_logado, $link){

//recuperar a quantidade de tweets 
    $sql = "SELECT COUNT(*) AS qtd_tweets FROM tweet WHERE id_usuario = $id_user_logado";
    //acima usamos o select count que retorna apenas a quantidade de registro de acordo com as condições passadas, para esse contador, demos um apelido e assim conseguiremos recuperar esse apelido mais abaixo passando como indice do array retornado do fetch_array, o apelido dado ao select

    //funçao mysqli_query precisa do link para fazer a conexão com o banco e código a ser aplicado que estamos passando através da variável $sql
    $resultado_id = mysqli_query($link,$sql);
    $qtd_tweets = 0;

    if ($resultado_id) {
        $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

        //recuperamos a quantidade de acordo com o indice(que é o nome do alias dado ao select count) para recuperar o seu valor, que é a quantidade de registros encontrado
        echo $qtd_tweets = ($registro['qtd_tweets']);
        //Essa variável $qtd_tweets pode sser usada em qualquer lugar desse aquivo, até fora das tags de php, portanto iremos colocar ela lá embaixo diretamente 

    } else {
        echo 'Erro ao tentar recuperar a quantidade de twwets';
    }
}


function atualizaQtdSeguidores($id_user_logado, $link){
//recuperar a quantidade de Seguidores
    $sql = "SELECT COUNT(*) AS qtd_seguidores FROM usuarios_seguidores 
    WHERE seguindo_id_usuario = $id_user_logado";
    $resultado_id = mysqli_query($link,$sql);

    $qtd_seguidores = 0;

    if ($resultado_id) {
        $registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

        //recuperamos a quantidade de acordo com o indice(que é o nome do alias dado ao select count) para recuperar o seu valor, que é a quantidade de registros encontrado
        echo $qtd_seguidores = ($registro['qtd_seguidores']);
        //Essa variável $qtd_tweets pode sser usada em qualquer lugar desse aquivo, até fora das tags de php, portanto iremos colocar ela lá embaixo diretamente 

    } else {
        echo 'Erro ao tentar recuperar a quantidade de twwets';
    }
}



?>