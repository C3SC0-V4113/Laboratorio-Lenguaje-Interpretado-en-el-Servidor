<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información Recibida</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Nobile">
    <link rel="stylesheet" href="css/tables.css">
    <script src="js/modernizr.custom.lis.js"></script>
</head>
<body>
    <section>
        <article>
            <div id="info">
                <table id="hor-zebra" summary="Datos recibidos del formulario">
                    <caption>Información de formulario</caption>
                        <thead>
                            <tr class="thead">
                                <th scope="col">Dolares</th>
                                <th scope="col">Euros</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST['submit'])&&$_POST['submit']="Enviar"):
                                //Accediendo a los datos del formulario usando la funcion extract()
                                extract($_POST);
                                $dolares=!empty($dollar) ? ('$'.$dollar):"<a href=\"ingresodatos.html\">No ingresó el valor en dolares.</a>";
                                echo "\t<tr class=\"odd\">\n";
                                echo "\t\t<td>\n$dolares\n</td>";
                                $euros=!empty($dollar) ? ('€'.round(($dollar*0.8238929),2)):"<a href=\"ingresodatos.html\">---</a>";
                                echo "\t\t<td>\n $euros \n</td>\n";
                                echo "\t</tr>\n";
                                echo "\t<tr>\n";
                            else:
                                echo "\t<tr class=\"odd\">\n";
                                echo "\t\t<td>No se han ingresado desde el formulario.</td>";
                                echo "\t</tr>\n";
                            endif;
                            ?>
                        </tbody>
                </table>
                <div id="link">
                    <a href="ingresodatos.html" class="button-link">Ingresar nuevos datos</a>
                </div>
            </div>
        </article>
    </section>
</body>
</html>