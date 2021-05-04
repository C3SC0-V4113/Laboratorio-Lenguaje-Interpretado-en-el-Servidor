<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajando con funciones de lista variable de argumentos</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="js/modernizr.custom.lis.js"></script>
    <script src="js/prefixfree.min.js"></script>
</head>
<body>
    <section id="container">
        <header>
            <nav class="navbar navbar-dark bg-primary ">
                <span class="navbar-text mx-auto">
                    <h1>Mayor de una lista de números</h1>
                </span>
            </nav>
        </header>
        <div class="container-fluid">
            <div class="row">
                <?php
                function elMayor()
                {
                    $num_args = func_num_args();
                    $args = func_get_args();
                    $elmayor = $args[0];
                    for ($i = 1; $i < $num_args; $i++) {
                        $elmayor = ($elmayor > $args[$i]) ? $elmayor :
                            func_get_arg($i);
                    }
                    return $elmayor;
                }
                echo "<div class='col-sm-6 py-5 px-lg-5 border bg-success'>El mayor de 58, 167, 242, 85, 31, 109, -26, 81, 16, 126 es: " ."<h2>" . 
                elMayor(
                        58,
                        167,
                        242,
                        85,
                        31,
                        109,
                        -26,
                        81,
                        16,
                        126
                    ) . 
                    "</h2></div>";
                ?>
                <?php
                echo "<div class='col-sm-6 py-5 px-lg-5 border bg-warning'>El mayor de 61, 37, 75, 184, 42, -303, 43, 56, -121, 226, 172, 78, 6, 86 es:" ."<h2>" . 
                elMayor(
                        61,
                        37,
                        75,
                        184,
                        42,
                        -303,
                        43,
                        56,
                        -121,
                        226,
                        172,
                        78,
                        6,
                        86
                    ) . 
                    "</div>";
                ?>
            </div>
        </div>
    </section>
</body>
</html>