<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones Matriciales</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Funciones Matriciales</h1>
    <?php
        //Range
        $range=range(1,10,2);
        echo "<section>";
        echo '<h2>Range</h2>';
        echo "<p>Genera una matriz de valores en sucesión aritmética</p>";
        echo "<div class=\"Array\">";
        foreach ($range as $key => $value) {
            echo "<div class=\"segmento\">";
            echo "<p>$value</p>";
            echo '</div>';
        }
        echo '</div>';
        echo "</section>";

        //Merge
        $uno=['Francisco','Andy','Edward'];
        $dos=['Rodrigo','Mauricio'];
        $final=array_merge($uno,$dos);
        echo "<section>";
        echo '<h2>Merge</h2>';
        echo "<p>mezcla dos o más matrices en una única matriz.</p>";
        echo "<div class=\"Array\">";
        foreach ($uno as $key => $value) {
            echo "<div class=\"segmento\">";
            echo "<p>$value</p>";
            echo '</div>';
        }
        echo '</div>';
        echo "<div class=\"Array\">";
        foreach ($dos as $key => $value) {
            echo "<div class=\"segmento\">";
            echo "<p>$value</p>";
            echo '</div>';
        }
        echo '</div>';
        echo "<p>Resultado:</p>";
        echo "<div class=\"Array\">";
        foreach ($final as $key => $value) {
            echo "<div class=\"segmento\">";
            echo "<p>$value</p>";
            echo '</div>';
        }
        echo '</div>';
        echo "</section>";

        //count
        $nombres=['Francisco','Andy','Edward','Rodrigo','Mauricio'];
        echo "<section>";
        echo '<h2>Count</h2>';
        echo "<p>Permite contar los elementos de una matriz</p>";
        echo "<div class=\"Array\">";
        foreach ($nombres as $key => $value) {
            echo "<div class=\"segmento\">";
            echo "<p>$value</p>";
            echo '</div>';
        }
        echo '</div>';
        echo '<p>La cantidad de elementos es:'.count($nombres).'</p>';
        echo "</section>";

        //count_values
        $repetidos=['Francisco','Edward','Rodrigo','Mauricio','Francisco','Andy','Francisco','Mauricio','Andy'];
        echo "<section>";
        echo '<h2>count_values</h2>';
        echo "<p>Cuenta cuántos valores hay de cada valor de una matriz.</p>";
        echo "<div class=\"Array\">";
        foreach ($repetidos as $key => $value) {
            echo "<div class=\"segmento\">";
            echo "<p>$value</p>";
            echo '</div>';
        }
        echo '</div>';
        $contador=array_count_values($repetidos);
        //Tabla
        echo "<table>";
        foreach ($contador as $key => $value) {
            echo "\t<tr>";
            echo "<th>$key</th><th>$value</th>";
            echo "\t</tr>";
        }
        echo "</table>";
        echo "</section>";

        //Maximo y Minimo
        $numeros=[2,5,99,103,7];
        echo "<section>";
        echo '<h2>Maximo y Minimo</h2>';
        echo "<p>Devuelve el valor máximo o minimo de una matriz</p>";
        echo "<div class=\"Array\">";
        foreach ($numeros as $key => $value) {
            echo "<div class=\"segmento\">";
            echo "<p>$value</p>";
            echo '</div>';
        }
        echo '</div>';
        echo '<p>El valor máximo es: '.max($numeros).'</p>';
        echo '<p>El valor minimo es: '.min($numeros).'</p>';
        echo "</section>";

        //Unique
        $repetidos=['Francisco','Edward','Rodrigo','Mauricio','Francisco','Andy','Francisco','Mauricio','Andy'];
        echo "<section>";
        echo '<h2>Unique</h2>';
        echo "<p>Devuelve una matriz en la que se han eliminado los valores repetidos.</p>";
        echo "<div class=\"Array\">";
        foreach ($repetidos as $key => $value) {
            echo "<div class=\"segmento\">";
            echo "<p>$value</p>";
            echo '</div>';
        }
        echo '</div>';
        $unicos=array_unique($repetidos);
        //Aplicando el Unique
        echo "<div class=\"Array\">";
        foreach ($unicos as $key => $value) {
            echo "<div class=\"segmento\">";
            echo "<p>$value</p>";
            echo '</div>';
        }
        echo '</div>';
        echo "</section>";

    ?>
    <footer>
        <p>Copyright Universidad Don Bosco 2021</p>
    </footer>
</body>
</html>