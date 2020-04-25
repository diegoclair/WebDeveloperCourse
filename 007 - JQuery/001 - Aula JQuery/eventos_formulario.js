$(document).ready(function () {
    //focus
    //blur
    //change

    $('#campo1').focus(function () { 
        //como sabemos desde a aula de javascript, com as atualizações dos navegadores ao usar o alert, ele retira o foco do input e quando você clica ok, ele volta o foco novamente e apresenta a mensagem, gerando um looping infinito, portanto usaremos o console.log aqui para os testes, essa função pode ser usadas para outras coisas, o problema é só de usa-la com o alert
        alert('recebeu foco');
        
    });

    $('#campo2').blur(function () { 
        alert('perdeu foco');
        
    });

    $('#campo3').change(function () { 
        //depois que eu fiz uma alteração e clico fora, ele apresenta a mensagem, se eu não alterar, nao apresenta a mensagem.. é tipo: você deseja sair sem salvar?
        alert('foi modificado');
        
    });

    $('#select1').change(function () { 
        //depois que eu fiz uma alteração e clico fora, ele apresenta a mensagem, se eu não alterar, nao apresenta a mensagem.. é tipo: você deseja sair sem salvar?
        alert('foi modificado');
        
    });
});