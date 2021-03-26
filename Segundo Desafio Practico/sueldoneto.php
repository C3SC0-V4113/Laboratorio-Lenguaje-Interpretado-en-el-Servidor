<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del empleado</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php
    date_default_timezone_set("America/El_Salvador");
    $fecha = isset($_POST['fechainic']) ? $_POST['fechainic'] : "";
    $fechaempleo = new DateTime($fecha);
    $fechaactual = new DateTime("now");
    $interval = date_diff($fechaactual, $fechaempleo);
    $años = $interval->format('%y');

    spl_autoload_register('theauto');
    function theauto($class_name)
    {
        include_once("class/" . $class_name . ".class.php");
    }
    if (isset($_POST['submeeet'])) :
        if (isset($_POST['submeeet'])) {
            echo "<h3>Boleta de pago del empleado</h3>";
            $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
            $apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : "";
            $sueldoneto = (isset($_POST['sueldo'])) ? doubleval($_POST['sueldo']) : 0.0;
            $descuentoconcepto = (isset($_POST['descuentoconcepto'])) ? doubleval($_POST['descuentoconcepto']) : 0.0;
            $numHorasExtras = (isset($_POST['horasextras'])) ? intval($_POST['horasextras']) : 0;
            $pagohoraextra = (isset($_POST['pagohoraextra'])) ? floatval($_POST['pagohoraextra']) : 0.0;
            $hipotecario = isset($_POST['Hipotecario']);
            //Creando instancias de la clase empleado
            $employer = new empleado();
            $employer->obtenerSalarioNeto($nombre, $apellido, $sueldoneto, $descuentoconcepto, $numHorasExtras, $pagohoraextra, $años, $hipotecario);
        } else
    ?>
        <nav class="navbar navbar-dark bg-primary text-white allign-center" id="encabezado">
            <div class="container center-align">
                <h1>Formulario empleado</h1>
            </div>
        </nav>
        <section class="container">
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
                            <label for="fechainic">Fecha de Inicio:</label>
                            <input type="date" name="fechainic" id="fechainic" class="inputField form-control" required>
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
                        <div class="form-group checkbox lg-3 form-check">
                            <label><input type="checkbox" name="Hipotecario" id="Hipotecario"> Credito Hipotecario</label>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <input type="submit" name="submeeet" class="btn btn-primary mb-2" value="Enviar" class="inputButton" />&nbsp;
                        <input type="reset" name="limpiar" class="btn btn-danger mb-2" value="Restablecer" class="inputButton" />
                    </div>
                </form>
            <?php
        endif;
            ?>
            </article>
        </section>
        <footer class="col-xs-12">
            <div class="container">
                <p>Copyright Universidad Don Bosco 2021</p>
            </div>
        </footer>
</body>
<script src="js/validacion.js"></script>
</html>