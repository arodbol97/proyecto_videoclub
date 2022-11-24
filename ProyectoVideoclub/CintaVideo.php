<?php
namespace ProyectoVideoclub;
Class CintaVideo extends Soporte{
    private $duracion;

    public function __construct($titulo, $numero, $precio, $duracion){
        parent::__construct($titulo, $numero, $precio);
        $this->duracion=$duracion;
    }

    public function muestraResumen(){
        echo "Película en VHS:<br>";
        parent::muestraResumen();
        echo "Duración: ".$this->duracion." minutos";
    }
}