<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Venta de autos</title>
</head>

<body>
    <div class="container">
        <?php
        function elautoloader($classname)
        {
            include_once("class/" . $classname . ".class.php");
        }
        //Incluyendo el archivo de clase
        spl_autoload_register("elautoloader");
        //Creando los objetos para cada tipo de auto. Notar que se están
        //asignando a elementos de una matriz que tendrá por nombre $movil
        $movil[0] = new auto(
            "Peugeot",
            "307",
            "Gris",
            "img/peugeot.jpg"
        );
        $movil[1] = new auto(
            "Renault",
            "Clio",
            "Rojo",
            "img/renaultclio.jpg"
        );
        $movil[2] = new auto("BMW", "X3", "Negro", "img/bmwserie6.jpg");
        $movil[3] = new auto(
            "Toyota",
            "Avalon",
            "Blanco",
            "img/toyota.jpg"
        );
        //Esta llamada mostrará los valores por defecto en los argumentos
        //del método constructor.
        $movil[4] = new auto();
        ?>
        <header>
            <h1>Autos disponibles</h1>
        </header>
        <div class="row">
            <form name="operaciones" id="operaciones" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Seleccione el auto</label>
                    <select class="form-control" id="ingresados" name="ingresados">
                        <?php
                        for ($i = 0; $i < count($movil); $i++) {
                            $nombremodelo=$movil[$i]->nombre();
                            echo '<option value"'.$i.'">'.$nombremodelo.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <input type="reset" class="btn btn-primary mb-2" name="restablecer" value="Cancelar" />
                <input type="submit" class="btn btn-primary mb-2" name="enviar" id="enviar" value="Enviar" />
            </form>
        </div>
        <div class="row">
        <?php
            if (isset($_POST['enviar'])) {
                if (isset($_POST['ingresados'])) {
                    $auto=$_POST['ingresados'];
                    foreach ($movil as $key => $value) {
                        if ($value->nombre()==$auto) {
                            $movil[$key]->mostrar();
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
    </div>
</body>
</html>