<?php

include_once "Soporte.php";
include_once "CintaVideo.php";
include_once "Dvd.php";
include_once "Juego.php";
include_once "Cliente.php";

class Videoclub{
    private $nombre;
    private $productos=[];
    private $numProductos;
    private $socios=[];
    private $numSocios;

    public function __construct($nombre){
        $this->nombre=$nombre;
        $this->numProductos=0;
        $this->numSocios=0;
    }

    private function incluirProducto(Soporte $s){
        array_push($this->productos,$s);
        echo "Incluido soporte ".$this->numProductos."<br>";
        $this->numProductos++;
    }

    public function incluirCintaVideo($titulo,$precio,$duracion){
        $s = new CintaVideo($titulo,$this->numProductos,$precio,$duracion);
        $this->incluirProducto($s);
    }

    public function incluirDvd($titulo,$precio,$idiomas,$pantalla){
        $s = new Dvd($titulo,$this->numProductos,$precio,$idiomas,$pantalla);
        $this->incluirProducto($s);
    }

    public function incluirJuego($titulo,$precio,$consola,$minJ,$maxJ){
        $s = new Juego($titulo,$this->numProductos,$precio,$consola,$minJ,$maxJ);
        $this->incluirProducto($s);
    }

    public function incluirSocio($nombre,$maxAlquileresConcurrentes=3){
        $c = new Cliente($nombre,$this->numSocios,$maxAlquileresConcurrentes);
        array_push($this->socios,$c);
        $this->numSocios++;
    }

    public function listarProductos(){
        echo "
            <br><br><br>
            Listado de los ".count($this->productos)." productos disponibles
            <br>
        ";
        for($i=0;$i<count($this->productos);$i++){
            echo ($i+1).".- ";
            echo $this->productos[$i]->muestraResumen()."<br>";
        }
    }

    public function listarSocios(){

        for($i=0;$i<count($this->socios);$i++){
            echo ($i+1)."- <strong>Cliente ".$i."</strong>: ";
            echo $this->socios[$i]->muestraResumen();
            echo "<br>";
        }
    }

    public function alquilaSocioProducto($numeroCliente,$numeroSoporte){
        foreach ($this->socios as $socio){
            if($socio->getNumero()==$numeroCliente){
                $cliente = $socio;
            }
        }
        foreach ($this->productos as $producto){
            if($producto->getNumero()==$numeroSoporte){
                $soporte = $producto;
            }
        }
        $cliente->alquilar($soporte);
    }
}