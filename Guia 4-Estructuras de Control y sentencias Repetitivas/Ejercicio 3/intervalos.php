<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucle Do-While</title>
    <link rel="stylesheet" href="css/intervalos.css">
    <link rel="stylesheet" href="css/jquery-responsiveTables.css">
    <script src="js/modernizr.custom.lis.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery||document.write('<script src="js/jquery-1.12.0.min.js"><\/script>')</script>
    <script src="js/jquery-responsiveTables.js"></script>
    <script src="js/jquery.responsiveText.js"></script>
    <script>
        $(document).ready(function(){
            $('.responsive').not('table').responsiveText();
            $('table.responsive').responsiveTables();
        });
    </script>
</head>
<body>
    <header>
        <h1>Ciclos, lazos o bucles</h1>
    </header>
    <section>
        <?php
        $min=1;
        echo "<article>";
        echo "<div id=\"main\">";
        echo "<h2 class=\"subheading responsive\" data-compression=\"25\" data-min=\"14\" data-max=\"40\">Ejemplos con el lazo o bucle <em>do-while</em></h2>";
        echo "</article>";
        echo "<p>\n";
        echo "Esta iteración sencilla con ";
        echo "<em>do-while</em> imprime una serie de ";
        echo "20 números enteros\n";
        echo "</p>\n";
        echo "<table class=\"responsive\" data-min=\"11\" data-max=\"30\" cellpadding=\"0\" cellspacing=\"0\">\n";
        echo "\t<tbody>\n";
        echo "\t\t<tr>\n";
        do {
            echo "<td>$min</td>\n";
            $min++;
        } while ($min <= 20);
        echo "\t\t</tr>\n";
        echo "</tbody>\n";
        echo "</table>\n";
        $min=1;
        $max=100000;
        echo "<p>&nbsp;</p>\n<p>&nbsp;</p>\n";
        echo "<p>\nLa siguiente iteracion muestra ";
        echo "el total de números pares en un ";
        echo "intervalo que va desde $min hasta $max\n</p>\n";
        $contador=0;
        if ($max<$min) {
            $temp=$max;
            $max=$min;
            $min=$temp;
        }
        echo "<table class=\"responsive\" data-min=\"11\" data-max=\"30\" cellpadding=\"0\" cellspacing=\"0\">\n";
        echo "\t<tr>\n";
        echo "\t\t<td>El valor m&iacute;nimo de la serie es:</td>\n";
        echo "\t\t<td>$min</td>\n";
        echo "\t\t<td>El valor máximo de la serie es:</td>\n";
        echo "\t\t<td>$max</td>\n";
        echo "\t</tr>\n</table>\n";
        do {
            if ($min%2==0) {
                $contador++;
            }
            $min++;
        } while ($min <= $max);
        echo "<table class=\"responsive\" data-min=\"11\" data-max=\"30\" cellpadding=\"0\" cellspacing=\"0\">\n";
        echo "\t<tr>\n<td>\n";
        echo "El total de números ";
        echo "pares en este intervalo es:\n</td>\n";
        echo "\t\t<td>$contador</td>\n";
        echo "\t</tr>\n";
        echo "</table>\n";
        ?>
    </section>
</body>
</html>