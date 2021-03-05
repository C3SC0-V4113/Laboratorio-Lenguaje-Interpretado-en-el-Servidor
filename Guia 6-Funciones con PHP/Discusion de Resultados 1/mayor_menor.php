<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayor y Menor</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>RESULTADOS</h1>
    </header>
    <section>
        <article>
            <?php
            $alumnos = array();
            $individuos = array();
            $notastotales = array();
            if (isset($_POST['enviar'])) {
                if (isset($_POST['ingresados'])) {
                    foreach ($_POST["ingresados"] as $entrada) {
                        echo "<p>$entrada</p>";
                    }
                }
                echo "\t<a id=\"button\" href=\"index.html\">Regresar</a>";
            } else {
                echo '<a href="index.html">Ingrese datos válidos</a>';
            }
            ?>
        </article>
    </section>
    <footer>
        <p>Copyright CESCO 2021</p>
    </footer>
</body>
</html>