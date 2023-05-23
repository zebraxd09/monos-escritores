<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Monos Escritores</title>
    <link rel="icon" href=".\monos.ico" type="image/x-icon">
</head>

<body align="center" style="background-color: #d7d7d2;">
    <?php
        // $i=(isset($_POST['valor']) && $_POST["valor"] != "")? $_POST['valor'] : "Falta Valor";   
        $t_mode=$_POST['t-mode'];
        $word_s=$_POST['word-s'];
        $time_zone=$_POST['time-zone'];
        $word_s=explode(" ", $word_s);
        $length_text=251-count($word_s);        
        echo '<table align="center" border="1" style="border-collapse:collapse; " cellpadding="30px">';
            echo '<thead>';
                echo '<tr>';
                    echo '<th><strong>Libro número: ';
                    for($i=1;$i<=10;$i++) 
                        { 
                            $mayus=rand(65,90);
                            $minus=rand(98,122);
                            $decide=rand(1,3);
                            switch($decide)
                            {
                                case'1':
                                    echo chr($mayus);
                                    break;
                                case'2':
                                    echo chr($minus);
                                    break;
                                case'3':
                                    echo rand(0,9);
                                    break;
                            }
                        }
                    echo '</strong></th>';
                echo '</tr>';
            echo '</thead>';
            echo '<tbody align="center">';
                echo '<tr>';
                    echo '<td>';
                        $i_words=array();
                        $all_chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                        while(count($i_words)<$length_text) 
                        {
                            $length_word=rand(1,10);
                            $word='';
                            for($i=0;$i<$length_word;$i++) 
                            {
                                $rand_i=rand(0,strlen($all_chars)-1);
                                $rand_char=$all_chars[$rand_i];
                                $word.=$rand_char;
                            }
                            $i_words[]=$word;                            
                        }                    
                        $text=implode(" ",$i_words);
                        echo $text;    
                        switch($t_mode)
                        {
                            case'tm-normal':
                                // normal();
                                break;
                            case'tm-words':
                                break;
                            case'tm-order':
                                break;
                        }
                    echo '</td>';
                echo '</tr>';
            echo '</tbody>';
        echo '</table>';
        echo '<br>';
        switch($time_zone)
        {
            case'tz-NY':
                $time_zone="Nueva York, USA";
                date_default_timezone_set("America/New_York");
                break;
            case'tz-CDMX':
                $time_zone="CDMX, México";
                date_default_timezone_set("America/Mexico_city");
                break;
            case'tz-BE':
                $time_zone="Berlin, Deutschland";
                date_default_timezone_set("Europe/Berlin");
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
        echo '<p>Fecha de creación: '.$rand_fecha.'</p>';
    ?>
</body>

</html>