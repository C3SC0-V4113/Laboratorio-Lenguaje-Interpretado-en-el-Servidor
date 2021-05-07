<?php
 //Incluir librería con las funciones auxiliares
 session_start();
 require_once("funciones.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP [hidden y urls]: caja.php</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="container">
<section>
<article>
<?php
 echo "<h1 align=\"center\">Se ha vaciado el carrito</h1>\n";
 unset($_SESSION["carrito"]);
?>
<p align="center">
 Pulsa <a href="./tienda.php">aquí</a> para continuar.
</p>
</article>
</section>
</body>
</html>