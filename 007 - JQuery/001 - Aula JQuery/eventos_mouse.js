//agora nós vamos chamar os elementos JavaScript 

//S eu tentar associar um elemento que ainda não foi formado no DOM, vai dar um erro
//portanto usamos a função ready para fazer a função apenas quando o elemento DOM já estiver todo carregado
$(document).ready(function () {
    
    //função que captura evento dou mouse sobre o elemento
    //click         - Ao dar o click e soltar
    //dblclick      - Ao dar dois clicks
    //mousedown     - Ao dar o click, não preciso soltar
    //mouseover     - ao passar por cima do item
    //mouseout      - ao tirar do foco do item

    $('#div1').mouseover(function () { 
        alert('Elemento foi clicado');
        
    });
});