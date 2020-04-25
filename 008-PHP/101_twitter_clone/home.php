
<?php
    session_start();

    //aqui eu vou validar se a session existe, ou seja, o usuário estava logado em algum momento na mesma sessão da internet (abaixo está com a ! de negação, então estou vendo se ela não existe)
    if (!isset($_SESSION['usuario'])) {
        //se não existir, vou encaminhar ele para minha página inicial com a url de erro
        //podemos tentar acessar a home.php através de janela anônima do chrome para testar
        header('Location: index.php?erro=1');
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
	
		<script>
			//jquery 

			//peguei o evento de click do botão tweet:
			$(document).ready( function (){
				var id_tweet_global = '';
			//Se clicarem no botão Tweet da tela eu chamo a função para incluir
				$('#btn_tweet').click(function () {
					incluirTweet();
					//assim que for incluído o tweet, eu chamo a função php para atualizar a quantidade de tweets
					
				 });

			//Se clicarem no enter do teclado eu chamo a função para incluir
			//esse trecho abaixo eu peguei da internet -> https://memorynotfound.com/detect-enter-keypress-javascript-jquery/

				$('#texto_tweet').keypress(function(e) {
					var keycode = (e.keyCode ? e.keyCode : e.which);
					if (keycode == '13') {
						incluirTweet();

						//return para evitar que o enter faça um submit no formulário e ai atualiza a página indevidamente
                        return (keycode == 13) ? false : true;
					}
				 });

				
				function incluirTweet() {

					//testar se no momento em que clicou no botão tweet, se foi escrito algum texto:

					if ($('#texto_tweet').val().length > 0) {
						//com o ajax, vamos chamar o inclui_tweet e passar o texto para lá
						$.ajax({
							/*iremos passar:
							- arquivo 
							- método que iremos enviar os dados
							- as informações que iremos encaminhar pela requisição
									Neste caso, iremos passar no formato json, abrindo chaves, dando um nome/chave/indice para o valor a ser enviado e com esse nome/chave, conseguiremos recuperar lá no arquivo .php ex:
									{texto_tweet: $('#texto_tweet').val()}..
									mas se fosse um formulário que teria 40 campos? como fazer? para isso temos a função seralize() que faz essa chave acima automáticamente a partir de um formulário, o seja, ela pega o name do input para formar a chave e colocar o valor dessa chave, tudo de forma automática, da mesma forma que estamos fazendo abaixo
							- e toda ação for um sucesso, realizamos */
							url: 'inclui_tweet.php',
							method:'post',
							data: $('#form_tweet').serialize(), 
							success: function (data) { 
							//Após realizar a inclusão dos dados no banco sql e ter retornado com sucesso, nós temos que limpar o campo do tweet
							$('#texto_tweet').val('');

							//caso eu inclua um tweet, tenho que chamar a função abaixo para reler os twwets do banco e já trazer o novo
							atualizaTweet();
							//detalhe importante do ajax que ao chamar essa função atualizaTweet, ele atualiza os dados dos tweets trazendo o que acabou de ser incluído sem atualizar a página.
	 						}

						});
					}
				}
				 
				 //aqui estou dentro do ready, portanto quando a página for carregada, eu irei chamar a função para listar todos os tweets já existentes no banco

				 function atualizaTweet(){
					 //carrega os tweets

					 $.ajax({
						 url: 'get_tweet.php',
						 success: function(data) {
							 //se tivermos sucesso, iremos passar os dados para nossa div de list central
							 $('#tweets').html(data); //a função html é igual a innerhtml do js

					//INICIO - para colocar a lixeira somente quando estiver com o mouse em cima de um tweet do usuário logado
							 $('.tweets_publicados').mouseover(function () {  
								var id_tweet = $(this).data('id_tweetmouseover');
						 			$('#icone_'+id_tweet).css('display', 'block');
								 });
							$('.tweets_publicados').mouseout(function () {  
								var id_tweet = $(this).data('id_tweetmouseover');
							$('#icone_'+id_tweet).css('display', 'none');
							});
					//INICIO - para colocar a lixeira somente quando estiver com o mouse em cima de um tweet do usuário logado
								 
							 $('.icon_excluir').click(function () {

								var id_tweet = $(this).data('id_tweet');
																
								$.ajax({
									url: 'atualiza_tweet_seguidores.php',
									method: 'post',
									//aqui embaixo, estamos passando os dados para a página seguir.php através do json, onde dentro de {} definimos a chave/indice que usaremos para recuperar lá na página seguir, e o valor que ele passará para a página, quem vem logo após aos : 2pontos
									data: {function: 'deleta_tweet', id_tweet : id_tweet},
									success: function (data) {	
										atualizaTweet();
									}
								});

							});
						 }
					 });
					 
					 
					//atualizar a quantidade de tweets e seguidores
					$.ajax({
						 url: 'atualiza_tweet_seguidores.php',
						 method: 'post',
						 data:{function : 'atualiza_tweets'},
						 success: function(data) {
							$('#qtd_tweets').html(data);
						 }
					 });

					 $.ajax({
						 url: 'atualiza_tweet_seguidores.php',
						 method: 'post',
						 data:{function : 'atualiza_seguidores'},
						 success: function(data) {
							$('#qtd_seguidores').html(data);
						 }
					 });
				 }

				 //necessário chamar a função acima para que ela seja executada
				 atualizaTweet();

				 

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
								<span id="qtd_tweets"></span>
							</div>

							<div class="col-md-6"> 
								SEGUIDORES <br>
								<span id="qtd_seguidores"></span>
							</div>

						</div>
					</div>
				</div>

	<!-- DIV central -->
	    	<div class="col-md-6">

          		<div class="panel panel-default">
					<div class="panel-body">
						<form id="form_tweet" class="input-group">
							<input type="text" name="texto_tweet" id="texto_tweet" class="form-control" placeholder="O que está acontecendo agora?" maxlength="140">
							<span class="input-group-btn">
								<button type="button" id="btn_tweet" class="btn btn-default">Tweet</button>
							</span>
						</form>
					</div> 
				</div>	<!-- panel -->		

				<div id="tweets" class="list-group"></div>	

			</div>
	<!-- DIV de coluna a direita -->
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h4><a href="procurar_pessoas.php">Procurar por pessoas</a></h4>
					</div>
				</div>
			</div>


		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>