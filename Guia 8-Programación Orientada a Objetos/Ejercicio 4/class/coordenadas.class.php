<?php
class coordenadas
{
    private $coords = array('x' => 0, 'y' => 0);
    //Métodos especiales __get() y __set()
    function __get($property)
    {
        if (array_key_exists($property, $this->coords)) {
            return $this->coords[$property];
        } else {
            print "Error: Sólo se aceptan coordenadas x y y.<br/>\n";
        }
    }
    function __set($property, $value)
    {
        if (array_key_exists($property, $this->coords)) {
            $this->coords[$property] = $value;
        } else {
            print "Error: No se puede escribir otra coordenada más que x y y.<br />\n";
        }
    }
}
