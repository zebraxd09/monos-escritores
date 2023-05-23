<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Monos Escritores</title>
    <link rel="icon" href=".\monos.ico" type="image/x-icon">
</head>

<body align="center" style="background-color: #d7d7d2;">
    <?php
        if(!empty($_POST['t-mode']) && !empty($_POST['word-s']) && !empty($_POST['time-zone']))
        {
            $t_mode=(isset($_POST['t-mode']) && $_POST["t-mode"] != "")? $_POST['t-mode'] : "Falta Valor";
            $word_s=(isset($_POST['t_word-s']) && $_POST["t_word-s"] != "")? $_POST['t_word-s'] : "Falta Valor";
            $time_zone=(isset($_POST['time-zone']) && $_POST["time-zone"] != "")? $_POST['time-zone'] : "Falta Valor";
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
                                $t_word='';
                                for($i=0;$i<$length_word;$i++) 
                                {
                                    $rand_i=rand(0,strlen($all_chars)-1);
                                    $rand_char=$all_chars[$rand_i];
                                    $t_word.=$rand_char;
                                }
                                $i_words[]=$t_word;
                            }
                            // $text=implode(" ",$i_words);
                            // var_dump($i_words);
                            switch($t_mode)
                            {
                                case'tm-normal':
                                    $unidos=implode(" ", $word_s);
                                    array_push($i_words, $unidos);
                                    shuffle($i_words);
                                    foreach($i_words as $valor)
                                    {
                                        if($valor==$unidos)
                                        {
                                            echo '<strong style="color:red";>'.$valor." ".'</strong>';
                                        }
                                        else
                                        {
                                            echo $valor." ";
                                        }
                                    }
                                    break;
                                case'tm-words':
                                    shuffle($word_s);
                                    $t_words=array_merge($i_words, $word_s);
                                    shuffle($t_words);
                                    foreach($t_words as $t_word_s)
                                    {
                                        if(in_array($t_word_s, $word_s))
                                        {
                                            echo '<strong style="color:red";>'.$t_word_s." ".'</strong>';
                                        }
                                        else
                                        {
                                            echo $t_word_s." ";
                                        }
                                    }                                
                                    break;
                                case'tm-disorder':
                                    shuffle($word_s);
                                    $unidos=implode(" ", $word_s);
                                    array_push($i_words, $unidos);
                                    shuffle($i_words);
                                    foreach($i_words as $valor)
                                    {
                                        if($valor==$unidos)
                                        {
                                            echo '<strong style="color:red";>'.$valor." ".'</strong>';
                                        }
                                        else
                                        {
                                            echo $valor." ";
                                        }
                                    }
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
            $rand_time=rand(-1e10,time()-1000);
            $rand_dia=$diasSemana[date('w',$rand_time)];
            $rand_fecha=$rand_dia.' '.date('j',$rand_time).' de '.$mes[date('n',$rand_time)].' de '.date('Y',$rand_time);
            echo '<p><strong>Fecha de consulta: '.$fecha.' a la(s) '.date("g:i A").' en '.$time_zone.'</strong></p>';
            echo '<p>Fecha de creación: '.$rand_fecha.'</p>';
        }
        else
        {
            echo '<h2 align="left">ERROR</h2>';
            echo'<ul align="left">Falta por especificar:';
            echo "<br>";
            if($_POST['t-mode']==false)
            {
                echo "<li>"."Modo de texto"."</li>";
            }
            if($_POST['word-s']==false)
            {
                echo "<li>"."Palabra(s)"."</li>";
            }
            if($_POST['time-zone']==false)
            {
                echo "<li>"."Zona horaria"."</li>";
            }
        }
    ?>
</body>

</html>