<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la búsqueda</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/links.css" />
    <!-- <link rel="stylesheet" href="css/libros.css" /> -->
    <script src="js/modernizr.custom.lis.js"></script>
</head>

<body class="container">
    <header>
        <nav class="navbar navbar-dark bg-primary">
            <span class="navbar-text">
                <h1>Resultados de la búsqueda</h1>
            </span>
        </nav>
    </header>
    <section>
        <article> <?php
                    //Asignando los datos ingresados en el formulario
                    //a variables locales con nombres cortos
                    $tema = $_POST['tema'];
                    $termino = isset($_POST['termino']) ? $_POST['termino'] : "";
                    $termino = trim($termino);
                    $tipobusqueda = isset($_POST['tipobusqueda']) ? $_POST['tipobusqueda'] : "";
                    if (empty($tema) || empty($termino)) {
                        $msg = "No se ha ingresado detalle de la búsqueda. ";
                        $msg .= "Regrese al formulario e ingrese los datos en el formulario.<br>";
                        $msg .= "[<a href=\"busquedalibro.html\">Volver</a>]";
                        echo $msg;
                        exit(0);
                    }
                    /*if (!get_magic_quotes_gpc()) { 
                        $tema = addslashes($tema);$termino = addslashes($termino);
                    }*/
                    //Estableciendo la conexión con el servidor MySQL y
                    //verificando si no se ha producido un error
                    @$db = new mysqli('localhost', 'root', '', 'libros','3307');
                    if (mysqli_connect_errno()) {
                        $msgerror = "Error: no se puede conectar a la base de datos. ";
                        $msgerror .= "Contacte con soporte para resolver el problema.";
                        echo $msgerror;
                        exit(0);
                    } //Establecer el conjunto de caracteres a utf8
                    $db->set_charset("utf8");
                    if ($tipobusqueda == 'exacta') {
                        $consulta = "SELECT * FROM libros WHERE "
                            . $tema;
                        $consulta .= " = '" . $termino . "'";
                    } else {
                        $consulta = "SELECT * FROM libros WHERE "
                            . $tema;
                        $consulta .= " LIKE '%" . $termino . "%'";
                    }
                    /*echo "<div class=\"query\">\n\t<p>" . $consulta . "</p>\n\t";*/
                    $resultc = $db->query($consulta);
                    $num_results = $resultc->num_rows;
                    echo "<p>Número de libros encontrados: . $num_results</p>\n</div>\n";
                    for ($i = 0; $i < $num_results; $i++) {
                        echo "<div class='card' style='width: 100%;'>";
                        $row = $resultc->fetch_assoc();
                        echo "<div class='card-header bg-info'>Libro " . ($i + 1) . "</div>";
                        echo "<div class='card-body'>";
                        echo " <ul class='list-group list-group-flush'>";
                        echo "<li class='list-group-item'>Título " . ($i + 1) . ":" . stripslashes($row['titulo']) . "</li>";
                        echo "<li class='list-group-item'>Autor:" . stripslashes($row['autor']) . "</li>";
                        echo "<li class='list-group-item'>ISBN:" . stripslashes($row['isbn']) . "</li>";
                        echo "<li class='list-group-item'>Precio:" . stripslashes($row['precio']) . "</li>";
                        echo " </ul>";
                        echo "</div>";
                        echo "</div>";
                    }
                    /* $msg = "<p>[<a
href=\"busquedalibro.html\">realizar otra
búsqueda</a>]&nbsp&nbsp"; $msg .= "[<a
href=\"menuopciones.html\">volver al menú</a>]</p>"; echo $msg;
*/
                    $resultc->free();
                    $db->close(); ?>
            <hr class="d-lg-none divider">
            <section class="m-b-30 m-t-30">
                <div class="row pager">
                    <div class="col-md-6 text-left">
                        <a href="menuopciones.html" class="d-block h3 font-weight-normal">Regresar<br>
                            <small class="d-block text-muted text-small">Menu</small>
                        </a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="busquedalibro.html" class="d-block h3 font-weight-normal">
                            Realizar<br>
                            <small class="d-block text-muted text-small">Otra busqueda</small>
                        </a>
                    </div>
                </div>
            </section>
    </section>
</body>

</html>