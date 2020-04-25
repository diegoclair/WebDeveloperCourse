<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Catálogo de produtos</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>

	<body>
		

		<div class="container">
			<div class="row">
				<h1>Catálogo de produtos</h1>
			</div>
  			<div class="row">
    			<div class="col-md-4">
					<!-- Com o action, nós dizemos a ação do formulário, para onde ele encaminhará as informações, ou seja, com o botão submit lá embaixo, siginifica que iremos submeter as informações para essa mesma página, ou alguma outra, com o mmétodo get ou post, e usaremos o mesmo metodos de get ou post no php para recuperar essas informacoes -->
    				<form role="form" action='detalhes_produto.php' method='post' >
					  <div class="form-group">
					    <label for="Produto">Nome do produto:</label>
						<!-- o name é necessário para o php nós métodos $_GET e $_POST e o id serve para JS e Jquery 
						Quando a página forma a url-encoded ela busca no código os atributos 'name' dos elementos e não no ID, por isso precisamos usar o atributo name quando vamos fazer alguma requisição no servidor-->
					    <select class="form-control" name="id_produto" id="id_produto">
					    	<option value="1">Cadeira</option>
							<option value="2">Fogão</option>
							<option value="3">Roteador wi-fi</option>
							<option value="4">TV 29"</option>
					   	</select>
					  </div>
					  <button type="submit" class="btn btn-default">Ver detalhes</button>
					</form>
    			</div>
    			<div class="col-md-4"></div>
				<div class="col-md-4"></div>
			</div>			
		</div>
	</body>
</html>