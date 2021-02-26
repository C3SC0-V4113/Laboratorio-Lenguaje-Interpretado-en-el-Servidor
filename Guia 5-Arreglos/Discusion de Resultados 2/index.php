<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas de 3 estudiantes</title>
</head>

<body>
    <section>
        <article>
            <form action="resultados.php" method="post">
                <div class="formulario">
                    <?php
                        for ($i=0; $i < 3 ; $i++) { 
                            echo '<div class="subseccion">';
                            echo '<label for="nota1.'.$i.'">Primera Nota</label>';
                            echo '<input type="number" name="nota1'.$i.'" id="nota1'.$i.'" max=10>';
                            echo '</div>';
                            echo '<div class="subseccion">';
                            echo '<label for="nota2.'.$i.'">Segunda Nota</label>';
                            echo '<input type="number" name="nota2'.$i.'" id="nota2'.$i.'" max=10>';
                            echo '</div>';
                            echo '<div class="subseccion">';
                            echo '<label for="nota3.'.$i.'">Tercera Nota</label>';
                            echo '<input type="number" name="nota3'.$i.'" id="nota3'.$i.'" max=10>';
                            echo '</div>';
                        }
                    ?>
                </div>
                <div class="submit">
                    <input type="submit" name="enviar" id="enviar" class="botonform" value="Enviar">
                </div>
            </form>
        </article>
    </section>
</body>

</html>