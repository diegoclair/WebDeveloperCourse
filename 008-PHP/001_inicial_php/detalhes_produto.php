<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Detalhes do produtos</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>

	<body>
		

		<div class="container">
			<div class="row">
				<h1>Detahes do produto</h1>
			</div>

  			<div class="row">
    			<div class="col-md-4">
					
					<?php

						/* O método get amarzena informações de formulários que estao com método get */
						//nesse exemplo abaixo ele está associado ao value dos <option>, dentro do <select>, dentro do <form>

						//$id_produto = $_GET['id_produto'];


						//O método post passa os dados por requisição, dessa forma, os dados não ficam visiveis na URL igual ao método GET, isso torna o método post mais seguro que o GET

						$id_produto = $_POST['id_produto'];

						$detalhes[1] = "Detalhes da cadeira";
						$detalhes[2] = "Detalhes do fogão";
						$detalhes[3] = "Detalhes do roteador";
						$detalhes[4] = "Detalhes da TV";

						echo $detalhes[$id_produto];
					?>
				</div>
			</div>  			
		</div>
	</body>
</html>