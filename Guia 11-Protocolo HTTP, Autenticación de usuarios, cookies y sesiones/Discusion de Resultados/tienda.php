<?php
 require_once("funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <title>PHP [hidden:urls]: tienda.php</title>
</head>
<body class="container">
<header>
 <h1 align="center">Carrito de compra</h1>
</header>
<section>
<article>
<?php
 //Recuperando objetos pertenecientes al carrito
 $carrito = generarCarrito();
 if(isset($_GET['articulo']))
 //Incrementar el número de unidades del artículo elegido
 if(empty($carrito[$_GET['articulo']])):
 $carrito[$_GET['articulo']] = 1;
 else:
 $carrito[$_GET['articulo']]++;
 endif;
 //Mostrar los artículos disponibles
 estantes($carrito);
 echo "<hr />\n";
 //Mostrar el contenido del carrito
 mostrarCarrito($carrito);
?>
 <hr />
 <form action="./caja.php">
 <div align="center">
 <?php
 $hidden = "";
 //Generar los controles ocultos con las variables
 //comunes de la aplicación
 foreach($carrito as $ref => $unidades){
 $hidden .= "<input type=\"hidden\" name=\"$ref\"
value=\"$unidades\" />\n";
 }
 echo $hidden;
 ?>
 <button type="submit">Caja</button>
 </div>
 </form>
</article>
</section>
</body>
</html>
