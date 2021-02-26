<!DOCTYPE html>
<html>
<head>
    <title>Boleto de entrada</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/modernizr.custom.lis.js"></script>
</head>
<body>
    <?php
    $peliculas = array(
        "mov0000" => array(
            "titulo" => "Avengers",
            "precio" => 3.75,
            "sala" => "Sala 1",
            "hora" => "7:00 pm"
        ),
        "mov0001" => array(
            "titulo" => "Al diablo con el diablo",
            "precio" => 3.75,
            "sala" => "Sala 1",
            "hora" => "7:00 pm"
        ),
        "mov0002" => array(
            "titulo" => "Clic",
            "precio" => 3.75,
            "sala" => "Sala 3",
            "hora" => "5:00 pm"
        ),
        "mov0003" => array(
            "titulo" => "Cruzada",
            "precio" => 3.00,
            "sala" => "Sala 2",
            "hora" => "1:00 pm"
        ),
        "mov0004" => array(
            "titulo" => "El efecto mariposa",
            "precio" => 3.75,
            "sala" => "sala 3",
            "hora" => "6:00 pm"
        ),
        "mov0005" => array(
            "titulo" => "En busca de la felicidad",
            "precio" => 3.00,
            "sala" => "Sala 5",
            "hora" => "3:00 pm"
        ),
        "mov0006" => array(
            "titulo" => "La amenaza fastasma",
            "precio" => 3.75,
            "sala" => "sala 4",
            "hora" => "6:00 pm"
        ),
        "mov0007" => array(
            "titulo" => "Milagros inesperados",
            "precio" => 3.75,
            "sala" => "Sala 2",
            "hora" => "1:00 pm"
        ),
        "mov0008" => array(
            "titulo" => "La propuesta",
            "precio" => 3.75,
            "sala" => "sala 1",
            "hora" => "9:00 pm"
        ),
        "mov0009" => array(
            "titulo" => "La comunidad del anillo",
            "precio" => 3.75,
            "sala" => "Sala 5",
            "hora" => "7:00 pm"
        ),
        "mov0010" => array(
            "titulo" => "El sexto sentido",
            "precio" => 3.75,
            "sala" => "sala 3",
            "hora" => "8:45 pm"
        ),
        "mov0011" => array(
            "titulo" => "Parasite",
            "precio" => 3.75,
            "sala" => "Sala 1",
            "hora" => "7:00 pm"
        ),
    );
    //Procesando los datos enviados del formulario
    if (isset($_POST['comprar'])) {
        $movie = isset($_POST['pelicula']) ? $_POST['pelicula'] : "";
        switch ($movie) {
            case "mov0000":
                $seleccionada = $peliculas["mov0000"];
                $cantidad = (isset($_POST['cantidad']) && is_numeric($_POST['cantidad'])) ? $_POST['cantidad'] : 0;
                break;
            case "mov0001":
                $seleccionada = $peliculas["mov0001"];
                $cantidad = (isset($_POST['cantidad']) && is_numeric($_POST['cantidad'])) ? $_POST['cantidad'] : 0;
                break;
            case "mov0002":
                $seleccionada = $peliculas["mov0002"];
                $cantidad = (isset($_POST['cantidad']) && is_numeric($_POST['cantidad'])) ? $_POST['cantidad'] : 0;
                break;
            case "mov0003":
                $seleccionada = $peliculas["mov0003"];
                $cantidad = (isset($_POST['cantidad']) && is_numeric($_POST['cantidad'])) ? $_POST['cantidad'] : 0;
                break;
            case "mov0004":
                $seleccionada = $peliculas["mov0004"];
                $cantidad = (isset($_POST['cantidad']) && is_numeric($_POST['cantidad'])) ? $_POST['cantidad'] : 0;
                break;
            case "mov0005":
                $seleccionada = $peliculas["mov0005"];
                $cantidad = (isset($_POST['cantidad']) && is_numeric($_POST['cantidad'])) ? $_POST['cantidad'] : 0;
                break;
            case "mov0006":
                $seleccionada = $peliculas["mov0006"];
                $cantidad = (isset($_POST['cantidad']) && is_numeric($_POST['cantidad'])) ? $_POST['cantidad'] : 0;
                break;
            case "mov0007":
                $seleccionada = $peliculas["mov0007"];
                $cantidad = (isset($_POST['cantidad']) && is_numeric($_POST['cantidad'])) ? $_POST['cantidad'] : 0;
                break;
            case "mov0008":
                $seleccionada = $peliculas["mov0008"];
                $cantidad = (isset($_POST['cantidad']) && is_numeric($_POST['cantidad'])) ? $_POST['cantidad'] : 0;
                break;
            case "mov0009":
                $seleccionada = $peliculas["mov0009"];
                $cantidad = (isset($_POST['cantidad']) && is_numeric($_POST['cantidad'])) ? $_POST['cantidad'] : 0;
                break;
            case "mov0010":
                $seleccionada = $peliculas["mov0010"];
                $cantidad = (isset($_POST['cantidad']) && is_numeric($_POST['cantidad'])) ? $_POST['cantidad'] : 0;
                break;
            case "mov0011":
                $seleccionada = $peliculas["mov0011"];
                $cantidad = (isset($_POST['cantidad']) && is_numeric($_POST['cantidad'])) ? $_POST['cantidad'] : 0;
                break;
        }
        //Iniciando la tabla con la información de la película seleccionada
    ?>
        <div class="container">
            <header class='navbar navbar-dark bg-dark'>
                <a class='navbar-brand' class='d-inline-block align-top' href='#'>
                    Información del formulario
                </a>
            </header>
            <table id="horzebra" class="table" summary="Datos recibidos del formulario">

                <thead>
                    <tr class='bg-secondary'>
                        <th scope="col" colspan="2">Boleto de entrada</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                //Obteniendo los datos de la película seleccionada que está almacenada en $seleccionada
                $table = "";
                $i = 1;
                foreach ($seleccionada as $indice => $dato) {
                    if ($i % 2 != 0) {
                        $table .= "\t<tr class=\"odd\">\n";
                    } else {
                        $table .= "\t<tr class=\"even\">\n";
                    }
                    if ($indice == "precio") {
                        $dato *= $cantidad;
                        $dato = "\$" . number_format((float)$dato, 2, ".", ",");
                    }
                    $table .= "\t\t<td>$indice</td>\n";
                    $table .= "\t\t<td> $dato</td>\n\t</tr>\n";
                    $i++;
                }
                echo $table;
            }
                ?>
                </tbody>
            </table>
            <a href="ejemplo4.php">Ingresar otra película</a>
        </div>
</body>
</html>