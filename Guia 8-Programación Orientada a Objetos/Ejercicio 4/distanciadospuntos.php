<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La distancia entre dos puntos</title>
    <!--<link rel="stylesheet" href="css/coordenadas.css">-->
    <link rel="stylesheet" href="css/slick.css">
</head>
<body>
    <header id="demo">
        <h1 class="demo1">Distancia entre dos puntos</h1>
    </header>
    <section id="slick">
        <?php
            //Utilizando autocarga de clases para invocar la clase
            spl_autoload_register('miautoload');

            function miautoload($class)
            {
                require_once("class/" . $class . ".class.php");
            }
        if (isset($_POST['submit'])) {
            //Capturando los datos de formulario
            $x1 = is_numeric($_POST['coordx1']) ? $_POST['coordx1'] :
                "Error";
            $x2 = is_numeric($_POST['coordx2']) ? $_POST['coordx2'] :
                "Error";
            $y1 = is_numeric($_POST['coordy1']) ? $_POST['coordy1'] :
                "Error";
            $y2 = is_numeric($_POST['coordy2']) ? $_POST['coordy2'] :
                "Error";
            if (
                $x1 == "Error" || $x2 == "Error" || $y1 == "Error" || $y2
                == "Error"
            ) {
                die("<h3 style=\"color:red;\">Los valores de x1, x2, y1 y y4 deben ser numéricos</h3>");
            };

            //Creando las coordenadas
            $coord1 = new coordenadas();
            $coord2 = new coordenadas();
            //Definiendo las coordenadas del primer punto
            $coord1->x = $x1;
            $coord1->y = $y1;
            //Definiendo las coordenadas del segundo punto
            $coord2->x = $x2;
            $coord2->y = $y2;
            //Obteniendo la distancia entre dos puntos
            $difx = pow($coord2->x - $coord1->x, 2);
            $dify = pow($coord2->y - $coord1->y, 2);
            $dist = sqrt($difx + $dify);
            printf("<p class=\"resp\">Distancia : D = " .
                number_format($dist, 2, '.', ',') . "</p>\n");
            printf("<p class=\"resp\">D =√((x<sub>2</sub>-x<sub>1</sub>)<sup>2</sup> + (y<sub>2</sub>-y<sub>1</sub>)<sup>2</sup>)</p>\n");
            printf(
                "<p class=\"resp\">D = √((%5.2lf-%5.2lf)<sup>2</sup> + (%5.2lf-%5.2lf)<sup>2</sup>)</p>\n",
                $coord2->x,
                $coord1->x,
                $coord2->y,
                $coord1->y
            );
        } else {
        ?>
            <div class="contact-form">
                <!-- Título -->
                <div class="title">Cálculo de la distancia entre dos
                    puntos</div>
                <!-- Texto indicativo -->
                <p class="intro">Ingrese las coordenadas</p>
                <!-- Área de formulario -->
                <div class="contact-form">
                    <!-- Formulario -->
                    <div class="w-100">
                        <!-- Campos de formulario -->
                        <form name="frmrectangulo" id="frmrectangulo" action="
                        <?php
                            echo $_SERVER['PHP_SELF'] ?>" method="POST">
                            <!-- Coordenada 1 (x1,y1) -->
                            <label>Coordenada 1 (x1,y1): </label>
                            <div class="field">
                                <input type="number" name="coordx1" id="coordx1" min="0" max="1000" step=".1" placeholder="(x1)" required />
                                <span class="entypo-base icon"></span>
                                <span class="slick-tip left">Ingrese la coordenada
                                    x1:</span>
                            </div>
                            <div class="field">
                                <input type="number" name="coordy1" id="coordy2" min="0" max="1000" step=".1" placeholder="(y1)" required />
                                <span class="entypo-base icon"></span>
                                <span class="slick-tip left">Ingrese la coordenada
                                    y1:</span>
                            </div>
                            <!-- Coordenada 2 (x2,y2) -->
                            <label>Coordenada 2 (x2,y2): </label>
                            <div class="field">
                                <input type="number" name="coordx2" id="coordx2" min="0" max="1000" step=".1" placeholder="(x2)" required />
                                <span class="entypo-base icon"></span>
                                <span class="slick-tip left">Ingrese la coordenada
                                    x2:</span>
                            </div>
                            <div class="field">
                                <input type="number" name="coordy2" id="coordy2" min="0" max="1000" step=".1" placeholder="(y2)" required />
                                <span class="entypo-base icon"></span>
                                <span class="slick-tip left">Ingrese la coordenada
                                    y2:</span>
                            </div>
                            <!-- Botones para hacer los cálculos -->
                            <input type="submit" value="Calcular" class="send" name="submit" id="perimetro" />
                            <input type="reset" value="Restablecer" class="send" name="reset" id="area" />
                        </form>
                    </div>
                </div>
            <?php
        }
            ?>
    </section>
</body>
</html>