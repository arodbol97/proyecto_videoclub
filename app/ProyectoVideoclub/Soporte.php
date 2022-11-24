<?php
namespace ProyectoVideoclub;
abstract class Soporte implements Resumible {
    public $titulo;
    protected $numero;
    private $precio;
    private static $IVA=1.21;

    public function __construct($titulo,$numero,$precio){
        $this->titulo=$titulo;
        $this->numero=$numero;
        $this->precio=$precio;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getPrecioConIva(){
        return $this->precio*self::$IVA;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function muestraResumen(){
        echo $this->titulo;
        echo "<br>" . $this->precio . " € (IVA no incluido)<br>";
    }
}