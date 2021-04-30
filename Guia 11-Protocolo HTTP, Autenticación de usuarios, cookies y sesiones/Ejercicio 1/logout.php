<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['pass']);
$_SESSION = array();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fin de la sesión</title>
</head>

<body>
    <header>
        <h1>Has salido del sistema</h1>
    </header>
    <section>
        <article>
            <p>
                Para reingresar haz clic en <a href="autenticacionbasica.php">
                    este enlace</a>.
            </p>
        </article>
    </section>
</body>

</html>