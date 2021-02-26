<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
</head>
<body>
    <?php
    if (isset($_POST['enviar'])) {
        $notas1=array();
        $notas2=array();
        $notas3=array();
        for ($i=0; $i < 3 ; $i++) { 
            $nota1=isset($_POST["nota1$i"]) ? intval($_POST["nota1$i"]) : 0;
            array_push($notas1,$nota1);
            $nota2=isset($_POST["nota2$i"]) ? intval($_POST["nota2$i"]) : 0;
            array_push($notas2,$nota2);
            $nota3=isset($_POST["nota3$i"]) ? intval($_POST["nota3$i"]) : 0;
            array_push($notas3,$nota3);
        }
        print_r($notas1);
        print_r($notas2);
        print_r($notas3);
    }
    ?>
</body>
</html>