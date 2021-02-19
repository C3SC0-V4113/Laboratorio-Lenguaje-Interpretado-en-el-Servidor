<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Salario</title>
    <link rel="stylesheet" href="css/salario.css">
    <link rel="stylesheet" href="css/links.css">
    <script src="js/modernizr.custom.lis.js"></script>
</head>
<body>
    <header id="inset">
        <h1>Detalle del salario</h1>
    </header>
    <section>
        <article>
            <?php
                if (isset($_POST['enviar'])) {
                    $credito=false;
                    $empleado=isset($_POST['empleado'])? $_POST['empleado']:"";
                    $sueldobase=isset($_POST['sueldobase'])?$_POST['sueldobase']:"";
                    if (isset($_POST['hextra'])) {
                        $horasextras=isset($_POST['numhorasex'])?$_POST['numhorasex']:"0";
                        $pagohextra=isset($_POST['pagohextra'])?$_POST['pagohextra']:"0";
                        $sueldohextras=$horasextras*$pagohextra;
                    }
                    else {
                        $horasextras=0;
                        $sueldohextras=0;
                    }
                    if (isset($_POST['credit'])) {
                        $credito=true;
                    }
                    if (isset($_POST['categoria'])) {
                        $cato=isset($_POST['categoria'])?$_POST['categoria']:'Novato';
                    }
                    $sueldobruto=$sueldobase+$sueldohextras;
                    $array=CalculoDescuentos($sueldobruto,$credito,$cato);
                    echo "<div>\n<h3>Boleta de pago</h3>\n";
                    echo "<table>\n";
                    echo "\t<tr>\n\t\t<th colspan=\"2\">\n\t\t\tDetalle del pago\n\t\t</th>\n\t</tr>\n";
                    echo "\t<tr>\n\t\t<td>\n\t\t\tEl empleado es: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$empleado,"\n\t\t</td>\n\t\t\t</tr>\n";
                    echo "\t<tr>\n\t\t<td>\n\t\t\tEl sueldo base es: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t$ ",$sueldobase,"\n\t\t</td>\n\t\t\t</tr>\n";
                    echo "\t<tr>\n\t\t<td>\n\t\t\tLas horas extras son: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t",$horasextras,"\n\t\t</td>\n\t\t\t</tr>\n";
                    echo "\t<tr>\n\t\t<td>\n\t\t\tEl pago por hora extra es: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t$ ",$sueldohextras,"\n\t\t</td>\n\t\t\t</tr>\n";
                    echo "\t<tr>\n\t\t<th>\n\t\t\tEl sueldo bruto devengado es: \n\t\t</th>\n\t\t<th class=\"number\">\n\t\t\t$ ".$sueldobruto."\n\t\t</th>\n\t</tr>\n";
                    echo "\t<tr>\n\t\t<td>\n\t\t\tEl descuento de AFP es: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t$ ",$array[0],"\n\t\t</td>\n\t\t\t</tr>\n";
                    echo "\t<tr>\n\t\t<td>\n\t\t\tEl descuento de ISSS es: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t$ ",$array[1],"\n\t\t</td>\n\t\t\t</tr>\n";
                    echo "\t<tr>\n\t\t<td>\n\t\t\tEl descuento de Renta es: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t$ ",$array[2],"\n\t\t</td>\n\t\t\t</tr>\n";
                    echo "\t<tr>\n\t\t<td>\n\t\t\tEl descuento de Credito Hipotecario es: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t$ ",$array[3],"\n\t\t</td>\n\t\t\t</tr>\n";
                    echo "\t<tr>\n\t\t<td>\n\t\t\tEl descuento de Categoria Interna es: \n\t\t</td>\n\t\t<td class=\"detail\">\n\t\t\t$ ",$array[4],"\n\t\t</td>\n\t\t\t</tr>\n";
                    echo "\t<tr>\n\t\t<th>\n\t\t\tEl sueldo neto devengado es: \n\t\t</th>\n\t\t<th class=\"number\">\n\t\t\t$ ".$array[5]."\n\t\t</th>\n\t</tr>\n";
                    echo "</table>\n</div>\n";
                }

                function CalculoDescuentos($salario=0,$hipotecario=false,$clasificacion='Novato'){
                    $hipoteca=0;
                    $afp=round($salario*0.05,2);
                    $isss=round($salario*0.07,2);
                    $renta=round($salario*0.058,2);
                    if ($hipotecario==true) {
                        $hipoteca=round($salario*0.075,2);
                    }
                    $clasificatorio=0;
                    switch ($clasificacion) {
                        case 'Novato':
                            $clasificatorio=round($salario*0.16,2);
                            break;
                        case 'Junior':
                            $clasificatorio=round($salario*0.13,2);
                            break;
                        case 'Senior':
                            $clasificatorio=round($salario*0.09,2);
                            break;
                        case 'TheBest':
                            $clasificatorio=round($salario*0.07,2);
                            break;
                        default:
                            $clasificatorio=0;
                            break;
                    }
                    $salariototal=$salario-$afp-$isss-$renta-$hipoteca-$clasificatorio;
                    $descuentostotales=array();
                    array_push($descuentostotales,$afp);
                    array_push($descuentostotales,$isss);
                    array_push($descuentostotales,$renta);
                    array_push($descuentostotales,$hipoteca);
                    array_push($descuentostotales,$clasificatorio);
                    array_push($descuentostotales,$salariototal);
                    return $descuentostotales;
                }
            ?>
            <a href="salario.html" class="a-btn">
                <span class="a-btn-symbol">i</span>
                <span class="a-btn-text">Ingresar</span>
                <span class="a-btn-slide-text">Otro empleado</span>
                <span class="a-btn-slide-icon"></span>
            </a>
        </article>
    </section>
</body>
</html>