<?php
    // $i=(isset($_POST['valor']) && $_POST["valor"] != "")? $_POST['valor'] : "Falta Valor";   
    $t_mode=$_POST['t-mode'];
    $word_s=$_POST['word-s'];
    $time_zone=$_POST['time-zone'];
    switch($time_zone)
    {
        case'tz-NY':
            $time_zone="Nueva York, USA";
            break;
        case'tz-CDMX':
            $time_zone="CDMX, México";
            break;
        case'tz-BE':
            $time_zone="Berlin, Deutschland";
            break;
    }
    //traduce la fecha al español
    $diasSemana=array('domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado');
    $mes=array(1=>'enero',2=>'febrero',3=>'marzo',4=>'abril',5=>'mayo',6=>'junio',7=>'julio',8=>'agosto',9=>'septiembre',10=>'octubre',11=>'noviembre',12=>'diciembre');
    $dia=$diasSemana[date('w')];
    $fecha=$dia.' '.date('j').' de '.$mes[date('n')].' de '.date('Y');
    //traduce la fecha aleatoria al español
    $rand_time=rand(-10000000000,time()-1000);
    $rand_dia=$diasSemana[date('w',$rand_time)];
    $rand_fecha=$rand_dia.' '.date('j',$rand_time).' de '.$mes[date('n',$rand_time)].' de '.date('Y',$rand_time);
    echo '<p><strong>Fecha de consulta: '.$fecha.' a la(s) '.date("g:i A").' en '.$time_zone.'</strong></p>';
    echo '<p>Fecha de creación de este libro: '.$rand_fecha.'</p>';
?>