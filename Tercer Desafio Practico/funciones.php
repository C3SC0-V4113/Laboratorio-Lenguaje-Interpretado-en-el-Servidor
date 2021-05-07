<?php
function generarCarrito()
{
    //Se utilizará una matriz para manejar el carrito
    if (!isset($_SESSION['carrito'])) {
        $carrito = array();
    }
    else{
        $carrito=$_SESSION['carrito'];
    }
    //Los artículos y sus cantidades se enviarán con el
    //método GET, ya sea en la cadena de consulta o a
    //través de campos ocultos de formulario
    foreach ($_GET as $ref => $unidades) {
        //echo $ref.'<br>'.$unidades.'<br>';
        if (preg_match("/^ref/", $ref)) {
            $carrito[$ref] = $unidades;
        }
    }
    return $carrito;
}
function mostrarCarrito($carrito)
{
    //Generación de la cabecera de la tabla
    echo "<table class='table ' border=\"1\" align=\"center\">\n";
    echo "<tr class='bg-info'>\n<th>\nReferencia</th>\n";
    echo "<th>\nUnidades</th>\n";
    echo "<th>\nPrecio unitario</th>\n";
    echo "<th>\nPrecio Completo</th>\n</tr>\n";
    //Mostramos el carrito
    $totalUnidades = 0;
    $totalPrecio = 0;
    if (empty($carrito)) {
        echo "<tr>\n<td align=\"center\" colspan=\"4\">\n";
        echo "El carrito está vacío\n</td>\n</tr>\n";
    } else {
        $i = 0;
        foreach ($carrito as $ref => $unidades) {
            $temp = explode(',', $ref);
            $temp2[$temp[1]] = $temp[0];
            echo "<tr >\n<td>\n" . $temp[0] . "</td>\n";
            echo "<td align=\"center\">$unidades</td>";
            echo "<td align=\"center\">" . $temp[1] . " €</td>\n";
            echo "<td align=\"center\">" . intval($temp[1]) * intval($unidades) . " €</td>\n</tr>\n";
            $totalPrecio += intval($temp[1]) * intval($unidades);
            $totalUnidades += $unidades;
        }
    }
    $_SESSION['carrito']=$carrito;
    //Cerrar la tabla
    echo "<tr class='bg-light'><td align=\"center\" colspan=\"2\">\n";
    echo "Número de unidades: ";
    echo $totalUnidades . "</td>\n";
    echo "<td align=\"center\" colspan=\"2\">\n";
    echo "Precio Completo: ";
    echo $totalPrecio . "€ </td>\n</tr>\n";
    echo "</table>\n";
    return true;
}
//Método que muestra los artículos disponibles en la tienda
function estantes($carrito)
{
    //Generación del query string que contiene las referencias
    //de los productos y las cantidades a llevar de cada uno
    $querystring = "";
    foreach ($carrito as $ref => $unidades) {
        $querystring .= "$ref=$unidades&";
    }
    echo "
 <div class='row'>
 <div class='col'>
 <div class='card'>
 <div class='card-header bg-info'>ref1</div>
 <div class='card-body'>Descripcion: Artículo 1<br>Precio:5 &euro;</div>
 <div class='card-footer'><a href='./compra.php?{$querystring}articulo=ref1,5' title='Añadir al carrito'>Comprar</a></div>
 </div>
 </div>
 <div class='col'>
 <div class='card'>
 <div class='card-header bg-info'>ref2</div>
 <div class='card-body'>Descripcion: Artículo 2<br>Precio:3 &euro;</div>
 <div class='card-footer'><a href='./compra.php?{$querystring}articulo=ref2,3' title='Añadir al carrito'>Comprar</a></div>
 </div>
 </div>
 <div class='col'>
 <div class='card'>
 <div class='card-header bg-info'>ref3</div>
 <div class='card-body'>Descripcion: Artículo 3<br>Precio:2 &euro;</div>
 <div class='card-footer'><a href='./compra.php?{$querystring}articulo=ref3,2' title='Añadir al carrito'>Comprar</a></div>
 </div>
 </div>
 </div>";
    return true;
}
