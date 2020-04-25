
<?php
    session_start();

	
    //aqui eu vou validar se a session existe, ou seja, o usuário estava logado em algum momento na mesma sessão da internet (abaixo está com a ! de negação, então estou vendo se ela não existe)
    if (!isset($_SESSION['usuario'])) {
        //se não existir, vou encaminhar ele para minha página inicial com a url de erro
        //podemos tentar acessar a home.php através de janela anônima do chrome para testar
        header('Location: index.php?erro=1');
	};

	
	//para contar o numero de seguidores e de tweets
	require_once('db.class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql(); //recupera o link de conexão com o banco de dados com a função do aquivo db.class.php

	$id_user_logado = $_SESSION['id_usuario'];
	
//recuperar a quantidade de tweets 
	$sql = "SELECT COUNT(*) AS qtd_tweets FROM tweet WHERE id_usuario = $id_user_logado";
	//acima usamos o select count que retorna apenas a quantidade de registro de acordo com as condições passadas, para esse contador, demos um apelido e assim conseguiremos recuperar esse apelido mais abaixo passando como indice do array retornado do fetch_array, o apelido dado ao select

	//funçao mysqli_query precisa do link para fazer a conexão com o banco e código a ser aplicado que estamos passando através da variável $sql
	$resultado_id = mysqli_query($link,$sql);
	$qtd_tweets = 0;

	if ($resultado_id) {
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

		//recuperamos a quantidade de acordo com o indice(que é o nome do alias dado ao select count) para recuperar o seu valor, que é a quantidade de registros encontrado
		$qtd_tweets = ($registro['qtd_tweets']);
		//Essa variável $qtd_tweets pode sser usada em qualquer lugar desse aquivo, até fora das tags de php, portanto iremos colocar ela lá embaixo diretamente 

	} else {
		echo 'Erro ao tentar recuperar a quantidade de twwets';
	}

//recuperar a quantidade de Seguidores
	$sql = "SELECT COUNT(*) AS qtd_seguidores FROM usuarios_seguidores 
	WHERE seguindo_id_usuario = $id_user_logado";
	$resultado_id = mysqli_query($link,$sql);
	
	$qtd_seguidores = 0;

	if ($resultado_id) {
		$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

		//recuperamos a quantidade de acordo com o indice(que é o nome do alias dado ao select count) para recuperar o seu valor, que é a quantidade de registros encontrado
		$qtd_seguidores = ($registro['qtd_seguidores']);
		//Essa variável $qtd_tweets pode sser usada em qualquer lugar desse aquivo, até fora das tags de php, portanto iremos colocar ela lá embaixo diretamente 

	} else {
		echo 'Erro ao tentar recuperar a quantidade de twwets';
	}

?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        
        <!-- Esses dois abaixo são necessários para o autocomplete 
        Para fazer eu ia ter que criar um arquivo a parte para fazer a busca no banco e retornar todos os dados que queremos-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

		<script>
			//jquery 

			//peguei o evento de click do botão tweet:
			$(document).ready( function (){

            //Se clicarem no enter do teclado eu chamo a função para trazer as pessoas
			//esse trecho abaixo eu peguei da internet -> https://memorynotfound.com/detect-enter-keypress-javascript-jquery/

				$('#nome_pessoa').keypress(function(e) {
					var keycode = e.keyCode;
					if (keycode == '13') {
						procuraPessoa();
						//return para evitar que o enter faça um submit no formulário e ai atualiza a página indevidamente
						return (keycode == 13) ? false : true;
					}
				 });

			//Se clicarem no botão Procurar da tela eu chamo a função para trazer as pessoas
				$('#btn_procurar_pessoa').click(function () {
					procuraPessoa();
				 });

				function procuraPessoa() {

					//testar se no momento em que clicou no botão procurar, se foi escrito algum texto:
					if ($('#nome_pessoa').val().length > 0) {
						//com o ajax, vamos chamar o get_pessoa e passar o nome da pessoa para lá
						$.ajax({
							/*iremos passar:
							- arquivo 
							- método que iremos enviar os dados
							- as informações que iremos encaminhar pela requisição
									Neste caso, iríamos passar no formato json, abrindo chaves, dando um nome/chave/indice para o valor a ser enviado e com esse nome/chave, conseguiremos recuperar lá no arquivo .php ex:
									{texto_tweet: $('#texto_tweet').val()}..
									mas se fosse um formulário que teria 40 campos? como fazer? para isso temos a função seralize() que faz essa chave acima automáticamente a partir de um formulário, o seja, ela pega o name do input para formar a chave e colocar o valor dessa chave, tudo de forma automática, da mesma forma que estamos fazendo abaixo
							- e toda ação for um sucesso, realizamos */
							url: 'get_pessoas.php',
							method:'post',
							data: $('#form_procurar_pessoa').serialize(), 
							success: function (data) { 
                                $('#pessoas').html(data);

								//aqui iremos associar o evento de click no botão seguir, e porque aqui? Pq logo após o success é quando teve retorno de todos os dados do banco de dados e já existem os botões seguir do btn_seguir
								$('.btn_seguir').click(function () {
									//para recuperar o id que consta em cada botão, passaremos o this.data e dentro do data, passaremos o valor customizável que foi definido lá no get_pessoas.php como data-id_usuario, porém o data- é o atributo customizavel do html5 e não percisamos passar ele, apenas o valor após dele
									var id_usuario = $(this).data('id_usuario');

									//caso o botão de seguir seja clicado, eu vou recuperar o id e deixar o botão seguir invisivel e mostrar o botão deixar de seguir, como nós já estamos recuperando o id do usuários acima, nós podemos usar ele para concatenar com o nome do Id e ai recuperaremos exatamente o id do botão que foi clicado
									$('#btn_seguir_'+id_usuario).hide();
									$('#btn_deixar_seguir_'+id_usuario).show();
									
									$.ajax({
										url: 'seguir.php',
										method: 'post',
										//aqui embaixo, estamos passando os dados para a página seguir.php através do json, onde dentro de {} definimos a chave/indice que usaremos para recuperar lá na página seguir, e o valor que ele passará para a página, quem vem logo após aos : 2pontos
										data: {seguir_id_usuario: id_usuario},
										success: function (data) {	}
									});
								}); //btn_seguir evento de click

								$('.btn_deixar_seguir').click(function () {
									//para recuperar o id que consta em cada botão, passaremos o this.data e dentro do data, passaremos o valor customizável que foi definido lá no get_pessoas.php como data-id_usuario, porém o data- é o atributo customizavel do html5 e não precisamos passar ele, apenas o valor após dele
									var id_usuario = $(this).data('id_usuario');
									
									//caso o botão de deixar de seguir seja clicado, eu vou recuperar o id e deixar o botão invisivel e mostrar o botão seguir, como nós já estamos recuperando o id do usuários acima, nós podemos usar ele para concatenar com o nome do Id e ai recuperaremos exatamente o id do botão que foi clicado
									$('#btn_deixar_seguir_'+id_usuario).hide();
									$('#btn_seguir_'+id_usuario).show();
									

									$.ajax({
										url: 'deixar_seguir.php',
										method: 'post',
										//aqui embaixo, estamos passando os dados para a página seguir.php através do json, onde dentro de {} definimos a chave/indice que usaremos para recuperar lá na página seguir, e o valor que ele passará para a página, quem vem logo após aos : 2pontos
										data: {deixar_seguir_id_usuario: id_usuario},
										success: function (data) {	}
									});
								}); //btn_deixar_seguir evento de click
                            }
						});
					}
				}
				 
				 //aqui estou dentro do ready, portanto quando a página for carregada, eu irei chamar a função para listar todos os tweets já existentes no banco

	
			}); //ready()
		
		</script>

	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img src="imagens/icone_twitter.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
                <li><a href="home.php">Home</a></li>
                <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	<!-- DIV de coluna a esquerda -->
	    	<div class="col-md-3">
					<div class="panel panel-default"> <!-- panel é uma classe do bootstrap -->
						<div class="panel-body">
							<h4><?= $_SESSION['usuario'] ?></h4>
							<hr>

							<div class="col-md-5"> <!-- Coloquei 5 aqui na primeira pq em um determinado tamanho da página, o texto sseguidores(abaixo) ficava pra fora da caixa -->
								TWEETS <br>
								<?=$qtd_tweets?>
							</div>

							<div class="col-md-6"> 
								SEGUIDORES <br>
								<?=$qtd_seguidores?>
							</div>

						</div>
					</div>
				</div>

	<!-- DIV central -->
	    	<div class="col-md-6">

          		<div class="panel panel-default">
					<div class="panel-body">
						<form id="form_procurar_pessoa" class="input-group">
							<input type="text" name="nome_pessoa" id="nome_pessoa" class="form-control" placeholder="Quem você está procurando" maxlength="140">
							<span class="input-group-btn">
								<button type="button" id="btn_procurar_pessoa" class="btn btn-default">Procurar</button>
							</span>
						</form>
					</div> 
				</div>	<!-- panel -->		

				<div id="pessoas" class="list-group"></div>	

			</div>
	<!-- DIV de coluna a direita -->
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						
					</div>
				</div>
			</div>


		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>