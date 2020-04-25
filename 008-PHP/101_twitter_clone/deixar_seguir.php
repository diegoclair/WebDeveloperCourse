
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
//a página procurar_pessoas, passou o id do usuário que foi clicado no botão 'Deixar de seguir' via post através da variável deixar_seguir_id_usuario e nós recuperamos o valor dela aqui embaixo
$deixar_seguir_id_usuario = $_POST['deixar_seguir_id_usuario'];

require_once('db.class.php');


//CONTROLE PARA GARANTIR QUE EXISTEM OS DADOS ANTES DE FAZER QUALQUER AÇÃO:
if ($id_usuario == '' || $deixar_seguir_id_usuario == '') {
    die(); //se algumas dessas variáveis estiverem vazias, matamos o processo aqui, e garantimos que não irá gravar nada no banco indevidamente
}

//faço a instancia da classe que vai ser do tipo db que é do nosso arquivo db.class.php
$objDb = new db();
$link = $objDb->conecta_mysql(); //recupera o link de conexão com o banco de dados com a função do aquivo db.class.php

//na nossa tabela de ususario_seguidores, temos 4 campos, o id_usuario_seguidor é auto Increment  e a data_registro é automática, portanto teremos que preencher apenas os outros dois campos abaixo
$sql = "DELETE from usuarios_seguidores WHERE id_usuario = $id_usuario and seguindo_id_usuario = $deixar_seguir_id_usuario";

//funçao mysqli_query precisa do link para fazer a conexão com o banco e código a ser aplicado que estamos passando através da variável $sql
mysqli_query($link,$sql);


?>