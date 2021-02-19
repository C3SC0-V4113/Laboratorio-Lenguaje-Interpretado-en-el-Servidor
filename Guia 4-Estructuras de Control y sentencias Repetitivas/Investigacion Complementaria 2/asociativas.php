<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrices Asociativas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Matrices Asociativas</h1>
    <section>
        <article>
            <p>Los índices no tienen por qué ser correlativos, ni siquiera tienen por qué ser números.</p>
        </article>
        <?php
        $materias=[
            'Programación'=>'Lenguaje Interpretado en EL Servidor',
            'Ciencias Básicas'=>'Ecuaciones Diferenciales',
            'Diseño'=>'Dibujo y Arte Conceptual',
            'Ciencias Economicas'=>'Economia 1',
            'Aeronautica'=>'Matematicas 3',
            'Escuela Industrial'=>'Analisis de Evaluación Economica'
        ];

        echo "<table>";
        foreach ($materias as $key => $value) {
            echo "\t<tr>";
            echo "<th>$key</th><th>$value</th>";
            echo "\t</tr>";
        }
        echo "</table>";
        ?>
    </section>
    <footer>
        <p>Copyright CESCO 2021</p>
    </footer>
</body>
</html>