<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Su edad es de...</title>
</head>
<body>
    <div class="encabezado">
        <h1>Tu edad es...</h1>
    </div>
    <div class="contenido">
        <?php
            date_default_timezone_set("America/El_Salvador");
            if (isset($_POST['enviar'])) {
                $fechainic = isset($_POST['fechainic'])?$_POST['fechainic']:"";
                $fechanacimiento=new DateTime($fechainic);
                $fechaactual = new DateTime("now");
                $interval = date_diff($fechaactual, $fechanacimiento);
                $y= $interval->format('%y Años');
                $m= $interval->format('%m Meses');
                $d= $interval->format('%d Dias');
                echo "<p>$y $m $d</p>";
                echo "<div class=\"boton\">";
                echo "\t<a id=\"button\" href=\"nacimiento.html\">Regresar</a>";
                echo "</div>";
            }
            else {
                echo '<a href="nacimiento.html">Ingrese una fecha de nacimiento válida</a>';
            }
        ?>
    </div>
</body>
</html>