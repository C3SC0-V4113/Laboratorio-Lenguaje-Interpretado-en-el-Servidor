<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculando el CUM</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Calculo final de CUM</h1>
    </header>
    <section>
        <article>
            <?php
            $materias=array();
            $notas=array();
            $uvs=array();
            if (isset($_POST['enviar'])) {
                $nombre=isset($_POST['estudiante'])?$_POST['estudiante']:"";
                echo "<h1>$nombre</h1>";
                for ($i=1; $i < 6; $i++) { 
                    $materia=isset($_POST['materia'.$i])?$_POST['materia'.$i]:"";
                    array_push($materias,$materia);
                }
                for ($i=1; $i < 6; $i++) { 
                    $nota=isset($_POST['notamateria'.$i])?$_POST['notamateria'.$i]:"";
                    array_push($notas,$nota);
                }
                for ($i=1; $i < 6; $i++) { 
                    $uv=isset($_POST['uvmateria'.$i])?$_POST['uvmateria'.$i]:"";
                    array_push($uvs,$uv);
                }
                $cum=round(CalculoCUM($notas,$uvs),2);
                Tabla($notas,$uvs,$materias,$cum);
                echo "<p>Su CUM es de: $cum</p>";
                echo "<p id=\"ultimo\">".Selector($cum)."</p>";
                echo "\t<a id=\"button\" href=\"index.html\">Regresar</a>";
            }
            else{
                echo '<a href="index.html">Ingrese datos válidos</a>';
            }

            //Calculo de CUM
            function CalculoCUM($nota=[],$uv=[]){
                $mediacompleja=0;
                $cantidad=array_sum($uv);
                foreach ($nota as $key => $value) {
                    $mediacompleja+=($value*$uv[$key]);
                }
                $total=$mediacompleja/$cantidad;
                return $total;
            }

            //Creador de Tabla
            function Tabla($notas=[],$uv=[],$materias=[],$cum=0){
                echo "<table>";
                //Encabezados
                echo "\t<tr>";
                echo "\t\t<th>Materia</th>";
                echo "\t\t<th>UV</th>";
                echo "\t\t<th>Nota</th>";
                echo "\t</tr>";
                echo "\t<tbody>";
                //Contenido
                for ($i=0; $i < 5; $i++) { 
                    echo "\t<tr>";
                    echo "\t\t<th>".$materias[$i]."</th>";
                    echo "\t\t<th>".$uv[$i]."</th>";
                    echo "\t\t<th>".$notas[$i]."</th>";
                    echo "\t</tr>";
                }
                echo "\t</tbody>";
                //Totales de la tabla
                echo "\t<tfoot>";
                echo "\t<tr>";
                echo "\t\t<th> Total</th>";
                echo "\t\t<th>".array_sum($uv)."</th>";
                echo "\t\t<th>".array_sum($notas)/count($notas)."</th>";
                echo "\t</tr>";
                echo "\t</tfoot>";
                echo "</table>";
            }
            //Selector de CUM
            function Selector($cum=0){
                $frase="";
                if ($cum>=6) {
                    if ($cum<7) {
                        $frase="Puede Ingresar un maximo de 20 Unidades Valorativas";
                    }
                    else{
                        if ($cum>=7.5) {
                            $frase="Puede Ingresar un maximo de 32 Unidades Valorativas";
                        }
                        else{
                            $frase="Puede Ingresar un maximo de 24 Unidades Valorativas";
                        }
                    }
                } else {
                    $frase="Puede Ingresar un maximo de 16 Unidades Valorativas";
                }
                return $frase;
            }
            ?>
        </article>
    </section>
    <footer>
        <p>Universidad Don Bosco 2021</p>
    </footer>
</body>
</html>