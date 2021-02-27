<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
</head>
<body>
    <header>
        <h1>RESULTADOS</h1>
    </header>
    <?php
    if (isset($_POST['enviar'])) {
        if (isset($_POST['ingresados'])) {
            foreach ($_POST["ingresados"] as $alumnos) {
                echo "<p>$alumnos</p><br>";
            }
        }
    }
    ?>
</body>
</html>