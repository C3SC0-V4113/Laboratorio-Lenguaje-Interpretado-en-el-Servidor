<?php
class bankAccount
{
    //Propiedades de la clase
    private static $numberAccount = 0;
    protected $idcuenta;
    private $owner;
    private $balance = 0.0;
    //Métodos de la clase
    function openAccount($owner, $amount)
    {
        self::$numberAccount++;
        $this->idcuenta = self::$numberAccount;
        $this->owner = $owner;
        $this->balance = $amount;
        $comprobante = "<table class='table table-hover'>";
        $comprobante .= " <thead> <td colspan='2' scope='col'>DATOS DE TRANSACCIÓN<td></thead>";
        $comprobante .= "<tr scope='row'>\n\t\t<td>Número de cuenta: </td>\n";
        $comprobante .= "<td>\$ " . self::$numberAccount . "</td></tr>";
        $comprobante .= "<td>Propietario: </td>\n";
        $comprobante .= "<td>\$ " . $this->owner . "</td></tr>";
        $comprobante .= "<tr>\n<td class='success'>Saldo inicial: </td>";
        $comprobante .= "<td>\$ " . number_format($this->balance, 2, '.', ',') . "</td></tr>";
        $comprobante .= "</table>\n";
        echo $comprobante;
    }
    function makeDeposit($amount, $saldo = 250)
    {
        //Se añade al saldo actual la cantidad ($amount)
        //recibida como argumento del método
        $this->balance = $saldo;
        $this->balance += $amount;
        $comprobante = "<table class='table table-hover'>";
        $comprobante .= " <thead> <td colspan='2' scope='col'>DATOS DE TRANSACCIÓN<td></thead>";
        $comprobante .= "<tr scope='row'>\n\t\t<td>Saldo inicial: </td>\n";
        $comprobante .= "<td>\$ " . number_format($saldo, 2, ".", ",") . "</td></tr>";
        $comprobante .= "<td>Cantidad depositada: </td>\n";
        $comprobante .= "<td>\$ " . number_format($amount, 2, '.', ',') . "</td></tr>";
        $comprobante .= "<tr>\n<td class='success'>Nuevo saldo: </td>";
        $comprobante .= "<td>\$ " . number_format($this->balance, 2, '.', ',') . "</td></tr>";
        $comprobante .= "</table>\n";
        echo $comprobante;
    }
    function makeWithdrawal($amount, $saldo = 250)
    {
        //Se resta del saldo actual de la cuenta
        //la cantidad ($amount) recibida como argumento
        $this->balance = $saldo;
        $saldoinicial = $this->balance;
        $this->balance -= $amount;
        if ($this->balance > 0) {
            $comprobante = "<table class='table table-hover'>";
            $comprobante .= " <thead> <td colspan='2' scope='col'>DATOS DE TRANSACCIÓN<td></thead>";
            $comprobante .= "<tr scope='row'>\n\t\t<td>Saldo inicial: </td>\n";
            $comprobante .= "<td>\$ " .
                number_format($saldoinicial, 2, ".", ",") . "</td></tr>";
            $comprobante .= "<td>Cantidad retirada: </td>\n";
            $comprobante .= "<td>\$ " .
                number_format($amount, 2, '.', ',') . "</td></tr>";
            $comprobante .= "<tr>\n<td class='success'>Nuevo saldo: </td>";
            $comprobante .= "<td>\$ " .
                number_format($this->balance, 2, '.', ',') . "</td></tr>";
            $comprobante .= "</table>\n";
        } else {
            $comprobante = "<table class='table table-hover'>";
            $comprobante .= "<tr><td>Aviso: </td>";
            $comprobante .= "<td>Su cuenta presenta insuficiendia de fondos.</td></tr>";
            $comprobante .= "</table>";
        }
        echo $comprobante;
    }
    function getBalance()
    {
        return $this->balance;
    }
}
