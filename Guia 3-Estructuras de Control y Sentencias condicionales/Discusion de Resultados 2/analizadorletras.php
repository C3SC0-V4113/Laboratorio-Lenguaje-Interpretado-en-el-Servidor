<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analizando...</title>
</head>

<body>
    <header>
        <h1>La palabra analizado por sus partes</h1>
    </header>
    <section>
        <article>
            <?php
            function str_split_unicode($str, $l = 0) {
                if ($l > 0) {
                    $ret = array();
                    $len = mb_strlen($str, "UTF-8");
                    for ($i = 0; $i < $len; $i += $l) {
                        $ret[] = mb_substr($str, $i, $l, "UTF-8");
                    }
                    return $ret;
                }
                return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
            }
            function clasificadorASCII($str=""){
                $clasificacion=array();
                $ascii=intval($str);
                if (($ascii>=65 and $ascii<=90) or ($ascii>=97 and $ascii<=122) or $ascii==195) {
                    array_push($clasificacion,"Letra");
                    if ($ascii>=65 and $ascii<=90) {
                        array_push($clasificacion,"Mayusculas");
                        switch ($ascii) {
                            case 65:
                                array_push($clasificacion,"Vocal");
                                break;
                            case 69:
                                array_push($clasificacion,"Vocal");
                                break;
                            case 73:
                                array_push($clasificacion,"Vocal");
                                break;
                            case 79:
                                array_push($clasificacion,"Vocal");
                                break;
                            case 85:
                                array_push($clasificacion,"Vocal");
                                break;
                            default:
                            array_push($clasificacion,"Consonante");
                                break;
                        }
                    }
                    elseif (($ascii>=97 and $ascii<=122)) {
                        array_push($clasificacion,"Minuscula");
                        switch ($ascii) {
                            case 97:
                                array_push($clasificacion,"Vocal");
                                break;
                            case 101:
                                array_push($clasificacion,"Vocal");
                                break;
                            case 105:
                                array_push($clasificacion,"Vocal");
                                break;
                            case 111:
                                array_push($clasificacion,"Vocal");
                                break;
                            case 117:
                                array_push($clasificacion,"Vocal");
                                break;
                            default:
                            array_push($clasificacion,"Consonante");
                                break;
                        }
                    }
                    else {
                        array_push($clasificacion,"Tildada");
                        array_push($clasificacion,"Vocal");
                    }
                }
                elseif (($ascii>=48 and $ascii<=57)) {
                    array_push($clasificacion,"Número");
                }
                else{
                    array_push($clasificacion,"Simbolo");
                }
                return implode(',',$clasificacion);
            }
            if (isset($_POST['enviar'])) {
                $frase = isset($_POST['palabra']) ? $_POST['palabra'] : "";
                $palabra = strip_tags(str_replace(' ', '', $frase));
                $arreglo = str_split_unicode($palabra);
                echo "<p>$palabra</p>";
                echo "<table>";
                //Encabezados
                echo "\t<tr>";
                echo "\t\t<th>Caracter</th>";
                echo "\t\t<th>Tipo</th>";
                echo "\t</tr>";
                //Contenido
                foreach ($arreglo as $key => $caracter) {
                    echo "\t<tr>";
                    echo "\t\t<th>$caracter</th>";
                    echo "\t\t<th>".clasificadorASCII(ord($caracter))."</th>";
                    echo "\t</tr>";
                }
                echo "</table>";
            }
            ?>
        </article>
    </section>
    <footer>
        <p>Copyright CESCO 2021</p>
    </footer>
</body>

</html>