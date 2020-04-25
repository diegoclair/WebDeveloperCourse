function exibeElementosPorTag(tag) {
    //chamamos no evento de onclick no botao de exibir elementos
    $(tag).show(); 
}   

function ocultaElementosPorTag(tag) {
    //chamamos no evento de onclick no botao de ocultar elementos
    $(tag).hide();
}   

function exibeElementosPorClasse(classe) {
    //chamamos no evento de onclick no botao de exibir elementos div
    //como iremos fazer por classe, temos que concatenar o ponto antes do nome que passaremos na chamada da função
    //posso colocar a classe em qualquer elemento, input, div, span, p, e quando eu ocultar essa classe ele vai ocultar tudo
    $('.'+classe).show(); 
}   

function ocultaElementosPorClasse(classe) {
    //chamamos no evento de onclick no botao de ocultar elementos div
    //como iremos fazer por classe, temos que concatenar o ponto antes do nome que passaremos na chamada da função
    $('.'+classe).hide();
} 

function exibeElementosPorId(id) {
    //chamamos no evento de onclick no botao de exibir elementos
    //como iremos fazer por Id, temos que concatenar o # antes do nome que passaremos na chamada da função
    $('#'+id).show(); 
}   

function ocultaElementosPorId(id) {
    //chamamos no evento de onclick no botao de ocultar elementos
    //como iremos fazer por Id, temos que concatenar o # antes do nome que passaremos na chamada da função
    $('#'+id).hide();
}  