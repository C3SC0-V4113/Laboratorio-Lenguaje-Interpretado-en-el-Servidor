<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Cuentas de ahorro</title>
</head>
<body>
    <section class="container">
        <nav class="navbar navbar-dark bg-primary text-white">
            <h1>Operaciones bancarias</h1>
        </nav>
        <article>
            <form name="operaciones" id="operaciones" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <div class="campo">
                        <input class="form-control" type="text" name="nombre" size="25" maxlength="40" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <div class="campo">
                        <input class="form-control" type="text" name="cantidad" size="8" maxlength="10" />
                    </div>
                </div>
                <label for="operacion">Operación</label>
                <div class="opciones">
                    <div class="form-check">
                        <input type="radio" name="operacion" value="apertura" />
                        <label class="form-check-label">Apertura</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="operacion" value="deposito" />
                        <label class="form-check-label">Depósito</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="operacion" value="retiro" />
                        <label class="form-check-label">Retiro</label>
                    </div>
                </div>
                </div>
                <input type="reset" class="btn btn-primary mb-2" name="restablecer" value="Cancelar" />
                <input type="submit" class="btn btn-primary mb-2" name="enviar" value="Enviar" />
            </form>
            <?php
            spl_autoload_register('funcionautoload');
            function funcionautoload($classname)
            {
                include_once("class/" . $classname . ".class.php");
            }
            if (isset($_POST['enviar'])) {
                $msg = "";
                $titular = isset($_POST['nombre']) ? $_POST['nombre'] : "";
                if ($titular == "") {
                    $msg = "<h2>El nombre de la cuenta no puede estar vacío</h2><br />";
                }
                $cantidad = isset($_POST['cantidad']) &&
                    is_numeric($_POST['cantidad']) ? $_POST['cantidad'] : 0;
                if ($cantidad == 0 || $cantidad < 0) {
                    $msg .= "<h2>La cantidad no puede ser negativa, ni cero.</h2><br />";
                }
                if ($msg != "") {
                    echo $msg;
                    echo "<a href=\"{$_SERVER['PHP_SELF']}\">Volver al formulario</a><br />";
                    exit(0);
                }
                $operacion = isset($_POST['operacion']) ?
                    $_POST['operacion'] : "apertura";
                $nuevacuenta = new bankAccount();
                switch ($operacion) {
                    case "apertura":
                        $nuevacuenta->openAccount($titular, $cantidad);
                        break;
                    case "deposito":
                        $nuevacuenta->makeDeposit($cantidad);
                        break;
                    case "retiro":
                        $nuevacuenta->makeWithdrawal($cantidad);
                        break;
                }
            }
            ?>
        </article>
    </section>

</body>

</html>