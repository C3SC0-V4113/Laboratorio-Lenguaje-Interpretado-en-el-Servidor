<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detector de Lenguaje del Navegador</title>
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <link rel="stylesheet" href="css/idioma.css">
</head>
<body>
    <div id="wrapper">
        <header>
            <h1 class="emboss">Idioma del navegador</h1>
        </header>
        <section>
            <?php
                //Antes de nada introducimos mensajes en forma de variable
                $español="Hola";
                $ingles="Hello";
                $aleman="Hallo";
                $frances="Bonjour";
                $italiano="Ciao";
                $portugues="Olá";
                //Ahora leemos del navegador cuál es su lengua oficial
                $completo=$_SERVER["HTTP_ACCEPT_LANGUAGE"];
                $idioma=substr($completo,0,2);
                //Formulemos las posibilidades que se pueden dar
                echo "<p>$completo<br>";
                echo $idioma."</p>\n";
                echo '<p class="msgOff">';
                if ($idioma=='es') {
                    printf("El lenguaje que se está utilizando en el navegador es el Español: %s",$español);
                }
                elseif ($idioma=='en') {
                    printf("El lenguaje que se está utilizando en el navegador es el Ingles: %s",$ingles);
                }
                elseif ($idioma=='de') {
                    printf("El lenguaje que se está utilizando en el navegador es el Alemán: %s",$aleman);
                }
                elseif ($idioma=='it') {
                    printf("El lenguaje que se está utilizando en el navegador es el Italiano: %s",$italiano);
                }
                elseif ($idioma=='pt') {
                    printf("El lenguaje que se está utilizando en el navegador es el Francés: %s",$portugues);
                }
                else{
                    echo "</p>\n";
                    echo '<p class="magOff">El idioma del navegador es desconocido'."</p>\n";
                }
            ?>
        </section>
    </div>
</body>
<script src="js/moderizr.custom.lis.js"></script>
<script src="js/switchclass.js"></script>
</html>