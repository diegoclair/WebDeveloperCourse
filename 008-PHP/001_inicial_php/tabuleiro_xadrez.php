
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Array - Tabuleiro Xadrez</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <h1 class="text-center">Hello World</h1>

        <?php
        //para entender o array abaixo você pode ver essa imagem do tabileiro: http://4.bp.blogspot.com/_9WyVLFpkVm8/SYzmT3T-hFI/AAAAAAAAAAo/qK2Mpnm4pHw/s400/n1.gif
            
            $tabueiro[8]['a'] = 'torre preta';
            $tabueiro[8]['b'] = 'bisto preta' ;
            $tabueiro[8]['c'] = 'cavalo preta';
            $tabueiro[8]['d'] = 'rainha preta';
            $tabueiro[8]['e'] = 'rei preta';
            $tabueiro[8]['f'] = 'bispo preta';
            $tabueiro[8]['g'] = 'cavalo preta';
            $tabueiro[8]['h'] = 'preta preta';

            $tabueiro[7]['a'] = 'peão preto';
            $tabueiro[7]['b'] = 'peão preto';
            $tabueiro[7]['c'] = 'peão preto';
            $tabueiro[7]['d'] = 'peão preto';
            $tabueiro[7]['e'] = 'peão preto';
            $tabueiro[7]['f'] = 'peão preto';
            $tabueiro[7]['g'] = 'peão preto';
            $tabueiro[7]['h'] = 'peão preto';

            print_r($tabueiro);
            echo('<br><br>');
            echo($tabueiro[8]['d']);
            echo($tabueiro[8]['h']);
            
            //e por ai vai, agora seria somente ir criando o resto

           /* $tabueiro[6]['a'] = '';
            $tabueiro[6]['b'] = '';
            $tabueiro[6]['c'] = '';
            $tabueiro[6]['d'] = '';
            $tabueiro[6]['e'] = '';
            $tabueiro[6]['f'] = '';
            $tabueiro[6]['g'] = '';
            $tabueiro[6]['h'] = '';
            
            $tabueiro[6][]
            $tabueiro[5][]
            $tabueiro[4][]
            $tabueiro[3][]
            $tabueiro[2][]
            $tabueiro[1][]*/
            

        ?>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
