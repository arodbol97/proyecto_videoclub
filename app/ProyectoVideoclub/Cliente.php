<?php
namespace ProyectoVideoclub;
use ProyectoVideoclub\Util\CupoSuperadoException;
use ProyectoVideoclub\Util\SoporteNoEncontradoException;
use ProyectoVideoclub\Util\SoporteYaAlquiladoException;

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

    public function getSoportesAlquilados()
    {
        return $this->soportesAlquilados;
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

            /*--335--*/

            $s->alquilado=true;
        } else { /*--334--*/
            if(in_array($s,$this->soportesAlquilados)){
                throw new SoporteYaAlquiladoException();
            } else if(count($this->soportesAlquilados)>=$this->maxAlquilerConcurrente){
                throw new CupoSuperadoException();
            }
        }
        /*--330--*/
        return $this;
    }

    /*--326--*/

    public function devolver(int $numSoporte){
        $alquilado=false;
        $soporteADevolver=null;

        for ($i=0;$i<count($this->soportesAlquilados);$i++){
            if($this->soportesAlquilados[$i]->getNumero()==$numSoporte){
                $alquilado=true;
                $this->numSoportesAlquiados--;
                $soporteDevuelto = $this->soportesAlquilados[$i];
                unset($this->soportesAlquilados[$i]);
                $this->soportesAlquilados = array_values($this->soportesAlquilados);
                echo "<br>Soporte devuelto";
                $i=count($this->soportesAlquilados)+1;
            }
        }
           
            /*--335--*/

        if ($alquilado){
            $soporteDevuelto->alquilado=false;
        } else { /*--334--*/
            throw new SoporteNoEncontradoException();
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