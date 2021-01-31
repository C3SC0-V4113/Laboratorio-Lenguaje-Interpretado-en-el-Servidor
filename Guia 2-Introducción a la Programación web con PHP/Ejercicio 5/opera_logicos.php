<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de PHP - Operadores logicos</title>
    <style>
        body{
            font-family: "Arial Black",Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <?php
        $a=8;
        $b=3;
        $c=3;
        echo ($a==$b) && ($c>$b),"<br>";  
        echo ($a!=$b) || ($b==$c),"<br>";  
        echo !($a<$b),"<br>";
    ?>
</body>
</html>