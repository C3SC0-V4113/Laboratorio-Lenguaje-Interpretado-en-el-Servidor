<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrices Unidimensionales y Bidimensionales</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Matrices Unidimensionales</h1>
    <?php
    //Matrices unidimensionales (Arreglos)
    $nombres = array();
    $nombres[0] = "Rodrigo";
    $nombres[1] = "Mauricio";
    $nombres[2] = "Edward";
    $nombres[3] = "Andy";
    $nombres[4] = "Francisco";

    echo "<div class=\"Array\">";
    foreach ($nombres as $key => $value) {
        echo "<div class=\"segmento\">";
        echo "<p>$value</p>";
        echo '</div>';
    }
    echo '</div>';

    //Matrices bidimensionales

    echo '<h1>Matrices Bidimensionales</h1>';

    $compañeros = array();
    $compañeros[0][0] = "Rodrigo";
    $compañeros[1][0] = "Mauricio";
    $compañeros[2][0] = "Edward";
    $compañeros[3][0] = "Andy";
    $compañeros[4][0] = "Francisco";
    $compañeros[0][1] = "Flores";
    $compañeros[1][1] = "Machado";
    $compañeros[2][1] = "Martinez";
    $compañeros[3][1] = "Solorzano";
    $compañeros[4][1] = "Valle";
    $compañeros[0][2] = "FV180290";
    $compañeros[1][2] = "MR171225";
    $compañeros[2][2] = "MM160724";
    $compañeros[3][2] = "HS170505";
    $compañeros[4][2] = "VC190544";

    echo "<table>";
    for ($i = 0; $i < 5; $i++) {
        echo "\t<tr>";
        for ($j = 0; $j < 3; $j++) {
            echo '<th>' . $compañeros[$i][$j] . '</th>';
        }
        echo "\t</tr>";
    }
    echo "</table>";
    ?>
    <footer>
        <p>Copyright CESCO 2021</p>
    </footer>
</body>
</html>