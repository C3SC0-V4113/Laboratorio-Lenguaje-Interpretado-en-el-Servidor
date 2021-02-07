<?php
    date_default_timezone_set("America/El_Salvador");
    $fechanacimiento=new DateTime("2002-09-06");
    $fechaactual=new DateTime("now");
    $interval = date_diff($fechaactual, $fechanacimiento);
    echo $interval->format('%y Años %m Meses %d Dias');
?>