var tempoId = null; //variavel vazia que amarzena a chamada da função Timeout

function inicioJogo() {

    var url = window.location.search; //usando o método search, ele recupera apenas o que está a partir da '?', podemos dar um alert para verificar

    var nivel_jogo = url.replace("?", ""); //para remover o caracter de interrogação

    var tempo_segundos = 0;

    if (nivel_jogo == 1) { //1 - facil     = 120 segundos
        tempo_segundos = 120;
    }

    if (nivel_jogo == 2) { //2 - Normal    = 60 segundos
        tempo_segundos = 60;
    }

    if (nivel_jogo == 3) { //3 - dificil   = 30 segundos
        tempo_segundos = 30;
    }

    //atribuir o tempo de segundos dentro do relógio

    //o atributo innerHTML vai inserir o conteúdo dentro da tag (span) do id cronometro, que é onde está o relógio
    document.getElementById('cronometro').innerHTML = tempo_segundos;

    //Quantidade de balões
    var qtd_baloes = 88;

    cria_baloes(qtd_baloes);

    //imprimir qtd baloes inteiros
    //com o innerHTML inserimos o valor dentro da tag onde tem o id baloes_inteiros
    document.getElementById('baloes_inteiros').innerHTML = qtd_baloes;
    document.getElementById('baloes_estourados').innerHTML = 0;

    contagem_tempo(tempo_segundos + 1); //somamos mais 1, pq se não ele já entra na tela com um segundo a menos, e ai ele já perde um segundo
}

function contagem_tempo(segundos) {

    //o método setTimeout faz algo/condicao a cada determinado tempo em milisegundos (1000 milisegundos = 1 segundo)

    //aqui iremos decrementar a variável segundos para escrever ela na innerHTML e depois passar o parametro segundos com o valor menor e assim que passar 1000 milisegundos ele irá chamar de novo a função de contagem de tempo passando um segundo a menos, repetindo o processo
    segundos--;

    //quando esse segundo fica = a 0, temos que escrever logo abaixo no innerHTML, mas quando ele vem de novo com um valor menor que 0, temos que tomar uma ação
    if (segundos == -1) {
        //o clearTimeout para a função de setTimeout e assim ele não irá ficar executando dados negativos infinitamente
        clearTimeout(tempoId);
        //se chegar no valor -1, siginifica que ele não conseguiu estourar todos os balões, portanto chama a função de gamer_over
        gamer_over();
        return false;
    }

    //aqui iremos recuperar o Id de onde tem o valor do cronometro e atualizar o valor do mesmo
    document.getElementById('cronometro').innerHTML = segundos;

    //abaixo ele está chamando a funçao a cada segundo, passando o parametro segundos
    tempoId = setTimeout("contagem_tempo(" + segundos + ")", 1000);
}

function gamer_over() {
    //quando acabar o tempo, não podemos mais clicar nos balões e para isso precisamos remover o evento de onclick dos baloes
    remove_eventos_baloes();
    alert('Fim de Jogo, você não conseguiu estourar todos os balões a tempo');
}

function remove_eventos_baloes() {
    var i = 1; //contado para recuperar balões por id

    //percorre o elementos de acordo com o id e só irá sair do laço quando não houver correspondência com elemento
    while (document.getElementById('b' + i)) {
        //retira o evento onclick do elemnto
        document.getElementById('b' + i).onclick = '';
        i++; //faz a iteração da variávei i
    }
}

document.g

function cria_baloes(qtd_baloes) {

    for (var i = 1; i <= qtd_baloes; i++) {

        //para criar os balões iremos utilizar um método do DOM que é o createElement e falamos o tipo do elemento entre ""
        var balao = document.createElement("img");

        //agora vamos adicionar uma imagem para essa variavel
        balao.src = 'imagens/balao_azul_pequeno.png';

        balao.style.margin = '9px'; //colocar uma margem quando criar os baloes

        //necessário criar um id para cada balão para sabermos depois em qual balão clicamos para alterar a imagem e para isso adicionaremos o id de acordo com o i que está dentro do 'for' e ai conforme o "i" for aumentando, vamos adicionado o id
        balao.id = 'b' + i; //inspecionar elemento do  balão no navegador podemos ver que foi criado um id diferente pra cada;

        //para alterar a imagem do balão para estourado quando o usuario clicar, temos que usar o método onclick e passar uma function referenciando o proprio método, iremos passar todos o elemento em si, ex: dps conseguiremos pegar o id do elemento pq ele tb foi passado
        balao.onclick = function () {
            estourar(this);
        }

        //agora temos que jogar esses balões no id do cenário
        document.getElementById('cenario').appendChild(balao);
        //o método appendChild adiciona os elementos como filho no cenário
        //Se inspecionar o elemento no navegador, podemos perceber que ele vai criar a quantidade de tags de <img> com o src que passamos na var "balao" de acordo com o valor do for each.
    }
}


function estourar(e) {

    //a function recebe todo o elemento passado e amarzena na variavel de entrada "e"
    //Agora conseguimos ir pegando as propriedades do elemento, como por exemplo o id

    var id_balao = e.id;

    //dessa forma abaixo ele altera o balão clicado para a imagem de balão estourado
    document.getElementById(id_balao).src = 'imagens/balao_azul_pequeno_estourado.png';

    //a função cria_baloes atribui o evento de onclick para o balão de acordo com o ID e chama essa função que altera a imagem do balão clicado, porém temos um bug que podemos clicar no mesmo balçao e ele ficará alterando a imagem e chamando a pontução indevidamente.
    //Para isso, temos que remover o evento de onclick uma vez que o balão já foi clicado
    document.getElementById(id_balao).setAttribute("onclick", "");

    //Ao alterar cada imagem acima, nós iremos chamar uma função de pontuação para alterar os dados da pontuação no painel esquerdo
    pontuacao(-1);

}

function pontuacao(acao) {

    //recuperamos abaixo o valor dentro da tag (innerHTML) de acordo com cada id, e ai podemos trabalhar e mudar esse valor que está dentro de cada tag de baloes inteiros e estourados
    var baloes_inteiros = document.getElementById('baloes_inteiros').innerHTML;
    var baloes_estourados = document.getElementById('baloes_estourados').innerHTML;

    baloes_inteiros = parseInt(baloes_inteiros);
    baloes_estourados = parseInt(baloes_estourados);

    //para alterar, podemos usar o proprio ação, que recebeu o valor de -1 quando a função foi chamada
    baloes_inteiros = baloes_inteiros + acao;
    baloes_estourados = baloes_estourados - acao;

    //Em paralelo com o soma e o subtrai acima dos baloes, nós vamos escrevendo com o innerHTML dentro da tag onde tem os números de balao inteiro e estourados conformme abaixo:
    document.getElementById('baloes_inteiros').innerHTML = baloes_inteiros;
    document.getElementById('baloes_estourados').innerHTML = baloes_estourados;

    //agora vamos criar uma função para que ele verifique a cada vez que for dado o click, se zerou a numeração, indicando que ganhou o jogo
    situacao_jogo(baloes_inteiros, baloes_estourados);

}

function situacao_jogo(baloes_inteiros, baloes_estourados) {
    //se os baloes inteiros chegar a zero, significa que ele ganhou, então vamos dar a mensagem e chamar uma função para parar o contador do tempo
    if (baloes_inteiros == 0) {
        alert('Parabens, você conseguiu estourar todos os baloes a tempo');
        parar_jogo();
    }
}

function parar_jogo() {
    clearTimeout(tempoId);
}