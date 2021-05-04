<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion personal</title>
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
                            <th scope="col">Campo</th>
                            <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $name = 'Francisco José Valle Cornejo';
                        $departamento = 'San Salvador';
                        $edad = 20;
                        $carnet = 'VC190544';
                        echo "\t\t<td>\nNombre Completo\n</td>\n";
                        echo "\t\t<td>\n" . $name . "\n</td>\n";
                        echo "\t</tr>\n";
                        echo "\t<tr>\n";
                        echo "\t\t<td>\nDepartamento\n</td>\n";
                        echo "\t\t<td>\n" . $departamento . "\n</td>\n";
                        echo "\t</tr>\n";
                        echo "\t<tr class=\"odd\">\n";
                        echo "\t\t<td>\nEdad\n</td>\n";
                        echo "\t\t<td>\n" . $edad . "\n</td>\n";
                        echo "\t</tr>\n";
                        echo "\t\t<td>\nCarnet\n</td>";
                        echo "\t\t<td>\n" . $carnet . "\n</td>\n";
                        echo "\t</tr>\n";
                        ?>
                    </tbody>
                </table>
            </div>
        </article>
    </section>
</body>
</html>