<!DOCTYPE html>
<html lang="es">

<head>
    <title>Uso de la función range</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
</body>
<div class="container">
    <header class='navbar navbar-light bg-light'>
        <a class='navbar-brand' class='d-inline-block align-top' href='#'>
            <h4>Generación de series con función de matrices</h4>
        </a>
    </header>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" class="formoidsolid-purple">
        <div class="form-group">
            <label>Tipos de serie</label>
            <select class="form-control" name="seltipo">
                <option value="AlfabetoMin" selected="selected">
                    Alfabeto en minúsculas
                </option>
                <option value="AlfabetoMay">
                    Alfabeto en mayúsculas
                </option>
                <option value="NumerosPares">
                    Números pares
                </option>
                <option value="NumerosImpares">
                    Números impares
                </option>
            </select>
        </div>
        <div class="submit">
            <input type="submit" name="enviar" value="Enviar" class="btn-primary" />
        </div>
    </form>
    <?php
    if (isset($_POST['enviar'])) {
        $tiposecuencia = isset($_POST['seltipo']) ? $_POST['seltipo'] : "";
        switch ($tiposecuencia) {
            case "AlfabetoMin":
                $inicio = 'a';
                $final = 'z';
                $salto = '1';
                break;
            case "AlfabetoMay";
                $inicio = 'A';
                $final = 'Z';
                $salto = '1';
                break;
            case "NumerosPares":
                $inicio = '0';
                $final = '50';
                $salto = '2';
                break;
            case "NumerosImpares":
                $inicio = '1';
                $final = '50';
                $salto = '2';
                break;
        }
        $secuencia = range($inicio, $final, $salto);
        echo "<div id=\"box\">";
        foreach ($secuencia as $letra)
            echo "<span class=\"caracter\">" . $letra . "</span>&nbsp;&nbsp;\n";
        echo "</div>";
    }
    ?>
</div>
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="js/jquery.min.js"><\/script > ')
</script>
<script src="js/formoid-solid-purple.js"></script>
</html>