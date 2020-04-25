

<?php

    function valida_login($login,$password){   

        //validar direto em uma banco de dados, mas com o bd, iremos aprender somente mais pra frente
        $login_bd = 'diego.rodrigues';
        $password_bd = '123';

        if ($login == $login_bd && $password == $password_bd) {     
            
            return true;
        } else {
            return false;
        }
        
    }

?>