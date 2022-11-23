<?php
class Cliente
{
    public $nombre;
    private $numero;
    private $soportesAlquilados;
    private $numSoportesAlquiados;
    private $maxAlquilerConcurrente;

    public function __construct($nombre, $numero, $soportesAlquilados, $numSoportesAlquilados, $maxAlquilerConcurrentes = 3)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->soportesAlquilados = $soportesAlquilados;
        $this->numSoportesAlquiados == $numSoportesAlquilados;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrentes;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getNumSoportesAlquiados()
    {
        return $this->numSoportesAlquiados;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function muestraResumen()
    {
        echo "<br>Cliente " . $this->nombre;
        echo "<br>Cantidad de alquileres: " . count($this->soportesAlquilados);
    }

}