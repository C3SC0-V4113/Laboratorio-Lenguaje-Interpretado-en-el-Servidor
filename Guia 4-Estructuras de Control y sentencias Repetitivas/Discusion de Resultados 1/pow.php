<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potencia de un número</title>
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/factorial.css">
    <script src="js/modernizr.custom.lis.js"></script>
    <script src="js/filterTextField.js"></script>
</head>

<body>
    <header>
        <h1>Obtener la potencia de un número</h1>
    </header>
    <section>
        <article>
            <div class="contenedor">
                <?php
                if (isset($_POST['enviar'])) {
                    $cont = is_numeric($_POST['numero']) ? $_POST['numero'] : null;
                    $pow = is_numeric($_POST['potencia']) ? $_POST['potencia'] : null;
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
                    if ($pow == 0) {
                        $resultado = 1;
                        echo "$cont^$pow=$resultado<br>";
                        exit(0);
                    }
                    $resultado = 1;
                    echo "<p>$cont^$pow=";
                    do {
                        $resultado*=$cont;
                        $pow--;
                    } while ($pow>0);
                    echo "<strong>$resultado</strong></p>";
                    echo "<p><a href=\"pow.php\">Calcular la potencia de otro número</a>";
                    echo "</div>";
                } else {
                ?>
                    <div class="encabezado">
                        Calculo de Potencias
                    </div>
                    <div class="formulario">
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <span id="numberOnly">Número</span>
                            <br>
                            <input type="number" name="numero" step="0.1" id="numero" placeholder="Número (entero o decimal)">
                            <span id="numberOnly">Potenciador</span>
                            <br>
                            <input type="number" name="potencia" id="potencia" placeholder="Potenciador (entero)">
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