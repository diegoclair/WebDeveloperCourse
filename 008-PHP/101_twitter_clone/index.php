
<?php
//caso o usuário não exista, nós iremos retornar da página validar_acesso.php para essa página index com uma URL escrita com erro após uma '?' . Ou seja, passamos um parametro para ela via GET, portanto iremos sempre consultar esse parametro aqui na index

	//na url informamos erro=1 então ele vai salvar o 1 ná variável erro, se colocassemos erro=abc, ele iria salvar abc no $erro
	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0; 
	//temos que verificar se ele existe e usaremos o if tenário, se ele existe, após interrogação '?' passaremos o valor existente e se ele não existe, após os ":" dois pontos, colocamos então o valor de zero
	
	//echo $erro;

	//após fazer essa validação do erro acimaç, iremos lá embaixo no form de login e após ele iremos colocar um retorno de usuário ou senha inválidos

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
			$(document).ready(function () { //primeiro verifica se todo o document foi carregado
				
				//verificar se os campos de usuário e senha foram devidamente preenchidos
				$('#btn_login').click(function () { //verificar a partir do click do botão entrar
					
					var campo_vazio = false; //para não deixar enviar o form e consultar no banco de dados caso os campos de login estejam vazios

					if($('#campo_usuario').val() == '' && $('#campo_senha').val() == ''){ //verifica se o campo usuario e senha é igual a vazio
						$('#campo_usuario').css({'border-color': '#A94442'}); //vamos pintar a borda de vemelho caso não esteja preenchido
						$('#campo_senha').css({'border-color': '#A94442'});
						campo_vazio = true
					} else if($('#campo_usuario').val() == '') {  
						//se caiu aqui, é porque o campo senha ta preenchido, portanto, deixa senha cinza e pinta o campo usuario de vermehlo
						$('#campo_usuario').css({'border-color': '#A94442'});
						$('#campo_senha').css({'border-color': '#CCC'});
						campo_vazio = true

					} else if($('#campo_senha').val() == ''){ //verifica se o campo senha é igual a vazio
						$('#campo_senha').css({'border-color': '#A94442'});
						$('#campo_usuario').css({'border-color': '#CCC'});
						campo_vazio = true
					}
					
					//verificamos ainda dentro do evento click se os campos estão preenchidos, se não, damos um return false e ai ele não chama o envio do formulário e conseguimos deixar o campo com a borda vermelha
					if (campo_vazio) return false; //quando é apenas uma instrução, não precisamos abrir chaves
				 });
			 });						
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
							<li><a href="inscrevase.php">Inscrever-se</a></li>
							
	            <li class="<?= $erro == 1 ? 'open' : ''?>"> <!-- aqui a tag li com a condição 'if tenário' do php,se tiver a class open, ele fica aberto a tela de login -->
	            	<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
					<ul class="dropdown-menu" aria-labelledby="entrar">
						<div class="col-md-12">
				    		<p>Você possui uma conta?</h3>
								<br />
								<!-- Iremos encaminhar os dados de acesso através do método post para o arquivo validar_acesso.php -->
							<form method="post" action="validar_acesso.php" id="formLogin">
								<div class="form-group">
									<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" />
								</div>
								
								<div class="form-group">
									<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
								</div>
								
								<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

								<br /><br />
								
							</form>

							<?php
								if ($erro == 1) {
									echo '<font color="#FF0000">Usuario e ou senha inválido(s)</font>';
									//para manter a tela de login aberta para mostrar que o usuário digitou errado, temos que lá no Li e abrir uma tag de impressão curta do php e fazer a verificação, para melhor entendimento, assisitr o video da aula 286, seção 17 no tempo 12h40 (efetuando autenticação de usuario parte 2)
								}
							?>
						</form>
				  	</ul>
	            </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	      <!-- Main component for a primary marketing message or call to action -->
	      <div class="jumbotron">
	        <h1>Bem vindo ao twitter clone</h1>
	        <p>Veja o que está acontecendo agora...</p>
	      </div>

	      <div class="clearfix"></div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>