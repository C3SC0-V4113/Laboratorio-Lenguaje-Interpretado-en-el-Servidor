<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones Anonimas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Funciones Anonimas</h1>
    </header>
    <section>
        <article>
            <h2>1.Las funciones anonimas pueden servir para hacer variables complejas de una forma más sencilla, reutilizando codigo facilmente</h2>
            <?php
                $saludo = function($nombre)
                {
                    printf("<p>Hola, %s\r\n</p>",$nombre);
                };
                $saludo('Este mensaje esta dentro de una funcion anonima, puedo enviar otro saludo');
                $saludo('Otro mensajito :3');
            ?>
            <h2><br>2.Herencia de variables</h2>
            <?php
                $mensaje = 'Estoy adentro de otra funcion anonima, pero tendras que ver el codigo si quieres comprobarlo';
                
                $ejemplo = function () use ($mensaje) {
                    echo '<p>'.var_dump($mensaje).'</p>';
                };
                $ejemplo();
            ?>
            <h2><br>3.Dentro de POO puede servir para definir la variable local</h2>
            <?php
                class Test
                {
                    public function testing($soy,$dentro)
                    {
                        $soy=$soy;
                        $dentro=$dentro;

                        return function() {
                            var_dump($this);
                        };
                    }
                }

                $object = new Test;
                $function = $object->testing('una funcion','de un objeto');
                $function();
            ?>
        </article>
    </section>
    <footer>
        <p>Copyrigth Universidad Don Bosco 2021</p>
    </footer>
</body>
</html>