<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del empleado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class='container'>
    <?php
    spl_autoload_register('miautoload');
    function miautoload($class_name)
    {
        include_once("class/" . $class_name . ".class.php");
    }
    if (isset($_POST['enviar'])) {
        if (isset($_POST['enviar'])) {
            echo "<h3>Boleta de pago del empleado</h3>";
            $name = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
            $apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : "";
            $sueldo = (isset($_POST['sueldo'])) ? doubleval($_POST['sueldo']) : 0.0;
            $descuento=(isset($_POST['descuentoconcepto'])) ? doubleval($_POST['descuentoconcepto']) : 0.0;
            $numHorasExtras = (isset($_POST['horasextras'])) ? intval($_POST['horasextras']) : 0;
            $pagohoraextra = (isset($_POST['pagohoraextra'])) ? floatval($_POST['pagohoraextra']) : 0.0;
            //Creando instancias de la clase empleado
            $empleado1 = new empleado();
            $empleado1->obtenerSalarioNeto(
                $name,
                $apellido,
                $sueldo,
                $descuento,
                $numHorasExtras,
                $pagohoraextra
            );
        }
    } else {
    ?>
        <section class="container">
            <nav class="navbar navbar-dark bg-primary text-white">
                <h1>Formulario empleado</h1>
            </nav>
            <article>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <fieldset>
                        <div class="form-group">
                            <label for="nombre">Nombre empleado:</label>
                            <input type="text" name="nombre" id="nombre" size="25" maxlength="30" class="inputField form-control" /><br />
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido empleado:</label>
                            <input type="text" name="apellido" id="apellido" size="25" maxlength="30" class="inputField form-control" /><br />
                        </div>
                        <div class="form-group">
                            <label for="sueldo">Sueldo empleado ($):</label>
                            <input type="text" name="sueldo" id="sueldo" size="8" maxlength="8" class="inputField form-control" /><br />
                        </div>
                        <div class="form-group">
                            <label for="descuentoconcepto">Descuento por concepto ($):</label>
                            <input type="text" name="descuentoconcepto" id="descuentoconcepto" size="8" maxlength="8" class="inputField form-control" /><br />
                        </div>
                        <div class="form-group">
                            <label for="horasextras">Número horas extras:</label>
                            <input type="text" name="horasextras" id="horasextras" size="4" maxlength="2" class="inputField form-control" /><br />
                        </div>
                        <div class="form-group">
                            <label for="pogohoraextra">Pago por hora extra:</label>
                            <input type="text" name="pagohoraextra" id="pagohoraextra" size="4" maxlength="6" class="inputField form-control" /><br />
                        </div>
                        <input type="submit" name="enviar" class="btn btn-primary mb-2" value="Enviar" class="inputButton" />&nbsp;
                        <input type="reset" name="limpiar" class="btn btn-primary mb-2" value="Restablecer" class="inputButton" />
                    </fieldset>
                </form>
            <?php
        }
            ?>
            </article>
        </section>
</body>
</html>