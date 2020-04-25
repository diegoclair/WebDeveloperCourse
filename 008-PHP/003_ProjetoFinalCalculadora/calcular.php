
<?php

require_once 'classes/calculadora.php'; //para podermos usar o arquivo em que contém as classes, esse método é como se todo o arquivo estivesse aqui dentro

$numero1 = $_POST['numero1'];
$numero2 = $_POST['numero2'];
$operacao = $_POST['operacao']; //colocamos no index para vir um ativo, assim não teremos problemas aqui

if ($numero1 == '' && $numero2 == '') {
    echo 'Preencha os campos de número 1 e número 2';
    return false;

} elseif ($numero1 == '') {
    echo 'Preencha o número 1';
    return false;
    
} elseif ($numero2 == ''){
    echo 'Preencha o número 2';
    return false;
    
} 


    $calculadora = new Calculadora();

    //setar os valores
    $calculadora->setNumero1($numero1);
    $calculadora->setNumero2($numero2);

    switch ($operacao) {
        case 'somar':
           $calculadora->somar();
            break;

        case 'subtrair':
        $calculadora->subtrair();
            break;

        case 'dividir':
        $calculadora->dividir();
            break;

        case 'multiplicar':
        $calculadora->multiplicar();
            break; 

    } 

    echo $calculadora->gettotal();

?>