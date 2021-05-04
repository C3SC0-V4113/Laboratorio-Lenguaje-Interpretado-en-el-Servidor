<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>RESULTADOS</h1>
    </header>
    <section>
        <article>
            <?php
            function CreacionTabla($nombre, $evalua = array())
            {
                $contador = 0;
                $global = 0;
                echo '<table>';
                echo "<caption>$nombre</caption>";
                echo '<thead>';
                echo '<tr>';
                echo '<th>Evaluacion</th>';
                echo '<th>Nota</th>';
                echo '<th>Global</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($evalua as $key => $value) {
                    echo '<tr>';
                    echo "<th>$key</th>";
                    echo "<th>$value</th>";
                    if ($contador == 0) {
                        echo "<th>" . $value * (0.5) . "</th>";
                        $global += $value * (0.5);
                    } elseif ($contador == 1) {
                        echo "<th>" . $value * (0.3) . "</th>";
                        $global += $value * (0.3);
                    } else {
                        echo "<th>" . $value * (0.2) . "</th>";
                        $global += $value * (0.2);
                    }
                    echo '</tr>';
                    $contador++;
                }
                echo '</tbody>';
                echo '<tfoot>';
                echo '<tr>';
                echo '<th>Total</th>';
                echo '<th>' . round(array_sum($evalua) / count($evalua), 2) . '</th>';
                echo "<th>" . round($global, 2) . "</th>";
                echo '</tr>';
                echo '</tfoot>';
                echo '</table>';
            }

            $alumnos = array();
            $individuos = array();
            $notastotales = array();
            if (isset($_POST['enviar'])) {
                if (isset($_POST['ingresados'])) {
                    foreach ($_POST["ingresados"] as $entrada) {
                        $notas = array();
                        $llaves = array();
                        $bruto = explode(',', $entrada);
                        array_push($individuos, $bruto[0]);
                        for ($i = 1; $i < count($bruto); $i++) {
                            $llave = "Nota $i";
                            $nota = $bruto[$i];
                            array_push($llaves, $llave);
                            array_push($notas, $nota);
                        }
                        $notasnombre = array_combine($llaves, $notas);
                        array_push($notastotales, $notasnombre);
                    }

                    $alumnos = array_combine($individuos, $notastotales);

                    foreach ($alumnos as $key => $value) {
                        CreacionTabla($key, $value);
                    }
                }
                echo "\t<a id=\"button\" href=\"index.html\">Regresar</a>";
            }
            else {
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