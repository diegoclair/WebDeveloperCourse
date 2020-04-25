

<?php

date_default_timezone_set('America/Sao_Paulo'); //aqui setamos para pegar a data de são paulo

    //date = Y(ano) - m(mês) - d(dia) - h(hora) - i(minutos) - s(segundos)
    //Y     - ele maiusculo faz com que o ano fique completo(4 casas)
    //y     - ele minusculo apresenta apenas duas casas
    //h     - minusculo mostra 3 horas por exemplo
    //H     - mausculo mostra 15 horas por exemplo

    echo $data = date('d-m/Y H:i:s') .'<br><br>'; 
    //Dentro da funcao date, passamos o formato que queremos

    //para realizar calculo com as datas
    
    $data_inicial = date('2015-04-02');
    $data_final = date('2015-04-05');

    echo 'Data inicial: '. $data_inicial .'<br>'; 
    echo 'Data final: '. $data_final .'<br><br>'; 
    
//strtotime = ele pega uma data qualquer de uma string e converte em segundos
    $time_inicial = strtotime($data_inicial); //converte a data em segundos
    $time_final = strtotime($data_final);

    echo 'Data inicial convertida para segundos(strtotime): ' .$time_inicial .'<br>';
    echo 'Data final convertida para segundos(strtotime): ' .$time_final .'<br><br>';

    $diferenca_times = $time_final - $time_inicial;
    echo 'Diferença em segundos das duas datas: ' .$diferenca_times .'<br><br>';

    $diaSegundos = 24*60*60; //descobrir quantos segundos tem um dia
    echo $diaSegundos. ' é a quantidade de segundos em um dia <br><br>';

    $diferenca_dias = $diferenca_times / $diaSegundos;
    echo 'Portanto a diferença das duas data é de: ' .$diferenca_dias .' dias';

?>



