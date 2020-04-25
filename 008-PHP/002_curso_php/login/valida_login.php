
<?php

    require_once('funcoes_valida_login.php');

    $user_login = $_POST['login'];  //ele está pegando o que o usuário digitou lá no arquivo login.php, no atributo onde tem o 'name' = 'login
    $user_passowrd = $_POST['password'];

    $usuario_validado = valida_login($user_login,$user_passowrd);
    //Acima, a var $usuario_validado terá um retorno de true ou false da funcao valida_login

    if ($usuario_validado) {
        echo 'Acesso liberado';
    } else {
        echo 'Acesso negado';
    }
    

?>