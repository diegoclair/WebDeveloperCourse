
var rodada = 1;
var matriz_jogo = Array(3);

//fazemos as 3 posicoes/chaves da matriz_jogo, a, b e c
//e cada uma dessas poesicoes, tem 3 posições: a1, a2 e a3; c1,c2.....
matriz_jogo['a'] = Array(3);
matriz_jogo['b'] = Array(3);
matriz_jogo['c'] = Array(3);

//agora vamos criar as 3 posiçoes para cada posição acima
matriz_jogo['a'][1] = 0;
matriz_jogo['a'][2] = 0;
matriz_jogo['a'][3] = 0;

matriz_jogo['b'][1] = 0;
matriz_jogo['b'][2] = 0;
matriz_jogo['b'][3] = 0;

matriz_jogo['c'][1] = 0;
matriz_jogo['c'][2] = 0;
matriz_jogo['c'][3] = 0;


//essa função ós utilizamos paar ter certeza que só iremos fazer qualquer ação aqui quando o document estiver totalmente carregado

$(document).ready(function () {
    
    //todas as funções estão dentro dessa que é do evento de click do botao
    $('#bt_iniciar_jogo').click(function () { 

        //valida se os campos de apelido foram preenchidos
        if ($('#entrada_nm_jogador1').val() == '') {
            alert('Apelido do jogador 1, não foi preenchido');
            return false; 
        }
        if ($('#entrada_nm_jogador2').val() == '') {
            alert('Apelido do jogador 2, não foi preenchido');
            return false; 
        }

        //recuperar os apelidos e exibi-los no span das imagens de quando começa o jogo

        //inserimos na variável um html, para ficar dentro da tag span(do id usado aqui), não utilizamos value, value seria do "input type text" 
        $('#nm_jogador1').html($('#entrada_nm_jogador1').val());
        $('#nm_jogador2').html($('#entrada_nm_jogador2').val());

        //desabilitar a pagina inicial e exibir a pagina de palco
        $('#pagina_inicial').hide();
        $('#palco_jogo').show();
        
    });

    //aplicamos a classe jogada em todas as divs que representam as posições de jogadas, assim conforme abaixo, quando clicar em qualquer posíção, ele irá chamar a '.jogada' abaixo e realizar as condições
    $('.jogada').click(function () { 
        
        //o this, trás toda  a referencia do click! A classe clique está nas 9 divs, quando é clicado em uma delas, vem o this com todas as informações e uma delas é o id, dessa forma conseguiremos recuperar o id que foi clicado com this.id
        var id_campo_clicado = this.id; 

        //toda vez que cada jogar clica em um campo(id), temos que remover a função de click desse id se não o outro jogador consegue jogar no mesmo campo, para isso usamos o off (que remove a associação de eventos associado ao atributo id):
        $('#'+id_campo_clicado).off(); //assim removemos o evento de clique


        //iremos chamar uma função e passar esse id
        jogada(id_campo_clicado);
    });

    function jogada(id) {
        var icone = '';
        var ponto = 0;

        //precisamos saber se qual jogar vai jogar na rodada, uma rodada pra cada
        //vamos usar a var rodada definida la em cima  e ir incrementando ++ e usar o mod % e sempre dividir por 2, o mod sempre identifica se uma divisão tem resto ou não
        //por exemplo:
        // 1 % 2 = 1    - Retornou resto e ele trouxe o número inteiro
        // 2 % 2 = 0    - Não retornou resto
        // 3 % 2 = 1    - vai ter resto e então trouxe 1 
        // 4 % 2 = 0    - Não vai ter resto, então 0 .......
        //note acima que fica  parecido como se tivessemos verificando se o número é par ou é impar

        if ((rodada % 2) == 1) {
            //sempre será o jogador1 aqui, porque achamos que sempre tem que começar com o jogar 1
            icone = 'url("imagens/marcacao_1.png")';
            ponto = -1;

            //abaixo para colocar uma bordar e saber de quem é a vêz
            $('#img_jogador2').css('border', 'solid 1px green');
            $('#img_jogador1').css('border', 'solid 1px white');            
        } else {
            //jogador 2
            icone = 'url("imagens/marcacao_2.png")';
            ponto = 1;
            $('#img_jogador2').css('border', 'solid 1px white');
            $('#img_jogador1').css('border', 'solid 1px green');                
        }
        // a rodada já vem com o valor 1, então colocamos o incremento após o if
        rodada++;

        //primeiro parametro é a propriedade que queremos incluir e o segundo parametro é o valor da propriedade
        //a função recupera apenas o nome do id, aqui temos que concatenar para ficar correto
        $('#'+id).css('background-image', icone);

        //o split quebra o nosso id com base em um dado, portanto, como todos os nossos ids são baseados em a-1; b-2; c-1; .. ele vai quebrar esse id em duas posições, uma para a letra e outra para o numero
        var linha_coluna = id.split('-');
        
        //podemos ver essa quebra com o alert abaixo:
        //alert(linha_coluna[0]);  /**Letra do id */
        //alert(linha_coluna[1]);  /**Numero do id */

        //abaixo vamos passar a informação da posição para a matriz_jogo e colocar o ponto de acordo com o jogador que clicou, conforme definido acima que troca a imagem e coloca o ponto de acordo com o jogador
        matriz_jogo[linha_coluna[0]][linha_coluna[1]] = ponto;

        // tirando a função combinação, podemos testar esse log abaixo para ver como ele vai marcando as posições
        /*
        console.log('------------------------------------');
        console.log(matriz_jogo);
        console.log('------------------------------------');*/

        verifica_combinacao();
    }

    function verifica_combinacao() {
        
    //VERIFICA NA HORIZONTAL
        var pontos = 0;
        for (var i = 1; i <= 3; i++) {
            //nos iremos fazer o for 3 vezes para verificar a linha 'a' e somar os valores que existem no array da matriz jogo (a cada clique está sendo somado acima), para verificar se a soma é igual a 3 ou -3, que define quem ganhou o jogo.
            pontos = pontos + matriz_jogo['a'][i];
        }
        //depois que ele faz o for, quando acaba o for ele chama a função ganhador que verifica quem ganhou
        ganhador(pontos);
        
        //verificou o 'a' e viu que não atingiu, então ele verifica o 'b', mas antes de fazer isso, tenho que zerar a variável, pois na linha b, é uma outra chance de ganhar, então eu faço uma nova contagem
        pontos = 0;
        for (var i = 1; i <= 3; i++) {
            pontos = pontos + matriz_jogo['b'][i];
        }
        ganhador(pontos);

        pontos = 0;
        for (var i = 1; i <= 3; i++) {
            pontos = pontos + matriz_jogo['c'][i];
        }
        ganhador(pontos);


    //VERIFICA NA VERTICAL
  
        for (var l = 1; l <= 3; l++) {
            pontos = 0;
            // mesma coisa:
            //pontos = pontos + matriz...
            //pontos += matriz..
            pontos += matriz_jogo['a'][l];
            pontos += matriz_jogo['b'][l];
            pontos += matriz_jogo['c'][l];
            //ele vai verificar o a1, b1 e c1 e chamar a função para ver se alguem ganhou

            ganhador(pontos);
        }

    //VERIFICAÇÃO NA DIAGONAL
        
        //zeramos a variavel e vamos fazer a diagonal
        pontos = 0;
        pontos = matriz_jogo['a'][1] + matriz_jogo['b'][2] + matriz_jogo['c'][3];
        ganhador(pontos); //verifico uma diagnoal e ja chamo a função, dps verifico a outra

        pontos = 0;
        pontos = matriz_jogo['a'][3] + matriz_jogo['b'][2] + matriz_jogo['c'][1];
        ganhador(pontos);

    }

    function ganhador(pontos) {
        if (pontos == -3) {
            var jogador1 = $('#entrada_nm_jogador1').val();
            alert( jogador1 + ' é o vencedor');  
            $('#img_jogador2').css('border', 'solid 1px white');
            $('#img_jogador1').css('border', 'solid 1px white');  
            
            //quando algum jogador vence, temos que desabilitar a função de click para não ser mais possível que fique clicando e preenchendo os campos:
            $('.jogada').off();
            
        }else if (pontos == 3) {
            var jogador2 = $('#entrada_nm_jogador2').val();
            alert(jogador2 + ' é o vencedor');
            $('#img_jogador1').css('border', 'solid 1px white');
            $('#img_jogador2').css('border', 'solid 1px white');
            $('.jogada').off();
        }
    }

});