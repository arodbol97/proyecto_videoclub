<?php
namespace ProyectoVideoclub;
class Cliente
{
    public $nombre;
    private $numero;
    private $soportesAlquilados;
    private $numSoportesAlquiados;
    private $maxAlquilerConcurrente;

    public function __construct($nombre, $numero, $maxAlquilerConcurrentes = 3)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->soportesAlquilados=[];
        $this->numSoportesAlquiados=0;
        $this->maxAlquilerConcurrente=$maxAlquilerConcurrentes;
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
        echo $this->nombre;
        echo "<br>Cantidad de alquileres: " . count($this->soportesAlquilados);
    }

    /*--325--*/

    public function tieneAlquilado(Soporte $s) : bool{
        $alquilado=false;
        if(in_array($s,$this->soportesAlquilados)){
            $alquilado=true;
        }
        return $alquilado;
    }

    public function alquilar(Soporte $s){
        $alquilado=false;
        if(!in_array($s,$this->soportesAlquilados) && count($this->soportesAlquilados)<$this->maxAlquilerConcurrente){
            $alquilado=true;
            $this->numSoportesAlquiados++;
            echo "<br><strong>Alquilado soporte a</strong>: ".$this->nombre;
            echo "<br><br>";
            echo $s->muestraResumen();
            echo "<br><br>";
            array_push($this->soportesAlquilados,$s);
        }
        /*--330--*/
        return $this;
    }

    /*--326--*/

    public function devolver(int $numSoporte){
        $alquilado=false;
        $soporteADevolver=null;

        foreach ($this->soportesAlquilados as $s){
            if($s->getNumero()==$numSoporte){
                $alquilado=true;
                $this->numSoportesAlquiados--;
                echo "<br>Número de soportes alquilados actualizado";
                $soporteADevolver=$s;
            }
        }

        if ($pos = array_search($soporteADevolver,$this->soportesAlquilados) !== false) {
            unset($this->soportesAlquilados[$pos]);
            echo $pos;
            echo "<br>Soporte devuelto";
        }
        /*--330--*/
        return $this;
    }

    public function listaAlquileres() : void{
        echo "<br>".$this->nombre." tiene ".count($this->soportesAlquilados)." alquileres:";
        foreach ($this->soportesAlquilados as $s){
            echo "<br>";
            $s->muestraResumen();
        }
    }

}