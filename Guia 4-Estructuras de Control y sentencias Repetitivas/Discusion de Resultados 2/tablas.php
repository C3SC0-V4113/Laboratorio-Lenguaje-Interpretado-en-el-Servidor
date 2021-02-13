<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creando la tabla...</title>
</head>
<body>
    <header>
        <?php
        if (isset($_POST['enviar'])) {
            $numero=isset($_POST['numero']) ? intval($_POST['numero']) : 0;
            echo "<h1>La tabla del $numero</h1>";
        ?>
    </header>
    <section>
        <article>
            <?php
            $cont=1;
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
                echo "\t\t<th>".$numero*$cont."</th>";
                echo "\t</tr>";
                $cont++;
            }
            echo "</table>";
            echo "\t<a id=\"button\" href=\"index.html\">Regresar</a>";
        }
        else {
            echo '<a href="index.html">Ingrese un dato válido</a>';
        }
            ?>
        </article>
    </section>
</body>
</html>