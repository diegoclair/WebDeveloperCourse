
<?php

    require_once('db.class.php');

    $usuario = $_POST['usuario'];
    $email   = $_POST['email'];
    $senha   = md5($_POST['senha']); //esse md5 serve para criptografar a informação que está dentro dos paranteses dela, ou seja, ele cria um hash com 32 caracteres criptografado, sempre utilizado em senha, até por isso que no banco de dados temos que ter o campo senha com varchar de 32 caracteres.

    $objDb = new db;
    $link = $objDb->conecta_mysql(); //recupera o link de conexão com o db

    $usuario_existe = false;
    $email_existe = false;


    //ANTES DE FAZER O INSERT NO BANCO PRECISAMOS CONFIRMAR SE O EMAIL OU USUARIO JÁ EXISTEM

    //verificar usuario
    $sql = "SELECT * from usuarios where usuario = '$usuario'";
    if($resultado_id = mysqli_query($link,$sql)){ //se ele conseguir conectar, vai trazer os dados de acordo com o nosso select acima e colocar na variável resultado_id
        $dados_usuario = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
        
        if (isset($dados_usuario['usuario'])) { //verificamos se a variável não é vazia
            $usuario_existe = true;
        }

    }else {
        echo 'Erro ao tentar localizar a existência do registro de usuario no banco';
    }

    //verificar email

    $sql = "SELECT * from usuarios where email = '$email'";
    if($resultado_id = mysqli_query($link,$sql)){ //se ele conseguir conectar, vai trazer os dados de acordo com o nosso select acima e colocar na variável resultado_id
        $dados_email = mysqli_fetch_array($resultado_id,MYSQLI_ASSOC);
        
        if (isset($dados_email['email'])) { //verificamos se a variável não é vazia
            $email_existe = true;
        }

    }else {
        echo 'Erro ao tentar localizar a existência do registro de email no banco';
    }


    if($usuario_existe || $email_existe){
        //caso um dos dois exista, iremos sair dessa página registra usuário e voltar ele para a página de inscreva-se

        $retorno_get = '';
        if ($usuario_existe) {
            //colocamos o & para identificar que ali acaba o valor da variável que é apenas um, caso ele concatene, vai parecer que o valor do usuario é :
            //erro_usuario=(1erro_email=1) por exemplo
            $retorno_get.='erro_usuario=1&'; //detalhe que estamos concatenando com o ponto após a variável
        }   

        if ($email_existe) {
            $retorno_get.= 'erro_email=1&';//detalhe que estamos concatenando com o ponto após a variável
        }

        header('Location: inscrevase.php?'.$retorno_get); //aqui o header vai retornar com a informação que precisamos saber, se é o email ou o usuário que existe, ou se é os dois
        die(); //caso ele caia nessa condição e retorne para a página inscrevase, iremos matar aqui o processo para não cadastrar abaixo no banco de dados indevidamente
    }

    //insert    - retorna true ou false
    $sql = "INSERT into usuarios(usuario,email,senha) values('$usuario', '$email', '$senha')"; 
    //aspas duplas verifica se tem um avariável internamente e o aspas simples, usa sempre tudo como texto, para o bd, ele recebe textos (varchar), por isso temos que colocar entre aspas simples para os valores recebidos serem enviados como texto

    //Agora que montamos o sql (query) acima, premcisamos executa-lá
    //passamos o link de conexão e a query para a função acima executar no bd
    if(mysqli_query($link,$sql)){ 
        //precisamos verificar se conseguiu registrar, pois poderíamos ter errado no código e ai daria um erro
        //caso tenha um erro, poderíamos tentar tratar e caso tenha sucesso, poderíamos seguir realizamos alguma ação
        echo 'Registro criado com sucesso';

    } else {
        echo 'Erro ao registrar usuário, contate o suporte.';
    }
    

?>