
<?php
    ;

    /* preciso verificar se a variavel foi iniciada, e se ela está vazia, para então assim eu apresentar uma mensagem*/
    if (isset($_POST['nome']) && empty($_POST['nome'])) {
        echo 'Preencha o nome completo<br>';
        
    } 

    if (isset($_POST['cpf']) && empty($_POST['cpf'])) {
        echo 'Preencha o cpf<br>';
        
    } 

    /**Aqui nós utilizamos o is_numeric com a negação'!', pois se ele NÃO for número, vai entrar como true no if e vai dar a mensagem que precisa ser só números */
    if (isset($_POST['cpf']) && !is_numeric($_POST['cpf'])) {
        echo 'Apenas número no CPF<br>';
        
    }
    
?>





<!-- Se eu ão definir o cation, ele vai enviar os dados do post para a propria página de onde ele está, no caso, essa! o action poderia levar para uma outra página-->

<form action="" method="post">
    <label >
        Nome Completo*:
        <input type="text" name="nome" id="nome">
    </label>
    

    <label>
        CPF*:
        <input type="text" name="cpf" id="cpf">
    </label>
    

    <input type="submit" value="cadastrar">

</form>