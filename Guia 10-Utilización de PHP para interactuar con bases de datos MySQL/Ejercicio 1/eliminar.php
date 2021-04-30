<?php 
@$db = new mysqli('localhost', 'root', '', 'libros','3307');
//Establecer el conjunto de caracteres a utf8
$db->set_charset("utf8");
if (mysqli_connect_errno()) {
    $msgerror = "Error: no se puede conectar a la base de datos";
    $msgerror .= "Contacte con soporte para resolver el problema";
    echo $msgerror;
    exit(0);
}
$isbn = $_GET['id'];
$sql = "SELECT * FROM libros WHERE isbn = '" . $isbn . "'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$msg = "<script text=\"text/javascript\">\n";
$preg = "Deseas eliminar el libro de: ";
$preg .= "isbn = " . $row['isbn'] . ",";
$preg .= "autor = " . $row['autor'] . ",";
$preg .= "titulo = " . $row['titulo'] . ",";
$preg .= "precio = " . $row['precio'] . ".";
$msg .= "if(confirm(\"" . $preg . "\")){";
$msg .= "location.href=\"mostrarlibros.php?opc=eliminar&del=s&id=" . $isbn . "\";}";
$msg .="else{location.href=\"mostrarlibros.php?opc=eliminar&del=n\";}</script>";
echo utf8_decode($msg);
