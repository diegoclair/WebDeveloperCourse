<?php

    session_start();

    //para eliminarmos os dados dessa sessão, podemos usar a função unset
    unset($_SESSION['usuario']);
    unset($_SESSION['email']);
    header('Location: index.php');
    //ao fechar o navegador no "X" ele elimina essa sessão também!

?>