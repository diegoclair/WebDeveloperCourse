
<?php

    session_start();

    //aqui eu vou validar se a session existe, ou seja, o usuário estava logado em algum momento na mesma sessão da internet (abaixo está com a ! de negação, então estou vendo se ela não existe)
    if (!isset($_SESSION['usuario'])) {
        //se não existir, vou encaminhar ele para minha página inicial com a url de erro
        //podemos tentar acessar a home.php através de janela anônima do chrome para testar
        header('Location: index.php?erro=1');
    }

    require_once('db.class.php');

    $id_usuario = $_SESSION['id_usuario'];

    $objDb = new db();
    $link = $objDb->conecta_mysql(); //recupera o link de conexão com o banco de dados com a função do aquivo db.class.php

    //order by + desc orderna descrescentemente e + ASC ordena crescentemente, se eu não colocar o desc nem o asc, automáticamente ele vai fazer o ASC, só que nesse caso precisamos da mais atual para a mais antiga
    $sql = "SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') AS dt_inclusao_formatada,
    t.tweet, u.usuario, t.id_usuario, t.id_tweet FROM tweet as t join usuarios AS u ON (t.id_usuario = u.id) 
    where t.id_usuario = $id_usuario 
    OR t.id_usuario IN(SELECT seguindo_id_usuario from usuarios_seguidores where id_usuario = $id_usuario ) 
    order by data_inclusao desc";
    //acima eu dei um apelido para a tabela tweet e selecionei apenas os campos que eu preciso dela, e dei um JOIN para usar a tabela de usuários, com apelido u e ai usamos o ON para relacionar as duas tabelas e relacionamos ela com o id do usuario em cada tabela
    //e tudo isso somente quando o id do usuario, seja igual ao id do usuário logado
    //como estamos trazendo apenas os dados de acordo com o id, então poderíamos usar o SESSION para pegar o dado do usuario logado
    //DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') AS dt_inclusao_formatada    === com esse comando nós estamos formatando a data para $d dia; $b mes; %Y ano (y maiusculo para sair 4 casas) e %T para sair a hora, detalhe que esse format retorna um valor e esse valor não pode ser mostrado no $registro abaixo, portanto temos que dar um 'alias' (apelido) para ele, para assim conseguirmos recuperar nos resultados
    //o IN quer dizer, se eu achar um valor dentro do IN() que seja igual ao valor t.id_usuario, então é verdadeiro e trás a informação
    //dentro do IN, passamos uma outra query, para trazer todos os valores do campo seguindo_id_usuario quando o id_usuario da tabela usuarios_seguires, for igual ao do usuário logado, ou seja, vou trazer o id de todos os usuários que eu sigo e então conseguirei mostrar todos os meus posts e dos usuários que eu sigo
//******************************************************************************************
//IMPORTANTEEEEEE caso haja algum campo que tenha o mesmo nome nas duas tabelas, por exemplo, t.usuario e u.usuario, poderíamos colocar um alias para um dos campos, por exemplo u.usuario as dieguin, e ai poderíamos, lá no registro, usar o alias para recuperar o campo, igual o do data formatada


    
    //funçao mysqli_query precisa do link para fazer a conexão com o banco e código a ser aplicado que estamos passando através da variável $sql
    $resultado_id = mysqli_query($link,$sql);

    if ($resultado_id) { //caso a variável não seja null, ele vai ler todos os registros
        
        //como podemos ter varios registros por usuário, temos que validar com uma estrutura de validação conforme abaixo
        //ele vai pegando cada registro com a fetch array e passando pra variável registro, quando a fetch_array não conter mais registros, ele irá retornar false e sairá do while
        while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {

            echo '<span id="tweetmouseover_'.$registro['id_tweet'].'" class="list-group-item tweets_publicados" data-id_tweetmouseover="'.$registro['id_tweet'].'">';
                if ($registro['id_usuario'] == $id_usuario ) { //estamos retornando o id_usuario da tabela tweet lá em cima no select

                    //para aparecer o icone da lixeira INICIO
                    echo '<a style="cursor:pointer;" class="list-group-item-text pull-right">'; //cursor pointer para aparecer como objeto selecionavel
                        echo '<small><span style="color: #708090; display: none;" class="glyphicon glyphicon-trash icon_excluir" 
                        id="icone_'.$registro['id_tweet'].'" data-id_tweet="'.$registro['id_tweet'].'"></span></small></a>';
                    //para aparecer o icone da lixeira FIM
                }
                
                echo '<h4 class="list-group-item-heading teste">@'.$registro['usuario'].' <small> - '.$registro['dt_inclusao_formatada'].'</small></h4>';
                echo '<p class="list-group-item-text">'.$registro['tweet'].'</p>';
                
            echo'</span>';

        }
    } else {
        echo 'Erro na consulta de tweets no banco de dados';
    }

?>