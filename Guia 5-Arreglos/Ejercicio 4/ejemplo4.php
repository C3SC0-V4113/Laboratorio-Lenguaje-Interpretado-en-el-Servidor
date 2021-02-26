<!DOCTYPE html>
<html lang="es">
<head>
    <title>Cartelera de cine</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/modernizr.custom.lis.js"></script>
</head>
<body>
    <div class="container">
        <header class='navbar navbar-dark bg-dark'>
            <a class='navbar-brand' class='d-inline-block align-top' href='#'>
                Cartelera de Cine Bosco
            </a>
        </header>
        <section>
            <?php
            //Creamos una variable con el directorio o carpeta que contiene las imágenes
            $dir = "img";
            //Creamos una matriz con los nombres de las imágenes que se almacenan en el directorio
            $peliculas = array(
                "al-diablo-con-el-diablo.jpg", "click.jpg",
                "cruzada.jpg", "efecto-mariposa.jpg",
                "busca-de-la-felicidad.jpg", "amenaza-fantasma.jpg",
                "la-milla-verde.jpg", "la-propuesta.jpg",
                "comunidad-del-anillo.jpg", "sextosentido.jpg", "Avengers.jpg", "Parasite.jpg"
            );
            //Obtener cuatro claves de la matriz $peliculas
            $claves = array_rand($peliculas, 4);
            //Creando una estructura de 3 columnas con elementos DIV
            ?>
            <form action="pagoentrada.php" method="POST">
                <fieldset class="form-group">
                    <legend><span>Entrada al cine</span></legend>
                    <label for="pelicula">Película</label>
                    <select class="form-control" name="pelicula" id="pelicula">
                        <option value="mov0001" selected="selected">
                            Al diablo con el diablo
                        </option>
                        <option value="mov0000">
                            Avengers
                        </option>
                        <option value="mov0002">
                            Click
                        </option>
                        <option value="mov0003">
                            Cruzada
                        </option>
                        <option value="mov0004">
                            El efecto mariposa
                        </option>
                        <option value="mov0005">
                            En busca de la felicidad
                        </option>
                        <option value="mov0006">
                            La amenaza fastasma
                        </option>
                        <option value="mov0007">
                            Milagros inesperados
                        </option>
                        <option value="mov0008">
                            La propuesta
                        </option>
                        <option value="mov0009">
                            La comunidad del anillo
                        </option>
                        <option value="mov0010">
                            El sexto sentido
                        </option>
                        <option value="mov0011">
                            Parasite
                        </option>
                    </select><br />
                    <label for="cantidad">Cantidad</label>
                    <input class="formcontrol" type="text" name="cantidad" id="cantidad" maxlength="1" placeholder="Cantidad" pattern="\d{1}" required /><br />
                    <input type="submit" name="comprar" value="Comprar" class="btn btn-primary" />
                </fieldset>
            </form>
            <div id="carouselExampleSlidesOnly" class="carousel slide" dataride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w100" src="<?php echo $dir . "/" . $peliculas[$claves[0]]; ?>" /><br />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w100" src="<?php echo $dir . "/" . $peliculas[$claves[1]]; ?>" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w100" src="<?php echo $dir . "/" . $peliculas[$claves[2]]; ?>" />
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w100" src="<?php echo $dir . "/" . $peliculas[$claves[3]]; ?>" />
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>