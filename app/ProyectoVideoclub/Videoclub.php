<?php
namespace ProyectoVideoclub;

use ProyectoVideoclub\Util\CupoSuperadoException;
use ProyectoVideoclub\Util\SoporteYaAlquiladoException;
use ProyectoVideoclub\Util\SoporteNoEncontradoException;

class Videoclub{
    private $nombre;
    private $productos=[];
    private $numProductos;
    private $socios=[];
    private $numSocios;
    private $numProductosAlquilados;
    private $numTotalAlquileres;

    public function __construct($nombre){
        $this->nombre=$nombre;
        $this->numProductos=0;
        $this->numSocios=0;
    }

    private function incluirProducto(Soporte $s){
        array_push($this->productos,$s);
        //echo "Incluido soporte ".$this->numProductos."<br>";
        $this->numProductos++;
    }

    public function incluirCintaVideo($titulo,$precio,$duracion){
        $s = new CintaVideo($titulo,$this->numProductos,$precio,$duracion);
        $this->incluirProducto($s);
        /*--330--*/
        return $this;
    }

    public function incluirDvd($titulo,$precio,$idiomas,$pantalla){
        $s = new Dvd($titulo,$this->numProductos,$precio,$idiomas,$pantalla);
        $this->incluirProducto($s);
        /*--330--*/
        return $this;
    }

    public function incluirJuego($titulo,$precio,$consola,$minJ,$maxJ){
        $s = new Juego($titulo,$this->numProductos,$precio,$consola,$minJ,$maxJ);
        $this->incluirProducto($s);
        /*--330--*/
        return $this;
    }

    public function incluirSocio($nombre,$maxAlquileresConcurrentes=3){
        $c = new Cliente($nombre,$this->numSocios,$maxAlquileresConcurrentes);
        array_push($this->socios,$c);
        $this->numSocios++;
        /*--330--*/
        return $this;
    }

    public function listarProductos(){
        echo "
            <br><br><br>
            Listado de los ".count($this->productos)." productos disponibles
            <br><br>
        ";
        for($i=0;$i<count($this->productos);$i++){
            echo ($i+1).".- ";
            echo $this->productos[$i]->muestraResumen()."<br><br>";              
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
        try{
            $cliente->alquilar($soporte);
        }catch(SoporteYaAlquiladoException $e){
            echo "<strong>".$e."</strong>";
        }catch(CupoSuperadoException $e){
            echo "<strong>".$e."</strong>";
        }
        /*--330--*/
        return $this;
    }

    /*--335--*/

    public function getNumProductosAlquilados(){
        
        return $this->numProductosAlquilados;
    }

    public function getNumTotalAlquileres(){

        return $this->numTotalAlquileres;
    }

    /*--336--*/

    public function alquilarSocioProductos(int $numSocio, array $numerosProductos){
        $numDisponibles=0;        

        for($i=0;$i<count($numerosProductos);$i++){            
            for($e=0;$e<count($this->productos);$e++){
                if($this->productos[$e]->getNumero()==$numerosProductos[$i]){
                    if(!$this->productos[$e]->alquilado){                        
                        $numDisponibles++;
                    }
                }
            }
        }

        if($numDisponibles==count($numerosProductos)){
            foreach ($numerosProductos as $numProd){
                $this->alquilaSocioProducto($numSocio,$numProd);
            }
        }else{
            throw new SoporteYaAlquiladoException();
        }
    }

    /*--337--*/

    public function devolverSocioProducto(int $numSocio, int $numeroProducto){
        $clienteCorrecto=false;        
        $productoCorrecto=false;        
        foreach ($this->socios as $socio){
            if($socio->getNumero()==$numSocio){
                $cliente = $socio;
                $clienteCorrecto=true;
            }
        }

        if($clienteCorrecto){                     
            for($e=0;$e<count($cliente->getSoportesAlquilados());$e++){                
                if($cliente->getSoportesAlquilados()[$e]->getNumero()==$numeroProducto){                        
                    $productoCorrecto=true;
                }
            }            
        }
        if($clienteCorrecto){            
            if($productoCorrecto){
                $cliente->devolver($numeroProducto);
            }else{
                throw new SoporteNoEncontradoException();
            }
        }else{
            throw new ClienteNoEncontradoException();
        }
        return $this;    
    }

    public function devolverSocioProductos(int $numSocio, array $numerosProductos){
        $numAlquilados=0;
        $clienteCorrecto=false;        

        foreach ($this->socios as $socio){
            if($socio->getNumero()==$numSocio){
                $cliente = $socio;
                $clienteCorrecto=true;
            }
        }

        if($clienteCorrecto){
            for($i=0;$i<count($numerosProductos);$i++){            
                for($e=0;$e<count($cliente->getSoportesAlquilados());$e++){
                    if($cliente->getSoportesAlquilados()[$e]->getNumero()==$numerosProductos[$i]){                        
                        $numAlquilados++;                        
                    }
                }
            }

            if($numAlquilados==count($numerosProductos)){                
                foreach ($numerosProductos as $numProd){
                    try{                        
                        $this->devolverSocioProducto($numSocio,$numProd);
                    }catch(Exception $e){
                        echo "<strong>".$e."</strong>";
                    }
                }
            }else{
                throw new SoporteNoEncontradoException();
            }
        }else{
            throw new ClienteNoEncontradoException();
        }
    }
}