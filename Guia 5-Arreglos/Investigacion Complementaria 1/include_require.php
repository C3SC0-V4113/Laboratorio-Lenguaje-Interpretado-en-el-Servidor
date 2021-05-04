<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Include y Require</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Include, Require y sus variantes Unique</h1>
    </header>
    <section>
        <article>
            <p>
                Include y Require ambos tienen la misma funcion de traer otro archivo php al actual
                Con la unica diferencia que si algo falla con Require, envia un error fatal a la página
            </p>
        </article>
        <article id="container">
            <div class="izquierdo">
                <h2>Include</h1>
                <p>Aqui se llama una vez a un php simple</p><br>
                <?php
                    include('./phps/exclude.php');
                ?>

                <p>Aqui se llama otro php varias veces</p><br>
                <?php
                    include_once('./phps/once.php');
                    include_once('./phps/once.php');
                    include_once('./phps/once.php');
                    include_once('./phps/once.php');
                ?>
            </div>
            <div class="derecho">
            <h2>Require</h1>
            <p>Aqui se llama una vez a un php simple</p><br>
            <?php
                require('./phps/hola.php');
            ?>
            <p>Aqui se llama otro php varias veces</p><br>
            <?php
                require_once('./phps/require.php');
                require_once('./phps/require.php');
                require_once('./phps/require.php');
                require_once('./phps/require.php');
            ?>
            </div>
        </article>
    </section>
    <footer>
        <p>
            Copyright Univeridad Don Bosco 2021
        </p>
    </footer>
</body>
</html>