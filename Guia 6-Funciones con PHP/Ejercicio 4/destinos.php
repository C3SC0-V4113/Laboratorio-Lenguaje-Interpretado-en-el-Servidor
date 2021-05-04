<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciudades de Destino</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Bitter" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fields.css" />
</head>
<body>
    <header>
        <nav class="navbar navbar-light bg-warning ">
            <span class="navbar-text mx-auto">
                <h1>Ciudades de
                    Destinos</h1>
            </span>
        </nav>
    </header>
    <section>
        <div class="container">
            <?php
            //La función espera una matriz con una lista ($lista)
            //ya sea de países o ciudades y un parámetro opcional
            //con el tipo de lista que tendrá un valor por defecto "ul"
            function createList($lista, $tipo = "ul")
            {
                //Inicializando variables para ambos tipos de listas HTML
                $ullist = "";
                $ollist = "";
                switch ($tipo):
                    case "ul":
                        $ullist .= "<article id=\"countries\">\n";
                        $ullist .= "\t<h1>\n";
                        $ullist .= "\t\tPaíses y ciudades\n";
                        $ullist .= "\t\t<span>seleccionadas</span>\n";
                        $ullist .= "\t</h1>\n";
                        $ullist .= "\t<ul class=\"imglist\">\n";
                        foreach ($lista as $key => $value) :
                            $ullist .= "\t\t<li><a href=\"javascript:void(0)\">$key => $value</a></li>\n";
                        endforeach;
                        $ullist .= "\t</ul>\n";
                        $ullist .= "</article>\n";
                        print $ullist;
                        break;
                    case "ol":
                        $ollist .= "<article id=\"cities\">\n";
                        $ollist .= "\t<h1><span>Ciudades</span></h1>\n";
                        $ollist .= "\t<div class=\"numberlist\">\n";
                        $ollist .= "\t\t<ol>\n";
                        foreach ($lista as $key => $value) :
                            $ollist .= "\t\t\t<li><a href=\"javascript:void(0)\">$key => $value</a></li>\n";
                        endforeach;
                        $ollist .= "\t\t</ol>\n";
                        $ollist .= "\t</div>\n";
                        $ollist .= "</article>";
                        print $ollist;
                        break;
                    default:
                        print "<p>No está definido este tipo de lista</p>";
                        break;
                endswitch;
            }
            //Inicia el procesamiento del formulario
            if (isset($_POST['submit'])) :
                //Análisis de los elementos de campo select
                if (is_array($_POST['location'])) :
                    //Si se tiene una matriz invocar a la función
                    //createList para crear la lista UL
                    createList($_POST['location']);
                else :
                    echo "Se esperaba una lista, no un valor escalar.";
                    exit(0);
                endif;
                //Análisis de los elementos checkbox
                extract($_POST);
                if (is_array($place)) :
                    createList($place, "ol");
                endif;
            else :
                print "<p>El procesamiento del formulario requiere que se haya presionado el botón Enviar.</p>";
                print "<a href=\"selectfields.html\">Regresar</a>";
                exit(0);
            endif;
            ?>
        </div>
    </section>
</body>
</html>