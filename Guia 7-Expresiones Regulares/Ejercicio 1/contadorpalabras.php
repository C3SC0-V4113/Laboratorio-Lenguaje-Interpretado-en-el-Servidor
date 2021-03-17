<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <title>Contador de caracteres y palabras</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css" />
    <link rel="stylesheet" href="css/palabras.css" />
</head>

<body>
    <header class="row s12">
        <h1>Contador de caracteres y palabras</h1>
    </header>
    <section>
        <article class="container">
            <?php
            if (isset($_POST['btnContar'])) :
                //Se carga la librería con la función que se encargará
                //de contar las palabras en el texto ingresado por el usuario
                require "wordcount.php";
                $textolimpio = wordcount($_POST['area']);
                $complemento = count($textolimpio) > 1 ? "palabras" : "palabra";
                echo "<p>Se han contabilizado: " . count($textolimpio) . "
$complemento</p>\n";
            else :
            ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="frmtexto" id="frmtexto" class="col s12">
                    <div class="row col s12">
                        <div class="input-field col s12">
                            <textarea name="area" id="text-box" class="materialize-textarea col s12"></textarea>
                            <label for="text-box">Ingrese texto:</label><br />
                        </div>
                        <div class="12u">
                            <button type="submit" name="btnContar" id="btnContar" class="btn waves-effect waves-light">
                                <i class="material-icons right">Contar las palabras</i>
                            </button>
                        </div>
                    </div>
                </form>
                <script src="js/palabras.js"></script>
            <?php
            endif;
            ?>
        </article>
    </section>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
        <script src = "http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<!-- Importando librería de JavaScript de materialize CSS -->
<script src="https://cdnjs.cloudflare.com/
</html>