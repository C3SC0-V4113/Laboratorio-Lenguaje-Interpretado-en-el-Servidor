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
            function Mayor_Menor($arreglo=[]){
                $mayor=PHP_INT_MIN;
                $contador=0;
                $puntero=0;
                $apuntadorMa=0;
                $menor=PHP_INT_MAX;
                $apuntadorm=0;
                foreach ($arreglo as $entrada) {
                    if (intval($entrada)>=$mayor) {
                        $mayor=$entrada;
                        $apuntadorMa=$contador;
                    }
                    elseif (intval($entrada)<=$menor) {
                        $menor=$entrada;
                        $apuntadorm=$contador;
                    }
                    $contador++;
                }
                echo "<div class=\"DivNumerico\">";
                foreach ($arreglo as $entrada) {
                    if ($puntero==$apuntadorMa) {
                        echo "<span id='mayor'>$entrada</span>";
                    }
                    elseif ($puntero==$apuntadorm) {
                        echo "<span id='menor'>$entrada</span>";
                    }
                    else{
                        echo "<span>$entrada</span>";
                    }
                    $puntero++;
                }
                echo "</div>";
                echo "<p class=\"nulo\">El mayor es: $mayor y el menor es: $menor</p>";
            }

            $alumnos = array();
            $individuos = array();
            $notastotales = array();
            if (isset($_POST['enviar'])) {
                if (isset($_POST['ingresados'])) {
                    $numeros=$_POST['ingresados'];
                    Mayor_Menor($numeros);
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