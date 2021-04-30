<?php
session_start();
if (!isset($_SESSION['user']) || !isset($_SESSION['pass'])) {
    header("Location: autenticacionbasica.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Descarga de materiales de la materia LIS</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body class="container">
        <header>
            <div class="row">
                <div class="col-9">
                    <h1>Lenguajes Interpretados en el Servidor</h1>
                </div>
                <div class="col-3 float-right">
                    <a href="logout.php" class="btn btn-primary btn-lg " role="button" aria-disabled="true">Cerrar sesión</a>
                </div>
            </div>
            </div>
        </header>
        <section>
            <article>
                <ul class="list-group">
                    <li class="list-group-item active">Clases</li>
                    <li class="list-group-item ">
                        <a href="http://www.mediafire.com/download/ccyra1rm614t05a/Clase+01+-+Programaci%C3%B3n+web+del+lado+del+servidor+-+2014.pdf" target="_blank">
                            Clase 01: Programación web del lado del servidor
                        </a>
                    </li>
                    <li class="list-group-item ">
                        <a href="http://www.mediafire.com/download/4le9g50t1d3wng1/Clase+02+-+Introducci%C3%B3n+a+la+programaci%C3%B3n+y+sintaxis+de+PHP+-+2014.pdf" target="_blank">
                            Clase 02: Introducción a la programación y sintaxis
                            de PHP
                        </a>
                    </li>
                    <li class="list-group-item ">
                        <a href="http://www.mediafire.com/download/9zg2du274b6d3fu/Clase+03+-+Estructuras+de+control+sentencias+condicionales+y+repetitivas+-+2014.pdf" target="_blank">
                            Clase 03: Estructuras de control - Sentencias
                            condicionales y repetitivas </a>
                    </li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item active">Guías de práctica</li>
                    <li class="list-group-item ">
                        <a href="http://www.udb.edu.sv/udb/archivo/guia/informatica-tecnologico/lenguajes-interpretados-en-el-servidor/2014/i/guia-1.pdf" target="_blank">
                            Guía 01: Introducción a la Progamación web con PHP
                        </a>
                    </li>
                    <li class="list-group-item ">
                        <a href="http://www.udb.edu.sv/udb/archivo/guia/informatica-tecnologico/lenguajes-interpretados-en-el-servidor/2014/i/guia-2.pdf" target="_blank">
                            Guía 02: Estructuras de Control - Sentencias
                            condicionales y repetitivas
                        </a>
                    </li>
                    <li class="list-group-item ">
                        <a href="http://www.udb.edu.sv/udb/archivo/guia/informatica-tecnologico/lenguajes-interpretados-en-el-servidor/2014/i/guia-3.pdf" target="_blank">
                            Guía 03: Matrices y funciones en PHP
                        </a>
                    </li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item active">Sitios web</li>
                    <li class="list-group-item ">
                        <a href="http://www.php.net/manual/es" target="_blank">
                            Sitio web oficial de PHP
                        </a>
                    </li>
                    <li class="list-group-item ">
                        <a href="http://www.manualdephp.com/section/manual-de-php/" target="_blank">
                            Manual de PHP
                        </a>
                    </li>
                </ul>
            </article>
        </section>
    </body>

    </html>
<?php
}
?>