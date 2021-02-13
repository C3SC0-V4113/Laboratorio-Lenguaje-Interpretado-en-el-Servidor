<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial de un número</title>
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/factorial.css">
    <script src="js/modernizr.custom.lis.js"></script>
    <script src="js/filterTextField.js"></script>
</head>

<body>
    <header>
        <h1>Obtener el factorial de un número</h1>
    </header>
    <section>
        <article>
            <div class="contenedor">
                <?php
                if (isset($_POST['enviar'])) {
                    $cont = is_numeric($_POST['factorial']) ? $_POST['factorial'] : null;
                    $msg = isset($cont) || $cont == null ? "<p>No ha ingresado ningún número</p>" : "";
                    echo "<div class=\"encabezado\">";
                    if ($msg == "") {
                        echo "No ha ingresado un número entero.";
                        echo "<a href=\"" . $_SERVER['PHP_SELF'] . "\">Volver a intentarlo</a>";
                        exit(0);
                    }
                    if (!is_numeric($cont)) {
                        echo "No ha ingresado un número entero.";
                        echo "<a href=\"" . $_SERVER['PHP_SELF'] . "\">Volver a intentarlo</a>";
                        exit(0);
                    }
                    if ($cont == 0) {
                        $factorial = 1;
                        echo "0!=$factorial<br>";
                        exit(0);
                    }
                    $factorial = 1;
                    echo "<p>$cont!=";
                    while ($cont > 0) {
                        $factorial *= $cont;
                        $cont--;
                    }
                    echo "<strong>$factorial</strong></p>";
                    echo "<p><a href=\"factorial.php\">Calcular el factorial de otro número</a>";
                    echo "</div>";
                } else {
                ?>
                    <div class="encabezado">
                        Calculo de factorial
                    </div>
                    <div class="formulario">
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <input type="text" name="factorial" id="factorial" placeholder="Número (entero)">
                            <br>
                            <span id="numberOnly">Sólo acepta números y puntos decimales</span>
                            <div class="divisor"></div>
                            <input type="submit" value="Enviar" name="enviar" id="enviar">
                        </form>
                    </div>
                <?php
                }
                ?>
            </div>
        </article>
    </section>
</body>

</html>