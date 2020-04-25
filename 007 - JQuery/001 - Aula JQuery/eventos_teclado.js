$(document).ready(function () {
    //Eventos do teclado

    //keydown   - ao clicar em qualquer tecla do teclado
    //keypress  - ao clicar qualquer teclado, desconsiderando esc, alt, shift e etc
    //keyup     - ao clicar qualquer tecla, mas só irá fazer quando eu soltar a tecla que cliquei

    $('#campo1').keydown(function () { 
        alert('A tecla foi pressionada ou solta');
    });

});