<?php

    class db {
    //para criar a conexão com o banco de dados mysql, vamos precisar de 4 informações:

        //1 - host - local onde o servidor está instalado, neste caso, no nosso próprio pc (localhost).
        private $host = 'localhost';

        //2 - usuario - podemos definir login e senha no bd, neste caso vamos usar o padrão que é o root
        private $usuario = 'root';

        //3 - senha
        private $senha = '';

        //4 - banco de dados - passa o nome do banco criado lá no phpmyadmin
        private $database = 'twitter_clone';

        public function conecta_mysql(){
            # criar conexão, usaremos a função nativa mysqli_connect :
            //nessa função passaremos 4 parametros e a conexão estará estabelecida

            //usei o this, pois essas variáveis estão fora da function
            $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

            //nós estamos utilizando sempre o padrão UTF-8, portanto temos que dizer que a comunicação php e mysql também se dará com o UTF-8

            //ajustar o charset de comunicação entre a aplicação e o banco de dados, temos que passar a conexão e o tipo de comunicação
            mysqli_set_charset($con, 'utf8'); //assim deixamos a comunicação da aplicação e db iguais, dessa forma, a possibilidade de erro de caractere será quase nula

            //precisamos verificar se houve erro de conexão com o banco de dados
            if (mysqli_connect_errno()) {    //se tiver erro, ele vai retornar alguma coisa aqui
                echo 'Erro ao tentar se conectar com o banco de dados MySQL ' . mysqli_connect_error(); //esse é a descrição do erro
            }

            return $con; //agora basta chamar a função de conexão e ela retornará essa variável de conexão(link de conexao)
        }
    }
    

?>