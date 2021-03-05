<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serie de Fibonacci</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-primary ">
            <span class="navbar-text mx-auto">
                <h1>Serie de Fibonacci con
                    recursividad</h1>
            </span>
        </nav>
    </header>
    <div class="container">
        <?php
        //Función de Fibonacci recursiva
        function fibonacci($n)
        {
            if (($n == 0) || ($n == 1)) return $n;
            return fibonacci($n - 2) + fibonacci($n - 1);
        }
        if (isset($_GET['enviar'])) :
            //Verificando el correcto ingreso de los datos
            $numero1 = isset($_GET['txtnumero']) ? $_GET['txtnumero'] : -1;
            if ($numero1 == -1) :
                $backlink = "<a class='d-block text-muted text-small' href=\"{$_SERVER['PHP_SELF']}\" title=\"Regresar\">";
                $backlink .= "<span class=\"a-btn-text\">Ingresar dato</span>";
                $backlink .= "<span class=\"a-btn-slide-text\">nuevamente</span>";
                $backlink .= "</a>";
                echo $backlink;
                exit(0);
            endif;
            $tabla = "<table class='table table-striped'>";
            $tabla .= "<thead>";
            $tabla .= "<tr><th colspan='2' class='mx-auto'>Generando serie de Fibonacci</th></tr>";
            $tabla .= "<tr><th scope='col'>Secuencia</th>";
            $tabla .= "<th scope='col'>Valor</th>";
            $tabla .= "<thead>";
            $tabla .= "<tbody>";
            $i = 0;
            //Con este contador se verifica que se generen el número
            //de términos en la serie que indicó el usuario en el formulario
            while ($i <= $numero1) {
                $class = $i % 2 == 0 ? "odd" : "even";
                $tabla .= "<tr class=\"$class\"><td>F<sub>$i</sub></td>";
                $tabla .= "<td>" . fibonacci($i) . "</td></tr>";
                $i++;
            }
            $tabla .= "<tbody></table>";
            echo $tabla;
            echo "<br /><a href=\"{$_SERVER['PHP_SELF']}\" title=\"Regresar\" class=\"a-btn\">";
            echo "<span class='d-block h3 font-weight-normal'>Ingresar nuevos datos</span>";
        else :
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                <div class="form-group row">
                    <label class="form-check-label" for="numero1">Valores para serie:
                    </label>
                    <input class="form-control" value="0" type="text" name="txtnumero" id="txtnumero" size="4" maxlength="3" pattern="[0-9]{1,3}" required />
                </div>
                <div class="alert alert-danger" id="numbersOnly" style="visibility:hidden;">
                    <strong>Dato Erroneo!</strong> Ingrese solo números
                </div>
                <input type="submit" name="enviar" value="Generar" class="btn btn-primary" />&nbsp;
                <input type="reset" name="limpiar" value="Cancelar" class="btn btn-primary" />
            </form>
            <script src="js/validar.js"></script>
        <?php endif; ?>
    </div>
</body>
</html>