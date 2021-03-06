<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creando la tabla...</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    if (isset($_POST['enviar'])) {
        $numero = isset($_POST['numero']) ? intval($_POST['numero']) : 0;
        echo "<header>";
        echo "<h1>La tabla del $numero</h1>";
        echo "</header>";
        Imprimir($numero);
    } else {
        echo "<section>";
        echo "<article>";
        EnCasoError();
        echo "</article>";
        echo "</section>";
    }
    function EnCasoError()
    {
        echo '<a href="index.html">Ingrese un dato válido</a>';
    }
    function Imprimir($numero)
    {
        echo "<section>";
        echo "<article>";
        $respuestas = range($numero, $numero * 10, $numero);
        $cont = 1;
        echo "<table>";
        //Encabezados
        echo "\t<tr>";
        echo "\t\t<th>Multiplicación</th>";
        echo "\t\t<th>Total</th>";
        echo "\t</tr>";
        //Contenido
        while ($cont <= 10) {
            echo "\t<tr>";
            echo "\t\t<th>$numero X $cont</th>";
            echo "\t\t<th>" . $respuestas[$cont - 1] . "</th>";
            echo "\t</tr>";
            $cont++;
        }
        echo "</table>";
        echo "\t<a id=\"button\" href=\"index.html\">Regresar</a>";
        echo "</article>";
        echo "</section>";
    }
    ?>
    <footer>
        <p>Copyright CESCO 2021</p>
    </footer>
</body>
</html>