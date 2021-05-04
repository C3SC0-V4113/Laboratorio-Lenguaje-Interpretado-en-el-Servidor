<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio de Expresiones Regulares</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div id="bodywrap">
        <section id="pagetop"></section>
        <header id="pageheader">
            <h1>Uso de<span> Expresiones Regulares</span></h1>
        </header>
        <div id="contents">
            <section id="main">
                <div id="leftcontainer">
                    <h2>Buscador de Palabras</h2>
                    <section id="sidebar">
                        <?php
                        if (isset($_POST['Enviar'])) {
                            $text = isset($_POST['comment']) ?
                                trim($_POST['comment']) : null;
                            $palabra = isset($_POST['palabra']) ?
                                trim($_POST['palabra']) : null;
                            $text = preg_replace("/\b(" . $palabra . ")\b/i",'<span style="background:#5fc9f6">\1</span>',$text);
                            $no=count(preg_split("/\b(" . $palabra . ")\b/i",$text));
                        ?>
                            <div id="sidebarwrap">
                                <h2>Resultado</h2>
                                <p><?php echo 'Se encontraron '.($no-1).' coincidencias'; ?></p>
                                <p><?= $text ?></p>
                            </div>
                        <?php
                        }
                        ?>
                    </section>
                    <div class="clear"></div>
                    <article class="post">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="form">
                            <p class="textfield">
                                <label for="palabra">
                                    <small>Palabra a buscar</small>
                                </label>
                                <input name="palabra" id="palabra" value="tierra" size="22" tabindex="1" type="text" />
                            </p>
                            <p>
                                <small>Ingrese el texto de prueba para
                                    procesarlo con las
                                    <strong>expresiones regulares</strong>
                                </small>
                            </p>
                            <p class="text-area">
                                <textarea name="comment" id="comment" cols="50" rows="10" tabindex="4">A 39 años luz de la tierra se encuentra la estrella Trappist-1, conocida en la NASA por el nombre de catálogo 2MASS J23062928-0502285. Es decir, un astro completamente irrelevante hasta hace muy poco. El pasado mayo, el equipo liderado por Michaël Gillon (Universidad de Lieja, Bélgica) ya anunció que había descubierto dos planetas (quizás tres) orbitándola. Con un 9% de la masa del Sol, Trappist-1 es una enana roja fría. Si fuera un poco más pequeña, ya no sería una estrella sino una enana marrón, que son astros fríos que no pueden fusionar hidrógeno como nuestro sol. Ahora la NASA ha anunciado que Trappist-1 no tiene tres, sino siete exoplanetas, todos ellos de tamaño similar al de la Tierra, tres o cuatro de los cuales están en órbitas templadas donde no hace ni demasiado frío ni demasiado calor para permitir la existencia de agua líquida en su superficie y, por lo tanto, vida tal como la conocemos. Al ser la estrella pequeña y mucho más débil que nuestro sol, los exoplanetas están en órbitas necesariamente muy compactas. Es más, si pusiéramos los planetas en torno a nuestro sol, todos cabrían cómodamente dentro de la órbita de Mercurio.</textarea>
                            </p>
                            <p>
                                <input name="Enviar" id="Enviar" value="1" type="hidden" />
                                <input name="submit" id="submit" tabindex="5" type="image" src="images/submit.png" />
                            </p>
                            <div class="clear"></div>
                        </form>
                        <div class="clear"></div>
                    </article>
                </div>
            </section>
            <div class="clear"></div>
        </div>
    </div>
    <footer id="pagefooter">
        <div id="footerwrap">
        </div>
    </footer>
</body>
</html>