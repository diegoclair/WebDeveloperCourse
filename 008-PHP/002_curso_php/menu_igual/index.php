
<?php
    //O include serve para incluir um outro arquivo como 'conteudo' aqui dentro desse arquivo
    include 'menu.php'; //agora todo o conteúdo do menu.php, está aqui dentro da index
    //por exemplo, aqui temos 3 páginas, a esportes, tecnologia e a index e nas 3, chamamos o menu, dessa forma, se eu quiser alterar o menu, não preciso alterar 3 vezes, eu altero apenas uma vez

    //para incluir os arquivos de outra página, podemos usar o include ou include_once(apenas uma vez, se ja foi incluído, não inclui de novo(exemplo: tenho um arquivo com ma mensagem, se eu escrever vários include, ele vai apresentar essa mensagem do outro arquivo várias vezes, e o include_once, apenas uma)) e o require e o require_once, a diferença dos dois é que quando usamos o include e ele não encontra o arquivo(sl, erramos o nome), ele apresenta um warning e continua executando os códigos seguintes. Já o require, ele tem a mesma função do include, porém ele dá um fatal error ao invés do warning e ele para de executar.

    

?>

<br><br>Index<br><br><br><br><br><br>

Obs: por padrão, sempre que abrimos a pasta do php, ele sempre procura por um arquivo chamado index.php e se ele achar, ele já vai abrir direto