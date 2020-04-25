<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="estilo.css">
		<title>Mensagens divertidas</title>
	</head>

	<body>
		<!-- tag padrao -->
		<?php 
		 	/* os dois abaixo tem a mesma finalidade de impressao na tela, porém o print tem uma finalidade de retornar um valor, ele retorna 1 pra conseguiu imprimir e 0 para falha, portanto ele tende a ser mais demorado */
			echo 'Teste tag padrão (echo) <br>';

			print 'Tesde de impressao print <br>';


			//VARIAVEIS

		//int
			$valor_inteiro = 1 * 4;
			echo $valor_inteiro;
			echo '<br>';
			$valor_inteiro = $valor_inteiro * 2;
			echo $valor_inteiro;
			echo '<br>';

		//float
			$valor_fracionado = 10.7;
			echo $valor_fracionado;
			echo '<br>';
			
		//boolean
			$estado = true; //imprime 1 pra true e 'nada' pra false
			echo $estado;
			echo '<br>';

		//string
			$texto = 'Curso de php - '.$valor_inteiro ;
			//para concatenar no php usaremos '.'
			echo $texto;
			echo '<br>';

			//Se a gente usar aspas duplas "", podemos concatenar dentro das aspas e ele entenderá
			//se tivermos apenas texto mesmo, é melhor usar aspas simples '', pois a dupla ele vai tentar verificar se existe alguma variável dentro de todo o texto
			$texto = "Curso de php 2 - $valor_inteiro";
			echo $texto;
			echo '<br>';

			//ao usar aspas simples, ele imprime o valor como texto:
			$texto = 'Curso de php 3 - $valor_inteiro';
			echo $texto;
			echo '<br>';

		//array  - Podemos atrubuir variáveis nos campos tambem

			//1 opcao de array
			//podemos definir o array passando uma letra ou texto e tambem com números
			$mensagens_divertidas['a'] = 'Quem cedo madruga, fica com sono o dia todo!';
			$mensagens_divertidas['b'] = 'Eu sempre fui pobre, mas esse mês estou de parabéns!';
			$mensagens_divertidas[3] = 'Para entender o francês necessito de três coisas: que falem devagar, em voz alta e em português.';
			$mensagens_divertidas[4] = 'Eu nunca cometo o mesmo erro duas vezes… Cometo umas cinco vezes, só pra ter certeza que é errado mesmo!';
			$mensagens_divertidas[5] = 'Atenção! Obrigada pela atenção. Pode voltar ao que estava fazendo.';

			//segunda opção de array, separado por virgula
			/*
			$mensagens_divertidas = array('Quem cedo madruga, fica com sono o dia todo!',
										  'Eu sempre fui pobre, mas esse mês estou de parabéns!',
										  'Para entender o francês necessito de três coisas: que falem devagar, em voz alta e em português.',
										  'Eu nunca cometo o mesmo erro duas vezes… Cometo umas cinco vezes, só pra ter certeza que é errado mesmo!',
										  'Atenção! Obrigada pela atenção. Pode voltar ao que estava fazendo.');*/


			//o echo nao imprime o array inteiro, temos as duas opções abaixo para imprimir todo o array:
			var_dump( $mensagens_divertidas );
			echo '<br>'; echo '<br>';
			print_r( $mensagens_divertidas );
			echo '<br>'; echo '<br>';

			//com o echo eu vou conseguir imprimir se passarmos o indice pra ele
			echo $mensagens_divertidas['a'];

			echo '<br>'; echo '<br>';
		?>


		<!-- tag de impressao -->
		
		<?='Teste tag impressao <br>'?>


		


	</body>
</html>