<?php
namespace ProyectoVideoclub;
class Dvd extends Soporte{
    public $idiomas;
    private $formatPantalla;

    public function __construct($titulo, $numero, $precio, $idiomas, $formatPantalla){
        parent::__construct($titulo, $numero, $precio);
        $this->idiomas=$idiomas;
        $this->formatPantalla=$formatPantalla;
    }

    public function muestraResumen(){
        echo "Película en DVD:<br>";
        parent::muestraResumen();
        echo "Idiomas: ".$this->idiomas;
        echo "<br>Formato Pantalla: ".$this->formatPantalla;
    }
}