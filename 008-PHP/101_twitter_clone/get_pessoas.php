
<?php

session_start();

//aqui eu vou validar se a session existe, ou seja, o usuário estava logado em algum momento na mesma sessão da internet (abaixo está com a ! de negação, então estou vendo se ela não existe)
if (!isset($_SESSION['usuario'])) {
    //se não existir, vou encaminhar ele para minha página inicial com a url de erro
    //podemos tentar acessar a home.php através de janela anônima do chrome para testar
    header('Location: index.php?erro=1');
}

require_once('db.class.php');

$nome_pessoa = $_POST['nome_pessoa']; //o formulário criou essa chave('nome_pessoa') com o name do campo, e enviou via post para cá, e aqui recuperamos o valor dele
$id_usuario = $_SESSION['id_usuario'];

$objDb = new db();
$link = $objDb->conecta_mysql(); //recupera o link de conexão com o banco de dados com a função do aquivo db.class.php

//vou pesquisar todos os usuários no banco de dados, exceto o meu mesmo, eu não posso me achar e me seguir
//usaremos o like ao invés do igual, essa função serve para para pesquisar por partes, por exemplo, se eu tenho um usuario chamada fernanda e pesquiso por nanda a função like vai trazer ela, se fosse =, ele não trazeria
//para usar o like, temos que usar o percentual de um lado e/ou do outro, isso, se eu usar na esquerda e escrever nanda, ele vai trazer fernanda, mas se eu escrever fer, ene não vai trazer, pq ele só está aceitando o final completo, por isso usamos dos dois lados o %
//essa query abaixo foi testada no banco de dados antes para verificar se está funcionando corretamente
$sql = "SELECT u.*,us.* 
FROM usuarios AS u
LEFT JOIN usuarios_seguidores AS us 
ON (us.id_usuario = $id_usuario AND u.id = us.seguindo_id_usuario)
WHERE u.usuario LIKE '%$nome_pessoa%' AND u.id <> $id_usuario";
/*explicando a consulta acima: AULA 307 da seção 17
estamos selecionando tudo da tabela 'u' e tudo da tabela 'us'
e para relacionar as duas tabelas ON, usaremos que na tabela US o id usuário tem que ser igual ao id do usuário logado, ou seja, traremos da tabela US, apenas os dados de quem o usuario logado segue, ou seja, estamos limitando a quantidade de registro que queremos cruzar com as duas tabelas
linkando com os usuários que serão listados, eu vou verificar os dados deles na tabela usuarios, para verificar se existe algum registro que seja compatível com a tabela de usuários, ou seja, se eu estou seguindo essa pessoa, ela deve existir na tabela usuários pois em algum momento ela foi cadastrada, portanto se essa pessoa que eu sigo, deletar a conta, com essa correlação que foi feita, eu não mostraria a pessoa que eu sigo, pois ela deletou a conta, mesmo existindo o registro ainda no meu banco de dados
*/

//funçao mysqli_query precisa do link para fazer a conexão com o banco e código a ser aplicado que estamos passando através da variável $sql
$resultado_id = mysqli_query($link,$sql);

if ($resultado_id) { //caso a variável não seja null, ele vai ler todos os registros
    
    //como podemos ter varios registros por usuário, temos que validar com uma estrutura de validação conforme abaixo 
    //ele vai pegando cada registro com a fetch array e passando pra variável registro, quando a fetch_array não conter mais registros, ele irá retornar false e sairá do while
    while ($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {
        echo '<a href="#" class="list-group-item">';
            echo '<strong>@'.$registro['usuario'].'</strong> <small> - '.$registro['email'].' </small>';
            echo '<p class="list-group-item-text pull-right">'; //esse pull right fará flutuar a direita

                //de acordo com o retorno do banco de dados, iremos saber quem a pessoa já segue ou não segue ainda e com base nisso iremos decidir qual botão iremos mostrar, se é o de seguir ou o deixar de seguir
                //vamos verificar com um teste ternário se od id_usuario_seguidor está preenchido e é diferente de nulo(!empty() empty com negação !) 
                //esse campo id_usuario_seguidor só retornará preenchido do banco de dados se eu sigo a pessoa ou não)
                $esta_seguindo_usuario_sn = isset($registro['id_usuario_seguidor']) && !empty($registro['id_usuario_seguidor']) ? 'S' : 'N';
                //se tiver preenchido e não for nulo, eu atribuo o valor S e caso contrário, eu atribuo o valor N

            //o display block vai ocupar toda posição do botão e mostrar ele é claro, portanto neste momento estamo mostrando os dois
                $btn_seguir_display = 'block'; 
                $btn_deixar_seguir_display = 'block';

            //e agora iremos definir qual dos dois iremos ocutar com base se o usuário já é seguido ou nao pelo usuário que está logado
                if ($esta_seguindo_usuario_sn == 'N') {
                    $btn_deixar_seguir_display = 'none';
                } else {
                    $btn_seguir_display = 'none';
                }
                //passaremos o valor de none ou block para a os dois botões abaixo dentro do style="display"

                #BOTÃO SEGUIR
                echo '<button type"button" id="btn_seguir_'.$registro['id'].'" class="btn btn-primary btn_seguir" data-id_usuario="'.$registro['id'].'" style="display:'.$btn_seguir_display.'">Seguir</button>';
                //adicionamos a classe btn_seguir somente para conseguirmos recuperar o evento de click nele
                //existe um atributo customizável no html5 que é o data- ai na frente dele criamos o atributo e passamos o valor que queremos, neste caso, iremos passar o id, indice da variável registro, que retornou todos os usuários da tabela de usuários, ou seja, trouxe todos os nomes, emails e id de cada um, para testar, podemos pesquisar qualquer usuario no campo, clicar com o botao direito no botão seguir e verificar o dado atribuído nele, será igual ao id dentro do banco de dados de acordo com cada usuario
                //usamos esse data- para poder recuperar ele lá na procurar_pessoas.php no método: $(this).data();
                //colocamos um id para cada botao de seguir e deixar de seguir, e concatemos com o código(id) do respectivo usuario, para assim conseguirmos ter um id único para cada botão, mesmo se tiver mil usuários na pesquisa

                #BOTÃO DEIXAR DE SEGUIR
                echo '<button type"button" id="btn_deixar_seguir_'.$registro['id'].'" class="btn btn-danger btn_deixar_seguir" data-id_usuario="'.$registro['id'].'" style="display:'.$btn_deixar_seguir_display.'">Deixar de seguir</button>';

                //o paragrafo com pull right, perde a referencia de posição e fica sobrepondo na lista, para resolver isso vamos usar o clearfix em uma div abaixo
                echo '<div class="clearfix" style="margin: -7px"></div>'; 
                //coloquei um margin-7 para não ficar tão grande embaixo do botao
            echo '</p>';
        echo'</a>';

    }
} else {
    echo 'Erro na consulta de usuarios no banco de dados';
}

?>