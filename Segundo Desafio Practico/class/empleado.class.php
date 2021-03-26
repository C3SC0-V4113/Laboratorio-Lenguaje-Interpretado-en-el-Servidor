<?php
//Definición de la clase empleado
class empleado
{
    //Estableciendo las propiedades de la clase
    private static $idEmpleado = 0;
    private $nombre;
    private $apellido;
    private $isss;
    private $renta;
    private $afp;
    private $sueldoNominal;
    private $sueldoLiquido;
    private $pagoxhoraextra;
    private $descuento;
    private $años;
    private $pagoxfidelidad;
    private $hipotecario;
    private $deschipotecario;
    private $FSV;

    //Declaración de constantes para los descuentos del empleado
    //Se inicializan porque pertenecen a la clase
    const descISSS = 0.03;
    const descRENTA = 0.075;
    const descAFP = 0.0625;
    const descHipo=0.049;
    const descFSV=0.058;
    //Constructor de la clase
    function __construct()
    {
        self::$idEmpleado++;
        $this->nombre = "";
        $this->apellido = "";
        $this->sueldoLiquido = 0.0;
        $this->descuento=0;
        $this->pagoxhoraextra = 0.0;
        $this->años=0;
        $this->hipotecario=false;
    }
    //Destructor de la clase
    function __destruct()
    {
        echo "<p class=\"msg\">El salario y descuentos del empleado han sido calculados.</p>";
        $backlink = "<a class=\"a-btn\" href=\"sueldoneto.php\">";
        $backlink .= "<span class=\"a-btn-text\">Calcular salario </span>";
        $backlink .= "<span class=\"a-btn-slide-text\">a otro empleado</span>";
        $backlink .= "<span class=\"a-btn-slide-icon\"></span>";
        $backlink .= "</a>";
        echo $backlink;
    }
    //Métodos de la clase empleado
    function obtenerSalarioNetoRecibo(
        $nombre,
        $apellido,
        $salario,
        $descuento,
        $horasextras,
        $pagoxhoraextra = 0.0,
        $años=0,
        $hipotecario=false
    ) {
        $this->años=$años;
        $this->hipotecario=$hipotecario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->pagoxhoraextra = $horasextras * $pagoxhoraextra;
        $this->sueldoNominal = $salario;
        if ($this->años>=2) {
            $this->pagoxfidelidad=$this->sueldoNominal*0.2;
        }
        else{
            $this->pagoxfidelidad=0;
        }
        if ($this->pagoxhoraextra > 0) {
            $this->isss = ($salario + $this->pagoxhoraextra + $this->pagoxfidelidad) * self::descISSS;
            $this->afp = ($salario + $this->pagoxhoraextra + $this->pagoxfidelidad) * self::descAFP;
        } else {
            $this->isss = $salario * self::descISSS;
            $this->afp = $salario * self::descAFP;
        }
        if ($this->hipotecario) {
            $this->deschipotecario=$salario*self::descHipo;
        }
        else{
            $this->deschipotecario=0;
        }
        $this->FSV=$salario*self::descFSV;
        $this->descuento=$descuento;
        

        $salariocondescuento = $this->sueldoNominal - ($this->isss + $this->afp + $this->descuento+$this->deschipotecario+$this->FSV);
        //De acuerdo a criterios del Ministerio de Hacienda
        //el descuento de la renta varía según el ingreso percibido
        if ($salariocondescuento > 2038.10) {
            $this->renta = $salariocondescuento * 0.3;
        } elseif ($salariocondescuento > 895.24 && $salariocondescuento <= 2038.10) {
            $this->renta = $salariocondescuento * 0.2;
        } elseif ( $salariocondescuento > 472.00 && $salariocondescuento <= 895.24) {
            $this->renta = $salariocondescuento * 0.1;
        } elseif ( $salariocondescuento > 0 && $salariocondescuento <= 472.00) {
            $this->renta = 0.0;
        }
        $this->sueldoNominal = $salario;
        $this->sueldoLiquido = $this->sueldoNominal + $this->pagoxhoraextra + $this->pagoxfidelidad - ($this->isss + $this->afp + $this->descuento+$this->deschipotecario+$this->FSV+$this->renta);
        $this->imprimirBoletaPago();
    }
    function imprimirBoletaPago()
    {
        $tabla="<div class='container'>";
        $tabla .= "<table class='table '><tr>";
        $tabla .= "<td>Id empleado: </td>";
        $tabla .= "<td>" . self::$idEmpleado . "</td></tr>";
        $tabla .= "<tr><td>Nombre empleado: </td>\n";
        $tabla .= "<td>" . $this->nombre . " " . $this->apellido . "</td></tr>";
        $tabla .= "<tr><td>Salario nominal: </td>";
        $tabla .= "<td>$ " . number_format($this->sueldoNominal,2,'.',',') . "</td></tr>";
        $tabla .= "<tr><td>Salario por horas extras: </td>";
        $tabla .= "<td>$ " . number_format($this->pagoxhoraextra,2,'.',',') . "</td></tr>";
        if ($this->años>=2) {
            $tabla .= "<tr><td>Bono por estar más de 2 años: </td>";
            $tabla .= "<td>$ " . number_format($this->pagoxfidelidad,2,'.',',') . "</td></tr>";
        }
        $tabla .= "<tr class='success'><td colspan=\"2\"><h4>Descuentos</h4></td></tr>";
        $tabla .= "<tr ><td >Descuento por Fondo Social Para la Vivienda: </td>";
        $tabla .= "<td>$ " . number_format($this->FSV,2,'.',',') . "</td></tr>";
        if($this->deschipotecario!=0){
            $tabla .= "<tr ><td >Descuento Credito hipotecario: </td>";
            $tabla .= "<td>$ " . number_format($this->deschipotecario,2,'.',',') . "</td></tr>";
        }
        $tabla .= "<tr ><td >Descuento por concepto: </td>";
        $tabla .= "<td>$ " . number_format($this->descuento,2,'.',',') . "</td></tr>";
        $tabla .= "<tr ><td >Descuento seguro social: </td>";
        $tabla .= "<td>$ " . number_format($this->isss,2,'.',',') . "</td></tr>";
        $tabla .= "<tr><td>Descuento AFP: </td>";
        $tabla .= "<td>$ " . number_format($this->afp,2,'.',',') . "</td></tr>";
        $tabla .= "<tr><td>Descuento renta: </td>";
        $tabla .= "<td>$ " . number_format($this->renta,2,'.',',') . "</td></tr>";
        $tabla .= "<tr><td>Total descuentos: </td>";
        $tabla .= "<td>$ " . number_format($this->isss + $this->afp + $this->descuento  +$this->deschipotecario + $this->FSV + $this->renta, 2, '.', ',') . "</td></tr>";
        $tabla .= "<tr><td>Sueldo líquido a pagar: </td>";
        $tabla .= "<td> $" . number_format($this->sueldoLiquido,2,'.',',') . "</td></tr>";
        $tabla .= "</table>";
        $tabla.="</div>";
        echo $tabla;
    }
}
