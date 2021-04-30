<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros de la base de datos</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.lis.js"></script>
</head>
<header>
    <nav class="navbar navbar-dark bg-primary">
        <span class="navbar-text">
            <h1>Libros disponibles</h1>
        </span>
    </nav>
</header>

<body class="container">
    <?php
    //Creando una nueva instancia del objeto de conexión
    //a la base de datos
    @$db = new mysqli('localhost', 'root', '', 'libros','3307');
    if (mysqli_connect_errno()) {
        $msgerror = "Error: no se puede conectar a la base de datos. ";
        $msgerror .= "Contacte con soporte para resolver el problema.";
        echo $msgerror;
        exit(0);
    }
    //Establecer el conjunto de caracteres a utf8
    $db->set_charset("utf8");
    //Si se ha llamado esta página desde el formulario
    //para modificar libros ejecutar primero la actualización
    //del registro
    if (isset($_POST['guardar'])) {
        //Creando variables locales con los datos enviados
        //desde el formulario de modificación
        $isbnx = isset($_GET['id']) ? trim($_GET['id']) : "";
        $isbn = isset($_POST['isbn']) ? trim($_POST['isbn']) : "";
        $autor = isset($_POST['autor']) ? trim($_POST['autor']) : "";
        $titulo = isset($_POST['titulo']) ? trim($_POST['titulo']) : "";
        $precio = isset($_POST['precio']) ? trim($_POST['precio']) : "";
        //Verificando que se hayan ingresado datos
        //en todos los controles del formulario
        if (
            empty($isbn) || empty($autor) || empty($titulo) ||
            empty($precio)
        ) {
            $msg = "Existen campos en el formulario sin llenar.";
            $msg .= "Regrese al formulario y llene todos los campos. <br>\n";
            $msg .= "[<a href=\"modificar.php?id=" . $isbnx . "\">Volver</a>]\n";
            echo $msg;
            exit(0);
        }

        //Creando la consulta de actualización con los datos
        //enviados del formulario de modificación de libros
        $consulta = "UPDATE libros SET isbn='" . $isbn . "', autor='" . $autor;
        $consulta .= "', titulo='" . $titulo . "', precio=" . $precio . " WHERE isbn='" . $isbnx . "'";
        //Ejecutando la consulta de actualización
        $resultc = $db->query($consulta);
        //Obteniendo el número de registros actualizados
        $num_results = $db->affected_rows;
        echo "<div class=\"query\">\n\t<p>";
        echo "\t\t" . $num_results . " fila(s) actualizada(s)\n";
        echo "\t</p>\n</div>\n";
        $_GET['opc'] = "modificar";
    }
    if (isset($_GET['del']) && $_GET['del'] == "s") {
        $consulta = "DELETE FROM libros WHERE isbn='" .
            $_GET['id'] . "'";
        $resultc = $db->query($consulta);
        $num_results = $db->affected_rows;
        echo "se ha eliminado" . $num_results . " registro de isbn = " . $_GET['id'] . "<br>";
    }
    //Haciendo una consulta de todos los libros presentes
    //en la tabla libros
    $consulta = "SELECT * FROM libros ORDER BY autor";
    //Ejecutando la consulta a través del objeto $db
    $resultc = $db->query($consulta);
    //Obteniendo el número de registros devueltos
    $num_results = $resultc->num_rows;
    echo "<table class='table'>
    <colgroup>
    <col class=\"isbn\"></colgroup>
    <colgroup>
    <col class=\"info\">
    <col class=\"info\">
    </colgroup>
    <colgroup>
    <col class=\"price\">
    </colgroup>
    <colgroup>
    <col class=\"action\">
    </colgroup>
    <thead>
    <tr id=\"theader\">
    <th>ISBN</th>
    <th>AUTOR</th>
    <th>TÍTULO</th>
    <th>PRECIO</th>
    <th>ACCIÓN</th>
    </tr>
    </thead>
    <tbody>";
    while ($row = $resultc->fetch_assoc()) {
        echo "<tr class=\"normal\" onmouseover=\"this.className='selected'\" onmouseout=\"this.className='normal'\">";
        echo "<td scope='col'>";
        echo "" . $row['isbn'] . "";
        echo "</td><td scope='col'>";
        echo "" . stripslashes($row['autor']) . "";
        echo "</td><td scope='col'>\n";
        echo "" . stripslashes($row['titulo']) . "";
        echo "</td><td scope='col'>$ ";
        echo "" . $row['precio'];
        echo "</td><td scope='col'>";
        echo "[<a href=\"" . $_GET['opc'] . ".php?id=" .
            $row['isbn'] . "\">";
        echo "" . $_GET['opc'] . "";
        echo "</a>]";
        echo "</td></tr>";
    }
    echo "</tbody>";
    echo "<tfoot>";
    echo "<tr id=\"tfooter\">";
    echo "<th colspan=\"5\">";
    //Mostrando el número total de registros de la tabla libros
    echo "Número de registros: " . $num_results . "";
    echo "</th>";
    echo "</tr>";
    echo "</tfoot>";
    echo "</table>";
    ?>
    <hr class="d-lg-none divider">
    <a href="menuopciones.html" class="d-block h3 font-weight-normal">Regresar<br>
        <small class="d-block text-muted text-small">Menu</small>
    </a>
</body>

</html>